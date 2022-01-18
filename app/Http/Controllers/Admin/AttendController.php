<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attend;
use App\Models\Event;
use App\Models\Student;
use App\Notifications\Notify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Facades\Voyager;

class AttendController extends Controller
{
    /**
     * Reject attends event
     *
     * @param $request
     * @return void
     */
    public function reject(Request $request)
    {
        $attend = Attend::find($request->id);
        $attend->update([
            'confirmed'     => 'REJECTED',
            'reason_reject' => $request->reason,
        ]);

        $event = Event::find($attend->event_id);

        $data = [
            "text" => 'Sự kiện <b>' . $event->name .'</b> đã bị từ chối. Lý do: ' . $request->reason,
            "img" => Voyager::image($event->image),
            "icon" => '/img/core-img/icon-notify.png',
            "href" => route('events.index', ['active_tab' => 'signed']),
            "time" => Carbon::now(),
        ];

        $user = Student::find($attend->student_id)->user;
        Notification::send($user, new Notify($data, 'reject'));

        return redirect()->back()->with([
            'message'    => 'Đã từ chối xác nhận sự kiện',
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
        $attend = Attend::find($request->id);

        $attend->update([
            'confirmed' => 'CONFIRMED',
        ]);

        $event = Event::find($attend->event_id);

        $data = [
            "text" => 'Sự kiện <b>' . $event->name . '</b> đã được xác nhận',
            "icon" => '/img/core-img/icon-notify.png',
            "img"  => Voyager::image($event->image),
            "href" => route('events.index', ['active_tab' => 'signed']),
            "time" => Carbon::now(),
        ];

        $user = Student::find($attend->student_id)->user;
        Notification::send($user, new Notify($data, 'confirm'));
    }
}
