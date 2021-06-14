<template>
    <div class="flex">
        <div class="w-full md:w-1/2 px-3">
            <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="inscripciondgr"
                >Inscripcion DGR:</label
            >
            <div class="flex"  v-if="evaluacion">
                <div class="w-full md:w-1/3 px-3">
                    <span class="text-gray-700">Correcto?</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="true" v-on:change="actaulizar_variable_inscripciondgr(true)">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="false" v-on:change="actaulizar_variable_inscripciondgr(false)">
                            <span class="ml-2">No</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="inscripciondgr_correcto" value="nada"  v-on:change="actaulizar_variable_inscripciondgr('nada')">
                            <span class="ml-2">Sin evaluar</span>
                        </label>
                    </div>
                </div>
                <div v-show="!inscripciondgr_correcto_local" class="w-full md:w-2/3 px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="obs_inscripciondgr"
                        >Observación:</label
                    >
                    <textarea
                        id="obs_inscripciondgr"
                        name="obs_inscripciondgr"
                        v-model="obs_inscripciondgr"
                        v-bind:class=clase_text_area_inscripciondgr
                        @input="actaulizar_contenido_text_area_inscripciondgr($event.target.value)" 
                        >
                    </textarea>
                    <p  v-bind:class=clase_cartel_nota_evaluacion_inscripciondgr_text_area>{{cartel_nota_evaluacion_inscripciondgr_text_area}}</p>
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
        inscripciondgr_correcto_local: this.$props.tiposociedad_correcto,
        tiposociedad_valido_local:this.$props.tiposociedad_valido,
        clase_text_area_inscripciondgr: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_evaluacion_inscripciondgr_text_area: 'text-green-500 text-xs italic',
        cartel_nota_evaluacion_inscripciondgr_text_area: 'Observacion Correcta',
    };
  },
  methods:{
    actaulizar_variable_inscripciondgr(valor) {
        this.inscripciondgr_correcto_local = valor;
        console.log(this.inscripciondgr_correcto_local);
        this.$emit('changeinscripciondgrcorrecto',this.inscripciondgr_correcto_local);
       
    },
     
      actaulizar_contenido_text_area_inscripciondgr(value) {
        if(this.$props.obs_inscripciondgr.length <= 2)
        {
            this.clase_text_area_inscripciondgr=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_inscripciondgr_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_inscripciondgr_text_area=  'text-red-500 text-xs italic';
            
        }
        if(this.$props.obs_inscripciondgr.length >= 50)
        {
            this.clase_text_area_inscripciondgr =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_inscripciondgr_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_inscripciondgr_text_area=  'text-red-500 text-xs italic';
        }
        if( this.$props.obs_inscripciondgr !== '' && this.$props.obs_inscripciondgr.length <= 30 && this.$props.obs_inscripciondgr.length >= 3)
        {
            this.clase_text_area_inscripciondgr=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_inscripciondgr_text_area=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_inscripciondgr_text_area=  'text-green-500 text-xs italic';
            
        }
        this.$emit('changeobsinscripciondgr',this.$props.obs_inscripciondgr);
    },
    
  },
  
};
</script>
