<template>
    <div>
        <nav-menu></nav-menu>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha de creación</th>
                        <th>Nombre del cliente</th>
                        <th>Nombre de la unidad</th>
                        <th>Número de presupuesto</th>
                        <th>Importe</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(datos, index) in infoPresup" :key="index">
                        <td>{{datos.created_at}}</td>
                        <td>{{datos.nombre}}</td>
                        <td>{{datos.nombre_unidad}}</td>
                        <td>{{datos.num_presupuesto}}</td>
                        <td>{{datos.importe}}</td>
                        <td>
                            <div class="actions">
                                <b-button variant="success" @click="aprobar(datos)">
                                    <b-icon icon="check-square"></b-icon>
                                </b-button>
                                <b-button variant="warning" @click="toggleModalEditar(); presupuestoAEditar=datos">
                                    <b-icon icon="pencil"></b-icon>
                                </b-button>
                                <b-button variant="danger" @click="deleteTrabajo(datos)">
                                    <b-icon icon="x-circle"></b-icon>
                                </b-button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- aca copiar v-b-modal.modal-1 y pegarlo en el boton de editar para ver si activar el modal con el formulario de edicion -->
        <b-button v-b-modal.modal-1 class="crear-presup" @click="toggleModalCrear()">Crear presupuesto</b-button>

        <b-modal id="modal-1" title="Presupuestos">
            <nuevo-presup v-if="modalCrear"></nuevo-presup>
            <edit-presup v-if="modalEditar" :paraEditar="presupuestoAEditar"></edit-presup>
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
.content {
    margin-top: 48px;
}
</style>

<script>
import axios from 'axios';
export default {
    data: function() {
        return {
            infoPresup: [], //Acá deberia ir la info para la tabla con axios o algo parecido
            modalCrear: false,
            modalEditar: false,
            presupuestoAEditar: ''
        }
    },
    created: function() {
        this.pedirInfo()
    },
    methods: {
        toggleModalCrear() {
            this.modalCrear = true;
            this.modalEditar = false;
        },
        toggleModalEditar() {
            this.modalCrear = false;
            this.modalEditar = true;
        },
        async pedirInfo() {
            try {
                let datos = await axios.get(this.$api+'presupuestos/1');
                this.infoPresup = datos.data;
                console.log("Info del dato abajo");
                console.log(datos.data);
            } catch (error) {
                console.log(error);
            }

        },
        async aprobar(datos) {
            try {
                //cambiar acá la instanciacambiarInstancia
                let info = await axios.put(this.$api+`presupuestos/cambiarInstancia/${datos.id}/2`);
                console.log("Datos con cambio de instancia: " + info);
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTrabajo(datos) {
            try {
                let info = await axios.delete(this.$api+`presupuestos/${datos.id}`);
                console.log("Datos borrados:" + info);
            } catch (error) {
                console.log(error);
            }
        }//falta el de editar trabajo
    }
}
</script>