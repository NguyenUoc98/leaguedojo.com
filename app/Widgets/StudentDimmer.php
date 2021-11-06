<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Student;

class StudentDimmer extends BaseDimmer
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
        $count = Student::count();
        $string = trans_choice('voyager::dimmer.student', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-belt',
            'title'  => "{$count}",
            'text'   => "{$string}",
            'button' => [
                'text' => __('voyager::dimmer.student_link_text'),
                'link' => route('voyager.students.index'),
            ],
            'image' => '#dc3545',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Student::class));
    }
}
