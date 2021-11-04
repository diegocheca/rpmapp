<template>
  <div class="flex">
    <div class="w-full md:w-1/2 px-3">
      <label
        class="
          block
          uppercase
          tracking-wide
          text-gray-700 text-xs
          font-bold
          mb-2
        "
        for="fileinput_valor"
        >{{ label }}:</label
      >
      <div class="flex" v-if="evaluacion || inscripcion_correccion_mostrar">
        <div class="w-full md:w-1/3 px-3">
          <span class="text-gray-700">Correcto?</span>
          <div class="mt-2">
            <label class="inline-flex items-center">
              <input
                type="radio"
                :disabled="$props.inscripcion_correccion_desactivar"
                class="form-radio h-5 w-5 text-green-400"
                :name="name_correcto"
                v-model="inscripciondgr_correcto"
                value="true"
                v-on:change="actaulizar_variable_fileinput(true)"
              />
              <span class="ml-2">Si</span>
            </label>
            <label class="inline-flex items-center ml-6">
              <input
                type="radio"
                :disabled="$props.inscripcion_correccion_desactivar"
                class="form-radio h-5 w-5 text-red-400"
                :name="name_correcto"
                v-model="inscripciondgr_correcto"
                value="false"
                v-on:change="actaulizar_variable_fileinput(false)"
              />
              <span class="ml-2">No</span>
            </label>
            <label class="inline-flex items-center ml-6">
              <input
                type="radio"
                :disabled="$props.inscripcion_correccion_desactivar"
                class="form-radio h-5 w-5 text-indigo-400"
                :name="name_correcto"
                v-model="inscripciondgr_correcto"
                value="nada"
                v-on:change="actaulizar_variable_fileinput('nada')"
              />
              <span class="ml-2">Sin evaluar</span>
            </label>
          </div>
        </div>
        <div v-show="!fileinput_correcto_local" class="w-full md:w-2/3 px-3">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="obs_fileinput"
            >Observación:</label
          >
          <textarea
            id="obs_fileinput"
            name="obs_fileinput"
            v-model="obs_fileinput"
            v-bind:class="clase_text_area_fileinput"
            :disabled="$props.inscripcion_correccion_desactivar"
            @input="
              actaulizar_contenido_text_area_inscripciondgr($event.target.value)
            "
          >
          </textarea>
          <p v-bind:class="clase_cartel_nota_evaluacion_fileinput_text_area">
            {{ cartel_nota_evaluacion_fileinput_text_area }}
          </p>
        </div>
        <div
          class="w-full md:w-1/4 px-3 bg-white rounded shadow p-6 m-8"
          v-show="testing"
        >
          <div class="flex">
            <label
              class="
                flex
                items-center
                relative
                w-max
                cursor-pointer
                select-none
              "
            >
              <br />
              <span class="text-lg font-bold mr-3">Testing hijo</span>
              <br />
              <input
                type="checkbox"
                class="
                  appearance-none
                  transition-colors
                  cursor-pointer
                  w-14
                  h-7
                  rounded-full
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-offset-black
                  focus:ring-blue-500
                  bg-red-500
                "
                v-model="testing_hijo"
              />
              <span
                class="
                  absolute
                  font-medium
                  text-xs
                  uppercase
                  right-1
                  text-white
                "
              >
                Sin
              </span>
              <span
                class="
                  absolute
                  font-medium
                  text-xs
                  uppercase
                  right-8
                  text-white
                "
              >
                Con
              </span>
              <span
                class="
                  w-7
                  h-7
                  right-7
                  absolute
                  rounded-full
                  transform
                  transition-transform
                  bg-gray-200
                "
              />
            </label>
          </div>
          <div class="flex">
            <div v-show="testing_hijo">
              datos del hijo453
              {{ fileinput_correcto_local }} **
              {{ $props.inscripciondgr_correcto }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="valor_input === null || valor_input === undefined">
      <div class="flex items-center justify-center w-full h-full">
        <label
          class="
            flex flex-col
            rounded-lg
            border-4 border-dashed border-gray-400
            w-full
            h-60
            p-10
            group
            text-center
          "
        >
          <div
            class="
              h-full
              w-full
              text-center
              flex flex-col
              items-center
              justify-center
              items-center
            "
          >
            <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>-->
            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
              <img
                class="has-mask h-36 object-center"
                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                alt="freepik image"
              />
            </div>
            <p class="pointer-none text-gray-600">
              <span v-if="!nameArchivo" class="text-sm text-center"
                >Haga click aca para subir los archivo(s) desde su
                dispositivo.</span
              >
              <span v-else class="mt-2 text-base leading-normal text-center uppercase">{{
                nameArchivo
              }}</span>
            </p>
          </div>
          <input
            :disabled="$props.inscripcion_disable"
            type="file"
            v-on:change="handleFileUpload()"
            ref="file"
            class="cursor-pointer block w-full opacity-0 pin-r pin-t"
            @change="cambio_el_archivo"
          />
        </label>
      </div>
      <p class="text-sm text-gray-400">
        <span>Tipos de archivos: doc,pdf,tipos de imagenes.</span>
      </p>
    </div>
    <div class="w-full md:w-1/2 px-3" v-else>
      <object
        :data="valor_input"
        type="application/pdf"
        width="100%"
        height="500px"
      >
        <p>
          It appears you don't have a PDF plugin for this browser. No biggie...
          you can
          <a
            :href="
              $inertia.page.props.appName +
              '/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf'
            "
            >click here to download the PDF file.</a
          >
        </p>
      </object>
      <!-- <button
                type="file"
                class="text-white uppercase text-md mx-auto py-4 px-20 rounded-full block  border-b border-pink-300 bg-pink-200 hover:bg-pink-300 text-pink-700"
                @change="cambio_el_archivo">
                Cambiar Archivo
            </button> -->
      <div class="flex items-center justify-center w-full">
        <label
          class="
            flex flex-col
            rounded-lg
            border-4 border-dashed
            w-full
            h-60
            p-10
            group
            text-center
          "
        >
          <div
            class="
              h-full
              w-full
              text-center
              flex flex-col
              items-center
              justify-center
              items-center
            "
          >
            <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>-->
            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
              <img
                class="has-mask h-36 object-center"
                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                alt="freepik image"
              />
            </div>
            <p class="pointer-none text-gray-500">
              <span class="text-sm"
                >Para cambiar el archivo: Arrastrar y soltar</span
              >
              los archivo(s) <br />
              o
              <a href="" id="" class="text-blue-600 hover:underline"
                >seleccionar un archivo</a
              >
              desde su dispotivo
            </p>
          </div>
          <input
            :disabled="$props.inscripcion_disable"
            type="file"
            class="hidden"
            @change="cambio_el_archivo"
          />
        </label>
      </div>
      <p class="text-sm text-gray-300">
        <span>Tipos de archivos: doc,pdf</span>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "fileinput_valor",
    "fileinput_valor_valido",
    "inscripciondgr_correcto",
    "obs_fileinput",
    "obs_inscripciondgr_valido",
    "evaluacion",
    "label",
    "testing",
    "name_correcto",
    "inscripcion_disable",
    "inscripcion_correccion_mostrar",
    "inscripcion_correccion_desactivar",
  ],

  data() {
    // console.log("La contancia es valor es:");
    // console.log(this.$props.fileinput_valor);
    return {
      valor_input: this.$props.fileinput_valor,
      fileinput_correcto_local: this.$props.inscripciondgr_correcto,
      fileinput_valor_valido_local: this.$props.fileinput_valor_valido,
      clase_text_area_fileinput:
        "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_evaluacion_fileinput_text_area:
        "text-green-500 text-xs italic",
      cartel_nota_evaluacion_fileinput_text_area: "Observacion Correcta",
      testing_hijo: false,
      photo: null,
      nameArchivo: "",
    };
  },
  methods: {
    actaulizar_variable_fileinput(valor) {
      this.fileinput_correcto_local = valor;
      // console.log(this.fileinput_correcto_local);
      this.$emit("changeinscripciondgrcorrecto", this.fileinput_correcto_local);
    },
    actaulizar_contenido_text_area_inscripciondgr(value) {
      if (this.$props.obs_fileinput.length <= 2) {
        this.clase_text_area_fileinput =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_fileinput_text_area =
          "Observacion Incorrecta - debe ser mayor a 2 carcteres";
        this.clase_cartel_nota_evaluacion_fileinput_text_area =
          "text-red-500 text-xs italic";
      }
      if (this.$props.obs_fileinput.length >= 50) {
        this.clase_text_area_fileinput =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_fileinput_text_area =
          "Observacion Incorrecta - debe tener menos de 50 caracteres";
        this.clase_cartel_nota_evaluacion_fileinput_text_area =
          "text-red-500 text-xs italic";
      }
      if (
        this.$props.obs_fileinput !== "" &&
        this.$props.obs_fileinput.length <= 30 &&
        this.$props.obs_fileinput.length >= 3
      ) {
        this.clase_text_area_fileinput =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_fileinput_text_area =
          "Observacion Correcta";
        this.clase_cartel_nota_evaluacion_fileinput_text_area =
          "text-green-500 text-xs italic";
      }
      this.$emit("changeobsinscripciondgr", this.$props.obs_fileinput);
    },
    cambio_el_archivo(event) {
      this.photo = event.target.files[0];
      this.$emit("cambioarchivo", this.photo);
    },
    handleFileUpload() {
      this.nameArchivo = this.$refs.file.files[0].name;
    },
  },
};
</script>