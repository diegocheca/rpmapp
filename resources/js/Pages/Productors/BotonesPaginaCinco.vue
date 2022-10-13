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

    "owner",
    "owner_correcto",
    "obs_owner",
    "obs_owner_valido",
    "arrendatario",
    "arrendatario_correcto",
    "obs_arrendatario",
    "obs_arrendatario_valido",
    "concesionario",
    "concesionario_correcto",
    "obs_concesionario",
    "obs_concesionario_valido",
    "otros",
    "otros_correcto",
    "obs_otros",
    "obs_otros_valido",
    "otros_input",
    "otros_input_valido",
    "sustancias",
    "sustancias_correcto",
    "obs_sustancias",
    "obs_sustancias_valido",
    "sustancias_input",
    "sustancias_input_valido",
    "titulo_contrato_posecion",
    "titulo_contrato_posecion_validacion",
    "titulo_contrato_posecion_correcto",
    "obs_titulo_contrato_posecion",
    "obs_titulo_contrato_posecion_valido",
    "resolucion_concesion_minera",
    "resolucion_concesion_minera_validacion",
    "resolucion_concesion_minera_correcto",
    "obs_resolucion_concesion_minera",
    "obs_resolucion_concesion_minera_valido",
    "constancia_pago_canon",
    "constancia_pago_canon_validacion",
    "constancia_pago_canon_correcto",
    "obs_constancia_pago_canon",
    "obs_constancia_pago_canon_valido",
    "iia",
    "iia_canon_validacion",
    "iia_correcto",
    "obs_iia_canon",
    "obs_iia_canon_valido",
    "dia",
    "dia_canon_validacion",
    "dia_correcto",
    "obs_dia_canon",
    "obs_dia_canon_valido",
    "acciones_a_desarrollar",
    "acciones_a_desarrollar_validacion",
    "acciones_a_desarrollar_correcto",
    "obs_acciones_a_desarrollar",
    "obs_acciones_a_desarrollar_valido",
    "actividad",
    "actividad_a_desarrollar_validacion",
    "actividad_a_desarrollar_correcto",
    "obs_actividad_a_desarrollar",
    "obs_actividad_a_desarrollar_valido",
    "fecha_alta_dia",
    "fecha_alta_dia_validacion",
    "fecha_alta_dia_correcto",
    "obs_fecha_alta_dia",
    "obs_fecha_alta_dia_valido",
    "fecha_vencimiento_dia",
    "fecha_vencimiento_dia_validacion",
    "fecha_vencimiento_dia_correcto",
    "obs_fecha_vencimiento_dia",
    "obs_fecha_vencimiento_dia_valido",

    "evaluacion",
    "testing",
    "id",
  ],
  components: {
    JetDialogModal,
  },
  data() {
    return {
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
    guardar_avnces_cinco() {
      //if(this.$props.evaluacion)
      //{
      //Soy autoridad minera
      let self = this;
      const data = new FormData();
      data.append("id", this.$props.id);
      data.append("owner", this.$props.owner);
      data.append("owner_correcto", this.$props.owner_correcto);
      data.append("obs_owner", this.$props.obs_owner);
      data.append("obs_owner_valido", this.$props.obs_owner_valido);
      data.append("arrendatario", this.$props.arrendatario);
      data.append("arrendatario_correcto", this.$props.arrendatario_correcto);
      data.append("obs_arrendatario", this.$props.obs_arrendatario);
      data.append(
        "obs_arrendatario_valido",
        this.$props.obs_arrendatario_valido
      );
      data.append("concesionario", this.$props.concesionario);
      data.append("concesionario_correcto", this.$props.concesionario_correcto);
      data.append("obs_concesionario", this.$props.obs_concesionario);
      data.append(
        "obs_concesionario_valido",
        this.$props.obs_concesionario_valido
      );
      data.append("otros", this.$props.otros);
      data.append("otros_correcto", this.$props.otros_correcto);
      data.append("obs_otros", this.$props.obs_otros);
      data.append("obs_otros_valido", this.$props.obs_otros_valido);
      data.append("otros_input", this.$props.otros_input);
      data.append("otros_input_valido", this.$props.otros_input_valido);
      data.append("sustancias", this.$props.sustancias);
      data.append("sustancias_correcto", this.$props.sustancias_correcto);
      data.append("obs_sustancias", this.$props.obs_sustancias);
      data.append("obs_sustancias_valido", this.$props.obs_sustancias_valido);
      data.append("sustancias_input", this.$props.sustancias_input);
      data.append(
        "sustancias_input_valido",
        this.$props.sustancias_input_valido
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
      data.append("constancia_pago_canon", this.$props.constancia_pago_canon);
      data.append(
        "constancia_pago_canon_validacion",
        this.$props.constancia_pago_canon_validacion
      );
      data.append(
        "constancia_pago_canon_correcto",
        this.$props.constancia_pago_canon_correcto
      );
      data.append(
        "obs_constancia_pago_canon",
        this.$props.obs_constancia_pago_canon
      );
      data.append(
        "obs_constancia_pago_canon_valido",
        this.$props.obs_constancia_pago_canon_valido
      );
      data.append("iia", this.$props.iia);
      data.append("iia_canon_validacion", this.$props.iia_canon_validacion);
      data.append("iia_correcto", this.$props.iia_correcto);
      data.append("obs_iia_canon", this.$props.obs_iia_canon);
      data.append("obs_iia_canon_valido", this.$props.obs_iia_canon_valido);
      data.append("dia", this.$props.dia);
      data.append("dia_canon_validacion", this.$props.dia_canon_validacion);
      data.append("dia_correcto", this.$props.dia_correcto);
      data.append("obs_dia_canon", this.$props.obs_dia_canon);
      data.append("obs_dia_canon_valido", this.$props.obs_dia_canon_valido);
      data.append("acciones_a_desarrollar", this.$props.acciones_a_desarrollar);
      data.append(
        "acciones_a_desarrollar_validacion",
        this.$props.acciones_a_desarrollar_validacion
      );
      data.append(
        "acciones_a_desarrollar_correcto",
        this.$props.acciones_a_desarrollar_correcto
      );
      data.append(
        "obs_acciones_a_desarrollar",
        this.$props.obs_acciones_a_desarrollar
      );
      data.append(
        "obs_acciones_a_desarrollar_valido",
        this.$props.obs_acciones_a_desarrollar_valido
      );
      data.append("actividad", this.$props.actividad);
      data.append(
        "actividad_a_desarrollar_validacion",
        this.$props.actividad_a_desarrollar_validacion
      );
      data.append(
        "actividad_a_desarrollar_correcto",
        this.$props.actividad_a_desarrollar_correcto
      );
      data.append(
        "obs_actividad_a_desarrollar",
        this.$props.obs_actividad_a_desarrollar
      );
      data.append(
        "obs_actividad_a_desarrollar_valido",
        this.$props.obs_actividad_a_desarrollar_valido
      );
      data.append("fecha_alta_dia", this.$props.fecha_alta_dia);
      data.append(
        "fecha_alta_dia_validacion",
        this.$props.fecha_alta_dia_validacion
      );
      data.append(
        "fecha_alta_dia_correcto",
        this.$props.fecha_alta_dia_correcto
      );
      data.append("obs_fecha_alta_dia", this.$props.obs_fecha_alta_dia);
      data.append(
        "obs_fecha_alta_dia_valido",
        this.$props.obs_fecha_alta_dia_valido
      );
      data.append("fecha_vencimiento_dia", this.$props.fecha_vencimiento_dia);
      data.append(
        "fecha_vencimiento_dia_validacion",
        this.$props.fecha_vencimiento_dia_validacion
      );
      data.append(
        "fecha_vencimiento_dia_correcto",
        this.$props.fecha_vencimiento_dia_correcto
      );
      data.append(
        "obs_fecha_vencimiento_dia",
        this.$props.obs_fecha_vencimiento_dia
      );
      data.append(
        "obs_fecha_vencimiento_dia_valido",
        this.$props.obs_fecha_vencimiento_dia_valido
      );
      data.append("es_evaluacion", this.$props.evaluacion);
      data.append("valor_de_progreso", 20);
      data.append("valor_de_aprobado", 20);
      data.append("valor_de_reprobado", 20);
      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
      axios
        .post(
          this.$inertia.page.props.appName +
            "/formularios/evaluacion_auto_guardado_cinco",
          data
        )
        .then(function (response) {
          if (response.data === "se actualizaron los datos correctamente") {
            Swal.fire(
              "Datos Guardados Correctamente.",
              "Los datos fueron guardados de manera correcta. Gracias por usar este servicio.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          } else {
            Swal.fire(
              "Error",
              "Ocurrio un error al guardar los datos.",
              "error"
            );
            // console.log("NO todo bien");
          }
        })
        .catch(function (error) {
          // handle error
          console.log(error);
          Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
        });
    },
  },
};
</script>
