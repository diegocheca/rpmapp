<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <main class="p-4 md:p-14 bg-gray-100 dark:bg-gray-800 md:space-x-4 space-y-4">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                 <div class="grid grid-cols-12 gap-2">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Nuevas inscripciones</div>
                        <vue3-autocounter
                            class="font-bold text-lg"
                            ref="counter1"
                            :startAmount="0"
                            :endAmount="17"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Nuevas reinscripciones</div>
                        <vue3-autocounter
                            class="font-bold text-lg"
                            ref="counter1"
                            :startAmount="0"
                            :endAmount="33"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Inscripciones pendientes</div>
                        <div class="flex flex-row">
                            <vue3-autocounter
                                class="font-bold text-lg"
                                ref="counter1"
                                :startAmount="0"
                                :endAmount="51"
                                :duration="3"
                                prefix=""
                                suffix=""
                                separator=""
                                decimalSeparator=""
                                :decimals="0"
                                :autoinit="true"
                            />
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-5 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Reinscripciones pendientes</div>
                        <div class="flex flex-row">
                            <vue3-autocounter
                                class="font-bold text-lg"
                                ref="counter1"
                                :startAmount="0"
                                :endAmount="101"
                                :duration="3"
                                prefix=""
                                suffix=""
                                separator=""
                                decimalSeparator=""
                                :decimals="0"
                                :autoinit="true"
                            />
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-5 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
                <div class=" md:w-1/4 space-y-4">

                    <div class="w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-l-8 border-indigo-400">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter1"
                            :startAmount="0"
                            :endAmount="17"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">productores mineros</div>
                    </div>
                    <div class="w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-l-8 border-indigo-400">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter2"
                            :startAmount="0"
                            :endAmount="250"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">productores mineros</div>
                    </div>
                    <div class="w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-l-8 border-indigo-400">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter3"
                            :startAmount="0"
                            :endAmount="22"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">productores mineros</div>
                    </div>
                    <div class="w-full shadow-lg rounded-2xl p-3 bg-white dark:bg-gray-700 border-l-8 border-indigo-400">
                        <vue3-autocounter
                            class="text-4xl count-number"
                            ref="counter4"
                            :startAmount="0"
                            :endAmount="65"
                            :duration="3"
                            prefix=""
                            suffix=""
                            separator=""
                            decimalSeparator=""
                            :decimals="0"
                            :autoinit="true"
                        />
                        <div class="">productores mineros</div>
                    </div>
                </div>
                <div class="md:w-3/4 shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartPie />
                </div>
            </div>

            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <!-- <div class="flex items-center justify-center ">
                    <input type="checkbox" name="toggle" class="hidden" />
                    <label
                        class="relative w-12 h-6 flex cursor-pointer"
                        for="toggle"
                    >
                        <span
                        class="absolute left-0 top-0 h-full w-full bg-gray-100 rounded-full bg-gray-100"
                        ></span>
                        <span
                        class="h-6 w-6 border-2 absolute z-10 rounded-full bg-white transition-transform duration-300 ease-in-out flex justify-center items-center border-gray-100"
                        ></span>
                    </label>
                </div> -->
                <div class="flex flex-row space-x-4 justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>

                    <div
                        class="w-14 h-8 flex items-center bg-gray-300 rounded-full p-1 duration-300 cursor-pointer"
                        :class="{ 'bg-green-500': chartShow }"
                        :aria-checked="chartShow.toString()"
                        @click="toggle"
                    >
                        <div
                            class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300"
                            :class="{ 'translate-x-6': chartShow }"
                        ></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>


                </div>
                <ChartBar v-if="!chartShow"/>
                <ChartMap v-else/>
            </div>

        </main>

    </AppLayout>
</template>
<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import ChartPie from '@/Components/charts/pie'
    import ChartBar from '@/Components/charts/bar'
    import ChartMap from '@/Components/charts/map'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import Vue3autocounter from "vue3-autocounter";

    export default {
        components: {
            JetApplicationLogo,
            AppLayout,
            Welcome,
            ChartPie,
            ChartBar,
            ChartMap,
            JetAuthenticationCardLogo,
            Vue3autocounter,
        },
        data() {
            return {
                chartShow: false
            }
        },
        methods: {
            toggle() {
                this.chartShow = !this.chartShow
            }
        },
    }
</script>
