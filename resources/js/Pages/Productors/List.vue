<template>
  <app-layout>
    <h2
      class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800"
    >
      Productores Ya cargados
    </h2>

    <body class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
          >
          <a :href="route('productors.create')"> <button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">Nuevo Productor</button></a>

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
                    RazonSocial
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Email
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Num Prod
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
                <tr v-for="productor in productors" :key="productor.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor.id }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ productor.razonsocial }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor.email }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor.numeroproductor }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ productor.estado }}</div>
                  </td>
                  
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <inertia-link
                    
                      :href="route('productors.edit', productor.id)"
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
                      :href="route('productors.destroy', productor.id)"
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
  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: {
    productors: Array,
  },
  components: {
    AppLayout,
  },
};
</script>