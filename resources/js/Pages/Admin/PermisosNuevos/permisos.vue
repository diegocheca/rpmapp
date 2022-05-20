<template>
    <AppLayout>
        <div class="flex items-center h-screen w-full bg-teal-lighter">
            <div class="w-full bg-white rounded shadow-lg p-8 m-4">
                <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
                    Editando Permisos
                </h1>
                <form @submit.prevent="submit" class="mb-6">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                for="name"
                                >Rol:</label>
                            </div>
                            <div class="col-span-5">
                                <select name="rol" id="rol" v-model="form.rol">
                                    <option value="1">Administrador</option>
                                    <option value="2">User</option>
                                    <option value="3">Autoridad</option>
                                    <option value="4">Productor</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                    class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                    for="name"
                                    >Estado:</label
                                >
                            </div>
                            <div class="col-span-5">
                                <select name="estado" id="estado" v-model="form.estado">
                                    <option value="1">Borrador</option>
                                    <option value="2">En revison</option>
                                    <option value="3">Observado</option>
                                    <option value="4">Corregido</option>
                                    <option value="5">Aprobado</option>
                                    <option value="6">Suspendido</option>
                                    <option value="7">No admitido</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-1">
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
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                for="name"
                                >Pagina:</label>
                            </div>
                            <div class="col-span-5">
                                <select name="pagina" id="pagina" v-model="form.pagina">
                                    <option value="1">Pagina Datos de Productor</option>
                                    <option value="2">Pagina Domicilio Legal</option>
                                    <option value="3">Pagina Domicilio Administrativo</option>
                                    <option value="4">Pagina Yacimientos 1</option>
                                    <option value="5">Pagina Yacimientos 2</option>
                                    <option value="6">Pagina Domicilio Yacimiento</option>
                                    <option value="7">Pagina Datos Presentador</option>
                                    <option value="8">Pagina Catamarca</option>
                                    <option value="9">Pagina Mendoza</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                for="name"
                                >Provincia:</label>
                            </div>
                            <div class="col-span-5">
                                <select name="provincia" id="provincia" v-model="form.provincia">
                                    <option v-for="provincia in provincias.value" v-bind:key="provincia.id" :value="provincia.id">
                                        {{provincia.nombre}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-1">
                            <div>
                                <label
                                class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                                for="name"
                                >Formulario:</label>
                            </div>
                            <div class="col-span-5">
                                <select name="formulario" id="formulario" v-model="form.formulario">
                                    <option value="1">Alta productor</option>
                                    <option value="2">Reinscripcion</option>
                                    <option value="3">Alta de ruta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <button
                        type="submit"
                        class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
                    >
                        Buscar
                    </button>
                    </form>
<div class="flex overflow-auto h-96">
    <div class="flex-none w-14 h-14">
    </div>
    <div class="grow h-full">
        <div class="flex-row-reverse w-full  ">
                    <div class="flex" v-for="(item, index) in checks_names" :key="index">
                        <div class="w-1/5">
                            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                </svg>
                                <span class="ml-3 text-xl">{{item}}</span>
                            </a>
                            <p class="mt-2 text-sm text-gray-500">{{index + 1}} - Valores:  {{form.permisos[index]}} </p>
                        </div>
                        <div  class="w-4/5">
                            <div class="flex" >
                                <div class="w-1/2">
                                    <span class="ml-3 text-xl">Value</span>
                                    <ul style="list-style-type: none">
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Administrador {{form.permisos[index][0]}} {{mostrar}} </span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][5][2]" @change="change_permiso($event,index, 5,2)"> <span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][5][1]"  @change="change_permiso($event,index, 5,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][5][0]"  @change="change_permiso($event,index, 5,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Autoridad {{form.permisos[index][1]}}</span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][4][2]" @change="change_permiso($event,index, 4,2)"><span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][4][1]"  @change="change_permiso($event,index, 4,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][4][0]"  @change="change_permiso($event,index, 4,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Productor {{form.permisos[index][2]}}</span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][3][2]" @change="change_permiso($event,index, 3,2)"><span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][3][1]"  @change="change_permiso($event,index, 3,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][3][0]"  @change="change_permiso($event,index, 3,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-1/2">
                                    <span class="ml-3 text-xl">Correccion</span>
                                    <ul style="list-style-type: none">
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Administrador {{form.permisos[index][3]}}</span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][2][2]" @change="change_permiso($event,index, 2,2)"><span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][2][1]"  @change="change_permiso($event,index, 2,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][2][0]"  @change="change_permiso($event,index, 2,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Autoridad {{form.permisos[index][4]}}</span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][1][2]" @change="change_permiso($event,index, 1,2)"><span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][1][1]"  @change="change_permiso($event,index, 1,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][1][0]"  @change="change_permiso($event,index, 1,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                        <li> 
                                            <div class="flex" >
                                                <div class="w-1/3">
                                                    <span class="ml-2 text-gray-700">Productor {{form.permisos[index][5]}}</span>
                                                </div>
                                                <div class="w-2/3">
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" v-model="super_permisos[index][0][2]" @change="change_permiso($event,index, 0,2)"><span class="ml-2 text-gray-700">M</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" v-model="super_permisos[index][0][1]"  @change="change_permiso($event,index, 0,1)"><span class="ml-2 text-gray-700">D</span>
                                                    </label>

                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" v-model="super_permisos[index][0][0]"  @change="change_permiso($event,index, 0,0)"><span class="ml-2 text-gray-700">R</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                    </div>
        </div>    
    </div>
    <div class="flex-none w-14 h-14">
    </div>
</div>

                    <button
                        type="button"
                        @click="mostrar_todo()"
                        class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
                    >
                        Actualizar
                    </button>

               
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
            rol: null,
            estado: null,
            accion: null,
            pagina: null,
            provincia: null,
            formulario: null,
            permisos:{},
            permisos_bool:[
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
                [
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ],
                    [
                        false,
                        true,
                        true
                    ]
                ],
            ]
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
        
        buscar_provincias(){
            let self = this;
            axios
            .get("/datos/traer_provincias/")
            .then(function (response) {
                console.log("las provincias son: \n\n");
                self.provincias.value = response.data;
                console.log(self.provincias.value);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });

        },
        change_permiso(event, index, fila, columna){
            console.log("toque un change \n\n");
            console.log(event, index, fila, columna);
            console.log(this.super_permisos[index][fila][columna]);
            console.log(this.super_permisos);
            /*if(columna===0) {
                console.log("entre al 0");
                self.form.permisos = this.form.permisos[index][fila][columna] & 4 === 4 ? true : false;
            }
            if(columna===1) {
                console.log("entre al 1");
                self.form.permisos = this.form.permisos[index][fila][columna] & 2 === 2 ? true : false;
            }
            if(columna===2) {
                console.log("entre al 2");
                self.form.permisos = this.form.permisos[index][fila][columna] & 1 === 1 ? true : false;
            }*/

        },
        decodificador(index, fila, columna){
            console.log(index, fila, columna);
            //buscco el boleano en mi areglo de permisos:
            if(columna===0) {
                console.log("entre al 0");
                return this.form.permisos[index][fila][columna] & 4 === 4 ? true : false;
            }
            if(columna===1) {
                console.log("entre al 1");
                return this.form.permisos[index][fila][columna] & 2 === 2 ? true : false;
            }
            if(columna===2) {
                console.log("entre al 2");
                return this.form.permisos[index][fila][columna] & 1 === 1 ? true : false;
            }
            return false;

        },
        iniciar_array(vueltas){
            for (let index = 0; index < vueltas; index++) {
                this.super_permisos[index] = Array(6);
                for (let sub_index = 0; sub_index < 6; sub_index++) {
                    this.super_permisos[index][sub_index] = Array(3);
                    for (let sub_sub_index = 0; sub_sub_index < 3; sub_sub_index++) {
                        this.super_permisos[index][sub_index][sub_sub_index] = false;
                    }
                }
            }

        },
        search_for_the_permissions() {
        let self = this;
        axios
        .get("/admin/get_permisos_form_nuevo/"+this.form.rol+"/"+this.form.estado+"/"+this.form.accion+"/"+this.form.pagina+"/"+this.form.provincia+"/"+this.form.formulario)
        .then(function (response) {
            if (response.data.status === "success") {
                let aux = JSON.parse(response.data.permisos);
                console.log("todo bien: \n\n");
                console.log(JSON.parse(response.data.permisos));
                self.checks_names = String(aux.nombres).split('-');
                self.form.permisos = String(aux.data).split('-');
                self.form.id = aux.id;
                //paso numeros a bolean
                
                console.log(self.checks_names, self.form.permisos);
                self.super_permisos = Array(self.checks_names.length);
                self.iniciar_array(self.checks_names.length);
                self.form.permisos.map((value, index)=>{
                    //value = 775577
                    let value_temp = [value[5],value[4],value[3],value[2],value[1],value[0]]; // transformo el string 777777 en array
                    //self.super_permisos[index] = Array(6);
                    value_temp.map((value_sub, index_sub)=>{
                        //                     input(row)   cual 7, m/d/r
                        /*console.log("viene un " + parseInt(value_sub),4,  parseInt(value_sub) & 4 , parseInt(value_sub) & 4  === 4 );
                        console.log("viene un "+ parseInt(value_sub),2, parseInt(value_sub) & 2, parseInt(value_sub) & 2  === 2 );
                        console.log("viene un "+ parseInt(value_sub),1 ,parseInt(value_sub) & 1, parseInt(value_sub) & 1  === 1 );*/

                        self.super_permisos[index][index_sub][2]=  (parseInt(value_sub) & 4)  === 4 ? true : false; //mostrar
                        self.super_permisos[index][index_sub][1]=  (parseInt(value_sub) & 2)  === 2 ? true : false; //disabled
                        self.super_permisos[index][index_sub][0]=  (parseInt(value_sub) & 1)  === 1 ? true : false; // required
                    });
                });
                console.log("super arra de booleans:\n\n\n");
                console.log(self.super_permisos);
                
            } else {
            console.log("NO todo bien");
            }
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        });

        },
        check($event, index, pos_mas, pos_sub_mas){
            //index es el input q estoy tratando , es el subindice de: "numeroproductor-cuit-razonsocial-email-tiposociedad....
            //pos_mas es la posicion en la mascara, es decir es el numero que voy a tratar
            //pos_sub_mas es la poscion del bit dentro del numero de la mascara, siendo 0,1 o 2
            //buscar donde transformo
            alert("el valor actual es un"+$event);
            console.log("el valor actual es un\n"+$event);



        },
        submit() {
            this.search_for_the_permissions();
            //this.form.post(route("admin.permisos_nuevos.store"));
        },
        mostrar_todo(){
            console.log(this.super_permisos);
            console.table(console.table(this.super_permisos));
            let self = this;
            axios
            .post("/admin/update_permisos_form_nuevo/", {
                "rol": this.form.rol,
                "estado": this.form.estado,
                "accion": this.form.accion,
                "pagina": this.form.pagina,
                "provincia": this.form.provincia,
                "formulario": this.form.formulario,
                "id": this.form.id,
                "permisos": this.super_permisos
            })
            .then(function (response) {
                if (response.data.status === "success") {
                    console.log("todo bien: \n\n");
                    console.log(response.data);
                    Swal.fire({
                        icon: "success",
                        title: "Permisos Guardados",
                        text: "Permisos guardados exitosamente.",
                        });
                } else {
                console.log("NO todo bien");
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });

        }
    },
    mounted () {
        this.buscar_provincias();

    }
};
</script>