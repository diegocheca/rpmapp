<template>
  <div class="flex items-center justify-center w-full">
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
            hover:text-white hover:shadow-xl hover:bg-gray-600
          "
          @click="guardar_avnces_dos"
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
            hover:text-white hover:shadow-xl hover:bg-gray-600
          "
        >
          {{ titulo_boton_volver }}
        </a>
      </div>
    </div>

    <div v-if="mostrar_testing">
      {{ $props.leal_calle }}
      {{ $props.nombre_calle_legal_valido }}
      {{ $props.nombre_calle_legal_correcto }}
      {{ $props.obs_nombre_calle_legal }}
      {{ $props.obs_nombre_calle_legal_valido }}
      {{ $props.leal_numero }}
      {{ $props.leal_numero_valido }}
      {{ $props.leal_numero_correcto }}
      {{ $props.obs_leal_numero }}
      {{ $props.obs_leal_numero_valido }}
      {{ $props.leal_telefono }}
      {{ $props.leal_telefono_valido }}
      {{ $props.leal_telefono_correcto }}
      {{ $props.obs_leal_telefono }}
      {{ $props.obs_leal_telefono_valido }}
      {{ $props.leal_provincia }}
      {{ $props.leal_provincia_valido }}
      {{ $props.leal_provincia_correcto }}
      {{ $props.obs_leal_provincia }}
      {{ $props.obs_leal_provincia_valido }}
      {{ $props.leal_departamento }}
      {{ $props.leal_departamento_valido }}
      {{ $props.leal_departamento_correcto }}
      {{ $props.obs_leal_departamento }}
      {{ $props.obs_leal_departamento_valido }}
      {{ $props.leal_localidad }}
      {{ $props.leal_localidad_valido }}
      {{ $props.leal_localidad_correcto }}
      {{ $props.obs_leal_localidad }}
      {{ $props.obs_leal_localidad_valido }}

      {{ $props.leal_cp }}
      {{ $props.leal_cp_valido }}
      {{ $props.leal_cp_correcto }}
      {{ $props.obs_leal_cp }}
      {{ $props.obs_leal_cp_valido }}

      {{ $props.leal_otro }}
      {{ $props.leal_otro_valido }}
      {{ $props.leal_otro_correcto }}
      {{ $props.obs_leal_otro }}
      {{ $props.obs_leal_otro_valido }}
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

import JetDialogModal from "@/Jetstream/DialogModal";
export default {
  props: [
    "link_volver",
    "titulo_boton_volver",
    "titulo_boton_guardar",
    "titulo_pagina",

    "leal_calle",
    "nombre_calle_legal_valido",
    "nombre_calle_legal_correcto",
    "obs_nombre_calle_legal",
    "obs_nombre_calle_legal_valido",

    "leal_numero",
    "leal_numero_valido",
    "leal_numero_correcto",
    "obs_leal_numero",
    "obs_leal_numero_valido",

    "leal_telefono",
    "leal_telefono_valido",
    "leal_telefono_correcto",
    "obs_leal_telefono",
    "obs_leal_telefono_valido",

    "leal_pais",
    "leal_pais_valido",
    "leal_pais_correcto",
    "obs_leal_pais",
    "obs_leal_pais_valido",

    "leal_provincia",
    "leal_provincia_valido",
    "leal_provincia_correcto",
    "obs_leal_provincia",
    "obs_leal_provincia_valido",

    "leal_departamento",
    "leal_departamento_valido",
    "leal_departamento_correcto",
    "obs_leal_departamento",
    "obs_leal_departamento_valido",

    "leal_localidad",
    "leal_localidad_valido",
    "leal_localidad_correcto",
    "obs_leal_localidad",
    "obs_leal_localidad_valido",

    "leal_cp",
    "leal_cp_valido",
    "leal_cp_correcto",
    "obs_leal_cp",
    "obs_leal_cp_valido",

    "leal_otro",
    "leal_otro_valido",
    "leal_otro_correcto",
    "obs_leal_otro",
    "obs_leal_otro_valido",

    "donde_guardar",

    "evaluacion",
    "id",
    "mostrar_testing",
  ],
  components: {
    JetDialogModal,
  },
  data() {
    return {
      // saludos: "Saludame qweqweqwe",
      // mostrar_modal_datos_ya_guardados: false,
      // modal_tittle: "",
      // modal_body: "",
    };
  },
  methods: {
    guardar_avnces_dos() {
      //alert("por guardar paso 2");
      //if(this.$props.evaluacion)
      //{
      // console.log("mi donde guardar es:");
      // console.log(this.$props.donde_guardar);
      //Soy autoridad minera
      let self = this;
      if (this.$props.donde_guardar === "legal") {
        axios
          .post("/formularios/evaluacion_auto_guardado_dos", {
            id: this.$props.id,

            leal_calle: this.$props.leal_calle,
            nombre_calle_legal_valido: this.$props.nombre_calle_legal_valido,
            nombre_calle_legal_correcto:
              this.$props.nombre_calle_legal_correcto,
            obs_nombre_calle_legal: this.$props.obs_nombre_calle_legal,
            obs_nombre_calle_legal_valido:
              this.$props.obs_nombre_calle_legal_valido,

            leal_numero: this.$props.leal_numero,
            leal_numero_valido: this.$props.leal_numero_valido,
            leal_numero_correcto: this.$props.leal_numero_correcto,
            obs_leal_numero: this.$props.obs_leal_numero,
            obs_leal_numero_valido: this.$props.obs_leal_numero_valido,

            leal_telefono: this.$props.leal_telefono,
            leal_telefono_valido: this.$props.leal_telefono_valido,
            leal_telefono_correcto: this.$props.leal_telefono_correcto,
            obs_leal_telefono: this.$props.obs_leal_telefono,
            obs_leal_telefono_valido: this.$props.obs_leal_telefono_valido,

            leal_provincia: this.$props.leal_provincia,
            leal_provincia_valido: this.$props.leal_provincia_valido,
            leal_provincia_correcto: this.$props.leal_provincia_correcto,
            obs_leal_provincia: this.$props.obs_leal_provincia,
            obs_leal_provincia_valido: this.$props.obs_leal_provincia_valido,

            leal_departamento: this.$props.leal_departamento,
            leal_departamento_valido: this.$props.leal_departamento_valido,
            leal_departamento_correcto: this.$props.leal_departamento_correcto,
            obs_leal_departamento: this.$props.obs_leal_departamento,
            obs_leal_departamento_valido:
              this.$props.obs_leal_departamento_valido,

            leal_localidad: this.$props.leal_localidad,
            leal_localidad_valido: this.$props.leal_localidad_valido,
            leal_localidad_correcto: this.$props.leal_localidad_correcto,
            obs_leal_localidad: this.$props.obs_leal_localidad,
            obs_leal_localidad_valido: this.$props.obs_leal_localidad_valido,

            leal_cp: this.$props.leal_cp,
            leal_cp_valido: this.$props.leal_cp_valido,
            leal_cp_correcto: this.$props.leal_cp_correcto,
            obs_leal_cp: this.$props.obs_leal_cp,
            obs_leal_cp_valido: this.$props.obs_leal_cp_valido,

            leal_otro: this.$props.leal_otro,
            leal_otro_valido: this.$props.leal_otro_valido,
            leal_otro_correcto: this.$props.leal_otro_correcto,
            obs_leal_otro: this.$props.obs_leal_otro,
            obs_leal_otro_valido: this.$props.obs_leal_otro_valido,

            es_evaluacion: this.$props.evaluacion,

            valor_de_progreso: 20,
            valor_de_aprobado: 20,
            valor_de_reprobado: 20,
          })
          .then(function (response) {
            // console.log(response.data);
            if (response.data === "se actualizaron los datos correctamente") {
              // console.log(
              //   "se actualizaron los datos correctamente, siendo un productor"
              // );
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
              // console.log("NO todo bien");
              Swal.fire("Error", "Error inesperado.", "error");
            }
          })
          .catch(function (error) {
            // handle error
            Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
            console.log(error);
          });
      }

      if (this.$props.donde_guardar === "administrativo") {
        // console.log("Guardar Dom Adm:");
        // console.log(this.$props);
        axios
          .post("/formularios/evaluacion_auto_guardado_tres", {
            id: this.$props.id,

            administracion_calle: this.$props.leal_calle,
            nombre_calle_administracion_valido:
              this.$props.nombre_calle_legal_valido,
            nombre_calle_administracion_correcto:
              this.$props.nombre_calle_legal_correcto,
            obs_nombre_calle_administracion: this.$props.obs_nombre_calle_legal,
            obs_nombre_calle_administracion_valido:
              this.$props.obs_nombre_calle_legal_valido,

            administracion_numero: this.$props.leal_numero,
            administracion_numero_valido: this.$props.leal_numero_valido,
            administracion_numero_correcto: this.$props.leal_numero_correcto,
            obs_administracion_numero: this.$props.obs_leal_numero,
            obs_administracion_numero_valido:
              this.$props.obs_leal_numero_valido,

            administracion_telefono: this.$props.leal_telefono,
            administracion_telefono_valido: this.$props.leal_telefono_valido,
            administracion_telefono_correcto:
              this.$props.leal_telefono_correcto,
            obs_administracion_telefono: this.$props.obs_leal_telefono,
            obs_administracion_telefono_valido:
              this.$props.obs_leal_telefono_valido,

            administracion_provincia: this.$props.leal_provincia,
            administracion_provincia_valido: this.$props.leal_provincia_valido,
            administracion_provincia_correcto:
              this.$props.leal_provincia_correcto,
            obs_administracion_provincia: this.$props.obs_leal_provincia,
            obs_administracion_provincia_valido:
              this.$props.obs_leal_provincia_valido,

            administracion_departamento: this.$props.leal_departamento,
            administracion_departamento_valido:
              this.$props.leal_departamento_valido,
            administracion_departamento_correcto:
              this.$props.leal_departamento_correcto,
            obs_administracion_departamento: this.$props.obs_leal_departamento,
            obs_administracion_departamento_valido:
              this.$props.obs_leal_departamento_valido,

            administracion_localidad: this.$props.leal_localidad,
            administracion_localidad_valido: this.$props.leal_localidad_valido,
            administracion_localidad_correcto:
              this.$props.leal_localidad_correcto,
            obs_administracion_localidad: this.$props.obs_leal_localidad,
            obs_administracion_localidad_valido:
              this.$props.obs_leal_localidad_valido,

            administracion_cp: this.$props.leal_cp,
            administracion_cp_valido: this.$props.leal_cp_valido,
            administracion_cp_correcto: this.$props.leal_cp_correcto,
            obs_administracion_cp: this.$props.obs_leal_cp,
            obs_administracion_cp_valido: this.$props.obs_leal_cp_valido,

            administracion_otro: this.$props.leal_otro,
            administracion_otro_valido: this.$props.leal_otro_valido,
            administracion_otro_correcto: this.$props.leal_otro_correcto,
            obs_administracion_otro: this.$props.obs_leal_otro,
            obs_administracion_otro_valido: this.$props.obs_leal_otro_valido,

            es_evaluacion: this.$props.evaluacion,

            valor_de_progreso: 20,
            valor_de_aprobado: 20,
            valor_de_reprobado: 20,
          })
          .then(function (response) {
            // console.log(response.data);
            if (response.data === "se actualizaron los datos correctamente") {
              // console.log("todo bien");
              // self.modal_tittle = "Datos de paso 3 guardados correctamente";
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
            console.log(error);
            Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
          });
      }

      //soy una autoridad minera

      //}
      //if(!this.$props.evaluacion)
      //{
      //soy un productor
    },
    // cerrar_modal_datos_uno() {
    //   this.mostrar_modal_datos_ya_guardados = false;
    // },
    ver_pagina_siguiente(valor) {
      this.$emit("mostrarpasosiguiente", valor);
    },
  },
};
</script>
