<template>
<div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <div class="flex justify-center md:justify-end -mt-16 sticky top-0">
            <a href="#section_mina_uno">
                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/formulario_alta/imagenes/tipo_caracter_card.svg'">
            </a>
            <div v-if="$props.testing">
                <label class="flex items-center relative w-max cursor-pointer select-none">
                    <br>
                    <br>
                    <input 
                    type="checkbox" 
                    class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" 
                    v-model="mostrar_testing"
                    />
                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> Sin </span>
                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> Con </span>
                    <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                </label>
                <label class="flex items-center relative w-max cursor-pointer select-none">
                    <br>
                    <br>
                    <input 
                    type="checkbox" 
                    class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-green-500 bg-purple-500" 
                    v-model="autoridad_minera"
                    />
                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> Pro </span>
                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> Aut </span>
                    <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                </label>
            </div>
        </div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">{{titulo_pagina}}</h2>
            <br><br>
            <div class="flex items-center justify-center">
                <CardMinaUno 
                    :progreso="50"
                    :aprobado="50"
                    :reprobado="50" 
                    :lugar="'Argentina, San Juan'"
                    :updated_at="'hace 10 minutos'"
                    :mostrarayuda= true
                    :clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
                    :clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
                    :ayuda="ayuda_local"
                    v-on:changevalorayuda="update_valor_ayuda_local($event)"
                ></CardMinaUno>
            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <!-- <NumeroExpedienteMina 
                        v-bind:numero_expdiente="$props.numero_expdiente"
                        v-bind:numero_expdiente_valido="$props.numero_expdiente_valido"
                        v-bind:numero_expdiente_correcto="$props.numero_expdiente_correcto"
                        v-bind:obs_numero_expdiente="$props.obs_numero_expdiente"
                        v-bind:obs_numero_expdiente_valido="$props.obs_numero_expdiente_valido"
                        v-bind:evaluacion="true"
                        v-on:changenumexpvalido="update_num_exp_valido($event)"
                        v-on:changenumexpcorrecto="update_num_exp_correcto($event)"
                        v-on:changeobsnumexp="updateobs_num_exp($event)"
                        v-on:changeobsnumexpvalido="updateobs_num_exp_valido($event)"
                        v-on:changevalornumexp="updatevalor_num_exp($event)"
                    ></NumeroExpedienteMina> -->
                    




                    <NombreMina
                    v-if="$props.mostrar_num_exp"

                        v-bind:valor_input_props="$props.numero_expdiente"
                        v-bind:valor_input_validacion="$props.numero_expdiente_valido"
                        v-bind:evualacion_correcto="$props.numero_expdiente_correcto"
                        v-bind:valor_obs="$props.obs_numero_expdiente"
                        v-bind:valor_valido_obs="$props.obs_numero_expdiente_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Numero de Expediente'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/telstreet.svg'"
                        v-bind:name_correcto="'num_exp_correcto'"
                        v-bind:desactivar_input="$props.desactivar_num_exp"
                        v-bind:mostrar_correccion="$props.mostrar_num_exp_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_num_exp_correccion"


                        v-on:changevalido="update_num_exp_valido($event)"
                        v-on:changecorrecto="update_num_exp_correcto($event)"
                        v-on:changeobs="updateobs_num_exp($event)"
                        v-on:changeobsvalido="updateobs_num_exp_valido($event)"
                        v-on:changevalor="updatevalor_num_exp($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Es el número de expediente con el cual se ha tramitado el expediente.
                            </p>
                            
                        </div>
                        <br>
                    </div>

                    <div class="flex" v-if="mostrar_testing">
                        <br> num exp de Mina valor padre: {{form_pagina.numero_expdiente}}
                        <br> num exp de Mina  valido del padre: {{form_pagina.numero_expdiente_valido}}
                        <br> num exp de Mina  correcto deel padre: {{form_pagina.numero_expdiente_correcto}}
                        <br> num exp de Mina  observacion deel padre: {{form_pagina.obs_numero_expdiente}}
                        <br> num exp de Mina  observacion valida deel padre: {{form_pagina.obs_numero_expdiente_valido}}
                    </div>

                </div>
                <div class="w-full md:w-1/2 px-3">
                    <!-- <DistritoMinero
                        v-bind:distrito_minero="$props.distrito_minero"
                        v-bind:distrito_minero_validacion="$props.distrito_minero_validacion"
                        v-bind:distrito_minero_correcto="$props.distrito_minero_correcto"
                        v-bind:obs_distrito_minero="$props.obs_distrito_minero"
                        v-bind:obs_distrito_minero_valido="$props.obs_distrito_minero_valido"
                        v-bind:evaluacion="true"
                        v-on:changevalido="update_distrito_minero_valido($event)"
                        v-on:changecorrecto="update_distrito_minero_correcto($event)"
                        v-on:changeobs="update_distrito_minero_obs($event)"
                        v-on:changeobsvalido="update_distrito_minero_valido_obs($event)"
                        v-on:changevalor="update_distrito_minero($event)"
                    >
                    </DistritoMinero> -->
                    <NombreMina
                    v-if="$props.mostrar_distrito"







                        v-bind:valor_input_props="$props.distrito_minero"
                        v-bind:valor_input_validacion="$props.distrito_minero_validacion"
                        v-bind:evualacion_correcto="$props.distrito_minero_correcto"
                        v-bind:valor_obs="$props.obs_distrito_minero"
                        v-bind:valor_valido_obs="$props.obs_distrito_minero_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Distrito Minero'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/numdistrito.svg'"
                        v-bind:name_correcto="'distrito_correcto'"
                        v-bind:desactivar_input="$props.desactivar_distrito"
                        v-bind:mostrar_correccion="$props.mostrar_distrito_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_distrito_correccion"


                        v-on:changevalido="update_distrito_minero_valido($event)"
                        v-on:changecorrecto="update_distrito_minero_correcto($event)"
                        v-on:changeobs="update_distrito_minero_obs($event)"
                        v-on:changeobsvalido="update_distrito_minero_valido_obs($event)"
                        v-on:changevalor="update_distrito_minero($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Es el distrito minero asignado en el expediente con el cual se ha tramitado el expediente.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> distrito minero de Mina valor padre: {{form_pagina.distrito_minero}}
                        <br> distrito minero de Mina  valido del padre: {{form_pagina.distrito_minero_validacion}}
                        <br> distrito minero de Mina  correcto deel padre: {{form_pagina.distrito_minero_correcto}}
                        <br> distrito minero de Mina  observacion deel padre: {{form_pagina.obs_distrito_minero}}
                        <br> distrito minero de Mina  observacion valida deel padre: {{form_pagina.obs_distrito_minero_valido}}
                    </div>
                    
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <SelectGenerico
                        v-if="mostrar_categoria"

                        v-bind:valor_input_props="$props.categoria"
                        v-bind:valor_input_validacion="$props.categoria_validacion"
                        v-bind:evualacion_correcto="$props.categoria_correcto"
                        v-bind:valor_obs="$props.obs_categoria"
                        v-bind:valor_valido_obs="$props.obs_categoria_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Categoria de Manifestacion'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/minetest.svg'"
                        v-bind:name_correccion="'categoria_correccion'"
                        v-bind:desactivar_input="$props.desactivar_categoria"
                        v-bind:mostrar_correccion="$props.mostrar_categoria_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_categoria_correccion"

                        v-on:changevalido="update_cat_valido($event)"
                        v-on:changecorrecto="update_cat_correcto($event)"
                        v-on:changeobs="update_obs_cat($event)"
                        v-on:changeobsvalido="update_obs_cat_valida($event)"
                        v-on:changevalor="update_valor_cat($event)"
                    >
                    </SelectGenerico>
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Debe seleccionar la opción que usted está registrando, ya sea mina o cantera.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> Categoria de Mina valor padre: {{$props.categoria}}
                        <br> Categoria de Mina valor padre: {{form_pagina.categoria}}
                        <br> Categoria de Mina  valido del padre: {{form_pagina.categoria_validacion}}
                        <br> Categoria de Mina  correcto deel padre: {{form_pagina.categoria_correcto}}
                        <br> Categoria de Mina  observacion deel padre: {{form_pagina.obs_categoria}}
                        <br> Categoria de Mina  observacion valida deel padre: {{form_pagina.obs_categoria_valido}}

                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div v-if="form_pagina.categoria === 'primera' || $props.categoria === 'primera' " class="w-40 h-40 m-4 bg-gradient-to-r from-blue-600 to-blue-300 rounded-2xl items-center justify-center text-center text-white py-16">Mina de Primera Categoria </div>
                    <div v-if="form_pagina.categoria === 'segunda' || $props.categoria === 'segunda'" class="w-40 h-40 m-4 bg-gradient-to-r from-purple-600 to-purple-300 rounded-2xl items-center justify-center text-center text-white py-16">Mina de Segunda Categoria</div>
                    <div v-if="form_pagina.categoria === 'tercera' || $props.categoria === 'tercera'" class="w-40 h-40 m-4 bg-gradient-to-r from-green-600 to-green-300 rounded-2xl items-center justify-center text-center text-white py-16">Cantera de Tercer Categoria</div>
                    
                </div>
                
            </div>
            <div class="flex">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                    v-if="$props.mostrar_nombre_mina"

                        v-bind:valor_input_props="$props.nombre_mina"
                        v-bind:valor_input_validacion="$props.nombre_mina_validacion"
                        v-bind:evualacion_correcto="$props.nombre_mina_correcto"
                        v-bind:valor_obs="$props.obs_nombre_mina"
                        v-bind:valor_valido_obs="$props.obs_nombre_mina_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Nombre de Mina'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/nommina.svg'"
                        v-bind:name_correcto="'nombre_mina_correcto'"
                        v-bind:desactivar_input="$props.desactivar_nombre_mina"
                        v-bind:mostrar_correccion="$props.mostrar_nombre_mina_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_nombre_mina_correccion"

                        v-on:changevalido="update_nom_mina_valido($event)"
                        v-on:changecorrecto="update_nom_mina_correcto($event)"
                        v-on:changeobs="update_obs_nom_mina($event)"
                        v-on:changeobsvalido="update_obs_nom_mina_valida($event)"
                        v-on:changevalor="update_valor_nom_mina_($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Es el nombre que se le ha asignado a la mina.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> Nombre de Mina valor padre: {{form_pagina.nombre_mina}}
                        <br> Nombre de Mina  valido del padre: {{form_pagina.nombre_mina_validacion}}
                        <br> Nombre de Mina  correcto deel padre: {{form_pagina.nombre_mina_correcto}}
                        <br> Nombre de Mina  observacion deel padre: {{form_pagina.obs_nombre_mina}}
                        <br> Nombre de Mina  observacion valida deel padre: {{form_pagina.obs_nombre_mina_valido}}
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <NombreMina
                    v-if="$props.mostrar_descripcion_mina"

                        v-bind:valor_input_props="$props.descripcion_mina"
                        v-bind:valor_input_validacion="$props.descripcion_mina_validacion"
                        v-bind:evualacion_correcto="$props.descripcion_mina_correcto"
                        v-bind:valor_obs="$props.obs_descripcion_mina"
                        v-bind:valor_valido_obs="$props.obs_descripcion_mina_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Descripcion de la Mina'"
                        v-bind:icon="$inertia.page.props.appName+'/svg/description.svg'"
                        v-bind:name_correcto="'descripcion_mina_correcto'"
                         v-bind:desactivar_input="$props.desactivar_descripcion_mina"
                        v-bind:mostrar_correccion="$props.mostrar_descripcion_mina_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_descripcion_mina_correccion"

                        v-on:changevalido="update_descripcion_valido($event)"
                        v-on:changecorrecto="update_descripcion_correcto($event)"
                        v-on:changeobs="update_obs_descripcion($event)"
                        v-on:changeobsvalido="update_obs_descripcion_valida($event)"
                        v-on:changevalor="update_valor_descripcion($event)"
                    >
                    </NombreMina>
                    <div v-show="ayuda_local" >
                            <br>
                            <div  class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring
                                ring-4
                                ring-blue-100">
                            
                                <p class="p-3">
                                    En este campo debe ser completado con la descripcion de la mina.
                                </p>
                                
                            </div>
                            <br>
                        </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> Nombre de Mina valor padre: {{form_pagina.descripcion_mina}}
                        <br> Nombre de Mina  valido del padre: {{form_pagina.descripcion_mina_validacion}}
                        <br> Nombre de Mina  correcto deel padre: {{form_pagina.descripcion_mina_correcto}}
                        <br> Nombre de Mina  observacion deel padre: {{form_pagina.obs_descripcion_mina}}
                        <br> Nombre de Mina  observacion valida deel padre: {{form_pagina.obs_descripcion_mina_valido}}

                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                    <SubirArchivo 

                    



                    v-if="form_pagina.categoria !== 'tercera' || $props.mostrar_resolucion_concesion"
                        v-bind:valor_input_props="form_pagina.resolucion_concesion_minera"
                        v-bind:valor_input_validacion="form_pagina.resolucion_concesion_minera_validacion"
                        v-bind:evualacion_correcto="form_pagina.resolucion_concesion_minera_correcto"
                        v-bind:valor_obs="form_pagina.obs_resolucion_concesion_minera"
                        v-bind:valor_valido_obs="form_pagina.obs_resolucion_concesion_minera_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Resolucion Concesion Minera (para 1° y 2° categoria)'"
                        v-bind:desactivar_input="$props.desactivar_resolucion_concesion"
                        v-bind:mostrar_correccion="$props.mostrar_resolucion_concesion_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_resolucion_concesion_correccion"


                        v-on:changevalido="update_resol_conce_valido($event)"
                        v-on:changecorrecto="update_resol_conce_correcto($event)"
                        v-on:changeobs="update_obs_resol_conce($event)"
                        v-on:changeobsvalido="update_obs_canon_valido($event)"
                        v-on:changevalor="update_obs_resol_conce_valido($event)"
                        v-on:cambioarchivo="cambio_el_archivo_resolucion($event)"
                    >
                    </SubirArchivo>
                    <div v-show="ayuda_local" >
                            <br>
                            <div  class="
                                bg-blue-50
                                text-gray-800
                                bg-opacity-20
                                text-opacity-80
                                ring
                                ring-4
                                ring-blue-100">
                            
                                <p class="p-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                    m quisquam doloremque placeat op.
                                </p>
                                
                            </div>
                            <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <br> concesion resolucion minera de Mina valor padre: {{form_pagina.resolucion_concesion_minera}}
                        <br> concesion resolucion minera de Mina  valido del padre: {{form_pagina.resolucion_concesion_minera_validacion}}
                        <br> concesion resolucion minera de Mina  correcto deel padre: {{form_pagina.resolucion_concesion_minera_correcto}}
                        <br> concesion resolucion minera de Mina  observacion deel padre: {{form_pagina.obs_resolucion_concesion_minera}}
                        <br> concesion resolucion minera de Mina  observacion valida deel padre: {{form_pagina.obs_resolucion_concesion_minera_valido}}
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                    <SubirArchivo 
                        v-if="form_pagina.categoria !== 'tercera' || $props.mostrar_plano_mina"

                        v-bind:valor_input_props="form_pagina.plano_inmueble"
                        v-bind:valor_input_validacion="form_pagina.plano_inmueble_validacion"
                        v-bind:evualacion_correcto="form_pagina.plano_inmueble_correcto"
                        v-bind:valor_obs="form_pagina.obs_plano_inmueble"
                        v-bind:valor_valido_obs="form_pagina.obs_plano_inmueble_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Plano Inmueble (3° categoria) (*)'"
                        v-bind:desactivar_input="$props.desactivar_plano_mina"
                        v-bind:mostrar_correccion="$props.mostrar_plano_mina_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_plano_mina_correccion"





                        v-on:changevalido="update_plano_inmueble_valido($event)"
                        v-on:changecorrecto="update_plano_inmueble_correcto($event)"
                        v-on:changeobs="update_obs_plano_inmueble($event)"
                        v-on:changeobsvalido="update_obs_plano_inmueble_valido($event)"
                        v-on:changevalor="update_valor_plano_inmueble($event)"
                        v-on:cambioarchivo="cambio_el_archivo_inmueble($event)"
                    >
                    </SubirArchivo>

                    
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- plano_inmueble minera del padre{{form_pagina.plano_inmueble}}
                        -- plano_inmueble_validacion minera valida deel padre{{form_pagina.plano_inmueble_validacion}}
                        -- plano_inmueble_correcto minera correcto deel padre{{form_pagina.plano_inmueble_correcto}}
                        -- obs_plano_inmueble minera observacion deel padre{{form_pagina.obs_plano_inmueble}}
                        -- obs_plano_inmueble_valido minera observacion valida deel padre{{form_pagina.obs_plano_inmueble_valido}}
                    </div>
                </div>

            </div>
            <br>
            <br>
            <div class="flex">
                <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                    <SubirArchivo 
                    v-if="form_pagina.categoria !== 'tercera' || $props.mostrar_titulo"

                        v-bind:valor_input_props="form_pagina.titulo_contrato_posecion"
                        v-bind:valor_input_validacion="form_pagina.titulo_contrato_posecion_validacion"
                        v-bind:evualacion_correcto="form_pagina.titulo_contrato_posecion_correcto"
                        v-bind:valor_obs="form_pagina.obs_titulo_contrato_posecion"
                        v-bind:valor_valido_obs="form_pagina.obs_titulo_contrato_posecion_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing ="mostrar_testing"
                        v-bind:label="'Titulo - Contrato - Pocesión Ventiañal (solo para tercer categoria) (*)'"
                        v-bind:desactivar_input="$props.desactivar_titulo"
                        v-bind:mostrar_correccion="$props.mostrar_titulo_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_titulo_correccion"

                        v-on:changevalido="update_titulo_contrato_valido($event)"
                        v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                        v-on:changeobs="update_obs_titulo_contrato($event)"
                        v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                        v-on:changevalor="update_valor_titulo_contrato($event)"
                        v-on:cambioarchivo="cambio_el_archivo_titulo($event)"
                    >
                    </SubirArchivo>
                    
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Na
                                m quisquam doloremque placeat op.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                        -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                        -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                        -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                        -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                    <ListadeMinerales

                        v-if="$props.mostrar_minerales"
                        v-bind:valor_input_props="$props.titulo_contrato_posecion"
                        v-bind:valor_input_validacion="$props.titulo_contrato_posecion_validacion"
                        v-bind:evualacion_correcto="$props.titulo_contrato_posecion_correcto"
                        v-bind:valor_obs="$props.obs_titulo_contrato_posecion"
                        v-bind:valor_valido_obs="$props.obs_titulo_contrato_posecion_valido"
                        v-bind:evaluacion="autoridad_minera"
                        v-bind:testing = "mostrar_testing"
                        v-bind:label="'Lista de minerales'"
                        v-bind:label_text_area="'Forma de presentación natural del mineral (no usar abreviaturas):'"
                        v-bind:tipo_yacimiento="form_pagina.categoria"
                        v-bind:lista_de_minerales="lista_de_minerales"
                        v-bind:lista_de_minerales_pre_cargados="$props.lista_minerales_desde_back"
                        v-bind:desactivar_input="$props.desactivar_minerales"
                        v-bind:mostrar_correccion="$props.mostrar_minerales_correccion"
                        v-bind:desactivar_correccion="$props.desactivar_minerales_correccion"


                        v-on:changevalido="update_titulo_contrato_valido($event)"
                        v-on:changecorrecto="update_titulo_contrato_correcto($event)"
                        v-on:changeobs="update_obs_titulo_contrato($event)"
                        v-on:changeobsvalido="update_obs_titulo_contrato_valido($event)"
                        v-on:changevalor_lista_minerales="update_valor_minerales($event)"
                    >
                    </ListadeMinerales>
                    <div v-show="ayuda_local" >
                        <br>
                        <div  class="
                            bg-blue-50
                            text-gray-800
                            bg-opacity-20
                            text-opacity-80
                            ring
                            ring-4
                            ring-blue-100">
                        
                            <p class="p-3">
                                Debe completar la lista de minerales con aquellos minerales que justamente serán explotados en este yacimiento.
                            </p>
                            
                        </div>
                        <br>
                    </div>
                    <div class="flex" v-if="mostrar_testing">
                        <h3>Testing de lista de minerales</h3>
                        -- titulo_contrato_posecion  deel padre{{form_pagina.titulo_contrato_posecion}}
                        -- titulo_contrato_posecion_validacion valida deel padre{{form_pagina.titulo_contrato_posecion_validacion}}
                        -- titulo_contrato_posecion_correcto correcto deel padre{{form_pagina.titulo_contrato_posecion_correcto}}
                        -- obs_titulo_contrato_posecion observacion deel padre{{form_pagina.obs_titulo_contrato_posecion}}
                        -- obs_titulo_contrato_posecion_valido observacion valida deel padre{{form_pagina.obs_titulo_contrato_posecion_valido}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Volver Arriba</a>
        </div>
        <div v-show="mostrar_testing">
            <h1>los minerales en el padre son</h1>
            {{minerales_locales}}
        </div>
<!-- el id es: {{$props.id}} -->
        <BotonesPaginaCuatro
        v-if="$props.mostrar_boton_guardar_cuatro"

            :link_volver="route('formulario-alta.index')"
            :titulo_boton_volver="'volver'"
            :titulo_boton_guardar="'Guardar Datos de la Mina'"

            :numero_expdiente="form_pagina.numero_expdiente"
            :numero_expdiente_valido="form_pagina.numero_expdiente_valido"
            :numero_expdiente_correcto="form_pagina.numero_expdiente_correcto"
            :obs_numero_expdiente="form_pagina.obs_numero_expdiente"
            :obs_numero_expdiente_valido="form_pagina.obs_numero_expdiente_valido"
            :categoria="form_pagina.categoria"
            :categoria_validacion="form_pagina.categoria_validacion"
            :categoria_correcto="form_pagina.categoria_correcto"
            :obs_categoria="form_pagina.obs_categoria"
            :obs_categoria_valido="form_pagina.obs_categoria_valido"
            :nombre_mina="form_pagina.nombre_mina"
            :nombre_mina_validacion="form_pagina.nombre_mina_validacion"
            :nombre_mina_correcto="form_pagina.nombre_mina_correcto"
            :obs_nombre_mina="form_pagina.obs_nombre_mina"
            :obs_nombre_mina_valido="form_pagina.obs_nombre_mina_valido"
            :descripcion_mina="form_pagina.descripcion_mina"
            :descripcion_mina_validacion="form_pagina.descripcion_mina_validacion"
            :descripcion_mina_correcto="form_pagina.descripcion_mina_correcto"
            :obs_descripcion_mina="form_pagina.obs_descripcion_mina"
            :obs_descripcion_mina_valido="form_pagina.obs_descripcion_mina_valido"
            :distrito_minero="form_pagina.distrito_minero"
            :distrito_minero_validacion="form_pagina.distrito_minero_validacion"
            :distrito_minero_correcto="form_pagina.distrito_minero_correcto"
            :obs_distrito_minero="form_pagina.obs_distrito_minero"
            :obs_distrito_minero_valido="form_pagina.obs_distrito_minero_valido"
            :mina_cantera="form_pagina.mina_cantera"
            :mina_cantera_validacion="form_pagina.mina_cantera_validacion"
            :mina_cantera_correcto="form_pagina.mina_cantera_correcto"
            :obs_mina_cantera="form_pagina.obs_mina_cantera"
            :obs_mina_cantera_valido="form_pagina.obs_mina_cantera_valido"
            :plano_inmueble="form_pagina.plano_inmueble"
            :plano_inmueble_validacion="form_pagina.plano_inmueble_validacion"
            :plano_inmueble_correcto="form_pagina.plano_inmueble_correcto"
            :obs_plano_inmueble="form_pagina.obs_plano_inmueble"
            :obs_plano_inmueble_valido="form_pagina.obs_plano_inmueble_valido"
            :minerales_variedad="form_pagina.minerales_variedad"
            :minerales_variedad_validacion="form_pagina.minerales_variedad_validacion"
            :minerales_variedad_correcto="form_pagina.minerales_variedad_correcto"
            :obs_minerales_variedad="form_pagina.obs_minerales_variedad"
            :obs_minerales_variedad_valido="form_pagina.obs_minerales_variedad_valido"
            :resolucion_concesion_minera="form_pagina.resolucion_concesion_minera"
            :resolucion_concesion_minera_validacion="form_pagina.resolucion_concesion_minera_validacion"
            :resolucion_concesion_minera_correcto="form_pagina.resolucion_concesion_minera_correcto"
            :obs_resolucion_concesion_minera="form_pagina.obs_resolucion_concesion_minera"
            :obs_resolucion_concesion_minera_valido="form_pagina.obs_resolucion_concesion_minera_valido"
            :titulo_contrato_posecion="form_pagina.titulo_contrato_posecion"
            :titulo_contrato_posecion_validacion="form_pagina.titulo_contrato_posecion_validacion"
            :titulo_contrato_posecion_correcto="form_pagina.titulo_contrato_posecion_correcto"
            :obs_titulo_contrato_posecion="form_pagina.obs_titulo_contrato_posecion"
            :obs_titulo_contrato_posecion_valido="form_pagina.obs_titulo_contrato_posecion_valido"

            :minerales="minerales_locales"

            :donde_guardar="$props.donde_estoy"

            :evaluacion="autoridad_minera"
            :testing ="mostrar_testing"
            :id="$props.id"
        >

        </BotonesPaginaCuatro>
    </div>
</template>

<script>
import JetDialogModal from '@/Jetstream/DialogModal';
import CardMinaUno from '@/Jetstream/altas/CardMinaUno';
import NumeroExpedienteMina from "@/Pages/Productors/NumeroExpedienteMina";

import DistritoMinero from "@/Pages/Productors/DistritoMinero";
import NombreMina from "@/Pages/Productors/NombreMina";
import SelectGenerico from "@/Pages/Productors/SelectGenerico";
import InputFileGenerico from "@/Pages/Productors/InputFileGenerico";
import ListadeMinerales from "@/Pages/Productors/ListadeMinerales";
import SubirArchivo from "@/Pages/Productors/SubirArchivo";
import BotonesPaginaCuatro from "@/Pages/Productors/BotonesPaginaCuatro";
export default {
     props: [
        'link_volver', 
        'titulo_boton_volver',
        'titulo_boton_guardar',
        'titulo_pagina',

        'numero_expdiente',
        'numero_expdiente_valido',
        'numero_expdiente_correcto',
        'obs_numero_expdiente',
        'obs_numero_expdiente_valido',
        'mostrar_num_exp',
        'desactivar_num_exp',
        'mostrar_num_exp_correccion',
        'desactivar_num_exp_correccion',

        'categoria',
        'categoria_validacion',
        'categoria_correcto',
        'obs_categoria',
        'obs_categoria_valido',
        'mostrar_categoria',
        'desactivar_categoria',
        'mostrar_categoria_correccion',
        'desactivar_categoria_correccion',


        'nombre_mina',
        'nombre_mina_validacion',
        'nombre_mina_correcto',
        'obs_nombre_mina',
        'obs_nombre_mina_valido',
        'mostrar_nombre_mina',
        'desactivar_nombre_mina',
        'mostrar_nombre_mina_correccion',
        'desactivar_nombre_mina_correccion',

        'descripcion_mina',
        'descripcion_mina_validacion',
        'descripcion_mina_correcto',
        'obs_descripcion_mina',
        'obs_descripcion_mina_valido',
        'mostrar_descripcion_mina',
        'desactivar_descripcion_mina',
        'mostrar_descripcion_mina_correccion',
        'desactivar_descripcion_mina_correccion',


        'distrito_minero',
        'distrito_minero_validacion',
        'distrito_minero_correcto',
        'obs_distrito_minero',
        'obs_distrito_minero_valido',
        'mostrar_distrito',
        'desactivar_distrito',
        'mostrar_distrito_correccion',
        'desactivar_distrito_correccion',

        'mina_cantera',
        'mina_cantera_validacion',
        'mina_cantera_correcto',
        'obs_mina_cantera',
        'obs_mina_cantera_valido',

        'plano_inmueble',
        'plano_inmueble_validacion',
        'plano_inmueble_correcto',
        'obs_plano_inmueble',
        'obs_plano_inmueble_valido',
        'mostrar_plano_mina',
        'desactivar_plano_mina',
        'mostrar_plano_mina_correccion',
        'desactivar_plano_mina_correccion',

        'minerales_variedad',
        'minerales_variedad_validacion',
        'minerales_variedad_correcto',
        'obs_minerales_variedad',
        'obs_minerales_variedad_valido',
        'mostrar_minerales',
        'desactivar_minerales',
        'mostrar_minerales_correccion',
        'desactivar_minerales_correccion',


        'resolucion_concesion_minera',
        'resolucion_concesion_minera_validacion',
        'resolucion_concesion_minera_correcto',
        'obs_resolucion_concesion_minera',
        'obs_resolucion_concesion_minera_valido',
        'mostrar_resolucion_concesion',
        'desactivar_resolucion_concesion',
        'mostrar_resolucion_concesion_correccion',
        'desactivar_resolucion_concesion_correccion',

        'titulo_contrato_posecion',
        'titulo_contrato_posecion_validacion',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'obs_titulo_contrato_posecion_valido',
        'mostrar_titulo',
        'desactivar_titulo',
        'mostrar_titulo_correccion',
        'desactivar_titulo_correccion',


        'lista_minerales_desde_back',


        'mostrar_boton_guardar_cuatro',
        'desactivar_boton_guardar_cuatro',


        'evaluacion',
        'id',
        'testing'
    ],
 
    components: {
		JetDialogModal,
        CardMinaUno,
		NumeroExpedienteMina,
		DistritoMinero,
		NombreMina,
        SelectGenerico,
        InputFileGenerico,
        ListadeMinerales,
		BotonesPaginaCuatro,
        SubirArchivo,
	},
   
  data() {
    return {
        saludos: 'Saludame qweqweqwe',
        mostrar_modal_datos_ya_guardados:false,
        modal_tittle:'',
        modal_body:'',
        mostrar_testing: this.$props.testing,
        autoridad_minera:this.$props.evaluacion,
        ayuda_local: false,
        resolucion_local: '',
        inmueble_local: '',
        titulo_local: '',

        lista_de_minerales:[],

        
        form_pagina: {

            numero_expdiente : this.$props.numero_expdiente,
            numero_expdiente_valido: this.$props.numero_expdiente_valido,
            numero_expdiente_correcto: this.$props.numero_expdiente_correcto,
            obs_numero_expdiente:  this.$props.obs_numero_expdiente,
            obs_numero_expdiente_valido : this.$props.obs_numero_expdiente_valido,


            distrito_minero : this.$props.distrito_minero,
            distrito_minero_validacion: this.$props.distrito_minero_validacion,
            distrito_minero_correcto: this.$props.distrito_minero_correcto,
            obs_distrito_minero:  this.$props.obs_distrito_minero,
            obs_distrito_minero_valido : this.$props.obs_distrito_minero_valido,


            nombre_mina : this.$props.nombre_mina,
            nombre_mina_validacion: this.$props.nombre_mina_validacion,
            nombre_mina_correcto: this.$props.nombre_mina_correcto,
            obs_nombre_mina:  this.$props.obs_nombre_mina,
            obs_nombre_mina_valido : this.$props.obs_nombre_mina_valido,

            descripcion_mina: this.$props.descripcion_mina,
            descripcion_mina_validacion: this.$props.descripcion_mina_validacion,
            descripcion_mina_correcto: this.$props.descripcion_mina_correcto,
            obs_descripcion_mina: this.$props.obs_descripcion_mina,
            obs_descripcion_mina_valido: this.$props.obs_descripcion_mina_valido,


            categoria: this.$props.categoria,
            categoria_validacion: this.$props.categoria_validacion,
            categoria_correcto: this.$props.categoria_correcto,
            obs_categoria: this.$props.obs_categoria,
            obs_categoria_valido: this.$props.obs_categoria_valido,

            resolucion_concesion_minera : this.$props.resolucion_concesion_minera,
            resolucion_concesion_minera_validacion: this.$props.resolucion_concesion_minera_validacion,
            resolucion_concesion_minera_correcto: this.$props.resolucion_concesion_minera_correcto,
            obs_resolucion_concesion_minera:  this.$props.obs_resolucion_concesion_minera,
            obs_resolucion_concesion_minera_valido : this.$props.obs_resolucion_concesion_minera_valido,


            plano_inmueble : this.$props.plano_inmueble,
            plano_inmueble_validacion: this.$props.plano_inmueble_validacion,
            plano_inmueble_correcto: this.$props.plano_inmueble_correcto,
            obs_plano_inmueble:  this.$props.obs_plano_inmueble,
            obs_plano_inmueble_valido : this.$props.obs_plano_inmueble_valido,


            
            titulo_contrato_posecion: this.$props.titulo_contrato_posecion,
            titulo_contrato_posecion_validacion: this.$props.titulo_contrato_posecion_validacion,
            titulo_contrato_posecion_correcto: this.$props.titulo_contrato_posecion_correcto,
            obs_titulo_contrato_posecion: this.$props.obs_titulo_contrato_posecion,
            obs_titulo_contrato_posecion_valido: this.$props.obs_titulo_contrato_posecion_valido,
            

            mina_cantera: '',

        },
        
        minerales_locales: [],
        
            

    };
  },
  methods:{
      cerrar_modal_datos_uno() {
            this.mostrar_modal_datos_ya_guardados = false
		},
        // FUNCIONES DE NUMERO DE EXPEDIENTE
        update_num_exp_valido(newValue){
                this.form_pagina.numero_expdiente_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_num_exp_correcto(newValue){
            this.form_pagina.numero_expdiente_correcto = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_num_exp(newValue){
            this.form_pagina.obs_numero_expdiente = newValue;
            //tengo que enviarsela al padre
        },
        updateobs_num_exp_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_numero_expdiente_valido = newValue;
            //tengo que enviarsela al padre
        },
        updatevalor_num_exp(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.numero_expdiente = newValue;
            //tengo que enviarsela al padre
        },

        // FUNCIONES DE Distrito MINERO
        update_distrito_minero_valido(newValue){
            this.form_pagina.distrito_minero_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_correcto(newValue){
            this.form_pagina.distrito_minero_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_obs(newValue){
            this.form_pagina.obs_distrito_minero = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero_valido_obs(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_distrito_minero_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_distrito_minero(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.distrito_minero = newValue;
            //tengo que enviarsela al padre
        },

        // FUNCIONES DE NOMBRE DE MINA
        update_nom_mina_valido(newValue){
            this.form_pagina.nombre_mina_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_nom_mina_correcto(newValue){
            this.form_pagina.nombre_mina_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nom_mina(newValue){
            this.form_pagina.obs_nombre_mina = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_nom_mina_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_nombre_mina_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_nom_mina_(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.nombre_mina = newValue;
            //tengo que enviarsela al padre
        },
        //FUNCIONES DE DESCRIPCION DE MINA
        update_descripcion_valido(newValue){
            this.form_pagina.descripcion_mina_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_descripcion_correcto(newValue){
            this.form_pagina.descripcion_mina_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_descripcion(newValue){
            this.form_pagina.obs_descripcion_mina = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_descripcion_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_descripcion_mina_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_descripcion(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.descripcion_mina = newValue;
            //tengo que enviarsela al padre
        },


        //FUNCIONES DE CATEGORIA
        update_cat_valido(newValue){
            this.form_pagina.categoria_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_cat_correcto(newValue){
            this.form_pagina.categoria_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cat(newValue){
            this.form_pagina.obs_categoria = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_cat_valida(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_categoria_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_cat(newValue){
            let self  =this;
            //alert("cambie la categoria de:"+newValue);
            console.log("traje un"+newValue);
            this.form_pagina.categoria = newValue;
            //alert("cambie la categoria de:"+newValue);
            if(newValue === 'primera')
                self.form_pagina.mina_cantera='Mina';
            if(newValue === 'segunda')
                self.form_pagina.mina_cantera='Mina';
            if(newValue === 'tercera')
                self.form_pagina.mina_cantera='Cantera';

           axios.post('/datos/traer_minerales/',{categoria_buscando:newValue})
                .then(function (response) {
                    console.log("las manifestaciones son:\n");
                    self.lista_de_minerales = response.data;
                    console.log(self.lista_de_minerales);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },





        cambio_el_archivo_resolucion(newValue){
            this.resolucion_local = newValue;
            this.form_pagina.resolucion_concesion_minera = this.resolucion_local;
        },

        cambio_el_archivo_inmueble(newValue){
            this.inmueble_local = newValue;
            this.form_pagina.plano_inmueble = this.inmueble_local;
        },
        cambio_el_archivo_titulo(newValue){
            this.titulo_local = newValue;
            this.form_pagina.titulo_contrato_posecion = this.titulo_local;
        },







        update_resol_conce_valido(newValue){
            this.form_pagina.resolucion_concesion_minera_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_resol_conce_correcto(newValue){
            this.form_pagina.resolucion_concesion_minera_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_resol_conce(newValue){
            this.form_pagina.obs_resolucion_concesion_minera = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_resol_conce_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_resolucion_concesion_minera_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_resol_conce(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.resolucion_concesion_minera = newValue;
            //tengo que enviarsela al padre
        },

        


        update_plano_inmueble_valido(newValue){
            this.form_pagina.plano_inmueble_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_plano_inmueble_correcto(newValue){
            this.form_pagina.plano_inmueble_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_plano_inmueble(newValue){
            this.form_pagina.obs_plano_inmueble = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_plano_inmueble_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_plano_inmueble_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_plano_inmueble(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.plano_inmueble = newValue;
            //tengo que enviarsela al padre
        },






        update_titulo_contrato_valido(newValue){
            this.form_pagina.titulo_contrato_posecion_validacion = newValue;
            //tengo que enviarsela al padre
        },
        update_titulo_contrato_correcto(newValue){
            this.form_pagina.titulo_contrato_posecion_correcto = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_titulo_contrato(newValue){
            this.form_pagina.obs_titulo_contrato_posecion = newValue;
            //tengo que enviarsela al padre
        },
        update_obs_titulo_contrato_valido(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.obs_titulo_contrato_posecion_valido = newValue;
            //tengo que enviarsela al padre
        },
        update_valor_titulo_contrato(newValue){
            console.log("traje un"+newValue);
            this.form_pagina.titulo_contrato_posecion = newValue;
            //tengo que enviarsela al padre
        },


        //mostrar ayuda
        update_valor_ayuda_local(newValor){
            this.ayuda_local = newValor;
        },







        //FUNCIONES DE MINERALES
        //minerales_locales
        
        update_valor_minerales(newValue){
            console.log("traje un"+newValue);
            this.minerales_locales = newValue;
            //tengo que enviarsela al padre
        },
        // mounted(){
        //     this.lista_de_minerales = this.$props.lista_minerales_precargados;
        // }

  },
  mounted(){
      //cargo la lista de mienrales por primera vez
    let self = this;
    console.log("voy a buscar la categproa:");
    console.log(this.$props.categoria);
	if( this.$props.categoria !== '') {
		//signafica que tengo la lsita de minerales para esta categoria
		this.$nextTick(() => {
        axios.post('/datos/traer_minerales',{categoria_buscando:this.$props.categoria})
            .then(function (response) {
                console.log("los minerales son:\n");
                self.lista_de_minerales = response.data;
                console.log(self.lista_de_minerales);
            })
            .catch(function (error) {
                console.log(error);
            });
        });
	}
	else{self.lista_de_minerales=[];}
  }
  
};
</script>
