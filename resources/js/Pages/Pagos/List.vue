<template>
  <app-layout class="bg-gray-100">
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
      Pagos de Canon Mineros
    </h2>

    <div class="overflow-x-auto">
      <div class="w-11/12 flex flex-row-reverse mt-3">
        <inertia-link
          :href="route('pagos.create')"
          class="bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3"
        >
          Nuevo Pago de Canon
        </inertia-link>
      </div>
      <div class="           min-w-screen            flex           items-center           justify-center            font-sans          overflow-hidden         " >

        <div
            v-if="pagos.data.length == 0"
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
            <p class="text-2xl">No se han registrado Pagos aún</p>
        </div>


        <div v-if="pagos.data.length > 0" class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
              <table class="min-w-max w-full table-auto">
                  <thead class="bg-gray-50">
                    <tr
                      class="
                        bg-gray-200
                        text-gray-600
                        uppercase
                        text-sm
                        leading-normal
                      "
                    >
                      
                      <th class="py-3 px-6 text-left">
                        ID
                      </th>
                      <th class="py-3 px-6 text-left">
                        pagado
                      </th>
                      <th class="py-3 px-6 text-left">
                        monto
                      </th>
                      <th class="py-3 px-6 text-left">
                        fecha_pago
                      </th>
                      <th class="py-3 px-6 text-left">
                        Estado
                      </th>
                      <th class="py-3 px-6 text-left">
                        Acciones
                      </th>
                      

                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="pago in pagos.data" :key="pago.id">
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ pago.id }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              <span
                              v-if="pago.pagado"
                              class="
                                bg-green-200
                                text-green-600
                                py-1
                                px-3
                                rounded-full
                                text-xs
                              "
                              >Pagado</span
                            >
                              <span
                              v-else
                              class="
                                bg-red-200
                                text-red-600
                                py-1
                                px-3
                                rounded-full
                                text-xs
                              "
                              >No Pago</span
                            >
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ pago.monto }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ pago.fecha_pago }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ pago.estado }}</div>
                      </td>
                      
                      <td
                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                      >
                        <inertia-link
                        
                          :href="route('pagos.edit', pago.id)"
                          class="px-2 font-semibold leading-5 text-xs rounded-full bg-yellow-100 text-yellow-500 hover:text-yellow-800"
                        >
                          Editar
                        </inertia-link>
                     
                        <inertia-link
                          method="delete"
                          :href="route('pagos.destroy', pago.id)"
                          class="px-2 font-semibold leading-5 text-xs rounded-full bg-red-100 text-red-500 hover:text-red-800"
                        >
                          Borrar
                        </inertia-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <pagination class="mt-6" :links="pagos.links" />
            </div>
            <!--<ChartPieB
              :titulo="'Porcentaje de Borradores'"
              :aprobados="$props.datos_donut.aprobados"
              :reprobados="$props.datos_donut.reprobados"
              :borrador_cant="$props.datos_donut.borrador_cant"
              :revision="$props.datos_donut.revision"
              :observacion="$props.datos_donut.observacion"
            ></ChartPieB>-->
        </div>
      </div>
    </div>



  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Components/Pagination";
export default {
  props: {
    pagos: Object,
  },
  components: {
    AppLayout,
    Pagination
  },
};
</script>