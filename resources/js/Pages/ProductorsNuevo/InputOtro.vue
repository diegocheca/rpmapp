<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_otro"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <div class="flex">
        <span
          class="
            flex
            items-center
            leading-normal
            bg-grey-lighter
            border-1
            rounded-r-none
            border border-r-0 border-blue-300
            px-3
            whitespace-no-wrap
            text-grey-dark
            w-12
            h-10
            bg-blue-300
            justify-center
            text-xl
            rounded-lg
            text-white
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
            />
          </svg>
        </span>
      </div>
      <input
        type="text"
        maxlength="40"
        class="
          flex-shrink flex-grow flex-auto
          leading-normal
          w-px
          border border-l-0
          h-10
          border-grey-light
          rounded-lg rounded-l-none
          px-3
          relative
          focus:border-blue focus:shadow
        "
        placeholder="Otro Dato del domicilio"
        id="leal_otro"
        name="leal_otro"
        v-model="leal_otro"
        v-bind:class="clase_de_input_calle_otro_legal"
        :disabled="evaluacion || desactivar_legal_otro"
        @input="cambio_input_calle_otro_legal($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_nota_legalcalleotro">
      {{ cartel_nota_legalcalle_otro }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_otro_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_legal_otro_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_otro_correcto"
              value="true"
              v-on:change="actaulizar_variable_legalcalle_otro(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_otro_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_otro_correcto"
              value="false"
              v-on:change="actaulizar_variable_legalcalle_otro(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_otro_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_otro_correcto"
              value="nada"
              v-on:change="actaulizar_variable_legalcalle_otro('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!legal_calle_otro_correcto_local"
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
          for="obs_leal_otro"
          >Observación:</label
        >
        <textarea
          id="obs_leal_otro"
          name="obs_leal_otro"
          v-model="obs_leal_otro"
          :disabled="desactivar_legal_otro_correccion"
          v-bind:class="clase_text_area_calle_legal_otro"
          @input="
            actaulizar_contenido_text_area_calle_legal_otro($event.target.value)
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_otro_calle">
          {{ cartel_nota_evaluacion_otro_calle }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_legal_otro_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_otro_correcto_local"
        v-on:change_correcto="actaulizar_variable_legalcalle_otro($event)"
        :obs_observacion="observacion_otro_dato"
        v-on:change_obs="
          actaulizar_contenido_text_area_calle_legal_otro($event)
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
          -- otro calle:{{ leal_otro }}-- --otro calle Valido:{{
            leal_otro_valido
          }}-- --otro calle Valido local:{{
            calle_localidad_legal_valido_otro
          }}-- --otro calle Evalaucion:{{ leal_otro_correcto }}-- --otro calle
          Obser:{{ obs_leal_otro }}-- --otro calle obsr Valido:{{
            obs_leal_otro_valido
          }}-- --Evaluacion {{ evaluacion }}-- --{{
            cartel_nota_evaluacion_otro_calle
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
    "leal_otro",
    "leal_otro_valido",
    "leal_otro_correcto",
    "obs_leal_otro",
    "obs_leal_otro_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "desactivar_legal_otro",
    "mostrar_legal_otro_correccion",
    "desactivar_legal_otro_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_otro_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcalle_otro: "",
      clase_cartel_nota_legalcalleotro: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_otro:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_otro_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_otro_calle: "text-green-500 text-xs italic",
      calle_localidad_legal_valido_otro: this.$props.leal_otro_valido,
      legal_calle_otro_correcto_local: this.$props.leal_otro_correcto,
      obs_calle_localidad_legal_valido_otro: this.$props.obs_leal_otro_valido,
      observacion_otro_dato: this.$props.obs_leal_otro,
      testing_hijo: false,
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_legalcalle_otro(valor) {
      this.legal_calle_otro_correcto_local = valor;
      this.$emit("changeotrolegalcorrecto", valor);
    },

    actaulizar_contenido_text_area_calle_legal_otro(value) {
      this.observacion_otro_dato = value;
      this.$emit("changeobsotrolegal", value);
      //   if (this.$props.obs_leal_otro.length <= 2) {
      //     this.clase_text_area_calle_legal_otro =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_otro_calle =
      //       "Observacion Incorrecta - debe ser mayor a 2 carcteres";
      //     this.clase_cartel_nota_evaluacion_otro_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_localidad_legal_valido_otro = false;
      //     this.$emit("changeobsotrolegalvalido", false);
      //   }
      //   if (this.$props.obs_leal_otro.length >= 50) {
      //     this.clase_text_area_calle_legal_otro =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_otro_calle =
      //       "Observacion Incorrecta - debe tener menos de 50 caracteres";
      //     this.clase_cartel_nota_evaluacion_otro_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_localidad_legal_valido_otro = false;
      //     this.$emit("changeobsotrolegalvalido", false);
      //   }
      //   if (
      //     this.$props.obs_leal_otro !== "" &&
      //     this.$props.obs_leal_otro.length <= 30 &&
      //     this.$props.obs_leal_otro.length >= 3
      //   ) {
      //     this.clase_text_area_calle_legal_otro =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_otro_calle = "Observacion Correcta";
      //     this.clase_cartel_nota_evaluacion_otro_calle =
      //       "text-green-500 text-xs italic";
      //     this.obs_calle_localidad_legal_valido_otro = false;
      //     this.$emit("changeobsotrolegalvalido", true);
      //   }
    },
    cambio_input_calle_otro_legal() {
      if (this.leal_otro.length <= 4) {
        this.clase_de_input_calle_otro_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalle_otro =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_legalcalleotro = "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_otro = false;
      }
      if (this.leal_otro.length >= 40) {
        this.clase_de_input_calle_otro_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalle_otro =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_legalcalleotro = "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_otro = false;
      }
      if (
        this.leal_otro !== "" &&
        this.leal_otro.length <= 30 &&
        this.leal_otro.length >= 3
      ) {
        this.clase_de_input_calle_otro_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalle_otro = "Valor Correcto";
        this.clase_cartel_nota_legalcalleotro = "text-green-500 text-xs italic";
        this.calle_localidad_legal_valido_otro = true;
      }
      this.$emit(
        "changeotrolegalvalido",
        this.calle_localidad_legal_valido_otro
      );
      this.$emit("changevalorotrolegal", this.leal_otro);
    },
  },
};
</script>