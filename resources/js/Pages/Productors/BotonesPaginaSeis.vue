<template>
  <div>
    <!-- <jet-dialog-modal
      :show="mostrar_modal_datos_ya_guardados"
      @close="cerrar_modal_datos_uno"
    >
      <template #title>
        {{ modal_tittle }}
      </template>
      <template #content>
        {{ modal_body }}
      </template>
      <template #footer>
        <button @click="cerrar_modal_datos_uno">Ok</button>
      </template>
    </jet-dialog-modal> -->
    <div class="flex items-stretch w-full justify-items-stretch">
      <div
        class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center w-full"
      >
        <button
          type="button"
          class="
            text-xl
            font-medium
            mx-auto
            py-3
            px-5
            text-indigo-500
            border border-gray-400
            rounded-xl
            bg-gray-100
            shadow-xl
            hover:text-white
            hover:shadow-xl
            hover:bg-gray-600
          "
          @click="guardar_avnces_uno"
        >
          {{ titulo_boton_guardar }}
        </button>
      </div>
      <div class="justify-self-auto mb-6 md:mb-0 px-3 self-center sm:w-5/5">
        <a
          :href="link_volver"
          class="
            text-xl
            font-medium
            mx-auto
            py-3
            px-5
            text-indigo-500
            border border-gray-400
            rounded-xl
            bg-gray-100
            shadow-xl
            hover:text-white
            hover:shadow-xl
            hover:bg-gray-600
          "
        >
          {{ titulo_boton_volver }}
        </a>
      </div>
    </div>
    <div v-show="$props.testing">
      {{ $props.localidad_mina_provincia }}
      {{ $props.localidad_mina_provincia_validacion }}
      {{ $props.localidad_mina_provincia_correcto }}
      {{ $props.obs_localidad_mina_provincia }}
      {{ $props.obs_localidad_mina_provincia_valido }}
      {{ $props.localidad_mina_departamento }}
      {{ $props.localidad_mina_departamento_validacion }}
      {{ $props.localidad_mina_departamento_correcto }}
      {{ $props.obs_localidad_mina_departamento }}
      {{ $props.obs_localidad_mina_departamento_valido }}
      {{ $props.localidad_mina_localidad }}
      {{ $props.localidad_mina_localidad_validacion }}
      {{ $props.localidad_mina_localidad_correcto }}
      {{ $props.obs_localidad_mina_localidad }}
      {{ $props.obs_localidad_mina_localidad_valido }}
      {{ $props.tipo_sistema }}
      {{ $props.tipo_sistema_validacion }}
      {{ $props.tipo_sistema_correcto }}
      {{ $props.obs_tipo_sistema }}
      {{ $props.obs_tipo_sistema_valido }}
      {{ $props.latitud }}
      {{ $props.latitud_validacion }}
      {{ $props.latitud_correcto }}
      {{ $props.obs_latitud }}
      {{ $props.obs_latitud_valido }}
      {{ $props.longitud }}
      {{ $props.longitud_validacion }}
      {{ $props.longitud_correcto }}
      {{ $props.obs_longitud }}
      {{ $props.obs_longitud_valido }}
    </div>
  </div>
</template>

<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import Swal from "sweetalert2";
export default {
  props: [
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",

    "localidad_mina_provincia",
    "localidad_mina_provincia_validacion",
    "localidad_mina_provincia_correcto",
    "obs_localidad_mina_provincia",
    "obs_localidad_mina_provincia_valido",
    "localidad_mina_departamento",
    "localidad_mina_departamento_validacion",
    "localidad_mina_departamento_correcto",
    "obs_localidad_mina_departamento",
    "obs_localidad_mina_departamento_valido",
    "localidad_mina_localidad",
    "localidad_mina_localidad_validacion",
    "localidad_mina_localidad_correcto",
    "obs_localidad_mina_localidad",
    "obs_localidad_mina_localidad_valido",
    "tipo_sistema",
    "tipo_sistema_validacion",
    "tipo_sistema_correcto",
    "obs_tipo_sistema",
    "obs_tipo_sistema_valido",
    "latitud",
    "latitud_validacion",
    "latitud_correcto",
    "obs_latitud",
    "obs_latitud_valido",
    "longitud",
    "longitud_validacion",
    "longitud_correcto",
    "obs_longitud",
    "obs_longitud_valido",

    "evaluacion",
    "testing",
    "id",
  ],
  components: {
    JetDialogModal,
  },
  data() {
    return {
      // saludos: "Saludame",
      // mostrar_modal_datos_ya_guardados: false,
      // modal_tittle: "",
      // modal_body: "",
    };
  },
  methods: {
    ver_pagina_siguiente(valor) {
      this.$emit("mostrarpasosiguiente", valor);
      // console.log('valor: ',valor);
    },
    guardar_avnces_uno() {
      //if(this.$props.evaluacion)
      //{
      //Soy autoridad minera
      let self = this;
      axios
        .post("/formularios/evaluacion_auto_guardado_seis", {
          id: this.$props.id,
          localidad_mina_provincia: this.$props.localidad_mina_provincia,
          localidad_mina_provincia_validacion:
            this.$props.localidad_mina_provincia_validacion,
          localidad_mina_provincia_correcto:
            this.$props.localidad_mina_provincia_correcto,
          obs_localidad_mina_provincia:
            this.$props.obs_localidad_mina_provincia,
          obs_localidad_mina_provincia_valido:
            this.$props.obs_localidad_mina_provincia_valido,
          localidad_mina_departamento: this.$props.localidad_mina_departamento,
          localidad_mina_departamento_validacion:
            this.$props.localidad_mina_departamento_validacion,
          localidad_mina_departamento_correcto:
            this.$props.localidad_mina_departamento_correcto,
          obs_localidad_mina_departamento:
            this.$props.obs_localidad_mina_departamento,
          obs_localidad_mina_departamento_valido:
            this.$props.obs_localidad_mina_departamento_valido,
          localidad_mina_localidad: this.$props.localidad_mina_localidad,
          localidad_mina_localidad_validacion:
            this.$props.localidad_mina_localidad_validacion,
          localidad_mina_localidad_correcto:
            this.$props.localidad_mina_localidad_correcto,
          obs_localidad_mina_localidad:
            this.$props.obs_localidad_mina_localidad,
          obs_localidad_mina_localidad_valido:
            this.$props.obs_localidad_mina_localidad_valido,
          tipo_sistema: this.$props.tipo_sistema,
          tipo_sistema_validacion: this.$props.tipo_sistema_validacion,
          tipo_sistema_correcto: this.$props.tipo_sistema_correcto,
          obs_tipo_sistema: this.$props.obs_tipo_sistema,
          obs_tipo_sistema_valido: this.$props.obs_tipo_sistema_valido,
          latitud: this.$props.latitud,
          latitud_validacion: this.$props.latitud_validacion,
          latitud_correcto: this.$props.latitud_correcto,
          obs_latitud: this.$props.obs_latitud,
          obs_latitud_valido: this.$props.obs_latitud_valido,
          longitud: this.$props.longitud,
          longitud_validacion: this.$props.longitud_validacion,
          longitud_correcto: this.$props.longitud_correcto,
          obs_longitud: this.$props.obs_longitud,
          obs_longitud_valido: this.$props.obs_longitud_valido,
          es_evaluacion: this.$props.evaluacion,
          valor_de_progreso: 20,
          valor_de_aprobado: 20,
          valor_de_reprobado: 20,
        })
        .then(function (response) {
          // console.log(response.data);
          if (response.data === "se actualizaron los datos correctamente") {
            // console.log("todo bien");
            // self.modal_tittle = "Datos guardados correctamente";
            // self.modal_body =
            //   "Recien hemos guardados los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario";
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Datos guardados correctamente.",
              "Gracias por usar este servicio, por favor continue completando el formulario.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          } else {
            Swal.fire("Error", "Error inesperado.", "error");
            // console.log("NO todo bien");
          }
        })
        .catch(function (error) {
          // handle error
            Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
          console.log(error);
        });
      //soy una autoridad minera

      //}
      //if(!this.$props.evaluacion)
      // {
      //soy un productor

      // }
    },
    // cerrar_modal_datos_uno() {
    //   this.mostrar_modal_datos_ya_guardados = false;
    // },
  },
};
</script>
