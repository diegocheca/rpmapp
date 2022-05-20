<template>
  <h3>Contador Dos: {{contador}}</h3>
</template>

<script>
import { inject } from 'vue'
export default {
    setup(){
        const contador = inject('contador')
        return {contador}
    }
}
</script>