<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <main class="p-4 md:p-14 bg-gray-100 md:space-x-4 space-y-4">
      <div class="shadow-lg rounded-2xl p-4 bg-white">
        <div class="grid grid-cols-12 gap-2">
          <div class="col-span-12 sm:col-span-6 md:col-span-3">
            <div class="flex flex-row bg-white shadow-sm rounded p-4">
              <div
                class="
                  flex
                  items-center
                  justify-center
                  flex-shrink-0
                  h-12
                  w-12
                  rounded-xl
                  bg-blue-100
                  text-blue-500
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
                    d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
              </div>
              <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">
                  Borradores de inscripciones
                </div>
                <vue3-autocounter
                  class="font-bold text-lg"
                  ref="counter1"
                  :startAmount="0"
                  :endAmount="cantidad_productores_borrador"
                  :duration="3"
                  prefix=""
                  suffix=""
                  separator=""
                  decimalSeparator=""
                  :decimals="0"
                  :autoinit="true"
                />
              </div>
            </div>
          </div>
          <div class="col-span-12 sm:col-span-6 md:col-span-3">
            <div class="flex flex-row bg-white shadow-sm rounded p-4">
              <div
                class="
                  flex
                  items-center
                  justify-center
                  flex-shrink-0
                  h-12
                  w-12
                  rounded-xl
                  bg-green-100
                  text-green-500
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
                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"
                  />
                </svg>
              </div>
              <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">Nuevas reinscripciones</div>
                <vue3-autocounter
                  class="font-bold text-lg"
                  ref="counter1"
                  :startAmount="0"
                  :endAmount="nuevas_reinscripciones"
                  :duration="3"
                  prefix=""
                  suffix=""
                  separator=""
                  decimalSeparator=""
                  :decimals="0"
                  :autoinit="true"
                />
              </div>
            </div>
          </div>

          <div class="col-span-12 sm:col-span-6 md:col-span-3">
            <div class="flex flex-row bg-white shadow-sm rounded p-4">
              <div
                class="
                  flex
                  items-center
                  justify-center
                  flex-shrink-0
                  h-12
                  w-12
                  rounded-xl
                  bg-orange-100
                  text-orange-500
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
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">
                  Inscripciones pendientes
                </div>
                <div class="flex flex-row">
                  <vue3-autocounter
                    class="font-bold text-lg"
                    ref="counter1"
                    :startAmount="0"
                    :endAmount="cantidad_productores_pendientes"
                    :duration="3"
                    prefix=""
                    suffix=""
                    separator=""
                    decimalSeparator=""
                    :decimals="0"
                    :autoinit="true"
                  />

                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ml-5 h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-12 sm:col-span-6 md:col-span-3">
            <div class="flex flex-row bg-white shadow-sm rounded p-4">
              <div
                class="
                  flex
                  items-center
                  justify-center
                  flex-shrink-0
                  h-12
                  w-12
                  rounded-xl
                  bg-red-100
                  text-red-500
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
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <div class="flex flex-col flex-grow ml-4">
                <div class="text-sm text-gray-500">
                  Reinscripciones pendientes
                </div>
                <div class="flex flex-row">
                  <vue3-autocounter
                    class="font-bold text-lg"
                    ref="counter1"
                    :startAmount="0"
                    :endAmount="101"
                    :duration="3"
                    prefix=""
                    suffix=""
                    separator=""
                    decimalSeparator=""
                    :decimals="0"
                    :autoinit="true"
                  />
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ml-5 h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4"
      >
        <div class="md:w-1/4 space-y-4">
          <div
            class="
              w-full
              shadow-lg
              rounded-2xl
              p-3
              bg-white
              border-l-8 border-indigo-400
            "
          >
            <a :href="'#'" class="cursor-pointer">
              <vue3-autocounter
                class="text-4xl count-number"
                ref="counter1"
                :startAmount="0"
                :endAmount="cantidad_productores"
                :duration="4"
                prefix=""
                suffix=""
                separator=""
                decimalSeparator=""
                :decimals="0"
                :autoinit="true"
              />
              <div class="">productores mineros</div>
            </a>
          </div>
          <div
            class="
              w-full
              shadow-lg
              rounded-2xl
              p-3
              bg-white
              border-l-8 border-indigo-400
            "
          >
            <a :href="'#'" class="cursor-pointer">
              <vue3-autocounter
                class="text-4xl count-number"
                ref="counter4"
                :startAmount="0"
                :endAmount="porc_venta_provincia"
                :duration="3"
                prefix=""
                suffix=""
                separator=""
                decimalSeparator=""
                :decimals="0"
                :autoinit="true"
              />
              <div class="">Porcentaje Venta Provincial</div>
            </a>
          </div>
          <div
            class="
              w-full
              shadow-lg
              rounded-2xl
              p-3
              bg-white
              border-l-8 border-indigo-400
            "
          >
            <a :href="'#'" class="cursor-pointer">
              <vue3-autocounter
                class="text-4xl count-number"
                ref="counter4"
                :startAmount="0"
                :endAmount="porc_venta_pais"
                :duration="3"
                prefix=""
                suffix=""
                separator=""
                decimalSeparator=""
                :decimals="0"
                :autoinit="true"
              />
              <div class="">Porcentaje Venta en el Pais</div>
            </a>
          </div>
          <div
            class="
              w-full
              shadow-lg
              rounded-2xl
              p-3
              bg-white
              border-l-8 border-indigo-400
            "
          >
            <a :href="'#'" class="cursor-pointer">
              <vue3-autocounter
                class="text-4xl count-number"
                ref="counter4"
                :startAmount="0"
                :endAmount="porc_venta_exterior"
                :duration="3"
                prefix=""
                suffix=""
                separator=""
                decimalSeparator=""
                :decimals="0"
                :autoinit="true"
              />
              <div class="">Porcentaje Venta al Exterior</div>
            </a>
          </div>
        </div>

        <div class="md:w-3/4 shadow-lg rounded-2xl p-4 bg-white w-full">
          <ChartMap :dataChart="dataChart" />
        </div>
      </div>

      <div class="shadow-lg rounded-2xl p-4 bg-white">
        <ChartBar v-if="!chartShow" :dataChart="dataChart" />
      </div>
      <div class="shadow-lg rounded-2xl p-4 bg-white">
        <ChartPie :dataChart="dataChart" />
      </div>

      <div><TimeLine /></div>
    </main>
  </AppLayout>
</template>
<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import ChartPie from "@/Components/charts/pie";
import ChartBar from "@/Components/charts/bar";
import ChartMap from "@/Components/charts/map";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import Vue3autocounter from "vue3-autocounter";
import TimeLine from "@/Components/charts/line";

export default {
  components: {
    JetApplicationLogo,
    AppLayout,
    Welcome,
    ChartPie,
    ChartBar,
    ChartMap,
    JetAuthenticationCardLogo,
    Vue3autocounter,
    TimeLine,
  },
  props: {
    dataChart: {
      required: true,
    },
  },
  data() {
    return {
      chartShow: false,
      nuevas_reinscripciones: "",
      porc_venta_provincia: "",
      porc_venta_pais: "",
      porc_venta_exterior: "",
      cantidad_productores: 0,
      cantidad_productores_borrador: 0,
      cantidad_productores_pendientes: 0,
    };
  },
  methods: {
    toggle() {
      this.chartShow = !this.chartShow;
    },
    buscar_porcentaje_ventas() {
      let self = this;
      axios
        .get("/porcentaje_ventas")
        .then(function (response) {
        //   console.log(response);
          if (response.status == 200) {
            self.porc_venta_provincia = response.data.provincia;
            self.porc_venta_pais = response.data.pais;
            self.porc_venta_exterior = response.data.exterior;
          } else {
            self.porc_venta_provincia = 0;
            self.porc_venta_pais = 0;
            self.porc_venta_exterior = 0;
          }
        })
        .catch(function (error) {
          self.porc_venta_provincia = 0;
          self.porc_venta_pais = 0;
          self.porc_venta_exterior = 0;
          console.log(error);
        });
    },
    buscar_nuevas_reincripciones() {
      let self = this;
      axios
        .get("/numero_reinscripciones_nuevas")
        .then(function (response) {
          if (response.data.status === true)
            self.nuevas_reinscripciones = response.data.nuevas_inscripciones;
          else self.nuevas_reinscripciones = 0;
          // console.log(response.data.msg);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
    buscar_nuevas_reincripciones() {
      let self = this;
      axios
        .get("/dashboard/numproductores")
        .then(function (response) {
          if (response.data.status === "ok")
            self.cantidad_productores = response.data.cantidad;
          else self.cantidad = 0;
          // console.log(response.data.msg);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },

    buscar_nuevas_incripciones() {
      let self = this;
      axios
        .get("/dashboard/numproductorespendientes")
        .then(function (response) {
          if (response.data.status === "ok")
            self.cantidad_productores_pendientes = response.data.cantidad;
          else self.cantidad = 0;
          // console.log(response.data.msg);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
    buscar_borrador_incripciones() {
      // console.log("por buscar borradores");
      let self = this;
      axios
        .get("/dashboard/numproductoresborradores")
        .then(function (response) {
          if (response.data.status === "ok") {
            self.cantidad_productores_borrador = response.data.cantidad;
            // console.log("obtuve tanto borradores:"+self.cantidad_productores_borrador);
          } else self.cantidad = 0;
          // console.log(response.data.msg);
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
  },
  mounted() {
    this.buscar_nuevas_reincripciones();
    this.buscar_nuevas_incripciones();
    this.buscar_borrador_incripciones();
    this.buscar_porcentaje_ventas();
    // this.buscar_productores();
  },
};
</script>
