<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\WorkoutRegistration;
use App\Notifications\Notify;
use App\Notifications\WorkoutRegistration as NotificationsWorkoutRegistration;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dojo_id = $request->has('dojo_id') ? $request->dojo_id : 0;

        // SEO
        $meta_desc = 'Trang đăng ký tập luyện cho người mới muốn tham gia tập luyện karate';
        $meta_keywords = 'đăng ký tập luyện, karate, hà nội';
        $url_canonical = route('workout-registrations.create');
        $image_og = config('app')['url'] . '/img/home/introduce/i8.jpg';
        $meta_title = 'Đăng ký tập luyện';
        // SEO

        return view('workout-registrations.add', compact('dojo_id', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->isStudent()) {
            return redirect()->back()->with([
                'status' => 'Thông báo',
                'message' => 'Đang tập luyện rồi mà. Hãy đăng ký chuyển cơ sở nhé!',
                'type' => 'info',
                'color' => '#00bcd4',
            ]);
        } else {
            $workoutRegistration = $request->all();

            $workoutRegistration['birthday'] = Carbon::createFromFormat('d-m-Y', $workoutRegistration['birthday'])->format('Y-m-d');
            $workoutRegistration['id'] = Auth::user()->id;
            try {
                $workoutRegistration = WorkoutRegistration::create($workoutRegistration);
                $data = [
                    "text" => 'Bạn nhận được 1 đăng ký tập luyện mới từ <b>' . $workoutRegistration->name . '</b>.',
                    "img" => '/img/core-img/notification.png',
                    "icon" => '/img/core-img/icon-notify.png',
                    "href" => route('voyager.workout-registrations.show', $workoutRegistration->id),
                    "time" => Carbon::now(),
                ];
    
                $role = Role::whereIn('name', ['admin', 'manager', 'monitor'])->select('id')->get();
                $user = User::whereIn('role_id', $role)->get();
    
                Notification::send($user, new Notify($data, 'workout-registrations'));
                Notification::send($user, new NotificationsWorkoutRegistration($workoutRegistration));
                return redirect()->back()->with([
                    'status' => 'Thành công',
                    'message' => 'Đăng ký thành công',
                    'type' => 'success',
                    'color' => '#4caf50',
                ]);
            } catch (Exception $e) {

                $message = $e->getMessage();
                if (strpos($message, 'Duplicate entry') !== false) {
                    $message = 'Bạn đã gửi đăng ký tập rồi mà, chờ quản lý xác nhận nhé!';
                } else {
                    $message = 'Đăng ký không thành công';
                }

                return redirect()->back()->with([
                    'status' => 'Lỗi',
                    'message' => $message,
                    'type' => 'error',
                    'color' => '#ed3939',
                ]);
            }
        }
    }
}
