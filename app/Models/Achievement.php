<?php

namespace App\Models;

use App\Traits\FormLayoutTrait;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use FormLayoutTrait;

    public static $methodIcon = [
        'GOLD'   => 'img/profile/icon-gold-medal.png',
        'SILVER' => 'img/profile/icon-silver-medal.png',
        'BRONZE' => 'img/profile/icon-bronze-medal.png',
    ];

    public function formFields()
    {
        return $this->field('image', 12)->field('medal', 6)->field('content', 6)->field('date', 6)->field('tournaments', 12)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
