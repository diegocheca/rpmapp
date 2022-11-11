<template>
  <div>


    <div class="items-center justify-left">
      <Card
        :icono="'/formulario_alta/imagenes/mendoza3.png'"
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
            :ayuda="false"
            :evaluacion="false"
            :mostrar_evaluacion="false"
            :continuar="true"
            v-on:changevalorayuda="update_valor_ayuda_local($event)"
            v-on:continuarpagina="update_valor_pagina_siguiente($event)"
            v-on:change_valor_evaluacion="update_valor_evaluacion_Adm($event)"
          ></Menu>
        </div>
        <h1>Id de formulario: {{$props.id}}</h1>
        <div class="flex flex-wrap">
          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label>Tipo de productor</label>
            <select v-model="form_salta.tipo" :disabled="disable_input">
              <option value="1">Productor</option>
              <option value="2">Planta de Ben. Minerales</option>
              <option value="3">Explorador</option>
            </select>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>


            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_tipo_true"
                      v-model="eval_salta.correccion_tipo"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_tipo_false"
                      v-model="eval_salta.correccion_tipo"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_tipo_nada"
                      v-model="eval_salta.correccion_tipo"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_tipo == 'false' || eval_salta.correccion_tipo == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion"
                    name="obs_observacion"
                    v-model="eval_salta.observacion_tipo"
                  >
                  </textarea>
                </div>
              </div>
            </div>





            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
            for="leal_numero"
            >Nombre representante legal</label
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
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
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
              placeholder="Nombre RL"
              id="representante_legal_nombre"
              name="representante_legal_nombre"
              v-model="form_salta.representante_legal_nombre"
              :disabled="disable_input"
            />
          </div>
          <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_nombre_true"
                      v-model="eval_salta.correccion_representante_legal_nombre"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_nombre_false"
                      v-model="eval_salta.correccion_representante_legal_nombre"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_nombre_nada"
                      v-model="eval_salta.correccion_representante_legal_nombre"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_nombre == 'false' ||eval_salta.correccion_representante_legal_nombre == false " class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_nombre"
                    name="obs_observacion_nombre"
                    v-model="eval_salta.observacion_representante_legal_nombre"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>




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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Apellido representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
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
                placeholder="Apellido RL"
                id="representante_legal_apellido"
                name="representante_legal_apellido"
                v-model="form_salta.representante_legal_apellido"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_apellido_true"
                      v-model="eval_salta.correccion_representante_legal_apellido"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_apellido_false"
                      v-model="eval_salta.correccion_representante_legal_apellido"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_apellido_nada"
                      v-model="eval_salta.correccion_representante_legal_apellido"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_apellido == 'false' || eval_salta.correccion_representante_legal_apellido == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_apellido"
                    name="obs_observacion_apellido"
                    v-model="eval_salta.observacion_representante_legal_apellido"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>




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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>


















        
        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Dni representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
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
                placeholder="DNI RL"
                id="representante_legal_dni"
                name="representante_legal_dni"
                v-model="form_salta.representante_legal_dni"
                :disabled="disable_input"
              />
            </div>




            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_dni_true"
                      v-model="eval_salta.correccion_representante_legal_dni"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_dni_false"
                      v-model="eval_salta.correccion_representante_legal_dni"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_dni_nada"
                      v-model="eval_salta.correccion_representante_legal_dni"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_dni == 'false' || eval_salta.correccion_representante_legal_dni == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_dni"
                    name="obs_observacion_dni"
                    v-model="eval_salta.observacion_representante_legal_dni"
                    
                  >
                  

                  </textarea>
                </div>
              </div>
            </div>




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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Email representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
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
                placeholder="Email RL"
                id="representante_legal_email"
                name="representante_legal_email"
                v-model="form_salta.representante_legal_email"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_email_true"
                      v-model="eval_salta.correccion_representante_legal_email"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_email_false"
                      v-model="eval_salta.correccion_representante_legal_email"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_email_nada"
                      v-model="eval_salta.correccion_representante_legal_email"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_email == 'false' || eval_salta.correccion_representante_legal_dni == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_email"
                    name="obs_observacion_email"
                    v-model="eval_salta.observacion_representante_legal_email"
                    
                  >
                  


                  </textarea>
                </div>
              </div>
            </div>



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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Cargo representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
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
                placeholder="Cargo RL"
                id="representante_legal_cargo"
                name="representante_legal_cargo"
                v-model="form_salta.representante_legal_cargo"
                :disabled="disable_input"
              />
            </div>

            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_cargo_true"
                      v-model="eval_salta.correccion_representante_legal_cargo"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_cargo_false"
                      v-model="eval_salta.correccion_representante_legal_cargo"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_cargo_nada"
                      v-model="eval_salta.correccion_representante_legal_cargo"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_cargo == 'false' || eval_salta.correccion_representante_legal_cargo == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_cargo"
                    name="obs_observacion_cargo"
                    v-model="eval_salta.observacion_representante_legal_cargo"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>


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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>

















        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Domicilio representante legal</label
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
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
                placeholder="Domicilio RL"
                id="representante_legal_domicilio"
                name="representante_legal_domicilio"
                v-model="form_salta.representante_legal_domicilio"
                :disabled="disable_input"
              />
            </div>

            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_domicilio_true"
                      v-model="eval_salta.correccion_representante_legal_domicilio"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_domicilio_false"
                      v-model="eval_salta.correccion_representante_legal_domicilio"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_domicilio_nada"
                      v-model="eval_salta.correccion_representante_legal_domicilio"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_representante_legal_domicilio == 'false' || eval_salta.correccion_representante_legal_domicilio == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_domicilio"
                    name="obs_observacion_domicilio"
                    v-model="eval_salta.observacion_representante_legal_domicilio"
                    
                  >
                  

                  </textarea>
                </div>
              </div>
            </div>


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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Nacionalidad representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
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
                placeholder="Nacionalidad RL"
                id="representante_legal_nacionalidad"
                name="representante_legal_nacionalidad"
                v-model="form_salta.nacionalidad"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_nacionalidad_true"
                      v-model="eval_salta.correccion_nacionalidad"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_nacionalidad_false"
                      v-model="eval_salta.correccion_nacionalidad"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_nacionalidad_nada"
                      v-model="eval_salta.correccion_nacionalidad"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_nacionalidad == 'false' || eval_salta.correccion_nacionalidad == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_nacionalidad"
                    name="obs_observacion_nacionalidad"
                    v-model="eval_salta.observacion_nacionalidad"
                    
                  >
                  


                  </textarea>
                </div>
              </div>
            </div>





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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >Telefono representante legal</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
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
                placeholder="Telefono RL"
                id="representante_legal_telefono"
                name="representante_legal_telefono"
                v-model="form_salta.telefono"
                :disabled="disable_input"
              />
            </div>






            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_telefono_true"
                      v-model="eval_salta.correccion_telefono"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_telefono_false"
                      v-model="eval_salta.correccion_telefono"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_telefono_nada"
                      v-model="eval_salta.correccion_telefono"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_telefono == 'false' || eval_salta.correccion_telefono == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_telefono"
                    name="obs_observacion_telefono"
                    v-model="eval_salta.observacion_telefono"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>








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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>



<br>
  <hr>
<br>
















        








        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >superficie_mina</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="Sup Mina"
                id="superficie_mina"
                name="superficie_mina"
                v-model="form_salta.superficie_mina"
                :disabled="disable_input"
              />
            </div>


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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >volumenes_de_extraccion_periodo_anterior</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="volumenes_de_extraccion_periodo_anterior"
                id="volumenes_de_extraccion_periodo_anterior"
                name="volumenes_de_extraccion_periodo_anterior"
                v-model="form_salta.volumenes_de_extraccion_periodo_anterior"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >n_resolucion_iia</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="n_resolucion_iia"
                id="n_resolucion_iia"
                name="n_resolucion_iia"
                v-model="form_salta.n_resolucion_iia"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>











        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >etapa_de_exploracion</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="etapa_de_exploracion"
                id="etapa_de_exploracion"
                name="n_resolucetapa_de_exploracionion_iia"
                v-model="form_salta.etapa_de_exploracion"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >n_resolucion_aprobacion_informe</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="n_resolucion_aprobacion_informe"
                id="n_resolucion_aprobacion_informe"
                name="n_resolucion_aprobacion_informe"
                v-model="form_salta.n_resolucion_aprobacion_informe"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >etapa_de_exploracion_avanzada</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="etapa_de_exploracion_avanzada"
                id="etapa_de_exploracion_avanzada"
                name="etapa_de_exploracion_avanzada"
                v-model="form_salta.etapa_de_exploracion_avanzada"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>



















        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >volumenes_anuales_de_materias_primas</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="volumenes_anuales_de_materias_primas"
                id="volumenes_anuales_de_materias_primas"
                name="volumenes_anuales_de_materias_primas"
                v-model="form_salta.volumenes_anuales_de_materias_primas"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >material_obtenido</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="material_obtenido"
                id="material_obtenido"
                name="material_obtenido"
                v-model="form_salta.material_obtenido"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >autorizacion_extractivas_exploratorias</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="autorizacion_extractivas_exploratorias"
                id="autorizacion_extractivas_exploratorias"
                name="autorizacion_extractivas_exploratorias"
                v-model="form_salta.autorizacion_extractivas_exploratorias"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>




        <br>
  <hr>
<br>



        





        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >responsable nombre</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="responsable_nombre"
                id="responsable_nombre"
                name="responsable_nombre"
                v-model="form_salta.responsable_nombre"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_nombreo_true"
                      v-model="eval_salta.correccion_responsable_nombre"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_nombre_false"
                      v-model="eval_salta.correccion_responsable_nombre"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_nombre_nada"
                      v-model="eval_salta.correccion_responsable_nombre"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_responsable_nombre == 'false' || eval_salta.correccion_responsable_nombre == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_responsable_nombre"
                    name="obs_observacion_responsable_nombre"
                    v-model="eval_salta.observacion_responsable_nombre"
                    
                  >
                  

                  </textarea>
                </div>
              </div>
            </div>



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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >responsable_apellido</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="responsable_apellido"
                id="responsable_apellido"
                name="responsable_apellido"
                v-model="form_salta.responsable_apellido"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_apellido_true"
                      v-model="eval_salta.correccion_responsable_apellido"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_apellido_false"
                      v-model="eval_salta.correccion_responsable_apellido"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_apellido_nada"
                      v-model="eval_salta.correccion_responsable_apellido"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_responsable_apellido == 'false' || eval_salta.correccion_responsable_apellido == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_responsable_apellido"
                    name="obs_observacion_responsable_apellido"
                    v-model="eval_salta.observacion_responsable_apellido"
                    
                  >
                  


                  </textarea>
                </div>
              </div>
            </div>





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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >responsable_dni</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="responsable_dni"
                id="responsable_dni"
                name="responsable_dni"
                v-model="form_salta.responsable_dni"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_dni_true"
                      v-model="eval_salta.correccion_responsable_dni"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_dni_false"
                      v-model="eval_salta.correccion_responsable_dni"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_dni_nada"
                      v-model="eval_salta.correccion_responsable_dni"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_responsable_dni == 'false' || eval_salta.correccion_responsable_dni == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_responsable_dni"
                    name="obs_observacion_responsable_dni"
                    v-model="eval_salta.observacion_responsable_dni"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>




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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>



























        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >responsable_titulo</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="responsable_titulo"
                id="responsable_titulo"
                name="responsable_titulo"
                v-model="form_salta.responsable_titulo"
                :disabled="disable_input"
              />
            </div>







            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_titulo_true"
                      v-model="eval_salta.correccion_responsable_titulo"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_titulo_false"
                      v-model="eval_salta.correccion_responsable_titulo"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_titulo_nada"
                      v-model="eval_salta.correccion_responsable_titulo"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_responsable_titulo == 'false' || eval_salta.correccion_responsable_titulo == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_responsable_titulo"
                    name="obs_observacion_responsable_titulo"
                    v-model="eval_salta.observacion_responsable_titulo"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>






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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >responsable_matricula</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="responsable_matricula"
                id="responsable_matricula"
                name="responsable_matricula"
                v-model="form_salta.responsable_matricula"
                :disabled="disable_input"
              />
            </div>



            <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_matricula_true"
                      v-model="eval_salta.correccion_responsable_matricula"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_matricula_false"
                      v-model="eval_salta.correccion_responsable_matricula"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_matricula_nada"
                      v-model="eval_salta.correccion_responsable_matricula"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_responsable_matricula == 'false' || eval_salta.correccion_responsable_matricula == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_responsable_matricula"
                    name="obs_observacion_responsable_matricula"
                    v-model="eval_salta.observacion_responsable_matricula"
                    
                  >
                  </textarea>
                </div>
              </div>
            </div>



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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          

        </div>











        




        <div>
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            >Ley 24196</label
          >
          <div class="mt-2">
            <label class="inline-flex items-center">
              <input
                type="radio"
                class="form-radio h-5 w-5 text-green-500"
                name="true_checkbox"
                v-model="form_salta.ley_checkbox"
                value=true
                v-on="actaulizar_checkbox_salta(true)"
              />
              <span class="ml-2">Aplica ley 24916</span>
            </label>
            <label class="inline-flex items-center ml-2">
              <input
                type="radio"
                class="form-radio h-5 w-5 text-red-500"
                name="false_checkbox"
                v-model="form_salta.ley_checkbox"
                value=false
                v-on="actaulizar_checkbox_salta(false)"
              />
              <span class="ml-2">No Aplica ley 24916</span>
            </label>
          </div>
        </div>


        <div class="flex flex-wrap" v-if="form_salta.ley_checkbox!=='false'">
          
          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >ley_24196_numero</label
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
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
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
                placeholder="ley_24196_numero"
                id="ley_24196_numero"
                name="ley_24196_numero"
                v-model="form_salta.ley_24196_numero"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >

            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >ley_24196_inscripcion_renar</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="ley_24196_inscripcion_renar"
                id="ley_24196_inscripcion_renar"
                name="ley_24196_inscripcion_renar"
                v-model="form_salta.ley_24196_inscripcion_renar"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >ley_24196_explosivos</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="ley_24196_explosivos"
                id="ley_24196_explosivos"
                name="ley_24196_explosivos"
                v-model="form_salta.ley_24196_explosivos"
                :disabled="disable_input"
              />
            </div>

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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
              for="leal_numero"
              >ley_24196_propiedad</label
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
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
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
                placeholder="ley_24196_propiedad"
                id="ley_24196_propiedad"
                name="ley_24196_propiedad"
                v-model="form_salta.ley_24196_propiedad"
                :disabled="disable_input"
              />
            </div>
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>

















        






<!-- 
        <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label>estado_contable:</label>
            <input type="text" v-model="form_salta.estado_contable" maxlength="255">
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label>listado_de_maquinaria:</label>
            <input type="text" v-model="form_salta.listado_de_maquinaria" maxlength="255">
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>


          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label>regalias:</label>
            <input type="text" v-model="form_salta.regalias" maxlength="255">
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

        </div>
 -->








    










    










    










    


















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

          <div class="bg-white shadow-md rounded-xl p-4 border border-gray-300">
            <div >
                <div
                  class="flex flex-wrap"
                >
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!-- cuit -->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!-- tipo -->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!-- Calle--> 
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!--Num Calle-->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!--Telefono-->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!-- Prov--> 
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
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
                        :disabled="disable_input"
                      />
                      <select
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-grey-light
                          rounded
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        id="empresa_provincia"
                        name="empresa_provincia"
                        v-model="empresa.provincia"
                      >
                        <option
                          v-for="provincia in $props.lista_provincias"
                          v-bind:key="provincia.id"
                          :value="provincia.id"
                        >
                          {{ provincia.nombre }}
                        </option>
                      </select>

                    </div>
                  </div>
                  <!--Dpto-->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
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
                        :disabled="disable_input"
                      />
                      <select
                        class="
                          flex-shrink flex-grow flex-auto
                          leading-normal
                          w-px
                          border border-grey-light
                          rounded
                          px-3
                          relative
                          focus:border-blue focus:shadow
                        "
                        id="empresa_departamento_dos"
                        name="empresa_departamento_dos"
                        v-model="empresa.departamento"
                        :about="disable_input"
                      >
                        
                        <option
                          v-for="dpto in $props.lista_dptos"
                          v-bind:key="dpto.id"
                          :value="dpto.id"
                        >
                          {{ dpto.nombre }}
                        </option>
                      </select>

                    </div>
                  </div>
                  <!--Localidad-->
                  <div class="sm:w-3/3
                              md:w-1/3
                              lg:w-1/3
                              xl:w-1/3
                              2xl:w-1/3 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!-- CP--> 
                  <div class="sm:w-2/2
                              md:w-1/2
                              lg:w-1/2
                              xl:w-1/2
                              2xl:w-1/2 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                  <!--Otro-->
                  <div class="sm:w-2/2
                              md:w-1/2
                              lg:w-1/2
                              xl:w-1/2
                              2xl:w-1/2 px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
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
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
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
                        :disabled="disable_input"
                      />
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>



          <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600" v-if="$props.evaluacion ">
              <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
                Seccion de evaluacion
              </h3>
              <div>
                <div class="w-full px-3">
                  <span class="text-gray-700 mr-2">Correcto?</span>
                  <label>
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-green-600"
                      name="correc_responsable_empresas_true"
                      v-model="eval_salta.correccion_empresas"
                      value=true
                    />
                    <span class="ml-2">Si</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-red-600"
                      name="correc_responsable_empresas_false"
                      v-model="eval_salta.correccion_empresas"
                      value=false
                    />
                    <span class="ml-2">No</span>
                  </label>
                  <label class="ml-2">
                    <input
                      type="radio"
                      class="form-radio h-4 w-4 text-indigo-600"
                      name="correc_responsable_empresas_nada"
                      v-model="eval_salta.correccion_empresas"
                      value="nada"
                    />
                    <span class="ml-2">Sin evaluar</span>
                  </label>
                </div>
                <div v-show="eval_salta.correccion_empresas == 'false' || eval_salta.correccion_empresas == false" class="w-full px-3">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                      mt-2
                    "
                    for="obs_observacion"
                    >Observación:</label
                  >
                  <textarea
                    id="obs_observacion_empresas"
                    name="obs_observacion_empresas"
                    v-model="eval_salta.observacion_empresas"
                  >
                  </textarea>
                </div>
              </div>
            </div>

            <hr>
<!--     {{empresas}}










<hr>


    
{{eval_salta}} -->








{{$props.lista_provincias}}
    










    






       <!--  <div class="flex flex-wrap">
          

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >






            <label>personas_afectadas:</label>
            <input type="text" v-model="form_salta.personas_afectadas" maxlength="255">
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>

          <div
            class="
              w-full
              sm:w-3/3
              md:w-1/3
              lg:w-1/3
              xl:w-1/3
              2xl:w-1/3
              px-3
              mb-6
              md:mb-2
            "
          >
            <label>multas:</label>
            <input type="text" v-model="form_salta.multas" maxlength="255">
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
                  Este es el tipo de productor para el cual es esta inscribiendo
                </p>
              </div>
              <br />
            </div>
            
          </div>



          
        

        </div> -->

        <!-- <hr>
        {{form_salta}}
        <hr>
        {{eval_salta}}
        <hr>
        <h1>Eval id: {{eval_salta.id}}</h1> -->

        <div class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center">
        <button
          type="button"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-green-500
            bg-green-500
            shadow-md
            font-bold
            hover:text-white hover:shadow-xl hover:bg-green-700
          "
          @click="guardar_form"
        v-if="$props.accion === 'crear'"

        >
          {{ titulo_boton_guardar }}
        </button>
        <button
          type="button"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-green-500
            bg-green-500
            shadow-md
            font-bold
            hover:text-white hover:shadow-xl hover:bg-green-700
          "
          @click="guardar_eval"
        v-if="$props.evaluacion"

        >
          {{ titulo_boton_guardar }} eval
        </button>

        <button
          type="button"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-green-500
            bg-green-500
            shadow-md
            font-bold
            hover:text-white hover:shadow-xl hover:bg-green-700
          "
          @click="update_form"
          v-if="$props.accion === 'editar' &&  !$props.evaluacion"
        >
         Actualizar
        </button>

       

        <button
          type="button"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-green-500
            bg-green-500
            shadow-md
            font-bold
            hover:text-white hover:shadow-xl hover:bg-green-700
          "
          @click="update_eval"
          v-if="$props.accion === 'editar' &&  !$props.evaluacion"
        >
         Update Eval
        </button>



        <button
          type="button"
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
          @click="datos_fakes"
        >
          Datos Fakes
        </button>
        <button
          type="button"
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
          @click="empresa_fakes"
        >
          empresa Fakes
        </button>

        <button
          type="button"
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
          @click="evaluacion_fakes"
          v-if="$props.evaluacion"
        >
          evaluacion Fakes
        </button>

        
        <button
          type="button"
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
          @click="get_eval"
          v-if="$props.evaluacion"
        >
          Get Eval
        </button>

        <button
          type="button"
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
          @click="get_empresas"
          v-if="$props.accion === 'editar' &&  !$props.evaluacion"
        >
          Get Empresas
        </button>



        
      </div>

      </div>



    
  </div>
</template>

<script>
import Card from "@/Jetstream/altas/ComponenteCardProvincia";
import Menu from "@/Jetstream/altas/MenuModulo";

import JetDialogModal from "@/Jetstream/DialogModal";
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import BotonesPaginaMendoza from "@/Pages/Productors/BotonesPaginaMendoza";
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
    "accion",
    "id",
    "lista_provincias",
    "lista_dptos"

  ],
  components: {
    JetDialogModal,
    Card,
    Menu,
    SelectProvincia,
    SelectDepartamento,
    NombreMina,
    TipoDeSistemaGeo,
    BotonesPaginaMendoza,
    SubirArchivo,
    CaracterQueInvoca,
    //BotonesPaginaCatamarca,
  },
  data() {
    return {
      evaluacion_adm: false,
      disable_input: false,
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
      form_salta: {},
      eval_salta: {},
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
      lista_localidades: [],
    };
  },
  methods: {
    
    async  guardar_form() {
      let self = this;
      let response1 = await axios
            .post("/formulario_salta/guardar_alta/", {
              form: this.form_salta,
              id_formulario_alta: this.$props.id
            })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.form_salta.id = response.data.data;

                self.eval_salta.id_formulario_alta_salta = response.data.data;

                setTimeout(function(){
                    console.log("Executed after 1 second");
                }, 1000);
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });


        //empresas
        let response2 = await 
              axios
                .post("/formulario_salta/guardar_empresas/", {
                  id_formulario_alta_salta : self.form_salta.id,
                  empresas: this.empresas
                })
                .then(function (response_empresa) {
                  if (response_empresa.data.status === "ok") {
                    //self.permisos_mostrar = response_empresa.data.mostrar;
                    // console.log(self.permisos_mostrar);
                    //self.permisos_disables = response_empresa.data.disables;
                    console.log("\n\n\n\n empresas:");
                    console.log("\nel dato es un:", typeof(response_empresa.data.data));
                    //alert("empresas dice:"+response_empresa.data.data);
                    for(let i=0; i<=response_empresa.data.data.length-1; i++){
                      //console.log("EL nuevo id es:"+response_empresa.data.data[i]);
                      self.empresas[i].id = response_empresa.data.data[i];
                    }
                    /*let response_emp = response_empresa.data.data;
                    response_emp = response_emp.trim();
                    response_emp = response_emp.replace("[", "");
                    response_emp = response_emp.data.data.replace("]", "");
                    let list_of_ids = response_emp.split(',');
                    console.log(list_of_ids);*/
                  } else console.log("error al buscar permisos: " + response_empresa.data.msg);
                })
                .catch(function (error) {
                  console.log(error);
                });


                console.log("\n\n\n");
                console.log(self.empresas);


    },
    
    guardar_eval() {
      let self = this;
      this.eval_salta.id_formulario_alta_salta =this.form_salta.id  ;
        axios
            .post("/formulario_salta/guardar_eval/", {
              eval: this.eval_salta
            })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.eval_salta.id = response.data.data;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
    },

    
    async update_form() {
      let self = this;
      this.eval_salta.id_formulario_alta_salta =this.form_salta.id  ;
      let response1 = await  axios
            .post("/formulario_salta/update_form/", {
              form: this.form_salta
            })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.permisos_mostrar = response.data.mostrar;
                // console.log(self.permisos_mostrar);
                self.permisos_disables = response.data.disables;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
      let response2 = await axios
            .post("/formulario_salta/update_empresas/", {
              id_formulario_alta_salta : self.form_salta.id,
              empresas: this.empresas
            })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.permisos_mostrar = response.data.mostrar;
                // console.log(self.permisos_mostrar);
                self.permisos_disables = response.data.disables;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
    },

    
    update_eval() {
      let self = this;
      this.eval_salta.id_formulario_alta_salta =this.form_salta.id  ;
        axios
            .post("/formulario_salta/update_eval/", {
              eval: this.eval_salta
            })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.eval_salta.id = response.data.data;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
    },

    
    datos_fakes() {
      let self = this;
        axios
            .get("/formulario_salta/form_faker/")
            .then(function (response) {
              if (response.data.status === "ok") {
                console.log("los datos son\n\n\n");
                console.log(response.data.data);
                //self.form_salta = JSON.stringify(response.data.data);
                //self.form_salta = response.data.data.representante_legal_apellido;
                //alert(response.data.data.representante_legal_apellido);

                self.form_salta.id =null;
                self.form_salta.id_formulario_alta = response.data.data.id_formulario_alta;
                self.form_salta.tipo = response.data.data.tipo;
                self.form_salta.representante_legal_nombre = response.data.data.representante_legal_nombre;
                self.form_salta.representante_legal_apellido = response.data.data.representante_legal_apellido;
                self.form_salta.representante_legal_dni = response.data.data.representante_legal_dni;
                self.form_salta.representante_legal_email = response.data.data.representante_legal_email;
                self.form_salta.representante_legal_cargo = response.data.data.representante_legal_cargo;
                self.form_salta.representante_legal_domicilio = response.data.data.representante_legal_domicilio;
                self.form_salta.nacionalidad = response.data.data.nacionalidad;
                self.form_salta.telefono = response.data.data.telefono;
                self.form_salta.superficie_mina = response.data.data.superficie_mina;
                self.form_salta.volumenes_de_extraccion_periodo_anterior = response.data.data.volumenes_de_extraccion_periodo_anterior;
                self.form_salta.n_resolucion_iia = response.data.data.n_resolucion_iia;
                self.form_salta.etapa_de_exploracion = response.data.data.etapa_de_exploracion;
                self.form_salta.n_resolucion_aprobacion_informe = response.data.data.n_resolucion_aprobacion_informe;
                self.form_salta.etapa_de_exploracion_avanzada = response.data.data.etapa_de_exploracion_avanzada;
                self.form_salta.volumenes_anuales_de_materias_primas = response.data.data.volumenes_anuales_de_materias_primas;
                self.form_salta.material_obtenido = response.data.data.material_obtenido;
                self.form_salta.autorizacion_extractivas_exploratorias = response.data.data.autorizacion_extractivas_exploratorias;
                self.form_salta.responsable_nombre = response.data.data.responsable_nombre;
                self.form_salta.responsable_apellido = response.data.data.responsable_apellido;
                self.form_salta.responsable_dni = response.data.data.responsable_dni;
                self.form_salta.responsable_titulo = response.data.data.responsable_titulo;
                self.form_salta.responsable_matricula = response.data.data.responsable_matricula;
                self.form_salta.ley_24196_numero = response.data.data.ley_24196_numero;
                self.form_salta.ley_24196_inscripcion_renar = response.data.data.ley_24196_inscripcion_renar;
                self.form_salta.ley_24196_explosivos = response.data.data.ley_24196_explosivos;
                self.form_salta.ley_24196_propiedad = response.data.data.ley_24196_propiedad;
                self.form_salta.estado_contable = response.data.data.estado_contable;
                self.form_salta.listado_de_maquinaria = response.data.data.listado_de_maquinaria;
                self.form_salta.regalias = response.data.data.regalias;
                self.form_salta.personas_afectadas = response.data.data.personas_afectadas;
                self.form_salta.multas = response.data.data.multas;
                self.form_salta.created_by = response.data.data.created_by;
                self.form_salta.updated_by = response.data.data.updated_by;


              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },
    
    empresa_fakes() {
      let self = this;
        axios
            .get("/formulario_salta/empresa_faker/")
            .then(function (response) {
              if (response.data.status === "ok") {
                console.log("los datos son\n\n\n");
                console.log(response.data.data);
                self.empresas.splice(0, 1);
                //let empresas_temp = {};
                response.data.data.map((array, index) => {
                  let empresa_temp = {
                    id: index,
                    razon_social: array.razon_social,
                    cuit: array.cuit,
                    tipo:  array.tipo,
                    calle:  array.calle,
                    numero:  array.numero,
                    telefono:  array.telefono,
                    provincia:  array.provincia,
                    departamento:  array.departamento,
                    localidad:  array.localidad,
                    cp:  array.cp,
                    otro:  array.otro
                  }
                  self.empresas.push(empresa_temp);
                });
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },
    
    evaluacion_fakes() {
      let self = this;
        axios
            .get("/formulario_salta/evaluacion_fake/")
            .then(function (response) {
              if (response.data.status === "ok") {
                console.log("los datos son\n\n\n");
                console.log(response.data.data);
                self.eval_salta = response.data.data;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },

    get_eval() {
      let self = this;
        axios
            .post("/formulario_salta/get_evaluacion/",{id_form_salta:self.form_salta.id })
            .then(function (response) {
              if (response.data.status === "ok") {
                console.log("lo q devuelve el eval es:\n\n\n");
                console.log(response.data.data.correccion_nacionalidad);
                self.eval_salta = response.data.data;
                //update obvservaciones

              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },
    
    async get_form() {
      let self = this;
      let response1 = await  axios
            .post("/formulario_salta/buscar_formulario/",{id_form_alta:this.$props.id })
            .then(function (response) {
              if (response.data.status === "ok") {
                self.form_salta = response.data.data;
              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },
    

    async get_empresas() {
      let self = this;
      let response2 = await  axios
            .post("/formulario_salta/get_empresas/",{id:this.form_salta.id })
            .then(function (response) {
              if (response.data.status === "ok") {
                console.log("lo q devuelve el get empresas:\n\n\n");
                console.log(response.data.data);
                self.empresas = response.data.data;
                //update obvservaciones

              } else console.log("error al buscar permisos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });

    },

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

    actaulizar_checkbox_salta(booleano){
      //alert(this.form_salta.ley_checkbox);
      console.log(this.form_salta.ley_checkbox);

    },
    update_valor_ayuda_local(newValor) {
      this.ayuda_local = newValor;
    },
    update_valor_ocultar_modulo(v) {
      this.mostrar_modulo = v;
    },
    update_valor_provincia(newValue) {
      let self = this;
      this.form_pagina.leal_provincia = newValue;
      this.$emit("updateValorPadreProv", {
        nombre: newValue,
        lugar: this.$props.donde_estoy,
      });
      axios
        .post("/datos/traer_departamentos/", { id_prov: newValue })
        .then(function (response) {
          console.log("las deptos son:\n");
          self.lista_departamentos = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
      //tengo que enviarsela al padre
    },
/*
    ectamente los Datos del Productor.
[ Id = 1862 ]
[N° RPM = 123123 ]
[ Estado = borrador ].
*/
  },
  mounted() {
    let self = this;
    this.$nextTick(() => {
      // console.log("por buscar los datos de mendoza desde el hijo \n\n\n");
      // console.log("\n\n\n mi id es : " + this.$props.id + " \n\n\n");
      console.log("inicio de salta");
      if (this.$inertia.page.props.user.id_provincia === 66) {
        if (this.$props.evaluacion) {
          
          console.log("\n\n\nen alta");
          self.eval_salta.id = '';
          self.eval_salta.id_formulario_alta_salta = '';
          self.eval_salta.correccion_tipo = '';
          self.eval_salta.observacion_tipo = '';
          self.eval_salta.correccion_representante_legal_nombre = '';
          self.eval_salta.observacion_representante_legal_nombre = '';
          self.eval_salta.correccion_representante_legal_apellido = '';
          self.eval_salta.observacion_representante_legal_apellido = '';
          self.eval_salta.correccion_representante_legal_dni = '';
          self.eval_salta.observacion_representante_legal_dni = '';
          self.eval_salta.correccion_representante_legal_email = '';
          self.eval_salta.observacion_representante_legal_email = '';
          self.eval_salta.correccion_representante_legal_cargo = '';
          self.eval_salta.observacion_representante_legal_cargo = '';
          self.eval_salta.correccion_representante_legal_domicilio = '';
          self.eval_salta.observacion_representante_legal_domicilio = '';
          self.eval_salta.correccion_nacionalidad = '';
          self.eval_salta.observacion_nacionalidad = '';
          self.eval_salta.correccion_telefono = '';
          self.eval_salta.observacion_telefono = '';
          self.eval_salta.correccion_superficie_mina = '';
          self.eval_salta.observacion_superficie_mina = '';
          self.eval_salta.correccion_volumenes_de_extraccion_periodo_anterior = '';
          self.eval_salta.observacion_volumenes_de_extraccion_periodo_anterior = '';
          self.eval_salta.correccion_n_resolucion_iia = '';
          self.eval_salta.observacion_n_resolucion_iia = '';
          self.eval_salta.correccion_etapa_de_exploracion = '';
          self.eval_salta.observacion_etapa_de_exploracion = '';
          self.eval_salta.correccion_n_resolucion_aprobacion_informe = '';
          self.eval_salta.observacion_n_resolucion_aprobacion_informe = '';
          self.eval_salta.correccion_etapa_de_exploracion_avanzada = '';
          self.eval_salta.observacion_etapa_de_exploracion_avanzada = '';
          self.eval_salta.correccion_volumenes_anuales_de_materias_primas = '';
          self.eval_salta.observacion_volumenes_anuales_de_materias_primas = '';
          self.eval_salta.correccion_material_obtenido = '';
          self.eval_salta.observacion_material_obtenido = '';
          self.eval_salta.correccion_autorizacion_extractivas_exploratorias = '';
          self.eval_salta.observacion_autorizacion_extractivas_exploratorias = '';
          self.eval_salta.correccion_responsable_nombre = '';
          self.eval_salta.observacion_responsable_nombre = '';
          self.eval_salta.correccion_responsable_apellido = '';
          self.eval_salta.observacion_responsable_apellido = '';
          self.eval_salta.correccion_responsable_dni = '';
          self.eval_salta.observacion_responsable_dni = '';
          self.eval_salta.correccion_responsable_titulo = '';
          self.eval_salta.observacion_responsable_titulo = '';
          self.eval_salta.correccion_responsable_matricula = '';
          self.eval_salta.observacion_responsable_matricula = '';
          self.eval_salta.correccion_ley_24196_numero = '';
          self.eval_salta.observacion_ley_24196_numero = '';
          self.eval_salta.correccion_ley_24196_inscripcion_renar = '';
          self.eval_salta.observacion_ley_24196_inscripcion_renar = '';
          self.eval_salta.correccion_ley_24196_explosivos = '';
          self.eval_salta.observacion_ley_24196_explosivos = '';
          self.eval_salta.correccion_ley_24196_propiedad = '';
          self.eval_salta.observacion_ley_24196_propiedad = '';
          self.eval_salta.correccion_estado_contable = '';
          self.eval_salta.observacion_estado_contable = '';
          self.eval_salta.correccion_listado_de_maquinaria = '';
          self.eval_salta.observacion_listado_de_maquinaria = '';
          self.eval_salta.correccion_regalias = '';
          self.eval_salta.observacion_regalias = '';
          self.eval_salta.correccion_personas_afectadas = '';
          self.eval_salta.observacion_personas_afectadas = '';
          self.eval_salta.correccion_multas = '';
          self.eval_salta.observacion_multas = '';

          self.eval_salta.correccion_empresas = '';
          self.eval_salta.observacion_empresas = '';

          //voy a buscar datos del form de salta
          this.get_form();
            setTimeout(function(){
                console.log("Executed after 1 second");
                self.get_empresas();
              }, 2000);

              
          //voy a buscar si existe evaluacion
          setTimeout(function(){
                self.get_eval();
              }, 1000);

              self.disable_input = true;
          
        } 
        else {
          if (this.$props.accion === "crear") {
            //estoy dando de alta
            
            console.log("\n\n\nen alta");
            self.form_salta.id = "5";
            self.form_salta.id_formulario_alta = "1730";
            self.form_salta.tipo = "1";
            self.form_salta.representante_legal_nombre = "dasdasd";
            self.form_salta.representante_legal_apellido = "asdasdasd";
            self.form_salta.representante_legal_dni = "23123";
            self.form_salta.representante_legal_email = "dsdasda@gmail.com";
            self.form_salta.representante_legal_cargo = "CEO";
            self.form_salta.representante_legal_domicilio = "Libertador y mendoza";
            self.form_salta.nacionalidad = "Argentina";
            self.form_salta.telefono = "156165156";
            self.form_salta.superficie_mina = "3213";
            self.form_salta.volumenes_de_extraccion_periodo_anterior = "233";
            self.form_salta.n_resolucion_iia = "312312";
            self.form_salta.etapa_de_exploracion = "123123";
            self.form_salta.n_resolucion_aprobacion_informe = "4124";
            self.form_salta.etapa_de_exploracion_avanzada = "re avanzada";
            self.form_salta.volumenes_anuales_de_materias_primas = "232323";
            self.form_salta.material_obtenido = "123123";
            self.form_salta.autorizacion_extractivas_exploratorias = "12312";
            self.form_salta.responsable_nombre = "Diego";
            self.form_salta.responsable_apellido = "Checcarelli";
            self.form_salta.responsable_dni = "31231231";
            self.form_salta.responsable_titulo = "Licenciado";
            self.form_salta.responsable_matricula = "23123";
            self.form_salta.ley_24196_numero = "";
            self.form_salta.ley_24196_inscripcion_renar = "";
            self.form_salta.ley_24196_explosivos = "";
            self.form_salta.ley_24196_propiedad = "";
            self.form_salta.estado_contable = "aprobado";
            self.form_salta.listado_de_maquinaria = "";
            self.form_salta.regalias = "";
            self.form_salta.personas_afectadas = "";
            self.form_salta.multas = "";
            self.form_salta.created_by = "";
            self.form_salta.updated_by = "";
            //visual
            self.form_salta.ley_checkbox = "false";
  
            //voy a buscar los permisos
            /*axios
              .get("/formulario_salta/traer_permisos_pagina_salta/0/crear")
              .then(function (response) {
                if (response.data.status === "ok") {
                  self.permisos_mostrar = response.data.mostrar;
                  // console.log(self.permisos_mostrar);
                  self.permisos_disables = response.data.disables;
                } else console.log("error al buscar permisos: " + response.data.msg);
              })
              .catch(function (error) {
                console.log(error);
              });
            */
  
              //empresas controlantes

              self.disable_input = false;
              
          } 
          if (this.$props.accion === "editar") {
            //estoy por editar
            //voy a BUSCAR LOS DATOS DEL FORMULARIO
            console.log("just before call get_form de salta");
            this.get_form();
            setTimeout(function(){
                console.log("Executed after 1 second");
                self.get_empresas();
              }, 2000);

              self.disable_input = false;
          }
        }
      }
    });
  },
};
</script>