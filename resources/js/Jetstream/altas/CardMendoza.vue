<style>
input:checked {
  background-color: #22c55e; /* bg-green-500 */
}
input:checked ~ span:last-child {
  --tw-translate-x: 1.75rem; /* translate-x-7 */
}
</style>
<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<a href="#section_mendoza">
				<img class="animate-bounce w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/formulario_alta/imagenes/mendoza.png'" width="50%">
			</a>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos de Mendoza</p>
				<div class="flex space-x-2 text-gray-400 text-sm">
					<!-- svg  -->
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
					</svg>
						<p>{{lugar}}</p> 
				</div>
				<div class="flex space-x-2 text-gray-400 text-sm my-3">
					<!-- svg  -->
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
						<p>{{updated_at}}</p> 
				</div>
				<div class="border-t-2"></div>
        </div>
        <div class="mt-4" v-if="$props.mostrarayuda">
          <label
            class="flex items-center relative w-max cursor-pointer select-none"
          >
            Necesita ayuda?
            <br />
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
                focus:ring-green-500
                bg-red-500
              "
              v-model="valor_ayuda_local"
              @change="cambio_de_ayuda"
            />
            <span
              class="absolute font-medium text-xs uppercase right-1 text-white"
            >
              No
            </span>
            <span
              class="absolute font-medium text-xs uppercase right-8 text-white"
            >
              Si
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
      </div>
  </div>
</template>

<script>
export default {
  props: [
    "progreso",
    "aprobado",
    "reprobado",
    "lugar",
    "updated_at",
    "mostrarayuda",
    "evaluacion",
    "clase_sup",
    "clase_inf",
    "ayuda",
  ],

  data() {
    return {
      valor_ayuda_local: this.$props.ayuda,
    };
  },
  methods: {
    cambio_de_ayuda() {
      this.$emit("changevalorayuda", this.valor_ayuda_local);
    },
  },
};
</script>