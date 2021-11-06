<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dojo;
use App\Models\Student;
use App\Models\TransferDojo;
use App\Notifications\ConfirmTransferDojo;
use App\Notifications\Notify;
use App\Notifications\RejectTransferDojo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TransferDojoController extends Controller
{
    protected $transferDojo;
    protected $dojo;

    /**
     * Create a new controller instance.
     *
     * @param  $transferDojo
     * @return void
     */
    public function __construct(TransferDojo $transferDojo, Dojo $dojo)
    {
        $this->transferDojo = $transferDojo;
        $this->dojo = $dojo;
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    /**
     * Confirm transfer dojo from student and caculate tuitions again
     * 
     * @param $request
     * @return void 
     */
    public function confirm(Request $request)
    {
        $transferDojo = TransferDojo::find($request->id);
        $student = Student::find($transferDojo->student_id);
        $currentDojo = $this->dojo->find($transferDojo->current_dojo_id);
        $newDojo = $this->dojo->find($transferDojo->new_dojo_id);

        $change = $this->dojo->updatePriceWhenChangDojo($student->id, $transferDojo->date_transfer, $currentDojo, $newDojo);

        $data = [
            "text" => 'Đăng ký chuyển cơ sở tập luyện từ <b>' . $currentDojo->name . '</b> sang <b>' . $newDojo->name . '</b> đã được chấp nhận.',
            "img" => '/img/core-img/notification.png',
            "icon" => '/img/core-img/icon-notify.png',
            "href" => '#',
            "time" => Carbon::now(),
        ];

        Notification::send($student->user, new Notify($data, 'transfer-dojo'));
        Notification::send($student->user, new ConfirmTransferDojo($student->name, $currentDojo->name, $newDojo->name, $change, Carbon::parse($transferDojo->date_transfer)->format('m/Y')));

        // Chuyển dojo_id trong bảng students
        $student->update([
            'dojo_id' => $transferDojo->new_dojo_id,
        ]);

        $transferDojo->update([
            'confirmed' => 'CONFIRMED',
        ]);
    }

    /**
     * Reject transfer dojo from student and caculate tuitions again
     * 
     * @param $request
     * @return void 
     */
    public function reject(Request $request)
    {
        $transferDojo = TransferDojo::find($request->id);
        $student = Student::find($transferDojo->student_id);
        $currentDojo = $this->dojo->find($transferDojo->current_dojo_id);
        $newDojo = $this->dojo->find($transferDojo->new_dojo_id);

        $data = [
            "text" => 'Đăng ký chuyển cơ sở tập luyện từ <b>' . $currentDojo->name . '</b> sang <b>' . $newDojo->name . '</b> đã không được chấp nhận.',
            "img" => '/img/core-img/notification.png',
            "icon" => '/img/core-img/icon-notify.png',
            "href" => '#',
            "time" => Carbon::now(),
        ];

        Notification::send($student->user, new Notify($data, 'transfer-dojo'));
        Notification::send($student->user, new RejectTransferDojo($student->name, $currentDojo->name, $newDojo->name, $request->reason));

        $transferDojo->update([
            'confirmed' => 'REJECTED',
            'reason_reject' => $request->reason,
        ]);

        return redirect()->back()->with([
            'message'    => 'Đã từ chối đơn xin chuyển cơ sở',
            'alert-type' => 'success',
        ]);
    }
}
