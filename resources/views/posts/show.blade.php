@extends('layouts.master')
@section('page_title', $post->title)

@section('content')

@php
use Carbon\Carbon;
Carbon::setlocale('vi');
$images = json_decode($post->image);
@endphp

<style>
@media (max-width: 799px) {
    .single-sidebar-widget {
        display: none !important;
    }
}
figure , iframe {
    max-width: 100%;
}

figcaption {
    text-align: center;
    margin-top: 10px;
}
</style>

@if($post->is_crawl)
    <style>
        .post-detail-area img {
            width: 100%;
        }
    </style>
@endif

<!-- Image Header -->
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url({{ Voyager::image($post->category->image) }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $post->category->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="post-detail-area">
    <div class="container">

        <!-- Post Detail -->
        <div class="row justify-content-center pt-30">

            <!-- Content -->
            <div class="col-12 col-lg-8 col-xl-8 md-p-0">

                <div class="post-detail-content bg-white box-shadow">
                    <div class="blog-thumb">

                        <!-- Image Slide -->
                        @if (!empty($images))
                        <div id="jssor_1"
                            style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:600px;overflow:hidden;visibility:hidden;">
                            <div data-u="slides"
                                style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:600px;overflow:hidden;">
                                @foreach($images as $image)
                                <div>
                                    <img data-u="image" src="{{ Voyager::image($image) }}" alt="{{ $post->slug }}" />
                                </div>
                                @endforeach
                            </div>

                            <!-- Bullet Navigator -->
                            <div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;"
                                data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                                <div data-u="prototype" class="i"
                                    style="width:24px;height:24px;font-size:12px;line-height:24px;">
                                    <svg viewbox="0 0 16000 16000"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                                        <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
                                    </svg>
                                    <div data-u="numbertemplate" class="n"></div>
                                </div>
                            </div>

                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora073" style="width:40px;height:50px;top:0px;left:30px;"
                                data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                <svg viewbox="0 0 16000 16000"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a"
                                        d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z">
                                    </path>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora073"
                                style="width:40px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75"
                                data-scale-right="0.75">
                                <svg viewbox="0 0 16000 16000"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a"
                                        d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Route of post -->
                    <div class="col-12 p-0">
                        <div class="pt-breadcrumb">
                            <div class="breadcrumb box-shadow mb-0">
                                <a href="{{ route('home') }}" class="mr-2"><i class="fa fa-home mr-1"
                                        aria-hidden="true"></i>Trang chủ</a>
                                <span> / </span>
                                <a href="{{ route('news') }}" class="mr-2 ml-2"></i>Tin tức</a>
                                <span> / </span>
                                <a href="#" class="mr-2 ml-2">{{ $post->category->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-detail-content bg-white mb-30 p-4 box-shadow">
                    <div class="blog-content">
                        <h4 class="post-title">{{ $post->title }}</h4>

                        <!-- Post Meta -->
                        <div class="post-meta-2 mb-3" style="color: #ed3939">
                            <span> ●
                                @if ($post->updated_at->isToday())
                                {{ $post->updated_at->diffForHumans() }}
                                @elseif ($post->updated_at->isYesterday())
                                Hôm qua lúc {{ $post->updated_at->format('H:i') }}
                                @else
                                {{ $post->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                @endif
                            </span>
                            <span><i class="fa fa-eye ml-2" aria-hidden="true"></i>
                                {{ views($post)->count() }} lượt xem
                            </span>
                            <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                            <span><i class="fa fa-comments-o ml-2" aria-hidden="true"></i>
                                {{ $post->comments->count() }} bình luận
                            </span>
                        </div>

                        {!! $post->body !!}

                        <span><i class="fa fa-tags" aria-hidden="true"></i> Từ khóa: </span>
                        @foreach($keywords as $keyword)
                        <span style="line-height: 1.5;">
                            <span class="label label-dark">{{ $keyword }}</span>
                        </span>
                        @endforeach

                        <!-- Post Author -->
                        <div class="post-author d-flex justify-content-between mt-1">
                            <a href="#" class="author-name">Nguồn: {{ $post->source }}</a>
                            <div class="fb-like" data-href="{{ config('app.url').'/posts/'.$post->slug }}"
                                data-width="" data-layout="button_count" data-action="like" data-size="small"
                                data-share="true"></div>
                        </div>
                    </div>
                </div>

                <!-- ad_ngang -->
                <ins class="adsbygoogle"
                    style="display:inline-block;width:100%;height:100px"
                    data-ad-client="ca-pub-1747924550904432"
                    data-ad-slot="9889684921"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

                <!-- More Post In The Same Category -->
                <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-0 box-shadow">
                    <div class="section-heading">
                        <h5>Bài viết liên quan</h5>
                    </div>

                    <!-- Content -->
                    <div class="most-viewed-videos mb-30">
                        <div class="most-viewed-videos-slide owl-carousel">
                            @foreach($morePosts as $morePost)
                            <div class="single-blog-post style-4" style="padding-bottom:30px">
                                <div class="post-thumbnail thumbnail">
                                    <a href="{{ route('posts.show',$morePost->slug) }}">
                                        <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($morePost->image)[0] ?? $morePost->category->image)) }}"
                                            alt="{{ $morePost->slug }}">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('posts.show',$morePost->slug) }}"
                                        class="post-title">{{ $morePost->title }}</a>
                                    <div class="post-meta d-flex" style="font-size: 12px; margin-bottom: 8px;">
                                        <span><i aria-hidden="true"></i> ●
                                            @if ($morePost->updated_at->isToday())
                                            {{ $morePost->updated_at->diffForHumans() }}
                                            @elseif ($morePost->updated_at->isYesterday())
                                            Hôm qua lúc {{ $morePost->updated_at->format('H:i') }}
                                            @else
                                            {{ $morePost->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                            @endif
                                            </sapn>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            {{ views($morePost)->count() }}
                                        </a>
                                        <!-- <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a> -->
                                        <a href="#">
                                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                                            {{ $morePost->comments->count() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="related-post-area bg-white p-30 mb-30 box-shadow">
                    @comments(['model' => $post])
                </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="right-sidebar bg-white mb-md-4 box-shadow" style="overflow: hidden;">
                    @include('layouts.sidebar_widget')
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JS Slider -->
<script src="/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
<script src="/js/jssor-slide.js" type="text/javascript"></script>

@endsection
