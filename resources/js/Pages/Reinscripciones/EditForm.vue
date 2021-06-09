<template>
  <app-layout>
    <div class="flex items-center h-full w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Editar reinscripciones
        </h1>
        <form @submit.prevent="submit" class="mb-6">
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="id_mina"
              >Razid_minaon :</label
            >
            <input
              id="id_mina"
              v-model="form.id_mina"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="id_productor"
              >id_productor :</label
            >
            <input
              id="id_productor"
              v-model="form.id_productor"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="fecha_vto"
              >fecha_vto:</label
            >
            <input
              id="fecha_vto"
              v-model="form.fecha_vto"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="prospeccion"
              > prospeccion:</label
            >
            <input
              id="prospeccion"
              v-model="form.prospeccion"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="explotacion"
              > explotacion:</label
            >
            <input
              id="explotacion"
              v-model="form.explotacion"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="desarrollo"
              > desarrollo:</label
            >
            <input
              id="desarrollo"
              v-model="form.desarrollo"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>



          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="cantidad_productos"
              > cantidad_productos:</label
            >
            <input
              id="cantidad_productos"
              v-model="form.cantidad_productos"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="porcentaje_venta_provincia"
              > porcentaje_venta_provincia:</label
            >
            <input
              id="porcentaje_venta_provincia"
              v-model="form.porcentaje_venta_provincia"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="porcentaje_venta_otras_provincias"
              > porcentaje_venta_otras_provincias:</label
            >
            <input
              id="porcentaje_venta_otras_provincias"
              v-model="form.porcentaje_venta_otras_provincias"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="porcentaje_exportado"
              >porcentaje_exportado:</label
            >
            <input
              id="porcentaje_exportado"
              v-model="form.porcentaje_exportado"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_perm_profesional"
              >personal_perm_profesional:</label
            >
            <input
              id="personal_perm_profesional"
              v-model="form.personal_perm_profesional"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_perm_operarios"
              >personal_perm_operarios:</label
            >
            <input
              id="personal_perm_operarios"
              v-model="form.personal_perm_operarios"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_perm_administrativos"
              >personal_perm_administrativos:</label
            >
            <input
              id="personal_perm_administrativos"
              v-model="form.personal_perm_administrativos"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>



          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_perm_otros"
              >personal_perm_otros:</label
            >
            <input
              id="personal_perm_otros"
              v-model="form.personal_perm_otros"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_trans_profesional"
              >personal_trans_profesional:</label
            >
            <input
              id="personal_trans_profesional"
              v-model="form.personal_trans_profesional"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_trans_operarios"
              >personal_trans_operarios:</label
            >
            <input
              id="personal_trans_operarios"
              v-model="form.personal_trans_operarios"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_trans_administrativos"
              >personal_trans_administrativos:</label
            >
            <input
              id="personal_trans_administrativos"
              v-model="form.personal_trans_administrativos"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="personal_trans_otros"
              >personal_trans_otros:</label
            >
            <input
              id="personal_trans_otros"
              v-model="form.personal_trans_otros"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="nombre"
              >nombre:</label
            >
            <input
              id="nombre"
              v-model="form.nombre"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="dni"
              >dni:</label
            >
            <input
              id="dni"
              v-model="form.dni"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="cargo"
              >cargo:</label
            >
            <input
              id="cargo"
              v-model="form.cargo"
              class="border py-2 px-3 text-grey-darkest"
            />
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
          </div>


          <button
            type="submit"
            class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
          >
            Editar
          </button>

          <inertia-link
              :href="route('productos.index')"
              class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900"
            >
              Volver
            </inertia-link>

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
        id_mina: this.$props.reinscripcion.id_mina,
        id_productor: this.$props.reinscripcion.id_productor,

        fecha_vto: this.$props.reinscripcion.fecha_vto,
        prospeccion: this.$props.reinscripcion.prospeccion,
        explotacion: this.$props.reinscripcion.explotacion,
        desarrollo: this.$props.reinscripcion.desarrollo,
        cantidad_productos: this.$props.reinscripcion.cantidad_productos,
        porcentaje_venta_provincia: this.$props.reinscripcion.porcentaje_venta_provincia,
        porcentaje_venta_otras_provincias: this.$props.reinscripcion.porcentaje_venta_otras_provincias,
        porcentaje_exportado: this.$props.reinscripcion.porcentaje_exportado,


        personal_perm_profesional: this.$props.reinscripcion.personal_perm_profesional,
        personal_perm_operarios: this.$props.reinscripcion.personal_perm_operarios,
        personal_perm_administrativos: this.$props.reinscripcion.personal_perm_administrativos,
        personal_perm_otros: this.$props.reinscripcion.personal_perm_otros,
        personal_trans_profesional: this.$props.reinscripcion.personal_trans_profesional,
        personal_trans_operarios: this.$props.reinscripcion.personal_trans_operarios,

        personal_trans_administrativos: this.$props.reinscripcion.personal_trans_administrativos,
        personal_trans_otros: this.$props.reinscripcion.personal_trans_otros,
        nombre: this.$props.reinscripcion.nombre,
        dni: this.$props.reinscripcion.dni,
        cargo: this.$props.reinscripcion.cargo,
        estado: this.$props.reinscripcion.estado,

      },
      nuevo: this.$props.reinscripcion,
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        route("reinscripciones.update", this.$props.reinscripciones.id),
        this.form
      );
    },
  },
};
</script>