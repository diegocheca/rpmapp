<template>
  <div>
    <div>
      <label
        class="
          block
          uppercase
          tracking-wide
          text-gray-700 text-xs
          font-bold
          mb-2
        "
        >{{ label }}</label
      >
      <div class="mt-2">
        <label class="inline-flex items-center">
          <input
            type="radio"
            :disabled="desactivar_owner"
            class="form-radio h-5 w-5 text-green-500"
            :name="name_checkbox"
            v-model="valor_input"
            value="true"
            v-on:change="actaulizar_valor_input(true)"
          />
          <span class="ml-2">{{ label_true }}</span>
        </label>
        <label class="inline-flex items-center ml-2">
          <input
            type="radio"
            :disabled="desactivar_owner"
            class="form-radio h-5 w-5 text-red-500"
            :name="name_checkbox"
            v-model="valor_input"
            value="false"
            v-on:change="actaulizar_valor_input(false)"
          />
          <span class="ml-2">{{ label_false }}</span>
        </label>
      </div>
    </div>
    <div class="items-stretch w-full relative" v-if="mostrar_otro_input()">
      <label
        class="
          block
          uppercase
          tracking-wide
          text-gray-700 text-xs
          font-bold
          mb-2
        "
        for="input_componente"
        >{{ otro_label }}</label
      >
      <div class="mt-1">
        <input
          id="otro_input"
          name="otro_input"
          v-model="otro_input_local"
          v-bind:class="clase_de_input_otro"
          @input="cambio_input_otro($event.target.value)"
        />
        <p v-bind:class="clase_texto_validacion_otro_input">
          {{ texto_validacion_otro_input }}
        </p>
      </div>
    </div>
    <div
      v-if="
        evaluacion || mostrar_owner_correccion || $props.mostrar_evaluacion_adm
      "
    >
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_owner_correccion"
        :name_correcto="name_correcion"
        :correcto="evualacion_correcto"
        v-on:change_correcto="actaulizar_variable_correccion($event)"
        :obs_observacion="valor_obs"
        v-on:change_obs="actaulizar_contenido_text_area($event)"
      >
      </SeccionEvaluacion>
    </div>
  </div>
</template>

<script>
import SeccionEvaluacion from "@/Components/SeccionEvaluacion";
import Input from "../../Jetstream/Input.vue";
export default {
  components: { Input, SeccionEvaluacion },
  props: [
    "valor_input_props",
    "evualacion_correcto",
    "valor_obs",
    "valor_valido_obs",
    "evaluacion",
    "testing",
    "label",
    "label_true",
    "label_false",
    "otro_label",
    "otro_input",
    "name_correcion",
    "name_checkbox",
    "desactivar_owner",
    "mostrar_owner_correccion",
    "desactivar_owner_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_text_area: "Observacion Correcta",
      clase_text_evaluacion_de_text_area: "text-green-500 text-xs italic",
      valor_input: this.$props.valor_input_props,

      valor_evaluacion_correcto_local: this.$props.evualacion_correcto,
      obs_valor_evaluacion_correcto_local: this.$props.valor_obs,

      obs_valida: this.$props.obs_valido_props,
      testing_hijo: "false",
      clase_de_input_otro:
        "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      otro_input_local: this.$props.otro_input,
      otro_input_local_valido: false,
      texto_validacion_otro_input:
        "",
      clase_texto_validacion_otro_input: "text-red-500 text-xs italic",

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
    cambio_input_otro(value) {
      //tengo q validar el cambio dentro del input otro
      //this.otro_input_local = value;

      if (this.otro_input_local.length <= 2) {
        this.clase_de_input_otro =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        (this.otro_input_local_valido = false),
          (this.texto_validacion_otro_input =
            "Otro Dato Incorrecta , debe tener más de dos caractecteres");
        this.clase_texto_validacion_otro_input = "text-red-500 text-xs italic";
      }
      if (this.otro_input_local.length >= 50) {
        this.clase_de_input_otro =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        (this.otro_input_local_valido = false),
          (this.texto_validacion_otro_input =
            "Otro Dato Incorrecta , debe tener menos de 50 caractecteres");
        this.clase_texto_validacion_otro_input = "text-red-500 text-xs italic";
      }
      if (
        this.otro_input_local !== "" &&
        this.otro_input_local.length <= 49 &&
        this.otro_input_local.length >= 3
      ) {
        this.clase_de_input_otro =
          "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        (this.otro_input_local_valido = true),
          (this.texto_validacion_otro_input = "Otro Dato Correcto");
        this.clase_texto_validacion_otro_input =
          "text-green-500 text-xs italic";
      }
      this.$emit("changeotroinput", this.otro_input_local);
      this.$emit("changeotroinputvalido", this.otro_input_local_valido);
    },

    actaulizar_valor_input(value) {
      //aca pongo si necesito mostrar algun campo adicional
      this.valor_input = value;
      this.$emit("changevalor", value);
    },
    mostrar_otro_input() {
      // console.log(this.valor_input);
      if (this.$props.otro_label != false && this.valor_input) return true;
      else return false;
    },
  },
};
</script>