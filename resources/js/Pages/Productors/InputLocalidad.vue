<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_localidad"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <!-- <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                </span>
            </div> -->
      <input
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
        type="text"
        placeholder="Localidad del Domicilio"
        id="leal_localidad"
        name="leal_localidad"
        v-model="leal_localidad"
        v-bind:class="clase_de_input_calle_localidad_legal"
        :disabled="evaluacion || desactivar_legal_localidad"
        @input="cambio_input_calle_localidad_legal($event.target.value)"
      />
      <!-- <p v-bind:class="clase_cartel_nota_legalcallelocalidad">
        {{ cartel_nota_legalcallelocal }}.
      </p> -->
    </div>
    <p v-bind:class="clase_cartel_nota_legalcallelocalidad">
      {{ cartel_nota_legalcallelocal }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_localidad_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_legal_localidad_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_localidad_correcto"
              value="true"
              v-on:change="actaulizar_variable_legalcallelocalidad(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_localidad_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_localidad_correcto"
              value="false"
              v-on:change="actaulizar_variable_legalcallelocalidad(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_localidad_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_localidad_correcto"
              value="nada"
              v-on:change="actaulizar_variable_legalcallelocalidad('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!legal_calle_localidad_correcto_local"
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
          for="obs_leal_localidad"
          >Observación:</label
        >
        <textarea
          id="obs_leal_localidad"
          name="obs_leal_localidad"
          v-model="obs_leal_localidad"
          :disabled="desactivar_legal_localidad_correccion"
          v-bind:class="clase_text_area_calle_legal_localidad"
          @input="
            actaulizar_contenido_text_area_calle_legal_localidad(
              $event.target.value
            )
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_localidad_calle">
          {{ cartel_nota_evaluacion_localidad_calle }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_legal_localidad_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_localidad_correcto_local"
        v-on:change_correcto="actaulizar_variable_legalcallelocalidad($event)"
        :obs_observacion="observacion_loc"
        v-on:change_obs="
          actaulizar_contenido_text_area_calle_legal_localidad($event)
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
          -- localidad calle:{{ leal_localidad }}-- --localidad calle Valido:{{
            leal_localidad_valido
          }}-- --localidad calle Valido local:{{
            calle_localidad_legal_valido_local
          }}-- --localidad calle Evalaucion:{{ leal_localidad_correcto }}--
          --localidad calle Obser:{{ obs_leal_localidad }}-- --localidad calle
          obsr Valido:{{ obs_leal_localidad_valido }}-- --Evaluacion
          {{ evaluacion }}-- --{{ cartel_nota_evaluacion_localidad_calle }}--
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
    "leal_localidad",
    "leal_localidad_valido",
    "leal_localidad_correcto",
    "obs_leal_localidad",
    "obs_leal_localidad_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "desactivar_legal_localidad",
    "mostrar_legal_localidad_correccion",
    "desactivar_legal_localidad_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_localidad_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcallelocal: "",
      clase_cartel_nota_legalcallelocalidad: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_localidad:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_localidad_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_localidad_calle:
        "text-green-500 text-xs italic",
      calle_localidad_legal_valido_local: this.$props.leal_localidad_valido,
      legal_calle_localidad_correcto_local: this.$props.leal_localidad_correcto,
      observacion_loc: this.$props.obs_leal_localidad,

      testing_hijo: false,
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_legalcallelocalidad(valor) {
      this.legal_calle_localidad_correcto_local = valor;
      this.$emit(
        "changelocalidadlegalcorrecto",
        this.legal_calle_localidad_correcto_local
      );
    },

    actaulizar_contenido_text_area_calle_legal_localidad(value) {
      this.observacion_loc = value;
      this.$emit("changeobsrlocalidadlegal",value);
    },
    cambio_input_calle_localidad_legal(value) {
      if (this.leal_localidad.length <= 4) {
        this.clase_de_input_calle_localidad_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallelocal =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_legalcallelocalidad =
          "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_local = false;
      }
      if (this.leal_localidad.length >= 40) {
        this.clase_de_input_calle_localidad_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallelocal =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_legalcallelocalidad =
          "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_local = false;
      }
      if (
        this.leal_localidad !== "" &&
        this.leal_localidad.length <= 30 &&
        this.leal_localidad.length >= 3
      ) {
        this.clase_de_input_calle_localidad_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallelocal = "Valor Correcto";
        this.clase_cartel_nota_legalcallelocalidad =
          "text-green-500 text-xs italic";
        this.calle_localidad_legal_valido_local = true;
      }
      this.$emit(
        "changelocalidadlegalvalido",
        this.calle_localidad_legal_valido_local
      );
      this.$emit("changevalorlocalidadlegal", value);
    },
  },
};
</script>