<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_provincia"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <!-- <div class="flex">
                <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                </span>
            </div> -->
      <select
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
        id="leal_provincia"
        name="leal_provincia"
        v-model="leal_provincia"
        v-bind:class="clase_de_input_provincia_legal"
        :disabled="evaluacion || $props.desactivar_legal_prov"
        @input="cambio_input_calle_prov_legal($event.target.value)"
      >
        <option
          v-for="provincia in $props.lista_provincias"
          v-bind:key="provincia.id"
          :value="provincia.id"
        >
          {{ provincia.nombre }}
        </option>
      </select>
    </div>
    <p v-bind:class="clase_cartel_nota_legalcalleprov">
      {{ cartel_nota_legalcalleprov }}.
    </p>
    <div class="flex" v-if="evaluacion || mostrar_legal_prov_correccion">
      <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_prov_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcto"
              v-model="leal_provincia_correcto"
              value="true"
              v-on:change="cactaulizar_variable_legalcalleprov(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_prov_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcto"
              v-model="leal_provincia_correcto"
              value="false"
              v-on:change="cactaulizar_variable_legalcalleprov(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="$props.desactivar_legal_prov_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcto"
              v-model="leal_provincia_correcto"
              value="nada"
              v-on:change="cactaulizar_variable_legalcalleprov('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!legal_calle_prov_correcto_local"
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
          for="obs_leal_provincia"
          >Observación:</label
        >
        <textarea
          id="obs_leal_provincia"
          name="obs_leal_provincia"
          v-model="obs_leal_provincia"
          :disabled="$props.desactivar_legal_prov_correccion"
          v-bind:class="clase_text_area_calle_legal_prov"
          @input="
            actaulizar_contenido_text_area_calle_legal_prov($event.target.value)
          "
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacion_prov_calle">
          {{ cartel_nota_evaluacion_prov_calle }}
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
          -- prov calle:{{ leal_provincia }}-- --prov calle Valido:{{
            leal_provincia_valido
          }}-- --prov calle Valido local:{{ calle_prov_legal_valido_local }}--
          --prov calle Evalaucion:{{ leal_provincia_correcto }}-- --prov calle
          Obser:{{ observacion_prod }}** --prov calle obsr Valido:{{
            $props.obs_leal_provincia_valido
          }}-- --Evaluacion {{ evaluacion }}-- --{{
            cartel_nota_evaluacion_prov_calle
          }}--
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "leal_provincia",
    "leal_provincia_valido",
    "leal_provincia_correcto",
    "obs_leal_provincia",
    "obs_leal_provincia_valido",
    "evaluacion",
    "testing",
    "label",
    "lista_provincias",
    "name_correcto",
    "desactivar_legal_prov",
    "mostrar_legal_prov_correccion",
    "desactivar_legal_prov_correccion",
  ],
  data() {
    return {
      clase_de_input_provincia_legal:"appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcalleprov: "",
      clase_cartel_nota_legalcalleprov: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_prov:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_prov_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_prov_calle: "text-green-500 text-xs italic",
      calle_prov_legal_valido_local: this.$props.leal_provincia_valido,
      legal_calle_prov_correcto_local: this.$props.leal_provincia_correcto,
      obs_calle_prov_legal_valido_local: this.$props.obs_leal_provincia_valido,
      leal_provincia_local: this.$props.leal_provincia,
      observacion_prod: this.$props.obs_leal_provincia,
      testing_hijo: false,

      //border-green-500
    };
  },
  methods: {
    cactaulizar_variable_legalcalleprov(valor) {
      this.legal_calle_prov_correcto_local = valor;
      this.$emit(
        "changeprovlegalcorrecto",
        this.legal_calle_prov_correcto_local
      );
    },

    actaulizar_contenido_text_area_calle_legal_prov(value) {
      if (this.$props.obs_leal_provincia.length <= 2) {
        this.clase_text_area_calle_legal_prov =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_prov_calle =
          "Observacion Incorrecta - debe ser mayor a 2 carcteres";
        this.clase_cartel_nota_evaluacion_prov_calle =
          "text-red-500 text-xs italic";
        this.obs_calle_prov_legal_valido_local = false;
        this.$emit("changeobsprovlegalvalido", false);
      }
      if (this.$props.obs_leal_provincia.length >= 50) {
        this.clase_text_area_calle_legal_prov =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_prov_calle =
          "Observacion Incorrecta - debe tener menos de 50 caracteres";
        this.clase_cartel_nota_evaluacion_prov_calle =
          "text-red-500 text-xs italic";
        this.obs_calle_prov_legal_valido_local = false;
        this.$emit("changeobsprovlegalvalido", false);
      }
      if (
        this.$props.obs_leal_provincia !== "" &&
        this.$props.obs_leal_provincia.length <= 30 &&
        this.$props.obs_leal_provincia.length >= 3
      ) {
        this.clase_text_area_calle_legal_prov =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_prov_calle = "Observacion Correcta";
        this.clase_cartel_nota_evaluacion_prov_calle =
          "text-green-500 text-xs italic";
        this.obs_calle_prov_legal_valido_local = false;
        this.$emit("changeobsprovlegalvalido", true);
      }
      this.$emit("changeobsrpovlegal", this.$props.obs_leal_provincia);
    },
    cambio_input_calle_prov_legal(value) {
      //alert("cambio la provincia"+value);
      //voy a buscar los departamento de la provincia
      this.leal_provincia_local = value;
      this.$emit("changevalorprovlegal", value);
    },
  },
};
</script>