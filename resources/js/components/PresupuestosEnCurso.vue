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
                        <td>{{datos.fechaCreacion}}</td>
                        <td>{{datos.nomClient}}</td>
                        <td>{{datos.nomUnit}}</td>
                        <td>{{datos.numPresup}}</td>
                        <td>
                            <div class="actions">
                                <button class="button-green button-check" @click="mandarAParaPresupuestar(trabajo)"></button>
                                <button class="button-blue button-edit" data-toggle="modal" data-target="#myModal" type="button" @click="trabajoParaEditar = trabajo"></button>
                                <button class="button-red button-delete" @click="deleteTrabajo(trabajo)"></button>
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
export default {
    data: function() {
        return {
            infoPresup: [] //Acá deberia ir la info para la tabla con axios o algo parecido
        }
    },
    methods: {
        mandarAparaPresupuestar(trabajo) {
            //cargar en la api con laravel los datos
        },
        deleteTrabajo(trabajo) {

        }//falta el de editar trabajo
    }
}
</script>