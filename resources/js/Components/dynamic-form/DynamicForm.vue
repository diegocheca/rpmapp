<template>
<div>
    <div class="block w-full text-center text-grey-darkest text-2xl p-10">
        {{ titleForm }}
    </div>
    <Form @submit="onSubmit" :validation-schema="validateSchema" v-slot="{ values, errors }">

        <DynamicInputs :formSchema="formSchema"/>

        <!-- <div class="flex">
            <div class="w-1/2">
                <div class="relative mb-2">
                    <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                        <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                            <div class="w-0 py-1 rounded bg-blue-300" :style="showProgressUpload"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
        <div v-if="showProgressUpload" class="relative pt-1 mx-16">
            <div class="flex mb-2 items-center justify-between">
                <div>
                    <!-- <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200">
                        Subiendo archivos
                    </span> -->
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold inline-block text-pink-600">
                        {{progressUpload}}%
                    </span>
                </div>
            </div>
            <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                <div :style="`width: ${progressUpload}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
            </div>
        </div>


        <div  class="flex justify-center py-9">
            <button v-if="!isSubmit" type="submit" class=" bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" >{{buttomLabel}}</button>
            <button v-if="isSubmit" type="button" class="flex bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" :disabled="disableSave">
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
import DynamicInputs from "./DynamicInputs.vue";
import { Form, Field, ErrorMessage } from 'vee-validate';
import inputsTypes from '../../../../helpers/enums/inputsTypes';
import VueMultiselect from 'vue-multiselect'
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
        DynamicInputs
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
        }
    },
    emits: [
        'valuesForm'
    ],

    data() {
        return {
            title: this.$props.titleForm,
            inputsTypes: inputsTypes,
            formSchema: [],
            validateSchema: yup.object().shape({}),
            yepSchema: {},
            progressUpload: 0,
            showProgressUpload: false ,
            isSubmit: false,
        };
    },

    methods: {
        async onSubmit(values) {
            // alert(JSON.stringify(values, null, 2));
            // console.log(JSON.stringify(values, null, 2));
            // this.$emit('valuesForm', values);

            let response;
            let formData = new FormData();
            let isFile = false;
            for ( var key in values ) {
                if( Array.isArray(values[key])) {
                    for (let index = 0; index < values[key].length; index++) {
                        if(!values[key][index] instanceof File) continue;
                        const element = values[key][index];
                        formData.append(key+'_'+index, element);
                        isFile = true;
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
                if(this.$props.action == "create") {
                    this.$inertia.post(route(this.$props.saveUrl), values);
                } else if(this.$props.action == "update") {
                    response = await axios.put(this.$props.saveUrl, {
                        params: {
                            id: this.$props.reinscripcion.id
                            }
                        }
                    )
                }
            } catch (error) {

            }
             this.isSubmit = false;

        },
    },
    async mounted() {
        const module = await import(`../../../../helpers/formularios/${this.$props.province}`)
        this.formSchema = module.getFormSchema(this.$props.builder, this.$props.evaluate, this.$props.dataForm);

        this.yepSchema = this.formSchema.reduce(createYupSchema, {}, this.$props.evaluate);

        this.validateSchema = yup.object().shape(this.yepSchema);
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
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
