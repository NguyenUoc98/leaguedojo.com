@extends('layouts.master')
@section('page_title', 'Video')

@section('content')

<div class="container">
    <div class="row py-4 md-p-0">
        <div class="col-12 col-lg-7 col-xl-7 md-p-0">
            <div class="single-video-area">
                <div id="player" class="py-lg-3"></div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 py-lg-3 md-p-0">
            <div class="feature-video-content">
                <h4>{{ $newestFeatured->title }}</h4>
                <p>{{ $newestFeatured->view_count }} lượt xem ●
                    {{ $newestFeatured->created_at->format('d \\t\\h\\g m, Y') }}</p>
                <p>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ TimeYoutube::duration($newestFeatured->duration) }}
                    <i class="fa fa-thumbs-o-up ml-2" aria-hidden="true"></i>
                    {{ $newestFeatured->like_count }}
                    <i class="fa fa-comments-o ml-2" aria-hidden="true"></i>
                    {{ $newestFeatured->comment_count }}
                </p>
                <p>{!! str_replace("\n", '<br>', $newestFeatured->description) !!}</p>
            </div>
        </div>
    </div>

    <!-- FAMOUS KARATE CHANNELS -->
    <div class="related-post-area">
        <div class="section-heading bg-white">
            <h5>Kênh Karate nổi tiếng</h5>
        </div>

        <div class="row">
            <div class="single-featured-post style-4 col-lg-6 mb-30">
                <div class="orther-video post-thumbnail" style="min-height:70px;width: 100% !important;max-width: unset !important;border-bottom: 3px solid #ed3939">
                    <img src="/img/channel-youtube/wkf-banner.jpg" alt="World Karate Federation">
                </div>
                <div class="post-content d-flex px-3 py-2 bg-white">
                    <img src="/img/channel-youtube/wkf-avatar.jpg" alt="World Karate Federation" class="profile-img">
                    <div class="profile-body">
                        <a href="https://www.youtube.com/user/WKFKarateWorldChamps">
                            <span style="font-size:20px">World Karate Federation</span><br>
                            <small>430 N người đăng ký</small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="single-featured-post style-4 col-lg-3 col-md-6 mb-30">
                <div class="orther-video post-thumbnail" style="min-height:70px;width: 100% !important;max-width: unset !important;border-bottom: 3px solid #ed3939">
                    <img src="/img/channel-youtube/teamki-banner.jpg" alt="TEAM KI">
                </div>
                <div class="post-content d-flex px-3 py-2 bg-white">
                    <img src="/img/channel-youtube/teamki-avatar.jpg" alt="TEAM KI" class="profile-img">
                    <div class="profile-body">
                        <a href="https://www.youtube.com/channel/UCGOrdqwEk_sTKBw5vPv4WrQ">
                            <span style="font-size:18px">TEAM KI</span><br>
                            <small>46,3 N người đăng ký</small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="single-featured-post style-4 col-lg-3 col-md-6 mb-30">
                <div class="orther-video post-thumbnail" style="min-height:70px;width: 100% !important;max-width: unset !important;border-bottom: 3px solid #ed3939">
                    <img src="/img/channel-youtube/jesse-banner.jpg" alt="Jesse Enkamp">
                </div>
                <div class="post-content d-flex px-3 py-2 bg-white">
                    <img src="/img/channel-youtube/jesse-avatar.jpg" alt="Jesse Enkamp" class="profile-img">
                    <div class="profile-body">
                        <a href="https://www.youtube.com/user/KARATEbyJesse">
                            <span style="font-size:18px">Jesse Enkamp</span><br>
                            <small>167 N người đăng ký</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PLAYLISTS -->
    <div class="related-post-area">
        <div class="section-heading bg-white">
            <h5>Playlist <small>({{ count($playlists) }} playlist)</small> </h5>
        </div>

        <div class="most-viewed-videos mb-30">
            <div class="most-viewed-videos-slide owl-carousel">
                @foreach($playlists as $playlist)
                <div class="single-blog-post style-4 bg-white">
                    <div class="post-thumbnail thumbnail-hd" style="border-bottom: 5px solid #1caf5e">
                        <img src="{{ $playlist->videos[0]->thumbnail ?? '/img/playlist/default.png' }}" alt="{{ $playlist->name }}">
                        <div class="tag">{{ count($playlist->videos) }} video</div>
                    </div>
                    <a href="{{ route('videos.show', $playlist->videos[0]->slug ?? '') }}" class="playlist-play">
                        <i class="fa fa-play"></i>
                    </a>
                    <div class="post-content p-3 text-center" style="height: 120px;">
                        <a href="{{ route('videos.show', $playlist->videos[0]->slug ?? '') }}" class="post-title">{{ $playlist->name }}</a>
                        <span style="color: #1caf5e;">KARATE LEAGUE DOJO</span><br>
                        <small>{{ $playlist->updated_at->format('d \\t\\h\\g m, Y') }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- VIDEOS -->
    <div class="related-post-area">
        <div class="section-heading bg-white">
            <h5>Video <small>({{ $listVideo->total() }} video)</small></h5>
        </div>

        <div class="most-viewed-videos mb-30">
            <div class="row video-scroll">
                @foreach($listVideo as $video)
                @include('videos.item_video', ['video' => $video])
                @endforeach
            </div>
        </div>

        <!-- status elements -->
        <div class="page-load-status text-center">
            <div class="infinite-scroll-request">
                <img height="60px" width="60px" src="/img/core-img/loading.gif">
            </div>
            <p class="infinite-scroll-last mt-3">Đã tải hết nội dung</p>
            <p class="infinite-scroll-error">Không còn gì để load</p>
        </div>

    </div>
</div>

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
        path: function() {
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

@endsection