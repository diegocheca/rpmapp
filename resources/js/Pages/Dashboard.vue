<template>
  <div>
      <DashboardAdmin v-if="userType == 'admin'" />
      <DashboardProductor v-if="userType == 'productor'" />
  </div>
</template>
<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import ChartPie from '@/Components/charts/pie'
    import ChartBar from '@/Components/charts/bar'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'

    import DashboardAdmin from '@/Components/dashboards/DashboardAdmin'
    import DashboardProductor from '@/Components/dashboards/DashboardProductor'

    export default {
        components: {
            DashboardAdmin,
            DashboardProductor
        },
        props: {
            userType: {
                required: true,
                default: 'admin'
            }

        },
        data() {
            return {
                autoridad_minera: false,
            };
        }
    }
</script>
