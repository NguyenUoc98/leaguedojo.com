<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookRoom;
use App\Models\Room;
use App\Models\Student;
use App\Notifications\ConfirmBookRoom;
use App\Notifications\Notify;
use App\Notifications\RejectBookRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BookRoomController extends Controller
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Reject attends event
     * 
     * @param $request
     * @return void 
     */
    public function reject(Request $request)
    {
        $bookRoom = BookRoom::find($request->id);
        $bookRoom->update([
            'reason_reject' => $request->reason,
            'confirmed' => 'REJECTED',
        ]);

        $room = Room::find($bookRoom->room_id);

        $data = [
            "text" => 'Phòng <b>' . $room->name . '</b> bạn book đã bị từ chối',
            "img" => '/img/core-img/notification.png',
            "icon" => '/img/core-img/icon-notify.png',
            "href" => route('rooms.index'),
            "time" => Carbon::now(),
        ];

        $student = Student::find($bookRoom->student_id);
        Notification::send($student->user, new Notify($data, 'book-room'));
        Notification::send($student->user, new RejectBookRoom($student->name, $room->name, $room->address, substr($bookRoom->start_at, 0, -3), substr($bookRoom->end_at, 0, -3), $request->reason));

        return redirect()->back()->with([
            'message'    => 'Đã từ chối',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Confirm attends event
     * 
     * @param $request
     * @return void 
     */
    public function confirm(Request $request)
    {
        $bookRoom = BookRoom::find($request->id);
        $room = Room::find($bookRoom->room_id);
        $uptimes = $room->uptimes()->where('weekdays', Carbon::parse($bookRoom->date)->dayOfWeek)->first();
        $spaceTime = $this->room->spaceTime($room->id, $bookRoom->date, $uptimes->uptimes);

        if ($this->room->checkTime(json_decode($spaceTime), substr($bookRoom->start_at, 0, -3), substr($bookRoom->end_at, 0, -3))) {
            $bookRoom->update([
                'confirmed' => 'CONFIRMED',
            ]);

            $data = [
                "text" => 'Phòng <b>' . $room->name . '</b> bạn book đã được chấp nhận',
                "img" => '/img/core-img/notification.png',
                "icon" => '/img/core-img/icon-notify.png',
                "href" => route('rooms.index'),
                "time" => Carbon::now(),
            ];

            $student = Student::find($bookRoom->student_id);
            Notification::send($student->user, new Notify($data, 'book-room'));
            Notification::send($student->user, new ConfirmBookRoom($student->name, $room->name, $room->address, substr($bookRoom->start_at, 0, -3), substr($bookRoom->end_at, 0, -3)));
        } else {
            return response()->json([
                'error' => 'Thời gian đặt phòng không hợp lệ!',
            ]);
        }
    }
}
