<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="numeroproductor"
            >Numero de Productor:</label
        >
        <input
            id="numeroproductor"
            name="numeroproductor"
            v-model="numeroproductor"
             v-bind:class=clase_de_input_numprod
            :disabled="evaluacion"
            @input="cambio_input_numprod($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_numprod>{{cartel_nota_campo_numprod}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="name_numeroproductor_correcto"  v-model="numeroproductor_correcto" value="true" v-on:change="actaulizar_variable_numprod(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_numeroproductor_correcto"  v-model="numeroproductor_correcto" value="false" v-on:change="actaulizar_variable_numprod(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_numeroproductor_correcto" v-model="numeroproductor_correcto" value="nada" v-on:change="actaulizar_variable_numprod('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!numeroproductor_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_numeroproductor"
                    >Observación:</label
                >
                <textarea
                    id="obs_numeroproductor"
                    name="obs_numeroproductor"
                    v-model="obs_numeroproductor"
                    v-bind:class=clase_text_area_numprod
                    @input="actaulizar_contenido_text_area_numprod($event.target.value)" 
                    
                    >
                </textarea>
                 <p  v-bind:class=clase_cartel_nota_evaluacion_numprod_text_area>{{cartel_nota_evaluacion_numprod_text_area}}</p>
            </div>
        
        </div>
        {{numeroproductor}}
        {{numeroproductor_valido}}
        {{numeroproductor_correcto}}
        {{obs_numeroproductor}}
        {{obs_numeroproductor_valido}}
    </div>
</template>

<script>
export default {
    props: [
        'numeroproductor', 
        'numeroproductor_valido', 
        'numeroproductor_correcto', 
        'obs_numeroproductor', 
        'obs_numeroproductor_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_de_input_numprod: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_numprod: 'text-green-500 text-xs italic',
        cartel_nota_campo_numprod: 'Campo Correcto',
        numeroproductor_correcto_local: this.$props.numeroproductor_correcto,
        numeroproductor_valido_local:this.$props.numeroproductor_valido,
        clase_text_area_numprod: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_cartel_nota_evaluacion_numprod_text_area: 'text-green-500 text-xs italic',
        cartel_nota_evaluacion_numprod_text_area: 'Observacion Correcta',
    };
  },
  methods:{
    actaulizar_variable_numprod(valor) {
        this.numeroproductor_correcto_local = valor;
        console.log(this.numeroproductor_correcto_local);
        this.$emit('changenumprodcorrecto',this.numeroproductor_correcto_local);
       
    },
     
      actaulizar_contenido_text_area_numprod(value) {
        if(this.$props.obs_numeroproductor.length <= 2)
        {
            this.clase_text_area_numprod=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_numprod_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_numprod_text_area=  'text-red-500 text-xs italic';
            
        }
        if(this.$props.obs_numeroproductor.length >= 50)
        {
            this.clase_text_area_numprod =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_numprod_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_numprod_text_area=  'text-red-500 text-xs italic';
        }
        if( this.$props.obs_numeroproductor !== '' && this.$props.obs_numeroproductor.length <= 30 && this.$props.obs_numeroproductor.length >= 3)
        {
            this.clase_text_area_numprod=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_numprod_text_area=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_numprod_text_area=  'text-green-500 text-xs italic';
            
        }
        this.$emit('changeobsnumprod',this.$props.obs_numeroproductor);
    },
    cambio_input_numprod(){
        if(this.numeroproductor.length <= 4)
        {
            this.clase_de_input_numprod= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_numprod= 'Campo Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_numprod= 'text-red-500 text-xs italic';
            this.numeroproductor_valido_local = false;
        }
        if(this.numeroproductor.length >= 40)
        {
            this.clase_de_input_numprod =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_numprod=  'Campo Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_numprod=  'text-red-500 text-xs italic';
            this.numeroproductor_valido_local = false;
        }
        if( this.numeroproductor !== '' && this.numeroproductor.length <= 30 && this.numeroproductor.length >= 3)
        {
            this.clase_de_input_numprod=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_campo_numprod =  'Campo Correcto';
            this.clase_cartel_nota_numprod =  'text-green-500 text-xs italic';
            this.numeroproductor_valido_local = true;
        }
        this.$emit('changenumprodvalido',this.numeroproductor_valido_local);

     }
  },
  
};
</script>
