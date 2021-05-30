<div class="single-sidebar-widget p-4">

    <!-- Social Followers Info -->
    <div class="social-followers-info">

        <!-- YouTube -->
        <a href="https://www.youtube.com/channel/UCl81LfmyxDUZ1ygd4RNhsAw"
           class="youtube-subscribers pull-left"
           style="width: 50px;">
            <i class="fa fa-youtube" style="font-size: larger;"></i>
        </a>
        <h5 style="font-size: 16px;margin-bottom:5px">Karate League Dojo</h5>
        <div class="g-ytsubscribe" data-channelid="UCl81LfmyxDUZ1ygd4RNhsAw" data-layout="default"
             data-count="default">
        </div>

        <!-- Facebook -->
        <a href="https://www.facebook.com/votrandojo" class="facebook-fans mt-3">
            <i class="fa fa-facebook" style="font-size: larger;"></i>
            <span>Karate League Dojo - K.L.D</span>
        </a>
        <div class="fb-page w-100" data-href="https://www.facebook.com/votrandojo"
             vdata-small-header="false"
             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/votrandojo" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/votrandojo">Karate League Dojo - K.L.D</a>
            </blockquote>
        </div>
    </div>
</div>
<!-- Feature Post -->
<div class="single-sidebar-widget p-4">
    <div class="section-heading">
        <h5>Tin nổi bật</h5>
    </div>
    @foreach($mostFeatured as $post)
        <div class="single-blog-post d-flex">
            <div class="post-thumbnail">
                <a href="{{ route('posts.show', $post->slug) }}">
                    @if($post->is_crawl)
                        <img
                            src="{{ Voyager::image(json_decode($post->image)[0] ?? $post->category->image) }}"
                            alt="{{ $latestPost[0]->title }}">
                    @else
                        <img
                            src="{{ Voyager::image(str_replace('.','-cropped.',json_decode($post->image)[0] ?? $post->category->image)) }}"
                            alt="{{ $post->title }}">
                    @endif
                    <a>
            </div>
            <div class="post-content">
                <a href="{{ route('posts.show', $post->slug) }}" class="post-title"
                   style="margin-bottom: 0;">{{ $post->title }}</a>
                <div class="post-meta d-flex" style="font-size: 10px; margin-bottom: 8px;">
                    <span><i aria-hidden="true"></i> ●
                        @if ($post->created_at->isToday())
                            {{ $post->created_at->diffForHumans() }}
                        @elseif ($post->created_at->isYesterday())
                            Hôm qua lúc {{ $post->created_at->format('H:i') }}
                            @else
                            {{ $post->created_at->format('d \\t\\h\\g m \\l\\ú\\c H:i') }}
                            @endif
                            </sapn>
                </div>
                <div class="post-meta d-flex">
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ views($post)->count() }}</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                        {{ $post->comments->count() }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Category -->
<div class="p-4">
    <div class="section-heading">
        <h5>Các thể loại</h5>
    </div>
    <ul class="catagory-widgets">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->slug) }}" class="pb-3"
                   style="border-bottom: 1px solid #ebebeb;">
            <span>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                {{ $category->name }}
            </span>
                    <span>{{ count($category->post) }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<!-- New Video -->
<div class="single-sidebar-widget p-4">
    <div class="section-heading">
        <h5>Video mới</h5>
    </div>
    @foreach($latestVideos as $video)
        <div class="single-blog-post d-flex">
            <div class="post-thumbnail" style="max-height: 57px; overflow: hidden;">
                <a href="{{ route('videos.show', $video->slug) }}">
                    <img src="{{ $video->thumbnail }}" style="transform: scale3d(1.2, 1.35, 1.2);"
                         alt="{{ $video->title }}">
                    <span class="video-quality">HD</span>
                    <span class="video-duration">{{ TimeYoutube::duration($video->duration) }}</span>
                </a>
            </div>
            <div class="post-content">
                <a href="{{ route('videos.show', $video->slug) }}" class="post-title">
                    {{ $video->title }}
                </a>
                <div class="post-meta d-flex">
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                        {{ $video->view_count }}</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        {{ $video->like_count }}</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                        {{ $video->comment_count + $video->comments->count() }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

