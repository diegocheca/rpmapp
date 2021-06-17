<template>
  <app-layout>
        <div class="block w-full text-center text-grey-darkest text-2xl p-10">
          {{ title }}
        </div>
        <Form @submit="onSubmit" :validation-schema="schema" v-slot="{ values }">
            <div class="items-center bg-teal-lighter">
                <div v-for="(row, indexRow) in formSchemaReinscription.form" :key="indexRow" class="flex flex-col" :class="row.widthResponsive">
                    <div v-for="(col, indexCol) in row.body" :key="indexCol" class="bg-white rounded shadow-lg p-8 m-4"
                    :class="col.width">
                        <div class="font-bold text-lg">{{col.title}}</div>
                        <hr class="my-5">
                        <div class="grid gap-4 " :class="[col.columns, col.columnsResponsive]">
                            <div v-for="(item, indexItem) in col.inputs" :key="indexItem" class="mb-4" >
                                <div class="flex flex-col">
                                    <label for="item.name" class="mb-2 uppercase text-md text-grey-darkest">{{item.label}} :</label>
                                    <!-- checkbox -->
                                    <div v-if="item.type == 'checkbox'">



                                            <Field v-slot="{ field }" :type="item.type" :name="item.name" >
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                                <input :type="item.type" :name="item.name" :id="item.name" v-bind="field" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" :v-model="item.value" :value="item.value"  />
                                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                            </Field>






                                            <!-- <input :type="item.type" :name="item.name" :id="item.name" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" :value="item.value" v-model="item.value"/>
                                            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label> -->
                                        <label for="toggle" class="text-xs text-gray-700">{{item.value? 'SI' : 'NO'}}</label>
                                    </div>

                                    <!-- not checkbox -->
                                    <Field v-if="item.type != 'checkbox'" :value="item.value" :name="item.name" :type="item.type" class="rounded-md py-2 px-3 text-grey-darkest" />
                                    <ErrorMessage class="text-red-500" :name="item.name" />


                                    <!-- review -->
                                    <div class="grid grid-rows-2 grid-flow-col p-4 mt-5 bg-blue-100 rounded-lg"  v-if="evaluate &&  item.observation">
                                        <div class="w-full flex flex-wrap">
                                            <span class="w-full text-gray-700">
                                                Correcto?
                                            </span>
                                            <!-- inputs radio -->
                                            <div v-for="(obs, index) in item.observation.options" :key="index" >
                                                <label>
                                                    <Field :name="obs.name" :type="obs.type" class="mx-2 text-grey-darkest" :value="obs.value" />
                                                    <span>{{obs.label}}</span>
                                                </label>
                                            </div>
                                            <ErrorMessage class="w-full text-red-500" :name="item.observation.options[0].name" />
                                        </div>
                                        <!-- textarea -->
                                        <div v-show="values[item.observation.options[0].name] == 'rechazado'" class="w-full flex flex-col transition duration-500 ease-in">
                                            <label for="item.name" class="mb-2 uppercase text-md text-grey-darkest">{{item.observation.comment.label}} :</label>
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
            {{ values }}
            <button type="submit">Submit</button>
        </Form>
    <!-- <div class="flex items-center h-full w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Editar reinscripciones
        </h1>
        <form @submit.prevent="submit" class="mb-6">

          <button
            type="submit"
            class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
          >
            Editar
          </button>

          <inertia-link
              :href="route('productos.index')"
              class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900"
            >
              Volver
            </inertia-link>

        </form>
      </div>
    </div> -->
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import { Reinscripciones, yupSquema } from '../../../../helpers/formularios/sanjuan/reinscripciones';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';

export default {
    components: {
        AppLayout,
        Form,
        Field,
        ErrorMessage
    },

    props: [
      "reinscripcion",
      "titleForm",
      "evaluate"
    ],
    data() {
        const schema = yupSquema;
        return {
            title: this.$props.titleForm,
            schema,
            formSchemaReinscription: new Reinscripciones(this.$props.reinscripcion),
            initialValues: {...this.$props.reinscripcion}
        };
    },
    methods: {
        onSubmit(values) {
        // Submit values to API...
        alert(JSON.stringify(values, null, 2));
        console.log(values);
        },
        submit() {
        this.$inertia.put(
            route("reinscripciones.update", this.$props.reinscripciones.id),
            this.form
        );
        },
    },
    mounted() {

    },
};
</script>

<style scoped>
/* CHECKBOX TOGGLE SWITCH */
.toggle-checkbox:checked {
  right: 0;
  border-color: #68D391;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: #68D391;
}
</style>
