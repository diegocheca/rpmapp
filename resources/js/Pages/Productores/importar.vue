<template>
  <app-layout>
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
        Importar
      </h1>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form
              @submit.prevent="submit"
              class="mb-6"
              enctype="multipart/form-data"
            >
              <div
                class="
                  flex
                  w-full
                  mt-8
                  items-center
                  justify-center
                  bg-grey-lighter
                "
              >
                <label
                  class="
                    w-64
                    flex flex-col
                    items-center
                    px-4
                    py-6
                    bg-white
                    text-blue
                    rounded-lg
                    shadow-lg
                    tracking-wide
                    uppercase
                    border border-blue-600
                    cursor-pointer
                    hover:bg-blue-600
                    hover:text-white
                  "
                >
                  <svg
                    class="w-8 h-8"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                    />
                  </svg>

                  <span v-if="!archivo" class="mt-2 text-base leading-normal text-center"
                    >Ingrese Archivo</span
                  >
                  <span v-else class="mt-2 text-base leading-normal text-center">{{
                    archivo
                  }}</span>
                  <input
                    type="file"
                    id="file"
                    ref="file"
                    v-on:change="handleFileUpload()"
                    class="
                      cursor-pointer
                      block
                      w-full
                      opacity-0
                      pin-r pin-t
                    "
                  />
                </label>
              </div>
              <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                <inertia-link
                  :href="route('admin.vistaImport')"
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
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
  components: {
    AppLayout,
  },
  //   props: {
  //     errors: Object,
  //   },
  data() {
    return {
      file: "",
      archivo: "",
    };
  },

  methods: {
    submit() {
      let formData = new FormData();
      formData.append("import_file", this.file);
      this.$inertia.post(route("admin.import"), formData);
    },
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
      this.archivo = this.$refs.file.files[0].name;
      //   console.log(this.archivo.name);
    },
  },
};
</script>
