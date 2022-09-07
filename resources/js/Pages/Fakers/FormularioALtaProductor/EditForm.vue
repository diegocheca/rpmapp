<template>
  <app-layout>
    <div class="flex items-center w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        
        <form @submit.prevent="submit" class="mb-6">

           <!-- <div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32"> -->
            <!-- <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2"> -->
              <div class="flex justify-center py-4">
                <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
              </div>

              <div class="flex justify-center">
                <div class="flex">
                  <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editando IIA o DIA</h1>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de Notificacion</label>
                  <input 
                  class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                  type="date" 
                  v-model="form.fecha_notificacion_dia" />
                </div>
                <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de vencimiento</label>
                  <input 
                  class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                  type="date"
                  v-model="form.fecha_vencimiento" />
                </div>
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Actividades</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="Actividades"
                v-model="form.actividades" />
              </div>
              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                  Acciones a desarrollar</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="Acciones a desarrollar"
                v-model="form.acciones_a_desarrollar" />
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Archivo de DIA</label>
                  <div class='flex items-center justify-center w-full'>
                      <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                          <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccion un archivo .pdf</p>
                          </div>
                        <input type='file' class="hidden" v-on:change="enviar_dia"/>
                      </label>
                  </div>
              </div>
			  <div class="grid grid-cols-1 mt-5 mx-7  overflow-auto h-32">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Archivo de DIA</label>
                  <embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=form.archivo_dia>
              </div>
              <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Constancia de IIA</label>
                  <div class='flex items-center justify-center w-full'>
                      <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                          <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccion un archivo .pdf</p>
                          </div>
                        <input type='file' class="hidden" v-on:change="enviar_iia" />
                      </label>
                  </div>
              </div>
			  <div class="grid grid-cols-1 mt-5 mx-7  overflow-auto h-32">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Archivo de DIA</label>
                  <embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=form.constancia_inscripcion_ia>
              </div>


              {{form}}
              <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <a :href="route('iiadias.index')"> <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button></a>
                <button 
                class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                type="submit"
				enctype="multipart/form-data"
                >Create</button>
              </div>

            <!-- </div> -->
          <!-- </div> -->
         
          
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
	props: ["iia_dia"],
	data() {
		return {
			form: this.$inertia.form({
				'_method': 'PUT',
				id: this.$props.iia_dia.id,
				fecha_notificacion_dia: this.$props.iia_dia.fecha_notificacion_dia,
				fecha_vencimiento: this.$props.iia_dia.fecha_vencimiento,
				actividades: this.$props.iia_dia.actividades,
				acciones_a_desarrollar: this.$props.iia_dia.acciones_a_desarrollar,
				archivo_dia: this.$props.iia_dia.archivo_dia,
				mostrar_archivo_dia: false,
				constancia_inscripcion_ia: this.$props.iia_dia.constancia_inscripcion_ia,
				created_by: this.$props.iia_dia.created_by,
				estado: this.$props.iia_dia.estado
			}, {
				resetOnSuccess: false,
			}),
			preview: null,
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			nuevo: this.$props.iia_dia,
		};
	},
	methods: {
		submit() {
			this.$inertia.put(
				route("iiadias.update", this.$props.iia_dia.id),
				this.form
			);
		},
		enviar_dia(event) {
			this.form.archivo_dia = event.target.files[0];
			const data = new FormData();
			data.append('archivo', this.form.archivo_dia);
			data.append('nombre_archivo', 'archivo_DIA');
			data.append('id', this.form.id);
			axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
			axios.post(tihs.$inertia.page.props.appName+'/guardando_dia_iia',  data)
				.then(function (response) {
					console.log(response.data);
					if(response.data === 'sin id')
					{
						console.log("todo mal");
					}
					else
					{
						console.log("se recibio bien");
						this.mostrar_archivo_dia = true;
					}
				})
				.catch(function (error) {
					// handle error
					console.log(error);
				})
		},
		enviar_iia(event) {
			this.form.constancia_inscripcion_ia = event.target.files[0];
			const data = new FormData();
			data.append('archivo', this.form.constancia_inscripcion_ia);
			data.append('nombre_archivo', 'archivo_iia');
			data.append('id', this.form.id);
			axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
			axios.post(tihs.$inertia.page.props.appName+'/guardando_dia_iia',  data)
				.then(function (response) {
					console.log(response.data);
					if(response.data === 'sin id')
					{
						console.log("todo mal");
					}
					else
					{
						console.log("se recibio bien");
						this.mostrar_archivo_dia = true;
					}
				})
				.catch(function (error) {
					// handle error
					console.log(error);
				})
		},
	},
};
</script>