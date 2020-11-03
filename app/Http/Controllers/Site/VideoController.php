<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Video;
use TCG\Voyager\Facades\Voyager;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listVideo = $this->video->orderByView(false, 0, true);
        $newestFeatured = $this->video->newestFeatured();
        $playlists = Playlist::with('videos')->get();

        // SEO
        $meta_desc = 'Trang tổng hợp các video thi đấu, kiến thức của hệ thống Karate League Dojo cũng như các trang Youtube nổi tiếng';
        $meta_keywords = 'video, thi đấu, kiến thức, youtube, nổi tiếng, karate';
        $url_canonical = route('videos.index');
        $image_og = '';
        $meta_title = 'Video';
        // SEO

        return view('videos.index', compact('listVideo', 'newestFeatured', 'playlists', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $video = $this->video->whereSlug($slug)->firstOrFail();
        $commentThreads = Youtube::getCommentThreadsByVideoId($video->youtubeId);
        $ortherInPlaylist = $this->video->getPlaylist($video->youtubeId);
        $nextVideo = '';
        $keywords = json_decode($video->keywords);
        
        $ortherInChanel = $this->video->orderByRaw("RAND()");
        foreach ($keywords as $keyword) {
            $ortherInChanel = $ortherInChanel->orWhere('keywords', 'LIKE', '%' . $keyword . '%');
        }

        if ($ortherInPlaylist != '') {
            $id = $ortherInPlaylist->map(function ($video, $index) {
                return $video->id;
            });
            $ortherInChanel = $ortherInChanel->whereNotIn('id', $id);

            foreach ($ortherInPlaylist as $key => $other) {
                if ($other->id == $video->id) {
                    $nextVideo = $ortherInPlaylist[($key + 1) % count($ortherInPlaylist)]->slug;
                    break;
                }
            }
        }
        
        $ortherInChanel = $ortherInChanel->paginate(setting('app.orther_in_chanel'));

        // SEO
        $meta_desc = $video->meta_description;
        $meta_keywords = $video->meta_keywords;
        foreach($keywords as $key) {
            $meta_keywords .= ', ' . $key;
        }
        $url_canonical = route('posts.show', $slug);
        $image_og = $video->thumbnail;
        $meta_title = $video->seo_title;
        // SEO

        return view('videos.show', compact('video', 'keywords', 'nextVideo', 'ortherInPlaylist', 'ortherInChanel', 'commentThreads', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }
}
