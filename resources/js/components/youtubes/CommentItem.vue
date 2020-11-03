<template>
    <li class="single_comment_area">

        <!-- Comment Content -->
        <div class="comment-content d-flex">

            <!-- Comment Author -->
            <div class="comment-author">
                <img :src="comment.snippet.topLevelComment.snippet.authorProfileImageUrl" alt="author">
            </div>
            
            <!-- Comment Meta -->
            <div class="comment-meta">
                <b style="font-size: 14px">{{ comment.snippet.topLevelComment.snippet.authorDisplayName }}</b>
                <span class="text-muted"> ● {{ time(comment.snippet.topLevelComment.snippet.publishedAt) }}</span>
                <h6 class="text-muted">{{ date(comment.snippet.topLevelComment.snippet.publishedAt) }}</h6>
                <div style="white-space: pre-wrap;">{{ comment.snippet.topLevelComment.snippet.textDisplay }}</div>
                <br>
                <!-- Reply Content -->
                <ol v-if="comment.snippet.totalReplyCount != 0" style="border-left: 2px solid #ed3939;">
                    <li class="single_comment_area" v-for="reply in comment.replies.comments" 
                        :key="reply.id" :reply="reply">
                        <div class="comment-content d-flex pl-2">

                            <!-- Reply Author -->
                            <div class="comment-author-reply">
                                <img :src="reply.snippet.authorProfileImageUrl" alt="author">
                            </div>

                            <!-- Reply Meta -->
                            <div class="comment-meta">
                                <b style="font-size: 14px">{{ reply.snippet.authorDisplayName }}</b>
                                <span class="text-muted"> ● {{ time(reply.snippet.publishedAt) }}</span>
                                <h6 class="text-muted">{{ date(reply.snippet.publishedAt) }}</h6>
                                <div style="white-space: pre-wrap;">{{ reply.snippet.textDisplay }}</div>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </li>
</template>

<script>
    import moment from 'moment';
    export default {
        props: {
            comment: {
                required: true,
                type: Object,
            },
        },
        methods: {
            date: function(date) {
                return moment(String(date)).format('D \\t\\h\\g M, YYYY');
            },
            time: function(date) {
                return moment(String(date)).format('h:mm A');
            }
        }

    }
</script>
