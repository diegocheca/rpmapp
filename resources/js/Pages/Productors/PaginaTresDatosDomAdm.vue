<template>
    <div>
        <h1>{{titulo_pagina}}</h1>
        <div class="flex items-center justify-center">
            <CardDomLegal  
                :progreso="50"
                :aprobado="50"
                :reprobado="50" 
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
            ></CardDomLegal>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLNombreCalle
                    v-bind:leal_calle="$props.leal_calle"
                    v-bind:nombre_calle_legal_valido="$props.nombre_calle_legal_valido"
                    v-bind:nombre_calle_legal_correcto="$props.nombre_calle_legal_correcto"
                    v-bind:obs_nombre_calle_legal="$props.obs_nombre_calle_legal"
                    v-bind:obs_nombre_calle_legal_valido="$props.obs_nombre_calle_legal_valido"
                    v-bind:evaluacion="true"
                    v-on:changenombrecallevalido="updatenombrecallevalido($event)"
                    v-on:changenombrecallecorrecto="updatenombrecallecorrecto($event)"
                    v-on:changeobsnombrecalle="updateobsnombrecalle($event)"
                    v-on:changeobsnombrecallevalido="updateobsnombrecallevalido($event)"
                    v-on:changevalornombrecalle="updatevalornombrecalle($event)"
                    
                    
                    
                ></PaginaDosDatosDLNombreCalle>
                -- Nombre de calle valor input deel padre{{form_pagina.leal_calle}}
                -- Nombre de calle input valido deel padre{{form_pagina.nombre_calle_legal_valido}}
                -- Nombre de calle rta prod correcta deel padre{{form_pagina.nombre_calle_legal_correcto}}
                -- Nombre de calle observacion autoridad deel padre{{form_pagina.obs_nombre_calle_legal}}
                -- Nombre de calle observacion autoridad valida deel padre{{form_pagina.obs_nombre_calle_legal_valido}}
                
            </div>
            <div class="w-full md:w-1/2 px-3">
                <PaginaDosDatosDLNumeroCalle
                    v-bind:leal_numero="$props.leal_numero"
                    v-bind:leal_numero_valido="$props.leal_numero_valido"
                    v-bind:leal_numero_correcto="$props.leal_numero_correcto"
                    v-bind:obs_leal_numero="$props.obs_leal_numero"
                    v-bind:obs_leal_numero_valido="$props.obs_leal_numero_valido"
                    v-bind:evaluacion="true"
                    v-on:changetelnumlegalvalido="updatenumlegalvalido($event)"
                    v-on:changetelnumlegalcorrecto="updatenumlegalcorrecto($event)"
                    v-on:changeobstelnumlegal="updateobs_numlegal($event)"
                     v-on:changeobstelnumlegalvalido="updateobs_numlegal_valido($event)"
                     v-on:changevalornumlegal="updatevalornumlegal($event)"
                    

                    
                >
                </PaginaDosDatosDLNumeroCalle>
                 -- numero de calle  deel padre{{form_pagina.leal_numero}}
                  -- numero de calle valida deel padre{{form_pagina.leal_numero_valido}}
                -- numero de calle correcto deel padre{{form_pagina.leal_numero_correcto}}
               -- numero de calle observacion deel padre{{form_pagina.obs_leal_numero}}
                -- numero de calle observacion valida deel padre{{form_pagina.obs_leal_numero_valido}}
                
                
            </div>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLTelefono
                    v-bind:leal_telefono="$props.leal_telefono"
                    v-bind:leal_telefono_valido="$props.leal_telefono_valido"
                    v-bind:leal_telefono_correcto="$props.leal_telefono_correcto"
                    v-bind:obs_leal_telefono="$props.obs_leal_telefono"
                    v-bind:obs_leal_telefono_valido="$props.obs_leal_telefono_valido"
                    v-bind:evaluacion="true"
                    v-on:changetellegalvalido="updatetelegalvalido($event)"
                    v-on:changetellegalcorrecto="updatetellegalcorrecto($event)"
                    v-on:changeobstellegal="updateobs_tellegal($event)"
                     v-on:changeobstellegalvalido="updateobs_tellegal_valido($event)"
                     v-on:changevalortellegal="updatevalortellegal($event)"
                >
                </PaginaDosDatosDLTelefono>
                 -- telefono de calle  deel padre{{form_pagina.leal_telefono}}
                  -- telefono de calle valida deel padre{{form_pagina.leal_telefono_valido}}
                -- telefono de calle correcto deel padre{{form_pagina.leal_telefono_correcto}}
               -- telefono de calle observacion deel padre{{form_pagina.obs_leal_telefono}}
                -- telefono de calle observacion valida deel padre{{form_pagina.obs_leal_telefono_valido}}
                
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaDosDatosDLProvincia
                    v-bind:leal_provincia="$props.leal_provincia"
                    v-bind:leal_provincia_valido="$props.leal_provincia_valido"
                    v-bind:leal_provincia_correcto="$props.leal_provincia_correcto"
                    v-bind:obs_leal_provincia="$props.obs_leal_provincia"
                    v-bind:obs_leal_provincia_valido="$props.obs_leal_provincia_valido"
                    v-bind:evaluacion="false"
                    v-on:changeprovlegalvalido="updateteprovinciavalido($event)"
                    v-on:changeprovlegalcorrecto="updateteprovinciacorrecto($event)"
                    v-on:changeobsrpovlegal="updateobs_provincialegal($event)"
                    v-on:changeobsprovlegalvalido="updateobs_provincialegal_valido($event)"
                    v-on:changevalorprovlegal="updatevalorprovincialegalnumlegal($event)"

                >
                </PaginaDosDatosDLProvincia>

                 -- provincia de calle  deel padre{{form_pagina.leal_provincia}}
                  -- provincia de calle valida deel padre{{form_pagina.leal_provincia_valido}}
                -- provincia de calle correcto deel padre{{form_pagina.leal_provincia_correcto}}
               -- provincia de calle observacion deel padre{{form_pagina.obs_leal_provincia}}
                -- provincia de calle observacion valida deel padre{{form_pagina.obs_leal_provincia_valido}}

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
import CardDomLegal from '@/Jetstream/altas/CardDomLegal';
import PaginaDosDatosDLNombreCalle from "@/Pages/Productors/PaginaDosDatosDLNombreCalle";

import PaginaDosDatosDLNumeroCalle from "@/Pages/Productors/PaginaDosDatosDLNumeroCalle";
import PaginaDosDatosDLTelefono from "@/Pages/Productors/PaginaDosDatosDLTelefono";
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

        'evaluacion',
        'id'
    ],
 
    components: {
		JetDialogModal,
		CardDomLegal,
		PaginaDosDatosDLNombreCalle,
		PaginaDosDatosDLNumeroCalle,
		PaginaDosDatosDLTelefono,
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
    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        updatenombrecallevalido(newValue){
            this.form_pagina.nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatenombrecallecorrecto(newValue){
            this.form_pagina.nombre_calle_legal_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobsnombrecalle(newValue){
            this.form_pagina.obs_nombre_calle_legal = newValue;
            //tengo que enviarsela al padre
        },
        updateobsnombrecallevalido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_calle_legal_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalornombrecalle(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_calle = newValue;
            //tengo que enviarsela al padre
        },









        updatenumlegalvalido(newValue){
            this.form_pagina.leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatenumlegalcorrecto(newValue){
            this.form_pagina.leal_numero_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_numlegal(newValue){
            this.form_pagina.obs_leal_numero = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_numlegal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalornumlegal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_numero = newValue;
            //tengo que enviarsela al padre
        },



        
        updatetelegalvalido(newValue){
            this.form_pagina.leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatetellegalcorrecto(newValue){
            this.form_pagina.leal_numero_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_tellegal(newValue){
            this.form_pagina.obs_leal_numero = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_tellegal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_numero_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalortellegal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_numero = newValue;
            //tengo que enviarsela al padre
        },
        
        







        updateteprovinciavalido(newValue){
            this.form_pagina.leal_provincia_valido = newValue;
            //tengo que enviarsela al padre
        },
        updateteprovinciacorrecto(newValue){
            this.form_pagina.leal_provincia_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_provincialegal(newValue){
            this.form_pagina.obs_leal_provincia = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_provincialegal_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_leal_provincia_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalorprovincialegalnumlegal(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.leal_provincia = newValue;
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
