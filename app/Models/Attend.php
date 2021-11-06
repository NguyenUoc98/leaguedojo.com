<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormLayoutTrait;


class Attend extends Model
{
    use FormLayoutTrait;

    protected $fillable = [
        'confirmed', 'reason_reject',
    ];

    public static $methodColors = [
        'CONFIRMED'    => 'green',
        'WAIT'   => 'yellow',
        'REJECTED' => 'red',
    ];

    public static $methodTexts = [
        'CONFIRMED'    => 'Đã xác nhận',
        'WAIT'   => 'Chờ xác nhận',
        'REJECTED' => 'Bị từ chối',
    ];

    public function formFields()
    {
        return $this
        ->beginDiv('row')
            ->beginDiv('col-md-6')
                ->field('attend_belongsto_student_relationship', 12)
                ->field('attend_belongsto_event_relationship', 12)
                ->field('confirmed', 12)
                ->field('reason_reject', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
                ->field('image', 12)
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
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
