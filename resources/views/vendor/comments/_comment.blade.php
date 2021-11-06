@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

<br />{{-- Margin bottom --}}

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
                <div class="comment-content d-flex">
                    <div class="comment-author">
                        <img class="mr-3" src="{{ Voyager::image($comment->commenter->avatar) }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
                    </div>
                    @endif
                    <div class="@if(isset($reply) && $reply === true)comment-meta-reply @endif comment-meta meta-{{ $comment->id }}">
                        <div class="p-2 px-3" style="background-color: #f7f7f7;border-radius: 15px">
                            <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }}
                                <small class="text-muted"> ● {{ $comment->created_at->diffForHumans() }}</small>
                            </h5>
                            <div style="white-space: pre-wrap;" id="cmt-{{ $comment->id }}">@if(isset($replyTo)){!! $markdown->line('**[' . $replyTo . ']**' . (' ') . $comment->comment) !!}@else{!! $markdown->line($comment->comment) !!}@endif
                            </div>

                        </div>
                        <div class="py-1 pl-3" style="position: relative;">
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
                            <a class="btn btn-sm reply" data-toggle="collapse" href="#reply-modal-{{ $comment->id }}">Phản hồi</a>
                            @endcan

                            @can('edit-comment', $comment)
                            <a class="btn btn-sm text-primary like" data-toggle="collapse" href="#comment-modal-{{ $comment->id }}">Chỉnh sửa</a>
                            @endcan

                            @can('delete-comment', $comment)
                            <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm delete">Xóa</a>
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

<div class="modal modal-primary fade" tabindex="-1" id="like_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content box-shadow">
            <div class="modal-header">
                <h5 class="modal-title">Những người đã thích</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="font-size: 14px; line-height:2;max-height: 290px;overflow: auto;">
            </div>
        </div>
    </div>
</div>