@php
if (isset($approved) and $approved == true) {
    $comments = $model->approvedComments;
} else {
    $comments = $model->comments;
}
@endphp

@auth
<div class="section-heading">
    <h5>Bình luận</h5>
</div>
@include('comments::_cmt')
@else
<div class="card mb-30 border-danger">
    <div class="card-body">
        <h3 class="card-title text-danger">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Yêu cầu đăng nhập!</h3>
        <p class="card-text mb-0">Bạn cần phải đăng nhập để bình luận bài viết.</p>
        <a href="{{ route('login') }}" class="btn mag-btn-cmt">Đăng nhập</a>
    </div>
</div>
@endauth

<ul class="comment_area">
    <div class="section-heading mb-0">
        <h5>Các bình luận</h5>
    </div>
    <div class="list-comment">
        @if($comments->count() < 1)
        <div class="not-comment mt-2">
            <div class="alert alert-warning">Chưa có bình luận nào.</div>
        </div>
        @else
            @php
                $grouped_comments = $comments->sortBy('created_at', 0,true)->groupBy('child_id');
            @endphp
            @foreach($grouped_comments as $comment_id => $comments)
                {{-- Process parent nodes --}}
                @if($comment_id == '')
                    @foreach($comments as $comment)
                        @include('comments::_comment', [
                            'comment' => $comment,
                            'grouped_comments' => $grouped_comments
                            ])
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>
</ul>
