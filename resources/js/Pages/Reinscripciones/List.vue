<template>
  <app-layout class="bg-gray-100">
    <h2
      class="
        text-center text-2xl
        font-bold
        leading-7
        text-gray-300
        sm:text-3xl sm:truncate
        bg-gray-800
      "
    >
      Reinscripciones
    </h2>
    <div class="overflow-x-auto">
      <div class="w-11/12 flex flex-row-reverse mt-3">
        <inertia-link
          :href="route('reinscripciones.create')"
          class="bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3"
          >Nueva Reinscripcion</inertia-link
        >
      </div>

      <div
        class="
          min-w-screen
          flex
          items-center
          justify-center
          font-sans
          overflow-hidden
        "
      >
        <div
          v-if="reinscripciones.length == 0"
          class="w-full flex flex-col items-center mt-14 text-gray-400"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-20 w-20"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
            />
          </svg>
          <p class="text-2xl">No se han registrado reinscripciones</p>
        </div>
        <div v-if="reinscripciones.length > 0" class="w-full lg:w-5/6">
          <div class="bg-white shadow-md rounded my-6">
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
                  <th class="py-3 px-6 text-left">Mina</th>
                  <th class="py-3 px-6 text-center">Productor</th>
                  <th class="py-3 px-6 text-center">Nombre y apellido</th>
                  <th class="py-3 px-6 text-center">Estado</th>
                  <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <tr
                  v-for="reinscripcion in reinscripciones"
                  :key="reinscripcion.id"
                >
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span class="font-medium">{{ reinscripcion.mina }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span>{{ reinscripcion.razonsocial }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                      {{ reinscripcion.encargado?? '-' }}
                    </div>
                  </td>
                  <td class="py-3 px-6 text-center">
                    <span
                      class="py-1 px-3 rounded-full text-xs"
                      :class="[statusColors[reinscripcion.estado]]"
                      >{{ reinscripcion.estado }}</span
                    >
                  </td>
                  <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-purple-500 hover:scale-110
                        "
                      >
                        <a
                          v-if="hasAnyPermission(['reinscripciones.revision'])"
                          :href="
                            route('reinscripciones.revision', reinscripcion.id)
                          "
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
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                            />
                          </svg>
                        </a>
                      </div>
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-purple-500 hover:scale-110
                        "
                      >
                        <a
                          :href="
                            route('reinscripciones.edit', reinscripcion.id)
                          "
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
                        </a>
                      </div>
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-purple-500 hover:scale-110
                        "
                      >
                        <!-- <inertia-link
                                                method="delete"
                                                v-if="hasAnyPermission(['reinscripciones.destroy'])" :href="route('reinscripciones.destroy', reinscripcion.id)"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </inertia-link> -->
                        <svg
                          v-if="hasAnyPermission(['reinscripciones.destroy'])"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          @click="showModal(reinscripcion.id)"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <ChartBarM v-if="hasAnyPermission(['reinscripciones.revision'])" />
    </div>
    <jet-dialog-modal
      v-if="hasAnyPermission(['reinscripciones.revision'])"
      :show="modalConfirmDelete"
      :maxWidth="'md'"
      @close="closeModal"
    >
      <template #title> ¿Deseas eliminar el elemento? </template>
      <template #footer>
        <jet-button class="ml-2" @click="deleteElement(true)"> SI </jet-button>
      </template>
    </jet-dialog-modal>
  </app-layout>
</template>


<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout";
import ChartBarM from "@/Components/charts/barminerales";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    reinscripciones: Array,
  },
  components: {
    AppLayout,
    ChartBarM,
    JetDialogModal,
    JetButton,
  },
  data() {
    const statusColors = {
      aprobado: "bg-green-200 text-green-600",
      rechazado: "bg-red-200 text-red-600",
      "en proceso": "bg-yellow-200 text-yellow-600",
    };

    return {
      statusColors,
      modalConfirmDelete: false,
      idDelete: null,
    };
  },
  methods: {
    showModal(id) {
      this.modalConfirmDelete = true;
      this.idDelete = id;
    },
    closeModal() {
      this.modalConfirmDelete = false;
    },
    deleteElement(confirm) {
      Inertia.delete(`/reinscripciones/destroy/${this.idDelete}`, {
        onBefore: () => confirm,
        // onBefore: () => confirm('Are you sure you want to delete this user?'),
      });
      this.closeModal();
    },
  },
};
</script>
