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
                <img class="animate-bounce w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/formulario_alta/imagenes/catamarca.png'" width="50%">
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
                        v-bind:valor_input_props="form_pagina.gestor_nombre_apellido"
                        v-bind:valor_input_validacion="form_pagina.gestor_nombre_apellido_valido"
                        v-bind:evualacion_correcto="form_pagina.gestor_nombre_apellido_correcto"
                        v-bind:valor_obs="form_pagina.obs_gestor_nombre_apellido"
                        v-bind:valor_valido_obs="form_pagina.obs_gestor_nombre_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Nombre y Apellido del Gestor:'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                        v-bind:desactivar_input="$props.desactivar_nombre_gestor"
                        v-bind:mostrar_correccion="$props.mostrar_nombre_gestor_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_nombre_gestor_correccion"

                        v-on:changevalido="update_nombre_gestor_valido($event)"
                        v-on:changecorrecto="update_nombre_gestor_correcto($event)"
                        v-on:changeobs="update_obs_nombre_gestor($event)"
                        v-on:changeobsvalido="update_obs_nombre_gestor_valida($event)"
                        v-on:changevalor="update_valor_nombre_gestor($event)"
                    >
                    </NombreMina>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="$props.mostrar_dni_gestor"

                        v-bind:valor_input_props="form_pagina.gestor_dni"
                        v-bind:valor_input_validacion="form_pagina.gestor_dni_valido"
                        v-bind:evualacion_correcto="form_pagina.gestor_dni_correcto"
                        v-bind:valor_obs="form_pagina.obs_gestor_dni"
                        v-bind:valor_valido_obs="form_pagina.obs_gestor_dni_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'DNI del Gestor:'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                        v-bind:desactivar_input="$props.desactivar_dni_gestor"
                        v-bind:mostrar_correccion="$props.mostrar_dni_gestor_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_dni_gestor_correccion"

                        v-on:changevalido="update_gestor_dni_valido($event)"
                        v-on:changecorrecto="update_gestor_dni_correcto($event)"
                        v-on:changeobs="update_obs_gestor_dni($event)"
                        v-on:changeobsvalido="update_obs_gestor_dni_valida($event)"
                        v-on:changevalor="update_valor_gestor_dni($event)"
                    >
                    </NombreMina>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_profesion_gestor"







                    v-bind:valor_input_props="form_pagina.gestor_profesion"
                    v-bind:valor_input_validacion="form_pagina.gestor_profesion_valido"
                    v-bind:evualacion_correcto="form_pagina.gestor_profesion_correcto"
                    v-bind:valor_obs="form_pagina.obs_gestor_profesion"
                    v-bind:valor_valido_obs="form_pagina.obs_gestor_profesion_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Profesión del Gestor:'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_profesion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_profesion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_profesion_gestor_correccion"

                    v-on:changevalido="update_gestor_profesion_valido($event)"
                    v-on:changecorrecto="update_gestor_profesion_correcto($event)"
                    v-on:changeobs="update_obs_gestor_profesion($event)"
                    v-on:changeobsvalido="update_obs_gestor_profesion_valida($event)"
                    v-on:changevalor="update_valor_gestor_profesion($event)"
                >
                </NombreMina>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_telefono_gestor"







                    v-bind:valor_input_props="form_pagina.gestor_telefono"
                    v-bind:valor_input_validacion="form_pagina.gestor_telefono_valido"
                    v-bind:evualacion_correcto="form_pagina.gestor_telefono_correcto"
                    v-bind:valor_obs="form_pagina.obs_gestor_telefono"
                    v-bind:valor_valido_obs="form_pagina.obs_gestor_telefono_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Telefono del Gestor:'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_telefono_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_telefono_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_telefono_gestor_correccion"

                    v-on:changevalido="update_gestor_telefono_valido($event)"
                    v-on:changecorrecto="update_gestor_telefono_correcto($event)"
                    v-on:changeobs="update_obs_gestor_telefono($event)"
                    v-on:changeobsvalido="update_obs_gestor_telefono_valida($event)"
                    v-on:changevalor="update_valor_gestor_telefono($event)"
                >
                </NombreMina>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_email_gestor"







                    v-bind:valor_input_props="form_pagina.gestor_email"
                    v-bind:valor_input_validacion="form_pagina.gestor_email_valido"
                    v-bind:evualacion_correcto="form_pagina.gestor_email_correcto"
                    v-bind:valor_obs="form_pagina.obs_gestor_email"
                    v-bind:valor_valido_obs="form_pagina.obs_gestor_email_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Email del Gestor:'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_email_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_email_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_email_gestor_correccion"

                    v-on:changevalido="update_gestor_email_valido($event)"
                    v-on:changecorrecto="update_gestor_email_correcto($event)"
                    v-on:changeobs="update_obs_gestor_email($event)"
                    v-on:changeobsvalido="update_obs_gestor_email_valida($event)"
                    v-on:changevalor="update_valor_gestor_email($event)"
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

                    v-bind:valor_input_props="form_pagina.gestor_notificacion"
                    v-bind:valor_input_validacion="form_pagina.gestor_notificacion_valido"
                    v-bind:evualacion_correcto="form_pagina.gestor_notificacion_correcto"
                    v-bind:valor_obs="form_pagina.obs_gestor_notificacion"
                    v-bind:valor_valido_obs="form_pagina.obs_gestor_notificacion_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Notificar al Gestor:'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_notificacion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_notificacion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_notificacion_gestor_correccion"

                    v-on:changevalido="update_gestor_noti_valido($event)"
                    v-on:changecorrecto="update_gestor_noti_correcto($event)"
                    v-on:changeobs="update_obs_gestor_noti($event)"
                    v-on:changeobsvalido="update_obs_gestor_noti_valida($event)"
                    v-on:changevalor="update_valor_gestor_noti($event)"
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

                    v-bind:valor_input_props="form_pagina.foto_4x4"
                    v-bind:valor_input_validacion="form_pagina.foto_4x4_valido"
                    v-bind:evualacion_correcto="form_pagina.foto_4x4_correcto"
                    v-bind:valor_obs="form_pagina.obs_foto_4x4"
                    v-bind:valor_valido_obs="form_pagina.obs_foto_4x4_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Foto 4x4'"
                    v-bind:desactivar_input="$props.desactivar_foto_productor"
                    v-bind:mostrar_correccion="$props.mostrar_foto_productor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_foto_productor_correccion"

                    v-on:changevalido="update_foto_valido($event)"
                    v-on:changecorrecto="update_foto_correcto($event)"
                    v-on:changeobs="update_obs_foto($event)"
                    v-on:changeobsvalido="update_obs_foto_valido($event)"
                    v-on:changevalor="update_obs_foto_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_foto($event)"
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
        <!--'mostrar_dni_productor',
        'desactivar_dni_productor',
        'mostrar_dni_productor_correccion',
        'desactivar_dni_productor_correccion',


        '',
        '',
        '',
        '',
        '',-->
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo 
                v-if="$props.mostrar_dni_productor"

                    v-bind:valor_input_props="form_pagina.primer_hoja_dni"
                    v-bind:valor_input_validacion="form_pagina.hoja_dni_valido"
                    v-bind:evualacion_correcto="form_pagina.hoja_dni_correcto"
                    v-bind:valor_obs="form_pagina.obs_hoja_dni"
                    v-bind:valor_valido_obs="form_pagina.obs_hoja_dni_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Copia de 1° hoja de D.N.I.'"
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
                <SubirArchivo 
                v-if="$props.mostrar_dni_productor"

                    v-bind:valor_input_props="form_pagina.segunda_hoja_dni"
                    v-bind:valor_input_validacion="form_pagina.segunda_hoja_dni_valido"
                    v-bind:evualacion_correcto="form_pagina.segunda_hoja_dni_correcto"
                    v-bind:valor_obs="form_pagina.obs_segunda_hoja_dni"
                    v-bind:valor_valido_obs="form_pagina.obs_segunda_hoja_dni_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Copia de 2° hoja de D.N.I.'"
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

                    v-bind:valor_input_props="form_pagina.autorizacion_gestor"
                    v-bind:valor_input_validacion="form_pagina.autorizacion_gestor_valido"
                    v-bind:evualacion_correcto="form_pagina.autorizacion_gestor_correcto"
                    v-bind:valor_obs="form_pagina.obs_autorizacion_gestor"
                    v-bind:valor_valido_obs="form_pagina.obs_autorizacion_gestor_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Autorizacion de que el Gestor Representa la Empresa'"
                    v-bind:desactivar_input="$props.desactivar_autorizacion_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_autorizacion_gestor_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_autorizacion_gestor_correccion"

                    v-on:changevalido="update_gestor_autorizacion_valido($event)"
                    v-on:changecorrecto="update_gestor_autorizacion_correcto($event)"
                    v-on:changeobs="update_obs_gestor_autorizacion($event)"
                    v-on:changeobsvalido="update_obs_gestor_autorizacion_valido($event)"
                    v-on:changevalor="update_obs_gestor_autorizacion_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_gestor_autorizacion($event)"
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

                    v-bind:valor_input_props="form_pagina.constancia_afip"
                    v-bind:valor_input_validacion="form_pagina.constancia_afip_valido"
                    v-bind:evualacion_correcto="form_pagina.constancia_afip_correcto"
                    v-bind:valor_obs="form_pagina.obs_constancia_afip"
                    v-bind:valor_valido_obs="form_pagina.obs_constancia_afip_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Constancia de AFIP'"
                    v-bind:desactivar_input="$props.desactivar_constancia_afip"
                    v-bind:mostrar_correccion="$props.mostrar_constancia_afip_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_constancia_afip_correccion"

                    v-on:changevalido="update_constancia_afip_valido($event)"
                    v-on:changecorrecto="update_constancia_afip_correcto($event)"
                    v-on:changeobs="update_obs_constancia_afip($event)"
                    v-on:changeobsvalido="update_obs_constancia_afip_valido($event)"
                    v-on:changevalor="update_obs_constancia_afip_valido($event)"
                    v-on:cambioarchivo="cambio_el_archivo_constancia_afip($event)"
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
        <!--<BotonesPaginaCatamarca
        v-if="$props.mostrar_boton_guardar_cuatro"

            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de la Mina'"


            form.gestor_nombre_apellido
form.gestor_nombre_apellido_valido
form.gestor_nombre_apellido_correcto
form.obs_gestor_nombre_apellido
form.obs_gestor_nombre_valido


form.gestor_dni
form.gestor_dni_valido
form.gestor_dni_correcto
form.obs_gestor_dni
form.obs_gestor_dni_valido


form.gestor_profesion
form.gestor_profesion_valido
form.gestor_profesion_correcto
form.obs_gestor_profesion
form.obs_gestor_profesion_valido

form.gestor_telefono
form.gestor_telefono_valido
form.gestor_telefono_correcto
form.obs_gestor_telefono
form.obs_gestor_telefono_valido


form.gestor_email
form.gestor_email_valido
form.gestor_email_correcto
form.obs_gestor_email
form.obs_gestor_email_valido


form.gestor_notificacion
form.gestor_notificacion_valido
form.gestor_notificacion_correcto
form.obs_gestor_notificacion
form.obs_gestor_notificacion_valido


form.foto_4x4
form.foto_4x4_valido
form.foto_4x4_correcto
form.obs_foto_4x4
form.obs_foto_4x4_valido

form.autorizacion_gestor
form.autorizacion_gestor_valido
form.autorizacion_gestor_correcto
form.obs_autorizacion_gestor
form.obs_autorizacion_gestor_valido


            :numero_expdiente="form_pagina.numero_expdiente"
            :numero_expdiente_valido="form_pagina.numero_expdiente_valido"
            :numero_expdiente_correcto="form_pagina.numero_expdiente_correcto"
            :obs_numero_expdiente="form_pagina.obs_numero_expdiente"
            :obs_numero_expdiente_valido="form_pagina.obs_numero_expdiente_valido"
            :categoria="form_pagina.categoria"
            :categoria_validacion="form_pagina.categoria_validacion"
            :categoria_correcto="form_pagina.categoria_correcto"
            :obs_categoria="form_pagina.obs_categoria"
            :obs_categoria_valido="form_pagina.obs_categoria_valido"
            :nombre_mina="form_pagina.nombre_mina"
            :nombre_mina_validacion="form_pagina.nombre_mina_validacion"
            :nombre_mina_correcto="form_pagina.nombre_mina_correcto"
            :obs_nombre_mina="form_pagina.obs_nombre_mina"
            :obs_nombre_mina_valido="form_pagina.obs_nombre_mina_valido"
            :descripcion_mina="form_pagina.descripcion_mina"
            :descripcion_mina_validacion="form_pagina.descripcion_mina_validacion"
            :descripcion_mina_correcto="form_pagina.descripcion_mina_correcto"
            :obs_descripcion_mina="form_pagina.obs_descripcion_mina"
            :obs_descripcion_mina_valido="form_pagina.obs_descripcion_mina_valido"
            :distrito_minero="form_pagina.distrito_minero"
            :distrito_minero_validacion="form_pagina.distrito_minero_validacion"
            :distrito_minero_correcto="form_pagina.distrito_minero_correcto"
            :obs_distrito_minero="form_pagina.obs_distrito_minero"
            :obs_distrito_minero_valido="form_pagina.obs_distrito_minero_valido"
            :mina_cantera="form_pagina.mina_cantera"
            :mina_cantera_validacion="form_pagina.mina_cantera_validacion"
            :mina_cantera_correcto="form_pagina.mina_cantera_correcto"
            :obs_mina_cantera="form_pagina.obs_mina_cantera"
            :obs_mina_cantera_valido="form_pagina.obs_mina_cantera_valido"
            :plano_inmueble="form_pagina.plano_inmueble"
            :plano_inmueble_validacion="form_pagina.plano_inmueble_validacion"
            :plano_inmueble_correcto="form_pagina.plano_inmueble_correcto"
            :obs_plano_inmueble="form_pagina.obs_plano_inmueble"
            :obs_plano_inmueble_valido="form_pagina.obs_plano_inmueble_valido"
            :minerales_variedad="form_pagina.minerales_variedad"
            :minerales_variedad_validacion="form_pagina.minerales_variedad_validacion"
            :minerales_variedad_correcto="form_pagina.minerales_variedad_correcto"
            :obs_minerales_variedad="form_pagina.obs_minerales_variedad"
            :obs_minerales_variedad_valido="form_pagina.obs_minerales_variedad_valido"
            :resolucion_concesion_minera="form_pagina.resolucion_concesion_minera"
            :resolucion_concesion_minera_validacion="form_pagina.resolucion_concesion_minera_validacion"
            :resolucion_concesion_minera_correcto="form_pagina.resolucion_concesion_minera_correcto"
            :obs_resolucion_concesion_minera="form_pagina.obs_resolucion_concesion_minera"
            :obs_resolucion_concesion_minera_valido="form_pagina.obs_resolucion_concesion_minera_valido"
            :titulo_contrato_posecion="form_pagina.titulo_contrato_posecion"
            :titulo_contrato_posecion_validacion="form_pagina.titulo_contrato_posecion_validacion"
            :titulo_contrato_posecion_correcto="form_pagina.titulo_contrato_posecion_correcto"
            :obs_titulo_contrato_posecion="form_pagina.obs_titulo_contrato_posecion"
            :obs_titulo_contrato_posecion_valido="form_pagina.obs_titulo_contrato_posecion_valido"

            :minerales="minerales_locales"

            :donde_guardar="$props.donde_estoy"

            :evaluacion="autoridad_minera"
            :testing ="mostrar_testing"
            :id="$props.id"
        >

        </BotonesPaginaCatamarca>-->
        
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
//import BotonesPaginaCatamarca from "@/Pages/Productors/BotonesPaginaCatamarca";

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
        //BotonesPaginaCatamarca,
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




        //FUNCIONES DE NOMBRE DE GESTOR
        update_nombre_gestor_valido(newValue){
            this.form_pagina.gestor_nombre_apellido_valido = newValue;
        },
        update_nombre_gestor_correcto(newValue){
            this.form_pagina.gestor_nombre_apellido_correcto = newValue;
        },
        update_obs_nombre_gestor(newValue){
            this.form_pagina.obs_gestor_nombre_apellido = newValue;
        },
        update_obs_nombre_gestor_valida(newValue){
            this.form_pagina.obs_gestor_nombre_valido = newValue;
        },
        update_valor_nombre_gestor(newValue){
            this.form_pagina.gestor_nombre_apellido = newValue;
        },

        //FUNCIONES DE DNI DE GESTOR
        update_gestor_dni_valido(newValue){
            this.form_pagina.gestor_dni_valido = newValue;
        },
        update_gestor_dni_correcto(newValue){
            this.form_pagina.gestor_dni_correcto = newValue;
        },
        update_obs_gestor_dni(newValue){
            this.form_pagina.obs_gestor_dni = newValue;
        },
        update_obs_gestor_dni_valida(newValue){
            this.form_pagina.obs_gestor_dni_valido = newValue;
        },
        update_valor_gestor_dni(newValue){
            this.form_pagina.gestor_dni = newValue;
        },

        //FUNCIONES DE PROFESION DE GESTOR
        update_gestor_profesion_valido(newValue){
            this.form_pagina.gestor_profesion_valido = newValue;
        },
        update_gestor_profesion_correcto(newValue){
            this.form_pagina.gestor_profesion_correcto= newValue;
        },
        update_obs_gestor_profesion(newValue){
            this.form_pagina.obs_gestor_profesion = newValue;
        },
        update_obs_gestor_profesion_valida(newValue){
            this.form_pagina.obs_gestor_profesion_valido = newValue;
        },
        update_valor_gestor_profesion(newValue){
            this.form_pagina.gestor_profesion = newValue;
        },

        //FUNCIONES DE Telefono DE GESTOR
        update_gestor_telefono_valido(newValue){
            this.form_pagina.gestor_telefono_valido = newValue;
        },
        update_gestor_telefono_correcto(newValue){
            this.form_pagina.gestor_telefono_correcto= newValue;
        },
        update_obs_gestor_telefono(newValue){
            this.form_pagina.obs_gestor_telefono = newValue;
        },
        update_obs_gestor_telefono_valida(newValue){
            this.form_pagina.obs_gestor_telefono_valido = newValue;
        },
        update_valor_gestor_telefono(newValue){
            this.form_pagina.gestor_telefono = newValue;
        },

        //FUNCIONES DE N OTIFICACION DE GESTOR
        update_gestor_noti_valido(newValue){
            this.form_pagina.gestor_notificacion_valido = newValue;
        },
        update_gestor_noti_correcto(newValue){
            this.form_pagina.gestor_notificacion_correcto= newValue;
        },
        update_obs_gestor_noti(newValue){
            this.form_pagina.obs_gestor_notificacion = newValue;
        },
        update_obs_gestor_noti_valida(newValue){
            this.form_pagina.obs_gestor_notificacion_valido = newValue;
        },
        update_valor_gestor_noti(newValue){
            this.form_pagina.gestor_notificacion = newValue;
        },

        //FUNCIONES DE PROFESION DE GESTOR
        update_gestor_email_valido(newValue){
            this.form_pagina.gestor_email_valido = newValue;
        },
        update_gestor_email_correcto(newValue){
            this.form_pagina.gestor_email_correcto= newValue;
        },
        update_obs_gestor_email(newValue){
            this.form_pagina.obs_gestor_email = newValue;
        },
        update_obs_gestor_email_valida(newValue){
            this.form_pagina.obs_gestor_email_valido = newValue;
        },
        update_valor_gestor_email(newValue){
            this.form_pagina.gestor_email = newValue;
        },

        update_gestor_autorizacion_valido(newValue){
            this.form_pagina.autorizacion_gestor_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_gestor_autorizacion_correcto(newValue){
            this.form_pagina.autorizacion_gestor_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_gestor_autorizacion(newValue){
            this.form_pagina.obs_autorizacion_gestor = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_gestor_autorizacion_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_autorizacion_gestor_valido = newValue;
            //tengo que enviarsela al padre
        },
        cambio_el_archivo_gestor_autorizacion(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.autorizacion_gestor = newValue;
            //tengo que enviarsela al padre
        },


        update_constancia_afip_valido(newValue){
            this.form_pagina.constancia_afip_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_constancia_afip_correcto(newValue){
            this.form_pagina.constancia_afip_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_constancia_afip(newValue){
            this.form_pagina.obs_constancia_afip = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_constancia_afip_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_constancia_afip_valido = newValue;
            //tengo que enviarsela al padre
        },
        cambio_el_archivo_constancia_afip(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.constancia_afip = newValue;
            //tengo que enviarsela al padre
        },

        update_foto_valido(newValue){
            this.form_pagina.foto_4x4_valido = newValue;
        },
        update_foto_correcto(newValue){
            this.form_pagina.foto_4x4_correcto = newValue;
        },
        update_obs_foto(newValue){
            this.form_pagina.obs_foto_4x4 = newValue;
        },
        update_obs_foto_valido(newValue){
            this.form_pagina.obs_foto_4x4_valido = newValue;
        },
        cambio_el_archivo_foto(newValue){
            this.form_pagina.foto_4x4 = newValue;
        },





        //mostrar ayuda
        update_valor_ayuda_local(newValor){
            this.ayuda_local = newValor;
        },


  }
  
};
</script>