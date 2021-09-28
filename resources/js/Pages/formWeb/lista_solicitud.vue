<template> 
    <app-layout>
       
        <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">LISTADO DE SOLICITUDES</h1>
      
         <table class="rounded-t-lg mt-5 min-w-full mx-auto bg-gray-800 text-gray-100">
            <thead>
                <tr class="text-left border-b border-gray-300">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Tipo de Solicitud</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Estado Solicitud</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Acciones</th>
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
                            <div class="ml-4" v-for="dato in datos" :key="dato.id">
                                 <div class="text-sm font-medium" v-if="dato.solicitud_id == solicitud.id">{{dato.nom_estado_solicitud}}</div> 
                            </div> 
                            
                        </div>
                    </td> 

                    <td class="flex m-2">

                        <inertia-link 
                                :href="route('productos.edit', solicitud.id)"
                                class="flex-shrink-0 bg-purple-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" type="button">
                                Editar
                        </inertia-link>
                        
                        <inertia-link
                                method="delete"
                                :href="route('productos.destroy', solicitud.id)"
                                class="flex-shrink-0 bg-pink-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-pink-200" type="button">
                                Borrar
                        </inertia-link>
                    </td>
                </tr>   
            </tbody>
        </table> 
   
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Label from '../../Jetstream/Label.vue';
import { string } from '@amcharts/amcharts4/core';
import { boolean } from 'yup/lib/locale';
export default {
    props: {
        solicitudes: Array,
       datos:Array,
    },
    components: {
        AppLayout
        
    },

    
};
</script>

