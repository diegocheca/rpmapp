<template>
    <div>
        {{$props.email_disable}}
        {{$props.email_correccion_mostrar}}
        {{$props.email_correccion_desactivar}}
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{label}}</label>
            <div class="flex items-stretch w-full mb-4 relative">
                <div class="flex">
                    <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    </span>
                </div>
                <input 
                type="text" 
                class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
                placeholder="Email"
                v-model="email"
                v-bind:class=clase_de_input_email
                :disabled="evaluacion || $props.email_disable"
                @input="cambio_input_email($event.target.value)"
                >
            </div>
        <p v-bind:class=clase_cartel_nota_email>{{cartel_nota_campo}}.</p>
        <div class="flex" v-if="evaluacion || email_correccion_mostrar">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" :disabled="$props.email_correccion_desactivar" class="form-radio h-5 w-5 text-green-600" name="name_email_correcto"  v-model="email_correcto" value="true" v-on:change="actaulizar_variable_email(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" :disabled="$props.email_correccion_desactivar" class="form-radio h-5 w-5 text-red-600" name="name_email_correcto"  v-model="email_correcto" value="false" v-on:change="actaulizar_variable_email(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" :disabled="$props.email_correccion_desactivar" class="form-radio h-5 w-5 text-indigo-600" name="name_email_correcto" v-model="email_correcto" value="nada" v-on:change="actaulizar_variable_email('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!email_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_email"
                    >Observación:</label
                >
                <textarea
                    id="obs_email"
                    name="obs_email"
                    v-model="obs_email"
                    v-bind:class=clase_text_area_email
                    :disabled="$props.email_correccion_desactivar"
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_email_text_area>{{cartel_nota_evaluacion_email_text_area}}</p>
            </div>
        </div>
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
                    {{email}}
                    {{email_valido}}
                    {{email_correcto}}
                    {{obs_email}}
                    {{obs_email_valido_local}}
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props: [
        'email', 
        'email_valido', 
        'email_correcto', 
        'obs_email', 
        'obs_email_valido',
        'evaluacion',
        'label',
        'testing',
        'email_disable',
        'email_correccion_mostrar',
        'email_correccion_desactivar',

    ],
  data() {
    return {
        clase_de_input_email: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_email: 'text-green-500 text-xs italic',
        cartel_nota_campo: 'Campo Correcto',
        email_correcto_local: this.$props.email_correcto,
        email_valido_local:this.$props.email_valido,
        obs_email_valido_local:this.$props.obs_email_valido,
        clase_text_area_email: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_evaluacion_email_text_area: 'text-green-500 text-xs italic',
        cartel_nota_evaluacion_email_text_area: 'Observacion Correcta',
        testing_hijo:false,


    };
  },
  methods:{
    actaulizar_variable_email(valor) {
        this.email_correcto_local = valor;
        console.log(this.email_correcto_local);
        this.$emit('changeemailcorrecto',this.email_correcto_local);
       
    },
     
      actaulizar_contenido_text_area(value) {
        if(this.$props.obs_email.length <= 2)
        {
            this.clase_text_area_email=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_email_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_email_text_area=  'text-red-500 text-xs italic';
            this.obs_email_valido_local = false;
            this.$emit('changeobsemailvalido',this.obs_email_valido_local);
            
        }
        if(this.$props.obs_email.length >= 50)
        {
            this.clase_text_area_email =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_email_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_email_text_area=  'text-red-500 text-xs italic';
            this.obs_email_valido_local = false;
            this.$emit('changeobsemailvalido',this.obs_email_valido_local);
        }
        if( this.$props.obs_email !== '' && this.$props.obs_email.length <= 30 && this.$props.obs_email.length >= 3)
        {
            this.clase_text_area_email=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_email_text_area=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_email_text_area=  'text-green-500 text-xs italic';
            this.obs_email_valido_local = true;
            this.$emit('changeobsemailvalido',this.obs_email_valido_local);
        }
        this.$emit('changeobsemail',this.$props.obs_email);
        

    },
    cambio_input_email(value){
        if(this.email.length <= 4)
        {
            this.clase_de_input_email= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo= 'Campo Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_email= 'text-red-500 text-xs italic';
            this.email_valido_local = false;
        }
        if(this.email.length >= 40)
        {
            this.clase_de_input_email =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo=  'Campo Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_email=  'text-red-500 text-xs italic';
            this.email_valido_local = false;
        }
        if( this.email !== '' && this.email.length <= 30 && this.email.length >= 3)
        {
            this.clase_de_input_email=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo =  'Campo Correcto';
            this.clase_cartel_nota_email =  'text-green-500 text-xs italic';
            this.email_valido_local = true;
        }
        this.$emit('changeemailvalido',this.email_valido_local);
        this.$emit('changeemail',value);

     }
  },
  
};
</script>