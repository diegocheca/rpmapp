<template>
  <div class="flex h-screen bg-gray-200">
    <div
      class="
        flex
        antialiased
        text-gray-900
        bg-gray-100
        dark:bg-dark
        dark:text-light
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
            bg-gradient-to-t
            from-gray-900
            via-blue-900
            to-gray-900
            overflow-y-auto
            shadow-xl
            lg:static
            lg:inset-0
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
                >Formulario Web</span
              >
            </div>
          </div>
          <nav class="mt-10">
            <inertia-link
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-200
                hover:text-white
                hover:bg-gradient-to-t
                hover:from-blue-900
                hover:via-gray-900
                hover:to-blue-800
                hover:bg-opacity-25
                border-l-4 border-transparent
                hover:border-indigo-900
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
              <span class="mx-3">Inicio</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['formweb.solicitudes.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-200
                hover:text-white
                hover:bg-gradient-to-t 
                hover:from-gray-900
                hover:via-blue-900
                hover:to-blue-700
                hover:bg-opacity-25
                border-l-4 border-transparent
                hover:border-indigo-900
              "
              :href="route('formweb.solicitudes.index')"
              v-on:click="activetab = 'Nueva Solicitud'"
              v-bind:class="[
                activetab === 'Nueva Solicitud'
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
              <span class="mx-3">Nueva Solicitud</span>
            </inertia-link>
            <inertia-link
              v-if="hasAnyPermission(['formweb.solicitudes.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-200
                hover:text-white
                hover:bg-gradient-to-l
                hover:from-blue-800
                hover:via-gray-900
                hover:to-blue-800
                hover:bg-opacity-25
                border-l-4 border-transparent
                hover:border-indigo-900
              "
              :href="route('formweb.solicitudes.index')"
              v-on:click="activetab = 'Lista de Solicitudes'"
              v-bind:class="[
                activetab === 'Lista de Solicitudes'
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
              <span class="mx-3">Lista de Solicitudes</span>
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
          bg-gradient-to-l
          from-gray-900
          via-blue-900
          to-gray-900
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
                      focus:outline-none
                      focus:border-gray-300
                      transition
                    "
                  >
                    <img
                      class="h-8 w-8 rounded-full object-cover"
                      :src="$page.props.user.profile_photo_url"
                      :alt="$page.props.user.name"
                    />
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
      <main class="flex-1 overflow-x-auto overflow-y-auto bg-gray-200">
        <slot></slot>
      </main>
    </div>
  </div>
</template>
<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
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