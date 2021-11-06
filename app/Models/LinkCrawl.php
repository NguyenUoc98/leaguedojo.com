<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkCrawl extends Model
{
    protected $fillable = ['title', 'link', 'status'];

    const STATUS = [
        'DEFAULT'  => 0,
        'CRAWLING' => 1,
        'CRAWLED'  => 2,
    ];
}
