<template>
    <div>
        <div class="block w-full text-center text-grey-darkest text-2xl p-10">
            {{ titleForm }}
        </div>

        <div class="flex">
            <div
                v-for="(item, index) in formSchema"
                :key="index"
                :class="`w-1/${formSchema.length}`"
                 class="w-1/2 p-4 bg-800"
            >
                <div class="relative mb-2">
                    <div
                        v-if="index >= 1"
                        class="
                            absolute
                            flex
                            align-center
                            items-center
                            align-middle
                            content-center
                        "
                        style="
                            width: calc(100% - 2.5rem - 1rem);
                            top: 50%;
                            transform: translate(-50%, -50%);
                        "
                    >
                        <div
                            class="
                                w-full
                                bg-gray-200
                                rounded
                                items-center
                                align-middle align-center
                                flex-1
                            "
                        >
                            <div
                                class="w-0 py-1 rounded"
                                :class="[
                                    currentStep >= index
                                        ? item.bgColorProgress
                                        : ''
                                ]"
                                style="width: 100%"
                            ></div>
                        </div>
                    </div>

                    <div
                        class="
                            w-10
                            h-10
                            mx-auto
                            rounded-full
                            text-lg text-white
                            flex
                            items-center
                        "
                        :class="[
                            currentStep >= index
                                ? item.bgColorIcon
                                : 'bg-gray-300',
                        ]"
                    >
                        <span class="text-center text-white w-full">
                            <svg
                                class="w-full fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                            >
                                <path class="heroicon-ui" :d="item.icon" />
                            </svg>
                        </span>
                    </div>
                    
                </div>

                <div class="text-xs text-center md:text-base">
                    {{ item.titleStep }}
                </div>
            </div>
        </div>
        
        <Form
            @submit="onSubmit"
            :validation-schema="currentSchema"
            v-slot="{ values, errors }"
        >
            <div v-for="(item, index) in formSchema" :key="index">
                <template v-if="currentStep === index">
                    <DynamicInputs :formSchema="item.bodyStep" />
                </template>
            </div>
            <div class="flex gap-x-5 justify-center pt-9">
                <!-- <button
                    v-if="currentStep > 0"
                    type="button"
                    class="
                        bg-blue-500
                        hover:bg-blue-800
                        rounded
                        text-white
                        px-9
                        py-3
                    "
                    @click="prevStep"
                >
                    Anterior
                </button> -->
                <button
                    v-if="!disableSave"
                    type="submit"
                    class="
                        bg-blue-500
                        hover:bg-blue-800
                        rounded
                        text-white
                        px-9
                        py-3
                    "
                >
                    {{
                        currentStep == formSchema.length - 1
                            ? buttomLabel
                            : "Siguiente"
                    }}
                </button>
               <!--  <button
                    v-if="currentStep == formSchema.length - 1 && disableSave"
                    type="button"
                    class="
                        flex
                        bg-blue-500
                        hover:bg-blue-800
                        rounded
                        text-white
                        px-9
                        py-3
                    "
                    :disabled="disableSave"
                >
                    <svg
                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                    Guardando...
                </button> -->
            </div>

            <!-- <inertia-link :href="route('reinscripciones.index')" class="w-20 text-center py-2 mb-4 text-sm font-medium rounded-full block border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
            Volver
        </inertia-link> -->

            <template v-if="dev">
                <div
                    class="
                        mt-6
                        bg-clip-border
                        p-6
                        bg-indigo-600
                        border-4 border-indigo-300 border-dashed
                        text-white
                    "
                >
                    <h3>ERRORS:</h3>
                    <pre>
                    {{ errors }}
                </pre
                    >
                </div>
            </template>

            <template v-if="dev">
                <div
                    class="
                        mt-6
                        bg-clip-border
                        p-6
                        bg-indigo-600
                        border-4 border-indigo-300 border-dashed
                        text-white
                    "
                >
                    <h3>VALUES:</h3>
                    <pre>
                    {{ values }}
                </pre
                
                    >
                </div>
            </template>
        </Form>
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayoutFormWeb";
// import { createYupStepSchema } from '../../../../helpers/formularios/default/yupSchemaCreator';
import { createYupStepSchema } from "../../../../../helpers/default/yupSchemaCreator";
import DragAndDropFile from "./DragAndDropFile.vue";
import DynamicInputs from "./DynamicInputs.vue";
import { Form, Field, ErrorMessage, useForm } from "vee-validate";
import inputsTypes from "../../../../../helpers/enums/inputsTypes";
import VueMultiselect from "vue-multiselect";
import * as yup from "yup";
// import {FormBuilder} from '../../../../helpers/formularios/sanjuan/reinscripciones';
export default {
    components: {
        AppLayout,
        Form,
        Field,
        ErrorMessage,
        VueMultiselect,
        DragAndDropFile,
        DynamicInputs,
    },
    props: {
        builder: {
            require: true,
        },
        province: {
            require: true,
            type: String,
        },
        tipo_documento: {
            require: true,
            type: String,
        },
        mineral:{
           require: true,
            type: String, 
        },
        estado_terreno:{
           require: true,
            type: String,  
        },
        // estado_solicitud: {
        //     require: true,
        //     type: String,
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
            default: false,
        },
        buttomLabel: {
            require: false,
            type: String,
            default: "Guardar",
        },
        dataForm: {
            require: false,
            type: Array,
        },        
    },
    emits: ["valuesForm"],

    data() {
        const currentStep = 0;
        const formValues = {};

        return {
            title: this.$props.titleForm,
            inputsTypes: inputsTypes,
            formSchema: [],
            yepSchemas: [],
            currentStep,
            formValues,
            disableSave: false,
        };
    },
    methods: {
        async onSubmit(values) {
            // accumlate the form values with the values from previous steps
            localStorage.setItem("dniV", values.dni);
            Object.assign(this.formValues, values);

            if (this.currentStep === this.formSchema.length - 1) {
                console.log("Done: ", JSON.stringify(this.formValues, null, 2));
                this.disableSave = true;
                return;
            }

            await axios.post("solicitudesDatos", {
                step: this.currentStep + 1,
                datos: this.formValues,
            });
            // console.log(JSON.stringify(this.formValues, null, 2));
            // console.log("Current values: ");
            this.currentStep++;
        },

        prevStep() {
            var txt = localStorage.getItem("dniV");
            console.log("DNI: ", txt);
            if (this.currentStep <= 0) {
                return;
            }
            this.disableSave = false;
            this.currentStep--;
        },
        prueba() {
            console.log("estoy dentro");
        },
    },
    computed: {
        currentSchema() {
            return this.yepSchemas
                ? yup.object().shape(this.yepSchemas[this.currentStep])
                : {};
        },
        progressCurrentStep() {},
    },
    // watch: {
    //     formValues(newQuestion, oldQuestion) {
    //         alert()
    //     }
    // },
    async mounted() {
        // const module = await import(`../../../../helpers/formularios/${this.$props.province}`)
        const module = await import(
            `../../../../../helpers/formWeb/${this.$props.province}`
        );
        
        this.formSchema = module.getFormSchema(
            this.$props.builder,
            this.$props.evaluate,
            this.$props.dataForm
        );
        for (let index = 0; index < this.formSchema.length; index++) {
            this.yepSchemas.push(
                [this.formSchema[index]].reduce(
                    createYupStepSchema,
                    {},
                    this.$props.evaluate
                )
            );
        }

        //console.log(this.formSchema.map(e => e.bodyStep.map(e1 => e1.body.inputs)));
        // this.formSchema = subFormSchema.map(e => e.bodyStep);

        // this.yepSchema = this.formSchema.reduce(createYupStepSchema, {}, this.$props.evaluate);

        // this.validateSchema = yup.object().shape(this.yepSchema);
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css" scoped></style>
<style scoped>
input:checked ~ .dot {
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
