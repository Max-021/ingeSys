<template>
  <form method="POST" @submit="crearPresupuesto">
    <div class="modal-title">
      <h2>Nuevo Presupuesto</h2>
    </div>    
    <div class="modal-body">
      <div class="form-data-container">
        <label for="fecha-creacion">Fecha</label>
        <input type="date" name="fecha-creacion" id="fecha-creacion">
      </div>
      <div class="form-data-container">
        <label for="cliente">Cliente</label>
        <!-- falta agregar un dropdown donde iterar la db de clientes -->
        <input type="text" name="cliente" id="cliente">
      </div>
      <div class="form-data-container">
        <label for="unidad">Unidad</label>
        <!-- falta agregar un dropdown donde iterar la db de unidad -->
        <input type="text" name="unidad" id="unidad">
      </div>
      <div class="form-data-container">
        <label for="num-presup">Número presupuesto</label>
        <input type="number" name="num-presup" id="num-presup">
        <!-- agregar condicion minimo 6 numeros y maximo 8 -->
      </div>
    </div>
  </form>
</template>

<script>
export default {

}
</script>

<style>
.form {
  width: 60%;
  height: 60%;
  z-index: 5;
  background: grey;
  display: flex;
  flex-direction: column;
}
.modal-title {
  width: 100%;
  height: 25%;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}
.h2 {
  font-size: 150%;
}
.modal-body {
  width: 100%;
  height: 75%;
  display: flex;
  flex-direction: row;

}
.form-data-container {
  width: 50%;
  height: 50%;
  display: flex;
  flex-direction: column;
}
</style>