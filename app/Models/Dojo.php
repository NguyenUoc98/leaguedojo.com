<?php

namespace App\Models;

use App\Models\Student;
use App\Traits\FormLayoutTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Dojo extends Model
{
    use FormLayoutTrait;
    use Resizable;

    public function formFields()
    {
        return $this->field('logo', 6)->field('image', 6)
            ->field('name', 4)->field('start_at', 3)->field('finish_at', 3)
            ->field('slug', 4)->field('price', 3)->field('address', 5)
            ->field('coach', 6)->field('schedule', 6)
            ->field('description', 12)
            ->field('dojo_hasmany_student_relationship', 12)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tuitionPolicys()
    {
        return $this->hasMany(TuitionPolicy::class)->orderBy('date_apply', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }

    /**
     * Update tuition when the price of dojo change
     *
     * @param $student_id , $priceOld, $priceNew
     */
    public function updatePrice($student_id, $monthApply, $priceOld, $priceNew)
    {
        // Check the first pay tuition?
        $lastTuition = Tuition::where('student_id', $student_id)->orderBy('created_at', 'desc')->first();

        if (!is_null($lastTuition)) {
            $monthApply = Carbon::parse($monthApply, 'Asia/Ho_Chi_Minh');
            $monthEnd   = Carbon::parse($lastTuition->month_end, 'Asia/Ho_Chi_Minh');

            if (($monthEnd->year > $monthApply->year) || (($monthEnd->year == $monthApply->year) && $monthEnd->month >= $monthApply->month)) {

                if ($monthEnd->year == $monthApply->year) {
                    $subMonth = $monthEnd->month - $monthApply->month + 1;
                } else {
                    $subMonth = $monthApply->diffInMonths($monthEnd) + 1;
                }

                // Số dư hiện tại
                $excess_cash = $lastTuition->excess_cash - $lastTuition->refunds;

                $change = [
                    'Học phí của bạn sẽ được thay đổi như sau:',
                    'Mức học phí cũ được giữ đến hết tháng ' . $monthApply->subMonth()->format('m/Y') . ' và sẽ bắt đầu áp dụng mức học phí mới từ tháng ' . $monthApply->addMonth()->format('m/Y'),
                    'Số tháng tính lại học phí: ' . $subMonth . ' tháng',
                    'Số tiền còn dư của bạn trong đợt nộp học phí trước là: ' . number_format($excess_cash, 0, '',
                        '.') . 'VNĐ',
                    'Do đó, số tiền còn dư của bạn sẽ được tính lại như sau:',
                    'Số dư = ' . number_format($excess_cash, 0, '',
                        '.') . ' + ' . $subMonth . ' x ' . '(' . number_format($priceOld, 0, '',
                        '.') . ' - ' . number_format($priceNew, 0, '',
                        '.') . ') = ' . number_format($excess_cash + $subMonth * ($priceOld - $priceNew), 0, '',
                        '.') . 'VNĐ',
                ];

                $lastTuition->update([
                    'excess_cash' => $excess_cash + $subMonth * ($priceOld - $priceNew),
                    'refunds'     => 0,
                    'note'        => $lastTuition->note . '. Cập nhật học phí ' . $subMonth . ' tháng, tính vào số dư ' . number_format($subMonth * ($priceOld - $priceNew),
                            0, '', '.') . 'VNĐ do cơ sở bạn thay dổi chính sách học phí',
                ]);

                return $change;
            }
        }

        return null;
    }

    /**
     * Update tuition when the price when change dojo
     *
     * @param $student_id , $priceOld, $currentDojo, $newDojo
     */
    public function updatePriceWhenChangDojo($student_id, $monthApply, $currentDojo, $newDojo)
    {
        // Check the first pay tuition?
        $lastTuition = Tuition::where('student_id', $student_id)->orderBy('created_at', 'desc')->first();

        if (!is_null($lastTuition)) {
            $monthApply = Carbon::parse($monthApply, 'Asia/Ho_Chi_Minh');
            $monthEnd   = Carbon::parse($lastTuition->month_end, 'Asia/Ho_Chi_Minh');

            if (($monthEnd->year > $monthApply->year) || (($monthEnd->year == $monthApply->year) && $monthEnd->month >= $monthApply->month)) {

                if ($monthEnd->year == $monthApply->year) {
                    $subMonth = $monthEnd->month - $monthApply->month + 1;
                } else {
                    $subMonth = $monthEnd->diffInMonths($monthApply) + 1;
                }

                if ($subMonth == 0) {
                    $change = null;
                } else {
                    // Số dư hiện tại
                    $excess_cash = $lastTuition->excess_cash - $lastTuition->refunds;

                    $change = [
                        'Học phí của bạn sẽ được thay đổi như sau:',
                        'Mức học phí cũ được giữ đến hết tháng ' . $monthApply->subMonth()->format('m/Y') . ' và sẽ bắt đầu áp dụng mức học phí mới từ tháng ' . $monthApply->addMonth()->format('m/Y'),
                        'Số tháng tính lại học phí: ' . $subMonth . ' tháng',
                        'Số tiền còn dư của bạn trong đợt nộp học phí trước là: ' . number_format($excess_cash, 0, '',
                            '.') . 'VNĐ',
                        'Số tiền còn dư của bạn sẽ được tính lại như sau:',
                    ];

                    $indexMonth = $monthApply;
                    $subExcess  = 0;

                    while ($indexMonth <= $monthEnd) {
                        $policyOld = $currentDojo->tuitionPolicys()->where('date_apply', '<=',
                            $indexMonth . '-01')->first();
                        $policyNew = $newDojo->tuitionPolicys()->where('date_apply', '<=',
                            $indexMonth . '-01')->first();
                        array_push($change, 'Tháng ' . Carbon::parse($indexMonth,
                                'Asia/Ho_Chi_Minh')->format('m/Y') . ': ' . number_format($policyOld->price, 0, '',
                                '.') . 'VNĐ' . '=>' . number_format($policyNew->price, 0, '', '.') . 'VNĐ');
                        $indexMonth = Carbon::parse($indexMonth, 'Asia/Ho_Chi_Minh')->addMonth()->format('Y-m');
                        $subExcess  += ($policyOld->price - $policyNew->price);
                    }

                    array_push($change,
                        'Tổng chênh lệch học phí dược tính vào số dư: ' . number_format($subExcess, 0, '',
                            '.') . 'VNĐ');
                    array_push($change,
                        'Số dư hiện tại: ' . number_format($excess_cash + $subExcess, 0, '', '.') . 'VNĐ');

                    $lastTuition->update([
                        'excess_cash' => $excess_cash + $subExcess,
                        'refunds'     => 0,
                        'note'        => $lastTuition->note . '. Cập nhật học phí ' . $subMonth . ' tháng, chênh lệch học phí dược tính vào số dư ' . number_format($subExcess,
                                0, '', '.') . 'VNĐ do bạn chuyển cơ sở tập luyện',
                    ]);
                }
                return $change;
            }
        }

        return null;
    }
}
