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
      <!-- <div
        class="bg-white shadow-md rounded-xl pb-2 border border-red-600"
      >
        <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
          Seccion de evaluacion
        </h3>
        <div class="">
          <div class="w-full px-3">
            <span class="text-gray-700 mr-2">Es correcto?</span>
            <label class="inline-flex items-center">
              <input
                type="radio"
                :disabled="desactivar_correccion"
                class="form-radio h-4 w-4 text-green-600"
                :name="name_correcto"
                v-model="evualacion_correcto"
                value="true"
                v-on:change="actaulizar_variable_correccion(true)"
              />
              <span class="ml-1 text-sm">Si</span>
            </label>
            <label class="inline-flex items-center ml-2">
              <input
                type="radio"
                :disabled="desactivar_correccion"
                class="form-radio h-4 w-4 text-red-600"
                :name="name_correcto"
                v-model="evualacion_correcto"
                value="false"
                v-on:change="actaulizar_variable_correccion(false)"
              />
              <span class="ml-1 text-sm">No</span>
            </label>
            <label class="inline-flex items-center ml-2">
              <input
                type="radio"
                :disabled="desactivar_correccion"
                class="form-radio h-4 w-4 text-indigo-600"
                :name="name_correcto"
                v-model="evualacion_correcto"
                value="nada"
                v-on:change="actaulizar_variable_correccion('nada')"
              />
              <span class="ml-1 text-sm">Sin evaluar</span>
            </label>
          </div>
          <div v-show="valor_evaluacion_correcto_local" class="w-full px-3">
            <label
              class="
                block
                uppercase
                tracking-wide
                text-gray-700 text-xs
                font-bold
                mb-1
                mt-2
              "
              for="observaciones"
              >Observación:</label
            >
            <textarea
              id="observaciones"
              name="observaciones"
              v-model="valor_obs"
              v-bind:class="clase_text_area"
              :disabled="desactivar_correccion"
              @input="actaulizar_contenido_text_area($event.target.value)"
            >
            </textarea>
            <p v-bind:class="clase_text_evaluacion_de_text_area">
              {{ texto_validacion_text_area }}
            </p>
          </div>
        </div>
      </div> -->
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
          <br />Valor input:{{ valor_input }} <br />Validacion Input:{{
            validacion_input_local
          }}
          <br />distrtito minero calle Valido local:{{
            validacion_input_local
          }}
          <br />distrtito minero calle Evalaucion:{{ evualacion_correcto }}
          <br />distrtito minero calle Obser:{{ valor_obs }} <br />distrtito
          minero calle obsr Valido:{{ valor_valido_obs }} <br />Evaluacion
          {{ evaluacion }} <br />{{ texto_validacion_text_area }}
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