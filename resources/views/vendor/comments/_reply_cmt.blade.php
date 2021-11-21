<!-- Reply Form -->
<div class="contact-form-area mt-2 space-y-1 reply-modal" id="reply-modal-{{ $comment->id }}" style="display: none">
    <textarea id="message-{{ $comment->id }}" class="border-2 w-full rounded-lg p-2" placeholder="Viết bình luận..."></textarea>

    <div class="w-full text-right">
        <button class="bg-white px-4 py-1 rounded-md outline-none hover:bg-cancel hover:text-white border border-cancel">
            Phản hồi
        </button>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#reply-modal-{{ $comment->id }} :button').click(function() {
            axios.post('/comments/{{ $comment->id }}', {
                message: $('#message-{{ $comment->id }}')[0].emojioneArea.getText(),
            })
            .then(response => {
                $('.meta-{{ $comment->id }}').append(response.data);
                $('#reply-modal-{{ $comment->id }}').slideUp(500);
            })
            .catch(e => {
                console.log(e)
            })
        });

        $("#message-{{ $comment->id }}").emojioneArea({
            search: false,
            pickerPosition: "bottom",
            buttonTitle: "Sử dụng TAB để thêm emoji",
            filtersPosition: "bottom",
            events: {
                click: function (editor, event) {
                    $("#message-{{ $comment->id }}")[0].emojioneArea.hidePicker();
                }
            }
        });
    });
</script>
