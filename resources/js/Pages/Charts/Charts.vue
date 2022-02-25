<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gráficos
            </h2>
        </template>

        <main class="p-4 md:p-14 bg-gray-100 md:space-x-4 space-y-4">
            <!-- <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="md:w-1/2 shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartPie :dataChart="soldIn" />
                </div>
                <div class="md:w-1/2 shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartPie :dataChart="reinscriptionPersons" />
                </div>
            </div> -->
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartPie :dataChart="soldIn" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartPie :dataChart="reinscriptionPersons" />
                </div>
            </div>
            <div v-for="(item, index) in mineralPrice" :key="index" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartBar :dataChart="item" />
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartSimplePie />
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <Line />
                </div>
            </div>


            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="shadow-lg rounded-2xl p-4 bg-white w-full ">
                    <ChartMapMorphingPie />
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
            mineralPrice: {
                type: Array,
                required: true
            },
            reinscriptionPersons: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                chartShow: false,
                nuevas_reinscripciones:'',
            }
        },
        methods: {
            toggle() {
                this.chartShow = !this.chartShow
            },
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
            // this.buscar_nuevas_reincripciones();
        }
    }
</script>
