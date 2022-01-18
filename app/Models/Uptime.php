<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Uptime extends Model
{
    protected $fillable = ['room_id', 'weekdays', 'uptimes'];

    use FormLayoutTrait;

    public function formFields()
    {
        return $this
            ->beginDiv('row')
            ->beginDiv('col-md-6')
            ->field('uptime_belongsto_room_relationship', 12)->field('weekdays', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
            ->field('uptimes', 12)
            ->endDiv()
            ->endDiv()->get();
    }
}
