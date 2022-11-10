<template>
  <div>
    <div class="items-center justify-left">
      <Card
        :icono="'/formulario_alta/imagenes/logo-salta.png'"
        :titulo="titulo_pagina"
        :clase_sup="'gap-6'"
        :clase_inf="'border shadow-lg relative py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6'"
        :show="mostrar_modulo"
        v-on:ocultarmodulo="update_valor_ocultar_modulo($event)"
      ></Card>
    </div>
    <div v-if="mostrar_modulo" class="shadow-lg w-full py-4 px-8 bg-white">
      <div class="items-center justify-left sticky top-1 z-10">
        <Menu
          :mostrarayuda="true"
          :ayuda="ayuda_local"
          :evaluacion="evaluacion_adm"
          :mostrar_evaluacion="mostrar_evaluacion_adm"
          :continuar="continuar_pagina"
          v-on:changevalorayuda="update_valor_ayuda_local($event)"
          v-on:continuarpagina="update_valor_pagina_siguiente($event)"
          v-on:change_valor_evaluacion="update_valor_evaluacion_Adm($event)"
        ></Menu>
      </div>
      <!-- Seleccionar Tipo de Registro -->
      <div class="flex flex-wrap">
        <div class="w-full px-3 mb-2 md:mb-2">
          <SelectGeneric
            v-if="permisos_mostrar.tipo"
            v-bind:titulo="'Seleccione tipo de Registro'"
            v-bind:valueSelectInicial="tipopersona"
            v-bind:classSelect="'appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white'"
            v-bind:listOptions="arrayTipoPersona"
            v-on:ChangeValorSelect="update_valor($event)"
          >
          </SelectGeneric>
        </div>
      </div>
      <label
        class="
          block
          uppercase
          tracking-wide
          text-gray-700 text-md
          font-bold
          mb-2
        "
        >Datos del Representante Legal</label
      >
      <!-- Representante Legal -->
      <div class="flex flex-wrap">
        <!-- Apellido Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_apellido"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_apellido"
            v-bind:valor_input_props="
              form_salta_test.representante_legal_apellido
            "
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_apellido_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_apellido_correcto
            "
            v-bind:valor_obs="form_salta_test.representante_legal_apellido_obs"
            v-bind:valor_valido_obs="
              form_salta_test.representante_legal_apellido_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Apellido:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.representante_legal_apellido
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Apellido del Representante Legal'"
            v-on:changevalor="update_representante_legal_apellido($event)"
            v-on:changevalido="
              update_representante_legal_apellido_valido($event)
            "
            v-on:changecorrecto="
              update_representante_legal_apellido_correcto($event)
            "
            v-on:changeobs="update_representante_legal_apellido_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Nombre Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_nombre"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_nombre"
            v-bind:valor_input_props="
              form_salta_test.representante_legal_nombre
            "
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_nombre_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_nombre_correcto
            "
            v-bind:valor_obs="form_salta_test.representante_legal_nombre_obs"
            v-bind:valor_valido_obs="
              form_salta_test.representante_legal_nombre_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nombre:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.representante_legal_nombre
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nombre del Representante Legal'"
            v-on:changevalor="update_representante_legal_nombre($event)"
            v-on:changevalido="update_representante_legal_nombre_valido($event)"
            v-on:changecorrecto="
              update_representante_legal_nombre_correcto($event)
            "
            v-on:changeobs="update_representante_legal_nombre_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- DNI Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_dni"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_dni"
            v-bind:valor_input_props="form_salta_test.representante_legal_dni"
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_dni_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_dni_correcto
            "
            v-bind:valor_obs="form_salta_test.form_representante_legal_dni_obs"
            v-bind:valor_valido_obs="
              form_salta_test.form_representante_legal_dni_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI :'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.representante_legal_dni"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'DNI del Representante Legal'"
            v-on:changevalor="update_representante_legal_dni($event)"
            v-on:changevalido="update_representante_legal_dni_valido($event)"
            v-on:changecorrecto="
              update_representante_legal_dni_correcto($event)
            "
            v-on:changeobs="update_representante_legal_dni_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- Email Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_email"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_email"
            v-bind:valor_input_props="form_salta_test.representante_legal_email"
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_email_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_email_correcto
            "
            v-bind:valor_obs="form_salta_test.representante_legal_email_obs"
            v-bind:valor_valido_obs="
              form_salta_test.representante_legal_email_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Email:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.representante_legal_email
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Email del Representante Legal'"
            v-on:changevalor="update_representante_legal_email($event)"
            v-on:changevalido="update_representante_legal_email_valido($event)"
            v-on:changecorrecto="
              update_representante_legal_email_correcto($event)
            "
            v-on:changeobs="update_representante_legal_email_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Cargo Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_cargo"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_cargo"
            v-bind:valor_input_props="form_salta_test.representante_legal_cargo"
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_cargo_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_cargo_correcto
            "
            v-bind:valor_obs="form_salta_test.representante_legal_cargo_obs"
            v-bind:valor_valido_obs="
              form_salta_test.representante_legal_cargo_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Cargo:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.representante_legal_cargo
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Cargo del Representante Legal'"
            v-on:changevalor="update_representante_legal_cargo($event)"
            v-on:changevalido="update_representante_legal_cargo_valido($event)"
            v-on:changecorrecto="
              update_representante_legal_cargo_correcto($event)
            "
            v-on:changeobs="update_representante_legal_cargo_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Telefono Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.telefono"
        >
          <NombreMina
            v-if="permisos_mostrar.telefono"
            v-bind:valor_input_props="form_salta_test.telefono"
            v-bind:valor_input_validacion="form_salta_test.telefono_valido"
            v-bind:evualacion_correcto="form_salta_test.telefono_correcto"
            v-bind:valor_obs="form_salta_test.telefono_obs"
            v-bind:valor_valido_obs="form_salta_test.telefono_obs_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Telefono:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.telefono"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Teléfono del Representante Legal'"
            v-on:changevalor="update_telefono($event)"
            v-on:changevalido="update_telefono_valido($event)"
            v-on:changecorrecto="update_telefono_correcto($event)"
            v-on:changeobs="update_telefono_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- Nacionalidad Representante Legal -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.nacionalidad"
        >
          <NombreMina
            v-if="permisos_mostrar.nacionalidad"
            v-bind:valor_input_props="form_salta_test.nacionalidad"
            v-bind:valor_input_validacion="form_salta_test.nacionalidad_valido"
            v-bind:evualacion_correcto="form_salta_test.nacionalidad_correcto"
            v-bind:valor_obs="form_salta_test.nacionalidad_obs"
            v-bind:valor_valido_obs="form_salta_test.nacionalidad_obs_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nacionalidad:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="permisos_disables.nacionalidad"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nacionalidad del Representante Legal'"
            v-on:changevalor="update_nacionalidad($event)"
            v-on:changevalido="update_nacionalidad_valido($event)"
            v-on:changecorrecto="update_nacionalidad_correcto($event)"
            v-on:changeobs="update_nacionalidad_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Domicilio Representante Legal -->
        <div
          class="w-full md:w-2/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_legal_domicilio"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_legal_domicilio"
            v-bind:valor_input_props="
              form_salta_test.representante_legal_domicilio
            "
            v-bind:valor_input_validacion="
              form_salta_test.representante_legal_domicilio_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.representante_legal_domicilio_correcto
            "
            v-bind:valor_obs="form_salta_test.representante_legal_domicilio_obs"
            v-bind:valor_valido_obs="
              form_salta_test.representante_legal_domicilio_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Domicilio:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="
              permisos_disables.representante_legal_domicilio
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Domicilio del Representante Legal'"
            v-on:changevalor="update_representante_legal_domicilio($event)"
            v-on:changevalido="
              update_representante_legal_domicilio_valido($event)
            "
            v-on:changecorrecto="
              update_representante_legal_domicilio_correcto($event)
            "
            v-on:changeobs="update_representante_legal_domicilio_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <br />
      <label
        class="
          block
          uppercase
          tracking-wide
          text-gray-700 text-md
          font-bold
          mb-2
        "
        >Datos del Responsable Técnico {{ label_responsable_tecnico }}</label
      >
      <!-- Responsable Tecnico -->
      <div class="flex flex-wrap">
        <!-- Apellido Responsable Tecnico -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.responsable_apellido"
        >
          <NombreMina
            v-if="permisos_mostrar.responsable_apellido"
            v-bind:valor_input_props="form_salta_test.responsable_apellido"
            v-bind:valor_input_validacion="
              form_salta_test.responsable_apellido_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.responsable_apellido_correcto
            "
            v-bind:valor_obs="form_salta_test.responsable_apellido_obs"
            v-bind:valor_valido_obs="
              form_salta_test.responsable_apellido_obs_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Apellido:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.responsable_apellido"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Apellido de Responsable Tecnico'"
            v-on:changevalor="update_responsable_apellido($event)"
            v-on:changevalido="update_responsable_apellido_valido($event)"
            v-on:changecorrecto="update_responsable_apellido_correcto($event)"
            v-on:changeobs="update_responsable_apellido_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Nombre Responsable Tecnico -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.responsable_nombre"
        >
          <NombreMina
            v-if="permisos_mostrar.responsable_nombre"
            v-bind:valor_input_props="form_salta_test.responsable_nombre"
            v-bind:valor_input_validacion="
              form_salta_test.responsable_nombre_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.responsable_nombre_correcto
            "
            v-bind:valor_obs="form_salta_test.responsable_nombre_obs"
            v-bind:valor_valido_obs="
              form_salta_test.responsable_nombre_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nombre:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.responsable_nombre"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nombre de Responsable Tecnico'"
            v-on:changevalor="update_responsable_nombre($event)"
            v-on:changevalido="update_responsable_nombre_valido($event)"
            v-on:changecorrecto="update_responsable_nombre_correcto($event)"
            v-on:changeobs="update_responsable_nombre_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- DNI Responsable Tecnico -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.responsable_dni"
        >
          <NombreMina
            v-if="permisos_mostrar.responsable_dni"
            v-bind:valor_input_props="form_salta_test.responsable_dni"
            v-bind:valor_input_validacion="
              form_salta_test.responsable_dni_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.responsable_dni_correcto
            "
            v-bind:valor_obs="form_salta_test.responsable_dni_obs"
            v-bind:valor_valido_obs="form_salta_test.responsable_dni_obs_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI :'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.responsable_dni"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'DNI del Responsable Tecnico'"
            v-on:changevalor="update_responsable_dni($event)"
            v-on:changevalido="update_responsable_dni_valido($event)"
            v-on:changecorrecto="update_responsable_dni_correcto($event)"
            v-on:changeobs="update_responsable_dni_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- Matricula Responsable Tecnico -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.responsable_matricula"
        >
          <NombreMina
            v-if="permisos_mostrar.responsable_matricula"
            v-bind:valor_input_props="form_salta_test.responsable_matricula"
            v-bind:valor_input_validacion="
              form_salta_test.responsable_matricula_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.responsable_matricula_correcto
            "
            v-bind:valor_obs="form_salta_test.responsable_matricula_obs"
            v-bind:valor_valido_obs="
              form_salta_test.responsable_matricula_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Número de Matrícula :'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="permisos_disables.responsable_matricula"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Número de Matrícula de Responsable Tecnico'"
            v-on:changevalor="update_responsable_matricula($event)"
            v-on:changevalido="update_responsable_matricula_valido($event)"
            v-on:changecorrecto="update_responsable_matricula_correcto($event)"
            v-on:changeobs="update_responsable_matricula_obs($event)"
          >
          </NombreMina>
        </div>
        <!-- Titulo Responsable Tecnico -->
        <div
          class="w-full md:w-2/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.responsable_titulo"
        >
          <NombreMina
            v-if="permisos_mostrar.responsable_titulo"
            v-bind:valor_input_props="form_salta_test.responsable_titulo"
            v-bind:valor_input_validacion="
              form_salta_test.responsable_titulo_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.responsable_titulo_correcto
            "
            v-bind:valor_obs="form_salta_test.responsable_titulo_obs"
            v-bind:valor_valido_obs="
              form_salta_test.responsable_titulo_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Título :'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="permisos_disables.responsable_titulo"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Título de Responsable Tecnico'"
            v-on:changevalor="update_responsable_titulo($event)"
            v-on:changevalido="update_responsable_titulo_valido($event)"
            v-on:changecorrecto="update_responsable_titulo_correcto($event)"
            v-on:changeobs="update_responsable_titulo_obs($event)"
          >
          </NombreMina>
        </div>
      </div>

      <div class="flex flex-wrap">
        <div
          class="
            w-full
            sm:w-2/2
            md:w-1/2
            lg:w-1/2
            xl:w-1/2
            2xl:w-1/2
            px-3
            mb-6
            md:mb-0
          "
        >
          <h2
            class="
              text-2xl
              md:text-2xl
              font-semibold
              tracking-tight
              leading-7
              md:leading-10
              mb-1
              truncate
            "
          >
            Lista de Empresas controlantes
          </h2>
        </div>
        <div
          class="
            w-full
            sm:w-2/2
            md:w-1/2
            lg:w-1/2
            xl:w-1/2
            2xl:w-1/2
            px-3
            mb-6
            md:mb-0
          "
        >
          <button
            class="
              px-6
              w-full
              py-2.5
              mb-4
              text-base
              font-semibold
              rounded
              block
              border-2 border-green-600
              text-green-800
              bg-green-100
              hover:bg-green-600
              hover:border-2
              hover:border-green-600
              hover:text-white
            "
            @click="agregar_empresa()"
          >
            + Agregar Empresa
          </button>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- lista de minerales del nieto: {{$props.lista_de_minerales_pre_cargados}} -->
        <div class="mt-2 sm:w-full md:w-full">
          <div
            class="mb-6 relative"
            v-for="(empresa, index) in empresas"
            v-bind:key="empresa.id"
          >
            <div
              @click="eliminar_empresa(index)"
              class="
                absolute
                -top-4
                -right-4
                bg-red-800
                p-4
                cursor-pointer
                hover:bg-red-600
                py-2
                text-white
                rounded-full
              "
            >
              x
            </div>
            <div
              class="
                absolute
                -top-4
                -left-4
                bg-blue-300
                p-4
                py-2
                text-black
                font-medium
                rounded
              "
            >
              {{ index + 1 }}
            </div>

            <div
              class="bg-white shadow-md rounded-xl p-4 border border-gray-300"
            >
              <div>
                <div class="flex flex-wrap">
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="empresa_razon_social"
                      >Razon Social</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_razon_social"
                        id="empresa_razon_social"
                        name="empresa_razon_social"
                        v-model="empresa.razon_social"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!-- cuit -->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Cuit</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_cuit"
                        id="empresa_cuit"
                        name="empresa_cuit"
                        v-model="empresa.cuit"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!-- tipo -->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Tipo</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_tipo"
                        id="empresa_tipo"
                        name="empresa_tipo"
                        v-model="empresa.tipo"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!-- Calle-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Calle</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_calle"
                        id="empresa_calle"
                        name="empresa_calle"
                        v-model="empresa.calle"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!--Num Calle-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Num</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_numero"
                        id="empresa_numero"
                        name="empresa_numero"
                        v-model="empresa.numero"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!--Telefono-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Telefono</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_telefono"
                        id="empresa_telefono"
                        name="empresa_telefono"
                        v-model="empresa.telefono"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!-- Prov-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Prov</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_provincia"
                        id="empresa_provincia"
                        name="empresa_provincia"
                        v-model="empresa.provincia"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!--Dpto-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Departamento</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_departamento"
                        id="empresa_departamento"
                        name="empresa_departamento"
                        v-model="empresa.departamento"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!--Localidad-->
                  <div
                    class="
                      sm:w-3/3
                      md:w-1/3
                      lg:w-1/3
                      xl:w-1/3
                      2xl:w-1/3
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Localidad</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_localidad"
                        id="empresa_localidad"
                        name="empresa_localidad"
                        v-model="empresa.localidad"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!-- CP-->
                  <div
                    class="
                      sm:w-2/2
                      md:w-1/2
                      lg:w-1/2
                      xl:w-1/2
                      2xl:w-1/2
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Codigo Postal</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_cp"
                        id="empresa_cp"
                        name="empresa_cp"
                        v-model="empresa.cp"
                        :disabled="false"
                      />
                    </div>
                  </div>
                  <!--Otro-->
                  <div
                    class="
                      sm:w-2/2
                      md:w-1/2
                      lg:w-1/2
                      xl:w-1/2
                      2xl:w-1/2
                      px-3
                      mb-6
                      md:mb-3
                    "
                  >
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-1
                      "
                      for="leal_numero"
                      >Otro</label
                    >
                    <div class="flex items-stretch w-full relative">
                      <div class="flex">
                        <span
                          class="
                            flex
                            leading-normal
                            bg-grey-lighter
                            border-1
                            rounded-r-none
                            border border-r-0 border-blue-300
                            px-3
                            whitespace-no-wrap
                            text-grey-dark
                            w-12
                            h-10
                            bg-blue-300
                            justify-center
                            items-center
                            text-xl
                            rounded-lg
                            text-white
                          "
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                            />
                          </svg>
                        </span>
                      </div>
                      <input
                        type="text"
                        maxlength="30"
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-l-0
                          h-10
                          border-grey-light
                          rounded-lg rounded-l-none
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        placeholder="empresa_otro"
                        id="empresa_otro"
                        name="empresa_otro"
                        v-model="empresa.otro"
                        :disabled="false"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br />
      <BotonesPaginaGeneric
        :link_volver="link_volver"
        :titulo_boton_volver="'Volver'"
        :mostrar_btn_volver="false"
        :titulo_boton_guardar="'Guardar'"
        :formulario="form_salta_test"
        :donde_guardar="
          $inertia.page.props.appName +
          '/formularios/evaluacion_auto_guardado_tucuman'
        "
        :evaluacion="$props.evaluacion"
        :testing="$props.testing"
        :id="$props.id"
        v-on:mostrarpasosiguiente="mostrarpasos($event)"
      >
      </BotonesPaginaGeneric>

      <!-- <BotonesPaginaCatamarca
        v-if="$props.mostrar_boton_tucuman"
        :link_volver="'#'"
        :titulo_boton_volver="'volver'"
        :titulo_boton_guardar="'Guardar'"
        :formulario="form_salta_test"
        :donde_guardar="$props.donde_estoy"
        :evaluacion="autoridad_minera"
        :testing="mostrar_testing"
        :id="$props.id"
        v-on:mostrarpasosiguiente="mostrarpasos($event)"
      >
      </BotonesPaginaCatamarca> -->
    </div>
  </div>
</template>

<script>
import Card from "@/Jetstream/altas/ComponenteCardProvincia";
import Menu from "@/Jetstream/altas/MenuModulo";
import SelectGeneric from "@/Components/SelectGeneric";
// import JetDialogModal from "@/Jetstream/DialogModal";
import NombreMina from "@/Pages/Productors/NombreMina";
// import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
// import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
import BotonesPaginaGeneric from "@/Pages/Productors/BotonesPaginaGeneric";

// import Label from "../../Jetstream/Label.vue";
export default {
  props: [
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",
    "titulo_pagina",
    "editar",
    "evaluacion",
    "testing",
    "id",
    "editar",
    "lista_provincias",
    "lista_dptos",
  ],
  components: {
    // JetDialogModal,
    Card,
    Menu,
    SelectGeneric,
    NombreMina,
    // TipoDeSistemaGeo,
    BotonesPaginaGeneric,
    SubirArchivo,
    // CaracterQueInvoca,
    //BotonesPaginaCatamarca,
  },
  data() {
    return {
      evaluacion_adm: false,
      mostrar_evaluacion_adm: true,
      mostrar_modulo: true,
      continuar_pagina: false,
      mostrar_modal_datos_ya_guardados: false,
      modal_tittle: "",
      modal_body: "",
      mostrar_testing: false,
      autoridad_minera: this.$props.evaluacion,
      ayuda_local: false,
      permisos_mostrar: [],
      permisos_disables: [],
      form_salta_test: {},
      lista_departamentos: [],
      lista_localidades: [],
      arrayTipoPersona: [
        { id: 1, nombre: "Plantas" },
        { id: 2, nombre: "Productores" },
        { id: 3, nombre: "Exploradores" },
      ],
      tipopersona: "Plantas",
      label_responsable_tecnico: "de la Planta",
      empresas :  [
            {
              id: 1,
              razon_social: '',
              cuit: 1,
              tipo: '',
              calle: '',
              numero: '',
              telefono: '',
              provincia: '',
              departamento: '',
              localidad: '',
              cp: '',
              otro: ''
          }
      ],
    };
  },
  methods: {

    agregar_empresa: function () {
      var empresa_aux = {
        id: 2,
        razon_social: 'segunda',
        cuit: 4124124,
        tipo: '',
        calle: '',
        numero: '',
        telefono: '',
        provincia: '',
        departamento: '',
        localidad: '',
        cp: '',
        otro: ''
      };
      if (this.empresas === "" || this.empresas === null) this.empresas = [];
      this.empresas.push(empresa_aux);
    },
    eliminar_empresa: function (indice) {
      this.empresas.splice(indice, 1);
    },

    update_valor(valor) {
      // Select Tipo
      this.tipopersona = valor;
      this.form_salta_test.tipopersona = valor;
      const defaultTipoPersona = "";
      const tipoPersonaCons = {
        "Plantas":"de la Planta",
        "Productores":"de la Explotación",
        "Exploradores":"de la Exploración"
      };
      this.label_responsable_tecnico = tipoPersonaCons[this.tipopersona]||defaultTipoPersona;
   },

    // cambio_input(valor) {
    //   this.$emit("changevalor", valor);
    // },

    update_valor_evaluacion_Adm(newValor) {
      this.evaluacion_adm = newValor;
    },
    cerrar_modal_datos_uno() {
      this.mostrar_modal_datos_ya_guardados = false;
    },

    //
    update_tipo(newValue) {
      this.form_salta_test.tipo = newValue;
    },
    // representante_legal_apellido
    update_representante_legal_apellido(newValue) {
      this.form_salta_test.representante_legal_apellido = newValue;
    },
    update_representante_legal_apellido_valido(newValue) {
      this.form_salta_test.representante_legal_apellido_valido = newValue;
    },
    update_representante_legal_apellido_correcto(newValue) {
      this.form_salta_test.representante_legal_apellido_correcto = newValue;
    },
    update_representante_legal_apellido_obs(newValue) {
      this.form_salta_test.representante_legal_apellido_obs = newValue;
    },

    // representante_legal_nombre
    update_representante_legal_nombre(newValue) {
      this.form_salta_test.representante_legal_nombre = newValue;
    },
    update_representante_legal_nombre_valido(newValue) {
      this.form_salta_test.representante_legal_nombre_valido = newValue;
    },
    update_representante_legal_nombre_correcto(newValue) {
      this.form_salta_test.representante_legal_nombre_correcto = newValue;
    },
    update_representante_legal_nombre_obs(newValue) {
      this.form_salta_test.representante_legal_nombre_obs = newValue;
    },

    // representante_legal_dni
    update_representante_legal_dni(newValue) {
      this.form_salta_test.representante_legal_dni = newValue;
    },
    update_representante_legal_dni_valido(newValue) {
      this.form_salta_test.representante_legal_dni_valido = newValue;
    },
    update_representante_legal_dni_correcto(newValue) {
      this.form_salta_test.representante_legal_dni_correcto = newValue;
    },
    update_representante_legal_dni_obs(newValue) {
      this.form_representante_legal_dni_obs = newValue;
    },

    // representante_legal_email
    update_representante_legal_email(newValue) {
      this.form_salta_test.representante_legal_email = newValue;
    },
    update_representante_legal_email_valido(newValue) {
      this.form_salta_test.representante_legal_email_valido = newValue;
    },
    update_representante_legal_email_correcto(newValue) {
      this.form_salta_test.representante_legal_email_correcto = newValue;
    },
    update_representante_legal_email_obs(newValue) {
      this.form_salta_test.representante_legal_email_obs = newValue;
    },

    // representante_legal_cargo
    update_representante_legal_cargo(newValue) {
      this.form_salta_test.representante_legal_cargo = newValue;
    },
    update_representante_legal_cargo_valido(newValue) {
      this.form_salta_test.representante_legal_cargo_valido = newValue;
    },
    update_representante_legal_cargo_correcto(newValue) {
      this.form_salta_test.representante_legal_cargo_correcto = newValue;
    },
    update_representante_legal_cargo_obs(newValue) {
      this.form_salta_test.representante_legal_cargo_obs = newValue;
    },

    // telefono
    update_telefono(newValue) {
      this.form_salta_test.telefono = newValue;
    },
    update_telefono_valido(newValue) {
      this.form_salta_test.telefono_valido = newValue;
    },
    update_telefono_correcto(newValue) {
      this.form_salta_test.telefono_correcto = newValue;
    },
    update_telefono_obs(newValue) {
      this.form_salta_test.telefono_obs = newValue;
    },

    // nacionalidad
    update_nacionalidad(newValue) {
      this.form_salta_test.nacionalidad = newValue;
    },
    update_nacionalidad_valido(newValue) {
      this.form_salta_test.nacionalidad_valido = newValue;
    },
    update_nacionalidad_correcto(newValue) {
      this.form_salta_test.nacionalidad_correcto = newValue;
    },
    update_nacionalidad_obs(newValue) {
      this.form_salta_test.nacionalidad_obs = newValue;
    },

    // representante_legal_domicilio
    update_representante_legal_domicilio(newValue) {
      this.form_salta_test.representante_legal_domicilio = newValue;
    },
    update_representante_legal_domicilio_valido(newValue) {
      this.form_salta_test.representante_legal_domicilio_valido = newValue;
    },
    update_representante_legal_domicilio_correcto(newValue) {
      this.form_salta_test.representante_legal_domicilio_correcto = newValue;
    },
    update_representante_legal_domicilio_obs(newValue) {
      this.form_salta_test.representante_legal_domicilio_obs = newValue;
    },

    //  responsable_apellido
    update_responsable_apellido(newValue) {
      this.form_salta_test.responsable_apellido = newValue;
    },
    update_responsable_apellido_valido(newValue) {
      this.form_salta_test.responsable_apellido_valido = newValue;
    },
    update_responsable_apellido_correcto(newValue) {
      this.form_salta_test.responsable_apellido_correcto = newValue;
    },
    update_responsable_apellido_obs(newValue) {
      this.form_salta_test.responsable_apellido_obs = newValue;
    },

    //  responsable_nombre
    update_responsable_nombre(newValue) {
      this.form_salta_test.responsable_nombre = newValue;
    },
    update_responsable_nombre_valido(newValue) {
      this.form_salta_test.responsable_nombre_valido = newValue;
    },
    update_responsable_nombre_correcto(newValue) {
      this.form_salta_test.responsable_nombre_correcto = newValue;
    },
    update_responsable_nombre_obs(newValue) {
      this.form_salta_test.responsable_nombre_obs = newValue;
    },

    //  responsable_dni
    update_responsable_dni(newValue) {
      this.form_salta_test.responsable_dni = newValue;
    },
    update_responsable_dni_valido(newValue) {
      this.form_salta_test.responsable_dni_valido = newValue;
    },
    update_responsable_dni_correcto(newValue) {
      this.form_salta_test.responsable_dni_correcto = newValue;
    },
    update_responsable_dni_obs(newValue) {
      this.form_salta_test.responsable_dni_obs = newValue;
    },

    //  responsable_matricula
    update_responsable_matricula(newValue) {
      this.form_salta_test.responsable_matricula = newValue;
    },
    update_responsable_matricula_valido(newValue) {
      this.form_salta_test.responsable_matricula_valido = newValue;
    },
    update_responsable_matricula_correcto(newValue) {
      this.form_salta_test.responsable_matricula_correcto = newValue;
    },
    update_responsable_matricula_obs(newValue) {
      this.form_salta_test.responsable_matricula_obs = newValue;
    },

    //  NOMBRE PERSONA AUTORIZADA
    update_responsable_titulo(newValue) {
      this.form_salta_test.responsable_titulo = newValue;
    },
    update_responsable_titulo_valido(newValue) {
      this.form_salta_test.responsable_titulo_valido = newValue;
    },
    update_responsable_titulo_correcto(newValue) {
      this.form_salta_test.responsable_titulo_correcto = newValue;
    },
    update_responsable_titulo_obs(newValue) {
      this.form_salta_test.responsable_titulo_obs = newValue;
    },

    //mostrar ayuda
    update_valor_ayuda_local(newValor) {
      this.ayuda_local = newValor;
    },
    update_valor_pagina_siguiente(v) {
      this.$emit("mostrarpasosiguiente", v);
      this.continuar_pagina = v;
      this.mostrar_modulo = !v;
    },
    update_valor_ocultar_modulo(v) {
      this.mostrar_modulo = v;
    },
    mostrarpasos(v) {
      this.$emit("mostrarpasosiguiente", v);
      this.mostrar_modulo = !v;
    },
  },
  mounted() {
    let self = this;
    this.$nextTick(() => {
      if (this.$inertia.page.props.user.id_provincia === 66) {
        // if (
        //   typeof this.$props.id === "undefined" ||
        //   this.$props.id === null ||
        //   this.$props.id === "null"
        // ) {

        if (this.$props.editar === false || this.$props.editar === "false") {
          /*********** Valores *************/
          self.form_salta_test.id_formulario_alta = null;
          self.form_salta_test.tipo = null;
          self.form_salta_test.representante_legal_nombre = null;
          self.form_salta_test.representante_legal_apellido = null;
          self.form_salta_test.representante_legal_dni = null;
          self.form_salta_test.representante_legal_email = null;
          self.form_salta_test.representante_legal_cargo = null;
          self.form_salta_test.representante_legal_domicilio = null;
          self.form_salta_test.nacionalidad = null;
          self.form_salta_test.telefono = null;
          self.form_salta_test.responsable_nombre = null;
          self.form_salta_test.responsable_apellido = null;
          self.form_salta_test.responsable_dni = null;
          self.form_salta_test.responsable_titulo = null;
          self.form_salta_test.responsable_matricula = null;

          /******************** Corrrectos ***********************/
          self.form_salta_test.id_formulario_alta_correcto = null;
          self.form_salta_test.tipo_correcto = null;
          self.form_salta_test.representante_legal_nombre_correcto = null;
          self.form_salta_test.representante_legal_apellido_correcto = null;
          self.form_salta_test.representante_legal_dni_correcto = null;
          self.form_salta_test.representante_legal_email_correcto = null;
          self.form_salta_test.representante_legal_cargo_correcto = null;
          self.form_salta_test.representante_legal_domicilio_correcto = null;
          self.form_salta_test.nacionalidad_correcto = null;
          self.form_salta_test.telefono_correcto = null;
          self.form_salta_test.responsable_nombre_correcto = null;
          self.form_salta_test.responsable_apellido_correcto = null;
          self.form_salta_test.responsable_dni_correcto = null;
          self.form_salta_test.responsable_titulo_correcto = null;
          self.form_salta_test.responsable_matricula_correcto = null;

          /********* Observaciones ************/
          self.form_salta_test.id_formulario_alta_obs = null;
          self.form_salta_test.tipo_obs = null;
          self.form_salta_test.representante_legal_nombre_obs = null;
          self.form_salta_test.representante_legal_apellido_obs = null;
          self.form_salta_test.representante_legal_dni_obs = null;
          self.form_salta_test.representante_legal_email_obs = null;
          self.form_salta_test.representante_legal_cargo_obs = null;
          self.form_salta_test.representante_legal_domicilio_obs = null;
          self.form_salta_test.nacionalidad_obs = null;
          self.form_salta_test.telefono_obs = null;
          self.form_salta_test.responsable_nombre_obs = null;
          self.form_salta_test.responsable_apellido_obs = null;
          self.form_salta_test.responsable_dni_obs = null;
          self.form_salta_test.responsable_titulo_obs = null;
          self.form_salta_test.responsable_matricula_obs = null;

          //voy a buscar los permisos
          axios
            .get("/formularios/traer_permisos_pagina_salta/0/crear")
            .then(function (response) {
              if (response.data.status === "ok") {
                // console.log(response.data);
                self.permisos_mostrar = response.data.mostrar;
                self.permisos_disables = response.data.disables;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
        } else {
          //estoy por editar
          //voy a BUSCAR LOS DATOS DEL FORMULARIO
          axios
            .get(
              "/formularios/traer_datos_pagina_salta" +
                "/" +
                parseInt(this.$props.id)
            )
            .then(function (response) {
              if (response.data.status === "ok") {
                self.form_salta_test = response.data.datos;
              } else console.log("error al buscar datos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
          //voy a buscar los permisos
          /*
          axios
            .get(
              "/formularios/traer_permisos_pagina_salta" +
                "/" +
                parseInt(this.$props.id) +
                "/editar"
            )
            .then(function (response) {
              if (response.data.status === "ok") {
                self.permisos_mostrar = response.data.mostrar;
                self.permisos_disables = response.data.disables;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });



            */
        }
      }
    });
  },
};
</script>
