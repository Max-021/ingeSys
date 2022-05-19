require('./bootstrap');

import router from './routes';
import Vue from 'vue';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';
import App from './components/App.vue'

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

window.Vue = require('vue').default;

import navMenu from './components/NavMenu.vue';

Vue.component('nav-menu', navMenu);

const app = new Vue({
    el: '#app',
    router,
    render: function(h){return h(App)}
}).$mount('#app');
