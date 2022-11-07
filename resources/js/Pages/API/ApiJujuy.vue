<template>
  <app-layout>
    <div>
      <div class="items-center w-full bg-teal-lighter">
        <h1
          class="
            uppercase
            px-2
            py-3
            m-4
            shadow-lg
            text-center text-2xl text-white
            font-bold
            bg-blue-500
          "
        >
          API de la Provincia 7878
        </h1>
        <div
          class="flex justify-self-auto mb-6 md:mb-0 px-3 sm:w-5/5 self-center"
        >
          <button
            type="button"
            class="
              mx-1
              w-full
              uppercase
              py-3
              px-5
              text-white
              border border-orange-500
              bg-orange-500
              shadow-md
              font-bold
              hover:text-white hover:shadow-xl hover:bg-orange-600 hover:border-orange-600
            "
            @click="consultar_datos"
          >
            Consultar Metodo
          </button>
          <button
            type="button"
            class="
              mx-1
              w-full
              uppercase
              py-3
              px-5
              text-white
              border border-green-500
              bg-green-500
              shadow-md
              font-bold
              hover:text-white hover:shadow-xl hover:bg-green-700
            "
            @click="enviar_datos"
          >
            Enviar Datos
          </button>
        </div>
        <div class="flex">
          <div class="w-full bg-white rounded shadow-lg p-2 m-4">
            <label
              class="
                underline underline-offset-1
                px-2
                pt-2
                block
                uppercase
                tracking-wide
                font-bold
                text-blue-700 text-md
              "
              >Estado</label
            >
            <div class="p-5">
              {{ estado }}
            </div>
          </div>
          <div class="w-full bg-white rounded shadow-lg p-2 m-4">
            <label
              class="
                underline underline-offset-1
                px-2
                pt-2
                block
                uppercase
                tracking-wide
                font-bold
                text-blue-700 text-md
              "
              >Provincia</label
            >
            <div class="p-5">{{ provincia }} - {{ nombre_provincia }}</div>
          </div>
          <div class="w-full bg-white rounded shadow-lg p-2 m-4">
            <label
              class="
                underline underline-offset-1
                px-2
                pt-2
                block
                uppercase
                tracking-wide
                font-bold
                text-blue-700 text-md
              "
              >Fecha de Consulta</label
            >
            <div class="p-5">
              {{ fecha }}
            </div>
          </div>
        </div>
        <div class="bg-white rounded shadow-lg m-4">
          <label
            class="
              underline underline-offset-1
              px-4
              pt-4
              block
              uppercase
              tracking-wide
              font-bold
              text-blue-700 text-md
            "
            >JSON para enviar</label
          >
          <json-viewer :value="datosJSON"></json-viewer>
        </div>
      </div>
    </div>
    <!-- <hr />
    <json-viewer
      :value="jsonData"
      :expand-depth="5"
      copyable
      boxed
      sort
    ></json-viewer> -->
  </app-layout>
</template>
<script>
// import AppLayout from "@/Layouts/AppLayout";
import AppLayout from "@/Layouts/AppLayoutAdmin";
import JsonViewer from "vue-json-viewer";
import Swal from "sweetalert2";

export default {
  components: {
    AppLayout,
    JsonViewer,
  },
  //   props: ["datos", "estado", "provincia", "nombre_provincia", "fecha"],
  data() {
    return {
      datosJSON: "Sin Datos",
      estado: "Sin Datos",
      provincia: 0,
      nombre_provincia: "Sin Datos",
      fecha: null,
      //   datosJSON: this.$props.datos,
    };
  },
  mounted() {},
  methods: {
    enviar_datos() {
      let self = this;
      axios
        .post("/enviarDatos", {
          jSONDatos: self.datosJSON,
          provincia_id: self.provincia,
        })
        .then(function (response) {
          if (response.status == 200) {
            Swal.fire(
              "Datos enviados correctamente.",
              "Gracias por usar este servicio.",
              "success"
            ).then((result) => {
              if (result.isConfirmed) {
               self.$inertia.get(route("apiJujuy"));
              }
            });
          }
        })
        .catch(function (error) {
          Swal.fire("Error", "Error inesperado.", "error");
        });
    },
    consultar_datos() {
      let self = this;
      axios
        .get("/consultarDatos")
        .then(function (response) {
          console.log(response.data);
          if (response.status == 200) {
            self.datosJSON = response.data.datos;
            self.estado = response.data.estado;
            self.provincia = response.data.provincia;
            self.nombre_provincia = response.data.nombre_provincia;
            self.fecha = response.data.fecha;
          }
        })
        .catch(function (error) {});
    },
  },
};
</script>
