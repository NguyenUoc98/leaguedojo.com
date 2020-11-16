@extends('layouts.master')
@section('page_title','Tài liệu')

@section('content')

<style>
@media (max-width: 799px) {
    .single-sidebar-widget {
        display: none !important;
    }
}
</style>


<!-- ##### Breadcrumb Area Start ##### -->
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
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pt-breadcrumb">
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" class="mr-2">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Tài liệu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xs-8 col-lg-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                    @forelse($documents as $document)

                    <!-- Single Catagory Post -->
                    <div class="single-catagory-post d-flex flex-wrap">

                        <div class="post-thumbnail border border-dark" style="width: unset;flex: unset;">
                            <a href="{{ route('documents.show', $document->slug) }}">
                                <img src="{{ Voyager::image($document->thumbnail) }}"
                                    alt="{{ $document->title }}" style="height:250px">
                            </a>
                        </div>

                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <a href="{{ route('documents.show', $document->slug) }}"
                                class="post-title">{{ $document->title }}</a>

                            <div class="post-meta-2">
                                <span>●
                                    @if ($document->created_at->isToday())
                                    {{ $document->created_at->diffForHumans() }}
                                    @elseif ($document->created_at->isYesterday())
                                    Hôm qua lúc {{ $document->created_at->format('H:i') }}
                                    @else
                                    {{ $document->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                    @endif
                                </span>
                                <span href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ views($document)->count() }} lượt xem
                                </span>
                                <span href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                    0 bình luận
                                </span>
                            </div>
                            <div class="excerpt">
                                <p>{!! $document->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle mt-3"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-fb+5w+4e-db+86"
                        data-ad-client="ca-pub-1747924550904432"
                        data-ad-slot="4308031664"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    @empty
                    <p class="text-center"> Không có tài liệu nào </p>
                    @endforelse

                    <!-- Pagination -->
                    <div class="page-item d-flex justify-content-end">
                        {{ $documents->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>

            <div class="col-12 col-xs-4 col-lg-4">
                <div class="sidebar-area bg-white mb-30 box-shadow" style="overflow: hidden;">
                    @include('layouts.sidebar_widget')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->

@endsection