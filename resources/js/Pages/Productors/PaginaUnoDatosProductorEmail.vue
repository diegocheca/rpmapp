<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="email"
            >Email c:</label
        >
        <input
            id="email"
            name="email"
            v-model="email"
            v-bind:class=clase_de_input_email
            :disabled="evaluacion"
            @input="cambio_input_email($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_email>{{cartel_nota_campo}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="name_email_correcto"  v-model="email_correcto" value="true" v-on:change="actaulizar_variable_email(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_email_correcto"  v-model="email_correcto" value="false" v-on:change="actaulizar_variable_email(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="name_email_correcto" v-model="email_correcto" value="nada" v-on:change="actaulizar_variable_email('nada')">
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
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_email_text_area>{{cartel_nota_evaluacion_email_text_area}}</p>
            </div>
        </div>
        {{email}}
        {{email_valido}}
        {{email_correcto}}
        {{obs_email}}
        {{obs_email_valido_local}}
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
    cambio_input_email(){
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

     }
  },
  
};
</script>