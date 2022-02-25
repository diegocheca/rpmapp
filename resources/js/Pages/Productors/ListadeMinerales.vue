<template>
  <div>
    <!-- <div class="flex-col">
            <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                for="input_componente"
                >{{label}}:</label
            >
        </div> -->
    <div class="flex flex-wrap">
      <div
        class="
          w-full
          sm:w-2/2
          md:w-1/2
          lg:w-1/2
          xl:w-1/2
          2xl:w-1/2
          px-3
          mb-6
          md:mb-0
        "
      >
        <h2
          class="
            text-2xl
            md:text-2xl
            font-semibold
            tracking-tight
            leading-7
            md:leading-10
            mb-1
            truncate
          "
        >
          {{ label }}:
        </h2>
        <!-- <div class="font-base tracking-tight text-gray-600">Lista de minerales seleccionales.</div> -->
      </div>
      <div
        class="
          w-full
          sm:w-2/2
          md:w-1/2
          lg:w-1/2
          xl:w-1/2
          2xl:w-1/2
          px-3
          mb-6
          md:mb-0
        "
      >
        <button
          :disabled="$props.evaluacion || $props.desactivar_input"
          class="
            px-6
            w-full
            py-2.5
            mb-4
            text-base
            font-semibold
            rounded
            block
            border-2 border-green-600
            text-green-800
            bg-green-100
            hover:bg-green-600
            hover:border-2 hover:border-green-600
            hover:text-white
          "
          @click="agregar_mineral()"
        >
          + Agregar Mineral
        </button>
      </div>
    </div>
    <div class="flex flex-wrap">
      <!-- lista de minerales del nieto: {{$props.lista_de_minerales_pre_cargados}} -->
      <div class="mt-2 sm:w-full md:w-full">
        <div
          class="mb-6 relative"
          v-for="(mineral, index) in minerales"
          v-bind:key="mineral.id"
        >
          <div
            @click="eliminar_mineral(index)"
            :disabled="$props.evaluacion || $props.desactivar_input"
            class="
              absolute
              -top-4
              -right-4
              bg-red-800
              p-4
              cursor-pointer
              hover:bg-red-600
              py-2
              text-white
              rounded-full
            "
          >
            x
          </div>
          <div
            class="
              absolute
              -top-4
              -left-4
              bg-blue-300
              p-4
              py-2
              text-black font-medium
              rounded
            "
          >
            {{ index + 1 }}
          </div>

          <div class="bg-white shadow-md rounded-xl p-4 border border-gray-300">
            <div class="flex-none lg:flex">

              <!--******* Indice para cada mineral *******-->
              <!-- <div class="flex flex-wrap"> -->
                <!-- <div
                  class="
                    md:w-1/8
                    sm:w-8/8
                    text-2xl
                    md:text-2xl
                    w-full
                    flex-none
                    text-black
                    font-medium
                    mr-2
                    text-center
                  "
                >
                  {{ index + 1 }}°
                </div> -->
                <!-- <h2 class="flex-auto font-medium">{{mineral.id_mineral}}</h2> -->
              <!-- </div> -->


              <!--******* Imagen de mineral *******-->
              <div
                class="lg:h-20 lg:w-20 lg:mb-0 mb-1 md:w-1/4 sm:w-4/4 w-full"
              >
                <img
                  :src="mineral.thumb"
                  alt="Just a flower"
                  class="object-scale-down lg:object-cover lg:h-20 rounded"
                />
              </div>
              <!-- <div class="flex-auto ml-3 justify-evenly py-2 sm:col-1 md:w-1/2 sm:w-2/2 w-full"> -->
              <!-- <p class="mt-3"></p> -->
              <!-- tipo de yacimiento es:
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$props.tipo_yacimiento}}</span> -->
              <!-- <div
                  class="flex flex-wrap py-4 sm:w-full text-sm text-gray-600"
                > -->

              <!--******* Select de Mineral *******-->
              <div
                class="
                  w-full
                  sm:w-4/4
                  md:w-1/4
                  lg:w-1/4
                  xl:w-1/4
                  2xl:w-1/4
                  px-3
                "
              >
                <div class="flex" v-if="$props.tipo_yacimiento === 'segunda'">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 mr-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                  </svg>
                  <label for="select_mineral_explotado"
                    >Mineral Explotado:</label
                  >
                  <select
                    :disabled="$props.evaluacion || $props.desactivar_input"
                    class="form-control"
                    id="select_mineral_explotado"
                    name="select_mineral_explotado"
                    v-model="mineral.segunda_cat_mineral_explotado"
                    @change="
                      cambio_select_tipo_mineral_explotado_segunda_cat(
                        $event,
                        index
                      )
                    "
                  >
                    <option value="aprovechamiento_comun">
                      Sustancias de aprovechamiento común
                    </option>
                    <option value="conceden_preferentemente">
                      Sustancias que se conceden preferentemente al dueño del
                      suelo
                    </option>
                  </select>
                </div>
                <div class="flex" v-if="$props.tipo_yacimiento === 'segunda'">
                  <select
                    :disabled="$props.evaluacion || $props.desactivar_input"
                    v-model="mineral.id_mineral"
                    @change="cambio_select_mineral_segunda_cat($event, index)"
                  >
                    <option
                      v-for="opcion in mineral.lista_de_minerales_array"
                      v-bind:key="opcion.id"
                      :value="opcion.id"
                    >
                      {{ opcion.name }}
                    </option>
                  </select>
                </div>
                <div class="flex" v-if="$props.tipo_yacimiento === 'segunda'">
                  <div v-show="mineral.mostrar_lugar_segunda_cat">
                    <label for="select_lugar_mineral"
                      >Lugar donde se encuentra:</label
                    >
                    <select
                      :disabled="$props.evaluacion || $props.desactivar_input"
                      class="form-control"
                      id="select_lugar_mineral"
                      name="select_lugar_mineral"
                      v-model="mineral.lugar_donde_se_enccuentra"
                      @change="cambio_mineral_explotado($event, index)"
                    >
                      <option value="lecho_de_los_rios">
                        Lechos de los ríos
                      </option>
                      <option value="aguas_corrientes">Aguas Corrientes</option>
                      <option value="placeres">Placeres</option>
                    </select>
                    <br />
                  </div>
                </div>
                <div v-if="$props.tipo_yacimiento !== 'segunda'">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                    "
                  >
                    Minerales
                  </label>
                  <div class="flex items-stretch w-full relative">
                    <select
                      class="
                        rounded
                        border border-grey-light
                        focus:border-blue focus:shadow
                      "
                      :disabled="$props.evaluacion || $props.desactivar_input"
                      v-model="mineral.id_mineral"
                      @change="cambio_select_mineral_segunda_cat($event, index)"
                    >
                      <option value="0" Disabled>
                        Seleccione un Mineral...
                      </option>
                      <option
                        v-for="opcion in $props.lista_de_minerales"
                        v-bind:key="opcion.id"
                        :value="opcion.id"
                      >
                        {{ opcion.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="flex" v-if="$props.tipo_yacimiento === 'segunda'">
                  <div v-show="mineral.mostrar_otro_mineral_segunda_cat">
                    <label for="otro_mineral_segunda_categoria"
                      >Nombre del mineral no comprendido en 1° categoría:</label
                    >
                    <input
                      :disabled="$props.evaluacion || $props.desactivar_input"
                      type="text"
                      maxlength="25"
                      class="form-control"
                      name="otro_mineral_segunda_categoria"
                      id="otro_mineral_segunda_categoria"
                      v-model="mineral.otro_mineral_segunda_cat"
                    />
                    <br />
                  </div>
                </div>
              </div>

              <!--******* Observación de Mineral *******-->
              <div
                class="
                  w-full
                  sm:w-2/2
                  md:w-3/2
                  lg:w-3/2
                  xl:w-3/2
                  2xl:w-3/2
                  px-3
               "
              >
                <div class="items-center">
                  <label
                    class="
                      block
                      uppercase
                      tracking-wide
                      text-gray-700 text-xs
                      font-bold
                      mb-1
                    "
                    for="observaciones"
                  >
                    <span v-show="$props.tipo_yacimiento != 'tercera'">
                      {{ label_text_area }}
                    </span>
                    <span v-show="$props.tipo_yacimiento == 'tercera'">
                      Forma de presentación natural del mineral
                      <strong> (no es obligatorio para canteras)</strong>
                    </span>
                    :</label
                  >
                </div>
                <div class="sm:w-full items-center">
                  <textarea
                    :disabled="$props.evaluacion || $props.desactivar_input"
                    id="presentacion_natural"
                    name="presentacion_natural"
                    v-model="mineral.observacion"
                    v-bind:class="mineral.clase_text_area_presentacion"
                    @input="
                      actaulizar_contenido_forma_presentacion(
                        $event.target.value,
                        index
                      )
                    "
                  >
                  </textarea>
                </div>
                <div class="sm:w-full items-center">
                  <p
                    v-bind:class="
                      mineral.clase_text_evaluacion_de_text_area_presentacion
                    "
                  >
                    {{ mineral.texto_validacion_text_area_presentacion }}
                  </p>
                </div>
              </div>
              <!-- </div> -->
              <!-- <div class="flex p-4 pb-2 border-t border-gray-200 "></div> -->
              
              <!--******* Boton Eliminar *******-->
              <!-- <div
                class="
                  w-full
                  sm:w-4/4
                  md:w-1/4
                  lg:w-1/4
                  xl:w-1/4
                  2xl:w-1/4
                  px-3
                  mb-2
                  md:mb-2
                "
              >
                <button
                  :disabled="$props.evaluacion || $props.desactivar_input"
                  class="
                    px-6
                    py-2.5
                    mb-4
                    mt-5
                    text-base
                    font-semibold
                    rounded
                    block
                    border-b border-purple-300
                    bg-red-200
                    hover:bg-red-300
                    text-red-900
                  "
                  type="button"
                  aria-label="like"
                  @click="eliminar_mineral(index)"
                >
                  Eliminar Mineral
                </button>
              </div> -->
              
              <!--******* Validación *******-->
              <!-- <div class="w-full md:w-2/3 px-3">
                <div v-if="evaluacion || $props.mostrar_correccion">
                  <h3>Seccion de evaluacion</h3>
                  <div class="flex">
                    <div class="w-full md:w-1/3 px-3">
                      <span class="text-gray-700">Es correcto?</span>
                      <div class="mt-2">
                        <label class="inline-flex items-center">
                          <input
                            type="radio"
                            :disabled="desactivar_correccion"
                            class="form-radio h-5 w-5 text-green-400"
                            :name="'name_mineral_correccion'.index"
                            v-model="mineral.evaluacion_correcto"
                            value="true"
                            v-on:change="
                              actaulizar_variable_correccion(true, index)
                            "
                          />
                          <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                          <input
                            type="radio"
                            :disabled="desactivar_correccion"
                            class="form-radio h-5 w-5 text-red-400"
                            :name="'name_mineral_correccion'.index"
                            v-model="mineral.evaluacion_correcto"
                            value="false"
                            v-on:change="
                              actaulizar_variable_correccion(false, index)
                            "
                          />
                          <span class="ml-2">No</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                          <input
                            type="radio"
                            :disabled="desactivar_correccion"
                            class="form-radio h-5 w-5 text-indigo-400"
                            :name="'name_mineral_correccion'.index"
                            v-model="mineral.evaluacion_correcto"
                            value="nada"
                            v-on:change="
                              actaulizar_variable_correccion('nada', index)
                            "
                          />
                          <span class="ml-2">Sin evaluar</span>
                        </label>
                      </div>
                    </div>
                    <div
                      v-show="!mineral.evaluacion_correcto"
                      class="w-full md:w-2/3 px-3"
                    >
                      <label
                        class="
                          block
                          uppercase
                          tracking-wide
                          text-gray-700 text-xs
                          font-bold
                          mb-2
                        "
                        for="observaciones"
                        >Observación:</label
                      >
                      <textarea
                        id="observaciones"
                        name="observaciones"
                        v-model="mineral.observacion_autoridad"
                        v-bind:class="mineral.clase_text_area"
                        :disabled="desactivar_correccion"
                        @input="
                          actaulizar_contenido_text_area(
                            $event.target.value,
                            index
                          )
                        "
                      >
                      </textarea>
                      <p
                        v-bind:class="
                          mineral.clase_text_evaluacion_de_text_area
                        "
                      >
                        {{ mineral.texto_validacion_text_area }}
                      </p>
                    </div>
                  </div>
                </div>
              </div> -->

              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <div v-show="$props.testing">los minerales son {{ minerales }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "valor_input_props",
    "valor_input_validacion",
    "evualacion_correcto",
    "valor_obs",
    "valor_valido_obs",
    "evaluacion",
    "testing",
    "label",
    "label_text_area",
    "tipo_yacimiento",
    "lista_de_minerales",
    "lista_de_minerales_pre_cargados",
    "desactivar_input",
    "mostrar_correccion",
    "desactivar_correccion",
  ],
  data() {
    return {
      clase_border_de_input:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_input: "Campo Correcto",
      clase_cartel_validacion_input: "text-green-500 text-xs italic",
      clase_text_area:
        "appearance-none block w-full bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      clase_text_area_presentacion:
        "appearance-none block w-full sm:h-32 bg-gray-200 text-gray-700 border rounded mb-1 leading-tight focus:outline-none focus:bg-white",
      texto_validacion_text_area: "Observacion Correcta",
      clase_text_evaluacion_de_text_area: "text-green-500 text-xs italic",
      valor_input: this.$props.valor_input_props,

      validacion_input_local: this.$props.valor_input_validacion,

      valor_evaluacion_correcto_local: this.$props.evualacion_correcto,

      obs_valida: this.$props.obs_valido_props,

      minerales: this.$props.lista_de_minerales_pre_cargados,
      opcionesmineral: this.$props.lista_de_minerales,
      opcionesmineraluno: [],
      index_de_mineral_segunda_cat: "",

      //border-green-500
    };
  },
  methods: {
    actualizar_valores_padre() {
      this.$emit("changevalor_lista_minerales", this.minerales);
    },
    actaulizar_variable_correccion(valor, index) {
      //this.valor_evaluacion_correcto_local = valor;
      this.minerales[index].evaluacion_correcto = valor;
      this.actualizar_valores_padre();
      //this.$emit('changecorrecto',this.minerales[index].evaluacion_correcto);
    },
    actaulizar_contenido_text_area(value, index) {
      if (this.minerales[index].observacion_autoridad.length <= 2) {
        this.minerales[index].clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area =
          "Observacion Incorrecta - debe ser mayor a 2 carcteres";
        this.minerales[index].clase_text_evaluacion_de_text_area =
          "text-red-500 text-xs italic";
        this.minerales[index].obs_valida = false;
        //this.$emit('changeobsvalido',false);
      }
      if (this.minerales[index].observacion_autoridad.length >= 50) {
        this.minerales[index].clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area =
          "Observacion Incorrecta - debe tener menos de 50 caracteres";
        this.minerales[index].clase_text_evaluacion_de_text_area =
          "text-red-500 text-xs italic";
        this.minerales[index].obs_valida = false;
        //this.$emit('changeobsvalido',false);
      }
      if (
        this.minerales[index].observacion_autoridad !== "" &&
        this.minerales[index].observacion_autoridad.length <= 30 &&
        this.minerales[index].observacion_autoridad.length >= 3
      ) {
        this.minerales[index].clase_text_area =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area =
          "Observacion Correcta";
        this.minerales[index].clase_text_evaluacion_de_text_area =
          "text-green-500 text-xs italic";
        this.minerales[index].obs_valida = false;
        //this.$emit('changeobsvalido',true);
      }
      this.actualizar_valores_padre();
      // this.$emit('changeobs',this.$props.valor_obs)
    },
    actaulizar_contenido_forma_presentacion(value, index) {
      // console.log("el value es:"+value.length);
      // console.log("el index es:"+index);

      if (value.length <= 2) {
        this.minerales[index].clase_text_area_presentacion =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area_presentacion =
          "Forma de Presentacion Incorrecta - debe ser mayor a 2 carcteres";
        this.minerales[index].clase_text_evaluacion_de_text_area_presentacion =
          "text-red-500 text-xs italic";
        this.minerales[index].presentacion_valida = false;
        //this.$emit('changeobsvalido',false);
      }
      if (value.length >= 50) {
        this.minerales[index].clase_text_area_presentacion =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area_presentacion =
          "Forma de Presentacion Incorrecta - debe tener menos de 50 caracteres";
        this.minerales[index].clase_text_evaluacion_de_text_area_presentacion =
          "text-red-500 text-xs italic";
        this.minerales[index].presentacion_valida = false;
        //this.$emit('changeobsvalido',false);
      }
      if (value !== "" && value.length <= 30 && value.length >= 3) {
        this.minerales[index].clase_text_area_presentacion =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white";
        this.minerales[index].texto_validacion_text_area_presentacion =
          "Valor Correcta";
        this.minerales[index].clase_text_evaluacion_de_text_area_presentacion =
          "text-green-500 text-xs italic";
        this.minerales[index].presentacion_valida = false;
        //this.$emit('changeobsvalido',true);
      }
      //this.$emit('changeobs',this.$props.valor_obs)
      this.actualizar_valores_padre();
    },
    cambio_input() {
      if (this.valor_input.length <= 4) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe ser mayor a 3 carcteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (this.valor_input.length >= 40) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input =
          "Valor Incorrecta - debe tener menos de 30 caracteres";
        this.clase_cartel_validacion_input = "text-red-500 text-xs italic";
        this.validacion_input_local = false;
      }
      if (
        this.valor_input !== "" &&
        this.valor_input.length <= 30 &&
        this.valor_input.length >= 3
      ) {
        this.clase_border_de_input =
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white";
        this.texto_validacion_input = "Valor Correcto";
        this.clase_cartel_validacion_input = "text-green-500 text-xs italic";
        this.validacion_input_local = true;
      }
      /*this.$emit('changevalido',this.validacion_input_local);
            this.$emit('changevalor',this.valor_input);*/
      this.actualizar_valores_padre();
    },
    eliminar_mineral: function (indice) {
      this.minerales.splice(indice, 1);
      this.actualizar_valores_padre();
    },
    agregar_mineral: function () {
      var mineral_aux = {
        id_mineral: "0",
        id_varieadad: "",
        segunda_cat_mineral_explotado: "",
        lugar_donde_se_enccuentra: "",
        mostrar_lugar_segunda_cat: false,
        mostrar_otro_mineral_segunda_cat: false,
        otro_mineral_segunda_cat: "",
        lugar_donde_se_enccuentra: "",
        observacion: "",
        clase_text_area_presentacion:
          "py-0.5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white",
        clase_text_evaluacion_de_text_area_presentacion:
          "text-red-500 text-xs italic",
        texto_validacion_text_area_presentacion:
          "",
        presentacion_valida: true,
        evaluacion_correcto: true,
        observacion_autoridad: "",
        clase_text_area:
          "appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded mb-1 leading-tight focus:outline-none focus:bg-white",
        clase_text_evaluacion_de_text_area: "text-red-500 text-xs italic",
        texto_validacion_text_area: "Observacion Correcta",
        obs_valida: true,
        lista_de_minerales_array: [],
        thumb: this.$inertia.page.props.appName + "/minerales/thumbs/3.png",
      };
      if (this.minerales === "" || this.minerales === null) this.minerales = [];
      this.minerales.push(mineral_aux);
      this.actualizar_valores_padre();
    },
    cambio_mineral_explotado(index) {
      // console.log("cambio el select");
    },
    cambio_select_mineral_segunda_cat(event, index) {
      if (this.$props.tipo_yacimiento === "segunda") {
        // console.log("el index es: "+index);
        // console.log("acabo de elegir: "+ this.minerales[index].id_mineral);
        // console.log(this.minerales[0].lugar_donde_se_enccuentra);
        //console.log("lugar donde se encuentra: "+ this.minerales[index].lugar_donde_se_enccuentra);
        if (
          this.minerales[index].id_mineral === 1031 ||
          this.minerales[index].id_mineral === 1032
        ) {
          //en estos casos debo mostrar la seleccion de lugares
          // console.log("entre aca");
          this.minerales[index].lugar_donde_se_enccuentra = "";
          //this.model.mina_cantera = 'mina';
          this.minerales[index].mostrar_lugar_segunda_cat = true;
          this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
          this.minerales[index].otro_mineral_segunda_cat = "";
        } else {
          if (
            this.minerales[index].id_mineral === 1035 || // desmontes
            this.minerales[index].id_mineral === 1181 || // relaves
            this.minerales[index].id_mineral === 1182 // escoreales
          ) {
            //en estos casos de elegir alguna sustancias de aprovechamiento comun pero no se necesita el lugar
            this.minerales[index].lugar_donde_se_enccuentra = "";
            //this.model.mina_cantera = 'mina';
            this.minerales[index].mostrar_lugar_segunda_cat = false;
            this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
            this.minerales[index].otro_mineral_segunda_cat = "";
          } else {
            if (this.minerales[index].id_mineral === 1039) {
              //en caso de ser sustenacias concedidas al dueño
              this.minerales[index].mostrar_otro_mineral_segunda_cat = true;
              this.minerales[index].otro_mineral_segunda_cat = "";
            } else {
              //este es cualqueir otro caso
              this.minerales[index].lugar_donde_se_enccuentra = "";
              //this.model.mina_cantera = 'mina';
              this.minerales[index].mostrar_lugar_segunda_cat = false;
              this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
              this.minerales[index].otro_mineral_segunda_cat = "";
            }
            //en estos casos debo mostrar la seleccion de lugares
          }
        }
      } else {
      }
      this.actualizar_valores_padre();
    },
    cambio_select_tipo_mineral_explotado_segunda_cat: function (event, index) {
      // console.log("el index es: "+index);
      // console.log("acabo de elegir: "+ this.minerales[index].segunda_cat_mineral_explotado);
      if (
        this.minerales[index].segunda_cat_mineral_explotado ===
        "aprovechamiento_comun"
      ) {
        this.minerales[index].lista_de_minerales_array = [
          {
            id: 1031,
            name: "Arenas Metalíferas",
          },
          {
            id: 1032,
            name: "Piedras Preciosas",
          },
          {
            id: 1035,
            name: "Desmontes",
          },
          {
            id: 1181,
            name: "Relaves",
          },
          {
            id: 1182,
            name: "Escoriales",
          },
        ];
      } else {
        if (
          this.minerales[index].segunda_cat_mineral_explotado ===
          "conceden_preferentemente"
        ) {
          this.minerales[index].lista_de_minerales_array = [
            {
              id: 1036,
              name: "Salitres",
            },
            {
              id: 1037,
              name: "Salinas",
            },
            {
              id: 1038,
              name: "Turberas",
            },
            {
              id: 1039,
              name: "Metales no comprendidos en 1° Categ.",
            },
            {
              id: 1040,
              name: "Tierras Piritosas y Aluminosas",
            },
            {
              id: 1041,
              name: "Abrasivos",
            },
            {
              id: 1042,
              name: "Ocres",
            },
            {
              id: 1043,
              name: "Resinas",
            },
            {
              id: 1044,
              name: "Esteatitas",
            },
            {
              id: 1045,
              name: "Baritina",
            },
            {
              id: 1046,
              name: "Caparrosas",
            },
            {
              id: 1047,
              name: "Grafito",
            },
            {
              id: 1048,
              name: "Caolí­n",
            },
            {
              id: 1049,
              name: "Sales Alcalinas o Alcalino Terrosas",
            },
            {
              id: 1050,
              name: "Amianto",
            },
            {
              id: 1051,
              name: "Bentonita",
            },
            {
              id: 1052,
              name: "Zeolitas o Minerales Permutantes o Permutíticos",
            },
          ];
        } else {
          this.minerales[index].lista_de_minerales_array = [];
        }
      }
      this.actualizar_valores_padre();
    },
  },
};
</script>