<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="distrito_minero"
            >Distrito Minero:</label
        >
        <input
            id="distrito_minero"
            name="distrito_minero"
            v-model="distrito_minero"
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
                        <input type="radio" class="form-radio h-5 w-5 text-green-600" name="accountType" v-model="distrito_minero_correcto" value="true" v-on:change="actaulizar_variable_correccion(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-red-600" name="accountType" v-model="distrito_minero_correcto" value="false" v-on:change="actaulizar_variable_correccion(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-600" name="accountType" v-model="distrito_minero_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!valor_evaluacion_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_distrito_minero"
                    >Observación:</label
                >
                <textarea
                    id="obs_distrito_minero"
                    name="obs_distrito_minero"
                    v-model="obs_distrito_minero"
                    v-bind:class=clase_text_area
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
            </div>
        </div>
        --distrtito minero calle:{{distrito_minero}}--
        --distrtito minero calle Valido:{{distrito_minero_validacion}}--
        --distrtito minero calle Valido local:{{valor_variable_local}}--
        --distrtito minero calle Evalaucion:{{distrito_minero_correcto}}--
        --distrtito minero calle Obser:{{obs_distrito_minero}}--
        --distrtito minero calle obsr Valido:{{obs_distrito_minero_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{texto_validacion_text_area}}--
    </div>
</template>

<script>
export default {
    props: [
        'distrito_minero', 
        'distrito_minero_validacion', 
        'distrito_minero_correcto', 
        'obs_distrito_minero', 
        'obs_distrito_minero_valido',
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
        valor_variable_local: this.$props.distrito_minero_validacion,
        valor_evaluacion_correcto_local: this.$props.distrito_minero_correcto,
        obs_valida: this.$props.obs_distrito_minero_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_correccion(valor) {
        this.valor_evaluacion_correcto_local = valor;
        this.$emit('changecorrecto',this.valor_evaluacion_correcto_local);
    },
     
      actaulizar_contenido_text_area(value) {
        if(this.$props.obs_distrito_minero.length <= 2)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
            
        }
        if(this.$props.obs_distrito_minero.length >= 50)
        {
            this.clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
        }
        if( this.$props.obs_distrito_minero !== '' && this.$props.obs_distrito_minero.length <= 30 && this.$props.obs_distrito_minero.length >= 3)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Correcta';
            this.clase_text_evaluacion_de_text_area=  'text-green-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',true);
            
        }
        this.$emit('changeobs',this.$props.obs_distrito_minero)
    },
    cambio_input(){
        if(this.distrito_minero.length <= 4)
        {
            this.clase_border_de_input= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_validacion_input= 'text-red-500 text-xs italic';
            this.valor_variable_local = false;
        }
        if(this.distrito_minero.length >= 40)
        {
            this.clase_border_de_input =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_validacion_input=  'text-red-500 text-xs italic';
            this.valor_variable_local = false;
        }
        if( this.distrito_minero !== '' && this.distrito_minero.length <= 30 && this.distrito_minero.length >= 3)
        {
            this.clase_border_de_input=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input =  'Valor Correcto';
            this.clase_cartel_validacion_input =  'text-green-500 text-xs italic';
            this.valor_variable_local = true;
        }
        this.$emit('changevalido',this.valor_variable_local);
        this.$emit('changevalor',this.distrito_minero);
     }
  },
};
</script>