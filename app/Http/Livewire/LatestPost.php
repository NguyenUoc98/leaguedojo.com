<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class LatestPost extends Component
{
    use WithPagination;

    public function render()
    {
        $latestPosts = Post::query()
            ->where([
                ['status', 'PUBLISHED'],
                ['featured', 0],
            ])
            ->orderBy('updated_at', 'desc')
            ->paginate(6);
        return view('livewire.latest-post', ['latestPosts' => $latestPosts]);
    }
}
