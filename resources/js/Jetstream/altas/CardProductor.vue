<template>
  <div :class="clase_sup">
    <div :class="clase_inf">
      <div class="flex justify-center">
        <img
          class="w-10 h-10 object-cover rounded-full border-2 border-indigo-500"
          :src="
            $inertia.page.props.appName + '/slick/img/features/casco-minero.svg'
          "
          width="50%"
        />
      </div>
      <div class="col-span-6 mt-1">
        <span class="text-gray-800 text-2xl font-bold">{{ titulo }}</span>
        <!-- <div class="flex space-x-2 text-gray-400 text-sm">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
              />
            </svg>
            <p>{{ lugar }}</p>
          </div>
          <div class="flex space-x-2 text-gray-400 text-sm my-3">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
              />
            </svg>
            <p>{{ updated_at }}</p>
          </div> -->
        <!-- <div class="border-t-2"></div> -->
        <!-- <div class="flex items-center">
						<span class="mr-2"><p>{{aprobado}}%</p></span>
						<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
							<div :style="'width: '+aprobado+'%'" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
						</div>
					</div>
				</div>
				<div class="flex items-center">
					<span class="mr-2"><p>{{reprobado}}%</p></span>
					<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
							<div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
						</div>
					</div>
				</div>
				<div class="flex items-center">
						<span class="mr-2"><p>{{progreso}}%</p></span>
						<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
							<div style="width: 40%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
						</div>
					</div>
				</div> -->
      </div>
      <div class="col-span-2 mt-2" v-if="$props.mostrarayuda">
        <!-- <label
          class="
            flex
            items-center
            relative
            w-max
            cursor-pointer
            select-none
            mt-2
          "
        > -->
        <span class="text-lg font-semibold mr-3">Necesita ayuda?</span>
        <Toggle
          v-model="valor_ayuda_local"
          @change="cambio_de_ayuda"
          on-label="SI"
          off-label="NO"
        />
        <!-- <input
            type="checkbox"
            class="
              ml-2
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
          /> -->
        <!-- </label> -->
      </div>
      <div class="col-span-2 mt-2" v-if="$props.mostrarayuda">
        <span class="text-lg font-semibold mr-3">Sin Datos</span>
        <Toggle
          v-model="valor_pagina"
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
    "titulo",
  ],

  data() {
    return {
      valor_ayuda_local: this.$props.ayuda,
      valor_pagina: false,
    };
  },
  methods: {
    cambio_de_ayuda() {
      this.$emit("changevalorayuda", this.valor_ayuda_local);
    },
    pagina_siguiente() {
      // console.log(this.valor_pagina);
      this.$emit("continuarpagina", this.valor_pagina);
    },
  },
};
</script>
<style src="@vueform/toggle/themes/default.css"></style>