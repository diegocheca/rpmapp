<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <app-layout>
        <h2 class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800">
            Product Stock Inertia
        </h2>
        <body class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                    >
                        <a :href="route('formulario-alta.create')"> <button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">Nuevo Borrador</button></a>
                        <div class="overflow-x-auto">
                            <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                                <div class="w-full lg:w-5/6">
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                        <th scope="col" class="py-3 px-6 text-left">
                                                        Name
                                                        </th>
                                                        <th scope="col" class="py-3 px-6 text-left">
                                                        Title
                                                        </th>
                                                        <th scope="col" class="py-3 px-6 text-left">
                                                        Status
                                                        </th>
                                                        <th scope="col" class="py-3 px-6 text-left">
                                                        Role
                                                        </th>
                                                        <th scope="col" class="py-3 px-6 text-left">
                                                            <span class="sr-only">Editar</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                <tr v-for="usuario in $props.usuarios" :key="usuario.id">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" :src="'http://localhost:8000/storage/'+usuario.profile_photo_path" alt="" />
                                                        </div>
                                                        <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ usuario.name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ usuario.email }}
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ usuario.provincia }}</div>
                                                        <div class="text-sm text-gray-500">{{ usuario.department }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Active
                                                    </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    
                                                    {{ usuario.role_id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </app-layout>
</template>

<script>
    const people = [
    {
        name: 'Jane Cooper',
        title: 'Regional Paradigm Technician',
        department: 'Optimization',
        role: 'Admin',
        email: 'jane.cooper@example.com',
        image:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
  // More people...
]

import AppLayout from "@/Layouts/AppLayout";
import Saludo from "@/Pages/MisComponentes/saludo";
export default {
    
    props: {
    usuarios: Array,
    },
    components: {
        AppLayout,
        Saludo
    },
    setup() {
        return {
        people,
        }
    },
};
</script>
