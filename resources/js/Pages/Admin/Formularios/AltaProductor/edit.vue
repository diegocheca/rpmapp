<script setup>
  import AppLayout from "@/Layouts/AppLayoutAdmin";
  import { reactive, ref, computed, onMounted } from "vue";
  import dataFormJson from "./jsonForm.json"
  import VueMultiselect from 'vue-multiselect'
  import { Form, Field, ErrorMessage } from 'vee-validate';
  import Toggle from "@vueform/toggle";


  const props = defineProps({
    currentRole: String,
    allRoles: Array
  })
 const dataJson = reactive( dataFormJson["alta_productor"]["editar"] )
 const roles = props.allRoles.map(e => { return { label: e.name, value: e.id }})
 const data = reactive({
   rol: "Productor",
   jsonSelections: []
 })
 console.log(roles);

  const activetab = ref(1)
  const categorias = [
    {
      description: 'Nuevo',
      id: 1
    },
      {
      description: 'Editar',
      id: 2
    }
  ]

  const getRoleSelect = (value) => {
    console.log(value)
    data.rol = value.label
  }
  const filterCategory = computed(() => {
    return []
      // return this.permisos.filter(
      //   (item, index) => item.category_id === this.activetab
      // );
  })


</script>
<template>
  <AppLayout>
    <div>
      <h1
        class="
          text-center text-2xl
          font-bold
          leading-7
          text-gray-300
          sm:text-3xl
          sm:truncate
          py-1
          bg-gradient-to-l
          from-indigo-500
          to-indigo-800
        "
      >
        Editar Roles
      </h1>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <Form @submit="onSubmit" :validation-schema="currentSchema" v-slot="{ values, errors }">
              <div class="grid grid-cols-1 mt-5 mx-7">
                <div class="mb-3">
                  <label
                    class="
                      uppercase
                      md:text-sm
                      text-xs text-gray-500 text-light
                      font-semibold
                    "
                    >Listados de Permisos</label
                  >
                </div>
                <div style="bg-white">
                  <Field v-slot="{ field }"
                      name="rol"
                      
                    >
                    <!-- :value="item.value" -->
                      <VueMultiselect
                      class="w-5"
                      v-bind="field"
                      id="rol"
                      :options="roles"
                      ref="rol"
                      :multiple="false"
                      :close-on-select="true"
                      placeholder="Selecciona un rol"
                      label="label"
                      track-by="value"
                      selectLabel="Presiona para seleccionar"
                      deselectLabel="Presiona para quitarlo"
                      @select="getRoleSelect"
                      />
                       <!-- :id="item"
                      :value="item.value"
                      :options="item.options"
                      :ref="item.name"
                      :multiple="item.multiple"
                      :loading="item.isLoading? item.isLoading : false"
                      :close-on-select="item.closeOnSelect"
                      :searchable="item.searchable"
                      :placeholder="item.placeholder"
                      label="label"
                      track-by="value"
                      selectLabel="Presiona para seleccionar"
                      deselectLabel="Presiona para quitarlo"
                      :disabled="action != 'create' && (evaluate || item.observation.value == 'aprobado')? true: false"
                      @select="getAsyncOptionsSelect" @input="getAsyncOptionsSelect" -->
                    </Field>
                  <ul class="flex cursor-pointer">
                    <div class="w-full sm:w-1/2" v-for="(categoria, index) in categorias" :key="index">
                      <li
                        v-on:click="activetab = categoria.id"
                        v-bind:class="[
                          activetab === categoria.id
                            ? 'active border-gray-400 text-white bg-blue-700 font-black'
                            : '',
                        ]"
                        class="
                          py-2
                          px-6
                          bg-white
                          rounded-t-lg
                          text-gray-500
                          focus:outline-none
                          border-2
                          border-blue-200
                          hover:text-white
                          hover:border-b-2
                          hover:font-medium
                          hover:bg-blue-700
                          hover:border-gray-400
                          hover:font-black
                        "
                      >
                        {{ categoria.description }}
                      </li>
                    </div>
                  </ul>
                </div>
                <div
                  class="content"
                  v-for="(categoria, index) in categorias"
                  :key="index"
                >
                  <div v-if="activetab === categoria.id" class="tabcontent">
                    <div class="flex flex-col mt-5 mx-7">
                      <div class="bg-white rounded-2xl border-2 border-indigo-400 p-8 my-4" v-for="(pagina, indexDataForm) in dataJson[data.rol]" :key="indexDataForm">
                        <div class="text-gray-800 text-2xl font-bold mb-5">{{pagina.title}}</div>
                        <div class="w-full flex flex-wrap">
                          
                          <div class="border-2 w-1/2 p-3" v-for="(item, indexItem) in pagina.inputs" :key="indexItem" >
                            <div class="text-gray-800 text-lg font-bold mb-5">{{item.label}}:</div>
                            <div class="flex flex-row justify-center space-x-2">
                              <div v-for="(checkValidation, indexValidation) in item.validations" :key="indexValidation">
                                <Field v-slot="{ field }" :name="item.name" >
                                  <div class="text-base">
                                    {{checkValidation.label}}
                                    <Toggle
                                        v-bind="field"
                                        :ref="checkValidation.name"
                                        :name="checkValidation.name"
                                        on-label="SI"
                                        off-label="NO"
                                    />
                                    <!-- v-model="item.value"
                                      v-bind="field"
                                      ref="toggle"
                                      :name="item.name"
                                      :on-label="item.labelOn"
                                      :off-label="item.labelOff"
                                      :disabled="action != 'create' && (evaluate || item?.observation?.value == 'aprobado') || status == 'aprobado' ? true: false"
                                      @change="handleHiddenComponent(item, col.inputs)" -->
                                  </div>
                                          <!-- <div class="flex items-center justify-center w-full mb-12"> -->
                                </Field>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div>
                        <div class="grid grid-cols-4 grid-rows-3 gap-1">
                          <div
                            v-for="(data, index) in dataJson"
                            :key="index"
                          >
                            <label>
                                <!-- :id="permiso.name"
                                :value="permiso.id"
                                name="rol"
                                checked="false"
                                type="checkbox"
                                class="mr-1"
                                v-model="form.checkedpermisos" -->
                              <input
                              />
                              <!-- {{ permiso.description }} -->
                            </label>
                          </div>
                        </div>
                        <br />
                        <!-- <span v-if="hasAnyPermission(['dev.dev.show'])">Permisos ID: {{ form.checkedpermisos }}</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                <inertia-link
                  :href="route('admin.roles.index')"
                  class="
                    w-auto
                    bg-gray-500
                    hover:bg-gray-700
                    rounded-lg
                    shadow-xl
                    font-medium
                    text-white
                    px-4
                    py-2
                  "
                  type="button"
                >
                  Cancelar
                </inertia-link>
                <button
                  type="submit"
                  class="
                    w-auto
                    bg-purple-500
                    hover:bg-purple-700
                    rounded-lg
                    shadow-xl
                    font-medium
                    text-white
                    px-4
                    py-2
                  "
                >
                  Guardar
                </button>
              </div>
            </Form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
// import AppLayout from "@/Layouts/AppLayoutAdmin";
// import { reactive } from "vue";
// export default {
//   components: {
//     AppLayout,
//   },
//   props: {
//     currentRole: String,
//   },
//   setup() {
//     const dataForm = reactive({})
//     const categorias = [
//       {
//         description: 'Nuevo',
//         id: 1
//       },
//        {
//         description: 'Editar',
//         id: 2
//       }
//     ]
//     return {
//       activetab: 1,
//       dataForm,
//       categorias
//     }
//   },
//   // data() {
//   //   return {
//   //     form: {
//   //       name: this.$props.roles.name,
//   //       checkedpermisos: [],
//   //     },
//   //     activetab: 1,
//   //   };
//   // },
//   computed: {
//     filterCategory() {
//       return []
//       // return this.permisos.filter(
//       //   (item, index) => item.category_id === this.activetab
//       // );
//     },
//   },
//   async mounted() {
//     this.dataForm = await import(`./jsonForm.json`)
//     console.log(this.dataForm['alta_productor']['alta'][this.currentRole]);
//   },
//   methods: {
//     // submit() {
//     //   this.$inertia.put(
//     //     route("admin.roles.update", this.$props.roles.id),
//     //     this.form
//     //   );
//     // },
//   },
// };
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style src="@vueform/toggle/themes/default.css"></style>
