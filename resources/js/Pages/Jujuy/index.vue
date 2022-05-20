<template>
    <AppLayout>
        <div class="flex items-center h-screen w-full bg-teal-lighter">
            <div class="w-full bg-white rounded shadow-lg p-8 m-4">
                <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
                    Simulación de JUJUY
                </h1>
                <form @submit.prevent="submit" class="mb-6">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                for="name"
                                >Tabla:</label>
                            </div>
                            <div class="col-span-5">
                                <select name="rol" id="rol" v-model="form.rol">
                                    <option value="Productor">Productor</option>
                                    <option value="Titular">Titular</option>
                                    <option value="Caracter">Caracter</option>
                                    <option value="Producer_Mina">Producer Mina</option>
                                    <option value="Producer_Documentacion">Producer Documentacion</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                    class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                    for="name"
                                    >Cantidad:</label
                                >
                            </div>
                            <div class="col-span-5">
                                <select name="estado" id="estado" v-model="form.estado">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="999999">999999</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                    class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                    for="name"
                                    >Accion:</label
                                >
                            </div>
                            <div>
                                <select name="accion" id="accion" v-model="form.accion">
                                    <option value="1">Alta</option>
                                    <option value="2">Edicion</option>
                                    <option value="3">Ver</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="grid grid-cols-6 gap-1">
                            <button
                                type="submit"
                                class="block bg-green-500 hover:bg-green-800 text-white uppercase text-lg mx-auto p-4 rounded"
                            >
                                Crear
                            </button>

                            <button
                                type="submit"
                                class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
                            >
                                Buscar Registros
                            </button>
                        </div>
                    </div>
                    <br>
                    <br>
                   

                    </form>


            </div>
        </div>
    </AppLayout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout";
import { reactive, ref, computed, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
    components: {
        AppLayout
    },
    setup() {
        const form = useForm({
            id: '',
            
        });
        const checks_names = ref({});

        const super_permisos = [];

        const requerid = 1;
        const disabled = 2;
        const mostrar = 4;

        let provincias = ref({});
       

        return { form ,  checks_names, provincias};
    },
    methods: {
        
        
        submit() {
            this.search_for_the_permissions();
            //this.form.post(route("admin.permisos_nuevos.store"));
        },
    },
    mounted () {
        this.buscar_provincias();

    }
};
</script>