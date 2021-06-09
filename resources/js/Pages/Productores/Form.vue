<template>
  <app-layout>
    <div class="flex items-center w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
          <FormAddEditProductores :productor="productor_this" :title="'Agregando Nuevo Productor'"></FormAddEditProductores>
      </div>
    </div>
  </app-layout>
</template>



<script>
import AppLayout from "@/Layouts/AppLayout";
import Dropdown from '@/Jetstream/Dropdown';
import FormAddEditProductores from './FormAddEditProductores';
export default {
  components: {
    AppLayout,
    Dropdown,
    FormAddEditProductores,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      mostrar: false,
      productor_this: {
        id: null,
				cuit: null,
        razonsocial: null,
        numeroproductor: null,
        email: null,
        domicilio_prod: null,
        tiposociedad: null,
        inscripciondgr: null,
        constaciasociedad: null,
        leal_calle: null,
        leal_numero: null,
        leal_telefono: null,
        leal_pais: null,
        leal_provincia: null,
        leal_departamento: null,
        leal_localidad: null,
        leal_cp: null,
        leal_otro: null,
        administracion_calle: null,
        administracion_numero: null,
        administracion_telefono: null,
        administracion_pais: null,
        administracion_provincia: null,
        administracion_departamento: null,
        administracion_localidad: null,
        administracion_cp: null,
        administracion_otro: null,
        numero_expdiente: null,
        created_by: null,
        estado: null,
			},
    };
  },
  methods: {
    
  },
};
</script>