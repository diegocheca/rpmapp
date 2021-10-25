<template>
  <div
    class="
      border-2
      shadow-lg
      rounded-2xl
      w-full
      py-4
      px-8
      bg-white
      shadow-lg
      my-20
      border-indigo-400
    "
  >
    <div class="flex justify-center md:justify-end -mt-16 sticky top-0 z-10">
      <a href="#section_catamarca">
        <img
          class="
            w-20
            h-20
            object-cover
            rounded-full
            border-2 border-indigo-500
            bg-white
          "
          :src="
            $inertia.page.props.appName +
            '/formulario_alta/imagenes/catamarca.png'
          "
          width="50%"
        />
      </a>
      <div v-if="$props.testing">
        <label
          class="flex items-center relative w-max cursor-pointer select-none"
        >
          <br />
          <br />
          <input
            type="checkbox"
            class="
              appearance-none
              transition-colors
              cursor-pointer
              w-14
              h-7
              rounded-full
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-offset-black
              focus:ring-blue-500
              bg-red-500
            "
            v-model="mostrar_testing"
          />
          <span
            class="absolute font-medium text-xs uppercase right-1 text-white"
          >
            Sin
          </span>
          <span
            class="absolute font-medium text-xs uppercase right-8 text-white"
          >
            Con
          </span>
          <span
            class="
              w-7
              h-7
              right-7
              absolute
              rounded-full
              transform
              transition-transform
              bg-gray-200
            "
          />
        </label>
        <label
          class="flex items-center relative w-max cursor-pointer select-none"
        >
          <br />
          <br />
          <input
            type="checkbox"
            class="
              appearance-none
              transition-colors
              cursor-pointer
              w-14
              h-7
              rounded-full
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-offset-black
              focus:ring-green-500
              bg-purple-500
            "
            v-model="autoridad_minera"
          />
          <span
            class="absolute font-medium text-xs uppercase right-1 text-white"
          >
            Pro
          </span>
          <span
            class="absolute font-medium text-xs uppercase right-8 text-white"
          >
            Aut
          </span>
          <span
            class="
              w-7
              h-7
              right-7
              absolute
              rounded-full
              transform
              transition-transform
              bg-gray-200
            "
          />
        </label>
      </div>
    </div>
    <div>
      <h2 class="text-gray-800 text-3xl font-semibold">{{ titulo_pagina }}</h2>
      <br /><br />
      <div class="flex items-center justify-center"></div>
      <br />
      <br />
      <div class="flex">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <span>Pagina de catamarca</span>
        </div>
        <br />
        <br />
      </div>
      <div class="flex">
        <!-- <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <NombreMina
                    v-if="$props.mostrar_nombre_gestor"
                    v-bind:valor_input_props="form_pagina.gestor_nombre_apellido"
                    v-bind:valor_input_validacion="
                    form_pagina.gestor_nombre_apellido_valido
                    "
                    v-bind:evualacion_correcto="
                    form_pagina.gestor_nombre_apellido_correcto
                    "
                    v-bind:valor_obs="form_pagina.obs_gestor_nombre_apellido"
                    v-bind:valor_valido_obs="form_pagina.obs_gestor_nombre_valido"
                    v-bind:evaluacion="autoridad_minera"
                    v-bind:testing="mostrar_testing"
                    v-bind:label="'Nombre y Apellido del Gestor:'"
                    v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                    v-bind:desactivar_input="$props.desactivar_nombre_gestor"
                    v-bind:mostrar_correccion="$props.mostrar_nombre_gestor_correccion"
                    v-bind:desactivar_correccion="
                    $props.desactivar_nombre_gestor_correccion
                    "
                    v-on:changevalido="update_nombre_gestor_valido($event)"
                    v-on:changecorrecto="update_nombre_gestor_correcto($event)"
                    v-on:changeobs="update_obs_nombre_gestor($event)"
                    v-on:changeobsvalido="update_obs_nombre_gestor_valida($event)"
                    v-on:changevalor="update_valor_nombre_gestor($event)"
                >
                </NombreMina>
            </div> -->
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <NombreMina
            v-if="permisos_mostrar.nombre_gestor"
            v-bind:valor_input_props="
              form_catamarca_test.gestor_nombre_apellido
            "
            v-bind:valor_input_validacion="
              form_catamarca_test.gestor_nombre_apellido_valido
            "
            v-bind:evualacion_correcto="
              form_catamarca_test.gestor_nombre_apellido_correcto
            "
            v-bind:valor_obs="form_catamarca_test.obs_gestor_nombre_apellido"
            v-bind:valor_valido_obs="
              form_catamarca_test.obs_gestor_nombre_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Nombre y Apellido del Gestor:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
            v-bind:desactivar_input="permisos_disables.nombre_gestor"
            v-bind:mostrar_correccion="
              permisos_mostrar.nombre_gestor_correccion
            "
            v-bind:desactivar_correccion="
              permisos_disables.nombre_gestor_correccion
            "
            v-on:changevalido="update_nombre_gestor_valido($event)"
            v-on:changecorrecto="update_nombre_gestor_correcto($event)"
            v-on:changeobs="update_obs_nombre_gestor($event)"
            v-on:changeobsvalido="update_obs_nombre_gestor_valida($event)"
            v-on:changevalor="update_valor_nombre_gestor($event)"
          >
          </NombreMina>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <NombreMina
            v-if="permisos_mostrar.dni_gestor"
            v-bind:valor_input_props="form_catamarca_test.gestor_dni"
            v-bind:valor_input_validacion="
              form_catamarca_test.gestor_dni_valido
            "
            v-bind:evualacion_correcto="form_catamarca_test.gestor_dni_correcto"
            v-bind:valor_obs="form_catamarca_test.obs_gestor_dni"
            v-bind:valor_valido_obs="form_catamarca_test.obs_gestor_dni_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'DNI del Gestor:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
            v-bind:desactivar_input="permisos_disables.dni_gestor"
            v-bind:mostrar_correccion="permisos_mostrar.dni_gestor_correccion"
            v-bind:desactivar_correccion="
              permisos_disables.dni_gestor_correccion
            "
            v-on:changevalido="update_gestor_dni_valido($event)"
            v-on:changecorrecto="update_gestor_dni_correcto($event)"
            v-on:changeobs="update_obs_gestor_dni($event)"
            v-on:changeobsvalido="update_obs_gestor_dni_valida($event)"
            v-on:changevalor="update_valor_gestor_dni($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <NombreMina
            v-if="permisos_mostrar.profesion_gestor"
            v-bind:valor_input_props="form_catamarca_test.gestor_profesion"
            v-bind:valor_input_validacion="
              form_catamarca_test.gestor_profesion_valido
            "
            v-bind:evualacion_correcto="
              form_catamarca_test.gestor_profesion_correcto
            "
            v-bind:valor_obs="form_catamarca_test.obs_gestor_profesion"
            v-bind:valor_valido_obs="
              form_catamarca_test.obs_gestor_profesion_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Profesión del Gestor:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
            v-bind:desactivar_input="permisos_disables.profesion_gestor"
            v-bind:mostrar_correccion="
              permisos_mostrar.profesion_gestor_correccion
            "
            v-bind:desactivar_correccion="
              permisos_disables.profesion_gestor_correccion
            "
            v-on:changevalido="update_gestor_profesion_valido($event)"
            v-on:changecorrecto="update_gestor_profesion_correcto($event)"
            v-on:changeobs="update_obs_gestor_profesion($event)"
            v-on:changeobsvalido="update_obs_gestor_profesion_valida($event)"
            v-on:changevalor="update_valor_gestor_profesion($event)"
          >
          </NombreMina>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <NombreMina
            v-if="permisos_mostrar.telefono_gestor"
            v-bind:valor_input_props="form_catamarca_test.gestor_telefono"
            v-bind:valor_input_validacion="
              form_catamarca_test.gestor_telefono_valido
            "
            v-bind:evualacion_correcto="
              form_catamarca_test.gestor_telefono_correcto
            "
            v-bind:valor_obs="form_catamarca_test.obs_gestor_telefono"
            v-bind:valor_valido_obs="
              form_catamarca_test.obs_gestor_telefono_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Telefono del Gestor:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
            v-bind:desactivar_input="permisos_disables.telefono_gestor"
            v-bind:mostrar_correccion="
              permisos_mostrar.telefono_gestor_correccion
            "
            v-bind:desactivar_correccion="
              permisos_disables.telefono_gestor_correccion
            "
            v-on:changevalido="update_gestor_telefono_valido($event)"
            v-on:changecorrecto="update_gestor_telefono_correcto($event)"
            v-on:changeobs="update_obs_gestor_telefono($event)"
            v-on:changeobsvalido="update_obs_gestor_telefono_valida($event)"
            v-on:changevalor="update_valor_gestor_telefono($event)"
          >
          </NombreMina>
        </div>
      </div>
      <div class="flex">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <NombreMina
            v-if="permisos_mostrar.email_gestor"
            v-bind:valor_input_props="form_catamarca_test.gestor_email"
            v-bind:valor_input_validacion="
              form_catamarca_test.gestor_email_valido
            "
            v-bind:evualacion_correcto="
              form_catamarca_test.gestor_email_correcto
            "
            v-bind:valor_obs="form_catamarca_test.obs_gestor_email"
            v-bind:valor_valido_obs="
              form_catamarca_test.obs_gestor_email_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Email del Gestor:'"
            v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
            v-bind:desactivar_input="permisos_disables.email_gestor"
            v-bind:mostrar_correccion="permisos_mostrar.email_gestor_correccion"
            v-bind:desactivar_correccion="
              permisos_disables.email_gestor_correccion
            "
            v-on:changevalido="update_gestor_email_valido($event)"
            v-on:changecorrecto="update_gestor_email_correcto($event)"
            v-on:changeobs="update_obs_gestor_email($event)"
            v-on:changeobsvalido="update_obs_gestor_email_valida($event)"
            v-on:changevalor="update_valor_gestor_email($event)"
          >
          </NombreMina>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-blue-50
                text-gray-800
                bg-opacity-20
                text-opacity-80
                ring ring-4 ring-blue-100
              "
            >
              <p class="p-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na m
                quisquam doloremque placeat op.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- localidad_mina_provincia deel padre --
            localidad_mina_provincia_validacion valida deel padre{ --
            localidad_mina_provincia_correcto correcto deel padre --
            obs_localidad_mina_provincia observacion deel padre --
            obs_localidad_mina_provincia_valido observacion valida deel padre
          </div>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <CaracterQueInvoca
            v-if="permisos_mostrar.notificacion_gestor"
            v-bind:valor_input_props="form_catamarca_test.gestor_notificacion"
            v-bind:evualacion_correcto="
              form_catamarca_test.gestor_notificacion_correcto
            "
            v-bind:valor_obs="form_catamarca_test.obs_gestor_notificacion"
            v-bind:valor_valido_obs="
              form_catamarca_test.obs_gestor_notificacion_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Notificar al Gestor'"
            v-bind:label_true="'Si'"
            v-bind:label_false="'No'"
            v-bind:otro_label="false"
            v-bind:otro_input="false"
            v-bind:name_correcion="'correcion_gestor'"
            v-bind:name_checkbox="'check_gestor'"
            v-bind:desactivar_owner="permisos_disables.notificacion_gestor"
            v-bind:mostrar_owner_correccion="
              permisos_mostrar.notificacion_gestor_correccion
            "
            v-bind:desactivar_owner_correccion="
              permisos_disables.notificacion_gestor_correccion
            "
            v-on:changecorrecto="update_gestor_noti_correcto($event)"
            v-on:changeobs="update_obs_gestor_noti($event)"
            v-on:changeobsvalido="update_obs_gestor_noti_valida($event)"
            v-on:changevalor="update_valor_gestor_noti($event)"
          ></CaracterQueInvoca>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-blue-50
                text-gray-800
                bg-opacity-20
                text-opacity-80
                ring ring-4 ring-blue-100
              "
            >
              <p class="p-3">
                Cuando se selecciona la opcion "Si" el gestor será notificado de
                los eventos relacionados a este formulario.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            <br />
            notificacion de gestor valor padre:
            {{ form_catamarca_test.gestor_notificacion }} <br />
            notificacion de gestor correcto deel padre:
            {{ form_catamarca_test.gestor_notificacion_correcto }} <br />
            notificacion de gestor observacion deel padre:
            {{ form_catamarca_test.obs_gestor_notificacion }} <br />
            notificacion de gestor observacion valida deel padre:
            {{ form_catamarca_test.obs_gestor_notificacion_valido }}
          </div>
        </div>
      </div>
      <div class="flex"></div>
      <div class="flex">
        <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
          <SubirArchivo
            v-if="permisos_mostrar.foto_productor"
            v-bind:valor_input_props="form_catamarca_test.foto_4x4"
            v-bind:valor_input_validacion="form_catamarca_test.foto_4x4_valido"
            v-bind:evualacion_correcto="form_catamarca_test.foto_4x4_correcto"
            v-bind:valor_obs="form_catamarca_test.obs_foto_4x4"
            v-bind:valor_valido_obs="form_catamarca_test.obs_foto_4x4_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Foto 4x4'"
            v-bind:desactivar_input="permisos_disables.foto_productor"
            v-bind:mostrar_correccion="
              permisos_mostrar.foto_productor_correccion
            "
            v-bind:desactivar_correccion="
              permisos_disables.foto_productor_correccion
            "
            v-on:changevalido="update_foto_valido($event)"
            v-on:changecorrecto="update_foto_correcto($event)"
            v-on:changeobs="update_obs_foto($event)"
            v-on:changeobsvalido="update_obs_foto_valido($event)"
            v-on:changevalor="update_obs_foto_valido($event)"
            v-on:cambioarchivo="cambio_el_archivo_foto($event)"
          >
          </SubirArchivo>
          <div v-show="ayuda_local">
            <br />
            <div
              class="
                bg-blue-50
                text-gray-800
                bg-opacity-20
                text-opacity-80
                ring ring-4 ring-blue-100
              "
            >
              <p class="p-3">
                Una Foto 4x4. Este acpeta los siguientes formatos: pdf, png o
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
      </div>
    </div>
    <div class="flex">
      <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
        <SubirArchivo
          v-if="permisos_mostrar.foto_productor"
          v-bind:valor_input_props="form_catamarca_test.foto_4x4"
          v-bind:valor_input_validacion="form_catamarca_test.foto_4x4_valido"
          v-bind:evualacion_correcto="form_catamarca_test.foto_4x4_correcto"
          v-bind:valor_obs="form_catamarca_test.obs_foto_4x4"
          v-bind:valor_valido_obs="form_catamarca_test.obs_foto_4x4_valido"
          v-bind:evaluacion="autoridad_minera"
          v-bind:testing="mostrar_testing"
          v-bind:label="'Foto 4x4'"
          v-bind:desactivar_input="permisos_disables.foto_productor"
          v-bind:mostrar_correccion="permisos_mostrar.foto_productor_correccion"
          v-bind:desactivar_correccion="
            permisos_disables.foto_productor_correccion
          "
          v-on:changevalido="update_foto_valido($event)"
          v-on:changecorrecto="update_foto_correcto($event)"
          v-on:changeobs="update_obs_foto($event)"
          v-on:changeobsvalido="update_obs_foto_valido($event)"
          v-on:changevalor="update_obs_foto_valido($event)"
          v-on:cambioarchivo="cambio_el_archivo_foto($event)"
        >
        </SubirArchivo>
        <div v-show="ayuda_local">
          <br />
          <div
            class="
              bg-blue-50
              text-gray-800
              bg-opacity-20
              text-opacity-80
              ring ring-4 ring-blue-100
            "
          >
            <p class="p-3">
              Una Foto 4x4. Este acpeta los siguientes formatos: pdf, png o
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
    </div>
    <br />
    <hr />
    <br />
    <div class="flex">
      <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
        <SubirArchivo
          v-if="permisos_mostrar.dni_productor"
          v-bind:valor_input_props="form_catamarca_test.primer_hoja_dni"
          v-bind:valor_input_validacion="form_catamarca_test.hoja_dni_valido"
          v-bind:evualacion_correcto="form_catamarca_test.hoja_dni_correcto"
          v-bind:valor_obs="form_catamarca_test.obs_hoja_dni"
          v-bind:valor_valido_obs="form_catamarca_test.obs_hoja_dni_valido"
          v-bind:evaluacion="autoridad_minera"
          v-bind:testing="mostrar_testing"
          v-bind:label="'Copia de 1° hoja de D.N.I.'"
          v-bind:desactivar_input="permisos_disables.dni_productor"
          v-bind:mostrar_correccion="permisos_mostrar.dni_productor_correccion"
          v-bind:desactivar_correccion="
            permisos_disables.dni_productor_correccion
          "
          v-on:changevalido="update_resol_conce_valido($event)"
          v-on:changecorrecto="update_resol_conce_correcto($event)"
          v-on:changeobs="update_obs_resol_conce($event)"
          v-on:changeobsvalido="update_obs_canon_valido($event)"
          v-on:changevalor="update_obs_resol_conce_valido($event)"
          v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
        >
        </SubirArchivo>
        <br />
        <hr />
        <br />
        <SubirArchivo
          v-if="permisos_mostrar.dni_productor"
          v-bind:valor_input_props="form_catamarca_test.segunda_hoja_dni"
          v-bind:valor_input_validacion="
            form_catamarca_test.segunda_hoja_dni_valido
          "
          v-bind:evualacion_correcto="
            form_catamarca_test.segunda_hoja_dni_correcto
          "
          v-bind:valor_obs="form_catamarca_test.obs_segunda_hoja_dni"
          v-bind:valor_valido_obs="
            form_catamarca_test.obs_segunda_hoja_dni_valido
          "
          v-bind:evaluacion="autoridad_minera"
          v-bind:testing="mostrar_testing"
          v-bind:label="'Copia de 2° hoja de D.N.I.'"
          v-bind:desactivar_input="permisos_disables.desactivar_dni_productor"
          v-bind:mostrar_correccion="permisos_mostrar.dni_productor_correccion"
          v-bind:desactivar_correccion="
            permisos_disables.dni_productor_correccion
          "
          v-on:changevalido="update_resol_conce_valido($event)"
          v-on:changecorrecto="update_resol_conce_correcto($event)"
          v-on:changeobs="update_obs_resol_conce($event)"
          v-on:changeobsvalido="update_obs_canon_valido($event)"
          v-on:changevalor="update_obs_resol_conce_valido($event)"
          v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
        >
        </SubirArchivo>
        <div v-show="ayuda_local">
          <br />
          <div
            class="
              bg-blue-50
              text-gray-800
              bg-opacity-20
              text-opacity-80
              ring ring-4 ring-blue-100
            "
          >
            <p class="p-3">
              Copia de 1° y 2° hoja de D.N.I.. Este acpeta los siguientes
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
        <br />
        <hr />
        <br />
      </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="flex">
      <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
        <SubirArchivo
          v-if="permisos_mostrar.autorizacion_gestor"
          v-bind:valor_input_props="form_catamarca_test.autorizacion_gestor"
          v-bind:valor_input_validacion="
            form_catamarca_test.autorizacion_gestor_valido
          "
          v-bind:evualacion_correcto="
            form_catamarca_test.autorizacion_gestor_correcto
          "
          v-bind:valor_obs="form_catamarca_test.obs_autorizacion_gestor"
          v-bind:valor_valido_obs="
            form_catamarca_test.obs_autorizacion_gestor_valido
          "
          v-bind:evaluacion="autoridad_minera"
          v-bind:testing="mostrar_testing"
          v-bind:label="'Autorizacion de que el Gestor Representa la Empresa'"
          v-bind:desactivar_input="permisos_disables.autorizacion_gestor"
          v-bind:mostrar_correccion="
            permisos_mostrar.autorizacion_gestor_correccion
          "
          v-bind:desactivar_correccion="
            permisos_disables.autorizacion_gestor_correccion
          "
          v-on:changevalido="update_gestor_autorizacion_valido($event)"
          v-on:changecorrecto="update_gestor_autorizacion_correcto($event)"
          v-on:changeobs="update_obs_gestor_autorizacion($event)"
          v-on:changeobsvalido="update_obs_gestor_autorizacion_valido($event)"
          v-on:changevalor="update_obs_gestor_autorizacion_valido($event)"
          v-on:cambioarchivo="cambio_el_archivo_gestor_autorizacion($event)"
        >
        </SubirArchivo>
        <div v-show="ayuda_local">
          <br />
          <div
            class="
              bg-blue-50
              text-gray-800
              bg-opacity-20
              text-opacity-80
              ring ring-4 ring-blue-100
            "
          >
            <p class="p-3">
              Copia de la autorización que certifique ha dicho gestor como
              representante de la empresa. Este documento es un archivo pdf, png
              o jpeg.
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
    <hr />
    <br />
    <div class="flex">
      <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
        <SubirArchivo
          v-if="permisos_mostrar.constancia_afip"
          v-bind:valor_input_props="form_catamarca_test.constancia_afip"
          v-bind:valor_input_validacion="
            form_catamarca_test.constancia_afip_valido
          "
          v-bind:evualacion_correcto="
            form_catamarca_test.constancia_afip_correcto
          "
          v-bind:valor_obs="form_catamarca_test.obs_constancia_afip"
          v-bind:valor_valido_obs="
            form_catamarca_test.obs_constancia_afip_valido
          "
          v-bind:evaluacion="autoridad_minera"
          v-bind:testing="mostrar_testing"
          v-bind:label="'Constancia de AFIP'"
          v-bind:desactivar_input="permisos_disables.constancia_afip"
          v-bind:mostrar_correccion="
            permisos_mostrar.constancia_afip_correccion
          "
          v-bind:desactivar_correccion="
            permisos_disables.constancia_afip_correccion
          "
          v-on:changevalido="update_constancia_afip_valido($event)"
          v-on:changecorrecto="update_constancia_afip_correcto($event)"
          v-on:changeobs="update_obs_constancia_afip($event)"
          v-on:changeobsvalido="update_obs_constancia_afip_valido($event)"
          v-on:changevalor="update_obs_constancia_afip_valido($event)"
          v-on:cambioarchivo="cambio_el_archivo_constancia_afip($event)"
        >
        </SubirArchivo>
        <div v-show="ayuda_local">
          <br />
          <div
            class="
              bg-blue-50
              text-gray-800
              bg-opacity-20
              text-opacity-80
              ring ring-4 ring-blue-100
            "
          >
            <p class="p-3">
              Copia de la autorización que certifique ha dicho gestor como
              representante de la empresa. Este documento es un archivo pdf, png
              o jpeg.
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
    <div class="flex items-stretch w-full justify-items-stretch">
      <div
        class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center w-full"
      >
        <button
          type="button"
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
            hover:text-white
            hover:shadow-xl
            hover:bg-gray-600
          "
          @click="guardar_avnces_cinco"
        >
          {{ titulo_boton_guardar }}
        </button>
      </div>
      <div class="justify-self-auto mb-6 md:mb-0 px-3 self-center sm:w-5/5">
        <a
          :href="link_volver"
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
            hover:text-white
            hover:shadow-xl
            hover:bg-gray-600
          "
        >
          {{ titulo_boton_volver }}
        </a>
      </div>
    </div>

    <!-- <div class="flex justify-end mt-4">
      <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
    </div> -->
    <BotonesPaginaCatamarca
      v-if="$props.mostrar_boton_catamarca"
      :link_volver="'#'"
      :titulo_boton_volver="'volver'"
      :titulo_boton_guardar="'Guardar Datos de la Mina'"
      :formulario="form_catamarca_test"
      :donde_guardar="$props.donde_estoy"
      :evaluacion="autoridad_minera"
      :testing="mostrar_testing"
      :id="$props.id"
    >
    </BotonesPaginaCatamarca>
  </div>
</template>

<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import CardMinaUbicacion from "@/Jetstream/altas/CardMinaUbicacion";
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import BotonesPaginaCatamarca from "@/Pages/Productors/BotonesPaginaCatamarca";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
//import BotonesPaginaCatamarca from "@/Pages/Productors/BotonesPaginaCatamarca";

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
    CardMinaUbicacion,
    SelectProvincia,
    SelectDepartamento,
    NombreMina,
    TipoDeSistemaGeo,
    BotonesPaginaCatamarca,
    SubirArchivo,
    CaracterQueInvoca,
    //BotonesPaginaCatamarca,
  },
  data() {
    return {
      saludos: "Saludame qweqweqwe",
      mostrar_modal_datos_ya_guardados: false,
      modal_tittle: "",
      modal_body: "",
      mostrar_testing: false,
      autoridad_minera: this.$props.evaluacion,
      ayuda_local: false,
      permisos_mostrar: [],
      permisos_disables: [],
      form_catamarca_test: {},
      lista_departamentos: [],
      lista_localidades: [],
    };
  },
  methods: {
    cerrar_modal_datos_uno() {
      this.mostrar_modal_datos_ya_guardados = false;
    },

    //FUNCIONES DE NOMBRE DE GESTOR
    update_nombre_gestor_valido(newValue) {
      this.form_pagina.gestor_nombre_apellido_valido = newValue;
    },
    update_nombre_gestor_correcto(newValue) {
      this.form_pagina.gestor_nombre_apellido_correcto = newValue;
    },
    update_obs_nombre_gestor(newValue) {
      this.form_pagina.obs_gestor_nombre_apellido = newValue;
    },
    update_obs_nombre_gestor_valida(newValue) {
      this.form_pagina.obs_gestor_nombre_valido = newValue;
    },
    update_valor_nombre_gestor(newValue) {
      this.form_pagina.gestor_nombre_apellido = newValue;
    },

    //FUNCIONES DE DNI DE GESTOR
    update_gestor_dni_valido(newValue) {
      this.form_pagina.gestor_dni_valido = newValue;
    },
    update_gestor_dni_correcto(newValue) {
      this.form_pagina.gestor_dni_correcto = newValue;
    },
    update_obs_gestor_dni(newValue) {
      this.form_pagina.obs_gestor_dni = newValue;
    },
    update_obs_gestor_dni_valida(newValue) {
      this.form_pagina.obs_gestor_dni_valido = newValue;
    },
    update_valor_gestor_dni(newValue) {
      this.form_pagina.gestor_dni = newValue;
    },

    //FUNCIONES DE PROFESION DE GESTOR
    update_gestor_profesion_valido(newValue) {
      this.form_pagina.gestor_profesion_valido = newValue;
    },
    update_gestor_profesion_correcto(newValue) {
      this.form_pagina.gestor_profesion_correcto = newValue;
    },
    update_obs_gestor_profesion(newValue) {
      this.form_pagina.obs_gestor_profesion = newValue;
    },
    update_obs_gestor_profesion_valida(newValue) {
      this.form_pagina.obs_gestor_profesion_valido = newValue;
    },
    update_valor_gestor_profesion(newValue) {
      this.form_pagina.gestor_profesion = newValue;
    },

    //FUNCIONES DE Telefono DE GESTOR
    update_gestor_telefono_valido(newValue) {
      this.form_pagina.gestor_telefono_valido = newValue;
    },
    update_gestor_telefono_correcto(newValue) {
      this.form_pagina.gestor_telefono_correcto = newValue;
    },
    update_obs_gestor_telefono(newValue) {
      this.form_pagina.obs_gestor_telefono = newValue;
    },
    update_obs_gestor_telefono_valida(newValue) {
      this.form_pagina.obs_gestor_telefono_valido = newValue;
    },
    update_valor_gestor_telefono(newValue) {
      this.form_pagina.gestor_telefono = newValue;
    },

    //FUNCIONES DE N OTIFICACION DE GESTOR
    update_gestor_noti_valido(newValue) {
      this.form_pagina.gestor_notificacion_valido = newValue;
    },
    update_gestor_noti_correcto(newValue) {
      this.form_pagina.gestor_notificacion_correcto = newValue;
    },
    update_obs_gestor_noti(newValue) {
      this.form_pagina.obs_gestor_notificacion = newValue;
    },
    update_obs_gestor_noti_valida(newValue) {
      this.form_pagina.obs_gestor_notificacion_valido = newValue;
    },
    update_valor_gestor_noti(newValue) {
      this.form_pagina.gestor_notificacion = newValue;
    },

    //FUNCIONES DE PROFESION DE GESTOR
    update_gestor_email_valido(newValue) {
      this.form_pagina.gestor_email_valido = newValue;
    },
    update_gestor_email_correcto(newValue) {
      this.form_pagina.gestor_email_correcto = newValue;
    },
    update_obs_gestor_email(newValue) {
      this.form_pagina.obs_gestor_email = newValue;
    },
    update_obs_gestor_email_valida(newValue) {
      this.form_pagina.obs_gestor_email_valido = newValue;
    },
    update_valor_gestor_email(newValue) {
      this.form_pagina.gestor_email = newValue;
    },

    update_gestor_autorizacion_valido(newValue) {
      this.form_pagina.autorizacion_gestor_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_gestor_autorizacion_correcto(newValue) {
      this.form_pagina.autorizacion_gestor_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_gestor_autorizacion(newValue) {
      this.form_pagina.obs_autorizacion_gestor = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_gestor_autorizacion_valido(newValue) {
      console.log("traje un" + newValue);
      this.form_pagina.obs_autorizacion_gestor_valido = newValue;
      //tengo que enviarsela al padre
    },
    cambio_el_archivo_gestor_autorizacion(newValue) {
      console.log("traje un" + newValue);
      this.form_pagina.autorizacion_gestor = newValue;
      //tengo que enviarsela al padre
    },

    update_constancia_afip_valido(newValue) {
      this.form_pagina.constancia_afip_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_constancia_afip_correcto(newValue) {
      this.form_pagina.constancia_afip_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_constancia_afip(newValue) {
      this.form_pagina.obs_constancia_afip = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_constancia_afip_valido(newValue) {
      console.log("traje un" + newValue);
      this.form_pagina.obs_constancia_afip_valido = newValue;
      //tengo que enviarsela al padre
    },
    cambio_el_archivo_constancia_afip(newValue) {
      console.log("traje un" + newValue);
      this.form_pagina.constancia_afip = newValue;
      //tengo que enviarsela al padre
    },

    update_foto_valido(newValue) {
      this.form_pagina.foto_4x4_valido = newValue;
    },
    update_foto_correcto(newValue) {
      this.form_pagina.foto_4x4_correcto = newValue;
    },
    update_obs_foto(newValue) {
      this.form_pagina.obs_foto_4x4 = newValue;
    },
    update_obs_foto_valido(newValue) {
      this.form_pagina.obs_foto_4x4_valido = newValue;
    },
    cambio_el_archivo_foto(newValue) {
      this.form_pagina.foto_4x4 = newValue;
    },

    //mostrar ayuda
    update_valor_ayuda_local(newValor) {
      this.ayuda_local = newValor;
    },
  },
  mounted() {
    let self = this;
    this.$nextTick(() => {
      console.log("por buscar los datos de catamarca desde el hijo \n\n\n");
      console.log("\n\n\n mi id es : " + this.$props.id + " \n\n\n");
      if (this.$inertia.page.props.user.id_provincia === 10) {
        if (
          typeof this.$props.id === "undefined" ||
          this.$props.id === null ||
          this.$props.id === "null"
        ) {
          //estoy dando de alta
          console.log("entre a donde debia");
          //voy a BUSCAR un objeto vacio
          self.form_catamarca_test.gestor_nombre_apellido = "";
          self.form_catamarca_test.gestor_nombre_apellido_valido = "";
          self.form_catamarca_test.gestor_nombre_apellido_correcto = "";
          self.form_catamarca_test.obs_gestor_nombre_apellido = "";
          self.form_catamarca_test.obs_gestor_nombre_valido = "";
          self.form_catamarca_test.mostrar_nombre_gestor = "";
          self.form_catamarca_test.desactivar_nombre_gestor = "";
          self.form_catamarca_test.mostrar_nombre_gestor_correccion = "";
          self.form_catamarca_test.desactivar_nombre_gestor_correccion = "";

          self.form_catamarca_test.gestor_dni = "";
          self.form_catamarca_test.gestor_dni_valido = "";
          self.form_catamarca_test.gestor_dni_correcto = "";
          self.form_catamarca_test.obs_gestor_dni = "";
          self.form_catamarca_test.obs_gestor_dni_valido = "";
          self.form_catamarca_test.mostrar_dni_gestor = "";
          self.form_catamarca_test.desactivar_dni_gestor = "";
          self.form_catamarca_test.mostrar_dni_gestor_correccion = "";
          self.form_catamarca_test.desactivar_dni_gestor_correccion = "";

          self.form_catamarca_test.gestor_profesion = "";
          self.form_catamarca_test.gestor_profesion_valido = "";
          self.form_catamarca_test.gestor_profesion_correcto = "";
          self.form_catamarca_test.obs_gestor_profesion = "";
          self.form_catamarca_test.obs_gestor_profesion_valido = "";
          self.form_catamarca_test.mostrar_profesion_gestor = "";
          self.form_catamarca_test.desactivar_profesion_gestor = "";
          self.form_catamarca_test.mostrar_profesion_gestor_correccion = "";
          self.form_catamarca_test.desactivar_profesion_gestor_correccion = "";

          self.form_catamarca_test.gestor_telefono = "";
          self.form_catamarca_test.gestor_telefono_valido = "";
          self.form_catamarca_test.gestor_telefono_correcto = "";
          self.form_catamarca_test.obs_gestor_telefono = "";
          self.form_catamarca_test.obs_gestor_telefono_valido = "";
          self.form_catamarca_test.mostrar_telefono_gestor = "";
          self.form_catamarca_test.desactivar_telefono_gestor = "";
          self.form_catamarca_test.mostrar_telefono_gestor_correccion = "";
          self.form_catamarca_test.desactivar_telefono_gestor_correccion = "";

          self.gestor_notificacion = "";
          self.gestor_notificacion_valido = "";
          self.gestor_notificacion_correcto = "";
          self.obs_gestor_notificacion = "";
          self.obs_gestor_notificacion_valido = "";
          self.mostrar_notificacion_gestor = "";
          self.desactivar_notificacion_gestor = "";
          self.mostrar_notificacion_gestor_correccion = "";
          self.desactivar_notificacion_gestor_correccion = "";

          self.form_catamarca_test.gestor_email = "";
          self.form_catamarca_test.gestor_email_valido = "";
          self.form_catamarca_test.gestor_email_correcto = "";
          self.form_catamarca_test.obs_gestor_email = "";
          self.form_catamarca_test.obs_gestor_email_valido = "";
          self.form_catamarca_test.mostrar_email_gestor = "";
          self.form_catamarca_test.desactivar_email_gestor = "";
          self.form_catamarca_test.mostrar_email_gestor_correccion = "";
          self.form_catamarca_test.desactivar_email_gestor_correccion = "";

          self.form_catamarca_test.primer_hoja_dni = "";
          self.form_catamarca_test.hoja_dni_valido = "";
          self.form_catamarca_test.hoja_dni_correcto = "";
          self.form_catamarca_test.obs_hoja_dni = "";
          self.form_catamarca_test.obs_hoja_dni_valido = "";
          self.form_catamarca_test.mostrar_dni_productor = "";
          self.form_catamarca_test.desactivar_dni_productor = "";
          self.form_catamarca_test.mostrar_dni_productor_correccion = "";
          self.form_catamarca_test.desactivar_dni_productor_correccion = "";

          self.form_catamarca_test.segunda_hoja_dni = "";
          self.form_catamarca_test.segunda_hoja_dni_valido = "";
          self.form_catamarca_test.segunda_hoja_dni_correcto = "";
          self.form_catamarca_test.obs_segunda_hoja_dni = "";
          self.form_catamarca_test.obs_segunda_hoja_dni_valido = "";

          self.foto_4x4 = "";
          self.foto_4x4_valido = "";
          self.foto_4x4_correcto = "";
          self.obs_foto_4x4 = "";
          self.obs_foto_4x4_valido = "";
          self.mostrar_foto_productor = "";
          self.desactivar_foto_productor = "";
          self.mostrar_foto_productor_correccion = "";
          self.desactivar_foto_productor_correccion = "";

          self.constancia_afip = "";
          self.constancia_afip_valido = "";
          self.constancia_afip_correcto = "";
          self.obs_constancia_afip = "";
          self.obs_constancia_afip_valido = "";
          self.mostrar_constancia_afip = "";
          self.desactivar_constancia_afip = "";
          self.mostrar_constancia_afip_correccion = "";
          self.desactivar_constancia_afip_correccion = "";

          self.form_catamarca_test.autorizacion_gestor = "";
          self.form_catamarca_test.autorizacion_gestor_valido = "";
          self.form_catamarca_test.autorizacion_gestor_correcto = "";
          self.form_catamarca_test.obs_autorizacion_gestor = "";
          self.form_catamarca_test.obs_autorizacion_gestor_valido = "";
          self.form_catamarca_test.mostrar_autorizacion_gestor = "";
          self.form_catamarca_test.desactivar_autorizacion_gestor = "";
          self.form_catamarca_test.mostrar_autorizacion_gestor_correccion = "";
          self.form_catamarca_test.desactivar_autorizacion_gestor_correccion =
            "";

          //voy a buscar los permisos
          axios
            .get("/formularios/traer_permisos_pagina_catamarca/0/crear")
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
              "/formularios/traer_datos_pagina_catamarca" +
                "/" +
                parseInt(this.$props.id)
            )
            .then(function (response) {
              if (response.data.status === "ok") {
                self.form_catamarca_test = response.data.datos;
              } else console.log("error al buscar datos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
          //voy a buscar los permisos
          axios
            .get(
              "/formularios/traer_permisos_pagina_catamarca" +
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