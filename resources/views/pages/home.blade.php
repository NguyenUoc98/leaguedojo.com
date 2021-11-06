<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8"/>
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{ $url_canonical }}"/>
    <meta name="author" content="Nguyễn Văn Ước">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <meta property="og:image" content="{{ $image_og }}"/>
    <meta property="og:site_name" content="thechatvietnam"/>
    <meta property="og:description" content="{{ $meta_desc }}"/>
    <meta property="og:title" content="{{ $meta_title }}"/>
    <meta property="og:url" content="{{ $url_canonical }}"/>
    <meta property="og:type" content="website"/>

    <!-- Custom Theme files -->
    <link href="{{ asset('css/home/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/home/style.home.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/home/timeline.min.css') }}" type="text/css" rel="stylesheet" media="all">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180755787-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-180755787-1');
    </script>
</head>

<body>

<!-- Header -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-fixed-top">
    <div class="container">
        <a href="#" class="nav-brand" style="font-size:20px; color: white;">
            <img src="/img/core-img/logo.png" height="40px" width="40px">
            {{ setting('site.web_name') }}
        </a>

        <div class="nav-item position-relative d-flex">
            <a href="#menu" id="toggle">
                <span></span>
            </a>
            <div id="menu">
                {{ menu('site', 'menus.home') }}
            </div>

            <div id="app">
                @if(Auth::check())
                    <notification :userid='{{ auth()->id() }}'
                                  :unreads="{{ auth()->user()->unreadNotifications }}"></notification>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Banner -->
<div id="home" class="banner-w3pvt  d-flex justify-content-center align-items-center clip-wthree">
    <div class="container">
        <div class="row">
            <div class="offset-lg-6">
                <img src="{{ asset('img/home/IMG_20.png') }}" alt="banner" class="img-fluid"/>
            </div>
            <div class="col-lg-6 bnr-txt-w3pvt  d-flex justify-content-center align-items-center">
                <div class="bnr-w3pvt-txt">
                    <h2 class="font-weight-bold">{{ setting('site.web_name') }}</h2>
                    <h3>{{ setting('site.description') }}</h3>
                    <p class="text-white mt-sm-4 mt-2"> {{ setting('site.site_details') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About -->
<section class="about-w3layouts" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-5">
                    <div class="title-sec-w3layouts_pvt">
                        <span class="title-icon-wthree fa fa-hashtag" aria-hidden="true"></span>
                        <h4 class="w3layouts_pvt-head">HLV: Trần Mạnh Dũng</h4>
                        <p class="title-text text-capitalize">Chủ nhiệm võ đường {{ setting('site.web_name') }}</p>
                    </div>
                    <div class="ab-pvtw3 my-4">
                        <p class="my-3">
                            HLV Trần Mạnh Dũng hiện đang là huyền đai đệ tam đẳng Karatedo, cựu VĐV đội
                            tuyển Quốc gia, kiện tướng Karatedo Quốc gia, kiện tướng Jujitshu Quốc gia, giáo viên giảng
                            dạy Karatedo
                            Cảnh sát phòng cháy chữa cháy....
                        </p>
                        <p>
                            Với kinh nghiệm thi đấu và giảng dạy của mình.HLV Trần Mạnh Dũng sẽ mang lại
                            cho bạn những giờ phút tập luyện mướt mồ hôi với những kỹ thuật chuyên môn cao
                            đầy hiệu quả để bạn có thể tự tin trên thảm đấu
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="{{ asset('img/home/IMG30.png') }}" alt="coach" class="img-fluid"/>
            </div>
        </div>
        <div class="sec-space" style="text-align: center;">
            <h4 class="w3layouts_pvt-head">
                Hệ Thống Cấp Đai Tiêu Chuẩn Karate
            </h4>
            <p class="title-text text-capitalize">
                gồm 10 Kuy với 6 màu đai, 9 đẳng đai đen và 2 màu đai thi đấu
            </p>
            <div class="row ab-grid-bottom">
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_white.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">White Belt</h4>
                    <h5 class="my-3">Đai Trắng (Kuy 10,9)</h5>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border rsp-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_yellow.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Yellow Belt</h4>
                    <h5 class="my-3">Đai Vàng (Kuy 8)</h5>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_light_blue.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Light Blue Belt</h4>
                    <h5 class="my-3">Đai Xanh Dương Nhạt (Kuy 7)</h5>
                </div>
                <div class="col-lg-3 col-6 mt-lg-4 w3pvt-ab text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_green.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Green Belt</h4>
                    <h5 class="my-3">Đai Xanh Lá (Kuy 6)</h5>
                </div>
            </div>
            <div class="row ab-grid-bottom" style="justify-content: center;">
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center  position-relative">
                    <div class="ab-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_dark_blue.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Dark Blue Belt</h4>
                    <h5 class="my-3">Đai Xanh Dương Đậm (Kuy 5,4)</h5>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border rsp-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_brown.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Brown Belt</h4>
                    <h5 class="my-3">Đai Nâu (Kuy 3,2,1)</h5>
                </div>
                <div class="col-lg-3 col-6 mt-lg-4 w3pvt-ab text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_black.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Black Belt</h4>
                    <h5 class="my-3">Đai Đen (9 đẳng)</h5>
                </div>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center  position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_dark_blue.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Blue Belt</h4>
                    <h5 class="my-3">Đai Xanh (AO)</h5>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_red.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Red Belt</h4>
                    <h5 class="my-3">Đai Đỏ (AK)</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rank -->
<div class="cliptop-blog-wthree" id="news">
    <div class="container">
        <div class="title-sec-w3layouts_pvt">
            <span class="title-icon-wthree fa fa-hashtag" aria-hidden="true"></span>
            <h4 class="w3layouts_pvt-head text-white">Bảng vàng ghi danh</h4>
        </div>
        <div class="row blog mt-md-3">
            <div class="col-md-12">
                <div class="d-flex team-agile-row">
                    <div class="box-rank-2 text-center" style="background-image: url(/img/ranks/200.png);">
                        <div class="point-rank-2">
                            @if (($topStudents[1]['avatar'] == 'users/default.png') && ($topStudents[1]['sex'] == 1))
                                <img class="icon-rank" src="/storage/users/user_woman.jpg" alt="user_woman.jpg">
                            @else
                                <img src="{{ Voyager::image($topStudents[1]['avatar'])}}" class="icon-rank"
                                     alt="{{ $topStudents[1]['name'].'.png' }}">
                            @endif
                            <h4 class="w3layouts_pvt-head">{{ $topStudents[1]['result']['total'] }}</h4>
                            <h4 class="w3layouts_pvt-head name">{{ $topStudents[1]['name'] }}</h4>
                        </div>
                    </div>

                    <div class="box-rank-1 text-center" style="background-image: url(/img/ranks/100.png);">
                        <div class="point-rank-1">
                            @if (($topStudents[0]['avatar'] == 'users/default.png') && ($topStudents[0]['sex'] == 1))
                                <img class="icon-rank1" src="/storage/users/user_woman.jpg" alt="user_woman.jpg">
                            @else
                                <img src="{{ Voyager::image($topStudents[0]['avatar'])}}" class="icon-rank1"
                                     alt="{{ $topStudents[0]['name'].'.png' }}">
                            @endif
                            <h4 class="w3layouts_pvt-head">{{ $topStudents[0]['result']['total'] }}</h4>
                            <h4 class="w3layouts_pvt-head name">{{ $topStudents[0]['name'] }}</h4>
                        </div>
                    </div>

                    <div class="box-rank-2 text-center" style="background-image: url(/img/ranks/300.png);">
                        <div class="point-rank-2">
                            @if (($topStudents[2]['avatar'] == 'users/default.png') && ($topStudents[2]['sex'] == 1))
                                <img class="icon-rank" src="/storage/users/user_woman.jpg" alt="user_woman.jpg">
                            @else
                                <img src="{{ Voyager::image($topStudents[2]['avatar'])}}" class="icon-rank"
                                     alt="{{ $topStudents[2]['name'].'.png' }}">
                            @endif
                            <h4 class="w3layouts_pvt-head">{{ $topStudents[2]['result']['total'] }}</h4>
                            <h4 class="w3layouts_pvt-head name">{{ $topStudents[2]['name'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog pt-5 pb-5">
        <div class="col">
            <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">
                    <h4 class="mb-3 w3layouts_pvt-head text-white">Bảng xếp hạng</h4>
                </div>

                <!-- Rank table -->
                <div id="rank-table">
                    @include('pages.rank_table')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Timeline -->
<section class="timeline-w3pvt" id="tl">
    <div class="container">
        <div class="row">
            <div id="timeline">
                @php
                    $key = 0;
                @endphp
                @foreach($events as $year=>$groupEvts)
                    <div class="row timeline-movement timeline-movement-top">
                        <div class="timeline-badge timeline-future-movement">
                            <p>{{ $year }}</p>
                        </div>
                    </div>
                    @foreach($groupEvts as $evt)
                        @php
                          $key++;
                        @endphp
                        <div class="row timeline-movement">
                            <div class="timeline-badge @if($key % 2 == 0) center-right @else center-left @endif">
                            </div>
                            <div class="@if($key % 2 == 0) offset-lg-6 @endif col-lg-6 timeline-item">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="timeline-panel debits anim animate @if($key % 2 == 0) fadeInRight @else fadeInLeft @endif">
                                            <div class="timeline-panel-ul clearfix">
                                                <div class="lefting-wrap">
                                                    <ul>
                                                        <li class="img-wraping">
                                                            <a href="#">
                                                                <img src="{{ Voyager::image($evt->image) }}" alt="{{ $evt->name }}" class="img-fluid"/>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="righting-wrap">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="importo">
                                                                {{ $evt->name }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <small class="text-muted">
                                                                    <span class="fa fa-clock-o"></span>
                                                                    {{ $evt->date->format('d/m/Y') }}
                                                                </small>
                                                            </p>
                                                        </li>
                                                        <li>
                                                        <span class="causale">
                                                            {{ $evt->note }}
                                                        </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Galery -->
<section class="wthree-row w3-gallery cliptop-portfolio-wthree" id="portfolio">
    <div class="container">
        <div class="title-sec-w3layouts_pvt">
            <span class="title-icon-wthree fa fa-hashtag" aria-hidden="true"></span>
            <h4 class="w3layouts_pvt-head text-white">Album ảnh</h4>
            <p class="title-text text-capitalize">Một số hình ảnh về võ đường</p>
        </div>
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex team-agile-row">
                        <ul class="demo mt-5 ">
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i1.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i2.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i3.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i4.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i5.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i6.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i7.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i8.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Item -->
                <div class="carousel-item">
                    <div class="d-flex team-agile-row">
                        <ul class="demo mt-5 ">
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i9.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i10.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i11.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i12.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i13.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i14.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i15.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i16.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Item -->
                <div class="carousel-item">
                    <div class="d-flex team-agile-row">
                        <ul class="demo mt-5 ">
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i17.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i18.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i19.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i20.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i21.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i22.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i23.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                            <li>
                                <div class="gallery-grid1">
                                    <img src="/img/home/introduce/i24.jpg" alt=" " class="img-fluid"/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<div class="section pt-5" id="contact">
    <div class="container title-sec-w3layouts_pvt">
        <span class="title-icon-wthree fa fa-hashtag" aria-hidden="true"></span>
        <h4 class="w3layouts_pvt-head">Liên hệ với chúng tôi?</h4>
    </div>

    <!-- Google Map -->
    <div class="container map-grid pt-5 px-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0322907242094!2d105.78620701487571!3d20.991342694430635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acb60e4afb93%3A0xab3e4a00990d206e!2zQ1QzIFRydW5nIFbEg24sIFRydW5nIFbEg24sIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1560065918169!5m2!1svi!2sus"
            width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

<!-- Contact Info -->
<section class="contact-details">
    <div class="container px-0">
        <div class="row m-0 contact-row-w3pvt py-5 team-agile-row">
            <div class="col-lg-4 my-2">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <a href="tel:0942332444" class="field-icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 4.5C3 3.67157 3.67157 3 4.5 3H7.72931C8.46257 3 9.08835 3.53012 9.2089 4.2534L10.3179 10.9072C10.4261 11.5568 10.0981 12.201 9.5091 12.4955L7.18689 13.6566C8.86134 17.8175 12.1825 21.1387 16.3434 22.8131L17.5045 20.4909C17.799 19.9019 18.4432 19.5739 19.0928 19.6821L25.7466 20.7911C26.4699 20.9116 27 21.5374 27 22.2707V25.5C27 26.3284 26.3284 27 25.5 27H22.5C11.7304 27 3 18.2696 3 7.5V4.5Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="col-10 cd-grid d-flex align-items-center">
                        <a href="tel:0942332444" style="color: #000;letter-spacing: 1px;">+84 942 332 444</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-2">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <div class="field-icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.57538 6.07538C11.6759 1.97487 18.3241 1.97487 22.4246 6.07538C26.5251 10.1759 26.5251 16.8241 22.4246 20.9246L15 28.3492L7.57538 20.9246C3.47487 16.8241 3.47487 10.1759 7.57538 6.07538ZM15 16.5C16.6569 16.5 18 15.1569 18 13.5C18 11.8431 16.6569 10.5 15 10.5C13.3431 10.5 12 11.8431 12 13.5C12 15.1569 13.3431 16.5 15 16.5Z"
                                      fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-10 d-grid d-flex align-items-center">
                        <p>Sảnh 1,CT3 Trung Văn, Từ Liêm, Hà Nội, Việt Nam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-2">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <a href="mailto:karateleaguedojo@gmail.com" class="field-icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.005 8.82533L14.9999 14.8228L26.995 8.82526C26.9045 7.24973 25.5982 6 24 6H6C4.40178 6 3.09545 7.24977 3.005 8.82533Z"
                                    fill="white"/>
                                <path
                                    d="M27 12.1769L14.9999 18.1769L3 12.1769V21C3 22.6569 4.34315 24 6 24H24C25.6569 24 27 22.6569 27 21V12.1769Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="col-10 cd-grid d-flex align-items-center">
                        <a href="mailto:karateleaguedojo@gmail.com" style="color: #000;letter-spacing: 1px;">karateleaguedojo@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social -->
<section class="social_w3ls_pvt position-relative py-5">
    <div class="container py-lg-5">
        <ul class="py-4">
            <li>
                <a href="https://www.facebook.com/votrandojo/">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.9063 11.25H17.5V8.74996C17.5 7.45996 17.605 6.64746 19.4538 6.64746H21.7888V2.67246C20.6525 2.55496 19.51 2.49746 18.3663 2.49996C14.975 2.49996 12.5 4.57121 12.5 8.37371V11.25H8.75V16.25L12.5 16.2487V27.5H17.5V16.2462L21.3325 16.245L21.9063 11.25Z"
                            fill="white"/>
                    </svg>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/channel/UCl81LfmyxDUZ1ygd4RNhsAw">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.65554 0L7.07653 8.04854V11.9098H9.17258V8.04854L11.6255 0H9.51349L8.63459 3.66266C8.38777 4.7321 8.23012 5.49195 8.15785 5.94508H8.09393C7.99165 5.3112 7.83264 4.54543 7.61719 3.64795L6.77024 0H4.65554ZM14.0705 3.03751C13.36 3.03751 12.7863 3.16623 12.35 3.42731C11.9122 3.68714 11.5917 4.10291 11.3858 4.67026C11.1813 5.23887 11.0769 5.98933 11.0769 6.92572V8.18828C11.0769 9.11463 11.1685 9.8582 11.3485 10.4168C11.5285 10.9753 11.8299 11.3875 12.2567 11.6524C12.6836 11.9172 13.2725 12.0507 14.0225 12.052C14.7521 12.052 15.3336 11.9208 15.7591 11.6597C16.1845 11.3986 16.4937 10.9902 16.6832 10.4266C16.8728 9.86299 16.9682 9.11833 16.9682 8.19073V6.92572C16.9682 5.98933 16.8702 5.24121 16.6752 4.67762C16.4802 4.11528 16.1738 3.69951 15.7511 3.43467C15.3297 3.16982 14.7687 3.03751 14.0705 3.03751ZM18.0708 3.20912V9.70826C18.0708 10.5129 18.221 11.1054 18.5183 11.4832C18.8169 11.861 19.2786 12.0495 19.9059 12.0495C20.81 12.0495 21.4893 11.6479 21.9407 10.8433H21.986L22.1724 11.9073H23.837V3.20912H21.7116V10.1177C21.6298 10.2796 21.5039 10.4131 21.3335 10.5173C21.163 10.6227 20.9862 10.6742 20.8008 10.6742C20.584 10.6742 20.4301 10.5898 20.3374 10.4241C20.2446 10.2584 20.1989 9.9846 20.1989 9.59549V3.20912H18.0708ZM14.0225 4.38588C14.3198 4.38588 14.5312 4.53111 14.6484 4.81981C14.7671 5.10725 14.8242 5.5627 14.8242 6.18779V8.89924C14.8242 9.54316 14.7657 10.0056 14.6484 10.2893C14.5312 10.573 14.3211 10.7146 14.0252 10.7159C13.7279 10.7159 13.5205 10.573 13.4073 10.2893C13.2928 10.0056 13.2369 9.54191 13.2369 8.89924V6.18779C13.2369 5.56395 13.298 5.10851 13.4153 4.81981C13.5326 4.53237 13.7348 4.38588 14.0225 4.38588ZM3.40909 13.6823C1.52591 13.6823 0 15.0869 0 16.8203V26.862C0 28.5954 1.52591 30 3.40909 30H26.5909C28.4741 30 30 28.5954 30 26.862V16.8203C30 15.0869 28.4741 13.6823 26.5909 13.6823H3.40909ZM15.0799 16.5678H16.8111V20.4388H16.8244C16.9799 20.1589 17.2012 19.9342 17.4876 19.7622C17.7739 19.5902 18.0844 19.5048 18.4144 19.5048C18.8399 19.5048 19.1718 19.609 19.4132 19.8161C19.6545 20.0232 19.8328 20.3606 19.9405 20.8237C20.0482 21.2882 20.103 21.931 20.103 22.7531V23.9127C20.103 25.0073 19.9605 25.8116 19.6742 26.3275C19.3878 26.8434 18.9387 27.1022 18.3319 27.1022C17.9937 27.1022 17.6859 27.0296 17.4077 26.8865C17.1295 26.7434 16.9235 26.5466 16.7844 26.2981H16.7445L16.5634 26.9919H15.0799V16.5678ZM4.34126 16.9404H9.66531V18.2716H7.88086V26.9919H6.12305V18.2716H4.34126V16.9404ZM23.3416 19.5097C23.9566 19.5097 24.4312 19.6115 24.7612 19.8186C25.0898 20.0269 25.324 20.3513 25.459 20.7894C25.5926 21.2287 25.6587 21.8365 25.6587 22.6109V23.871H22.6545V24.2437C22.6545 24.7156 22.6684 25.068 22.6998 25.3028C22.7311 25.5375 22.7934 25.7109 22.8888 25.8176C22.9843 25.9255 23.1319 25.9794 23.331 25.9794C23.5996 25.9794 23.784 25.8834 23.8849 25.6926C23.9845 25.5018 24.0392 25.1809 24.0474 24.734L25.5948 24.8174C25.603 24.8801 25.6081 24.9704 25.6081 25.0821C25.6081 25.7612 25.4072 26.2682 25.0036 26.6021C24.5999 26.9385 24.0287 27.1071 23.291 27.1071C22.406 27.1071 21.7866 26.8507 21.4293 26.3398C21.0721 25.8289 20.8967 25.0374 20.8967 23.9667V22.6845C20.8967 21.5824 21.0825 20.778 21.4506 20.2697C21.8188 19.7613 22.4484 19.5097 23.3416 19.5097ZM12.2035 19.6445H14.0012V26.9895H13.9959V26.9919H12.5897L12.4352 26.0922H12.3952C12.0134 26.7725 11.441 27.112 10.6774 27.112C10.1469 27.112 9.75778 26.9541 9.5055 26.634C9.25323 26.3152 9.12731 25.8139 9.12731 25.1361V19.647H10.9277V25.0405C10.9277 25.3668 10.9672 25.6035 11.0449 25.7416C11.124 25.8822 11.2523 25.95 11.4364 25.95C11.5919 25.95 11.7407 25.9067 11.8839 25.8176C12.0284 25.7297 12.1326 25.6173 12.2035 25.4817V19.6445ZM23.3043 20.6252C23.1134 20.6252 22.9696 20.6767 22.8782 20.7796C22.7868 20.8838 22.7257 21.0536 22.6971 21.2895C22.6657 21.5243 22.6518 21.8826 22.6518 22.3609V22.888H23.9648V22.3609C23.9648 21.8889 23.9483 21.533 23.9142 21.2895C23.8801 21.0448 23.8192 20.8751 23.7278 20.7747C23.6364 20.6755 23.4966 20.6252 23.3043 20.6252ZM17.6048 20.6791C17.4316 20.6791 17.27 20.7423 17.1227 20.8703C16.9754 20.9983 16.8711 21.1623 16.8111 21.3606V25.5308C16.8902 25.6588 16.9919 25.7536 17.1174 25.8176C17.2428 25.8804 17.3789 25.9157 17.5275 25.9157C17.7184 25.9157 17.8698 25.8525 17.983 25.7244C18.0961 25.5964 18.1763 25.381 18.2227 25.0772C18.2704 24.7747 18.2946 24.3543 18.2946 23.8196V22.8733C18.2946 22.2984 18.2755 21.8546 18.236 21.542C18.1978 21.2308 18.1264 21.0082 18.0282 20.8777C17.9287 20.7471 17.7888 20.6791 17.6048 20.6791Z"
                            fill="white"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</section>

<!-- Footer -->
@include('layouts.footer')

<!-- JS -->
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home/jquery.picEyes.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/home/scrolling-nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home/timeline.js') }}"></script>
<script>
    $(function () {
        $('.demo li').picEyes();
    });
</script>

<!-- Alert Notification -->
@if (session('registered'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal({
                title: 'Đăng ký thành công!',
                background: 'url(/img/core-img/notify-bg.png)',
                text: 'Kiểm tra email vừa đăng ký để xác thực tài khoản',
                type: 'success',
                confirmButtonColor: '#4caf50'
            });
        })
    </script>
@elseif (session('verified'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal({
                title: 'Tài khoản đã được xác thực!',
                background: 'url(/img/core-img/notify-bg.png)',
                text: 'Hãy tiếp tục khám phá những điều thú vị nào',
                type: 'success',
                confirmButtonColor: '#4caf50'
            });
        })
    </script>
@elseif (session('status'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal({
                title: "{{ session('status') }}",
                background: 'url(/img/core-img/notify-bg.png)',
                text: 'Hãy tiếp tục khám phá những điều thú vị nào',
                type: 'success',
                confirmButtonColor: '#4caf50'
            });
        })
    </script>
@endif
</body>
</html>
