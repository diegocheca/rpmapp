<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      for="leal_departamento"
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
        id="leal_departamento_dos"
        name="leal_departamento_dos"
        v-model="leal_departamento"
        v-bind:class="clase_de_input_calle_dpto_legal"
        :disabled="evaluacion || desactivar_legal_dpto"
        @input="cambio_input_calle_dpto_legal($event.target.value)"
      >
        <option
          v-for="dpto in $props.lista_departamentos_dos"
          v-bind:key="dpto.id"
          :value="dpto.id"
        >
          {{ dpto.nombre }}
        </option>
        <option
          v-for="dpto in $props.lista_departamentos"
          v-bind:key="dpto.id"
          :value="dpto.id"
        >
          {{ dpto.nombre }}
        </option>
      </select>
    </div>
    <p v-bind:class="clase_cartel_nota_legalcalledpto">
      {{ clacartel_nota_legalcalledpto }}.
    </p>
    <div
      v-if="
        evaluacion ||
        mostrar_legal_dpto_correccion ||
        $props.mostrar_evaluacion_adm
      "
    >
      <SeccionEvaluacion
        :correccion_desactivar="$props.desactivar_legal_dpto_correccion"
        :name_correcto="name_correcto"
        :correcto="legal_calle_dpto_correcto_local"
        v-on:change_correcto="cactaulizar_variable_legalcalledpto($event)"
        :obs_observacion="observacion_dep"
        v-on:change_obs="
          actaulizar_contenido_text_area_calle_legal_dpto($event)
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
    "leal_departamento",
    "leal_departamento_valido",
    "leal_departamento_correcto",
    "obs_leal_departamento",
    "obs_leal_departamento_valido",
    "evaluacion",
    "testing",
    "name_correcto",
    "label",
    "lista_departamentos",
    "lista_departamentos_dos",
    "desactivar_legal_dpto",
    "mostrar_legal_dpto_correccion",
    "desactivar_legal_dpto_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_de_input_calle_dpto_legal:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      clacartel_nota_legalcalledpto: "",
      clase_cartel_nota_legalcalledpto: "text-green-500 text-xs italic",
      clase_text_area_calle_legal_dpto:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      cartel_nota_evaluacion_dpto_calle: "Observacion Correcta",
      clase_cartel_nota_evaluacion_dpto_calle: "text-green-500 text-xs italic",
      calle_dpto_legal_valido_local: this.$props.leal_departamento_valido,
      legal_calle_dpto_correcto_local: this.$props.leal_departamento_correcto,
      obs_calle_dpto_legal_valido_local:
        this.$props.obs_leal_departamento_valido,
      observacion_dep: this.$props.obs_leal_departamento,
      testing_hijo: false,
      nueva_lista_dptos: this.$props.lista_departamentos_dos,
      //border-green-500
    };
  },
  methods: {
    cargar_dptos() {
      let self = this;
      // console.log("la lista dos:");
      // console.log(self.$props.lista_departamentos_dos);
      /* if(this.$props.lista_departamentos_dos.length === 0)
            this.nueva_lista_dptos = this.$props.lista_departamentos;
        else  */ this.nueva_lista_dptos = this.$props.lista_departamentos_dos;
      // console.log("la lista quedo en");
      // console.log(this.nueva_lista_dptos);
    },
    cactaulizar_variable_legalcalledpto(valor) {
      this.legal_calle_dpto_correcto_local = valor;
      this.$emit(
        "changedptolegalcorrecto",
        this.legal_calle_dpto_correcto_local
      );
    },

    actaulizar_contenido_text_area_calle_legal_dpto(value) {
      this.observacion_dep = value;
      this.$emit("changeobsrdptolegal", this.observacion_dep);
    },
    cambio_input_calle_dpto_legal(value) {
      /*if(this.leal_departamento.length <= 4)
        {
            this.clase_de_input_calle_dpto_legal= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_nota_legalcalledpto= 'text-red-500 text-xs italic';
            this.calle_dpto_legal_valido_local = false;
        }
        if(this.leal_departamento.length >= 40)
        {
            this.clase_de_input_calle_dpto_legal =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_nota_legalcalledpto=  'text-red-500 text-xs italic';
            this.calle_dpto_legal_valido_local = false;
        }
        if( this.leal_departamento !== '' && this.leal_departamento.length <= 30 && this.leal_departamento.length >= 3)
        {
            this.clase_de_input_calle_dpto_legal=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.clacartel_nota_legalcalledpto =  'Valor Correcto';
            this.clase_cartel_nota_legalcalledpto =  'text-green-500 text-xs italic';
            this.calle_dpto_legal_valido_local = true;
        }*/
      //this.$emit('changedptolegalvalido',this.calle_dpto_legal_valido_local);

      this.$emit("changevalordptolegal", value);
    },
  },
  mounted() {
    this.cargar_dptos();
  },
};
</script>