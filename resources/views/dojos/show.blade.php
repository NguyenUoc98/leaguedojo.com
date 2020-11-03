@extends('layouts.master')
@section('page_title', $dojo->name)

@section('content')

@php
$images = json_decode($dojo->image);
@endphp

<style>
@media (max-width: 799px) {
    .single-sidebar-widget {
        display: none !important;
    }
}

.mag-btn-cmt,
.mag-btn-cmt:hover,
.mag-btn-cmt:focus {
    font-size: 13px;
}
</style>

<!-- Image Header -->
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url({{ Voyager::image(json_decode($dojo->image)[0]) }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $dojo->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container md-p-0">
    <div class="row justify-content-center mx-0">
        <div class="col-xl-8 col-lg-8 md-p-0">
            <div class="posts.shows-content bg-white mb-30 mt-30 box-shadow">
                <div class="blog-thumb">

                    <!-- Image Slide -->
                    @if (!empty($images))
                    <div id="jssor_1"
                        style="position:relative;margin:0 auto;top:0px;left:0px;width:800px;height:600px;overflow:hidden;visibility:hidden;">
                        <div data-u="slides"
                            style="cursor:default;position:relative;top:0px;left:0px;width:800px;height:600px;overflow:hidden;">
                            @foreach($images as $image)
                            <div>
                                <img data-u="image" src="{{ Voyager::image($image) }}" alt="{{ $dojo->slug }}" />
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
                        <div data-u="arrowright" class="jssora073" style="width:40px;height:50px;top:0px;right:30px;"
                            data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
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
                <div class="col-12 px-0">
                    <div class="pt-breadcrumb">
                        <div class="breadcrumb box-shadow mb-0">
                            <a href="{{ route('home') }}" class="mr-2"><i class="fa fa-home mr-1"
                                    aria-hidden="true"></i>Trang chủ</a>
                            <span> / </span>
                            <a href="{{ route('news') }}" class="mr-2 ml-2"></i>Cơ sở tập luyện</a>
                        </div>
                    </div>
                </div>

                <!-- Information of dojo -->
                <div class="p-30">
                    <div class="title text-center">
                        <h3>{{ $dojo->name }}</h3>
                    </div>
                    <table class="table table-bordered mt-30" style="font-size: 14px">
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{ $dojo->address }}</td>
                        </tr>
                        <tr>
                            <th>Bắt đầu</th>
                            <td>{{ substr($dojo->start_at, 0, -3) }}</td>
                        </tr>
                        <tr>
                            <th>Kết thúc</th>
                            <td>{{ substr($dojo->finish_at, 0, -3) }}</td>
                        </tr>
                        <tr>
                            <th>Lịch tập</th>
                            <td>
                                <?php
                                $schedule = json_decode($dojo->schedule);
                            ?>
                                @foreach($schedule as $day )
                                {{ 'Thứ '.$day.', ' }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Học phí</th>
                            <td>
                                <li>{{ number_format($policy->price, 0, '', '.').'VNĐ/tháng'}}</li>
                                <li>{{ $policy->note }}</li>
                                <li>{{ $policy->policy == 1 ? 'Bảo lưu các tháng đã nộp khi thay đổi mức học phí.' : 'Không bảo lưu các tháng đã nộp khi thay đổi mức học phí.' }}</li>
                            </td>
                        </tr>
                    </table>
                    <div class="mt-30">{!! $dojo->description !!}</div>

                    <!-- Google Map -->
                    <iframe width="100%"
                        src="https://maps.google.com/maps?&hl=vn&q={{ $dojo->address }}&ie=UTF8&z=15&output=embed"
                        height="300" frameborder="0" style="border:0" allowfullscreen>
                    </iframe>
                    <style>
                    #gmap_canvas img {
                        max-width: none !important;
                        background: none !important
                    }
                    </style>

                    <div class="col-12 mt-15 text-center">
                        <a class="btn btn-danger btn-long" style="font-size: 13px" href="{{ route('workout-registrations.create', ['dojo_id' => $dojo->id]) }}">Đăng ký</a>
                    </div>
                </div>
            </div>

            <!-- Other Dojos -->
            <div class="related-post-area bg-white mt-30 mb-30 px-30 pt-30 pb-0 box-shadow">

                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Các khóa học khác</h5>
                </div>
                <div class="trending-now-posts">
                    <div class="trending-post-slides owl-carousel">
                        @foreach($otherDojos as $otherDojo)
                        <div class="single-blog-post style-4 p-15 mb-30 m-1 box-shadow">
                            @php
                            $images = json_decode($otherDojo->image);
                            @endphp
                            <div class="post-thumbnail thumbnail">
                                <img src="{{Voyager::image($images[0])}}" alt="">
                            </div>
                            <div class="post-content">
                                <h5>{{ $otherDojo->name }}</h5>
                                <div class="post-meta d-flex">
                                    <span>{{ number_format($otherDojo->tuitionPolicys()->where('date_apply', '<=', \Carbon\Carbon::now()->format('Y-m') . '-01')->first()->price, 0, '', '.') . ' VNĐ/tháng' }}</span>
                                </div>
                            </div>
                            <div class="mt-15 text-center">
                                <a class="btn btn-long btn-info" style="font-size: 13px" href="{{ route('dojos.show', $otherDojo->slug) }}">
                                    Chi tiết
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-4 col-xl-4 md-p-0">
            <div class="right-sidebar bg-white mb-md-4 mt-md-4 box-shadow" style="overflow: hidden;">
                @include('layouts.sidebar_widget')
            </div>

            <!-- qc dọc -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-1747924550904432"
                data-ad-slot="1452436482"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</div>

<!-- JS Slider -->
<script src="/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
<script src="/js/jssor-slide.js" type="text/javascript"></script>
@endsection
