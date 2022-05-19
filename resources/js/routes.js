import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//importar los .vue
import PresupuestosEnCurso from './components/PresupuestosEnCurso.vue';
import PresupuestosAprobados from './components/PresupuestosAprobados.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/presupuestosAprobados',
            name: 'PresupuestosAprobados',
            component: PresupuestosAprobados,
        },
        {
            path: '/presupuestosEnCurso',
            name: 'PresupuestosEnCurso',
            component: PresupuestosEnCurso,
        },
    ]
});

export default router;