<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Mostrar></Mostrar>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import Mostrar from "./componentes/wizard.vue";
export default {
    components: {
        Mostrar,
    },
    props: {
        errors: Object,
    },
};
</script>
