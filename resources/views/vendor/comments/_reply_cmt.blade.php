<!-- Reply Form -->
<div class="contact-form-area mt-2 space-y-1 reply-modal relative" id="reply-modal-{{ $comment->id }}" style="display: none">
    <textarea id="message-{{ $comment->id }}" class="border-2 w-full rounded-lg p-2" placeholder="Viết bình luận..."></textarea>

    <div class="absolute bottom-2 right-2">
        <button class="bg-white border border-gray-500 hover:bg-cancel hover:text-white outline-none p-1 rotate-90 rounded-full text-gray-500 transform">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
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
