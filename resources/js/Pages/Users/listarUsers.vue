<template>
  <app-layout>
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
      LISTA DE USUARIOS
    </h1>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-md">
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
                <!-- <th
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
                                </th> -->
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
                  Provincia
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
                  Rol
                </th>
                <th
                  v-if="hasAnyPermission(['admin.users.edit'])"
                  scope="col"
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
              <tr v-for="(usuario, index) in usuarios" :key="index">
                <td class="px-1 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium">
                        {{ index + 1 }}
                      </div>
                    </div>
                  </div>
                </td>
                <!-- <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ usuario.id }}
                                            </div>
                                        </div>
                                    </div>
                                </td> -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="uppercase text-sm font-medium text-white-900">
                        {{ usuario.name }}
                      </div>
                      <div class="text-sm text-yellow-500">
                        {{ usuario.email }}
                      </div>
                    </div>
                  </div>
                  <!-- <div class="text-sm">
                                        {{ usuario.name }}
                                    </div> -->
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm">
                    {{ usuario.provincia?.nombre }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div
                    class="text-sm"
                    v-for="(rol, index) in usuario.roles"
                    :key="index"
                  >
                    {{ rol.name }}
                  </div>
                </td>
                <td
                  v-if="hasAnyPermission(['admin.users.edit'])"
                  class="px-6 py-4 whitespace-nowrap"
                  width="1"
                >
                  <inertia-link
                    v-if="hasAnyPermission(['admin.users.edit'])"
                    :href="route('admin.users.edit', usuario)"
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
                  <!-- :href="route('admin.users.destroy', usuario)" -->
                  <a
                    v-if="hasAnyPermission(['admin.users.destroy'])"
                    href="#"
                    @click="deleteUser(usuario)"
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
  </app-layout>
</template>
<script>
import Swal from "sweetalert2";
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
  props: {
    usuarios: Array,
  },
  components: {
    AppLayout,
  },
  methods: {
    deleteUser(usuario) {
      Swal.fire({
        title: "Eliminar Usuario",
        text: "Esta seguro de eliminar este Usuario?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.eliminarRegistro(usuario.id);
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
        .delete("/admin/eliminar_usuario" + "/" + id)
        .then(function (response) {
          // console.log(response.data);
          Swal.hideLoading(Swal.clickConfirm());
          if (response.data.status === "ok") {
            Swal.fire({
              icon: "success",
              title: "El usuario fue eliminado correctamente.",
            }).then((result) => {
              self.$inertia.get(route("admin.users.index"));
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