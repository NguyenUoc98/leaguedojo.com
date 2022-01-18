<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
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
            ->limit(30)->get();
        return view('livewire.latest-post', ['latestPosts' => $this->paginate($latestPosts, 6)]);
    }

    /**
     * Custom paginate collection
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page  = $page ?: (PaginationPaginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
