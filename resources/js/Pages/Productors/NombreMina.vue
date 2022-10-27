<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for=""
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
          <img :src="icon" />
        </span>
      </div>
      <input
        :type="tipoInput ? 'number' : 'text'"
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
        :placeholder="placeholder ? placeholder : 'Complete este campo'"
        id="input_componente"
        name="input_componente"
        v-model="valor_input"
        v-bind:class="clase_border_de_input"
        :disabled="evaluacion || desactivar_input"
        @input="cambio_input($event.target.value)"
      />
    </div>
    <p v-bind:class="clase_cartel_validacion_input">
      {{ texto_validacion_input }}.
    </p>
    <div
      v-if="evaluacion || mostrar_correccion || $props.mostrar_evaluacion_adm"
    >
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_correccion"
        :name_correcto="name_correcto"
        :correcto="evualacion_correcto"
        v-on:change_correcto="actaulizar_variable_correccion($event)"
        :obs_observacion="obs_valor_evaluacion_correcto_local"
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
    "tipoInput",
    "valor_input_props",
    "valor_input_validacion",
    "evualacion_correcto",
    "valor_obs",
    "valor_valido_obs",
    "evaluacion",
    "testing",
    "label",
    "icon",
    "name_correcto",
    "desactivar_input",
    "mostrar_correccion",
    "desactivar_correccion",
    "mostrar_evaluacion_adm",
    "placeholder",
  ],
  data() {
    return {
      clase_border_de_input:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_input: "",
      clase_cartel_validacion_input: "text-green-500 text-xs italic",
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_text_area: "",
      clase_text_evaluacion_de_text_area: "text-green-500 text-xs italic",
      valor_input: this.$props.valor_input_props,

      validacion_input_local: this.$props.valor_input_validacion,

      valor_evaluacion_correcto_local: this.$props.evualacion_correcto,
      obs_valor_evaluacion_correcto_local: this.$props.valor_obs,

      obs_valida: this.$props.obs_valido_props,
      testing_hijo: true,

      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_correccion(valor) {
      this.valor_evaluacion_correcto_local = valor;
      this.$emit("changecorrecto", this.valor_evaluacion_correcto_local);
    },

    actaulizar_contenido_text_area(value) {
      this.obs_valor_evaluacion_correcto_local = value;
      this.$emit("changeobs", this.obs_valor_evaluacion_correcto_local);
    },
    cambio_input() {
      if (this.valor_input.length <= 4) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (this.valor_input.length >= 40) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (
        this.valor_input !== "" &&
        this.valor_input.length <= 30 &&
        this.valor_input.length >= 3
      ) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input = "Valor Correcto";
        this.clase_cartel_validacion_input = "text-green-500 text-xs italic";
        this.validacion_input_local = true;
      }
      this.$emit("changevalido", this.validacion_input_local);
      this.$emit("changevalor", this.valor_input);
    },
  },
};
</script>