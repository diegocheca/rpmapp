<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_provincia"
            >Provincia de Domicilio comp:</label
        >
        <select
            id="leal_provincia"
            name="leal_provincia"
            v-model="leal_provincia"
            v-bind:class=clase_de_input_calle_prov_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_prov_legal($event.target.value)" 
        >
        <option value="San Juan">San Juan</option>
        <option value="Mendoza">Mendoza</option>
        <option value="La rioja">La rioja</option>
        <option value="Buenos Aires">Buenos Aires</option>

        </select>
        <p v-bind:class=clase_cartel_nota_legalcalleprov>{{cartel_nota_legalcalleprov}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_prov_correcto" value="true" v-on:change="cactaulizar_variable_legalcalleprov(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_prov_correcto" value="false" v-on:change="cactaulizar_variable_legalcalleprov(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_prov_correcto" value="nada" v-on:change="cactaulizar_variable_legalcalleprov('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_prov_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_provincia"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_provincia"
                    name="obs_leal_provincia"
                    v-model="obs_leal_provincia"
                    v-bind:class=clase_text_area_calle_legal_prov
                    @input="actaulizar_contenido_text_area_calle_legal_tel($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_prov_calle>{{cartel_nota_evaluacion_prov_calle}}</p>
            </div>
        </div>
        -- prov calle:{{leal_provincia}}--
        --prov calle Valido:{{leal_telefono_valido}}--
        --prov calle Valido local:{{calle_prov_legal_valido_local}}--
        
        --prov calle Evalaucion:{{leal_prov_correcto}}--
        --prov calle Obser:{{obs_leal_provincia}}--
        --prov calle obsr Valido:{{obs_leal_provincia_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_prov_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_provincia', 
        'leal_provincia_valido', 
        'leal_provincia_correcto', 
        'obs_leal_provincia', 
        'obs_leal_provincia_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_de_input_calle_prov_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcalleprov: 'Campo Correcto',
        clase_cartel_nota_legalcalleprov: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_prov: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_prov_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_prov_calle: 'text-green-500 text-xs italic',
        calle_prov_legal_valido_local: this.$props.leal_provincia_valido,
        legal_calle_prov_correcto_local: this.$props.leal_provincia_correcto,
        obs_calle_prov_legal_valido_local: this.$props.obs_leal_provincia_valido,
        //border-green-500
    }; 
  },
  methods:{
    cactaulizar_variable_legalcalleprov(valor) {
        this.legal_calle_prov_correcto_local = valor;
        this.$emit('changeprovlegalcorrecto',this.legal_calle_prov_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_tel(value) {
        if(this.$props.obs_leal_provincia.length <= 2)
        {
            this.clase_text_area_calle_legal_prov=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_prov_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_prov_calle=  'text-red-500 text-xs italic';
            this.obs_calle_prov_legal_valido_local = false;
            this.$emit('changeobsprovlegalvalido',false);
            
        }
        if(this.$props.obs_leal_provincia.length >= 50)
        {
            this.clase_text_area_calle_legal_prov =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_prov_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_prov_calle=  'text-red-500 text-xs italic';
            this.obs_calle_prov_legal_valido_local = false;
            this.$emit('changeobsprovlegalvalido',false);
        }
        if( this.$props.obs_leal_provincia !== '' && this.$props.obs_leal_provincia.length <= 30 && this.$props.obs_leal_provincia.length >= 3)
        {
            this.clase_text_area_calle_legal_prov=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_prov_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_prov_calle=  'text-green-500 text-xs italic';
            this.obs_calle_prov_legal_valido_local = false;
            this.$emit('changeobsprovlegalvalido',true);
            
        }
        this.$emit('changeobsrpovlegal',this.$props.obs_leal_provincia)
    },
    cambio_input_calle_prov_legal(){
        if(this.leal_provincia.length <= 4)
        {
            this.clase_de_input_calle_prov_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalleprov= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalleprov= 'text-red-500 text-xs italic';
            this.calle_prov_legal_valido_local = false;
        }
        if(this.leal_provincia.length >= 40)
        {
            this.clase_de_input_calle_prov_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalleprov=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalleprov=  'text-red-500 text-xs italic';
            this.calle_prov_legal_valido_local = false;
        }
        if( this.leal_provincia !== '' && this.leal_provincia.length <= 30 && this.leal_provincia.length >= 3)
        {
            this.clase_de_input_calle_prov_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalleprov =  'Valor Correcto';
            this.clase_cartel_nota_legalcalleprov =  'text-green-500 text-xs italic';
            this.calle_prov_legal_valido_local = true;
        }
        this.$emit('changeprovlegalvalido',this.calle_prov_legal_valido_local);
        this.$emit('changevalorprovlegal',this.leal_provincia);
     }
  },
};
</script>