<div class="row mt-4">
    @foreach($latestPosts as $post)
        <div class="single-blog-post col-12 col-md-6 col-lg-4 style-4" style="padding-bottom:30px; border: 0">
            <div class="post-thumbnail thumbnail">
                <a href="{{ route('posts.show',$post->slug) }}">
                    @if($post->is_crawl)
                        <img
                            src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                            alt="{{ $post->title }}">
                    @else
                    <img
                        src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                        alt="{{ $post->slug }}">
                    @endif
                </a>
            </div>
            <div class="post-content">
                <a href="{{ route('posts.show',$post->slug) }}"
                   class="post-title">{{ $post->title }}</a>
                <div class="post-meta d-flex" style="font-size: 12px; margin-bottom: 8px;">
                    <span>
                        <i aria-hidden="true"></i> ●
                        @if ($post->updated_at->isToday())
                            {{ $post->updated_at->diffForHumans() }}
                        @elseif ($post->updated_at->isYesterday())
                            Hôm qua lúc {{ $post->updated_at->format('H:i') }}
                        @else
                            {{ $post->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                        @endif
                    </sapn>
                </div>
                <div class="post-meta d-flex">
                    <a href="#">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        {{ views($post)->count() }}
                    </a>
                    <a href="#">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                        {{ $post->comments->count() }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="w-100 px-3">
        {{ $latestPosts->links() }}
    </div>
</div>
