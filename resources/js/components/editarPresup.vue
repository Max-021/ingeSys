<template>
  <div>
      <b-form @submit.prevent="crearPresup()">
          <b-form-group id="input-group-1" label="Fecha" label-for="input-1" >
              <b-form-input id="input-1" type="date" v-model="form.fecha" required></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-2" label="Cliente" label-for="input-2" >
              <!-- dropdown clientes -->
              <b-form-input id="input-2" type="" v-model="form.cliente" required></b-form-input>
          </b-form-group>
          <b-form-group id="input-group-3" label="Unidad" label-for="input-3" >
              <!-- dropdown con unidades -->
              <b-form-input id="input-3" type="" v-model="form.unidad" required></b-form-input>
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
                cliente: '',
                unidad: '',
                presupuesto: 0,
                importe: 0,
            },
            clientes: [],
            unidades: [],
        }
    },
    created: async function() {
        try {
            let infoClientes = axios.get(this.$api+'clientes');
            let infoUnidades = axios.get(this.$api+'unidades');
            this.clientes = infoClientes.data;
            this.unidades = infoUnidades.data;
            console.log(clientes);
            console.log(unidades);
            
        } catch (error) {
            
        }
    },
    methods: {
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