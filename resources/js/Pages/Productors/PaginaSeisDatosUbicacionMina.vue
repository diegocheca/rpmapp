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
            <CardMinaUbicacion 
                :progreso="50"
                :aprobado="50"
                :reprobado="50" 
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
            ></CardMinaUbicacion>
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
                <div class="flex" v-if="mostrar_testing">
                        <br> owner de Mina valor padre: {{form_pagina.numero_expdiente}}
                        <br> owner de Mina  valido del padre: {{form_pagina.numero_expdiente_valido}}
                        <br> owner de Mina  correcto deel padre: {{form_pagina.numero_expdiente_correcto}}
                        <br> owner de Mina  observacion deel padre: {{form_pagina.obs_numero_expdiente}}
                        <br> owner de Mina  observacion valida deel padre: {{form_pagina.obs_numero_expdiente_valido}}
                </div>
            </div>
        </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            País: <span>Argentina</span>
            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLProvincia
                    v-bind:leal_provincia="$props.localidad_mina_provincia"
                    v-bind:leal_provincia_valido="$props.localidad_mina_provincia_validacion"
                    v-bind:leal_provincia_correcto="$props.localidad_mina_provincia_correcto"
                    v-bind:obs_leal_provincia="$props.obs_localidad_mina_provincia"
                    v-bind:obs_leal_provincia_valido="$props.obs_localidad_mina_provincia_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Provincia de Ubicación de Mina'"
                    v-on:changeprovlegalvalido="update_provincia_valido($event)"
                    v-on:changeprovlegalcorrecto="update_provincia_correcto($event)"
                    v-on:changeobsrpovlegal="update_obs_provincia($event)"
                    v-on:changeobsprovlegalvalido="update_obs_provincia_valido($event)"
                    v-on:changevalorprovlegal="update_valor_provincia($event)"
                >
                </PaginaDosDatosDLProvincia>
                <div class="flex" v-if="mostrar_testing">
                    -- localidad_mina_provincia  deel padre{{form_pagina.localidad_mina_provincia}}
                    -- localidad_mina_provincia_validacion valida deel padre{{form_pagina.localidad_mina_provincia_validacion}}
                    -- localidad_mina_provincia_correcto correcto deel padre{{form_pagina.localidad_mina_provincia_correcto}}
                    -- obs_localidad_mina_provincia observacion deel padre{{form_pagina.obs_localidad_mina_provincia}}
                    -- obs_localidad_mina_provincia_valido observacion valida deel padre{{form_pagina.obs_localidad_mina_provincia_valido}}
                 </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLDepartamento
                    v-bind:leal_departamento="$props.localidad_mina_departamento"
                    v-bind:leal_departamento_valido="$props.localidad_mina_departamento_validacion"
                    v-bind:leal_departamento_correcto="$props.localidad_mina_departamento_correcto"
                    v-bind:obs_leal_departamento="$props.obs_localidad_mina_departamento"
                    v-bind:obs_leal_departamento_valido="$props.obs_localidad_mina_departamento_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Departamento de Ubicacion de la Mina'"
                    v-on:changedptolegalvalido="update_dpto_valido($event)"
                    v-on:changedptolegalcorrecto="update_dpto_correcto($event)"
                    v-on:changeobsrdptolegal="updateobs_dpto_legal($event)"
                    v-on:changeobsdptolegalvalido="update_obs_dpto_valido($event)"
                    v-on:changevalordptolegal="update_valor_dpto($event)"

                >
                </PaginaDosDatosDLDepartamento>
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
                    v-bind:valor_input_props="$props.localidad_mina_localidad"
                    v-bind:valor_input_validacion="$props.localidad_mina_localidad_validacion"
                    v-bind:evualacion_correcto="$props.localidad_mina_localidad_correcto"
                    v-bind:valor_obs="$props.obs_localidad_mina_localidad"
                    v-bind:valor_valido_obs="$props.obs_localidad_mina_localidad_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Localidad Donde se encuentra la Mina:'"
                    v-on:changevalido="update_localidad_valido($event)"
                    v-on:changecorrecto="update_localidad_correcto($event)"
                    v-on:changeobs="update_obs_localidad($event)"
                    v-on:changeobsvalido="update_obs_localidad_valida($event)"
                    v-on:changevalor="update_valor_localidad($event)"
                >
                </NombreMina>
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
                    v-bind:valor_input_props="$props.tipo_sistema"
                    v-bind:valor_input_validacion="$props.tipo_sistema_validacion"
                    v-bind:evualacion_correcto="$props.tipo_sistema_correcto"
                    v-bind:valor_obs="$props.obs_tipo_sistema"
                    v-bind:valor_valido_obs="$props.obs_tipo_sistema_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Tipo de Sistema de Coordenadas:'"
                    v-on:changevalido="update_sist_coor_valido($event)"
                    v-on:changecorrecto="update_sist_coor_correcto($event)"
                    v-on:changeobs="update_obs_sist_coor($event)"
                    v-on:changeobsvalido="update_obs_sist_coor_valida($event)"
                    v-on:changevalor="update_valor_sist_coor($event)"
                >
                </TipoDeSistemaGeo>
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
                    v-bind:valor_input_props="$props.latitud"
                    v-bind:valor_input_validacion="$props.latitud_validacion"
                    v-bind:evualacion_correcto="$props.latitud_correcto"
                    v-bind:valor_obs="$props.obs_latitud"
                    v-bind:valor_valido_obs="$props.obs_latitud_valido"
                    v-bind:evaluacion="true"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Latitud de las Coordenadas:'"
                    v-on:changevalido="update_latitud_valido($event)"
                    v-on:changecorrecto="update_latitud_correcto($event)"
                    v-on:changeobs="update_obs_latitud($event)"
                    v-on:changeobsvalido="update_obs_latitud_valida($event)"
                    v-on:changevalor="update_valor_latitud($event)"
                >
                </NombreMina>
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
                    v-bind:valor_input_props="$props.longitud"
                    v-bind:valor_input_validacion="$props.longitud_validacion"
                    v-bind:evualacion_correcto="$props.longitud_correcto"
                    v-bind:valor_obs="$props.obs_longitud"
                    v-bind:valor_valido_obs="$props.obs_longitud_valido"
                    v-bind:evaluacion="false"
                    v-bind:testing = "mostrar_testing"
                    v-bind:label="'Longitud de las Coordenadas:'"
                    v-on:changevalido="update_sist_coor_lonvalido($event)"
                    v-on:changecorrecto="update_sist_coor_loncorrecto($event)"
                    v-on:changeobs="update_obs_sist_coor_lon($event)"
                    v-on:changeobsvalido="update_obs_sist_coor_lonvalida($event)"
                    v-on:changevalor="update_valor_sist_coor_lon($event)"
                >
                </NombreMina>
                <div class="flex" v-if="mostrar_testing">
                     <br> longitud de Mina valor padre: {{form_pagina.longitud}}
                     <br> longitud_validacion de Mina  valido del padre: {{form_pagina.longitud_validacion}}
                     <br> longitud_correcto de Mina  correcto deel padre: {{form_pagina.longitud_correcto}}
                     <br> obs_longitud de Mina  observacion deel padre: {{form_pagina.obs_longitud}}
                     <br> obs_longitud_valido de Mina  observacion valida deel padre: {{form_pagina.obs_longitud_valido}}

                </div>
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
import CardMinaUbicacion from '@/Jetstream/altas/CardMinaUbicacion';
import PaginaDosDatosDLProvincia from "@/Pages/Productors/PaginaDosDatosDLProvincia";
import PaginaDosDatosDLDepartamento from "@/Pages/Productors/PaginaDosDatosDLDepartamento";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";

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
        'localidad_mina_departamento',
        'localidad_mina_departamento_validacion',
        'localidad_mina_departamento_correcto',
        'obs_localidad_mina_departamento',
        'obs_localidad_mina_departamento_valido',
        'localidad_mina_localidad',
        'localidad_mina_localidad_validacion',
        'localidad_mina_localidad_correcto',
        'obs_localidad_mina_localidad',
        'obs_localidad_mina_localidad_valido',
        'tipo_sistema',
        'tipo_sistema_validacion',
        'tipo_sistema_correcto',
        'obs_tipo_sistema',
        'obs_tipo_sistema_valido',
        'latitud',
        'latitud_validacion',
        'latitud_correcto',
        'obs_latitud',
        'obs_latitud_valido',
        'longitud',
        'longitud_validacion',
        'longitud_correcto',
        'obs_longitud',
        'obs_longitud_valido',


        'evaluacion',
        'id',
        'testing'
    ],
 
    components: {
		JetDialogModal,
        CardMinaUbicacion,
		PaginaDosDatosDLProvincia,
        PaginaDosDatosDLDepartamento,
        NombreMina,
        TipoDeSistemaGeo,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing:'',
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
            console.log("traje un"+newValue);
            this.form_pagina.localidad_mina_provincia = newValue;
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


  }
  
};
</script>
