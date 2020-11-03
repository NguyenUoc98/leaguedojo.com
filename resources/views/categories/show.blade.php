@extends('layouts.master')
@section('page_title','Thể loại')

@section('content')

<style>
@media (max-width: 799px) {
    .single-sidebar-widget {
        display: none !important;
    }
}
</style>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url({{ Voyager::image($category->image) }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>{{ $category->name }}</h2>
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
                        <a href="{{ route('news') }}" class="mr-2 ml-2">Tin tức</a>
                        <span> / </span>
                        <a href="#" class="mr-2 ml-2">Thể loại</a>
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
                    @forelse($posts as $post)

                    <!-- Single Catagory Post -->
                    <div class="single-catagory-post d-flex flex-wrap">
                        <div class="post-thumbnail">
                            <a href="{{ route('posts.show',$post->slug) }}">
                                <img src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $category->image)) }}"
                                    alt="{{ $post->title }}">
                            </a>
                        </div>

                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <a href="{{ route('posts.show', $post->slug) }}" class="post-title">{{ $post->title }}</a>

                            <div class="post-meta-2">
                                <span>●
                                    @if ($post->updated_at->isToday())
                                    {{ $post->updated_at->diffForHumans() }}
                                    @elseif ($post->updated_at->isYesterday())
                                    Hôm qua lúc {{ $post->updated_at->format('H:i') }}
                                    @else
                                    {{ $post->updated_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                                    @endif
                                </span>
                                <span href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ views($post)->count() }} lượt xem
                                </span>
                                <span href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                    0 bình luận
                                </span>
                            </div>
                            <div class="excerpt">
                                <p>{!! $post->excerpt !!}</p>
                            </div>
                        </div>
                    </div>
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-fb+5w+4e-db+86"
                        data-ad-client="ca-pub-1747924550904432"
                        data-ad-slot="4308031664"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    @empty
                    <p class="text-center"> Không có bài viết nào </p>
                    @endforelse

                    <!-- Pagination -->
                    <div class="page-item d-flex justify-content-end">
                        {{ $posts->onEachSide(1)->links() }}
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
