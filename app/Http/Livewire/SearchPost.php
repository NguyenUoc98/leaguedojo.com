<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchPost extends Component
{
    public $query = "";
    public $openSearchResult = false;

    public function updateQuery($query){

        dump($this->query);     // don't forget to use $this to access class property

        // persist to database here
    }

    public function render()
    {
        sleep(1);
//        $posts = Post::search($this->query)
//            ->rule(function ($builder) {
//                return [
//                    'must' => [
//                        'match' => [
//                            'title' => $builder->query
//                        ]
//                    ]
//                ];
//            })
//            ->take(5)
//            ->get();
        $posts = collect();
        return view('livewire.search-post', [ 'posts' => $posts]);
    }
}
