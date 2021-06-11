<template>
    <div class="flex">
        <div class="w-full md:w-1/2 px-3">
            <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="inscripciondgr"
                >Inscripcion DGR:</label
            >
            <input
                id="inscripciondgr"
                name="inscripciondgr"
                v-model="inscripciondgr"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            />
            <p  v-show="inscripciondgr_valido"  class="text-red-500 text-xs italic">Please fill out this field.</p>
            <div class="flex">
                <div class="w-full md:w-1/3 px-3">
                    <span class="text-gray-700">Correcto?</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="true" v-on:change="calculo_de_porcentajes(6, true)">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="false" v-on:change="calculo_de_porcentajes(6, false)">
                            <span class="ml-2">No</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="nada" v-on:change="calculo_de_porcentajes(6, 'nada')">
                            <span class="ml-2">Sin evaluar</span>
                        </label>
                    </div>
                </div>
                <div v-show="!inscripciondgr_correcto" class="w-full md:w-2/3 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="obs_inscripciondgr"
                        >Observación:</label
                    >
                    <textarea
                        id="obs_inscripciondgr"
                        name="obs_inscripciondgr"
                        v-model="obs_inscripciondgr"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </textarea>
                    <p v-show="obs_inscripciondgr_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
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
        'inscripciondgr', 
        'inscripciondgr_valido', 
        'inscripciondgr_correcto', 
        'obs_inscripciondgr', 
        'obs_inscripciondgr_valido',
        'evaluacion',
    ],
  data() {
    return {
      saludos: 'Saludame qweqweqwe'
    };
  },
  
};
</script>
