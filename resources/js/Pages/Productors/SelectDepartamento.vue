<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
        for="leal_departamento"
        >{{label}}</label>
        <div class="flex items-stretch w-full mb-4 relative">
            <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <img :src="$inertia.page.props.appName+'/svg/state.svg'">
                </span>
            </div>
            
            <select 
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
            id="leal_departamento_dos"
            name="leal_departamento_dos"
            v-model="leal_departamento"
            v-bind:class=clase_de_input_calle_dpto_legal
            :disabled="evaluacion || desactivar_legal_dpto"
            @input="cambio_input_calle_dpto_legal($event.target.value)" 
            >
            <option v-for="dpto in $props.lista_departamentos_dos" v-bind:key="dpto.id" :value="dpto.id">{{dpto.nombre}}</option>
            <option v-for="dpto in $props.lista_departamentos" v-bind:key="dpto.id" :value="dpto.id">{{dpto.nombre}}</option>
            </select>
        </div>
        <p v-bind:class=clase_cartel_nota_legalcalledpto>{{clacartel_nota_legalcalledpto}}.</p>
        <div class="flex" v-if="evaluacion || mostrar_legal_dpto_correccion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" :disabled="desactivar_legal_dpto_correccion" class="form-radio  h-5 w-5 text-green-600" :name="name_correcto" v-model="leal_departamento_correcto" value="true" v-on:change="cactaulizar_variable_legalcalledpto(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" :disabled="desactivar_legal_dpto_correccion" class="form-radio  h-5 w-5 text-red-600" :name="name_correcto" v-model="leal_departamento_correcto" value="false" v-on:change="cactaulizar_variable_legalcalledpto(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" :disabled="desactivar_legal_dpto_correccion" class="form-radio  h-5 w-5 text-indigo-600" :name="name_correcto" v-model="leal_departamento_correcto" value="nada" v-on:change="cactaulizar_variable_legalcalledpto('nada')">
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
                    :disabled="desactivar_legal_dpto_correccion" 
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
                    {{lista_departamentos}}
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
        'name_correcto',
        'label',
        'lista_departamentos',
        'lista_departamentos_dos',
        'desactivar_legal_dpto',
        'mostrar_legal_dpto_correccion',
        'desactivar_legal_dpto_correccion',
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
        nueva_lista_dptos: this.$props.lista_departamentos_dos,
        //border-green-500
    }; 
  },
  methods:{
    cargar_dptos() {
        let self = this;
        console.log("la lista dos:");
        console.log(self.$props.lista_departamentos_dos);
        /* if(this.$props.lista_departamentos_dos.length === 0)
            this.nueva_lista_dptos = this.$props.lista_departamentos;
        else  */  this.nueva_lista_dptos = this.$props.lista_departamentos_dos;
        console.log("la lista quedo en");
        console.log(this.nueva_lista_dptos);
    },
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
    cambio_input_calle_dpto_legal(value){
        /*if(this.leal_departamento.length <= 4)
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
        }*/
        //this.$emit('changedptolegalvalido',this.calle_dpto_legal_valido_local);
        
        this.$emit('changevalordptolegal',value);
     }
  },
    mounted() {
            this.cargar_dptos();
        }
};
</script>