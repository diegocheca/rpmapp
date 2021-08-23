<template>
    <app-layout>
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
            Editar Producto
        </h1>
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
                            <!--  NOMBRE USUARIO -->
                            <div class="grid grid-cols-1">
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >Usuario</label
                                >
                                <input
                                    id="name"
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
                                    placeholder="Descripción"
                                />
                            </div>
                            <!--  EMAIL -->
                            <div class="grid grid-cols-1">
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >email</label
                                >
                                <input
                                    id="email"
                                    v-model="form.email"
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
                                    placeholder="Email"
                                />
                            </div>
                            <!--  LISTA DE ROLES -->
                            <div>
                                <label
                                    class="
                                        uppercase
                                        md:text-sm
                                        text-xs text-gray-500 text-light
                                        font-semibold
                                    "
                                    >Listados de Roles</label
                                >
                                <!-- <ul>
                                    <li
                                        v-for="(rol, index) in roles"
                                        :key="index"
                                    >
                                        <input
                                            :id="rol.name"
                                            :value="rol.id"
                                            name="rol"
                                            checked="false"
                                            type="checkbox"
                                            v-model="checkedroles"
                                        />
                                        <label :for="rol.name">{{
                                            rol.name
                                        }}</label>
                                    </li>
                                </ul> -->

                                <div v-for="(rol, index) in roles" :key="index">
                                    <label :for="rol.name">
                                        <input
                                            :id="rol.name"
                                            :value="rol.id"
                                            name="rol"
                                            checked="false"
                                            type="checkbox"
                                            v-model="form.checkedroles"
                                        />
                                        {{ rol.name }}
                                    </label>
                                </div>

                                <!-- <ul>
                                    <li v-for="rol in roles" :key="rol.id">
                                        <label
                                            class="
                                                flex
                                                items-center
                                                relative
                                                w-max
                                                cursor-pointer
                                                select-none
                                            "
                                        >
                                            <input
                                                type="checkbox"
                                                :id="rol.name"
                                                :value="rol.id"
                                                name="rol"
                                                v-model="checkedroles"
                                                class="
                                                    appearance-none
                                                    transition-colors
                                                    cursor-pointer
                                                    w-14
                                                    h-7
                                                    rounded-full
                                                    focus:outline-none
                                                    focus:ring-2
                                                    focus:ring-offset-2
                                                    focus:ring-offset-black
                                                    focus:ring-blue-500
                                                    bg-red-500
                                                "
                                            />
                                            <span
                                                class="
                                                    absolute
                                                    font-medium
                                                    text-xs
                                                    uppercase
                                                    right-1
                                                    text-white
                                                "
                                            >
                                                OFF
                                            </span>
                                            <span
                                                class="
                                                    absolute
                                                    font-medium
                                                    text-xs
                                                    uppercase
                                                    right-8
                                                    text-white
                                                "
                                            >
                                                ON
                                            </span>
                                            <span
                                                class="
                                                    w-7
                                                    h-7
                                                    right-7
                                                    absolute
                                                    rounded-full
                                                    transform
                                                    transition-transform
                                                    bg-gray-200
                                                "
                                            />
                                            
                                        </label>
                                        
                                        <br />
                                    </li>
                                </ul> -->
                                <br />
                                <span>Roles ID: {{ form.checkedroles }}</span>
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
                                :href="route('admin.users.index')"
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
    </app-layout>
</template>

<style scoped>
body {
    background-color: #171717; /* bg-true-gray-900 */
    color: rgb(0, 0, 0);
}

input:checked {
    background-color: #22c55e; /* bg-green-500 */
}

input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
}
</style>
<script>
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
    components: {
        AppLayout,
    },
    props: {
        usuario: Array,
        roles: Array,
        rolesUser: Array,
    },
    data() {
        return {
            form: {
                name: this.$props.usuario.name,
                email: this.$props.usuario.email,
                roles: this.$props.roles,
                checkedroles: [],
            },
        };
    },
    mounted() {
        this.form.checkedroles = this.$props.rolesUser;
    },
    // directives: {
    //     focus: {
    //         // Definición de directiva
    //         inserted: function (el) {
    //             // console.log("PRUEBA ", el);
    //             el.focus();
    //         },
    //     },
    // },
    methods: {
        submit() {
            this.$inertia.put(
                route("admin.users.update", this.$props.usuario.id),
                this.form
            );
        },
    },
};
</script>
