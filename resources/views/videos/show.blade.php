@extends('layouts.master')
@section('page_title', $video->title)

@push('css')
    <style>
        #auto:checked ~ .dot {
            transform: translateX(100%);
            background-color: var(--color-primary) !important;
        }
    </style>
@endpush

@section('content')
    {{ Breadcrumbs::render('video', $video) }}

    <div class="grid grid-cols-12 gap-x-8">
        <div class="col-span-12 lg:col-span-8">
            <div id="player" class="aspect-video mx-auto mt-5 rounded-lg w-full"></div>
            <h1 class="font-bold text-2xl my-4">{{ $video->title }}</h1>
            <div class="text-gray-500">
                <span>
                    @if ($video->created_at->isToday())
                        {{ $video->created_at->diffForHumans() }}
                    @elseif ($video->created_at->isYesterday())
                        Hôm qua lúc {{ $video->created_at->format('H:i') }}
                    @else
                        {{ $video->created_at->format('d \\t\\h\\g m, Y') }}
                    @endif
                </span>
                |
                <p class="whitespace-nowrap inline">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    {{ $video->view_count }} lượt xem
                </span>
                    |
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                    </svg>
                    {{ $video->like_count }} lượt thích
                </span>
                    |
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    {{ $video->comment_ount + $video->comments->count() }} bình luận
                </span>
                </p>
            </div>
            @if($ortherInPlaylist == '')
                <div class="border-t py-3">
                    <div class="flex justify-between">
                        <span class="font-bold">Nguồn: KARATE LEAGUE DOJO</span>
                        <div class="fb-like" data-href="{{ route('videos.show', $video->slug) }}"
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
                            <span class="bg-gray-300 cursor-pointer hover:bg-gray-400 mx-1 px-3 py-1 rounded-full leading-10">
                            #{{ $keyword }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Site Comments -->
                <div class="post-a-comment-area bg-white p-4">
                    @comments(['model' => $video])
                    <!-- Youtube Comments -->
                    @if($commentThreads !== false)
                        @include('videos.comments.youtube_comment')
                    @endif
                </div>
            @endif
        </div>
        @if ($ortherInPlaylist != '')
        <div class="col-span-12 lg:col-span-4">
            <div class="flex items-center justify-between w-full my-4">
                <p class="font-bold text-2xl">Tiếp theo</p>
                <div class="flex">
                    <label for="auto" class="flex items-center cursor-pointer">
                        <!-- label -->
                        <div class="mr-3 text-gray-700 font-medium">
                            Tự động phát
                        </div>
                        <!-- toggle -->
                        <div class="relative">
                            <!-- input -->
                            <input id="auto" type="checkbox" class="sr-only" checked/>
                            <!-- line -->
                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                            <!-- dot -->
                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow-md -left-1 -top-1 transition"></div>
                        </div>
                    </label>
                    <svg class="cursor-pointer duration-300 ease-out h-6 ml-3 transform transition w-6 lg:hidden" id="collapse-list"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

            </div>
            <div id="playlist">
                <div class="border h-lg mb-10 overflow-y-auto p-2 rounded-lg scrollbar scrollbar-thin scrollbar-thumb-primary-lighter scrollbar-track-gray-100 space-y-2 scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
                    @foreach($ortherInPlaylist as $other)
                        @if($other->id == $video->id)
                            <div class="bg-gray-200 flex p-2 rounded-lg border-b border-gray-200" id="played">
                                <div class="relative">
                                    <img class="aspect-video object-cover min-w-[8rem] max-w-[8rem] rounded-md"
                                         src="{{ $other->thumbnail }}" alt="{{ $other->title }}">
                                    <img class="bg-white rounded-full p-1 w-6 h-6 absolute bottom-2.5 left-2"
                                         src="{{ asset('img/core-img/audio-play.gif') }}">
                                </div>
                                <div class="ml-2">
                                    <p class="font-bold">{{ \Illuminate\Support\Str::limit($other->title, 70) }}</p>
                                    <p class="text-gray-500 text-xs">
                                    <span>
                                        {{ $other->view_count }} lượt xem •
                                        @if ($other->created_at->isToday())
                                            {{ $other->created_at->diffForHumans() }}
                                        @elseif ($other->created_at->isYesterday())
                                            Hôm qua lúc {{ $other->created_at->format('H:i') }}
                                        @else
                                            {{ $other->created_at->format('d \\t\\h\\g m, Y') }}
                                        @endif
                                    </span>
                                    </p>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('videos.show', $other->slug) }}"
                               class="bg-white hover:bg-gray-200 border-b border-gray-200 flex p-2 rounded-lg">
                                <div class="">
                                    <img class="aspect-video object-cover min-w-[8rem] max-w-[8rem] rounded-md"
                                         src="{{ $other->thumbnail }}" alt="{{ $other->title }}">
                                </div>
                                <div class="ml-2">
                                    <p class="font-bold">{{ \Illuminate\Support\Str::limit($other->title, 70) }}</p>
                                    <p class="text-gray-500 text-xs">
                                    <span>
                                        {{ $other->view_count }} lượt xem •
                                        @if ($other->created_at->isToday())
                                            {{ $other->created_at->diffForHumans() }}
                                        @elseif ($other->created_at->isYesterday())
                                            Hôm qua lúc {{ $other->created_at->format('H:i') }}
                                        @else
                                            {{ $other->created_at->format('d \\t\\h\\g m, Y') }}
                                        @endif
                                    </span>
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8">
            <p class="my-5">{!! str_replace("\n", '<br>', $video->description) !!}</p>
            <div class="border-t py-3">
                <div class="flex justify-between">
                    <span class="font-bold">Nguồn: KARATE LEAGUE DOJO</span>
                    <div class="fb-like" data-href="{{ route('videos.show', $video->slug) }}"
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
                        <span class="bg-gray-300 cursor-pointer hover:bg-gray-400 mx-1 px-3 py-1 rounded-full leading-10">
                            #{{ $keyword }}
                        </span>
                    @endforeach
                </div>
            </div>
            <!-- Site Comments -->
            <div class="post-a-comment-area bg-white p-4">
                @comments(['model' => $video])
                <!-- Youtube Comments -->
                @if($commentThreads !== false)
                    @include('videos.comments.youtube_comment')
                @endif
            </div>
        </div>
        @endif

        <div class="col-span-12 lg:col-span-4">
            <p class="font-bold text-2xl my-4">Video khác</p>
            <div class="border mb-10 p-2 rounded-lg video-scroll">
                @foreach($ortherInChanel as $other)
                    @include('videos.other_item', ['other' => $other])
                @endforeach
            </div>
        </div>
    </div>

    @push('head-script')
        <script type="text/javascript" src="{{ asset('js/site/infinite-scroll.pkgd.min.js') }}"></script>
    @endpush
    @push('script')
        <script src="https://www.youtube.com/player_api"></script>
        <script async defer crossorigin="anonymous" nonce="Cc5ePpnC"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=470070003944545&autoLogAppEvents=1">
        </script>
        <script>
            var player;
            var auto = true;
            $(document).ready(function() {
                $('#playlist').scrollTop($('#played')[0].offsetTop - $('#playlist')[0].offsetTop);
                $('#auto').change(function() {
                    if ($(this).is(':checked')) {
                        auto = true;
                    } else {
                        auto = false;
                    }
                });

                $('#collapse-list').click(function () {
                    $(this).toggleClass('rotate-180');
                    $('#playlist').slideToggle(300);
                });
            });

            // create youtube player
            function onYouTubePlayerAPIReady() {
                player = new YT.Player('player', {
                    width: '',
                    height: '',
                    videoId: '{{ $video->youtubeId }}',
                    playerVars: {
                        'autoplay': 1,
                        'rel': 0
                    },
                    events: {
                        onReady: onPlayerReady,
                        onStateChange: onPlayerStateChange
                    }
                });
            }

            // autoplay video
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            // when video ends
            function onPlayerStateChange(event) {
                if ('{{ $nextVideo }}' !== '' && auto && event.data === 0) {
                    location.href = "{{ route('videos.show', $nextVideo) }}";
                }
            }
        </script>

        <script type="text/javascript">
            // init Infinite Scroll
            $('.video-scroll').infiniteScroll({
                path: function() {
                    if (this.loadCount < {{$ortherInChanel->total() / setting('app.other_in_chanel')}}) {
                        return '?page=' + (this.loadCount + 2);
                    }
                },
                append: '.other-item',
                hideNav: '.pagination',
                scrollThreshold: 200,
            });
        </script>
    @endpush


@endsection
