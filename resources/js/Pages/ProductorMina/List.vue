<template>
  <app-layout>
    <h2
      class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800"
    >
      Productores Asociados a Minas Ya cargados
    </h2>

    <body class="flex flex-col">
      <div class="overflow-x-auto">
        <div
          class="
            min-w-screen
            bg-gray-100
            flex
            items-center
            justify-center
            bg-gray-100
            font-sans
            overflow-hidden
          "
        >
          <div class="w-full lg:w-5/6">
            <a :href="route('productores_minas.create')"> 
              <button disabled class="  px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">
                Nuevo Productor y Mina
              </button>
            </a>
            <div class="bg-white shadow-md rounded my-6">
              <div
                v-if="mostrar_alert_eliminar"
                class="
                  alert
                  flex flex-row
                  items-center
                  bg-red-200
                  p-5
                  rounded
                  border-b-2 border-red-300
                "
              >
                <div
                  class="
                    alert-icon
                    flex
                    items-center
                    bg-red-100
                    border-2 border-red-500
                    justify-center
                    h-10
                    w-10
                    flex-shrink-0
                    rounded-full
                  "
                >
                  <span class="text-red-500">
                    <svg
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      class="h-6 w-6"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </span>
                </div>
                <div class="alert-content ml-4">
                  <div class="alert-title font-semibold text-lg text-red-800">
                    Formulario Eliminado
                  </div>
                  <div class="alert-description text-sm text-red-600">
                    Se elmino correctamente el formulario con id:
                    {{ id_a_eliminar }}
                  </div>
                  <button @click="cerrarAviso">Cerrar</button>
                </div>
              </div>
            <table class="min-w-max w-full table-auto">
              <thead class="bg-gray-100">
                <tr
                    class="
                      bg-gray-200
                      text-gray-600
                      uppercase
                      text-sm
                      leading-normal
                    "
                  >
                  
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    ID
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Id Productor
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Id Mina
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Num Expediente
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    caracter
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Accion
                  </th>
                  

                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <tr v-for="productor_mina in borradores.data" :key="productor_mina.id" :class="{ 'bg-gray-100': index % 2 === 0 }">
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span class="font-medium">{{ productor_mina.id }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span class="font-medium">{{ productor_mina.id_productor }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span class="font-medium">{{ productor_mina.id_mina }}</span>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor_mina.num_expediente_SIGETRAMI }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor_mina.estado }}</div>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                  <div class=" w-4 mr-2 transform hover:text-purple-500 hover:scale-110" >
                  <a @click="mostrarInfo(productor_mina.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                  </a>
                  </div>
                  <div class=" w-4 mr-2 transform hover:text-purple-500 hover:scale-110" >
                    <a @click="mostrarInfoMinerales(productor_mina.id)">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                      </svg>
                    </a>
                  </div>

                  
                    <inertia-link
                    
                      :href="route('productores_minas.edit', productor_mina.id)"
                      class="px-2 font-semibold leading-5 text-xs rounded-full bg-yellow-100 text-yellow-500 hover:text-yellow-800"
                    >
                      Editar
                    </inertia-link>
                    <inertia-link
                      method="delete"
                      :href="route('productores_minas.destroy', productor_mina.id)"
                      class="px-2 font-semibold leading-5 text-xs rounded-full bg-red-100 text-red-500 hover:text-red-800"
                    >
                      Borrar
                    </inertia-link>
                  </td>
                </tr>
              </tbody>
            </table>
            <pagination class="mt-6" :links="borradores.links" />
              <jet-dialog-modal :show="mostrarModal" @close="closeModal">
                <template #title>
                  {{ modal_tittle }}
                </template>
                <template #content>
                  {{ modal_body }}
                </template>
                <template #footer>
                  <div class="flex">
                    <button
                      class="w-1/5 flex items-center justify-center"
                      @click="closeModal"
                    >
                      Cancelar
                    </button>
                    <button
                      @click="eliminarRegistro"
                      class="
                        w-1/5
                        p-2
                        my-2
                        bg-red-500
                        text-white
                        rounded-md
                        focus:outline-none
                        focus:ring-2
                        ring-red-300 ring-offset-2
                        flex
                        items-center
                        justify-center
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
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                      </svg>
                      Si, eliminar
                    </button>
                  </div>
                </template>
              </jet-dialog-modal>
              
              <jet-dialog-modal :show="mostrarModalMineral" @close="closeModal">
                <template #title>
                  {{ modal_tittle }}
                </template>
                <template #content>
                  {{ modal_body }}
                </template>
                <template #footer>
                  <div class="flex">
                    <button
                      class="w-1/5 flex items-center justify-center"
                      @click="closeModal"
                    >
                      Cancelar
                    </button>
                    <button
                      @click="eliminarRegistro"
                      class="
                        w-1/5
                        p-2
                        my-2
                        bg-red-500
                        text-white
                        rounded-md
                        focus:outline-none
                        focus:ring-2
                        ring-red-300 ring-offset-2
                        flex
                        items-center
                        justify-center
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
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                      </svg>
                      Si, eliminar
                    </button>
                  </div>
                </template>
              </jet-dialog-modal>
            </div>
          </div>
        </div>
        <ChartPieB
          :aprobados="$props.datos_donut.aprobados"
          :reprobados="$props.datos_donut.reprobados"
          :borrador_cant="$props.datos_donut.borrador_cant"
          :revision="$props.datos_donut.revision"
          :observacion="$props.datos_donut.observacion"
        ></ChartPieB>
      </div>
    </body>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ChartPieB from "@/Components/charts/pieBorradores";
import JetDialogModal from "@/Jetstream/DialogModal";
import Pagination from "@/Components/Pagination";

export default {
  props: {
    borradores: Object,
    soy_autoridad: Boolean,
    soy_administrador: Boolean,
    soy_productor: Boolean,
    datos_donut: Array,
  },
  components: {
    AppLayout,
    ChartPieB,
    JetDialogModal,
    Pagination,
  },
  data() {
    return {
      mostrarModal: false,
      mostrarModalMineral: false,
      modal_tittle: "",
      modal_body: "",
      id_a_eliminar: 0,
      mostrar_alert_eliminar: false,
    };
  },
  methods: {
    mostrar_editar(estado) {
      if (this.$props.soy_administrador === true) {
        return true;
      }
      console.log(this.$props.soy_productor, this.$props.soy_autoridad);
      if (
        this.$props.soy_productor === true ||
        this.$props.soy_productor === "true"
      ) {
        if (estado === "en proceso") return false;
        if (estado === "borrador") return true;
        if (estado === "con observacion") return true;
        if (estado === "aprobado") return false;
        if (estado === "en revision") return false;
        if (estado === "reprobado") return false;
      } else {
        if (
          this.$props.soy_autoridad === true ||
          this.$props.soy_autoridad === "true"
        ) {
          if (estado === "en proceso") return true;
          if (estado === "borrador") return false;
          if (estado === "con observacion") return false;
          if (estado === "aprobado") return false;
          if (estado === "en revision") return true;
          if (estado === "reprobado") return false;
        }
      }
      return false;
    },
    mostrar_imprimir(estado) {
      /*if(this.$props.soy_productor === true || this.$props.soy_productor === 'true')
            {*/
      if (estado === "en proceso") return false;
      if (estado === "borrador") return false;
      if (estado === "con observacion") return false;
      if (estado === "aprobado") return true;
      if (estado === "en revision") return false;
      if (estado === "reprobado") return false;
      /*}
            else return true;*/
    },

    mostrar_imprimir_comprobante(estado) {
      /*if(this.$props.soy_productor === true || this.$props.soy_productor === 'true')
            {*/
      if (estado === "en proceso") return true;
      if (estado === "borrador") return false;
      if (estado === "con observacion") return true;
      if (estado === "aprobado") return true;
      if (estado === "en revision") return true;
      if (estado === "reprobado") return true;
      /*}
            else return true;*/
    },
    mostrar_borrar(estado) {
      if (
        this.$props.soy_productor === true ||
        this.$props.soy_productor === "true"
      ) {
        if (estado === "en proceso") return false;
        if (estado === "borrador") return true;
        if (estado === "con observacion") return false;
        if (estado === "aprobado") return false;
        if (estado === "en revision") return false;
        if (estado === "reprobado") return false;
      } else {
        if (
          this.$props.soy_autoridad === true ||
          this.$props.soy_autoridad === "true"
        ) {
          if (estado === "en proceso") return true;
          if (estado === "borrador") return false;
          if (estado === "con observacion") return false;
          if (estado === "aprobado") return false;
          if (estado === "en revision") return true;
          if (estado === "reprobado") return false;
        }
      }
    },
    mostrarInfo(id) {
      //buscar los datos en el backend sin recargar datos
      this.mostrarModal = true;
      this.modal_tittle = "Datos de la Mina y Productor";
      this.modal_body = "los datos son::::"+id;

      this.id_a_eliminar = id;
    },
    mostrarInfoMinerales(id) {
      //buscar los datos en el backend sin recargar datos
      // para mostrar la lista de minerales
      this.mostrarModal = true;
      this.modal_tittle = "Datos sdasdasdde la Mina y Productor";
      this.modal_body = "los datos son::::"+id;

      this.id_a_eliminar = id;
    },

    closeModal() {
      this.mostrarModal = false;
      this.mostrarModalMineral = false;
      this.id_a_eliminar = 0;
    },
    eliminarRegistro() {
      let self = this;
      axios
        .delete("/formularios/eliminar_formulario" + "/" + this.id_a_eliminar)
        .then(function (response) {
          console.log(response.data);
          if (response.data.msg === "se elimino correctamente") {
            console.log("todo bien");
            console.log("eliminado");
            self.mostrarModal = false;
            self.mostrar_alert_eliminar = true;
          } else {
            console.log("NO todo bien");
          }
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
    cerrarAviso() {
      this.id_a_eliminar = 0;
      this.mostrar_alert_eliminar = false;
    },
  },
  mounted() {
    console.log(this.$props.datos_donut.aprobados);
  },
};
</script>