<template>
  <app-layout>
    <h2
      class="
        text-center text-2xl
        font-bold
        leading-7
        text-gray-300
        sm:text-3xl sm:truncate
        bg-gray-800
      "
    >
      IIA sy DIA Ya cargados
    </h2>
    <div class="overflow-x-auto">
      <div class="w-11/12 flex flex-row-reverse mt-3">
        <inertia-link
          :href="route('iiadias.create')"
          
          class="bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3"
        >
          Nuevo IIA/DIA
        </inertia-link>
      </div>
      <div
        class="
          min-w-screen
          flex
          items-center
          justify-center
          font-sans
          overflow-hidden
        "
      >
        

        <div
          v-if="dias.data.length == 0"
          class="w-full flex flex-col items-center mt-14 text-gray-400"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-20 w-20"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
            />
          </svg>
          <p class="text-2xl">No se han registrado IIA ni DIA</p>
        </div>
        <div v-if="dias.data.length > 0" class="w-full lg:w-5/6">
          <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
              <thead>
                <tr
                  class="
                    bg-gray-200
                    text-gray-600
                    uppercase
                    text-sm
                    leading-normal
                  "
                >
                  <th class="py-3 px-6 text-left">Id</th>
                  <th class="py-3 px-6 text-center">Fecha Notificacion</th>
                  <th class="py-3 px-6 text-center">Fecha de Vencimiento</th>
                  <th class="py-3 px-6 text-center">Actividades</th>
                  <th class="py-3 px-6 text-center">Estado</th>

                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <tr
                  v-for="(dia, index) in dias.data"
                  :key="dia.id"
                  :class="{ 'bg-gray-100': index % 2 === 0 }"
                >
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                      <span class="font-medium">{{ dia.id }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6 text-left">
                    <div class="flex items-center justify-center">
                        {{ dia.fecha_alta_dia }}
                    </div>
                  </td>
                  <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                      {{ dia.fecha_vencimiento }}
                    </div>
                  </td>
                  <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                      {{ dia.actividades }}
                    </div>
                    
                  </td>
                  <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-purple-500 hover:scale-110
                        "
                      >
                        <inertia-link
                          :href="route('iiadias.edit', dia.id)"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                            />
                          </svg>
                        </inertia-link>
                      </div>

                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-purple-500 hover:scale-110
                        "
                      >
                        <inertia-link
                          :href="route('iiadias.edit', dia.id)"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                            />
                          </svg>
                        </inertia-link>
                      </div>
                      
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <pagination class="mt-6" :links="dias.links" />
          </div>
          
        </div>
      </div>
    </div>

   

  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import JetDialogModal from '@/Jetstream/DialogModal';
//import Button from '../../Jetstream/Button.vue';
import Pagination from "@/Components/Pagination";
export default {
  props: {
    dias: Object,
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