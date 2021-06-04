<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
					Editar Productor
				</h1>
				{{$props.producto.id_reinscripcion}}
				<div class="flex flex-col mb-4">
					<label
					class="mb-2 uppercase font-bold text-lg text-grey-darkest"
					for="id_reinscripcion"
					>Id Reinscripcion:</label
					>
					<input
					id="id_reinscripcion"
					v-model="nuevo.id_reinscripcion"
					class="border py-2 px-3 text-grey-darkest"
					/>
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
	props: ["producto"],
	data() {
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			form: {
				id_reinscripcion: this.$props.producto.id_reinscripcion,
				nombre_mineral: this.$props.producto.nombre_mineral,
				variedad: this.$props.producto.variedad,
				produccion: this.$props.producto.produccion,
				unidades: this.$props.producto.unidades,
				otra_unidad: this.$props.producto.otra_unidad,
				precio_venta: this.$props.producto.precio_venta,
				created_by: this.$props.producto.created_by,
				estado: this.$props.producto.estado
			},
			nuevo: this.$props.producto,
		};
	},
	methods: {
	},
};
</script>