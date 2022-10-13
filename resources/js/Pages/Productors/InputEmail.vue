<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
              d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
        </span>
      </div>
      <input
        type="text"
        class="
          flex-shrink flex-grow flex-auto
          leading-normal
          w-px
          flex-1
          border border-l-0
          h-10
          border-grey-light
          rounded-lg rounded-l-none
          px-3
          relative
          focus:border-blue focus:shadow
        "
        placeholder="Email"
        v-model="email"
        v-bind:class="clase_de_input_email"
        :disabled="evaluacion || $props.email_disable"
        @input="cambio_input_email($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_nota_email">{{ cartel_nota_campo }}.</p>
    <div v-if="evaluacion || email_correccion_mostrar|| $props.mostrar_evaluacion_adm">
      <SeccionEvaluacion
        :correccion_desactivar="$props.email_correccion_desactivar"
        :name_correcto="'name_email_correcto'"
        :correcto="email_correcto"
        :obs_observacion="obs_email_correcto_local"
        v-on:change_correcto="actaulizar_variable_email($event)"
        v-on:change_obs="actaulizar_contenido_text_area($event)"
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
    "email",
    "email_valido",
    "email_correcto",
    "obs_email",
    "obs_email_valido",
    "evaluacion",
    "label",
    "testing",
    "email_disable",
    "email_correccion_mostrar",
    "email_correccion_desactivar",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_email:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_email: "text-green-500 text-xs italic",
      cartel_nota_campo: "",
      email_correcto_local: this.$props.email_correcto,
      obs_email_correcto_local: this.$props.obs_email,
      email_valido_local: this.$props.email_valido,
      obs_email_valido_local: this.$props.obs_email_valido,
      clase_text_area_email:
        "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_evaluacion_email_text_area:
        "text-green-500 text-xs italic",
      cartel_nota_evaluacion_email_text_area: "Observacion Correcta",
      testing_hijo: false,
    };
  },
  methods: {
    actaulizar_variable_email(valor) {
      this.email_correcto_local = valor;
      this.$emit("changeemailcorrecto", this.email_correcto_local);
    },

    actaulizar_contenido_text_area(value) {
      this.obs_email_correcto_local = value;
      this.$emit("changeobsemail", this.obs_email_correcto_local);
    },
    cambio_input_email(value) {
      if (this.email.length <= 4) {
        this.clase_de_input_email =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo =
          "Campo Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_email = "text-red-500 text-xs italic";
        this.email_valido_local = false;
      }
      if (this.email.length >= 40) {
        this.clase_de_input_email =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo =
          "Campo Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_nota_email = "text-red-500 text-xs italic";
        this.email_valido_local = false;
      }
      if (
        this.email !== "" &&
        this.email.length <= 30 &&
        this.email.length >= 3
      ) {
        this.clase_de_input_email =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo = "Campo Correcto";
        this.clase_cartel_nota_email = "text-green-500 text-xs italic";
        this.email_valido_local = true;
      }
      this.$emit("changeemailvalido", this.email_valido_local);
      this.$emit("changeemail", value);
    },
  },
};
</script>