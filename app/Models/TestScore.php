<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    use FormLayoutTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_day',
        'student_id',
        'kihon',
        'kata',
        'kumite',
        'physical',
        'total'
    ];

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
            ->beginDiv('row col-md-12')
            ->field('test_day', 3)->field('student_id', 2)
            ->endDiv()
            ->field('kihon', 2)->field('kata', 2)->field('kumite', 2)->field('physical', 2)->field('total',
                2)->field('valedictorian', 2)->get();
    }
}
