<template>
  <app-layout>
    <h2
      class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800"
    >
      IIA sy DIA Ya cargados
    </h2>

    <body class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
          >
           <a :href="route('iiadias.create')"> <button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">Nueva DIA o IIA</button></a>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    ID
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Fecha Notificacion
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Fecha de Vencimiento
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Actividades
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Estado
                  </th>
                  

                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="dia in data" :key="dia.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ dia.id }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ dia.fecha_notificacion_dia }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ dia.fecha_vencimiento }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ dia.actividades }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ dia.estado }}</div>
                  </td>
                  
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <inertia-link
                    
                      :href="route('iiadias.edit', dia.id)"
                      class="px-2 font-semibold leading-5 text-xs rounded-full bg-yellow-100 text-yellow-500 hover:text-yellow-800"
                    >
                      Editar
                    </inertia-link>
                  </td>

                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <inertia-link
                      method="delete"
                      :href="route('iiadias.destroy', dia.id)"
                      class="px-2 font-semibold leading-5 text-xs rounded-full bg-red-100 text-red-500 hover:text-red-800"
                    >
                      Borrar
                    </inertia-link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <saludo></saludo>
      </div>
    </body>
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
								<template #title>
										{{modal_tittle}}
								</template>

								<template #content>
										{{modal_body}}

										
								</template>

								<template #footer>
										<button @click="closeModal">
												Ok
										</button>

										
								</template>
						</jet-dialog-modal>
						<button @click="confirmingUserDeletion=!confirmingUserDeletion" >modal</button>

  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDialogModal from '@/Jetstream/DialogModal';
//import Button from '../../Jetstream/Button.vue';

export default {
  props: {
    data: Object,
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