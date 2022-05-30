<template>
    <div>
        <b-form @submit.prevent="crearPresup()">
            <b-form-group id="input-group-1" label="Fecha" label-for="input-1">
                <b-form-input
                    id="input-1"
                    type="date"
                    v-model="form.fecha"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                id="input-group-2"
                label="Cliente"
                label-for="input-2"
            >
                <!-- dropdown clientes -->
                <b-form-select
                    id="input-2"
                    v-model="form.cliente"
                    :options="clientes"
                    required
                ></b-form-select>
            </b-form-group>
            <b-form-group id="input-group-3" label="Unidad" label-for="input-3">
                <!-- dropdown con unidades -->
                <b-form-select
                    id="input-3"
                    v-model="form.unidad"
                    :options="unidades"
                    required
                ></b-form-select>
            </b-form-group>
            <b-form-group
                id="input-group-4"
                label="Número presupuesto"
                label-for="input-4"
            >
                <b-form-input
                    id="input-4"
                    type="text"
                    v-model="form.presupuesto"
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
                    v-model="form.importe"
                ></b-form-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Crear</b-button>
        </b-form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            form: {
                fecha: "",
                cliente: null,
                unidad: null,
                presupuesto: 0,
                importe: 0,
            },
            clientes: [],
            unidades: [],
        };
    },
    created: function () {
        this.pedirClientesUnidades();
    },
    methods: {
        async pedirClientesUnidades() {
            try {
                await axios
                    .get(this.$api + "clientes")
                    .then((response) => (this.clientes = response.data));
                await axios
                    .get(this.$api + "unidades")
                    .then((response) => (this.unidades = response.data));
                this.clientes = this.clientes.map((cliente) => cliente.nombre);
                this.unidades = this.unidades.map((unidad) => unidad.nombre);
            } catch (error) {
                console.log(error);
            }
        },
        async crearPresup() {
            try {
                const nuevoPresupuesto = {
                    fecha_creacion: this.form.fecha,
                    nombre: this.form.cliente,
                    nombre_unidad: this.form.unidad,
                    num_presupuesto: this.form.presupuesto,
                    instancia: 1,
                    importe: this.form.importe,
                };
                axios.post(this.$api + "presupuestos", nuevoPresupuesto);
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>

<style></style>
