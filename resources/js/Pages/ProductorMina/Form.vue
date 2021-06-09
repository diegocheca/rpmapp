<template>
  <app-layout>
    <div class="flex items-center w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
          <FormAddEditProdMina :productor_mina="productor_mina" :title="'Agregando Nueva relacion entre productor y minas'"></FormAddEditProdMina>
      </div>
    </div>
  </app-layout>
</template>



<script>
import AppLayout from "@/Layouts/AppLayout";
import Dropdown from '@/Jetstream/Dropdown';
import FormAddEditProdMina from './FormAddEditProdMina';
export default {
  components: {
    AppLayout,
    Dropdown,
    FormAddEditProdMina,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      mostrar: false,
      productor_mina: {
        id: null,
				id_mina: null,
				id_productor: null,
				id_destino: null,
				id_dia: null,
				id_personal: null,
				mercado_provincia: null,
				mercado_provincias: null,
				mercado_exportacion: null,
				num_expediente_SIGETRAMI: null,
				constancia_otros: null,
				resol_concecion_minera: null,
				fecha_preinscripcion: null,
				fecha_renovacion: null,
				primera_inscripcion: null,
				caracter: null,
				constancia_posecion: null,
				id_producido: null,
			},
    };
  },
  methods: {
    submit() {
      
      this.$inertia.post(route('productores_minas.store'), this.form);
    },
  },
};
</script>