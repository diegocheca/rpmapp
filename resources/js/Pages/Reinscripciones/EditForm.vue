<template>
<app-layout>
    <dynamic-form
        :builder="reinscripcion"
        :titleForm="titleForm"
        :evaluate="evaluate"
        :province="province"
        :buttomLabel="'Editar'"
        @valuesForm="submit($event)"
        :dev="true"
    />

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
// import DynamicForm from '../../Components/dynamic-form/DynamicForm-validacion-funcionando.vue';
import DynamicForm from '../../Components/dynamic-form/DynamicForm.vue';

export default {
    components: {
        AppLayout,
        DynamicForm
    },
    props: [
        "province",
        "reinscripcion",
        "titleForm",
        "evaluate"
    ],
    data() {


        return {
            id: this.$props.reinscripcion.id,
        }
    },
    methods: {
        submit(form) {
            console.log(form);
            // this.$inertia.put(
            //     route("reinscripciones.update", this.id),
            //     valuesForm
            // );

        },
    },

}
</script>
