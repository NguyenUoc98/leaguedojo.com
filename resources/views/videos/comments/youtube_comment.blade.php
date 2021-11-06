<div class="comment_area mt-30">
    <div class="section-heading">
        <h5>Bình luận trên Youtube</h5>
    </div>

    <ol>
        @foreach($commentThreads as $commentThread)
        <li class="single_comment_area">
            <div class="comment-content d-flex">
                <div class="comment-author">
                    <img src="{{ $commentThread->snippet->topLevelComment->snippet->authorProfileImageUrl }}" alt="author">
                </div>

                @php
                    $time = Carbon\Carbon::createFromTimeString($commentThread->snippet->topLevelComment->snippet->publishedAt);
                @endphp
                <div class="comment-meta">
                    <div class="p-2 px-3" style="background-color: #f7f7f7;border-radius: 15px">
                        <b style="font-size: 14px">{{ $commentThread->snippet->topLevelComment->snippet->authorDisplayName }}</b>
                        <span class="text-muted"> ● {{ $time->diffForHumans() }}</span>
                        <h6 class="text-muted">{{ $time->isoFormat('D \\t\\h\\g M, YYYY') }}</h6>
                        <div style="white-space: pre-wrap;">{!! $commentThread->snippet->topLevelComment->snippet->textDisplay !!}</div>
                    </div>
                    <br>

                    <!-- Reply Content -->
                    @if($commentThread->snippet->totalReplyCount != 0)
                    <ol style="border-left: 2px solid #ed3939;">
                        @foreach($commentThread->replies->comments as $reply)
                        <li class="single_comment_area">
                            <div class="comment-content d-flex pl-2">
                                <div class="comment-author-reply">
                                    <img src="{{ $reply->snippet->authorProfileImageUrl }}" alt="author">
                                </div>

                                @php
                                    $time = Carbon\Carbon::createFromTimeString($reply->snippet->publishedAt);
                                @endphp
                                <div class="comment-meta">
                                    <div class="p-2 px-3" style="background-color: #f7f7f7;border-radius: 15px">
                                        <b style="font-size: 14px">{{ $reply->snippet->authorDisplayName }}</b>
                                        <span class="text-muted"> ● {{ $time->diffForHumans() }}</span>
                                        <h6 class="text-muted">{{ $time->isoFormat('D \\t\\h\\g M, YYYY') }}</h6>
                                        <div style="white-space: pre-wrap;">{!! $reply->snippet->textDisplay !!}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @endif
                </div>
            </div>
        </li>
        @endforeach
    </ol>
</div>
