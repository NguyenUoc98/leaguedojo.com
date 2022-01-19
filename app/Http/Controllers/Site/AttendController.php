<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attend;
use App\Models\Event;
use App\Notifications\EventRegistration;
use App\Notifications\Notify;
use App\User;
use Carbon\Carbon;
use Exception;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

/**
 * @group Điểm rèn luyện
 *
 * Quản lý sự kiện
 */
class AttendController extends Controller
{
    protected $attend;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Attend $attend)
    {
        $this->attend = $attend;
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Hiển thị trang danh sách các đăng ký xác nhận sự kiện.
     *
     * @authenticated
     * @response 404 {
     *  "message": "Page not found"
     * }
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Hiển thị trang đăng ký xác nhận sự kiện.
     *
     * @authenticated
     * @urlParam id required Id của sự kiện. Example: 1
     * @response 200
     * @response 403 {
     *  "message": "Forbidden"
     * }
     */
    public function create(Request $request)
    {
        if (Auth::user()->isStudent()) {
            $event = Event::findOrFail($request->id);

            // SEO
            $meta_desc     = 'Đăng ký xác nhận sự kiện đã tham gia để tích lũy điểm rèn luyện';
            $meta_keywords = 'xác nhận sự kiện, tích lũy điểm rèn luyện, đăng ký';
            $url_canonical = route('attends.create');
            $image_og      = Voyager::image($event->image);
            $meta_title    = 'Đăng ký xác nhận sự kiện ' . $event->name;
            // SEO

            return view('attends.add',
                compact('event', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }

    /**
     * Lưu thông tin đăng ký xác nhận sự kiện.
     *
     * @authenticated
     * @bodyParam image file Ảnh võ sinh tải lên.
     * @bodyParam event_id required Id của sự kiện. Example: 1
     * @bodyParam note string Ghi chú.
     * @response 200 {
     *  "message": "Đăng ký thành công"
     * }
     * @response {
     *  "message": "Bạn đã đăng ký sự kiện này rồi"
     * }
     * @response 403 {
     *  "message": "Forbidden"
     * }
     */
    public function store(Request $request)
    {
        if (Auth::user()->isStudent()) {
            $image = [];
            // Save Image
            if ($request->has('image') && !empty($request->image)) {
                $datas = $request->image;

                foreach ($datas as $index => $data) {
                    $imageName = time() . $index . '.png';
                    $path      = 'attends/' . Carbon::now('Asia/Ho_Chi_Minh')->format('FY');
                    $realPath  = public_path() . '/storage/' . $path;
                    File::isDirectory($realPath) or File::makeDirectory($realPath);
                    $img = Image::make($data->getRealPath());
                    $img = $img->resize(700, $img->height() * 700 / $img->width())->save($realPath . '/' . $imageName);
                    array_push($image, $path . '/' . $imageName);
                }
            }

            try {
                $attend             = new Attend();
                $attend->student_id = Auth::user()->student->id;
                $attend->event_id   = $request->event_id;
                $attend->note       = $request->note;
                $attend->image      = json_encode($image);
                $attend->save();

                $event = Event::find($attend->event_id);

                $data = [
                    "text" => 'Có một đăng ký xác nhận sự kiện mới từ <b>' . Auth::user()->student->name . '</b>.',
                    "img"  => Voyager::image($event->image),
                    "icon" => '/img/core-img/icon-event.png',
                    "href" => route('voyager.attends.show', $attend->id),
                    "time" => Carbon::now(),
                ];
                $role = Role::whereIn('name', ['admin', 'manager', 'monitor'])->select('id')->get();
                $user = User::whereIn('role_id', $role)->get();
                Notification::send($user, new Notify($data, 'transfer-dojo'));
                // Notification::send($user, new EventRegistration($attend));

                return redirect()->route('events.index')->with([
                    'status'  => 'Thành công',
                    'message' => 'Đăng ký thành công',
                    'type'    => 'success',
                    'color'   => '#4caf50',
                ]);
            } catch (Exception $e) {
                // Xóa ảnh đã lưu
                foreach ($image as $img) {
                    File::delete(public_path('/storage/' . $img));
                }

                $message = $e->getMessage();
                if (strpos($message, 'Duplicate entry') !== false) {
                    $message = 'Bạn đã đăng ký sự kiện này rồi';
                }

                return redirect()->route('events.index')->with([
                    'status'  => 'Lỗi',
                    'message' => $message,
                    'type'    => 'error',
                    'color'   => '#ed3939',
                ]);
            }
        } else {
            abort(403);
        }
    }
}
