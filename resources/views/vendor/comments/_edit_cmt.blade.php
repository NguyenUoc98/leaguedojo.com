<!-- Edit Form -->
<div class="contact-form-area mt-2 space-y-1 comment-modal" style="display: none"
     id="comment-modal-{{ $comment->id }}">
    <textarea id="message-{{ $comment->id }}"
              class="border-2 w-full rounded-lg p-2">
        {{ $comment->comment }}
    </textarea>

    <div class="text-right">
        <button class="bg-primary px-4 py-1 rounded-md text-white outline-none hover:bg-primary-darker">
            Chỉnh sửa
        </button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#comment-modal-{{ $comment->id }} :button').click(function () {
            axios.put('/comments/{{ $comment->id }}', {
                message: $('#message-{{ $comment->id }}')[0].emojioneArea.getText(),
            })
                .then(response => {
                    $('#cmt-{{ $comment->id }}').text(response.data);
                    $('#comment-modal-{{ $comment->id }}').slideUp(500);
                })
                .catch(e => {
                    console.log(e)
                })
        });

        $("#message-{{ $comment->id }}").emojioneArea({
            search: false,
            buttonTitle: "Sử dụng TAB để thêm emoji",
            filtersPosition: "bottom",
            useInternalCDN: true,
            events: {
                click: function (editor, event) {
                    $("#message-{{ $comment->id }}")[0].emojioneArea.hidePicker();
                }
            }
        });

        $('#message-{{ $comment->id }}')[0].emojioneArea.setText('{{ $comment->comment }}');
    });
</script>
