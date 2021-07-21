<template>
  <app-layout class=" bg-gray-100">
    <h2
      class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate bg-gray-800"
    >
      Reinscripciones Ya cargadas
    </h2>


    <div class="overflow-x-auto">
        <div class="w-11/12 flex flex-row-reverse mt-3">
            <a :href="route('reinscripciones.create')" class="bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3">Nueva Reinscripcion</a>
        </div>
        <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Mina</th>
                                <th class="py-3 px-6 text-center">Productor</th>
                                <th class="py-3 px-6 text-center">Nombre y apellido</th>
                                <th class="py-3 px-6 text-center">Estado</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="reinscripcion in reinscripciones" :key="reinscripcion.id">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ reinscripcion.id_mina }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ reinscripcion.id_productor }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ reinscripcion.nombre }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ reinscripcion.estado }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a :href="route('reinscripciones.revision', reinscripcion.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a :href="route('reinscripciones.edit', reinscripcion.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a :href="route('reinscripciones.destroy', reinscripcion.id)">
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

  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: {
    reinscripciones: Array,
  },
  components: {
    AppLayout,
  },
};
</script>
