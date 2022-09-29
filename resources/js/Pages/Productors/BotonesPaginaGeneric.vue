<template>
  <div class="flex items-center justify-center w-full">
    <div class="flex items-stretch w-full justify-items-stretch">
      <div
        class="justify-self-auto mb-6 md:mb-0 px-3 self-center sm:w-5/5 w-full"
      >
        <a
          v-if="mostrar_btn_volver"
          :href="link_volver"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-gray-400
            bg-gray-400
            shadow-md
            font-bold
            hover:text-white
            hover:shadow-xl
            hover:bg-red-700
            hover:border-red-700
          "
        >
          {{ titulo_boton_volver }}
        </a>
      </div>
      <div class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center">
        <button
          type="button"
          class="
            uppercase
            mx-auto
            py-3
            px-5
            text-white
            border border-blue-500
            bg-blue-500
            shadow-md
            font-bold
            hover:text-white hover:shadow-xl hover:bg-blue-700
          "
          @click="guardar_avnces_cinco"
        >
          {{ titulo_boton_guardar }}
        </button>
      </div>
    </div>
    <div v-show="testing">
      * gestor_nombre_apellido: {{ $props.formulario.gestor_nombre_apellido }} *
      * gestor_nombre_apellido_valido:
      {{ $props.formulario.gestor_nombre_apellido_valido }} * *
      gestor_nombre_apellido_correcto:
      {{ $props.formulario.gestor_nombre_apellido_correcto }} * *
      obs_gestor_nombre_apellido:
      {{ $props.formulario.obs_gestor_nombre_apellido }} * *
      obs_gestor_nombre_valido:
      {{ $props.formulario.obs_gestor_nombre_valido }} * * gestor_dni :
      {{ $props.formulario.gestor_dni }} * * gestor_dni_valido :
      {{ $props.formulario.gestor_dni_valido }} * * gestor_dni_correcto :
      {{ $props.formulario.gestor_dni_correcto }} * * obs_gestor_dni :
      {{ $props.formulario.obs_gestor_dni }} * * obs_gestor_dni_valido :
      {{ $props.formulario.obs_gestor_dni_valido }} * * gestor_profesion:
      {{ $props.formulario.gestor_profesion }} * * gestor_profesion_valido:
      {{ $props.formulario.gestor_profesion_valido }} * *
      gestor_profesion_correcto:
      {{ $props.formulario.gestor_profesion_correcto }} * *
      obs_gestor_profesion: {{ $props.formulario.obs_gestor_profesion }} * *
      obs_gestor_profesion_valido:
      {{ $props.formulario.obs_gestor_profesion_valido }} * * gestor_telefono :
      {{ $props.formulario.gestor_telefono }} * * gestor_telefono_valido :
      {{ $props.formulario.gestor_telefono_valido }} * *
      gestor_telefono_correcto :
      {{ $props.formulario.gestor_telefono_correcto }} * * obs_gestor_telefono :
      {{ $props.formulario.obs_gestor_telefono }} * * obs_gestor_telefono_valido
      : {{ $props.formulario.obs_gestor_telefono_valido }} * * gestor_email :
      {{ $props.formulario.gestor_email }} * * gestor_email_valido :
      {{ $props.formulario.gestor_email_valido }} * * gestor_email_correcto :
      {{ $props.formulario.gestor_email_correcto }} * * obs_gestor_email :
      {{ $props.formulario.obs_gestor_email }} * * obs_gestor_email_valido :
      {{ $props.formulario.obs_gestor_email_valido }} * * gestor_notificacion :
      {{ $props.formulario.gestor_notificacion }} * * gestor_notificacion_valido
      : {{ $props.formulario.gestor_notificacion_valido }} * *
      gestor_notificacion_correcto :
      {{ $props.formulario.gestor_notificacion_correcto }} * *
      obs_gestor_notificacion :
      {{ $props.formulario.obs_gestor_notificacion }} * *
      obs_gestor_notificacion_valido :
      {{ $props.formulario.obs_gestor_notificacion_valido }} * * foto_4x4 :
      {{ $props.formulario.foto_4x4 }} * * foto_4x4_valido :
      {{ $props.formulario.foto_4x4_valido }} * * foto_4x4_correcto :
      {{ $props.formulario.foto_4x4_correcto }} * * obs_foto_4x4 :
      {{ $props.formulario.obs_foto_4x4 }} * * obs_foto_4x4_valido :
      {{ $props.formulario.obs_foto_4x4_valido }} * * autorizacion_gestor :
      {{ $props.formulario.autorizacion_gestor }} * * autorizacion_gestor_valido
      : {{ $props.formulario.autorizacion_gestor_valido }} * *
      autorizacion_gestor_correcto :
      {{ $props.formulario.autorizacion_gestor_correcto }} * *
      obs_autorizacion_gestor :
      {{ $props.formulario.obs_autorizacion_gestor }} * *
      obs_autorizacion_gestor_valido :
      {{ $props.formulario.obs_autorizacion_gestor_valido }} * * primer_hoja_dni
      : {{ $props.formulario.primer_hoja_dni }} * * hoja_dni_valido :
      {{ $props.formulario.hoja_dni_valido }} * * hoja_dni_correcto :
      {{ $props.formulario.hoja_dni_correcto }} * * obs_hoja_dni :
      {{ $props.formulario.obs_hoja_dni }} * * obs_hoja_dni_valido :
      {{ $props.formulario.obs_hoja_dni_valido }} *
    </div>
    <div v-show="testing">
      {{ $props.formulario.gestor_nombre_apellido }}
      {{ $props.formulario.gestor_nombre_apellido_valido }}
      {{ $props.formulario.gestor_nombre_apellido_correcto }}
      {{ $props.formulario.obs_gestor_nombre_apellido }}
      {{ $props.formulario.obs_gestor_nombre_valido }}

      {{ $props.formulario.gestor_dni }}
      {{ $props.formulario.gestor_dni_valido }}
      {{ $props.formulario.gestor_dni_correcto }}
      {{ $props.formulario.obs_gestor_dni }}
      {{ $props.formulario.obs_gestor_dni_valido }}

      {{ $props.formulario.gestor_profesion }}
      {{ $props.formulario.gestor_profesion_valido }}
      {{ $props.formulario.gestor_profesion_correcto }}
      {{ $props.formulario.obs_gestor_profesion }}
      {{ $props.formulario.obs_gestor_profesion_valido }}

      {{ $props.formulario.gestor_telefono }}
      {{ $props.formulario.gestor_telefono_valido }}
      {{ $props.formulario.gestor_telefono_correcto }}
      {{ $props.formulario.obs_gestor_telefono }}
      {{ $props.formulario.obs_gestor_telefono_valido }}

      {{ $props.formulario.gestor_email }}
      {{ $props.formulario.gestor_email_valido }}
      {{ $props.formulario.gestor_email_correcto }}
      {{ $props.formulario.obs_gestor_email }}
      {{ $props.formulario.obs_gestor_email_valido }}

      {{ $props.formulario.gestor_notificacion }}
      {{ $props.formulario.gestor_notificacion_valido }}
      {{ $props.formulario.gestor_notificacion_correcto }}
      {{ $props.formulario.obs_gestor_notificacion }}
      {{ $props.formulario.obs_gestor_notificacion_valido }}

      {{ $props.formulario.foto_4x4 }}
      {{ $props.formulario.foto_4x4_valido }}
      {{ $props.formulario.foto_4x4_correcto }}
      {{ $props.formulario.obs_foto_4x4 }}
      {{ $props.formulario.obs_foto_4x4_valido }}

      {{ $props.formulario.autorizacion_gestor }}
      {{ $props.formulario.autorizacion_gestor_valido }}
      {{ $props.formulario.autorizacion_gestor_correcto }}
      {{ $props.formulario.obs_autorizacion_gestor }}
      {{ $props.formulario.obs_autorizacion_gestor_valido }}

      {{ $props.formulario.primer_hoja_dni }}
      {{ $props.formulario.hoja_dni_valido }}
      {{ $props.formulario.hoja_dni_correcto }}
      {{ $props.formulario.obs_hoja_dni }}
      {{ $props.formulario.obs_hoja_dni_valido }}
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
    "mostrar_btn_volver",
    "titulo_boton_guardar",

    "formulario",
    "donde_guardar",

    "evaluacion",
    "testing",
    "id",
  ],
  components: {
    JetDialogModal,
  },
  data() {
    return {
      //   saludos: "Saludame qweqweqwe",
      // mostrar_modal_datos_ya_guardados: false,
      //   modal_tittle: "",
      //   modal_body: "",
    };
  },
  methods: {
    guardar_avnces_cinco() {
      //Soy autoridad minera
      let self = this;
      // const data = new FormData();
      // data.append("id", this.$props.id);
      // data.append("es_evaluacion", this.$props.evaluacion);
      // data.append("testing", this.$props.testing);

      // data.append("formulario", this.$props.formulario);
      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
      axios
        .post(
          // this.$inertia.page.props.appName +
          // "/formularios/evaluacion_auto_guardado_tucuman",
          this.$props.donde_guardar,
          {
            id: this.$props.id,
            es_evaluacion: this.$props.evaluacion,
            testing: this.$props.testing,
            formulario: this.$props.formulario,
          }
        )
        .then(function (response) {
          //   console.log(response.data);
          if (
            response.data.msg === "se creo el paso de catamarca correctamente"
          ) {
            // console.log("todo bien, se creo");
            // self.modal_tittle =
            //   "Datos del paso de Catamarca han sido guardados correctamente";
            // self.modal_body =
            //   "Recien hemos guardados los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario";
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Datos Guardados Correctamente.",
              "Gracias por usar este servicio, por favor continue completando el formulario.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          } else if (
            response.data.msg ===
            "se actualizo el paso de catamarca correctamente"
          ) {
            // console.log("todo bien, se actualizo");
            // self.modal_tittle =
            //   "Datos del paso de Catamarca han sido guardados correctamente";
            // self.modal_body =
            //   "Recien hemos actualizado los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario";
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Datos Actualizados Correctamente.",
              "Se actualizaron los datos de Catamarca correctamente.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          } else {
            // console.log("NO todo bien");
            Swal.fire("Error", "Error inesperado.", "error");
          }
        })
        .catch(function (error) {
          // handle error
          Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
          console.log(error);
        });
    },
  },
};
</script>
