<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormLayoutTrait;

class WorkoutRegistration extends Model
{
    use FormLayoutTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'phone', 'cmnd', 'birthday', 'address', 'homeland', 'work_unit', 'type', 'weight', 'height', 'sex',
        'link_fb', 'dojo_id', 'confirmed', 'reason_reject',
    ];

    public function formFields()
    {
        return $this
        ->beginDiv('row')
            ->beginDiv('col-md-6')
                ->field('name', 6)->field('sex', 6)
                ->field('cmnd', 6)->field('phone', 6)
                ->field('birthday', 6)->field('type', 6)
                ->field('height', 6)->field('weight', 6)
                ->field('reason_reject', 12)
            ->endDiv()
            ->beginDiv('col-md-6')
                ->field('workout_registration_belongsto_dojo_relationship', 12)
                ->field('address', 12)
                ->field('homeland', 12)
                ->field('link_fb', 12)
                ->field('work_unit', 12)
                ->field('confirmed', 12)
            ->endDiv()
        ->endDiv()
        ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dojo()
    {
        return $this->belongsTo(Dojo::class);
    }
}
