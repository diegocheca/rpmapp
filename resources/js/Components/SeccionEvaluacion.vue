<template>
  <div class="bg-white shadow-md rounded-xl pb-2 border border-red-600">
    <h3 class="bg-red-800 px-4 text-white rounded-t-xl mb-2">
      Seccion de evaluacion
    </h3>
    <div>
      <div class="w-full px-3">
        <span class="text-gray-700 mr-2">Correcto?</span>
        <label>
          <input
            type="radio"
            :disabled="$props.correccion_desactivar"
            class="form-radio h-4 w-4 text-green-600"
            :name="name_correcto"
            v-model="correcto"
            value="true"
            v-on:change="actualizar_variable(true)"
          />
          <span class="ml-2">Si</span>
        </label>
        <label class="ml-2">
          <input
            type="radio"
            :disabled="$props.correccion_desactivar"
            class="form-radio h-4 w-4 text-red-600"
            :name="name_correcto"
            v-model="correcto"
            value="false"
            v-on:change="actualizar_variable(false)"
          />
          <span class="ml-2">No</span>
        </label>
        <label class="ml-2">
          <input
            type="radio"
            :disabled="$props.correccion_desactivar"
            class="form-radio h-4 w-4 text-indigo-600"
            :name="name_correcto"
            v-model="correcto"
            value="nada"
            v-on:change="actualizar_variable('nada')"
          />
          <span class="ml-2">Sin evaluar</span>
        </label>
      </div>
      <!-- !correcto_local?: {{!correcto_local}} <br>
      correcto_local?: {{correcto_local}}<br>
      correcto_local true?: {{correcto_local == true}}<br>
      correcto_local vacio?: {{correcto_local==''}} -->
      <div v-show="correcto_local == false" class="w-full px-3">
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
          for="obs_observacion"
          >Observación:</label
        >
        <textarea
          id="obs_observacion"
          name="obs_observacion"
          v-model="obs_observacion"
          v-bind:class="clase_text_area"
          :disabled="$props.correccion_desactivar"
          @input="actualizar_contenido_text_area($event.target.value)"
        >
        </textarea>
        <p v-bind:class="clase_cartel_nota_evaluacio_text_area">
          {{ cartel_nota_evaluacion_text_area }}
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    "correccion_desactivar",
    "name_correcto",
    "correcto",
    "obs_observacion",
  ],
  data() {
    return {
      correcto_local: this.$props.correcto,
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",
      clase_cartel_nota_evaluacio_text_area: "text-green-500 text-xs italic",
      cartel_nota_evaluacion_text_area: "",
    };
  },
  methods: {
    actualizar_variable(valor) {
      this.correcto_local = valor;
      this.$emit("change_correcto", this.correcto_local);
    },

    actualizar_contenido_text_area(value) {
      if (this.$props.obs_observacion.length <= 2) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_text_area =
          "Observacion Incorrecta - debe ser mayor a 2 carcteres";
        this.clase_cartel_nota_evaluacio_text_area =
          "text-red-500 text-xs italic";
      }
      if (this.$props.obs_observacion.length >= 50) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_text_area =
          "Observacion Incorrecta - debe tener menos de 50 caracteres";
        this.clase_cartel_nota_evaluacio_text_area =
          "text-red-500 text-xs italic";
      }
      if (
        this.$props.obs_observacion !== "" &&
        this.$props.obs_observacion.length <= 30 &&
        this.$props.obs_observacion.length >= 3
      ) {
        this.clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.cartel_nota_evaluacion_text_area = "Observacion Correcta";
        this.clase_cartel_nota_evaluacio_text_area =
          "text-green-500 text-xs italic";
      }
      this.$emit("change_obs", this.$props.obs_observacion);
    },
  },
};
</script>
