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
            class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            @click="guardar_avnces_uno"
        >
            {{titulo_boton_guardar}}
        </button>
        <a :href="link_volver">
            <button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">
                {{titulo_boton_volver}}
            </button>
        </a>
        {{ $props.razon_social}}
        {{ $props.razon_social_valido}}
        {{ $props.razon_social_correcto}}
        {{ $props.obs_razon_social}}
        {{ $props.obs_razon_social_valido}}
        {{ $props.email}}
        {{ $props.email_valido}}
        {{ $props.email_correcto}}
        {{ $props.obs_email}}
        {{ $props.obs_email_valido}}
        {{ $props.cuit}}
        {{ $props.cuit_valido}}
        {{ $props.cuit_correcto}}
        {{ $props.obs_cuit}}
        {{ $props.obs_cuit_valido}}
        {{ $props.numeroproductor}}
        {{ $props.numeroproductor_valido}}
        {{ $props.numeroproductor_correcto}}
        {{ $props.obs_numeroproductor}}
        {{ $props.obs_numeroproductor_valido}}
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
export default {
    props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',

        'razon_social',
        'razon_social_valido',
        'razon_social_correcto',
        'obs_razon_social',
        'obs_razon_social_valido',
        'email',
        'email_valido',
        'email_correcto',
        'obs_email',
        'obs_email_valido',
        'cuit',
        'cuit_valido',
        'cuit_correcto',
        'obs_cuit',
        'obs_cuit_valido',
        'numeroproductor',
        'numeroproductor_valido',
        'numeroproductor_correcto',
        'obs_numeroproductor',
        'obs_numeroproductor_valido',
        'tiposociedad',
        'tiposociedad_valido',
        'tiposociedad_correcto',
        'obs_tiposociedad',
        'obs_tiposociedad_valido',
        'inscripciondgr',
        'inscripciondgr_valido',
        'inscripciondgr_correcto',
        'obs_inscripciondgr',
        'obs_inscripciondgr_valido',
        'constaciasociedad',
        'constaciasociedad_valido',
        'constaciasociedad_correcto',
        'obs_constaciasociedad',
        'obs_constaciasociedad_valido',

        'evaluacion',
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
          if(this.$props.evaluacion)
          {
            //Soy autoridad minera
            let self = this
            axios.post('/formularios/evaluacion_auto_guardado_uno', {
                    id: this.$props.id,
                    razon_social:this.$props.razonsocial,
                    razon_social_valido: this.$props.razon_social_valido,
                    razon_social_correcto: this.$props.razon_social_correcto,
                    obs_razon_social: this.$props.obs_razon_social,
                    obs_razon_social_valido: this.$props.obs_razon_social_valido,

                    email: this.$props.email,
                    email_valido: this.$props.email_valido,
                    email_correcto:  this.$props.email_correcto,
                    obs_email: this.$props.obs_email,
                    obs_email_valido: this.$props.obs_email_valido,

                    cuit: this.$props.cuit,
                    cuit_valido: this.$props.cuit_valido,
                    cuit_correcto:  this.$props.cuit_correcto,
                    obs_cuit: this.$props.obs_cuit,
                    obs_cuit_valido: this.$props.obs_cuit_valido,

                    numeroproductor: this.$props.numeroproductor,
                    numeroproductor_valido: this.$props.numeroproductor_valido,
                    numeroproductor_correcto: this.$props.numeroproductor_correcto,
                    obs_numeroproductor: this.$props.obs_numeroproductor,
                    obs_numeroproductor_valido: this.$props.obs_numeroproductor_valido,

                    tiposociedad: this.$props.tiposociedad,
                    tiposociedad_valido: this.$props.tiposociedad_valido, 
                    tiposociedad_correcto: this.$props.tiposociedad_correcto, 
                    obs_tiposociedad: this.$props.obs_tiposociedad, 
                    obs_tiposociedad_valido: this.$props.obs_tiposociedad_valido, 


                    inscripciondgr: this.$props.inscripciondgr,
                    inscripciondgr_valido:  this.$props.inscripciondgr_valido,
                    inscripciondgr_correcto:  this.$props.inscripciondgr_correcto,
                    obs_inscripciondgr: this.$props.obs_inscripciondgr,
                    obs_inscripciondgr_valido:  this.$props.obs_inscripciondgr_valido,

                    constaciasociedad: this.$props.constaciasociedad,
                    constaciasociedad_valido: this.$props.constaciasociedad_valido,
                    constaciasociedad_correcto: this.$props.constaciasociedad_correcto,
                    obs_constaciasociedad: this.$props.obs_constaciasociedad,
                    obs_constaciasociedad_valido: this.$props.obs_constaciasociedad_valido,

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
            
          }
          if(!this.$props.evaluacion)
          {
              //soy un productor

          }

      },
      cerrar_modal_datos_uno() {
				this.mostrar_modal_datos_ya_guardados = false
		},
  }
  
};
</script>
