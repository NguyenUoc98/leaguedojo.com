@extends('layouts.master')
@section('page_title', 'Video')

@section('content')

    <div class="container">
        <div class="bg-white border-2 border-dashed border-gray-400 lg:flex mt-5 p-4 rounded-lg shadow-md">
            <div class="single-video-area lg:w-1/2 md:w-2/3 mx-auto">
                <div id="player" class="mx-auto w-full h-52 md:h-72 lg:h-96"></div>
            </div>
            <div class="space-y-3 lg:ml-5 lg:w-1/2">
                <p class="font-bold text-2xl my-4">{{ $newestFeatured->title }}</p>
                <div>
                    <p class="text-gray-500">{{ $newestFeatured->created_at->format('d \\t\\h\\g m, Y') }} |
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        {{ $newestFeatured->view_count }} lượt xem
                    </p>
                    <p class="flex text-gray-500 space-x-4">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ TimeYoutube::duration($newestFeatured->duration) }}
                        </span>
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path
                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                            </svg>
                            {{ $newestFeatured->like_count }}
                        </span>
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            {{ $newestFeatured->comment_count }}
                        </span>
                    </p>
                </div>
                <p>{!! str_replace("\n", '<br>', $newestFeatured->description) !!}</p>
            </div>
        </div>

        <!-- FAMOUS KARATE CHANNELS -->
        <div class="mt-10">
            <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Kênh Karate nổi tiếng</p>
            <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="border md:col-span-1 lg:col-span-2 rounded-lg shadow-md overflow-hidden">
                    <img class="h-1/2 object-cover"
                         src="{{ asset('img/channel-youtube/wkf-banner.jpg') }}" alt="World Karate Federation">
                    <div class="border-primary border-t-4 flex items-center p-4 space-x-2">
                        <img class="w-14 h-14 rounded-full"
                             src="{{ asset('img/channel-youtube/wkf-avatar.jpg') }}" alt="World Karate Federation"
                             class="profile-img">
                        <div class="profile-body">
                            <a href="https://www.youtube.com/user/WKFKarateWorldChamps">
                                <span style="font-size:20px">World Karate Federation</span><br>
                                <small>430 N người đăng ký</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg shadow-md overflow-hidden">
                    <img class="h-1/2 object-cover"
                         src="{{ asset('img/channel-youtube/teamki-banner.jpg') }}" alt="World Karate Federation">
                    <div class="border-primary border-t-4 flex items-center p-4 space-x-2">
                        <img class="w-14 h-14 rounded-full"
                             src="{{ asset('img/channel-youtube/teamki-avatar.jpg') }}" alt="World Karate Federation"
                             class="profile-img">
                        <div class="profile-body">
                            <a href="https://www.youtube.com/channel/UCGOrdqwEk_sTKBw5vPv4WrQ">
                                <span style="font-size:20px">TEAM KI</span><br>
                                <small>46,3 N người đăng ký</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg shadow-md overflow-hidden">
                    <img class="h-1/2 object-cover"
                         src="{{ asset('img/channel-youtube/jesse-banner.jpg') }}" alt="World Karate Federation">
                    <div class="border-primary border-t-4 flex items-center p-4 space-x-2">
                        <img class="w-14 h-14 rounded-full"
                             src="{{ asset('img/channel-youtube/jesse-avatar.jpg') }}" alt="World Karate Federation"
                             class="profile-img">
                        <div class="profile-body">
                            <a href="https://www.youtube.com/user/KARATEbyJesse">
                                <span style="font-size:20px">Jesse Enkamp</span><br>
                                <small>167 N người đăng ký</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PLAYLISTS -->
        <div class="mt-10">
            <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">Danh sách phát
                <small>({{ count($playlists) }} danh sách)</small></p>
            <div class="grid lg:grid-cols-3 mg:grid-cols-2 gap-4">
                @foreach($playlists as $playlist)
                    <div class="bg-white rounded-lg border relative">
                        <img class="h-56 object-cover w-full rounded-t-lg"
                             src="{{ $playlist->videos[0]->thumbnail ?? asset('img/playlist/default.png') }}"
                             alt="{{ $playlist->name }}">
                        <span class="absolute bg-primary px-4 py-1 right-2 rounded-full text-white top-2 shadow-md">{{ count($playlist->videos) }} video</span>
                        <div class="border-t-4 border-primary p-4 space-y-3">
                            <a class="font-semibold md:text-lg text-black"
                               href="{{ route('videos.show', $playlist->videos[0]->slug ?? '') }}">{{ $playlist->name }}</a>
                            <p>KARATE LEAGUE DOJO</p>
                            <small>{{ $playlist->updated_at->format('d \\t\\h\\g m, Y') }}</small>
                            <a class="absolute right-4 text-primary bottom-4 shadow-md rounded-full hover:text-primary-darker"
                               href="{{ route('videos.show', $playlist->videos[0]->slug ?? '') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 transform scale-125"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- VIDEOS -->
        <div class="mt-10">
            <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2">
                Video <small>({{ $listVideo->total() }} video)</small></p>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 gap-4 video-scroll">
                @foreach($listVideo as $video)
                    @include('videos.item_video', ['video' => $video])
                @endforeach
            </div>

            <!-- status elements -->
            <div class="page-load-status text-center">
                <div class="infinite-scroll-request">
                    <img height="60px" width="60px" src="{{ asset('img/core-img/loading.gif') }}" class="mx-auto">
                </div>
            </div>
        </div>
    </div>

    @push('head-script')
        <script type="text/javascript" src="{{ asset('js/site/infinite-scroll.pkgd.min.js') }}"></script>
    @endpush

    @push('script')
        <script src="https://www.youtube.com/player_api"></script>
        <script>
            // create youtube player
            function onYouTubePlayerAPIReady() {
                player = new YT.Player('player', {
                    width: '640',
                    height: '390',
                    videoId: '{{ $newestFeatured->youtubeId }}',
                    playerVars: {
                        'autoplay': 1,
                        'rel': 0,
                        'controls': 0
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

            function onPlayerStateChange(event) {
                if (event.data === 0) {
                    player.playVideo();
                }
            }

            // init Infinite Scroll
            $('.video-scroll').infiniteScroll({
                path: function () {
                    if (this.loadCount < {{ $listVideo->total() / 8 }}) {
                        return '?page=' + (this.loadCount + 2);
                    }
                },
                append: '.item-video',
                status: '.page-load-status',
                hideNav: '.pagination',
                scrollThreshold: 200,
            });
        </script>
    @endpush
@endsection
