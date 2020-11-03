<div class="orther-item">
    <div class="single-blog-post d-flex p-2" style="border-bottom: 0;margin-bottom: 0">
        <div class="orther-video post-thumbnail">
            <a href="{{ route('videos.show', $orther['slug']) }}">
                <img src="{{ $orther['thumbnail'] }}" alt="{{ $orther['title'] }}">
                <span class="video-quality">HD</span>
            </a>
        </div>
        <div class="post-content mt-0">
            <a href="{{ route('videos.show', $orther['slug']) }}" class="post-title">
                {{ $orther['title'] }}
            </a>
            <div class="post-meta d-flex">
                <a href="#">KARATE LEAGUE DOJO</a>
            </div>
        </div>
    </div>
</div>