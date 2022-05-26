<template>
  <div>
      <b-form @submit.prevent="crearPresup()">
          <b-form-group id="input-group-1" label="Fecha" label-for="input-1" >
              <b-form-input id="input-1" type="date" v-model="form.fecha" required></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2" label="Cliente" label-for="input-2" >
              <!-- dropdown clientes -->
              <b-form-select id="input-2" v-model="form.cliente" :options="clientes" required></b-form-select>
          </b-form-group>
          <b-form-group id="input-group-3" label="Unidad" label-for="input-3" >
              <!-- dropdown con unidades -->
              <b-form-select id="input-3"  v-model="form.unidad" :options="unidades" required></b-form-select>
          </b-form-group>
          <b-form-group id="input-group-4" label="Número presupuesto" label-for="input-4" >
              <b-form-input id="input-4" type="text" v-model="form.presupuesto" required></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-5" label="Importe" label-for="input-5" >
              <b-form-input id="input-5" type="text" v-model="form.importe" ></b-form-input>
          </b-form-group>
          <b-button type="submit" variant="primary">Crear</b-button>
      </b-form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            form: {
                fecha: '',
                cliente: null,
                unidad: null,
                presupuesto: 0,
                importe: 0,
            },
            clientes: [],
            unidades: [],
        }
    },
    created: function() {
        this.pedirClientesUnidades();
    },
    methods: {
        async pedirClientesUnidades() {
            try {
                let infoClientes = axios.get(this.$api+'clientes');
                let infoUnidades = axios.get(this.$api+'unidades');
                this.clientes = [...infoClientes.data.nombre];
                this.unidades = [infoUnidades.data.nombre];
                // esto filtra los nombres para que el form.select funcione bien
                this.clientes = this.clientes.map(function(cliente) {
                    return cliente.nombre;
                });
                this.unidades = this.unidades.map(function(unidad) {
                    return unidad.nombre;
                })
                console.log(infoClientes);
                console.log(this.clientes);
                console.log(this.unidades);
                
            } catch (error) {
                console.log(error);
            }
        },
        async crearPresup() {
            try {
                const nuevoPresupuesto = {
                    fecha_creacion: fecha,
                    nombre: cliente,
                    nombre_unidad: unidad,
                    num_presupuesto: presupuesto,
                    instancia: 1,
                    importe: importe
                }
                axios.post(this.$api+'presupuestos', nuevoPresupuesto);
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style>

</style>