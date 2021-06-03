<template>
  <app-layout>
    <div class="flex items-center h-screen w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Editar Reinscripcion
        </h1>
        <form @submit.prevent="submit" class="mb-6">
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Razon Social:</label
            >
            <input
              id="razon_social"
              v-model="form.id_mina"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="price"
              >Email:</label
            >
            <input
              id="email"
              v-model="form.nombre"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <button
            type="submit"
            class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
          >
            Editar
          </button>
          {{nuevo}}
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
  props: ["reinscripcion"],
  data() {
    return {
      form: {
        razon_social:this.$props.reinscripcion.id_mina,
        email: this.$props.reinscripcion.nombre,
      },
      nuevo: this.$props.reinscripcion,
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        route("reinscripciones.update", this.$props.reinscripcion.id),
        this.form
      );
    },
  },
};
</script>