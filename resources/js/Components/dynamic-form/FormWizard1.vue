<template>
<div>
    dasdadasdasd
    <div class="block w-full text-center text-grey-darkest text-2xl p-10">
        {{ titleForm }}
    </div>

    <div class="flex">
        <div class="w-1/4">
        <div class="relative mb-2">
            <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-white w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
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
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
            </div>
            </div>

            <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-white w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"/>
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
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 33%;"></div>
            </div>
            </div>

            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-gray-600 w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
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
                <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
            </div>
            </div>

            <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
            <span class="text-center text-gray-600 w-full">
                <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                </svg>
            </span>
            </div>
        </div>

        <div class="text-xs text-center md:text-base">Finished</div>
        </div>
    </div>

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
    setup: async (props) => {
        const currentStep = ref(0);
        const formValues = reactive({});

        const module = await import(`../../../../helpers/formularios/${props.province}`)
        const formSchema = module.getFormSchema(props.builder, props.evaluate, props.dataForm);

        let yepSchemas = [];
        for (let index = 0; index < formSchema.length; index++) {
            yepSchemas.push([formSchema[index]].reduce(createYupSchema, {}, props.evaluate));

        }
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

        function nextStep(values) {
        if (currentStep.value === 3) {
            console.log("Done: ", JSON.stringify(formValues, null, 2));
            return;
        }

        // accumlate the form values with the values from previous steps
        Object.assign(formValues, values);
        console.log("Current values: ");
        console.log(JSON.stringify(formValues, null, 2));
        currentStep.value++;
        }

        function prevStep() {
        if (currentStep.value <= 0) {
            return;
        }

        currentStep.value--;
        }

        async function getOptions(value, element) {
            if(!item.async) {
                this.getSelectOptions(value, element);
            } else {
                await this.getAsyncOptionsSelect(value, element);
            }
        }
        function getSelectOptions(value, element) {

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
        }
        function removeOptions(value, element) {

            if(!element.ele.inputDepends) return;

            const elementChange = element.ele.inputDepends;
            for (let index = 0; index < elementChange.length; index++) {
                const elementDepends = elementChange[index];

                const options = element.ele.optionsDepends[value.value];

                this.$refs[`${element.id}-${elementDepends}`].options.splice(0,this.$refs[`${element.id}-${elementDepends}`].options.length);
                this.$refs[`${element.id}-${elementDepends}`].select({})

            }

        }
        function removeRowDynamic(item, indexDelete) {
            if(item.childrens.length == 1) {
                this.addNewRow(item);
            }
            item.childrens.splice(indexDelete, 1);
            // alert(JSON.stringify(item.childrens, null, 2));
        }
        function onSubmit(values) {
            // Submit values to API...
            alert(JSON.stringify(values, null, 2));
            // console.log(values);
            this.$emit('valuesForm', values);

        }

        function addNewRow(item) {
            const row = JSON.parse(JSON.stringify(item.childrens[0]));
            for (let index = 0; index < row.length; index++) {
                row[index].value = null;
            }
            item.childrens = [...item.childrens, row ];
        }

        async function getAsyncOptionsSelect(value, element){
            console.log(element);
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

        }

        return {
            currentStep,
            currentSchema,
            prevStep,
            formValues,
            nextStep,

            formSchema,
            getOptions,
            getSelectOptions,
            removeOptions,
            removeRowDynamic,
            onSubmit,
            addNewRow,
            getAsyncOptionsSelect,
        };
    },
    // data() {
    //     return {
    //         title: this.$props.titleForm,
    //         inputsTypes: inputsTypes,
    //         formSchema: [],
    //         validateSchema: yup.object().shape({}),
    //         yepSchema: {},
    //         // initialValues: { ...this.$props.schema }
    //     };
    // },
    // methods: {
    //     async getOptions(value, element) {
    //         if(!item.async) {
    //             this.getSelectOptions(value, element);
    //         } else {
    //             await this.getAsyncOptionsSelect(value, element);
    //         }
    //     },
    //     getSelectOptions(value, element) {

    //         if(!element.ele.inputDepends) return;

    //         const elementChange = element.ele.inputDepends;
    //         for (let index = 0; index < elementChange.length; index++) {
    //             const elementDepends = elementChange[index];

    //             const options = element.ele.optionsDepends[value.value];

    //             this.$refs[`${element.id}-${elementDepends}`].options.splice(0,this.$refs[`${element.id}-${elementDepends}`].options.length);
    //             this.$refs[`${element.id}-${elementDepends}`].select({})

    //             for (let index = 0; index < options.length; index++) {
    //                 const opt = options[index];
    //                 this.$refs[`${element.id}-${elementDepends}`].options.push(opt);
    //             }

    //         }
    //     },
    //     removeOptions(value, element) {

    //         if(!element.ele.inputDepends) return;

    //         const elementChange = element.ele.inputDepends;
    //         for (let index = 0; index < elementChange.length; index++) {
    //             const elementDepends = elementChange[index];

    //             const options = element.ele.optionsDepends[value.value];

    //             this.$refs[`${element.id}-${elementDepends}`].options.splice(0,this.$refs[`${element.id}-${elementDepends}`].options.length);
    //             this.$refs[`${element.id}-${elementDepends}`].select({})

    //         }

    //     },
    //     removeRowDynamic(item, indexDelete) {
    //         if(item.childrens.length == 1) {
    //             this.addNewRow(item);
    //         }
    //         item.childrens.splice(indexDelete, 1);
    //         // alert(JSON.stringify(item.childrens, null, 2));
    //     },
    //     onSubmit(values) {
    //         // Submit values to API...
    //         alert(JSON.stringify(values, null, 2));
    //         // console.log(values);
    //         this.$emit('valuesForm', values);

    //     },

    //     addNewRow(item) {
    //         const row = JSON.parse(JSON.stringify(item.childrens[0]));
    //         for (let index = 0; index < row.length; index++) {
    //             row[index].value = null;
    //         }
    //         item.childrens = [...item.childrens, row ];
    //     },

    //     async getAsyncOptionsSelect(value, element){
    //         console.log(element);
    //         if(!element || !element.inputDepends || element.inputDepends.length == 0) return;

    //         const elementChange = element.inputDepends;
    //         for (let index = 0; index < elementChange.length; index++) {
    //             if(value) {
    //                 const elementDepends = elementChange[index];

    //                 this.$refs[elementDepends].isLoading = true;
    //                 try {
    //                     const response = await axios.get(`${element.asyncUrl}/${value.value}`);

    //                 //     this.countries = response
    //                 //     this.isLoading = false

    //                     // this.$refs[elementDepends].options.splice(0,this.$refs[elementDepends].options.length);
    //                     // this.$refs[elementDepends].select({})

    //                     for (let index = 0; index < element.inputClearDepends.length; index++) {
    //                         const clear = element.inputClearDepends[index];
    //                         this.$refs[clear].options.splice(0,this.$refs[clear].options.length);
    //                         this.$refs[clear].select({})

    //                     }

    //                     for (let index = 0; index < response.data.length; index++) {
    //                         const opt = response.data[index];
    //                          this.$refs[elementDepends].options.push(opt);
    //                     }

    //                     this.$refs[elementDepends].isLoading = false;
    //                 } catch (error) {

    //                 }
    //             }
    //         }


    //     }

    // },
    // async mounted() {
    //     const module = await import(`../../../../helpers/formularios/${this.$props.province}`)
    //     this.formSchema = module.getFormSchema(this.$props.builder, this.$props.evaluate, this.$props.dataForm);

    //     this.yepSchema = this.formSchema.reduce(createYupSchema, {}, this.$props.evaluate);

    //     this.validateSchema = yup.object().shape(this.yepSchema);
    // },
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
