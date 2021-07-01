<template>
    <div>
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
        <button
            type="button"
            class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700"
            @click="guardar_avnces_uno"
        >
            {{titulo_boton_guardar}}
        </button>
        <a :href="link_volver">
            <button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
                {{titulo_boton_volver}}
            </button>
        </a>

        <div v-show="$props.testing">

            {{$props.numero_expdiente}}
            {{$props.numero_expdiente_valido}}
            {{$props.numero_expdiente_correcto}}
            {{$props.obs_numero_expdiente}}
            {{$props.obs_numero_expdiente_valido}}
            {{$props.categoria}}
            {{$props.categoria_validacion}}
            {{$props.categoria_correcto}}
            {{$props.obs_categoria}}
            {{$props.obs_categoria_valido}}
            {{$props.nombre_mina}}
            {{$props.nombre_mina_validacion}}
            {{$props.nombre_mina_correcto}}
            {{$props.obs_nombre_mina}}
            {{$props.obs_nombre_mina_valido}}
            {{$props.descripcion_mina}}
            {{$props.descripcion_mina_validacion}}
            {{$props.descripcion_mina_correcto}}
            {{$props.obs_descripcion_mina}}
            {{$props.obs_descripcion_mina_valido}}
            {{$props.distrito_minero}}
            {{$props.distrito_minero_validacion}}
            {{$props.distrito_minero_correcto}}
            {{$props.obs_distrito_minero}}
            {{$props.obs_distrito_minero_valido}}
            {{$props.mina_cantera}}
            {{$props.mina_cantera_validacion}}
            {{$props.mina_cantera_correcto}}
            {{$props.obs_mina_cantera}}
            {{$props.obs_mina_cantera_valido}}
            {{$props.plano_inmueble}}
            {{$props.plano_inmueble_validacion}}
            {{$props.plano_inmueble_correcto}}
            {{$props.obs_plano_inmueble}}
            {{$props.obs_plano_inmueble_valido}}
            {{$props.minerales_variedad}}
            {{$props.minerales_variedad_validacion}}
            {{$props.minerales_variedad_correcto}}
            {{$props.obs_minerales_variedad}}
            {{$props.obs_minerales_variedad_valido}}
            {{$props.resolucion_concesion_minera}}
            {{$props.resolucion_concesion_minera_validacion}}
            {{$props.resolucion_concesion_minera_correcto}}
            {{$props.obs_resolucion_concesion_minera}}
            {{$props.obs_resolucion_concesion_minera_valido}}
            {{$props.titulo_contrato_posecion}}
            {{$props.titulo_contrato_posecion_validacion}}
            {{$props.titulo_contrato_posecion_correcto}}
            {{$props.obs_titulo_contrato_posecion}}
            {{$props.obs_titulo_contrato_posecion_valido}}
            {{$props.minerales}}
            

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


        'owner',
        'owner_correcto',
        'obs_owner',
        'obs_owner_valido',
        'arrendatario',
        'arrendatario_correcto',
        'obs_arrendatario',
        'obs_arrendatario_valido',
        'concesionario',
        'concesionario_correcto',
        'obs_concesionario',
        'obs_concesionario_valido',
        'otros',
        'otros_correcto',
        'obs_otros',
        'obs_otros_valido',
        'otros_input',
        'otros_input_valido',
        'sustancias',
        'sustancias_correcto',
        'obs_sustancias',
        'obs_sustancias_valido',
        'sustancias_input',
        'sustancias_input_valido',
        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',
        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'constancia_pago_canon',
        'constancia_pago_canon_validacion',
        'constancia_pago_canon_correcto',
        'obs_constancia_pago_canon',
        'obs_constancia_pago_canon_valido',
        'iia',
        'iia_canon_validacion',
        'iia_correcto',
        'obs_iia_canon',
        'obs_iia_canon_valido',
        'dia',
        'dia_canon_validacion',
        'dia_correcto',
        'obs_dia_canon',
        'obs_dia_canon_valido',
        'acciones_a_desarrollar',
        'acciones_a_desarrollar_validacion',
        'acciones_a_desarrollar_correcto',
        'obs_acciones_a_desarrollar',
        'obs_acciones_a_desarrollar_valido',
        'actividad',
        'actividad_a_desarrollar_validacion',
        'actividad_a_desarrollar_correcto',
        'obs_actividad_a_desarrollar',
        'obs_actividad_a_desarrollar_valido',
        'fecha_alta_dia',
        'fecha_alta_dia_validacion',
        'fecha_alta_dia_correcto',
        'obs_fecha_alta_dia',
        'obs_fecha_alta_dia_valido',
        'fecha_vencimiento_dia',
        'fecha_vencimiento_dia_validacion',
        'fecha_vencimiento_dia_correcto',
        'obs_fecha_vencimiento_dia',
        'obs_fecha_vencimiento_dia_valido',
        
        
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
      guardar_avnces_uno(){
          //if(this.$props.evaluacion)
          //{
            //Soy autoridad minera
            let self = this
            axios.post('/formularios/evaluacion_auto_guardado_cinco', {
                    id: this.$props.id,

                    owner: this.$props.owner,
                    owner_correcto: this.$props.owner_correcto,
                    obs_owner: this.$props.obs_owner,
                    obs_owner_valido: this.$props.obs_owner_valido,
                    arrendatario: this.$props.arrendatario,
                    arrendatario_correcto: this.$props.arrendatario_correcto,
                    obs_arrendatario: this.$props.obs_arrendatario,
                    obs_arrendatario_valido: this.$props.obs_arrendatario_valido,
                    concesionario: this.$props.concesionario,
                    concesionario_correcto: this.$props.concesionario_correcto,
                    obs_concesionario: this.$props.obs_concesionario,
                    obs_concesionario_valido: this.$props.obs_concesionario_valido,
                    otros: this.$props.otros,
                    otros_correcto: this.$props.otros_correcto,
                    obs_otros: this.$props.obs_otros,
                    obs_otros_valido: this.$props.obs_otros_valido,
                    otros_input: this.$props.otros_input,
                    otros_input_valido: this.$props.otros_input_valido,
                    sustancias: this.$props.sustancias,
                    sustancias_correcto: this.$props.sustancias_correcto,
                    obs_sustancias: this.$props.obs_sustancias,
                    obs_sustancias_valido: this.$props.obs_sustancias_valido,
                    sustancias_input: this.$props.sustancias_input,
                    sustancias_input_valido: this.$props.sustancias_input_valido,
                    titulo_contrato_posecion: this.$props.titulo_contrato_posecion,
                    titulo_contrato_posecion_validacion: this.$props.titulo_contrato_posecion_validacion,
                    titulo_contrato_posecion_correcto: this.$props.titulo_contrato_posecion_correcto,
                    obs_titulo_contrato_posecion: this.$props.obs_titulo_contrato_posecion,
                    obs_titulo_contrato_posecion_valido: this.$props.obs_titulo_contrato_posecion_valido,
                    resolucion_concesion_minera: this.$props.resolucion_concesion_minera,
                    resolucion_concesion_minera_validacion: this.$props.resolucion_concesion_minera_validacion,
                    resolucion_concesion_minera_correcto: this.$props.resolucion_concesion_minera_correcto,
                    obs_resolucion_concesion_minera: this.$props.obs_resolucion_concesion_minera,
                    obs_resolucion_concesion_minera_valido: this.$props.obs_resolucion_concesion_minera_valido,
                    constancia_pago_canon: this.$props.constancia_pago_canon,
                    constancia_pago_canon_validacion: this.$props.constancia_pago_canon_validacion,
                    constancia_pago_canon_correcto: this.$props.constancia_pago_canon_correcto,
                    obs_constancia_pago_canon: this.$props.obs_constancia_pago_canon,
                    obs_constancia_pago_canon_valido: this.$props.obs_constancia_pago_canon_valido,
                    iia: this.$props.iia,
                    iia_canon_validacion: this.$props.iia_canon_validacion,
                    iia_correcto: this.$props.iia_correcto,
                    obs_iia_canon: this.$props.obs_iia_canon,
                    obs_iia_canon_valido: this.$props.obs_iia_canon_valido,
                    dia: this.$props.dia,
                    dia_canon_validacion: this.$props.dia_canon_validacion,
                    dia_correcto: this.$props.dia_correcto,
                    obs_dia_canon: this.$props.obs_dia_canon,
                    obs_dia_canon_valido: this.$props.obs_dia_canon_valido,
                    acciones_a_desarrollar: this.$props.acciones_a_desarrollar,
                    acciones_a_desarrollar_validacion: this.$props.acciones_a_desarrollar_validacion,
                    acciones_a_desarrollar_correcto: this.$props.acciones_a_desarrollar_correcto,
                    obs_acciones_a_desarrollar: this.$props.obs_acciones_a_desarrollar,
                    obs_acciones_a_desarrollar_valido: this.$props.obs_acciones_a_desarrollar_valido,
                    actividad: this.$props.actividad,
                    actividad_a_desarrollar_validacion: this.$props.actividad_a_desarrollar_validacion,
                    actividad_a_desarrollar_correcto: this.$props.actividad_a_desarrollar_correcto,
                    obs_actividad_a_desarrollar: this.$props.obs_actividad_a_desarrollar,
                    obs_actividad_a_desarrollar_valido: this.$props.obs_actividad_a_desarrollar_valido,
                    fecha_alta_dia: this.$props.fecha_alta_dia,
                    fecha_alta_dia_validacion: this.$props.fecha_alta_dia_validacion,
                    fecha_alta_dia_correcto: this.$props.fecha_alta_dia_correcto,
                    obs_fecha_alta_dia: this.$props.obs_fecha_alta_dia,
                    obs_fecha_alta_dia_valido: this.$props.obs_fecha_alta_dia_valido,
                    fecha_vencimiento_dia: this.$props.fecha_vencimiento_dia,
                    fecha_vencimiento_dia_validacion: this.$props.fecha_vencimiento_dia_validacion,
                    fecha_vencimiento_dia_correcto: this.$props.fecha_vencimiento_dia_correcto,
                    obs_fecha_vencimiento_dia: this.$props.obs_fecha_vencimiento_dia,
                    obs_fecha_vencimiento_dia_valido: this.$props.obs_fecha_vencimiento_dia_valido,


                    valor_de_progreso: 20,
                    valor_de_aprobado: 20,
                    valor_de_reprobado: 20,

                })
                .then(function (response) {
                    console.log(response.data);
                    if(response.data === "se actualizaron los datos correctamente")
                    {
                        console.log('todo bien');
                        self.modal_tittle = 'Datos guardados correctamente';
                        self.modal_body = 'Recien hemos guardados los datos del productor de manera correcta, gracias por usar este servcio, por favor continue llenando el formulario';
                        self.mostrar_modal_datos_ya_guardados = true;
                    }
                    
                    if(response.data === "formulario no encontrado")
                    {
                        console.log('todo mal, no se encontro');
                        self.modal_tittle = 'Paso 1 Guardado Fallido';
                        self.modal_body = 'NO Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias';
                        self.mostrar_modal_datos_ya_guardados = true;
                    }
                    else{
                        console.log('NO todo bien');	
                    }
                    
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            //soy una autoridad minera
            
          //}
          //if(!this.$props.evaluacion)
         // {
              //soy un productor

         // }

      },
      cerrar_modal_datos_uno() {
				this.mostrar_modal_datos_ya_guardados = false
		},
  }
  
};
</script>
