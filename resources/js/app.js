require('./bootstrap');

import router from './routes';
import Vue from 'vue';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';
import App from './components/App.vue'

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.prototype.$api = '/api/';

window.Vue = require('vue').default;

import navMenu from './components/NavMenu.vue';
import nuevoPresup from './components/nuevoPresup.vue';

Vue.component('nav-menu', navMenu);
Vue.component('nuevo-presup', nuevoPresup);

const app = new Vue({
    el: '#app',
    components: {App},
    router,
    render: function(h){return h(App)}
}).$mount('#app');
