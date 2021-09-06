require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

Vue.component('log-in', require('./vue/components/Auth/LogIn.vue').default);
Vue.component('register', require('./vue/components/Auth/Register.vue').default);
Vue.component('questionnaire', require('./vue/components/Questionnaire.vue').default);
Vue.component('results-index', require('./vue/components/ResultsIndex.vue').default);

new Vue({
    el: '#app',
});
