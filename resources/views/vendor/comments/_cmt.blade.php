@if($errors->has('commentable_type'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->get('commentable_type') }}
    </div>
@endif
@if($errors->has('commentable_id'))
    <div class="alert alert-danger" role="alert">
        {{ $errors->get('commentable_id') }}
    </div>
@endif

<!-- <comments-form commentable_type="{{ explode('\\', get_class($model))[2] }}" v-bind:commentable_id="{{ $model->id }}"></comments-form> -->
<!-- Comment Form -->
<div class="contact-form-area">
    <div class="row">
        <div class="col-12">
            <label for="message">Nhập bình luận của bạn ở đây:</label>
            <textarea id="cmt-form" placeholder="Viết bình luận..."></textarea>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <small class="form-text text-muted"><a target="_blank" href="/img/core-img/comments-tips.png">Mẹo bình luận</a> cheatsheet.</small>
            <button class="btn mag-btn-cmt" id="btn-cmt">
                <i class="fa fa-send mr-1"></i>Bình luận
            </button>
        </div>
    </div>
</div>
<br />

<script>
    $(document).ready(function(){
        $('#btn-cmt').click(function() {
            axios.post('/comments', {
                message: $('#cmt-form')[0].emojioneArea.getText(),
                commentable_type: 'App\\Models\\{{ explode('\\', get_class($model))[2] }}',
                commentable_id: '{{ $model->id }}',
            })
            .then(response => {
                $('#cmt-form')[0].emojioneArea.setText('');
                $('.list-comment').prepend(response.data);
                $('.not-comment').hide();
            })
            .catch(e => {
                console.log(e)
            })
        });

        $("#cmt-form").emojioneArea({
            search: false,
            buttonTitle: "Sử dụng TAB để thêm emoji",
            filtersPosition: "bottom",
            events: {
                click: function (editor, event) {
                    $("#cmt-form")[0].emojioneArea.hidePicker();
                }
            }
        });
    });
</script>
