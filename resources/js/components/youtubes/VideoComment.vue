<template>
    <div class="comment_area">
        <div class="section-heading">
            <h5>Bình luận trên Youtube</h5>
        </div>

        <ol>
            <comment v-for="comment in videoComments"
                     :key="comment.id"
                     :comment="comment">
            </comment>
        </ol>
    </div>
</template>

<script>
    import comment from './CommentItem'
    export default {
        components: {
            comment
        },
        props: ['comments'],
        data() {
            return {
                videoComments: this.comments
            }
        },
    }
</script>
