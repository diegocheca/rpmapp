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
                    class=" animate-pulse text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700"
                    @click="guardar_avnces_uno"
                >
                    {{titulo_boton_guardar}}
                </button>
            </div>

        </div>
        <div v-if="$props.testing">

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

            <br>
            valor dgr: {{ $props.inscripciondgr}}
            
            --corrlor dgr{{ $props.inscripciondgr_correcto}}
            --dgr_obs:{{ $props.obs_inscripciondgr}}
            <br>
            valor cons:{{ $props.constaciasociedad}}
            -- corr cons:{{ $props.constanciasociedad_correcto}}
            --cons_obs:{{ $props.obs_constanciasociedad}}
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
        'obs_inscripciondgr_valida',

        'constaciasociedad',
        'constanciasociedad_valido',
        'constanciasociedad_correcto',
        'obs_constanciasociedad',
        'obs_constanciasociedad_valido',

        'evaluacion',
        'id',
        'testing'

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
       mandar_id_al_padre(id){
        this.$emit('CreeUnNuevoId',id);


    },
    actualizar_inscripcion_nueva(pathnueva){
        console.log("actualizando la inscripcion");
        this.$emit('actualizarinscripcion',pathnueva);


    },
    actualizar_cosntancia_nueva(pathnueva){
        this.$emit('actualizaconstancia',pathnueva);


    },

    guardar_avnces_uno(){
        //alert("el id q mando es:"+this.$props.evaluacion);

        // if(this.$props.evaluacion)
        // {
            //Soy autoridad minera
            let self = this;
            const data = new FormData();
            data.append('id', this.$props.id);
            data.append('razon_social', this.$props.razon_social);
            data.append('razon_social_valido',  this.$props.razon_social_valido);
            data.append('razon_social_correcto',  this.$props.razon_social_correcto);
            data.append('obs_razon_social',  this.$props.obs_razon_social);
            data.append('obs_razon_social_valido',  this.$props.obs_razon_social_valido);
            data.append('email',  this.$props.email);
            data.append('email_valido',  this.$props.email_valido);
            data.append('email_correcto',   this.$props.email_correcto);
            data.append('obs_email',  this.$props.obs_email);
            data.append('obs_email_valido',  this.$props.obs_email_valido);
            data.append('cuit',  this.$props.cuit);
            data.append('cuit_valido',  this.$props.cuit_valido);
            data.append('cuit_correcto',   this.$props.cuit_correcto);
            data.append('obs_cuit',  this.$props.obs_cuit);
            data.append('obs_cuit_valido',  this.$props.obs_cuit_valido);
            data.append('numeroproductor',  this.$props.numeroproductor);
            data.append('numeroproductor_valido',  this.$props.numeroproductor_valido);
            data.append('numeroproductor_correcto',  this.$props.numeroproductor_correcto);
            data.append('obs_numeroproductor',  this.$props.obs_numeroproductor);
            data.append('obs_numeroproductor_valido',  this.$props.obs_numeroproductor_valido);
            data.append('tiposociedad',  this.$props.tiposociedad);
            data.append('tiposociedad_valido',  this.$props.tiposociedad_valido,);
            data.append('tiposociedad_correcto',  this.$props.tiposociedad_correcto,);
            data.append('obs_tiposociedad',  this.$props.obs_tiposociedad,);
            data.append('obs_tiposociedad_valido',  this.$props.obs_tiposociedad_valido,);
            data.append('inscripciondgr',  this.$props.inscripciondgr);
            data.append('inscripciondgr_valido',   this.$props.inscripciondgr_valido);
            data.append('inscripciondgr_correcto',   this.$props.inscripciondgr_correcto);
            data.append('obs_inscripciondgr',  this.$props.obs_inscripciondgr);
            data.append('obs_inscripciondgr_valido', this.$props.obs_inscripciondgr_valido);
            data.append('constaciasociedad',  this.$props.constaciasociedad);
            data.append('constaciasociedad_valido',  this.$props.constanciasociedad_valido);
            data.append('constaciasociedad_correcto',  this.$props.constanciasociedad_correcto);
            data.append('obs_constaciasociedad',  this.$props.obs_constanciasociedad);
            data.append('obs_constaciasociedad_valido',  this.$props.obs_constanciasociedad_valido);
            data.append('valor_de_progreso',  20);
            data.append('valor_de_aprobado',  20);
            data.append('valor_de_reprobado',  20);
            data.append('es_evaluacion', this.$props.evaluacion);
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post('/formularios/evaluacion_auto_guardado_uno', data)
                .then(function (response) {
                    console.log(response.data.msg);
                    if(response.data.msg === "Datos actualizados correctamente.")
                    {
                        console.log('todo bien');
                        self.modal_tittle = 'Datos guardados correctamente como Autoridad';
                        self.modal_body = 'Recien hemos guardados los datos del productor de manera correcta, siendo Autoridad, gracias por usar este servcio, por favor continue llenando el formulario';
                        self.mostrar_modal_datos_ya_guardados = true;
                        console.log(response.data.path_inscripcion);
                        console.log(response.data.path_constaciasociedad);
                        if(response.data.path_inscripcion !== '')
                            self.actualizar_inscripcion_nueva(response.data.path_inscripcion);
                        if(response.data.path_constaciasociedad !== '')
                            self.actualizar_cosntancia_nueva(response.data.path_constaciasociedad);

                    }
                    
                    if(response.data === "se actualizaron los datos correctamente")
                    {
                        console.log('todo bien');
                        self.modal_tittle = 'Datos guardados correctamente como Autoridad';
                        self.modal_body = 'Recien hemos guardados los datos del productor de manera correcta, siendo Autoridad, gracias por usar este servcio, por favor continue llenando el formulario';
                        self.mostrar_modal_datos_ya_guardados = true;
                    }
                    
                    if(response.data === "se actualizaron los datos correctamente, siendo un productor")
                    {
                        console.log('todo mal, no se encontro');
                        self.modal_tittle = 'Paso 1 Guardado Correctamente como Prod';
                        self.modal_body = 'Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias';
                        self.mostrar_modal_datos_ya_guardados = true;
                    }
                    if(!isNaN(response.data))
                    {
                        console.log('todo bien, se creo el productor');
                        self.modal_tittle = 'Se creo el nuevo Productor';
                        self.modal_body = 'Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias. su id es:'+response.data;
                        self.mostrar_modal_datos_ya_guardados = true;
                        self.mandar_id_al_padre(response.data);
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
            
        //   }
        // if(!this.$props.evaluacion)
        // {
        //       //soy un productor

        // }

    },
    cerrar_modal_datos_uno() {
				this.mostrar_modal_datos_ya_guardados = false
		},
   
  }
  
};
</script>
