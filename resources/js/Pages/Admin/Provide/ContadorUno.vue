<template>
  <h2>Contador: {{contadorUno}}</h2>
</template>

<script>
import { inject } from 'vue'
export default {
    setup(){
        const contadorUno = inject("contador")
        return {contadorUno}
    }
}
</script>