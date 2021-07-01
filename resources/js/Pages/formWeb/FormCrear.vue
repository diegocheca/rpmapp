<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Solicitud
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-6">
                        <div
                            class="
                                grid grid-cols-1
                                md:grid-cols-2
                                gap-5
                                md:gap-8
                                mt-5
                                mx-7
                            "
                        >
                            <div class="grid grid-cols-1">
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >ID</label
                                >
                                <input
                                    id="id"
                                    v-model="form.id"
                                    class="
                                        py-2
                                        px-3
                                        rounded-lg
                                        border-2 border-purple-300
                                        mt-1
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-purple-600
                                        focus:border-transparent
                                    "
                                    type="text"
                                    placeholder="ID"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >Plazo Solicitado</label
                                >
                                <input
                                    id="plazo_solicitado"
                                    v-model="form.plazo_solicitado"
                                    class="
                                        py-2
                                        px-3
                                        rounded-lg
                                        border-2 border-purple-300
                                        mt-1
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-purple-600
                                        focus:border-transparent
                                    "
                                    type="text"
                                    placeholder="Plazo Solicitado"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >Periodo Trabajo</label
                                >
                                <input
                                    id="periodo_trabajo"
                                    v-model="form.periodo_trabajo"
                                    class="
                                        py-2
                                        px-3
                                        rounded-lg
                                        border-2 border-purple-300
                                        mt-1
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-purple-600
                                        focus:border-transparent
                                    "
                                    type="text"
                                    placeholder="Periodo Trabajo"
                                />
                            </div>
                        </div>

                        <div
                            class="
                                flex
                                justify-end
                                md:gap-8
                                gap-4
                                pt-5
                                pb-5
                                pr-5
                            "
                        >
                            <inertia-link
                                :href="route('solicitudes.index')"
                                class="
                                    w-auto
                                    bg-gray-500
                                    hover:bg-gray-700
                                    rounded-lg
                                    shadow-xl
                                    font-medium
                                    text-white
                                    px-4
                                    py-2
                                "
                                type="button"
                            >
                                Cancelar
                            </inertia-link>
                            <button
                                type="submit"
                                class="
                                    w-auto
                                    bg-purple-500
                                    hover:bg-purple-700
                                    rounded-lg
                                    shadow-xl
                                    font-medium
                                    text-white
                                    px-4
                                    py-2
                                "
                            >
                                Guardar
                            </button>
                        </div>
                    </form>
                    <Mostrar></Mostrar>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
//import Mostrar from '../Productors/BotonesPaginaCuatro.vue';
//import Mostrar from '../MisComponentes/saludo.vue';
import Mostrar from '../MisComponentes/DatosPersonales.vue';
export default {
    components: {
        AppLayout,
        Mostrar,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: {
                id: null,
                plazo_solicitado: null,
                periodo_trabajo: null,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.post(route("solicitudes.store"), this.form);
        },
    },
};
</script>
