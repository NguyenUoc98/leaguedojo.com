<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\WorkoutRegistration;

class WorkoutDimmer extends BaseDimmer
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
        $count = WorkoutRegistration::where('confirmed', 'WAIT')->count();
        $string = trans_choice('ĐK tập luyện mới', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-barbell',
            'title'  => "{$count}",
            'text'   => "{$string}",
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.workout-registrations.index'),
            ],
            'image' => '#f56954',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(WorkoutRegistration::class));
    }
}
