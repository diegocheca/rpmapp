<template>
  <div>
    <!-- <div class="flex justify-end md:justify-end -mt-16 sticky top-0 z-10">
      <a href="#section_productor">
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
            $inertia.page.props.appName + '/slick/img/features/casco-minero.svg'
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
    </div> -->
    <div class="items-center justify-left">
      <!-- <CardProductor
        :progreso="50"
        :aprobado="25"
        :reprobado="25"
        :lugar="'Argentina, San Juan'"
        :titulo="titulo_pagina"
        :updated_at="'hace 10 minutos'"
        :mostrarayuda="true"
        :evaluacion="autoridad_minera"
        :clase_sup="'gap-6'"
        :clase_inf="'border border-green-400 border-opacity-50 shadow-lg rounded-2xl relative bg-white py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-12 lg:grid-cols-6 xl:grid-cols-12'"
        :ayuda="mostrar_ayuda"
        v-on:changevalorayuda="update_valor_ayuda_local($event)"
        v-on:continuarpagina="update_valor_pagina_siguiente($event)"
      ></CardProductor> -->
      <!-- <Card
        :icono="'/slick/img/features/casco-minero.svg'"
        :titulo="titulo_pagina"
        :clase_sup="'gap-6'"
        :clase_inf="'border border-green-400 border-opacity-50 shadow-lg rounded-2xl relative bg-white py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6'"
        :show="mostrar_modulo"
        v-on:ocultarmodulo="update_valor_ocultar_modulo($event)"
      ></Card> -->
      <Card
        :icono="'/slick/img/features/casco-minero.svg'"
        :titulo="titulo_pagina"
        :clase_sup="'gap-6'"
        :clase_inf="'border bg-sky-500 text-white shadow-lg relative py-2 px-4 w-128 grid  sm:grid-cols-1 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6'"
        :show="mostrar_modulo"
        v-on:ocultarmodulo="update_valor_ocultar_modulo($event)"
      ></Card>
    </div>
    <!-- <br /> -->
    <!-- <br /> -->
    <div
      v-if="mostrar_modulo"
      class="
        border-2
        shadow-lg
        rounded-2xl
        w-full
        py-4
        px-8
        bg-white
        border-indigo-400
      "
    >
      <div class="items-center justify-left sticky top-1 z-10">
        <Menu
          :mostrarayuda="true"
          :ayuda="false"
          :evaluacion="evaluacion_adm"
          :mostrar_evaluacion="mostrar_evaluacion_adm"
          :continuar="continuar_pagina"
          v-on:changevalorayuda="update_valor_ayuda_local($event)"
          v-on:continuarpagina="update_valor_pagina_siguiente($event)"
          v-on:change_valor_evaluacion="update_valor_evaluacion_Adm($event)"
        ></Menu>
      </div>
      <!-- <h2 class="text-gray-800 text-3xl font-semibold">{{ titulo_pagina }}</h2>
      <br /><br /> -->

      <div class="flex flex-wrap">
        <div
          class="
            w-full
            sm:w-4/4
            md:w-1/4
            lg:w-1/4
            xl:w-1/4
            2xl:w-1/4
            px-3
            mb-6
            md:mb-2
          "
        >
          <InputNumeroProductor
            v-if="$props.mostrar_num_prod"
            v-bind:numeroproductor="form_pagina.numeroproductor"
            v-bind:numeroproductor_valido="form_pagina.numeroproductor_valido"
            v-bind:numeroproductor_correcto="
              form_pagina.numeroproductor_correcto
            "
            v-bind:obs_numeroproductor="form_pagina.obs_numeroproductor"
            v-bind:obs_numeroproductor_valido="
              form_pagina.obs_numeroproductor_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Numero de Productor'"
            v-bind:testing="mostrar_testing"
            v-bind:num_prod_disable="$props.desactivar_num_prod"
            v-bind:num_prod_correccion_mostrar="
              $props.mostrar_num_prod_correccion
            "
            v-bind:num_prod_correccion_desactivar="
              $props.desactivar_num_prod_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changenumprodvalido="update_num_prod_valido($event)"
            v-on:changenumprodcorrecto="update_num_prod_correcto($event)"
            v-on:changeobsnumprod="update_obs_num_prod($event)"
            v-on:changenumprod="update_num_prod($event)"
          >
          </InputNumeroProductor>
          <div v-show="mostrar_ayuda">
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
                Este es el número único con el que se identifican los
                productores, si usted no lo posee, el sistema le genera uno.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- numero productor valida deel padre{{
              form_pagina.numeroproductor_valido
            }}
            -- numero productor correcto deel padre{{
              form_pagina.numeroproductor_correcto
            }}
            -- numero productor observacion deel padre{{
              form_pagina.obs_numeroproductor
            }}
          </div>
        </div>
        <div
          class="
            w-full
            sm:w-4/4
            md:w-1/4
            lg:w-1/4
            xl:w-1/4
            2xl:w-1/4
            px-3
            mb-6
            md:mb-2
          "
        >
          <InputCuit
            v-if="$props.mostrar_cuit"
            v-bind:cuit="form_pagina.cuit"
            v-bind:cuit_valido="form_pagina.cuit_valido"
            v-bind:cuit_correcto="form_pagina.cuit_correcto"
            v-bind:obs_cuit="form_pagina.obs_cuit"
            v-bind:obs_cuit_valido="form_pagina.obs_cuit_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Cuit'"
            v-bind:testing="mostrar_testing"
            v-bind:cuit_disable="$props.desactivar_cuit"
            v-bind:cuit_correccion_mostrar="$props.mostrar_cuit_correccion"
            v-bind:cuit_correccion_desactivar="
              $props.desactivar_cuit_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changecuitvalido="update_cuit_valido($event)"
            v-on:changecuitcorrecto="update_cuit_correcto($event)"
            v-on:changeobscuit="update_obs_cuit($event)"
            v-on:changecuit="update_cuit($event)"
          >
          </InputCuit>
          <div v-show="mostrar_ayuda">
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
                Es el número de CUIT asignado por la AFIP. Formato:
                XX-XXXXXXXXXX-X.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- cuit valida deel padre{{ form_pagina.cuit_valido }} -- cuit
            correcto deel padre{{ form_pagina.cuit_correcto }} -- cuit
            observacion deel padre{{ form_pagina.obs_cuit }}
          </div>
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
            md:mb-2
          "
        >
          <InputRazonSocial
            v-if="$props.mostrar_razon_social"
            v-bind:razon_social="form_pagina.razon_social"
            v-bind:razon_social_valido="form_pagina.razon_social_valido"
            v-bind:razon_social_correcto="form_pagina.razon_social_correcto"
            v-bind:obs_razon_social="form_pagina.obs_razon_social"
            v-bind:obs_razon_social_valido="form_pagina.obs_razon_social_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Razon social'"
            v-bind:testing="mostrar_testing"
            v-bind:razonsocial_disable="$props.desactivar_razon_social"
            v-bind:razonsocial_correccion_mostrar="
              $props.mostrar_razon_social_correccion
            "
            v-bind:razonsocial_correccion_desactivar="
              $props.desactivar_razon_social_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changerazonsocialvalido="update_razon_social_valido($event)"
            v-on:changerazonsocialcorrecto="
              update_razon_social_correcto($event)
            "
            v-on:changeobsrazonsocial="update_obs_razon_social($event)"
            v-on:changeobsrazonsocialvalido="
              updateobs_razon_social_valido($event)
            "
            v-on:changerazonsocial="update_razon_social($event)"
          ></InputRazonSocial>
          <div v-show="mostrar_ayuda">
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
                En caso de ser una persona física, debe completar este campo con
                su nombre y apellido. Si es una empresa debe completar este
                campo con el nombre con el que se identifica ante la AFIP.
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            - Razon Social valor input del padre{{ form_pagina.razon_social }} -
            Razon Social input valido del padre{{
              form_pagina.razon_social_valido
            }}
            - Razon Social rta prod correcta del padre{{
              form_pagina.razon_social_correcto
            }}
            - Razon Social observacion autoridad del padre{{
              form_pagina.obs_razon_social
            }}
            - Razon Social observacion autoridad valida del padre{{
              form_pagina.obs_razon_social_valido
            }}
          </div>
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
            md:mb-2
          "
        >
          <InputEmail
            v-if="$props.mostrar_email"
            v-bind:email="form_pagina.email"
            v-bind:email_valido="form_pagina.email_valido"
            v-bind:email_correcto="form_pagina.email_correcto"
            v-bind:obs_email="form_pagina.obs_email"
            v-bind:obs_email_valido="form_pagina.obs_email_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Email'"
            v-bind:testing="mostrar_testing"
            v-bind:email_disable="$props.desactivar_email"
            v-bind:email_correccion_mostrar="$props.mostrar_email_correccion"
            v-bind:email_correccion_desactivar="
              $props.desactivar_email_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changeemailvalido="update_email_valido($event)"
            v-on:changeemailcorrecto="update_email_correcto($event)"
            v-on:changeobsemail="update_obs_email($event)"
            v-on:changeobsemailvalido="update_obs_email_valido($event)"
            v-on:changeemail="update_email($event)"
          >
          </InputEmail>
          <div v-show="mostrar_ayuda">
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
                En este email usted recibirá notificaciones y será constituido
                como domicilio electrónico. Pudiendo ser o no el mismo que el
                del usuario. Ejemplo: nombre@ejemplo.com
              </p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- Emai deel padre{{ form_pagina.email }} -- Emai valida deel
            padre{{ form_pagina.email_valido }} -- Emai correcto deel padre{{
              form_pagina.email_correcto
            }}
            -- Emai observacion deel padre{{ form_pagina.obs_email }} -- Emai
            observacion valida deel padre{{ form_pagina.obs_email_valido }}
          </div>
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
            md:mb-2
          "
        >
          <InputTipoSociedad
            v-if="$props.mostrar_tipo_sociedad"
            v-bind:tiposociedad="form_pagina.tiposociedad"
            v-bind:tiposociedad_valido="form_pagina.tiposociedad_valido"
            v-bind:tiposociedad_correcto="form_pagina.tiposociedad_correcto"
            v-bind:obs_tiposociedad="form_pagina.obs_tiposociedad"
            v-bind:obs_tiposociedad_valido="form_pagina.obs_tiposociedad_valido"
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Tipo de Sociedad'"
            v-bind:testing="mostrar_testing"
            v-bind:tipo_sociedad_disable="$props.desactivar_tipo_sociedad"
            v-bind:tipo_sociedad_correccion_mostrar="
              $props.mostrar_tipo_sociedad_correccion
            "
            v-bind:tipo_sociedad_correccion_desactivar="
              $props.desactivar_tipo_sociedad_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changetiposociedadvalido="update_tipo_sociedad_valido($event)"
            v-on:changetiposociedadcorrecto="
              update_tipo_sociedad_correcto($event)
            "
            v-on:changeobstiposociedad="update_obs_tipo_sociedad($event)"
            v-on:changetiposociedad="update_tipo_sociedad($event)"
          >
          </InputTipoSociedad>
          <div v-show="mostrar_ayuda">
            <div
              class="
                bg-blue-50
                text-gray-800
                bg-opacity-20
                text-opacity-80
                ring ring-4 ring-blue-100
              "
            >
              <p class="p-3">Es el tipo de sociedad conformada.</p>
            </div>
            <br />
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- tipo de sociedad valida deel padre{{
              form_pagina.tiposociedad_valido
            }}
            -- tipo de sociedad correcto deel padre{{
              form_pagina.tiposociedad_correcto
            }}
            -- tipo de sociedad observacion deel padre{{
              form_pagina.obs_tiposociedad
            }}
          </div>
        </div>
      </div>
      <!-- <div class="flex flex-wrap">
      </div> -->
      <!-- <br /> -->
      <hr />
      <br />
      <div class="flex flex-wrap">
        <!-- el valor de la inscripcion: {{form_pagina.inscripciondgr}} -->
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
            md:mb-2
          "
        >
          <FileInscripcionDGR
            v-if="$props.mostrar_inscripcion_dgr"
            v-bind:fileinput_valor="form_pagina.inscripciondgr"
            v-bind:fileinput_valor_valido="form_pagina.inscripciondgr_valido"
            v-bind:inscripciondgr_correcto="form_pagina.inscripciondgr_correcto"
            v-bind:obs_fileinput="form_pagina.obs_inscripciondgr"
            v-bind:obs_inscripciondgr_valido="
              form_pagina.obs_inscripciondgr_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Inscripción DGR'"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="'inscripcion_correcto'"
            v-bind:inscripcion_disable="$props.desactivar_inscripcion_dgr"
            v-bind:inscripcion_correccion_mostrar="
              $props.mostrar_inscripcion_dgr_correccion
            "
            v-bind:inscripcion_correccion_desactivar="
              $props.desactivar_inscripcion_dgr_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changeinscripciondgrcorrecto="
              update_inscripcion_dgr_correcto($event)
            "
            v-on:changeobsinscripciondgr="update_obs_inscripcion_dgr($event)"
            v-on:cambioarchivo="update_archivo_dgr($event)"
          >
          </FileInscripcionDGR>
          <div v-show="mostrar_ayuda">
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
                Esta constancia puede ser descargada desde la página de la AFIP.
                Debe ser un archivo del tipo PDF.
              </p>
            </div>
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- valor inscripcion dgr:{{ form_pagina.inscripciondgr }}* --
            inscripcion dgr valida deel padre{{
              form_pagina.inscripciondgr_valido
            }}
            -- inscripcion dgr correcto deel padre{{
              form_pagina.inscripciondgr_correcto
            }}
            -- inscripcion dgr observacion deel padre{{
              form_pagina.obs_inscripciondgr
            }}
          </div>
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
            md:mb-2
          "
        >
          <FileInscripcionDGR
            v-if="$props.mostrar_constancia_sociedad"
            v-bind:fileinput_valor="form_pagina.constaciasociedad"
            v-bind:fileinput_valor_valido="
              form_pagina.constanciasociedad_valido
            "
            v-bind:inscripciondgr_correcto="
              form_pagina.constanciasociedad_correcto
            "
            v-bind:obs_fileinput="form_pagina.obs_constanciasociedad"
            v-bind:obs_inscripciondgr_valido="
              form_pagina.obs_constanciasociedad_valido
            "
            v-bind:evaluacion="autoridad_minera"
            v-bind:label="'Constancia de sociedad'"
            v-bind:testing="mostrar_testing"
            v-bind:name_correcto="'constancia_correcto'"
            v-bind:inscripcion_disable="$props.desactivar_constancia_sociedad"
            v-bind:inscripcion_correccion_mostrar="
              $props.mostrar_constancia_sociedad_correccion
            "
            v-bind:inscripcion_correccion_desactivar="
              $props.desactivar_constancia_sociedad_correccion
            "
            :mostrar_evaluacion_adm="evaluacion_adm"
            v-on:changeinscripciondgrcorrecto="
              update_constancia_sociedad_correcto($event)
            "
            v-on:changeobsinscripciondgr="
              update_obs_constancia_sociedad($event)
            "
            v-on:cambioarchivo="update_archivo_constancia($event)"
          >
          </FileInscripcionDGR>
          <div v-show="mostrar_ayuda">
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
                Esta constancia debe ser descargada desde la página de la AFIP.
                Debe ser un archivo PDF.
              </p>
            </div>
          </div>
          <div class="flex" v-if="mostrar_testing">
            -- valor constancia sociedad:{{ form_pagina.constanciasociedad }}*
            -- constancia de sociedad valida deel padre{{
              form_pagina.constanciasociedad_valido
            }}
            -- constancia de sociedad correcto deel padre{{
              form_pagina.constanciasociedad_correcto
            }}
            -- constancia de sociedad observacion deel padre{{
              form_pagina.obs_constanciasociedad
            }}
          </div>
        </div>
      </div>
      <!-- <hr />
      <br />
      <div class="flex">
      </div> -->
      <br />
      <div>
        <BotonesPaginaUna
          v-if="$props.mostrar_boton_guardar_uno"
          :link_volver="'#'"
          :titulo_boton_volver="'Volver'"
          :titulo_boton_guardar="'Guardar'"
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
          :obs_constanciasociedad_valido="
            form_pagina.obs_constanciasociedad_valido
          "
          :evaluacion="autoridad_minera"
          :id="$props.id"
          :testing="mostrar_testing"
          :desactivar_boton_guardar_uno="$props.desactivar_boton_guardar_uno"
          v-on:CreeUnNuevoId="update_id_recien_creado($event)"
          v-on:CreeUnNuevoIdAdcional="update_id_adicional_recien_creado($event)"
          v-on:actualizarinscripcion="update_inscripcion($event)"
          v-on:actualizaconstancia="update_constancia($event)"
          v-on:mostrarpasosiguiente="mostrarpasos($event)"
        ></BotonesPaginaUna>
      </div>
      <!-- <div class="flex justify-end mt-4">
        <a
          href="#"
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
          >Volver Arriba</a
        > -->
      <!-- <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a> -->
      <!-- </div> -->
    </div>
  </div>
</template>

<script>
import Card from "@/Jetstream/altas/ComponenteCardProvincia";
import Menu from "@/Jetstream/altas/MenuModulo";

import JetDialogModal from "@/Jetstream/DialogModal";
import CardProductor from "@/Jetstream/altas/CardProductor";
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
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",
    "titulo_pagina",

    "razon_social",
    "razon_social_valido",
    "razon_social_correcto",
    "obs_razon_social",
    "obs_razon_social_valido",
    "mostrar_razon_social",
    "desactivar_razon_social",
    "mostrar_razon_social_correccion",
    "desactivar_razon_social_correccion",

    "email",
    "email_valido",
    "email_correcto",
    "obs_email",
    "obs_email_valido",
    "mostrar_email",
    "desactivar_email",
    "mostrar_email_correccion",
    "desactivar_email_correccion",

    "cuit",
    "cuit_valido",
    "cuit_correcto",
    "obs_cuit",
    "obs_cuit_valido",
    "mostrar_cuit",
    "desactivar_cuit",
    "mostrar_cuit_correccion",
    "desactivar_cuit_correccion",

    "numeroproductor",
    "numeroproductor_valido",
    "numeroproductor_correcto",
    "obs_numeroproductor",
    "obs_numeroproductor_valido",
    "mostrar_num_prod",
    "desactivar_num_prod",
    "mostrar_num_prod_correccion",
    "desactivar_num_prod_correccion",

    "tiposociedad",
    "tiposociedad_valido",
    "tiposociedad_correcto",
    "obs_tiposociedad",
    "obs_tiposociedad_valido",
    "mostrar_tipo_sociedad",
    "desactivar_tipo_sociedad",
    "mostrar_tipo_sociedad_correccion",
    "desactivar_tipo_sociedad_correccion",

    "inscripciondgr",
    "inscripciondgr_valido",
    "inscripciondgr_correcto",
    "obs_inscripciondgr",
    "obs_inscripciondgr_valido",
    "mostrar_inscripcion_dgr",
    "desactivar_inscripcion_dgr",
    "mostrar_inscripcion_dgr_correccion",
    "desactivar_inscripcion_dgr_correccion",

    "constanciasociedad",
    "constanciasociedad_valido",
    "constanciasociedad_correcto",
    "obs_constanciasociedad",
    "obs_constanciasociedad_valido",
    "mostrar_constancia_sociedad",
    "desactivar_constancia_sociedad",
    "mostrar_constancia_sociedad_correccion",
    "desactivar_constancia_sociedad_correccion",

    "mostrar_boton_guardar_uno",
    "desactivar_boton_guardar_uno",

    "evaluacion",
    "testing",
    "id",
    "valorpagina",
  ],

  components: {
    Card,
    Menu,
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
    //   console.log("eeeel valor es:");
    //   console.log(this.$props.inscripciondgr);
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
      mostrar_ayuda: false,
      form_pagina: {
        razon_social: this.$props.razon_social,
        razon_social_valido: this.$props.razon_social_valido,
        razon_social_correcto: this.$props.razon_social_correcto,
        obs_razon_social: this.$props.obs_razon_social,
        obs_razon_social_valido: this.$props.obs_razon_social_valido,

        email: this.$props.email,
        email_correcto: this.$props.email_correcto,
        email_valido: this.$props.email_valido,
        obs_email: this.$props.obs_email,
        obs_email_valido: this.$props.obs_email_valido,

        cuit: this.$props.cuit,
        cuit_correcto: this.$props.cuit_correcto,
        cuit_valido: this.$props.cuit_valido,
        obs_cuit: this.$props.obs_cuit,
        obs_cuit_valido: this.$props.obs_cuit_valido,

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

        constaciasociedad: this.$props.constanciasociedad,
        constanciasociedad_valido: this.$props.constanciasociedad_valido,
        constanciasociedad_correcto: this.$props.constanciasociedad_correcto,
        obs_constanciasociedad: this.$props.obs_constanciasociedad,
        obs_constanciasociedad_valido:
          this.$props.obs_constanciasociedad_valido,
      },
    };
  },
  methods: {
    update_valor_evaluacion_Adm(newValor) {
      this.evaluacion_adm = newValor;
    },
    cerrar_modal_datos_uno() {
      this.mostrar_modal_datos_ya_guardados = false;
    },
    //FUNCIONES DE RAZON SOCIAL
    update_razon_social_valido(newValue) {
      this.form_pagina.razon_social_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_razon_social_correcto(newValue) {
      this.form_pagina.razon_social_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_razon_social(newValue) {
      this.form_pagina.obs_razon_social = newValue;
      //tengo que enviarsela al padre
    },
    updateobs_razon_social_valido(newValue) {
      // console.log("traje un"+newValue);
      this.form_pagina.obs_razon_social_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_razon_social(newValue) {
      // console.log("traje un"+newValue);
      this.form_pagina.razon_social = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE EMAIL
    update_email_valido(newValue) {
      this.form_pagina.email_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_email_correcto(newValue) {
      this.form_pagina.email_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_email(newValue) {
      this.form_pagina.obs_email = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_email_valido(newValue) {
      this.form_pagina.obs_email_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_email(newValue) {
      this.form_pagina.email = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE CUIT
    update_cuit_valido(newValue) {
      this.form_pagina.cuit_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_cuit_correcto(newValue) {
      this.form_pagina.cuit_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_cuit(newValue) {
      this.form_pagina.obs_cuit = newValue;
      //tengo que enviarsela al padre
    },
    update_cuit(newValue) {
      this.form_pagina.cuit = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE NUMERO PRODUCTOR
    update_num_prod_valido(newValue) {
      this.form_pagina.numeroproductor_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_num_prod_correcto(newValue) {
      this.form_pagina.numeroproductor_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_num_prod(newValue) {
      this.form_pagina.obs_numeroproductor = newValue;
      //tengo que enviarsela al padre
    },
    update_num_prod(newValue) {
      this.form_pagina.numeroproductor = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE TIPO DE SOCIEDAD
    update_tipo_sociedad_valido(newValue) {
      this.form_pagina.tiposociedad_valido = newValue;
      //tengo que enviarsela al padre
    },
    update_tipo_sociedad_correcto(newValue) {
      this.form_pagina.tiposociedad_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_tipo_sociedad(newValue) {
      this.form_pagina.obs_tiposociedad = newValue;
      //tengo que enviarsela al padre
    },
    update_tipo_sociedad(newValue) {
      this.form_pagina.tiposociedad = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE Inscripcion dgr
    update_inscripcion_dgr_correcto(newValue) {
      this.form_pagina.inscripciondgr_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_inscripcion_dgr(newValue) {
      this.form_pagina.obs_inscripciondgr = newValue;
      //tengo que enviarsela al padre
    },
    //FUNCIONES DE Constancias de sociedad
    update_constancia_sociedad_correcto(newValue) {
      this.form_pagina.constanciasociedad_correcto = newValue;
      //tengo que enviarsela al padre
    },
    update_obs_constancia_sociedad(newValue) {
      this.form_pagina.obs_constanciasociedad = newValue;
      //tengo que enviarsela al padre
    },
    //mostrar ayuda
    update_valor_ayuda_local(newValor) {
      this.mostrar_ayuda = newValor;
    },
    update_id_recien_creado(id_nuevo) {
      this.$emit("CreeUnNuevoIdPasoAAbuelo", id_nuevo);
    },
    update_id_adicional_recien_creado(id_nuevo) {
      this.$emit("CreeUnNuevoIdAdcionalPasoAAbuelo", id_nuevo);
    },

    update_archivo_dgr(value) {
      this.form_pagina.inscripciondgr = value;
      // console.log("cambio el archivo de la dgr");
      // console.log(this.form_pagina.inscripciondgr);
    },
    update_archivo_constancia(value) {
      this.form_pagina.constaciasociedad = value;
    },

    update_inscripcion(value) {
      // console.log("actualizando la inscripcion desde la pagina");
      this.form_pagina.inscripciondgr = value;
      //this.$emit('ActualizarPathInscripcionAAbuelo',value);
    },

    update_constancia(value) {
      this.form_pagina.constaciasociedad = value;
      // this.$emit('ActualizarPathConstanciaAAbuelo',value);
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
};
</script>