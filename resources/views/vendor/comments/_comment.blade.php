@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))
<br/>
@if(isset($reply) && $reply === true)
    @if(get_class($comment)::find($comment->child_id)->child_id == '')
    <div id="comment-{{ $comment->id }}" style="border-left: 2px solid #ed3939;padding-left:8px">
    @else
    <div id="comment-{{ $comment->id }}" class="reply-to-reply">
    @endif
        <div class="comment-content d-flex">
            <div class="comment-author-reply">
                <img class="mr-3" src="{{ Voyager::image($comment->commenter->avatar) }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
            </div>
@else
    <li id="comment-{{ $comment->id }}">
        <div class="grid md:grid-cols-12 grid-cols-6 gap-2">
            <img class="col-span-1 w-14 h-14 rounded-full"
                 src="{{ Voyager::image($comment->commenter->avatar) }}"
                 alt="{{ $comment->commenter->name ?? $comment->guest_name }}">
@endif
            <div class="@if(isset($reply) && $reply === true)comment-meta-reply @endif comment-meta meta-{{ $comment->id }} col-span-5 md:col-span-11">
                <div class="p-2 px-3 bg-gray-100 rounded-xl">
                    <span class="mt-0 mb-1">
                        <b>{{ $comment->commenter->name ?? $comment->guest_name }}</b>
                        <small class="text-gray-500 text-xs"> ● {{ $comment->created_at->diffForHumans() }}</small>
                    </span>
                    <div class="break-words" id="cmt-{{ $comment->id }}">
                        @if(isset($replyTo))
                            {!! $markdown->line('**[' . $replyTo . ']**' . (' ') . $comment->comment) !!}
                        @else
                            {!! $markdown->line($comment->comment) !!}
                        @endif
                    </div>
                </div>
                <div class="py-1 relative">
                    @can('like-comment', $comment)
                        <span id="like-btn-{{ $comment->id }}">
                            @include('comments::_like', ['count' => $comment->likes == '' ? 0 : count(json_decode($comment->likes))])
                        </span>
                        <span id="unlike-btn-{{ $comment->id }}" style="display:none;">
                            @include('comments::_unlike', ['count' => $comment->likes == '' ? 1 : count(json_decode($comment->likes)) + 1])
                        </span>
                    @endcan

                    @can('unlike-comment', $comment)
                        <span id="like-btn-{{ $comment->id }}" style="display:none;">
                            @include('comments::_like', ['count' => count(json_decode($comment->likes)) - 1])
                        </span>
                        <span id="unlike-btn-{{ $comment->id }}">
                            @include('comments::_unlike', ['count' => $comment->likes == '' ? 0 : count(json_decode($comment->likes))])
                        </span>
                    @endcan

                    @can('reply-to-comment', $comment)
                        <a class="bg-white border border-black cursor-pointer hover:bg-black hover:text-white px-2 py-1 rounded-full text-black text-xs"
                           data-form="#reply-modal-{{ $comment->id }}" data-close=".reply-modal" onclick="toggleEditFrom(this)">
                            Phản hồi
                        </a>
                    @endcan

                    @can('edit-comment', $comment)
                        <a class="bg-white border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white px-2 py-1 rounded-full text-blue-500 text-xs link"
                           data-form="#comment-modal-{{ $comment->id }}" data-close=".comment-modal" onclick="toggleEditFrom(this)">
                            Chỉnh sửa
                        </a>
                    @endcan

                    @can('delete-comment', $comment)
                        <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();"
                           class="bg-white border border-primary cursor-pointer hover:bg-primary hover:text-white px-2 py-1 rounded-full text-primary text-xs ml-1">
                            Xóa
                        </a>
                        <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endcan
                </div>

                @can('edit-comment', $comment)
                <!-- <edit-comment :comment="{{ $comment }}"></edit-comment> -->
                @include('comments::_edit_cmt')
                @endcan

                @can('reply-to-comment', $comment)
                <!-- <reply-comment :comment="{{ $comment }}"></reply-comment> -->
                @include('comments::_reply_cmt')
                @endcan

                {{-- Recursion for children --}}
                @if($grouped_comments!='' && $grouped_comments->has($comment->id))
                @foreach($grouped_comments[$comment->id]->reverse() as $child)
                @include('comments::_comment', [
                'comment' => $child,
                'reply' => true,
                'grouped_comments' => $grouped_comments,
                'replyTo' => $comment->commenter->name
                ])
                @endforeach
                @endif
            </div>
        </div>
@if(isset($reply) && $reply === true)
    </div>
@else
    </li>
@endif
