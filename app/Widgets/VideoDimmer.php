<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Video;

class VideoDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Video::count();
        $string = trans_choice('Video', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-tv',
            'title'  => "{$count}",
            'text'   => "{$string}",
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.videos.index'),
            ],
            'image' => '#28a745',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Video::class));
    }
}
