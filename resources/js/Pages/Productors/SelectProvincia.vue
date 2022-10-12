<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_provincia"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
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
    <div
      v-if="
        evaluacion ||
        mostrar_legal_prov_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <SeccionEvaluacion
        :correccion_desactivar="$props.desactivar_legal_prov_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_prov_correcto_local"
        :obs_observacion="observacion_prod"
        v-on:change_correcto="cactaulizar_variable_legalcalleprov($event)"
        v-on:change_obs="
          actaulizar_contenido_text_area_calle_legal_prov($event)
        "
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
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_provincia_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_legalcalleprov: "",
      clase_cartel_nota_legalcalleprov: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_prov:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_prov_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_prov_calle: "text-green-500 text-xs italic",
      calle_prov_legal_valido_local: this.$props.leal_provincia_valido,
      obs_calle_prov_legal_valido_local: this.$props.obs_leal_provincia_valido,
      leal_provincia_local: this.$props.leal_provincia,

      legal_calle_prov_correcto_local: this.$props.leal_provincia_correcto,
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
      this.observacion_prod = value;
      this.$emit("changeobsrpovlegal", this.observacion_prod);
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