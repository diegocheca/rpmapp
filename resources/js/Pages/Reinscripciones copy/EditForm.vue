<template>
<app-layout>
    <form-wizard
        :builder="reinscripcion"
        :titleForm="titleForm"
        :evaluate="evaluate"
        :province="province"
        :buttomLabel="'Editar'"
        :dataForm="dataForm"
        @valuesForm="submit($event)"
        :dev="true"
    />
    <!-- <dynamic-form
        :builder="reinscripcion"
        :titleForm="titleForm"
        :evaluate="evaluate"
        :province="province"
        :buttomLabel="'Editar'"
        :dataForm="dataForm"
        @valuesForm="submit($event)"
        :dev="true"
    /> -->

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
// import DynamicForm from '../../Components/dynamic-form/DynamicForm-validacion-funcionando.vue';
// import DynamicForm from '../../Components/dynamic-form/DynamicForm.vue';
import FormWizard from '../../Components/dynamic-form/FormWizard.vue';
import asd from '../../Components/dynamic-form/asd.vue';


export default {
    components: {
        AppLayout,
        // DynamicForm,
        FormWizard,
        asd
    },
    props: [
        "province",
        "reinscripcion",
        "titleForm",
        "evaluate",
        "provincia"
    ],
    data() {

        const dataForm = {
            provincia: this.$props.provincia
        }
        return {
            id: this.$props.reinscripcion.id,
            dataForm,
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
