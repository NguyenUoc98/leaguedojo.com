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
    <div class="hero-blog-post bg-img" style="background-image: url({{ Voyager::image($slide->image) }});"></div>
    @endforeach
</div>

<!-- Body -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- Left Sidebar -->
    <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow ">
        @include('layouts.sidebar_widget')
    </div>

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
                                    <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[0]->image)[0] ?? $latestPost[0]->category->image)) }}"
                                        alt="{{ $latestPost[0]->title }}">
                                </a>
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <a href="{{ route('posts.show', $latestPost[0]->slug) }}"
                                    class="post-title">{{ $latestPost[0]->title }}</a>
                                <div class="post-meta">
                                    <span style="color: #ed3939;">
                                        @if ($latestPost[0]->updated_at->isToday())
                                        {{ $latestPost[0]->updated_at->diffForHumans() }}
                                        @elseif ($latestPost[0]->updated_at->isYesterday())
                                        Hôm qua lúc {{ $latestPost[0]->updated_at->format('H:i') }}
                                        @else
                                        {{ $latestPost[0]->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="excerpt">
                                    <p>{!! $latestPost[0]->excerpt !!}</p>
                                </div>
                            </div>

                            <!-- Post Share Area -->
                            <div class="post-share-area d-flex align-items-center justify-content-between">
                                <div class="post-meta pl-3">
                                    <a href="#">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        {{ views($latestPost[0])->count() }}
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                        {{ $latestPost[0]->comments->count() }}
                                    </a>
                                </div>

                                <!-- Share Info -->
                                <div class="share-info">
                                    <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    <div class="all-share-btn d-flex">
                                        <a href="#" class="facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" class="google-plus"><i class="fa fa-google-plus"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="instagram"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">

                        <!-- Featured Posts Slide -->
                        <div class="featured-video-posts-slide owl-carousel">
                            @if (count($latestPost)>5)
                            <div class="single--slide">
                                @for ($i = 1; $i < 6; $i++) <!-- Single Blog Post -->
                                    <div class="single-blog-post d-flex style-3">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}">
                                                <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[$i]->image)[0] ?? $latestPost[$i]->category->image)) }}"
                                                    alt="{{ $latestPost[$i]->title }}">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}"
                                                class="post-title">{{ $latestPost[$i]->title }}</a>
                                            <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                                <span><i aria-hidden="true"></i> ●
                                                    @if ($latestPost[$i]->updated_at->isToday())
                                                    {{ $latestPost[$i]->updated_at->diffForHumans() }}
                                                    @elseif ($latestPost[$i]->updated_at->isYesterday())
                                                    Hôm qua lúc {{ $latestPost[$i]->updated_at->format('H:i') }}
                                                    @else
                                                    {{ $latestPost[$i]->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                                    @endif
                                                    </sapn>
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

                            <div class="single--slide ">
                                @for ($i = 6; $i < count($latestPost); $i++) <!-- Single Blog Post -->
                                    <div class="single-blog-post d-flex style-3">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}">
                                                <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[$i]->image)[0] ?? $latestPost[$i]->category->image)) }}"
                                                    alt="{{ $latestPost[$i]->title }}">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}"
                                                class="post-title">{{ $latestPost[$i]->title }}</a>
                                            <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                                <span><i aria-hidden="true"></i> ●
                                                    @if ($latestPost[$i]->updated_at->isToday())
                                                    {{ $latestPost[$i]->updated_at->diffForHumans() }}
                                                    @elseif ($latestPost[$i]->updated_at->isYesterday())
                                                    Hôm qua lúc {{ $latestPost[$i]->updated_at->format('H:i') }}
                                                    @else
                                                    {{ $latestPost[$i]->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                                    @endif
                                                    </sapn>
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
                            @else
                            <div class="single--slide ">
                                @for($i = 1; $i < count($latestPost); $i++) <!-- Single Blog Post -->
                                    <div class="single-blog-post d-flex style-3">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}">
                                                <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($latestPost[$i]->image)[0] ?? $latestPost[$i]->category->image)) }}"
                                                    alt="{{ $latestPost[$i]->title }}">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ route('posts.show', $latestPost[$i]->slug) }}"
                                                class="post-title">{{ $latestPost[$i]->title }}</a>
                                            <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                                <span><i aria-hidden="true"></i> ●
                                                    @if ($latestPost[$i]->updated_at->isToday())
                                                    {{ $latestPost[$i]->updated_at->diffForHumans() }}
                                                    @elseif ($latestPost[$i]->updated_at->isYesterday())
                                                    Hôm qua lúc {{ $latestPost[$i]->updated_at->format('H:i') }}
                                                    @else
                                                    {{ $latestPost[$i]->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                                    @endif
                                                    </sapn>
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
                            @endif
                        </div>
                    </div>
                    @else
                    <p class="text-center w-100">Không có bài viết nào</p>
                    @endif
                </div>
            </div>
        </div>

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
                        <a href="{{ route('videos.show', $video->slug) }}" class="post-title">{{ $video->title }}</a>
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
                <div class="col-12 col-lg-6">
                    <div class="single-blog-post d-flex style-3 mb-30">
                        <div class="post-thumbnail">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                                    alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="post-content">
                            <a href="{{ route('posts.show', $post->slug) }}" class="post-title">{{ $post->title }}</a>
                            <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                                <span><i aria-hidden="true"></i> ●
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
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ views($post)->count() }}</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                    {{ $post->comments->count() }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Dojos -->
        <div class="trending-now-posts mb-30">
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
                            <span style="font-size:12px">{{ number_format($dojo->tuitionPolicys()->where('date_apply', '<=', \Carbon\Carbon::now()->format('Y-m') . '-01')->first()->price, 0, '', '.') . ' VNĐ/tháng' }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ad_ngang -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-1747924550904432"
            data-ad-slot="9889684921"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <!-- Right Sidebar -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">

        <!-- Feature Post -->
        <div class="single-sidebar-widget p-4">
            <div class="section-heading">
                <h5>Tin nổi bật</h5>
            </div>
            @foreach($mostFeatured as $post)
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                            alt="{{ $post->title }}">
                        <a>
                </div>
                <div class="post-content">
                    <a href="{{ route('posts.show', $post->slug) }}" class="post-title"
                        style="margin-bottom: 0;">{{ $post->title }}</a>
                    <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                        <span><i aria-hidden="true"></i> ●
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
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ views($post)->count() }}</a>
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                            {{ $post->comments->count() }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- New Video -->
        <div class="single-sidebar-widget p-4">
            <div class="section-heading">
                <h5>Video mới</h5>
            </div>
            @foreach($latestVideos as $video)
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail" style="max-height: 57px; overflow: hidden;">
                    <a href="{{ route('videos.show', $video->slug) }}">
                        <img src="{{ $video->thumbnail }}" style="transform: scale3d(1.2, 1.35, 1.2);"
                            alt="{{ $video->title }}">
                        <span class="video-quality">HD</span>
                        <span class="video-duration">{{ TimeYoutube::duration($video->duration) }}</span>
                    </a>
                </div>
                <div class="post-content">
                    <a href="{{ route('videos.show', $video->slug) }}" class="post-title">
                        {{ $video->title }}
                    </a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                            {{ $video->view_count }}</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            {{ $video->like_count }}</a>
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                            {{ $video->comment_count + $video->comments->count() }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
