<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentVoucher;
use App\Models\TransferDojo;
use App\Models\Tuition;
use App\Notifications\PayTuition;
use App\Notifications\PayTuitionOnline;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Models\Role;

class TuitionController extends Controller
{
    protected $tuition;
    protected $payment;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Tuition $tuition, Payment $payment)
    {
        $this->tuition = $tuition;
        $this->payment = $payment;
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isStudent()) {

            $student = Auth::user()->student;
            $tuitions = $student->tuitions()->where('status', 'SUCCESS')->orderBy('updated_at', 'desc')->get();

            $excess_cash = empty($tuitions->toArray()) ? 0 : ($tuitions[0]->excess_cash - $tuitions[0]->refunds);

            $vouchers = $student->vouchers()->wherePivot('used', 0)->get()->groupBy('type');

            // Đăng ký chuyển cơ sở được xác nhận
            $transferDojo = $student->transferDojos()->where('confirmed', 'CONFIRMED')->get();

            // Nếu chưa chuyển cơ sở
            if(count($transferDojo) == 0) {
                $start = $tuitions->last()->month_start ?? Carbon::now()->format('Y-m') . '-01';
                $policyInfo = $student->dojo->tuitionPolicys()->where('date_apply', '>=', $start)->get();
                $policy = $student->dojo->tuitionPolicys()->where('date_apply', '<=', $start)->first();
                $policyInfo->push($policy);
            } else {
                $start = $tuitions->last()->month_start ?? Carbon::now()->format('Y-m') . '-01';
                $policyInfo = collect();

                $policy = $transferDojo->first()->currentDojo->tuitionPolicys()->where('date_apply', '<=', $start)->first();
                $policyInfo->push($policy);

                foreach($transferDojo as $transfer) {
                    $end = $transfer->date_transfer;
                    $polices = $transfer->currentDojo->tuitionPolicys()->where('date_apply', '>=', $start)->where('date_apply', '<', $end)->get();
                    foreach($polices as $policy) {
                        $policyInfo->push($policy);
                    }
                    $start = $end;

                    // Lấy chính sách học phí tại tháng chuyển cơ sở
                    $policy = $transfer->newDojo->tuitionPolicys()->where('date_apply', '<=', $transfer->date_transfer)->first();
                    $policy->date_apply = $transfer->date_transfer;
                    $policyInfo->push($policy);
                }

                $lastTransfer = $transferDojo->last();
                $polices = $lastTransfer->newDojo->tuitionPolicys()->where('date_apply', '>=', $lastTransfer->date_transfer)->get();
                foreach($polices as $policy) {
                    $policyInfo->push($policy);
                }
            }

            $policyInfo = $policyInfo->sortByDesc(function ($policy, $key) {
                return $policy->date_apply;
            });

            // SEO
            $meta_desc = 'Trang thông tin lịch sử học phí và nộp học phí qua cổng thanh toán online Momo';
            $meta_keywords = 'lịch sử học phí, nộp học phí, thanh toán online, ví điện tử, Momo';
            $url_canonical = route('tuitions.index');
            $image_og = '';
            $meta_title = 'Học phí';
            // SEO

            return view('tuitions.index', compact('excess_cash', 'tuitions', 'policyInfo','vouchers', 'student', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->total <= 0) {
            return redirect()->route('tuitions.index')->with([
                'status' => 'Thông báo',
                'message' => 'Số dư của bạn vẫn khả dụng, có thể nộp nhiều tháng hơn!',
                'type' => 'info',
                'color' => '#00bcd4',
            ]);
        }

        //Lưu vào CSDL
        $tuition = new Tuition();
        $tuition->student_id = $request->student_id;
        $tuition->cashier = 'MOMO';
        $tuition->month = $request->month;
        $tuition->month_start = date_create($request->month_start)->format('Y-m-d');
        $tuition->month_end = date_create($request->month_end)->format('Y-m-d');
        $tuition->total_price = $request->total_price;
        $tuition->total = $request->total;
        $tuition->amount = $request->total;
        $tuition->excess_cash = 0;
        $tuition->refunds = 0;
        $tuition->note = $request->note;
        $tuition->type = 1; //1 - Online
        $tuition->status = 'FAIL';
        $tuition->save();

        // Khởi tạo request lên Momo
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = config('payment')["partnerCode"];
        $accessKey = config('payment')["accessKey"];
        $secretKey = config('payment')["secretKey"];
        $orderId = time() . ""; // Mã đơn hàng
        $orderInfo = $request->student_name . ' nộp học phí ' . $request->month . ' tháng, từ ' . date_create($request->month_start)->format('m/Y') . ' đến ' . date_create($request->month_end)->format('m/Y');
        $amount = $request->total;
        $returnUrl = route('tuitions.result');
        $notifyurl = route('tuitions.ipn');
        $extraData = "month=" . $request->month . ";monthStart=" . $request->month_start . ";monthEnd=" . $request->month_end;
        $extraData .= ";student_id=" . $request->student_id;
        $extraData .= ";bonus=" . json_encode($request->bonus_default);
        $extraData .= ";voucher=" . json_encode($request->vouchers_apply);
        $extraData .= ";tuition_id=" . $tuition->id;
        $extraData .= ";excess_cash=" . $request->excess_cash;

        $requestId = time() . "";
        $requestType = "captureMoMoWallet";

        //before sign HMAC SHA256 signature
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->payment->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        return redirect($jsonResult['payUrl']);
    }

    public function ipn(Request $request)
    {
        if (!empty($request->all())) {
            $response = array();
            try {
                $partnerCode = $request->partnerCode;
                $accessKey = $request->accessKey;
                $secretKey = config('payment')["secretKey"]; //Put your secret key in there
                $orderId = $request->orderId;
                $localMessage = $request->localMessage;
                $message = $request->message;
                $transId = $request->transId;
                $orderInfo = $request->orderInfo;
                $amount = $request->amount;
                $errorCode = $request->errorCode;
                $responseTime = $request->responseTime;
                $requestId = $request->requestId;
                $payType = $request->payType;
                $orderType = $request->orderType;
                $extraData = $request->extraData;
                $m2signature = $request->signature; //MoMo signature

                //Checksum
                $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
                    "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
                    "&payType=" . $payType . "&extraData=" . $extraData;

                $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

                if ($m2signature == $partnerSignature) {
                    if ($errorCode == '0') {
                        $result = '<div class="alert alert-success">Capture Payment Success</div>';
                    } else {
                        $result = '<div class="alert alert-danger">' . $message . '</div>';
                    }
                } else {
                    $result = '<div class="alert alert-danger">This transaction could be hacked, please check your signature and returned signature</div>';
                }
            } catch (Exception $e) {
                return $response['message'] = $e;
            }

            $debugger = array();
            $debugger['rawData'] = $rawHash;
            $debugger['momoSignature'] = $m2signature;
            $debugger['partnerSignature'] = $partnerSignature;

            if ($m2signature == $partnerSignature) {
                $response['message'] = "Received payment result success";
            } else {
                $response['message'] = "ERROR! Fail checksum";
            }
            $response['debugger'] = $debugger;
            return json_encode($response);
        }
    }

    public function result(Request $request)
    {
        if (!empty($request->all())) {
            $secretKey = config('payment')["secretKey"]; //Put your secret key in there
            $partnerCode = $request->partnerCode;
            $accessKey = $request->accessKey;
            $orderId = $request->orderId;
            $localMessage = $request->localMessage;
            $message = $request->message;
            $transId = $request->transId;
            $orderInfo = $request->orderInfo;
            $amount = $request->amount;
            $errorCode = $request->errorCode;
            $responseTime = $request->responseTime;
            $requestId = $request->requestId;
            $extraData = $request->extraData;
            $payType = $request->payType;
            $orderType = $request->orderType;
            $m2signature = $request->signature; //MoMo signature

            //Checksum
            $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
                "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
                "&payType=" . $payType . "&extraData=" . $extraData;

            $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

            // Nếu chữ ký trùng nhau
            if ($m2signature == $partnerSignature) {
                $extraData = explode(';', $extraData);
                $tuitionInfo = [];
                foreach ($extraData as $data) {
                    $item = explode('=', $data);
                    $tuitionInfo[$item[0]] = $item[1];
                }

                // Nếu không có lỗi                
                if ($errorCode == '0') {
                    $tuition = Tuition::find($tuitionInfo['tuition_id']);

                    // Cập nhật trạng thái của học phí và mã giao dịch
                    $tuition->update([
                        'status' => 'SUCCESS',
                        'trans_id' => $transId,
                    ]);

                    // Cập nhật trạng thái sử dụng voucher
                    if ($tuitionInfo['voucher'] != 'null') {
                        $vouchers = StudentVoucher::where('student_id', $tuitionInfo['student_id'])->whereIn('voucher_id', json_decode($tuitionInfo['voucher']))->get();
                        foreach ($vouchers as $voucher) {
                            $bonus = $tuition->total_price * $voucher->voucher->percent / 100;
                            $bonus = ($bonus <= $voucher->voucher->max_price) ? $bonus : $voucher->voucher->max_price;

                            $voucher->update([
                                'used' => 1,
                                'money_reduction' => $bonus
                            ]);
                        }
                    }

                    // Gửi email cho võ sinh
                    $user = Student::find($tuitionInfo['student_id'])->user;
                    $student = $user->student;
                    Notification::send($user, new PayTuition($tuition, $student->name));

                    // Gửi email cho quản lý
                    $role = Role::whereIn('name', ['admin', 'manager'])->select('id')->get();
                    $user1 = User::whereIn('role_id', $role)->get();
                    Notification::send($user1, new PayTuitionOnline($tuition, $student->name, $student->id));

                    // SEO
                    $meta_desc = 'Trang hóa đơn thanh toán học phí qua cổng thanh toán online Momo';
                    $meta_keywords = 'thanh toán online, ví điện tử, Momo, hóa đơn';
                    $url_canonical = route('tuitions.result');
                    $image_og = '';
                    $meta_title = 'Hóa đơn nộp học phí';
                    // SEO


                    return view('tuitions.result', compact('result', 'orderId', 'transId', 'orderInfo', 'amount', 'tuitionInfo', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
                } else {
                    return redirect()->route('tuitions.index')->with([
                        'status' => 'Lỗi',
                        'message' => $localMessage,
                        'type' => 'error',
                        'color' => '#ed3939',
                    ]);
                }
            } else {
                return redirect()->route('tuitions.index')->with([
                    'status' => 'Lỗi',
                    'message' => 'Giao dịch có vẻ như bị hack, vui lòng kiểm tra lại!',
                    'type' => 'error',
                    'color' => '#ed3939',
                ]);
            }
        }
    }
}
