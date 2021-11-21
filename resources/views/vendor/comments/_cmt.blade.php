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

<!-- Comment Form -->
<div class="space-y-1">
    <textarea id="cmt-form" placeholder="Viết bình luận..." class="border-2 w-full rounded-lg p-2"></textarea>
    <div class="w-full text-right">
        <button class="bg-primary px-4 py-1 rounded-md text-white outline-none hover:bg-primary-darker" id="btn-cmt">
            Bình luận
        </button>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function () {
        $('#btn-cmt').click(function () {
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
            useInternalCDN: true,
            events: {
                click: function (editor, event) {
                    $("#cmt-form")[0].emojioneArea.hidePicker();
                }
            }
        });
    });
</script>
@endpush
