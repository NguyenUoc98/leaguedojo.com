<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $posts = $category->post()->paginate(5);

        // SEO
        $meta_desc = 'Các bài viết về chủ đề ' . $category->name;
        $meta_keywords = 'bài viết, thể loại,' . $category->name;
        $url_canonical = route('categories.show', $slug);
        $image_og = $category->image;
        $meta_title = 'Thể loại ' . $category->name;
        // SEO

        return view('categories.show', compact('category', 'posts', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }
}
