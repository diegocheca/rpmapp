<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        for="leal_numero"
        >{{label}}</label>
        <div class="flex items-stretch w-full mb-4 relative">
            <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <img src="http://localhost:8000/svg/numstreet.svg">
                </span>
            </div>
            <input 
            type="text" 
            maxlength="30"
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
            placeholder="Núumero de calle"
            id="leal_numero"
            name="leal_numero"
            v-model="leal_numero"
            v-bind:class=clase_de_input_calle_num_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_num_legal($event.target.value)" 
            >
        </div>
        <p v-bind:class=clase_cartel_nota_legalcallenum>{{cartel_nota_legalcallenum}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio  h-5 w-5 text-green-600" name="accountTypenum_calle" v-model="leal_numero_correcto" value="true" v-on:change="actaulizar_variable_legalcallenum(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio  h-5 w-5 text-red-600" name="accountTypenum_calle" v-model="leal_numero_correcto" value="false" v-on:change="actaulizar_variable_legalcallenum(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio  h-5 w-5 text-indigo-600" name="accountTypenum_calle" v-model="leal_numero_correcto" value="nada" v-on:change="actaulizar_variable_legalcallenum('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_num_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_leal_numero"
                    >Observación:</label
                >
                <textarea
                    id="obs_leal_numero"
                    name="obs_leal_numero"
                    v-model="obs_leal_numero"
                    v-bind:class=clase_text_area_calle_legal_num
                    @input="actaulizar_contenido_text_area_calle_legal_num($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_num_calle>{{cartel_nota_evaluacion_num_calle}}</p>
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
                   -- nombre calle:{{leal_numero}}--
                    --nombre calle Valido:{{leal_numero_valido}}--
                    --nombre calle Valido local:{{calle_num_legal_valido_local}}--
                    
                    --nombre calle Evalaucion:{{leal_numero_correcto}}--
                    --nombre calle Obser:{{obs_leal_numero}}--
                    --nombre calle obsr Valido:{{obs_leal_numero_valido}}--
                    --Evaluacion {{evaluacion}}--
                    --{{cartel_nota_evaluacion_num_calle}}--
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'leal_numero', 
        'leal_numero_valido', 
        'leal_numero_correcto', 
        'obs_leal_numero', 
        'obs_leal_numero_valido',
        'evaluacion',
        'label',
        'testing',
    ],
  data() {
    return {
        clase_de_input_calle_num_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcallenum: 'Campo Correcto',
        clase_cartel_nota_legalcallenum: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal_num: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_num_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_num_calle: 'text-green-500 text-xs italic',
        calle_num_legal_valido_local: this.$props.leal_numero_valido,
        legal_calle_num_correcto_local: this.$props.leal_numero_correcto,
        obs_calle_num_legal_valido_local: this.$props.obs_leal_numero_valido,
        testing_hijo: false,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legalcallenum(valor) {
        this.legal_calle_num_correcto_local = valor;
        this.$emit('changenumlegalcorrecto',this.legal_calle_num_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal_num(value) {
        if(this.$props.obs_leal_numero.length <= 2)
        {
            this.clase_text_area_calle_legal_num=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_num_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_num_calle=  'text-red-500 text-xs italic';
            this.obs_calle_num_legal_valido_local = false;
            this.$emit('changeobsnumlegalvalido',false);
            
        }
        if(this.$props.obs_leal_numero.length >= 50)
        {
            this.clase_text_area_calle_legal_num =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_num_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_num_calle=  'text-red-500 text-xs italic';
            this.obs_calle_num_legal_valido_local = false;
            this.$emit('changeobsnumlegalvalido',false);
        }
        if( this.$props.obs_leal_numero !== '' && this.$props.obs_leal_numero.length <= 30 && this.$props.obs_leal_numero.length >= 3)
        {
            this.clase_text_area_calle_legal_num=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_num_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_num_calle=  'text-green-500 text-xs italic';
            this.obs_calle_num_legal_valido_local = false;
            this.$emit('changeobsnumlegalvalido',true);
            
        }
        this.$emit('changeobsnumlegal',this.$props.obs_leal_numero)
    },
    cambio_input_calle_num_legal(value){
        if(this.leal_numero.length <= 4)
        {
            this.clase_de_input_calle_num_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallenum= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcallenum= 'text-red-500 text-xs italic';
            this.calle_num_legal_valido_local = false;
        }
        if(this.leal_numero.length >= 40)
        {
            this.clase_de_input_calle_num_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallenum=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcallenum=  'text-red-500 text-xs italic';
            this.calle_num_legal_valido_local = false;
        }
        if( this.leal_numero !== '' && this.leal_numero.length <= 30 && this.leal_numero.length >= 3)
        {
            this.clase_de_input_calle_num_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcallenum =  'Valor Correcto';
            this.clase_cartel_nota_legalcallenum =  'text-green-500 text-xs italic';
            this.calle_num_legal_valido_local = true;
        }
        this.$emit('changenumlegalvalido',this.calle_num_legal_valido_local);
        this.$emit('changevalornumlegal',value);
     }
  },
};
</script>