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
    </jet-dialog-modal>
 -->
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
          @click="guardar_avnces_cinco"
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
    <div v-show="testing">
      * decreto3737: {{ $props.formulario.decreto3737 }} * *
      decreto3737_correcto: {{ $props.formulario.decreto3737_correcto }} * *
      decreto3737_valido: {{ $props.formulario.decreto3737_valido }} * *
      obs_decreto3737: {{ $props.formulario.obs_decreto3737 }} * *
      obs_decreto3737_valido: {{ $props.formulario.obs_decreto3737_valido }} * *
      situacion_mina : {{ $props.formulario.situacion_mina }} * *
      situacion_mina_correcto :
      {{ $props.formulario.situacion_mina_correcto }} * * obs_situacion_mina :
      {{ $props.formulario.obs_situacion_mina }} * * situacion_mina_valido :
      {{ $props.formulario.situacion_mina_valido }} * *
      obs_situacion_mina_valido :
      {{ $props.formulario.obs_situacion_mina_valido }} * *
      concesion_minera_asiento_n:
      {{ $props.formulario.concesion_minera_asiento_n }} * *
      concesion_minera_asiento_n_valido:
      {{ $props.formulario.concesion_minera_asiento_n_valido }} * *
      concesion_minera_fojas: {{ $props.formulario.concesion_minera_fojas }} * *
      concesion_minera_fojas_valido:
      {{ $props.formulario.concesion_minera_fojas_valido }} * *
      concesion_minera_tomo_n :
      {{ $props.formulario.concesion_minera_tomo_n }} * *
      concesion_minera_tomo_n_valido :
      {{ $props.formulario.concesion_minera_tomo_n_valido }} * *
      concesion_minera_reg_m_y_d :
      {{ $props.formulario.concesion_minera_reg_m_y_d }} * *
      concesion_minera_reg_m_y_d_valido :
      {{ $props.formulario.concesion_minera_reg_m_y_d_valido }} * *
      concesion_minera_reg_cant :
      {{ $props.formulario.concesion_minera_reg_cant }} * *
      concesion_minera_reg_cant_valido :
      {{ $props.formulario.concesion_minera_reg_cant_valido }} * *
      concesion_minera_reg_men :
      {{ $props.formulario.concesion_minera_reg_men }} * *
      concesion_minera_reg_men_valido :
      {{ $props.formulario.concesion_minera_reg_men_valido }} * *
      concesion_minera_reg_d_y_c :
      {{ $props.formulario.concesion_minera_reg_d_y_c }} * *
      concesion_minera_reg_d_y_c_valido :
      {{ $props.formulario.concesion_minera_reg_d_y_c_valido }} * *
      obs_concesion_minera_reg_d_y_c :
      {{ $props.formulario.obs_concesion_minera_reg_d_y_c }} * *
      obs_concesion_minera_reg_d_y_c_valido :
      {{ $props.formulario.obs_concesion_minera_reg_d_y_c_valido }} *
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
      // console.log("Mendoza:");
      // console.log(this.$props.formulario);
      //Soy autoridad minera
      let self = this;
      const data = new FormData();
      data.append("id", this.$props.id);
      data.append("es_evaluacion", this.$props.evaluacion);
      data.append("testing", this.$props.testing);

      data.append("decreto3737", this.$props.formulario.decreto3737);
      data.append(
        "decreto3737_correcto",
        this.$props.formulario.decreto3737_correcto
      );
      data.append("obs_decreto3737", this.$props.formulario.obs_decreto3737);

      data.append("situacion_mina", this.$props.formulario.situacion_mina);
      data.append(
        "situacion_mina_correcto",
        this.$props.formulario.situacion_mina_correcto
      );
      data.append(
        "obs_situacion_mina",
        this.$props.formulario.obs_situacion_mina
      );

      data.append(
        "concesion_minera_asiento_n",
        this.$props.formulario.concesion_minera_asiento_n
      );

      data.append(
        "concesion_minera_fojas",
        this.$props.formulario.concesion_minera_fojas
      );

      data.append(
        "concesion_minera_tomo_n",
        this.$props.formulario.concesion_minera_tomo_n
      );

      data.append(
        "concesion_minera_reg_m_y_d",
        this.$props.formulario.concesion_minera_reg_m_y_d
      );

      data.append(
        "concesion_minera_reg_cant",
        this.$props.formulario.concesion_minera_reg_cant
      );

      data.append(
        "concesion_minera_reg_men",
        this.$props.formulario.concesion_minera_reg_men
      );

      data.append(
        "concesion_minera_reg_d_y_c",
        this.$props.formulario.concesion_minera_reg_d_y_c
      );
      data.append(
        "concesion_minera_reg_d_y_c_correcto",
        this.$props.formulario.concesion_minera_reg_d_y_c_correcto
      );
      data.append(
        "obs_concesion_minera_reg_d_y_c",
        this.$props.formulario.obs_concesion_minera_reg_d_y_c
      );
      // console.log("Data:");
      // console.log(data);
      axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
      axios
        .post(
          this.$inertia.page.props.appName +
            "/formularios/evaluacion_auto_guardado_mendoza",
          data
        )
        .then(function (response) {
          // console.log(response);
          // self.modal_tittle =
          //   "Datos del paso de Mendoza han sido guardados correctamente";
          // self.modal_body = response.data.msg;
          // self.mostrar_modal_datos_ya_guardados = true;
          if (response.data.msg == "se creo el registro correctamente") {
            Swal.fire(
              "Datos guardados correctamente.",
              "Gracias por usar este servicio, por favor continue completando el formulario.",
              "success"
            ).then((result) => {
              self.ver_pagina_siguiente(true);
            });
          } else {
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
