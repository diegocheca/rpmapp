<template>
    <app-layout>
        <template #header>           
        </template>
       
            
        <main class="grid place-items-center min-h-screen bg-gradient-to-t from-blue-200 to-indigo-900 p-5">
        <div>
          <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-gray-200 mb-5 text-center">Bienvenido</h1>
          <section class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- CARD 1 -->
            <div class="bg-gray-900 shadow-lg rounded p-3 ">
              <div class="group relative">
                <img class="w-full md:w-72 block rounded" src="https://upload.wikimedia.org/wikipedia/en/f/f1/Tycho_-_Epoch.jpg" alt="" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                   <inertia-link :href="route('solicitudes.create')" type="button" class="text-white text-lg" name="exploracion">Solicitud Exploración</inertia-link> 
                </div>
              </div>           
            </div>
            <!-- END OF CARD 1 -->

            <!-- CARD 2 -->
            <div class="bg-gray-900 shadow-lg rounded p-3">
              <div class="group relative">
                <img class="w-full md:w-72 block rounded" src="https://upload.wikimedia.org/wikipedia/en/c/ca/Tycho_-_Awake.png" alt="" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                <inertia-link :href="route('descubrimiento')" type="button" class="text-white text-lg">Solicitud Descubriminto</inertia-link>
                </div>
              </div>        
            </div> 
            <!-- END OF CARD 2 -->

            
          </section>
        </div>
        </main>
   </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Label from '../../Jetstream/Label.vue';
export default {
    props: {
        solicitudes: Array,
    },
    components: {
        AppLayout
        //Label,
    },
};
</script>
