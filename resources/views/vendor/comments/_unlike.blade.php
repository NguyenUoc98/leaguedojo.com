@if($count > 0)
<a class="btn btn-sm like detail" style="position: absolute;top: -10px;right: 10px;hover: none; box-shadow: 1px 1px 2px 0 #90949c;">
    {{ $count }} <i class="fa fa-thumbs-up ml-1" aria-hidden="true"></i>
</a>
@endif

<a class="btn btn-sm unlike link">Bỏ thích</a>

<script>
    $(document).ready(function() {
        $('#unlike-btn-{{ $comment->id }} .link').click(function() {
            axios.post('/comments/unlike/{{ $comment->id }}', {})
                .then(response => {
                    $('#like-btn-{{ $comment->id }}').show();
                    $('#unlike-btn-{{ $comment->id }}').hide();
                })
                .catch(e => {})
        });

        $('#unlike-btn-{{ $comment->id }} .detail').click(function() {
            axios.post('/comments/get-liker/{{ $comment->id }}', {})
                .then(response => {
                    $('#like_modal .modal-body').html(response.data);
                    $('#like_modal').modal('show');
                    $('.modal-backdrop').hide();
                })
                .catch(e => {})
        });
    });
</script>
