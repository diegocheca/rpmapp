<style>
  

  input:checked {
    background-color: #22c55e; /* bg-green-500 */
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }
</style>
<template>
    <div>
        <h1>{{titulo_pagina}}</h1>
        <div class="flex items-center justify-center">
            <CardMinaDos 
                :progreso="50"
                :aprobado="50"
                :reprobado="50" 
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
            ></CardMinaDos>
        </div>
        <div class="w-full  bg-white rounded shadow p-6 m-8">
            <div class="flex">
                <label class="flex items-center relative w-max cursor-pointer select-none">
                    <br>
                    <span class="text-lg font-bold mr-3">Testing</span>
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
            </div>
        </div>
        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            



            <div class="w-full  bg-white rounded shadow p-6 m-8">
                    <CaracterQueInvoca 
                        v-bind:valor_input_props="$props.owner"
                        v-bind:evualacion_correcto="$props.owner_correcto"
                        v-bind:valor_obs="$props.obs_owner"
                        v-bind:valor_valido_obs="$props.obs_owner_valido"
                        v-bind:evaluacion="true"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Propietario'"
                        v-bind:label_true="'Soy Propietario'"
                        v-bind:label_false="'No soy propietario'"
                        v-on:changecorrecto="update_owner_correcto($event)"
                        v-on:changeobs="updateobs_owner($event)"
                        v-on:changeobsvalido="updateobs_owner_valido($event)"
                        v-on:changevalor="updatevalor_owner($event)"
                    ></CaracterQueInvoca>
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
                    v-bind:valor_input_props="$props.arrendatario"
                    v-bind:evualacion_correcto="$props.arrendatario_correcto"
                    v-bind:valor_obs="$props.obs_arrendatario"
                    v-bind:valor_valido_obs="$props.obs_arrendatario_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Arrendatario'"
                     v-bind:label_true="'Soy Arrendatario'"
                    v-bind:label_false="'No soy arrendatario'"
                    v-on:changecorrecto="update_arrendatario_correcto($event)"
                    v-on:changeobs="update_obs_arrendatario($event)"
                    v-on:changeobsvalido="update_obs_arrendatario_valido($event)"
                    v-on:changevalor="update_valor_arrendatario($event)"
                ></CaracterQueInvoca>
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
                        v-bind:valor_input_props="$props.concesionario"
                        v-bind:evualacion_correcto="$props.concesionario_correcto"
                        v-bind:valor_obs="$props.obs_concesionario"
                        v-bind:valor_valido_obs="$props.obs_concesionario_valido"
                        v-bind:evaluacion="true"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Concesionario'"
                        v-bind:label_true="'Soy Concesionario'"
                        v-bind:label_false="'No soy concesionario'"
                        v-on:changecorrecto="update_concesionario_correcto($event)"
                        v-on:changeobs="update_obs_concesionario($event)"
                        v-on:changeobsvalido="update_obs_concesionario_valido($event)"
                        v-on:changevalor="update_valor_concesionario($event)"
                    ></CaracterQueInvoca>
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
                        v-bind:valor_input_props="$props.otros"
                        v-bind:evualacion_correcto="$props.otros_correcto"
                        v-bind:valor_obs="$props.obs_otros"
                        v-bind:valor_valido_obs="$props.obs_otros_valido"
                        v-bind:evaluacion="true"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Otros'"
                        v-bind:label_true="'Tengo un dato que declarar'"
                        v-bind:label_false="'No tengo maás datos a declarar'"
                        v-on:changecorrecto="update_otro_correcto($event)"
                        v-on:changeobs="update_obs_otro($event)"
                        v-on:changeobsvalido="update_obs_otro_valido($event)"
                        v-on:changevalor="update_valor_otro($event)"
                    ></CaracterQueInvoca>
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
            <SubirArchivo
                v-bind:valor_input_props="$props.constancia_pago_canon"
                v-bind:valor_input_validacion="$props.constancia_pago_canon_validacion"
                v-bind:evualacion_correcto="$props.constancia_pago_canon_correcto"
                v-bind:valor_obs="$props.obs_constancia_pago_canon"
                v-bind:valor_valido_obs="$props.obs_constancia_pago_canon_valido"
                v-bind:evaluacion="true"
                v-bind:testing = "mostrar_testing"
                v-bind:label="'Constancia de Pago de Canon'"
                v-on:changevalido="update_canon_valido($event)"
                v-on:changecorrecto="update_canon_correcto($event)"
                v-on:changeobs="update_obs_canon($event)"
                v-on:changeobsvalido="update_obs_canon_valido($event)"
                v-on:changevalor="update_valor_canon($event)"
            >
            </SubirArchivo>
        </div>
        <div class="flex" v-if="mostrar_testing">
            <br> canon resolucion minera de Mina valor padre: {{form_pagina.constancia_pago_canon}}
            <br> canon resolucion minera de Mina  valido del padre: {{form_pagina.constancia_pago_canon_validacion}}
            <br> canon resolucion minera de Mina  correcto deel padre: {{form_pagina.constancia_pago_canon_correcto}}
            <br> canon resolucion minera de Mina  observacion deel padre: {{form_pagina.obs_constancia_pago_canon}}
            <br> canon resolucion minera de Mina  observacion valida deel padre: {{form_pagina.obs_constancia_pago_canon_valido}}
        </div>


        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <SubirArchivo
                v-bind:valor_input_props="$props.iia"
                v-bind:valor_input_validacion="$props.iia_canon_validacion"
                v-bind:evualacion_correcto="$props.iia_correcto"
                v-bind:valor_obs="$props.obs_iia_canon"
                v-bind:valor_valido_obs="$props.obs_iia_canon_valido"
                v-bind:evaluacion="true"
                v-bind:testing = "mostrar_testing"
                v-bind:label="'IIA de Actividad Minera'"
                v-on:changevalido="update_iia_valido($event)"
                v-on:changecorrecto="update_iia_correcto($event)"
                v-on:changeobs="update_obs_iia($event)"
                v-on:changeobsvalido="update_obs_iia_valido($event)"
                v-on:changevalor="update_valor_iia($event)"
            >
            </SubirArchivo>
        </div>
        <div class="flex" v-if="mostrar_testing">
            <br> iia minera de Mina valor padre: {{form_pagina.iia}}
            <br> iia minera de Mina  valido del padre: {{form_pagina.iia_canon_validacion}}
            <br> iia minera de Mina  correcto deel padre: {{form_pagina.iia_correcto}}
            <br> iia minera de Mina  observacion deel padre: {{form_pagina.obs_iia_canon}}
            <br> iia minera de Mina  observacion valida deel padre: {{form_pagina.obs_iia_canon_valido}}
        </div>

        <div class="flex items-center justify-center bg-teal-lightest font-sans">
            <SubirArchivo
                v-bind:valor_input_props="$props.dia"
                v-bind:valor_input_validacion="$props.dia_canon_validacion"
                v-bind:evualacion_correcto="$props.dia_correcto"
                v-bind:valor_obs="$props.obs_dia_canon"
                v-bind:valor_valido_obs="$props.obs_dia_canon_valido"
                v-bind:evaluacion="true"
                v-bind:testing = "mostrar_testing"
                v-bind:label="'DIA de Actividad Minera'"
                v-on:changevalido="update_dia_valido($event)"
                v-on:changecorrecto="update_dia_correcto($event)"
                v-on:changeobs="update_obs_dia($event)"
                v-on:changeobsvalido="update_obs_dia_valido($event)"
                v-on:changevalor="update_valor_dia($event)"
            >
            </SubirArchivo>
        </div>
        <div class="flex" v-if="mostrar_testing">
            <br> dia minera de Mina valor padre: {{form_pagina.dia}}
            <br> dia minera de Mina  valido del padre: {{form_pagina.dia_canon_validacion}}
            <br> dia minera de Mina  correcto deel padre: {{form_pagina.dia_correcto}}
            <br> dia minera de Mina  observacion deel padre: {{form_pagina.obs_dia_canon}}
            <br> dia minera de Mina  observacion valida deel padre: {{form_pagina.obs_dia_canon_valido}}
        </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-bind:valor_input_props="$props.actividad"
                    v-bind:valor_input_validacion="$props.actividad_a_desarrollar_validacion"
                    v-bind:evualacion_correcto="$props.actividad_a_desarrollar_correcto"
                    v-bind:valor_obs="$props.obs_actividad_a_desarrollar"
                    v-bind:valor_valido_obs="$props.obs_actividad_a_desarrollar_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Actividades a Desarrollar la Mina'"
                    v-on:changevalido="update_actividades_valido($event)"
                    v-on:changecorrecto="update_actividades_correcto($event)"
                    v-on:changeobs="update_obs_actividades($event)"
                    v-on:changeobsvalido="update_obs_actividades_valida($event)"
                    v-on:changevalor="update_valor_actividades($event)"
                >
                </NombreMina>
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
                    v-bind:valor_input_props="$props.acciones_a_desarrollar"
                    v-bind:valor_input_validacion="$props.acciones_a_desarrollar_validacion"
                    v-bind:evualacion_correcto="$props.acciones_a_desarrollar_correcto"
                    v-bind:valor_obs="$props.obs_acciones_a_desarrollar"
                    v-bind:valor_valido_obs="$props.obs_acciones_a_desarrollar_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Acciones a Desarrollar la Mina'"
                    v-on:changevalido="update_accionesvalido($event)"
                    v-on:changecorrecto="update_acciones_correcto($event)"
                    v-on:changeobs="update_obs_acciones($event)"
                    v-on:changeobsvalido="update_obs_acciones_valida($event)"
                    v-on:changevalor="update_valor_acciones($event)"
                >
                </NombreMina>
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
                    v-bind:valor_input_props="$props.fecha_alta_dia"
                    v-bind:valor_input_validacion="$props.fecha_alta_dia_validacion"
                    v-bind:evualacion_correcto="$props.fecha_alta_dia_correcto"
                    v-bind:valor_obs="$props.obs_fecha_alta_dia"
                    v-bind:valor_valido_obs="$props.obs_fecha_alta_dia_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "true"
                    v-bind:label="'Fecha de Notificacion de DIA'"
                    v-on:changevalido="update_fecha_iniciovalido($event)"
                    v-on:changecorrecto="update_fecha_inicio_correcto($event)"
                    v-on:changeobs="update_obs_fecha_inicio($event)"
                    v-on:changeobsvalido="update_obs_fecha_inicio_valida($event)"
                    v-on:changevalor="update_valor_fecha_inicio($event)"
                >
                </FechaGenerica>
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
                    v-bind:valor_input_props="$props.fecha_vencimiento_dia"
                    v-bind:valor_input_validacion="$props.fecha_vencimiento_dia_validacion"
                    v-bind:evualacion_correcto="$props.fecha_vencimiento_dia_correcto"
                    v-bind:valor_obs="$props.obs_fecha_vencimiento_dia"
                    v-bind:valor_valido_obs="$props.obs_fecha_vencimiento_dia_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "true"
                    v-bind:label="'Fecha de Vencimiento de DIA'"
                    v-on:changevalido="update_fecha_fin_valido($event)"
                    v-on:changecorrecto="update_fecha_fin_correcto($event)"
                    v-on:changeobs="update_obs_fecha_fin($event)"
                    v-on:changeobsvalido="update_obs_fecha_fin_valida($event)"
                    v-on:changevalor="update_valor_fecha_fin($event)"
                >
                </FechaGenerica>
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
         <!-- <div class="flex items-center justify-center">
            <PaginaUnoDatosProductorBotones 
                :link_volver="route('formulario-alta.index')"
                :titulo_boton_volver="'volver'"
                :titulo_boton_guardar="'Guardar Datos del Productor'"

                :leal_calle="$props.leal_calle" 
                :nombre_calle_legal_valido="$props.nombre_calle_legal_valido"
                :nombre_calle_legal_correcto="$props.nombre_calle_legal_correcto"
                :obs_nombre_calle_legal="$props.obs_nombre_calle_legal"
                :obs_nombre_calle_legal_valido="$props.obs_nombre_calle_legal_valido"


                :leal_numero="form.leal_numero"
                :leal_numero_valido="form.leal_numero_valido"
                :leal_numero_correcto="form.leal_numero_correcto"
                :obs_leal_numero="form.obs_leal_numero"
                :obs_leal_numero_valido="form.obs_leal_numero_valido"
                :leal_telefono="form.leal_telefono"
                :leal_telefono_valido="form.leal_telefono_valido"
                :leal_telefono_correcto="form.leal_telefono_correcto"
                :obs_leal_telefono="form.obs_leal_telefono"
                :obs_leal_telefono_valido="form.obs_leal_telefono_valido"
                :leal_pais="form.leal_pais"
                :leal_pais_valido="form.leal_pais_valido"
                :leal_pais_correcto="form.leal_pais_correcto"
                :obs_leal_pais="form.obs_leal_pais"
                :obs_leal_pais_valido="form.obs_leal_pais_valido"
                :leal_provincia="form.leal_provincia"
                :leal_provincia_valido="form.leal_provincia_valido"
                :leal_provincia_correcto="form.leal_provincia_correcto"
                :obs_leal_provincia="form.obs_leal_provincia"
                :obs_leal_provincia_valido="form.obs_leal_provincia_valido"
                :leal_departamento="form.leal_departamento"
                :leal_departamento_valido="form.leal_departamento_valido"
                :leal_departamento_correcto="form.leal_departamento_correcto"
                :obs_leal_departamento="form.obs_leal_departamento"
                :obs_leal_departamento_valido="form.obs_leal_departamento_valido"
                :leal_localidad="form.leal_localidad"
                :leal_localidad_valido="form.leal_localidad_valido"
                :leal_localidad_correcto="form.leal_localidad_correcto"
                :obs_leal_localidad="form.obs_leal_localidad"
                :obs_leal_localidad_valido="form.obs_leal_localidad_valido"
                :leal_cp="form.leal_cp"
                :leal_cp_valido="form.leal_cp_valido"
                :leal_cp_correcto="form.leal_cp_correcto"
                :obs_leal_cp="form.obs_leal_cp"
                :obs_leal_cp_valido="form.obs_leal_cp_valido"
                :leal_otro="form.leal_otro"
                :leal_otro_valido="form.leal_otro_valido"
                :leal_otro_correcto="form.leal_otro_correcto"
                :obs_leal_otro="form.obs_leal_otro"
                :obs_leal_otro_valido="form.obs_leal_otro_valido"


                :evaluacion="true"
                :id="$props.id"
            ></PaginaUnoDatosProductorBotones>
         </div> -->
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardMinaDos from '@/Jetstream/altas/CardMinaDos';
import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import NombreMina from "@/Pages/Productors/NombreMina";
import FechaGenerica from "@/Pages/Productors/FechaGenerica";


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
        'arrendatario',
        'arrendatario_correcto',
        'obs_arrendatario',
        'obs_arrendatario_valido',
        'concesionario',
        'concesionario_correcto',
        'obs_concesionario',
        'obs_concesionario_valido',
        'otros',
        'otros_correcto',
        'obs_otros',
        'obs_otros_valido',
        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',
        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'constancia_pago_canon',
        'constancia_pago_canon_validacion',
        'constancia_pago_canon_correcto',
        'obs_constancia_pago_canon',
        'obs_constancia_pago_canon_valido',
        'iia',
        'iia_canon_validacion',
        'iia_correcto',
        'obs_iia_canon',
        'obs_iia_canon_valido',
        'dia',
        'dia_canon_validacion',
        'dia_correcto',
        'obs_dia_canon',
        'obs_dia_canon_valido',
        'acciones_a_desarrollar',
        'acciones_a_desarrollar_validacion',
        'acciones_a_desarrollar_correcto',
        'obs_acciones_a_desarrollar',
        'obs_acciones_a_desarrollar_valido',
        'actividad',
        'actividad_a_desarrollar_validacion',
        'actividad_a_desarrollar_correcto',
        'obs_actividad_a_desarrollar',
        'obs_actividad_a_desarrollar_valido',
        'fecha_alta_dia',
        'fecha_alta_dia_validacion',
        'fecha_alta_dia_correcto',
        'obs_fecha_alta_dia',
        'obs_fecha_alta_dia_valido',
        'fecha_vencimiento_dia',
        'fecha_vencimiento_dia_validacion',
        'fecha_vencimiento_dia_correcto',
        'obs_fecha_vencimiento_dia',
        'obs_fecha_vencimiento_dia_valido',


        'evaluacion',
        'id',
        'testing'
    ],
 
    components: {
		JetDialogModal,
        CardMinaDos,
		CaracterQueInvoca,
        SubirArchivo,
        NombreMina,
        FechaGenerica,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing:'',
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


        update_owner_correcto(newValue){
            this.form_pagina.nombre_calle_legal_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_owner(newValue){
            this.form_pagina.obs_nombre_calle_legal = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_owner_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalor_owner(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_calle = newValue;
            //tengo que enviarsela al padre
        },


        
        
        
        
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


        





        update_concesionario_correcto(newValue){
            this.form_pagina.arrendatario_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_concesionario(newValue){
            this.form_pagina.obs_arrendatario = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_concesionario_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_arrendatario_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_concesionario(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.arrendatario = newValue;
            //tengo que enviarsela al padre
        },










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
  }
  
};
</script>
