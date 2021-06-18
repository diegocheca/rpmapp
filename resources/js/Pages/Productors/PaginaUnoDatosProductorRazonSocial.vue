<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="razon_social"
            >{{label}} </label
        >
        <input
            id="razon_social"
            name="razon_social"
            v-model="razon_social"
            v-bind:class=clase_de_input_razon_social
            :disabled="evaluacion"
            @input="cambio_input_razonsocial($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_campo>{{cartel_nota_campo}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="true" v-on:change="actaulizar_variable_razonsocial(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="false" v-on:change="actaulizar_variable_razonsocial(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="razon_social_correcto" value="nada" v-on:change="actaulizar_variable_razonsocial('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!razon_social_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_razon_social"
                    >Observación:</label
                >
                <textarea
                    id="obs_razon_social"
                    name="obs_razon_social"
                    v-model="obs_razon_social"
                    v-bind:class=clase_text_area
                    @input="updateValue($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion>{{cartel_nota_evaluacion}}</p>
            </div>
        </div>
        {{testing}}
        <div class="w-full md:w-1/4 px-3 bg-white rounded shadow p-6 m-8" v-show="testing">
            <div class="flex">
                <label class="flex items-center relative w-max cursor-pointer select-none">
                    <br>
                    <span class="text-lg font-bold mr-3">Testing hijo</span>
                    <br>
                    <input 
                    type="checkbox" 
                    class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" 
                    v-model="testing_hijo"
                    />
                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> Sin </span>
                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> Con </span>
                    <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                </label>
            </div>
            <div class="flex">
                <div v-show="testing_hijo">
                    -- Razon:{{razon_social}}--
                    --Razon Valido:{{razon_social_valido}}--
                    --Razon Valido local:{{razon_social_valido_local}}--
                    
                    --Razon Evalaucion:{{razon_social_correcto}}--
                    --Razon Obser:{{obs_razon_social}}--
                    --Razon obsr Valido:{{obs_razon_social_valido_local}}--
                    --Evaluacion {{evaluacion}}--
                    --{{cartel_nota_evaluacion}}--
                </div>
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
        'label',
        'testing',
    ],
  data() {
    return {
        clase_de_input_razon_social: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_campo: 'Campo Correcto',
        clase_cartel_nota_campo: 'text-green-500 text-xs italic',
        clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion: 'Observacion Correcta',
        clase_cartel_nota_evaluacion: 'text-green-500 text-xs italic',
        razon_social_valido_local: this.$props.razon_social_valido,
        razon_social_correcto_local: this.$props.razon_social_correcto,
        obs_razon_social_valido_local: this.$props.obs_razon_social_valido,
        testing_hijo:false,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_razonsocial(valor) {
        this.razon_social_correcto_local = valor;
        this.$emit('changerazonsocialcorrecto',this.razon_social_correcto_local);
        // if(valor == true)
        // {
        //     this.clase_de_input_razon_social = 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
        //     this.cartel_nota_campo = 'Campo Correcto';
        //     this.clase_cartel_nota_campo = 'text-green-500 text-xs italic';
        // }
        // if(!valor)
        // {
        //     this.clase_de_input_razon_social = 'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
        //     this.cartel_nota_campo = 'Campo Incorrecto';
        //     this.clase_cartel_nota_campo = 'text-red-500 text-xs italic';
        // }
        // if(valor === 'nada')
        // {
        //     this.cartel_nota_campo = 'Campo Sin evaluar';
        //     this.clase_cartel_nota_campo = 'text-gray-500 text-xs italic';
        //     this.clase_de_input_razon_social =  'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
        // }
    },
     
      updateValue(value) {
        if(this.$props.obs_razon_social.length <= 2)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion=  'text-red-500 text-xs italic';
            this.obs_razon_social_valido_local = false;
            this.$emit('changeobsrazonsocialvalido',false);
            
        }
        if(this.$props.obs_razon_social.length >= 50)
        {
            this.clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion=  'text-red-500 text-xs italic';
            this.obs_razon_social_valido_local = false;
            this.$emit('changeobsrazonsocialvalido',false);
        }
        if( this.$props.obs_razon_social !== '' && this.$props.obs_razon_social.length <= 30 && this.$props.obs_razon_social.length >= 3)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion=  'text-green-500 text-xs italic';
            this.obs_razon_social_valido_local = false;
            this.$emit('changeobsrazonsocialvalido',true);
            
        }
        this.$emit('changeobsrazonsocial',this.$props.obs_razon_social)
    },
    cambio_input_razonsocial(){
        if(this.razon_social.length <= 4)
        {
            this.clase_de_input_razon_social= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_campo= 'text-red-500 text-xs italic';
            this.razon_social_valido_local = false;
        }
        if(this.razon_social.length >= 40)
        {
            this.clase_de_input_razon_social =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_campo=  'text-red-500 text-xs italic';
            this.razon_social_valido_local = false;
        }
        if( this.razon_social !== '' && this.razon_social.length <= 30 && this.razon_social.length >= 3)
        {
            this.clase_de_input_razon_social=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo =  'Valor Correcto';
            this.clase_cartel_nota_campo =  'text-green-500 text-xs italic';
            this.razon_social_valido_local = true;
        }
        this.$emit('changerazonsocialvalido',this.razon_social_valido_local);

     }
  },
};
</script>