<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentVoucher extends Model
{
    protected  $table = 'student_voucher';

    protected $fillable = ['student_id', 'voucher_id', 'used', 'money_reduction'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
