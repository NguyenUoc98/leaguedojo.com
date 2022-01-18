<?php

namespace App\Http\Controllers\Admin;

use App\Models\BonusDefault;
use App\Models\Dojo;
use App\Models\Student;
use App\Models\StudentVoucher;
use App\Models\Tuition;
use App\Models\Voucher;
use App\Notifications\PayTuition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class TuitionController extends VoyagerBaseController
{
    protected $tuition;

    /**
     * Create a new controller instance.
     *
     * @param  $tuition
     * @return void
     */
    public function __construct(Tuition $tuition)
    {
        $this->tuition = $tuition;
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        $multi_select = [];

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
            ? $data->prepareTranslations($request)
            : [];

        foreach ($rows as $row) {
            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                // if the field is a belongsToMany relationship, don't remove it
                // if no content is provided, that means the relationships need to be removed
                if (isset($row->details->type) && $row->details->type !== 'belongsToMany') {
                    continue;
                }
            }

            // Value is saved from $row->details->column row
            if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row, $row->details);

            if ($row->type == 'month') {
                $content .= '-01';
            }

            if ($row->type == 'relationship' && $row->details->type != 'belongsToMany') {
                $row->field = @$row->details->column;
            }

            /*
             * merge ex_images and upload images
             */
            if ($row->type == 'multiple_images' && !is_null($content)) {
                if (isset($data->{$row->field})) {
                    $ex_files = json_decode($data->{$row->field}, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($content)));
                    }
                }
            }

            if (is_null($content)) {

                // If the image upload is null and it has a current image keep the current image
                if ($row->type == 'image' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                    if (!$content) {
                        $content = json_encode([]);
                    }
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }

                if ($row->type == 'month') {
                    $content .= '-01';
                }
            }

            if ($row->type == 'relationship' && $row->details->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = ['model'   => $row->details->model,
                                   'content' => $content,
                                   'table'   => $row->details->pivot_table
                ];
            } else {
                $data->{$row->field} = $content;
            }
        }

        if (isset($data->additional_attributes)) {
            foreach ($data->additional_attributes as $attr) {
                if ($request->has($attr)) {
                    $data->{$attr} = $request->{$attr};
                }
            }
        }

        $notes      = explode("=================================", $data->note);
        $data->note = $notes[0] . 'Trả lại:                            ' . $data->refunds . 'VNĐ' . "\r\n=================================" . $notes[1];

        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }

        foreach ($multi_select as $sync_data) {
            $data->belongsToMany($sync_data['model'], $sync_data['table'])->sync($sync_data['content']);
        }

        // Rename folders for newly created data through media-picker
        if ($request->session()->has($slug . '_path') || $request->session()->has($slug . '_uuid')) {
            $old_path    = $request->session()->get($slug . '_path');
            $uuid        = $request->session()->get($slug . '_uuid');
            $new_path    = str_replace($uuid, $data->getKey(), $old_path);
            $folder_path = substr($old_path, 0, strpos($old_path, $uuid)) . $uuid;

            $rows->where('type', 'media_picker')->each(function ($row) use ($data, $uuid) {
                $data->{$row->field} = str_replace($uuid, $data->getKey(), $data->{$row->field});
            });
            $data->save();
            if ($old_path != $new_path && !Storage::disk(config('voyager.storage.disk'))->exists($new_path)) {
                $request->session()->forget([$slug . '_path', $slug . '_uuid']);
                Storage::disk(config('voyager.storage.disk'))->move($old_path, $new_path);
                Storage::disk(config('voyager.storage.disk'))->deleteDirectory($folder_path);
            }
        }

        return $data;
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

        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        event(new BreadDataAdded($dataType, $data));

        // Cập nhật trạng thái các mã giảm giá sử dụng
        if ($data->status == 'SUCCESS' && isset($request->vouchers)) {
            $vouchers = StudentVoucher::where('student_id', $request->student_id)->whereIn('voucher_id',
                $request->vouchers)->get();
            foreach ($vouchers as $voucher) {
                $bonus = $data->total_price * $voucher->voucher->percent / 100;
                $bonus = ($bonus <= $voucher->voucher->max_price) ? $bonus : $voucher->voucher->max_price;

                $voucher->update([
                    'used'            => 1,
                    'money_reduction' => $bonus
                ]);
            }
        }

        $user = Student::find($request->student_id)->user;
        Notification::send($user, new PayTuition($data, $user->student->name));

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

    /**
     * Check history tuition and get bonus default
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function checkHistory(Request $request)
    {
        $student_id = $request->student_id;
        $month      = $request->month;
        $student    = Student::find($student_id);
        $total      = 0;

        // Check the first pay tuition?
        $last_tuition = $this->tuition->where('student_id', $student_id)->where('status',
            'SUCCESS')->orderBy('created_at', 'desc')->first();

        // Nếu không có lịch sử nộp học phí thì $first = 1
        $first = is_null($last_tuition) ? 1 : 0;
        if ($first == 1) {
            $month_start = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m');
            $month_end   = Carbon::now('Asia/Ho_Chi_Minh')->addMonth($month - 1)->format('Y-m');
            $noteExcess  = "";
        } else {
            $month_start = Carbon::parse($last_tuition->month_end, 'Asia/Ho_Chi_Minh')->addMonth()->format('Y-m');
            $month_end   = Carbon::parse($last_tuition->month_end, 'Asia/Ho_Chi_Minh')->addMonth($month)->format('Y-m');

            // Tiền dư của đợt trước
            $total      -= ($last_tuition->excess_cash - $last_tuition->refunds);
            $noteExcess = 'Tiền dư đợt trước:        -' . number_format($last_tuition->excess_cash - $last_tuition->refunds,
                    0, '', '.') . 'VNĐ';
        }

        $indexMonth = $month_start;
        $notePrice  = [];
        $totalPrice = 0;
        while ($indexMonth <= $month_end) {
            // Tìm chuyển cơ sở đã được chấp nhận gần nhất
            $transferDojo = $student->transferDojos()->where('confirmed', 'CONFIRMED')->where('date_transfer', '>',
                $indexMonth . '-01')->first();
            $dojo         = $transferDojo->currentDojo ?? $student->dojo;

            $policy = $dojo->tuitionPolicys()->where('date_apply', '<=', $indexMonth . '-01')->first();
            array_push($notePrice,
                date_create($indexMonth)->format('m/Y') . ': ' . number_format($policy->price, 0, '', '.') . 'VNĐ');
            $indexMonth = Carbon::parse($indexMonth, 'Asia/Ho_Chi_Minh')->addMonth()->format('Y-m');
            $totalPrice += $policy->price;
        }

        $total += $totalPrice;

        // Find bonus default with student finded
        $bonus_defaults = BonusDefault::where([
            ['role_id', '>=', $student->user->role_id],
            ['dojo_id', $student->dojo_id],
            ['month_count', "<=", $month],
            ['kuy', 'LIKE', '%"' . $student->kuy . '"%'],
            ['first', $first]
        ])->orderBy('level', 'desc');

        if (setting('app.bonus_default') == 0) {
            $bonus_defaults = $bonus_defaults->limit(1)->get();
        } else {
            $bonus_defaults = $bonus_defaults->get();
        }

        // If not find any bonus default
        $note1 = [];
        foreach ($notePrice as $index => $note) {
            if ($index == 0) {
                array_push($note1, 'Học phí:                         ' . $note);
            } else {
                array_push($note1, '                                        ' . $note);
            }
        }

        array_push($note1, 'Tổng học phí:                ' . number_format($totalPrice, 0, '', '.') . 'VNĐ');
        array_push($note1, $noteExcess);
        $note3 = [
            '================================='
        ];

        if (!is_null($bonus_defaults)) {
            foreach ($bonus_defaults as $bonus_default) {
                $bonus = ($totalPrice * $bonus_default->percent / 100 <= $bonus_default->max_price) ? $totalPrice * $bonus_default->percent / 100 : $bonus_default->max_price;
                $total -= $bonus;
                array_push($note1, 'Ưu đãi mặc định:        -' . number_format($bonus, 0, '',
                        '.') . 'VNĐ(' . $bonus_default->percent . '%)');
                array_push($note3, $bonus_default->note);
            }
        } else {
            $bonus = 0;
        }

        $note2 = [
            'Tổng:                               ' . number_format($total, 0, '', '.') . 'VNĐ',
        ];


        return [
            "month_start"   => $month_start,
            "month_end"     => $month_end,
            "note1"         => $note1,
            "note2"         => $note2,
            "note3"         => $note3,
            "total"         => $total,
            "dojo_id"       => $student->dojo_id,
            "bonus_default" => $bonus_defaults,
            'totalPrice'    => $totalPrice,
        ];
    }

    /**
     * Check vouchers and apply it
     *
     * @param $request
     */
    public function applyVoucher(Request $request)
    {
        $vouchers = Voucher::find($request->vouchers_id);
        $total    = $request->total;
        $type     = $vouchers[0]->type;
        foreach ($vouchers as $index => $voucher) {

            // Kiểm tra mỗi loại chỉ được dùng 1 mã giảm giá
            if ($index != 0 && $voucher->type == $type) {
                return [
                    "check"   => false,
                    "message" => "Mỗi loại chỉ được dùng 1 mã giảm giá",
                ];
            }
        }

        $voucherNote1 = [];
        $voucherNote2 = [];
        foreach ($vouchers as $voucher) {

            // Kiểm tra hạn sử dụng
            $expiryDate = Carbon::parse($voucher->expiry_date);
            if ($expiryDate->isFuture() || $expiryDate->isToday()) {
                $dojo = Dojo::find($request->dojo_id);

                // Kiểm tra mã giảm giá có áp dụng tại cơ sở của võ sinh không
                if (!is_null($voucher->dojos()->wherePivot('dojo_id', $request->dojo_id)->first())) {

                    // Kiểm tra số tháng tối thiểu áp dụng
                    if ($request->month >= $voucher->month_limit) {
                        $bonus = $request->totalPrice * $voucher->percent / 100;
                        $bonus = ($bonus <= $voucher->max_price) ? $bonus : $voucher->max_price;
                        $total -= $bonus;
                        array_push($voucherNote1, 'Mã giảm giá:                -' . number_format($bonus, 0, '',
                                '.') . 'VNĐ(' . $voucher->percent . '%) [' . $voucher->code . ']');
                        array_push($voucherNote2, $voucher->note);
                    } else {
                        return [
                            "check"   => false,
                            "message" => "Mã " . $voucher->code . " chỉ áp dụng khi nộp tối thiểu " . $voucher->month_limit . " tháng",
                        ];
                    }
                } else {
                    return [
                        "check"   => false,
                        "message" => "Mã " . $voucher->code . " không được áp dụng tại cơ sở " . $dojo->name,
                    ];
                }
            } else {
                return [
                    "check"   => false,
                    "message" => "Mã " . $voucher->code . " đã hết hạn sử dụng từ ngày " . Carbon::parse($voucher->expiry_date,
                            'Asia/Ho_Chi_Minh')->addDay()->format('d/m/Y'),
                ];
            }
        }

        array_push($voucherNote1, 'Tổng:                              ' . number_format($total, 0, '', '.') . 'VNĐ');

        return [
            "check"        => true,
            "voucherNote1" => $voucherNote1,
            "voucherNote2" => $voucherNote2,
            "total"        => $total,
            "vouchers"     => $vouchers,
            "totalPrice"   => $request->totalPrice,
        ];
    }
}
