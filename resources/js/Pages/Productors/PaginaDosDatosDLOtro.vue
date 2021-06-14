<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_otro"
            >Otro comp:</label
        >
        <input
            id="leal_otro"
            name="leal_otro"
            v-model="leal_otro"
            v-bind:class=clase_de_input_calle_otro_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_otro_legal($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_legalcalleotro>{{cartel_nota_legalcalle_otro}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_otro_correcto" value="true" v-on:change="actaulizar_variable_legalcalle_otro(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_otro_correcto" value="false" v-on:change="actaulizar_variable_legalcalle_otro(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_otro_correcto" value="nada" v-on:change="actaulizar_variable_legalcalle_otro('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_otro_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_otro"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_otro"
                    name="obs_leal_otro"
                    v-model="obs_leal_otro"
                    v-bind:class=clase_text_area_calle_legal_otro
                    @input="actaulizar_contenido_text_area_calle_legal_otro($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_otro_calle>{{cartel_nota_evaluacion_otro_calle}}</p>
            </div>
        </div>
        -- otro calle:{{leal_otro}}--
        --otro calle Valido:{{leal_otro_valido}}--
        --otro calle Valido local:{{calle_localidad_legal_valido_otro}}--
        
        --otro calle Evalaucion:{{leal_otro_correcto}}--
        --otro calle Obser:{{obs_leal_otro}}--
        --otro calle obsr Valido:{{obs_leal_otro_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_otro_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_otro', 
        'leal_otro_valido', 
        'leal_otro_correcto', 
        'obs_leal_otro', 
        'obs_leal_otro_valido',
        'evaluacion',


    ],
  data() {
    return {
        clase_de_input_calle_otro_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcalle_otro: 'Campo Correcto',
        clase_cartel_nota_legalcalleotro: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_otro: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_otro_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_otro_calle: 'text-green-500 text-xs italic',
        calle_localidad_legal_valido_otro: this.$props.leal_otro_valido,
        legal_calle_otro_correcto_local: this.$props.leal_otro_correcto,
        obs_calle_localidad_legal_valido_otro: this.$props.obs_leal_otro_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legalcalle_otro(valor) {
        this.legal_calle_otro_correcto_local = valor;
        this.$emit('changeotrolegalcorrecto',this.legal_calle_otro_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_otro(value) {
        if(this.$props.obs_leal_otro.length <= 2)
        {
            this.clase_text_area_calle_legal_otro=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_otro_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_otro_calle=  'text-red-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_otro = false;
            this.$emit('changeobsotrolegalvalido',false);
            
        }
        if(this.$props.obs_leal_otro.length >= 50)
        {
            this.clase_text_area_calle_legal_otro =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_otro_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_otro_calle=  'text-red-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_otro = false;
            this.$emit('changeobsotrolegalvalido',false);
        }
        if( this.$props.obs_leal_otro !== '' && this.$props.obs_leal_otro.length <= 30 && this.$props.obs_leal_otro.length >= 3)
        {
            this.clase_text_area_calle_legal_otro=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_otro_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_otro_calle=  'text-green-500 text-xs italic';
            this.obs_calle_localidad_legal_valido_otro = false;
            this.$emit('changeobsotrolegalvalido',true);
            
        }
        this.$emit('changeobsotrolegal',this.$props.obs_leal_otro)
    },
    cambio_input_calle_otro_legal(){
        if(this.leal_otro.length <= 4)
        {
            this.clase_de_input_calle_otro_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle_otro= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalleotro= 'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_otro = false;
        }
        if(this.leal_otro.length >= 40)
        {
            this.clase_de_input_calle_otro_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle_otro=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalleotro=  'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_otro = false;
        }
        if( this.leal_otro !== '' && this.leal_otro.length <= 30 && this.leal_otro.length >= 3)
        {
            this.clase_de_input_calle_otro_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle_otro =  'Valor Correcto';
            this.clase_cartel_nota_legalcalleotro =  'text-green-500 text-xs italic';
            this.calle_localidad_legal_valido_otro = true;
        }
        this.$emit('changeotrolegalvalido',this.calle_localidad_legal_valido_otro);
        this.$emit('changevalorotrolegal',this.leal_otro);
     }
  },
};
</script>