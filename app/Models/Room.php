<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use FormLayoutTrait;

    public function formFields()
    {
        return $this
            ->beginDiv('row')
            ->beginDiv('col-md-6')
            ->field('name', 12)->field('address', 12)->field('room_belongsto_dojo_relationship', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
            ->field('note', 12)
            ->endDiv()
            ->endDiv()
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'book_rooms');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uptimes()
    {
        return $this->hasMany(Uptime::class);
    }

    /**
     * Get space time of room
     * 
     * @param $roomId, $date, $uptimes
     * @return array
     */
    public function spaceTime($roomId, $date, $uptimes)
    {
        // Những khoảng thời gian đã được đặt
        $bookRooms = BookRoom::where('room_id', $roomId)->whereDate('date', $date)->whereConfirmed('CONFIRMED')->select('start_at', 'end_at')->get()->toArray();
        $uptimes = json_decode($uptimes);

        // Ghép các khoảnh thời gian lại với nhau
        $spaceTime = [];
        foreach ($uptimes as $uptime) {
            $start = $uptime[0];
            foreach ($bookRooms as $bookRoom) {
                $bookStart = substr($bookRoom['start_at'], 0, -3);
                $bookEnd = substr($bookRoom['end_at'], 0, -3);
                if ($bookStart >= $start && $bookStart < $uptime[1]) {
                    if ($bookStart > $start) {
                        array_push($spaceTime, [$start, $bookStart]);
                    }
                    $start = $bookEnd;
                }
            }

            if ($start < $uptime[1]) {
                array_push($spaceTime, [$start, $uptime[1]]);
            }
        }

        return json_encode($spaceTime);
    }

    /**
     * Check time user want to book room in space time
     * 
     * @param $start, $end
     * @param array $spaceTime
     * @return bool
     */
    public function checkTime(array $spaceTime, $start, $end)
    {
        if(empty($spaceTime)) {
            return false;
        }

        // Nếu cả 2 đều null return true
        if(is_null($start) && is_null($end)) {
            return true;
        }

        // Nếu chỉ quan tâm lúc trả phòng
        if(is_null($start) && !is_null($end)) {
            foreach($spaceTime as $time) {
                if($end < $time[1]) {
                    return true;
                }
            }
            return false;
        }

        // Nếu chỉ quan tâm lúc nhận phòng
        if(!is_null($start) && is_null($end)) {
            foreach($spaceTime as $time) {
                if($start >= $time[0]) {
                    return true;
                }
            }
            return false;
        }

        // Có cả 2
        foreach($spaceTime as $time) {
            if($start >= $time[0] && $start < $time[1] && $end > $time[0] && $end <= $time[1]) {
                return true;
            }
        }
        return false;
    }
}
