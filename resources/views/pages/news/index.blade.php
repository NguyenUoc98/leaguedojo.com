@extends('layouts.master')
@section('page_title', 'Tin tức')
@section('content')
    @if($agent->isDesktop())
        @include('pages.news.carousel')
    @endif

    <div class="container mx-auto max-w-7xl lg:px-0">
        <div class="p-4">

            {{--      TIN MỚI      --}}
            <div class="grid grid-cols-12 gap-4">
                <div class="lg:col-span-8 col-span-12">
                    <h1 class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Tin tức mới</h1>
                    <div class="relative w-full rounded-lg">
                        @if($latestPost[0]->is_crawl)
                            <img class="w-full h-96 lg:h-lg object-cover rounded-lg"
                                 src="{{ Voyager::image(json_decode($latestPost[0]->image)[0] ?? $latestPost[0]->category->image) }}"
                                 alt="{{ $latestPost[0]->title }}">
                        @else
                            <img class="w-full h-96 lg:h-lg object-cover rounded-lg"
                                 src="{{ Voyager::image(str_replace('.', '-cropped.', json_decode($latestPost[0]->image)[0] ?? $latestPost[0]->category->image)) }}"
                                 alt="{{ $latestPost[0]->title }}">
                        @endif

                        <a class="absolute bg-black bg-opacity-25 h-96 lg:h-lg rounded-lg top-0 lg:p-8 md:p-5 p-3 flex items-stretch"
                           href="{{ route('posts.show', $latestPost[0]->slug) }}"
                           title="{{ $latestPost[0]->title }}">
                            <div class="self-end space-y-3">
                                <span
                                    class="font-semibold md:px-4 px-2 md:py-2 py-1 rounded md:text-sm text-xs uppercase"
                                    style="background-color: {{ $latestPost[0]->category->color }}">{{ $latestPost[0]->category->name }}</span>
                                <h2 class="font-bold md:text-2xl text-white leading-5">{{ \Illuminate\Support\Str::limit($latestPost[0]->title) }}</h2>
                                <span class="text-white text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4 inline" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @if ($latestPost[0]->created_at->isToday())
                                        {{ $latestPost[0]->created_at->diffForHumans() }}
                                    @elseif ($latestPost[0]->created_at->isYesterday())
                                        Hôm qua lúc {{ $latestPost[0]->created_at->format('H:i') }}
                                    @else
                                        {{ $latestPost[0]->created_at->format('d \\t\\h\\g m') }}
                                    @endif
                                </span>
                            </div>
                        </a>
                    </div>
                    @livewire('latest-post')
                </div>
                <div class="lg:col-span-4 col-span-12">
                    <h1 class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Tin nổi bật</h1>
                    <div class="mt-4 bg-white p-4 rounded-lg">
                        @foreach($mostFeatured as $post)
                            <a class="flex pb-4 mb-4 border-b"
                               title="{{ $post->title }}"
                               href="{{ route('posts.show', $post->slug) }}">
                                @if($post->is_crawl)
                                    <img class="md:w-32 md:h-32 w-28 h-28 object-cover rounded-lg"
                                         src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                                         alt="{{ $latestPost[0]->title }}">
                                @else
                                    <img class="md:w-32 md:h-32 w-28 h-28 object-cover rounded-lg"
                                         src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                                         alt="{{ $post->title }}">
                                @endif
                                <div class="ml-3 space-y-3 mt-2 w-full">
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
                                                {{ $post->created_at->format('d \\t\\h\\g m') }}
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
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--      XEM NHIỀU      --}}
            <h1 class="font-bold text-2xl my-4 mt-10 border-l-4 border-primary pl-2">Xem nhiều</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($mostViewed as $post)
                    <a class="relative rounded-lg overflow-hidden"
                       href="{{ route('posts.show', $post->slug) }}"
                       title="{{ $post->title }}">
                        @if($latestPost[0]->is_crawl)
                            <img class="w-full h-96 lg:h-lg object-cover rounded-lg"
                                 src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                                 alt="{{ $post->title }}">
                        @else
                            <img class="w-full h-96 lg:h-lg object-cover rounded-lg"
                                 src="{{ Voyager::image(str_replace('.', '-cropped.', json_decode($post->image)[0] ?? $post->category->image)) }}"
                                 alt="{{ $post->title }}">
                        @endif
                        <div class="absolute backdrop-blur-md backdrop-filter bg-opacity-50 bg-white rounded-lg m-4 p-4 bottom-0 space-y-3 transition transform duration-300 ease-in-out
                                    lg:hover:bg-white lg:hover:-translate-y-2 lg:hover:shadow-full">
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
                                        {{ $post->created_at->format('d \\t\\h\\g m') }}
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
                    </a>
                @endforeach
            </div>

            {{--      CÁC CƠ SỞ      --}}
            <div class="grid grid-cols-12 gap-8">
                <div class="lg:col-span-8 col-span-12">
                    <h1 class="font-bold text-2xl my-4 mt-10 border-l-4 border-primary pl-2">Cơ sở tập luyện</h1>
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
                        @foreach($dojos as $dojo)
                            <a class="relative rounded-lg overflow-hidden"
                               href="{{ route('dojos.show', $dojo->slug) }}"
                               title="{{ $dojo->name }}">
                                @php
                                    $images = json_decode($dojo->image);
                                @endphp
                                <img class="w-full h-96 object-cover rounded-lg"
                                     src="{{ Voyager::image($images[0]) }}" alt="{{ $dojo->name }}">
                                <div class="absolute backdrop-blur-md backdrop-filter bg-opacity-50 bg-white bottom-0 p-4 rounded-bl-lg rounded-tr-lg shadow-top space-y-3 w-4/5
                                            transition transform duration-300 ease-in-out lg:hover:bg-white lg:hover:shadow-full">
                                    <div class="flex items-center">
                                        @if($dojo->logo)
                                            <img class="w-10 h-10 mr-2 inline rounded-full" alt="{{ $dojo->name }}"
                                                 src="{{ Voyager::image($dojo->thumbnail('cropped', 'logo')) }}">
                                        @endif
                                        <span
                                            class="font-semibold md:leading-6 leading-5 md:text-lg text-black">{{ $dojo->name }}</span>
                                    </div>
                                    <p class="text-black text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $dojo->address }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="lg:col-span-4 col-span-12 space-y-3">
                    <h1 class="font-bold text-2xl my-4 mt-10 border-l-4 border-primary pl-2">Theo dõi chúng tôi</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 md:gap-8 lg:gap-4 gap-4">
                        <div class="bg-white rounded-lg p-5 border shadow-lg flex items-center">
                            <div class="g-ytsubscribe" data-channelid="UCl81LfmyxDUZ1ygd4RNhsAw" data-layout="full"
                                 data-count="default"></div>
                        </div>
                        <div class="bg-white rounded-lg lg:p-6 p-4 border shadow-lg text-center">
                            <!-- Load Facebook SDK for JavaScript -->
                            <div id="fb-root"></div>
                            <div class="fb-page rounded-lg border overflow-hidden block md:hidden lg:block"
                                 data-href="https://www.facebook.com/votrandojo/"
                                 data-tabs="timeline, messages" data-width="" data-height="" data-small-header="false"
                                 data-adapt-container-width="true" data-lazy="true" data-hide-cover="false"
                                 data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/votrandojo/" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/votrandojo/">VÕ TRẦN DOJO</a>
                                </blockquote>
                            </div>
                            <div class="fb-page rounded-lg border overflow-hidden hidden md:block lg:hidden" data-href="https://www.facebook.com/votrandojo/" data-tabs=""
                                 data-width="" data-height="" data-small-header="true" data-adapt-container-width="true"
                                 data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/votrandojo/" class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/votrandojo/">VÕ TRẦN DOJO</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://apis.google.com/js/platform.js"></script>
    <script async defer crossorigin="anonymous" nonce="Cc5ePpnC"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=470070003944545&autoLogAppEvents=1">
    </script>
@endpush
