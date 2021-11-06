<template>
    <!-- Comment Form -->
    <div class="contact-form-area">
        <div class="row">
            <div class="col-12">
                <label for="message">Nhập bình luận của bạn ở đây:</label>
                <textarea id="test"></textarea>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <small class="form-text text-muted"><a target="_blank" href="/img/core-img/comments-tips.png">Mẹo bình luận</a> cheatsheet.</small>
                <button class="btn mag-btn-cmt comment" @click.prevent="submitComment()">
                    <i class="fa fa-send mr-1"></i>Bình luận
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['commentable_type', 'commentable_id', 'error'],
        methods: { 
            submitComment: function() {
                axios.post('/comments', {
                    message: $('#test')[0].emojioneArea.getText(),
                    commentable_type: 'App\\Models\\' + this.commentable_type,
                    commentable_id: this.commentable_id.toString(),
                })
                .then(response => {
                    this.message = '';
                    $('#test')[0].emojioneArea.setText('');
                    $('.list-comment').prepend(response.data);
                })
                .catch(e => {
                    console.log(e)
                })
            }
        },
        mounted() {
        }
    }
</script>
