<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<FormAddEditProductores :productor="productor_this" :title="'Editando un productor'"></FormAddEditProductores>
			</div>
			
		</div>
	</app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import FormAddEditProductores from './FormAddEditProductores';





export default {
	 components: {
    AppLayout,
    FormAddEditProductores,
  },
	props: ["productor"],
	data() {
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			productor_this: {
				id: this.$props.productor.id,
				cuit: this.$props.productor.cuit,
				razonsocial: this.$props.productor.razonsocial,
				numeroproductor: this.$props.productor.numeroproductor,
				email: this.$props.productor.email,
				domicilio_prod: this.$props.productor.domicilio_prod,
				tiposociedad: this.$props.productor.tiposociedad,
				inscripciondgr: this.$props.productor.inscripciondgr,
				constaciasociedad: this.$props.productor.constaciasociedad,
				leal_calle: this.$props.productor.leal_calle,
				leal_numero: this.$props.productor.leal_numero,
				leal_telefono: this.$props.productor.leal_telefono,
				leal_pais: this.$props.productor.leal_pais,
				leal_provincia: this.$props.productor.leal_provincia,
				leal_departamento: this.$props.productor.leal_departamento,
				leal_localidad: this.$props.productor.leal_localidad,
				leal_cp: this.$props.productor.leal_cp,
				leal_otro: this.$props.productor.leal_otro,
				administracion_calle: this.$props.productor.administracion_calle,
				administracion_numero: this.$props.productor.administracion_numero,
				administracion_telefono: this.$props.productor.administracion_telefono,
				administracion_pais: this.$props.productor.administracion_pais,
				administracion_provincia: this.$props.productor.administracion_provincia,
				administracion_departamento: this.$props.productor.administracion_departamento,
				administracion_localidad: this.$props.productor.administracion_localidad,
				administracion_cp: this.$props.productor.administracion_cp,
				administracion_otro: this.$props.productor.administracion_otro,
				numero_expdiente: this.$props.productor.numero_expdiente,
				created_by: this.$props.productor.created_by,
				estado: this.$props.productor.estado,
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