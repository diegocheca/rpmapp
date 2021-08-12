<template>
  <div>
      <DashboardAdmin v-if="userType == 'admin'" />
      <DashboardProductor v-if="userType == 'productor'" />
  </div>
</template>
<script>
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
        }
    }
</script>
