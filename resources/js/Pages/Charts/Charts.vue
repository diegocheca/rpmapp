<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gráficos
            </h2>
        </template>

        <main class="p-4 md:p-14 bg-gray-100 dark:bg-gray-800 md:space-x-4 space-y-4">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full p-6 " x-data="{open: false}">
                <div class="flex items-center relative">
                    <div class="flex flex-row flex-wrap items-center space-x-2 space-y-2  w-11/12">
                        <div class="text-xl text-gray-600 leading-7 font-semibold">Filtros:</div>
                        <!-- provinces -->
                        <span  v-for="(item, index) in filterReports.provinces" :key="index"  class="text-xs px-2 py-0.5 rounded-full bg-purple-600 text-gray-100 text-white flex">
                            {{item}}
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="deleteProvince(item)">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg> -->
                        </span>
                        <!-- year -->
                        <span class="text-xs px-2 py-0.5 rounded-full bg-purple-600 text-gray-100 text-white flex">
                            {{filterReports.year}}
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" @click="alert('eliminar badge')">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg> -->
                        </span>
                    </div>
                    <!-- Button for opening card -->
                    <div class="ml-4 absolute inset-y-0 right-0">
                        <div @click="open = !open;" class="flex items-center cursor-pointer px-3 py-2 text-gray-600 hover:text-gray-800" :class="{'transform rotate-180': open}">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        </div>
                    </div>
                </div>
                <!-- Collapsed content -->
                <!-- <div class="w-full flex flex-col mt-8" :class="{'hidden': !open}">
                <hr class="mb-4 border-gray-700">
                <p>Wikipedia is a multilingual open-collaborative online encyclopedia created and maintained by a community of volunteer editors using a wiki-based editing system. It is one of the 15 most popular websites as ranked by Alexa, as of August 2020. </p>  
                <ul class="list-disc ml-4 mt-2">
                    <li>Featuring no ads, it is hosted by the Wikimedia Foundation, an American non-profit organization funded primarily through donations.</li>
                    <li>Wikipedia was launched on January 15, 2001, by Jimmy Wales and Larry Sanger.</li> 
                    <li>It was initially an English-language encyclopedia, but versions in other languages were quickly developed.</li> 
                    <li>With 6.2 million articles, the English Wikipedia is the largest of the more than 300 Wikipedia encyclopedias.</li>
                </ul>
                </div> -->
                <div class="flex flex-col divide-y-2 pt-7 space-y-4" :class="{'hidden': !open}">
                    <div>
                        <div class="text-sm text-gray-600 leading-7 font-semibold">Provincias:</div>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 p-4" >
                            <label  v-for="(item, index) in provincesList" :key="index" :for="item.value" class="flex items-center">
                                <input type="checkbox" name="provincesSelected" checked="true" :id="item.value" v-model="item.selected" @change="handleProvince(item)" />
                                <span class="ml-2 text-sm">{{item.label}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-row pt-7 space-x-2">
                        <label for="" class="text-sm text-gray-600 leading-7 font-semibold">
                            Año de reporte
                            <input type="number" min="2019" max="2099" step="1" v-model="filterReports.year" class="rounded-md text-grey-darkest" >
                        </label>
                    </div>
                </div>
            </div>


            <!-- <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full p-6 divide-y">
                <div class="ml-8 mt-8 text-xl text-gray-600 leading-7 font-semibold">Filtros</div>
                <div class="grid grid-cols-5 gap-4 p-4">
                    <label  v-for="(item, index) in provincesList" :key="index" :for="item.value" class="flex items-center">
                        <input type="checkbox" name="provincesSelected" :id="item.value" :value="item.value" />
                        <span class="ml-2 text-sm">{{item.label}}</span>
                    </label>
                </div>
            </div> -->
            <!-- <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="md:w-1/2 shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartPie :dataChart="soldIn" />
                </div>
                <div class="md:w-1/2 shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartPie :dataChart="reinscriptionPersons" />
                </div>
            </div> -->

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartMapMorphingPie :dataChart="mapPie" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartPie :dataChart="soldIn" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartPie :dataChart="reinscriptionPersons" />
                </div>
            </div>
            <div v-for="(item, index) in mineralPrice" :key="index" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartBar :dataChart="item" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <ChartSimplePie :dataChart="item" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full ">
                    <Line />
                </div>
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
    import Line from '@/Components/charts/line'
    import ChartSimplePie from '@/Components/charts/simplePie'
    import ChartMapMorphingPie from '@/Components/charts/mapMorphingPie'
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
            ChartSimplePie,
            Line,
            ChartMapMorphingPie
        },
        props: {
            soldIn: {
                type: Object,
                required: true
            },
            mapPie: {
                type: Object,
                required: true
            },
            mineralPrice: {
                type: Array,
                required: true
            },
            reinscriptionPersons: {
                type: Object,
                required: true
            },
            provincesList: {
                type: Array,
                required: true
            },
        },
        data() {
            const filterReports = {
                provinces: [],
                year: new Date().getFullYear()
            };

            return {
                open: true,
                chartShow: false,
                nuevas_reinscripciones:'',
                filterReports
            }
        },
        methods: {
            toggle() {
                this.chartShow = !this.chartShow
            },
            handleProvince(item) {
               const indexProvince = this.filterReports.provinces.findIndex(e => e == item.label);
                if(indexProvince == -1) {
                    this.filterReports.provinces.push(item.label);
                } else {
                    this.filterReports.provinces.splice(indexProvince, 1);
                }
            },
            deleteProvince(item) {
                const indexProvince = this.filterReports.provinces.findIndex(e => e == item);
                this.filterReports.provinces.splice(indexProvince, 1);
            }
            // buscar_nuevas_reincripciones(){
            //     let self = this;
            //     axios.get('/numero_reinscripciones_nuevas')
            //     .then(function (response) {
            //         if(response.data.status === "ok")
            //             self.nuevas_reinscripciones = response.data.nuevas_inscripciones;
            //         else self.nuevas_reinscripciones = 0;
            //         console.log(response.data.msg);
            //     })
            //     .catch(function (error) {
            //         // handle error
            //         console.log(error);
            //     })
            // }
        },
        mounted() {
            this.filterReports.provinces = this.provincesList.map(e => e.label);
        }
    }
</script>
