<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_numero"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <div class="flex">
        <span
          class="
            flex
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
            items-center
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
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            />
          </svg>
        </span>
      </div>
      <input
        type="text"
        maxlength="30"
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
        placeholder="Número de calle"
        id="leal_numero"
        name="leal_numero"
        v-model="leal_numero"
        v-bind:class="clase_de_input_calle_num_legal"
        :disabled="evaluacion || $props.desactivar_legal_calle_num"
        @input="cambio_input_calle_num_legal($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_nota_legalcallenum">
      {{ cartel_nota_legalcallenum }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_calle_num_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_calle_num_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_numero_correcto"
              value="true"
              v-on:change="actaulizar_variable_legalcallenum(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_calle_num_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_numero_correcto"
              value="false"
              v-on:change="actaulizar_variable_legalcallenum(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_calle_num_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_numero_correcto"
              value="nada"
              v-on:change="actaulizar_variable_legalcallenum('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!legal_calle_num_correcto_local"
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
          for="obs_leal_numero"
          >Observación:</label
        >
        <textarea
          id="obs_leal_numero"
          name="obs_leal_numero"
          v-model="obs_leal_numero"
          v-bind:class="clase_text_area_calle_legal_num"
          :disabled="$props.desactivar_legal_calle_num_correccion"
          @input="
            actaulizar_contenido_text_area_calle_legal_num($event.target.value)
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_num_calle">
          {{ cartel_nota_evaluacion_num_calle }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="$props.desactivar_legal_calle_num_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_num_correcto_local"
        v-on:change_correcto="actaulizar_variable_legalcallenum($event)"
        :obs_observacion="observacion_num_calle"
        v-on:change_obs="actaulizar_contenido_text_area_calle_legal_num($event)"
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
          -- nombre calle:{{ leal_numero }}-- --nombre calle Valido:{{
            leal_numero_valido
          }}-- --nombre calle Valido local:{{ calle_num_legal_valido_local }}--
          --nombre calle Evalaucion:{{ leal_numero_correcto }}-- --nombre calle
          Obser:{{ obs_leal_numero }}-- --nombre calle obsr Valido:{{
            obs_leal_numero_valido
          }}-- --Evaluacion {{ evaluacion }}-- --{{
            cartel_nota_evaluacion_num_calle
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
    "titulo",
    "leal_numero",
    "leal_numero_valido",
    "leal_numero_correcto",
    "obs_leal_numero",
    "obs_leal_numero_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "desactivar_legal_calle_num",
    "mostrar_legal_calle_num_correccion",
    "desactivar_legal_calle_num_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_num_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcallenum: "",
      clase_cartel_nota_legalcallenum: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_num:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_num_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_num_calle: "text-green-500 text-xs italic",
      calle_num_legal_valido_local: this.$props.leal_numero_valido,
      legal_calle_num_correcto_local: this.$props.leal_numero_correcto,
      obs_calle_num_legal_valido_local: this.$props.obs_leal_numero_valido,
      observacion_num_calle: this.$props.obs_leal_numero,
      testing_hijo: false,
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_legalcallenum(valor) {
      this.legal_calle_num_correcto_local = valor;
      this.$emit("changenumlegalcorrecto", valor);
    },

    actaulizar_contenido_text_area_calle_legal_num(value) {
      this.observacion_num_calle = value;
      this.$emit("changeobsnumlegal", value);
      //   if (this.$props.obs_leal_numero.length <= 2) {
      //     this.clase_text_area_calle_legal_num =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_num_calle =
      //       "Observacion Incorrecta - debe ser mayor a 2 carcteres";
      //     this.clase_cartel_nota_evaluacion_num_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_num_legal_valido_local = false;
      //     this.$emit("changeobsnumlegalvalido", false);
      //   }
      //   if (this.$props.obs_leal_numero.length >= 50) {
      //     this.clase_text_area_calle_legal_num =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_num_calle =
      //       "Observacion Incorrecta - debe tener menos de 50 caracteres";
      //     this.clase_cartel_nota_evaluacion_num_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_num_legal_valido_local = false;
      //     this.$emit("changeobsnumlegalvalido", false);
      //   }
      //   if (
      //     this.$props.obs_leal_numero !== "" &&
      //     this.$props.obs_leal_numero.length <= 30 &&
      //     this.$props.obs_leal_numero.length >= 3
      //   ) {
      //     this.clase_text_area_calle_legal_num =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_num_calle = "Observacion Correcta";
      //     this.clase_cartel_nota_evaluacion_num_calle =
      //       "text-green-500 text-xs italic";
      //     this.obs_calle_num_legal_valido_local = false;
      //     this.$emit("changeobsnumlegalvalido", true);
      //   }
    },
    cambio_input_calle_num_legal(value) {
      if (this.leal_numero.length <= 4) {
        this.clase_de_input_calle_num_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallenum =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_legalcallenum = "text-red-500 text-xs italic";
        this.calle_num_legal_valido_local = false;
      }
      if (this.leal_numero.length >= 40) {
        this.clase_de_input_calle_num_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallenum =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_legalcallenum = "text-red-500 text-xs italic";
        this.calle_num_legal_valido_local = false;
      }
      if (
        this.leal_numero !== "" &&
        this.leal_numero.length <= 30 &&
        this.leal_numero.length >= 3
      ) {
        this.clase_de_input_calle_num_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcallenum = "Valor Correcto";
        this.clase_cartel_nota_legalcallenum = "text-green-500 text-xs italic";
        this.calle_num_legal_valido_local = true;
      }
      this.$emit("changenumlegalvalido", this.calle_num_legal_valido_local);
      this.$emit("changevalornumlegal", value);
    },
  },
};
</script>