<template>
    <app-layout>
        <div class="flex items-center h-screen w-full bg-teal-lighter">
            <div class="w-full bg-white rounded shadow-lg p-8 m-4">
                <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
                    Editando Permisos
                </h1>
                <form @submit.prevent="submit" class="mb-6">
                    <div class="flex flex-col mb-4">
                        <label
                        class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                        for="name"
                        >Rol:</label
                        >
                        <select name="rol" id="rol" v-model="form.rol">
                            <option value="1">Administrador</option>
                            <option value="2">User</option>
                            <option value="3">Autoridad</option>
                            <option value="4">Productor</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">El rol es Requerido</div>-->
                    </div>

                    




                    <div class="flex flex-col mb-4">
                        <label
                            class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                            for="name"
                            >Estado:</label
                        >
                        <select name="estado" id="estado" v-model="form.estado">
                            <option value="1">Borrador</option>
                            <option value="2">En revison</option>
                            <option value="3">Observado</option>
                            <option value="4">Corregido</option>
                            <option value="5">Aprobado</option>
                            <option value="6">Suspendido</option>
                            <option value="7">No admitido</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">El estado es Requerido</div>-->
                    </div>
                    <div class="flex flex-col mb-4">
                        <label
                            class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                            for="name"
                            >Accion:</label
                        >
                        <select name="accion" id="accion" v-model="form.accion">
                            <option value="1">Alta</option>
                            <option value="2">Edicion</option>
                            <option value="3">Ver</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">La accion es Requerido</div>-->
                    </div>
                    <div class="flex flex-col mb-4">
                        <label
                            class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                            for="name"
                            >Pagina:</label
                        >
                        <select name="pagina" id="pagina" v-model="form.pagina">
                            <option value="1">Pagina 1</option>
                            <option value="2">Pagina 2</option>
                            <option value="3">Pagina 3</option>
                            <option value="4">Pagina 4</option>
                            <option value="5">Pagina 5</option>
                            <option value="6">Pagina 6</option>
                            <option value="7">Pagina 7 </option>
                            <option value="8">Pagina 8</option>
                            <option value="9">Pagina 9</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">La pagina es Requerido</div>-->
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                            for="name"
                            >Provincia:</label
                        >
                        <select name="provincia" id="provincia" v-model="form.provincia">
                            <option value="70">San Juan</option>
                            <option value="2">Mendoza</option>
                            <option value="3">Catamarca</option>
                            <option value="4">Santiago del Estero</option>
                            <option value="5">Pagina 5</option>
                            <option value="6">Pagina 6</option>
                            <option value="7">Pagina 7 </option>
                            <option value="8">Pagina 8</option>
                            <option value="9">Pagina 9</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">La Provincia es Requerido</div>-->
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                            for="name"
                            >Formulario:</label
                        >
                        <select name="formulario" id="formulario" v-model="form.formulario">
                            <option value="1">Alta productor</option>
                            <option value="2">Reinscripcion</option>
                            <option value="3">Alta de ruta</option>
                        </select>
                        <!--<div v-if="errors.name" class="bg-red-200">La Provincia es Requerido</div>-->
                    </div>

                    {{form.permisos}}

                    --

                    <br>
                    <br>
                    <br>


                    {{checks_names}}

                    <button
                        type="submit"
                        class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
                    >
                        Buscar
                    </button>

                    
                    



                <br>
                    <br>
                    <br>












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
                                        <span class="ml-2 text-gray-700">Administrador {{form.permisos[index][5]}} {{mostrar}} </span>
                                    </div>
                                    <div class="w-2/3">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" @change="check($event, index-1, 5, 2)"><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" @change="check($event, index-1, 5, 1 )"><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" @change="check($event, index-1, 5, 0 )"><span class="ml-2 text-gray-700">R</span>
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
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-gray-700">R</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li> 
                                <div class="flex" >
                                    <div class="w-1/3">
                                        <span class="ml-2 text-gray-700">Productor {{form.permisos[index][3]}}</span>
                                    </div>
                                    <div class="w-2/3">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-gray-700">R</span>
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
                                        <span class="ml-2 text-gray-700">Administrador {{form.permisos[index][2]}}</span>
                                    </div>
                                    <div class="w-2/3">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-gray-700">R</span>
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
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-gray-700">R</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li> 
                                <div class="flex" >
                                    <div class="w-1/3">
                                        <span class="ml-2 text-gray-700">Productor {{form.permisos[index][0]}}</span>
                                    </div>
                                    <div class="w-2/3">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">M</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span class="ml-2 text-gray-700">D</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-gray-700">R</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</div>















                    
                    <button
                        type="submit"
                        class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
                    >
                        Actualizar
                    </button>


                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";

export default {
    components: {
    },
    setup() {
        const form = useForm({
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
        const checks_names = null;

        const requerid = 1;
        const disabled = 2;
        const mostrar = 4;

        return { form };
    },
    methods: {
        search_for_the_permissions() {
        let self = this;
        axios
        .get("/admin/get_permisos_form_nuevo/"+this.form.rol+"/"+this.form.estado+"/"+this.form.accion+"/"+this.form.pagina+"/"+this.form.provincia+"/"+this.form.formulario)
        .then(function (response) {
            if (response.data.status === "success") {
                var aux = JSON.parse(response.data.permisos);
                console.log("todo bien: \n\n");
                console.log(JSON.parse(response.data.permisos));
                self.checks_names = String(aux.nombres).split('-');
                self.form.permisos = String(aux.data).split('-');
                //paso numeros a bolean
                self.form.permisos.map((value, index)=>{
                    //value = 775577
                    var value_temp = [value[5],value[4],value[3],value[2],value[1],value[0]]; // transformo el string 777777 en array
                    var permisos_function = [];
                    value_temp.map((value_sub, index_sub)=>{
                        console.log(parseInt(value_sub), 1&parseInt(value_sub),  2&parseInt(value_sub) ,4&parseInt(value_sub) );
                        // value_sub = 7 , 6 , 5 ,4 
                        //                     input(row)   cual 7, rol, m/d/r
                        permisos_function[index][index_sub][5][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][5][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][5][0]=  parseInt(value_sub) & 1 ? true : false;

                        permisos_function[index][index_sub][4][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][4][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][4][0]=  parseInt(value_sub) & 1 ? true : false;

                        permisos_function[index][index_sub][3][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][3][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][3][0]=  parseInt(value_sub) & 1 ? true : false;

                        permisos_function[index][index_sub][2][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][2][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][2][0]=  parseInt(value_sub) & 1 ? true : false;

                        permisos_function[index][index_sub][1][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][1][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][1][0]=  parseInt(value_sub) & 1 ? true : false;

                        permisos_function[index][index_sub][0][2]=  parseInt(value_sub) & 4 ? true : false;
                        permisos_function[index][index_sub][0][1]=  parseInt(value_sub) & 2 ? true : false;
                        permisos_function[index][index_sub][0][0]=  parseInt(value_sub) & 1 ? true : false;

                    });
                });

                console.log("super arra de booleans:\n\n\n");
                console.log(permisos_function);
                
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
    },
};
</script>