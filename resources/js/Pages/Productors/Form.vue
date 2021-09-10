<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
					Dandose de Alta como nuevo Productor Minero en la Provincia de {{$props.nombre_provincia}}, id {{form.id}}
				</h1>
				
				<button
					type="button"
					class="animate-pulse text-white text-lg mx-auto py-6 px-20 rounded-full block  border-b border-blue-300 bg-blue-200 hover:bg-blue-300 text-blue-700"
					@click="mostrar_explicacion"
				>
					Necesita Ayuda?
					
				</button>
				
				<form @submit.prevent="submit" class="mb-8">
					<div class="row">
						<banner></banner>
					</div>
					<br>
					<hr>
					
					<br>
					<!-- Delete Account Confirmation Modal -->
					<jet-dialog-modal class="w-full" :show="confirmingUserDeletion" @close="closeModal">
						<template #title>
								{{modal_tittle}}
						</template>
						<template #content>
								{{modal_body}}
								<br>
								<br>
								<Pasos />
						</template>
						<template #footer>
							<button @click="closeModal" class="py-3 px-6 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block">
								Comencemos
							</button>
						</template>
					</jet-dialog-modal>
					
					<div id="inicio"></div>
					<div class="flex items-center justify-center">
						<div class="grid grid-cols-1 gap-6 sm:grid-cols-4 md:grid-cols-7 lg:grid-cols-7 xl:grid-cols-7">
							<!-- 1 card -->
							<CardProductor  
							v-if="$props.mostrar.paso_uno"
							:progreso="form.valor_de_progreso"
							:aprobado="form.valor_de_aprobado"
							:reprobado="form.valor_de_reprobado" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:mostrarayuda = false
							:evaluacion ="evaluacion_global"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"

							></CardProductor>

							<!-- 2 card -->
							<CardDomLegal 
							v-if="$props.mostrar.paso_dos" 
								:progreso="form.valor_de_progreso_dos"
								:aprobado="form.valor_de_aprobado_dos"
								:reprobado="form.valor_de_reprobado_dos" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:mostrarayuda = false
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
							></CardDomLegal>

						
							<!-- 3 card -->
							
							<CardDomAdmin 
							v-if="$props.mostrar.paso_tres" 
								:progreso="form.valor_de_progreso_tres"
								:aprobado="form.valor_de_aprobado_tres"
								:reprobado="form.valor_de_reprobado_tres" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:mostrarayuda = false
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
							></CardDomAdmin>
							

							<!-- 4 card -->
							<CardMinaUno 
							v-if="$props.mostrar.paso_cuatro" 
								:progreso="form.valor_de_progreso_cuatro"
								:aprobado="form.valor_de_aprobado_cuatro"
								:reprobado="form.valor_de_reprobado_cuatro" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:mostrarayuda= false
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaUno>

							<!-- 5 card -->
							<CardMinaDos  
							v-if="$props.mostrar.paso_cinco" 
								:progreso="form.valor_de_progreso_cinco"
								:aprobado="form.valor_de_aprobado_cinco"
								:reprobado="form.valor_de_reprobado_cinco" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:mostrarayuda= false
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaDos>

							<CardMinaUbicacion 
							v-if="$props.mostrar.paso_seis" 
								:progreso="form.valor_de_progreso_seis"
								:aprobado="form.valor_de_aprobado_seis"
								:reprobado="form.valor_de_reprobado_seis" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaUbicacion>

							<CardCatamarca
							v-if="$props.mostrar.paso_catamarca" 
								:progreso="form.valor_de_progreso_seis"
								:aprobado="form.valor_de_aprobado_seis"
								:reprobado="form.valor_de_reprobado_seis" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:evaluacion ="evaluacion_global"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardCatamarca>

							
						

							<!-- 4 card -->
							<CardTotal  
								v-if="evaluacion_global"
								:progreso="form.valor_de_progreso_seis"
								:aprobado="form.valor_de_aprobado_seis"
								:reprobado="form.valor_de_reprobado_seis" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
								></CardTotal>
							
						</div>
					</div>
					<br>
					<div class="flex justify-center md:justify-end -mt-16 sticky top-10">
						<a href="#inicio">
							<div class="flex items-center absolute shadow-xl left-8 top-10">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="animate-bounce bi bi-arrow-up" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
								</svg>
							</div>
						</a>
					</div>
					<br>

				<div id="section_productor"></div>
				<PaginaUnoDatosProductores
				v-if="$props.mostrar.paso_uno"
					:link_volver="route('formulario-alta.index')"
					:titulo_boton_volver="'volver'"
					:titulo_boton_guardar="'Guardar Datos del Productor'"
					:titulo_pagina="'Página datos de Productor'"

					:razon_social="form.razon_social" 
					:razon_social_valido="form.razon_social_valido"
					:razon_social_correcto="form.razon_social_correcto"
					:obs_razon_social="form.obs_razon_social"
					:obs_razon_social_valido="form.obs_razon_social_valido"
					:mostrar_razon_social="$props.mostrar.razon_social"
					:desactivar_razon_social="$props.disables.razon_social"
					:mostrar_razon_social_correccion="$props.mostrar.razon_social_correccion"
					:desactivar_razon_social_correccion="$props.disables.razon_social_correccion"

					:email="form.email"
					:email_valido="form.email_valido"
					:email_correcto="form.email_correcto"
					:obs_email="form.obs_email"
					:obs_email_valido="form.obs_email_valido"
					:mostrar_email="$props.mostrar.email"
					:desactivar_email="$props.disables.email"
					:mostrar_email_correccion="$props.mostrar.email_correccion"
					:desactivar_email_correccion="$props.disables.email_correccion"

					:cuit="form.cuit"
					:cuit_valido="form.cuit_valido"
					:cuit_correcto="form.cuit_correcto"
					:obs_cuit="form.obs_cuit"
					:obs_cuit_valido="form.obs_cuit_valido"
					:mostrar_cuit="$props.mostrar.cuit"
					:desactivar_cuit="$props.disables.cuit"
					:mostrar_cuit_correccion="$props.mostrar.cuit_correccion"
					:desactivar_cuit_correccion="$props.disables.cuit_correccion"
					
					:numeroproductor="form.numeroproductor"
					:numeroproductor_valido="form.numeroproductor_valido"
					:numeroproductor_correcto="form.numeroproductor_correcto"
					:obs_numeroproductor="form.obs_numeroproductor"
					:obs_numeroproductor_valido="form.obs_numeroproductor_valido"
					:mostrar_num_prod="$props.mostrar.num_prod"
					:desactivar_num_prod="$props.disables.num_prod"
					:mostrar_num_prod_correccion="$props.mostrar.num_prod_correccion"
					:desactivar_num_prod_correccion="$props.disables.num_prod_correccion"
					
					:tiposociedad="form.tiposociedad"
					:tiposociedad_valido="form.tiposociedad_valido"
					:tiposociedad_correcto="form.tiposociedad_correcto"
					:obs_tiposociedad="form.obs_tiposociedad"
					:obs_tiposociedad_valido="form.obs_tiposociedad_valido"
					:mostrar_tipo_sociedad="$props.mostrar.tipo_sociedad"
					:desactivar_tipo_sociedad="$props.disables.tipo_sociedad"
					:mostrar_tipo_sociedad_correccion="$props.mostrar.num_prod_correccion"
					:desactivar_tipo_sociedad_correccion="$props.disables.num_prod_correccion"
					

					:inscripciondgr="form.inscripciondgr"
					:inscripciondgr_valido="form.inscripciondgr_valido"
					:inscripciondgr_correcto="form.inscripciondgr_correcto"
					:obs_inscripciondgr="form.obs_inscripciondgr"
					:obs_inscripciondgr_valido="form.obs_inscripciondgr_valido"
					:mostrar_inscripcion_dgr="$props.mostrar.inscripcion_dgr"
					:desactivar_inscripcion_dgr="$props.disables.inscripcion_dgr"
					:mostrar_inscripcion_dgr_correccion="$props.mostrar.inscripcion_dgr_correccion"
					:desactivar_inscripcion_dgr_correccion="$props.disables.inscripcion_dgr_correccion"
					

					:constanciasociedad="form.constaciasociedad"
					:constanciasociedad_valido="form.constaciasociedad_valido"
					:constanciasociedad_correcto="form.constaciasociedad_correcto"
					:obs_constanciasociedad="form.obs_constaciasociedad"
					:obs_constanciasociedad_valido="form.obs_constaciasociedad_valido"
					:mostrar_constancia_sociedad="$props.mostrar.constancia_sociedad"
					:desactivar_constancia_sociedad="$props.disables.constancia_sociedad"
					:mostrar_constancia_sociedad_correccion="$props.mostrar.cosntancia_sociedad_correccion"
					:desactivar_constancia_sociedad_correccion="$props.disables.cosntancia_sociedad_correccion"

					:mostrar_boton_guardar_uno="$props.mostrar.boton_guardar_uno"
					:desactivar_boton_guardar_uno="$props.disables.boton_guardar_uno"

					:evaluacion ="evaluacion_global"
					:testing ="testing_global"
					
					:id="form.id"

					v-on:ChangeRazonSocialEvaluacion="update_razon_social_evaluacion($event)"
					v-on:ChangeCuitEvaluacion="update_cuit_evaluacion($event)"
					v-on:ChangeNumProdEvaluacion="update_num_prod_evaluacion($event)"
					v-on:ChangeTipoSociedadEvaluacion="update_tipo_sociedad_evaluacion($event)"
					v-on:ChangeInscripcionDGREvaluacion="update_inscripcion_dgr_evaluacion($event)"
					v-on:ChangeConstanciaSociedadEvaluacion="update_constancia_sociedad_evaluacion($event)"
					v-on:CreeUnNuevoIdPasoAAbuelo="update_id_nuevo($event)"
					v-on:CreeUnNuevoIdAdcionalPasoAAbuelo="update_id_adicional_nuevo($event)"
					
				>
				</PaginaUnoDatosProductores>
				<br>
				<br>
				<div id="section_domicilio_legal"></div>
				<PaginaDosDatosDomLegal
				v-if="$props.mostrar.paso_dos"
					:link_volver="route('formulario-alta.index')"
					:titulo_boton_volver="'volver'"
					:titulo_boton_guardar="'Guardar Datos del Domicilio Legal'"
					:titulo_pagina="'Pagina datos de Domicilio Legal'"


					:leal_calle="form.leal_calle" 
					:nombre_calle_legal_valido="form.nombre_calle_legal_valido"
					:nombre_calle_legal_correcto="form.nombre_calle_legal_correcto"
					:obs_nombre_calle_legal="form.obs_nombre_calle_legal"
					:obs_nombre_calle_legal_valido="form.obs_nombre_calle_legal_valido"
					:mostrar_calle_legal="$props.mostrar.legal_calle"
					:desactivar_calle_legal="$props.disables.legal_calle"
					:mostrar_calle_legal_correccion="$props.mostrar.legal_calle_correccion"
					:desactivar_calle_legal_correccion="$props.disables.legal_calle_correccion"
					
					:leal_numero="form.leal_numero"
					:leal_numero_valido="form.leal_numero_valido"
					:leal_numero_correcto="form.leal_numero_correcto"
					:obs_leal_numero="form.obs_leal_numero"
					:obs_leal_numero_valido="form.obs_leal_numero_valido"
					:mostrar_legal_calle_num="$props.mostrar.legal_calle_num"
					:desactivar_legal_calle_num="$props.disables.legal_calle_num"
					:mostrar_legal_calle_num_correccion="$props.mostrar.legal_calle_num_correccion"
					:desactivar_legal_calle_num_correccion="$props.disables.legal_calle_num_correccion"
					
					:leal_telefono="form.leal_telefono"
					:leal_telefono_valido="form.leal_telefono_valido"
					:leal_telefono_correcto="form.leal_telefono_correcto"
					:obs_leal_telefono="form.obs_leal_telefono"
					:obs_leal_telefono_valido="form.obs_leal_telefono_valido"
					:mostrar_legal_telefono="$props.mostrar.legal_telefono"
					:desactivar_legal_telefono="$props.disables.legal_telefono"
					:mostrar_legal_telefono_correccion="$props.mostrar.legal_telefono_correccion"
					:desactivar_legal_telefono_correccion="$props.disables.legal_telefono_correccion"
					
					:leal_pais="form.leal_pais"
					:leal_pais_valido="form.leal_pais_valido"
					:leal_pais_correcto="form.leal_pais_correcto"
					:obs_leal_pais="form.obs_leal_pais"
					:obs_leal_pais_valido="form.obs_leal_pais_valido"

					:leal_provincia="form.leal_provincia"
					:leal_provincia_valido="form.leal_provincia_valido"
					:leal_provincia_correcto="form.leal_provincia_correcto"
					:obs_leal_provincia="form.obs_leal_provincia"
					:obs_leal_provincia_valido="form.obs_leal_provincia_valido"
					:mostrar_legal_prov="$props.mostrar.legal_prov"
					:desactivar_legal_prov="$props.disables.legal_prov"
					:mostrar_legal_prov_correccion="$props.mostrar.legal_prov_correccion"
					:desactivar_legal_prov_correccion="$props.disables.legal_prov_correccion"
					

					:leal_departamento="form.leal_departamento"
					:leal_departamento_valido="form.leal_departamento_valido"
					:leal_departamento_correcto="form.leal_departamento_correcto"
					:obs_leal_departamento="form.obs_leal_departamento"
					:obs_leal_departamento_valido="form.obs_leal_departamento_valido"
					:mostrar_legal_dpto="$props.mostrar.legal_dpto"
					:desactivar_legal_dpto="$props.disables.legal_dpto"
					:mostrar_legal_dpto_correccion="$props.mostrar.legal_dpto_correccion"
					:desactivar_legal_dpto_correccion="$props.disables.legal_dpto_correccion"
					

					:leal_localidad="form.leal_localidad"
					:leal_localidad_valido="form.leal_localidad_valido"
					:leal_localidad_correcto="form.leal_localidad_correcto"
					:obs_leal_localidad="form.obs_leal_localidad"
					:obs_leal_localidad_valido="form.obs_leal_localidad_valido"
					:mostrar_legal_localidad="$props.mostrar.legal_localidad"
					:desactivar_legal_localidad="$props.disables.legal_localidad"
					:mostrar_legal_localidad_correccion="$props.mostrar.legal_localidad_correccion"
					:desactivar_legal_localidad_correccion="$props.disables.legal_localidad_correccion"
					


					:leal_cp="form.leal_cp"
					:leal_cp_valido="form.leal_cp_valido"
					:leal_cp_correcto="form.leal_cp_correcto"
					:obs_leal_cp="form.obs_leal_cp"
					:obs_leal_cp_valido="form.obs_leal_cp_valido"
					:mostrar_legal_cod_pos="$props.mostrar.legal_cod_pos"
					:desactivar_legal_cod_pos="$props.disables.legal_cod_pos"
					:mostrar_legal_cod_pos_correccion="$props.mostrar.legal_cod_pos_correccion"
					:desactivar_legal_cod_pos_correccion="$props.disables.legal_cod_pos_correccion"
					

					:leal_otro="form.leal_otro"
					:leal_otro_valido="form.leal_otro_valido"
					:leal_otro_correcto="form.leal_otro_correcto"
					:obs_leal_otro="form.obs_leal_otro"
					:obs_leal_otro_valido="form.obs_leal_otro_valido"
					:mostrar_legal_otro="$props.mostrar.legal_otro"
					:desactivar_legal_otro="$props.disables.legal_otro"
					:mostrar_legal_otro_correccion="$props.mostrar.legal_otro_correccion"
					:desactivar_legal_otro_correccion="$props.disables.legal_otro_correccion"
					


					:donde_estoy="'legal'"
					:lista_provincias="lista_provincias"
					:lista_dptos="lista_dptos_legal"

					:mostrar_boton_guardar_dos="$props.mostrar.boton_guardar_dos"
					:desactivar_boton_guardar_dos="$props.disables.boton_guardar_dos"


					:evaluacion ="evaluacion_global"
					:testing ="testing_global"
					:id="form.id"
					>

				</PaginaDosDatosDomLegal>
			

				<br>
			<div class="flex items-center justify-center">
			</div>
			<br>
			<br>
			<div class="flex items-center justify-center">
			</div>
			<div id="section_domicilio_administrativo"></div>
			<PaginaDosDatosDomLegal
			v-if="$props.mostrar.paso_tres"

				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos del Domicilio Administrativo'"
				:titulo_pagina="'Pagina datos de Domicilio Administrativo'"

				:leal_calle="form.administracion_calle"
				:nombre_calle_legal_valido="form.administracion_calle_valido"
				:nombre_calle_legal_correcto="form.administracion_calle_correcto"
				:obs_nombre_calle_legal="form.obs_administracion_calle_nombre"
				:obs_nombre_calle_legal_valido="form.obs_administracion_calle_nombre_valido"
				:mostrar_calle_legal="$props.mostrar.administracion_calle"
				:desactivar_calle_legal="$props.disables.administracion_calle"
				:mostrar_calle_legal_correccion="$props.mostrar.administracion_correccion"
				:desactivar_calle_legal_correccion="$props.disables.administracion_correccion"
				

				:leal_numero="form.administracion_numero"
				:leal_numero_valido="form.administracion_numero_valido"
				:leal_numero_correcto="form.administracion_numero_correcto"
				:obs_leal_numero="form.obs_administracion_numero_nombre"
				:obs_leal_numero_valido="form.obs_administracion_numero_nombre_valido"
				:mostrar_legal_calle_num="$props.mostrar.administracion_calle_num"
				:desactivar_legal_calle_num="$props.disables.administracion_calle_num"
				:mostrar_legal_calle_num_correccion="$props.mostrar.administracion_calle_num_correccion"
				:desactivar_legal_calle_num_correccion="$props.disables.administracion_calle_num_correccion"
				
				:leal_telefono="form.administracion_telefono"
				:leal_telefono_valido="form.administracion_telefono_valido"
				:leal_telefono_correcto="form.administracion_telefono_correcto"
				:obs_leal_telefono="form.obs_administracion_telefono_nombre"
				:obs_leal_telefono_valido="form.obs_administracion_telefono_nombre_valido"
				:mostrar_legal_telefono="$props.mostrar.administracion_telefono"
				:desactivar_legal_telefono="$props.disables.administracion_telefono"
				:mostrar_legal_telefono_correccion="$props.mostrar.legal_telefono_correccion"
				:desactivar_legal_telefono_correccion="$props.disables.administracion_telefono_correccion"
					

				:leal_pais="form.administracion_pais"
				:leal_pais_valido="form.administracion_pais_valido"
				:leal_pais_correcto="form.administracion_pais_correcto"
				:obs_leal_pais="form.obs_administracion_pais"
				:obs_leal_pais_valido="form.obs_administracion_pais_valido"
				:leal_provincia="form.administracion_provincia"
				:leal_provincia_valido="form.administracion_provincia_valido"
				:leal_provincia_correcto="form.administracion_provincia_correcto"
				:obs_leal_provincia="form.obs_administracion_provincia"
				:obs_leal_provincia_valido="form.obs_administracion_provincia_valido"
				:mostrar_legal_prov="$props.mostrar.administracion_prov"
				:desactivar_legal_prov="$props.disables.administracion_prov"
				:mostrar_legal_prov_correccion="$props.mostrar.administracion_prov_correccion"
				:desactivar_legal_prov_correccion="$props.disables.administracion_prov_correccion"
				

				:leal_departamento="form.administracion_departamento"
				:leal_departamento_valido="form.administracion_departamento_valido"
				:leal_departamento_correcto="form.administracion_departamento_correcto"
				:obs_leal_departamento="form.obs_administracion_departamento"
				:obs_leal_departamento_valido="form.obs_administracion_departamento_valido"
				:mostrar_legal_dpto="$props.mostrar.administracion_dpto"
				:desactivar_legal_dpto="$props.disables.administracion_dpto"
				:mostrar_legal_dpto_correccion="$props.mostrar.administracion_dpto_correccion"
				:desactivar_legal_dpto_correccion="$props.disables.administracion_dpto_correccion"
				

				:leal_localidad="form.administracion_localidad"
				:leal_localidad_valido="form.administracion_localidad_valido"
				:leal_localidad_correcto="form.administracion_localidad_correcto"
				:obs_leal_localidad="form.obs_administracion_localidad"
				:obs_leal_localidad_valido="form.obs_administracion_localidad_valido"
				:mostrar_legal_localidad="$props.mostrar.administracion_localidad"
				:desactivar_legal_localidad="$props.disables.administracion_localidad"
				:mostrar_legal_localidad_correccion="$props.mostrar.administracion_localidad_correccion"
				:desactivar_legal_localidad_correccion="$props.disables.administracion_localidad_correccion"
				
				:leal_cp="form.administracion_cp"
				:leal_cp_valido="form.administracion_cp_valido"
				:leal_cp_correcto="form.administracion_cp_correcto"
				:obs_leal_cp="form.obs_administracion_cp"
				:obs_leal_cp_valido="form.obs_administracion_cp_valido"
				:mostrar_legal_cod_pos="$props.mostrar.administracion_cod_pos"
				:desactivar_legal_cod_pos="$props.disables.administracion_cod_pos"
				:mostrar_legal_cod_pos_correccion="$props.mostrar.administracion_cod_pos_correccion"
				:desactivar_legal_cod_pos_correccion="$props.disables.administracion_cod_pos_correccion"
				
				:leal_otro="form.administracion_otro"
				:leal_otro_valido="form.administracion_otro_valido"
				:leal_otro_correcto="form.administracion_otro_correcto"
				:obs_leal_otro="form.obs_administracion_otro"
				:obs_leal_otro_valido="form.obs_administracion_otro_valido"
				:mostrar_legal_otro="$props.mostrar.administracion_otro"
				:desactivar_legal_otro="$props.disables.administracion_otro"
				:mostrar_legal_otro_correccion="$props.mostrar.administracion_otro_correccion"
				:desactivar_legal_otro_correccion="$props.disables.administracion_otro_correccion"
					

				:donde_estoy="'administrativo'"
				:lista_provincias="lista_provincias"
				:lista_dptos="lista_dptos_admin"

				:mostrar_boton_guardar_dos="$props.mostrar.boton_guardar_tres"
				:desactivar_boton_guardar_dos="$props.disables.boton_guardar_tres"

				:evaluacion ="evaluacion_global"
				:testing="testing_global"
				:id="form.id"
				>
			

			</PaginaDosDatosDomLegal>
			<br>
			<div class="flex items-center justify-center">
			</div>
			<div id="section_mina_uno"></div>
			
			<PaginaCuatroDatosMinaUno
			v-if="$props.mostrar.paso_cuatro"
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos de Mina Primer Parte'"
				:titulo_pagina="'Pagina datos de Mina Primera Parte'"

				:numero_expdiente="form.numero_expdiente"
				:numero_expdiente_valido="form.numero_expdiente_valido"
				:numero_expdiente_correcto="form.numero_expdiente_correcto"
				:obs_numero_expdiente="form.obs_numero_expdiente"
				:obs_numero_expdiente_valido="form.obs_numero_expdiente_valido"
				:mostrar_num_exp="$props.mostrar.num_exp"
				:desactivar_num_exp="$props.disables.num_exp"
				:mostrar_num_exp_correccion="$props.mostrar.num_exp_correccion"
				:desactivar_num_exp_correccion="$props.disables.num_exp_correccion"
					

				:categoria="form.categoria"
				:categoria_validacion="form.categoria_validacion"
				:categoria_correcto="form.categoria_correcto"
				:obs_categoria="form.obs_categoria"
				:obs_categoria_valido="form.obs_categoria_valido"
				:mostrar_categoria="$props.mostrar.categoria"
				:desactivar_categoria="$props.disables.categoria"
				:mostrar_categoria_correccion="$props.mostrar.categoria_correccion"
				:desactivar_categoria_correccion="$props.disables.categoria_correccion"
				

				:nombre_mina="form.nombre_mina"
				:nombre_mina_validacion="form.nombre_mina_validacion"
				:nombre_mina_correcto="form.nombre_mina_correcto"
				:obs_nombre_mina="form.obs_nombre_mina"
				:obs_nombre_mina_valido="form.obs_nombre_mina_valido"
				:mostrar_nombre_mina="$props.mostrar.nombre_mina"
				:desactivar_nombre_mina="$props.disables.nombre_mina"
				:mostrar_nombre_mina_correccion="$props.mostrar.nombre_mina_correccion"
				:desactivar_nombre_mina_correccion="$props.disables.nombre_mina_correccion"
				


				:descripcion_mina="form.descripcion_mina"
				:descripcion_mina_validacion="form.descripcion_mina_validacion"
				:descripcion_mina_correcto="form.descripcion_mina_correcto"
				:obs_descripcion_mina="form.obs_descripcion_mina"
				:obs_descripcion_mina_valido="form.obs_descripcion_mina_valido"
				:mostrar_descripcion_mina="$props.mostrar.descripcion_mina"
				:desactivar_descripcion_mina="$props.disables.descripcion_mina"
				:mostrar_descripcion_mina_correccion="$props.mostrar.descripcion_correccion"
				:desactivar_descripcion_mina_correccion="$props.disables.descripcion_correccion"
				
				:distrito_minero="form.distrito_minero"
				:distrito_minero_validacion="form.distrito_minero_validacion"
				:distrito_minero_correcto="form.distrito_minero_correcto"
				:obs_distrito_minero="form.obs_distrito_minero"
				:obs_distrito_minero_valido="form.obs_distrito_minero_valido"
				:mostrar_distrito="$props.mostrar.distrito"
				:desactivar_distrito="$props.disables.distrito"
				:mostrar_distrito_correccion="$props.mostrar.distrito_correccion"
				:desactivar_distrito_correccion="$props.disables.distrito_correccion"
				

				:mina_cantera="form.mina_cantera"
				:mina_cantera_validacion="form.mina_cantera_validacion"
				:mina_cantera_correcto="form.mina_cantera_correcto"
				:obs_mina_cantera="form.obs_mina_cantera"
				:obs_mina_cantera_valido="form.obs_mina_cantera_valido"

				:plano_inmueble="form.plano_inmueble"
				:plano_inmueble_validacion="form.plano_inmueble_validacion"
				:plano_inmueble_correcto="form.plano_inmueble_correcto"
				:obs_plano_inmueble="form.obs_plano_inmueble"
				:obs_plano_inmueble_valido="form.obs_plano_inmueble_valido"
				:mostrar_plano_mina="$props.mostrar.plano_mina"
				:desactivar_plano_mina="$props.disables.plano_mina"
				:mostrar_plano_mina_correccion="$props.mostrar.plano_mina_correccion"
				:desactivar_plano_mina_correccion="$props.disables.plano_mina_correccion"
				


				:minerales_variedad="form.minerales_variedad"
				:minerales_variedad_validacion="form.minerales_variedad_validacion"
				:minerales_variedad_correcto="form.minerales_variedad_correcto"
				:obs_minerales_variedad="form.obs_minerales_variedad"
				:obs_minerales_variedad_valido="form.obs_minerales_variedad_valido"
				:mostrar_minerales="$props.mostrar.minerales"
				:desactivar_minerales="$props.disables.minerales"
				:mostrar_minerales_correccion="$props.mostrar.minerales_correccion"
				:desactivar_minerales_correccion="$props.disables.minerales_correccion"
				
				:resolucion_concesion_minera="form.resolucion_concesion_minera"
				:resolucion_concesion_minera_validacion="form.resolucion_concesion_minera_validacion"
				:resolucion_concesion_minera_correcto="form.resolucion_concesion_minera_correcto"
				:obs_resolucion_concesion_minera="form.obs_resolucion_concesion_minera"
				:obs_resolucion_concesion_minera_valido="form.obs_resolucion_concesion_minera_valido"
				:mostrar_resolucion_concesion="$props.mostrar.resolucion_concesion"
				:desactivar_resolucion_concesion="$props.disables.resolucion_concesion"
				:mostrar_resolucion_concesion_correccion="$props.mostrar.resolucion_concesion_correccion"
				:desactivar_resolucion_concesion_correccion="$props.disables.resolucion_concesion_correccion"
				
				:titulo_contrato_posecion="form.titulo_contrato_posecion"
				:titulo_contrato_posecion_validacion="form.titulo_contrato_posecion_validacion"
				:titulo_contrato_posecion_correcto="form.titulo_contrato_posecion_correcto"
				:obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
				:obs_titulo_contrato_posecion_valido="form.obs_titulo_contrato_posecion_valido"
				:mostrar_titulo="$props.mostrar.titulo"
				:desactivar_titulo="$props.disables.titulo"
				:mostrar_titulo_correccion="$props.mostrar.titulo_correccion"
				:desactivar_titulo_correccion="$props.disables.titulo_correccion"
				
				:lista_minerales_desde_back = "lista_de_minerales_del_back"

				:mostrar_boton_guardar_cuatro="$props.mostrar.boton_guardar_cuatro"
				:desactivar_boton_guardar_cuatro="$props.disables.boton_guardar_cuatro"

				:evaluacion ="evaluacion_global"
				:id="form.id"
				:testing="testing_global"
			>
			</PaginaCuatroDatosMinaUno>
			
			<br>
			<br>
			<div class="flex items-center justify-center"></div>
			<br>
			<br>
			<div id="section_datos_mina_dos"></div>
			<PaginaCincoDatosMinaDos
			v-if="$props.mostrar.paso_cinco"
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos de Mina Segunda Parte'"
				:titulo_pagina="'Pagina datos de Mina Segunda Parte'"

				:owner="form.owner"
				:owner_correcto="form.owner_correcto"
				:obs_owner="form.obs_owner"
				:obs_owner_valido="form.obs_owner_valido"
				:mostrar_owner="$props.mostrar.owner"
				:desactivar_owner="$props.disables.owner"
				:mostrar_owner_correccion="$props.mostrar.owner_correccion"
				:desactivar_owner_correccion="$props.disables.owner_correccion"
				

				:arrendatario="form.arrendatario"
				:arrendatario_correcto="form.arrendatario_correcto"
				:obs_arrendatario="form.obs_arrendatario"
				:obs_arrendatario_valido="form.obs_arrendatario_valido"
				:mostrar_arrendatario="$props.mostrar.concesionario"
				:desactivar_arrendatario="$props.disables.concesionario"
				:mostrar_arrendatario_correccion="$props.mostrar.concesionario_correccion"
				:desactivar_arrendatario_correccion="$props.disables.concesionario_correccion"


				:concesionario="form.concesionario"
				:concesionario_correcto="form.concesionario_correcto"
				:obs_concesionario="form.obs_concesionario"
				:obs_concesionario_valido="form.obs_concesionario_valido"
				:mostrar_concesionario="$props.mostrar.arrendatario"
				:desactivar_concesionario="$props.disables.arrendatario"
				:mostrar_concesionario_correccion="$props.mostrar.arrendatario_correccion"
				:desactivar_concesionario_correccion="$props.disables.arrendatario_correccion"

				:otros="form.otros"
				:otros_correcto="form.otros_correcto"
				:obs_otros="form.obs_otros"
				:obs_otros_valido="form.obs_otros_valido"
				:otros_input="form.otros_input"
				:otros_input_valido="form.otros_input_valido"
				:mostrar_otros="$props.mostrar.otros"
				:desactivar_otros="$props.disables.otros"
				:mostrar_otros_correccion="$props.mostrar.otros_correccion"
				:desactivar_otros_correccion="$props.disables.otros_correccion"
				
				:sustancias="form.sustancias"
				:sustancias_correcto="form.sustancias_correcto"
				:obs_sustancias="form.obs_sustancias"
				:obs_sustancias_valido="form.obs_sustancias_valido"
				:sustancias_input="form.sustancias_input"
				:sustancias_input_valido="form.sustancias_input_valido"
				:mostrar_sustancias="$props.mostrar.sustancias"
				:desactivar_sustancias="$props.disables.sustancias"
				:mostrar_sustancias_correccion="$props.mostrar.sustancias_correccion"
				:desactivar_sustancias_correccion="$props.disables.sustancias_correccion"


				:titulo_contrato_posecion="form.titulo_contrato_posecion"
				:titulo_contrato_posecion_validacion="form.titulo_contrato_posecion_validacion"
				:titulo_contrato_posecion_correcto="form.titulo_contrato_posecion_correcto"
				:obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
				:obs_titulo_contrato_posecion_valido="form.obs_titulo_contrato_posecion_valido"
				:mostrar_titulo="$props.mostrar.titulo"
				:desactivar_titulo="$props.disables.titulo"
				:mostrar_titulo_correccion="$props.mostrar.titulo_correccion"
				:desactivar_titulo_correccion="$props.disables.titulo_correccion"


				:resolucion_concesion_minera="form.resolucion_concesion_minera"
				:resolucion_concesion_minera_validacion="form.resolucion_concesion_minera_validacion"
				:resolucion_concesion_minera_correcto="form.resolucion_concesion_minera_correcto"
				:obs_resolucion_concesion_minera="form.obs_resolucion_concesion_minera"
				:obs_resolucion_concesion_minera_valido="form.obs_resolucion_concesion_minera_valido"
				:mostrar_concesion="$props.mostrar.concesion"
				:desactivar_concesion="$props.disables.concesion"
				:mostrar_concesion_correccion="$props.mostrar.concesion_correccion"
				:desactivar_concesion_correccion="$props.disables.concesion_correccion"


				:constancia_pago_canon="form.constancia_pago_canon"
				:constancia_pago_canon_validacion="form.constancia_pago_canon_validacion"
				:constancia_pago_canon_correcto="form.constancia_pago_canon_correcto"
				:obs_constancia_pago_canon="form.obs_constancia_pago_canon"
				:obs_constancia_pago_canon_valido="form.obs_constancia_pago_canon_valido"
				:mostrar_contancias_canon="$props.mostrar.contancias_canon"
				:desactivar_contancias_canon="$props.disables.contancias_canon"
				:mostrar_contancias_canon_correccion="$props.mostrar.constancias_canon_correccion"
				:desactivar_contancias_canon_correccion="$props.disables.constancias_canon_correccion"

				:iia="form.iia"
				:iia_canon_validacion="form.iia_canon_validacion"
				:iia_correcto="form.iia_correcto"
				:obs_iia_canon="form.obs_iia_canon"
				:obs_iia_canon_valido="form.obs_iia_canon_valido"
				:mostrar_iia="$props.mostrar.iia"
				:desactivar_iia="$props.disables.iia"
				:mostrar_iia_correccion="$props.mostrar.iia_correccion"
				:desactivar_iia_correccion="$props.disables.iia_correccion"


				:dia="form.dia"
				:dia_canon_validacion="form.dia_canon_validacion"
				:dia_correcto="form.dia_correcto"
				:obs_dia_canon="form.obs_dia_canon"
				:obs_dia_canon_valido="form.obs_dia_canon_valido"
				:mostrar_dia="$props.mostrar.dia"
				:desactivar_dia="$props.disables.dia"
				:mostrar_dia_correccion="$props.mostrar.dia_correccion"
				:desactivar_dia_correccion="$props.disables.dia_correccion"

				:acciones_a_desarrollar="form.acciones_a_desarrollar"
				:acciones_a_desarrollar_validacion="form.acciones_a_desarrollar_validacion"
				:acciones_a_desarrollar_correcto="form.acciones_a_desarrollar_correcto"
				:obs_acciones_a_desarrollar="form.obs_acciones_a_desarrollar"
				:obs_acciones_a_desarrollar_valido="form.obs_acciones_a_desarrollar_valido"
				:mostrar_acciones="$props.mostrar.acciones"
				:desactivar_acciones="$props.disables.acciones"
				:mostrar_acciones_correccion="$props.mostrar.acciones_correccion"
				:desactivar_acciones_correccion="$props.disables.acciones_correccion"

				:actividad="form.actividad"
				:actividad_a_desarrollar_validacion="form.actividad_a_desarrollar_validacion"
				:actividad_a_desarrollar_correcto="form.actividad_a_desarrollar_correcto"
				:obs_actividad_a_desarrollar="form.obs_actividad_a_desarrollar"
				:obs_actividad_a_desarrollar_valido="form.obs_actividad_a_desarrollar_valido"
				:mostrar_actividad="$props.mostrar.actividad"
				:desactivar_actividad="$props.disables.actividad"
				:mostrar_actividad_correccion="$props.mostrar.actividad_correccion"
				:desactivar_actividad_correccion="$props.disables.actividad_correccion"

				:fecha_alta_dia="form.fecha_alta_dia"
				:fecha_alta_dia_validacion="form.fecha_alta_dia_validacion"
				:fecha_alta_dia_correcto="form.fecha_alta_dia_correcto"
				:obs_fecha_alta_dia="form.obs_fecha_alta_dia"
				:obs_fecha_alta_dia_valido="form.obs_fecha_alta_dia_valido"
				:mostrar_fecha_alta_dia="$props.mostrar.fecha_alta_dia"
				:desactivar_fecha_alta_dia="$props.disables.fecha_alta_dia"
				:mostrar_fecha_alta_dia_correccion="$props.mostrar.fecha_alta_dia_correccion"
				:desactivar_fecha_alta_dia_correccion="$props.disables.fecha_alta_dia_correccion"


				:fecha_vencimiento_dia="form.fecha_vencimiento_dia"
				:fecha_vencimiento_dia_validacion="form.fecha_vencimiento_dia_validacion"
				:fecha_vencimiento_dia_correcto="form.fecha_vencimiento_dia_correcto"
				:obs_fecha_vencimiento_dia="form.obs_fecha_vencimiento_dia"
				:obs_fecha_vencimiento_dia_valido="form.obs_fecha_vencimiento_dia_valido"
				:mostrar_fecha_vencimiento_dia="$props.mostrar.fecha_vencimiento_dia"
				:desactivar_fecha_vencimiento_dia="$props.disables.fecha_vencimiento_dia"
				:mostrar_fecha_vencimiento_dia_correccion="$props.mostrar.fecha_vencimiento_dia_correccion"
				:desactivar_fecha_vencimiento_dia_correccion="$props.disables.fecha_vencimiento_dia_correccion"

				:mostrar_boton_guardar_cinco="$props.mostrar.boton_guardar_cinco"
				:desactivar_boton_guardar_cinco="$props.disables.boton_guardar_cinco"

				
				:evaluacion ="evaluacion_global"
				:id="form.id"
				:testing="testing_global"
			>
			</PaginaCincoDatosMinaDos>
			<div id="section_datos_mina_ubicacion"></div>
			<PaginaSeisDatosUbicacionMina
			v-if="$props.mostrar.paso_seis"
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos de Mina Segunda Parte'"
				:titulo_pagina="'Pagina datos de Mina Segunda Parte'"

				:localidad_mina_pais="form.localidad_mina_pais"
				:localidad_mina_pais_validacion="form.localidad_mina_pais_validacion"
				:localidad_mina_pais_correcto="form.localidad_mina_pais_correcto"
				:obs_localidad_mina_pais="form.obs_localidad_mina_pais"
				:obs_localidad_mina_pais_valido="form.obs_localidad_mina_pais_valido"
				
				:localidad_mina_provincia="form.localidad_mina_provincia"
				:localidad_mina_provincia_validacion="form.localidad_mina_provincia_validacion"
				:localidad_mina_provincia_correcto="form.localidad_mina_provincia_correcto"
				:obs_localidad_mina_provincia="form.obs_localidad_mina_provincia"
				:obs_localidad_mina_provincia_valido="form.obs_localidad_mina_provincia_valido"
				:mostrar_ubicacion_prov="$props.mostrar.ubicacion_prov"
				:desactivar_ubicacion_prov="$props.disables.ubicacion_prov"
				:mostrar_ubicacion_prov_correccion="$props.mostrar.ubicacion_prov_correccion"
				:desactivar_ubicacion_prov_correccion="$props.disables.ubicacion_prov_correccion"

				:localidad_mina_departamento="form.localidad_mina_departamento"
				:localidad_mina_departamento_validacion="form.localidad_mina_departamento_validacion"
				:localidad_mina_departamento_correcto="form.localidad_mina_departamento_correcto"
				:obs_localidad_mina_departamento="form.obs_localidad_mina_departamento"
				:obs_localidad_mina_departamento_valido="form.obs_localidad_mina_departamento_valido"
				:mostrar_ubicacion_dpto="$props.mostrar.ubicacion_dpto"
				:desactivar_ubicacion_dpto="$props.disables.ubicacion_dpto"
				:mostrar_ubicacion_dpto_correccion="$props.mostrar.ubicacion_dpto_correccion"
				:desactivar_ubicacion_dpto_correccion="$props.disables.ubicacion_dpto_correccion"

				:localidad_mina_localidad="form.localidad_mina_localidad"
				:localidad_mina_localidad_validacion="form.localidad_mina_localidad_validacion"
				:localidad_mina_localidad_correcto="form.localidad_mina_localidad_correcto"
				:obs_localidad_mina_localidad="form.obs_localidad_mina_localidad"
				:obs_localidad_mina_localidad_valido="form.obs_localidad_mina_localidad_valido"
				:mostrar_ubicacion_localidad="$props.mostrar.ubicacion_localidad"
				:desactivar_ubicacion_localidad="$props.disables.ubicacion_localidad"
				:mostrar_ubicacion_localidad_correccion="$props.mostrar.ubicacion_localidad_correccion"
				:desactivar_ubicacion_localidad_correccion="$props.disables.ubicacion_localidad_correccion"


				:tipo_sistema="form.tipo_sistema"
				:tipo_sistema_validacion="form.tipo_sistema_validacion"
				:tipo_sistema_correcto="form.tipo_sistema_correcto"
				:obs_tipo_sistema="form.obs_tipo_sistema"
				:obs_tipo_sistema_valido="form.obs_tipo_sistema_valido"
				:mostrar_ubicacion_sistema="$props.mostrar.ubicacion_sistema"
				:desactivar_ubicacion_sistema="$props.disables.ubicacion_sistema"
				:mostrar_ubicacion_sistema_correccion="$props.mostrar.ubicacion_sistema_correccion"
				:desactivar_ubicacion_sistema_correccion="$props.disables.ubicacion_sistema_correccion"

				:latitud="form.latitud"
				:latitud_validacion="form.latitud_validacion"
				:latitud_correcto="form.latitud_correcto"
				:obs_latitud="form.obs_latitud"
				:obs_latitud_valido="form.obs_latitud_valido"
				:mostrar_ubicacion_latitud="$props.mostrar.ubicacion_latitud"
				:desactivar_ubicacion_latitud="$props.disables.ubicacion_latitud"
				:mostrar_ubicacion_latitud_correccion="$props.mostrar.ubicacion_latitud_correccion"
				:desactivar_ubicacion_latitud_correccion="$props.disables.ubicacion_latitud_correccion"

				

				:longitud="form.longitud"
				:longitud_validacion="form.longitud_validacion"
				:longitud_correcto="form.longitud_correcto"
				:obs_longitud="form.obs_longitud"
				:obs_longitud_valido="form.obs_longitud_valido"
				:mostrar_ubicacion_long="$props.mostrar.ubicacion_long"
				:desactivar_ubicacion_long="$props.disables.ubicacion_long"
				:mostrar_ubicacion_long_correccion="$props.mostrar.ubicacion_long_correccion"
				:desactivar_ubicacion_long_correccion="$props.disables.ubicacion_long_correccion"


				:lista_provincias="lista_provincias"
				:lista_dptos="lista_dptos_mina"

				:mostrar_boton_guardar_seis="$props.mostrar.boton_guardar_seis"
				:desactivar_boton_guardar_seis="$props.disables.boton_guardar_seis"

				
				:evaluacion ="evaluacion_global"
				:id="form.id"
				:testing="testing_global"

			>

			</PaginaSeisDatosUbicacionMina>

			<br>
			<br>
			<div id="section_catamarca" v-if="$props.mostrar.paso_catamarca"></div>

			<h1>El id es: {{form_particular.id}}</h1>
			<PaginaCatamarca
			v-if="$props.mostrar.paso_catamarca"
			:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos Form Catamarca'"
				:titulo_pagina="'Pagina De Catamarca'"

				:gestor_nombre_apellido="form_particular.gestor_nombre_apellido"
				:gestor_nombre_apellido_valido="form_particular.gestor_nombre_apellido_valido"
				:gestor_nombre_apellido_correcto="form_particular.gestor_nombre_apellido_correcto"
				:obs_gestor_nombre_apellido="form_particular.obs_gestor_nombre_apellido"
				:obs_gestor_nombre_valido="form_particular.obs_gestor_nombre_valido"
				:mostrar_nombre_gestor="$props.mostrar.nombre_gestor"
				:desactivar_nombre_gestor="$props.disables.nombre_gestor"
				:mostrar_nombre_gestor_correccion="$props.mostrar.nombre_gestor_correccion"
				:desactivar_nombre_gestor_correccion="$props.disables.nombre_gestor_correccion"


				:gestor_dni="form_particular.gestor_dni"
				:gestor_dni_valido="form_particular.gestor_dni_valido"
				:gestor_dni_correcto="form_particular.gestor_dni_correcto"
				:obs_gestor_dni="form_particular.obs_gestor_dni"
				:obs_gestor_dni_valido="form_particular.obs_gestor_dni_valido"
				:mostrar_dni_gestor="$props.mostrar.dni_gestor"
				:desactivar_dni_gestor="$props.disables.dni_gestor"
				:mostrar_dni_gestor_correccion="$props.mostrar.dni_gestor_correccion"
				:desactivar_dni_gestor_correccion="$props.disables.dni_gestor_correccion"


				:gestor_profesion="form_particular.gestor_profesion"
				:gestor_profesion_valido="form_particular.gestor_profesion_valido"
				:gestor_profesion_correcto="form_particular.gestor_profesion_correcto"
				:obs_gestor_profesion="form_particular.obs_gestor_profesion"
				:obs_gestor_profesion_valido="form_particular.obs_gestor_profesion_valido"
				:mostrar_profesion_gestor="$props.mostrar.profesion_gestor"
				:desactivar_profesion_gestor="$props.disables.profesion_gestor"
				:mostrar_profesion_gestor_correccion="$props.mostrar.profesion_gestor_correccion"
				:desactivar_profesion_gestor_correccion="$props.disables.profesion_gestor_correccion"


				:gestor_telefono="form_particular.gestor_telefono"
				:gestor_telefono_valido="form_particular.gestor_telefono_valido"
				:gestor_telefono_correcto="form_particular.gestor_telefono_correcto"
				:obs_gestor_telefono="form_particular.obs_gestor_telefono"
				:obs_gestor_telefono_valido="form_particular.obs_gestor_telefono_valido"
				
				:mostrar_telefono_gestor="$props.mostrar.telefono_gestor"
				:desactivar_telefono_gestor="$props.disables.telefono_gestor"
				:mostrar_telefono_gestor_correccion="$props.mostrar.telefono_gestor_correccion"
				:desactivar_telefono_gestor_correccion="$props.disables.telefono_gestor_correccion"


				:gestor_notificacion="form_particular.gestor_notificacion"
				:gestor_notificacion_valido="form_particular.gestor_notificacion_valido"
				:gestor_notificacion_correcto="form_particular.gestor_notificacion_correcto"
				:obs_gestor_notificacion="form_particular.obs_gestor_notificacion"
				:obs_gestor_notificacion_valido="form_particular.obs_gestor_notificacion_valido"
				:mostrar_notificacion_gestor="$props.mostrar.notificacion_gestor"
				:desactivar_notificacion_gestor="$props.disables.notificacion_gestor"
				:mostrar_notificacion_gestor_correccion="$props.mostrar.notificacion_gestor_correccion"
				:desactivar_notificacion_gestor_correccion="$props.disables.notificacion_gestor_correccion"


				:gestor_email="form_particular.gestor_email"
				:gestor_email_valido="form_particular.gestor_email_valido"
				:gestor_email_correcto="form_particular.gestor_email_correcto"
				:obs_gestor_email="form_particular.obs_gestor_email"
				:obs_gestor_email_valido="form_particular.obs_gestor_email_valido"
				:mostrar_email_gestor="$props.mostrar.email_gestor"
				:desactivar_email_gestor="$props.disables.email_gestor"
				:mostrar_email_gestor_correccion="$props.mostrar.email_gestor_correccion"
				:desactivar_email_gestor_correccion="$props.disables.email_gestor_correccion"


				:primer_hoja_dni="form_particular.primer_hoja_dni"
				:hoja_dni_valido="form_particular.hoja_dni_valido"
				:hoja_dni_correcto="form_particular.hoja_dni_correcto"
				:obs_hoja_dni="form_particular.obs_hoja_dni"
				:obs_hoja_dni_valido="form_particular.obs_hoja_dni_valido"
				
				:mostrar_dni_productor="$props.mostrar.dni_productor"
				:desactivar_dni_productor="$props.disables.dni_productor"
				:mostrar_dni_productor_correccion="$props.mostrar.dni_productor_correccion"
				:desactivar_dni_productor_correccion="$props.disables.dni_productor_correccion"


				:segunda_hoja_dni="form_particular.segunda_hoja_dni"
				:segunda_hoja_dni_valido="form_particular.segunda_hoja_dni_valido"
				:segunda_hoja_dni_correcto="form_particular.segunda_hoja_dni_correcto"
				:obs_segunda_hoja_dni="form_particular.obs_segunda_hoja_dni"
				:obs_segunda_hoja_dni_valido="form_particular.obs_segunda_hoja_dni_valido"


				:foto_4x4="form_particular.foto_4x4"
				:foto_4x4_valido="form_particular.foto_4x4_valido"
				:foto_4x4_correcto="form_particular.foto_4x4_correcto"
				:obs_foto_4x4="form_particular.obs_foto_4x4"
				:obs_foto_4x4_valido="form_particular.obs_foto_4x4_valido"
				:mostrar_foto_productor="$props.mostrar.foto_productor"
				:desactivar_foto_productor="$props.disables.foto_productor"
				:mostrar_foto_productor_correccion="$props.mostrar.foto_productor_correccion"
				:desactivar_foto_productor_correccion="$props.disables.foto_productor_correccion"


				:constancia_afip="form_particular.constancia_afip"
				:constancia_afip_valido="form_particular.constancia_afip_valido"
				:constancia_afip_correcto="form_particular.constancia_afip_correcto"
				:obs_constancia_afip="form_particular.obs_constancia_afip"
				:obs_constancia_afip_valido="form_particular.obs_constancia_afip_valido"
				:mostrar_constancia_afip="$props.mostrar.constancia_afip"
				:desactivar_constancia_afip="$props.disables.constancia_afip"
				:mostrar_constancia_afip_correccion="$props.mostrar.constancia_afip_correccion"
				:desactivar_constancia_afip_correccion="$props.disables.constancia_afip_correccion"


				:autorizacion_gestor="form_particular.autorizacion_gestor"
				:autorizacion_gestor_valido="form_particular.autorizacion_gestor_valido"
				:autorizacion_gestor_correcto="form_particular.autorizacion_gestor_correcto"
				:obs_autorizacion_gestor="form_particular.obs_autorizacion_gestor"
				:obs_autorizacion_gestor_valido="form_particular.obs_autorizacion_gestor_valido"
				
				:mostrar_autorizacion_gestor="$props.mostrar.autorizacion_gestor"
				:desactivar_autorizacion_gestor="$props.disables.autorizacion_gestor"
				:mostrar_autorizacion_gestor_correccion="$props.mostrar.autorizacion_gestor_correccion"
				:desactivar_autorizacion_gestor_correccion="$props.disables.autorizacion_gestor_correccion"


				:mostrar_boton_guardar_cinco="$props.mostrar.boton_guardar_cinco"
				:desactivar_boton_guardar_cinco="$props.disables.boton_guardar_cinco"

				
				:evaluacion ="evaluacion_global"
				:id="form.id"
				:testing="testing_global"
			>
			</PaginaCatamarca>
			<br>
			<br>
			<div class="flex flex-wrap">
				<div class="w-full sm:w-2/2 md:w-1/2 xl:w-1/3  px-3 mb-6 md:mb-0">
					<label
						class="mb-2 uppercase font-bold text-lg text-grey-darkest"
						for="name"
						>Creado Por:</label
					>
					<input
						id="cuit"
						disabled
						v-model="form.created_by"
						class="border py-2 px-3 text-grey-darkest"
					/>
				</div>
				<div class="w-full sm:w-2/2  md:w-1/2 xl:w-1/3  px-3 mb-6 md:mb-0">
					<label
						class="mb-2 uppercase font-bold text-lg text-grey-darkest"
						for="estado"
						>Estado Actual:</label><br>
						<span v-if="form.estado === 'en proceso'"  class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">En proceso</span>
						<span v-if="form.estado === 'borrador'"  class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full text-xs">Borrador</span>
						<span v-if="form.estado === 'aprobado'" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Aprobado</span>
						<span v-if="form.estado === 'en revision'" class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">En revision</span>
						<span v-if="form.estado === 'con observacion'" class="bg-gray-200 text-gary-600 py-1 px-3 rounded-full text-xs">Con Obesrvacion</span>
						<span v-if="form.estado === 'reprobado'" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Reprobado</span>
						<span v-if="form.estado === 'sin guardar'" class="animate-bounce bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Sin Guardar</span>
				</div>
				<div class="w-full sm:w-2/2  md:w-1/2 xl:w-1/3  px-3 mb-6 md:mb-0" v-if="$props.mostrar.estado">
					<label
						class="mb-2 uppercase font-bold text-lg text-grey-darkest"
						for="estado"
						>Nuevo Estado:</label
					><br>
					<select
						id="estado"
						name="estado"
						v-model="form.estado"
						:disabled="$props.disables.estado"
						class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
						<option value="borrador">Borrador</option>
						<option value="presentado">Presentar</option>
						
					</select>
				</div>
			</div>
			<br>
			<br>
			<div class="flex flex-col">
				<div class="w-full sm:w-2/2  md:w-1/2 px-3 mb-6 md:mb-0">
					<inertia-link
						:href="route('formulario-alta.index')"
						class="px-4 py-2 mb-4 text-sm font-medium rounded-full border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900"
					>
						Volver
					</inertia-link>
				</div>
				<div class="w-full sm:w-2/2  md:w-1/2 px-3 mb-6 md:mb-0">
					<button
							v-if="!evaluacion_global"
							@click="mostrar_modal_presentar"
							:disabled="$props.disables.boton_actualizar"
							class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-green-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
						>
							Actualizar
						</button>
				</div>
			</div>
			<jet-dialog-modal :show="AvisoAprueba" @close="closeModalAprobar" class="flex flex-col">
				<template #title>
					{{modal_tittle_apro}}
				</template>
				<template #content>
					{{modal_body_apro}}
				</template>
				<template #footer>
					<div class="flex flex-col">
						<div class="w-full sm:w-3/3  md:w-1/3 px-3 mb-6 md:mb-0">
							<button  @click="closeModalAprobar" class="animate-pulse py-3 px-6 text-white rounded-lg bg-yellow-400 shadow-lg block md:inline-block">
								Vuelvo a revisar
							</button>
						</div>
						<div class="w-full sm:w-3/3  md:w-1/3 px-3 mb-6 md:mb-0">
							<button
								v-show="mostrar_boton_aprobar"
								@click="closeModalAprobar"
								class="animate-pulse py-3 px-6 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block"
							>
								Actualizar
							</button>
						</div>
						<div class="w-full sm:w-3/3  md:w-1/3 px-3 mb-6 md:mb-0">
							<button
								v-show="mostrar_boton_aprobar_de_todos_modos"
								@click="presentar_de_todos_modos"
								class="animate-pulse py-3 px-6 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block"
							>
								Actualizar de todos Modos
							</button>
						</div>
					</div>
				</template>
			</jet-dialog-modal>
		</form>
	</div>
	</div>
	</app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Banner from '@/Jetstream/Banner';
import Modal from '@/Jetstream/Modal';
import JetDialogModal from '@/Jetstream/DialogModal';
import CardProductor from '@/Jetstream/altas/CardProductor';
import CardDomLegal from '@/Jetstream/altas/CardDomLegal';
import CardDomAdmin from '@/Jetstream/altas/CardDomAdmin';
import CardMinaUno from '@/Jetstream/altas/CardMinaUno';
import CardMinaDos from '@/Jetstream/altas/CardMinaDos';
import CardMinaUbicacion from '@/Jetstream/altas/CardMinaUbicacion';
import CardCatamarca from '@/Jetstream/altas/CardCatamarca';
import CardTotal from '@/Jetstream/altas/CardTotal';
import PasoUnoEdit from '@/Pages/Productors/PasoUnoEdit';




import PaginaUnoDatosProductores from "@/Pages/Productors/PaginaUnoDatosProductores";

import PaginaDosDatosDomLegal from "@/Pages/Productors/PaginaDosDatosDomLegal";

import PaginaCuatroDatosMinaUno from "@/Pages/Productors/PaginaCuatroDatosMinaUno";
import PaginaCincoDatosMinaDos from "@/Pages/Productors/PaginaCincoDatosMinaDos";

import PaginaSeisDatosUbicacionMina from "@/Pages/Productors/PaginaSeisDatosUbicacionMina";

import PaginaCatamarca from "@/Pages/Productors/PaginaCatamarca";

import Pasos from "@/Pages/Common/PasosParaInscribirseProd";


import ValidationErrors from '../../Jetstream/ValidationErrors.vue';
 
export default {
	components: {
		AppLayout,
		Banner,
		Modal,
		JetDialogModal,
		CardProductor,
		CardDomLegal,
		CardDomAdmin,
		CardMinaUno,
		CardMinaDos,
		CardMinaUbicacion,
		CardCatamarca,
		CardTotal,
		PasoUnoEdit,
		
		PaginaUnoDatosProductores,
		PaginaDosDatosDomLegal,
		PaginaCuatroDatosMinaUno,
		PaginaCincoDatosMinaDos,
		PaginaSeisDatosUbicacionMina,
		PaginaCatamarca,
		ValidationErrors,
		Pasos
	},
	props: [
		"productor",
		"lista_minerales_cargados",
		"creado",
		"soy_administrador",
		"soy_autoridad_minera",
		"soy_productor",
		"disables",
		"mostrar",
		"productor_particular",
		"nombre_provincia"
		],
	data() {
    console.log("ffffeeeeqqeeeel valor es:");
      console.log(this.$props.productor);
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			AvisoAprueba: false,
			modal_tittle_apro: '',
			modal_body_apro: '',
			evaluacion_global: this.$props.soy_autoridad_minera,
			testing_global: this.$props.soy_administrador,
			mostrar_modal_datos_ya_guardados:false,

			lista_provincias: [],
			lista_dptos_legal: [],
			lista_dptos_admin: [],
			lista_dptos_mina: [],
			mostrar_boton_aprobar: false,
			mostrar_boton_aprobar_de_todos_modos: false,
			lista_de_minerales_del_back : this.$props.lista_minerales_cargados,
			form: {
				id:this.$props.productor.id,

				razon_social:this.$props.productor.razonsocial,
				razon_social_valido: true,
				razon_social_correcto: this.$props.productor.razon_social_correcto,
				obs_razon_social: this.$props.productor.obs_razon_social,
				obs_razon_social_valido: true,

				email: this.$props.productor.email,
				email_valido: true,
				email_correcto:  this.$props.productor.email_correcto,
				obs_email: this.$props.productor.obs_email,
				obs_email_valido: true,

				cuit: this.$props.productor.cuit,
				cuit_valido: true,
				cuit_correcto: this.$props.productor.cuit_correcto,
				obs_cuit: this.$props.productor.obs_cuit,
				obs_cuit_valido: false,

				numeroproductor: this.$props.productor.numeroproductor,
				numeroproductor_valido: true,
				numeroproductor_correcto: this.$props.productor.numeroproductor_correcto,
				obs_numeroproductor: this.$props.productor.obs_numeroproductor,
				obs_numeroproductor_valido: false,

				//domicilio_prod: this.$props.productor.domicilio_prod,

				tiposociedad: this.$props.productor.tiposociedad,
				tiposociedad_valido: true,
				tiposociedad_correcto: this.$props.productor.tiposociedad_correcto,
				obs_tiposociedad: this.$props.productor.obs_tiposociedad,
				obs_tiposociedad_valido: false,


				inscripciondgr: this.$props.productor.inscripciondgr,
				inscripciondgr_valido: true,
				inscripciondgr_correcto: this.$props.productor.inscripciondgr_correcto,
				obs_inscripciondgr: this.$props.productor.obs_inscripciondgr,
				obs_inscripciondgr_valido: false,

				constaciasociedad: this.$props.productor.constaciasociedad,
				constaciasociedad_valido: true,
				constaciasociedad_correcto:  this.$props.productor.constanciasociedad_correcto,
				obs_constaciasociedad:  this.$props.productor.obs_constaciasociedad,
				obs_constaciasociedad_valido: false,

				valor_de_progreso:  100,
				valor_de_aprobado:  100,
				valor_de_reprobado:  100,


				//---------------Segundo paso
				valor_de_progreso_dos: 100,
				valor_de_aprobado_dos: 100,
				valor_de_reprobado_dos: 100,

				leal_calle: this.$props.productor.leal_calle,
				nombre_calle_legal_valido:  true,
				nombre_calle_legal_correcto: this.$props.productor.leal_calle_correcto,
				obs_nombre_calle_legal: this.$props.productor.obs_leal_calle,
				obs_nombre_calle_legal_valido: true,

				leal_numero: this.$props.productor.leal_numero,
				leal_numero_valido:  true,
				leal_numero_correcto: this.$props.productor.leal_numero_correcto,
				obs_leal_numero: this.$props.productor.obs_leal_numero,
				obs_leal_numero_valido: false,


				leal_telefono: this.$props.productor.leal_telefono,
				leal_telefono_valido:  true,
				leal_telefono_correcto: this.$props.productor.leal_telefono_correcto,
				obs_leal_telefono: this.$props.productor.obs_leal_telefono,
				obs_leal_telefono_valido: false,


				leal_pais: 'Argentina',
				leal_pais_valido:  true,
				leal_pais_correcto: true,
				obs_leal_pais: '',
				obs_leal_pais_valido: false,


				leal_provincia: this.$props.productor.leal_provincia,
				leal_provincia_valido:  true,
				leal_provincia_correcto: this.$props.productor.leal_provincia_correcto,
				obs_leal_provincia: this.$props.productor.obs_leal_provincia,
				obs_leal_provincia_valido: false,


				leal_departamento: this.$props.productor.leal_departamento,
				leal_departamento_valido:  true,
				leal_departamento_correcto: this.$props.productor.leal_departamento_correcto,
				obs_leal_departamento: this.$props.productor.obs_leal_departamento,
				obs_leal_departamento_valido: false,

				leal_localidad: this.$props.productor.leal_localidad,
				leal_localidad_valido:  true,
				leal_localidad_correcto: 'nada',
				obs_leal_localidad: '',
				obs_leal_localidad_valido: false,



				leal_cp: this.$props.productor.leal_cp,
				leal_cp_valido:  true,
				leal_cp_correcto: this.$props.productor.leal_cp_correcto,
				obs_leal_cp: this.$props.productor.obs_leal_cp,
				obs_leal_cp_valido: false,




				leal_otro: this.$props.productor.leal_otro,
				leal_otro_valido:  true,
				leal_otro_correcto: this.$props.productor.leal_otro_correcto,
				obs_leal_otro: this.$props.productor.obs_leal_otro,
				obs_leal_otro_valido: false,




				// PASO 3
				valor_de_progreso_tres: 100,
				valor_de_aprobado_tres: 100,
				valor_de_reprobado_tres: 100,


				administracion_calle: this.$props.productor.administracion_calle,
				administracion_calle_valido:  true,
				administracion_calle_correcto: 'nada',
				obs_administracion_calle_nombre: '',
				obs_administracion_calle_nombre_valido: false,
				
				
				
				

				administracion_numero: this.$props.productor.administracion_numero,
				administracion_numero_valido:  true,
				administracion_numero_correcto: 'nada',
				obs_administracion_numero_nombre: '',
				obs_administracion_numero_nombre_valido: false,

				administracion_telefono: this.$props.productor.administracion_telefono,
				administracion_telefono_valido:  true,
				administracion_telefono_correcto: 'nada',
				obs_administracion_telefono_nombre: '',
				obs_administracion_telefono_nombre_valido: false,


				administracion_pais: this.$props.productor.administracion_pais,
				administracion_pais_valido:  true,
				administracion_pais_correcto: 'nada',
				obs_administracion_pais: '',
				obs_administracion_pais_valido: false,




				administracion_provincia: this.$props.productor.administracion_provincia,
				administracion_provincia_valido:  true,
				administracion_provincia_correcto: 'nada',
				obs_administracion_provincia: '',
				obs_administracion_provincia_valido: false,



				administracion_departamento: this.$props.productor.administracion_departamento,
				administracion_departamento_valido:  true,
				administracion_departamento_correcto: 'nada',
				obs_administracion_departamento: '',
				obs_administracion_departamento_valido: false,





				administracion_localidad: this.$props.productor.administracion_localidad,
				administracion_localidad_valido:  true,
				administracion_localidad_correcto: 'nada',
				obs_administracion_localidad: '',
				obs_administracion_localidad_valido: false,

				administracion_cp: this.$props.productor.administracion_cp,
				administracion_cp_valido:  true,
				administracion_cp_correcto: 'nada',
				obs_administracion_cp: '',
				obs_administracion_cp_valido: false,





				administracion_otro: this.$props.productor.administracion_otro,
				administracion_otro_valido:  true,
				administracion_otro_correcto: 'nada',
				obs_administracion_otro: '',
				obs_administracion_otro_valido: false,





				// PASO 4
				valor_de_progreso_cuatro: 100,
				valor_de_aprobado_cuatro: 100,
				valor_de_reprobado_cuatro: 100,


				numero_expdiente: this.$props.productor.numero_expdiente,
				numero_expdiente_valido:  true,
				numero_expdiente_correcto: this.$props.productor.numero_expdiente_correcto,
				obs_numero_expdiente:  this.$props.productor.obs_numero_expdiente,
				obs_numero_expdiente_valido: false,


				categoria: this.$props.productor.categoria,
				categoria_validacion:  true,
				categoria_correcto: this.$props.productor.categoria_correcto,
				obs_categoria: this.$props.productor.obs_categoria,
				obs_categoria_valido: false,

				nombre_mina: this.$props.productor.nombre_mina,
				nombre_mina_validacion:  true,
				nombre_mina_correcto: this.$props.productor.nombre_mina_correcto,
				obs_nombre_mina: this.$props.productor.obs_nombre_mina,
				obs_nombre_mina_valido: false,


				descripcion_mina: this.$props.productor.descripcion_mina,
				descripcion_mina_validacion:  true,
				descripcion_mina_correcto: this.$props.productor.descripcion_mina_correcto,
				obs_descripcion_mina: this.$props.productor.obs_descripcion_mina,
				obs_descripcion_mina_valido: false,


				distrito_minero: this.$props.productor.distrito_minero,
				distrito_minero_validacion:  true,
				distrito_minero_correcto: this.$props.productor.distrito_minero_correcto,
				obs_distrito_minero: this.$props.productor.obs_distrito_minero,
				obs_distrito_minero_valido: false,



				mina_cantera: this.$props.productor.mina_cantera,
				mina_cantera_validacion:  true,
				mina_cantera_correcto: this.$props.productor.mina_cantera_correcto,
				obs_mina_cantera: this.$props.productor.obs_mina_cantera,
				obs_mina_cantera_valido: false,


				plano_inmueble: this.$props.productor.plano_inmueble,
				plano_inmueble_validacion:  true,
				plano_inmueble_correcto: this.$props.productor.plano_inmueble_correcto,
				obs_plano_inmueble: this.$props.productor.obs_plano_inmueble,
				obs_plano_inmueble_valido: false,



				minerales_variedad: this.$props.productor.minerales_variedad,
				minerales_variedad_validacion:  true,
				minerales_variedad_correcto: 'nada',
				obs_minerales_variedad: '',
				obs_minerales_variedad_valido: false,





				// PASO 5 
				valor_de_progreso_cinco: 100,
				valor_de_aprobado_cinco: 100,
				valor_de_reprobado_cinco: 100,

				owner: this.$props.productor.owner,
				owner_correcto: this.$props.productor.owner_correcto,
				obs_owner: this.$props.productor.obs_owner,
				obs_owner_valido: false,

				arrendatario: this.$props.productor.arrendatario,
				arrendatario_correcto: this.$props.productor.arrendatario_correcto,
				obs_arrendatario: this.$props.productor.obs_arrendatario,
				obs_arrendatario_valido: false,


				concesionario: this.$props.productor.concesionario,
				concesionario_correcto: this.$props.productor.concesionario_correcto,
				obs_concesionario: this.$props.productor.obs_concesionario,
				obs_concesionario_valido: false,
				




				otros: this.$props.productor.otros,
				otros_correcto: this.$props.productor.otros_correcto,
				obs_otros: this.$props.productor.obs_otros,
				obs_otros_valido: false,
				otros_input: this.$props.productor.otro_caracter_aclaracion,
				otros_input_valido: true,


				sustancias: this.$props.productor.sustancias_de_aprovechamiento_comun,
				sustancias_correcto: this.$props.productor.sustancias_de_aprovechamiento_comun_correcto,
				obs_sustancias: this.$props.productor.obs_sustancias_de_aprovechamiento_comun,
				obs_sustancias_valido: false,
				sustancias_input: this.$props.productor.concesion_minera_aclaracion,
				sustancias_input_valido: true,


				titulo_contrato_posecion: this.$props.productor.titulo_contrato_posecion,
				titulo_contrato_posecion_validacion:  true,
				titulo_contrato_posecion_correcto: 'nada',
				obs_titulo_contrato_posecion: '',
				obs_titulo_contrato_posecion_valido: false,


				resolucion_concesion_minera: this.$props.productor.resolucion_concesion_minera,
				resolucion_concesion_minera_validacion:  true,
				resolucion_concesion_minera_correcto: 'nada',
				obs_resolucion_concesion_minera: '',
				obs_resolucion_concesion_minera_valido: false,


				constancia_pago_canon: this.$props.productor.constancia_pago_canon,
				constancia_pago_canon_validacion:  true,
				constancia_pago_canon_correcto: 'nada',
				obs_constancia_pago_canon: '',
				obs_constancia_pago_canon_valido: false,



				iia: this.$props.productor.iia,
				iia_canon_validacion:  true,
				iia_correcto: 'nada',
				obs_iia_canon: '',
				obs_iia_canon_valido: false,


				dia: this.$props.productor.dia,
				dia_canon_validacion:  true,
				dia_correcto: 'nada',
				obs_dia_canon: '',
				obs_dia_canon_valido: false,



				acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
				acciones_a_desarrollar_validacion:  true,
				acciones_a_desarrollar_correcto: 'nada',
				obs_acciones_a_desarrollar: '',
				obs_acciones_a_desarrollar_valido: this.$props.productor.concesion_minera_aclaracion,



				actividad: this.$props.productor.actividad,
				actividad_a_desarrollar_validacion:  true,
				actividad_a_desarrollar_correcto: 'nada',
				obs_actividad_a_desarrollar: '',
				obs_actividad_a_desarrollar_valido: false,

				fecha_alta_dia: this.$props.productor.fecha_alta_dia,
				fecha_alta_dia_validacion:  true,
				fecha_alta_dia_correcto: 'nada',
				obs_fecha_alta_dia: '',
				obs_fecha_alta_dia_valido: false,

				fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
				fecha_vencimiento_dia_validacion:  true,
				fecha_vencimiento_dia_correcto: 'nada',
				obs_fecha_vencimiento_dia: '',
				obs_fecha_vencimiento_dia_valido: false,


				// PASO 6
				valor_de_progreso_seis: 100,
				valor_de_aprobado_seis: 100,
				valor_de_reprobado_seis: 100,




				localidad_mina_pais: this.$props.productor.localidad_mina_pais,
				localidad_mina_pais_validacion:  true,
				localidad_mina_pais_correcto: 'nada',
				obs_localidad_mina_pais: '',
				obs_localidad_mina_pais_valido: false,

				localidad_mina_provincia: this.$props.productor.localidad_mina_provincia,
				localidad_mina_provincia_validacion:  true,
				localidad_mina_provincia_correcto: 'nada',
				obs_localidad_mina_provincia: '',
				obs_localidad_mina_provincia_valido: false,

				localidad_mina_departamento: this.$props.productor.localidad_mina_departamento,
				localidad_mina_departamento_validacion:  true,
				localidad_mina_departamento_correcto: 'nada',
				obs_localidad_mina_departamento: '',
				obs_localidad_mina_departamento_valido: false,




				localidad_mina_localidad: this.$props.productor.localidad_mina_localidad,
				localidad_mina_localidad_validacion:  true,
				localidad_mina_localidad_correcto: 'nada',
				obs_localidad_mina_localidad: '',
				obs_localidad_mina_localidad_valido: false,


				tipo_sistema: this.$props.productor.tipo_sistema,
				tipo_sistema_validacion:  true,
				tipo_sistema_correcto: 'nada',
				obs_tipo_sistema: '',
				obs_tipo_sistema_valido: false,



				latitud: this.$props.productor.latitud,
				latitud_validacion:  true,
				latitud_correcto: 'nada',
				obs_latitud: '',
				obs_latitud_valido: false,

				longitud: this.$props.productor.longitud,
				longitud_validacion:  true,
				longitud_correcto: 'nada',
				obs_longitud: '',
				obs_longitud_valido: false,

				created_by: this.$props.productor.created_by,
				estado: 'sin guardar',

				
				
			},
			form_particular:{
				id:this.$props.productor.id,

				gestor_nombre_apellido:this.$props.productor_particular.gestor_nombre_apellido,
				gestor_nombre_apellido_valido: true,
				gestor_nombre_apellido_correcto: this.$props.productor_particular.gestor_nombre_apellido,
				obs_gestor_nombre_apellido: this.$props.productor_particular.obs_gestor_nombre_apellido,
				obs_gestor_nombre_valido: true,

				gestor_dni:this.$props.productor_particular.gestor_dni,
				gestor_dni_valido: true,
				gestor_dni_correcto: this.$props.productor_particular.gestor_dni,
				obs_gestor_dni: this.$props.productor_particular.obs_gestor_dni,
				obs_gestor_dni_valido: true,

				gestor_profesion:this.$props.productor_particular.gestor_profesion,
				gestor_profesion_valido: true,
				gestor_profesion_correcto: this.$props.productor_particular.gestor_profesion,
				obs_gestor_profesion: this.$props.productor_particular.obs_gestor_profesion,
				obs_gestor_profesion_valido: true,

				gestor_telefono:this.$props.productor_particular.gestor_telefono,
				gestor_telefono_valido: true,
				gestor_telefono_correcto: this.$props.productor_particular.gestor_telefono,
				obs_gestor_telefono: this.$props.productor_particular.obs_gestor_telefono,
				obs_gestor_telefono_valido: true,

				gestor_notificacion:this.$props.productor_particular.gestor_notificacion,
				gestor_notificacion_valido: true,
				gestor_notificacion_correcto: this.$props.productor_particular.gestor_notificacion,
				obs_gestor_notificacion: this.$props.productor_particular.obs_gestor_notificacion,
				obs_gestor_notificacion_valido: true,

				gestor_email:this.$props.productor_particular.gestor_email,
				gestor_email_valido: true,
				gestor_email_correcto: this.$props.productor_particular.gestor_email,
				obs_gestor_email: this.$props.productor_particular.obs_gestor_email,
				obs_gestor_email_valido: true,

				primer_hoja_dni:this.$props.productor_particular.primer_hoja_dni,
				hoja_dni_valido: true,
				hoja_dni_correcto: this.$props.productor_particular.hoja_dni_correcto,
				obs_hoja_dni: this.$props.productor_particular.obs_hoja_dni,
				obs_hoja_dni_valido: true,

				segunda_hoja_dni:this.$props.productor_particular.segunda_hoja_dni,
				segunda_hoja_dni_valido: true,
				segunda_hoja_dni_correcto: this.$props.productor_particular.hoja_dni_correcto,
				obs_segunda_hoja_dni: this.$props.productor_particular.obs_hoja_dni,
				obs_segunda_hoja_dni_valido: true,

				foto_4x4:this.$props.productor_particular.foto_4x4,
				foto_4x4_valido: true,
				foto_4x4_correcto: this.$props.productor_particular.foto_4x4_correcto,
				obs_foto_4x4: this.$props.productor_particular.obs_foto_4x4,
				obs_foto_4x4_valido: true,

				constancia_afip:this.$props.productor_particular.constancia_afip,
				constancia_afip_valido: true,
				constancia_afip_correcto: this.$props.productor_particular.constancia_afip_correcto,
				obs_constancia_afip: this.$props.productor_particular.obs_constancia_afip,
				obs_constancia_afip_valido: true,


				autorizacion_gestor:this.$props.productor_particular.autorizacion_gestor,
				autorizacion_gestor_valido: true,
				autorizacion_gestor_correcto: this.$props.productor_particular.autorizacion_gestor_correcto,
				obs_autorizacion_gestor: this.$props.productor_particular.obs_autorizacion_gestor,
				obs_autorizacion_gestor_valido: true,

				valor_de_progreso:  100,
				valor_de_aprobado:  100,
				valor_de_reprobado:  100,
			},
			nuevo: this.$props.productor,
		};
	},
	mounted(){
		console.log("corriendo ene l mounted");
		let self  = this;
		//self.pasar_los_num_a_boolean();
		//self.buscar_provincias();
		//let self  = this;
		//voy a buscar las provincias
		this.$nextTick(() => {
			axios.get('/datos/traer_provincias')
				.then(function (response) {
					console.log("las provincias son:\n");
					self.lista_provincias = response.data;
					console.log(self.lista_provincias);
				})
				.catch(function (error) {
					console.log(error);
				});
			});

			// if(!isNaN(parseInt(this.$props.productor.leal_provincia))) 
			// console.log("si");
			// else console.log("no");
			// console.log(isNaN(parseInt(this.$props.productor.leal_provincia)));


		//voy a buscar los dptos
		if(!isNaN(parseInt(this.$props.productor.leal_provincia))) {
			//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
			this.$nextTick(() => {
			axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.leal_provincia)})
				.then(function (response) {
					console.log("los deptos desde la raiz , legales son:\n");
					self.lista_dptos_legal = response.data;
					console.log(self.lista_dptos_legal);
				})
				.catch(function (error) {
					console.log(error);
				});
			});
		}
		else{self.lista_dptos_legal=[];}
		if(!isNaN(parseInt(this.$props.productor.administracion_provincia))) {
			//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
			this.$nextTick(() => {
			axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.administracion_provincia)})
				.then(function (response) {
					console.log("los deptos desde la raiz son:\n");
					self.lista_dptos_admin = response.data;
					console.log(self.lista_dptos_admin);
				})
				.catch(function (error) {
					console.log(error);
				});
			});
		}
		else{self.lista_dptos_admin=[];}
		if(!isNaN(parseInt(this.$props.productor.localidad_mina_provincia))) {
			//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
			this.$nextTick(() => {
			axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.localidad_mina_provincia)})
				.then(function (response) {
					console.log("los deptos desde la raiz son:\n");
					self.lista_dptos_mina = response.data;
					console.log(self.lista_dptos_mina);
				})
				.catch(function (error) {
					console.log(error);
				});
			});
		}
		else{self.lista_dptos_mina=[];}
	
		

		
	},
	methods: {
		submit() {
			let self  = this;
			//console.log("el id es:",this.form.id);
			if( typeof this.form.id !== 'undefined' && self.form.id != null)
			{
				/*this.$inertia.put(
					route("productors.update", this.form.id),
					this.form
				);*/
				console.log("Entre al if xq:"+self.form.id);
			}
			else{
				// aun no tiene el id definido asiq no puedo enviar las cosas
				this.AvisoAprueba = true;
				this.modal_tittle_apro = "Formulario aun no guardado";
				this.modal_body_apro = "Usted debe guardar el paso 1 antes de presentar el formulario";
				this.mostrar_boton_aprobar = false;
				this.mostrar_boton_aprobar_de_todos_modos = false;


			}
		},
		closeModal() {
				this.confirmingUserDeletion = false
				//this.form.reset()
		},
		closeModalAprobar(){
			this.AvisoAprueba = false
		},
		mostrar_modal_presentar(){
			//soy productor y estoy por presentar el formulario
			let form_evaluacion_valida = '';
			this.AvisoAprueba = true;
			this.modal_tittle_apro = "Advertencia: esta por presentar esta solicitud de Productor.";
			form_evaluacion_valida = this.evaluacion_de_evaluaciones();
			if(form_evaluacion_valida === '')
			{
				//el formulario esta bien hecho y no tiene observaciones
				this.modal_body_apro = " \n \n Este formulario no posee ninguna observación por tatnto, puede ser aprobado sin problemas";
				this.mostrar_boton_aprobar = true;
				this.mostrar_boton_aprobar_de_todos_modos = false;
			}
			else {
				//el formulario esta bien hecho y no tiene observaciones
				this.modal_body_apro = " \n \n Este formulario posee observaciones por tatnto, debe revisarlo antes de aprobarlo" + form_evaluacion_valida;
				this.mostrar_boton_aprobar = false;
				this.mostrar_boton_aprobar_de_todos_modos = true;
			}
			//<!-- @click="guardar_avances_todo" -->
		},
		evaluacion_de_evaluaciones(){
			let sin_problemas='';
			//poner los requeried or not 
			if(this.form.razon_social_correcto === false)
				sin_problemas += "\n La Razon Social ha sido Reprobada ";
			if(this.form.razon_social_correcto === 'nada')
				sin_problemas += "\n La Razon Social no ha sido evaluada ";
			
			if(this.form.cuit_correcto === false)
				sin_problemas += "\n El CUIT ha sido Reprobado ";
			if(this.form.cuit_correcto === 'nada')
				sin_problemas += "\n El CUIR no ha sido evaluado ";

			if(this.form.numeroproductor_correcto === false)
				sin_problemas += "\n El Numero de Productor ha sido Reprobado ";
			if(this.form.numeroproductor_correcto === 'nada')
				sin_problemas += "\n El Numero de Productor no ha sido evaluado ";

			if(this.form.tiposociedad_correcto === false)
				sin_problemas += "\n El tipo de sociedad ha sido Reprobado ";
			if(this.form.tiposociedad_correcto === 'nada')
				sin_problemas += "\n El tipo de sociedad no ha sido evaluado ";

			if(this.form.inscripciondgr_correcto === false)
				sin_problemas += "\n La inscripcion de la DGR ha sido Reprobada ";
			if(this.form.inscripciondgr_correcto === 'nada')
				sin_problemas += "\n La inscripcion de la DGR no ha sido evaluada ";

			if(this.form.constaciasociedad_correcto === false)
				sin_problemas += "\n La constancia de Sociedad ha sido Reprobada ";
			if(this.form.constaciasociedad_correcto === 'nada')
				sin_problemas += "\n La constacia de Sociedad no ha sido evaluada ";
			return sin_problemas;
		},

		guardar_avances_todo: function(){
						let self = this;
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_todo', {
							id: this.$props.productor.id,

						})
						.then(function (response) {
							console.log(response.data);
							if(response.data === "todo bien")
							{
								console.log('todo bien');
								self.modal_tittle = 'Paso de todo';
								self.modal_body =  'Se ha guardado correctamente la información . se GUARDO TODO. Gracias'
								self.confirmingUserDeletion = true;
							}
							else{
								console.log('NO todo bien');	
							}
							
						})
						.catch(function (error) {
							// handle error
							console.log(error);
						})
		},

		update_id_recien_creado_en_abuelo(id_nuevo){
			console.log("recibi el id:"+id_nuevo+" - desde el nieto");
			this.form.id = id_nuevo;
		},
		mostrar_explicacion(){
			this.confirmingUserDeletion = true;
			this.modal_body = "En este formulario usted puede presentar la solicitud de alta de productor minero. Con esta acción usted demuestra interes en inscribirse como tal, pervio a una evaluación de su solicitud (el presente formulario)."
			this.modal_tittle="Explicación de alta de Productores Mineros"
		},

		pasar_los_num_a_boolean(){
			let self  = this;
			//voy a pasar los 0 y 1 a false y true, respectivamente
			console.log("por transformar los ownder");
			if(this.$props.productor.owner === 0)
			{
				self.form.owner = false;
				self.$props.productor.owner = false;
			}
			else{
				self.form.owner = true;
				self.$props.productor.owner = true;
			}
			console.log("el owner es");
			console.log(self.form.owner);
			if(this.$props.productor.arrendatario === 0)
			{
				self.form.arrendatario = false;
				self.$props.productor.arrendatario = false;
			}
			else{
				self.form.arrendatario = true;
				self.$props.productor.arrendatario = true;
			}
			if(this.$props.productor.concesionario === 0)
			{
				self.form.concesionario = false;
				self.$props.productor.concesionario = false;
			}
			else{
				self.form.concesionario = true;
				self.$props.productor.concesionario = true;
			}
			if(this.$props.productor.otros === 0)
			{
				self.form.otros = false;
				self.$props.productor.otros = false;
			}
			else{
				self.form.otros = true;
				self.$props.productor.otros = true;
			}
			if(this.$props.productor.sustancias === 0)
			{
				self.form.sustancias = false;
				self.$props.productor.sustancias = false;
			}
			else{
				self.form.sustancias = true;
				self.$props.productor.sustancias = true;
			}

		},
		buscar_provincias(){
			//voy a buscar las provincias
			this.$nextTick(() => {
			axios.get('/datos/traer_provincias')
				.then(function (response) {
					console.log("las provincias son:\n");
					self.lista_provincias = response.data;
					console.log(self.lista_provincias);
				})
				.catch(function (error) {
					console.log(error);
				});
			});
			//voy a buscar los dptos
			if(!isNaN(parseInt(this.$props.productor.leal_provincia))) {
				//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
				this.$nextTick(() => {
				axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.leal_provincia)})
					.then(function (response) {
						console.log("los deptos desde la raiz , legales son:\n");
						self.lista_dptos_legal = response.data;
						console.log(self.lista_dptos_legal);
					})
					.catch(function (error) {
						console.log(error);
					});
				});
			}
			else{self.lista_dptos_legal=[];}
			if(!isNaN(parseInt(this.$props.productor.administracion_provincia))) {
				//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
				this.$nextTick(() => {
				axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.administracion_provincia)})
					.then(function (response) {
						console.log("los deptos desde la raiz son:\n");
						self.lista_dptos_admin = response.data;
						console.log(self.lista_dptos_admin);
					})
					.catch(function (error) {
						console.log(error);
					});
				});
			}
			else{self.lista_dptos_admin=[];}
			if(!isNaN(parseInt(this.$props.productor.localidad_mina_provincia))) {
				//signafica que tengo una provincia ya elegida asiq traifgo sus dptos
				this.$nextTick(() => {
				axios.post('/datos/traer_departamentos',{id_prov:parseInt(this.$props.productor.localidad_mina_provincia)})
					.then(function (response) {
						console.log("los deptos desde la raiz son:\n");
						self.lista_dptos_mina = response.data;
						console.log(self.lista_dptos_mina);
					})
					.catch(function (error) {
						console.log(error);
					});
				});
			}
			else{self.lista_dptos_mina=[];}
		},
		update_razon_social_evaluacion(valorEvaluacion){
			this.form.razon_social_correcto = valorEvaluacion;
		},
		update_cuit_evaluacion(valorEvaluacion){
			this.form.cuit_correcto = valorEvaluacion;
		},
		update_num_prod_evaluacion(valorEvaluacion){
			this.form.numeroproductor_correcto = valorEvaluacion;
		},
		update_tipo_sociedad_evaluacion(valorEvaluacion){
			this.form.tiposociedad_correcto = valorEvaluacion;
		},
		update_inscripcion_dgr_evaluacion(valorEvaluacion){
			this.form.inscripciondgr_correcto = valorEvaluacion;
		},
		update_constancia_sociedad_evaluacion(valorEvaluacion){
			this.form.constaciasociedad_correcto = valorEvaluacion;
		},
		update_id_nuevo(valorEvaluacion){
			this.form.id = valorEvaluacion;
			this.form.estado = "borrador";
		},
		update_id_adicional_nuevo(valorEvaluacion){
			this.form_particular.id = valorEvaluacion;
		},

	},
	
	
	
};
</script>