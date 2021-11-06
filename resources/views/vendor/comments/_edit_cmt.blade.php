<!-- Edit Form -->
<div class="contact-form-area panel-collapse collapse mt-2" id="comment-modal-{{ $comment->id }}">
    <div class="row">
        <div class="col-12">
            <textarea id="message-{{ $comment->id }}">{{ $comment->comment }}</textarea>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <small class="form-text text-muted"><a target="_blank" href="/img/core-img/comments-tips.png">Mẹo bình luận</a> cheatsheet.</small>
            <button class="btn mag-btn-cmt btn-reply" >
                <i class="fa fa-send mr-1"></i>Chỉnh sửa
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#comment-modal-{{ $comment->id }} :button').click(function() {
            axios.put('/comments/{{ $comment->id }}', {
                message: $('#message-{{ $comment->id }}')[0].emojioneArea.getText(),
            })
            .then(response => {
                $('#cmt-{{ $comment->id }}').text(response.data);
                $('#comment-modal-{{ $comment->id }}').collapse('hide');
            })
            .catch(e => {
                console.log(e)
            })
        });

        $("#message-{{ $comment->id }}").emojioneArea({
            search: false,
            buttonTitle: "Sử dụng TAB để thêm emoji",
            filtersPosition: "bottom",
            events: {
                click: function (editor, event) {
                    $("#message-{{ $comment->id }}")[0].emojioneArea.hidePicker();
                }
            }
        });

        $('#message-{{ $comment->id }}')[0].emojioneArea.setText('{{ $comment->comment }}');
    });
</script>
