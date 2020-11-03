<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dojo;
use App\Models\TransferDojo;
use App\Notifications\Notify;
use App\Notifications\TransferDojoRegistration;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->isStudent() && Auth::user()->student->status == 'STUDYING') {

            // SEO
            $meta_desc = 'Trang đăng ký xin chuyển cơ sở tập luyện';
            $meta_keywords = 'đăng ký, chuyển cơ sở';
            $url_canonical = route('transfer-dojos.create');
            $image_og = '';
            $meta_title = 'Đăng ký chuyển cơ sở';
            // SEO

            return view('transfer-dojos.add', compact('meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $date_transfer = Carbon::parse($request->date_transfer, 'Asia/Ho_Chi_Minh');
        if (($now->year > $date_transfer->year) || (($now->year == $date_transfer->year) && ($now->month >= $date_transfer->month))) {
            return redirect()->back()->with([
                'message' => 'Tháng chuyển đến cơ sở mới phải bắt đầu từ tháng sau',
                'type' => 'error',
                'color' => '#ed3939',
            ]);
        }
        try {
            $transferDojo = new TransferDojo();
            $transferDojo->student_id = Auth::user()->student->id;
            $transferDojo->current_dojo_id = Auth::user()->student->dojo_id;
            $transferDojo->new_dojo_id = $request->new_dojo;
            $transferDojo->date_transfer = $request->date_transfer . '-01';
            $transferDojo->reason = $request->reason;
            $transferDojo->save();
            $data = [
                "text" => 'Bạn nhận được 1 đơn xin chuyển cơ sở tập luyện từ <b>' . Auth::user()->student->name . '</b>.',
                "img" => Voyager::image(Auth::user()->avatar),
                "icon" => '/img/core-img/icon-notify.png',
                "href" => route('voyager.transfer-dojos.show', $transferDojo->id),
                "time" => Carbon::now(),
            ];

            $role = Role::whereIn('name', ['admin', 'manager'])->select('id')->get();
            $user = User::whereIn('role_id', $role)->get();

            Notification::send($user, new Notify($data, 'transfer-dojo'));
            Notification::send($user, new TransferDojoRegistration($transferDojo));

            return redirect()->back()->with([
                'message' => 'Đăng ký thành công',
                'type' => 'success',
                'color' => '#4caf50',
            ]);
        } catch (Exception $e) {
            $message = $e->getMessage();

            return redirect()->back()->with([
                'status' => 'Lỗi',
                'message' => $message,
                'type' => 'error',
                'color' => '#ed3939',
            ]);
        }
    }
}
