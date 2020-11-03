<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    use FormLayoutTrait;

    public function formFields()
    {
        return $this
            ->beginDiv('row')
                ->beginDiv('col-md-6')
                    ->field('book_room_belongsto_room_relationship', 12)
                    ->field('book_room_belongsto_student_relationship', 12)
                    ->field('start_at', 6)
                    ->field('end_at', 6)
                    ->field('date', 6)
                    ->field('confirmed', 6)
                ->endDiv()
                ->beginDiv('col-md-6')
                    ->field('note', 12)
                    ->field('reason_reject', 12)
                ->endDiv()
            ->endDiv()
            ->get();
    }

    protected $fillable = [
        'room_id', 'student_id', 'date', 'start_at', 'end_at', 'note', 'reason_reject','confirmed',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
