<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
      >{{ titulo }}</label
    >
    <div class="flex items-stretch w-full mb-4 relative">
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
        v-model="valueSelectLocal"
        v-bind:class="classSelect"
        @input="valueSelect($event.target.value)"
      >
        <!-- :disabled="evaluacion || $props.desactivar_legal_prov" -->
        <option
          v-for="optionSelect in $props.listOptions"
          v-bind:key="optionSelect.id"
          :value="optionSelect.nombre"
        >
          {{ optionSelect.nombre }}
        </option>
      </select>
    </div>
  </div>
</template>
<script>
// import SeccionEvaluacion from "@/Components/SeccionEvaluacion";

export default {
  props: [
    "titulo",
    "valueSelectInicial",
    "classSelect",
    "listOptions",
  ],
  data() {
    return {
      valueSelectLocal: this.$props.valueSelectInicial,
    };
  },
  methods: {
    // cambio_input(value) {
    //   this.$emit("ValueInput", value);
    // },
    valueSelect(value) {
      //alert("cambio la provincia"+value);
      this.valueSelectLocal = value;
      this.$emit("ChangeValorSelect", value);
    },
  },
};
</script>

