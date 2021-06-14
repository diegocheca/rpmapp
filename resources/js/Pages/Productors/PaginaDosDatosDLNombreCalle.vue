<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="leal_calle"
            >Nombre de Calle comp:</label
        >
        <input
            id="leal_calle"
            name="leal_calle"
            v-model="leal_calle"
            v-bind:class=clase_de_input_calle_legal
            :disabled="evaluacion"
            @input="cambio_input_calle_legal($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_nota_legalcalle>{{cartel_nota_legalcalle}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="nombre_calle_legal_correcto" value="true" v-on:change="actaulizar_variable_legalcalle(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="nombre_calle_legal_correcto" value="false" v-on:change="actaulizar_variable_legalcalle(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="nombre_calle_legal_correcto" value="nada" v-on:change="actaulizar_variable_legalcalle('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!legal_calle_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="obs_nombre_calle_legal"
                    >Observación:</label
                >
                <textarea
                    id="obs_nombre_calle_legal"
                    name="obs_nombre_calle_legal"
                    v-model="obs_nombre_calle_legal"
                    v-bind:class=clase_text_area_calle_legal
                    @input="actaulizar_contenido_text_area_calle_legal($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_cartel_nota_evaluacion_nom_calle>{{cartel_nota_evaluacion_nom_calle}}</p>
            </div>
        </div>
        -- nombre calle:{{leal_calle}}--
        --nombre calle Valido:{{nombre_calle_legal_valido}}--
        --nombre calle Valido local:{{calle_legal_valido_local}}--
        
        --nombre calle Evalaucion:{{nombre_calle_legal_correcto}}--
        --nombre calle Obser:{{obs_nombre_calle_legal}}--
        --nombre calle obsr Valido:{{obs_nombre_calle_legal_valido}}--
        --Evaluacion {{evaluacion}}--
        --{{cartel_nota_evaluacion_nom_calle}}--
    </div>
</template>

<script>
export default {
    props: [
        'leal_calle', 
        'nombre_calle_legal_valido', 
        'nombre_calle_legal_correcto', 
        'obs_nombre_calle_legal', 
        'obs_nombre_calle_legal_valido',
        'evaluacion',
    ],
  data() {
    return {
        clase_de_input_calle_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_legalcalle: 'Campo Correcto',
        clase_cartel_nota_legalcalle: 'text-green-500 text-xs italic',
        clase_text_area_calle_legal: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        cartel_nota_evaluacion_nom_calle: 'Observacion Correcta',
        clase_cartel_nota_evaluacion_nom_calle: 'text-green-500 text-xs italic',
        calle_legal_valido_local: this.$props.nombre_calle_legal_valido,
        legal_calle_correcto_local: this.$props.nombre_calle_legal_correcto,
        obs_calle_legal_valido_local: this.$props.obs_nombre_calle_legal_valido,
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_legalcalle(valor) {
        this.legal_calle_correcto_local = valor;
        this.$emit('changenombrecallecorrecto',this.legal_calle_correcto_local);
    },
     
      actaulizar_contenido_text_area_calle_legal(value) {
        if(this.$props.obs_nombre_calle_legal.length <= 2)
        {
            this.clase_text_area_calle_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_nom_calle=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_cartel_nota_evaluacion_nom_calle=  'text-red-500 text-xs italic';
            this.obs_calle_legal_valido_local = false;
            this.$emit('changeobsnombrecallevalido',false);
            
        }
        if(this.$props.obs_nombre_calle_legal.length >= 50)
        {
            this.clase_text_area_calle_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_nom_calle=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_cartel_nota_evaluacion_nom_calle=  'text-red-500 text-xs italic';
            this.obs_calle_legal_valido_local = false;
            this.$emit('changeobsnombrecallevalido',false);
        }
        if( this.$props.obs_nombre_calle_legal !== '' && this.$props.obs_nombre_calle_legal.length <= 30 && this.$props.obs_nombre_calle_legal.length >= 3)
        {
            this.clase_text_area_calle_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_evaluacion_nom_calle=  'Observacion Correcta';
            this.clase_cartel_nota_evaluacion_nom_calle=  'text-green-500 text-xs italic';
            this.obs_calle_legal_valido_local = false;
            this.$emit('changeobsnombrecallevalido',true);
            
        }
        this.$emit('changeobsnombrecalle',this.$props.obs_nombre_calle_legal)
    },
    cambio_input_calle_legal(){
        if(this.leal_calle.length <= 4)
        {
            this.clase_de_input_calle_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalle= 'text-red-500 text-xs italic';
            this.calle_legal_valido_local = false;
        }
        if(this.leal_calle.length >= 40)
        {
            this.clase_de_input_calle_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalle=  'text-red-500 text-xs italic';
            this.calle_legal_valido_local = false;
        }
        if( this.leal_calle !== '' && this.leal_calle.length <= 30 && this.leal_calle.length >= 3)
        {
            this.clase_de_input_calle_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.cartel_nota_legalcalle =  'Valor Correcto';
            this.clase_cartel_nota_legalcalle =  'text-green-500 text-xs italic';
            this.calle_legal_valido_local = true;
        }
        this.$emit('changenombrecallevalido',this.calle_legal_valido_local);
        this.$emit('changevalornombrecalle',this.leal_calle);
        









     }
  },
};
</script>