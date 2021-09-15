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
import AppLayout from "@/Layouts/AppLayout";
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

        estado_solicitud: {
            require: true,
            type: Array,
        },

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
            estado_solicitud: this.$props.estado_solicitud,
        };
        return {            
            dataForm,
        };
    },
     methods: {
         async submit(form) {    
             console.log(form);
            
    //         // let response;
    //         // let formData = new FormData();

    //         // for ( var key in form ) {
    //         //     formData.append(key, form[key]);
    //         // }

    //         // try {
    //         //     if(this.$props.action == "create") {
    //         //         response = await axios.post(this.$props.saveFileUrl, formData);

    //         //         this.$inertia.post(route(this.$props.saveUrl), formData);
    //         //     } else if(this.$props.action == "update") {
    //         //         response = await axios.put(this.$props.saveUrl, {
    //         //             params: {
    //         //                 id: this.$props.reinscripcion.id
    //         //                 }
    //         //             }
    //         //         )
    //         //     }
    //         // } catch (error) {

    //         // }

    //         // if(this.$props.action == "create") {
    //         //     // this.$inertia.post(
    //         //     //     route("reinscripciones.update", this.id),
    //         //     //     form
    //         //     // );

    //         // } else if(this.$props.action == "update") {
    //         //     // this.$inertia.put(
    //         //     //     route("reinscripciones.update", this.id),
    //         //     //     form
    //         //     // );

    //         // }
         },
    },
};
</script>
