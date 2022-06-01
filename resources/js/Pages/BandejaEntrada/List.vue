<template>
<AppLayout>
  <body class="h-screen flex flex-col">
  <div class="flex flex-1 overflow-hidden">
    <main class="flex-1 flex bg-gray-200">
      <div class="relative flex flex-col w-full max-w-xs flex-grow border-l border-r bg-gray-200">
        <div class="flex-1 overflow-y-auto bg-white h-screen">
          <div
            v-if="data.productors.length == 0"
            class="w-full flex flex-col justify-center items-center text-gray-400 px-6 pt-3 pb-4"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              <p class="text-2xl">No hay productores inscriptos</p>
            </div>
          <a v-for="(item, index) in data.productors" :key="index" href="#" class="block px-6 pt-3 pb-4" :class="{'bg-indigo-100': selectedProductor == item.id}" @click="getMessagesProductor(item.id)">
            <div class="flex justify-between">
              <span class="text-sm font-semibold text-gray-900">{{item.razonsocial}}</span>
              <span class="text-sm text-gray-500 text-right">{{ item.lastMessage? moment(item.lastMessage.created_at).calendar() : '' }}</span>
            </div>

          </a>
        </div>
      </div>
      <div class="flex-1 flex flex-col w-0">
        <div class="relative shadow-md">
          <div class="flex items-center justify-between px-5 py-3 bg-white">
          </div>
        </div>
        <div class="overflow-y-auto">
          <loading v-if="loading" />
          <div v-else class="p-3 flex-1 ">
            <article
              v-if="data.messages.length == 0"
              class="w-full flex flex-col items-center mt-14 text-gray-400"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-20 w-20"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path strokeLinecap="round" stroke-width="2" strokeLinejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
              </svg>
              <p class="text-2xl">{{data.productors?.length == 0? "Para poder enviar un mensaje, es necesario tener productores inscriptos" : data.messages.length == 0 && selectedProductor? "No hay mensajes" : "Se debe seleccionar un productor para ver los mensajes enviados"}}</p>
            </article>
            <article v-for="(item, index) in data.messages" :key="index" class="mt-3 px-10 pt-6 pb-8 bg-white rounded-lg shadow">
              <div class="flex items-center justify-between">
                <p class="flex flex-row text-lg font-semibold">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" :class="iconsStatusEnum[item.estado].color" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" :d="iconsStatusEnum[item.estado].path" />
                  </svg>
                  <span class="text-gray-600"> {{item.titulo}}</span>
                </p>
                <div class="flex items-center">
                  <span class="text-xs text-gray-600">{{moment(item.created_at).calendar()}}</span>
                </div>
              </div>
              <div v-html="item.mensaje"></div>
            </article>
            <button
              v-if="selectedProductor"
              @click="showEditor = !showEditor"
              type="button"
              class="
                fixed
                bottom-0
                right-0
                mr-24
                mb-20
                md:mr-12 md:mb-8
                cursor-pointer
                z-10
                shadow-xl
                bg-indigo-500
                text-white
                rounded-full
                text-center
                inline-flex
                items-center
                p-2.5"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
              </svg>
              Enviar nuevo mensaje
            </button>
          </div>
          <div v-if="showEditor" class="
            backdrop-filter backdrop-grayscale backdrop-blur-md backdrop-contrast-200
            fixed
            bottom-0
            right-0
            h-2/3
            w-4/5
            bg-white
            z-20
            border-red-600
            rounded-t-2xl"
          >
            <Form @submit="onSubmit" @invalid-submit="onInvalidSubmit" :validationSchema="yupSchema" class="m-6 h-3/4 xs:h-1/3 flex flex-col space-y-4">
              <label for="messageTitle" class="uppercase text-md text-grey-darkest">
                Título
                <Field type="text" name="messageTitle" id="messageTitle" class="rounded-md py-2 px-3 text-grey-darkest appearance-none w-full block border-gray-400"/>
                <ErrorMessage class="text-red-500" name="messageTitle" />
              </label>
              <label for="messageBody" class="uppercase text-md text-grey-darkest">
                Mensaje
                <vue-editor
                  name="messageBody"
                  id="messageBody"
                  v-model="newMessage"
                  :editorToolbar="toolbar"
                ></vue-editor>
                <!-- <ErrorMessage class="text-red-500" name="messageBody" /> -->
                <span v-if="!newMessage" class="text-red-500">Debes completar este campo</span>
              </label>
              <div class="flex right-0 fixed bottom-5">
                <button
                  type="submit"
                  class="
                  flex
                  bg-indigo-500
                  text-white
                  rounded-full
                  mr-6
                  py-3
                  px-6
                  "
                  :disabled="sendStatusMessage"
                >
                  <svg v-if="sendStatusMessage" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  {{ sendStatusMessage? "Enviando" : "Enviar"}}
                </button>
                <button
                  @click="showEditor = false"
                  class="
                  text-gray-500
                  rounded-full
                  mr-6
                  p-3
                  "
                  :disabled="sendStatusMessage"
                >
                  Cerrar
                </button>
              </div>
            </Form>
          </div>
        </div>
      </div>
    </main>
  </div>
  </body>
  <div v-if="showEditor" class="bg-black bg-opacity-25 w-full h-full z-10 absolute m-0"></div>
</AppLayout>
</template>
<script setup>
import * as yup from "yup";
import AppLayout from '@/Layouts/AppLayout';
import { Field, Form, ErrorMessage } from 'vee-validate';
import { Inertia } from '@inertiajs/inertia'
import { reactive, ref, computed, onMounted } from "vue";
import { VueEditor } from "vue3-editor";
import Loading from '../../Components/Loading.vue'
import moment from "moment";
moment.locale('es');

const iconsStatusEnum = Object.freeze({
  pendiente: {
    path:"M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z",
    color: "text-blue-400"
  },
  error: {
    path:"M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z",
    color: "text-red-400"
  },
  enviado: {
    path:"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z",
    color: "text-green-400"
  }
})


const { productors, productorSelected } = defineProps(['productors', 'productorSelected'])

const showEditor = ref(false)
let selectedProductor = ref(null)
const loading = ref(false)

let sendStatusMessage = ref(false)
const toolbar = [
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{ 'align': [] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'font': [] }],
    ['clean']
];
const data = reactive({
  messages: Array(0),
  productors: productors
})

let newMessage = ref("")

const yupSchema = yup.object().shape({
  messageTitle: yup.string().required('Debes completar este campo').nullable(),
  messageBody: yup.string().nullable()
})

const getMessagesProductor = async (idProductor) => {
  selectedProductor.value = idProductor
  loading.value = true
  try {
    const messagesProductor = await axios.get('/inbox/show/'+idProductor)
    data.messages = messagesProductor.data
    loading.value = false
  } catch (error) {
    loading.value = false
  }
}

const onSubmit = async (values) => {
  if(!newMessage.value) return
  sendStatusMessage.value = true
  const {data} = await axios.post('/inbox/store', {newMessage:newMessage.value, selectedProductor:selectedProductor.value, titulo: values.messageTitle})
  if(data.success){
    await getMessagesProductor(selectedProductor.value)
    showEditor.value = false
    newMessage.value = ""
  }
  sendStatusMessage.value = false
}
// const onInvalidSubmit = () => {
//   alert("asdds")
// }

onMounted(() => {
  if(productorSelected)
    getMessagesProductor(productorSelected)
})

</script>