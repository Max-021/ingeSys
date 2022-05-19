<template>
    <div>
        <nav-menu></nav-menu>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Fecha de creación</th>
                        <th>Nombre del cliente</th>
                        <th>Nombre de la unidad</th>
                        <th>Número de presupuesto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(datos, index) in infoPresup" :key="index">
                        <td>{{datos.created_at}}</td>
                        <td>{{datos.nombre}}</td>
                        <td>{{datos.nombre_unidad}}</td>
                        <td>{{datos.num_presupuesto}}</td>
                        <td>
                            <div class="actions">
                                <button class="button approve" @click="mandarAParaPresupuestar(datos)">Aprobar</button>
                                <button class="button edit" data-toggle="modal" data-target="#myModal" type="button" @click="trabajoParaEditar = trabajo">Editar</button>
                                <button class="button delete" @click="deleteTrabajo(datos)">Borrar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <b-button v-b-modal.modal-1 class="crear-presup">Crear presupuesto</b-button>

        <b-modal id="modal-1" title="BootstrapVue">
            <p class="my-4">Hello from modal!</p>
        </b-modal>
    </div>
</template>

<style>
.crear-presup {
    position: fixed;
    bottom: 5%;
    right: 5%;
    z-index: 2;
}
    .button {}
    .approve {}
    .edit {}
    .delete {}
</style>

<script>
import NavMenu from './NavMenu.vue';
import {httpClient} from '../httpClient';
export default {
  components: { NavMenu },
    data: function() {
        return {
            infoPresup: [] //Acá deberia ir la info para la tabla con axios o algo parecido
        }
    },
    created: function() {
        this.pedirInfo()
    },
    methods: {
        async pedirInfo() {
            try {
                let datos = await httpClient.get(this.$api+'presupuestos/1');
                this.infoPresup = datos.data;
                console.log("Info del dato abajo");
                console.log(datos);
            } catch (error) {
                console.log(error);
            }

        },
        async mandarAparaPresupuestar(datos) {
            try {
                //cambiar acá la instancia
                let info = await httpClient.put(this.$api+`presupuestos/${datos}`);
                console.log("Datos con cambio de instancia: " + info);
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTrabajo(datos) {
            try {
                let info = await httpClient.delete(this.$api+`presupuestos/${datos}`);
                console.log("Datos borrados:" + info);
            } catch (error) {
                console.log(error);
            }
        }//falta el de editar trabajo
    }
}
</script>