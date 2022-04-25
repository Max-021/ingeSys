import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//importar los .vue


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            name: '',
            component,
        }
    ]
})