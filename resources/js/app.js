require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

Vue.component('log-in', require('./vue/components/Auth/LogIn.vue').default);
Vue.component('register', require('./vue/components/Auth/Register.vue').default);

new Vue({
    el: '#app',
});
