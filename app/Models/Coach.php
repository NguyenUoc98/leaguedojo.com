<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'full_name',
        'dojo_id',
        'image',
        'position',
        'description',
    ];
}
