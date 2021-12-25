<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dojo;
use App\Models\TuitionPolicy;
use App\Notifications\UpdatePrice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class TuitionPolicyController extends VoyagerBaseController
{
    protected $tuitionPolicy;
    protected $dojo;

    /**
     * Create a new controller instance.
     *
     * @param  $tuition
     * @return void
     */
    public function __construct(TuitionPolicy $tuitionPolicy, Dojo $dojo)
    {
        $this->tuitionPolicy = $tuitionPolicy;
        $this->dojo = $dojo;
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();

        $now = Carbon::now();
        $monthStart = Carbon::parse($request->date_apply, 'Asia/Ho_Chi_Minh');

        // Kiểm tra tháng bắt đầu áp dụng không được là tháng hiện tại hoặc quá khứ
        if (($now->year > $monthStart->year) || (($now->year == $monthStart->year) && ($now->month >= $monthStart->month))) {
            return redirect()->back()->with([
                'message'    => "Tháng áp dụng không được là tháng hiện tại hoặc quá khứ",
                'alert-type' => 'warning',
            ]);
        }

        $lastPolicy = $this->tuitionPolicy->where('dojo_id', $request->dojo_id)->orderBy('date_apply', 'desc')->first();
        if(!is_null($lastPolicy)) {

            // Kiểm tra tháng áp dụng với chính sách hiện tại
            $lastPolicyMonthStart = Carbon::parse($lastPolicy->date_apply, 'Asia/Ho_Chi_Minh');
            if (($lastPolicyMonthStart->year > $monthStart->year) || (($lastPolicyMonthStart->year == $monthStart->year) && ($lastPolicyMonthStart->month >= $monthStart->month))) {
                return redirect()->back()->with([
                    'message'    => "Tháng áp dụng phải sau tháng áp dụng của chính sách học phí hiện tại",
                    'alert-type' => 'warning',
                ]);
            }

            // Kiểm tra trùng lặp
            $policy = ($request->policy == 'on') ? 1 : 0;
            if(($lastPolicy->price == $request->price) && ($lastPolicy->policy == $policy)) {
                return redirect()->back()->with([
                    'message'    => "Chính sách mới trùng lặp với chính sách hiện tại",
                    'alert-type' => 'warning',
                ]);
            }

            if($lastPolicy->price == $request->price) {
                return redirect()->back()->with([
                    'message'    => "Mức học phí không thay đổi so với chính sách hiện tại",
                    'alert-type' => 'warning',
                ]);
            }
        }

        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        event(new BreadDataAdded($dataType, $data));

        $dojo = Dojo::find($data->dojo_id);
        $priceNew = $data->price;

        // Cập nhật lại học phí của các võ sinh trong cơ sở
        if(!is_null($lastPolicy)) {
            $priceOld = $lastPolicy->price;
            $students = $dojo->students()->whereStatus('STUDYING')->get();
            if ($data->policy == 0) {
                foreach ($students as $student) {
                    $change = $this->dojo->updatePrice($student->id,$data->date_apply, $priceOld, $priceNew);
                    Notification::send($student->user, new UpdatePrice($student->name, $dojo->name, $priceNew, $priceOld, $change, Carbon::parse($data->date_apply)->format('m/Y')));
                }
            } else {
                foreach ($students as $student) {
                    $change = ['Tuy nhiên, những tháng bạn đã nộp học phí trước đó sẽ được bảo lưu và áp dụng mức học phí mới bắt đầu từ lần nộp học phí tiếp theo.'];
                    Notification::send($student->user, new UpdatePrice($student->name, $data->name, $priceNew, $priceOld, $change, Carbon::parse($data->date_apply)->format('m/Y')));
                }
            }
        }

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }
}
