<template>
    <AppLayout class="bg-gray-100 dark:bg-gray-800">

        <main class=" mx-auto p-4 md:w-3/4 px-4 py-4">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">

                    <div class="flex justify-center w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 border-indigo-400">
                        <a :href="'#'" class="cursor-pointer">
                            <div class="w-full flex flex-col items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-2xl">No hay inscripciones</p>
                                <p class="text-2xl">¡Agrega una nueva!</p>


                            </div>
                        </a>
                        <div class="flex-col my-auto">
                            <!-- <vue3-autocounter
                                class="text-4xl count-number"
                                ref="counter1"
                                :startAmount="0"
                                :endAmount="17"
                                :duration="3"
                                prefix=""
                                suffix="%"
                                separator=""
                                decimalSeparator=""
                                :decimals="0"
                                :autoinit="true"
                            />
                            <div class="">porcentaje de aprobación de la última inscripción</div> -->

                        </div>
                    </div>
                    <div class="flex justify-center content-center w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-2 border-indigo-400">
                        <a :href="route('reinscripciones.create')" class="cursor-pointer">
                            <div class="w-full flex flex-col items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-2xl">No hay reinscripciones</p>
                                <p class="text-2xl">¡Agrega una nueva!</p>


                            </div>
                        </a>
                        <!-- <div class="flex-col my-auto">
                            <vue3-autocounter
                                class="text-4xl count-number"
                                ref="counter1"
                                :startAmount="0"
                                :endAmount="79"
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
        </main>

    </AppLayout>
</template>
<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AppLayout from '@/Layouts/AppLayout'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import Vue3autocounter from "vue3-autocounter";

    import 'vue3-carousel/dist/carousel.css';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

    export default {
        components: {
            JetApplicationLogo,
            AppLayout,
            JetAuthenticationCardLogo,
            Vue3autocounter,

            Carousel,
            Slide,
            Pagination,
            Navigation
        },
        data() {
            return {
                chartShow: false,
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
