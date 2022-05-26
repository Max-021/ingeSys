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
                                <b-button variant="secondary" @click="retroceder(datos)">
                                    <b-icon icon="skip-backward"></b-icon>
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
    </div>
</template>

<style>

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
                let datos = await axios.get(this.$api+'presupuestos/2');
                this.infoPresup = datos.data;
                console.log("Info del dato abajo");
                console.log(datos.data);
            } catch (error) {
                console.log(error);
            }

        },
        async retroceder(datos) {
            try {
                //cambiar acá la instancia
                let info = await axios.put(this.$api+`presupuestos/cambiarInstancia/${datos.id}/1`);
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