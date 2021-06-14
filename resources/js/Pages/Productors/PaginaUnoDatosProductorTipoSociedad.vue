<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="tiposociedad"
            >Tipo de Sociedad:</label
        >
        <input
            id="tiposociedad"
            name="tiposociedad"
            v-model="tiposociedad"
            v-bind:class=clase_de_input_tiposociedad
            :disabled="evaluacion"
            @input="cambio_input_tiposociedad($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_tiposociedad>{{cartel_nota_campo_tiposociedad}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="name_tiposociedad_correcto"  v-model="tiposociedad_correcto" value="true" v-on:change="actaulizar_variable_tiposociedad(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_tiposociedad_correcto"  v-model="tiposociedad_correcto" value="false" v-on:change="actaulizar_variable_tiposociedad(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_tiposociedad_correcto" v-model="tiposociedad_correcto" value="nada" v-on:change="actaulizar_variable_tiposociedad('nada')">
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
        {{tiposociedad}}
        {{tiposociedad_valido}}
        {{tiposociedad_correcto}}
        {{obs_tiposociedad}}
        {{obs_tiposociedad_valido}}
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
    cambio_input_tiposociedad(){
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

     }
  },
  
};
</script>
