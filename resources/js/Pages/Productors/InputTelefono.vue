<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_telefono"
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
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
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
        placeholder="Teléfono de domicilio"
        id="leal_telefono"
        name="leal_telefono"
        v-model="leal_telefono"
        v-bind:class="clase_de_input_calle_tel_legal"
        :disabled="evaluacion || $props.desactivar_legal_telefono"
        @input="cambio_input_calle_tel_legal($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_nota_legalcalletel">
      {{ cartel_nota_legalcalletel }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_telefono_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <SeccionEvaluacion
        :correccion_desactivar="$props.desactivar_legal_telefono_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_tel_correcto_local"
        v-on:change_correcto="actaulizar_variable_legalcalletel($event)"
        :obs_observacion="observacion_telefono"
        v-on:change_obs="actaulizar_contenido_text_area_calle_legal_tel($event)"
      >
      </SeccionEvaluacion>
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
    "leal_telefono",
    "leal_telefono_valido",
    "leal_telefono_correcto",
    "obs_leal_telefono",
    "obs_leal_telefono_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "desactivar_legal_telefono",
    "mostrar_legal_telefono_correccion",
    "desactivar_legal_telefono_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_tel_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcalletel: "",
      clase_cartel_nota_legalcalletel: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_tel:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_tel_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_tel_calle: "text-green-500 text-xs italic",
      calle_tel_legal_valido_local: this.$props.leal_telefono_valido,
      legal_calle_tel_correcto_local: this.$props.leal_telefono_correcto,
      obs_calle_tel_legal_valido_local: this.$props.obs_leal_telefono_valido,
      observacion_telefono: this.$props.obs_leal_telefono,
      testing_hijo: false,
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_legalcalletel(valor) {
      this.legal_calle_tel_correcto_local = valor;
      this.$emit("changetellegalcorrecto", this.legal_calle_tel_correcto_local);
    },

    actaulizar_contenido_text_area_calle_legal_tel(value) {
      this.observacion_telefono = value;
      this.$emit("changeobstellegal", this.observacion_telefono);
      //   if (this.$props.obs_leal_telefono.length <= 2) {
      //     this.clase_text_area_calle_legal_tel =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_tel_calle =
      //       "Observacion Incorrecta - debe ser mayor a 2 carcteres";
      //     this.clase_cartel_nota_evaluacion_tel_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_tel_legal_valido_local = false;
      //     this.$emit("changeobstellegalvalido", false);
      //   }
      //   if (this.$props.obs_leal_telefono.length >= 50) {
      //     this.clase_text_area_calle_legal_tel =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_tel_calle =
      //       "Observacion Incorrecta - debe tener menos de 50 caracteres";
      //     this.clase_cartel_nota_evaluacion_tel_calle =
      //       "text-red-500 text-xs italic";
      //     this.obs_calle_tel_legal_valido_local = false;
      //     this.$emit("changeobstellegalvalido", false);
      //   }
      //   if (
      //     this.$props.obs_leal_telefono !== "" &&
      //     this.$props.obs_leal_telefono.length <= 30 &&
      //     this.$props.obs_leal_telefono.length >= 3
      //   ) {
      //     this.clase_text_area_calle_legal_tel =
      //       "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
      //     this.cartel_nota_evaluacion_tel_calle = "Observacion Correcta";
      //     this.clase_cartel_nota_evaluacion_tel_calle =
      //       "text-green-500 text-xs italic";
      //     this.obs_calle_tel_legal_valido_local = false;
      //     this.$emit("changeobstellegalvalido", true);
      //   }
    },
    cambio_input_calle_tel_legal() {
      if (this.leal_telefono.length <= 4) {
        this.clase_de_input_calle_tel_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalletel =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_legalcalletel = "text-red-500 text-xs italic";
        this.calle_tel_legal_valido_local = false;
      }
      if (this.leal_telefono.length >= 40) {
        this.clase_de_input_calle_tel_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalletel =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_legalcalletel = "text-red-500 text-xs italic";
        this.calle_tel_legal_valido_local = false;
      }
      if (
        this.leal_telefono !== "" &&
        this.leal_telefono.length <= 30 &&
        this.leal_telefono.length >= 3
      ) {
        this.clase_de_input_calle_tel_legal =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_legalcalletel = "Valor Correcto";
        this.clase_cartel_nota_legalcalletel = "text-green-500 text-xs italic";
        this.calle_tel_legal_valido_local = true;
      }
      this.$emit("changetellegalvalido", this.calle_tel_legal_valido_local);
      this.$emit("changevalortellegal", this.leal_telefono);
    },
  },
};
</script>