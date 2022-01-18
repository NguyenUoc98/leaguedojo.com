<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    use FormLayoutTrait;

    protected $fillable = [
        'student_id',
        'cashier',
        'month',
        'month_start',
        'month_end',
        'total_price',
        'total',
        'amount',
        'excess_cash',
        'refunds',
        'note',
        'type',
        'trans_id',
        'status',
    ];

    // cashier: người thu
    // student_id: MSVS
    // month: số tháng nộp
    // month_start: tháng bắt đầu
    // month_end: tháng kết thúc
    // total_price: tổng học phí
    // total: cần nộp
    // amount: khách đưa
    // excess_cash: tiền dư
    // refunds: trả lại
    // note: ghi chú
    // type: nộp online/offline
    // trans_id: mã giao dịch
    // status: trạng thái FAIL/SUCCESS

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function formFields()
    {
        return $this
            ->beginDiv('row')
            ->beginDiv('col-md-6')
            ->field('month_start', 6)->field('month_end', 6)
            ->field('total', 6)->field('amount', 6)
            ->field('excess_cash', 6)->field('refunds', 6)
            ->field('cashier', 12)
            ->field('total_price', 12)->field('status', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
            ->field('note', 12)
            ->endDiv()
            ->endDiv()
            ->get();
    }


}
