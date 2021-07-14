<style>
.categoriesDiv {width:100%;}
</style>
<template>

    <form >    
        <div class="grid bg-purple-100 rounded-lg shadow-xl absolute inset-x-20 top-50">           
         
            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-900 font-serif md:text-4xl text-xl">Solicitud de Permiso de Exploración</h1>
                </div>
            </div>
            <br>
            
            <div class="text-gray-900 font-serif md:text-2xl text-xl">
                <h3>Informe de Escribania de Minas</h3>
            </div>  
            <br>          

            <!-- Nota -->
            <div class="text-gray-900 font-serif" style="width:90%"> 
            Presentada, por triplicado, en mi oficina, el día ____ de ____________ de 20___, siendo
            las ____horas y ____ minutos y registrada en el Libro de ingresos de solicitudes bajo el 
            Numero Secuencial________________Acompaña / No Acompaña el programa minimo de trabajos e inversiones a realizar.
            Acompaña / No Acompaña constancia de pago de $____________en concepto de tasa de solicitud de 
            exploración y $____________ en concepto de canon. Pase al Registro Catastral para completar el informe elevese a 
            resolucion de Autoridad Minera.                
            </div>
            <br>
            
            <!-- Firma Escribano -->
            <div class="text-right">
            _________________________
            <br>
            Firma del Escribano en Mina 
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class="bg-red-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-red-600 transition duration-200 each-in-out">Descargar Solicitud</button>
                <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Subir Solicitud</button>
            </div>           
        </div>
    </form> 
    
</template>

<script>
import Form from '../../Form.vue'
export default {
  components: { Form },
    setup() {
        
    },
}
</script>

