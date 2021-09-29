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
        <a href="#section_datos_mina_dos">
            <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/slick/img/features/mina-parte-dos.svg'">
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
            <CardMinaDos 
                :progreso="50"
                :aprobado="50"
                :reprobado="50" 
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda= true
                :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                :ayuda="ayuda_local"
                v-on:changevalorayuda="update_valor_ayuda_local($event)"
            ></CardMinaDos>
        </div>
        <br>
        <br>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <div class="w-full  bg-white rounded shadow p-6 m-8">
                <CaracterQueInvoca 



                    v-if="$props.mostrar_owner"

                    v-bind:valor_input_props="form_pagina.owner"
                    v-bind:evualacion_correcto="form_pagina.owner_correcto"
                    v-bind:valor_obs="form_pagina.obs_owner"
                    v-bind:valor_valido_obs="form_pagina.obs_owner_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Propietario'"
                    v-bind:label_true="'Soy Propietario'"
                    v-bind:label_false="'No soy propietario'"
                    v-bind:otro_label="false"
                    v-bind:otro_input="false"
                    v-bind:name_correcion="'correcion_propietario'"
                    v-bind:name_checkbox="'check_propietario'"
                    v-bind:desactivar_owner="$props.desactivar_owner"
                    v-bind:mostrar_owner_correccion="$props.mostrar_owner_correccion"
                    v-bind:desactivar_owner_correccion="$props.desactivar_owner_correccion"
                    v-on:changecorrecto="update_owner_correcto($event)"
                    v-on:changeobs="updateobs_owner($event)"
                    v-on:changeobsvalido="updateobs_owner_valido($event)"
                    v-on:changevalor="updatevalor_owner($event)"
                ></CaracterQueInvoca>
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
                                Hace referencia a si usted es el propietario de la manifestación que se esta declarando.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> owner de Mina valor padre: {{form_pagina.numero_expdiente}}
                    <br> owner de Mina  valido del padre: {{form_pagina.numero_expdiente_valido}}
                    <br> owner de Mina  correcto deel padre: {{form_pagina.numero_expdiente_correcto}}
                    <br> owner de Mina  observacion deel padre: {{form_pagina.obs_numero_expdiente}}
                    <br> owner de Mina  observacion valida deel padre: {{form_pagina.obs_numero_expdiente_valido}}
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <div class="w-full  bg-white rounded shadow p-6 m-8">
                <CaracterQueInvoca 
                v-if="$props.mostrar_arrendatario"
                    v-bind:valor_input_props="form_pagina.arrendatario"
                    v-bind:evualacion_correcto="form_pagina.arrendatario_correcto"
                    v-bind:valor_obs="form_pagina.obs_arrendatario"
                    v-bind:valor_valido_obs="form_pagina.obs_arrendatario_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Arrendatario'"
                    v-bind:label_true="'Soy Arrendatario'"
                    v-bind:label_false="'No soy arrendatario'"
                    v-bind:otro_label="false"
                    v-bind:otro_input="false"
                    v-bind:name_correcion="'correcion_arrendatario'"
                    v-bind:name_checkbox="'check_arrendatario'"
                    v-bind:desactivar_owner="$props.desactivar_arrendatario"
                    v-bind:mostrar_owner_correccion="$props.mostrar_arrendatario_correccion"
                    v-bind:desactivar_owner_correccion="$props.desactivar_arrendatario_correccion"
                    
                    v-on:changecorrecto="update_arrendatario_correcto($event)"
                    v-on:changeobs="update_obs_arrendatario($event)"
                    v-on:changeobsvalido="update_obs_arrendatario_valido($event)"
                    v-on:changevalor="update_valor_arrendatario($event)"
                ></CaracterQueInvoca>
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
                                Hace referencia a si usted es arendatario de la manifestación que se esta declarando.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                <div class="flex" v-if="mostrar_testing">
                        <br> arrendatario de Mina valor padre: {{form_pagina.arrendatario}}
                        <br> arrendatario de Mina  correcto deel padre: {{form_pagina.arrendatario_correcto}}
                        <br> arrendatario de Mina  observacion deel padre: {{form_pagina.obs_arrendatario}}
                        <br> arrendatario de Mina  observacion valida deel padre: {{form_pagina.obs_arrendatario_valido}}
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <div class="w-full  bg-white rounded shadow p-6 m-8">
                <div class="flex">
                    <CaracterQueInvoca 
                        v-if="$props.mostrar_concesionario"

                        v-bind:valor_input_props="form_pagina.concesionario"
                        v-bind:evualacion_correcto="form_pagina.concesionario_correcto"
                        v-bind:valor_obs="form_pagina.obs_concesionario"
                        v-bind:valor_valido_obs="form_pagina.obs_concesionario_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Concesionario'"
                        v-bind:label_true="'Soy Concesionario'"
                        v-bind:label_false="'No soy concesionario'"
                        v-bind:otro_label="false"
                        v-bind:otro_input="false"
                        v-bind:name_correcion="'correcion_concesionario'"
                        v-bind:name_checkbox="'check_concesionario'"
                        v-bind:desactivar_owner="$props.desactivar_concesionario"
                        v-bind:mostrar_owner_correccion="$props.mostrar_concesionario_correccion"
                        v-bind:desactivar_owner_correccion="$props.desactivar_concesionario_correccion"
                    
                        v-on:changecorrecto="update_concesionario_correcto($event)"
                        v-on:changeobs="update_obs_concesionario($event)"
                        v-on:changeobsvalido="update_obs_concesionario_valido($event)"
                        v-on:changevalor="update_valor_concesionario($event)"
                    ></CaracterQueInvoca>
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
                                Hace referencia a si usted posee la conecesión de la manifestación que se esta declarando
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                            <br> concesionario de Mina valor padre: {{form_pagina.concesionario}}
                            <br> concesionario de Mina  correcto deel padre: {{form_pagina.concesionario_correcto}}
                            <br> concesionario de Mina  observacion deel padre: {{form_pagina.obs_concesionario}}
                            <br> concesionario de Mina  observacion valida deel padre: {{form_pagina.obs_concesionario_valido}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <div class="w-full  bg-white rounded shadow p-6 m-8">
                <div class="flex">
                    <CaracterQueInvoca 
                    v-if="$props.mostrar_sustancias"
                        v-bind:valor_input_props="form_pagina.sustancias"
                        v-bind:evualacion_correcto="form_pagina.sustancias_correcto"
                        v-bind:valor_obs="form_pagina.obs_sustancias"
                        v-bind:valor_valido_obs="form_pagina.obs_sustancias_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Las sustancias son de Aprovechamiento común?'"
                        v-bind:label_true="'Si'"
                        v-bind:label_false="'No'"
                        v-bind:otro_label="'Concesión Minera:'"
                        v-bind:otro_input="form_pagina.sustancias_input"
                        v-bind:name_correcion="'correcion_sustancias'"
                        v-bind:name_checkbox="'check_sustancias'"
                        v-bind:desactivar_owner="$props.desactivar_sustancias"
                        v-bind:mostrar_owner_correccion="$props.mostrar_sustancias_correccion"
                        v-bind:desactivar_owner_correccion="$props.desactivar_sustancias_correccion"

                        v-on:changecorrecto="update_sustancias_correcto($event)"
                        v-on:changeobs="update_obs_sustancias($event)"
                        v-on:changeobsvalido="update_obs_sustancias_valido($event)"
                        v-on:changevalor="update_valor_sustancias($event)"
                        v-on:changeotroinput="update_valor_sustancias_input($event)"
                        v-on:changeotroinputvalido="update_valor_sustancias_input_valido($event)"
                    ></CaracterQueInvoca>
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
                                Hace referencia a si existen o sustancias de aprovechamiento común en la minifestación que esta declarando.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                            <br> otro de Mina valor padre: {{form_pagina.otros}}
                            <br> otro de Mina  correcto deel padre: {{form_pagina.otros_correcto}}
                            <br> otro de Mina  observacion deel padre: {{form_pagina.obs_otros}}
                            <br> otro de Mina  observacion valida deel padre: {{form_pagina.obs_otros_valido}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <div class="w-full  bg-white rounded shadow p-6 m-8">
                <div class="flex">
                    <CaracterQueInvoca 
                    v-if="$props.mostrar_otros"

                        v-bind:valor_input_props="form_pagina.otros"
                        v-bind:evualacion_correcto="form_pagina.otros_correcto"
                        v-bind:valor_obs="form_pagina.obs_otros"
                        v-bind:valor_valido_obs="form_pagina.obs_otros_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Otros'"
                        v-bind:label_true="'Tengo un dato que declarar'"
                        v-bind:label_false="'No tengo más datos a declarar'"
                        v-bind:otro_label="'Aclaracion de otro dato'"
                        v-bind:otro_input="form_pagina.otros_input"
                        v-bind:name_correcion="'correcion_otros'"
                        v-bind:name_checkbox="'check_otros'"
                        v-bind:desactivar_owner="$props.desactivar_otros"
                        v-bind:mostrar_owner_correccion="$props.mostrar_otros_correccion"
                        v-bind:desactivar_owner_correccion="$props.desactivar_otros_correccion"

                        v-on:changecorrecto="update_otro_correcto($event)"
                        v-on:changeobs="update_obs_otro($event)"
                        v-on:changeobsvalido="update_obs_otro_valido($event)"
                        v-on:changevalor="update_valor_otro($event)"
                        v-on:changeotroinput="update_valor_otro_input($event)"
                        v-on:changeotroinputvalido="update_valor_otro_input_valido($event)"
                    ></CaracterQueInvoca>
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
                                Este campo debe ser completado si usted cree que queda algún otro dato importante para declarar
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                            <br> otro de Mina valor padre: {{form_pagina.otros}}
                            <br> otro de Mina  correcto deel padre: {{form_pagina.otros_correcto}}
                            <br> otro de Mina  observacion deel padre: {{form_pagina.obs_otros}}
                            <br> otro de Mina  observacion valida deel padre: {{form_pagina.obs_otros_valido}}
                    </div>
                </div>
            </div>
        </div>
        <!-- <button class="animate-pulse px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900"
         @click="enviar_constancia"
         >
            Subir archivo
        </button> -->
        <div class="flex">
                <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                    <SubirArchivo
                        v-if="$props.mostrar_contancias_canon && $props.categoria !== 'Cantera'"
                        v-bind:valor_input_props="form_pagina.constancia_pago_canon"
                        v-bind:valor_input_validacion="form_pagina.constancia_pago_canon_validacion"
                        v-bind:evualacion_correcto="form_pagina.constancia_pago_canon_correcto"
                        v-bind:valor_obs="form_pagina.obs_constancia_pago_canon"
                        v-bind:valor_valido_obs="form_pagina.obs_constancia_pago_canon_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Recibo de último semestre'"
                        v-bind:desactivar_input="$props.desactivar_contancias_canon"
                        v-bind:mostrar_correccion="$props.mostrar_contancias_canon_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_contancias_canon_correccion"


                        v-on:changevalido="update_canon_valido($event)"
                        v-on:changecorrecto="update_canon_correcto($event)"
                        v-on:changeobs="update_obs_canon($event)"
                        v-on:changeobsvalido="update_obs_canon_valido($event)"
                        v-on:changevalor="update_valor_canon($event)"
                        v-on:cambioarchivo="cambio_el_archivo($event)"
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
                                Aquí debe colocar un archivo donde quede constancia del pago del canon minero asociado a la manifestación que esta declarando.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> canon resolucion minera de Mina valor padre: {{form_pagina.constancia_pago_canon}}
                        <br> canon resolucion minera de Mina  valido del padre: {{form_pagina.constancia_pago_canon_validacion}}
                        <br> canon resolucion minera de Mina  correcto deel padre: {{form_pagina.constancia_pago_canon_correcto}}
                        <br> canon resolucion minera de Mina  observacion deel padre: {{form_pagina.obs_constancia_pago_canon}}
                        <br> canon resolucion minera de Mina  observacion valida deel padre: {{form_pagina.obs_constancia_pago_canon_valido}}
                    </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo
                v-if="$props.mostrar_iia"

                    v-bind:valor_input_props="form_pagina.iia"
                    v-bind:valor_input_validacion="form_pagina.iia_canon_validacion"
                    v-bind:evualacion_correcto="form_pagina.iia_correcto"
                    v-bind:valor_obs="form_pagina.obs_iia_canon"
                    v-bind:valor_valido_obs="form_pagina.obs_iia_canon_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'IIA de Actividad Minera (o constancia de inicio)'"
                    v-bind:desactivar_input="$props.desactivar_iia"
                    v-bind:mostrar_correccion="$props.mostrar_iia_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_iia_correccion"

                    v-on:changevalido="update_iia_valido($event)"
                    v-on:changecorrecto="update_iia_correcto($event)"
                    v-on:changeobs="update_obs_iia($event)"
                    v-on:changeobsvalido="update_obs_iia_valido($event)"
                    v-on:changevalor="update_valor_iia($event)"
                    v-on:cambioarchivo="cambio_el_archivo_iia($event)"
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                            m quisquam doloremque placeat op.
                        </p>
                        
                    </div>
                    <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> iia minera de Mina valor padre: {{form_pagina.iia}}
                    <br> iia minera de Mina  valido del padre: {{form_pagina.iia_canon_validacion}}
                    <br> iia minera de Mina  correcto deel padre: {{form_pagina.iia_correcto}}
                    <br> iia minera de Mina  observacion deel padre: {{form_pagina.obs_iia_canon}}
                    <br> iia minera de Mina  observacion valida deel padre: {{form_pagina.obs_iia_canon_valido}}
                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <SubirArchivo
                v-if="$props.mostrar_dia"

                    v-bind:valor_input_props="form_pagina.dia"
                    v-bind:valor_input_validacion="form_pagina.dia_canon_validacion"
                    v-bind:evualacion_correcto="form_pagina.dia_correcto"
                    v-bind:valor_obs="form_pagina.obs_dia_canon"
                    v-bind:valor_valido_obs="form_pagina.obs_dia_canon_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'DIA de Actividad Minera (o constancia de inicio)'"
                    v-bind:desactivar_input="$props.desactivar_dia"
                    v-bind:mostrar_correccion="$props.mostrar_dia_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_dia_correccion"

                    v-on:changevalido="update_dia_valido($event)"
                    v-on:changecorrecto="update_dia_correcto($event)"
                    v-on:changeobs="update_obs_dia($event)"
                    v-on:changeobsvalido="update_obs_dia_valido($event)"
                    v-on:changevalor="update_valor_dia($event)"
                    v-on:cambioarchivo="cambio_el_archivo_dia($event)"
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
                            Presentacón de DIA o constancia de inicio del trámite de DIA.
                        </p>
                        
                    </div>
                    <br>
                </div>
                <div class="flex" v-if="mostrar_testing">
                    <br> dia minera de Mina valor padre: {{form_pagina.dia}}
                    <br> dia minera de Mina  valido del padre: {{form_pagina.dia_canon_validacion}}
                    <br> dia minera de Mina  correcto deel padre: {{form_pagina.dia_correcto}}
                    <br> dia minera de Mina  observacion deel padre: {{form_pagina.obs_dia_canon}}
                    <br> dia minera de Mina  observacion valida deel padre: {{form_pagina.obs_dia_canon_valido}}
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                v-if="$props.mostrar_actividad"

                    v-bind:valor_input_props="form_pagina.actividad"
                    v-bind:valor_input_validacion="form_pagina.actividad_a_desarrollar_validacion"
                    v-bind:evualacion_correcto="form_pagina.actividad_a_desarrollar_correcto"
                    v-bind:valor_obs="form_pagina.obs_actividad_a_desarrollar"
                    v-bind:valor_valido_obs="form_pagina.obs_actividad_a_desarrollar_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Actividades a Desarrollar la Mina'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/description.svg'"
                    v-bind:name_correcto="'actividades_correcto'"
                    v-bind:desactivar_input="$props.desactivar_actividad"
                    v-bind:mostrar_correccion="$props.mostrar_actividad_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_actividad_correccion"

                    v-on:changevalido="update_actividades_valido($event)"
                    v-on:changecorrecto="update_actividades_correcto($event)"
                    v-on:changeobs="update_obs_actividades($event)"
                    v-on:changeobsvalido="update_obs_actividades_valida($event)"
                    v-on:changevalor="update_valor_actividades($event)"
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
                    <br> Actvidades de Mina valor padre: {{form_pagina.actividad}}
                    <br> Actvidades de Mina  valido del padre: {{form_pagina.actividad_a_desarrollar_validacion}}
                    <br> Actvidades de Mina  correcto deel padre: {{form_pagina.actividad_a_desarrollar_correcto}}
                    <br> Actvidades de Mina  observacion deel padre: {{form_pagina.obs_actividad_a_desarrollar}}
                    <br> Actvidades de Mina  observacion valida deel padre: {{form_pagina.obs_actividad_a_desarrollar_valido}}

                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                v-if="$props.mostrar_acciones"

                    v-bind:valor_input_props="form_pagina.acciones_a_desarrollar"
                    v-bind:valor_input_validacion="form_pagina.acciones_a_desarrollar_validacion"
                    v-bind:evualacion_correcto="form_pagina.acciones_a_desarrollar_correcto"
                    v-bind:valor_obs="form_pagina.obs_acciones_a_desarrollar"
                    v-bind:valor_valido_obs="form_pagina.obs_acciones_a_desarrollar_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Acciones a Desarrollar la Mina'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/description.svg'"
                    v-bind:name_correcto="'acciones_correcto'"
                    v-bind:desactivar_input="$props.desactivar_acciones"
                    v-bind:mostrar_correccion="$props.mostrar_acciones_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_acciones_correccion"

                    v-on:changevalido="update_accionesvalido($event)"
                    v-on:changecorrecto="update_acciones_correcto($event)"
                    v-on:changeobs="update_obs_acciones($event)"
                    v-on:changeobsvalido="update_obs_acciones_valida($event)"
                    v-on:changevalor="update_valor_acciones($event)"
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
                    <br> Acciones de Mina valor padre: {{form_pagina.acciones_a_desarrollar}}
                    <br> Acciones de Mina  valido del padre: {{form_pagina.acciones_a_desarrollar_validacion}}
                    <br> Acciones de Mina  correcto deel padre: {{form_pagina.acciones_a_desarrollar_correcto}}
                    <br> Acciones de Mina  observacion deel padre: {{form_pagina.obs_acciones_a_desarrollar}}
                    <br> Acciones de Mina  observacion valida deel padre: {{form_pagina.obs_acciones_a_desarrollar_valido}}

                </div>
            </div>
        </div>
        
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <FechaGenerica
                v-if="$props.mostrar_fecha_alta_dia"


                    v-bind:valor_input_props="form_pagina.fecha_alta_dia"
                    v-bind:valor_input_validacion="form_pagina.fecha_alta_dia_validacion"
                    v-bind:evualacion_correcto="form_pagina.fecha_alta_dia_correcto"
                    v-bind:valor_obs="form_pagina.obs_fecha_alta_dia"
                    v-bind:valor_valido_obs="form_pagina.obs_fecha_alta_dia_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Fecha de Notificacion de DIA'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/calendar.svg'"
                    v-bind:desactivar_input="$props.desactivar_fecha_alta_dia"
                    v-bind:mostrar_correccion="$props.mostrar_fecha_alta_dia_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_fecha_alta_dia_correccion"

                    v-on:changevalido="update_fecha_iniciovalido($event)"
                    v-on:changecorrecto="update_fecha_inicio_correcto($event)"
                    v-on:changeobs="update_obs_fecha_inicio($event)"
                    v-on:changeobsvalido="update_obs_fecha_inicio_valida($event)"
                    v-on:changevalor="update_valor_fecha_inicio($event)"
                >
                </FechaGenerica>
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
                    <br> Fecha inicio de Mina valor padre: {{form_pagina.fecha_alta_dia}}
                    <br> Fecha inicio de Mina  valido del padre: {{form_pagina.fecha_alta_dia_validacion}}
                    <br> Fecha inicio de Mina  correcto deel padre: {{form_pagina.fecha_alta_dia_correcto}}
                    <br> Fecha inicio de Mina  observacion deel padre: {{form_pagina.obs_fecha_alta_dia}}
                    <br> Fecha inicio de Mina  observacion valida deel padre: {{form_pagina.obs_fecha_alta_dia_valido}}

                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <FechaGenerica
                v-if="$props.mostrar_fecha_vencimiento_dia"

                    v-bind:valor_input_props="form_pagina.fecha_vencimiento_dia"
                    v-bind:valor_input_validacion="form_pagina.fecha_vencimiento_dia_validacion"
                    v-bind:evualacion_correcto="form_pagina.fecha_vencimiento_dia_correcto"
                    v-bind:valor_obs="form_pagina.obs_fecha_vencimiento_dia"
                    v-bind:valor_valido_obs="form_pagina.obs_fecha_vencimiento_dia_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing ="mostrar_testing"
                    v-bind:label="'Fecha de Vencimiento de DIA'"
                    v-bind:icon="$inertia.page.props.appName+'/svg/calendar.svg'"
                    v-bind:desactivar_input="$props.desactivar_fecha_vencimiento_dia"
                    v-bind:mostrar_correccion="$props.mostrar_fecha_vencimiento_dia_correccion"
                    v-bind:desactivar_correccion="$props.desactivar_fecha_vencimiento_dia_correccion"

                    v-on:changevalido="update_fecha_fin_valido($event)"
                    v-on:changecorrecto="update_fecha_fin_correcto($event)"
                    v-on:changeobs="update_obs_fecha_fin($event)"
                    v-on:changeobsvalido="update_obs_fecha_fin_valida($event)"
                    v-on:changevalor="update_valor_fecha_fin($event)"
                >
                </FechaGenerica>
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
                    <br> Fecha fin de Mina valor padre: {{form_pagina.fecha_vencimiento_dia}}
                    <br> Fecha fin de Mina  valido del padre: {{form_pagina.fecha_vencimiento_dia_validacion}}
                    <br> Fecha fin de Mina  correcto deel padre: {{form_pagina.fecha_vencimiento_dia_correcto}}
                    <br> Fecha fin de Mina  observacion deel padre: {{form_pagina.obs_fecha_vencimiento_dia}}
                    <br> Fecha fin de Mina  observacion valida deel padre: {{form_pagina.obs_fecha_vencimiento_dia_valido}}

                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
            </div>
        </div>
    </div>
    <div class="flex justify-end mt-4">
        <BotonesPaginaCinco
        v-if="$props.mostrar_boton_guardar_cinco"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de la Mina'"

            :owner="form_pagina.owner"
            :owner_correcto="form_pagina.owner_correcto"
            :obs_owner="form_pagina.obs_owner"
            :obs_owner_valido="form_pagina.obs_owner_valido"
            :arrendatario="form_pagina.arrendatario"
            :arrendatario_correcto="form_pagina.arrendatario_correcto"
            :obs_arrendatario="form_pagina.obs_arrendatario"
            :obs_arrendatario_valido="form_pagina.obs_arrendatario_valido"
            :concesionario="form_pagina.concesionario"
            :concesionario_correcto="form_pagina.concesionario_correcto"
            :obs_concesionario="form_pagina.obs_concesionario"
            :obs_concesionario_valido="form_pagina.obs_concesionario_valido"
            :otros="form_pagina.otros"
            :otros_correcto="form_pagina.otros_correcto"
            :obs_otros="form_pagina.obs_otros"
            :obs_otros_valido="form_pagina.obs_otros_valido"
            :otros_input="form_pagina.otros_input"
            :otros_input_valido="form_pagina.otros_input_valido"
            :sustancias="form_pagina.sustancias"
            :sustancias_correcto="form_pagina.sustancias_correcto"
            :obs_sustancias="form_pagina.obs_sustancias"
            :obs_sustancias_valido="form_pagina.obs_sustancias_valido"
            :sustancias_input="form_pagina.sustancias_input"
            :sustancias_input_valido="form_pagina.sustancias_input_valido"
            :titulo_contrato_posecion="form_pagina.titulo_contrato_posecion"
            :titulo_contrato_posecion_validacion="form_pagina.titulo_contrato_posecion_validacion"
            :titulo_contrato_posecion_correcto="form_pagina.titulo_contrato_posecion_correcto"
            :obs_titulo_contrato_posecion="form_pagina.obs_titulo_contrato_posecion"
            :obs_titulo_contrato_posecion_valido="form_pagina.obs_titulo_contrato_posecion_valido"
            :resolucion_concesion_minera="form_pagina.resolucion_concesion_minera"
            :resolucion_concesion_minera_validacion="form_pagina.resolucion_concesion_minera_validacion"
            :resolucion_concesion_minera_correcto="form_pagina.resolucion_concesion_minera_correcto"
            :obs_resolucion_concesion_minera="form_pagina.obs_resolucion_concesion_minera"
            :obs_resolucion_concesion_minera_valido="form_pagina.obs_resolucion_concesion_minera_valido"
            :constancia_pago_canon="form_pagina.constancia_pago_canon"
            :constancia_pago_canon_validacion="form_pagina.constancia_pago_canon_validacion"
            :constancia_pago_canon_correcto="form_pagina.constancia_pago_canon_correcto"
            :obs_constancia_pago_canon="form_pagina.obs_constancia_pago_canon"
            :obs_constancia_pago_canon_valido="form_pagina.obs_constancia_pago_canon_valido"
            :iia="form_pagina.iia"
            :iia_canon_validacion="form_pagina.iia_canon_validacion"
            :iia_correcto="form_pagina.iia_correcto"
            :obs_iia_canon="form_pagina.obs_iia_canon"
            :obs_iia_canon_valido="form_pagina.obs_iia_canon_valido"
            :dia="form_pagina.dia"
            :dia_canon_validacion="form_pagina.dia_canon_validacion"
            :dia_correcto="form_pagina.dia_correcto"
            :obs_dia_canon="form_pagina.obs_dia_canon"
            :obs_dia_canon_valido="form_pagina.obs_dia_canon_valido"
            :acciones_a_desarrollar="form_pagina.acciones_a_desarrollar"
            :acciones_a_desarrollar_validacion="form_pagina.acciones_a_desarrollar_validacion"
            :acciones_a_desarrollar_correcto="form_pagina.acciones_a_desarrollar_correcto"
            :obs_acciones_a_desarrollar="form_pagina.obs_acciones_a_desarrollar"
            :obs_acciones_a_desarrollar_valido="form_pagina.obs_acciones_a_desarrollar_valido"
            :actividad="form_pagina.actividad"
            :actividad_a_desarrollar_validacion="form_pagina.actividad_a_desarrollar_validacion"
            :actividad_a_desarrollar_correcto="form_pagina.actividad_a_desarrollar_correcto"
            :obs_actividad_a_desarrollar="form_pagina.obs_actividad_a_desarrollar"
            :obs_actividad_a_desarrollar_valido="form_pagina.obs_actividad_a_desarrollar_valido"
            :fecha_alta_dia="form_pagina.fecha_alta_dia"
            :fecha_alta_dia_validacion="form_pagina.fecha_alta_dia_validacion"
            :fecha_alta_dia_correcto="form_pagina.fecha_alta_dia_correcto"
            :obs_fecha_alta_dia="form_pagina.obs_fecha_alta_dia"
            :obs_fecha_alta_dia_valido="form_pagina.obs_fecha_alta_dia_valido"
            :fecha_vencimiento_dia="form_pagina.fecha_vencimiento_dia"
            :fecha_vencimiento_dia_validacion="form_pagina.fecha_vencimiento_dia_validacion"
            :fecha_vencimiento_dia_correcto="form_pagina.fecha_vencimiento_dia_correcto"
            :obs_fecha_vencimiento_dia="form_pagina.obs_fecha_vencimiento_dia"
            :obs_fecha_vencimiento_dia_valido="form_pagina.obs_fecha_vencimiento_dia_valido"

            :evaluacion="autoridad_minera"
            :testing ="mostrar_testing"
            :id="$props.id"
        >

        </BotonesPaginaCinco>
        <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
    </div>
</div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardMinaDos from '@/Jetstream/altas/CardMinaDos';
import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import NombreMina from "@/Pages/Productors/NombreMina";
import FechaGenerica from "@/Pages/Productors/FechaGenerica";
import BotonesPaginaCinco from "@/Pages/Productors/BotonesPaginaCinco";
import Button from '../../Jetstream/Button.vue';


export default {
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'owner',
        'owner_correcto',
        'obs_owner',
        'obs_owner_valido',
        'mostrar_owner',
        'desactivar_owner',
        'mostrar_owner_correccion',
        'desactivar_owner_correccion',

        'arrendatario',
        'arrendatario_correcto',
        'obs_arrendatario',
        'obs_arrendatario_valido',
        'mostrar_arrendatario',
        'desactivar_arrendatario',
        'mostrar_arrendatario_correccion',
        'desactivar_arrendatario_correccion',

        'concesionario',
        'concesionario_correcto',
        'obs_concesionario',
        'obs_concesionario_valido',
        'mostrar_concesionario',
        'desactivar_concesionario',
        'mostrar_concesionario_correccion',
        'desactivar_concesionario_correccion',

        'otros',
        'otros_correcto',
        'obs_otros',
        'obs_otros_valido',
        'otros_input',
        'otros_input_valido',
        'mostrar_otros',
        'desactivar_otros',
        'mostrar_otros_correccion',
        'desactivar_otros_correccion',



        'sustancias',
        'sustancias_correcto',
        'obs_sustancias',
        'obs_sustancias_valido',
        'sustancias_input',
        'sustancias_input_valido',
        'mostrar_sustancias',
        'desactivar_sustancias',
        'mostrar_sustancias_correccion',
        'desactivar_sustancias_correccion',


        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',
        'mostrar_titulo',
        'desactivar_titulo',
        'mostrar_titulo_correccion',
        'desactivar_titulo_correccion',


        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'mostrar_concesion',
        'desactivar_concesion',
        'mostrar_concesion_correccion',
        'desactivar_concesion_correccion',

        'constancia_pago_canon',
        'constancia_pago_canon_validacion',
        'constancia_pago_canon_correcto',
        'obs_constancia_pago_canon',
        'obs_constancia_pago_canon_valido',
        'mostrar_contancias_canon',
        'desactivar_contancias_canon',
        'mostrar_contancias_canon_correccion',
        'desactivar_contancias_canon_correccion',

        'iia',
        'iia_canon_validacion',
        'iia_correcto',
        'obs_iia_canon',
        'obs_iia_canon_valido',
        'mostrar_iia',
        'desactivar_iia',
        'mostrar_iia_correccion',
        'desactivar_iia_correccion',

        'dia',
        'dia_canon_validacion',
        'dia_correcto',
        'obs_dia_canon',
        'obs_dia_canon_valido',
        'mostrar_dia',
        'desactivar_dia',
        'mostrar_dia_correccion',
        'desactivar_dia_correccion',

        'acciones_a_desarrollar',
        'acciones_a_desarrollar_validacion',
        'acciones_a_desarrollar_correcto',
        'obs_acciones_a_desarrollar',
        'obs_acciones_a_desarrollar_valido',
        'mostrar_acciones',
        'desactivar_acciones',
        'mostrar_acciones_correccion',
        'desactivar_acciones_correccion',


        'actividad',
        'actividad_a_desarrollar_validacion',
        'actividad_a_desarrollar_correcto',
        'obs_actividad_a_desarrollar',
        'obs_actividad_a_desarrollar_valido',
        'mostrar_actividad',
        'desactivar_actividad',
        'mostrar_actividad_correccion',
        'desactivar_actividad_correccion',

        'fecha_alta_dia',
        'fecha_alta_dia_validacion',
        'fecha_alta_dia_correcto',
        'obs_fecha_alta_dia',
        'obs_fecha_alta_dia_valido',
        'mostrar_fecha_alta_dia',
        'desactivar_fecha_alta_dia',
        'mostrar_fecha_alta_dia_correccion',
        'desactivar_fecha_alta_dia_correccion',

        'fecha_vencimiento_dia',
        'fecha_vencimiento_dia_validacion',
        'fecha_vencimiento_dia_correcto',
        'obs_fecha_vencimiento_dia',
        'obs_fecha_vencimiento_dia_valido',
        'mostrar_fecha_vencimiento_dia',
        'desactivar_fecha_vencimiento_dia',
        'mostrar_fecha_vencimiento_dia_correccion',
        'desactivar_fecha_vencimiento_dia_correccion',

        'mostrar_boton_guardar_cinco',
        'desactivar_boton_guardar_cinco',


        'evaluacion',
        'id',
        'testing',
        'categoria'
    ],
 
    components: {
		JetDialogModal,
        CardMinaDos,
		CaracterQueInvoca,
        SubirArchivo,
        NombreMina,
        FechaGenerica,
        BotonesPaginaCinco,
        Button,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing: this.$props.testing,
        autoridad_minera:this.$props.evaluacion,
        todas_las_validaciones: true,
        constancia_de_prueba:'',
        iia_archivo:'',
        dia_archivo:'',

        ayuda_local: false,
        form_pagina: {

            owner : this.$props.owner,
            owner_correcto: this.$props.owner_correcto,
            obs_owner: this.$props.obs_owner,
            obs_owner_valido:  this.$props.obs_owner_valido,

            arrendatario: this.$props.arrendatario,
            arrendatario_correcto: this.$props.arrendatario_correcto,
            obs_arrendatario: this.$props.obs_arrendatario,
            obs_arrendatario_valido: this.$props.obs_arrendatario_valido,



            concesionario: this.$props.concesionario,
            concesionario_correcto: this.$props.concesionario_correcto,
            obs_concesionario: this.$props.obs_concesionario,
            obs_concesionario_valido: this.$props.obs_concesionario_valido,



            otros: this.$props.otros,
            otros_correcto: this.$props.otros_correcto,
            obs_otros: this.$props.obs_otros,
            obs_otros_valido: this.$props.obs_otros_valido,
            otros_input: this.$props.otros_input,
            otros_input_valido: this.$props.otros_input_valido,


            sustancias: this.$props.sustancias,
            sustancias_correcto: this.$props.sustancias_correcto,
            obs_sustancias: this.$props.obs_sustancias,
            obs_sustancias_valido: this.$props.obs_sustancias_valido,
            sustancias_input: this.$props.sustancias_input,
            sustancias_valido_input: this.$props.sustancias_input_valido,







            constancia_pago_canon: this.$props.constancia_pago_canon,
            constancia_pago_canon_validacion: this.$props.constancia_pago_canon_validacion,
            constancia_pago_canon_correcto: this.$props.constancia_pago_canon_correcto,
            obs_constancia_pago_canon: this.$props.obs_constancia_pago_canon,
            obs_constancia_pago_canon_valido: this.$props.obs_constancia_pago_canon_valido,


            iia: this.$props.iia,
            iia_canon_validacion: this.$props.iia_canon_validacion,
            iia_correcto: this.$props.iia_correcto,
            obs_iia_canon: this.$props.obs_iia_canon,
            obs_iia_canon_valido: this.$props.obs_iia_canon_valido,

            dia: this.$props.dia,
            dia_canon_validacion: this.$props.dia_canon_validacion,
            dia_correcto: this.$props.dia_correcto,
            obs_dia_canon: this.$props.obs_dia_canon,
            obs_dia_canon_valido: this.$props.obs_dia_canon_valido,


            actividad: this.$props.actividad,
            actividad_a_desarrollar_validacion: this.$props.actividad_a_desarrollar_validacion,
            actividad_a_desarrollar_correcto: this.$props.actividad_a_desarrollar_correcto,
            obs_actividad_a_desarrollar: this.$props.obs_actividad_a_desarrollar,
            obs_actividad_a_desarrollar_valido: this.$props.obs_actividad_a_desarrollar_valido,
            acciones_a_desarrollar : this.$props.acciones_a_desarrollar,
            acciones_a_desarrollar_validacion : this.$props.acciones_a_desarrollar_validacion,
            acciones_a_desarrollar_correcto : this.$props.acciones_a_desarrollar_correcto,
            obs_acciones_a_desarrollar : this.$props.obs_acciones_a_desarrollar,
            obs_acciones_a_desarrollar_valido : this.$props.obs_acciones_a_desarrollar_valido,


            fecha_alta_dia : this.$props.fecha_alta_dia,
            fecha_alta_dia_validacion : this.$props.fecha_alta_dia_validacion,
            fecha_alta_dia_correcto : this.$props.fecha_alta_dia_correcto,
            obs_fecha_alta_dia : this.$props.obs_fecha_alta_dia,
            obs_fecha_alta_dia_valido : this.$props.obs_fecha_alta_dia_valido,


            fecha_vencimiento_dia: this.$props.fecha_vencimiento_dia,
            fecha_vencimiento_dia_validacion: this.$props.fecha_vencimiento_dia_validacion,
            fecha_vencimiento_dia_correcto: this.$props.fecha_vencimiento_dia_correcto,
            obs_fecha_vencimiento_dia: this.$props.obs_fecha_vencimiento_dia,
            obs_fecha_vencimiento_dia_valido: this.$props.obs_fecha_vencimiento_dia_valido,

        },
        
            

    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        // FUNCIONES DE OWNER
        update_owner_correcto(newValue){
            this.form_pagina.owner_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_owner(newValue){
            this.form_pagina.obs_owner = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_owner_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_owner_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalor_owner(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.owner = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE ARRENDATARIO
        update_arrendatario_correcto(newValue){
            this.form_pagina.arrendatario_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_arrendatario(newValue){
            this.form_pagina.obs_arrendatario = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_arrendatario_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_arrendatario_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_arrendatario(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.arrendatario = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE CONCESIONARIO
        update_concesionario_correcto(newValue){
            this.form_pagina.concesionario_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_concesionario(newValue){
            this.form_pagina.obs_concesionario = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_concesionario_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_concesionario_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_concesionario(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.concesionario = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE SUSTANCIAS
        update_sustancias_correcto(newValue){
            this.form_pagina.sustancias_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sustancias(newValue){
            this.form_pagina.obs_sustancias = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_sustancias_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_sustancias_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_sustancias(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.sustancias = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_sustancias_input(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.sustancias_input = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_sustancias_input_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.sustancias_valido_input = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE OTRO
        update_otro_correcto(newValue){
            this.form_pagina.otros_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_otro(newValue){
            this.form_pagina.obs_otros = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_otro_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_otros_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_otro(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.otros = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_otro_input(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.otros_input = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_otro_input_valido(newValue){
            console.log("traje un"+newValue);
            this.todas_las_validaciones = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE CANON
        update_canon_valido(newValue){
            this.form_pagina.constancia_pago_canon_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_canon_correcto(newValue){
            this.form_pagina.constancia_pago_canon_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_canon(newValue){
            this.form_pagina.obs_constancia_pago_canon = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_canon_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_constancia_pago_canon_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_canon(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.constancia_pago_canon = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE IIA
        update_iia_valido(newValue){
            this.form_pagina.iia_canon_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_iia_correcto(newValue){
            this.form_pagina.iia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_iia(newValue){
            this.form_pagina.obs_iia_canon = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_iia_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_iia_canon_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_iia(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.iia = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE DIA
        update_dia_valido(newValue){
            this.form_pagina.dia_canon_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_dia_correcto(newValue){
            this.form_pagina.dia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_dia(newValue){
            this.form_pagina.obs_dia_canon = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_dia_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_dia_canon_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_dia(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.dia = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE ACTIVIDADES
        update_actividades_valido(newValue){
            this.form_pagina.actividad_a_desarrollar_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_actividades_correcto(newValue){
            this.form_pagina.actividad_a_desarrollar_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_actividades(newValue){
            this.form_pagina.obs_actividad_a_desarrollar = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_actividades_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_actividad_a_desarrollar_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_actividades(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.actividad = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE ACCIONES
        update_accionesvalido(newValue){
            this.form_pagina.acciones_a_desarrollar_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_acciones_correcto(newValue){
            this.form_pagina.acciones_a_desarrollar_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_acciones(newValue){
            this.form_pagina.obs_acciones_a_desarrollar = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_acciones_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_acciones_a_desarrollar_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_acciones(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.acciones_a_desarrollar = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE FECHA ALTA
        update_fecha_iniciovalido(newValue){
            this.form_pagina.fecha_alta_dia_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_fecha_inicio_correcto(newValue){
            this.form_pagina.fecha_alta_dia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_fecha_inicio(newValue){
            this.form_pagina.obs_fecha_alta_dia = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_fecha_inicio_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_fecha_alta_dia_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_fecha_inicio(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.fecha_alta_dia = newValue;
            //tengo que enviarsela al padre
        },
        // FUNCIONES DE FECHA BAJA
        update_fecha_fin_valido(newValue){
            this.form_pagina.fecha_vencimiento_dia_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_fecha_fin_correcto(newValue){
            this.form_pagina.fecha_vencimiento_dia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_fecha_fin(newValue){
            this.form_pagina.obs_fecha_vencimiento_dia = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_fecha_fin_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_fecha_vencimiento_dia_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_fecha_fin(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.fecha_vencimiento_dia = newValue;
            //tengo que enviarsela al padre
        },

        cambio_el_archivo(newValue){
            this.constancia_de_prueba = newValue;
            this.form_pagina.constancia_pago_canon = this.constancia_de_prueba;
            /*const data = new FormData();
            data.append('photo', this.photo);
            data.append('description', this.description);
            data.append('productId', this.productId);
            axios.post("/api/photo", data);*/
        },
        cambio_el_archivo_iia(newValue){
            this.iia_archivo = newValue;
            this.form_pagina.iia = newValue;
        },
        cambio_el_archivo_dia(newValue){
            this.dia_archivo = newValue;
            this.form_pagina.dia = newValue;
        },
        //mostrar ayuda
        update_valor_ayuda_local(newValor){
            this.ayuda_local = newValor;
        },
        enviar_constancia(){
            console.log("por enviar");
            const data = new FormData();
            data.append('archivo', this.constancia_de_prueba);
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post($inertia.page.props.appName+"/formularios/auto_guardado_cinco", data)
            .then(function (response) {
                console.log(response.data);
                
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        }

  }
  
};
</script>