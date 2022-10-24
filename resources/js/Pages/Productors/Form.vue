<template>
  <app-layout>
    <div>
      <div class="flex items-center w-full bg-teal-lighter">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4">
          <div id="inicio"></div>
          <h1
            class="
              normal-case
              shadow-lg
              text-center text-2xl
              font-bold
              leading-7
              text-gray-500
              sm:text-3xl sm:truncate
              py-1
            "
          >
            Dandose de Alta como nuevo Productor Minero en la Provincia de
            {{ $props.nombre_provincia }}, ID {{ form.id }}
          </h1>
          <form @submit.prevent="submit" class="mb-8">
            <div class="row">
              <banner></banner>
            </div>
            <!-- <br /> -->
            salta : {{$props.mostrar.paso_salta}}

            <div ></div>
            <PaginaSalta
              
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar'"
              :titulo_pagina="'Salta'"
              :evaluacion="evaluacion_global"
              :testing="testing_global"
              :id="444"
              :editar="false"
              
            >
            </PaginaSalta>



            <div id="section_productor"></div>
            <PaginaUnoDatosProductores
              v-if="$props.mostrar.paso_uno"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
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
              :id="form.id"
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
              v-on:CreeUnNuevoIdPasoAAbuelo="update_id_nuevo($event)"
              v-on:CreeUnNuevoIdAdcionalPasoAAbuelo="
                update_id_adicional_nuevo($event)
              "
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Datos del Productor', $event)
              "
            >
            </PaginaUnoDatosProductores>

            <div id="section_domicilio_legal"></div>
            <PaginaDosDatosDomLegal
              v-if="m_paso2"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos del Domicilio Legal'"
              :titulo_pagina="'Domicilio Legal'"
              :leal_calle="form.leal_calle"
              :nombre_calle_legal_valido="form.nombre_calle_legal_valido"
              :nombre_calle_legal_correcto="form.nombre_calle_legal_correcto"
              :obs_nombre_calle_legal="form.obs_nombre_calle_legal"
              :obs_nombre_calle_legal_valido="
                form.obs_nombre_calle_legal_valido
              "
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
              :id="form.id"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Domicilio Legal', $event)
              "
              v-on:updateValorPadreNombreCalle="UpdateCalleNombre($event)"
              v-on:updateValorPadreNumCalle="UpdateCalleNum($event)"
              v-on:updateValorPadreTel="UpdateTel($event)"
              v-on:updateValorPadreProv="UpdateProv($event)"
              v-on:updateValorPadreDepto="UpdateDpto($event)"
              v-on:updateValorPadreLocalidad="UpdateLocalidad($event)"
              v-on:updateValorPadreCP="UpdateCP($event)"
              v-on:updateValorPadreOtro="UpdateOtro($event)"
            >
            </PaginaDosDatosDomLegal>

            <div id="section_domicilio_administrativo"></div>
            <PaginaDosDatosDomLegal
              v-if="m_paso3"
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
              :desactivar_legal_telefono="
                $props.disables.administracion_telefono
              "
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
              :leal_departamento_valido="
                form.administracion_departamento_valido
              "
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
              :id="form.id"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Domicilio de Administración', $event)
              "
              v-on:updateValorPadreNombreCalle="UpdateCalleNombre($event)"
              v-on:updateValorPadreNumCalle="UpdateCalleNum($event)"
              v-on:updateValorPadreTel="UpdateTel($event)"
              v-on:updateValorPadreProv="UpdateProv($event)"
              v-on:updateValorPadreDepto="UpdateDpto($event)"
              v-on:updateValorPadreLocalidad="UpdateLocalidad($event)"
              v-on:updateValorPadreCP="UpdateCP($event)"
              v-on:updateValorPadreOtro="UpdateOtro($event)"
              v-on:copiarDatosDomicilioLegal="mandarDomicilioAlHijo($event)"
            >
            </PaginaDosDatosDomLegal>

            <div id="section_mina_uno"></div>
            <PaginaCuatroDatosMinaUno
              v-if="m_paso4"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos'"
              :titulo_pagina="'Datos del Yacimiento Parte 1'"
              :numero_expdiente="form.numero_expdiente"
              :numero_expdiente_valido="form.numero_expdiente_valido"
              :numero_expdiente_correcto="form.numero_expdiente_correcto"
              :obs_numero_expdiente="form.obs_numero_expdiente"
              :obs_numero_expdiente_valido="form.obs_numero_expdiente_valido"
              :mostrar_num_exp="$props.mostrar.num_exp"
              :desactivar_num_exp="$props.disables.num_exp"
              :mostrar_num_exp_correccion="$props.mostrar.num_exp_correccion"
              :desactivar_num_exp_correccion="
                $props.disables.num_exp_correccion
              "
              :categoria="form.categoria"
              :categoria_validacion="form.categoria_validacion"
              :categoria_correcto="form.categoria_correcto"
              :obs_categoria="form.obs_categoria"
              :obs_categoria_valido="form.obs_categoria_valido"
              :mostrar_categoria="$props.mostrar.categoria"
              :desactivar_categoria="$props.disables.categoria"
              :mostrar_categoria_correccion="
                $props.mostrar.categoria_correccion
              "
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
              :minerales_variedad_validacion="
                form.minerales_variedad_validacion
              "
              :minerales_variedad_correcto="form.minerales_variedad_correcto"
              :obs_minerales_variedad="form.obs_minerales_variedad"
              :obs_minerales_variedad_valido="
                form.obs_minerales_variedad_valido
              "
              :mostrar_minerales="$props.mostrar.minerales"
              :desactivar_minerales="$props.disables.minerales"
              :mostrar_minerales_correccion="
                $props.mostrar.minerales_correccion
              "
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
              :mostrar_resolucion_concesion="
                $props.mostrar.resolucion_concesion
              "
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
              :mostrar_boton_guardar_cuatro="
                $props.mostrar.boton_guardar_cuatro
              "
              :desactivar_boton_guardar_cuatro="
                $props.disables.boton_guardar_cuatro
              "
              :evaluacion="evaluacion_global"
              :id="form.id"
              :testing="testing_global"
              v-on:changevalorcategoria="update_categoria($event)"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Datos de la Mina', $event)
              "
            >
            </PaginaCuatroDatosMinaUno>

            <div id="section_datos_mina_dos"></div>
            <PaginaCincoDatosMinaDos
              v-if="m_paso5"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos'"
              :titulo_pagina="'Datos del Yacimiento Parte 2'"
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
              :mostrar_concesion_correccion="
                $props.mostrar.concesion_correccion
              "
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
              :mostrar_actividad_correccion="
                $props.mostrar.actividad_correccion
              "
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
              :id="form.id"
              :testing="testing_global"
              :categoria="form.categoria"
              :accion = "crear"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Datos de Mina Segunda Parte', $event)
              "
            >
              <!-- :mostrar_boton_catamarca="$props.mostrar.boton_catamarca" -->
              <!-- :desactivar_boton_catamarca="$props.disables.boton_catamarca" -->
            </PaginaCincoDatosMinaDos>

            <div id="section_datos_mina_ubicacion"></div>
            <PaginaSeisDatosUbicacionMina
              v-if="m_paso6"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos de Mina Segunda Parte'"
              :titulo_pagina="'Ubicación de Mina'"
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
              :desactivar_boton_guardar_seis="
                $props.disables.boton_guardar_seis
              "
              :evaluacion="evaluacion_global"
              :id="form.id"
              :testing="testing_global"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Ubicación de Mina', $event)
              "
            >
            </PaginaSeisDatosUbicacionMina>

            <div
              id="section_catamarca"
              v-if="$props.mostrar.paso_catamarca"
            ></div>
            <PaginaCatamarca
              v-if="m_catamarca && $props.mostrar.paso_catamarca"
              :link_volver="'#'"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos'"
              :titulo_pagina="'Datos Extras de la Provincia'"
              :evaluacion="evaluacion_global"
              :testing="testing_global"
              :id="form.id"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Catamarca', $event)
              "
            >
            </PaginaCatamarca>

            <div id="section_tucuman" v-if="$props.mostrar.paso_tucuman"></div>
            <PaginaTucuman
              v-if="m_tucuman && $props.mostrar.paso_tucuman"
              :link_volver="'#'"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos'"
              :titulo_pagina="'Datos Extras de la Provincia'"
              :evaluacion="evaluacion_global"
              :testing="testing_global"
              :id="form.id"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Tucuman', $event)
              "
            >
            </PaginaTucuman>

            <div id="section_mendoza" v-if="$props.mostrar.paso_mendoza"></div>
            <PaginaMendoza
              v-if="m_mendoza && $props.mostrar.paso_mendoza"
              :link_volver="route('formulario-alta.index')"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar'"
              :titulo_pagina="'Mendoza'"
              :evaluacion="evaluacion_global"
              :testing="testing_global"
              :id="form.id"
              :editar="false"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Mendoza', $event)
              "
            >
            </PaginaMendoza>

            <div id="section_salta" v-if="true"></div>
            <PaginaSalta
              v-if="true"
              :link_volver="'#'"
              :titulo_boton_volver="'Volver'"
              :titulo_boton_guardar="'Guardar Datos'"
              :titulo_pagina="'Datos Extras de la Provincia'"
              :evaluacion="evaluacion_global"
              :testing="testing_global"
              :id="form.id"
              v-on:mostrarpasosiguiente="
                mostar_paso_siguiente('Tucuman', $event)
              "
            >
            </PaginaSalta>

            <div id="finalizar"></div>
            <div
              class="
                border-2
                rounded
                shadow-lg
                w-full
                py-4
                px-8
                bg-white
                mb-20
                mt-10
                border-indigo-100
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
                    :value="''"
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
                    :value="''"
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
                    :value="''"
                    v-on:ValueInput="update_input_dni($event)"
                  ></InputComponente>
                </div>
              </div>
              <div class="flex flex-wrap">
                <div
                  class="
                    w-full
                    sm:w-1/1
                    md:w-1/1
                    lg:w-1/1
                    xl:w-1/1
                    2xl:w-1/1
                    px-3
                    mb-6
                    md:mb-0
                  "
                >
                  <InputComponente
                    :titulo="'Observacion'"
                    :tipo="'text'"
                    :placeholder="'Agregue alguna obervación'"
                    :value="form.observacion"
                    v-on:ValueInput="update_input_observacion($event)"
                  ></InputComponente>
                </div>
              </div>
              <div class="flex flex-wrap">
                <!-- <div
                  class="w-full sm:w-2/2 md:w-2/2 xl:w-3/3 px-3 mb-6 md:mb-0"
                >
                  <label
                    class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                    for="name"
                    >Creado Por:</label
                  >
                  <input
                    id="cuit"
                    disabled
                    v-model="form.created_by"
                    class="border py-2 px-3 text-grey-darkest"
                  />
                </div> -->
                <div
                  class="w-full sm:w-2/2 md:w-2/2 xl:w-3/3 px-3 mb-6 md:mb-2"
                >
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-2
                    "
                    for="estado"
                    >Estado Actual</label
                  >
                  <span
                    v-if="form.estado === 'en proceso'"
                    class="
                      bg-purple-200
                      text-purple-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >En proceso</span
                  >
                  <span
                    v-if="form.estado === 'borrador'"
                    class="
                      bg-pink-200
                      text-pink-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >Borrador</span
                  >
                  <span
                    v-if="form.estado === 'aprobado'"
                    class="
                      bg-green-200
                      text-green-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >Aprobado</span
                  >
                  <span
                    v-if="form.estado === 'en revision'"
                    class="
                      bg-yellow-200
                      text-yellow-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >En revision</span
                  >
                  <span
                    v-if="form.estado === 'con observacion'"
                    class="
                      bg-gray-200
                      text-gary-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >Con Obesrvacion</span
                  >
                  <span
                    v-if="form.estado === 'reprobado'"
                    class="
                      bg-red-200
                      text-red-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >Reprobado</span
                  >
                  <span
                    v-if="form.estado === 'sin guardar'"
                    class="
                      bg-red-200
                      text-red-600
                      py-3
                      px-3
                      text-xs
                      uppercase
                      w-full
                      flex
                      rounded-lg
                    "
                    >Sin Guardar</span
                  >
                </div>
              </div>
              <br />
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
                >
                  <inertia-link
                    :href="route('formulario-alta.index')"
                    class="
                      uppercase
                      mx-auto
                      py-3
                      px-5
                      text-white
                      border border-gray-400
                      bg-gray-400
                      shadow-md
                      font-bold
                      hover:text-white
                      hover:shadow-xl
                      hover:bg-red-700
                      hover:border-red-700
                    "
                  >
                    Volver Atras
                  </inertia-link>
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
                  <button
                    v-if="!evaluacion_global"
                    @click="abrirModalPresentar"
                    :disabled="$props.disables.boton_actualizar"
                    class="
                      uppercase
                      mx-auto
                      py-3
                      px-5
                      text-white
                      border border-blue-500
                      bg-blue-500
                      shadow-md
                      font-bold
                      hover:text-white hover:shadow-xl hover:bg-blue-700
                    "
                  >
                    <!-- {{ nombre_boton_actualizar }} -->
                    Presentar
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <ButtonFixed :buttons="buttonsFixed" @showModal="handleClick" />
      <jet-dialog-modal
        :show="showModalPasos"
        class="w-10/12"
        @close="closeModalBtn"
      >
        <template #title>
          {{ buttonsFixed.modal[0].title }}
        </template>
        <template #content>
          {{ buttonsFixed.modal[0].body }}
          <Pasos class="mt-10" />
        </template>
        <template #footer>
          <jet-button class="ml-2" @click="closeModalBtn">
            Entendido
          </jet-button>
        </template>
      </jet-dialog-modal>
    </div>
  </app-layout>
</template>
<script>
import ButtonFixed from "@/Components/ButtonFixed";
import JetButton from "@/Jetstream/Button";
import Swal from "sweetalert2";
import InputComponente from "../../Components/InputText.vue";

import AppLayout from "@/Layouts/AppLayout";
import Banner from "@/Jetstream/Banner";
import Modal from "@/Jetstream/Modal";
import JetDialogModal from "@/Jetstream/DialogModal";
import CardProductor from "@/Jetstream/altas/CardProductor";
import CardDomLegal from "@/Jetstream/altas/CardDomLegal";
import CardDomAdmin from "@/Jetstream/altas/CardDomAdmin";
import CardMinaUno from "@/Jetstream/altas/CardMinaUno";
import CardMinaDos from "@/Jetstream/altas/CardMinaDos";
import CardMinaUbicacion from "@/Jetstream/altas/CardMinaUbicacion";
import CardCatamarca from "@/Jetstream/altas/CardCatamarca";
import CardTotal from "@/Jetstream/altas/CardTotal";
import PasoUnoEdit from "@/Pages/Productors/PasoUnoEdit";

import PaginaUnoDatosProductores from "@/Pages/Productors/PaginaUnoDatosProductores";
import PaginaDosDatosDomLegal from "@/Pages/Productors/PaginaDosDatosDomLegal";
import PaginaCuatroDatosMinaUno from "@/Pages/Productors/PaginaCuatroDatosMinaUno";
import PaginaCincoDatosMinaDos from "@/Pages/Productors/PaginaCincoDatosMinaDos";
import PaginaSeisDatosUbicacionMina from "@/Pages/Productors/PaginaSeisDatosUbicacionMina";
import PaginaCatamarca from "@/Pages/Productors/PaginaCatamarca";
import PaginaTucuman from "@/Pages/Productors/PaginaTucuman";
import PaginaSalta from "@/Pages/Productors/PaginaSalta";
import PaginaMendoza from "@/Pages/Productors/PaginaMendoza";
import PaginaSalta from "@/Pages/Productors/PaginaSalta";

import Pasos from "@/Pages/Common/PasosParaInscribirseProd";
import ValidationErrors from "../../Jetstream/ValidationErrors.vue";

import provincias from "../../../../helpers/enums/provincias";
// import { Router } from "@inertiajs/inertia/types/router";

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
    CardCatamarca,
    CardTotal,
    PasoUnoEdit,

    PaginaUnoDatosProductores,
    PaginaDosDatosDomLegal,
    PaginaCuatroDatosMinaUno,
    PaginaCincoDatosMinaDos,
    PaginaSeisDatosUbicacionMina,
    PaginaCatamarca,
    PaginaTucuman,
    PaginaSalta,
    PaginaMendoza,
    PaginaSalta,
    ValidationErrors,
    Pasos,
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
    "productor_particular",
    "nombre_provincia",
  ],
  data() {
    return {
      m_paso2: false,
      m_paso3: false,
      m_paso4: false,
      m_paso5: false,
      m_paso6: false,
      m_catamarca: false, //Catamarca
      m_tucuman: false, //Tucuman
      m_mendoza: false, //Mendoza
      m_salta: false, //Salta
      evaluacion_global: this.$props.soy_autoridad_minera,
      testing_global: this.$props.soy_administrador,
      mostrar_modal_datos_ya_guardados: false,

      lista_provincias: [],
      lista_dptos_legal: [],
      lista_dptos_admin: [],
      lista_dptos_mina: [],
      mostrar_boton_aprobar: false,
      nombre_boton_actualizar: "Guardar",
      mostrar_boton_aprobar_de_todos_modos: false,
      lista_de_minerales_del_back: this.$props.lista_minerales_cargados,
      form: {
        id: this.$props.productor.id,

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

        leal_pais: this.$props.productor.leal_pais,
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
        administracion_calle_correcto: "nada",
        obs_administracion_calle_nombre: "",
        obs_administracion_calle_nombre_valido: false,

        administracion_numero: this.$props.productor.administracion_numero,
        administracion_numero_valido: true,
        administracion_numero_correcto: "nada",
        obs_administracion_numero_nombre: "",
        obs_administracion_numero_nombre_valido: false,

        administracion_telefono: this.$props.productor.administracion_telefono,
        administracion_telefono_valido: true,
        administracion_telefono_correcto: "nada",
        obs_administracion_telefono_nombre: "",
        obs_administracion_telefono_nombre_valido: false,

        administracion_pais: this.$props.productor.administracion_pais,
        administracion_pais_valido: true,
        administracion_pais_correcto: "nada",
        obs_administracion_pais: "",
        obs_administracion_pais_valido: false,

        administracion_provincia:
          this.$props.productor.administracion_provincia,
        administracion_provincia_valido: true,
        administracion_provincia_correcto: "nada",
        obs_administracion_provincia: "",
        obs_administracion_provincia_valido: false,

        administracion_departamento:
          this.$props.productor.administracion_departamento,
        administracion_departamento_valido: true,
        administracion_departamento_correcto: "nada",
        obs_administracion_departamento: "",
        obs_administracion_departamento_valido: false,

        administracion_localidad:
          this.$props.productor.administracion_localidad,
        administracion_localidad_valido: true,
        administracion_localidad_correcto: "nada",
        obs_administracion_localidad: "",
        obs_administracion_localidad_valido: false,

        administracion_cp: this.$props.productor.administracion_cp,
        administracion_cp_valido: true,
        administracion_cp_correcto: "nada",
        obs_administracion_cp: "",
        obs_administracion_cp_valido: false,

        administracion_otro: this.$props.productor.administracion_otro,
        administracion_otro_valido: true,
        administracion_otro_correcto: "nada",
        obs_administracion_otro: "",
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
        minerales_variedad_correcto: "nada",
        obs_minerales_variedad: "",
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
        otros_input: this.$props.productor.otro_caracter_aclaracion,
        otros_input_valido: true,

        sustancias: this.$props.productor.sustancias_de_aprovechamiento_comun,
        sustancias_correcto:
          this.$props.productor.sustancias_de_aprovechamiento_comun_correcto,
        obs_sustancias:
          this.$props.productor.obs_sustancias_de_aprovechamiento_comun,
        obs_sustancias_valido: false,
        sustancias_input: this.$props.productor.concesion_minera_aclaracion,
        sustancias_input_valido: true,

        titulo_contrato_posecion:
          this.$props.productor.titulo_contrato_posecion,
        titulo_contrato_posecion_validacion: true,
        titulo_contrato_posecion_correcto: "nada",
        obs_titulo_contrato_posecion: "",
        obs_titulo_contrato_posecion_valido: false,

        resolucion_concesion_minera:
          this.$props.productor.resolucion_concesion_minera,
        resolucion_concesion_minera_validacion: true,
        resolucion_concesion_minera_correcto: "nada",
        obs_resolucion_concesion_minera: "",
        obs_resolucion_concesion_minera_valido: false,

        constancia_pago_canon: this.$props.productor.constancia_pago_canon,
        constancia_pago_canon_validacion: true,
        constancia_pago_canon_correcto: "nada",
        obs_constancia_pago_canon: "",
        obs_constancia_pago_canon_valido: false,

        iia: this.$props.productor.iia,
        iia_canon_validacion: true,
        iia_correcto: "nada",
        obs_iia_canon: "",
        obs_iia_canon_valido: false,

        dia: this.$props.productor.dia,
        dia_canon_validacion: true,
        dia_correcto: "nada",
        obs_dia_canon: "",
        obs_dia_canon_valido: false,

        acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
        acciones_a_desarrollar_validacion: true,
        acciones_a_desarrollar_correcto: "nada",
        obs_acciones_a_desarrollar: "",
        obs_acciones_a_desarrollar_valido:
          this.$props.productor.concesion_minera_aclaracion,

        actividad: this.$props.productor.actividad,
        actividad_a_desarrollar_validacion: true,
        actividad_a_desarrollar_correcto: "nada",
        obs_actividad_a_desarrollar: "",
        obs_actividad_a_desarrollar_valido: false,

        fecha_alta_dia: this.$props.productor.fecha_alta_dia,
        fecha_alta_dia_validacion: true,
        fecha_alta_dia_correcto: "nada",
        obs_fecha_alta_dia: "",
        obs_fecha_alta_dia_valido: false,

        fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
        fecha_vencimiento_dia_validacion: true,
        fecha_vencimiento_dia_correcto: "nada",
        obs_fecha_vencimiento_dia: "",
        obs_fecha_vencimiento_dia_valido: false,

        // PASO 6
        valor_de_progreso_seis: 100,
        valor_de_aprobado_seis: 100,
        valor_de_reprobado_seis: 100,

        localidad_mina_pais: this.$props.productor.localidad_mina_pais,
        localidad_mina_pais_validacion: true,
        localidad_mina_pais_correcto: "nada",
        obs_localidad_mina_pais: "",
        obs_localidad_mina_pais_valido: false,

        localidad_mina_provincia:
          this.$props.productor.localidad_mina_provincia,
        localidad_mina_provincia_validacion: true,
        localidad_mina_provincia_correcto: "nada",
        obs_localidad_mina_provincia: "",
        obs_localidad_mina_provincia_valido: false,

        localidad_mina_departamento:
          this.$props.productor.localidad_mina_departamento,
        localidad_mina_departamento_validacion: true,
        localidad_mina_departamento_correcto: "nada",
        obs_localidad_mina_departamento: "",
        obs_localidad_mina_departamento_valido: false,

        localidad_mina_localidad:
          this.$props.productor.localidad_mina_localidad,
        localidad_mina_localidad_validacion: true,
        localidad_mina_localidad_correcto: "nada",
        obs_localidad_mina_localidad: "",
        obs_localidad_mina_localidad_valido: false,

        tipo_sistema: this.$props.productor.tipo_sistema,
        tipo_sistema_validacion: true,
        tipo_sistema_correcto: "nada",
        obs_tipo_sistema: "",
        obs_tipo_sistema_valido: false,

        latitud: this.$props.productor.latitud,
        latitud_validacion: true,
        latitud_correcto: "nada",
        obs_latitud: "",
        obs_latitud_valido: false,

        longitud: this.$props.productor.longitud,
        longitud_validacion: true,
        longitud_correcto: "nada",
        obs_longitud: "",
        obs_longitud_valido: false,

        created_by: this.$props.productor.created_by,
        estado: "sin guardar",

        presentador_nombre: this.$props.productor.presentador_nombre,
        presentador_dni: this.$props.productor.presentador_dni,
        cargo_empresa: this.$props.productor.cargo_empresa,
        observacion: this.$props.productor.observacion,
      },
      form_particular: {
        id: this.$props.productor.id,

        gestor_nombre_apellido:
          this.$props.productor_particular.gestor_nombre_apellido,
        gestor_nombre_apellido_valido: true,
        gestor_nombre_apellido_correcto:
          this.$props.productor_particular.gestor_nombre_apellido,
        obs_gestor_nombre_apellido:
          this.$props.productor_particular.obs_gestor_nombre_apellido,
        obs_gestor_nombre_valido: true,

        gestor_dni: this.$props.productor_particular.gestor_dni,
        gestor_dni_valido: true,
        gestor_dni_correcto: this.$props.productor_particular.gestor_dni,
        obs_gestor_dni: this.$props.productor_particular.obs_gestor_dni,
        obs_gestor_dni_valido: true,

        gestor_profesion: this.$props.productor_particular.gestor_profesion,
        gestor_profesion_valido: true,
        gestor_profesion_correcto:
          this.$props.productor_particular.gestor_profesion,
        obs_gestor_profesion:
          this.$props.productor_particular.obs_gestor_profesion,
        obs_gestor_profesion_valido: true,

        gestor_telefono: this.$props.productor_particular.gestor_telefono,
        gestor_telefono_valido: true,
        gestor_telefono_correcto:
          this.$props.productor_particular.gestor_telefono,
        obs_gestor_telefono:
          this.$props.productor_particular.obs_gestor_telefono,
        obs_gestor_telefono_valido: true,

        gestor_notificacion:
          this.$props.productor_particular.gestor_notificacion,
        gestor_notificacion_valido: true,
        gestor_notificacion_correcto:
          this.$props.productor_particular.gestor_notificacion,
        obs_gestor_notificacion:
          this.$props.productor_particular.obs_gestor_notificacion,
        obs_gestor_notificacion_valido: true,

        gestor_email: this.$props.productor_particular.gestor_email,
        gestor_email_valido: true,
        gestor_email_correcto: this.$props.productor_particular.gestor_email,
        obs_gestor_email: this.$props.productor_particular.obs_gestor_email,
        obs_gestor_email_valido: true,

        primer_hoja_dni: this.$props.productor_particular.primer_hoja_dni,
        hoja_dni_valido: true,
        hoja_dni_correcto: this.$props.productor_particular.hoja_dni_correcto,
        obs_hoja_dni: this.$props.productor_particular.obs_hoja_dni,
        obs_hoja_dni_valido: true,

        segunda_hoja_dni: this.$props.productor_particular.segunda_hoja_dni,
        segunda_hoja_dni_valido: true,
        segunda_hoja_dni_correcto:
          this.$props.productor_particular.hoja_dni_correcto,
        obs_segunda_hoja_dni: this.$props.productor_particular.obs_hoja_dni,
        obs_segunda_hoja_dni_valido: true,

        foto_4x4: this.$props.productor_particular.foto_4x4,
        foto_4x4_valido: true,
        foto_4x4_correcto: this.$props.productor_particular.foto_4x4_correcto,
        obs_foto_4x4: this.$props.productor_particular.obs_foto_4x4,
        obs_foto_4x4_valido: true,

        constancia_afip: this.$props.productor_particular.constancia_afip,
        constancia_afip_valido: true,
        constancia_afip_correcto:
          this.$props.productor_particular.constancia_afip_correcto,
        obs_constancia_afip:
          this.$props.productor_particular.obs_constancia_afip,
        obs_constancia_afip_valido: true,

        autorizacion_gestor:
          this.$props.productor_particular.autorizacion_gestor,
        autorizacion_gestor_valido: true,
        autorizacion_gestor_correcto:
          this.$props.productor_particular.autorizacion_gestor_correcto,
        obs_autorizacion_gestor:
          this.$props.productor_particular.obs_autorizacion_gestor,
        obs_autorizacion_gestor_valido: true,

        valor_de_progreso: 100,
        valor_de_aprobado: 100,
        valor_de_reprobado: 100,
      },
      nuevo: this.$props.productor,
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
            ver: false,
          },
          {
            label: "Domicilio de Administración",
            url: "#section_domicilio_administrativo",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Datos de la Mina",
            url: "#section_mina_uno",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Datos de Mina Segunda Parte",
            url: "#section_datos_mina_dos",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Ubicación de Mina",
            url: "#section_datos_mina_ubicacion",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Catamarca",
            url: "#section_catamarca",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Mendoza",
            url: "#section_mendoza",
            color: "bg-indigo-500 hover:bg-indigo-800",
            ver: false,
          },
          {
            label: "Finalizar Proceso",
            url: "#finalizar",
            color: "bg-red-500 hover:bg-red-800",
            ver: true,
          },
        ],
        modal: [
          {
            label: "Ayuda Borradores",
            show: false,
            title: "Explicación de alta de Productores Mineros",
            body: "En este formulario usted puede presentar la solicitud de alta de productor minero. Con esta acción usted demuestra interes en inscribirse como tal, pervio a una evaluación de su solicitud (el presente formulario).",
          },
        ],
      },
      showModalPasos: false,
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
    closeModalBtn() {
      this.showModalPasos = false;
    },

    submit() {
      let self = this;
      //console.log("el id es:",this.form.id);
      if (typeof this.form.id !== "undefined" && self.form.id != null) {
        /*this.$inertia.put(
					route("productors.update", this.form.id),
					this.form
				);*/
        // console.log("Entre al if xq:"+self.form.id);
      } else {
        // aun no tiene el id definido asiq no puedo enviar las cosas
        /* this.AvisoAprueba = true;
				this.modal_tittle_apro = "Formulario aun no guardado";
				this.modal_body_apro = "Usted debe guardar el paso 1 antes de presentar el formulario";
				this.mostrar_boton_aprobar = false;
				this.mostrar_boton_aprobar_de_todos_modos = false;
 */
        // console.log("No puedo enviar el form");
      }
    },

    update_categoria(value) {
      this.form.categoria = value;
    },
    // closeModal() {
    // this.confirmingUserDeletion = false;
    //this.form.reset()
    // },
    closeModalPresentado() {
      // this.modalFormularioPresentado = false;
      this.$inertia.get(route("productors.update", this.form.id));
      //this.form.reset()
    },
    calcular_nombre_boton(valor) {
      switch (valor) {
        case "presentar":
          this.nombre_boton_actualizar = "Presentar Solicitud";
          break;
        case "borrador":
          this.nombre_boton_actualizar = "Guardar Solicitud";
          break;
      }
    },

    // closeModalAprobar() {
    //   this.AvisoAprueba = false;
    // },
    abrirModalPresentar() {
      let form_evaluacion_valida = "";
      var titulo = "¿Presentar solicitud de Productor?";
      var subtitulo = "";
      var htmltitulo = "";
      form_evaluacion_valida = this.evaluacion_de_evaluaciones();
      if (form_evaluacion_valida === "") {
        //el formulario esta bien hecho y no tiene observaciones
        subtitulo =
          "Este formulario no posee ninguna observación por tanto, puede ser aprobado sin problemas.";
        this.mostrar_boton_aprobar = true;
        Swal.fire({
          title: titulo,
          text: subtitulo,
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, Presentar!",
        }).then((result) => {
          if (result.isConfirmed) {
            this.guardar_avances_todo();
          }
        });
        // this.mostrar_boton_aprobar_de_todos_modos = false; //no funciona
      } else {
        subtitulo =
          "Este formulario posee observaciones por tanto, debe revisarlo antes de aprobarlo.";
        htmltitulo = form_evaluacion_valida;
        // this.modal_body_apro =
        //   " \n \n Este formulario posee observaciones por tanto, debe revisarlo antes de aprobarlo" +
        //   form_evaluacion_valida;
        this.mostrar_boton_aprobar = false;
        Swal.fire({
          title: titulo,
          // text: subtitulo,
          html: subtitulo + htmltitulo,
          icon: "warning",
          showCancelButton: true,
          showConfirmButton: false,
          cancelButtonColor: "#d33",
        });
        // this.mostrar_boton_aprobar_de_to.dos_modos = true; //no funciona
      }
    },
    evaluacion_de_evaluaciones() {
      let sin_problemas = "";
      //poner los requeried or not
      if (this.form.razon_social_correcto === false)
        sin_problemas += "<br/> La Razon Social ha sido Reprobada.";
      if (this.form.razon_social_correcto === "nada")
        sin_problemas += "<br/> La Razon Social no ha sido evaluada.";
      if (this.form.cuit_correcto === false)
        sin_problemas += "<br/> El CUIT ha sido Reprobado.";
      if (this.form.cuit_correcto === "nada")
        sin_problemas += "<br/> El CUIR no ha sido evaluado.";
      if (this.form.numeroproductor_correcto === false)
        sin_problemas += "<br/> El Numero de Productor ha sido Reprobado.";
      if (this.form.numeroproductor_correcto === "nada")
        sin_problemas += "<br/> El Numero de Productor no ha sido evaluado.";
      if (this.form.tiposociedad_correcto === false)
        sin_problemas += "<br/> El tipo de sociedad ha sido Reprobado.";
      if (this.form.tiposociedad_correcto === "nada")
        sin_problemas += "<br/> El tipo de sociedad no ha sido evaluado.";
      if (this.form.inscripciondgr_correcto === false)
        sin_problemas += "<br/> La inscripcion de la DGR ha sido Reprobada.";
      if (this.form.inscripciondgr_correcto === "nada")
        sin_problemas += "<br/> La inscripcion de la DGR no ha sido evaluada.";
      if (this.form.constaciasociedad_correcto === false)
        sin_problemas += "<br/> La constancia de Sociedad ha sido Reprobada.";
      if (this.form.constaciasociedad_correcto === "nada")
        sin_problemas += "<br/> La constacia de Sociedad no ha sido evaluada.";
      return sin_problemas;
    },

    guardar_avances_todo: function () {
      // if (this.form.estado === "presentar") {
      if (true) {
        let self = this;
        Swal.fire({
          title: "¡Por favor Espere!",
          html: "Enviando",
          allowOutsideClick: false,
          showConfirmButton: false,
          willOpen: () => {
            Swal.showLoading();
          },
        });
        // Make a request for a user with a given ID
        axios
          .post("/formularios/presentar_borrador", {
            id: self.form.id,
            // estado: self.form.estado,
            estado: "en revision",
            es_evaluacion: self.evaluacion_global,
            //agrego los campos dni , cargo y nombre
            nombre_presentador: this.form.presentador_nombre,
            dni_presentador: this.form.presentador_dni,
            cargo_empresa: this.form.cargo_empresa,
            observacion: this.form.observacion,
          })
          .then(function (response) {
            // console.log(response.data);
            Swal.hideLoading(Swal.clickConfirm());
            if (response.data.status === "ok") {
              // self.confirmingUserDeletion = false;
              // self.AvisoAprueba = false;
              // self.modalFormularioPresentado = true;
              // self.modal_tittle = response.data.msg;
              // self.modal_body =
              //   "Se ha guardado correctamente la información . se GUARDO TODO. Gracias";
              // Swal.fire(
              //   "Se ha guardado correctamente la información.",
              //   response.data.msg,
              //   "success"
              // ).then((result) => {
              //   if (result.isConfirmed) {
              //     this.$inertia.get(route("formulario-alta.index"));
              //   }
              // });
              Swal.fire({
                icon: "success",
                title: "Se ha guardado correctamente la información.",
                text: response.data.msg,
              }).then((result) => {
                // window.location.replace("/formulario-alta");
                self.$inertia.get(route("formulario-alta.index"));
              });
            } else {
              // self.AvisoAprueba = false;
              // self.confirmingUserDeletion = false;
              // self.modalFormularioPresentado = true;
              // self.modal_tittle = response.data.msg;
              // self.modal_body =
              //   "Error, por favor comuniquese con el administrador";
              Swal.fire({
                icon: "error",
                title: "Error...",
                text:
                  "Por favor comuniquese con el administrador. " +
                  response.data.msg,
              });
            }
          })
          .catch(function (error) {
            Swal.hideLoading();
            Swal.fire({
              icon: "error",
              title: "Error...",
              text:
                "Se produzco un error a la hora de guardar los datos. ERROR: " +
                error,
            });
            // console.log(error);
          });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error...",
          text: "Seleccione un Estado, distinto de Borrador.",
        });
      }
    },

    update_id_recien_creado_en_abuelo(id_nuevo) {
      // console.log("recibi el id:"+id_nuevo+" - desde el nieto");
      this.form.id = id_nuevo;
    },
    // mostrar_explicacion() {
    //   this.confirmingUserDeletion = true;
    //   this.modal_body =
    //     "En este formulario usted puede presentar la solicitud de alta de productor minero. Con esta acción usted demuestra interes en inscribirse como tal, pervio a una evaluación de su solicitud (el presente formulario).";
    //   this.modal_tittle = "Explicación de alta de Productores Mineros";
    // },

    pasar_los_num_a_boolean() {
      let self = this;
      //voy a pasar los 0 y 1 a false y true, respectivamente
      // console.log("por transformar los ownder");
      if (this.$props.productor.owner === 0) {
        self.form.owner = false;
        self.$props.productor.owner = false;
      } else {
        self.form.owner = true;
        self.$props.productor.owner = true;
      }
      // console.log("el owner es");
      // console.log(self.form.owner);
      if (this.$props.productor.arrendatario === 0) {
        self.form.arrendatario = false;
        self.$props.productor.arrendatario = false;
      } else {
        self.form.arrendatario = true;
        self.$props.productor.arrendatario = true;
      }
      if (this.$props.productor.concesionario === 0) {
        self.form.concesionario = false;
        self.$props.productor.concesionario = false;
      } else {
        self.form.concesionario = true;
        self.$props.productor.concesionario = true;
      }
      if (this.$props.productor.otros === 0) {
        self.form.otros = false;
        self.$props.productor.otros = false;
      } else {
        self.form.otros = true;
        self.$props.productor.otros = true;
      }
      if (this.$props.productor.sustancias === 0) {
        self.form.sustancias = false;
        self.$props.productor.sustancias = false;
      } else {
        self.form.sustancias = true;
        self.$props.productor.sustancias = true;
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
    update_razon_social_evaluacion(valorEvaluacion) {
      this.form.razon_social_correcto = valorEvaluacion;
    },
    update_cuit_evaluacion(valorEvaluacion) {
      this.form.cuit_correcto = valorEvaluacion;
    },
    update_input_observacion(value) {
      this.form.observacion = value;
    },
    update_input_nombre(value) {
      // console.log("Resultado del Input Nombre");
      this.form.presentador_nombre = value;
    },
    update_input_dni(value) {
      // console.log("Resultado del Input DNI");
      this.form.presentador_dni = value;
    },
    update_input_cargo_empresa(value) {
      // console.log("Resultado del Input Cargo de Empresa");
      this.form.cargo_empresa = value;
    },
    update_num_prod_evaluacion(valorEvaluacion) {
      this.form.numeroproductor_correcto = valorEvaluacion;
    },
    update_tipo_sociedad_evaluacion(valorEvaluacion) {
      this.form.tiposociedad_correcto = valorEvaluacion;
    },
    update_inscripcion_dgr_evaluacion(valorEvaluacion) {
      this.form.inscripciondgr_correcto = valorEvaluacion;
    },
    update_constancia_sociedad_evaluacion(valorEvaluacion) {
      this.form.constaciasociedad_correcto = valorEvaluacion;
    },
    update_id_nuevo(valorEvaluacion) {
      this.form.id = valorEvaluacion;
      this.form.estado = "borrador";
    },
    update_id_adicional_nuevo(valorEvaluacion) {
      this.form_particular.id = valorEvaluacion;
    },
    mostar_paso_siguiente(paso, valor) {
      switch (paso) {
        case "Datos del Productor":
          //Habilita módulo Domicilio Legal
          this.m_paso2 = valor;
          break;
        case "Domicilio Legal":
          //Habilita módulo Domicilio Administrativo
          this.m_paso3 = valor;
          break;
        case "Domicilio de Administración":
          //Habilita módulo Datos de Mina
          this.m_paso4 = valor;
          break;
        case "Datos de la Mina":
          //Habilita módulo Datos Mina 2da
          this.m_paso5 = valor;
          break;
        case "Datos de Mina Segunda Parte":
          //Habilita módulo Ubicación Mina
          this.m_paso6 = valor;
          break;
        case "Ubicación de Mina":
          //Habilita módulo Catamarca o Mendoza o Final
          // console.log("Provincia: ", this.$inertia.page.props.user.id_provincia);
          // console.log("Provincia: ", this.$inertia.page.props.user.provincia);
          if (this.$inertia.page.props.user.id_provincia == 10)
            this.m_catamarca = valor;
          if (this.$inertia.page.props.user.id_provincia == 50)
            this.m_mendoza = valor;
          if (this.$inertia.page.props.user.id_provincia == 66)
            this.m_salta = valor;
          if (this.$inertia.page.props.user.id_provincia == 90)
            this.m_tucuman = valor;
          break;
        case "Catamarca":
          // this.m_paso6 = valor;
          break;
        case "Mendoza":
          // this.m_paso6 = valor;
          break;
        case "Tucuman":
          // this.m_paso6 = valor;
          break;
        default:
          // this.m_paso7 = valor;
          break;
      }
      this.update_menu_flotante(paso, valor);
    },
    update_menu_flotante(paso, value) {
      // console.log("cantidad = ", this.buttonsFixed.links.length);
      let id = this.buttonsFixed.links.findIndex(
        (element) => element.label == paso
      );
      id = id + 1;
      if (
        paso != "Mendoza" &&
        paso != "Catamarca" &&
        paso != "Ubicación de Mina"
      ) {
        this.buttonsFixed.links[id].ver = value;
        window.location.href = this.buttonsFixed.links[id].url;
      } else {
        if (paso == "Ubicación de Mina") {
          let id_provincia = this.$inertia.page.props.user.id_provincia;
          if (id_provincia != 50 && id_provincia != 10) {
            let id_final = this.buttonsFixed.links.findIndex(
              (element) => element.label == "Finalizar Proceso"
            );
            // this.buttonsFixed.links[id_final].ver = true;
            window.location.href = this.buttonsFixed.links[id_final].url;
          } else {
            let id_CatMen = this.buttonsFixed.links.findIndex(
              (element) =>
                element.label == this.$inertia.page.props.user.provincia
            );
            this.buttonsFixed.links[id_CatMen].ver = value;
            window.location.href = this.buttonsFixed.links[id_CatMen].url;
          }
        }
        if (paso == "Mendoza" || paso == "Catamarca") {
          window.location.href =
            this.buttonsFixed.links[this.buttonsFixed.links.length - 1].url;
        }
      }
    },
    mandarDomicilioAlHijo($value) {
      this.form.administracion_calle = this.form.leal_calle;
      this.form.administracion_numero = this.form.leal_numero;
      this.form.administracion_telefono = this.form.leal_telefono;
      this.form.administracion_provincia = this.form.leal_provincia;
      this.form.administracion_departamento = this.form.leal_departamento;
      this.form.administracion_localidad = this.form.leal_localidad;
      this.form.administracion_cp = this.form.leal_cp;
      this.form.administracion_otro = this.form.leal_otro;
      // console.log("ya copie todo");
      // console.log(
      //   this.form.administracion_calle, Ruta Nacional 40
      //   this.form.administracion_numero, 3422
      //   this.form.administracion_telefono, 4941245
      //   this.form.administracion_provincia, 10
      //   this.form.administracion_departamento, 10035
      //   this.form.administracion_localidad, Capital
      //   this.form.administracion_cp, 5435
      //   this.form.administracion_otro Movimiento de minerales
      // );
    },
    UpdateCalleNombre($value) {
      if ($value.lugar === "legal") this.form.leal_calle = $value.nombre;
      else this.form.administracion_calle = $value.nombre;
    },
    UpdateCalleNum($value) {
      if ($value.lugar === "legal") this.form.leal_numero = $value.nombre;
      else this.form.administracion_numero = $value.nombre;
    },
    UpdateTel($value) {
      if ($value.lugar === "legal") this.form.leal_telefono = $value.nombre;
      else this.form.administracion_telefono = $value.nombre;
    },
    UpdateProv($value) {
      if ($value.lugar === "legal") this.form.leal_provincia = $value.nombre;
      else this.form.administracion_provincia = $value.nombre;
    },
    UpdateDpto($value) {
      if ($value.lugar === "legal") this.form.leal_departamento = $value.nombre;
      else this.form.administracion_departamento = $value.nombre;
    },
    UpdateLocalidad($value) {
      if ($value.lugar === "legal") this.form.leal_localidad = $value.nombre;
      else this.form.administracion_localidad = $value.nombre;
    },
    UpdateCP($value) {
      if ($value.lugar === "legal") this.form.leal_cp = $value.nombre;
      else this.form.administracion_cp = $value.nombre;
    },
    UpdateOtro($value) {
      if ($value.lugar === "legal") this.form.leal_otro = $value.nombre;
      else this.form.administracion_otro = $value.nombre;
    },
  },
};
</script>