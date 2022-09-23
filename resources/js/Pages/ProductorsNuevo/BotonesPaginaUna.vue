<template>
  <div class="flex flex-col items-center justify-center w-full">
    <div class="flex items-stretch w-full justify-items-stretch">
      <div
        class="justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center w-full"
      >
        <button
          type="button"
          :disabled="$props.desactivar_boton_guardar_uno"
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
          >{{ titulo_boton_volver }}</a
        >
      </div>
    </div>
    <div v-if="$props.testing">
      {{ $props.razon_social }}
      {{ $props.razon_social_valido }}
      {{ $props.razon_social_correcto }}
      {{ $props.obs_razon_social }}
      {{ $props.obs_razon_social_valido }}
      {{ $props.email }}
      {{ $props.email_valido }}
      {{ $props.email_correcto }}
      {{ $props.obs_email }}
      {{ $props.obs_email_valido }}
      {{ $props.cuit }}
      {{ $props.cuit_valido }}
      {{ $props.cuit_correcto }}
      {{ $props.obs_cuit }}
      {{ $props.obs_cuit_valido }}
      {{ $props.numeroproductor }}
      {{ $props.numeroproductor_valido }}
      {{ $props.numeroproductor_correcto }}
      {{ $props.obs_numeroproductor }}
      {{ $props.obs_numeroproductor_valido }}

      <br />
      valor dgr: {{ $props.inscripciondgr }}

      --corrlor dgr{{ $props.inscripciondgr_correcto }} --dgr_obs:{{
        $props.obs_inscripciondgr
      }}
      <br />
      valor cons:{{ $props.constaciasociedad }} -- corr cons:{{
        $props.constanciasociedad_correcto
      }}
      --cons_obs:{{ $props.obs_constanciasociedad }}
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

    "razon_social",
    "razon_social_valido",
    "razon_social_correcto",
    "obs_razon_social",
    "obs_razon_social_valido",
    "email",
    "email_valido",
    "email_correcto",
    "obs_email",
    "obs_email_valido",
    "cuit",
    "cuit_valido",
    "cuit_correcto",
    "obs_cuit",
    "obs_cuit_valido",
    "numeroproductor",
    "numeroproductor_valido",
    "numeroproductor_correcto",
    "obs_numeroproductor",
    "obs_numeroproductor_valido",
    "tiposociedad",
    "tiposociedad_valido",
    "tiposociedad_correcto",
    "obs_tiposociedad",
    "obs_tiposociedad_valido",
    "inscripciondgr",
    "inscripciondgr_valido",
    "inscripciondgr_correcto",
    "obs_inscripciondgr",
    "obs_inscripciondgr_valida",

    "constaciasociedad",
    "constanciasociedad_valido",
    "constanciasociedad_correcto",
    "obs_constanciasociedad",
    "obs_constanciasociedad_valido",

    "desactivar_boton_guardar_uno",

    "evaluacion",
    "id",
    "testing",
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
    mandar_id_al_padre(id) {
      this.$emit("CreeUnNuevoId", id);
    },
    mandar_id_adicional_al_padre(id) {
      this.$emit("CreeUnNuevoIdAdcional", id);
    },

    actualizar_inscripcion_nueva(pathnueva) {
      // console.log("actualizando la inscripcion");
      this.$emit("actualizarinscripcion", pathnueva);
    },
    actualizar_cosntancia_nueva(pathnueva) {
      this.$emit("actualizaconstancia", pathnueva);
    },

    guardar_avnces_uno() {
      //alert("el id q mando es:"+this.$props.evaluacion);
      // if(this.$props.evaluacion)
      // {
      //Soy autoridad minera
      let self = this;
      const data = new FormData();
      data.append("id", this.$props.id);
      data.append("razon_social", this.$props.razon_social);
      data.append("razon_social_valido", this.$props.razon_social_valido);
      data.append("razon_social_correcto", this.$props.razon_social_correcto);
      data.append("obs_razon_social", this.$props.obs_razon_social);
      data.append(
        "obs_razon_social_valido",
        this.$props.obs_razon_social_valido
      );
      data.append("email", this.$props.email);
      data.append("email_valido", this.$props.email_valido);
      data.append("email_correcto", this.$props.email_correcto);
      data.append("obs_email", this.$props.obs_email);
      data.append("obs_email_valido", this.$props.obs_email_valido);
      data.append("cuit", this.$props.cuit);
      data.append("cuit_valido", this.$props.cuit_valido);
      data.append("cuit_correcto", this.$props.cuit_correcto);
      data.append("obs_cuit", this.$props.obs_cuit);
      data.append("obs_cuit_valido", this.$props.obs_cuit_valido);
      data.append("numeroproductor", this.$props.numeroproductor);
      data.append("numeroproductor_valido", this.$props.numeroproductor_valido);
      data.append(
        "numeroproductor_correcto",
        this.$props.numeroproductor_correcto
      );
      data.append("obs_numeroproductor", this.$props.obs_numeroproductor);
      data.append(
        "obs_numeroproductor_valido",
        this.$props.obs_numeroproductor_valido
      );
      data.append("tiposociedad", this.$props.tiposociedad);
      data.append("tiposociedad_valido", this.$props.tiposociedad_valido);
      data.append("tiposociedad_correcto", this.$props.tiposociedad_correcto);
      data.append("obs_tiposociedad", this.$props.obs_tiposociedad);
      data.append(
        "obs_tiposociedad_valido",
        this.$props.obs_tiposociedad_valido
      );
      data.append("inscripciondgr", this.$props.inscripciondgr);
      data.append("inscripciondgr_valido", this.$props.inscripciondgr_valido);
      data.append(
        "inscripciondgr_correcto",
        this.$props.inscripciondgr_correcto
      );
      data.append("obs_inscripciondgr", this.$props.obs_inscripciondgr);
      data.append(
        "obs_inscripciondgr_valido",
        this.$props.obs_inscripciondgr_valido
      );
      data.append("constaciasociedad", this.$props.constaciasociedad);
      data.append(
        "constaciasociedad_valido",
        this.$props.constanciasociedad_valido
      );
      data.append(
        "constaciasociedad_correcto",
        this.$props.constanciasociedad_correcto
      );
      data.append("obs_constaciasociedad", this.$props.obs_constanciasociedad);
      data.append(
        "obs_constaciasociedad_valido",
        this.$props.obs_constanciasociedad_valido
      );
      data.append("valor_de_progreso", 20);
      data.append("valor_de_aprobado", 20);
      data.append("valor_de_reprobado", 20);
      data.append("es_evaluacion", this.$props.evaluacion);
      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
      axios
        .post("/formularios/evaluacion_auto_guardado_uno", data)
        .then(function (response) {
          //   console.log(response.data.msg);
          // if (response.data.msg === "Datos actualizados correctamente.") {
          //   // console.log("todo bien");
          //   // self.modal_tittle = "Datos guardados correctamente como Autoridad";
          //   // self.modal_body =
          //   //   "Recien hemos guardados los datos del productor de manera correcta, siendo Autoridad, gracias por usar este servcio, por favor continue llenando el formulario";
          //   // self.mostrar_modal_datos_ya_guardados = true;
          //   Swal.fire(
          //     "Datos guardados correctamente como Autoridad.",
          //     "Gracias por usar este servicio, por favor continue completando el formulario.",
          //     "success"
          //   ).then((result) => {
          //     self.ver_pagina_siguiente(true);
          //   });
          //   // console.log(response.data.path_inscripcion);
          //   // console.log(response.data.path_constaciasociedad);
          //   if (response.data.path_inscripcion !== "")
          //     self.actualizar_inscripcion_nueva(response.data.path_inscripcion);
          //   if (response.data.path_constaciasociedad !== "")
          //     self.actualizar_cosntancia_nueva(
          //       response.data.path_constaciasociedad
          //     );
          // }
          if (response.data.rol === "productor") {
            // console.log("todo bien");
            // self.modal_tittle = "Datos guardados correctamente como Productor";
            // self.modal_body =
            //   "Recien hemos guardados los datos del productor de manera correcta, siendo Autoridad, gracias por usar este servcio, por favor continue llenando el formulario";
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Datos guardados correctamente como Productor.",
              "Gracias por usar este servicio, por favor continue completando el formulario.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
            // console.log(response.data.path_inscripcion);
            // console.log(response.data.path_constaciasociedad);
            if (response.data.path_inscripcion !== "")
              self.actualizar_inscripcion_nueva(response.data.path_inscripcion);
            if (response.data.path_constaciasociedad !== "")
              self.actualizar_cosntancia_nueva(
                response.data.path_constaciasociedad
              );
          }
          else if (response.data.rol === "autoridad") {
            // self.modal_tittle =
            //   "Datos de de evaluación Productor guardados correctamente.";
            // self.modal_body =
            //   "Recien hemos guardados los datos de la evaluacin que ha cargado usted como autoridad minera.";
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Se guardaron correctamente los datos de Evaluación del Productor.",
              "Se guardó los datos de la evaluación que ha cargado usted como autoridad minera.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          }
          else if (response.data.msg === "se creo el borrador") {
            console.log("data = ", response.data);
            // self.modal_tittle = "Se creó correctamente nuevo Borrador";
            // self.modal_body =
            //   "Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias por usar este servicio. El id es:" +
            //   response.data.id +
            //   " - Ademas el estado del borrador es: " +
            //   response.data.estado;
            // self.mostrar_modal_datos_ya_guardados = true;
            Swal.fire(
              "Se creó correctamente un nuevo Borrador.",
              "Se ha guardado correctamente los Datos del Productor. <b> <br/> [ Id = " +
                response.data.id +" ] <br/> [N° RPM = "+ response.data.num_rpm +" ] <br/> [ Estado = " + response.data.estado + " ]. </b>",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
            self.mandar_id_al_padre(response.data.id);
            self.mandar_id_adicional_al_padre(response.data.id_adicional);
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
    // cerrar_modal_datos_uno() {
    //   this.mostrar_modal_datos_ya_guardados = false;
    // },
  },
};
</script>