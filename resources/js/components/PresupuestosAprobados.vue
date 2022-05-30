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
                        <td>{{ datos.created_at }}</td>
                        <td>{{ datos.nombre }}</td>
                        <td>{{ datos.nombre_unidad }}</td>
                        <td>{{ datos.num_presupuesto }}</td>
                        <td>{{ datos.importe }}</td>
                        <td>
                            <div class="actions">
                                <b-button
                                    variant="secondary"
                                    @click="retroceder(datos)"
                                >
                                    <b-icon icon="skip-backward"></b-icon>
                                </b-button>
                                <b-button
                                    v-b-modal.modal-2
                                    variant="warning"
                                    @click="presupuestoAEditar = datos"
                                >
                                    <b-icon icon="pencil"></b-icon>
                                </b-button>
                                <b-button
                                    variant="danger"
                                    @click="deleteTrabajo(datos)"
                                >
                                    <b-icon icon="x-circle"></b-icon>
                                </b-button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <b-modal id="modal-2" title="Presupuestos">
                <edit-presup
                    v-if="modalEditar"
                    :presupuestoAEditar="presupuestoAEditar"
                ></edit-presup>
            </b-modal>
        </div>
    </div>
</template>

<style></style>

<script>
import axios from "axios";
export default {
    data: function () {
        return {
            infoPresup: [],
            presupuestoAEditar: "",
            modalEditar: true,
        };
    },
    created: function () {
        this.pedirInfo();
    },
    methods: {
        async pedirInfo() {
            try {
                let datos = await axios.get(this.$api + "presupuestos/2");
                this.infoPresup = datos.data;
            } catch (error) {
                console.log(error);
            }
        },
        async retroceder(datos) {
            let datosPresup = datos;
            datosPresup.instancia = 1;
            try {
                let info = await axios.put(
                    this.$api + `presupuestos/aprobar`,
                    datosPresup
                );
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTrabajo(datos) {
            try {
                let info = await axios.delete(
                    this.$api + `presupuestos/${datos.id}`
                );
                console.log("Datos borrados:" + info);
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>
