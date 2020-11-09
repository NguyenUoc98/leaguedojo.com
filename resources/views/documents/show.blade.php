@extends('layouts.master')
@section('page_title', $document->title)

@section('content')

@php
use Carbon\Carbon;
Carbon::setlocale('vi');
$images = json_decode($document->image);
@endphp

<style>
    @media (max-width: 799px) {
        .single-sidebar-widget {
            display: none !important;
        }
    }
</style>

<!-- Image Header -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/img/news.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>TÀI LIỆU</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="post-detail-area">
    <div class="container md-p-0">
        <!-- Route of post -->
        <div class="mt-md-4">
            <div class="col-12 p-0">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb box-shadow mb-0">
                        <a href="{{ route('home') }}" class="mr-2"><i class="fa fa-home mr-1" aria-hidden="true"></i>Trang chủ</a>
                        <span> / </span>
                        <a href="{{ route('news') }}" class="mr-2 ml-2"></i>Tài liệu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Post Detail -->
        <div class="col-12 p-0">
            <div class="row justify-content-center pt-md-4">

                <!-- Content -->
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="post-detail-content bg-white mb-30 p-4 box-shadow">
                        <div class="blog-content">
                            <h4 class="post-title">{{ $document->title }}</h4>

                            <!-- Post Meta -->
                            <div class="post-meta-2 mb-3" style="color: #ed3939">
                                <span> ●
                                    @if ($document->created_at->isToday())
                                    {{ $document->created_at->diffForHumans() }}
                                    @elseif ($document->created_at->isYesterday())
                                    Hôm qua lúc {{ $document->created_at->format('H:i') }}
                                    @else
                                    {{ $document->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                    @endif
                                </span>
                                <span><i class="fa fa-eye ml-2" aria-hidden="true"></i>
                                    {{ views($document)->count() }} lượt xem
                                </span>
                                <span><i class="fa fa-comments-o ml-2" aria-hidden="true"></i>
                                    0 bình luận
                                </span>

                                <!-- Post Author -->
                                <div class="post-author d-flex justify-content-between mt-4">
                                    <a href="#" class="author-name">Nguồn: {{ $document->source }}</a>
                                    <div class="fb-like" data-href="{{ env('APP_URL').'/documents/'.$document->slug }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                                </div>
                            </div>

                            <div class="document-content">
                                <iframe src="/ViewerJS/?title={{ $document->title }}#..{{ '/storage/' . json_decode($document->file)[0] }}" width='100%' height='100%' allowfullscreen webkitallowfullscreen></iframe>
                            </div>
                            <div class="text-right my-2">
                                <!-- <a href="{{ route('documents.show', $document->slug).'?download' }}"
                                    class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Tải xuống</a> -->

                                <span class="btn btn-success" id="btn-download"><i class="fa fa-download" aria-hidden="true"></i> Tải xuống</span>
                            </div>
                            <p>{!! str_replace("\n", '<br>', $document->description) !!}</p>
                        </div>
                    </div>

                    <!-- ad_ngang -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:100%;height:200px"
                        data-ad-client="ca-pub-1747924550904432"
                        data-ad-slot="9889684921"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                    <!-- Comments -->
                    <div class="related-post-area bg-white p-30 mb-30 mt-30 box-shadow">
                        @comments(['model' => $document])
                    </div>

                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="right-sidebar bg-white mb-md-4 box-shadow" style="overflow: hidden;">
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
        
    </div>
</section>


<script>
    $('#btn-download').click(function() {
        Swal.fire({
            title: 'Bạn có phải Robot?',
            text: 'Kết quả của phép tính trên là:',
            imageUrl: '/img/robot.png',
            imageWidth: 250,
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            showLoaderOnConfirm: true,
            confirmButtonColor: '#28a745',
            background: 'url(/img/core-img/notify-bg.png)',

        }).then((result) => {
            if (result.value) {
                Swal({
                    title: "Chưa chính xác rồi",
                    background: 'url(/img/core-img/notify-bg.png)',
                    text: "Haha, kết quả sai rồi nhé!",
                    type: "error",
                });
            }
        })
    });
</script>

@endsection