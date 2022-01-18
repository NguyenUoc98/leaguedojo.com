<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group Điểm rèn luyện
 *
 * Quản lý sự kiện
 */
class EventController extends Controller
{

    protected $event;

    /**
     * Create a new controller instance.
     *
     * @param  $transferDojo
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->isStudent()) {
            $student      = Auth::user()->student;
            $eventSigneds = $student->eventSigneds();
            $signed       = collect($eventSigneds)->map(function ($value, $index) {
                return $value->id;
            });
            $eventNotSign = $student->eventNotSign($signed->toArray());

            $active_tab = $request->active_tab ?? 'signed';
            $point      = $student->pointCollected();

            // SEO
            $meta_desc     = 'quản lý, tìm kiếm các sự kiện đã đăng ký xác nhận hoặc chưa';
            $meta_keywords = 'sự kiện, tích lũy điểm rèn luyện, đăng ký';
            $url_canonical = route('events.index');
            $image_og      = '';
            $meta_title    = 'Sự kiện';
            // SEO

            return view('events.index',
                compact('eventSigneds', 'active_tab', 'eventNotSign', 'point', 'meta_desc', 'meta_keywords',
                    'url_canonical', 'image_og', 'meta_title'));
        } else {
            abort(403);
        }
    }
}
