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

      <!-- Copiar Datos de Domicilio Legal -->
      <div v-if="$props.mostrarCopiarDatos" class="col-start-1 col-end-5 ml-4">
        <span class="text-sm font-semibold mr-1"
          >Mismos Datos que Domicilio Legal?</span
        >
        <Toggle
          v-model="copiar_datos"
          @change="buscar_domicilio_en_padre"
          on-label="SI"
          off-label="NO"
        />
      </div>
      <!-- Evaluacion Administrador -->
      <div
        class="col-start-6 col-end-7 ml-4"
        v-if="
          $inertia.page.props.user.roles[0].name == 'Administrador'
        "
      >
        <span class="text-sm font-semibold mr-1">Evaluación</span>
        <Toggle
          v-model="evaluacion_adm"
          @change="update_valor_evaluacion"
          on-label="SI"
          off-label="NO"
        />
      </div>
      <!-- Ayuda -->
      <div class="col-start-7 col-end-9 ml-4" v-if="$props.mostrarayuda">
        <span class="text-sm font-semibold mr-1">Necesita ayuda?</span>
        <Toggle
          v-model="valor_ayuda_local"
          @change="cambio_de_ayuda"
          on-label="SI"
          off-label="NO"
        />
      </div>
      <!-- Seguir sin Guardar -->
      <div class="col-start-9 col-end-11 ml-4">
        <span class="text-sm font-semibold mr-1">Continuar sin Guardar</span>
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
    "mostrar_evaluacion",
    "mostrarCopiarDatos",
  ],
  data() {
    return {
      valor_ayuda_local: this.$props.ayuda,
      continuar_local: this.$props.continuar,
      copiar_datos: false,
      // evaluacion_adm: false,
      evaluacion_adm: this.$props.evaluacion,
      mostrar_evaluacion_adm: this.$props.mostrar_evaluacion,
    };
  },
  methods: {
    cambio_de_ayuda() {
      this.$emit("changevalorayuda", this.valor_ayuda_local);
    },
    update_valor_evaluacion() {
      this.$emit("change_valor_evaluacion", this.evaluacion_adm);
    },
    pagina_siguiente() {
      this.$emit("continuarpagina", this.continuar_local);
    },
    buscar_domicilio_en_padre() {
      //busco los datos en el padre
      if (this.copiar_datos) this.$emit("copiar_datos", true);
    },
  },
};
</script>
<style src="@vueform/toggle/themes/default.css"></style>