<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{label}}</label>
        <div class="flex items-stretch w-full mb-4 relative">
            <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <svg cxmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
                </svg>
                </span>
            </div>
            <input 
            type="text" 
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
            placeholder="@"
            v-model="cuit"
            v-bind:class=clase_de_input_cuit
            :disabled="evaluacion"
            @input="cambio_input_cuit($event.target.value)" 
            >
        </div>
        <p v-bind:class=clase_cartel_nota_cuit>{{cartel_nota_campo_cuit}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio h-5 w-5 text-green-600" name="name_cuit_correcto"  v-model="cuit_correcto" value="true"  v-on:change="actaulizar_variable_cuit(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-red-600" name="name_cuit_correcto"  v-model="cuit_correcto" value="false" v-on:change="actaulizar_variable_cuit(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-600" name="name_cuit_correcto" v-model="cuit_correcto" value="nada" v-on:change="actaulizar_variable_cuit('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!cuit_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_cuit"
                    >Observación:</label
                >
                <textarea
                    id="obs_cuit"
                    name="obs_cuit"
                    v-model="obs_cuit"
                    
                    v-bind:class=clase_text_area_cuit
                    @input="actaulizar_contenido_text_area_cuit($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_cuit_text_area>{{cartel_nota_evaluacion_cuit_text_area}}</p>
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
                    {{cuit}}
                    {{cuit_valido}}
                    {{cuit_correcto}}
                    {{obs_cuit}}
                    {{obs_cuit_valido}}
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props: [
        'cuit', 
        'cuit_valido', 
        'cuit_correcto', 
        'obs_cuit', 
        'obs_cuit_valido',
        'evaluacion',
        'label',
        'testing',
    ],
  data() {
    return {
        clase_de_input_cuit: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_cuit: 'text-green-500 text-xs italic',
        cartel_nota_campo_cuit: 'Campo Correcto',
        cuit_correcto_local: this.$props.cuit_correcto,
        cuit_valido_local:this.$props.email_valido,
        clase_text_area_cuit: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_evaluacion_cuit_text_area: 'text-green-500 text-xs italic',
        cartel_nota_evaluacion_cuit_text_area: 'Observacion Correcta',
        testing_hijo:false,
    };
  },
  methods:{
    actaulizar_variable_cuit(valor) {
        this.cuit_correcto_local = valor;
        console.log(this.cuit_correcto_local);
        this.$emit('changecuitcorrecto',this.cuit_correcto_local);
       
    },
     
      actaulizar_contenido_text_area_cuit(value) {
        if(this.$props.obs_cuit.length <= 2)
        {
            this.clase_text_area_cuit=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cuit_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_cuit_text_area=  'text-red-500 text-xs italic';
            
        }
        if(this.$props.obs_cuit.length >= 50)
        {
            this.clase_text_area_cuit =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cuit_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_cuit_text_area=  'text-red-500 text-xs italic';
        }
        if( this.$props.obs_cuit !== '' && this.$props.obs_cuit.length <= 30 && this.$props.obs_cuit.length >= 3)
        {
            this.clase_text_area_cuit=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_cuit_text_area=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_cuit_text_area=  'text-green-500 text-xs italic';
            
        }
        this.$emit('changeobscuit',this.$props.obs_cuit);
    },
    cambio_input_cuit(value){
        if(this.cuit.length <= 4)
        {
            this.clase_de_input_cuit= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_cuit= 'Campo Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_cuit= 'text-red-500 text-xs italic';
            this.cuit_valido_local = false;
        }
        if(this.cuit.length >= 40)
        {
            this.clase_de_input_cuit =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_cuit=  'Campo Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_cuit=  'text-red-500 text-xs italic';
            this.cuit_valido_local = false;
        }
        if( this.cuit !== '' && this.cuit.length <= 30 && this.cuit.length >= 3)
        {
            this.clase_de_input_cuit=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_cuit =  'Campo Correcto';
            this.clase_cartel_nota_cuit =  'text-green-500 text-xs italic';
            this.cuit_valido_local = true;
        }
        this.$emit('changecuitvalido',this.cuit_valido_local);
        this.$emit('changecuit',value);

     }
  },
  
};
</script>
