<template>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="razon_social"
          >Razon Social:</label
      >
      <input
          id="razon_social"
          name="razon_social"
          v-model="razon_social"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
      />
      <p v-show="razon_social_valido" class="text-green-500 text-xs italic">Por Favor, complete este campo.</p>
      <div class="flex" v-if="evaluacion">
          <div class="w-full md:w-1/3 px-3">
              <span class="text-gray-700">Es correcto?</span>
              <div class="mt-2">
                  <label class="inline-flex items-center">
                      <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="true" v-on:change="calculo_de_porcentajes(1, true)">
                      <span class="ml-2">Si</span>
                  </label>
                  <label class="inline-flex items-center ml-6">
                      <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="false" v-on:change="calculo_de_porcentajes(1, false)">
                      <span class="ml-2">No</span>
                  </label>
                  <label class="inline-flex items-center ml-6">
                      <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="nada" v-on:change="calculo_de_porcentajes(1, 'nada')">
                      <span class="ml-2">Sin evaluar</span>
                  </label>
              </div>
          </div>
          <div v-show="razon_social_correcto" class="w-full md:w-2/3 px-3">
              <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="obs_razon_social"
                  >Observación:</label
              >
              <textarea
                  id="obs_razon_social"
                  name="obs_razon_social"
                  v-model="obs_razon_social"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
              </textarea>
              <p class="text-green-500 text-xs italic" v-show="obs_razon_social_valido">Please fill out this field.</p>
          </div>
      </div>
    </div>
</template>

<script>
export default {
    props: [
				'razon_social', 
				'razon_social_valido', 
				'razon_social_correcto', 
				'obs_razon_social', 
				'obs_razon_social_valido',
        'evaluacion',
				],
  data() {
    return {
      saludos: 'Saludame qweqweqwe'
    };
  },
  
};
</script>