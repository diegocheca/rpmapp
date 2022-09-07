<template>
  <app-layout>
    <h1>dasdsa</h1>
  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDialogModal from '@/Jetstream/DialogModal';
//import Button from '../../Jetstream/Button.vue';

export default {
  props: {
    number: Integer,
  },
  
  data() {
    return {
      confirmingUserDeletion:false,
			modal_tittle: 'este es el titulo',
			modal_body: 'este es el cuerpo',
    };
  },
  components: {
    AppLayout,
    JetDialogModal,
    Pagination
    //Button,
  },
  methods: {
		closeModal() {
				this.confirmingUserDeletion = false
				//this.form.reset()
		},
  }
};
</script>