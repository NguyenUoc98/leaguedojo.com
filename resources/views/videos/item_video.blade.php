<div class="col-lg-3 col-md-4 mb-30 item-video">
    <div class="single-blog-post style-4 bg-white">
        <div class="post-thumbnail thumbnail-hd">
            <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
            <a href="{{ route('videos.show', $video->slug) }}" class="video-play"><i class="fa fa-play"></i></a>
            <span class="video-quality">HD</span>
            <span class="video-duration">{{ TimeYoutube::duration($video->duration) }}</span>
        </div>
        <div class="post-content px-3 pb-2">
            <a href="{{ route('videos.show', $video->slug) }}" class="post-title">{{ $video->title }}</a>
            <div class="post-meta d-flex">
                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                    {{ $video->view_count }}</a>
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    {{ $video->like_count}}</a>
                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                    {{ $video->comment_count }}</a>
            </div>
        </div>
    </div>
</div>