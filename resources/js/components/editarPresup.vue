<template>
    <div>
        <b-form @submit.prevent="crearPresup()">
            <b-form-group id="input-group-1" label="Fecha" label-for="input-1">
                <b-form-input
                    id="input-1"
                    type="date"
                    v-model="presupuestoAEditar.fecha_creacion"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                id="input-group-2"
                label="Cliente"
                label-for="input-2"
            >
                <b-form-input
                    id="input-2"
                    v-model="presupuestoAEditar.nombre"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group id="input-group-3" label="Unidad" label-for="input-3">
                <b-form-input
                    id="input-3"
                    v-model="presupuestoAEditar.nombre_unidad"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                id="input-group-4"
                label="Número presupuesto"
                label-for="input-4"
            >
                <b-form-input
                    id="input-4"
                    type="text"
                    v-model="presupuestoAEditar.num_presupuesto"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                id="input-group-5"
                label="Importe"
                label-for="input-5"
            >
                <b-form-input
                    id="input-5"
                    type="text"
                    v-model="presupuestoAEditar.importe"
                ></b-form-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Crear</b-button>
        </b-form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["presupuestoAEditar"],
    data() {
        return {};
    },
    methods: {
        async guardarCambios() {
            try {
                const nuevoPresupuesto = {
                    fecha_creacion: fecha,
                    nombre: cliente,
                    nombre_unidad: unidad,
                    num_presupuesto: presupuesto,
                    instancia: 1,
                    importe: importe,
                };
                axios.put(this.$api + "presupuestos", nuevoPresupuesto);
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>

<style></style>
