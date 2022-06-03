<!-- in injector component -->
<script setup>
import { inject } from 'vue'

const { location, updateLocation } = inject('location')

</script>

<template>
    <button @click="updateLocation">{{ location }}</button>
    <input v-model="location"  type="text" id="algo" name="algo"/>
</template>