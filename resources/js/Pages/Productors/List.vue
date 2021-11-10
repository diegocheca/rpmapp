<template>
  <app-layout>
    <h2
      class="
        text-center text-2xl
        font-bold
        leading-7
        text-gray-300
        sm:text-3xl
        sm:truncate
        bg-gray-800
      "
    >
      Lista de Borradores Cargados
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
            <div class="flex flex-row-reverse mt-3">
              <inertia-link
                :href="route('formulario-alta.create')"
                class="
                  bg-blue-500
                  hover:bg-blue-800
                  rounded
                  text-white
                  px-9
                  py-3
                "
              >
                Nuevo Borrador
              </inertia-link>
            </div>
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
                <thead>
                  <tr
                    class="
                      bg-gray-200
                      text-gray-600
                      uppercase
                      text-sm
                      leading-normal
                    "
                  >
                    <th class="py-3 px-6 text-left">Id</th>
                    <th class="py-3 px-6 text-left">Usuario</th>
                    <th class="py-3 px-6 text-center">Email</th>
                    <th class="py-3 px-6 text-center">Estado</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                  <tr
                    v-for="(productor, index) in borradores.data"
                    :key="productor.id"
                    :class="{ 'bg-gray-100': index % 2 === 0 }"
                  >
                    <td class="py-3 px-6 text-left">
                      <div class="flex items-center">
                        <!-- <div class="mr-2">
                                                    <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                                </div> -->
                        <span class="font-medium">{{ productor.id }}</span>
                      </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                      <div class="flex items-center">
                        <div class="mr-2">
                          <img
                            class="w-6 h-6 rounded-full"
                            src="https://randomuser.me/api/portraits/women/2.jpg"
                          />
                        </div>
                        <span>{{ productor.razonsocial }}</span>
                      </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                      <div class="flex items-center justify-center">
                        <!-- <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/> -->

                        {{ productor.email }}
                      </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                      <span
                        v-if="productor.estado === 'en proceso'"
                        class="
                          bg-purple-200
                          text-purple-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >En proceso</span
                      >
                      <span
                        v-if="productor.estado === 'borrador'"
                        class="
                          bg-pink-200
                          text-pink-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >Borrador</span
                      >
                      <span
                        v-if="productor.estado === 'aprobado'"
                        class="
                          bg-green-200
                          text-green-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >Aprobado</span
                      >
                      <span
                        v-if="productor.estado === 'en revision'"
                        class="
                          bg-yellow-200
                          text-yellow-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >En revision</span
                      >
                      <span
                        v-if="productor.estado === 'con observacion'"
                        class="
                          bg-gray-200
                          text-gary-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >Con Obesrvacion</span
                      >
                      <span
                        v-if="productor.estado === 'reprobado'"
                        class="
                          bg-red-200
                          text-red-600
                          py-1
                          px-3
                          rounded-full
                          text-xs
                        "
                        >Reprobado</span
                      >
                    </td>
                    <td class="py-3 px-6 text-center">
                      <div class="flex item-center justify-center">
                        <div
                          class="
                            w-4
                            mr-2
                            transform
                            hover:text-purple-500
                            hover:scale-110
                          "
                        >
                          <inertia-link
                            :href="route('formulario-alta.show', productor.id)"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
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
                          </inertia-link>
                        </div>

                        <div
                          class="
                            w-4
                            mr-2
                            transform
                            hover:text-purple-500
                            hover:scale-110
                          "
                        >
                          <inertia-link
                            v-if="mostrar_editar(productor.estado)"
                            :href="route('formulario-alta.edit', productor.id)"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                              />
                            </svg>
                          </inertia-link>
                        </div>
                        <div
                          v-if="mostrar_imprimir_comprobante(productor.estado)"
                          class="
                            w-4
                            mr-2
                            transform
                            hover:text-purple-500
                            hover:scale-110
                          "
                        >
                          <a
                            :href="
                              route(
                                'comprobante_inicio',
                                productor.id
                              )
                            "
                            target="_blank"
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
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                              />
                            </svg>
                          </a>
                          
                        </div>

                        <div
                          v-if="mostrar_imprimir(productor.estado)"
                          class="
                            w-4
                            mr-2
                            transform
                            hover:text-purple-500
                            hover:scale-110
                          "
                        >
                          <inertia-link
                            :href="route('formulario-alta-pdf', productor.id)"
                            target="_blank"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-6 w-6"
                              fill="none"
                              viewBox="0 0 28 28"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"
                              />
                            </svg>
                          </inertia-link>
                        </div>
                        <div
                          v-if="mostrar_borrar(productor.estado)"
                          class="
                            w-4
                            mr-2
                            transform
                            hover:text-purple-500
                            hover:scale-110
                          "
                        >
                          <inertia-link
                            href="#"
                            @click="confirmationDelete(productor.id)"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-6 w-6"
                              fill="none"
                              viewBox="0 0 28 28"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                              />
                            </svg>
                          </inertia-link>
                        </div>
                      </div>
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
import Swal from "sweetalert2";

export default {
  props: {
    borradores: Object,
    lista_minerales_cargados: Array,
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
    confirmationDelete(id) {
      this.mostrarModal = true;
      this.modal_tittle = "Eliminando Formulario";
      this.modal_body = "Esta seguro de eliminar este registro?";
      this.id_a_eliminar = id;
    },
    closeModal() {
      this.mostrarModal = false;
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