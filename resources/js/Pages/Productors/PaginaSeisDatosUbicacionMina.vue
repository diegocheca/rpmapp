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
