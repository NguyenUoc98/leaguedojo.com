<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="{{ $url_canonical }}" />
    <meta name="author" content="Nguyễn Văn Ước">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/core-img/favicon.ico">

    <meta property="og:image" content="{{ $image_og }}" />
    <meta property="og:site_name" content="karateleaguedojo.tk" />
    <meta property="og:description" content="{{ $meta_desc }}" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:url" content="{{ $url_canonical }}" />
    <meta property="og:type" content="website" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="/css/home/style.home.css" type="text/css" rel="stylesheet" media="all">
    <link href="/css/home/timeline.css" type="text/css" rel="stylesheet" media="all">
    <link href="/css/home/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/mycss.css">
    <link href="//fonts.googleapis.com/css?family=Cabin+Condensed:200,300,400,500,600,700,800" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180755787-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180755787-1');
    </script>

    <!-- Google Adsense -->
    <script data-ad-client="ca-pub-1747924550904432" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Header -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-fixed-top">
        <div class="container">
            <a href="#" class="nav-brand" style="font-size:15px; color: white; font-size:16px">
                <img src="/img/core-img/favicon.ico" height="40px" width="40px">
                Karate League Dojo
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
                    <notification :userid='{{ auth()->id() }}' :unreads="{{ auth()->user()->unreadNotifications }}"></notification>
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
                    <img src="/img/home/IMG_20.png" alt="" class="img-fluid" />
                </div>
                <div class="col-lg-6 bnr-txt-w3pvt  d-flex justify-content-center align-items-center">
                    <div class="bnr-w3pvt-txt">
                        <h2>Karate League Dojo</h2>
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
                            <p class="title-text text-capitalize">Chủ nhiệm võ đường Karate League Dojo</p>
                        </div>
                        <div class="ab-pvtw3 my-4">
                            <p class="my-3">
                                HLV Trần Mạnh Dũng hiện đang là huyền đai đệ tam đẳng Karatedo, cựu VĐV đội
                                tuyển Quốc gia, kiện tướng Karatedo Quốc gia, giáo viên giảng dạy Karatedo
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
                    <img src="/img/home/IMG30.png" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="sec-space" style="text-align: center;">
                <h4 class="w3layouts_pvt-head" style="font-size: 3em;">
                    Hệ Thống Cấp Đai Tiêu Chuẩn Karate
                </h4>
                <p class="title-text text-capitalize">
                    gồm 10 Kuy với 6 màu đai, 9 đẳng đai đen và 2 màu đai thi đấu
                </p>
                <div class="row ab-grid-bottom">
                    <div class="col-lg-3 col-md-6 my-lg-4 w3pvt-ab text-center  position-relative">
                        <div class="ab-border">
                            <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_white.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">White Belt</h4>
                        <h5 class="my-3">Đai Trắng (Kuy 10,9)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 my-lg-4 mt-md-0 mt-4 w3pvt-ab text-center position-relative">
                        <div class="ab-border rsp-border">
                            <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_yellow.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Yellow Belt</h4>
                        <h5 class="my-3">Đai Vàng (Kuy 8)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 my-lg-4 mt-sm-5 mt-4 w3pvt-ab text-center position-relative">
                        <div class="ab-border">
                            <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_light_blue.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Light Blue Belt</h4>
                        <h5 class="my-3">Đai Xanh Dương Nhạt (Kuy 7)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-4 mt-sm-5 mt-4 w3pvt-ab text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_green.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Green Belt</h4>
                        <h5 class="my-3">Đai Xanh Lá (Kuy 6)</h5>
                    </div>
                </div>
                <div class="row ab-grid-bottom" style="justify-content: center;">
                    <div class="col-lg-3 col-md-6 my-lg-4 w3pvt-ab text-center  position-relative">
                        <div class="ab-border">
                            <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_dark_blue.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Dark Blue Belt</h4>
                        <h5 class="my-3">Đai Xanh Dương Đậm (Kuy 5,4)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 my-lg-4 mt-md-0 mt-4 w3pvt-ab text-center position-relative">
                        <div class="ab-border rsp-border">
                            <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_brown.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Brown Belt</h4>
                        <h5 class="my-3">Đai Nâu (Kuy 3,2,1)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-4 mt-sm-5 mt-4 w3pvt-ab text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_black.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Black Belt</h4>
                        <h5 class="my-3">Đai Đen (9 đẳng)</h5>
                    </div>
                </div>
                <div class="row" style="justify-content: center;">
                    <div class="col-lg-3 col-md-6 my-lg-4 w3pvt-ab text-center  position-relative">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/img/home/belt/belt_dark_blue.png" alt="" class="img-fluid img-belt">
                        </div>
                        <h4 class="feed-title my-3">Blue Belt</h4>
                        <h5 class="my-3">Đai Xanh (AO)</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 my-lg-4 mt-md-0 mt-4 w3pvt-ab text-center position-relative">
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

    <!-- Carousel -->
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
                                <img src="{{ Voyager::image($topStudents[1]['avatar'])}}" class="icon-rank" alt="{{ $topStudents[1]['name'].'.png' }}">
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
                                <img src="{{ Voyager::image($topStudents[0]['avatar'])}}" class="icon-rank1" alt="{{ $topStudents[0]['name'].'.png' }}">
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
                                <img src="{{ Voyager::image($topStudents[2]['avatar'])}}" class="icon-rank" alt="{{ $topStudents[2]['name'].'.png' }}">
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
                    <div class="row timeline-movement timeline-movement-top">
                        <div class="timeline-badge timeline-future-movement">
                            <p>2019</p>
                        </div>
                    </div>
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-right">
                        </div>
                        <div class="offset-lg-6 col-lg-6 timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel debits  anim animate  fadeInRight">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/6.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">
                                                            Giải Đại học Công đoàn mở rộng lần thứ 2
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                07/04/2019 - 08/04/2019
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Võ đường tham gia giải với tinh thần quyết thắng
                                                            và đã mang về nhiều huy chương và thứ hạng cao
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
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-left">
                        </div>
                        <div class="col-lg-6 timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel credits  anim animate  fadeInLeft">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/5.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">
                                                            Du lịch Tây Thiên dịp Tết Nguyên Đán
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                20/02/2019
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Võ đường tổ chức buổi dã ngoại leo núi ở Tây Thiên
                                                            cho các võ sinh với nhiều kỷ niệm đẹp
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
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-right">
                        </div>
                        <div class="offset-lg-6 col-lg-6  timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel debits  anim animate  fadeInRight">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/4.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">Sinh nhật 1 tuổi võ đường</a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                28/01/2019
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Võ đường kỷ niệm sinh nhật tròn 1 tuổi và tổ chức kỳ thi
                                                            thăng đai lần thứ 3
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
                    <div class="row timeline-movement timeline-movement-top">
                        <div class="timeline-badge timeline-future-movement">
                            <p>2018</p>
                        </div>
                    </div>
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-left">
                        </div>
                        <div class="col-lg-6  timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel credits  anim animate  fadeInLeft">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/3.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">
                                                            Giải vô địch sozucho karatedo mở rộng lần thứ 5
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                11/11/2018
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Võ đường tham dự giải vô địch sozucho
                                                            karatedo mở rộng lần thứ 5 với nhiều thành tích
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
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-right">
                        </div>
                        <div class="offset-lg-6 col-lg-6  timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel debits  anim animate  fadeInRight">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/2.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">
                                                            Võ sinh được cấp nhất đẳng quốc gia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                05/08/2018
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Võ sinh của võ đường lần đầu tham dự kỳ
                                                            thi đai đen và thăng đẳng quốc gia và được cấp chứng chỉ
                                                            nhất đẳng huyền đai quốc gia
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
                    <div class="row timeline-movement">
                        <div class="timeline-badge center-left">
                        </div>
                        <div class="col-lg-6  timeline-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-panel credits  anim animate  fadeInLeft">
                                        <div class="timeline-panel-ul clearfix">
                                            <div class="lefting-wrap">
                                                <ul>
                                                    <li class="img-wraping">
                                                        <a href="#">
                                                            <img src="/img/home/timeline/1.jpg" class="img-fluid" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="righting-wrap">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="importo">
                                                            Thành lập võ đường
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <small class="text-muted">
                                                                <span class="fa fa-clock-o"></span>
                                                                28/01/2018
                                                            </small>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <span class="causale">
                                                            Các công tác chuẩn bị thiết bị tập luyện cho võ đường
                                                            được gấp rút hoàn thiện theo đúng dự kiến
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

                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex team-agile-row">
                            <ul class="demo mt-5 ">
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i1.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i2.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i3.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i4.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i5.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i6.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i7.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i8.jpg" alt=" " class="img-fluid" />
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
                                        <img src="/img/home/introduce/i9.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i10.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i11.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i12.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i13.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i14.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i15.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i16.jpg" alt=" " class="img-fluid" />
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
                                        <img src="/img/home/introduce/i17.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i18.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i19.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i20.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i21.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i22.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i23.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                                <li>
                                    <div class="gallery-grid1">
                                        <img src="/img/home/introduce/i24.jpg" alt=" " class="img-fluid" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators" style="bottom: unset; margin-top: 30px;">
                    <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#blogCarousel" data-slide-to="1"></li>
                    <li data-target="#blogCarousel" data-slide-to="2"></li>
                </ol>
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
        <div class="map-grid pt-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0322907242094!2d105.78620701487571!3d20.991342694430635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acb60e4afb93%3A0xab3e4a00990d206e!2zQ1QzIFRydW5nIFbEg24sIFRydW5nIFbEg24sIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1560065918169!5m2!1svi!2sus" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- <div class="w3layouts-contact-pos">
                <div class="w3layouts-contact-pos-grid">
                    <div class="title-sec-w3layouts_pvt">
                        <span class="title-icon-wthree fa fa-hashtag" aria-hidden="true"></span>
                        <h4 class="w3layouts_pvt-head text-white">contact me</h4>
                        <p class="title-text text-capitalize">add some sub text here</p>
                    </div>
                    <form action="#" method="get" class="contact-wthree">
                        <div class="form-group d-flex">
                            <label>
                                <span class="fa fa-user text-white" aria-hidden="true"></span>
                            </label>
                            <input class="form-control" type="text" placeholder="Enter your name..." name="email"
                                required="">
                        </div>
                        <div class="form-group d-flex">
                            <label>
                                <span class="fa fa-envelope text-white" aria-hidden="true"></span>
                            </label>
                            <input class="form-control" type="email" placeholder="Enter your email..." name="email"
                                required="">
                        </div>
                        <div class="form-group d-flex">
                            <label>
                                <span class="fa fa-edit text-white"></span>
                            </label>
                            <input class="form-control" type="text" placeholder="Subject" name="email" required="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="contact-comment" placeholder="Your message"
                                required></textarea>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="btn btn-block text-uppercase">Submit</button>
                        </div>
                    </form>

                </div>
            </div> -->
        </div>
    </div>

    <!-- Contact Info -->
    <section class="contact-details">
        <div class="container-fluid px-0">
            <div class="row m-0 contact-row-w3pvt py-5 team-agile-row">
                <div class="col-lg-3 my-2">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center align-items-center p-0">
                            <a href="tel:0942332444">
                                <span class="field-icon fa fa-phone" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="col-10 cd-grid d-flex align-items-center">
                            <ul>
                                <li>
                                    <a href="tel:0942332444">+84 942 332 444</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-2">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center align-items-center p-0">
                            <span class="field-icon fa fa-map-marker" aria-hidden="true"></span>
                        </div>
                        <div class="col-10 cd-grid">
                            <p>Sảnh 1,CT3 Trung Văn, Từ Liêm, Hà Nội, Việt Nam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-2">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center align-items-center p-0">
                            <a href="mailto:karateleaguedojo@gmail.com">
                                <span class="field-icon fa fa-envelope-o fa-lg" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="col-10 cd-grid d-flex align-items-center">
                            <ul>
                                <li>
                                    <a href="mailto:karateleaguedojo@gmail.com">karateleaguedojo@gmail.com</a>
                                </li>
                            </ul>
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
                <li><a href="https://www.facebook.com/LEAGUADOJO"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                <li><a href="https://www.youtube.com/channel/UCl81LfmyxDUZ1ygd4RNhsAw"><span class="fa fa-youtube" aria-hidden="true"></span></a></li>
                <!-- <li><a href="#"><span class="fa fa-youtube" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="fa fa-pinterest" aria-hidden="true"></span></a></li> -->
            </ul>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- JS -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="/js/home/menu.js"></script>
    <script src="/js/home/responsiveslides.min.js" defer></script>
    <script src="/js/home/jquery.picEyes.js" defer></script>
    <script src="/js/home/scrolling-nav.js"></script>
    <script src="/js/home/timeline.js"></script>
    <script src="/js/home/move-top.js" defer></script>
    <script src="/js/home/easing.js"></script>
    <script>
        $(function() {
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

            //picturesEyes($('.demo li'));
            $('.demo li').picEyes();
        });
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
        $(document).ready(function() {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

            // Pagination
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                fetch_data($(this).attr('href').split('page=')[1]);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "fetch-data?page=" + page,
                    success: function(data) {
                        $('#rank-table').html(data);
                    }
                });
            }
        });
    </script>

    <!-- Alert Notification -->
    @if (session('registered'))
    <script type="text/javascript">
        $(document).ready(function() {
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
        $(document).ready(function() {
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
        $(document).ready(function() {
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

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v8.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2436630799895751"
        theme_color="#ed3939"
        logged_in_greeting="Xin chào! Chúng tôi luôn ở đây sẵn sàng phục vụ bạn."
        logged_out_greeting="Xin chào! Chúng tôi luôn ở đây sẵn sàng phục vụ bạn.">
    </div>

</body>

</html>