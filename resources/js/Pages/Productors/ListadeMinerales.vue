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
                <button class="px-6 py-2.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-green-200 hover:bg-green-300 text-green-900"  @click="agregar_mineral()"> + Agregar Mineral</button>
                </div>
            </div>
            <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-1 xl:grid-cols-1">
                <div class="flex flex-col" v-for="(mineral, index) in minerales" v-bind:key="mineral.id">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img src="https://images.unsplash.com/photo-1585399000684-d2f72660f092?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80"
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
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <select
                                        v-model="mineral.id_mineral"
                                        >
                                            <option value="option 1">Opcion 1</option>
                                            <option value="option 2">Opcion 2</option>
                                            <option value="option 3">Opcion 3</option>
                                            <option value="option 4">Opcion 4</option>
                                            <option value="option 5">Opcion 5</option>
                                        </select>
                                        <label for="select_lugar_mineral">Lugar donde se encuentra:</label>
                                        <select  class="form-control" id="select_lugar_mineral" name="select_lugar_mineral" v-model="mineral.lugar_donde_se_enccuentra">
                                            <option value="lecho_de_los_rios">Lechos de los ríos</option>
                                            <option value="aguas_corrientes">Aguas Corrientes</option>
                                            <option value="placeres">Placeres</option>
                                        </select>
                                        <br>
                                        <div v-show="mineral.mostrar_otro_mineral_segunda_cat">
                                            <label for="otro_mineral_segunda_categoria">Nombre del mineral no comprendido en 1° categoría:</label>
                                            <input type="text" maxlength="25" class="form-control" name="otro_mineral_segunda_categoria" id="otro_mineral_segunda_categoria" v-model="mineral.otro_mineral_segunda_cat">
                                            <br>
                                        </div>
                                        <label for="select_mineral_explotado">Mineral Explotado:</label>
																						<select  class="form-control" id="select_mineral_explotado" name="select_mineral_explotado"  v-model="mineral.segunda_cat_mineral_explotado" @change="cambio_select_tipo_mineral_explotado_segunda_cat($event, index)">
																							<option value="aprovechamiento_comun">Sustancias de aprovechamiento común</option>
																							<option value="conceden_prefeerentemente">Sustancias que se conceden preferentemente al dueño del suelo</option>
																						</select>
																						<br>
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
                                            >{{label_text_area}}:</label
                                        >
                                        <textarea
                                            id="observaciones"
                                            name="observaciones"
                                            v-model="valor_obs"
                                            v-bind:class=clase_text_area
                                            @input="actaulizar_contenido_text_area($event.target.value)" 
                                            >
                                        </textarea>
                                        <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <div class="flex-auto flex space-x-3">
                                        <button
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
                                        </button>
                                    </div>
                                    <button
                                        class="px-6 py-2.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-red-200 hover:bg-red-300 text-red-900"
                                        type="button" aria-label="like"
                                        @click="eliminar_mineral(index)"
                                        >Eliminar Mineral</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <input
            id="input_componente"
            name="input_componente"
            v-model="valor_input"
            v-bind:class=clase_border_de_input
            :disabled="evaluacion"
            @input="cambio_input($event.target.value)" 
        />
        <p v-bind:class=clase_cartel_validacion_input>{{texto_validacion_input}}.</p>
        <div class="flex" v-if="evaluacion">
            <div class="w-full md:w-1/3 px-3">
                <span class="text-gray-700">Es correcto?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="true" v-on:change="actaulizar_variable_correccion(true)">
                        <span class="ml-2">Si</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="false" v-on:change="actaulizar_variable_correccion(false)">
                        <span class="ml-2">No</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" v-model="evualacion_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada')">
                        <span class="ml-2">Sin evaluar</span>
                    </label>
                </div>
            </div>
            <div v-show="!valor_evaluacion_correcto_local" class="w-full md:w-2/3 px-3">
                <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="observaciones"
                    >Observación:</label
                >
                <textarea
                    id="observaciones"
                    name="observaciones"
                    v-model="valor_obs"
                    v-bind:class=clase_text_area
                    @input="actaulizar_contenido_text_area($event.target.value)" 
                    >
                </textarea>
                <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
            </div>
        </div>
        <div v-show="testing">
            <br>Valor input:{{valor_input}}<br>
            <br>Validacion Input:{{validacion_input_local}}<br>
            <br>distrtito minero calle Valido local:{{validacion_input_local}}<br>
            <br>distrtito minero calle Evalaucion:{{evualacion_correcto}}<br>
            <br>distrtito minero calle Obser:{{valor_obs}}<br>
            <br>distrtito minero calle obsr Valido:{{valor_valido_obs}}<br>
            <br>Evaluacion {{evaluacion}}<br>
            <br>{{texto_validacion_text_area}}<br>
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
        'label_text_area'
    ],
  data() {
    return {
        clase_border_de_input: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_input: 'Campo Correcto',
        clase_cartel_validacion_input: 'text-green-500 text-xs italic',
        clase_text_area: 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white',
        texto_validacion_text_area: 'Observacion Correcta',
        clase_text_evaluacion_de_text_area: 'text-green-500 text-xs italic',
        valor_input: this.$props.valor_input_props,

        validacion_input_local: this.$props.valor_input_validacion,

        valor_evaluacion_correcto_local: this.$props.evualacion_correcto,

        obs_valida: this.$props.obs_valido_props,
        minerales: [
            {
                id_mineral: '1',
                id_varieadad: '1',
                segunda_cat_mineral_explotado: '',
                lugar_donde_se_enccuentra: '',
                mostrar_lugar_segunda_cat: false,
                mostrar_otro_mineral_segunda_cat: false,
                otro_mineral_segunda_cat: '',
                lugar_donde_se_enccuentra:'',
                observacion:'esta es la obs 1'
            },
            {
                id_mineral: '2',
                id_varieadad: '2',
                segunda_cat_mineral_explotado: '',
                lugar_donde_se_enccuentra: '',
                mostrar_lugar_segunda_cat: false,
                mostrar_otro_mineral_segunda_cat: false,
                otro_mineral_segunda_cat: '',
                lugar_donde_se_enccuentra:'',
                observacion:'esta es la obs 2'
            }
        ],
        
        //border-green-500
    }; 
  },
  methods:{
    actaulizar_variable_correccion(valor) {
        this.valor_evaluacion_correcto_local = valor;
        this.$emit('changecorrecto',this.valor_evaluacion_correcto_local);
    },
     
      actaulizar_contenido_text_area(value) {
        if(this.$props.valor_obs.length <= 2)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe ser mayor a 2 carcteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
            
        }
        if(this.$props.valor_obs.length >= 50)
        {
            this.clase_text_area =  'appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Incorrecta - debe tener menos de 50 caracteres';
            this.clase_text_evaluacion_de_text_area=  'text-red-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',false);
        }
        if( this.$props.valor_obs !== '' && this.$props.valor_obs.length <= 30 && this.$props.valor_obs.length >= 3)
        {
            this.clase_text_area=  'appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white';
            this.texto_validacion_text_area=  'Observacion Correcta';
            this.clase_text_evaluacion_de_text_area=  'text-green-500 text-xs italic';
            this.obs_valida = false;
            this.$emit('changeobsvalido',true);
            
        }
        this.$emit('changeobs',this.$props.valor_obs)
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
        this.$emit('changevalido',this.validacion_input_local);
        this.$emit('changevalor',this.valor_input);
    },
    eliminar_mineral: function(indice){
        this.minerales.splice(indice, 1);
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
                observacion:'esta es la obs 44'
            };
        this.minerales.push( mineral_aux);
    },
  },
};
</script>