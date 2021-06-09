<template>
  <app-layout>
    <div class="flex items-center h-screen w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Añadir Producto
        </h1>
        <form @submit.prevent="submit" class="mb-6">
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="id_reinscripcion"
              >Id Reinscripcion:</label
            >
            <input
              id="id_reinscripcion"
              v-model="form.id_reinscripcion"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.id_reinscripcion" class="bg-red-200">El Nombre es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="nombre_mineral"
              >nombre_mineral:</label
            >
            <input
              id="nombre_mineral"
              v-model="form.nombre_mineral"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.nombre_mineral" class="bg-red-200">El nombre_mineral es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="variedad"
              >variedad:</label
            >
            <input
              id="variedad"
              v-model="form.variedad"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.variedad" class="bg-red-200">El variedad es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="produccion"
              >produccion:</label
            >
            <input
              id="produccion"
              v-model="form.produccion"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.produccion" class="bg-red-200">El produccion es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="unidades"
              >unidades:</label
            >
            <input
              id="unidades"
              v-model="form.unidades"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.unidades" class="bg-red-200">El unidades es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="otra_unidad"
              >otra_unidad:</label
            >
            <input
              id="otra_unidad"
              v-model="form.otra_unidad"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.otra_unidad" class="bg-red-200">El otra_unidad es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="precio_venta"
              >precio_venta:</label
            >
            <input
              id="precio_venta"
              v-model="form.precio_venta"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.precio_venta" class="bg-red-200">El precio_venta es Requerido</div>
          </div>
           <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="created_by"
              >created_by:</label
            >
            <input
              id="created_by"
              v-model="form.created_by"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.created_by" class="bg-red-200">El created_by es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="estado"
              >estado:</label
            >
            <input
              id="estado"
              v-model="form.estado"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.estado" class="bg-red-200">El estado es Requerido</div>
          </div>
          <button
            type="submit"
            class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
          >
            Añadir
          </button>
        </form>
      </div>
    </div>
  </app-layout>
</template>



<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        id_reinscripcion: null,
        nombre_mineral: null,
        variedad: null,
        produccion: null,
        unidades: null,
        otra_unidad: null,
        precio_venta: null,
        created_by: null,
        estado: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route('productos.store'), this.form);
    },
  },
};
</script>