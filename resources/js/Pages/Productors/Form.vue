<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
					Dandose de Alta como nuevo Productor Minero, id {{form.id}}
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
					<jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
						<template #title>
								{{modal_tittle}}
						</template>
						<template #content>
								{{modal_body}}
								
						</template>
						<template #footer>
								<button @click="closeModal">
										Comenzemos
								</button>
								
						</template>
					</jet-dialog-modal>
					
					<div id="inicio"></div>
					<div class="flex items-center justify-center">
						<div class="grid grid-cols-1 gap-6 sm:grid-cols-4 md:grid-cols-7 lg:grid-cols-7 xl:grid-cols-7">
							<!-- 1 card -->
							<CardProductor  
							:progreso="form.valor_de_progreso"
							:aprobado="form.valor_de_aprobado"
							:reprobado="form.valor_de_reprobado" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"

							></CardProductor>

							<!-- 2 card -->
							<CardDomLegal  
								:progreso="form.valor_de_progreso_dos"
								:aprobado="form.valor_de_aprobado_dos"
								:reprobado="form.valor_de_reprobado_dos" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
							></CardDomLegal>

						
							<!-- 3 card -->
							
							<CardDomAdmin  
								:progreso="form.valor_de_progreso_tres"
								:aprobado="form.valor_de_aprobado_tres"
								:reprobado="form.valor_de_reprobado_tres" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl'"
							></CardDomAdmin>
							

							<!-- 4 card -->
							<CardMinaUno  
								:progreso="form.valor_de_progreso_cuatro"
								:aprobado="form.valor_de_aprobado_cuatro"
								:reprobado="form.valor_de_reprobado_cuatro" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaUno>

							<!-- 5 card -->
							<CardMinaDos  
								:progreso="form.valor_de_progreso_cinco"
								:aprobado="form.valor_de_aprobado_cinco"
								:reprobado="form.valor_de_reprobado_cinco" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaDos>

							<CardMinaUbicacion  
								:progreso="form.valor_de_progreso_seis"
								:aprobado="form.valor_de_aprobado_seis"
								:reprobado="form.valor_de_reprobado_seis" 
								:lugar="'Argentina, San Juan'"
								:updated_at="'hace 10 minutos'"
								:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
								:clase_inf = "'relative bg-white py-6 px-6 rounded-3xl w-128 my-4 shadow-xl'"
							></CardMinaUbicacion>
							
						

							<!-- 4 card -->
							<CardTotal  
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
							<div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
								</svg>
							</div>
						</a>
					</div>
					<br>
				<div id="section_productor"></div>
				<PaginaUnoDatosProductores
					:link_volver="route('formulario-alta.index')"
					:titulo_boton_volver="'volver'"
					:titulo_boton_guardar="'Guardar Datos del Productor'"
					:titulo_pagina="'Página datos de Productor'"

					:razon_social="form.razon_social" 
					:razon_social_valido="form.razon_social_valido"
					:razon_social_correcto="form.razon_social_correcto"
					:obs_razon_social="form.obs_razon_social"
					:obs_razon_social_valido="form.obs_razon_social_valido"
					:email="form.email"
					:email_valido="form.email_valido"
					:email_correcto="form.email_correcto"
					:obs_email="form.obs_email"
					:obs_email_valido="form.obs_email_valido"
					:cuit="form.cuit"
					:cuit_valido="form.cuit_valido"
					:cuit_correcto="form.cuit_correcto"
					:obs_cuit="form.obs_cuit"
					:obs_cuit_valido="form.obs_cuit_valido"
					:numeroproductor="form.numeroproductor"
					:numeroproductor_valido="form.numeroproductor_valido"
					:numeroproductor_correcto="form.numeroproductor_correcto"
					:obs_numeroproductor="form.obs_numeroproductor"
					:obs_numeroproductor_valido="form.obs_numeroproductor_valido"
					:tiposociedad="form.tiposociedad"
					:tiposociedad_valido="form.tiposociedad_valido"
					:tiposociedad_correcto="form.tiposociedad_correcto"
					:obs_tiposociedad="form.obs_tiposociedad"
					:obs_tiposociedad_valido="form.obs_tiposociedad_valido"
					:inscripciondgr="form.inscripciondgr"
					:inscripciondgr_valido="form.inscripciondgr_valido"
					:inscripciondgr_correcto="form.inscripciondgr_correcto"
					:obs_inscripciondgr="form.obs_inscripciondgr"
					:obs_inscripciondgr_valido="form.obs_inscripciondgr_valido"
					:constanciasociedad="form.constaciasociedad"
					:constanciasociedad_valido="form.constaciasociedad_valido"
					:constanciasociedad_correcto="form.constaciasociedad_correcto"
					:obs_constanciasociedad="form.obs_constaciasociedad"
					:obs_constanciasociedad_valido="form.obs_constaciasociedad_valido"

					:evaluacion="true"
					:id="form.id"
					
					v-on:CreeUnNuevoIdPasoAAbuelo="update_id_recien_creado_en_abuelo($event)"
				>
				</PaginaUnoDatosProductores>
				<br>
				<br>
				los depertamentos son{{lista_dptos_legal}}
				<div id="section_domicilio_legal"></div>
				<PaginaDosDatosDomLegal
					:link_volver="route('formulario-alta.index')"
					:titulo_boton_volver="'volver'"
					:titulo_boton_guardar="'Guardar Datos del Domicilio Legal'"
					:titulo_pagina="'Pagina datos de Domicilio Legal'"


					:leal_calle="form.leal_calle" 
					:nombre_calle_legal_valido="form.nombre_calle_legal_valido"
					:nombre_calle_legal_correcto="form.nombre_calle_legal_correcto"
					:obs_nombre_calle_legal="form.obs_nombre_calle_legal"
					:obs_nombre_calle_legal_valido="form.obs_nombre_calle_legal_valido"
					:leal_numero="form.leal_numero"
					:leal_numero_valido="form.leal_numero_valido"
					:leal_numero_correcto="form.leal_numero_correcto"
					:obs_leal_numero="form.obs_leal_numero"
					:obs_leal_numero_valido="form.obs_leal_numero_valido"
					:leal_telefono="form.leal_telefono"
					:leal_telefono_valido="form.leal_telefono_valido"
					:leal_telefono_correcto="form.leal_telefono_correcto"
					:obs_leal_telefono="form.obs_leal_telefono"
					:obs_leal_telefono_valido="form.obs_leal_telefono_valido"
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
					:leal_departamento="form.leal_departamento"
					:leal_departamento_valido="form.leal_departamento_valido"
					:leal_departamento_correcto="form.leal_departamento_correcto"
					:obs_leal_departamento="form.obs_leal_departamento"
					:obs_leal_departamento_valido="form.obs_leal_departamento_valido"
					:leal_localidad="form.leal_localidad"
					:leal_localidad_valido="form.leal_localidad_valido"
					:leal_localidad_correcto="form.leal_localidad_correcto"
					:obs_leal_localidad="form.obs_leal_localidad"
					:obs_leal_localidad_valido="form.obs_leal_localidad_valido"
					:leal_cp="form.leal_cp"
					:leal_cp_valido="form.leal_cp_valido"
					:leal_cp_correcto="form.leal_cp_correcto"
					:obs_leal_cp="form.obs_leal_cp"
					:obs_leal_cp_valido="form.obs_leal_cp_valido"
					:leal_otro="form.leal_otro"
					:leal_otro_valido="form.leal_otro_valido"
					:leal_otro_correcto="form.leal_otro_correcto"
					:obs_leal_otro="form.obs_leal_otro"
					:obs_leal_otro_valido="form.obs_leal_otro_valido"

					:donde_estoy="'legal'"
					:lista_provincias="lista_provincias"
					:lista_dptos="lista_dptos_legal"

					:evaluacion="true"
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
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos del Domicilio Administrativo'"
				:titulo_pagina="'Pagina datos de Domicilio Administrativo'"

				:leal_calle="form.administracion_calle"
				:nombre_calle_legal_valido="form.administracion_calle_valido"
				:nombre_calle_legal_correcto="form.administracion_calle_correcto"
				:obs_nombre_calle_legal="form.obs_administracion_calle_nombre"
				:obs_nombre_calle_legal_valido="form.obs_administracion_calle_nombre_valido"
				:leal_numero="form.administracion_numero"
				:leal_numero_valido="form.administracion_numero_valido"
				:leal_numero_correcto="form.administracion_numero_correcto"
				:obs_leal_numero="form.obs_administracion_numero_nombre"
				:obs_leal_numero_valido="form.obs_administracion_numero_nombre_valido"
				:leal_telefono="form.administracion_telefono"
				:leal_telefono_valido="form.administracion_telefono_valido"
				:leal_telefono_correcto="form.administracion_telefono_correcto"
				:obs_leal_telefono="form.obs_administracion_telefono_nombre"
				:obs_leal_telefono_valido="form.obs_administracion_telefono_nombre_valido"
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
				:leal_departamento="form.administracion_departamento"
				:leal_departamento_valido="form.administracion_departamento_valido"
				:leal_departamento_correcto="form.administracion_departamento_correcto"
				:obs_leal_departamento="form.obs_administracion_departamento"
				:obs_leal_departamento_valido="form.obs_administracion_departamento_valido"
				:leal_localidad="form.administracion_localidad"
				:leal_localidad_valido="form.administracion_localidad_valido"
				:leal_localidad_correcto="form.administracion_localidad_correcto"
				:obs_leal_localidad="form.obs_administracion_localidad"
				:obs_leal_localidad_valido="form.obs_administracion_localidad_valido"
				:leal_cp="form.administracion_cp"
				:leal_cp_valido="form.administracion_cp_valido"
				:leal_cp_correcto="form.administracion_cp_correcto"
				:obs_leal_cp="form.obs_administracion_cp"
				:obs_leal_cp_valido="form.obs_administracion_cp_valido"
				:leal_otro="form.administracion_otro"
				:leal_otro_valido="form.administracion_otro_valido"
				:leal_otro_correcto="form.administracion_otro_correcto"
				:obs_leal_otro="form.obs_administracion_otro"
				:obs_leal_otro_valido="form.obs_administracion_otro_valido"

				:donde_estoy="'administrativo'"
				:lista_provincias="lista_provincias"
				:lista_dptos="lista_dptos_admin"

				:evaluacion="true"
				:id="form.id"
				>
			

			</PaginaDosDatosDomLegal>
			<br>
			<div class="flex items-center justify-center">
			</div>
			<div id="section_mina_uno"></div>
			
			<PaginaCuatroDatosMinaUno
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos de Mina Primer Parte'"
				:titulo_pagina="'Pagina datos de Mina Primera Parte'"

				:numero_expdiente="form.numero_expdiente"
				:numero_expdiente_valido="form.numero_expdiente_valido"
				:numero_expdiente_correcto="form.numero_expdiente_correcto"
				:obs_numero_expdiente="form.obs_numero_expdiente"
				:obs_numero_expdiente_valido="form.obs_numero_expdiente_valido"
				:categoria="form.categoria"
				:categoria_validacion="form.categoria_validacion"
				:categoria_correcto="form.categoria_correcto"
				:obs_categoria="form.obs_categoria"
				:obs_categoria_valido="form.obs_categoria_valido"
				:nombre_mina="form.nombre_mina"
				:nombre_mina_validacion="form.nombre_mina_validacion"
				:nombre_mina_correcto="form.nombre_mina_correcto"
				:obs_nombre_mina="form.obs_nombre_mina"
				:obs_nombre_mina_valido="form.obs_nombre_mina_valido"
				:descripcion_mina="form.descripcion_mina"
				:descripcion_mina_validacion="form.descripcion_mina_validacion"
				:descripcion_mina_correcto="form.descripcion_mina_correcto"
				:obs_descripcion_mina="form.obs_descripcion_mina"
				:obs_descripcion_mina_valido="form.obs_descripcion_mina_valido"
				:distrito_minero="form.distrito_minero"
				:distrito_minero_validacion="form.distrito_minero_validacion"
				:distrito_minero_correcto="form.distrito_minero_correcto"
				:obs_distrito_minero="form.obs_distrito_minero"
				:obs_distrito_minero_valido="form.obs_distrito_minero_valido"
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
				:minerales_variedad="form.minerales_variedad"
				:minerales_variedad_validacion="form.minerales_variedad_validacion"
				:minerales_variedad_correcto="form.minerales_variedad_correcto"
				:obs_minerales_variedad="form.obs_minerales_variedad"
				:obs_minerales_variedad_valido="form.obs_minerales_variedad_valido"

				:resolucion_concesion_minera="form.resolucion_concesion_minera"
				:resolucion_concesion_minera_validacion="form.resolucion_concesion_minera_validacion"
				:resolucion_concesion_minera_correcto="form.resolucion_concesion_minera_correcto"
				:obs_resolucion_concesion_minera="form.obs_resolucion_concesion_minera"
				:obs_resolucion_concesion_minera_valido="form.obs_resolucion_concesion_minera_valido"

				:titulo_contrato_posecion="form.titulo_contrato_posecion"
				:titulo_contrato_posecion_validacion="form.titulo_contrato_posecion_validacion"
				:titulo_contrato_posecion_correcto="form.titulo_contrato_posecion_correcto"
				:obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
				:obs_titulo_contrato_posecion_valido="form.obs_titulo_contrato_posecion_valido"

				:lista_minerales_desde_back = "lista_de_minerales_del_back"

				:evaluacion="true"
				:id="form.id"
				:testing="true"
			>
			</PaginaCuatroDatosMinaUno>
			
			<br>
			<br>
			<div class="flex items-center justify-center">
				<!-- <CardMinaDos  
							:progreso="form.valor_de_progreso_cinco"
							:aprobado="form.valor_de_aprobado_cinco"
							:reprobado="form.valor_de_reprobado_cinco" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardMinaDos> -->
			</div>
			<br>
			<br>
			<br>
			<div id="section_datos_mina_dos"></div>
			<PaginaCincoDatosMinaDos
				:link_volver="route('formulario-alta.index')"
				:titulo_boton_volver="'volver'"
				:titulo_boton_guardar="'Guardar Datos de Mina Segunda Parte'"
				:titulo_pagina="'Pagina datos de Mina Segunda Parte'"

				:owner="form.owner"
				:owner_correcto="form.owner_correcto"
				:obs_owner="form.obs_owner"
				:obs_owner_valido="form.obs_owner_valido"
				:arrendatario="form.arrendatario"
				:arrendatario_correcto="form.arrendatario_correcto"
				:obs_arrendatario="form.obs_arrendatario"
				:obs_arrendatario_valido="form.obs_arrendatario_valido"
				:concesionario="form.concesionario"
				:concesionario_correcto="form.concesionario_correcto"
				:obs_concesionario="form.obs_concesionario"
				:obs_concesionario_valido="form.obs_concesionario_valido"
				:otros="form.otros"
				:otros_correcto="form.otros_correcto"
				:obs_otros="form.obs_otros"
				:obs_otros_valido="form.obs_otros_valido"
				:otros_input="form.otros_input"
				:otros_input_valido="form.otros_input_valido"
				

				:sustancias="form.sustancias"
				:sustancias_correcto="form.sustancias_correcto"
				:obs_sustancias="form.obs_sustancias"
				:obs_sustancias_valido="form.obs_sustancias_valido"
				:sustancias_input="form.sustancias_input"
				:sustancias_input_valido="form.sustancias_input_valido"

				:titulo_contrato_posecion="form.titulo_contrato_posecion"
				:titulo_contrato_posecion_validacion="form.titulo_contrato_posecion_validacion"
				:titulo_contrato_posecion_correcto="form.titulo_contrato_posecion_correcto"
				:obs_titulo_contrato_posecion="form.obs_titulo_contrato_posecion"
				:obs_titulo_contrato_posecion_valido="form.obs_titulo_contrato_posecion_valido"
				:resolucion_concesion_minera="form.resolucion_concesion_minera"
				:resolucion_concesion_minera_validacion="form.resolucion_concesion_minera_validacion"
				:resolucion_concesion_minera_correcto="form.resolucion_concesion_minera_correcto"
				:obs_resolucion_concesion_minera="form.obs_resolucion_concesion_minera"
				:obs_resolucion_concesion_minera_valido="form.obs_resolucion_concesion_minera_valido"
				:constancia_pago_canon="form.constancia_pago_canon"
				:constancia_pago_canon_validacion="form.constancia_pago_canon_validacion"
				:constancia_pago_canon_correcto="form.constancia_pago_canon_correcto"
				:obs_constancia_pago_canon="form.obs_constancia_pago_canon"
				:obs_constancia_pago_canon_valido="form.obs_constancia_pago_canon_valido"
				:iia="form.iia"
				:iia_canon_validacion="form.iia_canon_validacion"
				:iia_correcto="form.iia_correcto"
				:obs_iia_canon="form.obs_iia_canon"
				:obs_iia_canon_valido="form.obs_iia_canon_valido"
				:dia="form.dia"
				:dia_canon_validacion="form.dia_canon_validacion"
				:dia_correcto="form.dia_correcto"
				:obs_dia_canon="form.obs_dia_canon"
				:obs_dia_canon_valido="form.obs_dia_canon_valido"
				:acciones_a_desarrollar="form.acciones_a_desarrollar"
				:acciones_a_desarrollar_validacion="form.acciones_a_desarrollar_validacion"
				:acciones_a_desarrollar_correcto="form.acciones_a_desarrollar_correcto"
				:obs_acciones_a_desarrollar="form.obs_acciones_a_desarrollar"
				:obs_acciones_a_desarrollar_valido="form.obs_acciones_a_desarrollar_valido"
				:actividad="form.actividad"
				:actividad_a_desarrollar_validacion="form.actividad_a_desarrollar_validacion"
				:actividad_a_desarrollar_correcto="form.actividad_a_desarrollar_correcto"
				:obs_actividad_a_desarrollar="form.obs_actividad_a_desarrollar"
				:obs_actividad_a_desarrollar_valido="form.obs_actividad_a_desarrollar_valido"
				:fecha_alta_dia="form.fecha_alta_dia"
				:fecha_alta_dia_validacion="form.fecha_alta_dia_validacion"
				:fecha_alta_dia_correcto="form.fecha_alta_dia_correcto"
				:obs_fecha_alta_dia="form.obs_fecha_alta_dia"
				:obs_fecha_alta_dia_valido="form.obs_fecha_alta_dia_valido"
				:fecha_vencimiento_dia="form.fecha_vencimiento_dia"
				:fecha_vencimiento_dia_validacion="form.fecha_vencimiento_dia_validacion"
				:fecha_vencimiento_dia_correcto="form.fecha_vencimiento_dia_correcto"
				:obs_fecha_vencimiento_dia="form.obs_fecha_vencimiento_dia"
				:obs_fecha_vencimiento_dia_valido="form.obs_fecha_vencimiento_dia_valido"
				
				:evaluacion="true"
				:id="form.id"
				:testing="true"

			>
			</PaginaCincoDatosMinaDos>
			<br>
			<br>
			<br>
			<br>
			<br>
			<!-- <div class="flex flex-col mb-8">
				<button
					type="button"
					class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
					@click="guardar_avances_cinco"
				>
					Guardar: Datos de la Mina o Cantera (2)
				</button>
				
				<a :href="route('productors.index')"><button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">Volver</button></a>
			</div> -->
			<br>
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>
			<div id="section_datos_mina_ubicacion"></div>
			<div class="flex items-center justify-center">
				<CardMinaUbicacion  
					:progreso="form.valor_de_progreso_seis"
					:aprobado="form.valor_de_aprobado_seis"
					:reprobado="form.valor_de_reprobado_seis" 
					:lugar="'Argentina, San Juan'"
					:updated_at="'hace 10 minutos'"
					:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
					:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
				></CardMinaUbicacion>
			</div>
			<br>
			<br>
			<br>
			<br>
			<PaginaSeisDatosUbicacionMina
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
				:localidad_mina_departamento="form.localidad_mina_departamento"
				:localidad_mina_departamento_validacion="form.localidad_mina_departamento_validacion"
				:localidad_mina_departamento_correcto="form.localidad_mina_departamento_correcto"
				:obs_localidad_mina_departamento="form.obs_localidad_mina_departamento"
				:obs_localidad_mina_departamento_valido="form.obs_localidad_mina_departamento_valido"
				:localidad_mina_localidad="form.localidad_mina_localidad"
				:localidad_mina_localidad_validacion="form.localidad_mina_localidad_validacion"
				:localidad_mina_localidad_correcto="form.localidad_mina_localidad_correcto"
				:obs_localidad_mina_localidad="form.obs_localidad_mina_localidad"
				:obs_localidad_mina_localidad_valido="form.obs_localidad_mina_localidad_valido"
				:tipo_sistema="form.tipo_sistema"
				:tipo_sistema_validacion="form.tipo_sistema_validacion"
				:tipo_sistema_correcto="form.tipo_sistema_correcto"
				:obs_tipo_sistema="form.obs_tipo_sistema"
				:obs_tipo_sistema_valido="form.obs_tipo_sistema_valido"
				:latitud="form.latitud"
				:latitud_validacion="form.latitud_validacion"
				:latitud_correcto="form.latitud_correcto"
				:obs_latitud="form.obs_latitud"
				:obs_latitud_valido="form.obs_latitud_valido"
				:longitud="form.longitud"
				:longitud_validacion="form.longitud_validacion"
				:longitud_correcto="form.longitud_correcto"
				:obs_longitud="form.obs_longitud"
				:obs_longitud_valido="form.obs_longitud_valido"

				:lista_provincias="lista_provincias"
				:lista_dptos="lista_dptos_mina"
				
				:evaluacion="true"
				:id="form.id"
				:testing="true"

			>

			</PaginaSeisDatosUbicacionMina>
			<br>
			<br>
			<br>
			<br>
			<div class="flex flex-col mb-8">
				<button
					type="button"
					class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
					@click="guardar_avances_seis"
				>
					Guardar: Datos de la Ubicacion de la mina
				</button>
				<a :href="route('productors.index')"><button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900">Volver</button></a>
			</div>
			<br>
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>
			<br>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>created_by:</label
						>
						<input
							id="cuit"
							disabled
							v-model="form.created_by"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="estado"
							>Estado:</label
						>
						<select
							id="estado"
							name="estado"
							v-model="form.estado"
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option value="presentado">Presentado</option>
							<option value="en revision">En revision</option>
							<option value="con observacion">Aprobado con Observaciones</option>
							<option value="reprobado">Reprobado</option>
						</select>
					</div>
					<div class="flex flex-col mb-8">
							<!-- type="submit" -->
						<button
							@click="guardar_avances_todo"
							class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-green-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
						>
							Actualizar
						</button>
						<inertia-link
							:href="route('productors.index')"
							class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-red-300 bg-red-200 hover:bg-red-300 text-red-900"
						>
							Volver
						</inertia-link>
					</div>

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
import CardTotal from '@/Jetstream/altas/CardTotal';
import PasoUnoEdit from '@/Pages/Productors/PasoUnoEdit';




import PaginaUnoDatosProductores from "@/Pages/Productors/PaginaUnoDatosProductores";

import PaginaDosDatosDomLegal from "@/Pages/Productors/PaginaDosDatosDomLegal";

import PaginaCuatroDatosMinaUno from "@/Pages/Productors/PaginaCuatroDatosMinaUno";
import PaginaCincoDatosMinaDos from "@/Pages/Productors/PaginaCincoDatosMinaDos";

import PaginaSeisDatosUbicacionMina from "@/Pages/Productors/PaginaSeisDatosUbicacionMina";


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
		CardTotal,
		PasoUnoEdit,
		
		PaginaUnoDatosProductores,
		PaginaDosDatosDomLegal,
		PaginaCuatroDatosMinaUno,
		PaginaCincoDatosMinaDos,
		PaginaSeisDatosUbicacionMina,
		ValidationErrors,
	},
	props: [
		"productor",
		"lista_minerales_cargados"
		],
	data() {
    console.log("ffffeeeeqqeeeel valor es:");
      console.log(this.$props.productor);
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			lista_provincias: [],
			lista_dptos_legal: [],
			lista_dptos_admin: [],
			lista_dptos_mina: [],
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
				estado: this.$props.productor.estado,

				
				
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
			this.$inertia.put(
				route("productors.update", this.$props.productors.id),
				this.form
			);
		},
		closeModal() {
				this.confirmingUserDeletion = false
				//this.form.reset()
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
		}

	},
	
	
	
};
</script>