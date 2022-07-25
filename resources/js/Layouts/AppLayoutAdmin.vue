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