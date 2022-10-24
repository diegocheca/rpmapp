<template>
  <app-layout>
    <div class="flex items-center h-screen w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Añadir Pago
        </h1>
        <form @submit.prevent="submit" class="mb-6">
           <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="productor"
              >Productor :</label
            >
          <select v-model="form.id_prod_min">
            <option value="-1" selected>Sin Prod</option>
            <option v-for="productor in productores" v-bind:key="productor.id" :value="productor.id">
                                {{productor.razonsocial}} - {{productor.nombre}}
                            </option>
          </select>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="pagado"
              >pagado :</label
            >
            <label><input type="checkbox" id="cbox1" value="true" v-model="form.pagado"> Pagado</label><br>
            <!--<input
              id="pagado"
              v-model="form.pagado"
              class="border py-2 px-3 text-grey-darkest"
            />-->
            <div v-if="errors.pagado" class="bg-red-200">El Nombre es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="fecha_pago"
              >fecha_pago:</label
            >
            <input
              type="date"
              id="fecha_pago"
              v-model="form.fecha_pago"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.fecha_pago" class="bg-red-200">El Email es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="monto"
              >monto :</label
            >
            <input
            type="number"
            step="0.01"
              id="monto"
              v-model="form.monto"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.monto" class="bg-red-200">El monto es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="fecha_desde"
              >fecha_desde :</label
            >
            <input
            type="date"
              id="fecha_desde"
              v-model="form.fecha_desde"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.fecha_desde" class="bg-red-200">El fecha_desde es Requerido</div>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="fecha_hasta"
              >fecha_hasta :</label
            >
            <input
            type="date"

              id="fecha_hasta"
              v-model="form.fecha_hasta"
              class="border py-2 px-3 text-grey-darkest"
            />
            <div v-if="errors.fecha_hasta" class="bg-red-200">El fecha_hasta es Requerido</div>
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="estado"
              >estado :</label
            >
            <!--<input
              id="estado"
              v-model="form.estado"
              class="border py-2 px-3 text-grey-darkest"
            />-->
            <select v-model="form.estado">
            <option value="aprobado" selected>Aprobado</option>
            <option value="reprobado" selected>Reprobado</option>
            <option value="observado" selected>Observado</option>
            <option value="sin estado" selected>Sin Estado</option>
          </select>

            <div v-if="errors.estado" class="bg-red-200">El estado es Requerido</div>
          </div>


           


          {{form}}
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
    productores : Object,
    errors: Object,
  },
  data() {
    return {
      form: {
        id_prod_min: null,
        pagado: false,
        fecha_pago: null,
        monto: null,
        fecha_desde: null,
        fecha_hasta: null,
        estado: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route('pagos.store'), this.form);
    },
  },
};
</script>