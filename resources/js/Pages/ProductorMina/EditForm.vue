<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<FormAddEditProdMina :productor_mina="productor_mina_actual" :title="'Editando una relacion entre productor y minas'"></FormAddEditProdMina>
			</div>
			
		</div>
	</app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import FormAddEditProdMina from './FormAddEditProdMina';





export default {
	 components: {
    AppLayout,
    FormAddEditProdMina,
  },
	props: ["productor_mina"],
	data() {
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			productor_mina_actual: {
				id: this.$props.productor_mina.id,
				id_mina: this.$props.productor_mina.id_mina,
				id_productor: this.$props.productor_mina.id_productor,
				id_destino: this.$props.productor_mina.id_destino,
				id_dia: this.$props.productor_mina.id_dia,
				id_personal: this.$props.productor_mina.id_personal,
				mercado_provincia: this.$props.productor_mina.mercado_provincia,
				mercado_provincias: this.$props.productor_mina.mercado_provincias,
				mercado_exportacion: this.$props.productor_mina.mercado_exportacion,
				num_expediente_SIGETRAMI: this.$props.productor_mina.num_expediente_SIGETRAMI,
				constancia_otros: this.$props.productor_mina.constancia_otros,
				resol_concecion_minera: this.$props.productor_mina.resol_concecion_minera,
				fecha_preinscripcion: this.$props.productor_mina.fecha_preinscripcion,
				fecha_renovacion: this.$props.productor_mina.fecha_renovacion,
				primera_inscripcion: this.$props.productor_mina.primera_inscripcion,
				caracter: this.$props.productor_mina.caracter,
				constancia_posecion: this.$props.productor_mina.constancia_posecion,
				id_producido: this.$props.productor_mina.id_producido,
			},
		};
	},
	methods: {
		closeModal() {
				this.confirmingUserDeletion = false
				//this.form.reset()
		},
	},
};
</script>