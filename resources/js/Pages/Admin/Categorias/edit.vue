<template>
    <app-layout>
        <div>
            <h1
                class="
                    text-center text-2xl
                    font-bold
                    leading-7
                    text-gray-300
                    sm:text-3xl sm:truncate
                    py-1
                    bg-gradient-to-l
                    from-indigo-500
                    to-indigo-800
                "
            >
                Editar Categoria
            </h1>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg"
                    >
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
                                        >Nombre de Categoria</label
                                    >
                                    <input
                                        id="nombre"
                                        v-model="form.name"
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
                                        placeholder="Ingrese nombre del nuevo permiso ( ej: web.permisos.index )"
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
                                        >Descripción</label
                                    >
                                    <input
                                        id="description"
                                        v-model="form.description"
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
                                        placeholder="Ingrese descripción del permiso"
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
                                    :href="route('admin.categoria.index')"
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
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
    components: {
        AppLayout,
    },
    props: {
        categorias: Array,
        info:String,
    },
    data() {
        return {
            form: {
                name: this.$props.categorias.name,
                description: this.$props.categorias.description,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.put(
                route("admin.categoria.update", this.$props.categorias.id),
                this.form
            );
        },
    },
};
</script>
