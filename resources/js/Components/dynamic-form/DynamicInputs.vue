<template>
    <div class="items-center bg-teal-lighter">
        <!-- row -->
        <div v-for="(row, indexRow) in formSchema" :key="indexRow" class="flex flex-col justify-center" :class="row.widthResponsive">
            <!-- column -->
            <div v-for="(col, indexCol) in row.body" :key="indexCol" class="bg-white rounded shadow-lg p-8 my-4 mx-auto" :class="col.width">
                <div class="font-bold text-lg">{{col.title}}</div>
                <hr v-if="col.title" class="my-5">
                <div class="grid gap-4 " :class="[col.columns, col.columnsResponsive]">
                    <!-- inputs -->
                    <div v-for="(item, indexItem) in col.inputs" :key="indexItem" class="mb-4" :class="[item.inputColsSpan]">
                        <div class="flex flex-col">
                            <label :for="item.name" class="mb-2 uppercase text-md text-grey-darkest flex flex-row">
                                {{item.label}}
                            </label>

                            <div v-if="item.helpInfo" class="flex items-center bg-blue-100 border-blue-500 text-blue-700 text-sm font-bold px-4 py-3 rounded-md mb-3" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                <p>{{item.helpInfo}}</p>
                            </div>

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
                                            <input :type="item.type" :name="item.name" :id="item.name" class="sr-only" v-model="item.value" v-bind="field" :disabled="action != 'create' && (evaluate || item.observation.value == 'aprobado') ? true: false"/>
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
                            <label v-if="inputsTypes.INPUTS_DEFAULT.indexOf(item.type) > -1" class="relative block">
                                <Field  :value="item.value" :name="item.name" :type="item.type" class="rounded-md py-2 px-3 text-grey-darkest appearance-none w-full block  " :disabled="action != 'create' && (evaluate || item.observation.value == 'aprobado') ? true: false"  :class="[ statusColors[ item.observation.value ] ]" />
                                <svg v-if="action != 'create' && (item.observation.value == 'aprobado')" xmlns="http://www.w3.org/2000/svg" class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#10B981"/>
                                </svg>

                            </label>


                            <!-- textarea -->
                            <Field v-if="item.type == inputsTypes.TEXTAREA" :value="item.value" :name="item.name" :as="item.type" class="rounded-md py-2 px-3 text-grey-darkest" />


                            <!-- select/multiple -->
                            <Field v-if="item.type == inputsTypes.SELECT" v-slot="{ field }" :name="item.name" :value="item.value">
                                <VueMultiselect v-bind="field" v-model="item.value" :id="item" :value="item.value" :options="item.options" :ref="item.name" :multiple="item.multiple" :loading="item.isLoading? item.isLoading : false" :close-on-select="item.closeOnSelect" :searchable="item.searchable" :placeholder="item.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" :disabled="evaluate? true: false" @select="getAsyncOptionsSelect" @input="getAsyncOptionsSelect" />
                            </Field>

                            <!-- file -->
                            <Field v-if="item.type == inputsTypes.FILE" v-slot="{ field }" :type="item.type" :name="item.name">
                                <div v-if="!evaluate" class="w-full h-full">
                                    <DragAndDropFile v-bind="field" :accept="item.accept" :acceptLabel="item.acceptLabel" :maxSize="item.maxSize" :multiple="item.multiple" />
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

                            <!-- Display error to evaluate -->
                            <!-- <pre>{{as= col.inputs}}</pre> -->
                            <span role="alert" class="text-red-500" v-if="item.type != inputsTypes.LIST && action != 'create' && !evaluate && item.observation.value == 'rechazado' "> OBSERVACIÓN: {{item.observation.comment.value}}</span>
                            <!-- <pre>{{errorEvaluation}}</pre> -->

                            <!-- LIST ELEMENTS -->
                            <template v-if="item.type == inputsTypes.LIST">
                                <fieldset class="px-5 my-3 bg-blue-100 rounded-lg" v-for="(element, indexElement) in item.childrens" :key="indexElement">
                                    <div v-if="!evaluate" class="btn-close-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="#EF4444" @click="removeRowDynamic(item, indexElement,col.inputs)">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div v-for="(a, id) in item.elements" :key="id" class="flex" :class="[item.columns, item.columnsResponsive]">
                                        <!-- <pre>{{element}}</pre> -->

                                        <div v-bind="field" v-for="(ele, indexElement2) in a" :key="indexElement2" class="p-4 flex flex-col" :class="[ele.colSpan]">
                                                <!-- <pre>{{a[indexElement2].value}}</pre> -->
                                                <!-- {{`${item.name}[${indexElement}].${a[indexElement2].name}`}} -->
                                            <label v-if="ele.label" :for="ele.label" class="mb-2 uppercase text-md text-grey-darkest">{{ele.label}} :</label>
                                            <Field v-show="false" :name="`${item.name}[${indexElement}].id`" :value="element[indexElement2].id" />
                                            <!-- checkbox -->
                                            <div v-if="ele.type == inputsTypes.CHECKBOX">

                                                <Field v-slot="{ field }" :type="ele.type" :name="a[indexElement].name">
                                                    <div class="flex items-center justify-center w-full mb-12">

                                                        <label
                                                            :for="ele.name"
                                                            class="flex items-center cursor-pointer"
                                                        >
                                                            <!-- toggle -->
                                                            <div class="relative">
                                                            <!-- input -->
                                                            <input :type="ele.type" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :id="ele.name" class="sr-only" v-model="ele.value" v-bind="field" :disabled="evaluate? true: false"/>
                                                            <!-- line -->
                                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                            <!-- dot -->
                                                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                                            </div>
                                                            <!-- label -->
                                                            <div class="ml-3 text-gray-700 font-medium">
                                                            {{ele.value? 'SI' : 'NO'}}
                                                            </div>
                                                        </label>
                                                    </div>
                                                </Field>
                                            </div>

                                            <!-- default -->
                                            <Field v-if="inputsTypes.INPUTS_DEFAULT.indexOf(a[indexElement2].type) > -1" :value="element[indexElement2].value" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :type="a[indexElement2].type" class="rounded-md py-2 px-3 text-grey-darkest" :disabled="evaluate? true: false" />

                                            <!-- textarea -->
                                            <Field v-if="ele.type == inputsTypes.TEXTAREA" :value="element[indexElement2].value" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :as="ele.type" class="rounded-md py-2 px-3 text-grey-darkest" :disabled="evaluate? true: false" />


                                            <!-- file -->
                                            <Field v-if="ele.type == inputsTypes.FILE" v-slot="{ field }" :type="ele.type" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`">
                                                <div v-if="!evaluate" class="w-full h-full">
                                                    <DragAndDropFile v-bind="field" :accept="ele.accept" :acceptLabel="ele.acceptLabel" />
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

                                            <Field v-if="ele.type == inputsTypes.SELECT" v-slot="{ field }" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :value="element[indexElement2].value">
                                                <VueMultiselect  v-bind="field" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :ref="`${indexElement}-${a[indexElement2].name}`" :id="{ ele, id: `${indexElement}`}" :options="ele.options" :multiple="ele.multiple" :close-on-select="ele.closeOnSelect" :searchable="ele.sercheable" :placeholder="ele.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" @select="getSelectOptions" @remove="removeOptions" :disabled="evaluate? true: false" v-model="element[indexElement2].value" >
                                                </VueMultiselect>
                                            </Field>

                                            <!-- display error -->
                                            <ErrorMessage v-if="a[indexElement2].type != 'observation'" class="text-red-500" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" />

                                            <!-- review -->

                                            <!-- observacion para la fila completa -->
                                            <div v-if="evaluate &&  a[indexElement2].type == 'observation'" class="grid grid-row-2 p-4 rounded-lg" :class="[ action != 'create' && valuesForm[item.name] &&  valuesForm[ item.name ][ indexElement ][ a[ indexElement2 ].name ] == 'rechazado'? 'bg-red-200' : 'bg-blue-200' ]" >
                                                <div class="w-full flex flex-wrap">
                                                    <span class="w-full text-gray-700">
                                                        Correcto?
                                                    </span>
                                                    <!-- <pre>{{a[indexElement2]}}</pre> -->
                                                    <div v-for="(obs, index) in a[indexElement2].options" :key="index">
                                                        <label>
                                                            <Field :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" v-model="element[indexElement2].value"  />
                                                            <span>{{obs.label}}</span>
                                                        </label>
                                                    </div>
                                                    <ErrorMessage class="w-full text-red-500" :name="`${item.name}[${indexElement}].${a[indexElement2].name}`" />
                                                </div>
                                                <div v-show="element[indexElement2].value == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in mt-3">
                                                    <label :for="ele.name" class="mb-2 uppercase text-md text-grey-darkest">{{a[ indexElement2 ].comment.label}} :</label>
                                                    <Field :name="`${item.name}[${indexElement}].${a[ indexElement2 ].comment.name}`" :as="a[ indexElement2 ].comment.type" class="rounded-md py-2 px-3 text-grey-darkest" :value="element[indexElement2].comment" />
                                                    <ErrorMessage class="text-red-500" :name="`${item.name}[${indexElement}].${a[ indexElement2 ].comment.name}`" />

                                                </div>

                                            </div>
                                            <!-- Display error to evaluate -->
                                            <span role="alert" class="text-red-500" v-if="action != 'create' && !evaluate && element[indexElement2].value == 'rechazado' "> OBSERVACIÓN: {{element[indexElement2].comment}}</span>

                                            <!-- observacion para cada elemento -->
                                            <!-- <div v-if="evaluate &&  a[indexElement2].observation" class="grid grid-row-2 p-4 rounded-lg" :class="[ valuesForm[ a[ indexElement2 ].observation ] != 'rechazado'? 'bg-blue-200' : 'bg-red-200' ]" >
                                                <div class="w-full flex flex-wrap">
                                                    <span class="w-full text-gray-700">
                                                        Correcto?
                                                    </span>
                                                    <div v-for="(obs, index) in a[indexElement2].observation.options" :key="index">
                                                        <label>
                                                            <Field :name="a[indexElement2].observation.name" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" />
                                                            <span>{{obs.label}}</span>
                                                        </label>
                                                    </div>
                                                    <ErrorMessage class="w-full text-red-500" :name="a[indexElement2].observation.name" />
                                                </div>
                                                <div v-show="valuesForm[`ele.observation-${indexElement2}.name`] == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in">
                                                    <label :for="ele.name" class="mb-2 uppercase text-md text-grey-darkest">{{`ele.observation-${indexElement2}.comment.label`}} :</label>
                                                    <Field :name="`ele.observation-${indexElement2}.comment.name`" :as="`ele.observation-${indexElement2}.comment.type`" class="rounded-md py-2 px-3 text-grey-darkest" :value="`ele.observation-${indexElement2}.comment.value`" />
                                                    <ErrorMessage class="text-red-500" :name="`ele.observation-${indexElement2}.comment.name`" />

                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                </fieldset>

                                <div v-if="evaluate? false: true" class="flex justify-center pt-9">
                                    <button type="button" class="bg-blue-500 hover:bg-blue-800 rounded text-white px-2 py-1" @click="addNewRow(item, col.inputs)">+ Agregar registro</button>
                                </div>
                            </template>


                            <!-- EDIT TABLE -->
                            <template v-if="item.type == inputsTypes.TABLE">
                               <!-- <DTable :table="item" :ref="item.name" /> -->
                                <div class="container flex justify-center mx-auto ">
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <div class="border-b border-gray-200 shadow">


                                                <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
                <th v-if="item.verticalTitle" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
                <th v-for="(title, index) in item.horizontalTitle" :key="index" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                    {{ title }}
                </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200" v-for="(nameTitle, index2) in item.verticalTitle" :key="index2">
            <tr v-for="(element, indexElement) in item.element" :key="indexElement" >
                <td v-if="item.verticalTitle" class="px-6 py-4 whitespace-nowrap border-r border-gray-200 shadow">
                    <div class="flex items-center">
                        {{ nameTitle }}
                    </div>
                </td>
                 <td v-for="(ele, indexElementTable2) in element" :key="indexElementTable2" class="px-6 py-4 whitespace-nowrap">
                    <div v-bind="field" class="flex items-center">
                        <Field v-if="ele.type !== inputsTypes.SELECT" :value="ele.value" :name="`${ele.name}[${index2}][${indexElement}].${ele.name}`" :type="ele.type" class="inp" :disabled="action != 'create' && (evaluate) ? true: false" />
                        <!-- <Field v-if="ele.type == inputsTypes.SELECT" v-slot="{ field }" :name="`${ele.name}[${index2}][${indexElement}].${ele.name}`" :value="ele.value">
                            <VueMultiselect  v-bind="field" :name="`${eele.name}[${index2}][${indexElement}].${ele.name}`" :ref="`${ele.name}[${index2}][${indexElement}].${ele.name}`" :id="{ ele, id: `${indexElementTable2}`}" :options="ele.options" :multiple="ele.multiple" :close-on-select="ele.closeOnSelect" :searchable="ele.sercheable" :placeholder="ele.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" @select="getSelectOptions" @remove="removeOptions" :disabled="evaluate? true: false" v-model="element[indexElement2].value" >
                            </VueMultiselect>
                        </Field> -->
                        <ErrorMessage class="text-red-500" :name="ele.name" />
                    </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

                                                <!-- <table class="divide-y divide-gray-300 table-fixed">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th v-if="item.verticalTitle" class="px-6 py-2 text-xs text-gray-500"></th>
                                                            <th v-for="(title, index) in item.horizontalTitle" :key="index" class="px-6 py-2 text-xs text-gray-500 w-1/6">
                                                                {{ title }}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-300">
                                                        <fieldset >
                                                            <tr class="whitespace-nowrap" v-for="(nameTitle, index2) in item.verticalTitle" :key="index2">
                                                                <td v-if="item.verticalTitle" class="border-r border-gray-200 shadow px-4">{{ nameTitle }}</td>
                                                                <td class="px-6 py-4" v-for="(td, indexHorizontalTitle) in item.horizontalTitle" :key="indexHorizontalTitle">
                                                                    <div class="text-sm" v-for="(element, indexElementTable1) in item.element" :key="indexElementTable1">
                                                                        <div v-bind="field" v-for="(ele, indexElementTable2) in element" :key="indexElementTable2">
                                                                            <Field :value="ele.value" :name="`${ele.name}[${index2}][${indexHorizontalTitle}].${ele.name}`" :type="ele.type" class="inp" :disabled="action != 'create' && (evaluate) ? true: false" />
                                                                            <ErrorMessage class="text-red-500" :name="ele.name" />
                                                                        </div>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </fieldset>
                                                    </tbody>
                                                </table> -->
                                                <!-- Display error to evaluate -->
                                                <!-- <span role="alert" class="text-red-500" v-if="item.type != inputsTypes.LIST && action != 'create' && !evaluate && item.observation.value == 'rechazado' "> OBSERVACIÓN: {{item.observation.comment.value}}</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <!-- review -->
                            <div class="grid grid-rows-2 grid-flow-col p-4 mt-5 rounded-lg" v-if="evaluate &&  item.observation && item.type != inputsTypes.LIST" :class="[action != 'create' && valuesForm[item.observation.name] != 'rechazado'? 'bg-blue-200' : 'bg-red-200' ]">
                                <div class="w-full flex flex-wrap">
                                    <span class="w-full text-gray-700">
                                        Correcto?
                                    </span>
                                    <div v-for="(obs, index) in item.observation.options" :key="index">
                                        <label>
                                            <Field :name="item.observation.name" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" v-model="item.observation.value"/>
                                            <span>{{obs.label}}</span>
                                        </label>
                                    </div>
                                    <ErrorMessage class="w-full text-red-500" :name="item.observation.name" />
                                </div>
                                <div v-show="action != 'create' && valuesForm[item.observation.name] == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in">
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
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

import DragAndDropFile from "./DragAndDropFile.vue";
import { Form, Field, ErrorMessage } from 'vee-validate';
import inputsTypes from '../../../../helpers/enums/inputsTypes';
import VueMultiselect from 'vue-multiselect';
import DTable from './DynamicTable.vue';

import { provide } from 'vue'

export default {
    components: {
        AppLayout,
        Form,
        Field,
        ErrorMessage,
        VueMultiselect,
        DragAndDropFile,
        DTable
    },
    props: {
        formSchema: {
            require: true,
            type: Array,
            default: []
        },
        evaluate: {
            require: true,
            type: Boolean,
        },
        action: {
            require: true,
            type: String,
        },
        valuesForm: {
            require: true,
        },
        // errorEvaluation: {
        //     require: true,
        //     type: Array
        // }
    },
    provide() {
        return {
            columnsTable: this.columnsTable
        };
    },
    data() {
        const statusColors = {
            'aprobado': 'border-green-500 pl-14',
            'rechazado': 'border-red-500',
            'sin evaluar': ''
        }

        return {
            inputsTypes: inputsTypes,
            statusColors,
            columnsTable: {
                value: []
            }
        };
    },

    methods: {
        async getOptions(value, element) {
            if(!item.async) {
                this.getSelectOptions(value, element);
            } else {
                await this.getAsyncOptionsSelect(value, element);
            }
        },
        getSelectOptions(value, element) {

            if(!element.ele.inputDepends) return;

            const elementChange = element.ele.inputDepends;
            for (let index = 0; index < elementChange.length; index++) {
                const elementDepends = elementChange[index];

                const options = element.ele.optionsDepends[value.value];

                this.$refs[`${element.id}-${elementDepends}`].options.splice(0,this.$refs[`${element.id}-${elementDepends}`].options.length);
                this.$refs[`${element.id}-${elementDepends}`].select({})

                for (let index = 0; index < options.length; index++) {
                    const opt = options[index];
                    this.$refs[`${element.id}-${elementDepends}`].options.push(opt);
                }

            }
        },
        removeOptions(value, element) {

            if(!element.ele.inputDepends) return;

            const elementChange = element.ele.inputDepends;
            for (let index = 0; index < elementChange.length; index++) {
                const elementDepends = elementChange[index];

                const options = element.ele.optionsDepends[value.value];

                this.$refs[`${element.id}-${elementDepends}`].options.splice(0,this.$refs[`${element.id}-${elementDepends}`].options.length);
                this.$refs[`${element.id}-${elementDepends}`].select({})

            }

        },
        removeRowDynamic(item, indexDelete, inputs) {
            if(item.childrens.length == 1) {
                return
                // this.addNewRow(item);
            }
            item.childrens.splice(indexDelete, 1);


            if(!item.componentDepends) return

            const depend = inputs.find( e => e.name == item.componentDepends[0].component);

            depend[item.componentDepends[0].element].splice(indexDelete, 1);

            // alert(JSON.stringify(item.childrens, null, 2));
        },
        addNewRow(item, inputs) {
            const indexChildrens = item.childrens.length - 1;

            const values = this.valuesForm[item.name][indexChildrens];
            const row = JSON.parse(JSON.stringify(item.childrens[0]));
            for (let index = 0; index < row.length; index++) {
                row[index].value = null;
            }
            row[0].id = null;
            item.childrens = [...item.childrens, row ];

            if(item.componentDepends?.length > 0) {
                this.addColumnsTable({ componentDepends: item.componentDepends, row, inputs, values})
                // this.columnsTable.value.push(item.childrens[0]);
            }
        },
        addColumnsTable({componentDepends, row, inputs, values}) {
            if(!componentDepends) return

            componentDepends.forEach( comp => {
                const depend = inputs.find( e => e.name == comp.component);
                const variableTitleCell = row.find( e => e.name == comp.titleCell);
                depend[comp.element].push(values[variableTitleCell.name].label);
            })
            // this.columnsTable.value.push(rows[0]);
        },
        async getAsyncOptionsSelect(value, element){
            // console.log(element);
            if(!element || !element.inputDepends || element.inputDepends.length == 0) return;

            const elementChange = element.inputDepends;
            for (let index = 0; index < elementChange.length; index++) {
                if(value) {
                    const elementDepends = elementChange[index];

                    this.$refs[elementDepends].isLoading = true;
                    try {
                        const response = await axios.get(`${element.asyncUrl}/${value.value}`);

                    //     this.countries = response
                    //     this.isLoading = false

                        // this.$refs[elementDepends].options.splice(0,this.$refs[elementDepends].options.length);
                        // this.$refs[elementDepends].select({})

                        for (let index = 0; index < element.inputClearDepends.length; index++) {
                            const clear = element.inputClearDepends[index];
                            this.$refs[clear].options.splice(0,this.$refs[clear].options.length);
                            this.$refs[clear].select({})

                        }

                        for (let index = 0; index < response.data.length; index++) {
                            const opt = response.data[index];
                             this.$refs[elementDepends].options.push(opt);
                        }

                        this.$refs[elementDepends].isLoading = false;
                    } catch (error) {

                    }
                }
            }


        },

        getValueInput(elementArray, value) {
            const element = elementArray.find(e => e.value == value);
            return element? element : {}
        },

    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css" scoped></style>
<style scoped>

input:checked ~ .dot {
  transform: translateX(100%);
  background-color: #48bb78;
}

/* input[type="checkbox"] {
    -webkit-appearance: none;
    appearance: none;
    width: 100px;
    height: 40px;
    border: 2px solid #d9d9d9;
    outline: none;
    border-radius: 30px;
    transition: .3s;
}
input[type="checkbox"]::before {
    content: "";
    position: absolute;
    top: 6px;
    left: 7px;
    width: 34px;
    height: 34px;
    background: #cccccc;
    border-radius: 50%;
    transition: .3s ease;
}
input[type="checkbox"]:checked:before {
   transform: translateX(60px);
   background: #3399ff;
}
input[type="checkbox"]:checked {
   transform: translateX(60px);
   background: #3399ff;
} */

.btn-close-row {
    /* position: absolute; */
    /* right: 36px; */
    transform: translate(110%, -45%);
    float: right;
    z-index: 100;
    cursor: pointer;

}

.inp {
    border:none;
    border-bottom: 1px solid #1890ff;
    padding: 5px 10px;
    outline: none;
}

[placeholder]:focus::-webkit-input-placeholder {
    transition: text-indent 0.4s 0.4s ease;
    text-indent: -100%;
    opacity: 1;
}

</style>
