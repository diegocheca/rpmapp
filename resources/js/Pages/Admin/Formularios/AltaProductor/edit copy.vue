<script setup>
  import AppLayout from "@/Layouts/AppLayoutAdmin";
  import { reactive, ref, computed, onMounted } from "vue";
const asd = await import(`./jsonForm.json`)
 const dataForm = reactive( asd )
 console.log(dataForm);
  const props = defineProps({
    currentRole: String,
  })

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
  const filterCategory = computed(() => {
    return []
      // return this.permisos.filter(
      //   (item, index) => item.category_id === this.activetab
      // );
  })


</script>
<template>
  <AppLayout>
    <Suspense>
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
            <form @submit.prevent="submit" class="mb-6">
             
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
                      asd {{dataForm.cards}}
                      <div class="bg-white rounded-2xl border-2 border-indigo-400 p-8 my-4 mx-auto" v-for="(data, indexDataForm) in dataForm" :key="indexDataForm">
                        {{indexDataForm}}
                        <div v-for="(item, indexItem) in dataForm[indexDataForm]" :key="indexItem" >
                          {{item.disabled}}
                        </div>
                      </div>
                      <div>
                        <div class="grid grid-cols-4 grid-rows-3 gap-1">
                          <div
                            v-for="(data, index) in dataForm"
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
            </form>
          </div>
        </div>
      </div>
    </div>
    </Suspense>
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