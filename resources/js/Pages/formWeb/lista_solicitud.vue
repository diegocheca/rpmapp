<template> 
    <app-layout>
       
        <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">LISTADO DE SOLICITUDES</h1>
      
        
         <table class="rounded-t-lg mt-5 w-48 mx-auto bg-gray-800 text-gray-100">
             
            <thead>
                <tr class="text-left border-b border-gray-300">
                    <th scope="col" class="px-11 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-12 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Tipo de Solicitud</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Estado Solicitud</th>
                    <th scope="col" class="px-1 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-gray-700 border-b border-gray-600 text-gray-200">
                <tr v-for="solicitud in solicitudes" :key="solicitud.id">

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium">{{ solicitud.id }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium">{{ solicitud.tipo_solicitud }}</div>
                            </div>
                        </div>
                    </td>                     
                    
                                            
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-7">
                                 <div class="text-sm font-medium" >{{solicitud.estado}}</div> 
                            </div> 
                            
                        </div>
                    </td> 

                    
                    <td class="py-4 whitespace-nowrap flex items-right" >  

                        <inertia-link v-if="solicitud.estado != 'Enviada' && solicitud.estado != 'Aprobada' && solicitud.estado != 'Rechazada'"
                                :href="route('formweb.editar', solicitud.id)"                               
                                 type="button" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                        </inertia-link>  

                        <inertia-link v-if="solicitud.estado != 'Borrador' && solicitud.estado != 'Aprobada' && solicitud.estado != 'Rechazada'" 
                                :href="route('formweb.editar', solicitud.id)"  
                                type="button" > 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg> 
                        </inertia-link>
                    </td>
                </tr>   
            </tbody>
        </table> 
   
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutFormWeb";
import Label from "../../Jetstream/Label.vue";
import Button from '../../Jetstream/Button.vue';
export default {
  props: {
    solicitudes: Array,
  },
  components: {
    AppLayout  
    
  },
  
// computed:{

//     btnGuardarIsDisabled(){
//                 let isDisabled = true;
//                 if (
//                     this.propuesta.titulo != null &&
//                     this.propuesta.descripcion != null
//                 ) {
//                     isDisabled = false;
//                 }
//                 else{
//                     isDisabled = true;
//                 }

//                 return isDisabled;
//             }
// }
 
   
};
</script>