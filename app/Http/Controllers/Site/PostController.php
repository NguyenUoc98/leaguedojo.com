<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use TCG\Voyager\Facades\Voyager;

class PostController extends Controller
{
    protected $post;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->post->getBySlug($slug);
        views($post)->delayInSession($this->minutes)->record();
        $keywords   = json_decode($post->keywords);
        $morePosts  = $this->post->morePost($post->id, $post->category_id, $keywords);
        $categories = Category::query()->withCount('posts')->get();

        // SEO
        $meta_desc     = $post->meta_description;
        $meta_keywords = $post->meta_keywords;
        foreach ($keywords as $key) {
            $meta_keywords .= ', ' . $key;
        }
        $url_canonical = route('posts.show', $slug);
        $image_og      = Voyager::image(json_decode($post->image)[0] ?? '');
        $meta_title    = $post->seo_title;
        // SEO

        return view('posts.show',
            compact('post', 'morePosts', 'keywords', 'categories', 'meta_desc', 'meta_keywords', 'url_canonical',
                'image_og', 'meta_title'));
    }
}
