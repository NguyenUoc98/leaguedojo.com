<?php

namespace App\Models;

use TCG\Voyager\Models\Category as Model;
use App\Models\Post;

class Category extends Model
{
    /**
     * Relationship with Post table
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'category_id', 'id')->orderBy('created_at', 'desc');
    }

    /**
     * Relationship with Post table
     */
    public function category()
    {
        return $this->belongsTo(category::class, 'parent_id', 'id');
    }
}
