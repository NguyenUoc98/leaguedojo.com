<?php

namespace App\Models;

use Alaouy\Youtube\Facades\Youtube;
use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Video extends Model
{
    use FormLayoutTrait,
        Commentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'thumbnail', 'duration', 'view_count', 'like_count', 'dislike_count', 'comment_count', 'keywords',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function playlist()
    {
        return $this->belongsTo(Playlist::class)->withDefault();
    }

    /**
     * Set Formfield for Video view
     */
    public function formFields()
    {
        return $this->field('youtubeId', 6)->field('thumbnail', 6)
            ->field('title', 6)->field('slug', 6)
            ->field('duration', 2)->field('description', 6)->field('view_count', 6)->field('like_count', 6)->field('dislike_count', 2)->field('comment_count', 2)
            ->field('seo_title', 12)
            ->field('video_belongsto_playlist_relationship', 8)->field('status', 2)->field('featured', 2)
            ->field('meta_keywords', 6)->field('meta_description', 6)->get();
    }

    /**
     * Get 5 latest videos(PUBLISHED)
     * 
     * @return array
     */
    public function latestVideos()
    {
        $latestVideos = $this->whereStatus('PUBLISHED')->whereFeatured(0)->orderBy('created_at', 'desc');
        if (setting('app.latest_video') != 0) {
            $latestVideos = $latestVideos->with('comments')->paginate(setting('app.latest_video'));
        } else {
            $latestVideos = $latestVideos->with('comments')->get();
        }
        return $latestVideos;
    }

    /**
     * Get all video in the same playlist
     * 
     * @param $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getPlaylist($id)
    {
        $video = $this->where('youtubeId', $id)->firstOrFail();
        if (!is_null($video->playlist_id)) {
            return $this->where('playlist_id', $video->playlist_id)->get();
        }
        return '';
    }

    /**
     * Order by views
     * 
     * @param int $limit
     * @param boolean $featured
     * @return array
     */
    public function orderByView($featured, $limit = 1, $paginate = false)
    {
        $videosYouTube = $this->whereStatus('PUBLISHED');
        if ($featured) {
            $videosYouTube = $videosYouTube->whereFeatured(1);
        }
        if ($limit != 0) {
            $videosYouTube = $videosYouTube->limit(setting('app.order_by_view'));
        } else {
            if($paginate) {
                return $videosYouTube = $videosYouTube->orderBy('view_count', 'desc')->with('comments')->paginate(8);
            }
        }
        $videosYouTube = $videosYouTube->orderBy('view_count', 'desc')->with('comments')->get();
        return $videosYouTube;
    }

    /**
     * Get the newest feature video
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function newestFeatured()
    {
        $video = $this->whereStatus('PUBLISHED')->whereFeatured(1)->orderBy('created_at', 'desc')->first();
        return $video;
    }

    /**
     * Sync all video in DB with information on Youtube
     * 
     * @return boolean
     */
    public function updateAll()
    {
        $videos = $this->all();
        foreach ($videos as $video) {
            $info = Youtube::getVideoInfo($video->youtubeId);
            $updated = $video->update([
                'title' => $info->snippet->title,
                'description' => $info->snippet->description,
                'thumbnail' => $info->snippet->thumbnails->high->url,
                'duration' => $info->contentDetails->duration,
                'view_count' => $info->statistics->viewCount,
                'like_count' => $info->statistics->likeCount,
                'dislike_count' => $info->statistics->dislikeCount,
                'comment_count' => $info->statistics->commentCount
            ]);
            if (!$updated) {
                return false;
            }
        }
        return true;
    }

    /**
     * Remove Videos outside Playlist
     * 
     * @return boolean
     */
    public function removePlaylist($video)
    {
        $video->playlist_id = null;
        return $video->save();
    }
}
