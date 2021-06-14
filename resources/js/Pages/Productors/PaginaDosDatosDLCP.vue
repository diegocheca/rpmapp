<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_cp"
            >Codigo postal comp:</label
        >
        <input
            id="leal_cp"
            name="leal_cp"
            v-model="leal_cp"
            v-bind:class=clase_de_input_calle_cp_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_cp_legal($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_legal_cp>{{cartel_nota_legal_cp}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_cp_correcto" value="true" v-on:change="actaulizar_variable_legal_cp(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_cp_correcto" value="false" v-on:change="actaulizar_variable_legal_cp(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_cp_correcto" value="nada" v-on:change="actaulizar_variable_legal_cp('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_cp_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_cp"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_cp"
                    name="obs_leal_cp"
                    v-model="obs_leal_cp"
                    v-bind:class=clase_text_area_calle_legal_cp
                    @input="actaulizar_contenido_text_area_calle_legal_cp($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_cp_calle>{{cartel_nota_evaluacion_cp_calle}}</p>
            </div>
        </div>
        -- co calle:{{leal_cp}}--
        --co calle Valido:{{leal_cp_valido}}--
        --co calle Valido local:{{calle_localidad_legal_valido_cp}}--
        
        --co calle Evalaucion:{{leal_cp_correcto}}--
        --co calle Obser:{{obs_leal_cp}}--
        --co calle obsr Valido:{{obs_leal_cp_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_cp_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_cp', 
        'leal_cp_valido', 
        'leal_cp_correcto', 
        'obs_leal_cp', 
        'obs_leal_cp_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_de_input_calle_cp_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legal_cp: 'Campo Correcto',
        clase_cartel_nota_legal_cp: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_cp: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_cp_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_cp_calle: 'text-green-500 text-xs italic',
        calle_localidad_legal_valido_cp: this.$props.leal_cp_valido,
        legal_calle_cp_correcto_local: this.$props.leal_cp_correcto,
        obs_calle_cp_legal_valido_local: this.$props.obs_leal_cp_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legal_cp(valor) {
        this.legal_calle_cp_correcto_local = valor;
        this.$emit('changecplegalcorrecto',this.legal_calle_cp_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_cp(value) {
        if(this.$props.obs_leal_cp.length <= 2)
        {
            this.clase_text_area_calle_legal_cp=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cp_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_cp_calle=  'text-red-500 text-xs italic';
            this.obs_calle_cp_legal_valido_local = false;
            this.$emit('changeobscplegalvalido',false);
            
        }
        if(this.$props.obs_leal_cp.length >= 50)
        {
            this.clase_text_area_calle_legal_cp =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cp_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_cp_calle=  'text-red-500 text-xs italic';
            this.obs_calle_cp_legal_valido_local = false;
            this.$emit('changeobscplegalvalido',false);
        }
        if( this.$props.obs_leal_cp !== '' && this.$props.obs_leal_cp.length <= 30 && this.$props.obs_leal_cp.length >= 3)
        {
            this.clase_text_area_calle_legal_cp=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cp_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_cp_calle=  'text-green-500 text-xs italic';
            this.obs_calle_cp_legal_valido_local = false;
            this.$emit('changeobscplegalvalido',true);
            
        }
        this.$emit('changeobsrcplegal',this.$props.obs_leal_cp)
    },
    cambio_input_calle_cp_legal(){
        if(this.leal_cp.length <= 4)
        {
            this.clase_de_input_calle_cp_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legal_cp= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legal_cp= 'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_cp = false;
        }
        if(this.leal_cp.length >= 40)
        {
            this.clase_de_input_calle_cp_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legal_cp=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legal_cp=  'text-red-500 text-xs italic';
            this.calle_localidad_legal_valido_cp = false;
        }
        if( this.leal_cp !== '' && this.leal_cp.length <= 30 && this.leal_cp.length >= 3)
        {
            this.clase_de_input_calle_cp_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legal_cp =  'Valor Correcto';
            this.clase_cartel_nota_legal_cp =  'text-green-500 text-xs italic';
            this.calle_localidad_legal_valido_cp = true;
        }
        this.$emit('changecplegalvalido',this.calle_localidad_legal_valido_cp);
        this.$emit('changevalorcplegal',this.leal_cp);
     }
  },
};
</script>