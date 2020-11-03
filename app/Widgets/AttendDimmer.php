<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Attend;

class AttendDimmer extends BaseDimmer
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
        $count = Attend::where('confirmed', 'WAIT')->count();
        $string = trans_choice('ĐK sự kiện mới', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-activity',
            'title'  => "{$count}",
            'text'   => "{$string}",
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.attends.index'),
            ],
            'image' => '#ffc107',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Attend::class));
    }
}
