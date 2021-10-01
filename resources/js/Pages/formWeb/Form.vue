<template>
    <app-layout>
        <form-wizard
            :titleForm="titleForm"
            :evaluate="evaluate"
            :province="province"
            :buttomLabel="'Finalizar'"
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
        :action="action"
        :saveUrl="saveUrl"
        :saveFileUrl="saveFileUrl"
        @valuesForm="submit($event)"
        :dev="false"
    /> -->
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayoutFormWeb";
// import DynamicForm from '../../Components/dynamic-form/DynamicForm.vue';
// import FormWizard from '../../Components/dynamic-form/FormWizard.vue';
import FormWizard from "./componentes/FormWizard.vue";
//import FormWizard from './componentes/FormWizard2.vue';

export default {
    components: {
        AppLayout,
        // DynamicForm,
        FormWizard,
    },
    props: {
        // Obligatorios
        action: {
            require: true,
            type: String,
        },
        saveUrl: {
            require: true,
            type: String,
        },
        saveFileUrl: {
            require: true,
            type: String,
        },
        province: {
            require: true,
            type: String,
        },
        tipo_documento: {
            require: true,
            type: Array,
        },

        // estado_solicitud: {
        //     require: true,
        //     type: Array,
        // },

        mineral: {
            require: true,
            type: Array,
        },
        estado_terreno: {
            require: true,
            type: Array,
        },
        titleForm: {
            require: true,
            type: String,
        },
        evaluate: {
            require: true,
            type: Boolean,
        },        
        provincia: {
            require: true,
            type: Array,
        },
    },
    data() {
        const dataForm = {
            provincia: this.$props.provincia,
            tipo_documento: this.$props.tipo_documento,
            mineral: this.$props.mineral,
            estado_terreno: this.$props.estado_terreno,
            // estado_solicitud: this.$props.estado_solicitud,
        };
        return {            
            dataForm,
        };
    },
     methods: {
            async submit(form) {
        //  console.log(form);
        // funcion que pega a una una ruta de la api
        // la cual envia los datos a sigetrami.
        var status = 200;
        if (status == 200) {
            estado = "enviado"; //pendiente de aprobación
        } else [(estado = "pendiente")];
        },
        // function enviosigetrami (form){ axion ......}
        },
    };
</script>
