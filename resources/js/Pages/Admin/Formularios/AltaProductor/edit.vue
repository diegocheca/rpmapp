<script setup>
  import AppLayout from "@/Layouts/AppLayoutAdmin";
  import Loading from '@/Components/Loading.vue';
  import { reactive, ref, computed, onMounted } from "vue";
  import dataFormJson from "./jsonForm.json"
  import VueMultiselect from 'vue-multiselect'
  import { Form, Field, ErrorMessage } from 'vee-validate';
  import Toggle from "@vueform/toggle";
  // import 'tw-elements';
  import axios from "axios";
  import { JSONParser } from "@amcharts/amcharts4/core";
import { each } from "@amcharts/amcharts4/.internal/core/utils/Iterator";
import { forEach } from "lodash";

  const props = defineProps({
    currentRole: String,
    allRoles: Array
  })
  let dataJson = dataFormJson["alta_productor"]
  const activetab = ref("alta")
  const dataSelected = reactive({data: dataJson[activetab.value]})
  const roles = props.allRoles.map(e => { return { label: e.name, value: e.id }})
  const estados = [
    {
      label: "Borrador",
      value: 1
    },{
      label: "En revision",
      value: 2
    },{
      label: "Observado",
      value: 3
    },{
      label: "Corregido",
      value: 4
    },{
      label: "Aprobado",
      value: 5
    },{
      label: "Suspendido",
      value: 6
    },{
      label: "No admitido",
      value: 7
    }
  ]

  const data = reactive({
    rol: {
      label: "",
      value: ""
    },
    estadoSeleccionado: {
      label: "",
      value: ""
    },
    jsonSelections: [],
    permisos_de_api: {}
  })
  const loading = ref(false)
//  console.log(roles);

  const categorias = [
    {
      description: 'Alta',
      id: "alta"
    },
    {
      description: 'Editar',
      id: "editar"
    },
    {
      description: 'Ver',
      id: "ver"
    }
  ]

  const getRoleSelect = (value) => {
    let self = this;
    loading.value = true
    // data.rol = "as"
    console.log("datos\n\n");
    //console.log(data.estadoSeleccionado.label,data.estadoSeleccionado.value );
    console.log(value.label);
    console.log("tab",activetab.value);
    axios
      .post("/admin/get_permisos_form", {
        "id_rol": value.value, "accion": activetab.value, "estado": data.estadoSeleccionado.value
      })
      .then(function (response) {
        if (response.data.status === "success") {
            data.permisos_de_api = JSON.parse(response.data.permisos);
            data.permisos_de_api.map((value, index)=>{
            data.permisos_de_api[index].data = JSON.parse(data.permisos_de_api[index].data);
          });
          data.permisos_de_api.forEach((element, index)=>{
            var pagina = "pagina"+ String(index+1);
            dataJson[activetab.value][value.label][pagina]["inputs"] = element.data; 
          });
          //console.log(data.permisos_de_api[8].data);
        } else {
          console.log("NO todo bien");
        }
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });

    setTimeout(function(){
      data.rol = value
      loading.value = false
    }, 1000);




  }
  const getEstadoSelect = (value) => {
    loading.value = true
    // data.rol = "as"
    // setTimeout(function(){
      data.estadoSeleccionado= value
      loading.value = false
    // }, 1000);

  }
  
  const filterCategory = () => {
    dataSelected.data = dataJson[activetab.value]
    data.rol = {
      label: "",
      value: ""
    }
    estadoSeleccionado= {
      label: "",
      value: ""
    }
  }

  const onSubmit = (values) => {
    values = {
      ...values,
      action: activetab.value
    }
    console.log(values);
    axios
      .post("/admin/altaProductor", {
        values: values,
      })
      .then(function (response) {
        console.log(response.data);
        if (response.data === "se actualizaron los datos correctamente") {
        } else {
          // console.log("NO todo bien");
        }
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
  }
</script>
<template>
  <AppLayout>
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
            <div class="grid grid-cols-1 my-8 mx-7">
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
                      @click="filterCategory()"
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


                  <Field v-slot="{ field }"
                    name="estadoSeleccionado"
                    class="my-5"
                    :value="data.estadoSeleccionado"
                  >
                    <VueMultiselect
                    v-model="data.estadoSeleccionado"
                    class="w-5 my-5"
                    v-bind="field"
                    id="estadoSeleccionado"
                    :options="estados"
                    ref="estadoSeleccionado"
                    :multiple="false"
                    :close-on-select="true"
                    placeholder="Selecciona un rol"
                    label="label"
                    track-by="value"
                    selectLabel="Presiona para seleccionar"
                    deselectLabel="Presiona para quitarlo"
                    @select="getEstadoSelect"
                    />
                  </Field>


                  <Field v-slot="{ field }"
                    name="rol"
                    class="my-5"
                    :value="data.rol"
                  >
                    <VueMultiselect
                    v-model="data.rol"
                    class="w-5 my-5"
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
                  </Field>

                 

                  <loading v-if="loading" />
                  <div v-else class="flex flex-col mt-5 mx-7">
                    <div class="accordion" id="accordionPages">
                      <!-- {{dataSelected.data}} -->
                      <div v-for="(pagina, indexDataForm) in dataSelected.data[data.rol.label]" :key="indexDataForm" class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" :id="`headingPages${indexDataForm}`">
                          <button class="
                            accordion-button
                            collapsed
                            relative
                            flex
                            items-center
                            w-full
                            py-4
                            px-5
                            text-base text-gray-800 text-left
                            bg-white
                            border-0
                            rounded-none
                            transition
                            focus:outline-none
                          " type="button" data-bs-toggle="collapse" :data-bs-target="`#collapsePages${indexDataForm}`" aria-expanded="false"
                            :aria-controls="`collapsePages${indexDataForm}`">
                            <div class="text-gray-800 text-2xl font-bold mb-5">{{pagina.title}}</div>
                          </button>
                        </h2>
                        <div :id="`collapsePages${indexDataForm}`" class="accordion-collapse collapse" :aria-labelledby="`headingPages${indexDataForm}`"
                          data-bs-parent="#accordionPages">
                          <div class="accordion-body py-4 px-5 ">
                            <div class="accordion" id="accordionInputs">
                              <div v-for="(item, indexItem) in pagina.inputs" :key="indexItem" class="accordion-item bg-white border border-gray-200">
                                <h2 class="accordion-header mb-0" :id="`headingInputs${indexDataForm}-${indexItem}`">
                                  <button class="
                                    accordion-button
                                    collapsed
                                    relative
                                    flex
                                    items-center
                                    w-full
                                    py-4
                                    px-5
                                    text-base text-gray-800 text-left
                                    bg-white
                                    border-0
                                    rounded-none
                                    transition
                                    focus:outline-none
                                  " type="button" data-bs-toggle="collapse" :data-bs-target="`#collapseInputs${indexDataForm}-${indexItem}`" aria-expanded="false"
                                    :aria-controls="`collapseInputs${indexDataForm}-${indexItem}`">
                                    {{item.label}}
                                  </button>
                                </h2>
                                <div :id="`collapseInputs${indexDataForm}-${indexItem}`" class="accordion-collapse collapse" :aria-labelledby="`headingInputs${indexDataForm}-${indexItem}`"
                                  data-bs-parent="#accordionInputs">
                                  <div class="accordion-body py-4 px-5 flex flex-col space-y-2">
                                    <div v-for="(checkValidation, indexValidation) in item.validations" :key="indexValidation">
                                      <Field v-slot="{ field }" :name="checkValidation.name" >
                                        <div class="text-base flex justify-between px-4">
                                          {{checkValidation.label}}
                                          <Toggle
                                              v-model="checkValidation.value"
                                              v-bind="field"
                                              :ref="checkValidation.name"
                                              :name="checkValidation.name"
                                              on-label="SI"
                                              off-label="NO"
                                          />
                                        </div>
                                      </Field>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex justify-end md:gap-8 gap-4 py-12 pr-5">
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
  </AppLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style src="@vueform/toggle/themes/default.css"></style>
