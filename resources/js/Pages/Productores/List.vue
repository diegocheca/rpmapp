<template>
    <app-layout>
        <h2
        class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800"
        >
            Productores Ya cargados
        </h2>
        <body class="flex flex-col">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" >
                <a :href="route('productores.create')"> <button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700">Nuevo Productor</button></a>
                <div class="overflow-x-auto">
                    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <alertDeleted 
                            v-if="$props.alertType==='success'"
                            
                            :bigLabel="'Productor Creado'"
                            :mediumLabel="'El productor ha sido creado correctamente en la base de datos'"
                            :type="$props.alertType"
                            />

                            <alertDeleted 
                            v-if="$props.alertType==='error'"
                            
                            :bigLabel="'Productor Eliminado'"
                            :mediumLabel="'El productor ha sido eliminado de la base de datos'"
                            :type="$props.alertType"
                            />
                            <jet-dialog-modal :show="showDeleteConfirmationModal" @close="closeModal">
                                <template #title>
                                        {{modal_tittle}}
                                </template>
                                <template #content>
                                        {{modal_body}}
                                        
                                </template>
                                <template #footer>
                                    <button class="px-4 py-2 rounded-md text-sm font-medium border shadow focus:outline-none focus:ring transition text-gray-600 bg-gray-50 border-gray-200 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300" @click="closeModal">
                                            Cancelar
                                    </button>
                                    <button 
                                    class="px-4 py-2 rounded-md text-sm font-medium border shadow focus:outline-none focus:ring transition text-red-600 bg-red-50 border-red-200 hover:bg-red-100 active:bg-red-200 focus:ring-red-300"
                                    @click="deleteButtonAction">
                                            Eliminar
                                    </button>
                                </template>
                            </jet-dialog-modal>



                            <div class="bg-white shadow-md rounded my-6">
                                <div class="flex items-center w-full lg:w-5/6 p-6 space-x-6 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500">
                                    <div class="flex bg-gray-100 p-4 w-72 space-x-4 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <input class="bg-gray-100 outline-none" type="text" placeholder="Filtar ..."
                                        v-model="term" @keyup="search" />
                                    </div>
                                    <div class="flex py-3 px-4 rounded-lg text-gray-500 font-semibold cursor-pointer">
                                        <span>Cualquier estado</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="bg-green-400 py-3 px-5 text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer">
                                        <span>Buscar</span>
                                    </div>
                                    </div>
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Id</th>
                                            <th class="py-3 px-6 text-left">Usuario</th>
                                            <th class="py-3 px-6 text-center">Email</th>
                                            <th class="py-3 px-6 text-center">Estado</th>
                                            <th class="py-3 px-6 text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr v-for="(productor, index) in productores.data" :key="productor.id" :class="{'bg-gray-300': index%2 === 0}">
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                                    </div>
                                                    <span class="font-medium">{{ productor.id }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                                    </div>
                                                    <span>{{ productor.razonsocial }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex items-center justify-center">
                                                    <!-- <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                                    <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                                    <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/> -->
                                                    
                                                    {{ productor.email }}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a :href="route('productores.show', productor.id)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                    </div>
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a :href="route('productores.edit', productor.id)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div v-if="mostrarBotonEliminar()" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a  v-on:click.prevent="showDeleteConfirmation($event,productor, index)" href="#" >
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
            </div>
        </body>
    </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import alertDeleted from '@/Components/alertDeleted';
import JetDialogModal from '@/Jetstream/DialogModal';
export default {
    props: {
        productores: Object,
        alertType: String
    },
    components: {
        AppLayout,
        alertDeleted,
		JetDialogModal
    },
    data(){
        return {
            showDeleteConfirmationModal: false,
            modal_tittle: '',
            modal_body: '',
            productor: {
                'id' : 0,
                'index' : 0,
                'nombre' : '',
                'email' : '',
                'estado' : '',
            },
            term:'',
        }
    },
    methods:{
        mostrarBotonEliminar(){
            if(this.$inertia.page.props.user.roles[0].name === "Administrador")
                return true;
            else
                return false;
        },
        showDeleteConfirmation(event,productorAEliminar, index){
            this.showDeleteConfirmationModal = true;
            this.modal_tittle = "Confirmar";
            this.modal_body = "Realmente desea eliminar al productor "+productorAEliminar.razonsocial +"?";
        },
        closeModal(){
            this.showDeleteConfirmationModal = false;
        },
        deleteButtonAction(){
            alert("estoy por eliminar el productor");
            //:href="route('productores.destroy', productor.id)"
        },
        search(){
            this.$inertia.replace(route('productores.index', {term: this.term}));
        }
    }
};
</script>