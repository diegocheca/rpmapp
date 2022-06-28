<style>
      .invalid-feedback,
      .empty-feedback {
        display: none;
      }

      .was-validated :placeholder-shown:invalid ~ .empty-feedback {
        display: block;
      }

      .was-validated :not(:placeholder-shown):invalid ~ .invalid-feedback {
        display: block;
      }

      .is-invalid,
      .was-validated :invalid {
        border-color: #dc3545;
      }

      .is-invalid,
      .was-validated :invalid:focus {
    --tw-ring-color: rgba(220, 53, 69, 0.2);
}

.slide-fade-enter-active {
  transition: all 0.7s ease-out;
}

.slide-fade-leave-active {
  transition: all 1.0s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}


    </style>
<template>
    <div  id="eee"> 
        <Transition name="slide-fade">
            <div
            id="w3f__widget--content"
            v-show="open"
            
            class="fixed flex flex-col z-50 bottom-[100px] top-0 right-0 h-auto left-0 sm:top-auto sm:right-5 sm:left-auto h-[calc(100%-95px)] w-full sm:w-[350px] overflow-auto min-h-[250px] sm:h-[600px] border border-gray-300 bg-white shadow-2xl rounded-md"
            >
                <div class="flex p-5 flex-col justify-center items-center h-32 bg-indigo-600">
                    <h3 class="text-lg text-white">Como podemos ayudarte?</h3>
                    <p class="text-white opacity-50">Usualmente respondemos en minutos</p>
                </div>
                <div class="bg-gray-50 flex-grow p-6"> 
                    
                        <div class="mb-4">
                            <label
                            for="full_name"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
                            >Nombre Completo</label
                            >
                            <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            id="full_name"
                            placeholder="John Doe"
                            required
                            class="w-full px-3 py-2 bg-white placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            />
                            <div
                            class="empty-feedback invalid-feedback text-red-400 text-sm mt-1"
                            >
                            Por favor, ingresa su nombre
                            </div>
                        </div>
                        
                        

                    
                        <div class="mb-4">
                            <label
                            for="email"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
                            >Email Address</label
                            >
                            <input
                            type="email"
                            name="email"
                            id="email"
                            v-model="form.email"
                            placeholder="you@company.com"
                            required
                            class="w-full px-3 py-2 bg-white placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            />
                            <div class="empty-feedback text-red-400 text-sm mt-1">
                            Por favor ingrese su dirección email.
                            </div>
                            <div class="invalid-feedback text-red-400 text-sm mt-1">
                            Por favor, ingrese una dirección de email valida.
                            </div>
                        </div>
                
                        
                        <div class="mb-4">
                        <label
                            for="message"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
                            >Ingrese su mensaje</label
                        >

                        <textarea
                            rows="4"
                            name="message"
                            id="message"
                            v-model="form.message"
                            placeholder="Tu mensaje"
                            class="w-full h-28 px-3 py-2 bg-white placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            required
                        ></textarea>
                        <div
                            class="empty-feedback invalid-feedback text-red-400 text-sm mt-1"
                        >
                            Por favor ingrese su mensaje.
                        </div>
                        </div>
                        <div class="mb-4">
                        <label
                            for="message"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-400"
                            >Puede adjuntar un archivo</label
                        >
                        <input
                            type="file"
                            name="file_admin"
                            id="file_admin"
                            class="w-full px-3 py-2 bg-white placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            />
                        </div>
                        <div class="mb-3">
                        <button
                            @click="validate_inputs()"
                            class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none"
                        >
                            Enviar
                        </button>
                        </div>
                </div>
            </div>
        </Transition>
        <button
        id="w3f__widget--btn"
        @click="open = !open"
        class="fixed z-40 right-5 bottom-5 shadow-lg flex justify-center items-center w-14 h-14 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 transition duration-300 ease"
        >
            <svg
                class="w-6 h-6 text-white absolute"
                v-if="!open"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path
                d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                ></path>
            </svg>

            <svg
                v-else
                class="w-6 h-6 text-white absolute"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

    </div>
</template>



<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
  // props: {
  //   errors: Object,
  // },
  data() {
    return {
      open:false,
      form: {
        name: '',
        email: '',
        message: '',
        file: ''
      }
    };
  },
  methods: {
    submit_form() {
        const data = new FormData();
        data.append("name", this.form.name);
        data.append("email", this.form.email);
        data.append("message", this.form.message);
        data.append("file", this.form.file);

        axios.defaults.headers.post["Content-Type"] = "multipart/form-data";
        axios
          .post("/tickets/store", data)
          .then(function (response) {
            console.log(response.data);
            if (response.data.status === "success") {
              /* Swal.fire(
                "Datos del Expediente guardados correctamente.",
                "Gracias por usar este servicio, seran notificadas las partes.",
                "success"
              ).then((result) => {
                //redireccionar a listado de expdientes con inertia link
                self.$inertia.visit(route('expedientes.index'), { method: 'get' });
              }); */
              alert("todo bien");
            }
            else {
              //Swal.fire("Error", "Error inesperado.", "error");
              alert("mal");
            }
          })
          .catch(function (error) {
            // handle error
            //Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
            console.log(error);
          });
      //borro formulario
        this.form.name = '';
        this.form.email = '';
        this.form.message = '';
        this.form.file = '';
        //cierro modal
        this.open = false;
    },
    validate_inputs(){
        let errors = '';
        if(this.form.name === null )
            errors+="\n El nombre no puede ser vacio ";
        if(  this.form.name.length < 3 || this.form.name.length > 30 )
            errors+="\n El nombre tiene una longitud incorrecta ";
        if(this.form.email === null)
            errors+="\n El email no puede ser vacio ";
        if( this.form.email.length < 3 || this.form.email.length > 50 )
            errors+="\n Email con longitud incrrecta ";
        if(this.form.message === null)
            errors+="\n El mensaje no puede ser vacio ";
        if (this.form.message.length < 3 || this.form.message.length > 250 )
            errors+="\n Mensaje con longitud incrrecta ";
        if(errors === '') {
            this.submit_form();
        } else {
            alert("Por favor arregle estos errores:" + errors);
        }
    }
  },
};
</script>