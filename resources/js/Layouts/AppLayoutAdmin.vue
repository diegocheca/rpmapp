<template>
  <div class="flex min-h-screen bg-gray-200">
    <div
      class="
        flex
        antialiased
        text-gray-900
        bg-gray-100
      "
    >
      <div v-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-80">
        <div
          class="
            fixed
            z-30
            inset-y-0
            left-0
            w-64
            transform
            bg-gray-900
            overflow-y-auto
            lg:static lg:inset-0
            ease-in
          "
        >
          <!-- Close btn -->
          <div class="flex justify-end mt-1 mr-1">
            <button
              @click="isSidebarOpen = false"
              class="text-gray-400 focus:outline-block hover:text-gray-100"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div class="flex items-center justify-center">
            <div class="flex items-center">
              <span class="text-white text-2xl mx-2 font-semibold"
                >Configuración</span
              >
            </div>
          </div>
          <tarjetaPresentacion
            :clase_sup="'mt-8'"
            :clase_inf="'text-gray-400'"
            :logoSrc="$page.props.user.profile_photo_url"
            :logoAlt="$page.props.user.name"
            :titulo="$page.props.user.name"
            :subtitulo="$page.props.user.provincia"
            :ClaroOscuro="'oscuro'"
          ></tarjetaPresentacion>
          <nav class="mt-10">
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('dashboard')"
              v-on:click="activetab = 'Home'"
              v-bind:class="[
                activetab === 'Home'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
              <!-- <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                            />
                        </svg> -->
              <span class="mx-3">Inicio</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['admin.users.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.users.index')"
              v-on:click="activetab = 'Usuarios'"
              v-bind:class="[
                activetab === 'Usuarios'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                />
              </svg>
              <span class="mx-3">Usuarios</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['admin.roles.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.roles.index')"
              v-on:click="activetab = 'Roles'"
              v-bind:class="[
                activetab === 'Roles'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              <span class="mx-3">Roles</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['admin.permisos.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.permisos.index')"
              v-on:click="activetab = 'Permisos'"
              v-bind:class="[
                activetab === 'Permisos'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
                  d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
                />
              </svg>
              <span class="mx-3">Permisos</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['admin.categorias.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.categorias.index')"
              v-on:click="activetab = 'Categorias'"
              v-bind:class="[
                activetab === 'Categorias'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
                  d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
                />
              </svg>
              <span class="mx-3">Categorias</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.vistaImport')"
              v-on:click="activetab = 'Importar'"
              v-bind:class="[
                activetab === 'Importar'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
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
                  d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"
                />
              </svg>
              <span class="mx-3">Importar</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.permisos_nuevos.index')"
              v-on:click="activetab = 'PermisosForm'"
              v-bind:class="[
                activetab === 'PermisosForm'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
              <span class="mx-3">Permisos Form</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.formulario_faker.index')"
              v-on:click="activetab = 'FakerFormAlta'"
              v-bind:class="[
                activetab === 'FakerFormAlta'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>
              <span class="mx-3">Faker Form Alt</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.reinscripcion_faker.index')"
              v-on:click="activetab = 'FakerReinscripcion'"
              v-bind:class="[
                activetab === 'FakerReinscripcion'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>
              <span class="mx-3">Faker Reinscripcion</span>
            </inertia-link>
           

            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.mina_faker.index')"
              v-on:click="activetab = 'FakerMina'"
              v-bind:class="[
                activetab === 'FakerMina'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>
              <span class="mx-3">Faker Minas</span>
            </inertia-link>
             <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.user_faker.index')"
              v-on:click="activetab = 'FakerUser'"
              v-bind:class="[
                activetab === 'FakerUser'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>
              <span class="mx-3">Faker User</span>
            </inertia-link>

            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.apiJujuy')"
              v-on:click="activetab = 'ApiJujuy'"
              v-bind:class="[
                activetab === 'ApiJujuy'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
              <span class="mx-3">Api Jujuy</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.apiNacion')"
              v-on:click="activetab = 'ApiNacion'"
              v-bind:class="[
                activetab === 'ApiNacion'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z" />
              </svg>

              <span class="mx-3">Api Nacion</span>
            </inertia-link>
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.migrations')"
              v-on:click="activetab = 'Migrations'"
              v-bind:class="[
                activetab === 'Migrations'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z" />
            </svg>

              <span class="mx-3">Migrations</span>
            </inertia-link>

            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100
                border-l-4 border-transparent
                hover:border-indigo-500
              "
              :href="route('admin.logs')"
              v-on:click="activetab = 'Logs'"
              v-bind:class="[
                activetab === 'Logs'
                  ? 'active border-indigo-500 text-gray-100 bg-gray-700 bg-opacity-25 font-black'
                  : '',
              ]"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>


              <span class="mx-3">Logs</span>
            </inertia-link>


          </nav>
        </div>
      </div>
    </div>
    <div class="flex-1 flex flex-col overflow-hidden">
      <header
        class="
          flex
          justify-between
          items-center
          py-2
          px-6
          bg-gray-900
          border-b-4 border-gray-900
        "
      >
        <div class="flex items-center">
          <button
            @click="isSidebarOpen = true"
            class="text-gray-400 focus:outline-block hover:text-gray-100"
          >
            <svg
              class="w-6 h-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
        <div class="flex items-center">
          <div x-data="{ notificationOpen: false }" class="relative">
            <button
              @click="notificationOpen = !notificationOpen"
              class="flex mx-4 text-gray-600 focus:outline-none"
            >
              <svg
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></path>
              </svg>
            </button>
            <div
              x-show="notificationOpen"
              @click="notificationOpen = false"
              class="fixed inset-0 h-full w-full z-10"
              style="display: none"
            ></div>
          </div>

          <div x-data="{ dropdownOpen: false }" class="relative">
            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
              <jet-dropdown align="right" width="48">
                <template #trigger>
                  <button
                    v-if="$page.props.jetstream.managesProfilePhotos"
                    class="
                      flex
                      text-sm
                      border-2 border-transparent
                      rounded-full
                      focus:outline-none focus:border-gray-300
                      transition
                    "
                  >
                    <img
                      class="h-8 w-8 rounded-full object-cover"
                      :src="$page.props.user.profile_photo_url"
                      :alt="$page.props.user.name"
                    />
                    <span
                      class="
                        font-mono font-semibold
                        uppercase
                        ml-4
                        bg-blue-500
                        text-white text-base
                        tracking-wider
                        p-2
                        rounded-xl
                        leading-none
                        flex
                        items-center
                      "
                    >
                      {{ $page.props.user.provincia }}
                    </span>
                  </button>
                  <span v-else class="inline-flex rounded-md">
                    <button
                      type="button"
                      class="
                        inline-flex
                        items-center
                        px-3
                        py-2
                        border border-transparent
                        text-sm
                        leading-4
                        font-medium
                        rounded-md
                        text-gray-500
                        bg-gray-900
                        hover:text-gray-100
                        focus:outline-none
                        transition
                      "
                    >
                      {{ $page.props.user.name }}

                      <svg
                        class="ml-2 -mr-0.5 h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </span>
                </template>
                <template #content>
                  <!-- Administración de cuentas -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    Administrar Cuenta
                  </div>

                  <jet-dropdown-link :href="route('profile.show')">
                    Perfil de Usuario
                  </jet-dropdown-link>
                  <jet-dropdown-link :href="route('admin.users.index')">
                    Configuración
                  </jet-dropdown-link>

                  <jet-dropdown-link
                    :href="route('api-tokens.index')"
                    v-if="$page.props.jetstream.hasApiFeatures"
                  >
                    API Tokens
                  </jet-dropdown-link>

                  <div class="border-t border-gray-100"></div>

                  <!-- Authentication -->
                  <form @submit.prevent="logout">
                    <jet-dropdown-link as="button"> Salir </jet-dropdown-link>
                  </form>
                </template>
              </jet-dropdown>
            </div>
          </div>
        </div>
      </header>
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <slot></slot>
      </main>
    </div>
  </div>
</template>
<script>
import tarjetaPresentacion from "@/Components/TarjetaPresentacion";
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    JetAuthenticationCardLogo,
    tarjetaPresentacion,
  },

  data() {
    return {
      isSidebarOpen: false,
      showingNavigationDropdown: false,
      activetab: "",
    };
  },

  methods: {
    // switchToTeam(team) {
    //     this.$inertia.put(
    //         route("current-team.update"),
    //         {
    //             team_id: team.id,
    //         },
    //         {
    //             preserveState: false,
    //         }
    //     );
    // },

    logout() {
      //this.$inertia.post(route("logout"))
      axios
        .post(route("logout"))
        .then(function (response) {
          window.location.replace("/");
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>