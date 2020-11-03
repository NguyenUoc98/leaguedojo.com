@extends('layouts.master')
@section('page_title', 'Cơ sở tập luyện')

@section('content')
<div class="pt-3">
    <div class="container">

        <!-- Route of post -->
        <div class="row">
            <div class="col-12">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb box-shadow mb-0">
                        <a href="{{ route('home') }}" class="mr-2"><i class="fa fa-home mr-1" aria-hidden="true"></i>Trang chủ</a>
                        <span> / </span>
                        <a href="{{ route('news') }}" class="mr-2 ml-2"></i>Các cơ sở</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center mb-15">
            @foreach($dojos as $dojo)
            <div class="col-md-3 bg-white box-shadow p-3 m-3 mb-15">
                <div class="single-blog-post style-4">
                    @php
                    $images = json_decode($dojo->image);
                    @endphp
                    <div class="post-thumbnail thumbnail">
                        <img src="{{ Voyager::image($images[0]) }}" alt="{{ $dojo->slug }}">
                    </div>
                    <div class="post-content text-center">
                        <h5>{{ $dojo->name }}</h5>
                        <div class="post-meta">
                            <span>{{ number_format($dojo->tuitionPolicys()->where('date_apply', '<=', \Carbon\Carbon::now()->format('Y-m') . '-01')->first()->price, 0, '', '.') . ' VNĐ/tháng' }}</span>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-15">
                        <a class="btn btn-info mr-2" style="font-size: 13px" href="{{ route('dojos.show', $dojo->slug) }}">
                            Chi tiết
                        </a>
                        <a class="btn btn-danger" style="font-size: 13px" href="{{ route('workout-registrations.create', ['dojo_id' => $dojo->id]) }}">
                            Đăng ký tập
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
</div>

@endsection