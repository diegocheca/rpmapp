<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{label}}</label>
        <div class="flex items-stretch w-full mb-4 relative">
            <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <svg cxmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                </svg>
                
                </span>
            </div>
            <input 
            type="text" 
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
            placeholder="Tipo Sociedad"
            v-model="tiposociedad"
            v-bind:class=clase_de_input_tiposociedad
            :disabled="evaluacion"
            @input="cambio_input_tiposociedad($event.target.value)" 
            >
        </div>
        <p v-bind:class=clase_cartel_nota_tiposociedad>{{cartel_nota_campo_tiposociedad}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio h-5 w-5 text-green-600" name="name_tiposociedad_correcto"  v-model="tiposociedad_correcto" value="true" v-on:change="actaulizar_variable_tiposociedad(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-red-600" name="name_tiposociedad_correcto"  v-model="tiposociedad_correcto" value="false" v-on:change="actaulizar_variable_tiposociedad(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-600" name="name_tiposociedad_correcto" v-model="tiposociedad_correcto" value="nada" v-on:change="actaulizar_variable_tiposociedad('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!tiposociedad_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_tiposociedad"
                    >Observación:</label
                >
                <textarea
                    id="obs_tiposociedad"
                    name="obs_tiposociedad"
                    v-model="obs_tiposociedad"
                    v-bind:class=clase_text_area_tiposociedad
                    @input="actaulizar_contenido_text_area_tiposociedad($event.target.value)" 
                    
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_tiposociedad_text_area>{{cartel_nota_evaluacion_tiposociedad_text_area}}</p>
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
                    {{tiposociedad}}
                    {{tiposociedad_valido}}
                    {{tiposociedad_correcto}}
                    {{obs_tiposociedad}}
                    {{obs_tiposociedad_valido}}
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    props: [
        'tiposociedad', 
        'tiposociedad_valido', 
        'tiposociedad_correcto', 
        'obs_tiposociedad', 
        'obs_tiposociedad_valido',
        'evaluacion',
        'label',
        'testing',

        
    ],
  data() {
    return {
        clase_de_input_tiposociedad: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_tiposociedad: 'text-green-500 text-xs italic',
        cartel_nota_campo_tiposociedad: 'Campo Correcto',
        tiposociedad_correcto_local: this.$props.tiposociedad_correcto,
        tiposociedad_valido_local:this.$props.tiposociedad_valido,
        clase_text_area_tiposociedad: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_evaluacion_tiposociedad_text_area: 'text-green-500 text-xs italic',
        cartel_nota_evaluacion_tiposociedad_text_area: 'Observacion Correcta',
        testing_hijo:false,
    };
  },
  methods:{
    actaulizar_variable_tiposociedad(valor) {
        this.tiposociedad_correcto_local = valor;
        console.log(this.tiposociedad_correcto_local);
        this.$emit('changetiposociedadcorrecto',this.tiposociedad_correcto_local);
       
    },
     
      actaulizar_contenido_text_area_tiposociedad(value) {
        if(this.$props.obs_tiposociedad.length <= 2)
        {
            this.clase_text_area_tiposociedad=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tiposociedad_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_tiposociedad_text_area=  'text-red-500 text-xs italic';
            
        }
        if(this.$props.obs_tiposociedad.length >= 50)
        {
            this.clase_text_area_tiposociedad =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tiposociedad_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_tiposociedad_text_area=  'text-red-500 text-xs italic';
        }
        if( this.$props.obs_tiposociedad !== '' && this.$props.obs_tiposociedad.length <= 30 && this.$props.obs_tiposociedad.length >= 3)
        {
            this.clase_text_area_tiposociedad=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tiposociedad_text_area=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_tiposociedad_text_area=  'text-green-500 text-xs italic';
            
        }
        this.$emit('changeobstiposociedad',this.$props.obs_tiposociedad);
    },
    cambio_input_tiposociedad(value){
        if(this.tiposociedad.length <= 4)
        {
            this.clase_de_input_tiposociedad= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_tiposociedad= 'Campo Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_tiposociedad= 'text-red-500 text-xs italic';
            this.tiposociedad_valido_local = false;
        }
        if(this.tiposociedad.length >= 40)
        {
            this.clase_de_input_tiposociedad =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_tiposociedad=  'Campo Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_tiposociedad=  'text-red-500 text-xs italic';
            this.tiposociedad_valido_local = false;
        }
        if( this.tiposociedad !== '' && this.tiposociedad.length <= 30 && this.tiposociedad.length >= 3)
        {
            this.clase_de_input_tiposociedad=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_tiposociedad =  'Campo Correcto';
            this.clase_cartel_nota_tiposociedad =  'text-green-500 text-xs italic';
            this.tiposociedad_valido_local = true;
        }
        this.$emit('changetiposociedadvalido',this.tiposociedad_valido_local);
        this.$emit('changetiposociedad',value);

     }
  },
  
};
</script>
