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
    <a href="#section_catamarca">
      <div :class="clase_inf">
        <div class="flex justify-center">
          <img
            class="
              w-20
              h-20
              object-cover
              rounded-full
              border-2 border-indigo-500
            "
            :src="
              $inertia.page.props.appName +
              '/formulario_alta/imagenes/catamarca.png'
            "
            width="50%"
          />
        </div>
        <div class="mt-8">
          <p class="text-xl font-semibold my-2 text-center">
            Datos de Catamarca
          </p>
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
          <div class="flex items-center">
            <span class="mr-2"
              ><p>{{ aprobado }}%</p></span
            >
            <div class="relative w-full">
              <div
                class="overflow-hidden h-2 text-xs flex rounded bg-green-200"
              >
                <div
                  :style="'width: ' + aprobado + '%'"
                  class="
                    shadow-none
                    flex flex-col
                    text-center
                    whitespace-nowrap
                    text-white
                    justify-center
                    bg-green-500
                  "
                ></div>
              </div>
            </div>
          </div>
          <div class="flex items-center">
            <span class="mr-2"
              ><p>{{ reprobado }}%</p></span
            >
            <div class="relative w-full">
              <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                <div
                  style="width: 45%"
                  class="
                    shadow-none
                    flex flex-col
                    text-center
                    whitespace-nowrap
                    text-white
                    justify-center
                    bg-pink-500
                  "
                ></div>
              </div>
            </div>
          </div>
          <div class="flex items-center">
            <span class="mr-2"
              ><p>{{ progreso }}%</p></span
            >
            <div class="relative w-full">
              <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                <div
                  style="width: 40%"
                  class="
                    shadow-none
                    flex flex-col
                    text-center
                    whitespace-nowrap
                    text-white
                    justify-center
                    bg-blue-500
                  "
                ></div>
              </div>
            </div>
          </div>
          <!-- <div class="flex justify-between" v-if="$props.evaluacion">
						<div class="my-4">
						<p class="font-semibold text-base mb-2">Prog</p>
						<div class="text-base text-gray-400 font-semibold">
                            <p>{{progreso}} %</p>
						</div>
					</div>
					<div class="my-4">
						<p class="font-semibold text-base text-green-500 mb-2">Apr</p>
						<div class="text-base text-green-500 font-semibold">
								<p>{{aprobado}} %</p>
						</div>
					</div>
					<div class="my-4">
						<p class="font-semibold text-base text-red-400 mb-2">Repr</p>
						<div class="text-base text-red-400 font-semibold">
								<p>{{reprobado}} %</p>
						</div>
					</div>
				</div> -->
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
    </a>
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