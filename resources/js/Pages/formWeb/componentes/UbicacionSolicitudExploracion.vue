<template>

    <!-- Encabezado -->
    <div class="flex justify-center">
        <div class="flex">
            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Ubicación de la Solicitud a Explorar</h1>
        </div>
    </div>
    <br>

    <div class="grid bg-purple-100 rounded-lg shadow-xl absolute inset-x-20 top-50 "> 

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"> 

        <!-- Provincia -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Provincia</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Provincia..." />
        </div>

        <!-- Codigo Provincia -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Codigo</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Codigo..." />
        </div>  

        <!-- Departamento -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Departamento..." />
        </div>

        <!-- Codigo Departamento -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Codigo</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-q00 focus:border-transparent" type="text" placeholder="Codigo..." />
        </div>

         <!-- Localidad -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Localidad</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Localidad..." />
        </div>

        <!-- Paraje -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Paraje</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Paraje..." />
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