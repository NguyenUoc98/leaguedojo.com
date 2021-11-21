@if($count > 0)
<a class="-top-3 absolute border border-blue-500 detail like px-2 right-7 rounded-full shadow-top text-blue-500 text-sm bg-white cursor-pointer">
    {{ $count }}
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
    </svg>
</a>
@endif

<a class="bg-white border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white px-2 py-1 rounded-full text-blue-500 text-xs link">Thích</a>

<script>
    $(document).ready(function() {
        $('#like-btn-{{ $comment->id }} .link').click(function() {
            axios.post('/comments/like/{{ $comment->id }}', {})
                .then(response => {
                    $('#like-btn-{{ $comment->id }}').hide();
                    $('#unlike-btn-{{ $comment->id }}').show();
                })
                .catch(e => {})
        });

        $('#like-btn-{{ $comment->id }} .detail').click(function() {
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
