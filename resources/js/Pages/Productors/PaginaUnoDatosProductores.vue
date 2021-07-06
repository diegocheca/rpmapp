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
        <div class="flex justify-center md:justify-end -mt-16  sticky top-0">

            en el hijo es: {{$props.inscripciondgr_correcto}}  - {{$props.constaciasociedad_correcto}}
            <a href="#section_productor">
                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="http://localhost:8000/slick/img/features/casco-minero.svg" width="50%">
            </a>
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
            <br>
            <br>
            <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputRazonSocial 
                    v-bind:razon_social="$props.razon_social" 
                    v-bind:razon_social_valido="$props.razon_social_valido"
                    v-bind:razon_social_correcto="$props.razon_social_correcto"
                    v-bind:obs_razon_social="$props.obs_razon_social"
                    v-bind:obs_razon_social_valido="$props.obs_razon_social_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Razon social'"
                    v-bind:testing="mostrar_testing"
                    v-on:changerazonsocialvalido="update_razon_social_valido($event)"
                    v-on:changerazonsocialcorrecto="update_razon_social_correcto($event)"
                    v-on:changeobsrazonsocial="update_obs_razon_social($event)"
                    v-on:changeobsrazonsocialvalido="updateobs_razon_social_valido($event)"
                    v-on:changerazonsocial="update_razon_social($event)"
                ></InputRazonSocial>
                <div class="flex" v-if="mostrar_testing">
                    - Razon Social valor input del padre{{form_pagina.razon_social}}
                    - Razon Social input valido del padre{{form_pagina.razon_social_valido}}
                    - Razon Social rta prod correcta del padre{{form_pagina.razon_social_correcto}}
                    - Razon Social observacion autoridad del padre{{form_pagina.obs_razon_social}}
                    - Razon Social observacion autoridad valida del padre{{form_pagina.obs_razon_social_valido}}
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <InputEmail
                    v-bind:email="$props.email"
                    v-bind:email_valido="$props.email_valido"
                    v-bind:email_correcto="$props.email_correcto"
                    v-bind:obs_email="$props.obs_email"
                    v-bind:obs_email_valido="$props.obs_email_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Email'"
                    v-bind:testing="mostrar_testing"
                    v-on:changeemailvalido="update_email_valido($event)"
                    v-on:changeemailcorrecto="update_email_correcto($event)"
                    v-on:changeobsemail="update_obs_email($event)"
                    v-on:changeobsemailvalido="update_obs_email_valido($event)"
                    v-on:changeemail="update_email($event)"
                >
                </InputEmail>
                <div class="flex" v-if="mostrar_testing">
                    -- Emai  deel padre{{form_pagina.email}}
                    -- Emai valida deel padre{{form_pagina.email_valido}}
                    -- Emai correcto deel padre{{form_pagina.email_correcto}}
                    -- Emai observacion deel padre{{form_pagina.obs_email}}
                    -- Emai observacion valida deel padre{{form_pagina.obs_email_valido}}
                </div>
            </div>
        </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputCuit
                    v-bind:cuit="$props.cuit"
                    v-bind:cuit_valido="$props.cuit_valido"
                    v-bind:cuit_correcto="$props.cuit_correcto"
                    v-bind:obs_cuit="$props.obs_cuit"
                    v-bind:obs_cuit_valido="$props.obs_cuit_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Cuit'"
                    v-bind:testing="mostrar_testing"
                    v-on:changecuitvalido="update_cuit_valido($event)"
                    v-on:changecuitcorrecto="update_cuit_correcto($event)"
                    v-on:changeobscuit="update_obs_cuit($event)"
                    v-on:changecuit="update_cuit($event)"
                >
                </InputCuit>
                <div class="flex" v-if="mostrar_testing">
                    -- cuit valida deel padre{{form_pagina.cuit_valido}}
                    -- cuit correcto deel padre{{form_pagina.cuit_correcto}}
                    -- cuit observacion deel padre{{form_pagina.obs_cuit}}
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputNumeroProductor
                    v-bind:numeroproductor="$props.numeroproductor"
                    v-bind:numeroproductor_valido="$props.numeroproductor_valido"
                    v-bind:numeroproductor_correcto="$props.numeroproductor_correcto"
                    v-bind:obs_numeroproductor="$props.obs_numeroproductor"
                    v-bind:obs_numeroproductor_valido="$props.obs_numeroproductor_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Numero de Productor'"
                    v-bind:testing="mostrar_testing"
                    v-on:changenumprodvalido="update_num_prod_valido($event)"
                    v-on:changenumprodcorrecto="update_num_prod_correcto($event)"
                    v-on:changeobsnumprod="update_obs_num_prod($event)"
                    v-on:changenumprod="update_num_prod($event)"
                    
                >
                </InputNumeroProductor>
                <div class="flex" v-if="mostrar_testing">
                    -- numero productor valida deel padre{{form_pagina.numeroproductor_valido}}
                    -- numero productor correcto deel padre{{form_pagina.numeroproductor_correcto}}
                    -- numero productor observacion deel padre{{form_pagina.obs_numeroproductor}}
                </div>

            </div>
         </div>
         <div class="flex">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputTipoSociedad
                    v-bind:tiposociedad="$props.tiposociedad"
                    v-bind:tiposociedad_valido="$props.tiposociedad_valido"
                    v-bind:tiposociedad_correcto="$props.tiposociedad_correcto"
                    v-bind:obs_tiposociedad="$props.obs_tiposociedad"
                    v-bind:obs_tiposociedad_valido="$props.obs_tiposociedad_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Tipo de Sociedad'"
                    v-bind:testing="mostrar_testing"
                    v-on:changetiposociedadvalido="update_tipo_sociedad_valido($event)"
                    v-on:changetiposociedadcorrecto="update_tipo_sociedad_correcto($event)"
                    v-on:changeobstiposociedad="update_obs_tipo_sociedad($event)"
                    v-on:changetiposociedad="update_tipo_sociedad($event)"
                >
                </InputTipoSociedad>
                <div class="flex" v-if="mostrar_testing">
                    -- tipo de sociedad valida deel padre{{form_pagina.tiposociedad_valido}}
                    -- tipo de sociedad correcto deel padre{{form_pagina.tiposociedad_correcto}}
                    -- tipo de sociedad observacion deel padre{{form_pagina.obs_tiposociedad}}
                </div>
            </div>
         </div>
         <br>
         <br>
         <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <FileInscripcionDGR
                    v-bind:fileinput_valor="form_pagina.inscripciondgr"
                    v-bind:fileinput_valor_valido="form_pagina.inscripciondgr_valido"
                    v-bind:inscripciondgr_correcto="form_pagina.inscripciondgr_correcto"
                    v-bind:obs_fileinput="form_pagina.obs_inscripciondgr"
                    v-bind:obs_inscripciondgr_valido="form_pagina.obs_inscripciondgr_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Inscripción DGR'"
                    v-bind:testing="mostrar_testing"
                    v-bind:name_correcto="'inscripcion_correcto'"

                    v-on:changeinscripciondgrcorrecto="update_inscripcion_dgr_correcto($event)"
                    v-on:changeobsinscripciondgr="update_obs_inscripcion_dgr($event)"
                >
                </FileInscripcionDGR>
                <div class="flex" v-if="mostrar_testing">
                    -- inscripcion dgr valida deel padre{{form_pagina.inscripciondgr_valido}}
                    -- inscripcion dgr correcto deel padre{{form_pagina.inscripciondgr_correcto}}
                    -- inscripcion dgr observacion deel padre{{form_pagina.obs_inscripciondgr}}
                </div>
            </div>
         </div>
         <br>
         <br>
         <div class="flex">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <FileInscripcionDGR
                    v-bind:fileinput_valor="form_pagina.constanciasociedad"
                    v-bind:fileinput_valor_valido="form_pagina.constanciasociedad_valido"
                    v-bind:inscripciondgr_correcto="form_pagina.constanciasociedad_correcto"
                    v-bind:obs_fileinput="form_pagina.obs_constanciasociedad"
                    v-bind:obs_inscripciondgr_valido="form_pagina.obs_constanciasociedad_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:label="'Constancia de sociedad'"
                    v-bind:testing="mostrar_testing"
                    v-bind:name_correcto="'constancia_correcto'"
                    v-on:changeinscripciondgrcorrecto="update_constancia_sociedad_correcto($event)"
                    v-on:changeobsinscripciondgr="update_obs_constancia_sociedad($event)"
                >

                





                </FileInscripcionDGR>
                <div class="flex" v-if="mostrar_testing">
                    -- constancia de sociedad valida deel padre{{form_pagina.constanciasociedad_valido}}
                    -- constancia de sociedad correcto deel padre{{form_pagina.constanciasociedad_correcto}}
                    -- constancia de sociedad observacion deel padre{{form_pagina.obs_constanciasociedad}}
                </div>
            </div>
         </div>
         <br><br>
         <div class="flex items-center justify-center">
            <BotonesPaginaUna 
                :link_volver="route('formulario-alta.index')"
                :titulo_boton_volver="'volver'"
                :titulo_boton_guardar="'Guardar Datos del Productor'"
                :razon_social="form_pagina.razon_social" 
                :razon_social_valido="form_pagina.razon_social_valido"
                :razon_social_correcto="form_pagina.razon_social_correcto"
                :obs_razon_social="form_pagina.obs_razon_social"
                :obs_razon_social_valido="form_pagina.obs_razon_social_valido"
                :email="form_pagina.email"
                :email_valido="form_pagina.email_valido"
                :email_correcto="form_pagina.email_correcto"
                :obs_email="form_pagina.obs_email"
                :obs_email_valido="form_pagina.obs_email_valido"
                :cuit="form_pagina.cuit"
                :cuit_valido="form_pagina.cuit_valido"
                :cuit_correcto="form_pagina.cuit_correcto"
                :obs_cuit="form_pagina.obs_cuit"
                :obs_cuit_valido="form_pagina.obs_cuit_valido"
                :numeroproductor="form_pagina.numeroproductor"
                :numeroproductor_valido="form_pagina.numeroproductor_valido"
                :numeroproductor_correcto="form_pagina.numeroproductor_correcto"
                :obs_numeroproductor="form_pagina.obs_numeroproductor"
                :obs_numeroproductor_valido="form_pagina.obs_numeroproductor_valido"
                :tiposociedad="form_pagina.tiposociedad"
                :tiposociedad_valido="form_pagina.tiposociedad_valido"
                :tiposociedad_correcto="form_pagina.tiposociedad_correcto"
                :obs_tiposociedad="form_pagina.obs_tiposociedad"
                :obs_tiposociedad_valido="form_pagina.obs_tiposociedad_valido"
                :inscripciondgr="form_pagina.inscripciondgr"
                :inscripciondgr_valido="form_pagina.inscripciondgr_valido"
                :inscripciondgr_correcto="form_pagina.inscripciondgr_correcto"
                :obs_inscripciondgr="form_pagina.obs_inscripciondgr"
                :obs_inscripciondgr_valida="form_pagina.obs_inscripciondgr_valida"

                
                :constaciasociedad="form_pagina.constaciasociedad"
                :constanciasociedad_valido="form_pagina.constanciasociedad_valido"
                :constanciasociedad_correcto="form_pagina.constanciasociedad_correcto"
                :obs_constanciasociedad="form_pagina.obs_constanciasociedad"
                :obs_constanciasociedad_valido="form_pagina.obs_constanciasociedad_valido"

                :evaluacion="true"
                :id="$props.id"
            ></BotonesPaginaUna>
         </div>
        
        </div>


        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div>
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardProductor from '@/Jetstream/altas/CardProductor';
import InputRazonSocial from "@/Pages/Productors/InputRazonSocial";
import InputEmail from "@/Pages/Productors/InputEmail";
import InputCuit from "@/Pages/Productors/InputCuit";
import InputNumeroProductor from "@/Pages/Productors/InputNumeroProductor";
import InputTipoSociedad from "@/Pages/Productors/InputTipoSociedad";
import FileInscripcionDGR from "@/Pages/Productors/FileInscripcionDGR";
import PaginaUnoDatosProductorConstanciaSociedad from "@/Pages/Productors/PaginaUnoDatosProductorConstanciaSociedad";
import BotonesPaginaUna from "@/Pages/Productors/BotonesPaginaUna";
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
        'constanciasociedad',
        'constanciasociedad_valido',
        'constanciasociedad_correcto',
        'obs_constanciasociedad',
        'obs_constanciasociedad_valido',

        'evaluacion',
        'id'
    ],
 
    components: {
		JetDialogModal,
		CardProductor,
		InputRazonSocial,
		InputEmail,
		InputCuit,
		InputNumeroProductor,
		InputTipoSociedad,
		FileInscripcionDGR,
		PaginaUnoDatosProductorConstanciaSociedad,
		BotonesPaginaUna,
	},
   
  data() {
      console.log("eeeel valor es:");
      console.log(this.$props.inscripciondgr);
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing: false,
        autoridad_minera:false,
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
            
            cuit : this.$props.cuit,
            cuit_correcto : this.$props.cuit_correcto,
            cuit_valido : this.$props.cuit_valido,
            obs_cuit : this.$props.obs_cuit,
            obs_cuit_valido : this.$props.obs_cuit_valido,

            numeroproductor: this.$props.numeroproductor,
            numeroproductor_valido: this.$props.numeroproductor_valido,
            numeroproductor_correcto: this.$props.numeroproductor_correcto,
            obs_numeroproductor: this.$props.obs_numeroproductor,
            obs_numeroproductor_valido: this.$props.obs_numeroproductor_valido,

            tiposociedad: this.$props.tiposociedad,
            tiposociedad_valido: this.$props.tiposociedad_valido,
            tiposociedad_correcto: this.$props.tiposociedad_correcto,
            obs_tiposociedad: this.$props.obs_tiposociedad,
            obs_tiposociedad_valido: this.$props.obs_tiposociedad_valido,



            inscripciondgr: this.$props.inscripciondgr,
            inscripciondgr_valido: this.$props.inscripciondgr_valido,
            inscripciondgr_correcto: this.$props.inscripciondgr_correcto,
            obs_inscripciondgr: this.$props.obs_inscripciondgr,
            obs_inscripciondgr_valida: this.$props.obs_inscripciondgr_valido,


            constaciasociedad: this.$props.constanciasociedad ,
            constanciasociedad_valido: this.$props.constanciasociedad_valido,
            constanciasociedad_correcto: this.$props.constanciasociedad_correcto,
            obs_constanciasociedad: this.$props.obs_constanciasociedad,
            obs_constanciasociedad_valido: this.$props.obs_constanciasociedad_valido,

        },
    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        //FUNCIONES DE RAZON SOCIAL
        update_razon_social_valido(newValue){
            this.form_pagina.razon_social_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_razon_social_correcto(newValue){
            this.form_pagina.razon_social_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_razon_social(newValue){
            this.form_pagina.obs_razon_social = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_razon_social_valido(newValue){
      
            console.log("traje un"+newValue);
            this.form_pagina.obs_razon_social_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_razon_social(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.razon_social = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE EMAIL
        update_email_valido(newValue){
            this.form_pagina.email_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_email_correcto(newValue){
            this.form_pagina.email_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_email(newValue){
            this.form_pagina.obs_email = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_email_valido(newValue){
            this.form_pagina.obs_email_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_email(newValue){
            this.form_pagina.email = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE CUIT
        update_cuit_valido(newValue){
            this.form_pagina.cuit_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_cuit_correcto(newValue){
            this.form_pagina.cuit_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cuit(newValue){
            this.form_pagina.obs_cuit = newValue;
            //tengo que enviarsela al padre
        },
        update_cuit(newValue){
            this.form_pagina.cuit = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE NUMERO PRODUCTOR
        update_num_prod_valido(newValue){
            this.form_pagina.numeroproductor_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_num_prod_correcto(newValue){
            this.form_pagina.numeroproductor_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_num_prod(newValue){
            this.form_pagina.obs_numeroproductor = newValue;
            //tengo que enviarsela al padre
        },
        update_num_prod(newValue){
            this.form_pagina.numeroproductor = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE TIPO DE SOCIEDAD
        update_tipo_sociedad_valido(newValue){
            this.form_pagina.tiposociedad_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_tipo_sociedad_correcto(newValue){
            this.form_pagina.tiposociedad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_tipo_sociedad(newValue){
            this.form_pagina.obs_tiposociedad = newValue;
            //tengo que enviarsela al padre
        },
        update_tipo_sociedad(newValue){
            this.form_pagina.tiposociedad = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE Inscripcion dgr
        update_inscripcion_dgr_correcto(newValue){
            this.form_pagina.inscripciondgr_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_inscripcion_dgr(newValue){
            this.form_pagina.obs_inscripciondgr = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE Constancias de sociedad
        update_constancia_sociedad_correcto(newValue){
            this.form_pagina.constanciasociedad_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_constancia_sociedad(newValue){
            this.form_pagina.obs_constanciasociedad = newValue;
            //tengo que enviarsela al padre
        },
  }
  
};
</script>
