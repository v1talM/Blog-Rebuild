
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('js/jquery.easing.1.3.js');
require('js/jquery.waypoints.min.js');
require('js/jquery.stellar.min.js');
require('js/main.js');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('blog-aside', require('./components/Aside.vue'));
Vue.component('blog-main', require('./components/Main.vue'));
Vue.component('blog-main-footer', require('./components/Main-footer.vue'));
Vue.component('blog-goto-top', require('./components/Go-top.vue'));
const app = new Vue({
    el: '#page'
});
