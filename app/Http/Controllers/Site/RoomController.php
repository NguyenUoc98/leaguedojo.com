<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BookRoom;
use App\Models\Room;
use App\Notifications\BookRoomRegistration;
use App\Notifications\Notify;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

class RoomController extends Controller
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
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
        if (Auth::user()->isStudent()) {
            $student = Auth::user()->student;
            $roomBookeds = $student->rooms;
            $active_tab = 'booked';

            // SEO
            $meta_desc = 'Trang đăng ký mượn phòng tập';
            $meta_keywords = 'đăng ký, mượn phòng tập, võ sinh';
            $url_canonical = route('rooms.index');
            $image_og = '';
            $meta_title = 'Mượn phòng tập';
            // SEO

            return view('rooms.index', compact('roomBookeds', 'active_tab', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }

    /**
     * Find room available
     */
    public function find(Request $request)
    {
        $date = Carbon::parse($request->date);
        $start = $request->start_at;
        $end = $request->end_at;
        if ($date->isToday() || $date->isFuture()) {
            $weekDay = $date->dayOfWeek;
            $rooms = DB::table('rooms')
                ->join('uptimes', 'rooms.id', '=', 'uptimes.room_id')
                ->where([
                    ['dojo_id', $request->dojo_id],
                    ['uptimes.weekdays', $weekDay],
                ])
                ->select('rooms.id', 'rooms.name', 'rooms.address', 'uptimes.uptimes')
                ->get();

            $roomFinded = $rooms->map(function ($room, $index) use ($date) {
                return ['id' => $room->id, 'name' => $room->name, 'uptimes' => $room->uptimes, 'address' => $room->address, 'spaceTime' => $this->room->spaceTime($room->id, $date->format('Y-m-d'), $room->uptimes)];
            })->toArray();

            $roomWithSpaceTime = [];
            foreach ($roomFinded as $room) {
                if ($this->room->checkTime(json_decode($room['spaceTime']), $start, $end)) {
                    array_push($roomWithSpaceTime, $room);
                }
            }

            return view('rooms.list', compact('roomWithSpaceTime'));
        } else {
            return response()->json([
                'error' => 'Bạn chỉ có thể đặt phòng ở hiện tại hoặc tương lai thôi nhé!',
            ]);
        }
    }

    /**
     * Book room
     */
    public function book(Request $request)
    {
        if (Auth::user()->isStudent()) {
            $start = $request->start_modal;
            $end = $request->end_modal;

            if (!$this->room->checkTime(json_decode($request->space_time), $start, $end)) {
                return redirect()->back()->with([
                    'status' => 'Lỗi',
                    'message' => 'Khoảng thời gian bạn đăng ký không hợp lệ',
                    'type' => 'error',
                    'color' => '#ed3939',
                ]);
            }

            try {
                $bookRoom = new BookRoom();
                $bookRoom->room_id = $request->room_id;
                $bookRoom->student_id = Auth::user()->student->id;
                $bookRoom->date = Carbon::parse($request->date)->format('Y-m-d');
                $bookRoom->start_at = $start;
                $bookRoom->end_at = $end;
                $bookRoom->note = $request->note;

                $bookRoom->save();

                $data = [
                    "text" => 'Có một lịch mượn phòng mới từ <b>' . Auth::user()->student->name . '</b>.',
                    "img" => Voyager::image(Auth::user()->avatar),
                    "icon" => '/img/core-img/icon-calendar.png',
                    "href" => route('voyager.book-rooms.show', $bookRoom->id),
                    "time" => Carbon::now(),
                ];
                $role = Role::whereIn('name', ['admin', 'manager', 'monitor'])->select('id')->get();
                $user = User::whereIn('role_id', $role)->get();
                Notification::send($user, new Notify($data, 'transfer-dojo'));
                Notification::send($user, new BookRoomRegistration($bookRoom));

                return redirect()->back()->with([
                    'status' => 'Thành công',
                    'message' => 'Đặt phòng thành công',
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
        } else {
            abort(403);
        }
    }

    /**
     * Cancel book room registration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelBook($id)
    {
        $bookRoom = BookRoom::find($id);
        if (Auth::user()->student->id == $bookRoom->student_id) {
            try {
                $bookRoom->delete();
                return redirect()->back()->with([
                    'status' => 'Thành công',
                    'message' => 'Hủy đặt phòng thành công',
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
        } else {
            abort(403);
        }
    }
}
