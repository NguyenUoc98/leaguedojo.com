<?php

namespace App\Models;

use App\Indexs\PostIndexConfigurator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use ScoutElastic\Searchable;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use App\Traits\FormLayoutTrait;
use App\Models\Category;
use Alaouy\Youtube\Facades\Youtube;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Laravelista\Comments\Commentable;

class Post extends Model implements ViewableContract
{
    use Translatable,
        Resizable,
        FormLayoutTrait,
        Viewable,
        SoftDeletes,
        Commentable,
        Searchable;

    protected $indexConfigurator = PostIndexConfigurator::class;
    protected $searchRules = [
        //
    ];
    protected $mapping = [
        'properties' => [
            'id' => [
                'type' => 'integer',
            ],
            'category_id' => [
                'type' => 'integer',
            ],
            'status' => [
                'type' => 'keyword',
            ],
            'title' => [
                'type' => 'text',
            ],
            'excerpt' => [
                'type' => 'text',
            ],
        ]
    ];

    protected $dates = ['deleted_at'];

    protected $translatable = [
        'title',
        'seo_title',
        'excerpt',
        'body',
        'slug',
        'meta_description',
        'meta_keywords',
        'source',
        'keywords'
    ];

    const PUBLISHED = 'PUBLISHED';

    const IS_CRAWL = [
        'YES' => 1,
        'NO'  => 0
    ];

    protected $guarded = [];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = Arr::only($array, ['title', 'category_id', 'status', 'excerpt']);

        return $array;
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        parent::save();
    }

    public function authorId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'author_id', 'id');
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Bài viết',
        ]);
    }

    /**
     * Set Formfield for multiple images
     */
    public function formFields()
    {
        return $this->field('image', 12)
            ->get();
    }

    /**
     * Get 4 most viewed posts(PUBLISHED)
     *
     * @return array
     */
    public function mostViewed()
    {
        return $this->where('status', 'PUBLISHED')->orderByViews()->limit(setting('app.most_viewed'))->get();
    }

    /**
     * Get 4 latest posts(PUBLISHED)
     *
     * @return array
     */
    public function latestPost()
    {
        return $this->where([
            ['status', 'PUBLISHED'],
            ['featured', 1],
        ])->orderBy('updated_at', 'desc')->limit(setting('app.latest_post'))->get();
    }

    /**
     * Get 11 most featured post(PUBLISHED)
     *
     * @return array
     */
    public function mostFeatured()
    {
        return $this->where([
            ['status', 'PUBLISHED'],
            ['featured', 1],
        ])->orderBy('updated_at', 'desc')->limit(setting('app.most_featured'))->get();
    }

    /**
     * Get more post in the same category
     *
     * @param bigint $id
     * @param int $category_id
     * @return Collection
     */
    public function morePost($id, int $category_id, array $keywords)
    {
        $query = $this::query()
            ->withCount('comments')
            ->where('category_id', $category_id)
            ->where('id', '<>', $id);

        foreach ($keywords as $keyword) {
            $query = $query->orWhere('keywords', 'LIKE', '%' . $keyword . '%');
        }
        return $query->inRandomOrder()->limit(6)->get();
    }

    /**
     * Get post by Slug
     *
     * @param string $slug
     */
    public function getBySlug($slug)
    {
        $post = $this::query()
            ->with('comments')
            ->whereSlug($slug)
            ->firstOrFail();

        if (!$post->is_crawl) {
            $start = strpos($post->body, 'https://www.youtube.com/');
            while ($start) {
                $end        = strpos($post->body, '">https://www.youtube.com/');
                $link       = substr($post->body, $start, $end - $start);
                $post->body = str_replace('<a href="' . $link . '">' . $link . '</a>',
                    '<div class="single-video-area">' . Youtube::getVideoInfo(Youtube::parseVidFromURL($link))->player->embedHtml,
                    $post->body . '</div>');
                $start      = strpos($post->body, 'https://www.youtube.com/');
            };
        }
        return $post;
    }
}
