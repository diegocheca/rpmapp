<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_localidad"
            >Localidad comp:</label
        >
        <input
            id="leal_localidad"
            name="leal_localidad"
            v-model="leal_localidad"
            v-bind:class=clase_de_input_calle_localidad_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_localidad_legal($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_legalcallelocalidad>{{cartel_nota_legalcallelocal}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_localidad_correcto" value="true" v-on:change="actaulizar_variable_legalcallelocalidad(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_localidad_correcto" value="false" v-on:change="actaulizar_variable_legalcallelocalidad(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_localidad_correcto" value="nada" v-on:change="actaulizar_variable_legalcallelocalidad('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_localidad_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_localidad"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_localidad"
                    name="obs_leal_localidad"
                    v-model="obs_leal_localidad"
                    v-bind:class=clase_text_area_calle_legal_localidad
                    @input="actaulizar_contenido_text_area_calle_legal_localidad($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_localidad_calle>{{cartel_nota_evaluacion_localidad_calle}}</p>
            </div>
        </div>
        -- localidad calle:{{leal_localidad}}--
        --localidad calle Valido:{{leal_localidad_valido}}--
        --localidad calle Valido local:{{calle_localidad_legal_valido_local}}--
        
        --localidad calle Evalaucion:{{leal_localidad_correcto}}--
        --localidad calle Obser:{{obs_leal_localidad}}--
        --localidad calle obsr Valido:{{obs_leal_localidad_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_localidad_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_localidad', 
        'leal_localidad_valido', 
        'leal_localidad_correcto', 
        'obs_leal_localidad', 
        'obs_leal_localidad_valido',
        'evaluacion',

    ],
  data() {
    return {
        clase_de_input_calle_localidad_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcallelocal: 'Campo Correcto',
        clase_cartel_nota_legalcallelocalidad: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_localidad: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_localidad_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_localidad_calle: 'text-green-500 text-xs italic',
        calle_localidad_legal_valido_local: this.$props.leal_localidad_valido,
        legal_calle_localidad_correcto_local: this.$props.leal_localidad_correcto,
        obs_calle_localidad_legal_valido_local: this.$props.obs_leal_localidad_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legalcallelocalidad(valor) {
        this.legal_calle_localidad_correcto_local = valor;
        this.$emit('changetellegalcorrecto',this.legal_calle_localidad_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_localidad(value) {
        if(this.$props.obs_leal_localidad.length <= 2)
        {
            this.clase_text_area_calle_legal_localidad=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_localidad_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_localidad_calle=  'text-red-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_local = false;
            this.$emit('changelocalidadlegalvalido',false);
            
        }
        if(this.$props.obs_leal_localidad.length >= 50)
        {
            this.clase_text_area_calle_legal_localidad =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_localidad_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_localidad_calle=  'text-red-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_local = false;
            this.$emit('changelocalidadlegalvalido',false);
        }
        if( this.$props.obs_leal_localidad !== '' && this.$props.obs_leal_localidad.length <= 30 && this.$props.obs_leal_localidad.length >= 3)
        {
            this.clase_text_area_calle_legal_localidad=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_localidad_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_localidad_calle=  'text-green-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_local = false;
            this.$emit('changelocalidadlegalvalido',true);
            
        }
        this.$emit('changeobstellegal',this.$props.obs_leal_localidad)
    },
    cambio_input_calle_localidad_legal(){
        if(this.leal_localidad.length <= 4)
        {
            this.clase_de_input_calle_localidad_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallelocal= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcallelocalidad= 'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_local = false;
        }
        if(this.leal_localidad.length >= 40)
        {
            this.clase_de_input_calle_localidad_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallelocal=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcallelocalidad=  'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_local = false;
        }
        if( this.leal_localidad !== '' && this.leal_localidad.length <= 30 && this.leal_localidad.length >= 3)
        {
            this.clase_de_input_calle_localidad_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallelocal =  'Valor Correcto';
            this.clase_cartel_nota_legalcallelocalidad =  'text-green-500 text-xs italic';
            this.calle_localidad_legal_valido_local = true;
        }
        this.$emit('changetellegalvalido',this.calle_localidad_legal_valido_local);
        this.$emit('changevalortellegal',this.leal_localidad);
     }
  },
};
</script>