<template>
    <li class="notify nav-item dropdown">
        <a class="dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <img src="/img/core-img/bell.png" style="width: 20px;height: 20px;">
            <span class="badge">{{ unreadNotification.length }}</span>
        </a>

        <div class="dropdown-menu pt-0" aria-labelledby="navbarDropdown">
            <h4>Thông báo</h4>
            <div class="notify-head">
                <span>Thông báo mới</span>
                <a href="/notification/readAll">Đánh dấu đã đọc tất cả</a>
            </div>
            <div class="notify-body">
            <li class="dropdown-item" v-for='unread in unreadNotification'>
                <a v-bind:href="unread.data.data.href" v-on:click="markAsRead(unread)">
                    <div class="d-flex">
                        <div class="image">
                            <img v-bind:src="unread.data.data.img" class="rounded" style="border-radius: 50%!important;">
                            <img v-bind:src="unread.data.data.icon" class="rounded icon">
                        </div>
                        <div style="max-width: 258px;">
                            <div class="item" v-html="unread.data.data.text">
                                {{ unread.data.data.text }}
                            </div>
                            <small>{{ unread.data.data.time | diffForHumans }}</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown-item" v-if = 'unreadNotification.length == 0'>
                Không có thông báo
            </li>
            </div>
        </div>
    </li>
</template>

<script>
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import 'dayjs/locale/vi';

    export default {
        created() {
            dayjs.locale('vi');
            dayjs.extend(relativeTime);
        },
        props: ['unreads','userid'],
        data() {
            return {
                unreadNotification: this.unreads
            }
        },
        filters: {
            diffForHumans: (date) => {
                if (!date){
                    return null;
                }
                
                return dayjs(date).fromNow();
            }
        },

        methods: {
            markAsRead: function(unread) {
                axios.post('/notification/read', {
                    id: unread.id
                });
            }
        },

        mounted() {
            Echo.private('App.User.' + this.userid)
            .notification((notification) => {
                let newUnread = {data:{type: notification.type, data: notification.data}};
                this.unreadNotification.unshift(newUnread);

                $('#toast-img').attr("src", newUnread.data.data.img);
                $('.toast-body').html(newUnread.data.data.text);
                $('.toast').toast('show');
            });
        }
    };
</script>
