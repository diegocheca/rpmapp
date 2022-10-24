<template>
  <div>


    <h1>SOY SALTA</h1>
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
            <select v-model="form_salta.tipo">
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
              :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                v-model="form_salta.representante_legal_nacionalidad"
                :disabled="false"
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
                v-model="form_salta.representante_legal_telefono"
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
                :disabled="false"
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
              >Nombre Responsable</label
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
                :disabled="false"
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
              >Apellido Responsable</label
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
                :disabled="false"
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
              >Dni del Responsable</label
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
                :disabled="false"
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
              >Titulo del Responsable</label
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
                :disabled="false"
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
              >Matricula del Responsable</label
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
                :disabled="false"
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
              >Numero de ley 24196</label
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
                :disabled="false"
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
                  En caos de no aplica la ley 24196 dejar los campos vacios
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
              >Inscripcion ante el Renar (ley_24196):</label
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
                :disabled="false"
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
                :disabled="false"
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
                  En esta campo se debe indicar si usan explosivos, o no usan explosivos o servicios de voladuras en general.
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
              >Propiedad: (ley 24196)</label
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
                :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
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
                        :disabled="false"
                      />
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
                        :disabled="false"
                      />
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
                        :disabled="false"
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
                        :disabled="false"
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
    
    {{empresas}}













    










    










    






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
        {{form_salta}}

        <div class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center">
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
          @click="guardar_form"
        >
          {{ titulo_boton_guardar }}
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
    "testing",
    "id",
    "editar",
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
    
    guardar_form(v) {
     /*  axios
            .post("/formulario_salta/guardar_alta/", {
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
            }); */
        //empresas
        axios
            .post("/formulario_salta/guardar_empresas/", {
              id_formulario_alta_salta : 2,
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


  },
  mounted() {
    let self = this;
    this.$nextTick(() => {
      // console.log("por buscar los datos de mendoza desde el hijo \n\n\n");
      // console.log("\n\n\n mi id es : " + this.$props.id + " \n\n\n");
      console.log("inicio de salta");

      if (this.$inertia.page.props.user.id_provincia === 66) {
        
        if (this.$props.editar === false || this.$props.editar === "false") {
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

          //voy a buscar los permisos
          axios
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


            //empresas controlantes
            
        } else {
          //estoy por editar
          //voy a BUSCAR LOS DATOS DEL FORMULARIO
          axios
            .post(
              "/formulario_salta/buscar_formulario",  {id: this.$props.id}
            )
            .then(function (response) {
              // console.log(response.datos);
              if (response.data.status === "ok") {
                self.form_salta = response.data.datos;
                //self.form_salta.obs_datos_minas =
                //  response.data.datos.obs_datos_minas; //arreglar esto
              } else console.log("error al buscar datos: " + response.data.msg);
            })
            .catch(function (error) {
              console.log(error);
            });
          // console.log("voy por los permisos");
          //voy a buscar los permisos
          /*
          axios
            .get(
              "/formularios/traer_permisos_pagina_mendoza" +
                "/" +
                parseInt(this.$props.id) +
                "/editar"
            )
            .then(function (response) {
              // console.log(response.data.disables);
              // console.log(response.data.mostrar);
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
