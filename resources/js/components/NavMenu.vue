<template>
    <nav>
        <div class="main-title">IngeSystem</div>
        <ul class="menu">
            <li class="menuEl">
                <router-link :to="{name:'PresupuestosAprobados'}">Presupuestos aprobados</router-link>
            </li>
            <li class="menuEl">
                <router-link :to="{name:'PresupuestosEnCurso'}">Presupuestos en curso</router-link>
            </li>
        </ul>
    </nav>
</template>

<style scoped>
nav {
    position: fixed;
    height: 48px;
    width: 100%;
    top: 0;
    z-index: 2;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-content: center;
    background: rgb(168, 168, 168);
}
.main-title {
    color: rgb(4, 4, 58);
    font-size: 200%;
}
.menu {
    align-self: center;
}
.menuEl a {
    text-decoration: none;
    color: black;
    transition: all 0.4s;
    font-size: 140%;
}
.menuEl {
    margin-right: 12px;
    transition: 1s;
    list-style: none;
    display: inline-block;
}
.menuEl a:hover {
    color: rgb(180, 0, 0);
    scale: 1.2;
}
</style>