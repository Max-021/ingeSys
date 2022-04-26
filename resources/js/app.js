require('./bootstrap');

import router from './routes';
import Vue from 'vue';
import App from './components/App.vue'

window.Vue = require('vue').default;



const app = new Vue({
    el: '#app',
    router,
    render: function(h){return h(App)}
}).$mount('#app');
