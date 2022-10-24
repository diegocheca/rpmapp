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