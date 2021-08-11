<template>
  <app-layout>
    <h2 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800" >
      Productos Ya cargados
    </h2>
    <a :href="route('productos.create')"> <button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">Nuevo Producto</button></a>
     <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal" >
                                <th class="py-3 px-6 text-left">Id</th>
                                <th class="py-3 px-6 text-left">Razon Social</th>
                                <th class="py-3 px-6 text-left">Mineral</th>
                                <th class="py-3 px-6 text-center">Variedad</th>
                                <th class="py-3 px-6 text-center">Produccion</th>
                                <th class="py-3 px-6 text-center">Estado</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="producto in data" :key="producto.id">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                        </div>
                                        <span class="font-medium">{{ producto.id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        </div>
                                        <span>{{ producto.nombre_mineral }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        </div>
                                        <span>{{ producto.nombre_mineral }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <!-- <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/> -->
                                        
                                        {{ producto.variedad  }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <!-- <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/> -->
                                        
                                        {{ producto.produccion }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a :href="route('productos.edit', producto.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a :href="route('productos.destroy', producto.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <body class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
          >
           
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
                    nombre_mineral
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    variedad
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    produccion
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
                <tr v-for="producto in data" :key="producto.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ producto.id }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ producto.nombre_mineral }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ producto.variedad }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ producto.produccion }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ producto.estado }}</div>
                  </td>
                  
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <inertia-link
                    
                      :href="route('productos.edit', producto.id)"
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
                      :href="route('productos.destroy', producto.id)"
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