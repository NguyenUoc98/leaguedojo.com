<template>
    <a class="btn btn-sm unlike" @click.prevent="unlike()">
        {{ count }}<i class="fa fa-thumbs-up ml-1" aria-hidden="true"></i>
    </a>
</template>>

<script>
    export default {
        props: ['count', 'comment'],
        methods: {
            unlike: function() {
                axios.post('/comments/unlike/' + this.comment.id, {
                })
                .then(response => {
                    $('#like-btn-' + this.comment.id).show();
                    $('#unlike-btn-' + this.comment.id).hide();
                })
                .catch(e => {
                    console.log(e)
                })
            }
        }
    }
</script>
    