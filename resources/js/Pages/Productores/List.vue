/* <template>
    <app-layout>
        <h2
        class="text-center text-2xl font-bold leading-7 text-gray-300 sm:text-3xl sm:truncate py-4 bg-gray-800"
        >
            Productores Ya cargados
        </h2>
        <body class="flex flex-col">
            <div class="shadow overflow-hidden border-b border-purple-200 sm:rounded-lg" >
                <div class="overflow-x-auto">
                    <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <a :href="route('productores.create')"> 
                                <button class="   px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-200 bg-purple-200 hover:bg-purple-300 text-purple-700">
                                    Nuevo Productor
                                </button>
                            </a>
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


                            <jet-dialog-modal :show="mostrar_modal_datos_productor" @close="cerrar_modal_datos_dos">
                                <template #title>
                                        {{modal_tittle}}
                                </template>
                                <template #content>
                                        <PaginaUnoDatosProductores
                                            :link_volver="''"
                                            :titulo_boton_volver="'volver'"
                                            :titulo_boton_guardar="''"
                                            :titulo_pagina="'Datos de Productor'"

                                            :razon_social="productor.nombre" 
                                            :razon_social_valido="true"
                                            :razon_social_correcto="true"
                                            :obs_razon_social="''"
                                            :obs_razon_social_valido="true"
                                            :mostrar_razon_social="true"
                                            :desactivar_razon_social="true"
                                            :mostrar_razon_social_correccion="false"
                                            :desactivar_razon_social_correccion="true"

                                            :email="productor.email"
                                            :email_valido="true"
                                            :email_correcto="true"
                                            :obs_email="''"
                                            :obs_email_valido="true"
                                            :mostrar_email="true"
                                            :desactivar_email="true"
                                            :mostrar_email_correccion="false"
                                            :desactivar_email_correccion="true"

                                            :cuit="productor.cuit"
                                            :cuit_valido="true"
                                            :cuit_correcto="true"
                                            :obs_cuit="''"
                                            :obs_cuit_valido="true"
                                            :mostrar_cuit="true"
                                            :desactivar_cuit="true"
                                            :mostrar_cuit_correccion="false"
                                            :desactivar_cuit_correccion="true"
                                            
                                            :numeroproductor="productor.numeroproductor"
                                            :numeroproductor_valido="true"
                                            :numeroproductor_correcto="true"
                                            :obs_numeroproductor="''"
                                            :obs_numeroproductor_valido="true"
                                            :mostrar_num_prod="true"
                                            :desactivar_num_prod="true"
                                            :mostrar_num_prod_correccion="false"
                                            :desactivar_num_prod_correccion="true"
                                            
                                            :tiposociedad="productor.tiposociedad"
                                            :tiposociedad_valido="true"
                                            :tiposociedad_correcto="true"
                                            :obs_tiposociedad="''"
                                            :obs_tiposociedad_valido="true"
                                            :mostrar_tipo_sociedad="true"
                                            :desactivar_tipo_sociedad="true"
                                            :mostrar_tipo_sociedad_correccion="false"
                                            :desactivar_tipo_sociedad_correccion="true"
                                            
                                            :inscripciondgr="productor.inscripciondgr"
                                            :inscripciondgr_valido="true"
                                            :inscripciondgr_correcto="true"
                                            :obs_inscripciondgr="''"
                                            :obs_inscripciondgr_valido="true"
                                            :mostrar_inscripcion_dgr="true"
                                            :desactivar_inscripcion_dgr="true"
                                            :mostrar_inscripcion_dgr_correccion="false"
                                            :desactivar_inscripcion_dgr_correccion="true"
                                            
                                            :constanciasociedad="productor.constaciasociedad"
                                            :constanciasociedad_valido="true"
                                            :constanciasociedad_correcto="true"
                                            :obs_constanciasociedad="''"
                                            :obs_constanciasociedad_valido="true"
                                            :mostrar_constancia_sociedad="true"
                                            :desactivar_constancia_sociedad="true"
                                            :mostrar_constancia_sociedad_correccion="false"
                                            :desactivar_constancia_sociedad_correccion="true"

                                            :mostrar_boton_guardar_uno="false"
                                            :desactivar_boton_guardar_uno="true"

                                            :evaluacion ="false"
                                            :testing ="false"
                                            
                                            :id="productor.id"

                                            v-on:ChangeRazonSocialEvaluacion="''"
                                            v-on:ChangeCuitEvaluacion="''"
                                            v-on:ChangeNumProdEvaluacion="''"
                                            v-on:ChangeTipoSociedadEvaluacion="''"
                                            v-on:ChangeInscripcionDGREvaluacion="''"
                                            v-on:ChangeConstanciaSociedadEvaluacion="''"
                                        >
                                        </PaginaUnoDatosProductores>
                                        
                                </template>
                                <template #footer>
                                    <button class="px-4 py-2 rounded-md text-sm font-medium border shadow focus:outline-none focus:ring transition text-gray-600 bg-gray-50 border-gray-200 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300" @click="cerrar_modal_datos_dos">
                                            Cancelar
                                    </button>
                                </template>
                            </jet-dialog-modal>

                            <div class="flex items-center w-full lg:w-5/6 p-6 space-x-6 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500">
                                    <div class="flex p-4 w-72 space-x-4 rounded-lg">
                                        
                                        <input class="bg-gray-100 outline-none" type="text" placeholder="Filtar ..."
                                        v-model="term" @keyup="search" />
                                    </div>
                                    <!-- <div class="flex py-3 px-4 rounded-lg text-gray-500 font-semibold cursor-pointer">
                                        <span>Cualquier estado</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div> -->
                                    <div>
                                        <div class="relative inline-flex self-center">
                                            <svg class="text-white bg-purple-400 absolute top-0 right-0 m-2 pointer-events-none p-2 rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 38 22" version="1.1">
                                                <title>F09B337F-81F6-41AC-8924-EC55BA135736</title>
                                                <g id="ZahnhelferDE—Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="ZahnhelferDE–Icon&amp;Asset-Download" transform="translate(-539.000000, -199.000000)" fill="#ffffff" fill-rule="nonzero">
                                                        <g id="Icon-/-ArrowRight-Copy-2" transform="translate(538.000000, 183.521208)">
                                                            <polygon id="Path-Copy" transform="translate(20.000000, 18.384776) rotate(135.000000) translate(-20.000000, -18.384776) " points="33 5.38477631 33 31.3847763 29 31.3847763 28.999 9.38379168 7 9.38477631 7 5.38477631"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <select class="text-l font-bold rounded border-2 border-gray-700 text-gray-400 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                                <option>Cualquier estado</option>
                                                <option>Aprobado</option>
                                                <option>Rechazado</option>
                                                <option>Suspendido</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bg-purple-400 py-3 px-5 text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <span>Buscar</span>
                                    </div>
                                    </div>



                            <div class="bg-white shadow-md rounded my-6">
                                
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
                                        <tr v-for="(productor, index) in productores.data" :key="productor.id" :class="{'bg-gray-100': index%2 === 0}">
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <!-- <div class="mr-2">
                                                        <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                                    </div> -->
                                                    <span class="font-medium">{{ productor.id }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6" :src="$inertia.page.props.appName+'/storage/'+productor.profile_photo_path"/>
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
                                                    <a v-on:click.prevent="showProdutorsInformation($event,productor, index)" href="#" >
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
                            <pagination class="mt-6" :links="productores.links" />
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
import PaginaUnoDatosProductores from "@/Pages/Productors/PaginaUnoDatosProductores";
import Pagination from '@/Components/Pagination'

export default {
    props: {
        productores: Object,
        alertType: String
    },
    components: {
        AppLayout,
        alertDeleted,
		JetDialogModal,
        PaginaUnoDatosProductores,
        Pagination
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
            mostrar_modal_datos_productor:false,
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
        },
        showProdutorsInformation(event,productorABuscar, index){
            //:href="route('productores.show', productor.id)"
            let self  = this;
            axios.get('/productores/mostrar_datos'+'/'+productorABuscar.id)
                .then(function (response) {
                    console.log(response.data);
                    self.mostrar_modal_datos_productor = true;
                    self.modal_tittle = "Datos del productor";
                    self.productor.id = response.data.productor.id;
                    self.productor.nombre = response.data.productor.razonsocial;
                    self.productor.email = response.data.productor.email;
                    self.productor.estado = response.data.productor.estado;
                    self.productor.cuit = response.data.productor.cuit;
                    self.productor.numeroproductor = response.data.productor.numeroproductor;
                    self.productor.tiposociedad = response.data.productor.tiposociedad;
                    self.productor.inscripciondgr = response.data.productor.inscripciondgr;
                    self.productor.constaciasociedad = response.data.productor.constaciasociedad;


                    


                    
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

        },
        cerrar_modal_datos_dos() {
				this.mostrar_modal_datos_productor = false;
		},
        
    }
};
</script>