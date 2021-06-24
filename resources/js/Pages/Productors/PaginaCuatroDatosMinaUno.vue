<template>
<div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <div class="flex justify-center md:justify-end -mt-16 sticky top-0">
            <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="http://localhost:8000/formulario_alta/imagenes/tipo_caracter_card.svg">
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
                <CardMinaUno 
                    :progreso="50"
                    :aprobado="50"
                    :reprobado="50" 
                    :lugar="'Argentina, San Juan'"
                    :updated_at="'hace 10 minutos'"
                    :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                    :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                ></CardMinaUno>
            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <!-- <NumeroExpedienteMina 
                        v-bind:numero_expdiente="$props.numero_expdiente"
                        v-bind:numero_expdiente_valido="$props.numero_expdiente_valido"
                        v-bind:numero_expdiente_correcto="$props.numero_expdiente_correcto"
                        v-bind:obs_numero_expdiente="$props.obs_numero_expdiente"
                        v-bind:obs_numero_expdiente_valido="$props.obs_numero_expdiente_valido"
                        v-bind:evaluacion="true"
                        v-on:changenumexpvalido="update_num_exp_valido($event)"
                        v-on:changenumexpcorrecto="update_num_exp_correcto($event)"
                        v-on:changeobsnumexp="updateobs_num_exp($event)"
                        v-on:changeobsnumexpvalido="updateobs_num_exp_valido($event)"
                        v-on:changevalornumexp="updatevalor_num_exp($event)"
                    ></NumeroExpedienteMina> -->
                    <NombreMina
                        v-bind:valor_input_props="$props.numero_expdiente"
                        v-bind:valor_input_validacion="$props.numero_expdiente_valido"
                        v-bind:evualacion_correcto="$props.numero_expdiente_correcto"
                        v-bind:valor_obs="$props.obs_numero_expdiente"
                        v-bind:valor_valido_obs="$props.obs_numero_expdiente_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Numero de Expediente'"
                        v-bind:icon="'http://localhost:8000/svg/telstreet.svg'"
                        v-on:changevalido="update_num_exp_valido($event)"
                        v-on:changecorrecto="update_num_exp_correcto($event)"
                        v-on:changeobs="updateobs_num_exp($event)"
                        v-on:changeobsvalido="updateobs_num_exp_valido($event)"
                        v-on:changevalor="updatevalor_num_exp($event)"
                    >
                    </NombreMina>
                    <div class="flex" v-if="mostrar_testing">
                        <br> num exp de Mina valor padre: {{form_pagina.numero_expdiente}}
                        <br> num exp de Mina  valido del padre: {{form_pagina.numero_expdiente_valido}}
                        <br> num exp de Mina  correcto deel padre: {{form_pagina.numero_expdiente_correcto}}
                        <br> num exp de Mina  observacion deel padre: {{form_pagina.obs_numero_expdiente}}
                        <br> num exp de Mina  observacion valida deel padre: {{form_pagina.obs_numero_expdiente_valido}}
                    </div>

                </div>
                <div class="w-full md:w-1/2 px-3">
                    <!-- <DistritoMinero
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
                    </DistritoMinero> -->
                    <NombreMina
                        v-bind:valor_input_props="$props.distrito_minero"
                        v-bind:valor_input_validacion="$props.distrito_minero_validacion"
                        v-bind:evualacion_correcto="$props.distrito_minero_correcto"
                        v-bind:valor_obs="$props.obs_distrito_minero"
                        v-bind:valor_valido_obs="$props.obs_distrito_minero_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Distrito Minero'"
                        v-bind:icon="'http://localhost:8000/svg/numdistrito.svg'"
                        v-on:changevalido="update_distrito_minero_valido($event)"
                        v-on:changecorrecto="update_distrito_minero_correcto($event)"
                        v-on:changeobs="update_distrito_minero_obs($event)"
                        v-on:changeobsvalido="update_distrito_minero_valido_obs($event)"
                        v-on:changevalor="update_distrito_minero($event)"
                    >
                    </NombreMina>
                    <div class="flex" v-if="mostrar_testing">
                        <br> distrito minero de Mina valor padre: {{form_pagina.distrito_minero}}
                        <br> distrito minero de Mina  valido del padre: {{form_pagina.distrito_minero_validacion}}
                        <br> distrito minero de Mina  correcto deel padre: {{form_pagina.distrito_minero_correcto}}
                        <br> distrito minero de Mina  observacion deel padre: {{form_pagina.obs_distrito_minero}}
                        <br> distrito minero de Mina  observacion valida deel padre: {{form_pagina.obs_distrito_minero_valido}}
                    </div>
                    
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-bind:valor_input_props="$props.nombre_mina"
                        v-bind:valor_input_validacion="$props.nombre_mina_validacion"
                        v-bind:evualacion_correcto="$props.nombre_mina_correcto"
                        v-bind:valor_obs="$props.obs_nombre_mina"
                        v-bind:valor_valido_obs="$props.obs_nombre_mina_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Nombre de Mina'"
                        v-bind:icon="'http://localhost:8000/svg/nommina.svg'"
                        v-on:changevalido="update_nom_mina_valido($event)"
                        v-on:changecorrecto="update_nom_mina_correcto($event)"
                        v-on:changeobs="update_obs_nom_mina($event)"
                        v-on:changeobsvalido="update_obs_nom_mina_valida($event)"
                        v-on:changevalor="update_valor_nom_mina_($event)"
                    >
                    </NombreMina>
                    <div class="flex" v-if="mostrar_testing">
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
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Categoria de Manifestacion'"
                        v-bind:icon="'http://localhost:8000/svg/minetest.svg'"
                        v-on:changevalido="update_cat_valido($event)"
                        v-on:changecorrecto="update_cat_correcto($event)"
                        v-on:changeobs="update_obs_cat($event)"
                        v-on:changeobsvalido="update_obs_cat_valida($event)"
                        v-on:changevalor="update_valor_cat($event)"
                    >
                    </SelectGenerico>
                    <div class="flex" v-if="mostrar_testing">
                        <br> Categoria de Mina valor padre: {{form_pagina.categoria}}
                        <br> Categoria de Mina  valido del padre: {{form_pagina.categoria_validacion}}
                        <br> Categoria de Mina  correcto deel padre: {{form_pagina.categoria_correcto}}
                        <br> Categoria de Mina  observacion deel padre: {{form_pagina.obs_categoria}}
                        <br> Categoria de Mina  observacion valida deel padre: {{form_pagina.obs_categoria_valido}}

                    </div>
                </div>
            </div>
            <div class="flex w-full">
                <NombreMina
                    v-bind:valor_input_props="$props.descripcion_mina"
                    v-bind:valor_input_validacion="$props.descripcion_mina_validacion"
                    v-bind:evualacion_correcto="$props.descripcion_mina_correcto"
                    v-bind:valor_obs="$props.obs_descripcion_mina"
                    v-bind:valor_valido_obs="$props.obs_descripcion_mina_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Descripcion de la Mina'"
                    v-bind:icon="'http://localhost:8000/svg/description.svg'"
                    v-on:changevalido="update_descripcion_valido($event)"
                    v-on:changecorrecto="update_descripcion_correcto($event)"
                    v-on:changeobs="update_obs_descripcion($event)"
                    v-on:changeobsvalido="update_obs_descripcion_valida($event)"
                    v-on:changevalor="update_valor_descripcion($event)"
                >
                </NombreMina>
                <div class="flex" v-if="mostrar_testing">
                    <br> Nombre de Mina valor padre: {{form_pagina.descripcion_mina}}
                    <br> Nombre de Mina  valido del padre: {{form_pagina.descripcion_mina_validacion}}
                    <br> Nombre de Mina  correcto deel padre: {{form_pagina.descripcion_mina_correcto}}
                    <br> Nombre de Mina  observacion deel padre: {{form_pagina.obs_descripcion_mina}}
                    <br> Nombre de Mina  observacion valida deel padre: {{form_pagina.obs_descripcion_mina_valido}}

                </div>
            </div>
            <div class="flex">
                <InputFileGenerico v-if="form_pagina.categoria !== 'tercera'"
                    v-bind:valor_input_props="$props.resolucion_concesion_minera"
                    v-bind:valor_input_validacion="$props.resolucion_concesion_minera_validacion"
                    v-bind:evualacion_correcto="$props.resolucion_concesion_minera_correcto"
                    v-bind:valor_obs="$props.obs_resolucion_concesion_minera"
                    v-bind:valor_valido_obs="$props.obs_resolucion_concesion_minera_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Resolucion Concesion Minera (para 1° y 2° categoria)'"
                    v-bind:icon="'http://localhost:8000/svg/pdf.svg'"
                    v-on:changevalido="update_resol_conce_valido($event)"
                    v-on:changecorrecto="update_resol_conce_correcto($event)"
                    v-on:changeobs="update_obs_resol_conce($event)"
                    v-on:changeobsvalido="update_obs_resol_conce_valido($event)"
                    v-on:changevalor="update_valor_resol_conce($event)"

                >
                </InputFileGenerico>
                <div class="flex" v-if="mostrar_testing">
                    <br> concesion resolucion minera de Mina valor padre: {{form_pagina.resolucion_concesion_minera}}
                    <br> concesion resolucion minera de Mina  valido del padre: {{form_pagina.resolucion_concesion_minera_validacion}}
                    <br> concesion resolucion minera de Mina  correcto deel padre: {{form_pagina.resolucion_concesion_minera_correcto}}
                    <br> concesion resolucion minera de Mina  observacion deel padre: {{form_pagina.obs_resolucion_concesion_minera}}
                    <br> concesion resolucion minera de Mina  observacion valida deel padre: {{form_pagina.obs_resolucion_concesion_minera_valido}}
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputFileGenerico 
                    v-if="form_pagina.categoria === 'tercera'"
                        v-bind:valor_input_props="$props.plano_inmueble"
                        v-bind:valor_input_validacion="$props.plano_inmueble_validacion"
                        v-bind:evualacion_correcto="$props.plano_inmueble_correcto"
                        v-bind:valor_obs="$props.obs_plano_inmueble"
                        v-bind:valor_valido_obs="$props.obs_plano_inmueble_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Plano Inmueble (3° categoria) (*)'"
                        v-bind:icon="'http://localhost:8000/svg/pdf.svg'"
                        v-on:changevalido="update_plano_inmueble_valido($event)"
                        v-on:changecorrecto="update_plano_inmueble_correcto($event)"
                        v-on:changeobs="update_obs_plano_inmueble($event)"
                        v-on:changeobsvalido="update_obs_plano_inmueble_valido($event)"
                        v-on:changevalor="update_valor_plano_inmueble($event)"

                    >
                    </InputFileGenerico>
                    <div class="flex" v-if="mostrar_testing">
                        -- plano_inmueble minera del padre{{form_pagina.plano_inmueble}}
                        -- plano_inmueble_validacion minera valida deel padre{{form_pagina.plano_inmueble_validacion}}
                        -- plano_inmueble_correcto minera correcto deel padre{{form_pagina.plano_inmueble_correcto}}
                        -- obs_plano_inmueble minera observacion deel padre{{form_pagina.obs_plano_inmueble}}
                        -- obs_plano_inmueble_valido minera observacion valida deel padre{{form_pagina.obs_plano_inmueble_valido}}
                    </div>
                </div>

            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <InputFileGenerico
                    v-if="form_pagina.categoria === 'tercera'"
                        v-bind:valor_input_props="$props.titulo_contrato_posecion"
                        v-bind:valor_input_validacion="$props.titulo_contrato_posecion_validacion"
                        v-bind:evualacion_correcto="$props.titulo_contrato_posecion_correcto"
                        v-bind:valor_obs="$props.obs_titulo_contrato_posecion"
                        v-bind:valor_valido_obs="$props.obs_titulo_contrato_posecion_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Titulo - Contrato - Pocesión Ventiañal (solo para tercer categoria) (*)'"
                        v-bind:icon="'http://localhost:8000/svg/pdf.svg'"
                        v-on:changevalido="update_titulo_contrato_valido($event)"
                        v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                        v-on:changeobs="update_obs_titulo_contrato($event)"
                        v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                        v-on:changevalor="update_valor_titulo_contrato($event)"
                    >
                    </InputFileGenerico>
                    <div class="flex" v-if="mostrar_testing">
                        -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                        -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                        -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                        -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                        -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
                    </div>
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
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Lista de minerales'"
                        v-bind:label_text_area="'Forma de presentación natural del mineral (no usar abreviaturas):'"
                        v-bind:tipo_yacimiento="form_pagina.categoria"
                        v-bind:lista_de_minerales="lista_de_minerales"
                        v-on:changevalido="update_titulo_contrato_valido($event)"
                        v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                        v-on:changeobs="update_obs_titulo_contrato($event)"
                        v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                        v-on:changevalor="update_valor_titulo_contrato($event)"
                    >
                    </ListadeMinerales>
                    <div class="flex" v-if="mostrar_testing">
                        <h3>Testing de lista de minerales</h3>
                        -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                        -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                        -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                        -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                        -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
                    </div>
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
import CardMinaUno from '@/Jetstream/altas/CardMinaUno';
import NumeroExpedienteMina from "@/Pages/Productors/NumeroExpedienteMina";

import DistritoMinero from "@/Pages/Productors/DistritoMinero";
import NombreMina from "@/Pages/Productors/NombreMina";
import SelectGenerico from "@/Pages/Productors/SelectGenerico";
import InputFileGenerico from "@/Pages/Productors/InputFileGenerico";
import ListadeMinerales from "@/Pages/Productors/ListadeMinerales";

import BotonesPaginaUna from "@/Pages/Productors/BotonesPaginaUna";
export default {
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'numero_expdiente',
        'numero_expdiente_valido',
        'numero_expdiente_correcto',
        'obs_numero_expdiente',
        'obs_numero_expdiente_valido',
        'categoria',
        'categoria_validacion',
        'categoria_correcto',
        'obs_categoria',
        'obs_categoria_valido',
        'nombre_mina',
        'nombre_mina_validacion',
        'nombre_mina_correcto',
        'obs_nombre_mina',
        'obs_nombre_mina_valido',
        'descripcion_mina',
        'descripcion_mina_validacion',
        'descripcion_mina_correcto',
        'obs_descripcion_mina',
        'obs_descripcion_mina_valido',
        'distrito_minero',
        'distrito_minero_validacion',
        'distrito_minero_correcto',
        'obs_distrito_minero',
        'obs_distrito_minero_valido',
        'mina_cantera',
        'mina_cantera_validacion',
        'mina_cantera_correcto',
        'obs_mina_cantera',
        'obs_mina_cantera_valido',
        'plano_inmueble',
        'plano_inmueble_validacion',
        'plano_inmueble_correcto',
        'obs_plano_inmueble',
        'obs_plano_inmueble_valido',
        'minerales_variedad',
        'minerales_variedad_validacion',
        'minerales_variedad_correcto',
        'obs_minerales_variedad',
        'obs_minerales_variedad_valido',
        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',

        'evaluacion',
        'id',
        'testing'
    ],
 
    components: {
		JetDialogModal,
        CardMinaUno,
		NumeroExpedienteMina,
		DistritoMinero,
		NombreMina,
        SelectGenerico,
        InputFileGenerico,
        ListadeMinerales,
		BotonesPaginaUna,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing: false,
        autoridad_minera: false,
        form_pagina: {

            numero_expdiente : this.$props.numero_expdiente,
            numero_expdiente_valido: this.$props.numero_expdiente_valido,
            numero_expdiente_correcto: this.$props.numero_expdiente_correcto,
            obs_numero_expdiente:  this.$props.obs_numero_expdiente,
            obs_numero_expdiente_valido : this.$props.obs_numero_expdiente_valido,


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
        lista_de_minerales: [],
        
            

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
        update_num_exp_correcto(newValue){
            this.form_pagina.nombre_calle_legal_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_num_exp(newValue){
            this.form_pagina.obs_nombre_calle_legal = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_num_exp_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalor_num_exp(newValue){
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
            let self  =this;
            //alert("cambie la categoria de:"+newValue);
            console.log("traje un"+newValue);
            this.form_pagina.categoria = newValue;
            //alert("cambie la categoria de:"+newValue);
            let categoria_a_buscar = '';
            if(newValue === 'primera')
            {
                categoria_a_buscar = 'Primera';
            }
            if(newValue === 'segunda')
            {
                categoria_a_buscar = 'Segunda';
            }
            if(newValue === 'tercera')
            {
                categoria_a_buscar = 'Tercera';
            }

           axios.post('/datos/traer_minerales/',{categoria_buscando:categoria_a_buscar})
                .then(function (response) {
                    console.log("las manifestaciones son:\n");
                    self.lista_de_minerales = response.data;
                    console.log(self.lista_de_minerales);

                })
                .catch(function (error) {
                    console.log(error);
                });
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
