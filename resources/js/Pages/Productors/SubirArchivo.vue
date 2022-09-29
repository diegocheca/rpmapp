<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      >{{ label }} :
    </label>
    <div
      v-if="
        valor_input === null || valor_input === undefined || valor_input === ''
      "
      class="items-stretch w-full relative"
    >
      <div class="items-center justify-center w-full">
        <label
          class="
            flex flex-col
            rounded-lg
            border-4 border-dashed border-gray-300
            hover:bg-gray-100 hover:border-blue-600
            p-2
            group
            text-center
            w-full
          "
        >
          <div
            class="w-full text-center flex flex-col items-center justify-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-10 h-10 text-gray-300 group-hover:text-blue-600"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
              />
            </svg>
            <!-- <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
              <img
                class="has-mask h-36 object-center"
                src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                alt="freepik image"
              />
            </div> -->
          </div>
          <input
            class="text-sm cursor-pointer w-36 hidden"
            :disabled="desactivar_input"
            type="file"
            v-on:change="handleFileUpload()"
            ref="file"
            @change="cambio_el_archivo"
          />
          <p class="pointer-none text-gray-600">
            <span v-if="!nameArchivo" class="text-sm text-center"
              >Haga click aca para subir los archivo(s) desde su
              dispositivo.</span
            >
            <span
              v-else
              class="mt-2 text-base leading-normal text-center uppercase"
              >{{ nameArchivo }}</span
            >
          </p>
        </label>
      </div>
      <p class="text-sm text-gray-400">
        <span>Tipos de archivos: doc,pdf,tipos de imagenes.</span>
      </p>
    </div>
    <div class="flex items-stretch w-full relative" v-else>
      <object
        :data="valor_input"
        type="application/pdf"
        width="100%"
        height="500px"
      >
        <p>
          Parece que no tiene un complemento de PDF para este navegador.
          <a :href="$inertia.page.props.appName + '/storage/files_formularios/'"
            >Haga clic aquí para descargar el archivo PDF.</a
          >
        </p>
      </object>
      <div class="flex items-center justify-center w-full">
        <label
          class="
            flex flex-col
            w-full
            h-5
            p-5
            group
            text-center
            bg-blue-600
            hover:bg-blue-800
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
            "
          >
            <p class="pointer-none text-gray-600">
              <span v-if="!nameArchivo" class="text-md text-center text-white"
                >Haga click aca para subir los archivo(s) desde su
                dispositivo.</span
              >
              <span v-else class="text-md text-center text-white"
                >Nuevo Archivo: {{ nameArchivo }}</span
              >
            </p>
          </div>
          <input
            :disabled="desactivar_input"
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
    <div
      v-if="evaluacion || mostrar_correccion || $props.mostrar_evaluacion_adm"
    >
      <!-- <div class="w-full md:w-1/3 px-3">
        <span class="text-gray-700">Es correcto?</span>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-green-600"
              :name="name_correcion"
              v-model="evualacion_correcto"
              value="true"
              v-on:change="actaulizar_variable_correccion(true)"
            />
            <span class="ml-2">Si</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-red-600"
              :name="name_correcion"
              v-model="evualacion_correcto"
              value="false"
              v-on:change="actaulizar_variable_correccion(false)"
            />
            <span class="ml-2">No</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input
              type="radio"
              :disabled="desactivar_correccion"
              class="form-radio h-5 w-5 text-indigo-600"
              :name="name_correcion"
              v-model="evualacion_correcto"
              value="nada"
              v-on:change="actaulizar_variable_correccion('nada')"
            />
            <span class="ml-2">Sin evaluar</span>
          </label>
        </div>
      </div>
      <div
        v-show="!valor_evaluacion_correcto_local"
        class="w-full md:w-2/3 h-full"
      >
        <label
          class="
            block
            uppercase
            tracking-wide
            text-gray-700 text-xs
            font-bold
            mb-2
          "
          for="observaciones"
          >Observación:
        </label>
        <textarea
          id="observaciones"
          name="observaciones"
          v-model="valor_obs"
          v-bind:class="clase_text_area"
          :disabled="desactivar_correccion"
          @input="actaulizar_contenido_text_area($event.target.value)"
        >
        </textarea>
        <p v-bind:class="clase_text_evaluacion_de_text_area">
          {{ texto_validacion_text_area }}
        </p>
      </div> -->
      <SeccionEvaluacion
        :correccion_desactivar="desactivar_correccion"
        :name_correcto="name_correcion"
        :correcto="evualacion_correcto"
        v-on:change_correcto="actaulizar_variable_correccion($event)"
        :obs_observacion="obs_valor_evaluacion_correcto_local"
        v-on:change_obs="actaulizar_contenido_text_area($event)"
      >
      </SeccionEvaluacion>
    </div>
    <div
      class="w-full md:w-1/4 px-3 bg-white rounded shadow p-6 m-8"
      v-show="testing"
    >
      <div class="flex">
        <label
          class="flex items-center relative w-max cursor-pointer select-none"
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
            class="absolute font-medium text-xs uppercase right-1 text-white"
          >
            Sin
          </span>
          <span
            class="absolute font-medium text-xs uppercase right-8 text-white"
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
          <br />Valor input:{{ valor_input }}<br />
          <br />distrtito minero calle Evalaucion:{{ evualacion_correcto
          }}<br />
          <br />distrtito minero calle Obser:{{ valor_obs }}<br />
          <br />distrtito minero calle obsr Valido:{{ valor_valido_obs }}<br />
          <br />Evaluacion {{ evaluacion }}<br />
          <br />{{ texto_validacion_text_area }}<br />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Input from "../../Jetstream/Input.vue";
import SeccionEvaluacion from "@/Components/SeccionEvaluacion";

export default {
  components: { Input, SeccionEvaluacion },
  props: [
    "valor_input_props",
    "evualacion_correcto",
    "valor_obs",
    "valor_valido_obs",
    "evaluacion",
    "testing",
    "name_correcion",
    "label",
    "desactivar_input",
    "mostrar_correccion",
    "desactivar_correccion",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      clase_border_de_input:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_input: "Campo Correcto",
      clase_cartel_validacion_input: "text-green-500 text-xs italic",
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_text_area: "Observacion Correcta",
      clase_text_evaluacion_de_text_area: "text-green-500 text-xs italic",
      valor_input: this.$props.valor_input_props,

      validacion_input_local: this.$props.valor_input_validacion,

      valor_evaluacion_correcto_local: this.$props.evualacion_correcto,
      obs_valor_evaluacion_correcto_local: this.$props.valor_obs,

      obs_valida: this.$props.obs_valido_props,
      testing_hijo: "false",
      photo: null,
      description: "",
      nameArchivo: "",
      //border-green-500
    };
  },
  methods: {
    actaulizar_variable_correccion(valor) {
      this.valor_evaluacion_correcto_local = valor;
      this.$emit("changecorrecto", this.valor_evaluacion_correcto_local);
    },
    actaulizar_contenido_text_area(value) {
      this.obs_valor_evaluacion_correcto_local = value;
      this.$emit("changeobs", this.obs_valor_evaluacion_correcto_local);
    },
    cambio_input() {
      if (this.valor_input.length <= 4) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (this.valor_input.length >= 40) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (
        this.valor_input !== "" &&
        this.valor_input.length <= 30 &&
        this.valor_input.length >= 3
      ) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input = "Valor Correcto";
        this.clase_cartel_validacion_input = "text-green-500 text-xs italic";
        this.validacion_input_local = true;
      }
      this.$emit("changevalido", this.validacion_input_local);
      this.$emit("changevalor", this.valor_input);
    },
    cambio_el_archivo(event) {
      // `files` is always an array because the file input may be in multiple mode
      this.photo = event.target.files[0];
      this.$emit("cambioarchivo", this.photo);
    },
    handleFileUpload() {
      this.nameArchivo = this.$refs.file.files[0].name;
    },
  },
   mounted() {
    if(this.$props.valor_input_props != null && this.$props.valor_input_props != ''){
      this.valor_input = this.$props.valor_input_props.replace('//storage','/storage');
    }
   }
   

};
</script>