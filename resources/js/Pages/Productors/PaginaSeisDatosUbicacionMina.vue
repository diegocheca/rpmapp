<style>
  

  input:checked {
    background-color: #22c55e; /* bg-green-500 */
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }
</style>
<template>
    <div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <div class="flex justify-center md:justify-end -mt-16 sticky top-0">
            <a href="#section_datos_mina_ubicacion">
                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="http://localhost:8000/slick/img/features/plano-minero.svg">
            </a>
            <div v-if="$props.testing">
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
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">{{titulo_pagina}}</h2>
            <br><br>
            <div class="flex items-center justify-center">
                <CardMinaUbicacion 
                    :progreso="50"
                    :aprobado="50"
                    :reprobado="50" 
                    :lugar="'Argentina, San Juan'"
                    :updated_at="'hace 10 minutos'"
                    :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                    :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                    :ayuda="ayuda_local"
                    v-on:changevalorayuda="update_valor_ayuda_local($event)"
                ></CardMinaUbicacion>
            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                País: <span>Argentina</span>
                </div>
            </div>
            <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <SelectProvincia
                v-if="mostrar_ubicacion_prov"

                    v-bind:leal_provincia="$props.localidad_mina_provincia"
                    v-bind:leal_provincia_valido="$props.localidad_mina_provincia_validacion"
                    v-bind:leal_provincia_correcto="$props.localidad_mina_provincia_correcto"
                    v-bind:obs_leal_provincia="$props.obs_localidad_mina_provincia"
                    v-bind:obs_leal_provincia_valido="$props.obs_localidad_mina_provincia_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Provincia de Ubicación de Mina'"
                    v-bind:lista_provincias="$props.lista_provincias"
                    v-bind:name_correcto="'prov_mina_correcto'"
                    v-bind:desactivar_legal_prov="$props.desactivar_ubicacion_prov"
                    v-bind:mostrar_legal_prov_correccion="$props.mostrar_ubicacion_prov_correccion"
                    v-bind:desactivar_legal_prov_correccion="$props.desactivar_ubicacion_prov_correccion"

                    v-on:changeprovlegalvalido="update_provincia_valido($event)"
                    v-on:changeprovlegalcorrecto="update_provincia_correcto($event)"
                    v-on:changeobsrpovlegal="update_obs_provincia($event)"
                    v-on:changeobsprovlegalvalido="update_obs_provincia_valido($event)"
                    v-on:changevalorprovlegal="update_valor_provincia($event)"
                >
                </SelectProvincia>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    -- localidad_mina_provincia  deel padre{{form_pagina.localidad_mina_provincia}}
                    -- localidad_mina_provincia_validacion valida deel padre{{form_pagina.localidad_mina_provincia_validacion}}
                    -- localidad_mina_provincia_correcto correcto deel padre{{form_pagina.localidad_mina_provincia_correcto}}
                    -- obs_localidad_mina_provincia observacion deel padre{{form_pagina.obs_localidad_mina_provincia}}
                    -- obs_localidad_mina_provincia_valido observacion valida deel padre{{form_pagina.obs_localidad_mina_provincia_valido}}
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <SelectDepartamento
                v-if="mostrar_ubicacion_dpto"

                    v-bind:leal_departamento="$props.localidad_mina_departamento"
                    v-bind:leal_departamento_valido="$props.localidad_mina_departamento_validacion"
                    v-bind:leal_departamento_correcto="$props.localidad_mina_departamento_correcto"
                    v-bind:obs_leal_departamento="$props.obs_localidad_mina_departamento"
                    v-bind:obs_leal_departamento_valido="$props.obs_localidad_mina_departamento_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Departamento de Ubicacion de la Mina'"
                    v-bind:lista_departamentos= "lista_departamentos"
                    v-bind:desactivar_legal_dpto="$props.desactivar_ubicacion_dpto"
                    v-bind:mostrar_legal_dpto_correccion="$props.mostrar_ubicacion_dpto_correccion"
                    v-bind:desactivar_legal_dpto_correccion="$props.desactivar_ubicacion_dpto_correccion"

                    v-on:changedptolegalvalido="update_dpto_valido($event)"
                    v-on:changedptolegalcorrecto="update_dpto_correcto($event)"
                    v-on:changeobsrdptolegal="updateobs_dpto_legal($event)"
                    v-on:changeobsdptolegalvalido="update_obs_dpto_valido($event)"
                    v-on:changevalordptolegal="update_valor_dpto($event)"
                >
                </SelectDepartamento>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    -- dpto _mina_provincia  deel padre{{form_pagina.localidad_mina_departamento}}
                    -- dpto _mina_provincia_validacion valida deel padre{{form_pagina.localidad_mina_departamento_validacion}}
                    -- dpto _mina_provincia_correcto correcto deel padre{{form_pagina.localidad_mina_departamento_correcto}}
                    -- obs_dpto_provincia observacion deel padre{{form_pagina.obs_localidad_mina_departamento}}
                    -- obs_dpto_provincia_valido observacion valida deel padre{{form_pagina.obs_localidad_mina_departamento_valido}}
                </div>
            </div>
            </div>
            <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="mostrar_ubicacion_localidad"
                
                    v-bind:valor_input_props="$props.localidad_mina_localidad"
                    v-bind:valor_input_validacion="$props.localidad_mina_localidad_validacion"
                    v-bind:evualacion_correcto="$props.localidad_mina_localidad_correcto"
                    v-bind:valor_obs="$props.obs_localidad_mina_localidad"
                    v-bind:valor_valido_obs="$props.obs_localidad_mina_localidad_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Localidad Donde se encuentra la Mina:'"
                    v-bind:icon="'http://localhost:8000/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_ubicacion_localidad"
                    v-bind:mostrar_correccion="$props.mostrar_ubicacion_localidad_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_ubicacion_localidad_correccion"

                    v-on:changevalido="update_localidad_valido($event)"
                    v-on:changecorrecto="update_localidad_correcto($event)"
                    v-on:changeobs="update_obs_localidad($event)"
                    v-on:changeobsvalido="update_obs_localidad_valida($event)"
                    v-on:changevalor="update_valor_localidad($event)"
                >
                </NombreMina>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> localidad_mina_localidad de Mina valor padre: {{form_pagina.localidad_mina_localidad}}
                    <br> localidad_mina_localidad_validacion de Mina  valido del padre: {{form_pagina.localidad_mina_localidad_validacion}}
                    <br> localidad_mina_localidad_correcto de Mina  correcto deel padre: {{form_pagina.localidad_mina_localidad_correcto}}
                    <br> obs_localidad_mina_localidad de Mina  observacion deel padre: {{form_pagina.obs_localidad_mina_localidad}}
                    <br> obs_localidad_mina_localidad_valido de Mina  observacion valida deel padre: {{form_pagina.obs_localidad_mina_localidad_valido}}
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <TipoDeSistemaGeo
                v-if="$props.mostrar_ubicacion_sistema"
                
                    v-bind:valor_input_props="$props.tipo_sistema"
                    v-bind:valor_input_validacion="$props.tipo_sistema_validacion"
                    v-bind:evualacion_correcto="$props.tipo_sistema_correcto"
                    v-bind:valor_obs="$props.obs_tipo_sistema"
                    v-bind:valor_valido_obs="$props.obs_tipo_sistema_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Tipo de Sistema de Coordenadas:'"
                    v-bind:desactivar_input="$props.desactivar_ubicacion_sistema"
                    v-bind:mostrar_correccion="$props.mostrar_ubicacion_sistema_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_ubicacion_sistema_correccion"

                    v-on:changevalido="update_sist_coor_valido($event)"
                    v-on:changecorrecto="update_sist_coor_correcto($event)"
                    v-on:changeobs="update_obs_sist_coor($event)"
                    v-on:changeobsvalido="update_obs_sist_coor_valida($event)"
                    v-on:changevalor="update_valor_sist_coor($event)"
                >
                </TipoDeSistemaGeo>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> tipo_sistema de Mina valor padre: {{form_pagina.tipo_sistema}}
                    <br> tipo_sistema_validacion de Mina  valido del padre: {{form_pagina.tipo_sistema_validacion}}
                    <br> tipo_sistema_correcto de Mina  correcto deel padre: {{form_pagina.tipo_sistema_correcto}}
                    <br> obs_tipo_sistema de Mina  observacion deel padre: {{form_pagina.obs_tipo_sistema}}
                    <br> obs_tipo_sistema_valido de Mina  observacion valida deel padre: {{form_pagina.obs_tipo_sistema_valido}}
                </div>
            </div>
            </div>
            <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                v-if="$props.mostrar_ubicacion_latitud"

                    v-bind:valor_input_props="$props.latitud"
                    v-bind:valor_input_validacion="$props.latitud_validacion"
                    v-bind:evualacion_correcto="$props.latitud_correcto"
                    v-bind:valor_obs="$props.obs_latitud"
                    v-bind:valor_valido_obs="$props.obs_latitud_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Latitud de las Coordenadas:'"
                    v-bind:icon="'http://localhost:8000/svg/pinmap.svg'"
                    v-bind:desactivar_input="$props.desactivar_ubicacion_latitud"
                    v-bind:mostrar_correccion="$props.mostrar_ubicacion_latitud_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_ubicacion_latitud_correccion"


                    v-on:changevalido="update_latitud_valido($event)"
                    v-on:changecorrecto="update_latitud_correcto($event)"
                    v-on:changeobs="update_obs_latitud($event)"
                    v-on:changeobsvalido="update_obs_latitud_valida($event)"
                    v-on:changevalor="update_valor_latitud($event)"
                >
                </NombreMina>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> latitud de Mina valor padre: {{form_pagina.latitud}}
                    <br> latitud_validacion de Mina  valido del padre: {{form_pagina.latitud_validacion}}
                    <br> latitud_correcto de Mina  correcto deel padre: {{form_pagina.latitud_correcto}}
                    <br> obs_latitud de Mina  observacion deel padre: {{form_pagina.obs_latitud}}
                    <br> obs_latitud_valido de Mina  observacion valida deel padre: {{form_pagina.obs_latitud_valido}}
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                v-if="$props.mostrar_ubicacion_long"

                    v-bind:valor_input_props="$props.longitud"
                    v-bind:valor_input_validacion="$props.longitud_validacion"
                    v-bind:evualacion_correcto="$props.longitud_correcto"
                    v-bind:valor_obs="$props.obs_longitud"
                    v-bind:valor_valido_obs="$props.obs_longitud_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Longitud de las Coordenadas:'"
                    v-bind:icon="'http://localhost:8000/svg/pinmap.svg'"
                    v-bind:desactivar_input="$props.desactivar_ubicacion_long"
                    v-bind:mostrar_correccion="$props.mostrar_ubicacion_long_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_ubicacion_long_correccion"

                    v-on:changevalido="update_sist_coor_lonvalido($event)"
                    v-on:changecorrecto="update_sist_coor_loncorrecto($event)"
                    v-on:changeobs="update_obs_sist_coor_lon($event)"
                    v-on:changeobsvalido="update_obs_sist_coor_lonvalida($event)"
                    v-on:changevalor="update_valor_sist_coor_lon($event)"
                >
                </NombreMina>
                <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> longitud de Mina valor padre: {{form_pagina.longitud}}
                    <br> longitud_validacion de Mina  valido del padre: {{form_pagina.longitud_validacion}}
                    <br> longitud_correcto de Mina  correcto deel padre: {{form_pagina.longitud_correcto}}
                    <br> obs_longitud de Mina  observacion deel padre: {{form_pagina.obs_longitud}}
                    <br> obs_longitud_valido de Mina  observacion valida deel padre: {{form_pagina.obs_longitud_valido}}
                </div>
            </div>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div>
        <BotonesPaginaSeis
        v-if="$props.mostrar_boton_guardar_seis"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de Ubicacion de la Mina'"

            :localidad_mina_provincia="form_pagina.localidad_mina_provincia"
            :localidad_mina_provincia_validacion="form_pagina.localidad_mina_provincia_validacion"
            :localidad_mina_provincia_correcto="form_pagina.localidad_mina_provincia_correcto"
            :obs_localidad_mina_provincia="form_pagina.obs_localidad_mina_provincia"
            :obs_localidad_mina_provincia_valido="form_pagina.obs_localidad_mina_provincia_valido"
            :localidad_mina_departamento="form_pagina.localidad_mina_departamento"
            :localidad_mina_departamento_validacion="form_pagina.localidad_mina_departamento_validacion"
            :localidad_mina_departamento_correcto="form_pagina.localidad_mina_departamento_correcto"
            :obs_localidad_mina_departamento="form_pagina.obs_localidad_mina_departamento"
            :obs_localidad_mina_departamento_valido="form_pagina.obs_localidad_mina_departamento_valido"
            :localidad_mina_localidad="form_pagina.localidad_mina_localidad"
            :localidad_mina_localidad_validacion="form_pagina.localidad_mina_localidad_validacion"
            :localidad_mina_localidad_correcto="form_pagina.localidad_mina_localidad_correcto"
            :obs_localidad_mina_localidad="form_pagina.obs_localidad_mina_localidad"
            :obs_localidad_mina_localidad_valido="form_pagina.obs_localidad_mina_localidad_valido"
            :tipo_sistema="form_pagina.tipo_sistema"
            :tipo_sistema_validacion="form_pagina.tipo_sistema_validacion"
            :tipo_sistema_correcto="form_pagina.tipo_sistema_correcto"
            :obs_tipo_sistema="form_pagina.obs_tipo_sistema"
            :obs_tipo_sistema_valido="form_pagina.obs_tipo_sistema_valido"
            :latitud="form_pagina.latitud"
            :latitud_validacion="form_pagina.latitud_validacion"
            :latitud_correcto="form_pagina.latitud_correcto"
            :obs_latitud="form_pagina.obs_latitud"
            :obs_latitud_valido="form_pagina.obs_latitud_valido"
            :longitud="form_pagina.longitud"
            :longitud_validacion="form_pagina.longitud_validacion"
            :longitud_correcto="form_pagina.longitud_correcto"
            :obs_longitud="form_pagina.obs_longitud"
            :obs_longitud_valido="form_pagina.obs_longitud_valido"

            :donde_guardar="$props.donde_estoy"

            :evaluacion="autoridad_minera"
            :testing ="mostrar_testing"
            :id="$props.id"
        >
        </BotonesPaginaSeis>
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardMinaUbicacion from '@/Jetstream/altas/CardMinaUbicacion';
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import BotonesPaginaSeis from "@/Pages/Productors/BotonesPaginaSeis";

export default {
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'localidad_mina_pais',
        'localidad_mina_pais_validacion',
        'localidad_mina_pais_correcto',
        'obs_localidad_mina_pais',
        'obs_localidad_mina_pais_valido',
        'localidad_mina_provincia',
        'localidad_mina_provincia_validacion',
        'localidad_mina_provincia_correcto',
        'obs_localidad_mina_provincia',
        'obs_localidad_mina_provincia_valido',
        'mostrar_ubicacion_prov',
        'desactivar_ubicacion_prov',
        'mostrar_ubicacion_prov_correccion',
        'desactivar_ubicacion_prov_correccion',

        'localidad_mina_departamento',
        'localidad_mina_departamento_validacion',
        'localidad_mina_departamento_correcto',
        'obs_localidad_mina_departamento',
        'obs_localidad_mina_departamento_valido',
        'mostrar_ubicacion_dpto',
        'desactivar_ubicacion_dpto',
        'mostrar_ubicacion_dpto_correccion',
        'desactivar_ubicacion_dpto_correccion',

        'localidad_mina_localidad',
        'localidad_mina_localidad_validacion',
        'localidad_mina_localidad_correcto',
        'obs_localidad_mina_localidad',
        'obs_localidad_mina_localidad_valido',
        'mostrar_ubicacion_localidad',
        'desactivar_ubicacion_localidad',
        'mostrar_ubicacion_localidad_correccion',
        'desactivar_ubicacion_localidad_correccion',

        'tipo_sistema',
        'tipo_sistema_validacion',
        'tipo_sistema_correcto',
        'obs_tipo_sistema',
        'obs_tipo_sistema_valido',
        'mostrar_ubicacion_sistema',
        'desactivar_ubicacion_sistema',
        'mostrar_ubicacion_sistema_correccion',
        'desactivar_ubicacion_sistema_correccion',

        'latitud',
        'latitud_validacion',
        'latitud_correcto',
        'obs_latitud',
        'obs_latitud_valido',
        'mostrar_ubicacion_latitud',
        'desactivar_ubicacion_latitud',
        'mostrar_ubicacion_latitud_correccion',
        'desactivar_ubicacion_latitud_correccion',

        'longitud',
        'longitud_validacion',
        'longitud_correcto',
        'obs_longitud',
        'obs_longitud_valido',
        'mostrar_ubicacion_long',
        'desactivar_ubicacion_long',
        'mostrar_ubicacion_long_correccion',
        'desactivar_ubicacion_long_correccion',

        'lista_provincias',
        'lista_dptos',

        'mostrar_boton_guardar_seis',
        'desactivar_boton_guardar_seis',

        'evaluacion',
        'id',
        'testing'
    ],
 
    components: {
		JetDialogModal,
        CardMinaUbicacion,
		SelectProvincia,
        SelectDepartamento,
        NombreMina,
        TipoDeSistemaGeo,
        BotonesPaginaSeis,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing:false,
        autoridad_minera:this.$props.evaluacion,
        ayuda_local: false,
        form_pagina: {

            localidad_mina_provincia: this.$props.localidad_mina_provincia,
            localidad_mina_provincia_validacion: this.$props.localidad_mina_provincia_validacion,
            localidad_mina_provincia_correcto: this.$props.localidad_mina_provincia_correcto,
            obs_localidad_mina_provincia: this.$props.obs_localidad_mina_provincia,
            obs_localidad_mina_provincia_valido: this.$props.obs_localidad_mina_provincia_valido,


            localidad_mina_departamento: this.$props.localidad_mina_departamento,
            localidad_mina_departamento_validacion: this.$props.localidad_mina_departamento_validacion,
            localidad_mina_departamento_correcto: this.$props.localidad_mina_departamento_correcto,
            obs_localidad_mina_departamento: this.$props.obs_localidad_mina_departamento,
            obs_localidad_mina_departamento_valido: this.$props.obs_localidad_mina_departamento_valido,

            localidad_mina_localidad: this.$props.localidad_mina_localidad,
            localidad_mina_localidad_validacion: this.$props.localidad_mina_localidad_validacion,
            localidad_mina_localidad_correcto: this.$props.localidad_mina_localidad_correcto,
            obs_localidad_mina_localidad: this.$props.obs_localidad_mina_localidad,
            obs_localidad_mina_localidad_valido: this.$props.obs_localidad_mina_localidad_valido,


            tipo_sistema: this.$props.tipo_sistema,
            tipo_sistema_validacion: this.$props.tipo_sistema_validacion,
            tipo_sistema_correcto: this.$props.tipo_sistema_correcto,
            obs_tipo_sistema: this.$props.obs_tipo_sistema,
            obs_tipo_sistema_valido: this.$props.obs_tipo_sistema_valido,


            latitud: this.$props.latitud,
            latitud_validacion: this.$props.latitud_validacion,
            latitud_correcto: this.$props.latitud_correcto,
            obs_latitud: this.$props.obs_latitud,
            obs_latitud_valido: this.$props.obs_latitud_valido,



            longitud: this.$props.longitud,
            longitud_validacion: this.$props.longitud_validacion,
            longitud_correcto: this.$props.longitud_correcto,
            obs_longitud: this.$props.obs_longitud,
            obs_longitud_valido: this.$props.obs_longitud_valido,
            

        },

        lista_departamentos:this.$props.lista_dptos,
        lista_localidades:[],
        
            

    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},


        update_provincia_valido(newValue){
            this.form_pagina.localidad_mina_provincia_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_provincia_correcto(newValue){
            this.form_pagina.localidad_mina_provincia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_provincia(newValue){
            this.form_pagina.obs_localidad_mina_provincia = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_provincia_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_localidad_mina_provincia_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_provincia(newValue){
            let self = this;
            console.log("cambio la provincia de mi hijo por:"+newValue);
            
            this.form_pagina.localidad_mina_provincia = newValue;
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
            this.form_pagina.localidad_mina_departamento_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_dpto_correcto(newValue){
            this.form_pagina.localidad_mina_departamento_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_dpto_legal(newValue){
            this.form_pagina.obs_localidad_mina_departamento = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_dpto_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_localidad_mina_departamento_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_dpto(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.localidad_mina_departamento = newValue;

            let self = this;
            console.log("cambio la provincia de mi hijo por:"+newValue);
            
            // this.form_pagina.localidad_mina_provincia = newValue;
            // //debo actualizar la lista de departamento que tengo disponibles para elegir
            // axios.post('/datos/traer_departamentos/',{id_prov:newValue})
            //     .then(function (response) {
            //         console.log("las deptos son:\n");
            //         self.lista_departamentos = response.data;
            //         console.log(self.lista_departamentos);

            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
            //tengo que enviarsela al padre
        },












        update_localidad_valido(newValue){
            this.form_pagina.localidad_mina_localidad_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_localidad_correcto(newValue){
            this.form_pagina.localidad_mina_localidad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_localidad(newValue){
            this.form_pagina.obs_localidad_mina_localidad = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_localidad_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_localidad_mina_localidad_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_localidad(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.localidad_mina_localidad = newValue;
            //tengo que enviarsela al padre
        },











        update_sist_coor_valido(newValue){
            this.form_pagina.tipo_sistema_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_sist_coor_correcto(newValue){
            this.form_pagina.tipo_sistema_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sist_coor(newValue){
            this.form_pagina.obs_tipo_sistema = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sist_coor_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_tipo_sistema_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_sist_coor(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.tipo_sistema = newValue;
            //tengo que enviarsela al padre
        },








        update_latitud_valido(newValue){
            this.form_pagina.latitud_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_latitud_correcto(newValue){
            this.form_pagina.latitud_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_latitud(newValue){
            this.form_pagina.obs_latitud = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_latitud_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_latitud_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_latitud(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.latitud = newValue;
            //tengo que enviarsela al padre
        },









        update_sist_coor_lonvalido(newValue){
            this.form_pagina.longitud_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_sist_coor_loncorrecto(newValue){
            this.form_pagina.longitud_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sist_coor_lon(newValue){
            this.form_pagina.obs_longitud = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sist_coor_lonvalida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_longitud_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_sist_coor_lon(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.longitud = newValue;
            //tengo que enviarsela al padre
        },

        //mostrar ayuda
        update_valor_ayuda_local(newValor){
            this.ayuda_local = newValor;
        },


  }
  
};
</script>
