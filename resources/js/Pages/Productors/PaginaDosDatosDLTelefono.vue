<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_telefono"
            >Telefono de Calle comp:</label
        >
        <input
            id="leal_telefono"
            name="leal_telefono"
            v-model="leal_telefono"
            v-bind:class=clase_de_input_calle_tel_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_tel_legal($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_legalcalletel>{{cartel_nota_legalcalletel}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_telefono_correcto" value="true" v-on:change="actaulizar_variable_legalcalletel(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_telefono_correcto" value="false" v-on:change="actaulizar_variable_legalcalletel(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_telefono_correcto" value="nada" v-on:change="actaulizar_variable_legalcalletel('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_tel_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_telefono"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_telefono"
                    name="obs_leal_telefono"
                    v-model="obs_leal_telefono"
                    v-bind:class=clase_text_area_calle_legal_tel
                    @input="actaulizar_contenido_text_area_calle_legal_tel($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_tel_calle>{{cartel_nota_evaluacion_tel_calle}}</p>
            </div>
        </div>
        -- telefono calle:{{leal_telefono}}--
        --telefono calle Valido:{{leal_telefono_valido}}--
        --telefono calle Valido local:{{calle_tel_legal_valido_local}}--
        
        --telefono calle Evalaucion:{{leal_telefono_correcto}}--
        --telefono calle Obser:{{obs_leal_telefono}}--
        --telefono calle obsr Valido:{{obs_leal_telefono_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_tel_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_telefono', 
        'leal_telefono_valido', 
        'leal_telefono_correcto', 
        'obs_leal_telefono', 
        'obs_leal_telefono_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_de_input_calle_tel_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcalletel: 'Campo Correcto',
        clase_cartel_nota_legalcalletel: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_tel: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_tel_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_tel_calle: 'text-green-500 text-xs italic',
        calle_tel_legal_valido_local: this.$props.leal_telefono_valido,
        legal_calle_tel_correcto_local: this.$props.leal_telefono_correcto,
        obs_calle_tel_legal_valido_local: this.$props.obs_leal_telefono_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legalcalletel(valor) {
        this.legal_calle_tel_correcto_local = valor;
        this.$emit('changetellegalcorrecto',this.legal_calle_tel_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_tel(value) {
        if(this.$props.obs_leal_telefono.length <= 2)
        {
            this.clase_text_area_calle_legal_tel=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tel_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_tel_calle=  'text-red-500 text-xs italic';
            this.obs_calle_tel_legal_valido_local = false;
            this.$emit('changeobstellegalvalido',false);
            
        }
        if(this.$props.obs_leal_telefono.length >= 50)
        {
            this.clase_text_area_calle_legal_tel =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tel_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_tel_calle=  'text-red-500 text-xs italic';
            this.obs_calle_tel_legal_valido_local = false;
            this.$emit('changeobstellegalvalido',false);
        }
        if( this.$props.obs_leal_telefono !== '' && this.$props.obs_leal_telefono.length <= 30 && this.$props.obs_leal_telefono.length >= 3)
        {
            this.clase_text_area_calle_legal_tel=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_tel_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_tel_calle=  'text-green-500 text-xs italic';
            this.obs_calle_tel_legal_valido_local = false;
            this.$emit('changeobstellegalvalido',true);
            
        }
        this.$emit('changeobstellegal',this.$props.obs_leal_telefono)
    },
    cambio_input_calle_tel_legal(){
        if(this.leal_telefono.length <= 4)
        {
            this.clase_de_input_calle_tel_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalletel= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalletel= 'text-red-500 text-xs italic';
            this.calle_tel_legal_valido_local = false;
        }
        if(this.leal_telefono.length >= 40)
        {
            this.clase_de_input_calle_tel_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalletel=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalletel=  'text-red-500 text-xs italic';
            this.calle_tel_legal_valido_local = false;
        }
        if( this.leal_telefono !== '' && this.leal_telefono.length <= 30 && this.leal_telefono.length >= 3)
        {
            this.clase_de_input_calle_tel_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalletel =  'Valor Correcto';
            this.clase_cartel_nota_legalcalletel =  'text-green-500 text-xs italic';
            this.calle_tel_legal_valido_local = true;
        }
        this.$emit('changetellegalvalido',this.calle_tel_legal_valido_local);
        this.$emit('changevalortellegal',this.leal_telefono);
     }
  },
};
</script>