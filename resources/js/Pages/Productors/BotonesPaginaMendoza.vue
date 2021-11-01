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
                    <button 
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
                        ">
                        {{titulo_boton_volver}}
                    </button>
                </a>
            </div>
            <div class="w-full md:w-4/5 px-3 mb-6 md:mb-0">
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
                    hover:text-white
                    hover:shadow-xl
                    hover:bg-gray-600
                    "
                    @click="guardar_avnces_cinco"
                >
                    {{titulo_boton_guardar}}
                </button>
            </div>
        </div>
        <div v-show="testing">

            * decreto3737: {{$props.formulario.decreto3737}} *
            * decreto3737_correcto: {{$props.formulario.decreto3737_correcto}} *
            * decreto3737_valido: {{$props.formulario.decreto3737_valido}} *
            * obs_decreto3737: {{$props.formulario.obs_decreto3737}} *
            * obs_decreto3737_valido: {{$props.formulario.obs_decreto3737_valido}} *

            * situacion_mina : {{$props.formulario.situacion_mina}} *
            * situacion_mina_correcto : {{$props.formulario.situacion_mina_correcto}} *
            * obs_situacion_mina : {{$props.formulario.obs_situacion_mina}} *
            * situacion_mina_valido : {{$props.formulario.situacion_mina_valido}} *
            * obs_situacion_mina_valido : {{$props.formulario.obs_situacion_mina_valido}} *



            * concesion_minera_asiento_n: {{$props.formulario.concesion_minera_asiento_n}} *
            * concesion_minera_asiento_n_valido: {{$props.formulario.concesion_minera_asiento_n_valido}} *


            * concesion_minera_fojas: {{$props.formulario.concesion_minera_fojas}} *
            * concesion_minera_fojas_valido: {{$props.formulario.concesion_minera_fojas_valido}} *



            * concesion_minera_tomo_n : {{$props.formulario.concesion_minera_tomo_n}} *
            * concesion_minera_tomo_n_valido : {{$props.formulario.concesion_minera_tomo_n_valido}} *
            * concesion_minera_reg_m_y_d : {{$props.formulario.concesion_minera_reg_m_y_d}} *
            * concesion_minera_reg_m_y_d_valido : {{$props.formulario.concesion_minera_reg_m_y_d_valido}} *
            * concesion_minera_reg_cant : {{$props.formulario.concesion_minera_reg_cant}} *
            * concesion_minera_reg_cant_valido : {{$props.formulario.concesion_minera_reg_cant_valido}} *
            * concesion_minera_reg_men : {{$props.formulario.concesion_minera_reg_men}} *
            * concesion_minera_reg_men_valido : {{$props.formulario.concesion_minera_reg_men_valido}} *



            * concesion_minera_reg_d_y_c : {{$props.formulario.concesion_minera_reg_d_y_c}} *
            * concesion_minera_reg_d_y_c_valido : {{$props.formulario.concesion_minera_reg_d_y_c_valido}} *
            * obs_concesion_minera_reg_d_y_c : {{$props.formulario.obs_concesion_minera_reg_d_y_c}} *
            * obs_concesion_minera_reg_d_y_c_valido : {{$props.formulario.obs_concesion_minera_reg_d_y_c_valido}} *


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
            data.append('es_evaluacion', this.$props.evaluacion);
            data.append('testing', this.$props.testing);

            data.append('decreto3737', this.$props.formulario.decreto3737);
            data.append('decreto3737_correcto', this.$props.formulario.decreto3737_correcto);
            data.append('obs_decreto3737', this.$props.formulario.obs_decreto3737);
            
            data.append('situacion_mina', this.$props.formulario.situacion_mina);
            data.append('situacion_mina_correcto', this.$props.formulario.situacion_mina_correcto);
            data.append('obs_situacion_mina', this.$props.formulario.obs_situacion_mina);
            



//me quede aca el lunes


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
            

            data.append('constancia_afip', this.$props.formulario.constancia_afip);
            data.append('constancia_afip_valido', this.$props.formulario.constancia_afip_valido);
            data.append('constancia_afip_correcto', this.$props.formulario.constancia_afip_correcto);
            data.append('obs_constancia_afip', this.$props.formulario.obs_constancia_afip);
            data.append('obs_constancia_afip_valido', this.$props.formulario.obs_constancia_afip_valido);


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
