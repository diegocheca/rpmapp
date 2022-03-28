<template>
  <div>
    <jet-banner />

    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="flex-shrink-0 flex items-center">
                <!-- <jet-authentication-card-logo /> -->
                <JetApplicationLogo />
              </div>
              <!-- Navigation Links -->
              <div
                class="
                  hidden
                  space-x-8
                  sm:-my-px sm:ml-10 sm:flex
                "
              >
                <jet-nav-link
                  href="#home"
                  :active="route().current('dashboard')"
                >
                  Incio
                </jet-nav-link>
                <jet-nav-link
                  href="#services"
                  :active="route().current('dashboard')"
                >
                  Datos
                </jet-nav-link>
                <jet-nav-link
                  href="#features"
                  :active="route().current('dashboard')"
                >
                  Funciones
                </jet-nav-link>
                <jet-nav-link
                  href="#team"
                  :active="route().current('dashboard')"
                >
                  Oficinas
                </jet-nav-link>
                <jet-nav-link
                  href="#contact"
                  :active="route().current('dashboard')"
                >
                  Contacto
                </jet-nav-link>
                <jet-nav-link
                  :href="route('login')"
                  :active="route().current('login')"
                >
                  Ingresar
                </jet-nav-link>
                <jet-nav-link
                  :href="route('register')"
                  :active="route().current('register')"
                >
                  Registrarte
                </jet-nav-link>
              </div>
              <!-- <div class="fixed top-0 right-0 px-6 py-4 grid grid-cols-2"></div> -->
            </div>
          </div>
        </div>
      </nav>
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
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo2";
export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    JetApplicationLogo,
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
