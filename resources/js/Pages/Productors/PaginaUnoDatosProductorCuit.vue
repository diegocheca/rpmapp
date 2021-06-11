<template>
    <div class="w-full md:w-1/2 px-3">
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="email"
            >Cuit:</label
        >
        <input
            id="cuit"
            name="cuit"
            v-model="cuit"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        />
        <p v-show="cuit_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="cuit_correcto" value="true" v-on:change="cuit_correcto =  true">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="cuit_correcto" value="false" v-on:change="cuit_correcto = false">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_cuit_correcto" v-model="cuit_correcto" value="nada" v-on:change="cuit_correcto = 'nada'">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!cuit_correcto" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_email"
                    >Observación:</label
                >
                <textarea
                    id="obs_cuit"
                    name="obs_cuit"
                    v-model="obs_cuit"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </textarea>
                <p v-show="!obs_cuit_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'cuit', 
        'cuit_valido', 
        'cuit_correcto', 
        'obs_cuit', 
        'obs_cuit_valido',
        'evaluacion',
    ],
  data() {
    return {
      saludos: 'Saludame qweqweqwe'
    };
  },
  
};
</script>
