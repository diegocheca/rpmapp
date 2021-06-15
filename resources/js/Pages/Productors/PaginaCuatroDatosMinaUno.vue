<template>
    <div>
        <h1>{{titulo_pagina}}</h1>
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
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NumeroExpedienteMina 
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
                ></NumeroExpedienteMina>
                -- num exp valor input deel padre{{form_pagina.numero_expdiente}}
                -- num exp input valido deel padre{{form_pagina.numero_expdiente_valido}}
                -- num exp rta prod correcta deel padre{{form_pagina.numero_expdiente_correcto}}
                -- num exp observacion autoridad deel padre{{form_pagina.obs_numero_expdiente}}
                -- num exp observacion autoridad valida deel padre{{form_pagina.obs_numero_expdiente_valido}}
                
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
                -- distrito_minero   deel padre{{form_pagina.distrito_minero}}
                -- distrito_minero_validacion  valida deel padre{{form_pagina.distrito_minero_validacion}}
                -- distrito_minero_correcto  correcto deel padre{{form_pagina.distrito_minero_correcto}}
                -- obs_distrito_minero  observacion deel padre{{form_pagina.obs_distrito_minero}}
                -- obs_distrito_minero_valido  observacion valida deel padre{{form_pagina.obs_distrito_minero_valido}}
                
                
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
                    v-bind:evaluacion="true"
                    v-bind:label="'Nombre de Mina'"
                    v-on:changevalido="update_nom_mina_valido($event)"
                    v-on:changecorrecto="update_nom_mina_correcto($event)"
                    v-on:changeobs="update_obs_nom_mina($event)"
                    v-on:changeobsvalido="update_obs_nom_mina_valida($event)"
                    v-on:changevalor="update_valor_nom_mina_($event)"
                >
                </NombreMina>
                -- nom mina de calle  deel padre{{form_pagina.nombre_mina}}
                -- nom mina de calle valida deel padre{{form_pagina.nombre_mina_validacion}}
                -- nom mina de calle correcto deel padre{{form_pagina.nombre_mina_correcto}}
                -- nom mina de calle observacion deel padre{{form_pagina.obs_nombre_mina}}
                -- nom mina de calle observacion valida deel padre{{form_pagina.obs_nombre_mina_valido}}
                
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-bind:valor_input_props="$props.nombre_mina"
                    v-bind:valor_input_validacion="$props.nombre_mina_validacion"
                    v-bind:evualacion_correcto="$props.nombre_mina_correcto"
                    v-bind:valor_obs="$props.obs_nombre_mina"
                    v-bind:valor_valido_obs="$props.obs_nombre_mina_valido"
                    v-bind:evaluacion="true"
                    v-bind:label="'Nombre de Mina'"
                    v-on:changevalido="update_nom_mina_valido($event)"
                    v-on:changecorrecto="update_nom_mina_correcto($event)"
                    v-on:changeobs="update_obs_nom_mina($event)"
                    v-on:changeobsvalido="update_obs_nom_mina_valida($event)"
                    v-on:changevalor="update_valor_nom_mina_($event)"
                >
                </NombreMina>

            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLDepartamento
                    v-bind:leal_departamento="$props.leal_departamento"
                    v-bind:leal_departamento_valido="$props.leal_departamento_valido"
                    v-bind:leal_departamento_correcto="$props.leal_departamento_correcto"
                    v-bind:obs_leal_departamento="$props.obs_leal_departamento"
                    v-bind:obs_leal_departamento_valido="$props.obs_leal_departamento_valido"
                    v-bind:evaluacion="true"
                    v-on:changedptolegalvalido="updatetedptovalido($event)"
                    v-on:changedptolegalcorrecto="updatetedptocorrecto($event)"
                    v-on:changeobsrdptolegal="updateobs_dptolegal($event)"
                    v-on:changeobsdptolegalvalido="updateobs_dptolegal_valido($event)"
                    v-on:changevalordptolegal="updatevalordptolegalnumlegal($event)"

                >
                </PaginaDosDatosDLDepartamento>

                 -- dpto de calle  deel padre{{form_pagina.leal_departamento}}
                  -- dpto de calle valida deel padre{{form_pagina.leal_departamento_valido}}
                -- dpto de calle correcto deel padre{{form_pagina.leal_departamento_correcto}}
               -- dpto de calle observacion deel padre{{form_pagina.obs_leal_departamento}}
                -- dpto de calle observacion valida deel padre{{form_pagina.obs_leal_departamento_valido}}
            </div>


            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLocalidad
                    v-bind:leal_localidad="$props.leal_localidad"
                    v-bind:leal_localidad_valido="$props.leal_localidad_valido"
                    v-bind:leal_localidad_correcto="$props.leal_localidad_correcto"
                    v-bind:obs_leal_localidad="$props.obs_leal_localidad"
                    v-bind:obs_leal_localidad_valido="$props.obs_leal_localidad_valido"
                    v-bind:evaluacion="true"
                    v-on:changelocalidadlegalvalido="updatelocalidadvalido($event)"
                    v-on:changelocalidadlegalcorrecto="updatetelocalidadcorrecto($event)"
                    v-on:changeobsrlocalidadlegal="updateobs_localidadlegal($event)"
                    v-on:changeobslocalidadlegalvalido="updateobs_localidadlegal_valido($event)"
                    v-on:changevalorlocalidadlegal="updatevalorlocalidadlegalnumlegal($event)"

                >
                </PaginaDosDatosDLocalidad>

                 -- localidad de calle  deel padre{{form_pagina.leal_localidad}}
                  -- localidad de calle valida deel padre{{form_pagina.leal_localidad_valido}}
                -- localidad de calle correcto deel padre{{form_pagina.leal_localidad_correcto}}
               -- localidad de calle observacion deel padre{{form_pagina.obs_leal_localidad}}
                -- localidad de calle observacion valida deel padre{{form_pagina.obs_leal_localidad_valido}}
            </div>

         </div>

         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLCP
                    v-bind:leal_cp="$props.leal_cp"
                    v-bind:leal_cp_valido="$props.leal_cp_valido"
                    v-bind:leal_cp_correcto="$props.leal_cp_correcto"
                    v-bind:obs_leal_cp="$props.obs_leal_cp"
                    v-bind:obs_leal_cp_valido="$props.obs_leal_cp_valido"
                    v-bind:evaluacion="true"
                    v-on:changecplegalvalido="update_cp_valido($event)"
                    v-on:changecplegalcorrecto="update_cp_correcto($event)"
                    v-on:changeobsrcplegal="update_obs_cp_legal($event)"
                    v-on:changeobscplegalvalido="update_obs_cp_legal_valido($event)"
                    v-on:changevalorcplegal="update_valor_cp($event)"

                >
                </PaginaDosDatosDLCP>

                 -- cod postal de calle  deel padre{{form_pagina.leal_cp}}
                  -- cod postal de calle valida deel padre{{form_pagina.leal_cp_valido}}
                -- cod postal de calle correcto deel padre{{form_pagina.leal_cp_correcto}}
               -- cod postal de calle observacion deel padre{{form_pagina.obs_leal_cp}}
                -- cod postal de calle observacion valida deel padre{{form_pagina.obs_leal_cp_valido}}
            </div>


            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLOtro
                    v-bind:leal_otro="$props.leal_otro"
                    v-bind:leal_otro_valido="$props.leal_otro_valido"
                    v-bind:leal_otro_correcto="$props.leal_otro_correcto"
                    v-bind:obs_leal_otro="$props.obs_leal_otro"
                    v-bind:obs_leal_otro_valido="$props.obs_leal_otro_valido"
                    v-bind:evaluacion="true"
                    v-on:changeotrolegalvalido="update_otro_valido($event)"
                    v-on:changeotrolegalcorrecto="update_otro_correcto($event)"
                    v-on:changeobsotrolegal="update_obs_otro_legal($event)"
                    v-on:changeobsotrolegalvalido="update_obs_otro_legal_valido($event)"
                    v-on:changevalorotrolegal="update_valor_otro($event)"

                >
                </PaginaDosDatosDLOtro>

                 -- otro de calle  deel padre{{form_pagina.leal_otro}}
                  -- otro de calle valida deel padre{{form_pagina.leal_otro_valido}}
                -- otro de calle correcto deel padre{{form_pagina.leal_otro_correcto}}
               -- otro de calle observacion deel padre{{form_pagina.obs_leal_otro}}
                -- otro de calle observacion valida deel padre{{form_pagina.obs_leal_otro_valido}}
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
import CardMinaUno from '@/Jetstream/altas/CardMinaUno';
import NumeroExpedienteMina from "@/Pages/Productors/NumeroExpedienteMina";

import DistritoMinero from "@/Pages/Productors/DistritoMinero";
import NombreMina from "@/Pages/Productors/NombreMina";
import PaginaDosDatosDLProvincia from "@/Pages/Productors/PaginaDosDatosDLProvincia";
import PaginaDosDatosDLDepartamento from "@/Pages/Productors/PaginaDosDatosDLDepartamento";

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

        'evaluacion',
        'id'
    ],
 
    components: {
		JetDialogModal,
        CardMinaUno,
		NumeroExpedienteMina,
		DistritoMinero,
		NombreMina,
		PaginaDosDatosDLProvincia,
        PaginaDosDatosDLDepartamento,
        PaginaDosDatosDLCP,
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




        updatetedptovalido(newValue){
            this.form_pagina.leal_departamento_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatetedptocorrecto(newValue){
            this.form_pagina.leal_departamento_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_dptolegal(newValue){
            this.form_pagina.obs_leal_departamento = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_dptolegal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_departamento_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalordptolegalnumlegal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_departamento = newValue;
            //tengo que enviarsela al padre
        },







        updatelocalidadvalido(newValue){
            this.form_pagina.leal_localidad_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatetelocalidadcorrecto(newValue){
            this.form_pagina.leal_localidad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_localidadlegal(newValue){
            this.form_pagina.obs_leal_localidad = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_localidadlegal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_localidad_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalorlocalidadlegalnumlegal(newValue){
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
