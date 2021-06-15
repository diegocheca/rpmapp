<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="numero_expdiente"
            >Numero de Expediente:</label
        >
        <input
            id="numero_expdiente"
            name="numero_expdiente"
            v-model="numero_expdiente"
            v-bind:class=clase_border_de_input
            :disabled="evaluacion"
            @input="cambio_input($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_validacion_input>{{texto_validacion_input}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="numero_expdiente_correcto" value="true" v-on:change="actaulizar_variable_correccion(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="numero_expdiente_correcto" value="false" v-on:change="actaulizar_variable_correccion(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="numero_expdiente_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!numero_expdiente_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_numero_expdiente"
                    >Observación:</label
                >
                <textarea
                    id="obs_numero_expdiente"
                    name="obs_numero_expdiente"
                    v-model="obs_numero_expdiente"
                    v-bind:class=clase_text_area
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
            </div>
        </div>
        --num exp calle:{{numero_expdiente}}--
        --num exp calle Valido:{{numero_expdiente_valido}}--
        --num exp calle Valido local:{{numero_expdiente_valido_local}}--
        
        --num exp calle Evalaucion:{{numero_expdiente_correcto}}--
        --num exp calle Obser:{{obs_numero_expdiente}}--
        --num exp calle obsr Valido:{{obs_numero_expdiente_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{texto_validacion_text_area}}--
    </div>
</template>

<script>
export default {
    props: [
        'numero_expdiente', 
        'numero_expdiente_valido', 
        'numero_expdiente_correcto', 
        'obs_numero_expdiente', 
        'obs_numero_expdiente_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_border_de_input: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_input: 'Campo Correcto',
        clase_cartel_validacion_input: 'text-green-500 text-xs italic',
        clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_text_area: 'Observacion Correcta',
        clase_text_evaluacion_de_text_area: 'text-green-500 text-xs italic',
        numero_expdiente_valido_local: this.$props.numero_expdiente_valido,
        numero_expdiente_correcto_local: this.$props.numero_expdiente_correcto,
        obs_num_exp_valido: this.$props.obs_numero_expdiente_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_correccion(valor) {
        this.numero_expdiente_correcto_local = valor;
        this.$emit('changenumexpcorrecto',this.numero_expdiente_correcto_local);
    },
     
      actaulizar_contenido_text_area(value) {
        if(this.$props.obs_numero_expdiente.length <= 2)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_num_exp_valido = false;
            this.$emit('changeobsnumexpvalido',false);
            
        }
        if(this.$props.obs_numero_expdiente.length >= 50)
        {
            this.clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_num_exp_valido = false;
            this.$emit('changeobsnumexpvalido',false);
        }
        if( this.$props.obs_numero_expdiente !== '' && this.$props.obs_numero_expdiente.length <= 30 && this.$props.obs_numero_expdiente.length >= 3)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Correcta';
            this.clase_text_evaluacion_de_text_area=  'text-green-500 text-xs italic';
            this.obs_num_exp_valido = false;
            this.$emit('changeobsnumexpvalido',true);
            
        }
        this.$emit('changeobsnumexp',this.$props.obs_numero_expdiente)
    },
    cambio_input(){
        if(this.numero_expdiente.length <= 4)
        {
            this.clase_border_de_input= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_validacion_input= 'text-red-500 text-xs italic';
            this.numero_expdiente_valido_local = false;
        }
        if(this.numero_expdiente.length >= 40)
        {
            this.clase_border_de_input =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_validacion_input=  'text-red-500 text-xs italic';
            this.numero_expdiente_valido_local = false;
        }
        if( this.numero_expdiente !== '' && this.numero_expdiente.length <= 30 && this.numero_expdiente.length >= 3)
        {
            this.clase_border_de_input=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input =  'Valor Correcto';
            this.clase_cartel_validacion_input =  'text-green-500 text-xs italic';
            this.numero_expdiente_valido_local = true;
        }
        this.$emit('changeobsnumexpvalido',this.numero_expdiente_valido_local);
        this.$emit('changevalornumexp',this.numero_expdiente);
     }
  },
};
</script>