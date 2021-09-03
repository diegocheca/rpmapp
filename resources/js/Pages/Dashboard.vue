<template>
  <div>
    <DashboardAdmin v-if="userType == 'admin'" :dataChart="dataChart" />
    <DashboardProductor v-if="userType == 'productor'" />

    <div
      v-if="userType != 'admin' || userType != 'productor' || !userType"
      class="p-8 h-screen items-center"
    >
      <img
        :src="$inertia.page.props.appName + '/svg/not-dashboard.svg'"
        alt=""
        class="mx-auto"
      />
      <div
        class="
          text-3xl
          font-bold
          absolute
          inset-0
          flex
          items-center
          justify-center
        "
      >
        No posees un rol permitido.
        <br />
        Comunicate con algún administrador.
      </div>
      <div class="flex justify-center">
          <form @submit.prevent="logout">
                      <jet-dropdown-link as="button" class="absolute
            bottom-20
            flex
            justify-center
            bg-blue-500
            hover:bg-blue-800
            rounded
            text-white
            px-9
            py-3"> Salir </jet-dropdown-link>
                    </form>

        <!-- <button
          type="button"
          as="button"
          class="
            absolute
            bottom-20
            flex
            justify-center
            bg-blue-500
            hover:bg-blue-800
            rounded
            text-white
            px-9
            py-3
          "
          @click="logout()"
        >
          Salir
        </button> -->
      </div>
    </div>
  </div>
</template>
<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import ChartPie from "@/Components/charts/pie";
import ChartBar from "@/Components/charts/bar";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";

import JetNavLink from "@/Jetstream/NavLink";
import DashboardAdmin from "@/Components/dashboards/DashboardAdmin";
import DashboardProductor from "@/Components/dashboards/DashboardProductor";


export default {
  components: {
    DashboardAdmin,
    DashboardProductor,
    JetNavLink,
  },
  props: {
    userType: {
      required: true,
      default: "admin",
    },
    dataChart: {
      required: true,
    },
  },
  data() {
    return {
      autoridad_minera: false,
    };
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
