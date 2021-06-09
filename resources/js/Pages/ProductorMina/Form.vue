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
      productor_mina:[],
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route('productores_minas.store'), this.form);
    },
  },
};
</script>