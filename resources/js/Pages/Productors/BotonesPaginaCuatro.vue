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
            class="animate-pulse  text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700"
            @click="guardar_avnces_cuatro"
        >
            {{titulo_boton_guardar}}
        </button>
        <a :href="link_volver">
            <button class="animate-pulse px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
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

        'numero_expdiente',
        'numero_expdiente_valido',
        'numero_expdiente_correcto',
        'obs_numero_expdiente',
        'obs_numero_expdiente_valido',
        'categoria',
        'categoria_validacion',
        'categoria_correcto',
        'obs_categoria',
        'obs_categoria_valido',
        'nombre_mina',
        'nombre_mina_validacion',
        'nombre_mina_correcto',
        'obs_nombre_mina',
        'obs_nombre_mina_valido',
        'descripcion_mina',
        'descripcion_mina_validacion',
        'descripcion_mina_correcto',
        'obs_descripcion_mina',
        'obs_descripcion_mina_valido',
        'distrito_minero',
        'distrito_minero_validacion',
        'distrito_minero_correcto',
        'obs_distrito_minero',
        'obs_distrito_minero_valido',
        'mina_cantera',
        'mina_cantera_validacion',
        'mina_cantera_correcto',
        'obs_mina_cantera',
        'obs_mina_cantera_valido',
        'plano_inmueble',
        'plano_inmueble_validacion',
        'plano_inmueble_correcto',
        'obs_plano_inmueble',
        'obs_plano_inmueble_valido',
        'minerales_variedad',
        'minerales_variedad_validacion',
        'minerales_variedad_correcto',
        'obs_minerales_variedad',
        'obs_minerales_variedad_valido',
        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',

        'minerales',

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
      guardar_avnces_cuatro(){
          //if(this.$props.evaluacion)
          //{
            //Soy autoridad minera
            let self = this
            axios.post('/formularios/evaluacion_auto_guardado_cuatro', {
                    id: this.$props.id,

                    numero_expdiente: this.$props.numero_expdiente,
                    numero_expdiente_valido: this.$props.numero_expdiente_valido,
                    numero_expdiente_correcto: this.$props.numero_expdiente_correcto,
                    obs_numero_expdiente: this.$props.obs_numero_expdiente,
                    obs_numero_expdiente_valido: this.$props.obs_numero_expdiente_valido,
                    categoria: this.$props.categoria,
                    categoria_validacion: this.$props.categoria_validacion,
                    categoria_correcto: this.$props.categoria_correcto,
                    obs_categoria: this.$props.obs_categoria,
                    obs_categoria_valido: this.$props.obs_categoria_valido,
                    nombre_mina: this.$props.nombre_mina,
                    nombre_mina_validacion: this.$props.nombre_mina_validacion,
                    nombre_mina_correcto: this.$props.nombre_mina_correcto,
                    obs_nombre_mina: this.$props.obs_nombre_mina,
                    obs_nombre_mina_valido: this.$props.obs_nombre_mina_valido,
                    descripcion_mina: this.$props.descripcion_mina,
                    descripcion_mina_validacion: this.$props.descripcion_mina_validacion,
                    descripcion_mina_correcto: this.$props.descripcion_mina_correcto,
                    obs_descripcion_mina: this.$props.obs_descripcion_mina,
                    obs_descripcion_mina_valido: this.$props.obs_descripcion_mina_valido,
                    distrito_minero: this.$props.distrito_minero,
                    distrito_minero_validacion: this.$props.distrito_minero_validacion,
                    distrito_minero_correcto: this.$props.distrito_minero_correcto,
                    obs_distrito_minero: this.$props.obs_distrito_minero,
                    obs_distrito_minero_valido: this.$props.obs_distrito_minero_valido,
                    mina_cantera: this.$props.mina_cantera,
                    mina_cantera_validacion: this.$props.mina_cantera_validacion,
                    mina_cantera_correcto: this.$props.mina_cantera_correcto,
                    obs_mina_cantera: this.$props.obs_mina_cantera,
                    obs_mina_cantera_valido: this.$props.obs_mina_cantera_valido,
                    plano_inmueble: this.$props.plano_inmueble,
                    plano_inmueble_validacion: this.$props.plano_inmueble_validacion,
                    plano_inmueble_correcto: this.$props.plano_inmueble_correcto,
                    obs_plano_inmueble: this.$props.obs_plano_inmueble,
                    obs_plano_inmueble_valido: this.$props.obs_plano_inmueble_valido,
                    minerales_variedad: this.$props.minerales_variedad,
                    minerales_variedad_validacion: this.$props.minerales_variedad_validacion,
                    minerales_variedad_correcto: this.$props.minerales_variedad_correcto,
                    obs_minerales_variedad: this.$props.obs_minerales_variedad,
                    obs_minerales_variedad_valido: this.$props.obs_minerales_variedad_valido,
                    resolucion_concesion_minera: this.$props.resolucion_concesion_minera,
                    resolucion_concesion_minera_validacion: this.$props.resolucion_concesion_minera_validacion,
                    resolucion_concesion_minera_correcto: this.$props.resolucion_concesion_minera_correcto,
                    obs_resolucion_concesion_minera: this.$props.obs_resolucion_concesion_minera,
                    obs_resolucion_concesion_minera_valido: this.$props.obs_resolucion_concesion_minera_valido,
                    titulo_contrato_posecion: this.$props.titulo_contrato_posecion,
                    titulo_contrato_posecion_validacion: this.$props.titulo_contrato_posecion_validacion,
                    titulo_contrato_posecion_correcto: this.$props.titulo_contrato_posecion_correcto,
                    obs_titulo_contrato_posecion: this.$props.obs_titulo_contrato_posecion,
                    obs_titulo_contrato_posecion_valido: this.$props.obs_titulo_contrato_posecion_valido,

                    lista_minerales: this.$props.minerales,

                    es_evaluacion: this.$props.evaluacion,


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
