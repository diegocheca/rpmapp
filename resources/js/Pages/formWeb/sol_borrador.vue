<template> 
    <app-layout>
       
        <h1 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gradient-to-l from-indigo-500 to-indigo-800 ">SOLICITUD EN BORRADOR</h1>
      
        
       
   
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutFormWeb";
import Label from "../../Jetstream/Label.vue";
export default {
  props: {
    solicitudes: Array,
  },
  components: {
    AppLayout,
    //Label,
  },
   
};
</script>