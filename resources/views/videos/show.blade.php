@extends('layouts.master')
@section('page_title', $video->title)

@section('content')

@php
use Carbon\Carbon;
Carbon::setlocale('vi');
@endphp

<style>
    .single-blog-post:hover {
        background-color: rgb(236, 236, 236);
    }
</style>
@if ($ortherInPlaylist != '')
<style>
    @media (max-width: 799px) {
        #orther-block {
            display: none !important;
        }
    }
</style>
@else
<style>
    @media only screen and (min-width: 1026px) {
        #orther-block {
            margin-top: -530px !important;
        }
    }

    @media only screen and (min-width: 800px) and (max-width: 1025px) {
        #orther-block {
            margin-top: -404px !important;
        }
    }

    @media (max-width: 799px) {
        #video-block {
            order: 1;
        }

        #content-block {
            order: 3;
        }

        #orther-block {
            order: 2;
        }

        .orther-in-chanel {
            max-height: 300px;
            overflow: scroll;
        }
    }
</style>
@endif

<section class="post-detail-area p-md-4">
    <div class="row justify-content-center d-flex w-100 mx-0">

        <!-- Video Meta Data -->
        <div class="col-12 col-lg-8 col-xl-8 md-p-0" id="video-block">
            <div class="single-video-area single-video bg-white ">
                <div id="player"></div>
                <div class="video-meta-data d-flex align-items-center justify-content-between">
                    <p class="total-views">{{ $video->view_count }} views ●
                        {{ $video->created_at->format('d \\t\\h\\g m, Y') }}</p>
                    <div class="like-dislike d-flex align-items-center">
                        <p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            {{ $video->like_count }}
                            Like</p>
                        <p><i class="fa fa-thumbs-o-down ml-3" aria-hidden="true"></i>
                            {{ $video->dislike_count }}
                            Dislike</p>
                        <p><i class="fa fa-comments-o ml-3" aria-hidden="true"></i>
                            {{ $video->comment_ount + $video->comments->count() }}
                            Comments</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orther Video In Playlist -->
        <div class="col-12 col-lg-4 col-xl-4 md-p-0">
            @if ($ortherInPlaylist != '')
            <div class="right-sidebar bg-white ">
                <div class="d-flex justify-content-between p-3">
                    <h5 style="margin-bottom: 0; font-size:16px">Tiếp theo</h5>
                    <div>
                        <span>Tự động phát</span>
                        <label class="switch mx-1">
                            <input type="checkbox" id="auto" checked>
                            <span class="slider round"></span>
                        </label>
                        <a class="angle-down" aria-hidden="true" data-toggle="collapse" href="#playlist"></a>
                    </div>
                </div>
                <div id="playlist" class="pb-4 border panel-collapse collapse show">
                    <div class="single-sidebar-widget playlist">
                        @foreach($ortherInPlaylist as $orther)
                        @if($orther->id == $video->id)
                        <div class="single-blog-post d-flex p-2 pr-4" id="played" style="border-bottom: 0;padding-bottom: 0;margin-bottom: 0; background-color: rgb(236, 236, 236)">
                            <span class="played">▶</span>
                            <div class="orther-video-pl post-thumbnail">
                                <a href="{{ route('videos.show', $orther->slug) }}">
                                    <img src="{{ $orther->thumbnail }}" alt="{{ $orther->title }}">
                                    <span class="video-quality">HD</span>
                                </a>
                            </div>
                            <div class="post-content mt-0">
                                <a href="{{ route('videos.show', $orther->slug) }}" class="post-title">
                                    {{ $orther->title }}
                                </a>
                                <div class="post-meta d-flex">
                                    <a href="#">KARATE LEAGUE DOJO</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-blog-post d-flex p-2 pr-4" style="border-bottom: 0;padding-bottom: 0;margin-bottom: 0">
                            <span class="played"></span>
                            <div class="orther-video-pl post-thumbnail">
                                <a href="{{ route('videos.show', $orther->slug) }}">
                                    <img src="{{ $orther->thumbnail }}" alt="{{ $orther->title }}">
                                    <span class="video-quality">HD</span>
                                </a>
                            </div>
                            <div class="post-content mt-0">
                                <a href="{{ route('videos.show', $orther->slug) }}" class="post-title">
                                    {{ $orther->title }}
                                </a>
                                <div class="post-meta d-flex">
                                    <a href="#">KARATE LEAGUE DOJO</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Content -->
        <div class="col-12 col-lg-8 col-xl-8 md-p-0" id="content-block">
            <!-- Route of post -->
                <div class="col-12 px-0">
                    <div class="pt-breadcrumb">
                        <div class="breadcrumb  mb-0">
                            <a href="{{ route('home') }}" class="mr-2"><i class="fa fa-home mr-1" aria-hidden="true"></i>Trang chủ</a>
                            <span> / </span>
                            <a href="{{ route('news') }}" class="mr-2 ml-2"></i>Tin tức</a>
                        </div>
                    </div>
                </div>
            <div class="post-details-content bg-white mb-30 p-4 ">
                <div class="blog-content">
                    <h4 class="post-title">{{ $video->title }}</h4>
                    <p>{!! str_replace("\n", '<br>', $video->description) !!}</p>

                    <span><i class="fa fa-tags" aria-hidden="true"></i> Từ khóa: </span>
                    @foreach($keywords as $keyword)
                    <span style="line-height: 1.5;">
                        <span class="label label-dark">{{ $keyword }}</span>
                    </span>
                    @endforeach

                    <!-- Post Author -->
                    <div class="post-author d-flex justify-content-between mt-1">
                        <a href="#" class="author-name">Nguồn: KARATE LEAGUE DOJO</a>
                        <div class="fb-like" data-href="{{ env('APP_URL').'/videos/'.$video->slug }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                    </div>
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

        <div class="col-12 col-lg-4 col-xl-4 md-p-0" id="orther-block">
            <div class="right-sidebar bg-white orther-in-chanel">
                <div class="single-sidebar-widget video-scroll">
                    @foreach($ortherInChanel as $orther)
                    @include('videos.orther_item', ['orther' => $orther])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script src="http://www.youtube.com/player_api"></script>
<script>
    var player;
    var auto = true;
    $(document).ready(function() {
        $('.playlist').scrollTop($('#played')[0].offsetTop - $('.playlist')[0].offsetTop);
        $('#auto').change(function() {
            if ($(this).is(':checked')) {
                auto = true;
            } else {
                auto = false;
            }
        });
    });

    // create youtube player
    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
            width: '640',
            height: '390',
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
            if (this.loadCount < {
                    {
                        $ortherInChanel - > total() / setting('app.orther_in_chanel')
                    }
                }) {
                return '?page=' + (this.loadCount + 2);
            }
        },
        append: '.orther-item',
        hideNav: '.pagination',
        scrollThreshold: 200,
    });
</script>

@endsection