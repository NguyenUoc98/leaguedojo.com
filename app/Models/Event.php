<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use FormLayoutTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'attends');
    }

    public function formFields()
    {
        return $this
            ->beginDiv('row')
                ->beginDiv('col-md-6')
                    ->field('name', 12)
                    ->field('address', 12)
                    ->field('date', 6)->field('point', 6)
                    ->field('start_at', 4)->field('end_at', 4)->field('view_home_page', 4)
                    ->field('image', 12)
                ->endDiv()

                ->beginDiv('col-md-6')
                    ->field('note', 12)
                ->endDiv()
            ->endDiv()
            ->get();
    }

    public function getDates()
    {
        return array('created_at', 'updated_at', 'date');
    }
}
