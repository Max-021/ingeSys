import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//importar los .vue


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/presupuestosAprobados',
            name: 'PresupuestosAprobados',
            component,
        },
        {
            path: '/presupuestosEnCuros',
            name: 'PresupuestosEnCurso',
            component,
        },
    ]
});

export default router