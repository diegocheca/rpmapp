<template>
<app-layout>
    <!-- <form-wizard
        :builder="reinscripcion"
        :titleForm="titleForm"
        :evaluate="evaluate"
        :province="province"
        :buttomLabel="'Editar'"
        :dataForm="dataForm"
        @valuesForm="submit($event)"
        :dev="true"
    /> -->

    <div v-if="!evaluate" class="flex items-center bg-blue-100 border-blue-500 text-blue-700 text-sm font-bold px-4 py-3 rounded-md mx-10" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>De acuerdo a la legislación vigente toda la información suministrada está amaparada por el SECRETO ESTADÍSTICO.</p>
    </div>

    <dynamic-form
        :builder="reinscripcion"
        :titleForm="titleForm"
        :evaluate="evaluate"
        :province="province"
        :buttomLabel="titleBtnSave"
        :dataForm="dataForm"
        :action="action"
        :saveUrl="saveUrl"
        :saveFileUrl="saveFileUrl"
        @valuesForm="submit($event)"
        :dev="true"
    />

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DynamicForm from '../../Components/dynamic-form/DynamicForm.vue';
// import FormWizard from '../../Components/dynamic-form/FormWizard.vue';


export default {
    components: {
        AppLayout,
        DynamicForm,
        // FormWizard,
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
        reinscripcion: {
            require: true,
            type: Array,
        },
        revisionData: {
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
        titleBtnSave: {
            require: true,
            type: String
        },
        //
        provincia: {
            require: true,
            type: Array,
        },
    },
    data() {
        // console.log(this.$props.reinscripcion);
        const dataForm = {
            provincia: this.$props.provincia,
            revisionData: this.$props.revisionData
        }
        return {
            id: this.$props.reinscripcion.id,
            dataForm,
        }
    },
    methods: {
        async submit(form) {
            // console.log(form);
            // let response;
            // let formData = new FormData();

            // for ( var key in form ) {
            //     formData.append(key, form[key]);
            // }

            // try {
            //     if(this.$props.action == "create") {
            //         response = await axios.post(this.$props.saveFileUrl, formData);



            //         this.$inertia.post(route(this.$props.saveUrl), formData);
            //     } else if(this.$props.action == "update") {
            //         response = await axios.put(this.$props.saveUrl, {
            //             params: {
            //                 id: this.$props.reinscripcion.id
            //                 }
            //             }
            //         )
            //     }
            // } catch (error) {

            // }


            // if(this.$props.action == "create") {
            //     // this.$inertia.post(
            //     //     route("reinscripciones.update", this.id),
            //     //     form
            //     // );

            // } else if(this.$props.action == "update") {
            //     // this.$inertia.put(
            //     //     route("reinscripciones.update", this.id),
            //     //     form
            //     // );

            // }

        },
    },

}
</script>
