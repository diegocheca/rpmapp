<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_departamento"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <!-- <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                </span>
            </div> -->
      <select
        class="
          flex-shrink flex-grow flex-auto
          leading-normal
          w-px
          border border-grey-light
          rounded
          px-3
          relative
          focus:border-blue focus:shadow
        "
        id="leal_departamento_dos"
        name="leal_departamento_dos"
        v-model="leal_departamento"
        v-bind:class="clase_de_input_calle_dpto_legal"
        :disabled="evaluacion || desactivar_legal_dpto"
        @input="cambio_input_calle_dpto_legal($event.target.value)"
      >
        <option
          v-for="dpto in $props.lista_departamentos_dos"
          v-bind:key="dpto.id"
          :value="dpto.id"
        >
          {{ dpto.nombre }}
        </option>
        <option
          v-for="dpto in $props.lista_departamentos"
          v-bind:key="dpto.id"
          :value="dpto.id"
        >
          {{ dpto.nombre }}
        </option>
      </select>
    </div>
    <p v-bind:class="clase_cartel_nota_legalcalledpto">
      {{ clacartel_nota_legalcalledpto }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_dpto_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_legal_dpto_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_departamento_correcto"
              value="true"
              v-on:change="cactaulizar_variable_legalcalledpto(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_dpto_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_departamento_correcto"
              value="false"
              v-on:change="cactaulizar_variable_legalcalledpto(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_dpto_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_departamento_correcto"
              value="nada"
              v-on:change="cactaulizar_variable_legalcalledpto('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!legal_calle_dpto_correcto_local"
        class="w-full md:w-2/3 px-3"
      >
        <label
          class="
            block
            uppercase
            tracking-wide
            text-gray-700 text-xs
            font-bold
            mb-2
          "
          for="obs_leal_departamento"
          >Observación:</label
        >
        <textarea
          id="obs_leal_departamento"
          name="obs_leal_departamento"
          v-model="obs_leal_departamento"
          :disabled="desactivar_legal_dpto_correccion"
          v-bind:class="clase_text_area_calle_legal_dpto"
          @input="
            actaulizar_contenido_text_area_calle_legal_dpto($event.target.value)
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_dpto_calle">
          {{ cartel_nota_evaluacion_dpto_calle }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="$props.desactivar_legal_dpto_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_dpto_correcto_local"
        v-on:change_correcto="cactaulizar_variable_legalcalledpto($event)"
        :obs_observacion="observacion_dep"
        v-on:change_obs="
          actaulizar_contenido_text_area_calle_legal_dpto($event)
        "
      >
      </SeccionEvaluacion>
    </div>
    <div
      class="w-full md:w-1/4 px-3 bg-white rounded shadow p-6 m-8"
      v-show="testing"
    >
      <div class="flex">
        <label
          class="flex items-center relative w-max cursor-pointer select-none"
        >
          <br />
          <span class="text-lg font-bold mr-3">Testing hijo</span>
          <br />
          <input
            type="checkbox"
            class="
              appearance-none
              transition-colors
              cursor-pointer
              w-14
              h-7
              rounded-full
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-offset-black
              focus:ring-blue-500
              bg-red-500
            "
            v-model="testing_hijo"
          />
          <span
            class="absolute font-medium text-xs uppercase right-1 text-white"
          >
            Sin
          </span>
          <span
            class="absolute font-medium text-xs uppercase right-8 text-white"
          >
            Con
          </span>
          <span
            class="
              w-7
              h-7
              right-7
              absolute
              rounded-full
              transform
              transition-transform
              bg-gray-200
            "
          />
        </label>
      </div>
      <div class="flex">
        <div v-show="testing_hijo">
          {{ lista_departamentos }}
          -- depto calle:{{ leal_departamento }}-- --depto calle Valido:{{
            leal_departamento_valido
          }}-- --depto calle Valido local:{{ calle_dpto_legal_valido_local }}--
          --depto calle Evalaucion:{{ leal_departamento_correcto }}-- --depto
          calle Obser:{{ obs_leal_departamento }}-- --depto calle obsr Valido:{{
            obs_leal_departamento_valido
          }}-- --Evaluacion {{ evaluacion }}-- --{{
            cartel_nota_evaluacion_dpto_calle
          }}--
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SeccionEvaluacion from "@/Components/SeccionEvaluacion";

export default {
  components: {
    SeccionEvaluacion,
  },
  props: [
    "leal_departamento",
    "leal_departamento_valido",
    "leal_departamento_correcto",
    "obs_leal_departamento",
    "obs_leal_departamento_valido",
    "evaluacion",
    "testing",
    "name_correcto",
    "label",
    "lista_departamentos",
    "lista_departamentos_dos",
    "desactivar_legal_dpto",
    "mostrar_legal_dpto_correccion",
    "desactivar_legal_dpto_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_dpto_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      clacartel_nota_legalcalledpto: "",
      clase_cartel_nota_legalcalledpto: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_dpto:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_dpto_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_dpto_calle: "text-green-500 text-xs italic",
      calle_dpto_legal_valido_local: this.$props.leal_departamento_valido,
      legal_calle_dpto_correcto_local: this.$props.leal_departamento_correcto,
      obs_calle_dpto_legal_valido_local:
        this.$props.obs_leal_departamento_valido,
      observacion_dep: this.$props.obs_leal_departamento,
      testing_hijo: false,
      nueva_lista_dptos: this.$props.lista_departamentos_dos,
      //border-green-500
    };
  },
  methods: {
    cargar_dptos() {
      let self = this;
      // console.log("la lista dos:");
      // console.log(self.$props.lista_departamentos_dos);
      /* if(this.$props.lista_departamentos_dos.length === 0)
            this.nueva_lista_dptos = this.$props.lista_departamentos;
        else  */ this.nueva_lista_dptos = this.$props.lista_departamentos_dos;
      // console.log("la lista quedo en");
      // console.log(this.nueva_lista_dptos);
    },
    cactaulizar_variable_legalcalledpto(valor) {
      this.legal_calle_dpto_correcto_local = valor;
      this.$emit(
        "changedptolegalcorrecto",
        this.legal_calle_dpto_correcto_local
      );
    },

    actaulizar_contenido_text_area_calle_legal_dpto(value) {
      this.observacion_dep = value;
      this.$emit("changeobsrdptolegal", this.observacion_dep);
    },
    cambio_input_calle_dpto_legal(value) {
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

      this.$emit("changevalordptolegal", value);
    },
  },
  mounted() {
    this.cargar_dptos();
  },
};
</script>