<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_departamento"
            >{{label}}</label
        >
        <select
            id="leal_departamento"
            name="leal_departamento"
            v-model="leal_departamento"
            v-bind:class=clase_de_input_calle_dpto_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_dpto_legal($event.target.value)" 
        >
        <option value="Capital">Capital</option>
        <option value="Chimbas">Chimbas</option>
        <option value="Rivadavia">Rivadavia</option>
        <option value="25 de mayo">25 de mayo</option>

        </select>
        <p v-bind:class=clase_cartel_nota_legalcalledpto>{{clacartel_nota_legalcalledpto}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_departamento_correcto" value="true" v-on:change="cactaulizar_variable_legalcalledpto(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_departamento_correcto" value="false" v-on:change="cactaulizar_variable_legalcalledpto(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="leal_departamento_correcto" value="nada" v-on:change="cactaulizar_variable_legalcalledpto('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_dpto_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_departamento"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_departamento"
                    name="obs_leal_departamento"
                    v-model="obs_leal_departamento"
                    v-bind:class=clase_text_area_calle_legal_dpto
                    @input="actaulizar_contenido_text_area_calle_legal_dpto($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_dpto_calle>{{cartel_nota_evaluacion_dpto_calle}}</p>
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
                    -- depto calle:{{leal_departamento}}--
                    --depto calle Valido:{{leal_departamento_valido}}--
                    --depto calle Valido local:{{calle_dpto_legal_valido_local}}--
                    --depto calle Evalaucion:{{leal_departamento_correcto}}--
                    --depto calle Obser:{{obs_leal_departamento}}--
                    --depto calle obsr Valido:{{obs_leal_departamento_valido}}--
                    --Evaluacion {{evaluacion}}--
                    --{{cartel_nota_evaluacion_dpto_calle}}--
                </div>
            </div>
        </div>
       
    </div>
</template>

<script>
export default {
    props: [
        'leal_departamento', 
        'leal_departamento_valido', 
        'leal_departamento_correcto', 
        'obs_leal_departamento', 
        'obs_leal_departamento_valido',
        'evaluacion',
        'testing',
        'label',


        
        
        
        


    ],
  data() {
    return {
        clase_de_input_calle_dpto_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clacartel_nota_legalcalledpto: 'Campo Correcto',
        clase_cartel_nota_legalcalledpto: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_dpto: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_dpto_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_dpto_calle: 'text-green-500 text-xs italic',
        calle_dpto_legal_valido_local: this.$props.leal_departamento_valido,
        legal_calle_dpto_correcto_local: this.$props.leal_departamento_correcto,
        obs_calle_dpto_legal_valido_local: this.$props.obs_leal_departamento_valido,
        testing_hijo:false,
        //border-green-500
    }; 
  },
  methods:{
    cactaulizar_variable_legalcalledpto(valor) {
        this.legal_calle_dpto_correcto_local = valor;
        this.$emit('changedptolegalcorrecto',this.legal_calle_dpto_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_dpto(value) {
        if(this.$props.obs_leal_departamento.length <= 2)
        {
            this.clase_text_area_calle_legal_dpto=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_dpto_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_dpto_calle=  'text-red-500 text-xs italic';
            this.obs_calle_dpto_legal_valido_local = false;
            this.$emit('changeobsdptolegalvalido',false);
            
        }
        if(this.$props.obs_leal_departamento.length >= 50)
        {
            this.clase_text_area_calle_legal_dpto =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_dpto_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_dpto_calle=  'text-red-500 text-xs italic';
            this.obs_calle_dpto_legal_valido_local = false;
            this.$emit('changeobsdptolegalvalido',false);
        }
        if( this.$props.obs_leal_departamento !== '' && this.$props.obs_leal_departamento.length <= 30 && this.$props.obs_leal_departamento.length >= 3)
        {
            this.clase_text_area_calle_legal_dpto=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_dpto_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_dpto_calle=  'text-green-500 text-xs italic';
            this.obs_calle_dpto_legal_valido_local = false;
            this.$emit('changeobsdptolegalvalido',true);
            
        }
        this.$emit('changeobsrdptolegal',this.$props.obs_leal_departamento)
    },
    cambio_input_calle_dpto_legal(){
        if(this.leal_departamento.length <= 4)
        {
            this.clase_de_input_calle_dpto_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalledpto= 'text-red-500 text-xs italic';
            this.calle_dpto_legal_valido_local = false;
        }
        if(this.leal_departamento.length >= 40)
        {
            this.clase_de_input_calle_dpto_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalledpto=  'text-red-500 text-xs italic';
            this.calle_dpto_legal_valido_local = false;
        }
        if( this.leal_departamento !== '' && this.leal_departamento.length <= 30 && this.leal_departamento.length >= 3)
        {
            this.clase_de_input_calle_dpto_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto =  'Valor Correcto';
            this.clase_cartel_nota_legalcalledpto =  'text-green-500 text-xs italic';
            this.calle_dpto_legal_valido_local = true;
        }
        this.$emit('changedptolegalvalido',this.calle_dpto_legal_valido_local);
        this.$emit('changevalordptolegal',this.leal_departamento);
     }
  },
};
</script>