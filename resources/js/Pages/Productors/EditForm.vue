<template>
  <app-layout>
    <div class="flex items-center w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <div id="inicio"></div>
        <div class="flex">
          <div
            v-if="$props.mostrar.alerta_puede_editar"
            class="w-full w-2/2 px-3 mb-6 md:mb-0"
          >
            <div
              class="
                alert
                flex flex-row
                w-1/1
                items-center
                bg-green-200
                p-5
                rounded
                border-b-2 border-green-300
              "
            >
              <div
                class="
                  alert-icon
                  flex
                  items-center
                  bg-green-100
                  border-2 border-green-500
                  justify-center
                  h-10
                  w-10
                  flex-shrink-0
                  rounded-full
                "
              >
                <span class="text-green-500">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path
                      fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </span>
              </div>
              <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-green-800">
                  Puede Actualizar El Formulario
                </div>
                <div class="alert-description text-sm text-green-600">
                  Usted puede editar el contenido de este formulario porque esta
                  en estado de borrador.
                </div>
              </div>
            </div>
            <br />
            <h1
              class="
                border-2
                shadow-lg
                rounded-2xl
                text-center text-2xl
                font-bold
                leading-7
                text-gray-700
                dark:bg-gray-700
                sm:text-3xl sm:truncate
                py-1
                border-indigo-400
              "
            >
              Editar Datos Cargados
            </h1>
          </div>
          <div v-else class="w-full w-2/2 px-3 mb-6 md:mb-0">
            <div
              class="
                alert
                flex flex-row
                items-center
                bg-yellow-200
                p-5
                rounded
                border-b-2 border-yellow-300
              "
            >
              <div
                class="
                  alert-icon
                  flex
                  items-center
                  bg-yellow-100
                  border-2 border-yellow-500
                  justify-center
                  h-10
                  w-10
                  flex-shrink-0
                  rounded-full
                "
              >
                <span class="text-yellow-500">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path
                      fill-rule="evenodd"
                      d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </span>
              </div>
              <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-yellow-800">
                  Atención
                </div>
                <div class="alert-description text-sm text-yellow-600">
                  Usted no puede editar este formulario. Se encuentra siendo
                  analizado por la Autoridad Minera, pronto recibirá una
                  respuesta.
                </div>
              </div>
            </div>
            <br />
            <h1
              class="
                border-2
                shadow-lg
                rounded-2xl
                text-center text-2xl
                font-bold
                leading-7
                text-gray-700
                dark:bg-gray-700
                sm:text-3xl sm:truncate
                py-1
                border-indigo-400
              "
            >
              Mostrar Datos Cargados
            </h1>
          </div>
        </div>
        <form @submit.prevent="submit" class="mb-8">
          <div class="row">
            <banner></banner>
          </div>
          <!-- <br />
          <hr />
          <br /> -->
          <!-- Delete Account Confirmation Modal -->
          <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
            <template #title>
              {{ modal_tittle }}
            </template>
            <template #content>
              {{ modal_body }}
            </template>
            <template #footer>
              <button @click="closeModal">Ok</button>
            </template>
          </jet-dialog-modal>
          <!-- <div class="flex items-center justify-center">
            <div
              class="
                grid grid-cols-1
                gap-6
                sm:grid-cols-4
                md:grid-cols-7
                lg:grid-cols-7
                xl:grid-cols-7
              "
            > -->
          <!-- 1 card -->
          <!-- <CardProductor
                v-if="$props.mostrar.paso_uno"
                :progreso="form.valor_de_progreso"
                :aprobado="form.valor_de_aprobado"
                :reprobado="form.valor_de_reprobado"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda="false"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
              ></CardProductor>
 -->
          <!-- 2 card -->
          <!-- <CardDomLegal
                v-if="$props.mostrar.paso_dos"
                :progreso="form.valor_de_progreso_dos"
                :aprobado="form.valor_de_aprobado_dos"
                :reprobado="form.valor_de_reprobado_dos"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda="false"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
              ></CardDomLegal> -->
          <!-- 3 card -->
          <!-- <CardDomAdmin
                v-if="$props.mostrar.paso_tres"
                :progreso="form.valor_de_progreso_tres"
                :aprobado="form.valor_de_aprobado_tres"
                :reprobado="form.valor_de_reprobado_tres"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda="false"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
              ></CardDomAdmin> -->
          <!-- 4 card -->
          <!-- <CardMinaUno
                v-if="$props.mostrar.paso_cuatro"
                :progreso="form.valor_de_progreso_cuatro"
                :aprobado="form.valor_de_aprobado_cuatro"
                :reprobado="form.valor_de_reprobado_cuatro"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda="false"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
              ></CardMinaUno> -->
          <!-- 5 card -->
          <!-- <CardMinaDos
                v-if="$props.mostrar.paso_cinco"
                :progreso="form.valor_de_progreso_cinco"
                :aprobado="form.valor_de_aprobado_cinco"
                :reprobado="form.valor_de_reprobado_cinco"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :mostrarayuda="false"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
              ></CardMinaDos> -->
          <!-- <CardMinaUbicacion
                v-if="$props.mostrar.paso_seis"
                :progreso="form.valor_de_progreso_seis"
                :aprobado="form.valor_de_aprobado_seis"
                :reprobado="form.valor_de_reprobado_seis"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
              ></CardMinaUbicacion> -->
          <!-- <CardCatamarca
                v-if="$props.mostrar.paso_catamarca"
                :progreso="form.valor_de_progreso_seis"
                :aprobado="form.valor_de_aprobado_seis"
                :reprobado="form.valor_de_reprobado_seis"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :evaluacion="evaluacion_global"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
              ></CardCatamarca> -->
          <!-- 4 card -->
          <!-- <CardTotal
                v-if="evaluacion_global"
                :progreso="form.valor_de_progreso_seis"
                :aprobado="form.valor_de_aprobado_seis"
                :reprobado="form.valor_de_reprobado_seis"
                :lugar="'Argentina, San Juan'"
                :updated_at="'hace 10 minutos'"
                :clase_sup="'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                :clase_inf="'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
              ></CardTotal> -->
          <!-- </div>
          </div> -->
          <!-- <div class="flex justify-center md:justify-end -mt-16 sticky top-10">
            <a href="#inicio">
              <div class="flex items-center absolute shadow-xl left-8 top-10">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-arrow-up"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"
                  />
                </svg>
              </div>
            </a>
          </div> -->
          <!-- <div class="flex items-center justify-center">
							<CardProductor  
								:progreso="form.valor_de_progreso"
								:aprobado="form.valor_de_aprobado"
								:reprobado="form.valor_de_reprobado" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
							></CardProductor>
					</div> -->
          <!--<div class="flex space-x-8 text-3xl">

						<!- spin ->
						<button class="animate-spin inline-block py-4 px-8 bg-yellow-500 text-yellow-100 rounded-lg">Spin</button>

						<!- ping ->
						<button class="animate-ping inline-block py-4 px-8 bg-blue-500 text-blue-100 rounded-lg">Ping</button>

						<!- pulse ->
						<button class="  inline-block py-4 px-8 bg-red-500 text-red-100 rounded-lg">Pulse</button>

						<!- bounce ->
						<button class="  inline-block py-4 px-8 bg-teal-500 text-teal-100 rounded-lg">Bounce</button>
					</div>-->
          <br />
          <div id="section_productor"></div>
          <PaginaUnoDatosProductores
            v-if="$props.mostrar.paso_uno"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos del Productor'"
            :titulo_pagina="'Datos del Productor'"
            :razon_social="form.razon_social"
            :razon_social_valido="form.razon_social_valido"
            :razon_social_correcto="form.razon_social_correcto"
            :obs_razon_social="form.obs_razon_social"
            :obs_razon_social_valido="form.obs_razon_social_valido"
            :mostrar_razon_social="$props.mostrar.razon_social"
            :desactivar_razon_social="$props.disables.razon_social"
            :mostrar_razon_social_correccion="
              $props.mostrar.razon_social_correccion
            "
            :desactivar_razon_social_correccion="
              $props.disables.razon_social_correccion
            "
            :email="form.email"
            :email_valido="form.email_valido"
            :email_correcto="form.email_correcto"
            :obs_email="form.obs_email"
            :obs_email_valido="form.obs_email_valido"
            :mostrar_email="$props.mostrar.email"
            :desactivar_email="$props.disables.email"
            :mostrar_email_correccion="$props.mostrar.email_correccion"
            :desactivar_email_correccion="$props.disables.email_correccion"
            :cuit="form.cuit"
            :cuit_valido="form.cuit_valido"
            :cuit_correcto="form.cuit_correcto"
            :obs_cuit="form.obs_cuit"
            :obs_cuit_valido="form.obs_cuit_valido"
            :mostrar_cuit="$props.mostrar.cuit"
            :desactivar_cuit="$props.disables.cuit"
            :mostrar_cuit_correccion="$props.mostrar.cuit_correccion"
            :desactivar_cuit_correccion="$props.disables.cuit_correccion"
            :numeroproductor="form.numeroproductor"
            :numeroproductor_valido="form.numeroproductor_valido"
            :numeroproductor_correcto="form.numeroproductor_correcto"
            :obs_numeroproductor="form.obs_numeroproductor"
            :obs_numeroproductor_valido="form.obs_numeroproductor_valido"
            :mostrar_num_prod="$props.mostrar.num_prod"
            :desactivar_num_prod="$props.disables.num_prod"
            :mostrar_num_prod_correccion="$props.mostrar.num_prod_correccion"
            :desactivar_num_prod_correccion="
              $props.disables.num_prod_correccion
            "
            :tiposociedad="form.tiposociedad"
            :tiposociedad_valido="form.tiposociedad_valido"
            :tiposociedad_correcto="form.tiposociedad_correcto"
            :obs_tiposociedad="form.obs_tiposociedad"
            :obs_tiposociedad_valido="form.obs_tiposociedad_valido"
            :mostrar_tipo_sociedad="$props.mostrar.tipo_sociedad"
            :desactivar_tipo_sociedad="$props.disables.tipo_sociedad"
            :mostrar_tipo_sociedad_correccion="
              $props.mostrar.num_prod_correccion
            "
            :desactivar_tipo_sociedad_correccion="
              $props.disables.num_prod_correccion
            "
            :inscripciondgr="form.inscripciondgr"
            :inscripciondgr_valido="form.inscripciondgr_valido"
            :inscripciondgr_correcto="form.inscripciondgr_correcto"
            :obs_inscripciondgr="form.obs_inscripciondgr"
            :obs_inscripciondgr_valido="form.obs_inscripciondgr_valido"
            :mostrar_inscripcion_dgr="$props.mostrar.inscripcion_dgr"
            :desactivar_inscripcion_dgr="$props.disables.inscripcion_dgr"
            :mostrar_inscripcion_dgr_correccion="
              $props.mostrar.inscripcion_dgr_correccion
            "
            :desactivar_inscripcion_dgr_correccion="
              $props.disables.inscripcion_dgr_correccion
            "
            :constanciasociedad="form.constaciasociedad"
            :constanciasociedad_valido="form.constaciasociedad_valido"
            :constanciasociedad_correcto="form.constaciasociedad_correcto"
            :obs_constanciasociedad="form.obs_constaciasociedad"
            :obs_constanciasociedad_valido="form.obs_constaciasociedad_valido"
            :mostrar_constancia_sociedad="$props.mostrar.constancia_sociedad"
            :desactivar_constancia_sociedad="
              $props.disables.constancia_sociedad
            "
            :mostrar_constancia_sociedad_correccion="
              $props.mostrar.cosntancia_sociedad_correccion
            "
            :desactivar_constancia_sociedad_correccion="
              $props.disables.cosntancia_sociedad_correccion
            "
            :mostrar_boton_guardar_uno="$props.mostrar.boton_guardar_uno"
            :desactivar_boton_guardar_uno="$props.disables.boton_guardar_uno"
            :evaluacion="evaluacion_global"
            :testing="testing_global"
            :id="$props.productor.id"
            v-on:ChangeRazonSocialEvaluacion="
              update_razon_social_evaluacion($event)
            "
            v-on:ChangeCuitEvaluacion="update_cuit_evaluacion($event)"
            v-on:ChangeNumProdEvaluacion="update_num_prod_evaluacion($event)"
            v-on:ChangeTipoSociedadEvaluacion="
              update_tipo_sociedad_evaluacion($event)
            "
            v-on:ChangeInscripcionDGREvaluacion="
              update_inscripcion_dgr_evaluacion($event)
            "
            v-on:ChangeConstanciaSociedadEvaluacion="
              update_constancia_sociedad_evaluacion($event)
            "
          >
          </PaginaUnoDatosProductores>
          <div id="section_domicilio_legal"></div>
          <PaginaDosDatosDomLegal
            v-if="$props.mostrar.paso_dos"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'Volver'"
            :titulo_boton_guardar="'Guardar Datos del Domicilio Legal'"
            :titulo_pagina="'Domicilio Legal'"
            :leal_calle="form.leal_calle"
            :nombre_calle_legal_valido="form.nombre_calle_legal_valido"
            :nombre_calle_legal_correcto="form.nombre_calle_legal_correcto"
            :obs_nombre_calle_legal="form.obs_nombre_calle_legal"
            :obs_nombre_calle_legal_valido="form.obs_nombre_calle_legal_valido"
            :mostrar_calle_legal="$props.mostrar.legal_calle"
            :desactivar_calle_legal="$props.disables.legal_calle"
            :mostrar_calle_legal_correccion="
              $props.mostrar.legal_calle_correccion
            "
            :desactivar_calle_legal_correccion="
              $props.disables.legal_calle_correccion
            "
            :leal_numero="form.leal_numero"
            :leal_numero_valido="form.leal_numero_valido"
            :leal_numero_correcto="form.leal_numero_correcto"
            :obs_leal_numero="form.obs_leal_numero"
            :obs_leal_numero_valido="form.obs_leal_numero_valido"
            :mostrar_legal_calle_num="$props.mostrar.legal_calle_num"
            :desactivar_legal_calle_num="$props.disables.legal_calle_num"
            :mostrar_legal_calle_num_correccion="
              $props.mostrar.legal_calle_num_correccion
            "
            :desactivar_legal_calle_num_correccion="
              $props.disables.legal_calle_num_correccion
            "
            :leal_telefono="form.leal_telefono"
            :leal_telefono_valido="form.leal_telefono_valido"
            :leal_telefono_correcto="form.leal_telefono_correcto"
            :obs_leal_telefono="form.obs_leal_telefono"
            :obs_leal_telefono_valido="form.obs_leal_telefono_valido"
            :mostrar_legal_telefono="$props.mostrar.legal_telefono"
            :desactivar_legal_telefono="$props.disables.legal_telefono"
            :mostrar_legal_telefono_correccion="
              $props.mostrar.legal_telefono_correccion
            "
            :desactivar_legal_telefono_correccion="
              $props.disables.legal_telefono_correccion
            "
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
            :mostrar_legal_prov="$props.mostrar.legal_prov"
            :desactivar_legal_prov="$props.disables.legal_prov"
            :mostrar_legal_prov_correccion="
              $props.mostrar.legal_prov_correccion
            "
            :desactivar_legal_prov_correccion="
              $props.disables.legal_prov_correccion
            "
            :leal_departamento="form.leal_departamento"
            :leal_departamento_valido="form.leal_departamento_valido"
            :leal_departamento_correcto="form.leal_departamento_correcto"
            :obs_leal_departamento="form.obs_leal_departamento"
            :obs_leal_departamento_valido="form.obs_leal_departamento_valido"
            :mostrar_legal_dpto="$props.mostrar.legal_dpto"
            :desactivar_legal_dpto="$props.disables.legal_dpto"
            :mostrar_legal_dpto_correccion="
              $props.mostrar.legal_dpto_correccion
            "
            :desactivar_legal_dpto_correccion="
              $props.disables.legal_dpto_correccion
            "
            :leal_localidad="form.leal_localidad"
            :leal_localidad_valido="form.leal_localidad_valido"
            :leal_localidad_correcto="form.leal_localidad_correcto"
            :obs_leal_localidad="form.obs_leal_localidad"
            :obs_leal_localidad_valido="form.obs_leal_localidad_valido"
            :mostrar_legal_localidad="$props.mostrar.legal_localidad"
            :desactivar_legal_localidad="$props.disables.legal_localidad"
            :mostrar_legal_localidad_correccion="
              $props.mostrar.legal_localidad_correccion
            "
            :desactivar_legal_localidad_correccion="
              $props.disables.legal_localidad_correccion
            "
            :leal_cp="form.leal_cp"
            :leal_cp_valido="form.leal_cp_valido"
            :leal_cp_correcto="form.leal_cp_correcto"
            :obs_leal_cp="form.obs_leal_cp"
            :obs_leal_cp_valido="form.obs_leal_cp_valido"
            :mostrar_legal_cod_pos="$props.mostrar.legal_cod_pos"
            :desactivar_legal_cod_pos="$props.disables.legal_cod_pos"
            :mostrar_legal_cod_pos_correccion="
              $props.mostrar.legal_cod_pos_correccion
            "
            :desactivar_legal_cod_pos_correccion="
              $props.disables.legal_cod_pos_correccion
            "
            :leal_otro="form.leal_otro"
            :leal_otro_valido="form.leal_otro_valido"
            :leal_otro_correcto="form.leal_otro_correcto"
            :obs_leal_otro="form.obs_leal_otro"
            :obs_leal_otro_valido="form.obs_leal_otro_valido"
            :mostrar_legal_otro="$props.mostrar.legal_otro"
            :desactivar_legal_otro="$props.disables.legal_otro"
            :mostrar_legal_otro_correccion="
              $props.mostrar.legal_otro_correccion
            "
            :desactivar_legal_otro_correccion="
              $props.disables.legal_otro_correccion
            "
            :donde_estoy="'legal'"
            :lista_provincias="lista_provincias"
            :lista_dptos="lista_dptos_legal"
            :mostrar_boton_guardar_dos="$props.mostrar.boton_guardar_dos"
            :desactivar_boton_guardar_dos="$props.disables.boton_guardar_dos"
            :evaluacion="evaluacion_global"
            :testing="testing_global"
            :id="$props.productor.id"
          >
          </PaginaDosDatosDomLegal>
          <!-- <div class="flex items-center justify-center">
            <CardDomLegal  
							:progreso="form.valor_de_progreso_dos"
							:aprobado="form.valor_de_aprobado_dos"
							:reprobado="form.valor_de_reprobado_dos" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardDomLegal>
          </div> -->
          <!-- <div class="flex items-center justify-center">
            <CardDomAdmin  
					:progreso="form.valor_de_progreso_tres"
					:aprobado="form.valor_de_aprobado_tres"
					:reprobado="form.valor_de_reprobado_tres" 
					:lugar="'Argentina, San Juan'"
					:updated_at="'hace 10 minutos'"
					:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
					:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
				></CardDomAdmin>
          </div> -->
          <div id="section_domicilio_administrativo"></div>
          <PaginaDosDatosDomLegal
            v-if="$props.mostrar.paso_tres"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'Volver'"
            :titulo_boton_guardar="'Guardar Datos del Domicilio Administrativo'"
            :titulo_pagina="'Domicilio Administrativo'"
            :leal_calle="form.administracion_calle"
            :nombre_calle_legal_valido="form.administracion_calle_valido"
            :nombre_calle_legal_correcto="form.administracion_calle_correcto"
            :obs_nombre_calle_legal="form.obs_administracion_calle_nombre"
            :obs_nombre_calle_legal_valido="
              form.obs_administracion_calle_nombre_valido
            "
            :mostrar_calle_legal="$props.mostrar.administracion_calle"
            :desactivar_calle_legal="$props.disables.administracion_calle"
            :mostrar_calle_legal_correccion="
              $props.mostrar.administracion_correccion
            "
            :desactivar_calle_legal_correccion="
              $props.disables.administracion_correccion
            "
            :leal_numero="form.administracion_numero"
            :leal_numero_valido="form.administracion_numero_valido"
            :leal_numero_correcto="form.administracion_numero_correcto"
            :obs_leal_numero="form.obs_administracion_numero_nombre"
            :obs_leal_numero_valido="
              form.obs_administracion_numero_nombre_valido
            "
            :mostrar_legal_calle_num="$props.mostrar.administracion_calle_num"
            :desactivar_legal_calle_num="
              $props.disables.administracion_calle_num
            "
            :mostrar_legal_calle_num_correccion="
              $props.mostrar.administracion_calle_num_correccion
            "
            :desactivar_legal_calle_num_correccion="
              $props.disables.administracion_calle_num_correccion
            "
            :leal_telefono="form.administracion_telefono"
            :leal_telefono_valido="form.administracion_telefono_valido"
            :leal_telefono_correcto="form.administracion_telefono_correcto"
            :obs_leal_telefono="form.obs_administracion_telefono_nombre"
            :obs_leal_telefono_valido="
              form.obs_administracion_telefono_nombre_valido
            "
            :mostrar_legal_telefono="$props.mostrar.administracion_telefono"
            :desactivar_legal_telefono="$props.disables.administracion_telefono"
            :mostrar_legal_telefono_correccion="
              $props.mostrar.legal_telefono_correccion
            "
            :desactivar_legal_telefono_correccion="
              $props.disables.administracion_telefono_correccion
            "
            :leal_pais="form.administracion_pais"
            :leal_pais_valido="form.administracion_pais_valido"
            :leal_pais_correcto="form.administracion_pais_correcto"
            :obs_leal_pais="form.obs_administracion_pais"
            :obs_leal_pais_valido="form.obs_administracion_pais_valido"
            :leal_provincia="form.administracion_provincia"
            :leal_provincia_valido="form.administracion_provincia_valido"
            :leal_provincia_correcto="form.administracion_provincia_correcto"
            :obs_leal_provincia="form.obs_administracion_provincia"
            :obs_leal_provincia_valido="
              form.obs_administracion_provincia_valido
            "
            :mostrar_legal_prov="$props.mostrar.administracion_prov"
            :desactivar_legal_prov="$props.disables.administracion_prov"
            :mostrar_legal_prov_correccion="
              $props.mostrar.administracion_prov_correccion
            "
            :desactivar_legal_prov_correccion="
              $props.disables.administracion_prov_correccion
            "
            :leal_departamento="form.administracion_departamento"
            :leal_departamento_valido="form.administracion_departamento_valido"
            :leal_departamento_correcto="
              form.administracion_departamento_correcto
            "
            :obs_leal_departamento="form.obs_administracion_departamento"
            :obs_leal_departamento_valido="
              form.obs_administracion_departamento_valido
            "
            :mostrar_legal_dpto="$props.mostrar.administracion_dpto"
            :desactivar_legal_dpto="$props.disables.administracion_dpto"
            :mostrar_legal_dpto_correccion="
              $props.mostrar.administracion_dpto_correccion
            "
            :desactivar_legal_dpto_correccion="
              $props.disables.administracion_dpto_correccion
            "
            :leal_localidad="form.administracion_localidad"
            :leal_localidad_valido="form.administracion_localidad_valido"
            :leal_localidad_correcto="form.administracion_localidad_correcto"
            :obs_leal_localidad="form.obs_administracion_localidad"
            :obs_leal_localidad_valido="
              form.obs_administracion_localidad_valido
            "
            :mostrar_legal_localidad="$props.mostrar.administracion_localidad"
            :desactivar_legal_localidad="
              $props.disables.administracion_localidad
            "
            :mostrar_legal_localidad_correccion="
              $props.mostrar.administracion_localidad_correccion
            "
            :desactivar_legal_localidad_correccion="
              $props.disables.administracion_localidad_correccion
            "
            :leal_cp="form.administracion_cp"
            :leal_cp_valido="form.administracion_cp_valido"
            :leal_cp_correcto="form.administracion_cp_correcto"
            :obs_leal_cp="form.obs_administracion_cp"
            :obs_leal_cp_valido="form.obs_administracion_cp_valido"
            :mostrar_legal_cod_pos="$props.mostrar.administracion_cod_pos"
            :desactivar_legal_cod_pos="$props.disables.administracion_cod_pos"
            :mostrar_legal_cod_pos_correccion="
              $props.mostrar.administracion_cod_pos_correccion
            "
            :desactivar_legal_cod_pos_correccion="
              $props.disables.administracion_cod_pos_correccion
            "
            :leal_otro="form.administracion_otro"
            :leal_otro_valido="form.administracion_otro_valido"
            :leal_otro_correcto="form.administracion_otro_correcto"
            :obs_leal_otro="form.obs_administracion_otro"
            :obs_leal_otro_valido="form.obs_administracion_otro_valido"
            :mostrar_legal_otro="$props.mostrar.administracion_otro"
            :desactivar_legal_otro="$props.disables.administracion_otro"
            :mostrar_legal_otro_correccion="
              $props.mostrar.administracion_otro_correccion
            "
            :desactivar_legal_otro_correccion="
              $props.disables.administracion_otro_correccion
            "
            :donde_estoy="'administrativo'"
            :lista_provincias="lista_provincias"
            :lista_dptos="lista_dptos_admin"
            :mostrar_boton_guardar_dos="$props.mostrar.boton_guardar_tres"
            :desactivar_boton_guardar_dos="$props.disables.boton_guardar_tres"
            :evaluacion="evaluacion_global"
            :testing="testing_global"
            :id="$props.productor.id"
          >
          </PaginaDosDatosDomLegal>
          <!-- <div class="flex items-center justify-center">
            <CardMinaUno  
					:progreso="form.valor_de_progreso_cuatro"
					:aprobado="form.valor_de_aprobado_cuatro"
					:reprobado="form.valor_de_reprobado_cuatro" 
					:lugar="'Argentina, San Juan'"
					:updated_at="'hace 10 minutos'"
					:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
					:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
				></CardMinaUno>
          </div> -->
          <div id="section_mina_uno"></div>
          <PaginaCuatroDatosMinaUno
            v-if="$props.mostrar.paso_cuatro"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de Mina Primer Parte'"
            :titulo_pagina="'Datos de Mina Primera Parte'"
            :numero_expdiente="form.numero_expdiente"
            :numero_expdiente_valido="form.numero_expdiente_valido"
            :numero_expdiente_correcto="form.numero_expdiente_correcto"
            :obs_numero_expdiente="form.obs_numero_expdiente"
            :obs_numero_expdiente_valido="form.obs_numero_expdiente_valido"
            :mostrar_num_exp="$props.mostrar.num_exp"
            :desactivar_num_exp="$props.disables.num_exp"
            :mostrar_num_exp_correccion="$props.mostrar.num_exp_correccion"
            :desactivar_num_exp_correccion="$props.disables.num_exp_correccion"
            :categoria="form.categoria"
            :categoria_validacion="form.categoria_validacion"
            :categoria_correcto="form.categoria_correcto"
            :obs_categoria="form.obs_categoria"
            :obs_categoria_valido="form.obs_categoria_valido"
            :mostrar_categoria="$props.mostrar.categoria"
            :desactivar_categoria="$props.disables.categoria"
            :mostrar_categoria_correccion="$props.mostrar.categoria_correccion"
            :desactivar_categoria_correccion="
              $props.disables.categoria_correccion
            "
            :nombre_mina="form.nombre_mina"
            :nombre_mina_validacion="form.nombre_mina_validacion"
            :nombre_mina_correcto="form.nombre_mina_correcto"
            :obs_nombre_mina="form.obs_nombre_mina"
            :obs_nombre_mina_valido="form.obs_nombre_mina_valido"
            :mostrar_nombre_mina="$props.mostrar.nombre_mina"
            :desactivar_nombre_mina="$props.disables.nombre_mina"
            :mostrar_nombre_mina_correccion="
              $props.mostrar.nombre_mina_correccion
            "
            :desactivar_nombre_mina_correccion="
              $props.disables.nombre_mina_correccion
            "
            :descripcion_mina="form.descripcion_mina"
            :descripcion_mina_validacion="form.descripcion_mina_validacion"
            :descripcion_mina_correcto="form.descripcion_mina_correcto"
            :obs_descripcion_mina="form.obs_descripcion_mina"
            :obs_descripcion_mina_valido="form.obs_descripcion_mina_valido"
            :mostrar_descripcion_mina="$props.mostrar.descripcion_mina"
            :desactivar_descripcion_mina="$props.disables.descripcion_mina"
            :mostrar_descripcion_mina_correccion="
              $props.mostrar.descripcion_correccion
            "
            :desactivar_descripcion_mina_correccion="
              $props.disables.descripcion_correccion
            "
            :distrito_minero="form.distrito_minero"
            :distrito_minero_validacion="form.distrito_minero_validacion"
            :distrito_minero_correcto="form.distrito_minero_correcto"
            :obs_distrito_minero="form.obs_distrito_minero"
            :obs_distrito_minero_valido="form.obs_distrito_minero_valido"
            :mostrar_distrito="$props.mostrar.distrito"
            :desactivar_distrito="$props.disables.distrito"
            :mostrar_distrito_correccion="$props.mostrar.distrito_correccion"
            :desactivar_distrito_correccion="
              $props.disables.distrito_correccion
            "
            :mina_cantera="form.mina_cantera"
            :mina_cantera_validacion="form.mina_cantera_validacion"
            :mina_cantera_correcto="form.mina_cantera_correcto"
            :obs_mina_cantera="form.obs_mina_cantera"
            :obs_mina_cantera_valido="form.obs_mina_cantera_valido"
            :plano_inmueble="form.plano_inmueble"
            :plano_inmueble_validacion="form.plano_inmueble_validacion"
            :plano_inmueble_correcto="form.plano_inmueble_correcto"
            :obs_plano_inmueble="form.obs_plano_inmueble"
            :obs_plano_inmueble_valido="form.obs_plano_inmueble_valido"
            :mostrar_plano_mina="$props.mostrar.plano_mina"
            :desactivar_plano_mina="$props.disables.plano_mina"
            :mostrar_plano_mina_correccion="
              $props.mostrar.plano_mina_correccion
            "
            :desactivar_plano_mina_correccion="
              $props.disables.plano_mina_correccion
            "
            :minerales_variedad="form.minerales_variedad"
            :minerales_variedad_validacion="form.minerales_variedad_validacion"
            :minerales_variedad_correcto="form.minerales_variedad_correcto"
            :obs_minerales_variedad="form.obs_minerales_variedad"
            :obs_minerales_variedad_valido="form.obs_minerales_variedad_valido"
            :mostrar_minerales="$props.mostrar.minerales"
            :desactivar_minerales="$props.disables.minerales"
            :mostrar_minerales_correccion="$props.mostrar.minerales_correccion"
            :desactivar_minerales_correccion="
              $props.disables.minerales_correccion
            "
            :resolucion_concesion_minera="form.resolucion_concesion_minera"
            :resolucion_concesion_minera_validacion="
              form.resolucion_concesion_minera_validacion
            "
            :resolucion_concesion_minera_correcto="
              form.resolucion_concesion_minera_correcto
            "
            :obs_resolucion_concesion_minera="
              form.obs_resolucion_concesion_minera
            "
            :obs_resolucion_concesion_minera_valido="
              form.obs_resolucion_concesion_minera_valido
            "
            :mostrar_resolucion_concesion="$props.mostrar.resolucion_concesion"
            :desactivar_resolucion_concesion="
              $props.disables.resolucion_concesion
            "
            :mostrar_resolucion_concesion_correccion="
              $props.mostrar.resolucion_concesion_correccion
            "
            :desactivar_resolucion_concesion_correccion="
              $props.disables.resolucion_concesion_correccion
            "
            :titulo_contrato_posecion="form.titulo_contrato_posecion"
            :titulo_contrato_posecion_validacion="
              form.titulo_contrato_posecion_validacion
            "
            :titulo_contrato_posecion_correcto="
              form.titulo_contrato_posecion_correcto
            "
            :obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
            :obs_titulo_contrato_posecion_valido="
              form.obs_titulo_contrato_posecion_valido
            "
            :mostrar_titulo="$props.mostrar.titulo"
            :desactivar_titulo="$props.disables.titulo"
            :mostrar_titulo_correccion="$props.mostrar.titulo_correccion"
            :desactivar_titulo_correccion="$props.disables.titulo_correccion"
            :lista_minerales_desde_back="lista_de_minerales_del_back"
            :mostrar_boton_guardar_cuatro="$props.mostrar.boton_guardar_cuatro"
            :desactivar_boton_guardar_cuatro="
              $props.disables.boton_guardar_cuatro
            "
            :evaluacion="evaluacion_global"
            :id="$props.productor.id"
            :testing="testing_global"
          >
          </PaginaCuatroDatosMinaUno>
          <!-- <div class="flex items-center justify-center">
            <CardMinaDos  
							:progreso="form.valor_de_progreso_cinco"
							:aprobado="form.valor_de_aprobado_cinco"
							:reprobado="form.valor_de_reprobado_cinco" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardMinaDos>
          </div> -->
          <div id="section_datos_mina_dos"></div>
          <PaginaCincoDatosMinaDos
            v-if="$props.mostrar.paso_cinco"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de Mina Segunda Parte'"
            :titulo_pagina="'Datos de Mina Segunda Parte'"
            :owner="form.owner"
            :owner_correcto="form.owner_correcto"
            :obs_owner="form.obs_owner"
            :obs_owner_valido="form.obs_owner_valido"
            :mostrar_owner="$props.mostrar.owner"
            :desactivar_owner="$props.disables.owner"
            :mostrar_owner_correccion="$props.mostrar.owner_correccion"
            :desactivar_owner_correccion="$props.disables.owner_correccion"
            :arrendatario="form.arrendatario"
            :arrendatario_correcto="form.arrendatario_correcto"
            :obs_arrendatario="form.obs_arrendatario"
            :obs_arrendatario_valido="form.obs_arrendatario_valido"
            :mostrar_arrendatario="$props.mostrar.concesionario"
            :desactivar_arrendatario="$props.disables.concesionario"
            :mostrar_arrendatario_correccion="
              $props.mostrar.concesionario_correccion
            "
            :desactivar_arrendatario_correccion="
              $props.disables.concesionario_correccion
            "
            :concesionario="form.concesionario"
            :concesionario_correcto="form.concesionario_correcto"
            :obs_concesionario="form.obs_concesionario"
            :obs_concesionario_valido="form.obs_concesionario_valido"
            :mostrar_concesionario="$props.mostrar.arrendatario"
            :desactivar_concesionario="$props.disables.arrendatario"
            :mostrar_concesionario_correccion="
              $props.mostrar.arrendatario_correccion
            "
            :desactivar_concesionario_correccion="
              $props.disables.arrendatario_correccion
            "
            :otros="form.otros"
            :otros_correcto="form.otros_correcto"
            :obs_otros="form.obs_otros"
            :obs_otros_valido="form.obs_otros_valido"
            :otros_input="form.otros_input"
            :otros_input_valido="form.otros_input_valido"
            :mostrar_otros="$props.mostrar.otros"
            :desactivar_otros="$props.disables.otros"
            :mostrar_otros_correccion="$props.mostrar.otros_correccion"
            :desactivar_otros_correccion="$props.disables.otros_correccion"
            :sustancias="form.sustancias"
            :sustancias_correcto="form.sustancias_correcto"
            :obs_sustancias="form.obs_sustancias"
            :obs_sustancias_valido="form.obs_sustancias_valido"
            :sustancias_input="form.sustancias_input"
            :sustancias_input_valido="form.sustancias_input_valido"
            :mostrar_sustancias="$props.mostrar.sustancias"
            :desactivar_sustancias="$props.disables.sustancias"
            :mostrar_sustancias_correccion="
              $props.mostrar.sustancias_correccion
            "
            :desactivar_sustancias_correccion="
              $props.disables.sustancias_correccion
            "
            :titulo_contrato_posecion="form.titulo_contrato_posecion"
            :titulo_contrato_posecion_validacion="
              form.titulo_contrato_posecion_validacion
            "
            :titulo_contrato_posecion_correcto="
              form.titulo_contrato_posecion_correcto
            "
            :obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
            :obs_titulo_contrato_posecion_valido="
              form.obs_titulo_contrato_posecion_valido
            "
            :mostrar_titulo="$props.mostrar.titulo"
            :desactivar_titulo="$props.disables.titulo"
            :mostrar_titulo_correccion="$props.mostrar.titulo_correccion"
            :desactivar_titulo_correccion="$props.disables.titulo_correccion"
            :resolucion_concesion_minera="form.resolucion_concesion_minera"
            :resolucion_concesion_minera_validacion="
              form.resolucion_concesion_minera_validacion
            "
            :resolucion_concesion_minera_correcto="
              form.resolucion_concesion_minera_correcto
            "
            :obs_resolucion_concesion_minera="
              form.obs_resolucion_concesion_minera
            "
            :obs_resolucion_concesion_minera_valido="
              form.obs_resolucion_concesion_minera_valido
            "
            :mostrar_concesion="$props.mostrar.concesion"
            :desactivar_concesion="$props.disables.concesion"
            :mostrar_concesion_correccion="$props.mostrar.concesion_correccion"
            :desactivar_concesion_correccion="
              $props.disables.concesion_correccion
            "
            :constancia_pago_canon="form.constancia_pago_canon"
            :constancia_pago_canon_validacion="
              form.constancia_pago_canon_validacion
            "
            :constancia_pago_canon_correcto="
              form.constancia_pago_canon_correcto
            "
            :obs_constancia_pago_canon="form.obs_constancia_pago_canon"
            :obs_constancia_pago_canon_valido="
              form.obs_constancia_pago_canon_valido
            "
            :mostrar_contancias_canon="$props.mostrar.contancias_canon"
            :desactivar_contancias_canon="$props.disables.contancias_canon"
            :mostrar_contancias_canon_correccion="
              $props.mostrar.constancias_canon_correccion
            "
            :desactivar_contancias_canon_correccion="
              $props.disables.constancias_canon_correccion
            "
            :iia="form.iia"
            :iia_canon_validacion="form.iia_canon_validacion"
            :iia_correcto="form.iia_correcto"
            :obs_iia_canon="form.obs_iia_canon"
            :obs_iia_canon_valido="form.obs_iia_canon_valido"
            :mostrar_iia="$props.mostrar.iia"
            :desactivar_iia="$props.disables.iia"
            :mostrar_iia_correccion="$props.mostrar.iia_correccion"
            :desactivar_iia_correccion="$props.disables.iia_correccion"
            :dia="form.dia"
            :dia_canon_validacion="form.dia_canon_validacion"
            :dia_correcto="form.dia_correcto"
            :obs_dia_canon="form.obs_dia_canon"
            :obs_dia_canon_valido="form.obs_dia_canon_valido"
            :mostrar_dia="$props.mostrar.dia"
            :desactivar_dia="$props.disables.dia"
            :mostrar_dia_correccion="$props.mostrar.dia_correccion"
            :desactivar_dia_correccion="$props.disables.dia_correccion"
            :acciones_a_desarrollar="form.acciones_a_desarrollar"
            :acciones_a_desarrollar_validacion="
              form.acciones_a_desarrollar_validacion
            "
            :acciones_a_desarrollar_correcto="
              form.acciones_a_desarrollar_correcto
            "
            :obs_acciones_a_desarrollar="form.obs_acciones_a_desarrollar"
            :obs_acciones_a_desarrollar_valido="
              form.obs_acciones_a_desarrollar_valido
            "
            :mostrar_acciones="$props.mostrar.acciones"
            :desactivar_acciones="$props.disables.acciones"
            :mostrar_acciones_correccion="$props.mostrar.acciones_correccion"
            :desactivar_acciones_correccion="
              $props.disables.acciones_correccion
            "
            :actividad="form.actividad"
            :actividad_a_desarrollar_validacion="
              form.actividad_a_desarrollar_validacion
            "
            :actividad_a_desarrollar_correcto="
              form.actividad_a_desarrollar_correcto
            "
            :obs_actividad_a_desarrollar="form.obs_actividad_a_desarrollar"
            :obs_actividad_a_desarrollar_valido="
              form.obs_actividad_a_desarrollar_valido
            "
            :mostrar_actividad="$props.mostrar.actividades"
            :desactivar_actividad="$props.disables.actividad"
            :mostrar_actividad_correccion="$props.mostrar.actividad_correccion"
            :desactivar_actividad_correccion="
              $props.disables.actividad_correccion
            "
            :fecha_alta_dia="form.fecha_alta_dia"
            :fecha_alta_dia_validacion="form.fecha_alta_dia_validacion"
            :fecha_alta_dia_correcto="form.fecha_alta_dia_correcto"
            :obs_fecha_alta_dia="form.obs_fecha_alta_dia"
            :obs_fecha_alta_dia_valido="form.obs_fecha_alta_dia_valido"
            :mostrar_fecha_alta_dia="$props.mostrar.fecha_alta_dia"
            :desactivar_fecha_alta_dia="$props.disables.fecha_alta_dia"
            :mostrar_fecha_alta_dia_correccion="
              $props.mostrar.fecha_alta_dia_correccion
            "
            :desactivar_fecha_alta_dia_correccion="
              $props.disables.fecha_alta_dia_correccion
            "
            :fecha_vencimiento_dia="form.fecha_vencimiento_dia"
            :fecha_vencimiento_dia_validacion="
              form.fecha_vencimiento_dia_validacion
            "
            :fecha_vencimiento_dia_correcto="
              form.fecha_vencimiento_dia_correcto
            "
            :obs_fecha_vencimiento_dia="form.obs_fecha_vencimiento_dia"
            :obs_fecha_vencimiento_dia_valido="
              form.obs_fecha_vencimiento_dia_valido
            "
            :mostrar_fecha_vencimiento_dia="
              $props.mostrar.fecha_vencimiento_dia
            "
            :desactivar_fecha_vencimiento_dia="
              $props.disables.fecha_vencimiento_dia
            "
            :mostrar_fecha_vencimiento_dia_correccion="
              $props.mostrar.fecha_vencimiento_dia_correccion
            "
            :desactivar_fecha_vencimiento_dia_correccion="
              $props.disables.fecha_vencimiento_dia_correccion
            "
            :mostrar_boton_guardar_cinco="$props.mostrar.boton_guardar_cinco"
            :desactivar_boton_guardar_cinco="
              $props.disables.boton_guardar_cinco
            "
            :evaluacion="evaluacion_global"
            :id="$props.productor.id"
            :testing="testing_global"
          >
          </PaginaCincoDatosMinaDos>
          <!-- <div class="flex flex-col mb-8">
				<button
					type="button"
					class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
					@click="guardar_avances_cinco"
				>
					Guardar: Datos de la Mina o Cantera (2)
				</button>
				
				<a :href="route('productors.index')"><button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">Volver</button></a>
			</div> -->
          <div id="section_datos_mina_ubicacion"></div>
          <PaginaSeisDatosUbicacionMina
            v-if="$props.mostrar.paso_seis"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de Ubicacion de la Mina'"
            :titulo_pagina="'Pagina datos de Ubicacion de la Mina'"
            :localidad_mina_pais="form.localidad_mina_pais"
            :localidad_mina_pais_validacion="
              form.localidad_mina_pais_validacion
            "
            :localidad_mina_pais_correcto="form.localidad_mina_pais_correcto"
            :obs_localidad_mina_pais="form.obs_localidad_mina_pais"
            :obs_localidad_mina_pais_valido="
              form.obs_localidad_mina_pais_valido
            "
            :localidad_mina_provincia="form.localidad_mina_provincia"
            :localidad_mina_provincia_validacion="
              form.localidad_mina_provincia_validacion
            "
            :localidad_mina_provincia_correcto="
              form.localidad_mina_provincia_correcto
            "
            :obs_localidad_mina_provincia="form.obs_localidad_mina_provincia"
            :obs_localidad_mina_provincia_valido="
              form.obs_localidad_mina_provincia_valido
            "
            :mostrar_ubicacion_prov="$props.mostrar.ubicacion_prov"
            :desactivar_ubicacion_prov="$props.disables.ubicacion_prov"
            :mostrar_ubicacion_prov_correccion="
              $props.mostrar.ubicacion_prov_correccion
            "
            :desactivar_ubicacion_prov_correccion="
              $props.disables.ubicacion_prov_correccion
            "
            :localidad_mina_departamento="form.localidad_mina_departamento"
            :localidad_mina_departamento_validacion="
              form.localidad_mina_departamento_validacion
            "
            :localidad_mina_departamento_correcto="
              form.localidad_mina_departamento_correcto
            "
            :obs_localidad_mina_departamento="
              form.obs_localidad_mina_departamento
            "
            :obs_localidad_mina_departamento_valido="
              form.obs_localidad_mina_departamento_valido
            "
            :mostrar_ubicacion_dpto="$props.mostrar.ubicacion_dpto"
            :desactivar_ubicacion_dpto="$props.disables.ubicacion_dpto"
            :mostrar_ubicacion_dpto_correccion="
              $props.mostrar.ubicacion_dpto_correccion
            "
            :desactivar_ubicacion_dpto_correccion="
              $props.disables.ubicacion_dpto_correccion
            "
            :localidad_mina_localidad="form.localidad_mina_localidad"
            :localidad_mina_localidad_validacion="
              form.localidad_mina_localidad_validacion
            "
            :localidad_mina_localidad_correcto="
              form.localidad_mina_localidad_correcto
            "
            :obs_localidad_mina_localidad="form.obs_localidad_mina_localidad"
            :obs_localidad_mina_localidad_valido="
              form.obs_localidad_mina_localidad_valido
            "
            :mostrar_ubicacion_localidad="$props.mostrar.ubicacion_localidad"
            :desactivar_ubicacion_localidad="
              $props.disables.ubicacion_localidad
            "
            :mostrar_ubicacion_localidad_correccion="
              $props.mostrar.ubicacion_localidad_correccion
            "
            :desactivar_ubicacion_localidad_correccion="
              $props.disables.ubicacion_localidad_correccion
            "
            :tipo_sistema="form.tipo_sistema"
            :tipo_sistema_validacion="form.tipo_sistema_validacion"
            :tipo_sistema_correcto="form.tipo_sistema_correcto"
            :obs_tipo_sistema="form.obs_tipo_sistema"
            :obs_tipo_sistema_valido="form.obs_tipo_sistema_valido"
            :mostrar_ubicacion_sistema="$props.mostrar.ubicacion_sistema"
            :desactivar_ubicacion_sistema="$props.disables.ubicacion_sistema"
            :mostrar_ubicacion_sistema_correccion="
              $props.mostrar.ubicacion_sistema_correccion
            "
            :desactivar_ubicacion_sistema_correccion="
              $props.disables.ubicacion_sistema_correccion
            "
            :latitud="form.latitud"
            :latitud_validacion="form.latitud_validacion"
            :latitud_correcto="form.latitud_correcto"
            :obs_latitud="form.obs_latitud"
            :obs_latitud_valido="form.obs_latitud_valido"
            :mostrar_ubicacion_latitud="$props.mostrar.ubicacion_latitud"
            :desactivar_ubicacion_latitud="$props.disables.ubicacion_latitud"
            :mostrar_ubicacion_latitud_correccion="
              $props.mostrar.ubicacion_latitud_correccion
            "
            :desactivar_ubicacion_latitud_correccion="
              $props.disables.ubicacion_latitud_correccion
            "
            :longitud="form.longitud"
            :longitud_validacion="form.longitud_validacion"
            :longitud_correcto="form.longitud_correcto"
            :obs_longitud="form.obs_longitud"
            :obs_longitud_valido="form.obs_longitud_valido"
            :mostrar_ubicacion_long="$props.mostrar.ubicacion_long"
            :desactivar_ubicacion_long="$props.disables.ubicacion_long"
            :mostrar_ubicacion_long_correccion="
              $props.mostrar.ubicacion_long_correccion
            "
            :desactivar_ubicacion_long_correccion="
              $props.disables.ubicacion_long_correccion
            "
            :lista_provincias="lista_provincias"
            :lista_dptos="lista_dptos_mina"
            :mostrar_boton_guardar_seis="$props.mostrar.boton_guardar_seis"
            :desactivar_boton_guardar_seis="$props.disables.boton_guardar_seis"
            :evaluacion="evaluacion_global"
            :id="$props.productor.id"
            :testing="testing_global"
          >
          </PaginaSeisDatosUbicacionMina>

          <div
            id="section_catamarca"
            v-if="$props.mostrar.paso_catamarca"
          ></div>
          <PaginaCatamarca
            v-if="$props.mostrar.paso_catamarca"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'Volver'"
            :titulo_boton_guardar="'Guardar Datos'"
            :titulo_pagina="'Catamarca'"
            :evaluacion="evaluacion_global"
            :testing="testing_global"
            :id="$props.productor.id"
          >
          </PaginaCatamarca>

          <div id="section_mendoza" v-if="$props.mostrar.paso_mendoza"></div>
          <PaginaMendoza
            v-if="$props.mostrar.paso_mendoza"
            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos'"
            :titulo_pagina="'Mendoza'"
            :evaluacion="evaluacion_global"
            :testing="testing_global"
            :id="$props.productor.id"
          >
          </PaginaMendoza>

          <div id="finalizar"></div>
          <div
            class="
              border-2
              shadow-lg
              rounded-2xl
              w-full
              py-4
              px-8
              bg-white
              my-20
              border-indigo-400
            "
          >
            <div class="flex flex-wrap">
              <div
                class="
                  w-full
                  sm:w-2/2
                  md:w-1/2
                  lg:w-1/3
                  xl:w-1/3
                  2xl:w-1/3
                  px-3
                  mb-6
                  md:mb-0
                "
              >
                <InputComponente
                  :titulo="'Cargo de la Empresa'"
                  :tipo="'text'"
                  :placeholder="'Cargo de la Empresa'"
                  :value="form.cargo_empresa"
                  v-on:ValueInput="update_input_cargo_empresa($event)"
                ></InputComponente>
              </div>
              <div
                class="
                  w-full
                  sm:w-2/2
                  md:w-1/2
                  lg:w-1/3
                  xl:w-1/3
                  2xl:w-1/3
                  px-3
                  mb-6
                  md:mb-0
                "
              >
                <InputComponente
                  :titulo="'Nombre y Apellido'"
                  :tipo="'text'"
                  :placeholder="'Nombre y Apellido'"
                  :value="form.presentador_nombre"
                  v-on:ValueInput="update_input_nombre($event)"
                ></InputComponente>
              </div>
              <div
                class="
                  w-full
                  sm:w-2/2
                  md:w-1/2
                  lg:w-1/3
                  xl:w-1/3
                  2xl:w-1/3
                  px-3
                  mb-6
                  md:mb-0
                "
              >
                <InputComponente
                  :titulo="'DNI'"
                  :tipo="'number'"
                  :placeholder="'DNI'"
                  :value="form.presentador_dni"
                  v-on:ValueInput="update_input_dni($event)"
                ></InputComponente>
              </div>
            </div>

            <div class="flex" v-if="evaluacion_global">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="name"
                  >Creado Por:</label
                >
                <br />
                <input
                  id="cuit"
                  disabled
                  v-model="form.created_by"
                  class="border py-2 px-3 text-grey-darkest"
                />
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="estado"
                  >Estado Actual:</label
                ><br />
                <span
                  v-if="$props.productor.estado === 'en proceso'"
                  class="
                    bg-purple-200
                    text-purple-600
                    py-1
                    px-3
                    rounded-full
                    text-xs
                  "
                  >En proceso</span
                >
                <span
                  v-if="$props.productor.estado === 'borrador'"
                  class="
                    bg-pink-200
                    text-pink-600
                    py-1
                    px-3
                    rounded-full
                    text-xs
                  "
                  >Borrador</span
                >
                <span
                  v-if="$props.productor.estado === 'aprobado'"
                  class="
                    bg-green-200
                    text-green-600
                    py-1
                    px-3
                    rounded-full
                    text-xs
                  "
                  >Aprobado</span
                >
                <span
                  v-if="$props.productor.estado === 'en revision'"
                  class="
                    bg-yellow-200
                    text-yellow-600
                    py-1
                    px-3
                    rounded-full
                    text-xs
                  "
                  >En revision</span
                >
                <span
                  v-if="$props.productor.estado === 'con observacion'"
                  class="
                    bg-gray-200
                    text-gary-600
                    py-1
                    px-3
                    rounded-full
                    text-xs
                  "
                  >Con Obesrvacion</span
                >
                <span
                  v-if="$props.productor.estado === 'reprobado'"
                  class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs"
                  >Reprobado</span
                >
              </div>
              <div
                class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                v-if="$props.mostrar.estado"
              >
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="estado"
                  >Nuevo Estado:</label
                ><br />
                <select
                  v-if="$props.productor.estado === 'en revision'"
                  id="estado"
                  name="estado"
                  v-model="form.estado"
                  :disabled="$props.disables.estado"
                  @input="calcular_nombre_boton($event.target.value)"
                  class="
                    block
                    appearance-none
                    bg-white
                    border border-gray-400
                    hover:border-gray-500
                    px-4
                    py-2
                    pr-8
                    rounded
                    shadow
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                >
                  <option value="borrador">Borrador</option>
                  <option value="en revision" disabled>En revision</option>
                  <option value="aprobado">Aprobado</option>
                  <option value="reprobado">Reprobado</option>
                  <option value="con observacion">Con Observacion</option>
                </select>
                <select
                  v-else
                  id="estado"
                  name="estado"
                  v-model="form.estado"
                  :disabled="$props.disables.estado"
                  class="
                    block
                    appearance-none
                    bg-white
                    border border-gray-400
                    hover:border-gray-500
                    px-4
                    py-2
                    pr-8
                    rounded
                    shadow
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                >
                  <option value="en proceso">En proceso</option>
                  <option value="borrador">Borrador</option>
                  <option value="en revision">En revision</option>
                  <option value="aprobado">Aprobado</option>
                  <option value="reprobado">Reprobado</option>
                  <option value="con observacion">
                    Con Observación
                  </option>
                </select>
              </div>
            </div>
            <div class="flex" v-else>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="name"
                  >Actualizado Por última vez:</label
                >
                <br />
                <input
                  id="cuit"
                  disabled
                  v-model="form.updated_at"
                  class="border py-2 px-3 text-grey-darkest"
                />
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="estado"
                  >Estado Actual:</label
                ><br />
                <span
                  v-if="$props.productor.estado === 'en proceso'"
                  class="
                    bg-purple-200
                    text-purple-600
                    py-1
                    px-3
                    rounded
                    text-xs
                  "
                  >En proceso</span
                >
                <span
                  v-if="$props.productor.estado === 'borrador'"
                  class="
                    bg-pink-200
                    text-pink-600
                    py-1
                    px-3
                    rounded
                    text-xs
                  "
                  >Borrador</span
                >
                <span
                  v-if="$props.productor.estado === 'aprobado'"
                  class="
                    bg-green-200
                    text-green-600
                    py-1
                    px-3
                    rounded
                    text-xs
                  "
                  >Aprobado</span
                >
                <span
                  v-if="$props.productor.estado === 'en revision'"
                  class="
                    bg-yellow-200
                    text-yellow-600
                    py-1
                    px-3
                    rounded
                    text-xs
                  "
                  >En revision</span
                >
                <span
                  v-if="$props.productor.estado === 'con observacion'"
                  class="
                    bg-gray-200
                    text-gary-600
                    py-1
                    px-3
                    rounded
                    text-xs
                  "
                  >Con Obesrvacion</span
                >
                <span
                  v-if="$props.productor.estado === 'reprobado'"
                  class="bg-red-200 text-red-600 py-1 px-3 rounded text-xs"
                  >Reprobado</span
                >
              </div>
              <div
                class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                v-if="$props.mostrar.estado"
              >
                <label
                  class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                  for="estado"
                  >Nuevo Estado:</label
                ><br />
                <select
                  v-if="$props.productor.estado === 'borrador'"
                  id="estado"
                  name="estado"
                  v-model="form.estado"
                  :disabled="$props.disables.estado"
                  class="
                    block
                    appearance-none
                    bg-white
                    border border-gray-400
                    hover:border-gray-500
                    px-4
                    py-2
                    pr-8
                    rounded
                    shadow
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                >
                  <option value="borrador">Borrador</option>
                  <option value="en revision">Presentar</option>
                </select>
                <select
                  v-if="$props.productor.estado === 'con observacion'"
                  id="estado"
                  name="estado"
                  v-model="form.estado"
                  :disabled="$props.disables.estado"
                  class="
                    block
                    appearance-none
                    bg-white
                    border border-gray-400
                    hover:border-gray-500
                    px-4
                    py-2
                    pr-8
                    rounded
                    shadow
                    leading-tight
                    focus:outline-none focus:shadow-outline
                  "
                >
                  <option value="borrador" disabled>Borrador</option>
                  <option value="con observacion" disabled>
                    Con Observacion
                  </option>
                  <option value="en revision">Presentar</option>
                </select>
              </div>
            </div>
            <br />
            <div
              class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-2 w-full"
            >
              <div
                class="
                  grid
                  justify-start
                  mb-6
                  md:mb-0
                  px-3
                  sm:w-5/5
                  self-center
                  w-full
                "
                v-if="$props.mostrar.boton_actualizar"
              >
                <a
                  v-if="evaluacion_global"
                  @click="mostrar_modal_presentar"
                  :disabled="$props.disables.boton_actualizar"
                  class="
                    text-xl
                    font-medium
                    mx-auto
                    py-3
                    px-5
                    text-indigo-500
                    border border-gray-400
                    rounded-xl
                    bg-gray-100
                    shadow-xl
                    hover:text-white hover:shadow-xl hover:bg-gray-600
                  "
                >
                  {{ nombre_boton_actualizar }} Solicitud
                </a>
                <button
                  v-if="!evaluacion_global"
                  @click="mostrar_modal_presentar"
                  :disabled="$props.disables.boton_actualizar"
                  class="
                    text-xl
                    font-medium
                    mx-auto
                    py-3
                    px-5
                    text-indigo-500
                    border border-gray-400
                    rounded-xl
                    bg-gray-100
                    shadow-xl
                    hover:text-white hover:shadow-xl hover:bg-gray-600
                  "
                >
                  Actualizar
                </button>
              </div>
              <div
                class="
                  grid
                  justify-end
                  mb-6
                  md:mb-0
                  px-3
                  sm:w-5/5
                  self-center
                  w-full
                "
              >
                <inertia-link
                  :href="route('formulario-alta.index')"
                  class="
                    text-xl
                    font-medium
                    mx-auto
                    py-3
                    px-5
                    text-indigo-500
                    border border-gray-400
                    rounded-xl
                    bg-gray-100
                    shadow-xl
                    hover:text-white hover:shadow-xl hover:bg-gray-600
                  "
                >
                  Volver Atras
                </inertia-link>
              </div>
            </div>
          </div>
          <jet-dialog-modal :show="AvisoAprueba" @close="closeModalAprobar">
            <template #title>
              {{ modal_tittle_apro }}
            </template>
            <template #content>
              {{ modal_body_apro }}
            </template>
            <template #footer>
              <div class="flex">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    @click="closeModalAprobar"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-yellow-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Vuelvo a revisar
                  </button>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    v-show="mostrar_boton_aprobar"
                    @click="closeModalAprobar"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-green-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Actuaqqqqlizar
                  </button>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    v-show="mostrar_boton_aprobar_de_todos_modos"
                    @click="presentar_de_todos_modos"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-green-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Actualizar de todos Modos
                  </button>
                </div>
              </div>
            </template>
          </jet-dialog-modal>

          <jet-dialog-modal
            :show="mostrar_modal_datos_ya_guardados"
            @close="cerrar_modal_datos_uno"
          >
            <template #title>
              {{ modal_tittle_apro }}
            </template>
            <template #content>
              {{ modal_body_apro }}
            </template>
            <template #footer>
              <div class="flex">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    @click="closeModalAprobar"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-yellow-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Vuelvo a revisar
                  </button>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    v-show="mostrar_boton_aprobar"
                    @click="closeModalAprobar"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-green-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Actualizar123
                  </button>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <button
                    v-show="mostrar_boton_aprobar_de_todos_modos"
                    @click="presentar_de_todos_modos"
                    class="
                      py-3
                      px-6
                      text-white
                      rounded-lg
                      bg-green-400
                      shadow-lg
                      block
                      md:inline-block
                    "
                  >
                    Actualizar de todos Modos
                  </button>
                </div>
              </div>
            </template>
          </jet-dialog-modal>
          <jet-dialog-modal
            :show="mostrar_modal_datos_ya_guardados"
            @close="cerrar_modal_datos_uno"
          >
            <template #title>
              {{ modal_tittle }}
            </template>
            <template #content>
              {{ modal_body }}
            </template>
            <template #footer>
              <inertia-link
                :href="route('formulario-alta.index')"
                class="
                  px-4
                  py-2
                  text-sm
                  font-medium
                  rounded
                  border-b border-green-300
                  bg-green-200
                  hover:bg-green-300
                  text-green-900
                "
              >
                Ok, volver a lista de borradores
              </inertia-link>
            </template>
          </jet-dialog-modal>
        </form>
      </div>
    </div>
    <ButtonFixed :buttons="buttonsFixed" @showModal="handleClick" />
  </app-layout>
</template>
<script>
import ButtonFixed from "@/Components/ButtonFixed";
import JetButton from "@/Jetstream/Button";

import AppLayout from "@/Layouts/AppLayout";
import Banner from "@/Jetstream/Banner";
import Modal from "@/Jetstream/Modal";
import JetDialogModal from "@/Jetstream/DialogModal";
import CardProductor from "@/Jetstream/altas/CardProductor";
import CardDomLegal from "@/Jetstream/altas/CardDomLegal";
import CardDomAdmin from "@/Jetstream/altas/CardDomAdmin";
import CardMinaUno from "@/Jetstream/altas/CardMinaUno";
import CardMinaDos from "@/Jetstream/altas/CardMinaDos";
import CardCatamarca from "@/Jetstream/altas/CardCatamarca";
import CardMinaUbicacion from "@/Jetstream/altas/CardMinaUbicacion";
import CardTotal from "@/Jetstream/altas/CardTotal";
import PasoUnoEdit from "@/Pages/Productors/PasoUnoEdit";

import PaginaUnoDatosProductores from "@/Pages/Productors/PaginaUnoDatosProductores";

import PaginaDosDatosDomLegal from "@/Pages/Productors/PaginaDosDatosDomLegal";

import PaginaCuatroDatosMinaUno from "@/Pages/Productors/PaginaCuatroDatosMinaUno";
import PaginaCincoDatosMinaDos from "@/Pages/Productors/PaginaCincoDatosMinaDos";

import PaginaSeisDatosUbicacionMina from "@/Pages/Productors/PaginaSeisDatosUbicacionMina";

import PaginaCatamarca from "@/Pages/Productors/PaginaCatamarca";

import PaginaMendoza from "@/Pages/Productors/PaginaMendoza";
import ValidationErrors from "../../Jetstream/ValidationErrors.vue";
import InputComponente from "../../Components/InputText.vue";
export default {
  components: {
    ButtonFixed,
    JetButton,
    InputComponente,
    AppLayout,
    Banner,
    Modal,
    JetDialogModal,
    CardProductor,
    CardDomLegal,
    CardDomAdmin,
    CardMinaUno,
    CardMinaDos,
    CardMinaUbicacion,
    CardTotal,
    PasoUnoEdit,

    PaginaUnoDatosProductores,
    PaginaDosDatosDomLegal,
    PaginaCuatroDatosMinaUno,
    PaginaCincoDatosMinaDos,
    PaginaSeisDatosUbicacionMina,
    ValidationErrors,
    CardCatamarca,
    PaginaCatamarca,
    PaginaMendoza,
  },
  props: [
    "productor",
    "lista_minerales_cargados",
    "creado",
    "soy_administrador",
    "soy_autoridad_minera",
    "soy_productor",
    "disables",
    "mostrar",
  ],
  data() {
    return {
      buttonsFixed: {
        links: [
          {
            label: "Principio",
            url: "#inicio",
            color: "bg-yellow-500 hover:bg-yellow-800",
            ver: true,
          },
          {
            label: "Datos del Productor",
            url: "#section_productor",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Domicilio Legal",
            url: "#section_domicilio_legal",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Domicilio de Administración",
            url: "#section_domicilio_administrativo",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Datos de la Mina",
            url: "#section_mina_uno",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Datos de Mina Segunda Parte",
            url: "#section_datos_mina_dos",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Ubicación de Mina",
            url: "#section_datos_mina_ubicacion",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: true,
          },
          {
            label: "Finalizar Proceso",
            url: "#finalizar",
            color: "bg-red-500 hover:bg-red-800",
            ver: true,
          },
        ],
      },

      confirmingUserDeletion: false,
      modal_tittle: "",
      modal_body: "",
      AvisoAprueba: false,
      modal_tittle_apro: "",
      modal_body_apro: "",
      evaluacion_global: this.$props.soy_autoridad_minera,
      testing_global: this.$props.soy_administrador,
      mostrar_modal_datos_ya_guardados: false,

      puedo_enviar_form: false,
      cerrar_modal_datos_uno: false,

      lista_provincias: [],
      lista_dptos_legal: [],
      lista_dptos_admin: [],
      lista_dptos_mina: [],
      nombre_boton_actualizar: "",
      mostrar_boton_aprobar: false,
      mostrar_boton_aprobar_de_todos_modos: false,
      lista_de_minerales_del_back: this.$props.lista_minerales_cargados,
      form: {
        razon_social: this.$props.productor.razonsocial,
        razon_social_valido: true,
        razon_social_correcto: this.$props.productor.razon_social_correcto,
        obs_razon_social: this.$props.productor.obs_razon_social,
        obs_razon_social_valido: true,

        email: this.$props.productor.email,
        email_valido: true,
        email_correcto: this.$props.productor.email_correcto,
        obs_email: this.$props.productor.obs_email,
        obs_email_valido: true,

        cuit: this.$props.productor.cuit,
        cuit_valido: true,
        cuit_correcto: this.$props.productor.cuit_correcto,
        obs_cuit: this.$props.productor.obs_cuit,
        obs_cuit_valido: false,

        numeroproductor: this.$props.productor.numeroproductor,
        numeroproductor_valido: true,
        numeroproductor_correcto:
          this.$props.productor.numeroproductor_correcto,
        obs_numeroproductor: this.$props.productor.obs_numeroproductor,
        obs_numeroproductor_valido: false,

        //domicilio_prod: this.$props.productor.domicilio_prod,

        tiposociedad: this.$props.productor.tiposociedad,
        tiposociedad_valido: true,
        tiposociedad_correcto: this.$props.productor.tiposociedad_correcto,
        obs_tiposociedad: this.$props.productor.obs_tiposociedad,
        obs_tiposociedad_valido: false,

        inscripciondgr: this.$props.productor.inscripciondgr,
        inscripciondgr_valido: true,
        inscripciondgr_correcto: this.$props.productor.inscripciondgr_correcto,
        obs_inscripciondgr: this.$props.productor.obs_inscripciondgr,
        obs_inscripciondgr_valido: false,

        constaciasociedad: this.$props.productor.constaciasociedad,
        constaciasociedad_valido: true,
        constaciasociedad_correcto:
          this.$props.productor.constanciasociedad_correcto,
        obs_constaciasociedad: this.$props.productor.obs_constaciasociedad,
        obs_constaciasociedad_valido: false,

        valor_de_progreso: 100,
        valor_de_aprobado: 100,
        valor_de_reprobado: 100,

        //---------------Segundo paso
        valor_de_progreso_dos: 100,
        valor_de_aprobado_dos: 100,
        valor_de_reprobado_dos: 100,

        leal_calle: this.$props.productor.leal_calle,
        nombre_calle_legal_valido: true,
        nombre_calle_legal_correcto: this.$props.productor.leal_calle_correcto,
        obs_nombre_calle_legal: this.$props.productor.obs_leal_calle,
        obs_nombre_calle_legal_valido: true,

        leal_numero: this.$props.productor.leal_numero,
        leal_numero_valido: true,
        leal_numero_correcto: this.$props.productor.leal_numero_correcto,
        obs_leal_numero: this.$props.productor.obs_leal_numero,
        obs_leal_numero_valido: false,

        leal_telefono: this.$props.productor.leal_telefono,
        leal_telefono_valido: true,
        leal_telefono_correcto: this.$props.productor.leal_telefono_correcto,
        obs_leal_telefono: this.$props.productor.obs_leal_telefono,
        obs_leal_telefono_valido: false,

        leal_pais: "Argentina",
        leal_pais_valido: true,
        leal_pais_correcto: true,
        obs_leal_pais: "",
        obs_leal_pais_valido: false,

        leal_provincia: this.$props.productor.leal_provincia,
        leal_provincia_valido: true,
        leal_provincia_correcto: this.$props.productor.leal_provincia_correcto,
        obs_leal_provincia: this.$props.productor.obs_leal_provincia,
        obs_leal_provincia_valido: false,

        leal_departamento: this.$props.productor.leal_departamento,
        leal_departamento_valido: true,
        leal_departamento_correcto:
          this.$props.productor.leal_departamento_correcto,
        obs_leal_departamento: this.$props.productor.obs_leal_departamento,
        obs_leal_departamento_valido: false,

        leal_localidad: this.$props.productor.leal_localidad,
        leal_localidad_valido: true,
        leal_localidad_correcto: "nada",
        obs_leal_localidad: "",
        obs_leal_localidad_valido: false,

        leal_cp: this.$props.productor.leal_cp,
        leal_cp_valido: true,
        leal_cp_correcto: this.$props.productor.leal_cp_correcto,
        obs_leal_cp: this.$props.productor.obs_leal_cp,
        obs_leal_cp_valido: false,

        leal_otro: this.$props.productor.leal_otro,
        leal_otro_valido: true,
        leal_otro_correcto: this.$props.productor.leal_otro_correcto,
        obs_leal_otro: this.$props.productor.obs_leal_otro,
        obs_leal_otro_valido: false,

        // PASO 3
        valor_de_progreso_tres: 100,
        valor_de_aprobado_tres: 100,
        valor_de_reprobado_tres: 100,

        administracion_calle: this.$props.productor.administracion_calle,
        administracion_calle_valido: true,
        administracion_calle_correcto:
          this.$props.productor.administracion_calle_correcto,
        obs_administracion_calle_nombre:
          this.$props.productor.obs_administracion_calle_nombre,
        obs_administracion_calle_nombre_valido: false,

        administracion_numero: this.$props.productor.administracion_numero,
        administracion_numero_valido: true,
        administracion_numero_correcto:
          this.$props.productor.administracion_numero_correcto,
        obs_administracion_numero_nombre:
          this.$props.productor.obs_administracion_numero,
        obs_administracion_numero_nombre_valido: false,

        administracion_telefono: this.$props.productor.administracion_telefono,
        administracion_telefono_valido: true,
        administracion_telefono_correcto:
          this.$props.productor.administracion_telefono_correcto,
        obs_administracion_telefono_nombre:
          this.$props.productor.obs_administracion_telefono,
        obs_administracion_telefono_nombre_valido: false,

        administracion_pais: this.$props.productor.administracion_pais,
        administracion_pais_valido: true,
        administracion_pais_correcto:
          this.$props.productor.administracion_pais_correcto,
        obs_administracion_pais: this.$props.productor.obs_administracion_pais,
        obs_administracion_pais_valido: false,

        administracion_provincia:
          this.$props.productor.administracion_provincia,
        administracion_provincia_valido: true,
        administracion_provincia_correcto:
          this.$props.productor.administracion_provincia_correcto,
        obs_administracion_provincia:
          this.$props.productor.obs_administracion_provincia,
        obs_administracion_provincia_valido: false,

        administracion_departamento:
          this.$props.productor.administracion_departamento,
        administracion_departamento_valido: true,
        administracion_departamento_correcto:
          this.$props.productor.administracion_departamento_correcto,
        obs_administracion_departamento:
          this.$props.productor.obs_administracion_departamento,
        obs_administracion_departamento_valido: false,

        administracion_localidad:
          this.$props.productor.administracion_localidad,
        administracion_localidad_valido: true,
        administracion_localidad_correcto:
          this.$props.productor.administracion_localidad_correcto,
        obs_administracion_localidad:
          this.$props.productor.obs_administracion_localidad,
        obs_administracion_localidad_valido: false,

        administracion_cp: this.$props.productor.administracion_cp,
        administracion_cp_valido: true,
        administracion_cp_correcto:
          this.$props.productor.administracion_cp_correcto,
        obs_administracion_cp: this.$props.productor.obs_administracion_cp,
        obs_administracion_cp_valido: false,

        administracion_otro: this.$props.productor.administracion_otro,
        administracion_otro_valido: true,
        administracion_otro_correcto:
          this.$props.productor.administracion_otro_correcto,
        obs_administracion_otro: this.$props.productor.obs_administracion_otro,
        obs_administracion_otro_valido: false,

        // PASO 4
        valor_de_progreso_cuatro: 100,
        valor_de_aprobado_cuatro: 100,
        valor_de_reprobado_cuatro: 100,

        numero_expdiente: this.$props.productor.numero_expdiente,
        numero_expdiente_valido: true,
        numero_expdiente_correcto:
          this.$props.productor.numero_expdiente_correcto,
        obs_numero_expdiente: this.$props.productor.obs_numero_expdiente,
        obs_numero_expdiente_valido: false,

        categoria: this.$props.productor.categoria,
        categoria_validacion: true,
        categoria_correcto: this.$props.productor.categoria_correcto,
        obs_categoria: this.$props.productor.obs_categoria,
        obs_categoria_valido: false,

        nombre_mina: this.$props.productor.nombre_mina,
        nombre_mina_validacion: true,
        nombre_mina_correcto: this.$props.productor.nombre_mina_correcto,
        obs_nombre_mina: this.$props.productor.obs_nombre_mina,
        obs_nombre_mina_valido: false,

        descripcion_mina: this.$props.productor.descripcion_mina,
        descripcion_mina_validacion: true,
        descripcion_mina_correcto:
          this.$props.productor.descripcion_mina_correcto,
        obs_descripcion_mina: this.$props.productor.obs_descripcion_mina,
        obs_descripcion_mina_valido: false,

        distrito_minero: this.$props.productor.distrito_minero,
        distrito_minero_validacion: true,
        distrito_minero_correcto:
          this.$props.productor.distrito_minero_correcto,
        obs_distrito_minero: this.$props.productor.obs_distrito_minero,
        obs_distrito_minero_valido: false,

        mina_cantera: this.$props.productor.mina_cantera,
        mina_cantera_validacion: true,
        mina_cantera_correcto: this.$props.productor.mina_cantera_correcto,
        obs_mina_cantera: this.$props.productor.obs_mina_cantera,
        obs_mina_cantera_valido: false,

        plano_inmueble: this.$props.productor.plano_inmueble,
        plano_inmueble_validacion: true,
        plano_inmueble_correcto: this.$props.productor.plano_inmueble_correcto,
        obs_plano_inmueble: this.$props.productor.obs_plano_inmueble,
        obs_plano_inmueble_valido: false,

        minerales_variedad: this.$props.productor.minerales_variedad,
        minerales_variedad_validacion: true,
        minerales_variedad_correcto:
          this.$props.productor.plano_inmueble_correcto,
        obs_minerales_variedad: this.$props.productor.plano_inmueble_correcto,
        obs_minerales_variedad_valido: false,

        // PASO 5
        valor_de_progreso_cinco: 100,
        valor_de_aprobado_cinco: 100,
        valor_de_reprobado_cinco: 100,

        owner: this.$props.productor.owner,
        owner_correcto: this.$props.productor.owner_correcto,
        obs_owner: this.$props.productor.obs_owner,
        obs_owner_valido: false,

        arrendatario: this.$props.productor.arrendatario,
        arrendatario_correcto: this.$props.productor.arrendatario_correcto,
        obs_arrendatario: this.$props.productor.obs_arrendatario,
        obs_arrendatario_valido: false,

        concesionario: this.$props.productor.concesionario,
        concesionario_correcto: this.$props.productor.concesionario_correcto,
        obs_concesionario: this.$props.productor.obs_concesionario,
        obs_concesionario_valido: false,

        otros: this.$props.productor.otros,
        otros_correcto: this.$props.productor.otros_correcto,
        obs_otros: this.$props.productor.obs_otros,
        obs_otros_valido: false,
        otros_input: this.$props.productor.otro_caracter_acalaracion,
        otros_input_valido: true,

        sustancias: this.$props.productor.sustancias_de_aprovechamiento_comun,
        sustancias_correcto:
          this.$props.productor.sustancias_de_aprovechamiento_comun_correcto,
        obs_sustancias:
          this.$props.productor.obs_sustancias_de_aprovechamiento_comun,
        obs_sustancias_valido: false,
        sustancias_input:
          this.$props.productor.sustancias_de_aprovechamiento_comun_aclaracion,
        sustancias_input_valido: true,

        titulo_contrato_posecion:
          this.$props.productor.titulo_contrato_posecion,
        titulo_contrato_posecion_validacion: true,
        titulo_contrato_posecion_correcto:
          this.$props.productor.titulo_contrato_posecion_correcto,
        obs_titulo_contrato_posecion:
          this.$props.productor.obs_titulo_contrato_posecion,
        obs_titulo_contrato_posecion_valido: false,

        resolucion_concesion_minera:
          this.$props.productor.resolucion_concesion_minera,
        resolucion_concesion_minera_validacion: true,
        resolucion_concesion_minera_correcto:
          this.$props.productor.resolucion_concesion_minera_correcto,
        obs_resolucion_concesion_minera:
          this.$props.productor.obs_resolucion_concesion_minera,
        obs_resolucion_concesion_minera_valido: false,

        constancia_pago_canon: this.$props.productor.constancia_pago_canon,
        constancia_pago_canon_validacion: true,
        constancia_pago_canon_correcto:
          this.$props.productor.constancia_pago_canon_correcto,
        obs_constancia_pago_canon:
          this.$props.productor.obs_constancia_pago_canon,
        obs_constancia_pago_canon_valido: false,

        iia: this.$props.productor.iia,
        iia_canon_validacion: true,
        iia_correcto: this.$props.productor.iia_correcto,
        obs_iia_canon: this.$props.productor.obs_iia,
        obs_iia_canon_valido: false,

        dia: this.$props.productor.dia,
        dia_canon_validacion: true,
        dia_correcto: this.$props.productor.dia_correcto,
        obs_dia_canon: this.$props.productor.obs_dia,
        obs_dia_canon_valido: false,

        acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
        acciones_a_desarrollar_validacion: true,
        acciones_a_desarrollar_correcto:
          this.$props.productor.acciones_a_desarrollar_correcto,
        obs_acciones_a_desarrollar:
          this.$props.productor.obs_acciones_a_desarrollar,
        obs_acciones_a_desarrollar_valido:
          this.$props.productor.concesion_minera_aclaracion,

        actividad: this.$props.productor.actividad,
        actividad_a_desarrollar_validacion: true,
        actividad_a_desarrollar_correcto:
          this.$props.productor.actividad_correcto,
        obs_actividad_a_desarrollar: this.$props.productor.obs_actividad,
        obs_actividad_a_desarrollar_valido: false,

        fecha_alta_dia: this.$props.productor.fecha_alta_dia,
        fecha_alta_dia_validacion: true,
        fecha_alta_dia_correcto: this.$props.productor.fecha_alta_dia_correcto,
        obs_fecha_alta_dia: this.$props.productor.obs_fecha_alta_dia,
        obs_fecha_alta_dia_valido: false,

        fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
        fecha_vencimiento_dia_validacion: true,
        fecha_vencimiento_dia_correcto:
          this.$props.productor.fecha_vencimiento_dia_correcto,
        obs_fecha_vencimiento_dia:
          this.$props.productor.obs_fecha_vencimiento_dia,
        obs_fecha_vencimiento_dia_valido: false,

        // PASO 6
        valor_de_progreso_seis: 100,
        valor_de_aprobado_seis: 100,
        valor_de_reprobado_seis: 100,

        localidad_mina_pais: this.$props.productor.localidad_mina_pais,
        localidad_mina_pais_validacion: true,
        localidad_mina_pais_correcto:
          this.$props.productor.localidad_mina_pais_correcto,
        obs_localidad_mina_pais: this.$props.productor.obs_localidad_mina_pais,
        obs_localidad_mina_pais_valido: false,

        localidad_mina_provincia:
          this.$props.productor.localidad_mina_provincia,
        localidad_mina_provincia_validacion: true,
        localidad_mina_provincia_correcto:
          this.$props.productor.localidad_mina_provincia_correcto,
        obs_localidad_mina_provincia:
          this.$props.productor.obs_localidad_mina_provincia,
        obs_localidad_mina_provincia_valido: false,

        localidad_mina_departamento:
          this.$props.productor.localidad_mina_departamento,
        localidad_mina_departamento_validacion: true,
        localidad_mina_departamento_correcto:
          this.$props.productor.localidad_mina_departamento_correcto,
        obs_localidad_mina_departamento:
          this.$props.productor.obs_localidad_mina_departamento,
        obs_localidad_mina_departamento_valido: false,

        localidad_mina_localidad:
          this.$props.productor.localidad_mina_localidad,
        localidad_mina_localidad_validacion: true,
        localidad_mina_localidad_correcto:
          this.$props.productor.localidad_mina_localidad_correcto,
        obs_localidad_mina_localidad:
          this.$props.productor.obs_localidad_mina_localidad,
        obs_localidad_mina_localidad_valido: false,

        tipo_sistema: this.$props.productor.tipo_sistema,
        tipo_sistema_validacion: true,
        tipo_sistema_correcto: this.$props.productor.tipo_sistema_correcto,
        obs_tipo_sistema: this.$props.productor.obs_tipo_sistema,
        obs_tipo_sistema_valido: false,

        latitud: this.$props.productor.latitud,
        latitud_validacion: true,
        latitud_correcto: this.$props.productor.latitud_correcto,
        obs_latitud: this.$props.productor.obs_latitud,
        obs_latitud_valido: false,

        longitud: this.$props.productor.longitud,
        longitud_validacion: true,
        longitud_correcto: this.$props.productor.longitud_correcto,
        obs_longitud: this.$props.productor.obs_longitud,
        obs_longitud_valido: false,

        created_by: this.$props.creado.name,
        estado: this.$props.productor.estado,

        //paso catamarca:
        gestor_nombre_apellido: this.$props.productor.gestor_nombre_apellido,
        gestor_nombre_apellido_valido: true,
        gestor_nombre_apellido_correcto:
          this.$props.productor.gestor_nombre_apellido_correcto,
        obs_gestor_nombre_apellido:
          this.$props.productor.obs_gestor_nombre_apellido,
        obs_gestor_nombre_valido: true,

        gestor_dni: this.$props.productor.gestor_dni,
        gestor_dni_valido: true,
        gestor_dni_correcto: this.$props.productor.gestor_dni_correcto,
        obs_gestor_dni: this.$props.productor.obs_gestor_dni,
        obs_gestor_dni_valido: true,

        gestor_profesion: this.$props.productor.gestor_profesion,
        gestor_profesion_valido: true,
        gestor_profesion_correcto:
          this.$props.productor.gestor_profesion_correcto,
        obs_gestor_profesion: this.$props.productor.obs_gestor_profesion,
        obs_gestor_profesion_valido: true,

        gestor_telefono: this.$props.productor.gestor_telefono,
        gestor_telefono_valido: true,
        gestor_telefono_correcto:
          this.$props.productor.gestor_telefono_correcto,
        obs_gestor_telefono: this.$props.productor.obs_gestor_telefono,
        obs_gestor_telefono_valido: true,

        gestor_notificacion: this.$props.productor.gestor_notificacion,
        gestor_notificacion_valido: true,
        gestor_notificacion_correcto:
          this.$props.productor.gestor_notificacion_correcto,
        obs_gestor_notificacion: this.$props.productor.obs_gestor_notificacion,
        obs_gestor_notificacion_valido: true,

        gestor_email: this.$props.productor.gestor_email,
        gestor_email_valido: true,
        gestor_email_correcto: this.$props.productor.gestor_email_correcto,
        obs_gestor_email: this.$props.productor.obs_gestor_email,
        obs_gestor_email_valido: true,

        primer_hoja_dni: this.$props.productor.primer_hoja_dni,
        hoja_dni_valido: true,
        hoja_dni_correcto: this.$props.productor.hoja_dni_correcto,
        obs_hoja_dni: this.$props.productor.obs_hoja_dni,
        obs_hoja_dni_valido: true,

        segunda_hoja_dni: this.$props.productor.segunda_hoja_dni,
        segunda_hoja_dni_valido: true,
        segunda_hoja_dni_correcto:
          this.$props.productor.segunda_hoja_dni_correcto,
        obs_segunda_hoja_dni: this.$props.productor.obs_segunda_hoja_dni,
        obs_segunda_hoja_dni_valido: true,

        foto_4x4: this.$props.productor.foto_4x4,
        foto_4x4_valido: true,
        foto_4x4_correcto: this.$props.productor.foto_4x4_correcto,
        obs_foto_4x4: this.$props.productor.obs_foto_4x4,
        obs_foto_4x4_valido: true,

        constancia_afip: this.$props.productor.constancia_afip,
        constancia_afip_valido: true,
        constancia_afip_correcto:
          this.$props.productor.constancia_afip_correcto,
        obs_constancia_afip: this.$props.productor.obs_constancia_afip,
        obs_constancia_afip_valido: true,

        autorizacion_gestor: this.$props.productor.autorizacion_gestor,
        autorizacion_gestor_valido: true,
        autorizacion_gestor_correcto:
          this.$props.productor.autorizacion_gestor_correcto,
        obs_autorizacion_gestor: this.$props.productor.obs_autorizacion_gestor,
        obs_autorizacion_gestor_valido: true,

        presentador_nombre: this.$props.productor.presentador_nom_apellido,
        presentador_dni: this.$props.productor.presentador_dni,
        cargo_empresa: this.$props.productor.cargo_empresa,
      },
      form_mendoza: {},
      /* form_catamarca: {
        gestor_nombre_apellido:'',
				gestor_nombre_apellido_valido:'',
				gestor_nombre_apellido_correcto:'',
				obs_gestor_nombre_apellido:'',
				obs_gestor_nombre_valido:'',
				mostrar_nombre_gestor:'',
				desactivar_nombre_gestor:'',
				mostrar_nombre_gestor_correccion:'',
				desactivar_nombre_gestor_correccion:'',


				gestor_dni: '',
				gestor_dni_valido: '',
				gestor_dni_correcto: '',
				obs_gestor_dni: '',
				obs_gestor_dni_valido: '',
				mostrar_dni_gestor: '',
				desactivar_dni_gestor: '',
				mostrar_dni_gestor_correccion: '',
				desactivar_dni_gestor_correccion: '',


				gestor_profesion: '',
				gestor_profesion_valido: '',
				gestor_profesion_correcto: '',
				obs_gestor_profesion: '',
				obs_gestor_profesion_valido: '',
				mostrar_profesion_gestor: '',
				desactivar_profesion_gestor: '',
				mostrar_profesion_gestor_correccion: '',
				desactivar_profesion_gestor_correccion: '',


				gestor_telefono: '',
				gestor_telefono_valido: '',
				gestor_telefono_correcto: '',
				obs_gestor_telefono: '',
				obs_gestor_telefono_valido: '',
				mostrar_telefono_gestor:'',
				desactivar_telefono_gestor:'',
				mostrar_telefono_gestor_correccion:'',
				desactivar_telefono_gestor_correccion:'',


				gestor_notificacion:'',
				gestor_notificacion_valido:'',
				gestor_notificacion_correcto:'',
				obs_gestor_notificacion:'',
				obs_gestor_notificacion_valido:'',
				mostrar_notificacion_gestor:'',
				desactivar_notificacion_gestor:'',
				mostrar_notificacion_gestor_correccion:'',
				desactivar_notificacion_gestor_correccion:'',


				gestor_email:'',
				gestor_email_valido:'',
				gestor_email_correcto:'',
				obs_gestor_email:'',
				obs_gestor_email_valido:'',
				mostrar_email_gestor:'',
				desactivar_email_gestor:'',
				mostrar_email_gestor_correccion:'',
				desactivar_email_gestor_correccion:'',


				primer_hoja_dni:'',
				hoja_dni_valido:'',
				hoja_dni_correcto:'',
				obs_hoja_dni:'',
				obs_hoja_dni_valido:'',
				mostrar_dni_productor:'',
				desactivar_dni_productor:'',
				mostrar_dni_productor_correccion:'',
				desactivar_dni_productor_correccion:'',


				segunda_hoja_dni:'',
				segunda_hoja_dni_valido:'',
				segunda_hoja_dni_correcto:'',
				obs_segunda_hoja_dni:'',
				obs_segunda_hoja_dni_valido:'',


				foto_4x4:'',
				foto_4x4_valido:'',
				foto_4x4_correcto:'',
				obs_foto_4x4:'',
				obs_foto_4x4_valido:'',
				mostrar_foto_productor:'',
				desactivar_foto_productor:'',
				mostrar_foto_productor_correccion:'',
				desactivar_foto_productor_correccion:'',


				constancia_afip:'',
				constancia_afip_valido:'',
				constancia_afip_correcto:'',
				obs_constancia_afip:'',
				obs_constancia_afip_valido:'',
				mostrar_constancia_afip:'',
				desactivar_constancia_afip:'',
				mostrar_constancia_afip_correccion:'',
				desactivar_constancia_afip_correccion:'',


				autorizacion_gestor:'',
				autorizacion_gestor_valido:'',
				autorizacion_gestor_correcto:'',
				obs_autorizacion_gestor:'',
				obs_autorizacion_gestor_valido:'',
				mostrar_autorizacion_gestor:'',
				desactivar_autorizacion_gestor:'',
				mostrar_autorizacion_gestor_correccion:'',
				desactivar_autorizacion_gestor_correccion:'',



			}, */
      nuevo: this.$props.productor,
    };
  },
  mounted() {
    let self = this;
    this.$nextTick(() => {
      // console.log(this.$inertia.page.props.user.id_provincia);
      if (this.$inertia.page.props.user.id_provincia === 70) {
        // console.log("harcodeo las prov");
        self.lista_provincias = [
          {
            id: 70,
            nombre: "San Juan",
          },
        ];
      } else {
        axios
          .get("/datos/traer_provincias")
          .then(function (response) {
            // console.log("las provincias so2n:\n");
            self.lista_provincias = response.data;
            // console.log(self.lista_provincias);
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    });
    //voy a buscar los dptos
    if (!isNaN(parseInt(this.$props.productor.leal_provincia))) {
      //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
      this.$nextTick(() => {
        axios
          .post("/datos/traer_departamentos", {
            id_prov: parseInt(this.$props.productor.leal_provincia),
          })
          .then(function (response) {
            // console.log("los deptos desde la raiz , legales son:\n");
            self.lista_dptos_legal = response.data;
            // console.log(self.lista_dptos_legal);
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    } else {
      self.lista_dptos_legal = [];
    }
    if (!isNaN(parseInt(this.$props.productor.administracion_provincia))) {
      //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
      this.$nextTick(() => {
        axios
          .post("/datos/traer_departamentos", {
            id_prov: parseInt(this.$props.productor.administracion_provincia),
          })
          .then(function (response) {
            // console.log("los deptos desde la raiz son:\n");
            self.lista_dptos_admin = response.data;
            // console.log(self.lista_dptos_admin);
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    } else {
      self.lista_dptos_admin = [];
    }
    if (!isNaN(parseInt(this.$props.productor.localidad_mina_provincia))) {
      //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
      this.$nextTick(() => {
        axios
          .post("/datos/traer_departamentos", {
            id_prov: parseInt(this.$props.productor.localidad_mina_provincia),
          })
          .then(function (response) {
            // console.log("los deptos desde la raiz son:\n");
            self.lista_dptos_mina = response.data;
            // console.log(self.lista_dptos_mina);
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    } else {
      self.lista_dptos_mina = [];
    }
  },
  methods: {
    handleClick(data) {
      this.showModalPasos = data.show;
    },
    submit() {
      let self = this;
      // console.log("el id es:", this.form.id);
      if (
        typeof this.form.id !== "undefined" &&
        self.form.id != null &&
        self.puedo_enviar_form
      ) {
        // console.log("Entre al if xq:" + self.form.id);
        this.$inertia.put(
          route("productors.update", this.$props.productors.id),
          this.form
        );
      } else {
        console.log("No puedo enviar el form");
      }
    },
    closeModal() {
      this.confirmingUserDeletion = false;
      //this.form.reset()
    },
    closeModalAprobar() {
      this.AvisoAprueba = false;
    },
    update_input_nombre(value) {
      console.log("Resultado del Input Nombre");
      this.form.presentador_nombre = value;
    },
    update_input_dni(value) {
      console.log("Resultado del Input DNI");
      this.form.presentador_dni = value;
    },
    update_input_cargo_empresa(value) {
      console.log("Resultado del Input Cargo de Empresa");
      this.form.cargo_empresa = value;
    },
    mostrar_modal_presentar() {
      //soy productor y estoy por presentar el formulario
      let form_evaluacion_valida = "";
      this.AvisoAprueba = true;
      this.modal_tittle_apro =
        "Advertencia: esta por presentar esta solicitud de Productor.";
      //form_evaluacion_valida = this.evaluacion_de_evaluaciones();
      form_evaluacion_valida = true; //sacar esta linea para control de datos
      if (form_evaluacion_valida === "") {
        //el formulario esta bien hecho y no tiene observaciones
        this.modal_body_apro =
          " \n \n Este formulario no posee ninguna observación por tanto, puede ser aprobado sin problemas";
        this.mostrar_boton_aprobar = true;
        this.mostrar_boton_aprobar_de_todos_modos = true;
      } else {
        //el formulario esta bien hecho y no tiene observaciones
        this.modal_body_apro =
          " \n \n Este formulario posee observaciones por tatnto, debe revisarlo antes de aprobarlo" +
          form_evaluacion_valida;
        this.mostrar_boton_aprobar = false;
        this.mostrar_boton_aprobar_de_todos_modos = true;
      }
      //<!-- @click="guardar_avances_todo" -->
    },
    calcular_nombre_boton(valor) {
      switch (valor) {
        case "en revision":
          this.nombre_boton_actualizar = "Presentar ";
          break;
        case "con observacion":
          this.nombre_boton_actualizar = "Observar ";
          break;
        case "borrador":
          this.nombre_boton_actualizar = "Actualzar ";
          break;
        case "reprobado":
          this.nombre_boton_actualizar = "Reprobar ";
          break;
        case "aprobado":
          this.nombre_boton_actualizar = "Aprobar ";
          break;
      }
    },
    presentar_de_todos_modos() {
      let self = this;
      const data = new FormData();
      //alert(self.form.estado);
      data.append("id", this.$props.productor.id);
      data.append("cargo_empresa", self.form.cargo_empresa);
      data.append("nombre_presentador", self.form.presentador_nombre);
      data.append("dni_presentador", self.form.presentador_dni);
      data.append("estado", self.form.estado);

      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
      axios
        .post(
         "/formularios/presentar_borrador",
          data
        )
        .then(function (response) {
          console.log(response.data);
          if (response.data.msg === "Datos actualizados correctamente.") {
            if (self.form.estado === "aprobado") {
              // lo aprobe en el back, siendo autoridad
              console.log("todo bien");
              self.modal_tittle = "Se aprobó la solicitud";
              self.modal_body =
                "Se ha guardado el estado de la solicitud como aprobado. Esta acción implica que la persona que presentó este formulario será considerado como productor.";
              self.closeModalAprobar = false;
              self.mostrar_modal_datos_ya_guardados = true;
            }
            if (response.data.msg === "Formulario Actualizado Correctamente.") {
              // lo presente como productor
              console.log("todo bien");
              self.modal_tittle = "Se actualizo estado";
              self.modal_body =
                "Se ha guardado el estado del borrador como una solicitud de presentación. Ahora espera un respuesta de la autoriudad minera";
              self.closeModalAprobar = false;
              self.mostrar_modal_datos_ya_guardados = true;
            }
            if (self.form.estado === "con observacion") {
              // lo aprobe en el back, siendo autoridad
              console.log("todo bien");
              self.modal_tittle = "Se cambio el estado del Formulario";
              self.modal_body =
                "Se ha guardado el estado del como Formulario con Observaciones. Esta acción implica que la persona que presentó este formulario será notificado y deberá relaizar los cambios necesarios.";
              self.closeModalAprobar = false;
              self.mostrar_modal_datos_ya_guardados = true;
            }
          }
          if (response.data.msg === "Formulario Actualizado Correctamente.") {
            // lo presente como productor
            console.log("todo bien");
            self.modal_tittle = "Se actualizo estado";
            self.modal_body =
              "Se ha guardado el estado del borrador como una solicitud de presentación. Ahora espera un respuesta de la autoriudad minera";
            self.closeModalAprobar = false;
            self.mostrar_modal_datos_ya_guardados = true;
          }

          if (response.data.msg === "formulario no encontrado") {
            console.log("todo mal, no se encontro");
            self.modal_tittle = "Paso 1 Guardado Fallido";
            self.modal_body =
              "NO Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias";
            self.mostrar_modal_datos_ya_guardados = true;
          } else {
            console.log("NO todo bien");
          }
        });
      //voy a buscar los dptos
      if (!isNaN(parseInt(this.$props.productor.leal_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.leal_provincia),
            })
            .then(function (response) {
              console.log("los deptos desde la raiz , legales son:\n");
              self.lista_dptos_legal = response.data;
              console.log(self.lista_dptos_legal);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
        console.log(
          "Mi dpto ya elegido es:",
          this.$props.productor.leal_departamento
        );
        if (!isNaN(parseInt(this.$props.productor.leal_departamento))) {
          self.form.leal_departamento = this.$props.productor.leal_departamento;
        }
      } else {
        self.lista_dptos_legal = [];
      }
      if (!isNaN(parseInt(this.$props.productor.administracion_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.administracion_provincia),
            })
            .then(function (response) {
              // console.log("los deptos desde la raiz son:\n");
              self.lista_dptos_admin = response.data;
              // console.log(self.lista_dptos_admin);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      } else {
        self.lista_dptos_admin = [];
      }
      if (!isNaN(parseInt(this.$props.productor.localidad_mina_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.localidad_mina_provincia),
            })
            .then(function (response) {
              // console.log("los deptos desde la raiz son:\n");
              self.lista_dptos_mina = response.data;
              // console.log(self.lista_dptos_mina);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      } else {
        self.lista_dptos_mina = [];
      }
    },
    buscar_provincias() {
      //voy a buscar las provincias
      // console.log("PROVVVVV");
      this.$nextTick(() => {
        // console.log(this.$inertia.page.props.user.id_provincia);
        if (this.$inertia.page.props.user.id_provincia === 70) {
          // console.log("harcodeo las prov");
          //rta---> id: 70, nombre: 'San Juan'
          self.lista_provincias = [
            {
              id: 70,
              nombre: "San Juan",
            },
          ];
        } else {
          axios
            .get("/datos/traer_provincias")
            .then(function (response) {
              // console.log("las provincias so22n:\n");
              self.lista_provincias = response.data;
              // console.log(self.lista_provincias);
            })
            .catch(function (error) {
              console.log(error);
            });
        }
      });
      //voy a buscar los dptos
      if (!isNaN(parseInt(this.$props.productor.leal_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.leal_provincia),
            })
            .then(function (response) {
              // console.log("los deptos desde la raiz , legales son:\n");
              self.lista_dptos_legal = response.data;
              // console.log(self.lista_dptos_legal);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      } else {
        self.lista_dptos_legal = [];
      }
      if (!isNaN(parseInt(this.$props.productor.administracion_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.administracion_provincia),
            })
            .then(function (response) {
              // console.log("los deptos desde la raiz son:\n");
              self.lista_dptos_admin = response.data;
              // console.log(self.lista_dptos_admin);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      } else {
        self.lista_dptos_admin = [];
      }
      if (!isNaN(parseInt(this.$props.productor.localidad_mina_provincia))) {
        //signafica que tengo una provincia ya elegida asiq traifgo sus dptos
        this.$nextTick(() => {
          axios
            .post("/datos/traer_departamentos", {
              id_prov: parseInt(this.$props.productor.localidad_mina_provincia),
            })
            .then(function (response) {
              // console.log("los deptos desde la raiz son:\n");
              self.lista_dptos_mina = response.data;
              // console.log(self.lista_dptos_mina);
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      } else {
        self.lista_dptos_mina = [];
      }
    },
  },
};
</script>