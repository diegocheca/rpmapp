<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_cp"
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
            text-grey-dark text-sm
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
              d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"
            />
          </svg>
        </span>
      </div>
      <input
        type="text"
        maxlength="8"
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
        placeholder="Cod Postal"
        id="leal_cp"
        name="leal_cp"
        v-model="leal_cp"
        v-bind:class="clase_de_input_calle_cp_legal"
        :disabled="evaluacion || desactivar_legal_cod_pos"
        @input="cambio_input_calle_cp_legal($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_nota_legal_cp">{{ cartel_nota_legal_cp }}.</p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_cod_pos_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_legal_cod_pos_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_cp_correcto"
              value="true"
              v-on:change="actaulizar_variable_legal_cp(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_cod_pos_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_cp_correcto"
              value="false"
              v-on:change="actaulizar_variable_legal_cp(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_legal_cod_pos_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_cp_correcto"
              value="nada"
              v-on:change="actaulizar_variable_legal_cp('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div v-show="!legal_calle_cp_correcto_local" class="w-full md:w-2/3 px-3">
        <label
          class="
            block
            uppercase
            tracking-wide
            text-gray-700 text-xs
            font-bold
            mb-2
          "
          for="obs_leal_cp"
          >Observación:</label
        >
        <textarea
          id="obs_leal_cp"
          name="obs_leal_cp"
          v-model="obs_leal_cp"
          :disabled="desactivar_legal_cod_pos_correccion"
          v-bind:class="clase_text_area_calle_legal_cp"
          @input="
            actaulizar_contenido_text_area_calle_legal_cp($event.target.value)
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_cp_calle">
          {{ cartel_nota_evaluacion_cp_calle }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_legal_cod_pos_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_cp_correcto_local"
        v-on:change_correcto="actaulizar_variable_legal_cp($event)"
        :obs_observacion="observacion_cod_postal"
        v-on:change_obs="actaulizar_contenido_text_area_calle_legal_cp($event)"
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
          -- co calle:{{ leal_cp }}-- --co calle Valido:{{ leal_cp_valido }}--
          --co calle Valido local:{{ calle_localidad_legal_valido_cp }}-- --co
          calle Evalaucion:{{ leal_cp_correcto }}-- --co calle Obser:{{
            obs_leal_cp
          }}-- --co calle obsr Valido:{{ obs_leal_cp_valido }}-- --Evaluacion
          {{ evaluacion }}-- --{{ cartel_nota_evaluacion_cp_calle }}--
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
    "leal_cp",
    "leal_cp_valido",
    "leal_cp_correcto",
    "obs_leal_cp",
    "obs_leal_cp_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "desactivar_legal_cod_pos",
    "mostrar_legal_cod_pos_correccion",
    "desactivar_legal_cod_pos_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_cp_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legal_cp: "",
      clase_cartel_nota_legal_cp: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_cp:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_cp_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_cp_calle: "text-green-500 text-xs italic",
      calle_localidad_legal_valido_cp: this.$props.leal_cp_valido,
      legal_calle_cp_correcto_local: this.$props.leal_cp_correcto,
      obs_calle_cp_legal_valido_local: this.$props.obs_leal_cp_valido,
      observacion_cod_postal: this.$props.obs_leal_cp,
      testing_hijo: false,
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_legal_cp(valor) {
      this.legal_calle_cp_correcto_local = valor;
      this.$emit("changecplegalcorrecto", this.legal_calle_cp_correcto_local);
    },

    actaulizar_contenido_text_area_calle_legal_cp(value) {
        this.observacion_cod_postal= value;
        this.$emit("changeobsrcplegal", value);
    //   if (this.$props.obs_leal_cp.length <= 2) {
    //     this.clase_text_area_calle_legal_cp =
    //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
    //     this.cartel_nota_evaluacion_cp_calle =
    //       "Observacion Incorrecta - debe ser mayor a 2 carcteres";
    //     this.clase_cartel_nota_evaluacion_cp_calle =
    //       "text-red-500 text-xs italic";
    //     this.obs_calle_cp_legal_valido_local = false;
    //     this.$emit("changeobscplegalvalido", false);
    //   }
    //   if (this.$props.obs_leal_cp.length >= 50) {
    //     this.clase_text_area_calle_legal_cp =
    //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
    //     this.cartel_nota_evaluacion_cp_calle =
    //       "Observacion Incorrecta - debe tener menos de 50 caracteres";
    //     this.clase_cartel_nota_evaluacion_cp_calle =
    //       "text-red-500 text-xs italic";
    //     this.obs_calle_cp_legal_valido_local = false;
    //     this.$emit("changeobscplegalvalido", false);
    //   }
    //   if (
    //     this.$props.obs_leal_cp !== "" &&
    //     this.$props.obs_leal_cp.length <= 30 &&
    //     this.$props.obs_leal_cp.length >= 3
    //   ) {
    //     this.clase_text_area_calle_legal_cp =
    //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
    //     this.cartel_nota_evaluacion_cp_calle = "Observacion Correcta";
    //     this.clase_cartel_nota_evaluacion_cp_calle =
    //       "text-green-500 text-xs italic";
    //     this.obs_calle_cp_legal_valido_local = false;
    //     this.$emit("changeobscplegalvalido", true);
    //   }
    },
    cambio_input_calle_cp_legal() {
      if (this.leal_cp.length <= 4) {
        this.clase_de_input_calle_cp_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legal_cp =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_legal_cp = "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_cp = false;
      }
      if (this.leal_cp.length >= 9) {
        this.clase_de_input_calle_cp_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legal_cp =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_legal_cp = "text-red-500 text-xs italic";
        this.calle_localidad_legal_valido_cp = false;
      }
      if (
        this.leal_cp !== "" &&
        this.leal_cp.length <= 8 &&
        this.leal_cp.length >= 3
      ) {
        this.clase_de_input_calle_cp_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legal_cp = "Valor Correcto";
        this.clase_cartel_nota_legal_cp = "text-green-500 text-xs italic";
        this.calle_localidad_legal_valido_cp = true;
      }
      this.$emit("changecplegalvalido", this.calle_localidad_legal_valido_cp);
      this.$emit("changevalorcplegal", this.leal_cp);
    },
  },
};
</script>