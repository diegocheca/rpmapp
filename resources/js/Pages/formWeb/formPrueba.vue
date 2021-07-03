<template>
    <app-layout>
        <!--Winzard-->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Mostrar></Mostrar>
                </div>                                   
            </div>                   
        </div> 

        <!--Datos Personales-->
        <div >
            <DatosPersonales></DatosPersonales> 
        </div> 

        <!--Datos Representante Legal-->
        <div >
            <DatosRepresentanteLegal></DatosRepresentanteLegal> 
        </div>

        <!--Ubicacion Solicitud de Exploracion-->
        <div >
            <UbicacionSolicitudExploracion></UbicacionSolicitudExploracion> 
        </div>           
    </app-layout>
    

    

</template>
<script>
import Mostrar from "./componentes/wizard.vue";  
import DatosPersonales from "../MisComponentes/DatosPersonales.vue";
// import DatosRepresentanteLegal from "../MisComponentes/DatosRepresentanteLegal.vue";
//import UbicacionSolicitudExploracion from "../MisComponentes/UbicacionSolicitudExploracion.vue";
export default {
    components: {
        Mostrar,
        DatosPersonales,
      //  DatosRepresentanteLegal,
   // UbicacionSolicitudExploracion
    },
    props: {
        errors: Object,
    },
};
</script>
