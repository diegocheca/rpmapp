<template>
<div>
  <Form @submit="onSubmit" :validation-schema="validateSchema">
        <Field name="dni" type="number" />
        <ErrorMessage name="dni" />
        <button>Sign up for newsletter</button>
    </Form>
    <div class="block w-full text-center text-grey-darkest text-2xl p-10">
        {{ title }}
    </div>
    <Form @submit="onSubmit" :validation-schema="validateSchema" v-slot="{ values, errors }">

            <div class="items-center bg-teal-lighter">
                <!-- row -->
                <div v-for="(row, indexRow) in formSchema" :key="indexRow" class="flex flex-col" :class="row.widthResponsive">
                    <!-- column -->
                    <div v-for="(col, indexCol) in row.body" :key="indexCol" class="bg-white rounded shadow-lg p-8 m-4" :class="col.width">
                        <div class="font-bold text-lg">{{col.title}}</div>
                        <hr class="my-5">
                        <div class="grid gap-4 " :class="[col.columns, col.columnsResponsive]">
                            <!-- inputs -->
                            <div v-for="(item, indexItem) in col.inputs" :key="indexItem" class="mb-4">
                                <div class="flex flex-col">
                                    <label for="item.name" class="mb-2 uppercase text-md text-grey-darkest">{{item.label}} :</label>
                                    <!-- checkbox -->
                                    <div v-if="item.type == inputsTypes.CHECKBOX">

                                        <Field v-slot="{ field }" :type="item.type" :name="item.name">

                                            <div class="flex items-center justify-center w-full mb-12">

                                                <label
                                                    :for="item.name"
                                                    class="flex items-center cursor-pointer"
                                                >
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                    <!-- input -->
                                                    <input :type="item.type" :name="item.name" :id="item.name" class="sr-only" v-model="item.value" v-bind="field" :disabled="evaluate? true: false"/>
                                                    <!-- line -->
                                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                    <!-- dot -->
                                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="ml-3 text-gray-700 font-medium">
                                                    {{item.value? 'SI' : 'NO'}}
                                                    </div>
                                                </label>

                                            </div>

                                            <!-- <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">

                                                <input :type="item.type" :name="item.name" :id="item.name" v-bind="field" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" v-model="item.value" />
                                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                            </div> -->
                                        </Field>

                                        <!-- <input :type="item.type" :name="item.name" :id="item.name" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" :value="item.value" v-model="item.value"/>
                                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label> -->
                                        <!-- <label for="toggle" class="text-xs text-gray-700">{{item.value? 'SI' : 'NO'}}</label> -->
                                    </div>

                                    <!-- default -->
                                    <Field v-if="inputsTypes.INPUTS_DEFAULT.indexOf(item.type) > -1" :value="item.value" :name="item.name" :type="item.type" class="rounded-md py-2 px-3 text-grey-darkest" :disabled="evaluate? true: false"/>
                                    <!-- <ErrorMessage class="text-red-500" :name="item.name" /> -->

                                    <!-- textarea -->
                                    <Field v-if="item.type == inputsTypes.TEXTAREA" :value="item.value" :name="item.name" :as="item.type" class="rounded-md py-2 px-3 text-grey-darkest" />


                                    <!-- select/multiple -->
                                    <Field v-if="item.type == inputsTypes.SELECT" v-slot="{ field }" :name="item.name">
                                        <VueMultiselect v-bind="field" v-model="item.value" :value="item.value" :options="item.options" :multiple="item.multiple" :close-on-select="item.closeOnSelect" :searchable="item.searchable" :placeholder="item.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" :disabled="evaluate? true: false" />
                                    </Field>

                                    <!-- file -->
                                    <Field v-if="item.type == inputsTypes.FILE" v-slot="{ field }" :type="item.type" :name="item.name">
                                        <div v-if="!evaluate" class="w-full h-full">
                                            <DragAndDropFile v-bind="field" :accept="item.accept" :acceptLabel="item.acceptLabel" />
                                        </div>
                                        <div v-else>
                                            <ul>
                                                <li>File 1</li>
                                                <li>File 2</li>
                                                <li>File 3</li>
                                                <li>File 4</li>
                                            </ul>

                                        </div>
                                    </Field>

                                    <!-- Display error -->
                                    <ErrorMessage class="text-red-500" :name="item.name" />

                                    <!-- LIST ELEMENTS -->
                                    <Field v-if="item.type == inputsTypes.LIST" v-slot="{ field }" :type="item.type" :name="item.name">

                                        <div v-for="(element, indexElement) in item.elements" :key="indexElement" class=" px-5 my-3 bg-blue-100 rounded-lg" >

                                            <div v-if="!evaluate" class="btn-close-row">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="#EF4444" @click="removeRowDynamic(item, indexElement)">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <div class="flex flex-col lg:flex-row" >
                                                <!-- :class="[item.columns, item.columnsResponsive]" -->
                                                <div v-bind="field" v-for="(ele, indexElement2) in element" :key="indexElement2" class="p-4 flex flex-col" :class="[ele.colSpan]">
                                                    <label v-if="ele.label" :for="ele.label" class="mb-2 uppercase text-md text-grey-darkest">{{ele.label}} :</label>

                                                    <!-- checkbox -->
                                                    <div v-if="ele.type == inputsTypes.CHECKBOX">

                                                        <Field v-slot="{ field }" :type="ele.type" :name="ele.name">
                                                            <div class="flex items-center justify-center w-full mb-12">

                                                                <label
                                                                    :for="item.name"
                                                                    class="flex items-center cursor-pointer"
                                                                >
                                                                    <!-- toggle -->
                                                                    <div class="relative">
                                                                    <!-- input -->
                                                                    <input :type="ele.type" :name="ele.name" :id="ele.name" class="sr-only" v-model="ele.value" v-bind="field" :disabled="evaluate? true: false"/>
                                                                    <!-- line -->
                                                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                                    <!-- dot -->
                                                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                                                    </div>
                                                                    <!-- label -->
                                                                    <div class="ml-3 text-gray-700 font-medium">
                                                                    {{item.value? 'SI' : 'NO'}}
                                                                    </div>
                                                                </label>

                                                            </div>
                                                            <!-- <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                                                <input :type="ele.type" :name="ele.name" :id="ele.name" v-bind="field" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" :v-model="ele.value" :value="ele.value" />
                                                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                                            </div> -->
                                                        </Field>
                                                        <!-- <label for="toggle" class="text-xs text-gray-700">{{ele.value? 'SI' : 'NO'}}</label> -->
                                                    </div>

                                                    <!-- default -->
                                                    <Field v-if="inputsTypes.INPUTS_DEFAULT.indexOf(ele.type) > -1" :value="ele.value" :name="ele.name" :type="ele.type" class="rounded-md py-2 px-3 text-grey-darkest" :disabled="evaluate? true: false" />
                                                    <!-- <ErrorMessage class="text-red-500" :name="ele.name" /> -->
                                                    <!-- <input v-if="inputsTypes.INPUTS_DEFAULT.indexOf(ele.type) > -1" :value="ele.value" :name="ele.name" :type="ele.type" class="rounded-md py-2 px-3 text-grey-darkest"> -->

                                                    <!-- textarea -->
                                                    <Field v-if="ele.type == inputsTypes.TEXTAREA" :value="ele.value" :name="ele.name" :as="ele.type" class="rounded-md py-2 px-3 text-grey-darkest" :disabled="evaluate? true: false" />


                                                    <!-- file -->
                                                    <Field v-if="ele.type == inputsTypes.FILE" v-slot="{ field }" :type="ele.type" :name="ele.name">
                                                        <div v-if="!evaluate" class="w-full h-full">
                                                            <DragAndDropFile v-bind="field" :accept="item.accept" :acceptLabel="item.acceptLabel" />
                                                        </div>
                                                        <div v-else>
                                                            <ul>
                                                                <li>File 1</li>
                                                                <li>File 2</li>
                                                                <li>File 3</li>
                                                                <li>File 4</li>
                                                            </ul>

                                                        </div>
                                                    </Field>

                                                    <!-- select / multiselect -->
                                                    <Field v-if="ele.type == inputsTypes.SELECT" v-slot="{ field }" :name="ele.name">
                                                        <VueMultiselect  v-bind="field" v-model="ele.value" :id="{all: item.elements, indexElement, indexElement2}" :options="ele.options" :multiple="ele.multiple" :close-on-select="ele.closeOnSelect" :searchable="ele.searchable" :placeholder="ele.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" @select="getSelectOptions" @remove="removeOptions" :disabled="evaluate? true: false">
                                                        </VueMultiselect>
                                                    </Field>

                                                    <!-- display error -->
                                                    <ErrorMessage class="text-red-500" :name="ele.name" />

                                                    <!-- review -->
                                                    <div class="grid grid-row-2 p-4 rounded-lg" :class="[values[ele.observation.options[0].name] != 'rechazado'? 'bg-blue-200' : 'bg-red-200' ]" v-if="evaluate &&  ele.observation">
                                                        <div class="w-full flex flex-wrap">
                                                            <span class="w-full text-gray-700">
                                                                Correcto?
                                                            </span>
                                                            <!-- inputs radio -->
                                                            <div v-for="(obs, index) in ele.observation.options" :key="index">
                                                                <label>
                                                                    <Field :name="obs.name" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" />
                                                                    <span>{{obs.label}}</span>
                                                                </label>
                                                            </div>
                                                            <ErrorMessage class="w-full text-red-500" :name="ele.observation.options[0].name" />
                                                        </div>
                                                        <!-- textarea -->

                                                        <div v-show="values[ele.observation.options[0].name] == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in">
                                                            <label :for="ele.name" class="mb-2 uppercase text-md text-grey-darkest">{{ele.observation.comment.label}} :</label>
                                                            <Field :name="ele.observation.comment.name" :as="ele.observation.comment.type" class="rounded-md py-2 px-3 text-grey-darkest" :value="ele.observation.comment.value" />
                                                            <ErrorMessage class="text-red-500" :name="ele.observation.comment.name" />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div  class="flex justify-center pt-9">
                                            <button type="button" class="bg-blue-500 hover:bg-blue-800 rounded text-white px-2 py-1" @click="addRow(item)">+ Agregar registro</button>
                                        </div>

                                    </Field>
                                    <!-- review -->
                                    <div class="grid grid-rows-2 grid-flow-col p-4 mt-5 rounded-lg" :class="[values[item.observation.options[0].name] != 'rechazado'? 'bg-blue-200' : 'bg-red-200' ]" v-if="evaluate &&  item.observation && item.type != inputsTypes.LIST">
                                        <div class="w-full flex flex-wrap">
                                            <span class="w-full text-gray-700">
                                                Correcto?
                                            </span>
                                            <!-- inputs radio -->
                                            <div v-for="(obs, index) in item.observation.options" :key="index">
                                                <label>
                                                    <Field :name="obs.name" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" />
                                                    <span>{{obs.label}}</span>
                                                </label>
                                            </div>
                                            <ErrorMessage class="w-full text-red-500" :name="item.observation.options[0].name" />
                                        </div>
                                        <!-- textarea -->
                                        <div v-show="values[item.observation.options[0].name] == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in">
                                            <label :for="item.name" class="mb-2 uppercase text-md text-grey-darkest">{{item.observation.comment.label}} :</label>
                                            <Field :name="item.observation.comment.name" :as="item.observation.comment.type" class="rounded-md py-2 px-3 text-grey-darkest" :value="item.observation.comment.value" />
                                            <ErrorMessage class="text-red-500" :name="item.observation.comment.name" />

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div  class="flex justify-center pt-9">
                <button type="submit" class=" bg-blue-500 hover:bg-blue-800 rounded text-white px-9 py-3" >{{buttomLabel}}</button>
            </div>

            <inertia-link :href="route('reinscripciones.index')" class="w-20 text-center py-2 mb-4 text-sm font-medium rounded-full block border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
                Volver
            </inertia-link>

            <template v-if="dev">
                <div class="bg-clip-border p-6 bg-indigo-600 border-4 border-indigo-300 border-dashed text-white">
                    <h3>ERRORS:</h3>
                    <pre>
                        {{errors}}
                    </pre>
                </div>

            </template>

            <template v-if="dev">
                <div class="bg-clip-border p-6 bg-indigo-600 border-4 border-indigo-300 border-dashed text-white">
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
import DynamicList from "./DynamicList.vue";
import { Form, Field, ErrorMessage } from 'vee-validate';
import inputsTypes from '../../../../helpers/enums/inputsTypes';
import VueMultiselect from 'vue-multiselect'
import * as yup from "yup";
import {getFormSchema} from '../../../../helpers/formularios/sanjuan/reinscripciones';


export default {
    components: {
        AppLayout,
        Form,
        Field,
        ErrorMessage,
        VueMultiselect,
        DragAndDropFile,
        DynamicList
    },
    props: {
        builder: {
            require: true
        },
        // formSchema: {
        //     require: true
        // },
        //  yepSchema: {
        //     require: true
        // },
        //  validateSchema: {
        //     require: true
        // },
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
        }
    },
    emits: [
        'valuesForm'
    ],
    data() {
        const formSchema = getFormSchema(this.$props.builder, this.$props.evaluate);

        const yepSchema = formSchema.reduce(createYupSchema, {}, this.$props.evaluate);

        const validateSchema = yup.object().shape(yepSchema);
        return {
            title: this.$props.titleForm,
            inputsTypes: inputsTypes,
            // formSchema: {},
            formSchema,
            validateSchema,
            yepSchema,
            // schema,
            // initialValues: { ...this.$props.schema }
            schema2: null
        };
    },
    methods: {
        getSelectOptions(value, element) {
            if(!element.all) return;

            const elementChange = element.all[element.indexElement][element.indexElement2];

            if(elementChange.inputDepends && elementChange.inputDepends.length > 0) {
                for (let index = 0; index < elementChange.inputDepends.length; index++) {
                    const elementDepends = elementChange.inputDepends[index];
                    const options = elementChange.optionsDepends[value.value];
                    const indexDepends = element.all[element.indexElement].findIndex(e => e.name == elementDepends);

                    // const indexDepends = element.all[element.indexElement].findIndex(h => h.some(r => r.name == elementDepends));
                    element.all[element.indexElement][indexDepends].options = options;
                    element.all[element.indexElement][indexDepends].value = null
                }
            }


        },
        removeOptions(value, element) {
            if(!element.all) return;
            const elementChange = element.all[element.indexElement][element.indexElement2];

            if(elementChange.inputDepends && elementChange.inputDepends.length > 0) {
                for (let index = 0; index < elementChange.inputDepends.length; index++) {
                    const elementDepends = elementChange.inputDepends[index];
                    const indexDepends = element.all[element.indexElement].findIndex(e => e.name == elementDepends);
                    element.all[element.indexElement].options = [];
                    element.all[element.indexElement][indexDepends].options = [];
                    element.all[element.indexElement][indexDepends].value = null
                }
            }

        },
        addRow(item) {
            let newRow = [];
            for (let index1 = 0; index1 < item.elements.length; index1++) {
                newRow = JSON.parse(JSON.stringify(item.elements[index1]))

                for (let index2 = 0; index2 < newRow.length; index2++) {
                    const element2 = newRow[index2];

                    if(element2.inputDepends && element2.inputDepends.length > 0) {
                        for (let index3 = 0; index3 < element2.inputDepends.length; index3++) {
                            const element3 = element2.inputDepends[index3].split("-")[0];
                            newRow[index2].inputDepends[index3] = `${element3}-${element2.inputDepends.length}`;

                        }
                    }
                    if(!_.isEmpty(element2.observation)) {
                        for (let index = 0; index < element2.observation.options.length; index++) {
                            const opt = element2.observation.options[index];
                            const newObsOptions2 = opt.name.split("-")[0];
                            newRow[index2].observation.options[index].name = `${newObsOptions2}-${item.elements.length}`;
                        }
                        const newObsComment2 = element2.observation.comment.name.split("-")[0];
                        newRow[index2].observation.comment.name = `${newObsComment2}-${item.elements.length}`;
                    } else{
                        if(!element2.name) continue;
                        const newName2 = element2.name.split("-")[0];
                        newRow[index2].name = `${newName2}-${item.elements.length}`
                        newRow[index2].value = null;

                        this.yepSchema[newRow[index2].name] = element2.validations;
                        this.validateSchema = yup.object().shape(this.yepSchema);

                    }
                }

            }


            item.elements.push(newRow)


        },
        removeRowDynamic(item, indexDelete) {
            if(item.elements.length == 1) return;
            item.elements.splice(indexDelete, 1);
        },
        onSubmit(values) {
            // Submit values to API...
            alert(JSON.stringify(values, null, 2));
            // console.log(values);
            this.$emit('valuesForm', values);

        },

    },
    mounted() {
        // import(`../../../../helpers/formularios/${this.$props.province}`)
        //     .then(module => {

        //         const form = new module.FormBuilder(this.$props.builder, this.$props.evaluate).form;

        //         const yepSchema = form.reduce(createYupSchema, {}, this.$props.evaluate);

        //         const validateSchema = yup.object().shape(yepSchema);

        //         // const schema = new module.FormBuilder(this.$props.builder, this.$props.evaluate).form;

        //             this.formSchema = {
        //             form,
        //             yepSchema,
        //             validateSchema,
        //             // schema
        //         }

        //     });

        // this.formSchema = new FormBuilder(this.$props.builder, this.$props.evaluate).form;

        // this.yepSchema = this.formSchema.reduce(createYupSchema, {}, this.$props.evaluate);

        // this.validateSchema = yup.object().shape(this.yepSchema);

        // this.schema = new FormBuilder(this.$props.builder, this.$props.evaluate).form;

    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style scoped>
/* CHECKBOX TOGGLE SWITCH */
/* .toggle-checkbox:checked {
    right: 0;
    border-color: #68D391;
}

.toggle-checkbox:checked+.toggle-label {
    background-color: #68D391;
}

.multiselect .multiselect__tags {
    min-height: 40px;
    display: block;
    padding: 8px 40px 0 8px;
    border-radius: 5px;
    border: 1px solid #6b7280 !important;
    background: #fff;
    font-size: 14px;
}
input {
    border: 1px solid #e8e8e8 !important;
} */


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
