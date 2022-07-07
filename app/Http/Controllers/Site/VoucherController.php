<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StudentVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    protected $voucher;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
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
        if (Auth::user()->isStudent() && Auth::user()->student->status == 'STUDYING') {
            $voucherCollected = Auth::user()->student->vouchers;

            // SEO
            $meta_desc     = 'Trang tổng hợp các mã giảm giá của hệ thống ' . config('app.name') . ' mà võ sinh đã thu thập hoặc chưa, đã sử dụng và chưa sử dụng';
            $meta_keywords = 'mã giảm giá, học phí, thu thập';
            $url_canonical = route('vouchers.index');
            $image_og      = '';
            $meta_title    = 'Hóa đơn nộp học phí';
            // SEO

            return view('vouchers.index',
                compact('voucherCollected', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $voucher = $this->voucher->whereCode(strtoupper($code))->first();

        if (!is_null($voucher)) {

            // Kiểm tra cơ sở áp dụng
            if (!is_null($voucher->dojos()->wherePivot('dojo_id', Auth::user()->student->dojo_id)->first())) {

                // Kiểm tra số lượng
                if ($voucher->used < $voucher->amount) {
                    return view('vouchers.info', compact('voucher'));
                } else {
                    return response()->json([
                        'error' => 'Voucher đã hết, chậm tay mất rồi!',
                    ]);
                }
            } else {
                return response()->json([
                    'error' => 'Mã giảm giá này không áp dụng tại cở sở bạn!',
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Không tồn tại mã giảm giá này!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function getVoucher(Request $request)
    {
        // Kiểm tra xem có chưa?
        if (is_null(StudentVoucher::where('student_id', Auth::user()->student->id)->where('voucher_id',
            $request->voucher_id)->first())) {
            $studentVoucher = StudentVoucher::create([
                'student_id' => Auth::user()->student->id,
                'voucher_id' => $request->voucher_id,
            ]);
            $voucher        = Voucher::find($request->voucher_id);
            if ($studentVoucher) {
                $voucher->update(["used" => $voucher->used + 1]);
            }
            return view('vouchers.info_card', compact('voucher'));
        } else {
            return response()->json([
                'error' => 'Bạn đã có mã giảm giá này rồi!',
            ]);
        }
    }
}
