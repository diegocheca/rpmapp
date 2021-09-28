<template>
    <div class="flex" >
        <div class="w-full md:w-1/2 px-3">
            <label
                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="input_componente"
                >{{label}}:
            </label>
            <div class="flex" v-if="evaluacion || mostrar_correccion">
                <div class="w-full md:w-1/3 px-3">
                    <span class="text-gray-700">Es correcto?</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" :disabled="desactivar_correccion" class="form-radio h-5 w-5 text-green-600" :name="name_correcion" v-model="evualacion_correcto" value="true" v-on:change="actaulizar_variable_correccion(true)">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" :disabled="desactivar_correccion" class="form-radio h-5 w-5 text-red-600" :name="name_correcion" v-model="evualacion_correcto" value="false" v-on:change="actaulizar_variable_correccion(false)">
                            <span class="ml-2">No</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" :disabled="desactivar_correccion" class="form-radio h-5 w-5 text-indigo-600" :name="name_correcion" v-model="evualacion_correcto" value="nada" v-on:change="actaulizar_variable_correccion('nada')">
                            <span class="ml-2">Sin evaluar</span>
                        </label>
                    </div>
                </div>
                <div v-show="!valor_evaluacion_correcto_local" class="w-full md:w-2/3 h-full">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="observaciones"
                        >Observación:
                    </label>
                    <textarea
                        id="observaciones"
                        name="observaciones"
                        v-model="valor_obs"
                        v-bind:class=clase_text_area
                        :disabled="desactivar_correccion"
                        @input="actaulizar_contenido_text_area($event.target.value)"
                        >
                    </textarea>
                    <p  v-bind:class=clase_text_evaluacion_de_text_area>{{texto_validacion_text_area}}</p>
                </div>
                <div class="w-full md:w-1/4 px-3 bg-white rounded shadow p-6 m-8" v-show="testing">
                    <div class="flex">
                        <label class="flex items-center relative w-max cursor-pointer select-none">
                            <br>
                            <span class="text-lg font-bold mr-3">Testing hijo</span>
                            <br>
                            <input
                            type="checkbox"
                            class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500"
                            v-model="testing_hijo"
                            />
                            <span class="absolute font-medium text-xs uppercase right-1 text-white"> Sin </span>
                            <span class="absolute font-medium text-xs uppercase right-8 text-white"> Con </span>
                            <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                        </label>
                    </div>
                    <div class="flex">
                        <div v-show="testing_hijo">
                            <br>Valor input:{{valor_input}}<br>
                            <br>distrtito minero calle Evalaucion:{{evualacion_correcto}}<br>
                            <br>distrtito minero calle Obser:{{valor_obs}}<br>
                            <br>distrtito minero calle obsr Valido:{{valor_valido_obs}}<br>
                            <br>Evaluacion {{evaluacion}}<br>
                            <br>{{texto_validacion_text_area}}<br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-if="valor_input===null || valor_input === undefined" class="w-full md:w-2/3 h-full">
            <div class="flex items-center justify-center w-full h-full">
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                        <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>-->
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                        <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                        </div>
                        <p class="pointer-none text-gray-500 ">
                            <span class="text-sm">Arrastrar y soltar</span> los archivo(s) <br /> o <a href="" id="" class="text-blue-600 hover:underline">seleccionar un archivo</a> desde su dispotivo</p>
                    </div>
                    <input :disabled="desactivar_input" type="file" class="hidden" @change="cambio_el_archivo">
                </label>
            </div>
            <p class="text-sm text-gray-300">
                <span>Tipos de archivos: doc,pdf,tipos de imagenes</span>
            </p>
        </div>
        <div class="w-full md:w-1/2 px-3" v-else>
            <object :data=valor_input type="application/pdf" width="100%" height="500px">
                <p>It appears you don't have a PDF plugin for this browser.
                    No biggie... you can <a :href="$inertia.page.props.appName+'/storage/files_formularios/'">Haciendo clik aquí</a>
                </p>
            </object>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                        <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>-->
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                        <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm">Para cambiar el archivo: Arrastrar y soltar</span> los archivo(s) <br /> o <a href="" id="" class="text-blue-600 hover:underline">seleccionar un archivo</a> desde su dispotivo</p>
                    </div>
                    <input :disabled="desactivar_input" type="file" class="hidden" @change="cambio_el_archivo">
                </label>
            </div>
            <p class="text-sm text-gray-300">
                <span>Tipos de archivos: doc,pdf</span>
            </p>
        </div>
    </div>
</template>

<script>
import Input from '../../Jetstream/Input.vue';
export default {
  components: { Input },
    props: [
        'valor_input_props',
        'evualacion_correcto',
        'valor_obs',
        'valor_valido_obs',
        'evaluacion',
        'testing',
        'name_correcion',
        'label',
        'desactivar_input',
        'mostrar_correccion',
        'desactivar_correccion',
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
        testing_hijo: 'false',
        photo: null,
        description: '',

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
        cambio_el_archivo(event){
            // `files` is always an array because the file input may be in multiple mode
            this.photo = event.target.files[0];
            this.$emit('cambioarchivo',this.photo);
        }
    },
};
</script>