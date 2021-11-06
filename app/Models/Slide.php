<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use FormLayoutTrait;

    /**
     * Set Formfields for Slide views
     */
    public function formfields()
    {
        return $this->field('image', 12)
            ->field('name', 6)->field('link', 6)
            ->get();
    }
}
