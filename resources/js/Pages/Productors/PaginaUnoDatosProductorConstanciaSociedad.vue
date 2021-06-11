<template>
    <div class="flex">
        <div class="w-full md:w-1/2 px-3">
            <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="constaciasociedad"
                >Constancia de Sociedad:</label
            >
            <input
                id="constaciasociedad"
                name="constaciasociedad"
                v-model="constaciasociedad"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            />
            <p  v-show="constaciasociedad_valido"  class="text-red-500 text-xs italic">Please fill out this field.</p>
            <div class="flex">
                <div class="w-full md:w-1/3 px-3">
                    <span class="text-gray-700">Correcto?</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="constaciasociedad_correcto" value="true" v-on:change="calculo_de_porcentajes(6, true)">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="constaciasociedad_correcto" value="false" v-on:change="calculo_de_porcentajes(6, false)">
                            <span class="ml-2">No</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="constaciasociedad_correcto" value="nada" v-on:change="calculo_de_porcentajes(6, 'nada')">
                            <span class="ml-2">Sin evaluar</span>
                        </label>
                    </div>
                </div>
                <div v-show="!constaciasociedad_correcto" class="w-full md:w-2/3 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="obs_constaciasociedad"
                        >Observación:</label
                    >
                    <textarea
                        id="obs_constaciasociedad"
                        name="obs_constaciasociedad"
                        v-model="obs_constaciasociedad"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </textarea>
                    <p v-show="obs_constaciasociedad_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
                </div>
            </div>
        </div>
            <div class="w-full md:w-1/2 px-3">
                <object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
                <p>It appears you don't have a PDF plugin for this browser.
                    No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
                download the PDF file.</a></p>  
            </object>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'constaciasociedad', 
        'constaciasociedad_valido', 
        'constaciasociedad_correcto', 
        'obs_constaciasociedad', 
        'obs_constaciasociedad_valido',
        'evaluacion',
    ],
  data() {
    return {
      saludos: 'Saludame qweqweqwe'
    };
  },
  
};
</script>
