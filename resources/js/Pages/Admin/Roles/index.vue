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
          bg-gradient-to-l
          from-indigo-500
          to-indigo-800
        "
      >
        Lista de Roles
      </h1>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-xl sm:rounded-md">
            <inertia-link
              align="right"
              v-if="hasAnyPermission(['admin.roles.create'])"
              :href="route('admin.roles.create')"
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
              as="button"
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
              <span class="mx-3">Nuevo Rol</span>
            </inertia-link>

            <table
              class="
                rounded-t-md
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
                    Role
                  </th>
                  <th
                    v-if="
                      hasAnyPermission([
                        'admin.roles.edit',
                        'admin.roles.destroy',
                      ])
                    "
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
                <tr v-for="(rol, index) in roles" :key="index">
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
                          {{ rol.id }}
                        </div>
                      </div>
                    </div>
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm">
                      {{ rol.name }}
                    </div>
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm"
                                            v-for="(
                                                rol, index
                                            ) in usuario.roles"
                                            :key="index"
                                        >
                                            {{ rol.name }}
                                        </div>
                                    </td> -->
                  <td
                    v-if="
                      hasAnyPermission([
                        'admin.roles.edit',
                        'admin.roles.destroy',
                      ])
                    "
                    class="px-6 py-4 whitespace-nowrap"
                    width="10px"
                  >
                    <!-- Editar -->
                    <inertia-link
                      v-if="hasAnyPermission(['admin.roles.edit'])"
                      :href="route('admin.roles.edit', rol)"
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
                      as="button"
                    >
                      Editar
                    </inertia-link>
                    <!-- Borrar -->
                    <a
                      v-if="hasAnyPermission(['admin.roles.destroy'])"
                      href="#"
                      @click="deleteUser(rol)"
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
                        justify-self-end
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
    roles: Array,
  },
  components: {
    AppLayout,
  },
  methods: {
    deleteUser(rol) {
      Swal.fire({
        title: "Eliminar Rol",
        text: "Esta seguro de eliminar este Rol?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.eliminarRegistro(rol.id);
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
        .delete("/admin/eliminar_rol" + "/" + id)
        .then(function (response) {
          // console.log(response.data);
          Swal.hideLoading(Swal.clickConfirm());
          if (response.data.status === "ok") {
            Swal.fire({
              icon: "success",
              title: "El rol fue eliminado correctamente.",
            }).then((result) => {
              self.$inertia.get(route("admin.roles.index"));
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