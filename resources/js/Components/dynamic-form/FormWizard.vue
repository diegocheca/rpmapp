<template>
<loading v-if="loading" />
<div  v-else>
    <div class="block w-full text-center text-grey-darkest text-2xl p-10">
        {{ titleForm }}
    </div>

    <div class="flex">

        <div v-for="(item, index) in formSchema" :key="index" :class="[`w-1/${formSchema.length > 5? 5 : formSchema.length}`, 'invisible', 'lg:visible']">

            <div class="relative mb-2">
                <div v-if="index >= 1" class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="w-0 py-1 rounded" :class="[currentStep >= index? item.bgColorProgress : '']" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto rounded-full text-lg text-white flex items-center" :class="[currentStep >= index? item.bgColorIcon : 'bg-gray-300']">
                    <span class="text-center text-white w-full">
                        <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui" :d="item.icon" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">{{item.titleStep}}</div>
        </div>

    </div>
    <Form @submit="onSubmit" :validation-schema="currentSchema" v-slot="{ values, errors }">
        <div v-for="(item, index) in formSchema" :key="index">
            <template v-if="currentStep === index">
                <div v-if="item.infoStep" class="flex justify-center mt-6  bg-blue-100 border-blue-500 text-blue-700 text-sm font-bold px-4 py-3 rounded-md mx-10" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{item.infoStep}}</p>
                </div>
                <!-- <DynamicInputs :formSchema="item.bodyStep"/> -->
                <DynamicInputs :formSchema="item.bodyStep" :action="action" :evaluate="evaluate" :valuesForm="values" :status="builder.estado" />
            </template>
        </div>
        <div class="flex gap-x-5 justify-center my-10">
            <button v-if="!disableSave && currentStep > 0" type="button" class=" bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" @click="prevStep">Anterior</button>
            <button v-if="!disableSave" type="submit" class=" bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3">{{currentStep == formSchema.length -1? buttomLabel :'Siguiente'}}</button>
            <button v-if="currentStep == formSchema.length - 1 && disableSave" type="button" class="flex bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" :disabled="disableSave">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Guardando...
            </button>

        </div>

        <!-- <inertia-link :href="route('reinscripciones.index')" class="w-20 text-center py-2 mb-4 text-sm font-medium rounded-full block border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
            Volver
        </inertia-link> -->

        <template v-if="dev">
            <div class="mt-6 bg-clip-border p-6 bg-indigo-600 border-4 border-indigo-300 border-dashed text-white ">
                <h3>ERRORS:</h3>
                <pre class="flex">
                    {{errors}}
                </pre>
            </div>
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

import { createYupStepSchema } from '../../../../helpers/formularios/default/yupSchemaCreator';
import DragAndDropFile from "./DragAndDropFile.vue";
import DynamicInputs from "./DynamicInputs.vue";
import Loading from '../Loading.vue'
import { Form, Field, ErrorMessage, useForm  } from 'vee-validate';
import inputsTypes from '../../../../helpers/enums/inputsTypes';
import VueMultiselect from 'vue-multiselect'
import * as yup from "yup";
import Swal from "sweetalert2";
import asdVue from './asd.vue';
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
        Loading
    },
    props: {
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
            require:false,
            type: String,
            default: 'Guardar'
        },
        dataForm: {
            require: false,
            type: Array
        },
        productors: {
            require: false,
            type: Array
        },
    },
    emits: [
        'valuesForm'
    ],

    data() {
        const currentStep = 0;
        const formValues = {};
        const loading = true;

        return {
            progressUpload: 0,
            showProgressUpload: false ,
            isSubmit: false,

            title: this.$props.titleForm,
            inputsTypes: inputsTypes,
            formSchema: [],
            yepSchemas: [],
            currentStep,
            formValues,
            disableSave: false,
            loading
        };
    },
    methods: {
        onSubmit(values) {

            // accumlate the form values with the values from previous steps
            let currentValues = this.formSchema[this.currentStep].bodyStep.map(bodyStep => {
                return bodyStep.body.map(body => {
                    const inputs = body.inputs.map((input, index) => {
                        // if(values[input.name] && typeof values[input.name] !== 'undefined') {
                        if(values.hasOwnProperty(input.name)) {
                            let obj = {}
                            obj[`${input.name}`] = values[input.name];

                            if(values[`${input.name}_evaluacion`]){
                                obj[`${input.name}_evaluacion`] = values[`${input.name}_evaluacion`];
                                obj[`${input.name}_comentario`] = values[`${input.name}_comentario`];
                            }


                            return obj
                        }
                    })
                    return inputs.flat();
                });
            });

            currentValues = currentValues.flat(2)
            // const currentValues = this.formSchema[this.currentStep].bodyStep[0].body[0].inputs.map((input, index) => {
            //     if(values[input.name] && typeof values[input.name] !== 'undefined') {
            //         let obj = {}
            //         obj[`${input.name}`] = values[input.name];
            //         return obj
            //     }
            // })
            Object.assign(this.formValues, ...currentValues);

            if (this.currentStep === this.formSchema.length - 1) {
                if(this.$props.builder.estado == "aprobado") return;
                this.saveForm();
                // console.log("Done: ", JSON.stringify(this.formValues, null, 2));
                //this.disableSave = true;
                return;
            }
            this.currentStep++;
        },

        prevStep() {
            if (this.currentStep <= 0) {
                return;
            }
            this.disableSave = false;
            this.currentStep--;
        },
        async saveForm() {
            let response;
            let formData = new FormData();
            let isFile = false;
            for ( var key in this.formValues ) {
                if( Array.isArray(this.formValues[key])) {
                    for (let index = 0; index < this.formValues[key].length; index++) {
                        if(!this.formValues[key][index] instanceof File) continue;
                        const element = this.formValues[key][index];
                        formData.append(key+'_'+index, element);
                        //isFile = true;
                    }
                }

            }

            this.isSubmit = true;
            try {
                if(isFile) {
                    response = await axios.post(this.$props.saveFileUrl, formData, {
                        onUploadProgress: function( progressEvent ) {
                            this.progressUpload = parseInt( Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ))
                            this.showProgressUpload = true;
                        }.bind(this)
                    });

                    for ( var key2 in response.data ) {
                        values[key2] = response.data[key2];
                    }
                }

                switch (this.$props.action) {
                    case "create":
                        this.$inertia.post(route(this.$props.saveUrl), this.formValues);
                        break;

                    case "update":
                        this.$inertia.put(route("reinscripciones.update", this.$props.builder.id), this.formValues);
                        break;

                    case "evaluate":
                        this.$inertia.put(route("reinscripciones.updateRevision", this.$props.builder.id), this.formValues);
                        break;

                }

            } catch (error) {

            }
             this.isSubmit = false;
        }
    },
    computed: {
        currentSchema() {
            return this.yepSchemas? yup.object().shape(this.yepSchemas[this.currentStep]) : {};
        },
        progressCurrentStep(){

        }
    },
    // watch: {
    //     formValues(newQuestion, oldQuestion) {
    //         alert()
    //     }
    // },
    async mounted() {
        const module = await import(`../../../../helpers/formularios/${this.$props.province}`)
        this.formSchema = await module.getFormSchema(this.$props.builder, this.$props.action, this.$props.dataForm, this.$props.productors);

        for (let index = 0; index < this.formSchema.length; index++) {
            this.yepSchemas.push([this.formSchema[index]].reduce(createYupStepSchema, {},this.$props.evaluate));

        }

        this.loading = false;
        //console.log(this.formSchema.map(e => e.bodyStep.map(e1 => e1.body.inputs)));
        // this.formSchema = subFormSchema.map(e => e.bodyStep);

        // this.yepSchema = this.formSchema.reduce(createYupStepSchema, {}, this.$props.evaluate);

        // this.validateSchema = yup.object().shape(this.yepSchema);
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css" ></style>
<style scoped>
input:checked ~ .dot {
  transform: translateX(100%);
  background-color: #48bb78;
}

.btn-close-row {
    position: relative;
    transform: translate(110%, -45%);
    right: 36px;
    z-index: 100;
    cursor: pointer;

}
</style>
