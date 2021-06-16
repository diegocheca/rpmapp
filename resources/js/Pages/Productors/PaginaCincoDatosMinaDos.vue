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
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <CaracterQueInvoca 
                    v-bind:valor_input_props="$props.owner"
                    v-bind:evualacion_correcto="$props.owner_correcto"
                    v-bind:valor_obs="$props.obs_owner"
                    v-bind:valor_valido_obs="$props.obs_owner_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "true"
                    v-bind:label="'Propietario'"
                    v-on:changecorrecto="update_owner_correcto($event)"
                    v-on:changeobs="updateobs_owner($event)"
                    v-on:changeobsvalido="updateobs_owner_valido($event)"
                    v-on:changevalor="updatevalor_owner($event)"
                ></CaracterQueInvoca>
                <div v-show="testing">
                     <br> owner de Mina valor padre: {{form_pagina.numero_expdiente}}
                     <br> owner de Mina  valido del padre: {{form_pagina.numero_expdiente_valido}}
                     <br> owner de Mina  correcto deel padre: {{form_pagina.numero_expdiente_correcto}}
                     <br> owner de Mina  observacion deel padre: {{form_pagina.obs_numero_expdiente}}
                     <br> owner de Mina  observacion valida deel padre: {{form_pagina.obs_numero_expdiente_valido}}
                </div>

            </div>
            <div class="w-full md:w-1/2 px-3">
                <DistritoMinero
                    v-bind:distrito_minero="$props.distrito_minero"
                    v-bind:distrito_minero_validacion="$props.distrito_minero_validacion"
                    v-bind:distrito_minero_correcto="$props.distrito_minero_correcto"
                    v-bind:obs_distrito_minero="$props.obs_distrito_minero"
                    v-bind:obs_distrito_minero_valido="$props.obs_distrito_minero_valido"
                    v-bind:evaluacion="true"
                    v-on:changevalido="update_distrito_minero_valido($event)"
                    v-on:changecorrecto="update_distrito_minero_correcto($event)"
                    v-on:changeobs="update_distrito_minero_obs($event)"
                    v-on:changeobsvalido="update_distrito_minero_valido_obs($event)"
                    v-on:changevalor="update_distrito_minero($event)"
                >
                </DistritoMinero>
                <div v-show="testing">
                     <br> distrito minero de Mina valor padre: {{form_pagina.distrito_minero}}
                     <br> distrito minero de Mina  valido del padre: {{form_pagina.distrito_minero_validacion}}
                     <br> distrito minero de Mina  correcto deel padre: {{form_pagina.distrito_minero_correcto}}
                     <br> distrito minero de Mina  observacion deel padre: {{form_pagina.obs_distrito_minero}}
                     <br> distrito minero de Mina  observacion valida deel padre: {{form_pagina.obs_distrito_minero_valido}}
                </div>
                
            </div>
        </div>
        Nombre de mina:{{$props.nombre_mina}}
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-bind:valor_input_props="$props.nombre_mina"
                    v-bind:valor_input_validacion="$props.nombre_mina_validacion"
                    v-bind:evualacion_correcto="$props.nombre_mina_correcto"
                    v-bind:valor_obs="$props.obs_nombre_mina"
                    v-bind:valor_valido_obs="$props.obs_nombre_mina_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "true"
                    v-bind:label="'Nombre de Mina'"
                    v-on:changevalido="update_nom_mina_valido($event)"
                    v-on:changecorrecto="update_nom_mina_correcto($event)"
                    v-on:changeobs="update_obs_nom_mina($event)"
                    v-on:changeobsvalido="update_obs_nom_mina_valida($event)"
                    v-on:changevalor="update_valor_nom_mina_($event)"
                >
                </NombreMina>
                <div v-show="testing">
                     <br> Nombre de Mina valor padre: {{form_pagina.nombre_mina}}
                     <br> Nombre de Mina  valido del padre: {{form_pagina.nombre_mina_validacion}}
                     <br> Nombre de Mina  correcto deel padre: {{form_pagina.nombre_mina_correcto}}
                     <br> Nombre de Mina  observacion deel padre: {{form_pagina.obs_nombre_mina}}
                     <br> Nombre de Mina  observacion valida deel padre: {{form_pagina.obs_nombre_mina_valido}}

                </div>
                
                
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <SelectGenerico
                    v-bind:valor_input_props="$props.categoria"
                    v-bind:valor_input_validacion="$props.categoria_validacion"
                    v-bind:evualacion_correcto="$props.categoria_correcto"
                    v-bind:valor_obs="$props.obs_categoria"
                    v-bind:valor_valido_obs="$props.obs_categoria_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "true"
                    v-bind:label="'Categoria de Manifestacion'"
                    v-on:changevalido="update_cat_valido($event)"
                    v-on:changecorrecto="update_cat_correcto($event)"
                    v-on:changeobs="update_obs_cat($event)"
                    v-on:changeobsvalido="update_obs_cat_valida($event)"
                    v-on:changevalor="update_valor_cat($event)"
                >
                </SelectGenerico>
                <div v-show="testing">
                     <br> Categoria de Mina valor padre: {{form_pagina.categoria}}
                     <br> Categoria de Mina  valido del padre: {{form_pagina.categoria_validacion}}
                     <br> Categoria de Mina  correcto deel padre: {{form_pagina.categoria_correcto}}
                     <br> Categoria de Mina  observacion deel padre: {{form_pagina.obs_categoria}}
                     <br> Categoria de Mina  observacion valida deel padre: {{form_pagina.obs_categoria_valido}}

                </div>
            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-bind:valor_input_props="$props.descripcion_mina"
                    v-bind:valor_input_validacion="$props.descripcion_mina_validacion"
                    v-bind:evualacion_correcto="$props.descripcion_mina_correcto"
                    v-bind:valor_obs="$props.obs_descripcion_mina"
                    v-bind:valor_valido_obs="$props.obs_descripcion_mina_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "true"
                    v-bind:label="'Descripcion de la Mina'"
                    v-on:changevalido="update_descripcion_valido($event)"
                    v-on:changecorrecto="update_descripcion_correcto($event)"
                    v-on:changeobs="update_obs_descripcion($event)"
                    v-on:changeobsvalido="update_obs_descripcion_valida($event)"
                    v-on:changevalor="update_valor_descripcion($event)"
                >
                </NombreMina>
                <div v-show="testing">
                     <br> Nombre de Mina valor padre: {{form_pagina.descripcion_mina}}
                     <br> Nombre de Mina  valido del padre: {{form_pagina.descripcion_mina_validacion}}
                     <br> Nombre de Mina  correcto deel padre: {{form_pagina.descripcion_mina_correcto}}
                     <br> Nombre de Mina  observacion deel padre: {{form_pagina.obs_descripcion_mina}}
                     <br> Nombre de Mina  observacion valida deel padre: {{form_pagina.obs_descripcion_mina_valido}}

                </div>
                
                
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                
            </div>
         </div>

        
        
        
        
        

         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputFileGenerico
                    v-bind:valor_input_props="$props.resolucion_concesion_minera"
                    v-bind:valor_input_validacion="$props.resolucion_concesion_minera_validacion"
                    v-bind:evualacion_correcto="$props.resolucion_concesion_minera_correcto"
                    v-bind:valor_obs="$props.obs_resolucion_concesion_minera"
                    v-bind:valor_valido_obs="$props.obs_resolucion_concesion_minera_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "false"
                    v-bind:label="'Resolucion Concesion Minera (para 1° y 2° categoria)'"
                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_resol_conce_valido($event)"
                    v-on:changevalor="update_valor_resol_conce($event)"

                >
                </InputFileGenerico>
                <div v-show="testing">
                     <br> concesion resolucion minera de Mina valor padre: {{form_pagina.resolucion_concesion_minera}}
                     <br> concesion resolucion minera de Mina  valido del padre: {{form_pagina.resolucion_concesion_minera_validacion}}
                     <br> concesion resolucion minera de Mina  correcto deel padre: {{form_pagina.resolucion_concesion_minera_correcto}}
                     <br> concesion resolucion minera de Mina  observacion deel padre: {{form_pagina.obs_resolucion_concesion_minera}}
                     <br> concesion resolucion minera de Mina  observacion valida deel padre: {{form_pagina.obs_resolucion_concesion_minera_valido}}
                </div>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputFileGenerico
                    v-bind:valor_input_props="$props.plano_inmueble"
                    v-bind:valor_input_validacion="$props.plano_inmueble_validacion"
                    v-bind:evualacion_correcto="$props.plano_inmueble_correcto"
                    v-bind:valor_obs="$props.obs_plano_inmueble"
                    v-bind:valor_valido_obs="$props.obs_plano_inmueble_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "false"
                    v-bind:label="'Plano Inmueble (3° categoria) (*)'"
                    v-on:changevalido="update_plano_inmueble_valido($event)"
                    v-on:changecorrecto="update_plano_inmueble_correcto($event)"
                    v-on:changeobs="update_obs_plano_inmueble($event)"
                    v-on:changeobsvalido="update_obs_plano_inmueble_valido($event)"
                    v-on:changevalor="update_valor_plano_inmueble($event)"

                >
                </InputFileGenerico>

                -- plano_inmueble minera del padre{{form_pagina.plano_inmueble}}
                -- plano_inmueble_validacion minera valida deel padre{{form_pagina.plano_inmueble_validacion}}
                -- plano_inmueble_correcto minera correcto deel padre{{form_pagina.plano_inmueble_correcto}}
                -- obs_plano_inmueble minera observacion deel padre{{form_pagina.obs_plano_inmueble}}
                -- obs_plano_inmueble_valido minera observacion valida deel padre{{form_pagina.obs_plano_inmueble_valido}}
            </div>

         </div>

         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputFileGenerico
                    v-bind:valor_input_props="$props.titulo_contrato_posecion"
                    v-bind:valor_input_validacion="$props.titulo_contrato_posecion_validacion"
                    v-bind:evualacion_correcto="$props.titulo_contrato_posecion_correcto"
                    v-bind:valor_obs="$props.obs_titulo_contrato_posecion"
                    v-bind:valor_valido_obs="$props.obs_titulo_contrato_posecion_valido"
                     v-bind:evaluacion="true"
                    v-bind:testing = "false"
                    v-bind:label="'Titulo - Contrato - Pocesión Ventiañal (solo para tercer categoria) (*)'"
                    v-on:changevalido="update_titulo_contrato_valido($event)"
                    v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                    v-on:changeobs="update_obs_titulo_contrato($event)"
                    v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                    v-on:changevalor="update_valor_titulo_contrato($event)"
                >
                </InputFileGenerico>

                -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
            </div>
         </div>

         <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <ListadeMinerales
                    v-bind:valor_input_props="$props.titulo_contrato_posecion"
                    v-bind:valor_input_validacion="$props.titulo_contrato_posecion_validacion"
                    v-bind:evualacion_correcto="$props.titulo_contrato_posecion_correcto"
                    v-bind:valor_obs="$props.obs_titulo_contrato_posecion"
                    v-bind:valor_valido_obs="$props.obs_titulo_contrato_posecion_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "false"
                    v-bind:label="'Lista de minerales'"
                    v-bind:label_text_area="'Forma de presentación natural del mineral (no usar abreviaturas):'"
                    v-bind:tipo_yacimiento="'segunda'"
                    v-on:changevalido="update_titulo_contrato_valido($event)"
                    v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                    v-on:changeobs="update_obs_titulo_contrato($event)"
                    v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                    v-on:changevalor="update_valor_titulo_contrato($event)"
                >
                </ListadeMinerales>

                -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
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

import DistritoMinero from "@/Pages/Productors/DistritoMinero";
import NombreMina from "@/Pages/Productors/NombreMina";
import SelectGenerico from "@/Pages/Productors/SelectGenerico";
import PaginaDosDatosDLProvincia from "@/Pages/Productors/PaginaDosDatosDLProvincia";
import InputFileGenerico from "@/Pages/Productors/InputFileGenerico";
import ListadeMinerales from "@/Pages/Productors/ListadeMinerales";

import PaginaDosDatosDLocalidad from "@/Pages/Productors/PaginaDosDatosDLocalidad";
import PaginaDosDatosDLCP from "@/Pages/Productors/PaginaDosDatosDLCP";
import PaginaDosDatosDLOtro from "@/Pages/Productors/PaginaDosDatosDLOtro";
import PaginaUnoDatosProductorConstanciaSociedad from "@/Pages/Productors/PaginaUnoDatosProductorConstanciaSociedad";
import PaginaUnoDatosProductorBotones from "@/Pages/Productors/PaginaUnoDatosProductorBotones";
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
		DistritoMinero,
		NombreMina,
        SelectGenerico,
		PaginaDosDatosDLProvincia,
        InputFileGenerico,
        ListadeMinerales,
		PaginaDosDatosDLocalidad,
		PaginaDosDatosDLOtro,
		PaginaUnoDatosProductorConstanciaSociedad,
		PaginaUnoDatosProductorBotones,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        form_pagina: {

            owner : this.$props.owner,
            owner_correcto: this.$props.owner_correcto,
            obs_owner: this.$props.obs_owner,
            obs_owner_valido:  this.$props.obs_owner_valido,


            distrito_minero : this.$props.distrito_minero,
            distrito_minero_validacion: this.$props.distrito_minero_validacion,
            distrito_minero_correcto: this.$props.distrito_minero_correcto,
            obs_distrito_minero:  this.$props.obs_distrito_minero,
            obs_distrito_minero_valido : this.$props.obs_distrito_minero_valido,


            nombre_mina : this.$props.nombre_mina,
            nombre_mina_validacion: this.$props.nombre_mina_validacion,
            nombre_mina_correcto: this.$props.nombre_mina_correcto,
            obs_nombre_mina:  this.$props.obs_nombre_mina,
            obs_nombre_mina_valido : this.$props.obs_nombre_mina_valido,

            descripcion_mina: this.$props.descripcion_mina,
            descripcion_mina_validacion: this.$props.descripcion_mina_validacion,
            descripcion_mina_correcto: this.$props.descripcion_mina_correcto,
            obs_descripcion_mina: this.$props.obs_descripcion_mina,
            obs_descripcion_mina_valido: this.$props.obs_descripcion_mina_valido,



            resolucion_concesion_minera : this.$props.resolucion_concesion_minera,
            resolucion_concesion_minera_validacion: this.$props.resolucion_concesion_minera_validacion,
            resolucion_concesion_minera_correcto: this.$props.resolucion_concesion_minera_correcto,
            obs_resolucion_concesion_minera:  this.$props.obs_resolucion_concesion_minera,
            obs_resolucion_concesion_minera_valido : this.$props.obs_resolucion_concesion_minera_valido,


            plano_inmueble : this.$props.plano_inmueble,
            plano_inmueble_validacion: this.$props.plano_inmueble_validacion,
            plano_inmueble_correcto: this.$props.plano_inmueble_correcto,
            obs_plano_inmueble:  this.$props.obs_plano_inmueble,
            obs_plano_inmueble_valido : this.$props.obs_plano_inmueble_valido,


            
            titulo_contrato_posecion: this.$props.titulo_contrato_posecion,
            titulo_contrato_posecion_validacion: this.$props.titulo_contrato_posecion_validacion,
            titulo_contrato_posecion_correcto: this.$props.titulo_contrato_posecion_correcto,
            obs_titulo_contrato_posecion: this.$props.obs_titulo_contrato_posecion,
            obs_titulo_contrato_posecion_valido: this.$props.obs_titulo_contrato_posecion_valido,
            
         
            
            
            





            
            
            
            
            
            
            
            
            
        },
        
            

    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},


        



        update_num_exp_valido(newValue){
                this.form_pagina.nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
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


        update_distrito_minero_valido(newValue){
            this.form_pagina.distrito_minero_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_correcto(newValue){
            this.form_pagina.distrito_minero_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_obs(newValue){
            this.form_pagina.obs_distrito_minero = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_valido_obs(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_distrito_minero_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.distrito_minero = newValue;
            //tengo que enviarsela al padre
        },



        
      














        update_nom_mina_valido(newValue){
            this.form_pagina.nombre_mina_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_nom_mina_correcto(newValue){
            this.form_pagina.nombre_mina_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nom_mina(newValue){
            this.form_pagina.obs_nombre_mina = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nom_mina_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_mina_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_nom_mina_(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.nombre_mina = newValue;
            //tengo que enviarsela al padre
        },















        update_descripcion_valido(newValue){
            this.form_pagina.descripcion_mina_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_descripcion_correcto(newValue){
            this.form_pagina.descripcion_mina_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_descripcion(newValue){
            this.form_pagina.obs_descripcion_mina = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_descripcion_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_descripcion_mina_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_descripcion(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.descripcion_mina = newValue;
            //tengo que enviarsela al padre
        },





        update_cat_valido(newValue){
            this.form_pagina.categoria_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_cat_correcto(newValue){
            this.form_pagina.categoria_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cat(newValue){
            this.form_pagina.obs_categoria = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cat_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_categoria_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_cat(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.categoria = newValue;
            //tengo que enviarsela al padre
        },












        update_resol_conce_valido(newValue){
            this.form_pagina.resolucion_concesion_minera_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_resol_conce_correcto(newValue){
            this.form_pagina.resolucion_concesion_minera_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_resol_conce(newValue){
            this.form_pagina.obs_resolucion_concesion_minera = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_resol_conce_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_resolucion_concesion_minera_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_resol_conce(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.resolucion_concesion_minera = newValue;
            //tengo que enviarsela al padre
        },

        


        update_plano_inmueble_valido(newValue){
            this.form_pagina.plano_inmueble_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_plano_inmueble_correcto(newValue){
            this.form_pagina.plano_inmueble_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_plano_inmueble(newValue){
            this.form_pagina.obs_plano_inmueble = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_plano_inmueble_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_plano_inmueble_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_plano_inmueble(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.plano_inmueble = newValue;
            //tengo que enviarsela al padre
        },






        update_titulo_contrato_valido(newValue){
            this.form_pagina.titulo_contrato_posecion_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_titulo_contrato_correcto(newValue){
            this.form_pagina.titulo_contrato_posecion_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_titulo_contrato(newValue){
            this.form_pagina.obs_titulo_contrato_posecion = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_titulo_contrato_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_titulo_contrato_posecion_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_titulo_contrato(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.titulo_contrato_posecion = newValue;
            //tengo que enviarsela al padre
        },
  }
  
};
</script>
