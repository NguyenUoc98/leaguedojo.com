<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\TransferDojo;

class TransferDimmer extends BaseDimmer
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
        $count  = TransferDojo::where('confirmed', 'WAIT')->count();
        $string = trans_choice('ĐK chuyển cơ sở mới', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-mail',
            'title'  => "{$count}",
            'text'   => "{$string}",
            'button' => [
                'text' => __('voyager::dimmer.post_link_text'),
                'link' => route('voyager.transfer-dojos.index'),
            ],
            'image'  => '#f59354',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(TransferDojo::class));
    }
}
