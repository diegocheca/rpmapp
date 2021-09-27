<template>
  <app-layout>
    <div>
      <h1
        class="
          text-center text-2xl
          font-bold
          leading-7
          text-gray-300
          sm:text-3xl
          sm:truncate
          py-1
          bg-gradient-to-l
          from-indigo-500
          to-indigo-800
        "
      >
        Crear Nuevo Permiso
      </h1>
      <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form @submit.prevent="submit" class="mb-6">
              <div
                class="
                  grid grid-cols-1
                  md:grid-cols-11
                  gap-5
                  md:gap-8
                  mt-5
                  mx-7
                "
              >
                <!-- categorias -->
                <div class="grid grid-cols-1 md:col-span-2">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Categorias</label
                  >
                  <select
                    id="categoria"
                    v-model="form.category_id"
                    required
                    class="
                      py-2
                      px-3
                      rounded-lg
                      border-2 border-purple-300
                      mt-1
                      focus:outline-none
                      focus:ring-2 focus:ring-purple-600
                      focus:border-transparent
                    "
                  >
                    <option
                      v-for="categorie in categories"
                      v-bind:key="categorie.id"
                      :value="categorie.id"
                    >
                      {{ categorie.name }}
                    </option>
                  </select>
                </div>
                <!-- nombre -->
                <div class="grid grid-cols-1 md:col-span-3">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Nombre de Permiso</label
                  >
                  <input
                    id="nombre"
                    v-model="form.name"
                    class="
                      py-2
                      px-3
                      rounded-lg
                      border-2 border-purple-300
                      mt-1
                      focus:outline-none
                      focus:ring-2 focus:ring-purple-600
                      focus:border-transparent
                    "
                    type="text"
                    placeholder="Ingrese nombre del nuevo permiso ( ej: web.permisos.index )"
                  />
                </div>
                <!-- metodos -->
                <div class="grid grid-cols-1 md:col-span-2">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Método</label
                  >
                  <select
                    id="funciones"
                    v-model="form.M_name"
                    required
                    class="
                      py-2
                      px-3
                      rounded-lg
                      border-2 border-purple-300
                      mt-1
                      focus:outline-none
                      focus:ring-2 focus:ring-purple-600
                      focus:border-transparent
                    "
                  >
                    <option>ninguno</option>
                    <option>index</option>
                    <option>create</option>
                    <option>store</option>
                    <option>show</option>
                    <option>edit</option>
                    <option>update</option>
                    <option>destroy</option>
                  </select>
                </div>
                <!-- descripcion -->
                <div class="grid grid-cols-1 md:col-span-4">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Descripción</label
                  >
                  <input
                    id="description"
                    v-model="form.description"
                    class="
                      py-2
                      px-3
                      rounded-lg
                      border-2 border-purple-300
                      mt-1
                      focus:outline-none
                      focus:ring-2 focus:ring-purple-600
                      focus:border-transparent
                    "
                    type="text"
                    placeholder="Ingrese descripción del permiso"
                  />
                </div>
              </div>
              <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                <inertia-link
                  :href="route('admin.permisos.index')"
                  class="
                    w-auto
                    bg-gray-500
                    hover:bg-gray-700
                    rounded-lg
                    shadow-xl
                    font-medium
                    text-white
                    px-4
                    py-2
                  "
                  type="button"
                >
                  Cancelar
                </inertia-link>
                <button
                  type="submit"
                  class="
                    w-auto
                    bg-purple-500
                    hover:bg-purple-700
                    rounded-lg
                    shadow-xl
                    font-medium
                    text-white
                    px-4
                    py-2
                  "
                >
                  Guardar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
  components: {
    AppLayout,
  },
  props: {
    categories: Array,
    errors: Object,
  },
  data() {
    return {
      form: {
        name: null,
        description: null,
        category_id: 1,
        M_name: "ninguno",
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("admin.permisos.store"), this.form);
    },
  },
};
</script>