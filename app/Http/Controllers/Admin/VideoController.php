<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    protected $video;

    /**
     * Create a new controller instance.
     *
     * @param  $video
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Get view field
     */
    public function getCloneFields(Request $request)
    {
        $id = $request->divCount;
        $varId = 'keyword_' . $id;
        return view("voyager::videos.keyword-fields", compact('id', 'varId'));
    }

    /**
     * Check infomation of link video on Youtube.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $video = Youtube::getVideoInfo(Youtube::parseVidFromURL($request->url));
        if ($video === false) {
            return 'false';
        }
        return ['view' => view('vendor.voyager.videos.video-info', compact('video'))->render(), 'video' => $video];
    }

    /**
     * Sync all video in DB with information on Youtube
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function syncData()
    {
        $synced = $this->video->updateAll();
        if ($synced) {
            return redirect()->route("voyager.videos.index")->with([
                'message'    => 'Đồng bộ dữ liệu thành công',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->route("voyager.videos.index")->with([
            'message'    => 'Đồng bộ dữ liệu thất bại',
            'alert-type' => 'error',
        ]);
    }

    /**
     * Remove Videos outside Playlist
     * 
     * @param $id
     */
    public function removePlaylist(Video $video)
    {
        if ($this->video->removePlaylist($video)) {
            return redirect()->back()->with([
                'message'    => 'Đã xóa video khỏi danh sách',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->back()->with([
            'message'    => 'Chưa xóa video khỏi danh sách',
            'alert-type' => 'error',
        ]);
    }
}
