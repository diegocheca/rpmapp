<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="input_componente"
            >{{label}}:</label
        >
        
        <input
            id="input_componente"
            name="input_componente"
            v-model="valor_input"
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
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="true" v-on:change="actaulizar_variable_correccion(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="false" v-on:change="actaulizar_variable_correccion(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!valor_evaluacion_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="observaciones"
                    >Observación:</label
                >
                <textarea
                    id="observaciones"
                    name="observaciones"
                    v-model="valor_obs"
                    v-bind:class=clase_text_area
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
            </div>
        </div>
        <div v-show="testing">
            <br>Valor input:{{valor_input}}
            <br>Validacion Input:{{validacion_input_local}}
            <br>distrtito minero calle Valido local:{{validacion_input_local}}
            <br>distrtito minero calle Evalaucion:{{evualacion_correcto}}
            <br>distrtito minero calle Obser:{{valor_obs}}
            <br>distrtito minero calle obsr Valido:{{valor_valido_obs}}
            <br>Evaluacion {{evaluacion}}
            <br>{{texto_validacion_text_area}}
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
        'valor_input_props', 
        'valor_input_validacion', 
        'evualacion_correcto', 
        'valor_obs', 
        'valor_valido_obs',
        'evaluacion',
        'testing',
        'label'
    ],
  data() {
    return {
        clase_border_de_input: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_input: 'Campo Correcto',
        clase_cartel_validacion_input: 'text-green-500 text-xs italic',
        clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_text_area: 'Observacion Correcta',
        clase_text_evaluacion_de_text_area: 'text-green-500 text-xs italic',
        valor_input: this.$props.valor_input_props,

        validacion_input_local: this.$props.valor_input_validacion,

        valor_evaluacion_correcto_local: this.$props.evualacion_correcto,

        obs_valida: this.$props.obs_valido_props,
        
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_correccion(valor) {
        this.valor_evaluacion_correcto_local = valor;
        this.$emit('changecorrecto',this.valor_evaluacion_correcto_local);
    },
     
      actaulizar_contenido_text_area(value) {
        if(this.$props.valor_obs.length <= 2)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
            
        }
        if(this.$props.valor_obs.length >= 50)
        {
            this.clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
        }
        if( this.$props.valor_obs !== '' && this.$props.valor_obs.length <= 30 && this.$props.valor_obs.length >= 3)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Correcta';
            this.clase_text_evaluacion_de_text_area=  'text-green-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',true);
            
        }
        this.$emit('changeobs',this.$props.valor_obs)
    },
    cambio_input(){
        if(this.valor_input.length <= 4)
        {
            this.clase_border_de_input= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_validacion_input= 'text-red-500 text-xs italic';
            this.validacion_input_local = false;
        }
        if(this.valor_input.length >= 40)
        {
            this.clase_border_de_input =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_validacion_input=  'text-red-500 text-xs italic';
            this.validacion_input_local = false;
        }
        if( this.valor_input !== '' && this.valor_input.length <= 30 && this.valor_input.length >= 3)
        {
            this.clase_border_de_input=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input =  'Valor Correcto';
            this.clase_cartel_validacion_input =  'text-green-500 text-xs italic';
            this.validacion_input_local = true;
        }
        this.$emit('changevalido',this.validacion_input_local);
        this.$emit('changevalor',this.valor_input);
     }
  },
};
</script>