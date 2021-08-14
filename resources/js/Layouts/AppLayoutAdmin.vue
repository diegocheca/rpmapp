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
            bg-gray-900
            overflow-y-auto
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
              <svg
                class="h-12 w-12"
                viewBox="0 0 512 512"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                  fill="#4C51BF"
                  stroke="#4C51BF"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></path>
                <path
                  d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                  fill="white"
                ></path>
              </svg>
              <span class="text-white text-2xl mx-2 font-semibold"
                >Configuración</span
              >
            </div>
          </div>
          <nav class="mt-10">
            <a
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25
                hover:text-gray-100
              "
              :href="route('dashboard')"
              :active="route().current('dashboard')"
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
              <span class="mx-3">Home</span>
            </a>
            <a
              v-if="hasAnyPermission(['admin.users.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25
                hover:text-gray-100
              "
              :href="route('admin.users.index')"
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
            </a>
            <a
              v-if="hasAnyPermission(['admin.roles.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25
                hover:text-gray-100
              "
              :href="route('admin.roles.index')"
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
            </a>
            <a
              v-if="hasAnyPermission(['admin.permisos.index'])"
              class="
                flex
                items-center
                mt-4
                py-2
                px-6
                text-gray-500
                hover:bg-gray-700 hover:bg-opacity-25
                hover:text-gray-100
              "
              :href="route('admin.permisos.index')"
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
            </a>
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
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    Manage Account
                  </div>

                  <jet-dropdown-link :href="route('profile.show')">
                    Profile
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
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
