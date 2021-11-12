<template>
    <div
        class="
            border-2
            rounded-2xl
            w-full
            py-4
            px-8
            bg-white
            shadow-lg
            my-20
            border-indigo-400
        "
    >
        <div
            class="flex justify-center md:justify-end -mt-16 sticky top-0 z-10"
        >
            <a href="#section_catamarca">
                <img
                    class="
                        w-20
                        h-20
                        object-cover
                        rounded-full
                        border-2 border-indigo-500
                        bg-white
                    "
                    :src="
                        $inertia.page.props.appName +
                        '/formulario_alta/imagenes/mendoza.svg'
                    "
                    width="50%"
                />
            </a>
            <div v-if="$props.testing">
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
                    <br />
                    <br />
                    <input
                        type="checkbox"
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
                        v-model="mostrar_testing"
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
                        Sin
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
                        Con
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
                    <br />
                    <br />
                    <input
                        type="checkbox"
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
                            focus:ring-green-500
                            bg-purple-500
                        "
                        v-model="autoridad_minera"
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
                        Pro
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
                        Aut
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
            </div>
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">
                {{ titulo_pagina }}
            </h2>
            <br />
            <div class="flex items-center justify-center"></div>
            <br />
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.decreto3737"
                        v-bind:valor_input_props="form_mendoza.decreto3737"
                        v-bind:valor_input_validacion="form_mendoza.decreto3737_valido"
                        v-bind:evualacion_correcto="form_mendoza.decreto3737_correcto"
                        v-bind:valor_obs="form_mendoza.obs_decreto3737"
                        v-bind:valor_valido_obs="form_mendoza.obs_decreto3737_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Decreto 3737:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.decreto3737"
                        v-bind:mostrar_correccion="permisos_mostrar.decreto3737_correccion"
                        v-bind:desactivar_correccion="permisos_disables.decreto3737_correccion"
                        v-on:changevalido="update_decreto3737_valido($event)"
                        v-on:changecorrecto="update_decreto3737_correcto($event)"
                        v-on:changeobs="update_obs_decreto3737($event)"
                        v-on:changeobsvalido="update_obs_decreto3737_valida($event)"
                        v-on:changevalor="update_valor_decreto3737($event)"
                    >
                    </NombreMina>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.situacion_mina"
                        v-bind:valor_input_props="form_mendoza.situacion_mina"
                        v-bind:valor_input_validacion="form_mendoza.situacion_mina_valido"
                        v-bind:evualacion_correcto="form_mendoza.situacion_mina_correcto"
                        v-bind:valor_obs="form_mendoza.obs_situacion_mina"
                        v-bind:valor_valido_obs="form_mendoza.obs_situacion_mina_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Situacion de la Mina:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.situacion_mina"
                        v-bind:mostrar_correccion="permisos_mostrar.situacion_mina_correccion"
                        v-bind:desactivar_correccion="permisos_disables.situacion_mina_correccion"
                        v-on:changevalido="update_situacion_mina_valido($event)"
                        v-on:changecorrecto="update_situacion_mina_correcto($event)"
                        v-on:changeobs="update_obs_situacion_mina($event)"
                        v-on:changeobsvalido="update_obs_situacion_mina_valida($event)"
                        v-on:changevalor="update_valor_situacion_mina($event)"
                    >
                    </NombreMina>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_asiento_n"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_asiento_n"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_asiento_n_valido"
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion Minera Asiento Numero:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.concesion_minera_asiento_n"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="true"
                        v-on:changevalido="update_concesion_minera_asiento_n_valido($event)"
                        v-on:changevalor="update_valor_concesion_minera_asiento_n($event)"
                    >
                    </NombreMina>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_fojas"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_fojas"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_fojas_valido"
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion Minera Fojas:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.concesion_minera_fojas"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="true"
                        v-on:changevalido="update_concesion_minera_fojas_valido($event)"
                        v-on:changevalor="update_valor_concesion_minera_fojas($event)"
                    >
                    </NombreMina>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_tomo_n"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_tomo_n"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_tomo_n_validacion"
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion Minera Tomo N°:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.concesion_minera_tomo_n"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="false"
                        v-on:changevalido="update_concesion_minera_tomo_n_valido($event)"
                        v-on:changevalor="update_valor_concesion_minera_tomo_n($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local">
                        <br />
                        <div
                            class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring ring-4 ring-blue-100
                            "
                        >
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Na m quisquam doloremque
                                placeat op.
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- localidad_mina_provincia deel padre --
                        localidad_mina_provincia_validacion valida deel padre{
                        -- localidad_mina_provincia_correcto correcto deel padre
                        -- obs_localidad_mina_provincia observacion deel padre
                        -- obs_localidad_mina_provincia_valido observacion
                        valida deel padre
                    </div>
                </div>
                
            </div>
            <div class="flex flex-wrap">
                
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_reg_cant"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_reg_cant"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_reg_cant_valido"
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion  Reg Cantidad:'"
                        v-bind:icon="$inertia.page.props.appName + '/svg/state.svg'"
                        v-bind:desactivar_input="permisos_disables.concesion_minera_reg_cant"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="false"
                        v-on:changeobsvalido="update_concesion_minera_reg_cant_valida($event)"
                        v-on:changevalor="update_valor_concesion_minera_reg_cant($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local">
                        <br />
                        <div
                            class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring ring-4 ring-blue-100
                            "
                        >
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Na m quisquam doloremque
                                placeat op.
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- localidad_mina_provincia deel padre --
                        localidad_mina_provincia_validacion valida deel padre{
                        -- localidad_mina_provincia_correcto correcto deel padre
                        -- obs_localidad_mina_provincia observacion deel padre
                        -- obs_localidad_mina_provincia_valido observacion
                        valida deel padre
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina





                        v-if="permisos_mostrar.concesion_minera_reg_men"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_reg_men"
                        v-bind:valor_input_validacion="
                            form_mendoza.concesion_minera_reg_men_valido
                        "
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion Minera Reg Libro Men:'"
                        v-bind:icon="
                            $inertia.page.props.appName + '/svg/state.svg'
                        "
                        v-bind:desactivar_input="permisos_disables.concesion_minera_reg_men"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="false"
                        v-on:changevalido="update_concesion_minera_reg_men_valido($event)"
                        v-on:changevalor="update_valor_concesion_minera_reg_men($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local">
                        <br />
                        <div
                            class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring ring-4 ring-blue-100
                            "
                        >
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Na m quisquam doloremque
                                placeat op.
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- localidad_mina_provincia deel padre --
                        localidad_mina_provincia_validacion valida deel padre{
                        -- localidad_mina_provincia_correcto correcto deel padre
                        -- obs_localidad_mina_provincia observacion deel padre
                        -- obs_localidad_mina_provincia_valido observacion
                        valida deel padre
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_reg_m_y_d"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_reg_m_y_d"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_reg_m_y_d_valido"
                        v-bind:evualacion_correcto="false"
                        v-bind:valor_obs="false"
                        v-bind:valor_valido_obs="false"
                        v-bind:evaluacion="false"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion Minera Reg Libro MyD:'"
                        v-bind:icon="
                            $inertia.page.props.appName + '/svg/state.svg'
                        "
                        v-bind:desactivar_input="permisos_disables.concesion_minera_reg_m_y_d"
                        v-bind:mostrar_correccion="false"
                        v-bind:desactivar_correccion="false"
                        v-on:changeobsvalido="update_concesion_minera_reg_m_y_d_valida($event)"
                        v-on:changevalor="update_valor_concesion_minera_reg_m_y_d($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local">
                        <br />
                        <div
                            class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring ring-4 ring-blue-100
                            "
                        >
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Na m quisquam doloremque
                                placeat op.
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- localidad_mina_provincia deel padre --
                        localidad_mina_provincia_validacion valida deel padre{
                        -- localidad_mina_provincia_correcto correcto deel padre
                        -- obs_localidad_mina_provincia observacion deel padre
                        -- obs_localidad_mina_provincia_valido observacion
                        valida deel padre
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                        v-if="permisos_mostrar.concesion_minera_reg_d_y_c"
                        v-bind:valor_input_props="form_mendoza.concesion_minera_reg_d_y_c"
                        v-bind:valor_input_validacion="form_mendoza.concesion_minera_reg_d_y_c_valido"
                        v-bind:evualacion_correcto="form_mendoza.concesion_minera_reg_d_y_c_correcto"
                        v-bind:valor_obs="form_mendoza.obs_concesion_minera_reg_d_y_c"
                        v-bind:valor_valido_obs="form_mendoza.obs_concesion_minera_reg_d_y_c_valido
                        "
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing="mostrar_testing"
                        v-bind:label="'Concesion  Reg D y C :'"
                        v-bind:icon="
                            $inertia.page.props.appName + '/svg/state.svg'
                        "
                        v-bind:desactivar_input="permisos_disables.concesion_minera_reg_d_y_c"
                        v-bind:mostrar_correccion="permisos_mostrar.concesion_minera_reg_d_y_c_correccion
                        "
                        v-bind:desactivar_correccion="permisos_disables.concesion_minera_reg_d_y_c_correccion
                        "
                        v-on:changevalido="update_concesion_minera_reg_d_y_c_valido($event)"
                        v-on:changecorrecto="
                            update_concesion_minera_reg_d_y_c_correcto($event)
                        "
                        v-on:changeobs="update_obs_concesion_minera_reg_d_y_c($event)"
                        v-on:changeobsvalido="
                            update_obs_concesion_minera_reg_d_y_c_valida($event)
                        "
                        v-on:changevalor="update_valor_concesion_minera_reg_d_y_c($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local">
                        <br />
                        <div
                            class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring ring-4 ring-blue-100
                            "
                        >
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Na m quisquam doloremque
                                placeat op.
                            </p>
                        </div>
                        <br />
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- localidad_mina_provincia deel padre --
                        localidad_mina_provincia_validacion valida deel padre{
                        -- localidad_mina_provincia_correcto correcto deel padre
                        -- obs_localidad_mina_provincia observacion deel padre
                        -- obs_localidad_mina_provincia_valido observacion
                        valida deel padre
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap"></div>
        </div>
        <br>
        <br>
        <div class="flex items-stretch w-full justify-items-stretch">
            <BotonesPaginaMendoza
                v-bind:link_volver="titulo_boton_volver"
                v-bind:titulo_boton_volver="titulo_boton_volver"
                v-bind:titulo_boton_guardar="titulo_boton_guardar"
                v-bind:formulario="form_mendoza"
                v-bind:donde_guardar="
                    $inertia.page.props.appName +
                    '/formularios/evaluacion_auto_guardado_catamarcas'
                "
                v-bind:evaluacion="$props.evaluacion"
                v-bind:testing="$props.testing"
                v-bind:id="$props.id"
            >
            </BotonesPaginaMendoza>
        </div>
    </div>
</template>

<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import CardMinaUbicacion from "@/Jetstream/altas/CardMinaUbicacion";
import SelectProvincia from "@/Pages/Productors/SelectProvincia";
import SelectDepartamento from "@/Pages/Productors/SelectDepartamento";
import NombreMina from "@/Pages/Productors/NombreMina";
import TipoDeSistemaGeo from "@/Pages/Productors/TipoDeSistemaGeo";
import BotonesPaginaMendoza from "@/Pages/Productors/BotonesPaginaMendoza";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import CaracterQueInvoca from "@/Pages/Productors/CaracterQueInvoca";
//import BotonesPaginaCatamarca from "@/Pages/Productors/BotonesPaginaCatamarca";

import Label from "../../Jetstream/Label.vue";
export default {
    props: [
        "link_volver",
        "titulo_boton_volver",
        "titulo_boton_guardar",
        "titulo_pagina",

        "evaluacion",
        "testing",
        "id",
    ],
    components: {
        JetDialogModal,
        CardMinaUbicacion,
        SelectProvincia,
        SelectDepartamento,
        NombreMina,
        TipoDeSistemaGeo,
        BotonesPaginaMendoza,
        SubirArchivo,
        CaracterQueInvoca,
        //BotonesPaginaCatamarca,
    },
    data() {
        return {
            mostrar_modal_datos_ya_guardados: false,
            modal_tittle: "",
            modal_body: "",
            mostrar_testing: false,
            autoridad_minera: this.$props.evaluacion,
            ayuda_local: false,
            permisos_mostrar: [],
            permisos_disables: [],
            form_mendoza: {},
            lista_departamentos: [],
            lista_localidades: [],
        };
    },
    methods: {
        cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false;
        },

        //FUNCIONES DE decreto3737
        update_decreto3737_valido(newValue) {
            this.form_mendoza.decreto3737_valido = newValue;
        },
        update_decreto3737_correcto(newValue) {
            this.form_mendoza.decreto3737_correcto = newValue;
        },
        update_obs_decreto3737(newValue) {
            this.form_mendoza.obs_decreto3737 = newValue;
        },
        update_obs_decreto3737_valida(newValue) {
            this.form_mendoza.obs_decreto3737_valido = newValue;
        },
        update_valor_decreto3737(newValue) {
            this.form_mendoza.decreto3737 = newValue;
        },

        //FUNCIONES DE situacion_min
        update_situacion_mina_valido(newValue) {
            this.form_mendoza.situacion_mina_valido = newValue;
        },
        update_situacion_mina_correcto(newValue) {
            this.form_mendoza.situacion_mina_correcto = newValue;
        },
        update_obs_situacion_mina(newValue) {
            this.form_mendoza.obs_situacion_mina = newValue;
        },
        update_obs_situacion_mina_valida(newValue) {
            this.form_mendoza.obs_situacion_mina_valido = newValue;
        },
        update_valor_situacion_mina(newValue) {
            this.form_mendoza.situacion_mina = newValue;
        },

        //FUNCIONES DE concesion_minera_asiento_n
        update_concesion_minera_asiento_n_valido(newValue) {
            this.form_mendoza.concesion_minera_asiento_n_valido = newValue;
        },
        update_valor_concesion_minera_asiento_n(newValue) {
            this.form_mendoza.concesion_minera_asiento_n = newValue;
        },

        //FUNCIONES DE concesion_minera_fojas
        update_concesion_minera_fojas_valido(newValue) {
            this.form_mendoza.concesion_minera_fojas_valido = newValue;
        },
        update_valor_concesion_minera_fojas(newValue) {
            this.form_mendoza.concesion_minera_fojas = newValue;
        },

        //FUNCIONES DE N OTIFICACION DE GESTOR
        update_concesion_minera_tomo_n_valido(newValue) {
            this.form_mendoza.concesion_minera_tomo_n_validacion = newValue;
        },
        update_valor_concesion_minera_tomo_n(newValue) {
            this.form_mendoza.concesion_minera_tomo_n = newValue;
        },

        //FUNCIONES DE PROFESION DE GESTOR
        update_concesion_minera_reg_m_y_d_valida(newValue) {
            this.form_mendoza.concesion_minera_reg_m_y_d_valido = newValue;
        },
        update_valor_concesion_minera_reg_m_y_d(newValue) {
            this.form_mendoza.concesion_minera_reg_m_y_d = newValue;
        },

        update_concesion_minera_reg_cant_valida(newValue) {
            this.form_mendoza.concesion_minera_reg_cant_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_concesion_minera_reg_cant(newValue) {
            this.form_mendoza.concesion_minera_reg_cant = newValue;
            //tengo que enviarsela al padre
        },

        update_concesion_minera_reg_men_valido(newValue) {
            this.form_mendoza.concesion_minera_reg_men_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_concesion_minera_reg_men(newValue) {
            this.form_mendoza.concesion_minera_reg_men = newValue;
            //tengo que enviarsela al padre
        },

        //FUNCIONES DE update_valor_concesion_minera_reg_d_y_c
        update_concesion_minera_reg_d_y_c_valido(newValue) {
            this.form_mendoza.concesion_minera_reg_d_y_c_valido = newValue;
        },
        update_concesion_minera_reg_d_y_c_correcto(newValue) {
            this.form_mendoza.concesion_minera_reg_d_y_c_correcto = newValue;
        },
        update_obs_concesion_minera_reg_d_y_c(newValue) {
            this.form_mendoza.obs_concesion_minera_reg_d_y_c = newValue;
        },
        update_obs_concesion_minera_reg_d_y_c_valida(newValue) {
            this.form_mendoza.obs_concesion_minera_reg_d_y_c_valido = newValue;
        },
        update_valor_concesion_minera_reg_d_y_c(newValue) {
            this.form_mendoza.concesion_minera_reg_d_y_c = newValue;
        },

        //mostrar ayuda
        update_valor_ayuda_local(newValor) {
            this.ayuda_local = newValor;
        },
    },
    mounted() {
        let self = this;
        this.$nextTick(() => {
            console.log("por buscar los datos de mendoza desde el hijo \n\n\n");
            console.log("\n\n\n mi id es : " + this.$props.id + " \n\n\n");
            if (this.$inertia.page.props.user.id_provincia === 50) {
                if (
                    typeof this.$props.id === "undefined" ||
                    this.$props.id === null ||
                    this.$props.id === "null"
                ) {
                    //estoy dando de alta
                    self.form_mendoza.decreto3737 = "";
                    self.form_mendoza.decreto3737_correcto = "";
                    self.form_mendoza.decreto3737_valido = "";
                    self.form_mendoza.obs_decreto3737 = "";
                    self.form_mendoza.obs_decreto3737_valido = "";

                    self.form_mendoza.situacion_mina = "";
                    self.form_mendoza.situacion_mina_correcto = "";
                    self.form_mendoza.obs_situacion_mina = "";
                    self.form_mendoza.situacion_mina_valido = "";
                    self.form_mendoza.obs_situacion_mina_valido = "";

                    self.form_mendoza.concesion_minera_asiento_n = "";
                    self.form_mendoza.concesion_minera_asiento_n_valido = "";
                    
                    self.form_mendoza.concesion_minera_fojas = "";
                    self.form_mendoza.concesion_minera_fojas_valido = "";
                    
                    self.form_mendoza.concesion_minera_tomo_n = "";
                    self.form_mendoza.concesion_minera_tomo_n_valido = "";
                    self.form_mendoza.concesion_minera_reg_m_y_d = "";
                    self.form_mendoza.concesion_minera_reg_m_y_d_valido = "";
                    self.form_mendoza.concesion_minera_reg_cant = "";
                    self.form_mendoza.concesion_minera_reg_cant_valido = "";
                    self.form_mendoza.concesion_minera_reg_men = "";
                    self.form_mendoza.concesion_minera_reg_men_valido = "";

                    self.form_mendoza.concesion_minera_reg_d_y_c = "";
                    self.form_mendoza.concesion_minera_reg_d_y_c_valido = "";
                    self.form_mendoza.obs_concesion_minera_reg_d_y_c = "";
                    self.form_mendoza.obs_concesion_minera_reg_d_y_c_valido = "";

                    self.form_mendoza.paso_mend_progreso = "";
                    self.form_mendoza.paso_mend_aprobado = "";
                    self.form_mendoza.paso_mend_reprobado = "";

                    //voy a buscar los permisos
                    axios
                        .get(
                            "/formularios/traer_permisos_pagina_mendoza/0/crear"
                        )
                        .then(function (response) {
                            if (response.data.status === "ok") {
                                self.permisos_mostrar = response.data.mostrar;
                                self.permisos_disables = response.data.disables;
                            } else console.log("error al buscar permisos: " + response.data.msg);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    console.log("estoy editando");
                    //estoy por editar
                    //voy a BUSCAR LOS DATOS DEL FORMULARIO
                    axios
                        .get(
                            "/formularios/traer_datos_pagina_mendoza" +
                                "/" +
                                parseInt(this.$props.id)
                        )
                        .then(function (response) {
                            console.log(response.datos);
                            if (response.data.status === "ok") {
                                self.form_mendoza = response.data.datos;
                            } else console.log("error al buscar datos: " + response.data.msg);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                        console.log("voy por los permisos");
                    //voy a buscar los permisos
                    axios
                        .get(
                            "/formularios/traer_permisos_pagina_mendoza" +
                                "/" +
                                parseInt(this.$props.id) +
                                "/editar"
                        )
                        .then(function (response) {
                            console.log(response.data.disables);
                            console.log(response.data.mostrar);
                            if (response.data.status === "ok") {
                                self.permisos_mostrar = response.data.mostrar;
                                self.permisos_disables = response.data.disables;
                            } else console.log("error al buscar permisos: " + response.data.msg);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }
        });
    },
};
</script>
