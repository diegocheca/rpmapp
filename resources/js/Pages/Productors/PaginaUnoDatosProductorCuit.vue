<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="cuit"
            >Cuit c:</label
        >
        <input
            id="cuit"
            name="cuit"
            v-model="cuit"
            v-bind:class=clase_de_input_cuit
            :disabled="evaluacion"
            @input="cambio_input_cuit($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_cuit>{{cartel_nota_campo_cuit}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="cuit_correcto" value="true"  v-on:change="actaulizar_variable_cuit(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="cuit_correcto" value="false" v-on:change="actaulizar_variable_cuit(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_cuit_correcto" v-model="cuit_correcto" value="nada" v-on:change="actaulizar_variable_cuit('nada')">
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
        {{cuit}}
        {{cuit_valido}}
        {{cuit_correcto}}
        {{obs_cuit}}
        {{obs_cuit_valido}}
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
    cambio_input_cuit(){
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

     }
  },
  
};
</script>
