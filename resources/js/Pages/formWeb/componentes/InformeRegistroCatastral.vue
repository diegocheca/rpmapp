<style>
.categoriesDiv {width:100%;}
</style>
<template>

    <form >    
        <div class="grid bg-purple-100 rounded-lg shadow-xl absolute inset-x-20 top-50">           
         
            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-900 font-serif md:text-4xl text-xl">Informe del Registro Catastral</h1>
                </div>
            </div>
            <br>           
                    

            <!-- Nota -->
            <div class="text-gray-900 font-serif justify-center" style="width:90%"> 
            La presente solicitud de exploración, presentada por ________________________________________ha sido 
            registrada bajo la Matricula Catastral N.E. X:________________________ Y:____________________
            y S.O. X:__________________________ Y:________________________________¿Existe superposición con otros
            pedimentos mineros o lugares prohibidos a los trabajos mineros?
            SI:__________ NO:__________
            Especificar:___________________________________________________________________________________________ 
            _______________________________________________________________________________________________________ 
            _______________________________________________________________________________________________________ 
            _______________________________________________________________________________________________________
            _______________________________________________________________________________________________________
            _______________________________________________________________________________________________________

            Superficie libre disponible: __________________ hectarias
            Se ha emitido plano catastral del área, en tres ejemplares.
            Elevese a Resolución de la Autoridad Minera.
            </div>
            <br>
            <div class="text-lefht">
            Fecha:
            </div>
            
            
            <!-- Firma Escribano -->
            <div class="text-right">
            _________________________
            <br>
            Firma Autoridad Catastro 
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class="bg-red-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-red-600 transition duration-200 each-in-out">Descargar Informe</button>
                <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Subir Informe</button>
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

