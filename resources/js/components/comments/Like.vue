<template>
    <a class="btn btn-sm like" @click.prevent="like()">
        {{ count }}<i class="fa fa-thumbs-up ml-1" aria-hidden="true"></i>
    </a>
</template>

<script>
    export default {
        props: ['count', 'comment'],
        methods: {
            like: function() {
                axios.post('/comments/like/' + this.comment.id, {
                })
                .then(response => {
                    $('#like-btn-'+this.comment.id).hide();
                    $('#unlike-btn-'+this.comment.id).show();
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
    