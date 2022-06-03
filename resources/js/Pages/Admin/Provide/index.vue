<template>
    <div class="home">
        <h1>Soy Index</h1>
        <indexhijo></indexhijo>
    </div>
</template>
<!-- inside provider component -->
<script setup>
    import indexhijo from '@/Pages/Admin/Provide/index_hijo.vue'
    import { provide, ref } from 'vue'


    const location = ref('North Pole')

    function updateLocation() {
        location.value = 'South Pole'
    }

    provide('location', {
        location,
        updateLocation
    })
</script>