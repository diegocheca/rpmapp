<template>
    <app-layout>
        <Mostrar></Mostrar>
        <Mostrar></Mostrar>
        <Mostrar></Mostrar>
        <!--Winzard-->
        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Mostrar></Mostrar>
                </div>
            </div>
        </div> -->
        <!--Datos Personales-->
        <!-- <DatosPersonales></DatosPersonales> -->
        <!--Datos Representante Legal-->
        <!-- <DatosRepresentanteLegal></DatosRepresentanteLegal> -->
        <!--Ubicacion Solicitud de Exploracion-->

        <!-- <UbicacionSolicitudExploracion></UbicacionSolicitudExploracion> -->
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Mostrar from "./componentes/pruebaComp.vue";
import DatosPersonales from "./componentes/DatosPersonales.vue";
import DatosRepresentanteLegal from "./componentes/DatosRepresentanteLegal.vue";
import UbicacionSolicitudExploracion from "./componentes/UbicacionSolicitudExploracion.vue";
export default {
    components: {
        AppLayout,
        Mostrar,
        DatosPersonales,
        DatosRepresentanteLegal,
        UbicacionSolicitudExploracion,
    },
    props: {
        errors: Object,
    },
};
</script>
