<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class BonusDefault extends Model
{
    use FormLayoutTrait;

    public function formFields()
    {
        return $this
            ->beginDiv('row')
            ->beginDiv('col-md-6')
            ->field('bonus_default_belongsto_role_relationship', 6)->field('bonus_default_belongsto_dojo_relationship',
                6)
            ->field('percent', 6)->field('max_price', 6)
            ->field('level', 4)->field('month_count', 4)->field('first', 4)
            ->field('kuy', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
            ->field('note', 12)
            ->endDiv()
            ->endDiv()
            ->get();
    }
}
