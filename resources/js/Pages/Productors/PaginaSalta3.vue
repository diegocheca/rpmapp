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
<<<<<<< HEAD
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
=======
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
>>>>>>> 88cc969848cb3ff21fd21843e05e2c5c0f428ee4
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
<<<<<<< HEAD
    "editar",
    "lista_provincias",
    "lista_dptos"

=======
>>>>>>> 88cc969848cb3ff21fd21843e05e2c5c0f428ee4
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
<<<<<<< HEAD
            .post(
              "/formulario_salta/buscar_formulario",  {id: this.$props.id}
=======
            .get(
              "/formularios/traer_datos_pagina_salta" +
                "/" +
                parseInt(this.$props.id)
>>>>>>> 88cc969848cb3ff21fd21843e05e2c5c0f428ee4
            )
            .then(function (response) {
              if (response.data.status === "ok") {
<<<<<<< HEAD
                self.form_salta = response.data.datos;
                //self.form_salta.obs_datos_minas =
                //  response.data.datos.obs_datos_minas; //arreglar esto
=======
                self.form_salta_test = response.data.datos;
>>>>>>> 88cc969848cb3ff21fd21843e05e2c5c0f428ee4
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
