<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class TransferDojo extends Model
{
    use FormLayoutTrait;

    protected $fillable = [
        'confirmed',
        'reason_reject'
    ];


    public function formFields()
    {
        return $this
            ->beginDiv('row')
            ->beginDiv('col-md-6')
            ->field('transfer_dojo_belongsto_student_relationship', 12)
            ->field('transfer_dojo_belongsto_dojo_relationship', 12)
            ->field('transfer_dojo_belongsto_dojo_relationship_1', 12)
            ->field('date_transfer', 6)->field('confirmed', 6)
            ->endDiv()
            ->beginDiv('col-md-6')
            ->field('reason', 12)
            ->field('reason_reject', 12)
            ->endDiv()
            ->endDiv()
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentDojo()
    {
        return $this->belongsTo(Dojo::class, 'current_dojo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newDojo()
    {
        return $this->belongsTo(Dojo::class, 'new_dojo_id');
    }
}
