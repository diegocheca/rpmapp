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
            v-bind:valor_input_props="
              form_salta_test.telefono
            "
            v-bind:valor_input_validacion="
              form_salta_test.telefono_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.telefono_correcto
            "
            v-bind:valor_obs="form_salta_test.telefono_obs"
            v-bind:valor_valido_obs="
              form_salta_test.telefono_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Telefono:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/numexp.svg'"
            v-bind:desactivar_input="
              permisos_disables.telefono
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Teléfono del Representante Legal'"
            v-on:changevalor="update_telefono($event)"
            v-on:changevalido="update_telefono_valido($event)
            "
            v-on:changecorrecto="update_telefono_correcto($event)
            "
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
            v-bind:valor_input_props="
              form_salta_test.nacionalidad
            "
            v-bind:valor_input_validacion="
              form_salta_test.nacionalidad_valido
            "
            v-bind:evualacion_correcto="
              form_salta_test.nacionalidad_correcto
            "
            v-bind:valor_obs="form_salta_test.nacionalidad_obs"
            v-bind:valor_valido_obs="
              form_salta_test.nacionalidad_obs_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nacionalidad:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/telstreet.svg'"
            v-bind:desactivar_input="
              permisos_disables.nacionalidad
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Nacionalidad del Representante Legal'"
            v-on:changevalor="update_nacionalidad($event)"
            v-on:changevalido="
              update_nacionalidad_valido($event)
            "
            v-on:changecorrecto="
              update_nacionalidad_correcto($event)
            "
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
            v-bind:valor_input_props="form_salta_test.representante_legal_domicilio"
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
            v-bind:desactivar_input="permisos_disables.representante_legal_domicilio"
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Domicilio del Representante Legal'"
            v-on:changevalor="update_representante_legal_domicilio($event)"
            v-on:changevalido="update_representante_legal_domicilio_valido($event)"
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
            v-bind:valor_valido_obs="
              form_salta_test.responsable_dni_obs_valido
            "
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
            v-bind:valor_input_props="
              form_salta_test.responsable_matricula
            "
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
            v-bind:desactivar_input="
              permisos_disables.responsable_matricula
            "
            v-bind:mostrar_correccion="false"
            v-bind:desactivar_correccion="false"
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-bind:placeholder="'Número de Matrícula de Responsable Tecnico'"
            v-on:changevalor="update_responsable_matricula($event)"
            v-on:changevalido="
              update_responsable_matricula_valido($event)
            "
            v-on:changecorrecto="
              update_responsable_matricula_correcto($event)
            "
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
            v-on:changecorrecto="
              update_responsable_titulo_correcto($event)
            "
            v-on:changeobs="update_responsable_titulo_obs($event)"
          >
          </NombreMina>
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

    "evaluacion",
    "testing",
    "id",
    "editar",
    "lista_provincias",
    "lista_dptos"

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
    };
  },
  methods: {
    update_valor(valor) {
      // Select Tipo
      this.tipopersona = valor;
      this.form_salta_test.tipopersona = valor;
      switch (this.tipopersona) {
        case "Plantas":
          this.label_responsable_tecnico = "de la Planta";
          break;
        case "Productores":
          this.label_responsable_tecnico = "de la Explotación";
          break;
        case "Exploradores":
          this.label_responsable_tecnico = "de la Exploración";
          break;
        default:
          this.label_responsable_tecnico = "";
          break;
      }
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
        if (
          typeof this.$props.id === "undefined" ||
          this.$props.id === null ||
          this.$props.id === "null"
        ) {
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
