<template>
  <app-layout>
    <div>
      <h1
        class="
          text-center text-2xl
          font-bold
          leading-7
          text-gray-300
          sm:text-3xl sm:truncate
          py-1
          bg-gradient-to-b
          from-yellow-900
          to-slate-700
        "
      >
        Lista de Categorias
      </h1>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-xl sm:rounded-lg">
            <inertia-link
              :href="route('admin.categorias.create')"
              class="
                bg-pink-600
                px-4
                py-2
                font-semibold
                text-white
                inline-flex
                items-center
                space-x-2
                rounded
              "
              type="button"
            >
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fas"
                data-icon="plus"
                class="w-5 h-5 fill-current"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
              >
                <path
                  d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"
                ></path>
              </svg>
              <span class="mx-3">Nueva Categoria</span>
            </inertia-link>

            <table
              class="
                rounded-t-lg
                mt-5
                min-w-full
                mx-auto
                bg-gray-800
                text-gray-100
              "
            >
              <thead>
                <tr class="text-left border-b border-gray-300">
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-100
                      uppercase
                      tracking-wider
                    "
                  >
                    #
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-100
                      uppercase
                      tracking-wider
                    "
                  >
                    ID
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-100
                      uppercase
                      tracking-wider
                    "
                  >
                    Nombre
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-100
                      uppercase
                      tracking-wider
                    "
                  >
                    Descripción
                  </th>
                  <th
                    v-if="hasAnyPermission(['admin.categorias.edit'])"
                    scope="col"
                    colspan="2"
                    class="
                      px-6
                      py-3
                      text-center text-xs
                      font-medium
                      text-gray-100
                      uppercase
                      tracking-wider
                    "
                  >
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody class="bg-gray-700 border-b border-gray-600 text-gray-200">
                <tr v-for="(categoria, index) in categorias" :key="index">
                  <td class="px-1 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium">
                          {{ index + 1 }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-3 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium">
                          {{ categoria.id }}
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm">
                      {{ categoria.name }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm">
                      {{ categoria.description }}
                    </div>
                  </td>
                  <td
                    v-if="hasAnyPermission(['admin.categorias.edit'])"
                    class="px-6 py-4 whitespace-nowrap"
                    width="10px"
                  >
                    <!-- Editar -->
                    <inertia-link
                      v-if="hasAnyPermission(['admin.categorias.edit'])"
                      :href="route('admin.categorias.edit', categoria)"
                      class="
                        flex-shrink-0
                        bg-purple-600
                        text-white text-base
                        font-semibold
                        py-2
                        px-4
                        rounded-sm
                        shadow-md
                        hover:bg-purple-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-purple-500
                        focus:ring-offset-2
                        focus:ring-offset-purple-200
                      "
                      type="button"
                    >
                      Editar
                    </inertia-link>
                    <!-- Borrar -->
                    <a
                      v-if="hasAnyPermission(['admin.categorias.destroy'])"
                      href="#"
                      @click="deleteUser(categoria)"
                      class="
                        ml-1
                        flex-shrink-0
                        bg-pink-500
                        text-white text-base
                        font-semibold
                        py-2
                        px-4
                        rounded-sm
                        shadow-md
                        hover:bg-pink-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-pink-500
                        focus:ring-offset-2
                        focus:ring-offset-pink-200
                      "
                      type="button"
                      as="button"
                    >
                      Borrar
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import Swal from "sweetalert2";
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
  props: {
    categorias: Array,
  },
  components: {
    AppLayout,
  },
  methods: {
    deleteUser(categoria) {
      Swal.fire({
        title: "Eliminar Categoria",
        text: "Esta seguro de eliminar esta Categoria?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.eliminarRegistro(categoria.id);
        }
      });
    },
    eliminarRegistro(id) {
      let self = this;
      Swal.fire({
        title: "¡Por favor Espere!",
        html: "Eliminado",
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
          Swal.showLoading();
        },
      });
      axios
        .delete("/admin/eliminar_categorias" + "/" + id)
        .then(function (response) {
          // console.log(response.data);
          Swal.hideLoading(Swal.clickConfirm());
          if (response.data.status === "ok") {
            Swal.fire({
              icon: "success",
              title: "La categorias fue eliminado correctamente.",
            }).then((result) => {
              self.$inertia.get(route("admin.categorias.index"));
            });
          } else {
            console.log("Error");
            Swal.fire({
              icon: "error",
              title: "Error...",
              text: "Por favor comuniquese con el administrador.",
            });
          }
        })
        .catch(function (error) {
          Swal.hideLoading();
          Swal.fire({
            icon: "error",
            title: "Error...",
            text: error,
          });
          console.log(error);
        });
    },
  },
};
</script>
