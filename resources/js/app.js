/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('video-comments', require('./components/youtubes/VideoComment.vue').default);
// Vue.component('comments-form', require('./components/comments/CommentForm.vue').default);
// Vue.component('like', require('./components/comments/Like.vue').default);
// Vue.component('unlike', require('./components/comments/UnLike.vue').default);
// Vue.component('edit-comment', require('./components/comments/EditCommentForm.vue').default);
// Vue.component('reply-comment', require('./components/comments/ReplyForm.vue').default);
Vue.component('notification', require('./components/notifications/Notification.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
