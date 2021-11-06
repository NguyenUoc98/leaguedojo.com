<div class="row">
    <div class="col-md-5 single-video-area">
        {!! $video->player->embedHtml !!}
    </div>
    <div class="col-md-7">
        <div class="feature-video-content">
            <h4>{{ $video->snippet->title }}</h4>
            <p>{{ $video->statistics->viewCount }} lượt xem ●
                {{ TimeYoutube::published($video->snippet->publishedAt) }} </p>
            <p>
                <div style="display: flex">
                    <div class="voyager-activity"> {{ TimeYoutube::duration($video->contentDetails->duration) }}</div>
                    <div class="voyager-thumbs-up" style="margin-left:0.3em"> {{ $video->statistics->likeCount }}</div>
                    <div class="voyager-thumbs-up"
                        style="margin-left:0.3em;transform: rotateX(180deg);-webkit-transform: rotateX(180deg);">
                        {{ $video->statistics->dislikeCount }}</div>
                    <div class="voyager-bubble" style="margin-left:0.3em"> {{ $video->statistics->commentCount }}</div>
                </div>
            </p>
            <p>{!! str_replace("\n", '<br>', $video->snippet->description) !!}</p>
        </div>
    </div>
</div>
