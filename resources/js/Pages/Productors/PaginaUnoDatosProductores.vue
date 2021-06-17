<template>
    <div>
        <h1>{{titulo_pagina}}</h1>
        <div class="flex items-center justify-center">
            <CardProductor  
                :progreso="50"
                :aprobado="25"
                :reprobado="25" 
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
            ></CardProductor>
        </div>
        <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorRazonSocial 
                    v-bind:razon_social="$props.razon_social" 
                    v-bind:razon_social_valido="$props.razon_social_valido"
                    v-bind:razon_social_correcto="$props.razon_social_correcto"
                    v-bind:obs_razon_social="$props.obs_razon_social"
                    v-bind:obs_razon_social_valido="$props.obs_razon_social_valido"
                    v-bind:evaluacion="false"
                    v-on:changerazonsocialvalido="updaterazonsocialvalido($event)"
                    v-on:changerazonsocialcorrecto="updaterazonsocialcorrecto($event)"
                    v-on:changeobsrazonsocial="updateobsrazonsocial($event)"
                    v-on:changeobsrazonsocialvalido="updateobs_razon_social_valido($event)"
                    
                    
                ></PaginaUnoDatosProductorRazonSocial>
                -- Razon Social valor input deel padre{{form_pagina.razon_social}}
                -- Razon Social input valido deel padre{{form_pagina.razon_social_valido}}
                -- Razon Social rta prod correcta deel padre{{form_pagina.razon_social_correcto}}
                -- Razon Social observacion autoridad deel padre{{form_pagina.obs_razon_social}}
                -- Razon Social observacion autoridad valida deel padre{{form_pagina.obs_razon_social_valido}}
                
            </div>
            <div class="w-full md:w-1/2 px-3">
                <PaginaUnoDatosProductorEmail
                    v-bind:email="$props.email"
                    v-bind:email_valido="$props.email_valido"
                    v-bind:email_correcto="$props.email_correcto"
                    v-bind:obs_email="$props.obs_email"
                    v-bind:obs_email_valido="$props.obs_email_valido"
                    v-bind:evaluacion="true"
                    v-on:changeemailvalido="updateemailvalido($event)"
                    v-on:changeemailcorrecto="updateemailcorrecto($event)"
                    v-on:changeobsemail="updateobs_email($event)"
                     v-on:changeobsemailvalido="updateobs_email_valido($event)"
                    

                    
                >
                </PaginaUnoDatosProductorEmail>
                 -- Emai  deel padre{{form_pagina.email}}
                  -- Emai valida deel padre{{form_pagina.email_valido}}
                -- Emai correcto deel padre{{form_pagina.email_correcto}}
               -- Emai observacion deel padre{{form_pagina.obs_email}}
                -- Emai observacion valida deel padre{{form_pagina.obs_email_valido}}
                
                
            </div>
        </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorCuit
                    v-bind:cuit="$props.cuit"
                    v-bind:cuit_valido="$props.cuit_valido"
                    v-bind:cuit_correcto="$props.cuit_correcto"
                    v-bind:obs_cuit="$props.obs_cuit"
                    v-bind:obs_cuit_valido="$props.obs_cuit_valido"
                    v-bind:evaluacion="true"
                    v-on:changecuitvalido="updatecuitvalido($event)"
                    v-on:changecuitcorrecto="updatecuitcorrecto($event)"
                    v-on:changeobscuit="updateobscuit($event)"
                >
                </PaginaUnoDatosProductorCuit>
                -- cuit valida deel padre{{form_pagina.cuit_valido}}
                -- cuit correcto deel padre{{form_pagina.cuit_correcto}}
                -- cuit observacion deel padre{{form_pagina.obs_cuit}}
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorNumProd
                    v-bind:numeroproductor="$props.numeroproductor"
                    v-bind:numeroproductor_valido="$props.numeroproductor_valido"
                    v-bind:numeroproductor_correcto="$props.numeroproductor_correcto"
                    v-bind:obs_numeroproductor="$props.obs_numeroproductor"
                    v-bind:obs_numeroproductor_valido="$props.obs_numeroproductor_valido"
                    v-bind:evaluacion="true"
                    v-on:changenumprodvalido="updatenumprodvalido($event)"
                    v-on:changenumprodcorrecto="updatenumprodcorrecto($event)"
                    v-on:changeobsnumprod="updateobsnumprod($event)"
                >
                </PaginaUnoDatosProductorNumProd>

                -- numero productor valida deel padre{{form_pagina.numeroproductor_valido}}
                -- numero productor correcto deel padre{{form_pagina.numeroproductor_correcto}}
                -- numero productor observacion deel padre{{form_pagina.obs_numeroproductor}}

            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorTipoSociedad
                    v-bind:tiposociedad="$props.tiposociedad"
                    v-bind:tiposociedad_valido="$props.tiposociedad_valido"
                    v-bind:tiposociedad_correcto="$props.tiposociedad_correcto"
                    v-bind:obs_tiposociedad="$props.obs_tiposociedad"
                    v-bind:obs_tiposociedad_valido="$props.obs_tiposociedad_valido"
                    v-bind:evaluacion="false"

                    v-on:changetiposociedadvalido="updatetiposociedadvalido($event)"
                    v-on:changetiposociedadcorrecto="updatetiposociedadcorrecto($event)"
                    v-on:changeobstiposociedad="updateobstiposociedad($event)"
                >
                </PaginaUnoDatosProductorTipoSociedad>
                 -- tipo de sociedad valida deel padre{{form_pagina.tiposociedad_valido}}
                -- tipo de sociedad correcto deel padre{{form_pagina.tiposociedad_correcto}}
                -- tipo de sociedad observacion deel padre{{form_pagina.obs_tiposociedad}}
            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorInscripcionDGR
                    :inscripciondgr="$props.inscripciondgr"
                    :inscripciondgr_valido="$props.inscripciondgr_valido"
                    :inscripciondgr_correcto="$props.inscripciondgr_correcto"
                    :obs_inscripciondgr="$props.obs_inscripciondgr"
                    :obs_inscripciondgr_valido="$props.obs_inscripciondgr_valido"
                    :evaluacion="true"

                    v-on:changeinscripciondgrcorrecto="updateinscripciondgrcorrecto($event)"
                    v-on:changeobsinscripciondgr="updateobsinscripciondgr($event)"
                >
                </PaginaUnoDatosProductorInscripcionDGR>
                 -- inscripcion dgr valida deel padre{{form_pagina.inscripciondgr_valido}}
                -- inscripcion dgr correcto deel padre{{form_pagina.inscripciondgr_correcto}}
                -- inscripcion dgr observacion deel padre{{form_pagina.obs_inscripciondgr}}
            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <PaginaUnoDatosProductorConstanciaSociedad
                    :constaciasociedad="$props.constaciasociedad"
                    :constaciasociedad_valido="$props.constaciasociedad_valido"
                    :constaciasociedad_correcto="$props.constaciasociedad_correcto"
                    :obs_constaciasociedad="$props.obs_constaciasociedad"
                    :obs_constaciasociedad_valido="$props.obs_constaciasociedad_valido"
                    :evaluacion="true"
                    v-on:changeconstanciasociedadcorrecto="updateconstanciasociedadcorrecto($event)"
                    v-on:changeobsconstanciasociedad="updateobsconstanciasociedad($event)"
                >
                </PaginaUnoDatosProductorConstanciaSociedad>
                -- constancia de sociedad valida deel padre{{form_pagina.constanciasociedad_valido}}
                -- constancia de sociedad correcto deel padre{{form_pagina.constanciasociedad_correcto}}
                -- constancia de sociedad observacion deel padre{{form_pagina.obs_constanciasociedad}}
            </div>
         </div>
         <div class="flex items-center justify-center">
            <PaginaUnoDatosProductorBotones 
                :link_volver="route('formulario-alta.index')"
                :titulo_boton_volver="'volver'"
                :titulo_boton_guardar="'Guardar Datos del Productor'"
                :razon_social="$props.razon_social" 
                :razon_social_valido="$props.razon_social_valido"
                :razon_social_correcto="$props.razon_social_correcto"
                :obs_razon_social="$props.obs_razon_social"
                :obs_razon_social_valido="$props.obs_razon_social_valido"
                :email="$props.email"
                :email_valido="$props.email_valido"
                :email_correcto="$props.email_correcto"
                :obs_email="$props.obs_email"
                :obs_email_valido="$props.obs_email_valido"
                :cuit="$props.cuit"
                :cuit_valido="$props.cuit_valido"
                :cuit_correcto="$props.cuit_correcto"
                :obs_cuit="$props.obs_cuit"
                :obs_cuit_valido="$props.obs_cuit_valido"
                :numeroproductor="$props.numeroproductor"
                :numeroproductor_valido="$props.numeroproductor_valido"
                :numeroproductor_correcto="$props.numeroproductor_correcto"
                :obs_numeroproductor="$props.obs_numeroproductor"
                :obs_numeroproductor_valido="$props.obs_numeroproductor_valido"
                :tiposociedad="$props.tiposociedad"
                :tiposociedad_valido="$props.tiposociedad_valido"
                :tiposociedad_correcto="$props.tiposociedad_correcto"
                :obs_tiposociedad="$props.obs_tiposociedad"
                :obs_tiposociedad_valido="$props.obs_tiposociedad_valido"
                :inscripciondgr="$props.inscripciondgr"
                :inscripciondgr_valido="$props.inscripciondgr_valido"
                :inscripciondgr_correcto="$props.inscripciondgr_correcto"
                :obs_inscripciondgr="$props.obs_inscripciondgr"
                :obs_inscripciondgr_valido="$props.obs_inscripciondgr_valido"
                :constaciasociedad="$props.constaciasociedad"
                :constaciasociedad_valido="$props.constaciasociedad_valido"
                :constaciasociedad_correcto="$props.constaciasociedad_correcto"
                :obs_constaciasociedad="$props.obs_constaciasociedad"
                :obs_constaciasociedad_valido="$props.obs_constaciasociedad_valido"
                :evaluacion="true"
                :id="$props.id"
            ></PaginaUnoDatosProductorBotones>
         </div>
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardProductor from '@/Jetstream/altas/CardProductor';
import PaginaUnoDatosProductorRazonSocial from "@/Pages/Productors/PaginaUnoDatosProductorRazonSocial";
import PaginaUnoDatosProductorEmail from "@/Pages/Productors/PaginaUnoDatosProductorEmail";
import PaginaUnoDatosProductorCuit from "@/Pages/Productors/PaginaUnoDatosProductorCuit";
import PaginaUnoDatosProductorNumProd from "@/Pages/Productors/PaginaUnoDatosProductorNumProd";
import PaginaUnoDatosProductorTipoSociedad from "@/Pages/Productors/PaginaUnoDatosProductorTipoSociedad";
import PaginaUnoDatosProductorInscripcionDGR from "@/Pages/Productors/PaginaUnoDatosProductorInscripcionDGR";
import PaginaUnoDatosProductorConstanciaSociedad from "@/Pages/Productors/PaginaUnoDatosProductorConstanciaSociedad";
import PaginaUnoDatosProductorBotones from "@/Pages/Productors/PaginaUnoDatosProductorBotones";
export default {
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'razon_social',
        'razon_social_valido',
        'razon_social_correcto',
        'obs_razon_social',
        'obs_razon_social_valido',
        'email',
        'email_valido',
        'email_correcto',
        'obs_email',
        'obs_email_valido',
        'cuit',
        'cuit_valido',
        'cuit_correcto',
        'obs_cuit',
        'obs_cuit_valido',
        'numeroproductor',
        'numeroproductor_valido',
        'numeroproductor_correcto',
        'obs_numeroproductor',
        'obs_numeroproductor_valido',
        'tiposociedad',
        'tiposociedad_valido',
        'tiposociedad_correcto',
        'obs_tiposociedad',
        'obs_tiposociedad_valido',
        'inscripciondgr',
        'inscripciondgr_valido',
        'inscripciondgr_correcto',
        'obs_inscripciondgr',
        'obs_inscripciondgr_valido',
        'constaciasociedad',
        'constaciasociedad_valido',
        'constaciasociedad_correcto',
        'obs_constaciasociedad',
        'obs_constaciasociedad_valido',

        'evaluacion',
        'id'
    ],
 
    components: {
		JetDialogModal,
		CardProductor,
		PaginaUnoDatosProductorRazonSocial,
		PaginaUnoDatosProductorEmail,
		PaginaUnoDatosProductorCuit,
		PaginaUnoDatosProductorNumProd,
		PaginaUnoDatosProductorTipoSociedad,
		PaginaUnoDatosProductorInscripcionDGR,
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
            razon_social : this.$props.razon_social,
            razon_social_valido: this.$props.razon_social_valido,
            razon_social_correcto: this.$props.razon_social_correcto,
            obs_razon_social:  this.$props.obs_razon_social,
            obs_razon_social_valido : this.$props.obs_razon_social_valido,

            email: this.$props.email,
            email_correcto:  this.$props.email_correcto,
            email_valido:  this.$props.email_valido,
            obs_email:  this.$props.obs_email,
            obs_email_valido: this.$props.obs_email_valido,
            
            cuit_valido : this.$props.cuit_valido,
            cuit_correcto : this.$props.cuit_correcto,
            obs_cuit : this.$props.obs_cuit,
            numeroproductor_valido: this.$props.numeroproductor_valido,
            numeroproductor_correcto: this.$props.numeroproductor_correcto,
            obs_numeroproductor: this.$props.obs_numeroproductor,
            tiposociedad_valido: this.$props.tiposociedad_valido,
            tiposociedad_correcto: this.$props.tiposociedad_correcto,
            obs_tiposociedad: this.$props.obs_tiposociedad,

            inscripciondgr_valido: this.$props.inscripciondgr_valido,
            inscripciondgr_correcto: this.$props.inscripciondgr_correcto,
            obs_inscripciondgr: this.$props.obs_inscripciondgr,


            constanciasociedad_valido: this.$props.constanciasociedad_valido,
            constanciasociedad_correcto: this.$props.constanciasociedad_correcto,
            obs_constanciasociedad: this.$props.obs_constanciasociedad,

            

        },
    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        updaterazonsocialvalido(newValue){
            this.form_pagina.razon_social_valido = newValue;
            //tengo que enviarsela al padre
        },
        updaterazonsocialcorrecto(newValue){
            this.form_pagina.razon_social_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobsrazonsocial(newValue){
            this.form_pagina.obs_razon_social = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_razon_social_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_razon_social_valido = newValue;
            //tengo que enviarsela al padre
        },
        
        
        updateemailvalido(newValue){
            this.form_pagina.email_valido = newValue;
            //tengo que enviarsela al padre
        },
        updateemailcorrecto(newValue){
            this.form_pagina.email_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_email(newValue){
            this.form_pagina.obs_email = newValue;
            //tengo que enviarsela al padre
        },
        
        updateobs_email_valido(newValue){
            this.form_pagina.obs_email_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatecuitvalido(newValue){
            this.form_pagina.cuit_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatecuitcorrecto(newValue){
            this.form_pagina.cuit_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobscuit(newValue){
            this.form_pagina.obs_cuit = newValue;
            //tengo que enviarsela al padre
        },

        updatenumprodvalido(newValue){
            this.form_pagina.numeroproductor_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatenumprodcorrecto(newValue){
            this.form_pagina.numeroproductor_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobsnumprod(newValue){
            this.form_pagina.obs_numeroproductor = newValue;
            //tengo que enviarsela al padre
        },

         updatetiposociedadvalido(newValue){
            this.form_pagina.tiposociedad_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatetiposociedadcorrecto(newValue){
            this.form_pagina.tiposociedad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobstiposociedad(newValue){
            this.form_pagina.obs_tiposociedad = newValue;
            //tengo que enviarsela al padre
        },
       
        updateconstanciasociedadcorrecto(newValue){
            this.form_pagina.constanciasociedad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobsconstanciasociedad(newValue){
            this.form_pagina.obs_constanciasociedad = newValue;
            //tengo que enviarsela al padre
        },


        





        
  }
  
};
</script>
