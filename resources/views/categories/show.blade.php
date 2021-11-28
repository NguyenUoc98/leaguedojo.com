@extends('layouts.master')
@section('page_title','Thể loại')
@push('css')
    <style>
        .rm-link {
            color: var(--color-primary) !important;
        }
    </style>
@endpush
@section('content')
    {{ Breadcrumbs::render('the-loai', $category) }}
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <h1 class="font-bold text-2xl my-4 text-center lg:text-left">{{ $category->name }}</h1>
            <div class="grid grid-cols-1 gap-2">
                @forelse($posts as $post)
                    <div class="border md:flex mb-4 p-4 rounded-lg">
                        <a class="font-semibold md:leading-6 leading-5 md:text-lg text-black"
                           title="{{ $post->title }}"
                           href="{{ route('posts.show', $post->slug) }}">
                            @if($post->is_crawl)
                                <img class="md:w-96 w-full h-52 object-cover rounded-lg"
                                     src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                                     alt="{{ $post->title }}">
                            @else
                                <img class="md:w-96 w-full h-auto object-cover rounded-lg"
                                     src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                                     alt="{{ $post->title }}">
                            @endif
                        </a>
                        <div class="md:ml-3 space-y-3 mt-2 w-full">
                            <a class="font-semibold md:leading-6 leading-5 md:text-lg text-black"
                               title="{{ $post->title }}"
                               href="{{ route('posts.show', $post->slug) }}">
                                {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                            </a>
                            <div class="excerpt">
                                <p>{!! $post->excerpt !!}</p>
                            </div>
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
                        </div>
                    </div>
                @empty
                    <p class="text-center">Không có bài viết nào</p>
                @endforelse
            </div>
            {{ $posts->onEachSide(1)->links() }}
        </div>
        <div class="col-span-12 lg:col-span-4">
            @include('layouts.sidebar_widget')
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/site/readMoreJS.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $readMoreJS.init({
                target: '.excerpt p',
                numOfWords: 50,
                toggle: true,
                moreLink: 'Xem thêm',
                lessLink: 'Hiển thị ít hơn'
            });
        });
    </script>
@endpush
