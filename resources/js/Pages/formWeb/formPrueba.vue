<template>
    <app-layout>      
       
        <div >
            <UbicacionSolicitudExploracion></UbicacionSolicitudExploracion> 
        </div> 

        <!--Matricula Catastral-->
        <div >
            <MatriculaCatastral></MatriculaCatastral> 
        </div> 

         <!--Cordenadas GaussKruger-->
        <div >
            <CordenadasGaussKruger></CordenadasGaussKruger> 
        </div> 

        <!--Categoria Mineral-->
        <div >
            <CategoriaMineral></CategoriaMineral> 
        </div>    

        <!--Datos Propietario-->
        <div >
            <DatosPropietario></DatosPropietario> 
        </div> 

        <!--Cantidad de Permisos-->
        <div >
            <CantidadPermisos></CantidadPermisos> 
        </div>  

        <!--Declaracion Jurada-->
        <div >
            <DeclaracionJurada></DeclaracionJurada> 
        </div> 

        <!--Informe Registro Catastral-->
        <div >
            <InformeRegistroCatastral></InformeRegistroCatastral> 
        </div>       
    
       </app-layout>

    

        <!-- <UbicacionSolicitudExploracion></UbicacionSolicitudExploracion> -->
    
</template>

<script>
import Mostrar from "./componentes/wizard.vue";  
// import DatosPersonales from "./componentes/DatosPersonales.vue";
// import DatosRepresentanteLegal from "./componentes/DatosRepresentanteLegal.vue";
// import UbicacionSolicitudExploracion from "./componentes/UbicacionSolicitudExploracion.vue";
// import MatriculaCatastral from "./componentes/MatriculaCatastral.vue";
// import CordenadasGaussKruger from "./componentes/CordenadasGaussKruger.vue";
// import  CategoriaMineral from "./componentes/CategoriaMineral.vue";
// import  DatosPropietario from "./componentes/DatosPropietario.vue";
// import  CantidadPermisos from "./componentes/CantidadPermisos.vue";
// import  DeclaracionJurada from "./componentes/DeclaracionJurada.vue";
   import  InformeRegistroCatastral from "./componentes/InformeRegistroCatastral.vue";   
export default {
    components: {
        AppLayout,
        Mostrar,
        // DatosPersonales,
        // DatosRepresentanteLegal,
        // UbicacionSolicitudExploracion,
        // MatriculaCatastral,      
        // CordenadasGaussKruger,
        // CategoriaMineral,
        // DatosPropietario,
        //CantidadPermisos,
        //DeclaracionJurada,
        InformeRegistroCatastral,
    },
    props: {
        errors: Object,
    },
};
</script>
