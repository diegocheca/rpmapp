<template>
    <form @submit.prevent="submit" >
        <div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            </div>

            <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{title}}</h1>
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Id mina</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="Id mina" 
                v-model="form.id_mina"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">id_productor</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="id_productor"
                v-model="form.id_productor"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">id_destino</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="id_destino" 
                v-model="form.id_destino"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">id_dia</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="id_dia"
                v-model="form.id_dia"
                />
            </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">id_personal</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="id_personal" 
                v-model="form.id_personal"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">mercado_provincia</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="mercado_provincia"
                v-model="form.mercado_provincia"
                />
            </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">mercado_provincias</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="mercado_provincias" 
                v-model="form.mercado_provincias"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">mercado_exportacion</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="mercado_exportacion"
                v-model="form.mercado_exportacion"
                />
            </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">num_expediente_SIGETRAMI</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="num_expediente_SIGETRAMI" 
                v-model="form.num_expediente_SIGETRAMI"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">constancia_otros</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="constancia_otros"
                v-model="form.constancia_otros"
                />
            </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">resol_concecion_minera</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="resol_concecion_minera" 
                v-model="form.resol_concecion_minera"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">fecha_preinscripcion</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="fecha_preinscripcion"
                v-model="form.fecha_preinscripcion"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">fecha_renovacion</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="fecha_renovacion" 
                v-model="form.fecha_renovacion"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">primera_inscripcion</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="primera_inscripcion"
                v-model="form.primera_inscripcion"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">caracter</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="caracter" 
                v-model="form.caracter"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">constancia_posecion</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="constancia_posecion"
                v-model="form.constancia_posecion"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">id_producido</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="id_producido" 
                v-model="form.id_producido"
                />
            </div>
            
            </div>



            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selection</label>
            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Another Input</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Another Input" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                        <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p>
                        </div>
                    <input type='file' class="hidden" />
                    </label>
                </div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <a :href="route('productores_minas.index')"> 
                <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                Cancel
                </button>
            </a>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Agregar</button>
            </div>

        </div>
        </div>
    
    </form>
</template>

<script>
    export default {
    components: {
    },
    props: {
        errors: Object,
        productor_mina: Object,
        title: String
    },
    data() {
        return {
        form: {
            id_mina: null,
            id_productor: null,
            id_destino: null,
            id_dia: null,
            id_personal: null,
            mercado_provincia: null,
            mercado_provincias: null,
            mercado_exportacion: null,
            num_expediente_SIGETRAMI: null,
            constancia_otros: null,
            resol_concecion_minera: null,
            fecha_preinscripcion: null,
            fecha_renovacion: null,
            primera_inscripcion: null,
            caracter: null,
            constancia_posecion: null,
            id_producido: null,
        },
        };
    },
    methods: {
        submit() {
        this.$inertia.post(route('productores_minas.store'), this.form);
        },
    },
    };
</script>