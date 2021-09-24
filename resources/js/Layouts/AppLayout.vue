<template>
  <div>
    <jet-banner />
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <!-- <div class="flex-shrink-0 flex items-center">
                <inertia-link :href="route('dashboard')">
                  <jet-application-mark class="block h-9 w-auto" />
                </inertia-link>
              </div> -->

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.dashboard.show'])"
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                >
                  Dashboard
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.borradores.show'])"
                  :href="route('formulario-alta.index')"
                  :active="route().current('formulario-alta.index')"
                >
                  Borradores
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.pagos.show'])"
                  :href="route('pagos.index')"
                  :active="route().current('pagos.index')"
                >
                  Pagos
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.reinscripciones.show'])"
                  :href="route('reinscripciones.index')"
                  :active="route().current('reinscripciones.index')"
                >
                  Reinscripciones
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.producto.show'])"
                  :href="route('productos.index')"
                  :active="route().current('productos.index')"
                >
                  Producto
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.iiasydias.show'])"
                  :href="route('iiadias.index')"
                  :active="route().current('iiadias.index')"
                >
                  IIASyDIAS
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.prodmina.show'])"
                  :href="route('productores_minas.index')"
                  :active="route().current('productores_minas.index')"
                >
                  ProdMina
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['rpm.productores.show'])"
                  :href="route('productores.index')"
                  :active="route().current('productores.index')"
                >
                  Productores
                </jet-nav-link>
                <jet-nav-link
                  v-if="hasAnyPermission(['formweb.formulariosweb.show'])"
                  :href="route('formweb.solicitudes.index')"
                  :active="route().current('formweb.solicitudes.index')"
                >
                  Formularios WEB
                </jet-nav-link>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <div
                class="ml-3 relative"
                v-if="hasAnyPermission(['teams.create'])"
              >
                <!-- Teams Dropdown -->
                <jet-dropdown
                  align="right"
                  width="60"
                  v-if="$page.props.jetstream.hasTeamFeatures"
                >
                  <template #trigger>
                    <span class="inline-flex rounded-md">
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
                          bg-white
                          hover:bg-gray-50
                          hover:text-gray-700
                          focus:outline-none
                          focus:bg-gray-50
                          active:bg-gray-50
                          transition
                        "
                      >
                        {{ $page.props.user.current_team.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <div class="w-60">
                      <!-- Team Management -->
                      <template v-if="$page.props.jetstream.hasTeamFeatures">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                          Manage Team
                        </div>

                        <!-- Team Settings -->
                        <jet-dropdown-link
                          :href="
                            route('teams.show', $page.props.user.current_team)
                          "
                        >
                          Team Settings
                        </jet-dropdown-link>

                        <jet-dropdown-link
                          :href="route('teams.create')"
                          v-if="$page.props.jetstream.canCreateTeams"
                        >
                          Create New Team
                        </jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                          Switch Teams
                        </div>

                        <template
                          v-for="team in $page.props.user.all_teams"
                          :key="team.id"
                        >
                          <form @submit.prevent="switchToTeam(team)">
                            <jet-dropdown-link as="button">
                              <div class="flex items-center">
                                <svg
                                  v-if="
                                    team.id == $page.props.user.current_team_id
                                  "
                                  class="mr-2 h-5 w-5 text-green-400"
                                  fill="none"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  stroke="currentColor"
                                  viewBox="0 0 24 24"
                                >
                                  <path
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                  ></path>
                                </svg>
                                <div>
                                  {{ team.name }}
                                </div>
                              </div>
                            </jet-dropdown-link>
                          </form>
                        </template>
                      </template>
                    </div>
                  </template>
                </jet-dropdown>
              </div>

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
                          bg-white
                          hover:text-gray-700
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
                    <jet-dropdown-link
                      v-if="hasAnyPermission(['admin.users.index'])"
                      :href="route('admin.users.index')"
                    >
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
        </div>
      </nav>
      <!-- Page Content -->
      <main>
        <div
          class="
            min-h-screen
            flex flex-col flex-auto flex-shrink-0
            antialiased
            bg-gray-50
            text-gray-800
          "
        >
          <slot></slot>
        </div>
      </main>
    </div>
  </div>
  <!-- menu curvo-->
  <div class="flex bg-gray-200">
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
      <transition name="slide-fade">
        <!-- Sidebar -->
        <div v-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-80">
          <!-- Curvy shape -->
          <svg
            class="absolute inset-0 w-full h-full text-white"
            style="filter: drop-shadow(10px 0 10px #00000030)"
            preserveAspectRatio="none"
            viewBox="0 0 309 800"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M268.487 0H0V800H247.32C207.957 725 207.975 492.294 268.487 367.647C329 243 314.906 53.4314 268.487 0Z"
            />
          </svg>
          <!-- Sidebar content -->
          <div class="z-10 flex flex-col flex-1">
            <div
              class="flex items-center justify-between flex-shrink-0 w-64 p-4"
            >
              <!-- Logo -->
              <jet-authentication-card-logo />
              <!-- Close btn -->
              <button
                @click="isSidebarOpen = false"
                class="p-1 rounded-lg focus:outline-none focus:ring"
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
                <span class="sr-only">Close sidebar</span>
              </button>
            </div>
            <nav class="flex flex-col flex-1 w-64 p-4 mt-4">
              <a
                v-if="hasAnyPermission(['rpm.dashboard.show'])"
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  />
                </svg>
                <span>Inicio (Dashboard)</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.borradores.show'])"
                :href="route('formulario-alta.index')"
                :active="route().current('formulario-alta.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                  />
                </svg>
                <span>Borradores</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.pagos.show'])"
                :href="route('pagos.index')"
                :active="route().current('pagos.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  ></path>
                </svg>
                <span>Pagos</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.reinscripciones.show'])"
                :href="route('reinscripciones.index')"
                :active="route().current('reinscripciones.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  />
                </svg>
                <span>Reinscripciones</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.producto.show'])"
                :href="route('productos.index')"
                :active="route().current('productos.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"
                  />
                  <path
                    d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"
                  />
                </svg>
                <span>Producto</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.iiasydias.show'])"
                :href="route('iiadias.index')"
                :active="route().current('iiadias.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"
                  />
                  <path
                    d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"
                  />
                </svg>
                <span>IIASyDIAS</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.prodmina.show'])"
                :href="route('productores_minas.index')"
                :active="route().current('productores_minas.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"
                  />
                </svg>
                <span>ProdMina</span>
              </a>
              <a
                v-if="hasAnyPermission(['rpm.productores.show'])"
                :href="route('productores.index')"
                :active="route().current('productores.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    fill-rule="evenodd"
                    d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7H1.102z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M6 1a2.498 2.498 0 0 1 4 0c.818 0 1.545.394 2 1 .67 0 1.552.57 2 1h-2c-.314 0-.611-.15-.8-.4-.274-.365-.71-.6-1.2-.6-.314 0-.611-.15-.8-.4a1.497 1.497 0 0 0-2.4 0c-.189.25-.486.4-.8.4-.507 0-.955.251-1.228.638-.09.13-.194.25-.308.362H3c.13-.147.401-.432.562-.545a1.63 1.63 0 0 0 .393-.393A2.498 2.498 0 0 1 6 1z"
                  />
                </svg>
                <span>Productores</span>
              </a>
              <a
                v-if="hasAnyPermission(['formweb.formulariosweb.show'])"
                :href="route('formweb.solicitudes.index')"
                :active="route().current('formweb.solicitudes.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  hover:bg-gray-50
                  text-gray-600
                  hover:text-gray-800
                  border-l-4 border-transparent
                  hover:border-indigo-500
                  pr-6
                "
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
                    fill-rule="evenodd"
                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"
                  />
                  <path
                    d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"
                  />
                </svg>
                <span>Formularios WEB</span>
              </a>
            </nav>
            <div class="flex-shrink-0 p-4">
              <a
                v-if="hasAnyPermission(['admin.users.index'])"
                :href="route('admin.users.index')"
                class="
                  relative
                  flex flex-row
                  items-center
                  h-11
                  focus:outline-none
                  text-gray-600
                  hover:text-gray-800
                  pr-6
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
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
                  />
                </svg>
                <span>Configuración</span>
              </a>
              <!-- Authentication -->
              <form @submit.prevent="logout">
                <button class="flex items-center space-x-2">
                  <svg
                    aria-hidden="true"
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
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    />
                  </svg>
                  <span>Salir</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </transition>
      <!-- Page content -->
      <button
        @click="isSidebarOpen = true"
        class="
          animate-pulse
          fixed
          p-2
          text-white
          bg-black
          rounded-lg
          top-5
          left-5
        "
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
        <span class="sr-only">Open menu</span>
      </button>
    </div>
  </div>
  <!-- fin menu curvo-->
</template>

<script>
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
  },
  data() {
    return {
      isSidebarOpen: false,
      showingNavigationDropdown: false,
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
      axios.post(route("logout")).then(function (response) {
        window.location.replace("http://localhost:8000/");
      }).catch(function (error) {
        console.log(error);
      });
    },
  },
};
</script>
<style scoped>
.slide-fade-enter-active {
  transition: all 0.8s ease;
}
.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
