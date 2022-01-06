<template>
  <div class="mb-5 gap-6">
    <div
      class="
        border border-green-200 border-opacity-50
        shadow-lg
        rounded
        relative
        bg-white
        py-2
        px-4
        w-128
        grid
        sm:grid-cols-1
        md:grid-cols-6
        lg:grid-cols-6
        xl:grid-cols-6
      "
    >
      <!-- <div class="flex justify-center">
        <img
          class="w-10 h-10 object-cover rounded-full border-2 border-indigo-500"
          :src="$inertia.page.props.appName + icono"
          width="50%"
        />
      </div> -->
      <!-- <div class="col-span-4 mt-1">
        <span class="text-gray-800 text-2xl font-bold">{{ titulo }}</span>
      </div> -->
      <div class="col-start-7 col-end-9 ml-4" v-if="$props.mostrarayuda">
        <span class="text font-semibold mr-1">Necesita ayuda?</span>
        <Toggle
          v-model="valor_ayuda_local"
          @change="cambio_de_ayuda"
          on-label="SI"
          off-label="NO"
        />
      </div>
      <div class="col-start-9 col-end-11 ml-4">
        <span class="text font-semibold mr-1">Continuar sin Guardar</span>
        <Toggle
          v-model="continuar_local"
          @change="pagina_siguiente"
          on-label="SI"
          off-label="NO"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Toggle from "@vueform/toggle";
export default {
  components: {
    Toggle,
  },
  props: [
    "icono",
    "titulo",
    "mostrarayuda",
    "clase_sup",
    "clase_inf",
    "ayuda",
    "continuar",
    "progreso",
    "aprobado",
    "reprobado",
    "lugar",
    "updated_at",
    "evaluacion",
  ],
  data() {
    return {
      valor_ayuda_local: this.$props.ayuda,
      continuar_local: this.$props.continuar,
    };
  },
  methods: {
    cambio_de_ayuda() {
      this.$emit("changevalorayuda", this.valor_ayuda_local);
    },
    pagina_siguiente() {
      this.$emit("continuarpagina", this.continuar_local);
    },
  },
};
</script>
<style src="@vueform/toggle/themes/default.css"></style>