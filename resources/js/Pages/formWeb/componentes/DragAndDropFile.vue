<template>
  <file-selector v-model="files" v-slot="{ openDialog }" :accept="accept" :multiple="multiple">
    <dropzone v-slot="{ hovered }">
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" :class="{ 'border-blue-200': hovered }">
            <div class="space-y-1 text-center">
                <template v-if="files.length == 0" >
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Carga un archivo o arrastralo y sueltalo aquí</span>
                        </label>
                    </div>
                </template>
                <ul v-else>
                    <li v-for="(file, index) in files" :key="file.name" class="flex flex-row">
                        {{ file.name }}
                        <svg @click="removeFile(index)" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="#EF4444">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </li>
                </ul>
                    <button type="button" class="bg-blue-500 hover:bg-blue-800 rounded text-white px-2 py-1" @click="openDialog">Agregar archivos</button>
                <p class="text-xs text-gray-500">
                    {{acceptLabel}}
                </p>
                <p class="text-xs text-gray-500">
                    {{maxSize}}
                </p>
            </div>
        </div>
    </dropzone>
  </file-selector>
</template>
<script>
import { ref, watch } from 'vue'
import { FileSelector, Dropzone, DialogButton } from 'vue3-file-selector'

export default {
  components: {
    FileSelector,
    Dropzone,
    DialogButton
  },
  props:{
    accept: {
        require: true,
        type: String,
    },
    acceptLabel: {
        require: true,
        type: String,
    },
    maxSize: {
        require: true,
        type: String,
    },
    multiple: {
        require: true,
        type: Boolean,
    }
  },
  emits: ['update:files'],
  setup (props, { emit }) {
    const files = ref([])

    watch(files, async () => {
    //   emit('update:files', files);
    })

    return {
      files
    }
  },

  methods: {
      removeFile(index) {
        this.files.splice(index, 1);
      }
  },
}
</script>
