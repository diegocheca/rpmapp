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
          @click="guardar_avnces_cuatro"
        >
          {{ titulo_boton_guardar }}
        </button>
      </div>
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
    <div v-show="$props.testing">
      {{ $props.numero_expdiente }}
      {{ $props.numero_expdiente_valido }}
      {{ $props.numero_expdiente_correcto }}
      {{ $props.obs_numero_expdiente }}
      {{ $props.obs_numero_expdiente_valido }}
      {{ $props.categoria }}
      {{ $props.categoria_validacion }}
      {{ $props.categoria_correcto }}
      {{ $props.obs_categoria }}
      {{ $props.obs_categoria_valido }}
      {{ $props.nombre_mina }}
      {{ $props.nombre_mina_validacion }}
      {{ $props.nombre_mina_correcto }}
      {{ $props.obs_nombre_mina }}
      {{ $props.obs_nombre_mina_valido }}
      {{ $props.descripcion_mina }}
      {{ $props.descripcion_mina_validacion }}
      {{ $props.descripcion_mina_correcto }}
      {{ $props.obs_descripcion_mina }}
      {{ $props.obs_descripcion_mina_valido }}
      {{ $props.distrito_minero }}
      {{ $props.distrito_minero_validacion }}
      {{ $props.distrito_minero_correcto }}
      {{ $props.obs_distrito_minero }}
      {{ $props.obs_distrito_minero_valido }}
      {{ $props.mina_cantera }}
      {{ $props.mina_cantera_validacion }}
      {{ $props.mina_cantera_correcto }}
      {{ $props.obs_mina_cantera }}
      {{ $props.obs_mina_cantera_valido }}
      {{ $props.plano_inmueble }}
      {{ $props.plano_inmueble_validacion }}
      {{ $props.plano_inmueble_correcto }}
      {{ $props.obs_plano_inmueble }}
      {{ $props.obs_plano_inmueble_valido }}
      {{ $props.minerales_variedad }}
      {{ $props.minerales_variedad_validacion }}
      {{ $props.minerales_variedad_correcto }}
      {{ $props.obs_minerales_variedad }}
      {{ $props.obs_minerales_variedad_valido }}
      {{ $props.resolucion_concesion_minera }}
      {{ $props.resolucion_concesion_minera_validacion }}
      {{ $props.resolucion_concesion_minera_correcto }}
      {{ $props.obs_resolucion_concesion_minera }}
      {{ $props.obs_resolucion_concesion_minera_valido }}
      {{ $props.titulo_contrato_posecion }}
      {{ $props.titulo_contrato_posecion_validacion }}
      {{ $props.titulo_contrato_posecion_correcto }}
      {{ $props.obs_titulo_contrato_posecion }}
      {{ $props.obs_titulo_contrato_posecion_valido }}
      {{ $props.minerales }}
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

    "numero_expdiente",
    "numero_expdiente_valido",
    "numero_expdiente_correcto",
    "obs_numero_expdiente",
    "obs_numero_expdiente_valido",
    "categoria",
    "categoria_validacion",
    "categoria_correcto",
    "obs_categoria",
    "obs_categoria_valido",
    "nombre_mina",
    "nombre_mina_validacion",
    "nombre_mina_correcto",
    "obs_nombre_mina",
    "obs_nombre_mina_valido",
    "descripcion_mina",
    "descripcion_mina_validacion",
    "descripcion_mina_correcto",
    "obs_descripcion_mina",
    "obs_descripcion_mina_valido",
    "distrito_minero",
    "distrito_minero_validacion",
    "distrito_minero_correcto",
    "obs_distrito_minero",
    "obs_distrito_minero_valido",
    "mina_cantera",
    "mina_cantera_validacion",
    "mina_cantera_correcto",
    "obs_mina_cantera",
    "obs_mina_cantera_valido",
    "plano_inmueble",
    "plano_inmueble_validacion",
    "plano_inmueble_correcto",
    "obs_plano_inmueble",
    "obs_plano_inmueble_valido",
    "minerales_variedad",
    "minerales_variedad_validacion",
    "minerales_variedad_correcto",
    "obs_minerales_variedad",
    "obs_minerales_variedad_valido",
    "resolucion_concesion_minera",
    "resolucion_concesion_minera_validacion",
    "resolucion_concesion_minera_correcto",
    "obs_resolucion_concesion_minera",
    "obs_resolucion_concesion_minera_valido",
    "titulo_contrato_posecion",
    "titulo_contrato_posecion_validacion",
    "titulo_contrato_posecion_correcto",
    "obs_titulo_contrato_posecion",
    "obs_titulo_contrato_posecion_valido",

    "minerales",

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
    guardar_avnces_cuatro() {
      //if(this.$props.evaluacion)
      //{
      //Soy autoridad minera
      let self = this;
      const data = new FormData();
      data.append("id", this.$props.id);
      data.append("numero_expdiente", this.$props.numero_expdiente);
      data.append(
        "numero_expdiente_valido",
        this.$props.numero_expdiente_valido
      );
      data.append(
        "numero_expdiente_correcto",
        this.$props.numero_expdiente_correcto
      );
      data.append("obs_numero_expdiente", this.$props.obs_numero_expdiente);
      data.append(
        "obs_numero_expdiente_valido",
        this.$props.obs_numero_expdiente_valido
      );
      data.append("categoria", this.$props.categoria);
      data.append("categoria_validacion", this.$props.categoria_validacion);
      data.append("categoria_correcto", this.$props.categoria_correcto);
      data.append("obs_categoria", this.$props.obs_categoria);
      data.append("obs_categoria_valido", this.$props.obs_categoria_valido);
      data.append("nombre_mina", this.$props.nombre_mina);
      data.append("nombre_mina_validacion", this.$props.nombre_mina_validacion);
      data.append("nombre_mina_correcto", this.$props.nombre_mina_correcto);
      data.append("obs_nombre_mina", this.$props.obs_nombre_mina);
      data.append("obs_nombre_mina_valido", this.$props.obs_nombre_mina_valido);
      data.append("descripcion_mina", this.$props.descripcion_mina);
      data.append(
        "descripcion_mina_validacion",
        this.$props.descripcion_mina_validacion
      );
      data.append(
        "descripcion_mina_correcto",
        this.$props.descripcion_mina_correcto
      );
      data.append("obs_descripcion_mina", this.$props.obs_descripcion_mina);
      data.append(
        "obs_descripcion_mina_valido",
        this.$props.obs_descripcion_mina_valido
      );
      data.append("distrito_minero", this.$props.distrito_minero);
      data.append(
        "distrito_minero_validacion",
        this.$props.distrito_minero_validacion
      );
      data.append(
        "distrito_minero_correcto",
        this.$props.distrito_minero_correcto
      );
      data.append("obs_distrito_minero", this.$props.obs_distrito_minero);
      data.append(
        "obs_distrito_minero_valido",
        this.$props.obs_distrito_minero_valido
      );
      data.append("mina_cantera", this.$props.mina_cantera);
      data.append(
        "mina_cantera_validacion",
        this.$props.mina_cantera_validacion
      );
      data.append("mina_cantera_correcto", this.$props.mina_cantera_correcto);
      data.append("obs_mina_cantera", this.$props.obs_mina_cantera);
      data.append(
        "obs_mina_cantera_valido",
        this.$props.obs_mina_cantera_valido
      );
      data.append("plano_inmueble", this.$props.plano_inmueble);
      data.append(
        "plano_inmueble_validacion",
        this.$props.plano_inmueble_validacion
      );
      data.append(
        "plano_inmueble_correcto",
        this.$props.plano_inmueble_correcto
      );
      data.append("obs_plano_inmueble", this.$props.obs_plano_inmueble);
      data.append(
        "obs_plano_inmueble_valido",
        this.$props.obs_plano_inmueble_valido
      );
      data.append("minerales_variedad", this.$props.minerales_variedad);
      data.append(
        "minerales_variedad_validacion",
        this.$props.minerales_variedad_validacion
      );
      data.append(
        "minerales_variedad_correcto",
        this.$props.minerales_variedad_correcto
      );
      data.append("obs_minerales_variedad", this.$props.obs_minerales_variedad);
      data.append(
        "obs_minerales_variedad_valido",
        this.$props.obs_minerales_variedad_valido
      );
      data.append(
        "resolucion_concesion_minera",
        this.$props.resolucion_concesion_minera
      );
      data.append(
        "resolucion_concesion_minera_validacion",
        this.$props.resolucion_concesion_minera_validacion
      );
      data.append(
        "resolucion_concesion_minera_correcto",
        this.$props.resolucion_concesion_minera_correcto
      );
      data.append(
        "obs_resolucion_concesion_minera",
        this.$props.obs_resolucion_concesion_minera
      );
      data.append(
        "obs_resolucion_concesion_minera_valido",
        this.$props.obs_resolucion_concesion_minera_valido
      );
      data.append(
        "titulo_contrato_posecion",
        this.$props.titulo_contrato_posecion
      );
      data.append(
        "titulo_contrato_posecion_validacion",
        this.$props.titulo_contrato_posecion_validacion
      );
      data.append(
        "titulo_contrato_posecion_correcto",
        this.$props.titulo_contrato_posecion_correcto
      );
      data.append(
        "obs_titulo_contrato_posecion",
        this.$props.obs_titulo_contrato_posecion
      );
      data.append(
        "obs_titulo_contrato_posecion_valido",
        this.$props.obs_titulo_contrato_posecion_valido
      );
      data.append("lista_minerales", this.$props.minerales);
      data.append("es_evaluacion", this.$props.evaluacion);
      data.append("valor_de_progreso", 20);
      data.append("valor_de_aprobado", 20);
      data.append("valor_de_reprobado", 20);
      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
// console.log(this.$inertia.page.props.appName);
//       alert(this.$inertia.page.props.appName);
      axios
        .post(
          "/formularios/evaluacion_auto_guardado_cuatro",
          data
        )
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
      if (this.$props.minerales["length"] != 0) {
        axios
          .post(
            "/formularios/guardar_lista_minerales",
            {
              id: this.$props.id,
              lista_minerales: this.$props.minerales,
              es_evaluacion: this.$props.evaluacion,
            }
          )
          .then(function (response) {
            // if (response.data === "se actualizaron los datos correctamente") {
            //   // console.log("todo bien");
            //   // self.modal_tittle = "Datos guardados correctamente";
            //   // self.modal_body =
            //   //   "Recien hemos guardados los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario";
            //   // self.mostrar_modal_datos_ya_guardados = true;
            //   Swal.fire(
            //     "Datos guardados correctamente.",
            //     "Gracias por usar este servicio, por favor continue completando el formulario.",
            //     "success"
            //   ).then((result) => {
            //     self.ver_pagina_siguiente(true);
            //   });
            // } else {
            //   // console.log("NO todo bien");
            //   Swal.fire("Error", "Error inesperado.", "error");
            // }
          })
          .catch(function (error) {
            // handle error
            Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
            console.log(error);
          });
      }
    },
    // cerrar_modal_datos_uno() {
    //   this.mostrar_modal_datos_ya_guardados = false;
    // },
  },
};
</script>