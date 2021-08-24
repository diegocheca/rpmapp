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
        Crear Nuevo Roles
      </h1>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form @submit.prevent="submit" class="mb-6">
              <div
                class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
              >
                <div class="grid grid-cols-1">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Nombre de Rol</label
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
                    placeholder="Ingrese nombre de nuevo rol"
                  />
                </div>
              </div>
              <!--  LISTA DE ROLES -->
              <div class="grid grid-cols-1 mt-5 mx-7">
                <div class="mb-3">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Listados de Permisos</label
                  >
                </div>
                <div style="bg-white">
                  <ul class="flex cursor-pointer">
                    <div v-for="(categoria, index) in categorias" :key="index">
                      <li
                        v-on:click="activetab = categoria.id"
                        v-bind:class="[
                          activetab === categoria.id
                            ? 'active border-gray-400 text-white bg-blue-700 font-black'
                            : '',
                        ]"
                        class="
                          py-2
                          px-6
                          bg-white
                          rounded-t-lg
                          text-gray-500
                          focus:outline-none
                          border-b-2
                          hover:text-white
                          hover:border-b-2
                          hover:font-medium
                          hover:bg-blue-700
                          hover:border-gray-400
                          hover:font-black
                        "
                      >
                        {{ categoria.description }}
                      </li>
                    </div>
                  </ul>
                </div>
                <div
                  class="content"
                  v-for="(categoria, index) in categorias"
                  :key="index"
                >
                  <div v-if="activetab === categoria.id" class="tabcontent">
                    <!--  LISTA DE ROLES -->
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <div>
                        <div class="grid grid-cols-4 grid-rows-3 gap-1">
                          <div
                            v-for="(permiso, index) in filterCategory"
                            :key="index"
                          >
                            <label v-if="permiso.category_id === categoria.id">
                              <input
                                :id="permiso.name"
                                :value="permiso.id"
                                name="rol"
                                checked="false"
                                type="checkbox"
                                class="mr-1"
                                v-model="form.checkedpermisos"
                              />
                              {{ permiso.description }}
                            </label>
                          </div>
                        </div>
                        <br />
                        <span>Permisos ID: {{ form.checkedpermisos }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                <inertia-link
                  :href="route('admin.roles.index')"
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
    permisos: Array,
    categorias: Array,
    errors: Object,
  },
  data() {
    return {
      form: {
        name: null,
        checkedpermisos: [],
      },
      activetab: 1,
    };
  },
  computed: {
    filterCategory() {
      return this.permisos.filter(
        (item, index) => item.category_id === this.activetab
      );
    },
  },
  methods: {
    submit() {
      this.$inertia.post(route("admin.roles.store"), this.form);
    },
  },
};
</script>
