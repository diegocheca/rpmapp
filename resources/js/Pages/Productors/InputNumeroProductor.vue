<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
      >{{ label }}</label
    >
    <div class="flex items-stretch w-full relative">
      <div class="flex">
        <span
          class="
            flex
            items-center
            leading-normal
            bg-grey-lighter
            border-1
            rounded-r-none
            border border-r-0 border-blue-300
            px-3
            whitespace-no-wrap
            text-grey-dark text-sm
            w-12
            h-10
            bg-blue-300
            justify-center
            items-center
            text-xl
            rounded-lg
            text-white
          "
        >
          <svg
            cxmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"
            ></path>
          </svg>
        </span>
      </div>
      <input
        type="text"
        class="
          flex-shrink flex-grow flex-auto
          leading-normal
          w-px
          flex-1
          border border-l-0
          h-10
          border-grey-light
          rounded-lg rounded-l-none rounded-r-none
          px-3
          relative
          focus:border-blue focus:shadow
        "
        placeholder="N° Productor"
        maxlength=""
        id="numProductores"
        v-model="numeroproductor"
        v-bind:class="clase_de_input_numprod"
        :disabled="evaluacion || $props.num_prod_disable"
        @input="cambio_input_numprod($event.target.value)"
      />
      <button
        id="btngenerar"
        @click="generar()"
        :disabled="evaluacion || $props.num_prod_disable"
        :class="
          evaluacion || $props.num_prod_disable
            ? 'bg-gray-500 '
            : 'bg-blue-500 hover:bg-gradient-to-r from-blue-900'
        "
        class="
          rounded rounded-l-none
          w-auto
          h-10
          px-3
          shadow-xl
          font-medium
          text-white
          py-2
        "
        type="button"
      >
        Generar N°
      </button>
    </div>
    <p v-bind:class="clase_cartel_nota_numprod">
      {{ cartel_nota_campo_numprod }}.
    </p>
    <div
      v-if="
        evaluacion ||
        num_prod_correccion_mostrar ||
        $props.mostrar_evaluacion_adm
      "
    >
      <!-- <div class="bg-white shadow-md rounded-md pb-2 border border-red-600">
        <h3 class="bg-red-800 px-4 text-white rounded-t mb-2">
          Seccion de evaluacion
        </h3>
        <div class="">
          <div class="w-full px-3">
            <span class="text-gray-700 mr-2">Correcto?</span>
            <label>
              <input
                type="radio"
                :disabled="$props.num_prod_correccion_desactivar"
                class="form-radio h-4 w-4 text-green-600"
                name="name_numeroproductor_correcto"
                v-model="numeroproductor_correcto"
                value="true"
                v-on:change="actaulizar_variable_numprod(true)"
              />
              <span class="ml-2">Si</span>
            </label>
            <label class="ml-2">
              <input
                type="radio"
                :disabled="$props.num_prod_correccion_desactivar"
                class="form-radio h-4 w-4 text-red-600"
                name="name_numeroproductor_correcto"
                v-model="numeroproductor_correcto"
                value="false"
                v-on:change="actaulizar_variable_numprod(false)"
              />
              <span class="ml-2">No</span>
            </label>
            <label class="ml-2">
              <input
                type="radio"
                :disabled="$props.num_prod_correccion_desactivar"
                class="form-radio h-4 w-4 text-indigo-600"
                name="name_numeroproductor_correcto"
                v-model="numeroproductor_correcto"
                value="nada"
                v-on:change="actaulizar_variable_numprod('nada')"
              />
              <span class="ml-2">Sin evaluar</span>
            </label>
          </div>
          <div v-show="numeroproductor_correcto_local" class="w-full px-3">
            <label
              class="
                block
                uppercase
                tracking-wide
                text-gray-700 text-xs
                font-bold
                mb-1
                mt-2
              "
              for="obs_numeroproductor"
              >Observación:</label
            >
            <textarea
              id="obs_numeroproductor"
              name="obs_numeroproductor"
              v-model="obs_numeroproductor"
              v-bind:class="clase_text_area_numprod"
              :disabled="$props.num_prod_correccion_desactivar"
              @input="
                actaulizar_contenido_text_area_numprod($event.target.value)
              "
            >
            </textarea>
            <p v-bind:class="clase_cartel_nota_evaluacion_numprod_text_area">
              {{ cartel_nota_evaluacion_numprod_text_area }}
            </p>
          </div>
        </div>
      </div> -->

      <!-- Probando Componente -->
      <SeccionEvaluacion
        :correccion_desactivar="$props.num_prod_correccion_desactivar"
        :name_correcto="'name_numeroproductor_correcto'"
        :correcto="numeroproductor_correcto_local"
        v-on:change_correcto="actaulizar_variable_numprod($event)"
        :obs_observacion="observacion_local"
        v-on:change_obs="actaulizar_contenido_text_area_numprod($event)"
      >
      </SeccionEvaluacion>
      <!-- ******************* -->
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
          {{ numeroproductor }}
          {{ numeroproductor_valido }}
          {{ numeroproductor_correcto }}
          {{ obs_numeroproductor }}
          {{ obs_numeroproductor_valido }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
import SeccionEvaluacion from "@/Components/SeccionEvaluacion";

export default {
  components: {
    SeccionEvaluacion,
  },
  props: [
    "numeroproductor",
    "numeroproductor_valido",
    "numeroproductor_correcto",
    "obs_numeroproductor",
    "obs_numeroproductor_valido",
    "evaluacion",
    "label",
    "testing",
    "num_prod_disable",
    "num_prod_correccion_mostrar",
    "num_prod_correccion_desactivar",
    "mostrar_evaluacion_adm",
  ],
  data() {
    return {
      numProductor: 0,
      //   clase_de_input_numprod:
      //     "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      clase_de_input_numprod:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_numprod: "text-green-500 text-xs italic",
      cartel_nota_campo_numprod: "",
      numeroproductor_correcto_local: this.$props.numeroproductor_correcto,
      observacion_local: this.$props.obs_numeroproductor,
      numeroproductor_valido_local: this.$props.numeroproductor_valido,
      clase_text_area_numprod:
        "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_evaluacion_numprod_text_area:
        "text-green-500 text-xs italic",
      cartel_nota_evaluacion_numprod_text_area: "Observacion Correcta",
      testing_hijo: false,
    };
  },
  methods: {
    async generar() {
      var num;
      Swal.fire({
        title: "¡Por favor Espere!",
        html: "Generando número de Productor",
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
          Swal.showLoading();
        },
      });
      await axios
        .get("/numeroProductor")
        .then(function (response) {
          if (response.data.status === "ok") {
            Swal.hideLoading(Swal.clickConfirm());
            // alert(response.data.response);
            num = response.data.response;
            document.getElementById("numProductores").value = num;
          }
        })
        .catch(function (error) {
          console.log(error);
        });
      this.$emit("changenumprod", num);
      this.$emit("changenumprodvalido", true);
    },

    actaulizar_variable_numprod(valor) {
      this.numeroproductor_correcto_local = valor;
      this.$emit("changenumprodcorrecto", this.numeroproductor_correcto_local);
    },

    actaulizar_contenido_text_area_numprod(value) {
      this.observacion_local = value;
      this.$emit("changeobsnumprod", value);
      // if (this.$props.obs_numeroproductor.length <= 2) {
      //   this.clase_text_area_numprod =
      //     "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //   this.cartel_nota_evaluacion_numprod_text_area =
      //     "Observacion Incorrecta - debe ser mayor a 2 carcteres";
      //   this.clase_cartel_nota_evaluacion_numprod_text_area =
      //     "text-red-500 text-xs italic";
      // }
      // if (this.$props.obs_numeroproductor.length >= 50) {
      //   this.clase_text_area_numprod =
      //     "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //   this.cartel_nota_evaluacion_numprod_text_area =
      //     "Observacion Incorrecta - debe tener menos de 50 caracteres";
      //   this.clase_cartel_nota_evaluacion_numprod_text_area =
      //     "text-red-500 text-xs italic";
      // }
      // if (
      //   this.$props.obs_numeroproductor !== "" &&
      //   this.$props.obs_numeroproductor.length <= 30 &&
      //   this.$props.obs_numeroproductor.length >= 3
      // ) {
      //   this.clase_text_area_numprod =
      //     "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
      //   this.cartel_nota_evaluacion_numprod_text_area = "Observacion Correcta";
      //   this.clase_cartel_nota_evaluacion_numprod_text_area =
      //     "text-green-500 text-xs italic";
      // }
    },
    cambio_input_numprod(value) {
      if (this.numeroproductor.length < 3) {
        this.clase_de_input_numprod =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo_numprod =
          "Campo Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_nota_numprod = "text-red-500 text-xs italic";
        this.numeroproductor_valido_local = false;
      }
      if (this.numeroproductor.length >= 8) {
        this.clase_de_input_numprod =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo_numprod =
          "Campo Incorrecta - debe tener menos de 8 caracteres";
        this.clase_cartel_nota_numprod = "text-red-500 text-xs italic";
        this.numeroproductor_valido_local = false;
      }
      if (
        this.numeroproductor !== "" &&
        this.numeroproductor.length <= 8 &&
        this.numeroproductor.length >= 3
      ) {
        this.clase_de_input_numprod =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_campo_numprod = "Campo Correcto";
        this.clase_cartel_nota_numprod = "text-green-500 text-xs italic";
        this.numeroproductor_valido_local = true;
      }
      this.$emit("changenumprodvalido", this.numeroproductor_valido_local);
      this.$emit("changenumprod", value);
    },
  },
};
</script>
