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
      my-20
      border-indigo-400
    "
  >
    <!-- <div class="flex justify-end md:justify-end -mt-16 sticky top-0 z-10">
      <a
        v-if="titulo_boton_guardar === 'Guardar Datos del Domicilio Legal'"
        href="#section_domicilio_legal"
      >
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
            '/formulario_alta/imagenes/domicilio-cards.png'
          "
        />
      </a>
      <a v-else href="#section_domicilio_administrativo">
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
            '/formulario_alta/imagenes/domicilio-cards.png'
          "
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
    </div> -->
    <div>
      <!-- <h2 class="text-gray-800 text-3xl font-semibold">{{ titulo_pagina }}</h2> -->
      <!-- <br /><br /> -->

      <div class="items-center justify-left sticky top-0 z-10">
        <CardDomLegal
          v-if="titulo_boton_guardar === 'Guardar Datos del Domicilio Legal'"
          :progreso="50"
          :aprobado="50"
          :reprobado="50"
          :lugar="'Argentina, San Juan'"
          :titulo="titulo_pagina"
          :updated_at="'hace 10 minutos'"
          :mostrarayuda="true"
          :evaluacion="autoridad_minera"
          :clase_sup="'gap-6'"
          :clase_inf="'border border-green-400 border-opacity-50 shadow-lg rounded-2xl relative bg-white py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-12 lg:grid-cols-6 xl:grid-cols-12'"
          :ayuda="ayuda_legal"
          v-on:changevalorayuda="update_valor_ayuda_local_legal($event)"
          v-on:continuarpagina="update_valor_pagina_siguiente($event)"
        ></CardDomLegal>

        <CardDomAdmin
          v-if="
            titulo_boton_guardar ===
            'Guardar Datos del Domicilio Administrativo'
          "
          :progreso="50"
          :aprobado="50"
          :reprobado="50"
          :lugar="'Argentina, San Juan'"
          :titulo="titulo_pagina"
          :updated_at="'hace 10 minutos'"
          :mostrarayuda="true"
          :evaluacion="autoridad_minera"
          :clase_sup="'gap-6'"
          :clase_inf="'border border-green-400 border-opacity-50 shadow-lg rounded-2xl relative bg-white py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-12 lg:grid-cols-6 xl:grid-cols-12'"
          :ayuda="ayuda_administrativo"
          v-on:changevalorayuda="update_valor_ayuda_local_admi($event)"
          v-on:continuarpagina="update_valor_pagina_siguiente($event)"
        ></CardDomAdmin>
      </div>
      <br />
      <br />
      <div
        v-if="titulo_boton_guardar !== 'Guardar Datos del Domicilio Legal'"
        class="items-center justify-left"
      >
        <span class="text-lg font-semibold mr-3"
          >Mismos Datos que Domicilio Legal?</span
        >
        <Toggle
          v-model="copiar_datos"
          @change="buscar_domicilio_en_padre"
          on-label="SI"
          off-label="NO"
        />
      </div>

      <div class="flex flex-wrap">
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <InputNombreCalle
            v-if="$props.mostrar_calle_legal"
            v-bind:leal_calle="$props.leal_calle"
            v-bind:nombre_calle_legal_valido="$props.nombre_calle_legal_valido"
            v-bind:nombre_calle_legal_correcto="
              $props.nombre_calle_legal_correcto
            "
            v-bind:obs_nombre_calle_legal="$props.obs_nombre_calle_legal"
            v-bind:obs_nombre_calle_legal_valido="
              $props.obs_nombre_calle_legal_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Nombre de Calle Domicilio'"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'razon_social'"
            v-bind:desactivar_calle_legal="$props.desactivar_calle_legal"
            v-bind:mostrar_calle_legal_correccion="
              $props.mostrar_calle_legal_correccion
            "
            v-bind:desactivar_calle_legal_correccion="
              $props.desactivar_calle_legal_correccion
            "
            v-on:changenombrecallevalido="update_nombre_calle_valido($event)"
            v-on:changenombrecallecorrecto="
              update_nombre_calle_correcto($event)
            "
            v-on:changeobsnombrecalle="update_obs_nombre_calle($event)"
            v-on:changeobsnombrecallevalido="
              update_obs_nombre_calle_validacion($event)
            "
            v-on:changevalornombrecalle="update_valor_nombre_calle($event)"
          ></InputNombreCalle>
          <div v-show="ayuda_legal">
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
                Es el nombre de la(s) calle(s) donde se encuentra la oficina
                legal (también se puede específicar una intersección de calles).
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Es el nombre de la(s) calle(s) donde se encuentra la oficina
                legal (también se puede especificar una intersección de calles).
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- Nombre de calle valor input deel padre{{
                  form_pagina.leal_calle
                }}
                -- Nombre de calle input valido deel padre{{
                  form_pagina.nombre_calle_legal_valido
                }}
                -- Nombre de calle rta prod correcta deel padre{{
                  form_pagina.nombre_calle_legal_correcto
                }}
                -- Nombre de calle observacion autoridad deel padre{{
                  form_pagina.obs_nombre_calle_legal
                }}
                -- Nombre de calle observacion autoridad valida deel padre{{
                  form_pagina.obs_nombre_calle_legal_valido
                }}
              </div>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-2/2 md:w-1/2 px-3">
          <InputNumeroCalle
            v-if="$props.mostrar_legal_calle_num"
            v-bind:leal_numero="$props.leal_numero"
            v-bind:leal_numero_valido="$props.leal_numero_valido"
            v-bind:leal_numero_correcto="$props.leal_numero_correcto"
            v-bind:obs_leal_numero="$props.obs_leal_numero"
            v-bind:obs_leal_numero_valido="$props.obs_leal_numero_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Número de Calle Domicilio'"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'num_calle'"
            v-bind:desactivar_legal_calle_num="
              $props.desactivar_legal_calle_num
            "
            v-bind:mostrar_legal_calle_num_correccion="
              $props.mostrar_legal_calle_num_correccion
            "
            v-bind:desactivar_legal_calle_num_correccion="
              $props.desactivar_legal_calle_num_correccion
            "
            v-on:changetelnumlegalvalido="update_num_legal_valido($event)"
            v-on:changenumlegalcorrecto="update_num_legal_correcto($event)"
            v-on:changeobsnumlegal="update_obs_num_legal($event)"
            v-on:changenumlegalvalido="update_obs_num_legal_valido($event)"
            v-on:changevalornumlegal="update_valor_num_legal($event)"
          >
          </InputNumeroCalle>
          <div v-show="ayuda_legal">
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
                Es la numeracón del domicilio que se esta declarando. Este es un
                valor numérico.
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Es la numeración del domicilio que se esta declarando. Este es
                un valor númerico.
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- numero de calle deel padre{{ form_pagina.leal_numero }} --
                numero de calle valida deel padre{{
                  form_pagina.leal_numero_valido
                }}
                -- numero de calle correcto deel padre{{
                  form_pagina.leal_numero_correcto
                }}
                -- numero de calle observacion deel padre{{
                  form_pagina.obs_leal_numero
                }}
                -- numero de calle observacion valida deel padre{{
                  form_pagina.obs_leal_numero_valido
                }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <InputTelefono
            v-if="$props.mostrar_legal_telefono"
            v-bind:titulo="titulo_boton_guardar"
            v-bind:leal_telefono="$props.leal_telefono"
            v-bind:leal_telefono_valido="$props.leal_telefono_valido"
            v-bind:leal_telefono_correcto="$props.leal_telefono_correcto"
            v-bind:obs_leal_telefono="$props.obs_leal_telefono"
            v-bind:obs_leal_telefono_valido="$props.obs_leal_telefono_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Telefono de Domicilio'"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'tel'"
            v-bind:desactivar_legal_telefono="$props.desactivar_legal_telefono"
            v-bind:mostrar_legal_telefono_correccion="
              $props.mostrar_legal_telefono_correccion
            "
            v-bind:desactivar_legal_telefono_correccion="
              $props.desactivar_legal_telefono_correccion
            "
            v-on:changetellegalvalido="update_tel_legal_valido($event)"
            v-on:changetellegalcorrecto="update_tel_legal_correcto($event)"
            v-on:changeobstellegal="update_obs_tel_legal($event)"
            v-on:changeobstellegalvalido="update_obs_tel_legal_valido($event)"
            v-on:changevalortellegal="update_valor_tel_legal($event)"
          >
          </InputTelefono>
          <div v-show="ayuda_legal">
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
                Es el número de productor otorgado por el ministerio de minería
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Es el número del productor otorgado por el ministerio de minería
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- telefono de calle deel padre{{
                  form_pagina.leal_telefono
                }}
                -- telefono de calle valida deel padre{{
                  form_pagina.leal_telefono_valido
                }}
                -- telefono de calle correcto deel padre{{
                  form_pagina.leal_telefono_correcto
                }}
                -- telefono de calle observacion deel padre{{
                  form_pagina.obs_leal_telefono
                }}
                -- telefono de calle observacion valida deel padre{{
                  form_pagina.obs_leal_telefono_valido
                }}
              </div>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <SelectProvincia
            v-bind:leal_provincia="$props.leal_provincia"
            v-bind:leal_provincia_valido="$props.leal_provincia_valido"
            v-bind:leal_provincia_correcto="$props.leal_provincia_correcto"
            v-bind:obs_leal_provincia="$props.obs_leal_provincia"
            v-bind:obs_leal_provincia_valido="$props.obs_leal_provincia_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:label="'Provincia de Domicilio'"
            v-bind:lista_provincias="$props.lista_provincias"
            v-bind:name_correcto="this.nombrePagina + 'prov'"
            v-bind:desactivar_legal_prov="$props.desactivar_legal_prov"
            v-bind:mostrar_legal_prov_correccion="
              $props.mostrar_legal_prov_correccion
            "
            v-bind:desactivar_legal_prov_correccion="
              $props.desactivar_legal_prov_correccion
            "
            v-on:changeprovlegalvalido="update_provincia_valido($event)"
            v-on:changeprovlegalcorrecto="update_provincia_correcto($event)"
            v-on:changeobsrpovlegal="update_obs_provincia_legal($event)"
            v-on:changeobsprovlegalvalido="
              update_obs_provincia_legal_valido($event)
            "
            v-on:changevalorprovlegal="
              update_valor_provincia_legal_num_legal($event)
            "
          >
          </SelectProvincia>

          <div v-show="ayuda_legal">
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
                Provincia donde se encuentra el domicilio legal en la provincia.
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Provincia donde se encuentra el domicilio de la Administración
                Central.
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- provincia de calle deel padre{{
                  form_pagina.leal_provincia
                }}
                -- provincia de calle valida deel padre{{
                  form_pagina.leal_provincia_valido
                }}
                -- provincia de calle correcto deel padre{{
                  form_pagina.leal_provincia_correcto
                }}
                -- provincia de calle observacion deel padre{{
                  form_pagina.obs_leal_provincia
                }}
                -- provincia de calle observacion valida deel padre{{
                  form_pagina.obs_leal_provincia_valido
                }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <SelectDepartamento
            v-if="$props.mostrar_legal_dpto"
            v-bind:leal_departamento="$props.leal_departamento"
            v-bind:leal_departamento_valido="$props.leal_departamento_valido"
            v-bind:leal_departamento_correcto="
              $props.leal_departamento_correcto
            "
            v-bind:obs_leal_departamento="$props.obs_leal_departamento"
            v-bind:obs_leal_departamento_valido="
              $props.obs_leal_departamento_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'dpto'"
            v-bind:label="'Departamento de Domicilio'"
            v-bind:lista_departamentos="lista_departamentos"
            v-bind:lista_departamentos_dos="$props.lista_dptos"
            v-bind:desactivar_legal_dpto="$props.desactivar_legal_dpto"
            v-bind:mostrar_legal_dpto_correccion="
              $props.mostrar_legal_dpto_correccion
            "
            v-bind:desactivar_legal_dpto_correccion="
              $props.desactivar_legal_dpto_correccion
            "
            v-on:changedptolegalvalido="update_dpto_valido($event)"
            v-on:changedptolegalcorrecto="update_dpto_correcto($event)"
            v-on:changeobsrdptolegal="update_obs_dpto_legal($event)"
            v-on:changeobsdptolegalvalido="update_obs_dpto_legal_valido($event)"
            v-on:changevalordptolegal="
              update_valor_dpto_legal_num_legal($event)
            "
          >
          </SelectDepartamento>
          <div v-show="ayuda_legal">
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
                Departamento donde se encuentra el domicilio legal en la
                provincia.
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Departamento donde se encuentra el domicilio de la
                Administración Central.
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- dpto de calle deel padre{{
                  form_pagina.leal_departamento
                }}
                -- dpto de calle valida deel padre{{
                  form_pagina.leal_departamento_valido
                }}
                -- dpto de calle correcto deel padre{{
                  form_pagina.leal_departamento_correcto
                }}
                -- dpto de calle observacion deel padre{{
                  form_pagina.obs_leal_departamento
                }}
                -- dpto de calle observacion valida deel padre{{
                  form_pagina.obs_leal_departamento_valido
                }}
              </div>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <InputLocalidad
            v-if="$props.mostrar_legal_localidad"
            v-bind:leal_localidad="$props.leal_localidad"
            v-bind:leal_localidad_valido="$props.leal_localidad_valido"
            v-bind:leal_localidad_correcto="$props.leal_localidad_correcto"
            v-bind:obs_leal_localidad="$props.obs_leal_localidad"
            v-bind:obs_leal_localidad_valido="$props.obs_leal_localidad_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'localidad'"
            v-bind:label="'Localidad del Domicilio'"
            v-bind:desactivar_legal_localidad="
              $props.desactivar_legal_localidad
            "
            v-bind:mostrar_legal_localidad_correccion="
              $props.mostrar_legal_localidad_correccion
            "
            v-bind:desactivar_legal_localidad_correccion="
              $props.desactivar_legal_localidad_correccion
            "
            v-on:changelocalidadlegalvalido="update_localidad_valido($event)"
            v-on:changelocalidadlegalcorrecto="
              update_localidad_correcto($event)
            "
            v-on:changeobsrlocalidadlegal="update_obs_localidad_legal($event)"
            v-on:changeobslocalidadlegalvalido="
              update_obs_localidad_legal_valido($event)
            "
            v-on:changevalorlocalidadlegal="
              update_valor_localidad_legal_num_legal($event)
            "
          >
          </InputLocalidad>
          <div v-show="ayuda_legal">
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
                Es la localidad donde se encuentra el domicilio.
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Es la localidad donde se encuentra el domicilio.
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- localidad de calle deel padre{{
                  form_pagina.leal_localidad
                }}
                -- localidad de calle valida deel padre{{
                  form_pagina.leal_localidad_valido
                }}
                -- localidad de calle correcto deel padre{{
                  form_pagina.leal_localidad_correcto
                }}
                -- localidad de calle observacion deel padre{{
                  form_pagina.obs_leal_localidad
                }}
                -- localidad de calle observacion valida deel padre{{
                  form_pagina.obs_leal_localidad_valido
                }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <InputCP
            v-if="$props.mostrar_legal_cod_pos"
            v-bind:leal_cp="$props.leal_cp"
            v-bind:leal_cp_valido="$props.leal_cp_valido"
            v-bind:leal_cp_correcto="$props.leal_cp_correcto"
            v-bind:obs_leal_cp="$props.obs_leal_cp"
            v-bind:obs_leal_cp_valido="$props.obs_leal_cp_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'cp'"
            v-bind:label="'Codigo Postal'"
            v-bind:desactivar_legal_cod_pos="$props.desactivar_legal_cod_pos"
            v-bind:mostrar_legal_cod_pos_correccion="
              $props.mostrar_legal_cod_pos_correccion
            "
            v-bind:desactivar_legal_cod_pos_correccion="
              $props.desactivar_legal_cod_pos_correccion
            "
            v-on:changecplegalvalido="update_cp_valido($event)"
            v-on:changecplegalcorrecto="update_cp_correcto($event)"
            v-on:changeobsrcplegal="update_obs_cp_legal($event)"
            v-on:changeobscplegalvalido="update_obs_cp_legal_valido($event)"
            v-on:changevalorcplegal="update_valor_cp($event)"
          >
          </InputCP>
          <div v-show="ayuda_legal">
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
              <p class="p-3">Código postal correspondiente al domicilio.</p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
              <p class="p-3">Código postal correspondiente al domicilio.</p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- cod postal de calle deel padre{{ form_pagina.leal_cp }} --
                cod postal de calle valida deel padre{{
                  form_pagina.leal_cp_valido
                }}
                -- cod postal de calle correcto deel padre{{
                  form_pagina.leal_cp_correcto
                }}
                -- cod postal de calle observacion deel padre{{
                  form_pagina.obs_leal_cp
                }}
                -- cod postal de calle observacion valida deel padre{{
                  form_pagina.obs_leal_cp_valido
                }}
              </div>
            </div>
          </div>
        </div>
        <div class="w-full sm:w-2/2 md:w-1/2 px-3 mb-6 md:mb-0">
          <InputOtro
            v-if="$props.mostrar_legal_otro"
            v-bind:leal_otro="$props.leal_otro"
            v-bind:leal_otro_valido="$props.leal_otro_valido"
            v-bind:leal_otro_correcto="$props.leal_otro_correcto"
            v-bind:obs_leal_otro="$props.obs_leal_otro"
            v-bind:obs_leal_otro_valido="$props.obs_leal_otro_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="this.nombrePagina + 'otro'"
            v-bind:label="'Otro Dato Imporante'"
            v-bind:desactivar_legal_otro="$props.desactivar_legal_otro"
            v-bind:mostrar_legal_otro_correccion="
              $props.mostrar_legal_otro_correccion
            "
            v-bind:desactivar_legal_otro_correccion="
              $props.desactivar_legal_otro_correccion
            "
            v-on:changeotrolegalvalido="update_otro_valido($event)"
            v-on:changeotrolegalcorrecto="update_otro_correcto($event)"
            v-on:changeobsotrolegal="update_obs_otro_legal($event)"
            v-on:changeobsotrolegalvalido="update_obs_otro_legal_valido($event)"
            v-on:changevalorotrolegal="update_valor_otro($event)"
          >
          </InputOtro>
          <div v-show="ayuda_legal">
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
                Este campo es para el caso de que considere necesario brindar
                algún dato adicional que aporte más precisión en la ubicación
                del domicilio de la Administración principal.
              </p>
            </div>
            <br />
          </div>
          <div v-show="ayuda_administrativo">
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
                Este campo es par el caso de que se considere necesario brindar
                algún dato extra. El cuál apote más presición de la ubicación
                del domicilio legal.
              </p>
            </div>
            <br />
          </div>
          <div
            class="flex items-center justify-center bg-teal-lightest font-sans"
            v-if="mostrar_testing"
          >
            <div class="w-full bg-white rounded shadow p-6 m-8">
              <div class="flex flex-col">
                -- otro de calle deel padre{{ form_pagina.leal_otro }} -- otro
                de calle valida deel padre{{ form_pagina.leal_otro_valido }} --
                otro de calle correcto deel padre{{
                  form_pagina.leal_otro_correcto
                }}
                -- otro de calle observacion deel padre{{
                  form_pagina.obs_leal_otro
                }}
                -- otro de calle observacion valida deel padre{{
                  form_pagina.obs_leal_otro_valido
                }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br /><br />

    <div class="flex items-center justify-center">
      <BotonesPaginaDos
        v-if="mostrar_boton_guardar_dos"
        :link_volver="'#'"
        :titulo_boton_volver="'Volver'"
        :titulo_boton_guardar="'Guardar Datos del Domicilio'"
        :leal_calle="leal_calle"
        :nombre_calle_legal_valido="form_pagina.nombre_calle_legal_valido"
        :nombre_calle_legal_correcto="form_pagina.nombre_calle_legal_correcto"
        :obs_nombre_calle_legal="form_pagina.obs_nombre_calle_legal"
        :obs_nombre_calle_legal_valido="
          form_pagina.obs_nombre_calle_legal_valido
        "
        :leal_numero="leal_numero"
        :leal_numero_valido="form_pagina.leal_numero_valido"
        :leal_numero_correcto="form_pagina.leal_numero_correcto"
        :obs_leal_numero="form_pagina.obs_leal_numero"
        :obs_leal_numero_valido="form_pagina.obs_leal_numero_valido"
        :leal_telefono="leal_telefono"
        :leal_telefono_valido="form_pagina.leal_telefono_valido"
        :leal_telefono_correcto="form_pagina.leal_telefono_correcto"
        :obs_leal_telefono="form_pagina.obs_leal_telefono"
        :obs_leal_telefono_valido="form_pagina.obs_leal_telefono_valido"
        :leal_pais="form_pagina.leal_pais"
        :leal_pais_valido="form_pagina.leal_pais_valido"
        :leal_pais_correcto="form_pagina.leal_pais_correcto"
        :obs_leal_pais="form_pagina.obs_leal_pais"
        :obs_leal_pais_valido="form_pagina.obs_leal_pais_valido"
        :leal_provincia="leal_provincia"
        :leal_provincia_valido="form_pagina.leal_provincia_valido"
        :leal_provincia_correcto="form_pagina.leal_provincia_correcto"
        :obs_leal_provincia="form_pagina.obs_leal_provincia"
        :obs_leal_provincia_valido="form_pagina.obs_leal_provincia_valido"
        :leal_departamento="leal_departamento"
        :leal_departamento_valido="form_pagina.leal_departamento_valido"
        :leal_departamento_correcto="form_pagina.leal_departamento_correcto"
        :obs_leal_departamento="form_pagina.obs_leal_departamento"
        :obs_leal_departamento_valido="form_pagina.obs_leal_departamento_valido"
        :leal_localidad="leal_localidad"
        :leal_localidad_valido="form_pagina.leal_localidad_valido"
        :leal_localidad_correcto="form_pagina.leal_localidad_correcto"
        :obs_leal_localidad="form_pagina.obs_leal_localidad"
        :obs_leal_localidad_valido="form_pagina.obs_leal_localidad_valido"
        :leal_cp="leal_cp"
        :leal_cp_valido="form_pagina.leal_cp_valido"
        :leal_cp_correcto="form_pagina.leal_cp_correcto"
        :obs_leal_cp="form_pagina.obs_leal_cp"
        :obs_leal_cp_valido="form_pagina.obs_leal_cp_valido"
        :leal_otro="leal_otro"
        :leal_otro_valido="form_pagina.leal_otro_valido"
        :leal_otro_correcto="form_pagina.leal_otro_correcto"
        :obs_leal_otro="form_pagina.obs_leal_otro"
        :obs_leal_otro_valido="form_pagina.obs_leal_otro_valido"
        :donde_guardar="$props.donde_estoy"
        :evaluacion="autoridad_minera"
        :id="$props.id"
        :testing="mostrar_testing"
        v-on:mostrarpasosiguiente="mostrarpasos($event)"
      ></BotonesPaginaDos>
    </div>

    <!-- <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div> -->
  </div>
</template>

<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import CardDomLegal from "@/Jetstream/altas/CardDomLegal";
import CardDomAdmin from "@/Jetstream/altas/CardDomAdmin";
import InputNombreCalle from "@/Pages/Productors/InputNombreCalle";

import InputNumeroCalle from "@/Pages/Productors/InputNumeroCalle";
import InputTelefono from "@/Pages/Productors/InputTelefono";
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";

import InputLocalidad from "@/Pages/Productors/InputLocalidad";
import InputCP from "@/Pages/Productors/InputCP";
import InputOtro from "@/Pages/Productors/InputOtro";
import BotonesPaginaDos from "@/Pages/Productors/BotonesPaginaDos";

import Toggle from "@vueform/toggle";

export default {
  watch: {},
  props: [
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",
    "titulo_pagina",

    "leal_calle",
    "nombre_calle_legal_valido",
    "nombre_calle_legal_correcto",
    "obs_nombre_calle_legal",
    "obs_nombre_calle_legal_valido",
    "mostrar_calle_legal",
    "desactivar_calle_legal",
    "mostrar_calle_legal_correccion",
    "desactivar_calle_legal_correccion",

    "leal_numero",
    "leal_numero_valido",
    "leal_numero_correcto",
    "obs_leal_numero",
    "obs_leal_numero_valido",
    "mostrar_legal_calle_num",
    "desactivar_legal_calle_num",
    "mostrar_legal_calle_num_correccion",
    "desactivar_legal_calle_num_correccion",

    "leal_telefono",
    "leal_telefono_valido",
    "leal_telefono_correcto",
    "obs_leal_telefono",
    "obs_leal_telefono_valido",
    "mostrar_legal_telefono",
    "desactivar_legal_telefono",
    "mostrar_legal_telefono_correccion",
    "desactivar_legal_telefono_correccion",

    "leal_pais",
    "leal_pais_valido",
    "leal_pais_correcto",
    "obs_leal_pais",
    "obs_leal_pais_valido",

    "leal_provincia",
    "leal_provincia_valido",
    "leal_provincia_correcto",
    "obs_leal_provincia",
    "obs_leal_provincia_valido",
    "mostrar_legal_prov",
    "desactivar_legal_prov",
    "mostrar_legal_prov_correccion",
    "desactivar_legal_prov_correccion",

    "leal_departamento",
    "leal_departamento_valido",
    "leal_departamento_correcto",
    "obs_leal_departamento",
    "obs_leal_departamento_valido",
    "mostrar_legal_dpto",
    "desactivar_legal_dpto",
    "mostrar_legal_dpto_correccion",
    "desactivar_legal_dpto_correccion",

    "leal_localidad",
    "leal_localidad_valido",
    "leal_localidad_correcto",
    "obs_leal_localidad",
    "obs_leal_localidad_valido",
    "mostrar_legal_localidad",
    "desactivar_legal_localidad",
    "mostrar_legal_localidad_correccion",
    "desactivar_legal_localidad_correccion",

    "leal_cp",
    "leal_cp_valido",
    "leal_cp_correcto",
    "obs_leal_cp",
    "obs_leal_cp_valido",
    "mostrar_legal_cod_pos",
    "desactivar_legal_cod_pos",
    "mostrar_legal_cod_pos_correccion",
    "desactivar_legal_cod_pos_correccion",

    "leal_otro",
    "leal_otro_valido",
    "leal_otro_correcto",
    "obs_leal_otro",
    "obs_leal_otro_valido",
    "mostrar_legal_otro",
    "desactivar_legal_otro",
    "mostrar_legal_otro_correccion",
    "desactivar_legal_otro_correccion",

    "donde_estoy",
    "lista_provincias",
    "lista_dptos",

    "mostrar_boton_guardar_dos",
    "desactivar_boton_guardar_dos",

    "evaluacion",
    "testing",
    "id",
  ],

  components: {
    JetDialogModal,
    CardDomLegal,
    CardDomAdmin,
    InputNombreCalle,
    InputNumeroCalle,
    InputTelefono,
    SelectProvincia,
    SelectDepartamento,
    InputCP,
    InputLocalidad,
    InputOtro,
    BotonesPaginaDos,
    Toggle,
  },

  data() {
    return {
      nombrePagina: "",
      mostrar_modal_datos_ya_guardados: false,
      modal_tittle: "",
      modal_body: "",
      mostrar_testing: false,
      autoridad_minera: this.$props.evaluacion,
      ayuda_legal: false,
      ayuda_administrativo: false,
      copiar_datos: false,
      form_pagina: {
        leal_calle: this.$props.leal_calle,
        nombre_calle_legal_valido: this.$props.nombre_calle_legal_valido,
        nombre_calle_legal_correcto: this.$props.nombre_calle_legal_correcto,
        obs_nombre_calle_legal: this.$props.obs_nombre_calle_legal,
        obs_nombre_calle_legal_valido:
          this.$props.obs_nombre_calle_legal_valido,

        leal_numero: this.$props.leal_numero,
        leal_numero_valido: this.$props.leal_numero_valido,
        leal_numero_correcto: this.$props.leal_numero_correcto,
        obs_leal_numero: this.$props.obs_leal_numero,
        obs_leal_numero_valido: this.$props.obs_leal_numero_valido,

        leal_telefono: this.$props.leal_telefono,
        leal_telefono_valido: this.$props.leal_telefono_valido,
        leal_telefono_correcto: this.$props.leal_telefono_correcto,
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
      lista_departamentos: [],
      lista_localidades: [],
    };
  },
  methods: {
    cargar_dptos() {
      let self = this;
      //console.log("mis deptos de legal padre es:",self.$props.lista_dptos);
      self.lista_departamentos = self.$props.lista_dptos;
      //console.log("mis deptos de legal hijo es:",self.lista_departamentos);
    },
    cerrar_modal_datos_uno() {
      this.mostrar_modal_datos_ya_guardados = false;
    },
    //FUNCIONES DE NOMBRE DE CALLE
    update_nombre_calle_valido(newValue) {
      this.form_pagina.nombre_calle_legal_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_nombre_calle_correcto(newValue) {
      this.form_pagina.nombre_calle_legal_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_nombre_calle(newValue) {
      this.form_pagina.obs_nombre_calle_legal = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_nombre_calle_validacion(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_nombre_calle_legal_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_nombre_calle(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_calle = newValue;
      this.$emit("updateValorPadreNombreCalle", {
        nombre: this.form_pagina.leal_calle,
        lugar: this.$props.donde_estoy,
      });
    },
    //FUNCIONES DE Numero de calle
    update_num_legal_valido(newValue) {
      this.form_pagina.leal_numero_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_num_legal_correcto(newValue) {
      // console.log(newValue);
      this.form_pagina.leal_numero_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_num_legal(newValue) {
      this.form_pagina.obs_leal_numero = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_num_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_numero_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_num_legal(newValue) {
      // console.log("traje dddddddddddddun" + newValue);
      this.form_pagina.leal_numero = newValue;
      this.$emit("updateValorPadreNumCalle", {
        nombre: this.form_pagina.leal_numero,
        lugar: this.$props.donde_estoy,
      });
    },
    //FUNCIONES DE TELEFONO
    update_tel_legal_valido(newValue) {
      this.form_pagina.leal_telefono_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_tel_legal_correcto(newValue) {
      this.form_pagina.leal_telefono_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_tel_legal(newValue) {
      this.form_pagina.obs_leal_telefono = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_tel_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_telefono_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_tel_legal(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_telefono = newValue;
      this.$emit("updateValorPadreTel", {
        nombre: this.form_pagina.leal_telefono,
        lugar: this.$props.donde_estoy,
      });
    },
    // FUNCIONES  DE PROVINCIA
    update_provincia_valido(newValue) {
      this.form_pagina.leal_provincia_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_provincia_correcto(newValue) {
      this.form_pagina.leal_provincia_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_provincia_legal(newValue) {
      this.form_pagina.obs_leal_provincia = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_provincia_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_provincia_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_provincia_legal_num_legal(newValue) {
      let self = this;
      // console.log("cambio la provincia de mi hijo por:" + newValue);

      //this.form_pagina.localidad_mina_provincia = newValue;
      this.form_pagina.leal_provincia = newValue;
      this.$emit("updateValorPadreProv", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });

      //debo actualizar la lista de departamento que tengo disponibles para elegir
      axios
        .post("/datos/traer_departamentos/", { id_prov: newValue })
        .then(function (response) {
          //console.log("las deptos son:\n");
          self.lista_departamentos = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
      //tengo que enviarsela al padre
    },

    update_dpto_valido(newValue) {
      this.form_pagina.leal_departamento_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_dpto_correcto(newValue) {
      this.form_pagina.leal_departamento_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_dpto_legal(newValue) {
      this.form_pagina.obs_leal_departamento = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_dpto_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_departamento_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_dpto_legal_num_legal(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_departamento = newValue;
      this.$emit("updateValorPadreDepto", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });
    },

    update_localidad_valido(newValue) {
      this.form_pagina.leal_localidad_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_localidad_correcto(newValue) {
      this.form_pagina.leal_localidad_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_localidad_legal(newValue) {
      this.form_pagina.obs_leal_localidad = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_localidad_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_localidad_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_localidad_legal_num_legal(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_localidad = newValue;
      this.$emit("updateValorPadreLocalidad", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });
    },

    update_cp_valido(newValue) {
      this.form_pagina.leal_cp_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_cp_correcto(newValue) {
      this.form_pagina.leal_cp_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_cp_legal(newValue) {
      this.form_pagina.obs_leal_cp = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_cp_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_cp_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_cp(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_cp = newValue;
      this.$emit("updateValorPadreCP", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });
    },

    update_otro_valido(newValue) {
      this.form_pagina.leal_otro_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_otro_correcto(newValue) {
      // console.log("cambie orto correcto" + newValue);
      this.form_pagina.leal_otro_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_otro_legal(newValue) {
      // console.log("cambie el otro");
      this.form_pagina.obs_leal_otro = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_otro_legal_valido(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.obs_leal_otro_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_valor_otro(newValue) {
      // console.log("traje un" + newValue);
      this.form_pagina.leal_otro = newValue;
      this.$emit("updateValorPadreOtro", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });
    },

    //mostrar ayuda
    update_valor_ayuda_local_legal(newValor) {
      this.ayuda_legal = newValor;
    },
    //mostrar ayuda
    update_valor_ayuda_local_admi(newValor) {
      this.ayuda_administrativo = newValor;
    },
    nombreComponente() {
      if (
        this.$props.titulo_boton_guardar === "Guardar Datos del Domicilio Legal"
      )
        this.nombrePagina = "legal_";
      else this.nombrePagina = "adm_";
    },
    mostrarpasos(v) {
      this.$emit("mostrarpasosiguiente", v);
      // console.log("valor: ", v);
    },
    update_valor_pagina_siguiente(v) {
      // console.log("valor: ", v);
      this.$emit("mostrarpasosiguiente", v);
    },
    buscar_domicilio_en_padre() {
      //busco los datos en el padre
      if (this.copiar_datos) this.$emit("copiarDatosDomicilioLegal", true);
    },
  },
  mounted() {
    this.cargar_dptos();
    this.nombreComponente();
  },
};
</script>