<template>
  <div>
    <div class="items-center justify-left">
      <Card
        :icono="'/formulario_alta/imagenes/logoProd1.png'"
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
      <!-- Representante Legal (opcional) -->
      <div class="flex flex-wrap">
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_apellido"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_apellido"
            v-bind:valor_input_props="form_tucuman_test.representante_apellido"
            v-bind:valor_input_validacion="
              form_tucuman_test.representante_apellido_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.representante_apellido_correcto
            "
            v-bind:valor_obs="form_tucuman_test.representante_apellido_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.representante_apellido_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Apellido del Representante Legal:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.representante_apellido"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Apellido del Representante Legal'"
            v-on:changevalor="update_representante_apellido($event)"
            v-on:changevalido="update_representante_apellido_valido($event)"
            v-on:changecorrecto="update_representante_apellido_correcto($event)"
            v-on:changeobs="update_representante_apellido_obs($event)"
          >
          </NombreMina>
        </div>
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_nombre"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_nombre"
            v-bind:valor_input_props="form_tucuman_test.representante_nombre"
            v-bind:valor_input_validacion="
              form_tucuman_test.representante_nombre_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.representante_nombre_correcto
            "
            v-bind:valor_obs="form_tucuman_test.representante_nombre_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.representante_nombre_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nombre del Representante Legal:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.representante_nombre"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nombre del Representante Legal'"
            v-on:changevalor="update_representante_nombre($event)"
            v-on:changevalido="update_representante_nombre_valido($event)"
            v-on:changecorrecto="update_representante_nombre_correcto($event)"
            v-on:changeobs="update_representante_nombre_obs($event)"
         >
          </NombreMina>
        </div>
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.representante_dni"
        >
          <NombreMina
            v-if="permisos_mostrar.representante_dni"
            v-bind:valor_input_props="form_tucuman_test.representante_dni"
            v-bind:valor_input_validacion="
              form_tucuman_test.representante_dni_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.representante_dni_correcto
            "
            v-bind:valor_obs="form_tucuman_test.representante_dni_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.representante_dni_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI del Representante Legal:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.representante_dni"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'DNI del Representante Legal'"
            v-on:changevalor="update_representante_dni($event)"
            v-on:changevalido="update_representante_dni_valido($event)"
            v-on:changecorrecto="update_representante_dni_correcto($event)"
            v-on:changeobs="update_representante_dni_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <!-- Persona autorizada a realizar tramites administrativos -->
      <div class="flex flex-wrap">
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_apellido"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_apellido"
            v-bind:valor_input_props="
              form_tucuman_test.persona_autorizada_apellido
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_apellido_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_apellido_correcto
            "
            v-bind:valor_obs="form_tucuman_test.persona_autorizada_apellido_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_apellido_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Apellido Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.persona_autorizada_apellido
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Apellido Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_apellido($event)"
            v-on:changevalido="update_persona_autorizada_apellido_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_apellido_correcto($event)"
            v-on:changeobs="update_persona_autorizada_apellido_obs($event)"
          >
          </NombreMina>
        </div>

        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_nombre"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_nombre"
            v-bind:valor_input_props="
              form_tucuman_test.persona_autorizada_nombre
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_nombre_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_nombre_correcto
            "
            v-bind:valor_obs="form_tucuman_test.persona_autorizada_nombre_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_nombre_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nombre Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.persona_autorizada_nombre
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nombre Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_nombre($event)"
            v-on:changevalido="update_persona_autorizada_nombre_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_nombre_correcto($event)"
            v-on:changeobs="update_persona_autorizada_nombre_obs($event)"
          >
          </NombreMina>
        </div>
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_dni"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_dni"
            v-bind:valor_input_props="form_tucuman_test.persona_autorizada_dni"
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_dni_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_dni_correcto
            "
            v-bind:valor_obs="form_tucuman_test.persona_autorizada_dni_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_dni_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="permisos_disables.persona_autorizada_dni"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'DNI Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_dni($event)"
            v-on:changevalido="update_persona_autorizada_dni_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_dni_correcto($event)"
            v-on:changeobs="update_persona_autorizada_dni_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_telefono"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_telefono"
            v-bind:valor_input_props="
              form_tucuman_test.persona_autorizada_telefono
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_telefono_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_telefono_correcto
            "
            v-bind:valor_obs="form_tucuman_test.persona_autorizada_telefono_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_telefono_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Telefono Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="
              permisos_disables.persona_autorizada_telefono
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Telefono Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_telefono($event)"
            v-on:changevalido="update_persona_autorizada_telefono_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_telefono_correcto($event)"
            v-on:changeobs="update_persona_autorizada_telefono_obs($event)"
          >
          </NombreMina>
        </div>
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_email"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_email"
            v-bind:valor_input_props="
              form_tucuman_test.persona_autorizada_email
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_email_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_email_correcto
            "
            v-bind:valor_obs="form_tucuman_test.persona_autorizada_email_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_email_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Email Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="permisos_disables.persona_autorizada_email"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Email Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_email($event)"
            v-on:changevalido="update_persona_autorizada_email_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_email_correcto($event)"
            v-on:changeobs="update_persona_autorizada_email_obs($event)"
          >
          </NombreMina>
        </div>
        <div
          class="w-full md:w-1/3 sm:w-3/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.persona_autorizada_domicilio"
        >
          <NombreMina
            v-if="permisos_mostrar.persona_autorizada_domicilio"
            v-bind:valor_input_props="
              form_tucuman_test.persona_autorizada_domicilio
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.persona_autorizada_domicilio_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.persona_autorizada_domicilio_correcto
            "
            v-bind:valor_obs="
              form_tucuman_test.persona_autorizada_domicilio_obs
            "
            v-bind:valor_valido_obs="
              form_tucuman_test.persona_autorizada_domicilio_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Domicilio Persona autorizada:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.persona_autorizada_domicilio
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Domicilio Persona Autorizada'"
            v-on:changevalor="update_persona_autorizada_domicilio($event)"
            v-on:changevalido="update_persona_autorizada_domicilio_valido($event)"
            v-on:changecorrecto="update_persona_autorizada_domicilio_correcto($event)"
            v-on:changeobs="update_persona_autorizada_domicilio_obs($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- Seleccionar Tipo de Persona -->
        <div class="w-full px-3 mb-2 md:mb-2">
          <SelectGeneric
            v-if="permisos_mostrar.tipo"
            v-bind:titulo="'Seleccione el tipo de persona'"
            v-bind:valueSelectInicial="tipopersona"
            v-bind:classSelect="'appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white'"
            v-bind:listOptions="arrayTipoPersona"
            v-on:ChangeValorSelect="update_valor($event)"
          >
          </SelectGeneric>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- CUIL -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 lg:w-1/3 xl:w-1/3 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.cuit &&
            (tipopersona === 'Persona Física' || tipopersona === 'Sociedad')
          "
        >
          <SubirArchivo
            v-if="
              permisos_mostrar.cuit &&
              (tipopersona === 'Persona Física' || tipopersona === 'Sociedad')
            "
            v-bind:valor_input_props="form_tucuman_test.cuit"
            v-bind:valor_input_validacion="form_tucuman_test.cuit_valido"
            v-bind:evualacion_correcto="form_tucuman_test.cuit_correcto"
            v-bind:valor_obs="form_tucuman_test.obs_cuit"
            v-bind:valor_valido_obs="form_tucuman_test.cuit_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'CUIL'"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_input="permisos_disables.cuit"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_cuit_valor($event)"
            v-on:cambioarchivo="update_cuit_valor($event)"
            v-on:changevalido="update_cuit_valido($event)"
            v-on:changecorrecto="update_cuit_correcto($event)"
            v-on:changeobs="update_obs_cuit($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Constancia de CUIL. Acepta los siguientes formatos: pdf, png o
                jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            foto 4x4 valor padre: {{}} <br />
            foto 4x4 valido del padre: {{}} <br />
            foto 4x4 correcto deel padre: {{}} <br />
            foto 4x4 observacion deel padre: {{}} <br />
            foto 4x4 observacion valida deel padre: {{}}
          </div>
        </div>
        <!-- DNI FRENTE -->
        <div
          v-if="permisos_mostrar.dni_frente_persona"
          class="w-full md:w-1/3 sm:w-3/3 lg:w-1/3 xl:w-1/3 px-3 mb-2 md:mb-2"
        >
          <SubirArchivo
            v-bind:valor_input_props="form_tucuman_test.dni_frente_persona"
            v-bind:valor_input_validacion="
              form_tucuman_test.dni_frente_persona_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.dni_frente_persona_correcto
            "
            v-bind:valor_obs="form_tucuman_test.dni_frente_persona_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.dni_frente_persona_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="dni_frente"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_input="permisos_disables.dni_frente_persona"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_dni_frente_persona($event)"
            v-on:cambioarchivo="update_dni_frente_persona($event)"
            v-on:changevalido="update_dni_frente_persona_valido($event)"
            v-on:changecorrecto="update_dni_frente_persona_correcto($event)"
            v-on:changeobs="update_dni_frente_persona_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Frente de D.N.I.. Acepta los siguientes formatos: pdf, png o
                jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
        <!-- DNI DORSO -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 lg:w-1/3 xl:w-1/3 px-3 mb-2 md:mb-2"
          v-if="permisos_mostrar.dni_reverso_persona"
        >
          <SubirArchivo
            v-if="permisos_mostrar.dni_reverso_persona"
            v-bind:valor_input_props="form_tucuman_test.dni_reverso_persona"
            v-bind:valor_input_validacion="
              form_tucuman_test.dni_reverso_persona_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.dni_reverso_persona_correcto
            "
            v-bind:valor_obs="form_tucuman_test.dni_reverso_persona_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.dni_reverso_persona_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="dni_dorso"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_input="permisos_disables.dni_reverso_persona"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_dni_reverso_persona($event)"
            v-on:cambioarchivo="update_dni_reverso_persona($event)"
            v-on:changevalido="update_dni_reverso_persona_valido($event)"
            v-on:changecorrecto="update_dni_reverso_persona_correcto($event)"
            v-on:changeobs="update_dni_reverso_persona_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Dorso de D.N.I.. Acepta los siguientes formatos: pdf, png o
                jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
        <!-- Decreto de nombramiento -->
        <div
          class="w-full md:w-1/3 sm:w-3/3 lg:w-1/3 xl:w-1/3 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.decreto_de_nombramiento &&
            tipopersona === 'Funcionario Público'
          "
        >
          <SubirArchivo
            v-if="
              permisos_mostrar.decreto_de_nombramiento &&
              tipopersona === 'Funcionario Público'
            "
            v-bind:valor_input_props="form_tucuman_test.decreto_de_nombramiento"
            v-bind:valor_input_validacion="
              form_tucuman_test.decreto_de_nombramiento_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.decreto_de_nombramiento_correcto
            "
            v-bind:valor_obs="form_tucuman_test.decreto_de_nombramiento_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.decreto_de_nombramiento_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Decreto de nombramiento'"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_input="permisos_disables.decreto_de_nombramiento"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_decreto_de_nombramiento($event)"
            v-on:cambioarchivo="update_decreto_de_nombramiento($event)"
            v-on:changevalido="update_decreto_de_nombramiento_valido($event)"
            v-on:changecorrecto="
              update_decreto_de_nombramiento_correcto($event)
            "
            v-on:changeobs="update_decreto_de_nombramiento_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Constancia de decreto de nombramiento. Acepta los siguientes
                formatos: pdf, png o jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
      </div>
      <!-- Tipo persona -> Sociedad -->
      <div class="flex flex-wrap" v-if="tipopersona === 'Sociedad'">
        <!-- DNI FRENTE del representante legal de la sociedad -->
        <div
          class="w-full md:w-1/2 sm:w-2/2 lg:w-1/2 xl:w-1/2 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.dni_frente_representante_legal &&
            tipopersona === 'Sociedad'
          "
        >
          <SubirArchivo
            v-if="permisos_mostrar.dni_frente_representante_legal"
            v-bind:valor_input_props="
              form_tucuman_test.dni_frente_representante_legal
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.dni_frente_representante_legal_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.dni_frente_representante_legal_correcto
            "
            v-bind:valor_obs="
              form_tucuman_test.dni_frente_representante_legal_obs
            "
            v-bind:valor_valido_obs="
              form_tucuman_test.dni_frente_representante_legal_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI FRENTE del representante legal de la sociedad'"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_input="
              permisos_disables.dni_frente_representante_legal
            "
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_dni_frente_representante_legal($event)"
            v-on:cambioarchivo="update_dni_frente_representante_legal($event)"
            v-on:changevalido="
              update_dni_frente_representante_legal_valido($event)
            "
            v-on:changecorrecto="
              update_dni_frente_representante_legal_correcto($event)
            "
            v-on:changeobs="update_dni_frente_representante_legal_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Frente de DNI del representante legal de la sociedad. Acepta los
                siguientes formatos: pdf, png o jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
        <!-- DNI DORSO del representante legal de la sociedad -->
        <div
          class="w-full md:w-1/2 sm:w-2/2 lg:w-1/2 xl:w-1/2 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.dni_reverso_representante_legal &&
            tipopersona === 'Sociedad'
          "
        >
          <SubirArchivo
            v-if="permisos_mostrar.dni_reverso_representante_legal"
            v-bind:valor_input_props="
              form_tucuman_test.dni_reverso_representante_legal
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.dni_reverso_representante_legal_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.dni_reverso_representante_legal_correcto
            "
            v-bind:valor_obs="
              form_tucuman_test.dni_reverso_representante_legal_obs
            "
            v-bind:valor_valido_obs="
              form_tucuman_test.dni_reverso_representante_legal_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI DORSO del representante legal de la sociedad'"
            v-bind:desactivar_input="
              permisos_disables.dni_reverso_representante_legal
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_dni_reverso_representante_legal($event)"
            v-on:cambioarchivo="update_dni_reverso_representante_legal($event)"
            v-on:changevalido="
              update_dni_frente_representante_legal_valido($event)
            "
            v-on:changecorrecto="
              update_dni_frente_representante_legal_correcto($event)
            "
            v-on:changeobs="update_dni_frente_representante_legal_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Dorso de DNI del representante legal de la sociedad. Acepta los
                siguientes formatos: pdf, png o jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
      </div>
      <div class="flex flex-wrap">
        <!-- Documentación que justifique personería del representante legal (acta de nombramiento) **** -->
        <div
          class="w-full md:w-1/2 sm:w-2/2 lg:w-1/2 xl:w-1/2 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.personeria_del_representante_legal &&
            tipopersona === 'Sociedad'
          "
        >
          <SubirArchivo
            v-if="
              permisos_mostrar.personeria_del_representante_legal &&
              tipopersona === 'Sociedad'
            "
            v-bind:valor_input_props="
              form_tucuman_test.personeria_del_representante_legal
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.personeria_del_representante_legal_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.personeria_del_representante_legal_correcto
            "
            v-bind:valor_obs="
              form_tucuman_test.personeria_del_representante_legal_obs
            "
            v-bind:valor_valido_obs="
              form_tucuman_test.personeria_del_representante_legal_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Documentación que justifique personería del representante legal (acta de nombramiento)'"
            v-bind:desactivar_input="
              permisos_disables.personeria_del_representante_legal
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_personeria_del_representante_legal($event)"
            v-on:cambioarchivo="
              update_personeria_del_representante_legal($event)
            "
            v-on:changevalido="
              update_personeria_del_representante_legal_valido($event)
            "
            v-on:changecorrecto="
              update_personeria_del_representante_legal_correcto($event)
            "
            v-on:changeobs="
              update_personeria_del_representante_legal_obs($event)
            "
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Documentación que justifique personería del representante legal.
                Este documento es un archivo pdf, png o jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
        <!-- Documentación que justifique personería de la sociedad************ -->
        <div
          class="w-full md:w-1/2 sm:w-2/2 lg:w-1/2 xl:w-1/2 px-3 mb-2 md:mb-2"
          v-if="
            permisos_mostrar.personaria_de_la_socidedad &&
            tipopersona === 'Sociedad'
          "
        >
          <SubirArchivo
            v-if="
              permisos_mostrar.personaria_de_la_socidedad &&
              tipopersona === 'Sociedad'
            "
            v-bind:valor_input_props="
              form_tucuman_test.personaria_de_la_socidedad
            "
            v-bind:valor_input_validacion="
              form_tucuman_test.personaria_de_la_socidedad_valido
            "
            v-bind:evualacion_correcto="
              form_tucuman_test.personaria_de_la_socidedad_correcto
            "
            v-bind:valor_obs="form_tucuman_test.personaria_de_la_socidedad_obs"
            v-bind:valor_valido_obs="
              form_tucuman_test.personaria_de_la_socidedad_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Documentación que justifique personería de la sociedad'"
            v-bind:desactivar_input="
              permisos_disables.personaria_de_la_socidedad
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changevalor="update_personaria_de_la_socidedad($event)"
            v-on:cambioarchivo="update_personaria_de_la_socidedad($event)"
            v-on:changevalido="update_personaria_de_la_socidedad_valido($event)"
            v-on:changecorrecto="
              update_personaria_de_la_socidedad_correcto($event)
            "
            v-on:changeobs="update_personaria_de_la_socidedad_obs($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-green-300 bg-opacity-20
                rounded
                text-gray-900
                border-2 border-green-600
                hover:border-green-900
              "
            >
              <p class="p-3">
                Documentación que justifique personería de la sociedad. Este
                documento es un archivo pdf, png o jpeg.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            concesion resolucion minera de Mina valor padre: {{}} <br />
            concesion resolucion minera de Mina valido del padre: {{}} <br />
            concesion resolucion minera de Mina correcto deel padre: {{}} <br />
            concesion resolucion minera de Mina observacion deel padre: {{}}
            <br />
            concesion resolucion minera de Mina observacion valida deel padre:
            {{}}
          </div>
        </div>
      </div>
      <br />
      <br />
      <BotonesPaginaGeneric
        :link_volver="link_volver"
        :titulo_boton_volver="'Volver'"
        :mostrar_btn_volver="false"
        :titulo_boton_guardar="'Guardar'"
        :formulario="form_tucuman_test"
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
        :formulario="form_tucuman_test"
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
import JetDialogModal from "@/Jetstream/DialogModal";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
import BotonesPaginaGeneric from "@/Pages/Productors/BotonesPaginaGeneric";

import Label from "../../Jetstream/Label.vue";
export default {
  props: [
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",
    "titulo_pagina",

    "evaluacion",
    "testing",
    "id",
  ],
  components: {
    JetDialogModal,
    Card,
    Menu,
    SelectGeneric,
    NombreMina,
    TipoDeSistemaGeo,
    BotonesPaginaGeneric,
    SubirArchivo,
    CaracterQueInvoca,
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
      form_tucuman_test: {},
      lista_departamentos: [],
      lista_localidades: [],
      arrayTipoPersona: [
        { id: 1, nombre: "Persona Física" },
        { id: 2, nombre: "Sociedad" },
        { id: 3, nombre: "Funcionario Público" },
      ],
      tipopersona: "Persona Física",
      dni_frente: "DNI FRENTE",
      dni_dorso: "DNI DORSO",
    };
  },
  methods: {
    update_valor(valor) {
      // Select Tipo de Persona - Provincia de Tucuman
      this.tipopersona = valor;
      this.form_tucuman_test.tipopersona = valor;
      if (this.tipopersona === "Sociedad") {
        this.dni_frente = "DNI FRENTE (del gerente de la sociedad)";
        this.dni_dorso = "DNI DORSO (del gerente de la sociedad)";
      } else {
        this.dni_frente = "DNI FRENTE";
        this.dni_dorso = "DNI DORSO";
      }
    },

    cambio_input(valor) {
      this.$emit("changevalor", valor);
    },

    update_valor_evaluacion_Adm(newValor) {
      this.evaluacion_adm = newValor;
    },
    cerrar_modal_datos_uno() {
      this.mostrar_modal_datos_ya_guardados = false;
    },

    //
    update_tipo(newValue) {
      this.form_tucuman_test.tipo = newValue;
    },
    // CUIT
    update_cuit_valor(newValue) {
      this.form_tucuman_test.cuit = newValue;
    },
    update_cuit_valido(newValue) {
      this.form_tucuman_test.cuit_valido = newValue;
    },
    update_cuit_correcto(newValue) {
      this.form_tucuman_test.cuit_correcto = newValue;
    },
    update_obs_cuit(newValue) {
      this.form_tucuman_test.obs_cuit = newValue;
    },
    //  DNI FRENTE PERSONA / GERENTE
    update_dni_frente_persona(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_frente_gerente = newValue;
      } else {
        this.form_tucuman_test.dni_frente_persona = newValue;
      }
    },
    update_dni_frente_persona_valido(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_frente_gerente_valido = newValue;
      } else {
        this.form_tucuman_test.dni_frente_persona_valido = newValue;
      }
    },
    update_dni_frente_persona_correcto(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_frente_gerente_correcto = newValue;
      } else {
        this.form_tucuman_test.dni_frente_persona_correcto = newValue;
      }
    },
    update_dni_frente_persona_obs(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_frente_gerente_obs = newValue;
      } else {
        this.form_tucuman_test.dni_frente_persona_obs = newValue;
      }
    },
    //  DNI REVERSE PERSONA / GERENTE
    update_dni_reverso_persona(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_reverso_gerente = newValue;
      } else {
        this.form_tucuman_test.dni_reverso_persona = newValue;
      }
    },
    update_dni_reverso_persona_valido(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_reverso_gerente_valido = newValue;
      } else {
        this.form_tucuman_test.dni_reverso_persona_valido = newValue;
      }
    },
    update_dni_reverso_persona_correcto(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_reverso_gerente_correcto = newValue;
      } else {
        this.form_tucuman_test.dni_reverso_persona_correcto = newValue;
      }
    },
    update_dni_reverso_persona_obs(newValue) {
      if (this.tipopersona === "Sociedad") {
        this.form_tucuman_test.dni_reverso_gerente_obs = newValue;
      } else {
        this.form_tucuman_test.dni_reverso_persona_obs = newValue;
      }
    },
    // DECRETO DE NOMBRAMIENTO
    update_decreto_de_nombramiento(newValue) {
      this.form_tucuman_test.decreto_de_nombramiento = newValue;
    },
    update_decreto_de_nombramiento_valido(newValue) {
      this.form_tucuman_test.decreto_de_nombramiento_valido = newValue;
    },
    update_decreto_de_nombramiento_correcto(newValue) {
      this.form_tucuman_test.decreto_de_nombramiento_correcto = newValue;
    },
    update_decreto_de_nombramiento_obs(newValue) {
      this.form_tucuman_test.decreto_de_nombramiento_obs = newValue;
    },
    // DNI FRENTE GERENTE
    // update_dni_frente_gerente(newValue) {
    //   this.form_tucuman_test.dni_frente_gerente = newValue;
    // },
    // DNI REVERSO GERENTE
    // update_dni_reverso_gerente(newValue) {
    //   this.form_tucuman_test.dni_reverso_gerente = newValue;
    // },
    // DNI FRENTE REPRESENTANTE LEGAL
    update_dni_frente_representante_legal(newValue) {
      this.form_tucuman_test.dni_frente_representante_legal = newValue;
    },
    update_dni_frente_representante_legal_valido(newValue) {
      this.form_tucuman_test.dni_frente_representante_legal_valido = newValue;
    },
    update_dni_frente_representante_legal_correcto(newValue) {
      this.form_tucuman_test.dni_frente_representante_legal_correcto = newValue;
    },
    update_dni_frente_representante_legal_obs(newValue) {
      this.form_tucuman_test.dni_frente_representante_legal_obs = newValue;
    },
    // DNI REVERSO REPRESENTANTE LEGAL
    update_dni_reverso_representante_legal(newValue) {
      this.form_tucuman_test.dni_reverso_representante_legal = newValue;
    },
    update_dni_reverso_representante_legal_valido(newValue) {
      this.form_tucuman_test.dni_reverso_representante_legal_valido = newValue;
    },
    update_dni_reverso_representante_legal_correcto(newValue) {
      this.form_tucuman_test.dni_reverso_representante_legal_correcto =
        newValue;
    },
    update_dni_reverso_representante_legal_obs(newValue) {
      this.form_tucuman_test.dni_reverso_representante_legal_obs = newValue;
    },
    // PERSONERIA DEL REPRESENTANTE LEGAL
    update_personeria_del_representante_legal(newValue) {
      this.form_tucuman_test.personeria_del_representante_legal = newValue;
    },
    update_personeria_del_representante_legal_valido(newValue) {
      this.form_tucuman_test.personeria_del_representante_legal_valido =
        newValue;
    },
    update_personeria_del_representante_legal_correcto(newValue) {
      this.form_tucuman_test.personeria_del_representante_legal_correcto =
        newValue;
    },
    update_personeria_del_representante_legal_obs(newValue) {
      this.form_tucuman_test.personeria_del_representante_legal_obs = newValue;
    },
    // PERSONERIA DE LA SOCIEDAD
    update_personaria_de_la_socidedad(newValue) {
      this.form_tucuman_test.personaria_de_la_socidedad = newValue;
    },
    update_personaria_de_la_socidedad_valido(newValue) {
      this.form_tucuman_test.personaria_de_la_socidedad_valido = newValue;
    },
    update_personaria_de_la_socidedad_correcto(newValue) {
      this.form_tucuman_test.personaria_de_la_socidedad_correcto = newValue;
    },
    update_personaria_de_la_socidedad_obs(newValue) {
      this.form_tucuman_test.personaria_de_la_socidedad_obs = newValue;
    },
    //  APELLIDO DEL REPRESENTANTE 
    update_representante_apellido(newValue) {
      this.form_tucuman_test.representante_apellido = newValue;
    },
    update_representante_apellido_valido(newValue) {
      this.form_tucuman_test.representante_apellido_valido = newValue;
    },
    update_representante_apellido_correcto(newValue) {
      this.form_tucuman_test.representante_apellido_correcto = newValue;
    },
    update_representante_apellido_obs(newValue) {
      this.form_tucuman_test.representante_apellido_obs = newValue;
    },
    //  NOMBRE DEL REPRESENTANTE 
    update_representante_nombre(newValue) {
      this.form_tucuman_test.representante_nombre = newValue;
    },
    update_representante_nombre_valido(newValue) {
      this.form_tucuman_test.representante_nombre_valido = newValue;
    },
    update_representante_nombre_correcto(newValue) {
      this.form_tucuman_test.representante_nombre_correcto = newValue;
    },
    update_representante_nombre_obs(newValue) {
      this.form_tucuman_test.representante_nombre_obs = newValue;
    },
    //  DNI DEL REPRESENTANTE
    update_representante_dni(newValue) {
      this.form_tucuman_test.representante_dni = newValue;
    },
    update_representante_dni_valido(newValue) {
      this.form_tucuman_test.representante_dni_valido = newValue;
    },
    update_representante_dni_correcto(newValue) {
      this.form_tucuman_test.representante_dni_correcto = newValue;
    },
    update_representante_dni_obs(newValue) {
      this.form_tucuman_test.representante_dni_obs = newValue;
    },
    //  APELLIDO PERSONA AUTORIZADA
    update_persona_autorizada_apellido(newValue) {
      this.form_tucuman_test.persona_autorizada_apellido = newValue;
    },
    update_persona_autorizada_apellido_valido(newValue) {
      this.form_tucuman_test.persona_autorizada_apellido_valido = newValue;
    },
    update_persona_autorizada_apellido_correcto(newValue) {
      this.form_tucuman_test.persona_autorizada_apellido_correcto = newValue;
    },
    update_persona_autorizada_apellido_obs(newValue) {
      this.form_tucuman_test.persona_autorizada_apellido_obs = newValue;
    },
    //  NOMBRE PERSONA AUTORIZADA
    update_persona_autorizada_nombre(newValue) {
      this.form_tucuman_test.persona_autorizada_nombre = newValue;
    },
    update_persona_autorizada_nombre_valido(newValue) {
      this.form_tucuman_test.persona_autorizada_nombre_valido = newValue;
    },
    update_persona_autorizada_nombre_correcto(newValue) {
      this.form_tucuman_test.persona_autorizada_nombre_correcto = newValue;
    },
    update_persona_autorizada_nombre_obs(newValue) {
      this.form_tucuman_test.persona_autorizada_nombre_obs = newValue;
    },
    //  DNI PERSONA AUTORIZADA
    update_persona_autorizada_dni(newValue) {
      this.form_tucuman_test.persona_autorizada_dni = newValue;
    },
    update_persona_autorizada_dni_valido(newValue) {
      this.form_tucuman_test.persona_autorizada_dni_valido = newValue;
    },
    update_persona_autorizada_dni_correcto(newValue) {
      this.form_tucuman_test.persona_autorizada_dni_correcto = newValue;
    },
    update_persona_autorizada_dni_obs(newValue) {
      this.form_tucuman_test.persona_autorizada_dni_obs = newValue;
    },
    //  TELEFONO PERSONA AUTORIZADA
    update_persona_autorizada_telefono(newValue) {
      this.form_tucuman_test.persona_autorizada_telefono = newValue;
    },
    update_persona_autorizada_telefono(newValue) {
      this.form_tucuman_test.persona_autorizada_telefono_valido = newValue;
    },
    update_persona_autorizada_telefono(newValue) {
      this.form_tucuman_test.persona_autorizada_telefono_correcto = newValue;
    },
    update_persona_autorizada_telefono(newValue) {
      this.form_tucuman_test.persona_autorizada_telefono_obs = newValue;
    },
    //  EMAIL PERSONA AUTORIZADA
    update_persona_autorizada_email(newValue) {
      this.form_tucuman_test.persona_autorizada_email = newValue;
    },
    update_persona_autorizada_email_valido(newValue) {
      this.form_tucuman_test.persona_autorizada_email_valido = newValue;
    },
    update_persona_autorizada_email_correcto(newValue) {
      this.form_tucuman_test.persona_autorizada_email_correcto = newValue;
    },
    update_persona_autorizada_email_obs(newValue) {
      this.form_tucuman_test.persona_autorizada_email_obs = newValue;
    },
    //  DOMICILIO PERSONA AUTORIZADA
    update_persona_autorizada_domicilio(newValue) {
      this.form_tucuman_test.persona_autorizada_domicilio = newValue;
    },
    update_persona_autorizada_domicilio_valido(newValue) {
      this.form_tucuman_test.persona_autorizada_domicilio_valido = newValue;
    },
    update_persona_autorizada_domicilio_correcto(newValue) {
      this.form_tucuman_test.persona_autorizada_domicilio_correcto = newValue;
    },
    update_persona_autorizada_domicilio_obs(newValue) {
      this.form_tucuman_test.persona_autorizada_domicilio_obs = newValue;
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
      // console.log("por buscar los datos de catamarca desde el hijo \n\n\n");
      // console.log("\n\n\n mi id es : " + this.$props.id + " \n\n\n");
      if (this.$inertia.page.props.user.id_provincia === 90) {
        if (
          typeof this.$props.id === "undefined" ||
          this.$props.id === null ||
          this.$props.id === "null"
        ) {
          /*********** Seleccionar Tipo de Persona *************/
          self.form_tucuman_test.tipo = null;
          /******************** Archivos ***********************/
          self.form_tucuman_test.cuit = null;
          self.form_tucuman_test.cuit_correcto = null;
          self.form_tucuman_test.cuit_obs = null;

          self.form_tucuman_test.dni_frente_persona = null;
          self.form_tucuman_test.dni_frente_persona_correcto = null;
          self.form_tucuman_test.dni_frente_persona_obs = null;

          self.form_tucuman_test.dni_reverso_persona = null;
          self.form_tucuman_test.dni_reverso_persona_correcto = null;
          self.form_tucuman_test.dni_reverso_persona_obs = null;

          self.form_tucuman_test.dni_frente_gerente = null;
          self.form_tucuman_test.dni_frente_gerente_correcto = null;
          self.form_tucuman_test.dni_frente_gerente_obs = null;

          self.form_tucuman_test.dni_reverso_gerente = null;
          self.form_tucuman_test.dni_reverso_gerente_correcto = null;
          self.form_tucuman_test.dni_reverso_gerente_obs = null;

          self.form_tucuman_test.dni_frente_representante_legal = null;
          self.form_tucuman_test.dni_frente_representante_legal_correcto = null;
          self.form_tucuman_test.dni_frente_representante_legal_obs = null;

          self.form_tucuman_test.dni_reverso_representante_legal = null;
          self.form_tucuman_test.dni_reverso_representante_legal_correcto =
            null;
          self.form_tucuman_test.dni_reverso_representante_legal_obs = null;

          self.form_tucuman_test.personaria_de_la_socidedad = null;
          self.form_tucuman_test.personaria_de_la_socidedad_correcto = null;
          self.form_tucuman_test.personaria_de_la_socidedad_obs = null;

          self.form_tucuman_test.personeria_del_representante_legal = null;
          self.form_tucuman_test.personeria_del_representante_legal_correcto =
            null;
          self.form_tucuman_test.personeria_del_representante_legal_obs = null;

          self.form_tucuman_test.decreto_de_nombramiento = null;
          self.form_tucuman_test.decreto_de_nombramiento_correcto = null;
          self.form_tucuman_test.decreto_de_nombramiento_obs = null;

          /********* Representante Legal (opcional) ************/
          self.form_tucuman_test.representante_apellido = null;
          self.form_tucuman_test.representante_apellido_correcto = null;
          self.form_tucuman_test.representante_apellido_obs = null;

          self.form_tucuman_test.representante_nombre = null;
          self.form_tucuman_test.representante_nombre_correcto = null;
          self.form_tucuman_test.representante_nombre_obs = null;

          self.form_tucuman_test.representante_dni = null;
          self.form_tucuman_test.representante_dni_correcto = null;
          self.form_tucuman_test.representante_dni_obs = null;

          /** Persona autorizada a realizar tramites administrativos **/
          self.form_tucuman_test.persona_autorizada_nombre = null;
          self.form_tucuman_test.persona_autorizada_nombre_correcto = null;
          self.form_tucuman_test.persona_autorizada_nombre_obs = null;

          self.form_tucuman_test.persona_autorizada_apellido = null;
          self.form_tucuman_test.persona_autorizada_apellido_correcto = null;
          self.form_tucuman_test.persona_autorizada_apellido_obs = null;

          self.form_tucuman_test.persona_autorizada_dni = null;
          self.form_tucuman_test.persona_autorizada_dni_correcto = null;
          self.form_tucuman_test.persona_autorizada_dni_obs = null;

          self.form_tucuman_test.persona_autorizada_telefono = null;
          self.form_tucuman_test.persona_autorizada_telefono_correcto = null;
          self.form_tucuman_test.persona_autorizada_telefono_obs = null;

          self.form_tucuman_test.persona_autorizada_email = null;
          self.form_tucuman_test.persona_autorizada_email_correcto = null;
          self.form_tucuman_test.persona_autorizada_email_obs = null;

          self.form_tucuman_test.persona_autorizada_domicilio = null;
          self.form_tucuman_test.persona_autorizada_domicilio_correcto = null;
          self.form_tucuman_test.persona_autorizada_domicilio_obs = null;

          //voy a buscar los permisos
          axios
            .get("/formularios/traer_permisos_pagina_tucuman/0/crear")
            .then(function (response) {
              if (response.data.status === "ok") {
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
              "/formularios/traer_datos_pagina_tucuman" +
                "/" +
                parseInt(this.$props.id)
            )
            .then(function (response) {
              if (response.data.status === "ok") {
                self.form_tucuman_test = response.data.datos;
              } else console.log("error al buscar datos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
          //voy a buscar los permisos
          axios
            .get(
              "/formularios/traer_permisos_pagina_tucuman" +
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
        }
      }
    });
  },
};
</script>