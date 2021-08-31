<template>
<div>

    <div class="block w-full text-center text-grey-darkest text-2xl p-10">
        {{ titleForm }}
    </div>

    <div class="flex">
        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="w-10 h-10 mx-auto bg-blue-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                        <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Select Server</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-blue-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-blue-500 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-white w-full">
                        <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui" d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Add User</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-blue-300 py-1 rounded" style="width: 33%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-gray-600 w-full">
                        <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Setting</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-blue-300 py-1 rounded" style="width: 0%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="text-center text-gray-600 w-full">
                        <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Finished</div>
        </div>
    </div>

    <Form @submit="onSubmit" :validation-schema="currentSchema" v-slot="{ values, errors }">

        <template v-if="currentStep === 0">
            <DynamicInputs :formSchema="formSchema" />
        </template>
        <!-- <div  class="flex justify-center pt-9">
                <button type="submit" class=" bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" >{{buttomLabel}}</button>
            </div> -->

        <!-- <inertia-link :href="route('reinscripciones.index')" class="w-20 text-center py-2 mb-4 text-sm font-medium rounded-full block border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
                Volver
            </inertia-link> -->

        <button v-if="currentStep !== 0" type="button" @click="prevStep">
            Previous
        </button>

        <button v-if="currentStep !== 3" type="submit">Next</button>

        <button v-if="currentStep === 3" type="submit">Finish</button>

        <template v-if="dev">
            <div class="mt-6 bg-clip-border p-6 bg-indigo-600 border-4 border-indigo-300 border-dashed text-white">
                <h3>ERRORS:</h3>
                <pre>
                {{errors}}
                </pre>
            </div>

        </template>

        <template v-if="dev">
            <div class="mt-6 bg-clip-border p-6 bg-indigo-600 border-4 border-indigo-300 border-dashed text-white">
                <h3>VALUES:</h3>
                <pre>
                {{values}}
                </pre>
            </div>

        </template>
    </Form>
</div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

import { createYupSchema } from '../../../../helpers/formularios/default/yupSchemaCreator';
import DragAndDropFile from "./DragAndDropFile.vue";
import { Form, Field, ErrorMessage } from 'vee-validate';
import inputsTypes from '../../../../helpers/enums/inputsTypes';
import VueMultiselect from 'vue-multiselect'
import * as yup from "yup";
import { ref, reactive, computed } from "vue";
// import {FormBuilder} from '../../../../helpers/formularios/sanjuan/reinscripciones';

export default {
    components: {
        AppLayout,
        Form,
        Field,
        ErrorMessage,
        VueMultiselect,
        DragAndDropFile,
    },
    props: {
        builder: {
            require: true
        },
        province: {
            require: true,
            type: String,
        },
        // schema: {
        //     require: true
        // },
        titleForm: {
            require: true,
            type: String,
        },
        evaluate: {
            require: true,
            type: Boolean,
        },
        dev: {
            require: false,
            type: Boolean,
            default: false
        },
        buttomLabel: {
            require: false,
            type: String,
            default: 'Guardar'
        },
        dataForm: {
            require: false,
            type: Array
        }
    },
    emits: [
        'valuesForm'
    ],
    data() {
        const currentStep = 0;
        const formValues = {};

        return {
            title: this.$props.titleForm,
            inputsTypes: inputsTypes,
            formSchema: [],
            currentStep,
            formValues,
            // validateSchema: yup.object().shape({}),
            validateSchema: {},
            yepSchema: [],
        };
    },
    setup: async (props) => {
        const currentStep = ref(0);
        const formValues = reactive({});

        const dataProvince = await import(`../../../../helpers/formularios/${props.province}`)
        const formSchema = dataProvince.getFormSchema(props.builder, props.evaluate, props.dataForm);

        // let yepSchemas = [];
        // for (let index = 0; index < formSchema.length; index++) {
        //     yepSchemas.push([formSchema[index]].reduce(createYupSchema, {}, props.evaluate));

        // }

        const yepSchema = formSchema.reduce(createYupSchema, {}, props.evaluate);

        const validateSchema = yup.object().shape(yepSchema);

        console.log(props.titleForm)
        // const validateSchema = yup.object().shape(yepSchema);

        // const schemas = [
        //     yup.object({
        //         name: yup.string().required(),
        //         email: yup.string().required().email(),
        //     }),
        //     yup.object({
        //         password: yup.string().required().min(6),
        //         confirmPassword: yup
        //         .string()
        //         .required()
        //         .min(6)
        //         .oneOf([yup.ref("password")], "Passwords must match"),
        //     }),
        //     yup.object({
        //         address: yup.string().required(),
        //         postalCode: yup
        //         .string()
        //         .required()
        //         .matches(/^[0-9]+$/, "Must be numeric"),
        //     }),
        //     yup.object({
        //         terms: yup.bool().required().equals([true]),
        //     }),
        // ];

        const currentSchema = computed(() => {
            return yepSchemas[currentStep.value];
        });

        // function nextStep(values) {
        // if (currentStep.value === 3) {
        //     console.log("Done: ", JSON.stringify(formValues, null, 2));
        //     return;
        // }

        // // accumlate the form values with the values from previous steps
        // Object.assign(formValues, values);
        // console.log("Current values: ");
        // console.log(JSON.stringify(formValues, null, 2));
        // currentStep.value++;
        // }

        // function prevStep() {
        // if (currentStep.value <= 0) {
        //     return;
        // }

        // currentStep.value--;
        // }

        // function onSubmit(values) {
        //     // Submit values to API...
        //     alert(JSON.stringify(values, null, 2));
        //     // console.log(values);
        //     this.$emit('valuesForm', values);

        // }

        return {
            currentStep,
            currentSchema,
            // prevStep,
            // formValues,
            // nextStep,
            formSchema,
            validateSchema
        };
    },
    methods: {
        onSubmit(values) {
            alert(JSON.stringify(values, null, 2));
            // console.log(values);
            this.$emit('valuesForm', values);

        },
    },
    computed: {
        currentSchema: function () {
            return this.yepSchemas[this.currentStep];
        }
    },
    async mounted() {
        const module = await import(`../../../../helpers/formularios/${this.$props.province}`)
        this.formSchema = module.getFormSchema(this.$props.builder, this.$props.evaluate, this.$props.dataForm);

        for (let index = 0; index < this.formSchema.length; index++) {
            this.yepSchemas.push([this.formSchema[index]].reduce(createYupSchema, {},this.$props.evaluate));

        }

        // this.yepSchema = this.formSchema.reduce(createYupSchema, {}, this.$props.evaluate);

        // this.validateSchema = yup.object().shape(this.yepSchema);
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css" scoped></style>
<style scoped>
input:checked~.dot {
    transform: translateX(100%);
    background-color: #48bb78;
}

.btn-close-row {
    position: absolute;
    right: 36px;
    z-index: 100;
    cursor: pointer;

}
</style>
