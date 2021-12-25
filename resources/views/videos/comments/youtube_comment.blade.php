<div class="comment_area mt-30">
    <p class="font-bold text-2xl my-4 border-l-4 border-primary pl-2 mt-10 mb-4">Bình luận trên youtube</p>

    <ol>
        @foreach($commentThreads as $commentThread)
        <li class="single_comment_area">
            <div class="gap-2 grid grid-cols-6 md:grid-cols-12">
                <div class="comment-author">
                    <img class="col-span-1 h-auto rounded-full w-14"
                        src="{{ $commentThread->snippet->topLevelComment->snippet->authorProfileImageUrl }}" alt="author">
                </div>

                @php
                    $time = Carbon\Carbon::createFromTimeString($commentThread->snippet->topLevelComment->snippet->publishedAt);
                @endphp
                <div class="col-span-5 md:col-span-11">
                    <div class="p-2 px-3 bg-gray-100 rounded-xl">
                         <span class="mt-0 mb-1">
                            <b>{{ $commentThread->snippet->topLevelComment->snippet->authorDisplayName }}</b>
                            <small class="text-gray-500 text-xs"> ●  {{ $time->diffForHumans() }}</small>
                         </span>
                        <div class="break-words">{!! $commentThread->snippet->topLevelComment->snippet->textDisplay !!}</div>
                    </div>
                    <br>

                    <!-- Reply Content -->
                    @if($commentThread->snippet->totalReplyCount != 0)
                    <ol class="border-l-2 border-primary pl-2">
                        @foreach($commentThread->replies->comments as $reply)
                        <li class="single_comment_area mb-5">
                            <div class="gap-2 grid grid-cols-6 md:grid-cols-12">
                                <img class="col-span-1 h-auto rounded-full w-14"
                                    src="{{ $reply->snippet->authorProfileImageUrl }}" alt="author">
                                @php
                                    $time = Carbon\Carbon::createFromTimeString($reply->snippet->publishedAt);
                                @endphp
                                <div class="col-span-5 md:col-span-11">
                                    <div class="p-2 px-3 bg-gray-100 rounded-xl">
                                        <span class="mt-0 mb-1">
                                            <b>{{ $reply->snippet->authorDisplayName }}</b>
                                            <small class="text-gray-500 text-xs"> ● {{ $time->diffForHumans() }}</small>
                                        </span>
                                        <div class="break-words">{!! $reply->snippet->textDisplay !!}</div>
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
