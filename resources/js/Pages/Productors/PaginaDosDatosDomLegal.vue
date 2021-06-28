<template>
<div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <div class="flex justify-center md:justify-end -mt-16 sticky top-0">
            <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="http://localhost:8000/formulario_alta/imagenes/domicilio-cards.png">
            <label class="flex items-center relative w-max cursor-pointer select-none">
                <br>
                <br>
                <input 
                type="checkbox" 
                class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" 
                v-model="mostrar_testing"
                />
                <span class="absolute font-medium text-xs uppercase right-1 text-white"> Sin </span>
                <span class="absolute font-medium text-xs uppercase right-8 text-white"> Con </span>
                <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
            </label>
            <label class="flex items-center relative w-max cursor-pointer select-none">
                <br>
                <br>
                <input 
                type="checkbox" 
                class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-green-500 bg-purple-500" 
                v-model="autoridad_minera"
                />
                <span class="absolute font-medium text-xs uppercase right-1 text-white"> Pro </span>
                <span class="absolute font-medium text-xs uppercase right-8 text-white"> Aut </span>
                <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
            </label>
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">{{titulo_pagina}}</h2>
            <br><br>
            <div class="flex items-center justify-center">
                <CardDomLegal v-if=" titulo_boton_guardar ===  'Guardar Datos del Domicilio Legal'"
                    :progreso="50"
                    :aprobado="50"
                    :reprobado="50" 
                    :lugar="'Argentina, San Juan'"
                    :updated_at="'hace 10 minutos'"
                    :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                    :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                ></CardDomLegal>

                <CardDomAdmin v-if=" titulo_boton_guardar ===  'Guardar Datos del Domicilio Administrativo'"
                    :progreso="50"
                    :aprobado="50"
                    :reprobado="50" 
                    :lugar="'Argentina, San Juan'"
                    :updated_at="'hace 10 minutos'"
                    :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                    :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                ></CardDomAdmin>
            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputNombreCalle 
                        v-bind:leal_calle="$props.leal_calle"
                        v-bind:nombre_calle_legal_valido="$props.nombre_calle_legal_valido"
                        v-bind:nombre_calle_legal_correcto="$props.nombre_calle_legal_correcto"
                        v-bind:obs_nombre_calle_legal="$props.obs_nombre_calle_legal"
                        v-bind:obs_nombre_calle_legal_valido="$props.obs_nombre_calle_legal_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:label="'Nombre de Calle Domicilio'"
                        v-bind:testing="mostrar_testing"
                        v-on:changenombrecallevalido="update_nombre_calle_valido($event)"
                        v-on:changenombrecallecorrecto="update_nombre_calle_correcto($event)"
                        v-on:changeobsnombrecalle="update_obs_nombre_calle($event)"
                        v-on:changeobsnombrecallevalido="update_obs_nombre_calle_validacion($event)"
                        v-on:changevalornombrecalle="update_valor_nombre_calle($event)"
                    ></InputNombreCalle>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- Nombre de calle valor input deel padre{{form_pagina.leal_calle}}
                                -- Nombre de calle input valido deel padre{{form_pagina.nombre_calle_legal_valido}}
                                -- Nombre de calle rta prod correcta deel padre{{form_pagina.nombre_calle_legal_correcto}}
                                -- Nombre de calle observacion autoridad deel padre{{form_pagina.obs_nombre_calle_legal}}
                                -- Nombre de calle observacion autoridad valida deel padre{{form_pagina.obs_nombre_calle_legal_valido}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <InputNumeroCalle
                        v-bind:leal_numero="$props.leal_numero"
                        v-bind:leal_numero_valido="$props.leal_numero_valido"
                        v-bind:leal_numero_correcto="$props.leal_numero_correcto"
                        v-bind:obs_leal_numero="$props.obs_leal_numero"
                        v-bind:obs_leal_numero_valido="$props.obs_leal_numero_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:label="'Número de Calle Domicilio'"
                        v-bind:testing="mostrar_testing"
                        v-on:changetelnumlegalvalido="update_num_legal_valido($event)"
                        v-on:changetelnumlegalcorrecto="update_num_legal_correcto($event)"
                        v-on:changeobstelnumlegal="update_obs_num_legal($event)"
                        v-on:changeobstelnumlegalvalido="update_obs_num_legal_valido($event)"
                        v-on:changevalornumlegal="update_valor_num_legal($event)"
                    >
                    </InputNumeroCalle>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans"  v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex">
                                -- numero de calle  deel padre{{form_pagina.leal_numero}}
                                -- numero de calle valida deel padre{{form_pagina.leal_numero_valido}}
                                -- numero de calle correcto deel padre{{form_pagina.leal_numero_correcto}}
                                -- numero de calle observacion deel padre{{form_pagina.obs_leal_numero}}
                                -- numero de calle observacion valida deel padre{{form_pagina.obs_leal_numero_valido}}
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputTelefono
                        v-bind:leal_telefono="$props.leal_telefono"
                        v-bind:leal_telefono_valido="$props.leal_telefono_valido"
                        v-bind:leal_telefono_correcto="$props.leal_telefono_correcto"
                        v-bind:obs_leal_telefono="$props.obs_leal_telefono"
                        v-bind:obs_leal_telefono_valido="$props.obs_leal_telefono_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:label="'Telefono de Domicilio'"
                        v-bind:testing="mostrar_testing"
                        v-on:changetellegalvalido="update_tel_legal_valido($event)"
                        v-on:changetellegalcorrecto="update_tel_legal_correcto($event)"
                        v-on:changeobstellegal="update_obs_tel_legal($event)"
                        v-on:changeobstellegalvalido="update_obs_tel_legal_valido($event)"
                        v-on:changevalortellegal="update_valor_tel_legal($event)"
                    >
                    </InputTelefono>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- telefono de calle  deel padre{{form_pagina.leal_telefono}}
                                -- telefono de calle valida deel padre{{form_pagina.leal_telefono_valido}}
                                -- telefono de calle correcto deel padre{{form_pagina.leal_telefono_correcto}}
                                -- telefono de calle observacion deel padre{{form_pagina.obs_leal_telefono}}
                                -- telefono de calle observacion valida deel padre{{form_pagina.obs_leal_telefono_valido}}
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <SelectProvincia
                        v-bind:leal_provincia="$props.leal_provincia"
                        v-bind:leal_provincia_valido="$props.leal_provincia_valido"
                        v-bind:leal_provincia_correcto="$props.leal_provincia_correcto"
                        v-bind:obs_leal_provfincia="$props.obs_leal_provincia"
                        v-bind:obs_leal_provincia_valido="$props.obs_leal_provincia_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Provincia de Domicilio Legal'"
                        v-bind:lista_provincias="$props.lista_provincias"
                        v-on:changeprovlegalvalido="update_provincia_valido($event)"
                        v-on:changeprovlegalcorrecto="update_provincia_correcto($event)"
                        v-on:changeobsrpovlegal="update_obs_provincia_legal($event)"
                        v-on:changeobsprovlegalvalido="update_obs_provincia_legal_valido($event)"
                        v-on:changevalorprovlegal="update_valor_provincia_legal_num_legal($event)"

                    >
                    </SelectProvincia>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- provincia de calle  deel padre{{form_pagina.leal_provincia}}
                                -- provincia de calle valida deel padre{{form_pagina.leal_provincia_valido}}
                                -- provincia de calle correcto deel padre{{form_pagina.leal_provincia_correcto}}
                                -- provincia de calle observacion deel padre{{form_pagina.obs_leal_provincia}}
                                -- provincia de calle observacion valida deel padre{{form_pagina.obs_leal_provincia_valido}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <SelectDepartamento
                        v-bind:leal_departamento="$props.leal_departamento"
                        v-bind:leal_departamento_valido="$props.leal_departamento_valido"
                        v-bind:leal_departamento_correcto="$props.leal_departamento_correcto"
                        v-bind:obs_leal_departamento="$props.obs_leal_departamento"
                        v-bind:obs_leal_departamento_valido="$props.obs_leal_departamento_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Departamento de Domicilio Legal'"
                        v-bind:lista_departamentos= "lista_dptos"
                        v-on:changedptolegalvalido="update_dpto_valido($event)"
                        v-on:changedptolegalcorrecto="update_dpto_correcto($event)"
                        v-on:changeobsrdptolegal="update_obs_dpto_legal($event)"
                        v-on:changeobsdptolegalvalido="update_obs_dpto_legal_valido($event)"
                        v-on:changevalordptolegal="update_valor_dpto_legal_num_legal($event)"
                    >
                    </SelectDepartamento>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- dpto de calle  deel padre{{form_pagina.leal_departamento}}
                                -- dpto de calle valida deel padre{{form_pagina.leal_departamento_valido}}
                                -- dpto de calle correcto deel padre{{form_pagina.leal_departamento_correcto}}
                                -- dpto de calle observacion deel padre{{form_pagina.obs_leal_departamento}}
                                -- dpto de calle observacion valida deel padre{{form_pagina.obs_leal_departamento_valido}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputLocalidad
                        v-bind:leal_localidad="$props.leal_localidad"
                        v-bind:leal_localidad_valido="$props.leal_localidad_valido"
                        v-bind:leal_localidad_correcto="$props.leal_localidad_correcto"
                        v-bind:obs_leal_localidad="$props.obs_leal_localidad"
                        v-bind:obs_leal_localidad_valido="$props.obs_leal_localidad_valido"
                         v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Localidad del Domicilio Legal'"
                        v-on:changelocalidadlegalvalido="update_localidad_valido($event)"
                        v-on:changelocalidadlegalcorrecto="update_localidad_correcto($event)"
                        v-on:changeobsrlocalidadlegal="update_obs_localidad_legal($event)"
                        v-on:changeobslocalidadlegalvalido="update_obs_localidad_legal_valido($event)"
                        v-on:changevalorlocalidadlegal="update_valor_localidad_legal_num_legal($event)"

                    >
                    </InputLocalidad>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- localidad de calle  deel padre{{form_pagina.leal_localidad}}
                                -- localidad de calle valida deel padre{{form_pagina.leal_localidad_valido}}
                                -- localidad de calle correcto deel padre{{form_pagina.leal_localidad_correcto}}
                                -- localidad de calle observacion deel padre{{form_pagina.obs_leal_localidad}}
                                -- localidad de calle observacion valida deel padre{{form_pagina.obs_leal_localidad_valido}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputCP
                        v-bind:leal_cp="$props.leal_cp"
                        v-bind:leal_cp_valido="$props.leal_cp_valido"
                        v-bind:leal_cp_correcto="$props.leal_cp_correcto"
                        v-bind:obs_leal_cp="$props.obs_leal_cp"
                        v-bind:obs_leal_cp_valido="$props.obs_leal_cp_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Codigo Postal'"
                        v-on:changecplegalvalido="update_cp_valido($event)"
                        v-on:changecplegalcorrecto="update_cp_correcto($event)"
                        v-on:changeobsrcplegal="update_obs_cp_legal($event)"
                        v-on:changeobscplegalvalido="update_obs_cp_legal_valido($event)"
                        v-on:changevalorcplegal="update_valor_cp($event)"

                    >
                    </InputCP>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- cod postal de calle  deel padre{{form_pagina.leal_cp}}
                                -- cod postal de calle valida deel padre{{form_pagina.leal_cp_valido}}
                                -- cod postal de calle correcto deel padre{{form_pagina.leal_cp_correcto}}
                                -- cod postal de calle observacion deel padre{{form_pagina.obs_leal_cp}}
                                -- cod postal de calle observacion valida deel padre{{form_pagina.obs_leal_cp_valido}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputOtro
                        v-bind:leal_otro="$props.leal_otro"
                        v-bind:leal_otro_valido="$props.leal_otro_valido"
                        v-bind:leal_otro_correcto="$props.leal_otro_correcto"
                        v-bind:obs_leal_otro="$props.obs_leal_otro"
                        v-bind:obs_leal_otro_valido="$props.obs_leal_otro_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Otro Dato Imporante'"
                        v-on:changeotrolegalvalido="update_otro_valido($event)"
                        v-on:changeotrolegalcorrecto="update_otro_correcto($event)"
                        v-on:changeobsotrolegal="update_obs_otro_legal($event)"
                        v-on:changeobsotrolegalvalido="update_obs_otro_legal_valido($event)"
                        v-on:changevalorotrolegal="update_valor_otro($event)"

                    >
                    </InputOtro>
                    <div class="flex items-center justify-center bg-teal-lightest font-sans" v-if="mostrar_testing">
                        <div class="w-full  bg-white rounded shadow p-6 m-8">
                            <div class="flex" >
                                -- otro de calle  deel padre{{form_pagina.leal_otro}}
                                -- otro de calle valida deel padre{{form_pagina.leal_otro_valido}}
                                -- otro de calle correcto deel padre{{form_pagina.leal_otro_correcto}}
                                -- otro de calle observacion deel padre{{form_pagina.obs_leal_otro}}
                                -- otro de calle observacion valida deel padre{{form_pagina.obs_leal_otro_valido}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
         <div class="flex items-center justify-center">
            <BotonesPaginaDos 
                :link_volver="route('formulario-alta.index')"
                :titulo_boton_volver="'volver'"
                :titulo_boton_guardar="'Guardar Datos del Domicilio Legal'"

                :leal_calle="form_pagina.leal_calle"
                :nombre_calle_legal_valido="form_pagina.nombre_calle_legal_valido"
                :nombre_calle_legal_correcto="form_pagina.nombre_calle_legal_correcto"
                :obs_nombre_calle_legal="form_pagina.obs_nombre_calle_legal"
                :obs_nombre_calle_legal_valido="form_pagina.obs_nombre_calle_legal_valido"
                :leal_numero="form_pagina.leal_numero"
                :leal_numero_valido="form_pagina.leal_numero_valido"
                :leal_numero_correcto="form_pagina.leal_numero_correcto"
                :obs_leal_numero="form_pagina.obs_leal_numero"
                :obs_leal_numero_valido="form_pagina.obs_leal_numero_valido"
                :leal_telefono="form_pagina.leal_telefono"
                :leal_telefono_valido="form_pagina.leal_telefono_valido"
                :leal_telefono_correcto="form_pagina.leal_telefono_correcto"
                :obs_leal_telefono="form_pagina.obs_leal_telefono"
                :obs_leal_telefono_valido="form_pagina.obs_leal_telefono_valido"
                :leal_pais="form_pagina.leal_pais"
                :leal_pais_valido="form_pagina.leal_pais_valido"
                :leal_pais_correcto="form_pagina.leal_pais_correcto"
                :obs_leal_pais="form_pagina.obs_leal_pais"
                :obs_leal_pais_valido="form_pagina.obs_leal_pais_valido"
                :leal_provincia="form_pagina.leal_provincia"
                :leal_provincia_valido="form_pagina.leal_provincia_valido"
                :leal_provincia_correcto="form_pagina.leal_provincia_correcto"
                :obs_leal_provincia="form_pagina.obs_leal_provincia"
                :obs_leal_provincia_valido="form_pagina.obs_leal_provincia_valido"
                :leal_departamento="form_pagina.leal_departamento"
                :leal_departamento_valido="form_pagina.leal_departamento_valido"
                :leal_departamento_correcto="form_pagina.leal_departamento_correcto"
                :obs_leal_departamento="form_pagina.obs_leal_departamento"
                :obs_leal_departamento_valido="form_pagina.obs_leal_departamento_valido"
                :leal_localidad="form_pagina.leal_localidad"
                :leal_localidad_valido="form_pagina.leal_localidad_valido"
                :leal_localidad_correcto="form_pagina.leal_localidad_correcto"
                :obs_leal_localidad="form_pagina.obs_leal_localidad"
                :obs_leal_localidad_valido="form_pagina.obs_leal_localidad_valido"
                :leal_cp="form_pagina.leal_cp"
                :leal_cp_valido="form_pagina.leal_cp_valido"
                :leal_cp_correcto="form_pagina.leal_cp_correcto"
                :obs_leal_cp="form_pagina.obs_leal_cp"
                :obs_leal_cp_valido="form_pagina.obs_leal_cp_valido"
                :leal_otro="form_pagina.leal_otro"
                :leal_otro_valido="form_pagina.leal_otro_valido"
                :leal_otro_correcto="form_pagina.leal_otro_correcto"
                :obs_leal_otro="form_pagina.obs_leal_otro"
                :obs_leal_otro_valido="form_pagina.obs_leal_otro_valido"

                :donde_guardar="$props.donde_estoy"


                :evaluacion="autoridad_minera"
                :id="$props.id"
            ></BotonesPaginaDos>
         </div>

        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div>
    </div>

</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardDomLegal from '@/Jetstream/altas/CardDomLegal';
import CardDomAdmin from '@/Jetstream/altas/CardDomAdmin';
import InputNombreCalle from "@/Pages/Productors/InputNombreCalle";

import InputNumeroCalle from "@/Pages/Productors/InputNumeroCalle";
import InputTelefono from "@/Pages/Productors/InputTelefono";
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";

import InputLocalidad from "@/Pages/Productors/InputLocalidad";
import InputCP from "@/Pages/Productors/InputCP";
import InputOtro from "@/Pages/Productors/InputOtro";
import BotonesPaginaDos from "@/Pages/Productors/BotonesPaginaDos";


export default {
  watch: {
  },
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'leal_calle',
        'nombre_calle_legal_valido',
        'nombre_calle_legal_correcto',
        'obs_nombre_calle_legal',
        'obs_nombre_calle_legal_valido',
        'leal_numero',
        'leal_numero_valido',
        'leal_numero_correcto',
        'obs_leal_numero',
        'obs_leal_numero_valido',
        'leal_telefono',
        'leal_telefono_valido',
        'leal_telefono_correcto',
        'obs_leal_telefono',
        'obs_leal_telefono_valido',
        'leal_pais',
        'leal_pais_valido',
        'leal_pais_correcto',
        'obs_leal_pais',
        'obs_leal_pais_valido',
        'leal_provincia',
        'leal_provincia_valido',
        'leal_provincia_correcto',
        'obs_leal_provincia',
        'obs_leal_provincia_valido',
        'leal_departamento',
        'leal_departamento_valido',
        'leal_departamento_correcto',
        'obs_leal_departamento',
        'obs_leal_departamento_valido',
        'leal_localidad',
        'leal_localidad_valido',
        'leal_localidad_correcto',
        'obs_leal_localidad',
        'obs_leal_localidad_valido',
        'leal_cp',
        'leal_cp_valido',
        'leal_cp_correcto',
        'obs_leal_cp',
        'obs_leal_cp_valido',
        'leal_otro',
        'leal_otro_valido',
        'leal_otro_correcto',
        'obs_leal_otro',
        'obs_leal_otro_valido',

        'donde_estoy',
        'lista_provincias',
        'lista_dptos',

        'evaluacion',
        'id'
    ],
 
    components: {
		JetDialogModal,
		CardDomLegal,
        CardDomAdmin,
		InputNombreCalle,
		InputNumeroCalle,
		InputTelefono,
		SelectProvincia,
        SelectDepartamento,
        InputCP,
		InputLocalidad,
		InputOtro,
        BotonesPaginaDos,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing:false,
        autoridad_minera: false,
        form_pagina: {

            leal_calle : this.$props.leal_calle,
            nombre_calle_legal_valido: this.$props.nombre_calle_legal_valido,
            nombre_calle_legal_correcto: this.$props.nombre_calle_legal_correcto,
            obs_nombre_calle_legal:  this.$props.obs_nombre_calle_legal,
            obs_nombre_calle_legal_valido : this.$props.obs_nombre_calle_legal_valido,

            leal_numero: this.$props.leal_numero,
            leal_numero_valido:  this.$props.leal_numero_valido,
            leal_numero_correcto:  this.$props.leal_numero_correcto,
            obs_leal_numero:  this.$props.obs_leal_numero,
            obs_leal_numero_valido: this.$props.obs_leal_numero_valido,
            
            leal_telefono : this.$props.leal_telefono,
            leal_telefono_valido : this.$props.leal_telefono_valido,
            leal_telefono_correcto : this.$props.leal_telefono_correcto,
            obs_leal_telefono: this.$props.obs_leal_telefono,
            obs_leal_telefono_valido: this.$props.obs_leal_telefono_valido,


            leal_provincia: this.$props.leal_provincia,
            leal_provincia_valido: this.$props.leal_provincia_valido,
            leal_provincia_correcto: this.$props.leal_provincia_correcto,
            obs_leal_provincia: this.$props.obs_leal_provincia,
            obs_leal_provincia_valido: this.$props.obs_leal_provincia_valido,


            leal_departamento: this.$props.leal_departamento,
            leal_departamento_valido: this.$props.leal_departamento_valido,
            leal_departamento_correcto: this.$props.leal_departamento_correcto,
            obs_leal_departamento: this.$props.obs_leal_departamento,
            obs_leal_departamento_valido: this.$props.obs_leal_departamento_valido,



            leal_localidad: this.$props.leal_localidad,
            leal_localidad_valido: this.$props.leal_localidad_valido,
            leal_localidad_correcto: this.$props.leal_localidad_correcto,
            obs_leal_localidad: this.$props.obs_leal_localidad,
            obs_leal_localidad_valido: this.$props.obs_leal_localidad_valido,



            leal_cp: this.$props.leal_cp,
            leal_cp_valido: this.$props.leal_cp_valido,
            leal_cp_correcto: this.$props.leal_cp_correcto,
            obs_leal_cp: this.$props.obs_leal_cp,
            obs_leal_cp_valido: this.$props.obs_leal_cp_valido,



            leal_otro: this.$props.leal_otro,
            leal_otro_valido: this.$props.leal_otro_valido,
            leal_otro_correcto: this.$props.leal_otro_correcto,
            obs_leal_otro: this.$props.obs_leal_otro,
            obs_leal_otro_valido: this.$props.obs_leal_otro_valido,


        },
        lista_departamentos:[],
        lista_localidades:[],
    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        //FUNCIONES DE NOMBRE DE CALLE
        update_nombre_calle_valido(newValue){
                this.form_pagina.nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_nombre_calle_correcto(newValue){
            this.form_pagina.nombre_calle_legal_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nombre_calle(newValue){
            this.form_pagina.obs_nombre_calle_legal = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nombre_calle_validacion(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_nombre_calle(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_calle = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE Numero de calle
        update_num_legal_valido(newValue){
            this.form_pagina.leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_num_legal_correcto(newValue){
            this.form_pagina.leal_numero_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_num_legal(newValue){
            this.form_pagina.obs_leal_numero = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_num_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_num_legal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_numero = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE TELEFONO
        update_tel_legal_valido(newValue){
            this.form_pagina.leal_telefono_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_tel_legal_correcto(newValue){
            this.form_pagina.leal_telefono_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_tel_legal(newValue){
            this.form_pagina.obs_leal_telefono = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_tel_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_telefono_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_tel_legal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_telefono = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES  DE PROVINCIA
        update_provincia_valido(newValue){
            this.form_pagina.leal_provincia_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_provincia_correcto(newValue){
            this.form_pagina.leal_provincia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_provincia_legal(newValue){
            this.form_pagina.obs_leal_provincia = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_provincia_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_provincia_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_provincia_legal_num_legal(newValue){
            let self = this;
            console.log("cambio la provincia de mi hijo por:"+newValue);
            
            //this.form_pagina.localidad_mina_provincia = newValue;
            this.form_pagina.leal_provincia = newValue;
            
            //debo actualizar la lista de departamento que tengo disponibles para elegir
            axios.post('/datos/traer_departamentos/',{id_prov:newValue})
                .then(function (response) {
                    console.log("las deptos son:\n");
                    self.lista_departamentos = response.data;
                    console.log(self.lista_departamentos);

                })
                .catch(function (error) {
                    console.log(error);
                });
            //tengo que enviarsela al padre
        },

     




        update_dpto_valido(newValue){
            this.form_pagina.leal_departamento_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_dpto_correcto(newValue){
            this.form_pagina.leal_departamento_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_dpto_legal(newValue){
            this.form_pagina.obs_leal_departamento = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_dpto_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_departamento_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_dpto_legal_num_legal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_departamento = newValue;
            //tengo que enviarsela al padre
        },







        update_localidad_valido(newValue){
            this.form_pagina.leal_localidad_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_localidad_correcto(newValue){
            this.form_pagina.leal_localidad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_localidad_legal(newValue){
            this.form_pagina.obs_leal_localidad = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_localidad_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_localidad_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_localidad_legal_num_legal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_localidad = newValue;
            //tengo que enviarsela al padre
        },




        update_cp_valido(newValue){
            this.form_pagina.leal_cp_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_cp_correcto(newValue){
            this.form_pagina.leal_cp_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cp_legal(newValue){
            this.form_pagina.obs_leal_cp = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cp_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_cp_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_cp(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_cp = newValue;
            //tengo que enviarsela al padre
        },



















        update_otro_valido(newValue){
            this.form_pagina.leal_otro_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_otro_correcto(newValue){
            this.form_pagina.leal_otro_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_otro_legal(newValue){
            this.form_pagina.obs_leal_otro = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_otro_legal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_otro_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_otro(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_otro = newValue;
            //tengo que enviarsela al padre
        },









        
  }
  
};
</script>
