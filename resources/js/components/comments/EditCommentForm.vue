<template>

    <!-- Edit Form -->
    <div class="contact-form-area panel-collapse collapse mt-2" :id="'comment-modal-' + comment.id">
        <div class="row">
            <div class="col-12">
                <textarea required v-model="message" class="form-control" rows="2"></textarea>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <small class="form-text text-muted"><a target="_blank" href="/img/core-img/comments-tips.png">Mẹo bình luận</a> cheatsheet.</small>
                <button class="btn mag-btn-cmt btn-reply" @click.prevent="submitEdit()">
                    <i class="fa fa-send mr-1"></i>Chỉnh sửa
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comment'],
        data() {
            return{
                message: this.comment.comment
            }
        },
        methods: {
            submitEdit: function() {
                axios.put('/comments/'+ this.comment.id, {
                    message: this.message
                })
                .then(response => {
                    $('#cmt-' + this.comment.id).text(response.data);
                    $('#comment-modal-' + this.comment.id).collapse('hide');
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
