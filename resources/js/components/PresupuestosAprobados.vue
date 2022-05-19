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
                                <button class="button approve" @click="archivar(datos)">Aprobar</button>
                                <button class="button edit" data-toggle="modal" data-target="#myModal" type="button" @click="trabajoParaEditar = trabajo">Editar</button>
                                <button class="button delete" @click="deleteTrabajo(datos)">Borrar</button>
                                <button class="button change" @click="cambiarInstancia(datos)">Retroceder</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style>
    .content {
        margin-top: 48px;
        width: 100%;
    }

</style>

<script>

export default {
    data: function() {
        return {
            infoPresup: [] //Acá deberia ir la info para la tabla con axios o algo parecido

        }
    },
    methods: {
        async pedirInfo() {
            try {
                let datos = await httpClient.get(this.$api+'presupuestos/2');
                this.infoPresup = datos.data;
            } catch (error) {
                console.log(error);
            }

        },
        async archivar(datos) {
            try {
                //cambiar acá la instancia a  un 3 ficticio para que queden "archivados"
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
        },
        async cambiarInstancia(datos) {
            try {
                //acá retroceder una instancia en el objeto
                let info = await httpClient.put(this.$api+`presupuestos/${datos}`);
                console.log("Datos con cambio de instancia: " + info);
            } catch (error) {
                console.log(error);
            }
        }//falta el de editar trabajo
    }
}
</script>