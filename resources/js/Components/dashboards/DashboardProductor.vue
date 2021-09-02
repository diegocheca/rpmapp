<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <main class=" mx-auto p-4 md:w-3/4 px-4 py-4">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
                <div class="flex justify-center w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 " :class="[ porcentajeInscripcion == 100? 'border-green-400' : 'border-indigo-400' ]">
                    <!-- sin inscripciones -->
                    <!-- <a :href="'#'" class="cursor-pointer">
                        <div class="w-full flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-2xl">No hay inscripciones</p>
                            <p class="text-2xl">¡Agrega una nueva!</p>


                        </div>
                    </a> -->
                    <!-- porcentaje inscripcion -->
                    <div class="flex-col my-auto">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter1"
                            :startAmount="0"
                            :endAmount="porcentajeInscripcion"
                            :duration="3"
                            prefix=""
                            suffix="%"
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">porcentaje de aprobación de la última inscripción</div>
                    </div>
                </div>
                <div class="flex justify-center content-center w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2" :class="[ porcentajeReinscripcion == 100? 'border-green-400' : 'border-indigo-400' ]">
                    <!-- sin reinscripciones -->
                    <a :href="route('reinscripciones.create')" class="cursor-pointer">
                        <div class="w-full flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-2xl">No hay reinscripciones</p>
                            <p class="text-2xl">¡Agrega una nueva!</p>


                        </div>
                    </a>
                    <!-- porcentaje inscripcion -->
                    <!-- <div class="flex-col my-auto">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter1"
                            :startAmount="0"
                            :endAmount="porcentajeReinscripcion"
                            :duration="3"
                            prefix=""
                            suffix="%"
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">porcentaje de aprobación de la última reinscripción</div>
                    </div> -->
                </div>
            </div>
            <div class="flex flex-col my-10 px-8 shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 border-indigo-400">
                <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">Mis Minerales</div>
                <Carousel :itemsToShow="3.95" :wrapAround="true" :breakpoints="breakpoints">
                    <Slide v-for="(slide, index) in slideMinerals" :key="slide">
                        <div class="carousel__item bg-indigo-600 rounded-md">
                            <img :src="slide" alt="">
                            <p class="text-white">Mineral {{ index + 1 }}</p>
                        </div>
                    </Slide>

                    <template #addons>
                        <navigation />
                        <pagination />
                    </template>
                </Carousel>

            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
                <div class=" flex flex-col w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 border-indigo-400 ">

                    <p class="font-bold text-md p-4 text-black dark:text-white">
                        Mis inscripciones
                        <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">
                            ({{ inscriptions.length }})
                            <div class="tab__header float-right text-indigo-600">
                                <a href="#"  @click.prevent="activeInscripcion = !activeInscripcion">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div class="tab__content p-2 bg-indigo-100 rounded-lg" v-show="activeInscripcion"><slot />
                                Puedes seleccionar cualquier inscripción para ver los datos de la misma
                                <br>
                                Referencias:
                                <ul class="mt-2">
                                    <li class="text-green-500 inline-flex">
                                        <svg  width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="mx-3">
                                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                            </path>
                                        </svg>Aprobado
                                    </li>
                                    <li class="text-red-500 inline-flex">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="mx-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>Rechazado
                                    </li>
                                    <li class="text-yellow-500 inline-flex">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="mx-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                            <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                        </svg>En proceso de revisión
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </p>
                    <ul>
                        <li v-for="(ins, index) in inscriptions" :key="index" class="">
                            <a href="#" class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800 cursor-pointer">
                                <div class="flex items-center justify-start text-sm">
                                    <span class="mx-4">
                                        {{ index + 1 }}
                                    </span>
                                    <span>
                                        {{ ins.name }} {{ index + 1 }}
                                    </span>
                                </div>
                                <svg v-if="ins.status == 'aprobado'" width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                    </path>
                                </svg>
                                <svg v-if="ins.status == 'rechazado'" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="text-red-500 mx-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <svg v-if="ins.status == 'pendiente'" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 mx-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                    <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="flex flex-col items-center my-12">
                        <div class="flex text-gray-700">
                            <div class="h-8 w-8 mr-1 flex justify-center items-center  cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </div>
                            <div class="flex h-8 font-medium ">
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-indigo-600">1</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">2</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">3</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">...</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">13</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">14</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">15</div>
                                <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in border-t-2 border-orange-600">2</div>
                            </div>
                            <div class="h-8 w-8 ml-1 flex justify-center items-center  cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" flex flex-col w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 border-indigo-400 ">
                    <p class="font-bold text-md p-4 text-black dark:text-white">
                        Mis reinscripciones
                        <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">
                            ({{ reinscriptions.length }})
                            <div class="tab__header float-right text-indigo-600">
                                <a href="#"  @click.prevent="activeReinscripcion = !activeReinscripcion">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div class="tab__content p-2 bg-indigo-100 rounded-lg" v-show="activeReinscripcion"><slot />
                                Puedes seleccionar cualquier reinscripción para ver los datos de la misma
                                <br>
                                Referencias:
                                <ul>
                                    <li class="text-green-500 inline-flex">
                                        <svg  width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="mx-4">
                                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                            </path>
                                        </svg> Aprobado
                                    </li>
                                    <li class="text-red-500 inline-flex">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="mx-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg> Rechazado
                                    </li>
                                    <li class="text-yellow-500 inline-flex">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="mx-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                            <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                        </svg> En proceso de revisión
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </p>
                    <ul>
                        <li v-for="(reins, index) in reinscriptions" :key="index" class="">
                            <a href="#" class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800 cursor-pointer">
                                <div class="flex items-center justify-start text-sm">
                                    <span class="mx-4">
                                        {{ index + 1 }}
                                    </span>
                                    <span>
                                        {{ reins.name }} {{ index + 1 }}
                                    </span>
                                </div>
                                <svg v-if="reins.status == 'aprobado'" width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                    </path>
                                </svg>
                                <svg v-if="reins.status == 'rechazado'" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="text-red-500 mx-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <svg v-if="reins.status == 'pendiente'" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 mx-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                    <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="flex flex-col items-center my-12">
                        <div class="flex text-gray-700">
                            <div class="h-8 w-8 mr-1 flex justify-center items-center  cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </div>
                            <div class="flex h-8 font-medium ">
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-indigo-600">1</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">2</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">3</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">...</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">13</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">14</div>
                                <div class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  border-t-2 border-transparent">15</div>
                                <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in border-t-2 border-orange-600">2</div>
                            </div>
                            <div class="h-8 w-8 ml-1 flex justify-center items-center  cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </AppLayout>
</template>
<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AppProductorLayout from '@/Layouts/AppProductorLayout'
    import AppLayout from '@/Layouts/AppLayout'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import Vue3autocounter from "vue3-autocounter";

    import 'vue3-carousel/dist/carousel.css';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

    export default {
        components: {
            JetApplicationLogo,
            AppProductorLayout,
            JetAuthenticationCardLogo,
            Vue3autocounter,

            Carousel,
            Slide,
            Pagination,
            Navigation,
            AppLayout
        },
        data() {
            return {
                activeInscripcion: false,
                activeReinscripcion: false,
                chartShow: false,
                porcentajeInscripcion: 100,
                porcentajeReinscripcion: 47,
                inscriptions: [
                    {
                        id: "1",
                        name: "incripción",
                        status: "aprobado"
                    },
                    {
                        id: "2",
                        name: "incripción",
                        status: "aprobado"
                    },
                    {
                        id: "3",
                        name: "incripción",
                        status: "aprobado"
                    },
                    {
                        id: "4",
                        name: "incripción",
                        status: "aprobado"
                    },{
                        id: "5",
                        name: "incripción",
                        status: "aprobado"
                    },
                    {
                        id: "6",
                        name: "incripción",
                        status: "pendiente"
                    },
                    {
                        id: "7",
                        name: "incripción",
                        status: "rechazado"
                    },
                ],
                reinscriptions: [
                    {
                        id: "1",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "2",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "3",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "4",
                        name: "reincripción",
                        status: "aprobado"
                    },{
                        id: "5",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "6",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "7",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "8",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "9",
                        name: "reincripción",
                        status: "aprobado"
                    },
                    {
                        id: "10",
                        name: "reincripción",
                        status: "pendiente"
                    },
                    {
                        id: "11",
                        name: "reincripción",
                        status: "rechazado"
                    },
                ],
                slideMinerals: [
                    "http://localhost:8000/minerales/thumbs/1171.png",
                    "http://localhost:8000/minerales/thumbs/1132.png",
                    "http://localhost:8000/minerales/thumbs/1104.png",
                    "http://localhost:8000/minerales/thumbs/1171.png",
                    "http://localhost:8000/minerales/thumbs/1132.png",
                    "http://localhost:8000/minerales/thumbs/1104.png",
                    "http://localhost:8000/minerales/thumbs/1171.png",
                    "http://localhost:8000/minerales/thumbs/1132.png",
                    "http://localhost:8000/minerales/thumbs/1104.png",
                ],
                breakpoints: {
                    // 360 and up
                    360: {
                        itemsToShow: 2.95,
                        snapAlign: 'center',
                    },
                    // 640 and up
                    640: {
                        itemsToShow: 2.95,
                        snapAlign: 'center',
                    },
                    // 768 and up
                    768: {
                        itemsToShow: 3.95,
                        snapAlign: 'center',
                    },
                    // 1024 and up
                    1024: {
                        itemsToShow: 5.95,
                        snapAlign: 'center',
                    },
                },
            }
        },
        methods: {
            toggle() {
                this.chartShow = !this.chartShow
            }
        },
    }
</script>
<style scoped>
.carousel__slide {
    padding: 10px;
}
.carousel__slide > .carousel__item {
  transform: scale(1);
  opacity: 0.5;
  transition: 0.5s;
}
.carousel__slide--visible > .carousel__item {
  opacity: 1;
  transform: rotateY(0);
}
.carousel__slide--next > .carousel__item {
  transform: scale(0.9) translate(-10px);
}
.carousel__slide--prev > .carousel__item {
  transform: scale(0.9) translate(10px);
}
.carousel__slide--active > .carousel__item {
  transform: scale(1.1);
}
</style>
