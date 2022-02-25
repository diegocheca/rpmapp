<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="input_componente"
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
              d="M19 9l-7 7-7-7"
            />
          </svg>
        </span>
      </div>
      <select
        id="input_componente"
        name="input_componente"
        v-model="valor_input"
        v-bind:class="clase_border_de_input"
        :disabled="evaluacion || desactivar_input"
        @input="cambio_input($event.target.value)"
      >
        <option disabled value="null">Seleccione una Opción...</option>
        <option value="primera">Primer Categoría</option>
        <option value="segunda">Segunda Categoría</option>
        <option value="tercera">Tercera Categoría</option>
      </select>
    </div>
    <p v-bind:class="clase_cartel_validacion_input">
      {{ texto_validacion_input }}.
    </p>
    <div class="flex" v-if="evaluacion || mostrar_correccion">
      <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correccion"
              v-model="evualacion_correcto"
              value="true"
              v-on:change="actaulizar_variable_correccion(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correccion"
              v-model="evualacion_correcto"
              value="false"
              v-on:change="actaulizar_variable_correccion(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correccion"
              v-model="evualacion_correcto"
              value="nada"
              v-on:change="actaulizar_variable_correccion('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!valor_evaluacion_correcto_local"
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
export default {
  props: [
    "valor_input_props",
    "valor_input_validacion",
    "evualacion_correcto",
    "valor_obs",
    "valor_valido_obs",
    "testing",
    "evaluacion",
    "label",
    "icon",
    "name_correccion",
    "desactivar_input",
    "mostrar_correccion",
    "desactivar_correccion",
  ],
  data() {
    return {
      clase_border_de_input:
        "h-10 appearance-none block w-full bg-gray-200 text-gray-700 border border-l-0 rounded-r-lg mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_input: "",
      clase_cartel_validacion_input: "text-green-500 text-xs italic",
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_text_area: "Observacion Correcta",
      clase_text_evaluacion_de_text_area: "text-green-500 text-xs italic",
      valor_input: this.$props.valor_input_props,
      validacion_input_local: this.$props.valor_input_validacion,
      valor_evaluacion_correcto_local: this.$props.evualacion_correcto,

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
      if (this.$props.valor_obs.length <= 2) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_text_area =
          "Observacion Incorrecta - debe ser mayor a 2 carcteres";
        this.clase_text_evaluacion_de_text_area = "text-red-500 text-xs italic";
        this.obs_valida = false;
        this.$emit("changeobsvalido", false);
      }
      if (this.$props.valor_obs.length >= 50) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_text_area =
          "Observacion Incorrecta - debe tener menos de 50 caracteres";
        this.clase_text_evaluacion_de_text_area = "text-red-500 text-xs italic";
        this.obs_valida = false;
        this.$emit("changeobsvalido", false);
      }
      if (
        this.$props.valor_obs !== "" &&
        this.$props.valor_obs.length <= 30 &&
        this.$props.valor_obs.length >= 3
      ) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_text_area = "Observacion Correcta";
        this.clase_text_evaluacion_de_text_area =
          "text-green-500 text-xs italic";
        this.obs_valida = false;
        this.$emit("changeobsvalido", true);
      }
      this.$emit("changeobs", this.$props.valor_obs);
    },
    cambio_input(valor) {
      console.log(valor);
      this.$emit("changevalido", true);
      this.$emit("changevalor", valor);
    },
  },
};
</script>