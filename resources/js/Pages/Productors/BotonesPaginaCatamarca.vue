<template>
    <div class="flex items-center justify-center w-full">
        <jet-dialog-modal :show="mostrar_modal_datos_ya_guardados" @close="cerrar_modal_datos_uno">
            <template #title>
                    {{modal_tittle}}
            </template>
            <template #content>
                    {{modal_body}}
            </template>
            <template #footer>
                <button @click="cerrar_modal_datos_uno">
                        Ok
                </button>
            </template>
        </jet-dialog-modal>
        <div class="flex w-full">
            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                <a :href="link_volver">
                    <button class="animate-pulse px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
                        {{titulo_boton_volver}}
                    </button>
                </a>
            </div>
            <div class="w-full md:w-4/5 px-3 mb-6 md:mb-0">
                <button
                    type="button"
                    class="animate-pulse text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700"
                    @click="guardar_avnces_cinco"
                >
                    {{titulo_boton_guardar}}
                </button>
            </div>
        </div>
        <div v-show="true">

            {{$props.formulario.gestor_nombre_apellido}}
            {{$props.formulario.gestor_nombre_apellido_valido}}
            {{$props.formulario.gestor_nombre_apellido_correcto}}
            {{$props.formulario.obs_gestor_nombre_apellido}}
            {{$props.formulario.obs_gestor_nombre_valido}}

            {{$props.formulario.gestor_dni}}
            {{$props.formulario.gestor_dni_valido}}
            {{$props.formulario.gestor_dni_correcto}}
            {{$props.formulario.obs_gestor_dni}}
            {{$props.formulario.obs_gestor_dni_valido}}

            {{$props.formulario.gestor_profesion}}
            {{$props.formulario.gestor_profesion_valido}}
            {{$props.formulario.gestor_profesion_correcto}}
            {{$props.formulario.obs_gestor_profesion}}
            {{$props.formulario.obs_gestor_profesion_valido}}

            {{$props.formulario.gestor_telefono}}
            {{$props.formulario.gestor_telefono_valido}}
            {{$props.formulario.gestor_telefono_correcto}}
            {{$props.formulario.obs_gestor_telefono}}
            {{$props.formulario.obs_gestor_telefono_valido}}

            {{$props.formulario.gestor_email}}
            {{$props.formulario.gestor_email_valido}}
            {{$props.formulario.gestor_email_correcto}}
            {{$props.formulario.obs_gestor_email}}
            {{$props.formulario.obs_gestor_email_valido}}


            {{$props.formulario.gestor_notificacion}}
            {{$props.formulario.gestor_notificacion_valido}}
            {{$props.formulario.gestor_notificacion_correcto}}
            {{$props.formulario.obs_gestor_notificacion}}
            {{$props.formulario.obs_gestor_notificacion_valido}}

            {{$props.formulario.foto_4x4}}
            {{$props.formulario.foto_4x4_valido}}
            {{$props.formulario.foto_4x4_correcto}}
            {{$props.formulario.obs_foto_4x4}}
            {{$props.formulario.obs_foto_4x4_valido}}


            {{$props.formulario.autorizacion_gestor}}
            {{$props.formulario.autorizacion_gestor_valido}}
            {{$props.formulario.autorizacion_gestor_correcto}}
            {{$props.formulario.obs_autorizacion_gestor}}
            {{$props.formulario.obs_autorizacion_gestor_valido}}


            {{$props.formulario.primer_hoja_dni}}
            {{$props.formulario.hoja_dni_valido}}
            {{$props.formulario.hoja_dni_correcto}}
            {{$props.formulario.obs_hoja_dni}}
            {{$props.formulario.obs_hoja_dni_valido}}

        </div>
        
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
export default {
    props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',

        'formulario',
        'donde_guardar',
        
        'evaluacion',
        'testing',
        'id'
    ],
    components: {
		JetDialogModal,
	},
  data() {
    return {
      saludos: 'Saludame qweqweqwe',
      mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:''
    };
  },
  methods:{
      guardar_avnces_cinco(){
            //Soy autoridad minera
            let self = this;
            const data = new FormData();
            data.append('id', this.$props.id);
            data.append('evaluacion', this.$props.evaluacion);
            data.append('testing', this.$props.testing);

            data.append('gestor_nombre_apellido', this.$props.formulario.gestor_nombre_apellido);
            data.append('gestor_nombre_apellido_valido', this.$props.formulario.gestor_nombre_apellido_valido);
            data.append('gestor_nombre_apellido_correcto', this.$props.formulario.gestor_nombre_apellido_correcto);
            data.append('obs_gestor_nombre_apellido', this.$props.formulario.obs_gestor_nombre_apellido);
            data.append('obs_gestor_nombre_valido', this.$props.formulario.obs_gestor_nombre_valido);
            
            data.append('gestor_dni', this.$props.formulario.gestor_dni);
            data.append('gestor_dni_valido', this.$props.formulario.gestor_dni_valido);
            data.append('gestor_dni_correcto', this.$props.formulario.gestor_dni_correcto);
            data.append('obs_gestor_dni', this.$props.formulario.obs_gestor_dni);
            data.append('obs_gestor_dni_valido', this.$props.formulario.obs_gestor_dni_valido);
            

            data.append('gestor_profesion', this.$props.formulario.gestor_profesion);
            data.append('gestor_profesion_valido', this.$props.formulario.gestor_profesion_valido);
            data.append('gestor_profesion_correcto', this.$props.formulario.gestor_profesion_correcto);
            data.append('obs_gestor_profesion', this.$props.formulario.obs_gestor_profesion);
            data.append('obs_gestor_profesion_valido', this.$props.formulario.obs_gestor_profesion_valido);
            


            data.append('gestor_telefono', this.$props.formulario.gestor_telefono);
            data.append('gestor_telefono_valido', this.$props.formulario.gestor_telefono_valido);
            data.append('gestor_telefono_correcto', this.$props.formulario.gestor_telefono_correcto);
            data.append('obs_gestor_telefono', this.$props.formulario.obs_gestor_telefono);
            data.append('obs_gestor_telefono_valido', this.$props.formulario.obs_gestor_telefono_valido);
            


            data.append('gestor_email', this.$props.formulario.gestor_email);
            data.append('gestor_email_valido', this.$props.formulario.gestor_email_valido);
            data.append('gestor_email_correcto', this.$props.formulario.gestor_email_correcto);
            data.append('obs_gestor_email', this.$props.formulario.obs_gestor_email);
            data.append('obs_gestor_email_valido', this.$props.formulario.obs_gestor_email_valido);
            


            data.append('gestor_notificacion', this.$props.formulario.gestor_notificacion);
            data.append('gestor_notificacion_valido', this.$props.formulario.gestor_notificacion_valido);
            data.append('gestor_notificacion_correcto', this.$props.formulario.gestor_notificacion_correcto);
            data.append('obs_gestor_notificacion', this.$props.formulario.obs_gestor_notificacion);
            data.append('obs_gestor_notificacion_valido', this.$props.formulario.obs_gestor_notificacion_valido);
            


            data.append('foto_4x4', this.$props.formulario.foto_4x4);
            data.append('foto_4x4_valido', this.$props.formulario.foto_4x4_valido);
            data.append('foto_4x4_correcto', this.$props.formulario.foto_4x4_correcto);
            data.append('obs_foto_4x4', this.$props.formulario.obs_foto_4x4);
            data.append('obs_foto_4x4_valido', this.$props.formulario.obs_foto_4x4_valido);
            



            data.append('autorizacion_gestor', this.$props.formulario.autorizacion_gestor);
            data.append('autorizacion_gestor_valido', this.$props.formulario.autorizacion_gestor_valido);
            data.append('autorizacion_gestor_correcto', this.$props.formulario.autorizacion_gestor_correcto);
            data.append('obs_autorizacion_gestor', this.$props.formulario.obs_autorizacion_gestor);
            data.append('obs_autorizacion_gestor_valido', this.$props.formulario.obs_autorizacion_gestor_valido);
            

            data.append('primer_hoja_dni', this.$props.formulario.primer_hoja_dni);
            data.append('hoja_dni_valido', this.$props.formulario.hoja_dni_valido);
            data.append('hoja_dni_correcto', this.$props.formulario.hoja_dni_correcto);
            data.append('obs_hoja_dni', this.$props.formulario.obs_hoja_dni);
            data.append('obs_hoja_dni_valido', this.$props.formulario.obs_hoja_dni_valido);
            

            data.append('segunda_hoja_dni', this.$props.formulario.segunda_hoja_dni);
            data.append('segunda_hoja_dni_valido', this.$props.formulario.segunda_hoja_dni_valido);
            data.append('segunda_hoja_dni_correcto', this.$props.formulario.segunda_hoja_dni_correcto);
            data.append('obs_segunda_hoja_dni', this.$props.formulario.obs_segunda_hoja_dni);
            data.append('obs_segunda_hoja_dni_valido', this.$props.formulario.obs_segunda_hoja_dni_valido);
            


            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(this.$inertia.page.props.appName+"/formularios/evaluacion_auto_guardado_catamarcas", data)
            .then(function (response) {
                console.log(response.data);
                if(response.data.msg === "se creo el paso de catamarca correctamente")
                {
                    console.log('todo bien, se creo');
                    self.modal_tittle = 'Datos del paso de Catamarca han sido guardados correctamente';
                    self.modal_body = 'Recien hemos guardados los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario';
                    self.mostrar_modal_datos_ya_guardados = true;
                }
                    
                if(response.data.msg === "se actualizo el paso de catamarca correctamente")
                {
                    console.log('todo bien, se actualizo');
                    self.modal_tittle = 'Datos del paso de Catamarca han sido guardados correctamente';
                    self.modal_body = 'Recien hemos actualizado los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario';
                    self.mostrar_modal_datos_ya_guardados = true;
                }
                else{
                    console.log('NO todo bien');	
                }
                
            })
        },
        cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
        },
    }
};
</script>
