<div>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 mt-4">
        @foreach($latestPosts as $post)
            <a class="bg-white rounded-md p-4 space-y-3 border" title="{{ $post->title }}"
               href="{{ route('posts.show',$post->slug) }}">
                @if($post->is_crawl)
                    <img class="w-full md:h-40 h-52 object-cover rounded-md mb-3"
                         src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                         alt="{{ $post->title }}">
                @else
                    <img
                        src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                        alt="{{ $post->slug }}">
                @endif
                <span
                    class="font-semibold md:px-4 px-2 md:py-2 py-1 rounded md:text-sm text-xs uppercase"
                    style="background-color: {{ $post->category->color }}">{{ $post->category->name }}</span>
                <h2 class="font-semibold md:leading-6 leading-5 md:text-lg text-black">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</h2>
                <div class="flex justify-between">
                    <span class="text-black text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4 inline" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        @if ($post->created_at->isToday())
                            {{ $post->created_at->diffForHumans() }}
                        @elseif ($post->created_at->isYesterday())
                            Hôm qua lúc {{ $post->created_at->format('H:i') }}
                        @else
                            {{ $post->created_at->format('d \\t\\h\\g m, Y') }}
                        @endif
                    </span>
                    <span class="text-black text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        {{ views($post)->count() }}

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    {{ $post->comments->count() }}
                    </span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="my-4">
        {!!  $latestPosts->links('layouts.pagination') !!}
    </div>
</div>
