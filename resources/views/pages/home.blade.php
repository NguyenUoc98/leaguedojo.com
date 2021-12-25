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
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/home/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="all">
    <style>{{ \Illuminate\Support\Facades\File::get(public_path('css/themes/default.css')) }}</style>
    <link href="{{ asset('css/home/style.home.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/home/timeline.min.css') }}" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

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
@include('layouts.header')

<!-- Banner -->
<div id="home" class="banner-w3pvt d-flex justify-content-center items-center lg:items-end clip-wthree @if($agent->isDesktop()) h-screen @endif">
    <div class="md:flex md:flex-row-reverse relative">
        <div class="lg:w-1/2 w-full pl-3 bnr-txt-w3pvt flex justify-center items-center lg:items-start">
            <div class="bnr-w3pvt-txt m-0">
                <h2 class="font-weight-bold">{{ setting('site.web_name') }}</h2>
                <h3>{{ setting('site.description') }}</h3>
                <p class="text-white mt-sm-4 mt-2 text-lg"> {{ setting('site.site_details') }}</p>
            </div>
        </div>
        <img src="{{ asset('img/home/IMG_20.png') }}" alt="banner" class="lg:w-1/2 w-full relative top-0 left-0"/>
    </div>
</div>

<!-- About -->
<section class="about-w3layouts" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-5">
                    <div class="title-sec-w3layouts_pvt border-primary">
                        <h4 class="w3layouts_pvt-head text-2xl md:text-3xl">HLV: Trần Mạnh Dũng</h4>
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
            <h4 class="w3layouts_pvt-head text-2xl md:text-3xl">
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
                    <h6 class="my-3">Đai Trắng (Kuy 10,9)</h6>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border rsp-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_yellow.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Yellow Belt</h4>
                    <h6 class="my-3">Đai Vàng (Kuy 8)</h6>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_light_blue.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Light Blue Belt</h4>
                    <h6 class="my-3">Đai Xanh Dương Nhạt (Kuy 7)</h6>
                </div>
                <div class="col-lg-3 col-6 mt-lg-4 w3pvt-ab text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_green.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Green Belt</h4>
                    <h6 class="my-3">Đai Xanh Lá (Kuy 6)</h6>
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
                    <h6 class="my-3">Đai Xanh Dương Đậm (Kuy 5,4)</h6>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="ab-border rsp-border">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_brown.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Brown Belt</h4>
                    <h6 class="my-3">Đai Nâu (Kuy 3,2,1)</h6>
                </div>
                <div class="col-lg-3 col-6 mt-lg-4 w3pvt-ab text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_black.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Black Belt</h4>
                    <h6 class="my-3">Đai Đen (9 đẳng)</h6>
                </div>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center  position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_dark_blue.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Blue Belt</h4>
                    <h6 class="my-3">Đai Xanh (AO)</h6>
                </div>
                <div class="col-lg-3 col-6 my-lg-4 w3pvt-ab text-center position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/img/home/belt/belt_red.png" alt="" class="img-fluid img-belt">
                    </div>
                    <h4 class="feed-title my-3">Red Belt</h4>
                    <h6 class="my-3">Đai Đỏ (AK)</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rank -->
<div class="cliptop-blog-wthree" id="news">
    <div class="container">
        <div class="title-sec-w3layouts_pvt border-primary">
            <h4 class="w3layouts_pvt-head text-white text-2xl md:text-3xl">Bảng vàng ghi danh</h4>
        </div>

        <div class="md:gap-5 gap-1 grid grid-cols-3 lg:mx-36 my-10">
            <div class="text-center my-auto">
                <div class="bg-white border-2 border-gray-400 md:mx-4 md:py-4 py-3 rounded-xl shadow-md relative">
                    <div class="space-y-3">
                        @if (($topStudents[1]['avatar'] == 'users/default.png') && ($topStudents[1]['sex'] == 1))
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-32 md:w-28 w-20"
                                src="/storage/users/user_woman.jpg"
                                alt="user_woman.jpg">
                        @else
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-32 md:w-28 w-20"
                                src="{{ Voyager::image($topStudents[1]['avatar'])}}"
                                alt="{{ $topStudents[1]['name'].'.png' }}">
                        @endif
                        <p class="border-b-2 border-primary font-bold mx-4 lg:text-3xl md:text-2xl text-xl text-primary">{{ $topStudents[1]['result']['total'] }}</p>
                        <p class="font-bold text-primary lg:text-xl md:text-lg text-sm">{{ $topStudents[1]['name'] }}</p>
                    </div>

                    <img class="absolute top-0 right-0" id="img2"
                         src="data:image/png;base64,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">
                </div>
            </div>

            <div class="text-center">
                <div class="bg-white border-2 border-gray-400 md:py-8 py-4 rounded-xl shadow-md relative">
                    <div class="space-y-3">
                        @if (($topStudents[0]['avatar'] == 'users/default.png') && ($topStudents[0]['sex'] == 1))
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-36 md:w-32 w-20"
                                src="/storage/users/user_woman.jpg"
                                alt="user_woman.jpg">
                        @else
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-36 md:w-32 w-20"
                                src="{{ Voyager::image($topStudents[0]['avatar'])}}"
                                alt="{{ $topStudents[0]['name'].'.png' }}">
                        @endif
                        <p class="border-b-2 border-primary font-bold mx-4 text-primary ls:text-4xl md:text-3xl text-xl">{{ $topStudents[0]['result']['total'] }}</p>
                        <p class="font-bold text-primary lg:text-xl md:text-lg text-sm">{{ $topStudents[0]['name'] }}</p>
                    </div>

                    <img class="absolute top-0 right-0" id="img1"
                         src="data:image/png;base64,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">

                </div>
            </div>

            <div class="text-center my-auto">
                <div class="bg-white border-2 border-gray-400 md:mx-4 md:py-4 py-3 rounded-xl shadow-md relative">
                    <div class="space-y-3">
                        @if (($topStudents[2]['avatar'] == 'users/default.png') && ($topStudents[2]['sex'] == 1))
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-32 md:w-28 w-20"
                                src="/storage/users/user_woman.jpg"
                                alt="user_woman.jpg">
                        @else
                            <img
                                class="border-4 border-solid border-yellow-400 mx-auto rounded-full lg:w-32 md:w-28 w-20"
                                src="{{ Voyager::image($topStudents[2]['avatar'])}}"
                                alt="{{ $topStudents[2]['name'].'.png' }}">
                        @endif
                        <p class="border-b-2 border-primary font-bold mx-4 lg:text-3xl md:text-2xl text-xl text-primary">{{ $topStudents[2]['result']['total'] }}</p>
                        <p class="font-bold text-primary lg:text-xl md:text-lg text-sm">{{ $topStudents[2]['name'] }}</p>
                    </div>
                    <img class="absolute top-0 right-0" id="img3"
                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAOC0lEQVR4nO2beXxUVZbHv69WqlKVorJXEmJIIAWySSABVES2JtJAA0q7tSuNgth02x9HR5lWB0SwaQYaW0F6bId2VNDRgbDK4gLILkJU1pCQhaxkqUpVJbW+/uNVKgkQTFUq0D09v8/nffJyl/POOTn33HPOvYHw4mtAvA7P3nAxLISLkB9imOldC2HhXREOIpcjZW1J4L1/fEzgfWuOBoAtde3r6adGSa6J2xuv2t9MI1yQhZXaZSh+pEenGd6aowm70K3RpQr4R0CXLIFmpKwtabMEQkF7SyFc6HIL8InX0y8Gjy73Advv0naKxv8JH+D9O7aCLvcBAPk1dSTodSHR6Gof0KUKaIbb66Ok3hr4/cilH5/zfWUHBoUBXe4Dih/pccNpXAv/Hwd0JfHWIfGNpHE9cL2ywLBnhOHKBm/UPtdp/jtLoI3gpm89nSTXMZQPvmLlhixHWH3A4Ep3OMm1i/Iw0vqnXwLh2gb3hYlOMAhbWexGQATEb/KKxP/dfLC1Zw93ie5H8U8fCN0oiICYmJgsxsWbbqgFdDUUwGJgJ7AGGO5vby+4Efxj1vjnLOE6JWxdhZVcKWQ1ICrlMvGdaf3Ed6b1E5VyWZu+y56VXcmgvAtp9xLgXZmAfFVOOsl6NQUWJ40enzZRr2bt3f2Z1jeOAfE6Bpsi2XuhjgaXVxutVfLE0GSeHt6DjaeqECETWAfUdgWT4VxzZuAhQAu4gDuBYff2jeGP43siyAQ0eh2VNidxESpU8rb+1+X1UWV3Ea9To5RJbD2x8STvHS8HOAx8AagBB/AecDocTIdLASZB4Iwoom/dmKRXsXlGX0w6FSq1Eo02uNreRauT0X85SomlqU27AA2ipPBOB4XhUsDzwJLhSXrGpRrwiWBQy7kr3UicVgmASqvmm4pGNp2p5mCJhcK6RuobpdC5u0ZJmlHDiBQDk82xDO9hQCZIrFXaXOSersbS5EYQBLafu8S+ovrmb/6+s4yHy8P2BpjaO4pHB8a16Wjy+Pjz8UrePl7JJcfVc4Vqu4tqu4tDpRZW7C8mLkLFb25NYU52D+J1KmYNTQqM1avlzQowh4PxcCjACGQBpHZXt+nIPVfLy3tLKLe5ADDHRTJ1YArjzSaSDFp6GCMAKKmzc9HiYOeZcjbkFXOmysqLO/NZdbiUP+RkMKVPbIBmmjFQZs/2f7uuM8x3ZgnkAHOB8YA6Vqvk6GMDUctliMCyQxdZdqgMEchMjGTptGGMyTB1iPD+wmqey/2GrwuqEIDf3nYTC8amIxMEmjw+zCu+psruAnACu4A3gW2hCBHqNni3ABsBs0xAMSJZz6oJaZh0KnwizN5+nnfzqlDKBJZPNPPmpL5kJJtodHtRymU0NLro/9qnvLD5W566rTcalZKH/rKLaquNmxOjSYvR89iwXsTqurHzTDn7iurJr3Hws76xKOUyxqVHc7raQam1SSFCBnA/cNL/BIVQc4EpIgiPDYzjxMxb+HR6H26OkUxz8YFScs/VYtQo2fzQYJ4YmowPkVc2HaLHSx9z0SmgTzXj9Ig43D4i+w6jRBnDf58oY/62HxD8Runxepk70sxnc8Zh1Kj46PtKFn5ZCMCAeB07Hs2k4LcjmZOd3CzH5FAECVUB9QAmnYpYv5cHac2/cbQcpUxg3c8HcEeqEQC5IJBXbqGm0c2WH8pAF8X+Zc/QsH4xcqWS7tHRvPmLMSy+bzSaXoP4JK+EzNc3UFhtYXTvBD6ZeSdKuYzX9xSy8VRV4HvxOhUmfcDvWEIRJNQlEAtM0yplTMuIBiRv/4tN57C5vCyfaGb6zfFctDax+mAxo28bwZgRQ5kwMI0ZE0YDEKnXoVJJylOrVGT178OQmzNArmDmG+s5VmYlQSPn9t6J9IzWYdSq2HryIodKrcwamozCHyyt2F/E2RoHwFvAiWAFCdUClAAOty/QsOZ4JeU2F0MSI5k1JBmPT+SeD47z8peFvL3rG+L0WsaNyOoQ8U2Lfs2qh8fyrw/9DACvV2Tu7X0Y0iOaEksTqw+XBsbaXQEeVKEIEqwFCMB8YDkgPDk4nswEHV5R5Jdb82n0+Hh3ej9SjRpkgoApykhJnY1XHxiPVqUAjf5HyEvQaroxtJ+ZCmsTD678iLMVNYzuk0xatJ73jhTwfZWNeSNSEAQBi9PDjvwagElIydM+gijRBRsHzAcWygWBZ7JNPD4oHoDDZTZqGj30iYlgVKoRu8uDTCbn7vGjuHvcSGmmzwtuJ8K0565K+BaTgW2L5pEQ13Kh4ofzF8g9Vcn+olqezxnCOLMJc1wkZ6qsHC61MryHgTlZPahxuFmyp1DmE1ngn7qwowIFuwTmAPx1cm+eHZYUCCK2F0ixyCR/wLI+r5z0ZXtYvWVP29lNtnYJHy+3cNf8tpnv2BFDeefxCeT9+4NoVNLfasoA6Zxw05lqAAQBfndnGh/MGNCGx44iWAsoBBK/q7YzNtUQaDxabgdgTJrk9Q8UW6hr8uDzXWaJrkbEDUtB0Xa5VlRdwvT4Qo6XX+nIH58+EWy1WApPY9CqGW9OZOnuHzhQXN9m3Klqe/Pr+WAECtYCXgbE5YfLKahvydAu+LO15MhuAPx5en/KV8zm4bFXcXr2ei5foq3N/nKUlFeSNGsJQ36fC0CKP3wuqGu5N3CuxsGSvRfwE345GIGCtYDdwDqn13f/p2dqeHaYlKRYXV6A1nsyCVGRcJWbIcKDi4L6YPfICMoanEQoJX+dZJACrvrGllOodd9V4PT4AD4EPg+GfijJULv5Q7O4Ma99id29G+uqp9EHWQO4HPoIHY6PlqApl6LcH7l0FXRuE6wCxgL3quUyppujA42RKjk1jR4qGpzoo7XERSjxoaTB4bxCAeLaf/GzKgNDLMilYEiY9OurftBmd9Bos9JMpcziAMDQrYX1+wYksOzrIpwe333AfxKEFQTrAxYAwm+yTaR17xZo7Ol/b67cHJkzjML/eIrEmO7tUxJ9YK0Gt5OKqvavw6zN3UHczMX88q9fAFBUJzm79KgWxfaO1vLCHT1BsoBXghEoWAtIA8iIavtXzTLpOFpu4/OCWsakRRGhUlBcXMD205U8edftbcYKjyxtl/gtJsNV2w1qBcNSpS12x+kyAEaktFXuwITAJaz0DktD8BawCmDW1nyWHrwYWPMT0iRmNp6S9maHx0fm65uZve4Au46d6hDhW0yRbFvw1BXtc++ZSOmrM3ggOwOATd9LYfBks6QQUYQFXxQw48O85ilvBSNQsBbwKiD6RF5ZdrhMFqVRMHNQPFkmHTEaJfm1Dr4srOPOnkaezk4mr9LBwLSkNgQCPuCq8IK1BjQ6LtkcTJm/kmfHD2L6QCn42XG6jHPVVuIiVGQnRwLw1uESFu8pBPABLwGvBSNQsBbgQwoznwTYXiAFI3JBYE6mFBY/v+McPlHk+VE9+fDeAcRoVfwp9ytqrO1HgS0Qwd0I1mo+2LCVA8W1vLrlCG6nC6/XwwubjgHwzK0piF4fLpeb3JOVzZNnAYsI8qg+1GzQBRChbJk+c1A8iXoVeRUNrDl6EZkg9b3yXi6/+uQwU/+wrkOEdx07xSWrjadzspk/8iY+vn8QXns1yz87yrHSWpL0Kh7IMGBrsNNob0SjCOx8Id3OCFUBWQCZLY6HbgoZC0amIADPbT/LVxek/ODRzCQyE3Q8e2dfQMaqLft4a/NebI3SjmFrbOLiJWnsqi37GP/HzTy9ZgOu0lP825heJEV2Y3dBLS/sPIcALLwjBXWrQ5UhLTwMDUWQUBVgAKiwu6hqVeqe1MvIvCwTbp/Ifevz+OpCHYkGDV/NymZCqobas0eYn3uEuR8fxO504/S40c9+gztefR/R62GCORZjNwXmKDU+UcrzdxfU8uDH3+HxiTyTncjEdGPge9UOd6Di3MxTsAi1IiQXYMa3lXbh7W8r2FvawMA4LbFaJbclR5Jf38SJSjvrv6ugu0ZJdpIBQQCXx0t8hJIYjYJ7UhX46itYsb8YvUrOw+lKohQe5gxPYUxaNCLw5qFSZm04SaPbx9SMKBaNuglBgJOXHMzadp7f7Snm20o7SL5pEdCxLacVwlYWj9MqOdJOWbxfnI4FY9OZmNGxf574vKCWF3fmc6KiAQGYO8TEi7cmIxOk0lvWf+VRLVmeE+kY/U/AZ6EIEY6jMSOwB+i/fqqZUSmRgY7N+XW8tLeYsgbJTHtFaZncJ5ax6VEkR6pJ8mePpdYmSixN7D5fy6bT1YFML0mvYuEdKW3M/osiC/dvPAuQh3QA26mDkXCcDNUhnd72L7Q0MYoWBUzqZWR8TwPvnKhi1bEK8msdLN9fxPL9RdckGKtVMiczgZmD4to4PIAii7P59QidFB7CdzZ4DmDD2VpsLu8Vh6NPZSYwe3ACR8ptfFZQx5FyGxcsTuqdUkrbXa0g1aAmy6QjJ93I0AQd/qIvVQ43W8/XYWnyIpfBrguBosmZcDDepcfjyXo1m3/el4QIZXvzromyBheT/udUYAk1QxCwiiJmoCJkjv0I1w0RG/Ap0uHEN0g+QWV1eZPqnR5y/KUyj0+ksN6JXiVHLmure5dXpMLuRqOQBfrm7ynm4MUGgEPA+/6fnwO/Aq69jv4O0FsAt0xAfDsnXZyTmSAa1AoREE06lfj+lAyxYl6WWDEvS3x/SoaYEKESAdHYTSHOHpwgrs5JF2UCoiBFnb1usCwh42qXpC4BolImiG/8JE1cOb6nqJQJbfoue5bfEM7DhNbX5FYDw5Ciz9e5UtDF/r7W1+Re4x/8mty18Bjwvf955EYx8TeaM1WqIBA6awAAAABJRU5ErkJggg==">
                </div>
            </div>
        </div>
    </div>
    <div class="blog pt-5 pb-5">
        <div class="card container p-0">

            <!-- Card header -->
            <div class="card-header border-0">
                <h4 class="font-bold mb-3 text-2xl text-white">Bảng xếp hạng</h4>
            </div>

            <!-- Rank table -->
            <div id="rank-table">
                @include('pages.rank_table')
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
                            <p class="-translate-x-1/2 -translate-y-1/2 font-extrabold left-1/2 top-1/2 transform">{{ $year }}</p>
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
                                        <div
                                            class="timeline-panel debits anim animate @if($key % 2 == 0) fadeInRight @else fadeInLeft @endif">
                                            <div class="timeline-panel-ul clearfix">
                                                <div class="lefting-wrap">
                                                    <ul>
                                                        <li class="img-wraping">
                                                            <a href="#">
                                                                <img src="{{ Voyager::image($evt->image) }}"
                                                                     alt="{{ $evt->name }}" class="img-fluid"/>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="righting-wrap">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="importo text-primary">
                                                                {{ $evt->name }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <small class="text-muted">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-6 w-6 inline" fill="none"
                                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                                    </svg>
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
        <div class="title-sec-w3layouts_pvt border-primary">
            <h4 class="w3layouts_pvt-head text-2xl md:text-3xl">Album ảnh</h4>
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
                                    <img src="/img/home/introduce/i8.jpg" alt=" " class="img-fluid"/>
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
<div class="section pt-5 container" id="contact">
    <div class="title-sec-w3layouts_pvt border-primary">
        <h4 class="w3layouts_pvt-head text-2xl md:text-3xl">Liên hệ với chúng tôi?</h4>
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
                        <svg class="bg-primary p-2 rounded-full" width="50" height="50" viewBox="0 0 50 50" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 7.5C5 6.11929 6.11929 5 7.5 5H12.8822C14.1043 5 15.1473 5.88353 15.3482 7.089L17.1964 18.1787C17.3769 19.2613 16.8301 20.3349 15.8485 20.8258L11.9781 22.7609C14.7689 29.6958 20.3042 35.2311 27.2391 38.0219L29.1742 34.1515C29.6651 33.1699 30.7387 32.6231 31.8213 32.8036L42.911 34.6518C44.1165 34.8527 45 35.8957 45 37.1178V42.5C45 43.8807 43.8807 45 42.5 45H37.5C19.5507 45 5 30.4493 5 12.5V7.5Z"
                                fill="white"/>
                        </svg>
                    </div>
                    <div class="col-10 cd-grid d-flex align-items-center">
                        <a href="tel:0942332444" style="color: #000;letter-spacing: 1px;">+84 942 332 444</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-2">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <svg class="bg-primary p-2 rounded-full" width="50" height="50" viewBox="0 0 50 50" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12.6256 10.1256C19.4598 3.29146 30.5402 3.29146 37.3744 10.1256C44.2085 16.9598 44.2085 28.0402 37.3744 34.8744L25 47.2487L12.6256 34.8744C5.79146 28.0402 5.79146 16.9598 12.6256 10.1256ZM25 27.5C27.7614 27.5 30 25.2614 30 22.5C30 19.7386 27.7614 17.5 25 17.5C22.2386 17.5 20 19.7386 20 22.5C20 25.2614 22.2386 27.5 25 27.5Z"
                                  fill="white"/>
                        </svg>

                    </div>
                    <div class="col-10 d-grid d-flex align-items-center">
                        <p>Sảnh 1,CT3 Trung Văn, Từ Liêm, Hà Nội, Việt Nam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-2">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <svg class="bg-primary p-2 rounded-full" width="50" height="50" viewBox="0 0 50 50" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.00833 14.7089L24.9999 24.7047L44.9917 14.7088C44.8408 12.0829 42.6637 10 40 10H10C7.33629 10 5.15909 12.0829 5.00833 14.7089Z"
                                fill="white"/>
                            <path
                                d="M45 20.2948L24.9999 30.2948L5 20.2949V35C5 37.7614 7.23858 40 10 40H40C42.7614 40 45 37.7614 45 35V20.2948Z"
                                fill="white"/>
                        </svg>
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
                    <svg class="mx-auto" width="30" height="30" viewBox="0 0 30 30" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.9063 11.25H17.5V8.74996C17.5 7.45996 17.605 6.64746 19.4538 6.64746H21.7888V2.67246C20.6525 2.55496 19.51 2.49746 18.3663 2.49996C14.975 2.49996 12.5 4.57121 12.5 8.37371V11.25H8.75V16.25L12.5 16.2487V27.5H17.5V16.2462L21.3325 16.245L21.9063 11.25Z"
                            fill="white"/>
                    </svg>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/channel/UCl81LfmyxDUZ1ygd4RNhsAw">
                    <svg class="mx-auto" width="30" height="30" viewBox="0 0 30 30" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.65554 0L7.07653 8.04854V11.9098H9.17258V8.04854L11.6255 0H9.51349L8.63459 3.66266C8.38777 4.7321 8.23012 5.49195 8.15785 5.94508H8.09393C7.99165 5.3112 7.83264 4.54543 7.61719 3.64795L6.77024 0H4.65554ZM14.0705 3.03751C13.36 3.03751 12.7863 3.16623 12.35 3.42731C11.9122 3.68714 11.5917 4.10291 11.3858 4.67026C11.1813 5.23887 11.0769 5.98933 11.0769 6.92572V8.18828C11.0769 9.11463 11.1685 9.8582 11.3485 10.4168C11.5285 10.9753 11.8299 11.3875 12.2567 11.6524C12.6836 11.9172 13.2725 12.0507 14.0225 12.052C14.7521 12.052 15.3336 11.9208 15.7591 11.6597C16.1845 11.3986 16.4937 10.9902 16.6832 10.4266C16.8728 9.86299 16.9682 9.11833 16.9682 8.19073V6.92572C16.9682 5.98933 16.8702 5.24121 16.6752 4.67762C16.4802 4.11528 16.1738 3.69951 15.7511 3.43467C15.3297 3.16982 14.7687 3.03751 14.0705 3.03751ZM18.0708 3.20912V9.70826C18.0708 10.5129 18.221 11.1054 18.5183 11.4832C18.8169 11.861 19.2786 12.0495 19.9059 12.0495C20.81 12.0495 21.4893 11.6479 21.9407 10.8433H21.986L22.1724 11.9073H23.837V3.20912H21.7116V10.1177C21.6298 10.2796 21.5039 10.4131 21.3335 10.5173C21.163 10.6227 20.9862 10.6742 20.8008 10.6742C20.584 10.6742 20.4301 10.5898 20.3374 10.4241C20.2446 10.2584 20.1989 9.9846 20.1989 9.59549V3.20912H18.0708ZM14.0225 4.38588C14.3198 4.38588 14.5312 4.53111 14.6484 4.81981C14.7671 5.10725 14.8242 5.5627 14.8242 6.18779V8.89924C14.8242 9.54316 14.7657 10.0056 14.6484 10.2893C14.5312 10.573 14.3211 10.7146 14.0252 10.7159C13.7279 10.7159 13.5205 10.573 13.4073 10.2893C13.2928 10.0056 13.2369 9.54191 13.2369 8.89924V6.18779C13.2369 5.56395 13.298 5.10851 13.4153 4.81981C13.5326 4.53237 13.7348 4.38588 14.0225 4.38588ZM3.40909 13.6823C1.52591 13.6823 0 15.0869 0 16.8203V26.862C0 28.5954 1.52591 30 3.40909 30H26.5909C28.4741 30 30 28.5954 30 26.862V16.8203C30 15.0869 28.4741 13.6823 26.5909 13.6823H3.40909ZM15.0799 16.5678H16.8111V20.4388H16.8244C16.9799 20.1589 17.2012 19.9342 17.4876 19.7622C17.7739 19.5902 18.0844 19.5048 18.4144 19.5048C18.8399 19.5048 19.1718 19.609 19.4132 19.8161C19.6545 20.0232 19.8328 20.3606 19.9405 20.8237C20.0482 21.2882 20.103 21.931 20.103 22.7531V23.9127C20.103 25.0073 19.9605 25.8116 19.6742 26.3275C19.3878 26.8434 18.9387 27.1022 18.3319 27.1022C17.9937 27.1022 17.6859 27.0296 17.4077 26.8865C17.1295 26.7434 16.9235 26.5466 16.7844 26.2981H16.7445L16.5634 26.9919H15.0799V16.5678ZM4.34126 16.9404H9.66531V18.2716H7.88086V26.9919H6.12305V18.2716H4.34126V16.9404ZM23.3416 19.5097C23.9566 19.5097 24.4312 19.6115 24.7612 19.8186C25.0898 20.0269 25.324 20.3513 25.459 20.7894C25.5926 21.2287 25.6587 21.8365 25.6587 22.6109V23.871H22.6545V24.2437C22.6545 24.7156 22.6684 25.068 22.6998 25.3028C22.7311 25.5375 22.7934 25.7109 22.8888 25.8176C22.9843 25.9255 23.1319 25.9794 23.331 25.9794C23.5996 25.9794 23.784 25.8834 23.8849 25.6926C23.9845 25.5018 24.0392 25.1809 24.0474 24.734L25.5948 24.8174C25.603 24.8801 25.6081 24.9704 25.6081 25.0821C25.6081 25.7612 25.4072 26.2682 25.0036 26.6021C24.5999 26.9385 24.0287 27.1071 23.291 27.1071C22.406 27.1071 21.7866 26.8507 21.4293 26.3398C21.0721 25.8289 20.8967 25.0374 20.8967 23.9667V22.6845C20.8967 21.5824 21.0825 20.778 21.4506 20.2697C21.8188 19.7613 22.4484 19.5097 23.3416 19.5097ZM12.2035 19.6445H14.0012V26.9895H13.9959V26.9919H12.5897L12.4352 26.0922H12.3952C12.0134 26.7725 11.441 27.112 10.6774 27.112C10.1469 27.112 9.75778 26.9541 9.5055 26.634C9.25323 26.3152 9.12731 25.8139 9.12731 25.1361V19.647H10.9277V25.0405C10.9277 25.3668 10.9672 25.6035 11.0449 25.7416C11.124 25.8822 11.2523 25.95 11.4364 25.95C11.5919 25.95 11.7407 25.9067 11.8839 25.8176C12.0284 25.7297 12.1326 25.6173 12.2035 25.4817V19.6445ZM23.3043 20.6252C23.1134 20.6252 22.9696 20.6767 22.8782 20.7796C22.7868 20.8838 22.7257 21.0536 22.6971 21.2895C22.6657 21.5243 22.6518 21.8826 22.6518 22.3609V22.888H23.9648V22.3609C23.9648 21.8889 23.9483 21.533 23.9142 21.2895C23.8801 21.0448 23.8192 20.8751 23.7278 20.7747C23.6364 20.6755 23.4966 20.6252 23.3043 20.6252ZM17.6048 20.6791C17.4316 20.6791 17.27 20.7423 17.1227 20.8703C16.9754 20.9983 16.8711 21.1623 16.8111 21.3606V25.5308C16.8902 25.6588 16.9919 25.7536 17.1174 25.8176C17.2428 25.8804 17.3789 25.9157 17.5275 25.9157C17.7184 25.9157 17.8698 25.8525 17.983 25.7244C18.0961 25.5964 18.1763 25.381 18.2227 25.0772C18.2704 24.7747 18.2946 24.3543 18.2946 23.8196V22.8733C18.2946 22.2984 18.2755 21.8546 18.236 21.542C18.1978 21.2308 18.1264 21.0082 18.0282 20.8777C17.9287 20.7471 17.7888 20.6791 17.6048 20.6791Z"
                            fill="white"/>
                    </svg>
                </a>
            </li>
            <li>
                <a href="https://www.tiktok.com/@votrandojo" class="p-0">
                    <svg class="mx-auto" width="48" height="48" viewBox="0 0 48 48" fill="none"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="48" height="48" fill="url(#pattern0)"/>
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_836_2" transform="scale(0.0208333)"/>
                            </pattern>
                            <image id="image0_836_2" width="48" height="48"
                                   xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEmElEQVRoge2YW2wUVRjHf7PbLW2Xlh1bKLXUtosFmlILBFYM6YuIFoiEW9JIiEpUgggh8RLEgE8kxgcStbHyYDRpNBIfJEqqJcREFOWWtpRAW6TsLralLTUw3WUv7M7O+NDS2rAzuLOzxYf9vc35zvnO/59zmXMOpEmTJs3DRHhQBafTuUVV1V3AIiA79ZIACKmq2g40eL3eI3oVdQ2UlZU1CoLwuqnSEudTj8ezSyto1Qo4nc4twAcpkZQYLofD0S1J0uV4QYtWq7Fp879AEITdWjFNA0BNCrQYZZFWIEOnUY4ZPefPrZr0fcvThaooiaaxawX0DCSNIAg8/9F3hIZ6UeQIAJ3v7cAt3SCkyKb0kVID99g4x8KyeQsAOHNiA4eaj9AaHjIlt94aSAnTN62gOjPftHxTbmDh8qW4XlxPriXTlHxTbgCg7s1XeffAfnLEgqRzTckaiMcLL21FrKzhhw437rbT/Hn8W0N5HpoBgDpXNXWuao42Rbl29gqNUkfCOaZ8Cg0NDN5X9uiMXJ7KLjKUz5QRECxWChcuo7ByCdliATc7W3H/2hy3bui1RppXlbJkUx1Fc4qT7jtpA6UrnmPZtr3YZxYR7LuKKPvImCYQuOCmyd99X/1pUZXDhw9T8vnXPDt/MYWPl2HzhzH6W0vKwOKte6ip30ngeherbSqu1QsBOHcsgGwvjWsAQFVVWgJeWtq8iB1ZVGaKhjUYNlCxajM19TuRe9o4uHYptgzNk7kut2Nh/ggNGJVhzECmPY+l294hcL1rXHwsFqPt+C+Er/ZjHRwxLChRDBkor11Npj2PdTP82DKsRCIRLu35GGe3xMlgH+13hwkoUbO1xsWQgdlPLCfUd5Unx+b8+a++Z0G3xIG/T9MS8I7XE4QHXrmTxtB/wJ5fiCj7xr8zLvZxMtg3STwAcQyYbcmQgUjwDnm2iaZKlpX2u8P31cstegyYEB0OhbBFFFQjnWpgyIB/sJeIMiEjZ60Le5zTZcUzm1CVGPOKCwHo9/wFgE+NGOk2LoYMeE/9xO3oxGSoqV2Oa+/LZOeM3vwsGTaqN2+nauMryO4O8uyjz0kDv7URUmVuykETpI9iaBHf7Gxl2BcgKsfG9/+n69fzYWk5J3oDOCpqsFityO4O3lpZDYDf52POsS5OBW8QVRO+E2uiuabKy8t1p2ru7BLe2H+Q7WtqJ5XHFIWe/iGK80Wm52QBo3/eM/samHtmkK0DLfREpYSFejyeuFoNn0b9g718eeggV3rck8qtFgvzS4rGxYfDYU6/38i8s0N8NnLRkHg9DI/APQpmiOzbsZvaDWsomDVrvNw34qPz598RvzmPOBymcaSDppEuw0K1RiBpAwBWBNblzmVlWRXF+YVMuxPhkVsR7spRTgX7+WLkMteiyR0vUmrg3+RaMplpzSY8ttvIJu36Wgb0dqEgBl7n/EoEv2LePj9GQCug97h7wWwVSdCuFdDbhRpSIMQon2gFNG8hkiRdEkVxJuBKiaT/ToPH4zmkFdS9RkmS9KPD4egWBKEIKABsZqvTIAicA97WE58mTZo0D59/AIQHkL0Ze9qXAAAAAElFTkSuQmCC"/>
                        </defs>
                    </svg>

                </a>
            </li>
        </ul>
    </div>
</section>

<!-- Footer -->
@include('layouts.footer')

<!-- JS -->
<script type="text/javascript" src="{{ asset('js/home/jquery.picEyes.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/home/timeline.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('.demo li').picEyes();
    });
    $(window).scroll(function () {
        if ($("#navbar-primary").offset().top > 10) {
            $("#navbar-primary").addClass("bg-primary");
        } else {
            $("#navbar-primary").removeClass("bg-primary");
        }
    });
</script>
@stack('script')

<!-- Alert Notification -->
@if (session('registered'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal({
                title: 'Đăng ký thành công!',
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
                text: 'Hãy tiếp tục khám phá những điều thú vị nào',
                type: 'success',
                confirmButtonColor: '#4caf50'
            });
        })
    </script>
@endif
</body>
</html>
