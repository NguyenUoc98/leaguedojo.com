<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\WorkoutRegistration;
use App\Notifications\ConfirmWorkout;
use App\Notifications\Notify;
use App\Notifications\RejectWorkout;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class WorkoutRegistrationController extends Controller
{
    protected $atworkoutRegistrationtend;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(WorkoutRegistration $workoutRegistration)
    {
        $this->workoutRegistration = $workoutRegistration;
        $this->middleware('auth');
    }
    
    /**
     * Confirm transfer dojo from student and caculate tuitions again
     * 
     * @param $request
     * @return void 
     */
    public function confirm(Request $request)
    {
        $workoutRegistration = WorkoutRegistration::find($request->id);
        $user = User::find($workoutRegistration->id);

        // Tạo đối tượng võ sinh và cập nhật MSVS
        $student = new Student();
        $student->name = $workoutRegistration->name;
        $student->phone = $workoutRegistration->phone;
        $student->cmnd = $workoutRegistration->cmnd;
        $student->birthday = $workoutRegistration->birthday;
        $student->address = $workoutRegistration->address;
        $student->work_unit = $workoutRegistration->work_unit;
        $student->type = $workoutRegistration->type;
        $student->weight = $workoutRegistration->weight;
        $student->height = $workoutRegistration->height;
        $student->sex = $workoutRegistration->sex;
        $student->link_fb = $workoutRegistration->link_fb;
        $student->dojo_id = $workoutRegistration->dojo_id;
        $student->admission_day = Carbon::now()->format('Y-m-d');
        $student->status = 'STUDYING';
        $student->save();

        $sub = $student->id % 10000;
        $year = ($student->id - $sub) / 10000;

        if($year == Carbon::now()->year) {
            $student_id = $year * 10000 + ($student->id % 10000);
        } else {
            $student_id = Carbon::now()->year * 10000 + 1;
        }

        $student->update([
            'id' => $student_id,
        ]);

        $user->update([
            'student_id' => $student_id,
        ]);

        $data = [
            "text" => 'Đăng ký tập luyện của bạn đã được chấp nhận.',
            "img" => '/img/core-img/notification.png',
            "icon" => '/img/core-img/icon-notify.png',
            "href" => '#',
            "time" => Carbon::now(),
        ];

        Notification::send($user, new Notify($data, 'workout-registration'));
        Notification::send($user, new ConfirmWorkout($workoutRegistration, $student_id));

        $workoutRegistration->update([
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
        $workoutRegistration = WorkoutRegistration::find($request->id);
        $user = User::find($workoutRegistration->id);

        $data = [
            "text" => 'Đăng ký tập luyện của bạn đã không được chấp nhận.',
            "img" => '/img/core-img/notification.png',
            "icon" => '/img/core-img/icon-notify.png',
            "href" => '#',
            "time" => Carbon::now(),
        ];

        Notification::send($user, new Notify($data, 'workout-registration'));
        Notification::send($user, new RejectWorkout($workoutRegistration, $request->reason));

        $workoutRegistration->update([
            'confirmed' => 'REJECTED',
            'reason_reject' => $request->reason,
        ]);

        return redirect()->back()->with([
            'message'    => 'Đã từ chối đơn đơn đăng ký tập luyện',
            'alert-type' => 'success',
        ]);
    }
}
