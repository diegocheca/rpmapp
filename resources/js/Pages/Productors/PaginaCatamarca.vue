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
            <a href="#section_catamarca">
                <img class="animate-bounce w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="http://localhost:8000/formulario_alta/imagenes/catamarca.png" width="50%">
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
                
            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <span>Pagina de catamarca</span>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <div class="alert flex flex-row items-center bg-yellow-200 p-5 rounded border-b-2 border-yellow-300">
                    <div class="alert-icon flex items-center bg-yellow-100 border-2 border-yellow-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                        <span class="text-yellow-500">
                            <svg fill="currentColor"
                                viewBox="0 0 20 20"
                                class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="alert-content ml-4">
                        <div class="alert-title font-semibold text-lg text-yellow-800">
                            Atención
                        </div>
                        <div class="alert-description text-sm text-yellow-600">
                            La legislación de la provincia de Catamarca especifica: El Certificado de Productor Minero tendrá validez por seis (6) meses.
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            <br>
        <div>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="$props.mostrar_nombre_gestor"
                    
                        v-bind:valor_input_props="''"
                        v-bind:valor_input_validacion="''"
                        v-bind:evualacion_correcto="''"
                        v-bind:valor_obs="''"
                        v-bind:valor_valido_obs="''"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Nombre y Apellido del Gestor:'"
                        v-bind:icon="'http://localhost:8000/svg/state.svg'"
                        v-bind:desactivar_input="$props.desactivar_nombre_gestor"
                        v-bind:mostrar_correccion="$props.mostrar_nombre_gestor_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_nombre_gestor_correccion"

                        v-on:changevalido="update_localidad_valido($event)"
                        v-on:changecorrecto="update_localidad_correcto($event)"
                        v-on:changeobs="update_obs_localidad($event)"
                        v-on:changeobsvalido="update_obs_localidad_valida($event)"
                        v-on:changevalor="update_valor_localidad($event)"
                    >
                    </NombreMina>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="$props.mostrar_dni_gestor"

                        v-bind:valor_input_props="''"
                        v-bind:valor_input_validacion="''"
                        v-bind:evualacion_correcto="''"
                        v-bind:valor_obs="''"
                        v-bind:valor_valido_obs="''"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'DNI del Gestor:'"
                        v-bind:icon="'http://localhost:8000/svg/state.svg'"
                        v-bind:desactivar_input="$props.desactivar_dni_gestor"
                        v-bind:mostrar_correccion="$props.mostrar_dni_gestor_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_dni_gestor_correccion"

                        v-on:changevalido="update_localidad_valido($event)"
                        v-on:changecorrecto="update_localidad_correcto($event)"
                        v-on:changeobs="update_obs_localidad($event)"
                        v-on:changeobsvalido="update_obs_localidad_valida($event)"
                        v-on:changevalor="update_valor_localidad($event)"
                    >
                    </NombreMina>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_profesion_gestor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Profesión del Gestor:'"
                    v-bind:icon="'http://localhost:8000/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_profesion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_profesion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_profesion_gestor_correccion"

                    v-on:changevalido="update_localidad_valido($event)"
                    v-on:changecorrecto="update_localidad_correcto($event)"
                    v-on:changeobs="update_obs_localidad($event)"
                    v-on:changeobsvalido="update_obs_localidad_valida($event)"
                    v-on:changevalor="update_valor_localidad($event)"
                >
                </NombreMina>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_telefono_gestor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Telefono del Gestor:'"
                    v-bind:icon="'http://localhost:8000/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_telefono_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_telefono_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_telefono_gestor_correccion"

                    v-on:changevalido="update_localidad_valido($event)"
                    v-on:changecorrecto="update_localidad_correcto($event)"
                    v-on:changeobs="update_obs_localidad($event)"
                    v-on:changeobsvalido="update_obs_localidad_valida($event)"
                    v-on:changevalor="update_valor_localidad($event)"
                >
                </NombreMina>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_email_gestor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Email del Gestor:'"
                    v-bind:icon="'http://localhost:8000/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_email_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_email_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_email_gestor_correccion"

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
                    -- localidad_mina_provincia  deel padre
                    -- localidad_mina_provincia_validacion valida deel padre{
                    -- localidad_mina_provincia_correcto correcto deel padre
                    -- obs_localidad_mina_provincia observacion deel padre
                    -- obs_localidad_mina_provincia_valido observacion valida deel padre
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_notificacion_gestor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Notificar al Gestor:'"
                    v-bind:icon="'http://localhost:8000/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_notificacion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_notificacion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_notificacion_gestor_correccion"

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
                    -- localidad_mina_provincia  deel padre
                    -- localidad_mina_provincia_validacion valida deel padre{
                    -- localidad_mina_provincia_correcto correcto deel padre
                    -- obs_localidad_mina_provincia observacion deel padre
                    -- obs_localidad_mina_provincia_valido observacion valida deel padre
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo 
                v-if="$props.mostrar_foto_productor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Foto 4x4'"
                    v-bind:desactivar_input="$props.desactivar_foto_productor"
                    v-bind:mostrar_correccion="$props.mostrar_foto_productor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_foto_productor_correccion"

                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_canon_valido($event)"
                    v-on:changevalor="update_obs_resol_conce_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
                >
                </SubirArchivo>
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
                                Una Foto 4x4. Este acpeta los siguientes formatos: pdf, png o jpeg.
                            </p>
                            
                        </div>
                        <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> concesion resolucion minera de Mina valor padre: {{}}
                    <br> concesion resolucion minera de Mina  valido del padre: {{}}
                    <br> concesion resolucion minera de Mina  correcto deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion valida deel padre: {{}}
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo 
                v-if="$props.mostrar_dni_productor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Copia de 1° y 2° hoja de D.N.I.'"
                    v-bind:desactivar_input="$props.desactivar_dni_productor"
                    v-bind:mostrar_correccion="$props.mostrar_dni_productor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_dni_productor_correccion"

                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_canon_valido($event)"
                    v-on:changevalor="update_obs_resol_conce_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
                >
                </SubirArchivo>
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
                                Copia de 1° y 2° hoja de D.N.I.. Este acpeta los siguientes formatos: pdf, png o jpeg.
                            </p>
                            
                        </div>
                        <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> concesion resolucion minera de Mina valor padre: {{}}
                    <br> concesion resolucion minera de Mina  valido del padre: {{}}
                    <br> concesion resolucion minera de Mina  correcto deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion valida deel padre: {{}}
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo 
                v-if="$props.mostrar_autorizacion_gestor"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Autorizacion de que el Gestor Representa la Empresa'"
                    v-bind:desactivar_input="$props.desactivar_autorizacion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_autorizacion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_autorizacion_gestor_correccion"

                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_canon_valido($event)"
                    v-on:changevalor="update_obs_resol_conce_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
                >
                </SubirArchivo>
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
                                Copia de la autorización que certifique ha dicho gestor como representante de la empresa. Este documento es un archivo pdf, png o jpeg.
                            </p>
                            
                        </div>
                        <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> concesion resolucion minera de Mina valor padre: {{}}
                    <br> concesion resolucion minera de Mina  valido del padre: {{}}
                    <br> concesion resolucion minera de Mina  correcto deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion valida deel padre: {{}}
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo 
                    v-if="$props.mostrar_constancia_afip"

                    v-bind:valor_input_props="''"
                    v-bind:valor_input_validacion="''"
                    v-bind:evualacion_correcto="''"
                    v-bind:valor_obs="''"
                    v-bind:valor_valido_obs="''"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Constancia de AFIP'"
                    v-bind:desactivar_input="$props.desactivar_constancia_afip"
                    v-bind:mostrar_correccion="$props.mostrar_constancia_afip_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_constancia_afip_correccion"

                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_canon_valido($event)"
                    v-on:changevalor="update_obs_resol_conce_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
                >
                </SubirArchivo>
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
                                Copia de la autorización que certifique ha dicho gestor como representante de la empresa. Este documento es un archivo pdf, png o jpeg.
                            </p>
                            
                        </div>
                        <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> concesion resolucion minera de Mina valor padre: {{}}
                    <br> concesion resolucion minera de Mina  valido del padre: {{}}
                    <br> concesion resolucion minera de Mina  correcto deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion deel padre: {{}}
                    <br> concesion resolucion minera de Mina  observacion valida deel padre: {{}}
                </div>
            </div>
        </div>


        
        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div>
        
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
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import Label from '../../Jetstream/Label.vue';
export default {
     props: [
        'link_volver',
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'gestor_nombre_apellido',
        'gestor_nombre_apellido_valido',
        'gestor_nombre_apellido_correcto',
        'obs_gestor_nombre_apellido',
        'obs_gestor_nombre_valido',
        'mostrar_nombre_gestor',
        'desactivar_nombre_gestor',
        'mostrar_nombre_gestor_correccion',
        'desactivar_nombre_gestor_correccion',

        'gestor_dni',
        'gestor_dni_valido',
        'gestor_dni_correcto',
        'obs_gestor_dni',
        'obs_gestor_dni_valido',
        'mostrar_dni_gestor',
        'desactivar_dni_gestor',
        'mostrar_dni_gestor_correccion',
        'desactivar_dni_gestor_correccion',

        'gestor_profesion',
        'gestor_profesion_valido',
        'gestor_profesion_correcto',
        'obs_gestor_profesion',
        'obs_gestor_profesion_valido',
        'mostrar_profesion_gestor',
        'desactivar_profesion_gestor',
        'mostrar_profesion_gestor_correccion',
        'desactivar_profesion_gestor_correccion',

        'gestor_telefono',
        'gestor_telefono_valido',
        'gestor_telefono_correcto',
        'obs_gestor_telefono',
        'obs_gestor_telefono_valido',
        'mostrar_telefono_gestor',
        'desactivar_telefono_gestor',
        'mostrar_telefono_gestor_correccion',
        'desactivar_telefono_gestor_correccion',

        'gestor_notificacion',
        'gestor_notificacion_valido',
        'gestor_notificacion_correcto',
        'obs_gestor_notificacion',
        'obs_gestor_notificacion_valido',
        'mostrar_notificacion_gestor',
        'desactivar_notificacion_gestor',
        'mostrar_notificacion_gestor_correccion',
        'desactivar_notificacion_gestor_correccion',

        'gestor_email',
        'gestor_email_valido',
        'gestor_email_correcto',
        'obs_gestor_email',
        'obs_gestor_email_valido',
        'mostrar_email_gestor',
        'desactivar_email_gestor',
        'mostrar_email_gestor_correccion',
        'desactivar_email_gestor_correccion',

        'primer_hoja_dni',
        'hoja_dni_valido',
        'hoja_dni_correcto',
        'obs_hoja_dni',
        'obs_hoja_dni_valido',
        'mostrar_dni_productor',
        'desactivar_dni_productor',
        'mostrar_dni_productor_correccion',
        'desactivar_dni_productor_correccion',


        'segunda_hoja_dni',
        'segunda_hoja_dni_valido',
        'segunda_hoja_dni_correcto',
        'obs_segunda_hoja_dni',
        'obs_segunda_hoja_dni_valido',



        'foto_4x4',
        'foto_4x4_valido',
        'foto_4x4_correcto',
        'obs_foto_4x4',
        'obs_foto_4x4_valido',
        'mostrar_foto_productor',
        'desactivar_foto_productor',
        'mostrar_foto_productor_correccion',
        'desactivar_foto_productor_correccion',

        'constancia_afip',
        'constancia_afip_valido',
        'constancia_afip_correcto',
        'obs_constancia_afip',
        'obs_constancia_afip_valido',
        'mostrar_constancia_afip',
        'desactivar_constancia_afip',
        'mostrar_constancia_afip_correccion',
        'desactivar_constancia_afip_correccion',

        'autorizacion_gestor',
        'autorizacion_gestor_valido',
        'autorizacion_gestor_correcto',
        'obs_autorizacion_gestor',
        'obs_autorizacion_gestor_valido',
        'mostrar_autorizacion_gestor',
        'desactivar_autorizacion_gestor',
        'mostrar_autorizacion_gestor_correccion',
        'desactivar_autorizacion_gestor_correccion',


        'mostrar_boton_guardar_cinco',
        'desactivar_boton_guardar_cinco',
        'evaluacion',
        'id',
        'testing',
    ],
 
    components: {
		JetDialogModal,
        CardMinaUbicacion,
		SelectProvincia,
        SelectDepartamento,
        NombreMina,
        TipoDeSistemaGeo,
        BotonesPaginaSeis,
        SubirArchivo,
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

                gestor_nombre_apellido:this.$props.gestor_nombre_apellido,
				gestor_nombre_apellido_valido: this.$props.gestor_nombre_apellido_valido,
				gestor_nombre_apellido_correcto: this.$props.gestor_nombre_apellido_correcto,
				obs_gestor_nombre_apellido: this.$props.obs_gestor_nombre_apellido,
				obs_gestor_nombre_valido: this.$props.obs_gestor_nombre_valido,

				gestor_dni:this.$props.gestor_dni,
				gestor_dni_valido: this.$props.gestor_dni_valido,
				gestor_dni_correcto: this.$props.gestor_dni_correcto,
				obs_gestor_dni: this.$props.obs_gestor_dni,
				obs_gestor_dni_valido: this.$props.obs_gestor_dni_valido,

				gestor_profesion:this.$props.gestor_profesion,
				gestor_profesion_valido: this.$props.gestor_profesion_valido,
				gestor_profesion_correcto: this.$props.gestor_profesion_correcto,
				obs_gestor_profesion: this.$props.obs_gestor_profesion,
				obs_gestor_profesion_valido: this.$props.obs_gestor_profesion_valido,

				gestor_telefono:this.$props.gestor_telefono,
				gestor_telefono_valido: this.$props.gestor_telefono_valido,
				gestor_telefono_correcto: this.$props.gestor_telefono_correcto,
				obs_gestor_telefono: this.$props.obs_gestor_telefono,
				obs_gestor_telefono_valido: this.$props.obs_gestor_telefono_valido,

				gestor_notificacion:this.$props.gestor_notificacion,
				gestor_notificacion_valido: this.$props.gestor_notificacion_valido,
				gestor_notificacion_correcto: this.$props.gestor_notificacion_correcto,
				obs_gestor_notificacion: this.$props.obs_gestor_notificacion,
				obs_gestor_notificacion_valido: this.$props.obs_gestor_notificacion_valido,

				gestor_email:this.$props.gestor_email,
				gestor_email_valido: this.$props.gestor_email_valido,
				gestor_email_correcto: this.$props.gestor_email_correcto,
				obs_gestor_email: this.$props.obs_gestor_email,
				obs_gestor_email_valido: this.$props.obs_gestor_email_valido,

				primer_hoja_dni:this.$props.primer_hoja_dni,
				hoja_dni_valido: this.$props.hoja_dni_valido,
				hoja_dni_correcto: this.$props.hoja_dni_correcto,
				obs_hoja_dni: this.$props.obs_hoja_dni,
				obs_hoja_dni_valido: this.$props.obs_hoja_dni_valido,

				segunda_hoja_dni:this.$props.segunda_hoja_dni,
				segunda_hoja_dni_valido: this.$props.segunda_hoja_dni_valido,
				segunda_hoja_dni_correcto: this.$props.segunda_hoja_dni_correcto,
				obs_segunda_hoja_dni: this.$props.obs_segunda_hoja_dni,
				obs_segunda_hoja_dni_valido: this.$props.obs_segunda_hoja_dni_valido,

				foto_4x4:this.$props.foto_4x4,
				foto_4x4_valido: this.$props.foto_4x4_valido,
				foto_4x4_correcto: this.$props.foto_4x4_correcto,
				obs_foto_4x4: this.$props.obs_foto_4x4,
				obs_foto_4x4_valido: this.$props.obs_foto_4x4_valido,

				constancia_afip:this.$props.constancia_afip,
				constancia_afip_valido: this.$props.constancia_afip_valido,
				constancia_afip_correcto: this.$props.constancia_afip_correcto,
				obs_constancia_afip: this.$props.obs_constancia_afip,
				obs_constancia_afip_valido: this.$props.obs_constancia_afip_valido,


				autorizacion_gestor:this.$props.autorizacion_gestor,
				autorizacion_gestor_valido: this.$props.autorizacion_gestor_valido,
				autorizacion_gestor_correcto: this.$props.autorizacion_gestor_correcto,
				obs_autorizacion_gestor: this.$props.obs_autorizacion_gestor,
				obs_autorizacion_gestor_valido: this.$props.obs_autorizacion_gestor_valido,

				valor_de_progreso:  100,
				valor_de_aprobado:  100,
				valor_de_reprobado:  100,
        },

        lista_departamentos:[],
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
