<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormLayoutTrait;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Laravelista\Comments\Commentable;

class Document extends Model implements ViewableContract
{
    use FormLayoutTrait,
        Viewable,
        Commentable;

    protected $perPage  = 10;
    protected $fillable = ['title', 'slug', 'description', 'file', 'source', 'keywords', 'thumbnail', 'num_pages'];

    /**
     * Set Formfield for Document view
     */
    public function formFields()
    {
        return $this->field('file', 12)
            ->field('title', 6)->field('slug', 6)
            ->field('meta_keywords', 6)->field('source', 4)->field('num_pages', 2)
            ->field('description', 12)->get();
    }
}
