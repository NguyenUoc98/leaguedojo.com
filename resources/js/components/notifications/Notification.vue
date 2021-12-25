<template>
    <div>
        <button type="button" id="user-notify-button"
                class="relative bg-cancel p-2 rounded-full text-white hover:text-gray-300 outline-none shadow-lg">
            <span class="-top-2 absolute bg-yellow-600 font-bold p-1 rounded-full text-red-100 text-xs transform scale-75 w-6">
                {{ unreadNotification.length }}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
            </svg>
        </button>

        <div
            class="bg-gray-100 duration-200 ease-in-out fixed h-screen md:p-8 p-4 right-0 top-0 transform transition z-50 translate-x-full"
            id="user-notify-panel">
            <div class="flex items-center justify-between mb-8">
                <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800 m-0">Thông báo
                    ({{ unreadNotification.length }})</p>
                <button role="button" aria-label="close modal" id="user-notify-button-close"
                        class="bg-white cursor-pointer outline-none p-1 rounded-full">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <div class="overflow-y-scroll scrollbar-none space-y-3 lg:w-96 text-center"
                 style="height: calc(100vh - 150px) !important;">
                <a href="/notification/readAll" v-if='unreadNotification.length != 0'
                   class="leading-3 cursor-pointer underline text-primary">
                    Đánh dấu đã đọc tất cả
                </a>
                <div v-for="unread in unreadNotification">
                    <a v-bind:href="unread.data.data.href" v-on:click="markAsRead(unread)">
                        <div class="bg-white hover:bg-gray-200 flex p-3 rounded-lg border text-left text-black">
                            <div class="relative">
                                <img v-bind:src="unread.data.data.img" class="rounded-full w-11 h-auto">
                                <img v-bind:src="unread.data.data.icon"
                                     class="rounded-full -bottom-1 -right-1 absolute rounded-full shadow-md w-5">
                            </div>
                            <div class="pl-3">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none m-0"
                                   v-html="unread.data.data.text">
                                    {{ unread.data.data.text }}
                                </p>
                                <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500 m-0">
                                    {{ unread.data.data.time | diffForHumans }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="flex items-center justiyf-between" v-if='unreadNotification.length == 0'>
                    <hr class="w-full border-b border-black">
                    <p tabindex="0"
                       class="flex flex-shrink-0 leading-normal px-3 py-16 text-black font-bold">
                        Không có thông báo</p>
                    <hr class="w-full border-b border-black">
                </div>
            </div>
        </div>
    </div>
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
    props: ['unreads', 'userid'],
    data() {
        return {
            unreadNotification: this.unreads
        }
    },
    filters: {
        diffForHumans: (date) => {
            if (!date) {
                return null;
            }

            return dayjs(date).fromNow();
        }
    },

    methods: {
        markAsRead: function (unread) {
            axios.post('/notification/read', {
                id: unread.id
            });
        }
    },

    mounted() {
        Echo.private('App.User.' + this.userid)
            .notification((notification) => {
                let newUnread = {data: {type: notification.type, data: notification.data}};
                this.unreadNotification.unshift(newUnread);

                $('#toast-img').attr("src", newUnread.data.data.img);
                $('.toast-body').html(newUnread.data.data.text);
                $('.toast').removeClass('hidden');
            });
    }
};
</script>
