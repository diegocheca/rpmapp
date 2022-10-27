<style scoped>
  body {
    background-color: #dfe4e9;
  }
  
  .stage {
    overflow: hidden;
    position: absolute;
    top: 35%;
    left: 15%;
    margin: -175px 0 0 -250px;
    width: 500px;
    height: 350px;
  }
  
  .factory {
    position: absolute;
    width: 100px;
    height: 200px;
    background: #e6c747;
    transform: translate(50px, 100px);
  }
  .factory::before {
    background: #c6a41b;
    border-radius: 1px;
    width: 110px;
    height: 10px;
    top: -10px;
    left: -5px;
  }
  .factory::after {
    width: 20px;
    height: 20px;
    top: 10px;
    left: 10px;
    border-radius: 50%;
    background-color: #c96160;
  }
  
  .magic {
    background: #b8e3f0;
    width: 40px;
    height: 45px;
    position: absolute;
    border-radius: 0 0 3px 3px;
    transform: translate(0, -60px);
  }
  .magic::before {
    background: #af9218;
    bottom: -5px;
    left: 20%;
    width: 60%;
    height: 5px;
  }
  .magic::after {
    background: #27af61;
    border-radius: 0 0 3px 3px;
    bottom: 3px;
    left: 3px;
    width: 34px;
    height: 70%;
    animation: upDown 9000ms linear infinite normal;
  }
  
  .screen {
    width: 60px;
    height: 50px;
    background-color: #415060;
    position: absolute;
    border-radius: 5px;
    border: 3px solid #fbf7e4;
    transform: translate(15px, 60px);
    overflow: hidden;
  }
  .screen::before, .screen::after {
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    box-shadow: inset 0 0 0 1px rgba(76, 215, 135, 0.2);
    background-color: rgba(76, 215, 135, 0.1);
    transform: translate(-100px, 0px);
    animation: moveRightPseudo 650ms linear infinite normal;
  }
  
  .band {
    position: absolute;
    width: 350px;
    height: 15px;
    background: #364451;
    border-radius: 8px;
    transform: translate(50px, 210px);
  }
  .band::before {
    background-image: radial-gradient(#4b5d6f 40%, rgba(0, 0, 0, 0) 41%);
    background-size: 15px 15px;
    background-position: 0px 0px;
    width: 90%;
    height: 15px;
    top: 0px;
    right: 5px;
    z-index: 2;
    animation: band 2150ms linear infinite normal;
  }
  .band::after {
    background: #4b5d6f;
    width: 79%;
    height: 75px;
    top: 15px;
    left: 57px;
    transform: skew(-15deg);
  }
  
  ul {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 420px;
    height: 140px;
    overflow: hidden;
    transform: translate(50px, 160px);
  }
  ul:after {
    background: #415060;
    border-radius: 50%;
    width: 60px;
    height: 5px;
    bottom: 0px;
    right: 20px;
    z-index: 0;
  }
  
  li {
    overflow: hidden;
    z-index: 1;
    position: absolute;
    width: 40px;
    height: 40px;
    background-color: #cf7473;
    transform: translate(0px, 10px);
    transform-origin: center bottom;
    animation-name: moveRight;
    animation-duration: 3000ms;
    animation-timing-function: linear;
    animation-direction: normal;
    animation-iteration-count: infinite;
  }
  li::after {
    dsplay: block;
    width: 25px;
    height: 7px;
    background-color: #c34e4d;
    top: 5px;
    left: 5px;
  }
  
  li:nth-child(1) {
    animation-delay: 0ms;
  }
  
  li:nth-child(2) {
    animation-delay: 600ms;
  }
  
  li:nth-child(3) {
    animation-delay: 1200ms;
  }
  
  li:nth-child(4) {
    animation-delay: 1800ms;
  }
  
  li:nth-child(5) {
    animation-delay: 2400ms;
  }
  
  .ps, .factory::before, .factory::after, .magic::before, .magic::after, .screen::before, .screen::after, .band::before, .band::after, ul:after, li::after {
    content: '';
    position: absolute;
  }
  
  @keyframes moveRight {
    0% {
      transform: translate(0px, 10px);
    }
    80% {
      transform: translate(325px, 10px);
    }
    90% {
      transform: translate(330px, 13px) rotateZ(90deg);
    }
    100% {
      transform: translate(340px, 110px) rotateZ(135deg);
    }
  }
  @keyframes moveRightPseudo {
    0% {
      transform: translate(-50px, 6px);
    }
    100% {
      transform: translate(60px, 6px);
    }
  }
  @keyframes upDown {
    0% {
      height: 70%;
    }
    70% {
      height: 5%;
    }
    100% {
      height: 70%;
    }
  }
  @keyframes band {
    0% {
      background-position: 0px 0px;
    }
    100% {
      background-position: 100% 0px;
    }
  }
  
  </style>
  <template>
    <app-layout>
     <div class="container px-6 mx-auto">
        <div
          class="flex flex-col text-center md:text-left md:flex-row h-screen justify-evenly md:items-center"
        >
          <div class="flex flex-col w-full">
            <div class="w-full md:w-6/6 lg:w-6/6 mx-auto md:mx-0">
                <div class='stage'>
                <ul>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                </ul>
                <div class='band'></div>
                <div class='factory'>
                  <div class='magic'></div>
                  <div class='screen'></div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full md:w-6/6 lg:w-6/6 mx-auto md:mx-0">
            <div class="bg-white p-10 flex flex-col w-full shadow-xl rounded-xl">
              <h2 class="text-2xl font-bold text-gray-800 text-left mb-5">
                Creating formularios alta prod faked
              </h2>
              <form action="" class="w-full">
                <div id="input" class="flex flex-col w-full my-5">
                  <label for="username" class="text-gray-500 mb-2"
                    >How many?</label
                  >
                  <input
                    type="number"
                    id="username"
                    placeholder="10"
                    class="appearance-none border-2 border-gray-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
                    v-model="cantidad"
                  />
                </div>
                <div id="input" class="flex flex-col w-full my-5">
                  <label for="username" class="text-gray-500 mb-2"
                    >Provincia</label
                  >
                  <select v-model="provincia_a_crear">
                    <option value="-1" selected>Cualquiera</option>
                    <option v-for="provincia in provincias" v-bind:key="provincia.id" :value="provincia.id">
                                        {{provincia.nombre}}
                                    </option>
                  </select>
                  
                </div>
                <div id="button" class="flex flex-col w-full my-5">
                  <button
                    type="button"
                    class="w-full py-4 bg-green-600 rounded-lg text-green-100"
                    @click="crear_formularios_fakers"
                  >
                    <div class="flex flex-row items-center justify-center">
                      <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                          </svg>

                      </div>
                      <div class="font-bold">Crear</div>
                    </div>
                  </button>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <h1 v-if="resultado==null">Sin Productores</h1>
      <div v-else class="grid grid-cols-3 gap-3">
        <div v-for="(productor, index) in resultado" :key="index">
          <cardProductor :productor="productor"/>
        </div>
      </div>
    </app-layout>
  </template>
  
  
  <script>
  import AppLayout from "@/Layouts/AppLayout";
  import JetDialogModal from '@/Jetstream/DialogModal';
  //import Button from '../../Jetstream/Button.vue';
  import Swal from "sweetalert2";
  import cardProductor from "@/Pages/CardDatosProductor/cardProductor";

  export default {
    props: {
      provincias: Object,
    },
    
    data() {
      return {
        confirmingUserDeletion:false,
        modal_tittle: 'este es el titulo',
        modal_body: 'este es el cuerpo',
      };
    },
    components: {
      AppLayout,
      JetDialogModal,
      //Button,
      cardProductor
    },

    
    data() {
    return {
      provincia_a_crear:null,
      cantidad: 0,
      resultado:{}
    };
  },

    methods: {
      closeModal() {
          this.confirmingUserDeletion = false
          //this.form.reset()
      },
      


      crear_formularios_fakers() {
      let self = this;
      axios
        .post("formulario_faker/crear", {
          provincia: this.provincia_a_crear,
          cantidad: this.cantidad
        })
        .then(function (response) {
          // console.log(response.data);
          if (response.data.status === "success") {
            Swal.fire(
              "Datos guardados correctamente.",
              "Gracias por usar este servicio, por favor continue completando el formulario.",
              "success"
            );
            self.resultado=response.data.formularios;
          } else {
            Swal.fire("Error", "Error inesperado.", "error");
          }
        })
        .catch(function (error) {
          // handle error
          Swal.fire("Error", "Error inesperado. <br/>" + error, "error");
          console.log(error);
        });
      },



    }
  };
  </script>