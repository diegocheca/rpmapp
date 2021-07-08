<template>

    <!-- Encabezado -->
    <div class="flex justify-center">
        <div class="flex">
            <h1 class="text-gray-900 font-bold md:text-4xl text-xl">Categoria Mineral</h1>
        </div>
    </div> 
    <br>  
    <div class="grid bg-purple-100 rounded-lg shadow-xl absolute inset-x-20 top-50">         

    <div class="grid grid-cols-2 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        
        <!-- Primera -->
        <div class="grid grid-cols-1">
            <div class="mt-2">
                <span class="ml-2">1° Categoria</span>                
                <input type="radio" class="form-radio" name="accountType"> 
            </div> 

            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent ">
                    <option>...</option>
                    <option>Oro</option>
                    <option>Plata</option>                
            </select> 
        </div>

        <!-- Segunda -->
        <div class="grid grid-cols-1">
            <div class="mt-2">
                <span class="ml-2">2° Categoria</span>                
                <input type="radio" class="form-radio" name="accountType" value="personal">                
            </div> 

            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option>..</option>
                    <option>...</option>                
            </select>                        
        </div>

        <!-- Estado Terreno -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado Terreno</label>
            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <option>...</option>
                <option>Cultivado</option>
                <option>Sitio Publico</option>
                <option>Cercado</option>
                <option>Sitio Historico</option>
                <option>Edificado</option>
                <option>Sitio Religioso</option>
                <option>Erial</option>
                <option>Reserva Natural</option>
            </select>        
        </div>

        <!-- Otros -->
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Otros</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Otros..." />
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

