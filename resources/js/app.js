require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

Vue.component('app', require('./vue/app.vue').default);
Vue.component('log-in', require('./vue/components/Auth/LogIn.vue').default);

new Vue({
    el: '#app',
});
