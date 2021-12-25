@extends('layouts.master')
@section('page_title', $post->title)
@php
    use Carbon\Carbon;
    Carbon::setlocale('vi');
    $images = json_decode($post->image);
@endphp

@push('css')
    <style>
        figure, iframe {
            max-width: 100%;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        iframe {
            width: 100%;
            height: 30rem;
        }

        figcaption {
            text-align: center;
            margin-top: 10px;
        }

        img {
            display: unset;
            border-radius: 0.25rem !important;
        }

        p {
            margin: 1rem 0;
        }

        @if($post->is_crawl)
        img {
            width: 100%;
        }
        @endif
    </style>
@endpush

@section('content')

    {{ Breadcrumbs::render('bai-viet', $post) }}
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <div class="mt-5">
                @if(count($images))
                    <img class="lg:h-lg object-cover w-full"
                         src="{{ Voyager::image($images[0]) }}" alt="{{ $post->title }}"/>
                @endif
                <h1 class="font-bold text-2xl my-4">{{ $post->title }}</h1>
                <p class="text-gray-500">
                    <span>
                        @if ($post->updated_at->isToday())
                            {{ $post->updated_at->diffForHumans() }}
                        @elseif ($post->updated_at->isYesterday())
                            Hôm qua lúc {{ $post->updated_at->format('H:i') }}
                        @else
                            {{ $post->updated_at->format('d \\t\\h\\g m, Y') }}
                        @endif
                    </span>
                    |
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        {{ views($post)->count() }} lượt xem
                    </span>
                    |
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        {{ $post->comments->count() }} bình luận
                    </span>
                </p>

                <div class="text-lg">{!! $post->body !!}</div>

                <div class="border-t py-3">
                    <div class="flex justify-between">
                        <span class="font-bold">Nguồn: {{ $post->source }}</span>
                        <div class="fb-like" data-href="{{ route('posts.show', $post->slug) }}"
                             data-width="" data-layout="button_count" data-action="like" data-size="small"
                             data-share="true">
                        </div>
                    </div>
                    <div class="mt-1">
                        <span class="font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"/>
                            </svg>
                            Từ khóa:
                        </span>
                        @foreach($keywords as $keyword)
                            <span
                                class="bg-gray-300 cursor-pointer hover:bg-gray-400 mx-1 px-3 py-1 rounded-full">#{{ $keyword }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @comments([
                'model' => $post
            ])
        </div>
        <div class="col-span-12 lg:col-span-4">
            @include('layouts.sidebar_widget')
        </div>
    </div>

    <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2 mt-10 mb-4">Tin tức khác</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($morePosts as $post)
            <a class="bg-white rounded-md p-4 space-y-3 border" title="{{ $post->title }}"
               href="{{ route('posts.show',$post->slug) }}">
                @if($post->is_crawl)
                    <img class="w-full h-64 object-cover rounded-md mb-3"
                         src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                         alt="{{ $post->title }}">
                @else
                    <img class="w-full h-64 object-cover rounded-md mb-3"
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
                    {{ $post->comments_count }}
                    </span>
                </div>
            </a>
        @endforeach
    </div>
@endsection
