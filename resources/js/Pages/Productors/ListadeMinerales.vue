<template>
    <div>
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="input_componente"
            >{{label}}:</label
        >
        <div class="content">
            <div class="flex items-center justify-between w-full my-4 pl-4 sm:pr-4">
                <div class="mr-6">
                <h2 class="text-3xl md:text-4xl font-semibold tracking-tight leading-7 md:leading-10 mb-1 truncate">Lista de Minerales</h2>
                <div class="font-base tracking-tight text-gray-600">Lista de minerales seleccionales.</div>
                </div>
                <div class="flex items-center">
                <button :disabled="$props.evaluacion" class="px-6 py-2.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-green-200 hover:bg-green-300 text-green-900"  @click="agregar_mineral()"> + Agregar Mineral</button>
                </div>
            </div>
            <!-- lsita de minerales del nieto: {{$props.lista_de_minerales_pre_cargados}} -->
            <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-1 xl:grid-cols-1">
                <div class="flex flex-col" v-for="(mineral, index) in minerales" v-bind:key="mineral.id">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img :src="mineral.thumb"
                                    alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2">
                                <div class="flex flex-wrap ">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                        {{index+1}}°
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium">{{mineral.id_mineral}}</h2>
                                </div>
                                <p class="mt-3"></p>
                                tipo de yacimiento es:
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$props.tipo_yacimiento}}</span>
                                
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <div class="flex"  v-if="$props.tipo_yacimiento === 'segunda'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <label for="select_mineral_explotado">Mineral Explotado:</label>
                                            <select  :disabled="$props.evaluacion" class="form-control" id="select_mineral_explotado" name="select_mineral_explotado"  v-model="mineral.segunda_cat_mineral_explotado" @change="cambio_select_tipo_mineral_explotado_segunda_cat($event, index)">
                                                <option value="aprovechamiento_comun">Sustancias de aprovechamiento común</option>
                                                <option value="conceden_preferentemente">Sustancias que se conceden preferentemente al dueño del suelo</option>
                                            </select>
                                        </div>
                                        <div class="flex"  v-if="$props.tipo_yacimiento === 'segunda'">
                                            <select
                                            :disabled="$props.evaluacion"
                                            v-model="mineral.id_mineral"
                                            @change="cambio_select_mineral_segunda_cat($event, index)"
                                            >
                                                <option v-for="opcion in mineral.lista_de_minerales_array" v-bind:key="opcion.id" :value="opcion.id">{{opcion.name}}</option>
                                            </select>
                                        </div>
                                        <div class="flex"  v-if="$props.tipo_yacimiento === 'segunda'">
                                            <div v-show="mineral.mostrar_lugar_segunda_cat">
                                                <label for="select_lugar_mineral">Lugar donde se encuentra:</label>
                                                <select  :disabled="$props.evaluacion" class="form-control" id="select_lugar_mineral" name="select_lugar_mineral" v-model="mineral.lugar_donde_se_enccuentra" @change="cambio_mineral_explotado($event, index)" >
                                                    <option value="lecho_de_los_rios">Lechos de los ríos</option>
                                                    <option value="aguas_corrientes">Aguas Corrientes</option>
                                                    <option value="placeres">Placeres</option>
                                                </select>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="flex" v-if="$props.tipo_yacimiento !== 'segunda'">
                                            <select
                                            :disabled="$props.evaluacion"
                                            v-model="mineral.id_mineral"
                                            @change="cambio_select_mineral_segunda_cat($event, index)"
                                            >
                                                <option v-for="opcion in $props.lista_de_minerales" v-bind:key="opcion.id" :value="opcion.id">{{opcion.name}}</option>
                                            </select>
                                        </div>
                                        <div class="flex"  v-if="$props.tipo_yacimiento === 'segunda'">
                                            <div v-show="mineral.mostrar_otro_mineral_segunda_cat">
                                                <label for="otro_mineral_segunda_categoria">Nombre del mineral no comprendido en 1° categoría:</label>
                                                <input :disabled="$props.evaluacion" type="text" maxlength="25" class="form-control" name="otro_mineral_segunda_categoria" id="otro_mineral_segunda_categoria" v-model="mineral.otro_mineral_segunda_cat">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="observaciones"
                                            >
                                            <span v-show="$props.tipo_yacimiento != 'tercera'">
                                            {{label_text_area}}
                                        </span> 
                                        <span  v-show="$props.tipo_yacimiento == 'tercera'">
                                            Forma de presentación natural del mineral <strong> (no es obligatorio para canteras)</strong>
                                        </span> 
                                        :</label
                                        >
                                        <textarea
                                            :disabled="$props.evaluacion"
                                            id="presentacion_natural"
                                            name="presentacion_natural"
                                            v-model="mineral.observacion"
                                            v-bind:class=mineral.clase_text_area_presentacion
                                            @input="actaulizar_contenido_forma_presentacion($event.target.value, index)" 
                                            >
                                        </textarea>
                                        <p v-bind:class=mineral.clase_text_evaluacion_de_text_area_presentacion>{{mineral.texto_validacion_text_area_presentacion}}</p>
                                        
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <div class="w-full md:w-2/3 px-3">
                                        <!-- <button
                                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                            <span class="text-green-400 hover:text-green-500 rounded-lg">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="shopify"
                                                    class="svg-inline--fa fa-shopify  w-5 h-5  " role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor"
                                                        d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>62 Products</span>
                                        </button> -->
                                        <div  v-if="evaluacion" >
                                            <h3>Seccion de evaluacion</h3>
                                            <div class="flex">
                                                <div class="w-full md:w-1/3 px-3">
                                                    <span class="text-gray-700">Es correcto?</span>
                                                    <div class="mt-2">
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" class="form-radio h-5 w-5 text-green-400" :name="'name_mineral_correccion'.index" v-model="mineral.evaluacion_correcto" value="true" v-on:change="actaulizar_variable_correccion(true, index)">
                                                            <span class="ml-2">Si</span>
                                                        </label>
                                                        <label class="inline-flex items-center ml-6">
                                                            <input type="radio" class="form-radio h-5 w-5 text-red-400" :name="'name_mineral_correccion'.index" v-model="mineral.evaluacion_correcto" value="false" v-on:change="actaulizar_variable_correccion(false, index)">
                                                            <span class="ml-2">No</span>
                                                        </label>
                                                        <label class="inline-flex items-center ml-6">
                                                            <input type="radio" class="form-radio h-5 w-5 text-indigo-400" :name="'name_mineral_correccion'.index" v-model="mineral.evaluacion_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada', index)">
                                                            <span class="ml-2">Sin evaluar</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div v-show="!mineral.evaluacion_correcto" class="w-full md:w-2/3 px-3">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="observaciones"
                                                        >Observación:</label
                                                    >
                                                    <textarea
                                                        id="observaciones"
                                                        name="observaciones"
                                                        v-model="mineral.observacion_autoridad"
                                                        v-bind:class=mineral.clase_text_area
                                                        @input="actaulizar_contenido_text_area($event.target.value, index)" 
                                                        >
                                                    </textarea>
                                                    <p  v-bind:class=mineral.clase_text_evaluacion_de_text_area>{{mineral.texto_validacion_text_area}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <button
                                            :disabled="$props.evaluacion"
                                            class="px-6 py-2.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-red-200 hover:bg-red-300 text-red-900"
                                            type="button" aria-label="like"
                                            @click="eliminar_mineral(index)"
                                            >Eliminar Mineral
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-show="$props.testing">
                los minerales son {{minerales}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'valor_input_props', 
        'valor_input_validacion', 
        'evualacion_correcto', 
        'valor_obs', 
        'valor_valido_obs',
        'evaluacion',
        'testing',
        'label',
        'label_text_area',
        'tipo_yacimiento',
        'lista_de_minerales',
        'lista_de_minerales_pre_cargados',
    ],
  data() {
    return {
        clase_border_de_input: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_input: 'Campo Correcto',
        clase_cartel_validacion_input: 'text-green-500 text-xs italic',
        clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        clase_text_area_presentacion: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_text_area: 'Observacion Correcta',
        clase_text_evaluacion_de_text_area: 'text-green-500 text-xs italic',
        valor_input: this.$props.valor_input_props,

        validacion_input_local: this.$props.valor_input_validacion,

        valor_evaluacion_correcto_local: this.$props.evualacion_correcto,

        obs_valida: this.$props.obs_valido_props,
        /*minerales: [
            {
                id_mineral: '1',
                id_varieadad: '1',
                segunda_cat_mineral_explotado: '',
                lugar_donde_se_enccuentra: '',
                mostrar_lugar_segunda_cat: false,
                mostrar_otro_mineral_segunda_cat: false,
                otro_mineral_segunda_cat: '',
                observacion:'esta es la obs 1',
                clase_text_area_presentacion: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area_presentacion:   'text-red-500 text-xs italic',
                texto_validacion_text_area_presentacion: 'Forma de Presentacion Ccorrecta',
                presentacion_valida:true,
                evaluacion_correcto: true,
                observacion_autoridad: '',
                clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area: 'text-red-500 text-xs italic',
                texto_validacion_text_area : 'Observacion Correcta',
                obs_valida: true,
                lista_de_minerales_array:[],
                thumb: 'http://localhost:8000/minerales/thumbs/3.png'
            },
            {
                id_mineral: '2',
                id_varieadad: '2',
                segunda_cat_mineral_explotado: '',
                lugar_donde_se_enccuentra: '',
                mostrar_lugar_segunda_cat: false,
                mostrar_otro_mineral_segunda_cat: false,
                otro_mineral_segunda_cat: '',
                observacion:'esta es la obs 2',
                clase_text_area_presentacion: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area_presentacion:   'text-red-500 text-xs italic',
                texto_validacion_text_area_presentacion: 'Forma de Presentacion Ccorrecta',
                presentacion_valida:true,
                evaluacion_correcto: true,
                observacion_autoridad: '',
                clase_text_area:'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area: 'text-red-500 text-xs italic',
                texto_validacion_text_area : 'Observacion Correcta',
                obs_valida: true,
                lista_de_minerales_array:[],
                thumb: 'http://localhost:8000/minerales/thumbs/3.png'
            }
        ],*/
        minerales: this.$props.lista_de_minerales_pre_cargados,
        opcionesmineral : this.$props.lista_de_minerales,
        opcionesmineraluno : [],
        index_de_mineral_segunda_cat: '',
        
        //border-green-500
    }; 
  },
  methods:{
    actualizar_valores_padre(){
        this.$emit('changevalor_lista_minerales',this.minerales);
    },
    actaulizar_variable_correccion(valor, index) {
        //this.valor_evaluacion_correcto_local = valor;
        this.minerales[index].evaluacion_correcto = valor;
        this.actualizar_valores_padre();
        //this.$emit('changecorrecto',this.minerales[index].evaluacion_correcto);
    },
     
      actaulizar_contenido_text_area(value, index) {
        if(this.minerales[index].observacion_autoridad.length <= 2)
        {
            this.minerales[index].clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.minerales[index].clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.minerales[index].obs_valida = false;
            //this.$emit('changeobsvalido',false);
            
        }
        if(this.minerales[index].observacion_autoridad.length >= 50)
        {
            this.minerales[index].clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.minerales[index].clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.minerales[index].obs_valida = false;
            //this.$emit('changeobsvalido',false);
        }
        if( this.minerales[index].observacion_autoridad !== '' && this.minerales[index].observacion_autoridad.length <= 30 && this.minerales[index].observacion_autoridad.length >= 3)
        {
            this.minerales[index].clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area=  'Observacion Correcta';
            this.minerales[index].clase_text_evaluacion_de_text_area=  'text-green-500 text-xs italic';
            this.minerales[index].obs_valida = false;
            //this.$emit('changeobsvalido',true);
            
        }
        this.actualizar_valores_padre();
   // this.$emit('changeobs',this.$props.valor_obs)
    },
    actaulizar_contenido_forma_presentacion(value, index){
        console.log("el value es:"+value.length);
        console.log("el index es:"+index);
        
        if(value.length <= 2)
        {
            this.minerales[index].clase_text_area_presentacion=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area_presentacion=  'Forma de Presentacion Incorrecta - debe ser mayor a 2 carcteres';
            this.minerales[index].clase_text_evaluacion_de_text_area_presentacion=  'text-red-500 text-xs italic';
            this.minerales[index].presentacion_valida = false;
            //this.$emit('changeobsvalido',false);
            
        }
        if(value.length >= 50)
        {
            this.minerales[index].clase_text_area_presentacion =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area_presentacion=  'Forma de Presentacion Incorrecta - debe tener menos de 50 caracteres';
            this.minerales[index].clase_text_evaluacion_de_text_area_presentacion=  'text-red-500 text-xs italic';
            this.minerales[index].presentacion_valida = false;
            //this.$emit('changeobsvalido',false);
        }
        if( value !== '' && value.length <= 30 && value.length >= 3)
        {
            this.minerales[index].clase_text_area_presentacion=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.minerales[index].texto_validacion_text_area_presentacion=  'Forma de Presentacion Correcta';
            this.minerales[index].clase_text_evaluacion_de_text_area_presentacion=  'text-green-500 text-xs italic';
            this.minerales[index].presentacion_valida = false;
            //this.$emit('changeobsvalido',true);
            
        }
        //this.$emit('changeobs',this.$props.valor_obs)
        this.actualizar_valores_padre();
        
    },
    cambio_input(){
        if(this.valor_input.length <= 4)
        {
            this.clase_border_de_input= 'appearance-none block w-full bg-gray-200 text-gray-700 border-red-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input= 'Valor Incorrecta - debe ser mayor a 3 carcteres';
            this.clase_cartel_validacion_input= 'text-red-500 text-xs italic';
            this.validacion_input_local = false;
        }
        if(this.valor_input.length >= 40)
        {
            this.clase_border_de_input =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input=  'Valor Incorrecta - debe tener menos de 30 caracteres';
            this.clase_cartel_validacion_input=  'text-red-500 text-xs italic';
            this.validacion_input_local = false;
        }
        if( this.valor_input !== '' && this.valor_input.length <= 30 && this.valor_input.length >= 3)
        {
            this.clase_border_de_input=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_input =  'Valor Correcto';
            this.clase_cartel_validacion_input =  'text-green-500 text-xs italic';
            this.validacion_input_local = true;
        }
        /*this.$emit('changevalido',this.validacion_input_local);
        this.$emit('changevalor',this.valor_input);*/
        this.actualizar_valores_padre();
    },
    eliminar_mineral: function(indice){
        this.minerales.splice(indice, 1);
        this.actualizar_valores_padre();
    },
    agregar_mineral: function(){
        var mineral_aux = {
                id_mineral: '6',
                id_varieadad: '6',
                segunda_cat_mineral_explotado: '',
                lugar_donde_se_enccuentra: '',
                mostrar_lugar_segunda_cat: false,
                mostrar_otro_mineral_segunda_cat: false,
                otro_mineral_segunda_cat: '',
                lugar_donde_se_enccuentra:'',
                observacion:'esta es la obs 44',
                clase_text_area_presentacion: 'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area_presentacion:   'text-red-500 text-xs italic',
                texto_validacion_text_area_presentacion: 'Forma de Presentacion Ccorrecta',
                presentacion_valida:true,
                evaluacion_correcto: true,
                observacion_autoridad: '',
                clase_text_area:'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
                clase_text_evaluacion_de_text_area: 'text-red-500 text-xs italic',
                texto_validacion_text_area : 'Observacion Correcta',
                obs_valida: true,
                lista_de_minerales_array:[],
                thumb: 'http://localhost:8000/minerales/thumbs/3.png'
            };
        this.minerales.push( mineral_aux);
        this.actualizar_valores_padre();
    },
    cambio_mineral_explotado(index){
        console.log("cambio el select");
        
    },
    cambio_select_mineral_segunda_cat(event, index){
        if(this.$props.tipo_yacimiento === 'segunda')
        {
            console.log("el index es: "+index);
            console.log("acabo de elegir: "+ this.minerales[index].id_mineral);
            //console.log(this.minerales[0].lugar_donde_se_enccuentra);
            //console.log("lugar donde se encuentra: "+ this.minerales[index].lugar_donde_se_enccuentra);
            if(
            (this.minerales[index].id_mineral === 1031)
            || 
            (this.minerales[index].id_mineral === 1032)
            )
            {
                //en estos casos debo mostrar la seleccion de lugares
                console.log("entre aca");
                this.minerales[index].lugar_donde_se_enccuentra='';
                //this.model.mina_cantera = 'mina';
                this.minerales[index].mostrar_lugar_segunda_cat = true;
                this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
                this.minerales[index].otro_mineral_segunda_cat= '';
            }
            else{

                if(
                (this.minerales[index].id_mineral === 1035) // desmontes
                || 
                (this.minerales[index].id_mineral === 1181) // relaves
                || 
                (this.minerales[index].id_mineral === 1182) // escoreales
                )
                {
                    //en estos casos de elegir alguna sustancias de aprovechamiento comun pero no se necesita el lugar
                    this.minerales[index].lugar_donde_se_enccuentra='';
                    //this.model.mina_cantera = 'mina';
                    this.minerales[index].mostrar_lugar_segunda_cat = false;
                    this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
                    this.minerales[index].otro_mineral_segunda_cat= '';
                }
                else {
                    if( this.minerales[index].id_mineral === 1039)
                    {
                        //en caso de ser sustenacias concedidas al dueño
                        this.minerales[index].mostrar_otro_mineral_segunda_cat = true;
                        this.minerales[index].otro_mineral_segunda_cat= '';

                    }
                    else
                    {
                        //este es cualqueir otro caso
                        this.minerales[index].lugar_donde_se_enccuentra='';
                        //this.model.mina_cantera = 'mina';
                        this.minerales[index].mostrar_lugar_segunda_cat = false;
                        this.minerales[index].mostrar_otro_mineral_segunda_cat = false;
                        this.minerales[index].otro_mineral_segunda_cat= '';

                    }
                    //en estos casos debo mostrar la seleccion de lugares
                    
                }
            }
        }
        else{
            
        }
        this.actualizar_valores_padre();
    },
    cambio_select_tipo_mineral_explotado_segunda_cat: function(event, index){
        console.log("el index es: "+index);
        console.log("acabo de elegir: "+ this.minerales[index].segunda_cat_mineral_explotado);
        if(this.minerales[index].segunda_cat_mineral_explotado === 'aprovechamiento_comun'){
            this.minerales[index].lista_de_minerales_array = [
            {
                id:1031 , name: 'Arenas Metalíferas',
            },
            {
                id:1032 , name: 'Piedras Preciosas',
            },
            {
                id:1035 , name: 'Desmontes',
            },
            {
                id:1181 , name: 'Relaves',
            },
            {
                id:1182 , name: 'Escoriales',
            },
            ];
        }
       else{
            if(this.minerales[index].segunda_cat_mineral_explotado === 'conceden_preferentemente')
            {
                this.minerales[index].lista_de_minerales_array = [
                    {
                         id:1036 , name:'Salitres'
                    },
                    {
                         id:1037 , name:'Salinas'
                    },
                    {
                         id:1038 , name:'Turberas'
                    },
                    {
                         id:1039 , name:'Metales no comprendidos en 1° Categ.'
                    },
                    {
                         id:1040 , name:'Tierras Piritosas y Aluminosas'
                    },
                    {
                         id:1041 , name:'Abrasivos'
                    },
                    {
                         id:1042 , name:'Ocres'
                    },
                    {
                         id:1043 , name:'Resinas'
                    },
                    {
                         id:1044 , name:'Esteatitas'
                    },
                    {
                         id:1045 , name:'Baritina'
                    },
                    {
                         id:1046 , name:'Caparrosas'
                    },
                    {
                         id:1047 , name:'Grafito'
                    },
                    {
                         id:1048 , name:'Caolí­n'
                    },
                    {
                         id:1049 , name:'Sales Alcalinas o Alcalino Terrosas'
                    },
                    {
                         id:1050 , name:'Amianto'
                    },
                    {
                         id:1051 , name:'Bentonita'
                    },
                    {
                         id:1052 , name:'Zeolitas o Minerales Permutantes o Permutíticos'
                    },
                ];
            }
            else {
                this.minerales[index].lista_de_minerales_array = [
                ];
            }
        }
        this.actualizar_valores_padre();
        
        
    },
    
  },
};
</script>