@extends('layouts.master')
@section('page_title', 'Sự kiện')

@section('content')

<link type="text/css" href="/css/argon.css" rel="stylesheet">
<div class="loader">
    <img src="/img/core-img/loading.gif">
</div>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Sự kiện</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="pt-md-3">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" class="mr-2">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Sự kiện</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="page-content container mb-30 px-0">
        <div class="text-right pr-md-0 pr-2">
            <span class="btn btn-danger mb-4 point" style="border-radius: 50px;"> {{ 'Điểm tích lũy: ' . $point . 'đ' }}</span>
        </div>

        <ul class="nav nav-tabs">
            <li> <a data-toggle="tab" href="#not-sign" @if(empty($active_tab) || (isset($active_tab) && $active_tab=='not-sign' )){!! 'class="active"' !!}@endif>Chưa đăng ký</a></li>
            <li> <a data-toggle="tab" href="#signed" @if($active_tab=='signed' ){!! 'class="active"' !!}@endif>Đã đăng ký</a></li>
        </ul>

        <div class="tab-content">
            <div id="not-sign" class="p-3 tab-pane fade in @if($active_tab == 'not-sign'){!! 'active show' !!}@endif">
                <div class="row list-voucher">
                    @forelse($eventNotSign as $event)
                    <div class="col-md-6 col-lg-4 mb-3">
                        @include('events.not-sign', ['event' => $event, 'type' => 'not-sign'])
                    </div>
                    @empty
                    <div class="text-center w-100 p-30">
                        <p> Không có sự kiện nào </p>
                    </div>
                    @endforelse
                </div>
            </div>

            <div id="signed" class="p-3 tab-pane fade in @if($active_tab == 'signed'){!! 'active show' !!}@endif">
                <div class="row list-voucher">
                    @forelse($eventSigneds as $event)
                        @include('events.signed', ['event' => $event])
                    @empty
                    <div class="text-center w-100 p-30">
                        <p> Không có sự kiện nào </p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- ad_ngang -->
        <ins class="adsbygoogle mt-4"
            style="display:inline-block;width:100%;height:150px"
            data-ad-client="ca-pub-1747924550904432"
            data-ad-slot="9889684921"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>
</div>
<!-- ##### Archive Post Area End ##### -->
@if (session('message'))
<script type="text/javascript">
    $(document).ready(function() {
        Swal({
            title: "{{ session('status ') }}",
            background: 'url(/img/core-img/notify-bg.png)',
            text: "{{ session('message') }}",
            type: "{{ session('type') }}",
            confirmButtonColor: "{{ session('color') }}"
        });
    })
</script>
@endif
@endsection