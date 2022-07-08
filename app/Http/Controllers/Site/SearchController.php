<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('query');
        // set query string
        $posts = Post::search($keyword)
            ->rule(function ($builder) {
                return [
                    'must' => [
                        'match' => [
                            'title' => $builder->query
                        ]
                    ]
                ];
            })
            ->take(50)
            ->paginate(10);

        // SEO
        $meta_desc     = 'Kết quả tìm kiếm' . $keyword;
        $meta_keywords = $keyword;
        $url_canonical = route('home');
        $image_og      = '';
        $meta_title    = 'Kết quả tìm kiếm' . $keyword;
        // SEO

        return view('search.index', compact('keyword', 'posts', 'meta_desc', 'meta_keywords', 'image_og', 'meta_title', 'url_canonical'));
    }
}
