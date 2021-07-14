<template>

    <!-- Encabezado -->
    <div class="flex justify-center">
        <div class="flex">
            <h1 class="text-gray-900 font-bold md:text-4xl text-xl">Matricula Catastral</h1>
        </div>
    </div> 
    <br>  

    <div class="grid bg-purple-100 rounded-lg shadow-xl absolute inset-x-20 top-50">         

    <div class="grid grid-cols-1 md:grid-cols-5 gap-5 md:gap-5 mt-5 mx-7">        
        <!-- NE eje X -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">NE: X</label>
            <input maxlength="10" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- NE eje Y -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">NE: Y</label>
            <input  maxlength="10" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div> 

        <!-- Codigo Provincia -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cod. Prov.</label>
            <input maxlength="2" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- Codigo Dpto -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cod. Dpto</label>
            <input  maxlength="2" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- Clase Derecho -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clase Derecho</label>
            <input  maxlength="1" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div> 
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-5 md:gap-5 mt-5 mx-7">        
        <!-- NE eje X -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SO: X</label>
            <input  maxlength="10" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- NE eje Y -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SO: Y</label>
            <input  maxlength="10" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div> 

        <!-- Codigo Provincia -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cod. Prov.</label>
            <input maxlength="2" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- Codigo Dpto -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cod. Dpto</label>
            <input maxlength="2" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div>

        <!-- Clase Derecho -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clase Derecho</label>
            <input  maxlength="1" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="..." />
        </div> 
    </div> 
 
    <!-- Botones -->
    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
      <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gray-700 hover:bg-gray-900 hover:shadow-lg">Cancelar</button>
      <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Guardar</button>
    </div>

  </div>
</template>

<script>
export default {
    setup() {
        
    },
}
</script>