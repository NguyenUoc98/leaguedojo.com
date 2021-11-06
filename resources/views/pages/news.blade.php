@extends('layouts.master')
@section('page_title', 'Tin tức')

@section('content')

    @php
        use Carbon\Carbon;
        Carbon::setlocale('vi');
    @endphp

    <!-- Slide Advertisement -->
    <div class="hero-area owl-carousel">
        @foreach($slides as $slide)
            <div class="hero-blog-post bg-img"
                 style="background-image: url({{ Voyager::image($slide->image) }});"></div>
        @endforeach
    </div>

    <!-- Body -->
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- Main -->
        <div class="mag-posts-content mt-30 mb-30 p-4 box-shadow">

            <!-- Feature Posts -->
            <div class="feature-video-posts mb-30">

                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Tin tức mới</h5>
                </div>
                <div class="featured-video-posts">
                    <div class="row">
                        @if(count($latestPost) != 0)
                            <div class="col-12 col-lg-7">
                                <!-- Single Featured Post -->
                                <div class="single-featured-post">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail thumbnail mb-3">
                                        <a href="{{ route('posts.show', $latestPost[0]->slug) }}">
                                            @if($latestPost[0]->is_crawl)
                                                <img
                                                    src="{{ Voyager::image(json_decode($latestPost[0]->image)[0] ?? $latestPost[0]->category->image) }}"
                                                    alt="{{ $latestPost[0]->title }}">
                                            @else
                                                <img
                                                    src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[0]->image)[0] ?? $latestPost[0]->category->image)) }}"
                                                    alt="{{ $latestPost[0]->title }}">
                                            @endif
                                        </a>
                                    </div>

                                    <!-- Post Contetnt -->
                                    <div class="post-content">
                                        <a href="{{ route('posts.show', $latestPost[0]->slug) }}"
                                           class="post-title">{{ $latestPost[0]->title }}</a>
                                        <div class="post-meta">
                                    <span style="color: #ed3939;">
                                        @if ($latestPost[0]->created_at->isToday())
                                            {{ $latestPost[0]->created_at->diffForHumans() }}
                                        @elseif ($latestPost[0]->created_at->isYesterday())
                                            Hôm qua lúc {{ $latestPost[0]->created_at->format('H:i') }}
                                        @else
                                            {{ $latestPost[0]->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                        @endif
                                    </span>
                                        </div>
                                        <div class="excerpt">
                                            <p>{!! $latestPost[0]->excerpt !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5">

                                <!-- Featured Posts Slide -->
                                <div class="featured-video-posts-slide owl-carousel">
                                    <div class="single--slide ">
                                    @for($i = 1; $i < count($latestPost); $i++) <!-- Single Blog Post -->
                                        <div class="single-blog-post d-flex style-3">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('posts.show', $latestPost[$i]->slug) }}">
                                                    @if($latestPost[$i]->is_crawl)
                                                        <img
                                                            src="{{ Voyager::image(json_decode($latestPost[$i]->image)[0] ?? $latestPost[$i]->category->image) }}"
                                                            alt="{{ $latestPost[0]->title }}">
                                                    @else
                                                        <img
                                                            src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[$i]->image)[0] ?? $latestPost[$i]->category->image)) }}"
                                                            alt="{{ $latestPost[$i]->title }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <a href="{{ route('posts.show', $latestPost[$i]->slug) }}"
                                                   class="post-title">{{ $latestPost[$i]->title }}</a>
                                                <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                                    <span><i aria-hidden="true"></i> ●
                                                    @if ($latestPost[$i]->created_at->isToday())
                                                        {{ $latestPost[$i]->created_at->diffForHumans() }}
                                                    @elseif ($latestPost[$i]->created_at->isYesterday())
                                                        Hôm qua lúc {{ $latestPost[$i]->created_at->format('H:i') }}
                                                        @else
                                                        {{ $latestPost[$i]->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        {{ views($latestPost[$i])->count() }}</a>
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        {{ $latestPost[$i]->comments->count() }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-center w-100">Không có bài viết nào</p>
                        @endif
                    </div>

                    @livewire('latest-post')
                </div>
            </div>

            <!-- ad_ngang -->
            <ins class="adsbygoogle mb-3"
                 style="display:inline-block;width:100%;height:90px"
                 data-ad-client="ca-pub-1747924550904432"
                 data-ad-slot="9889684921"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <!-- Most Viewed -->
            <div class="most-viewed-videos">
                <div class="section-heading">
                    <h5>Xem nhiều</h5>
                </div>

                <!-- Most Viewed Video -->
                <div class="trending-post-slides owl-carousel mb-30">
                    @foreach($orderVideos as $video)
                        <div class="single-blog-post style-4">
                            <div class="post-thumbnail thumbnail-hd">
                                <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
                                <a href="{{ route('videos.show', $video->slug) }}" class="video-play">
                                    <i class="fa fa-play"></i></a>
                                <span class="video-quality">HD</span>
                                <span class="video-duration">{{ TimeYoutube::duration($video->duration) }}</span>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('videos.show', $video->slug) }}"
                                   class="post-title">{{ $video->title }}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                        {{ $video->view_count }}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        {{ $video->like_count}}</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                        {{ $video->comment_count + $video->comments->count() }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Most Viewed Post -->
                <div class="row">
                    @foreach($mostViewed as $post)
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post d-flex style-3 mb-30">
                                <div class="post-thumbnail">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        @if($post->is_crawl)
                                            <img
                                                src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                                                alt="{{ $latestPost[0]->title }}">
                                        @else
                                            <img
                                                src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                                                alt="{{ $post->title }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                       class="post-title">{{ $post->title }}</a>
                                    <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                        <span><i aria-hidden="true"></i> ●
                                        @if ($post->created_at->isToday())
                                            {{ $post->created_at->diffForHumans() }}
                                        @elseif ($post->created_at->isYesterday())
                                            Hôm qua lúc {{ $post->created_at->format('H:i') }}
                                            @else
                                            {{ $post->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                            @endif
                                            </sapn>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-eye"
                                                       aria-hidden="true"></i> {{ views($post)->count() }}</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                            {{ $post->comments->count() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ad_ngang -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:100%;height:90px"
                 data-ad-client="ca-pub-1747924550904432"
                 data-ad-slot="9889684921"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <!-- Dojos -->
            <div class="trending-now-posts mb-30 mt-30">
                <div class="section-heading">
                    <h5>Các cơ sở tập luyện</h5>
                </div>
                <div class="trending-post-slides owl-carousel">
                    @foreach($dojos as $dojo)
                        <div class="single-trending-post thumbnail">
                            @php
                                $images = json_decode($dojo->image);
                            @endphp
                            <img src="{{ Voyager::image($images[0]) }}" alt="{{ $dojo->name }}">
                            <div class="post-content">
                                <a href="{{ route('dojos.show', $dojo->slug) }}" class="post-title">
                                    <span>{{ $dojo->name }}</span><br>
                                    <span
                                        style="font-size:12px">{{ number_format($dojo->tuitionPolicys()->where('date_apply', '<=', \Carbon\Carbon::now()->format('Y-m') . '-01')->first()->price, 0, '', '.') . ' VNĐ/tháng' }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ad_ngang -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:100%;height:90px"
                 data-ad-client="ca-pub-1747924550904432"
                 data-ad-slot="9889684921"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <!-- Right Sidebar -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            @include('layouts.sidebar_widget')
        </div>
    </section>
@endsection
