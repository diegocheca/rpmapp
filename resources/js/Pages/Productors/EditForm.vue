<template>
	<app-layout>
		<div class="flex items-center  w-full bg-teal-lighter">
			<div class="w-full bg-white rounded shadow-lg p-8 m-4">
				<h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
					Editar Productor
				</h1>
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
												Ok
										</button>

										
								</template>
						</jet-dialog-modal>
						<button @click="confirmingUserDeletion=!confirmingUserDeletion" >modal</button>
						

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
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

				<div class="flex items-center justify-center">
						<CardProductor  
							:progreso="form.valor_de_progreso"
							:aprobado="form.valor_de_aprobado"
							:reprobado="form.valor_de_reprobado" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardProductor>
				</div>

				<br>
				<br>
				<!-- <PasoUnoEdit
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
				></PasoUnoEdit> -->
				<br>
				<br>
				<div id="section_productor"></div>
				<PaginaUnoDatosProductores
					:link_volver="route('formulario-alta.index')"
					:titulo_boton_volver="'volver'"
					:titulo_boton_guardar="'Guardar Datos del Productor'"
					:titulo_pagina="'Pagina datos de Productor'"


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
					:constaciasociedad="form.constaciasociedad"
					:constaciasociedad_valido="form.constaciasociedad_valido"
					:constaciasociedad_correcto="form.constaciasociedad_correcto"
					:obs_constaciasociedad="form.obs_constaciasociedad"
					:obs_constaciasociedad_valido="form.obs_constaciasociedad_valido"

					:evaluacion="true"
					:id="$props.productor.id"
				>

				</PaginaUnoDatosProductores>
			<br>
        <br>
       
				<br>
				<br>
				<hr>
				<br>
				<br>
				<br>
				<br>
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

					:evaluacion="true"
					:id="$props.productor.id"
					>

				</PaginaDosDatosDomLegal>

				<br>
				<br>
				<hr>
				<br>
				<br>
				<br>
				<br>

			<div class="flex items-center justify-center">
				<CardDomLegal  
							:progreso="form.valor_de_progreso_dos"
							:aprobado="form.valor_de_aprobado_dos"
							:reprobado="form.valor_de_reprobado_dos" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardDomLegal>
			</div>
			<br>
			<br>
			
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>

			<div class="flex items-center justify-center">
				<CardDomAdmin  
							:progreso="form.valor_de_progreso_tres"
							:aprobado="form.valor_de_aprobado_tres"
							:reprobado="form.valor_de_reprobado_tres" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardDomAdmin>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div id="section_domicilio_administrativo"></div>
			{{	form.administracion_calle }}
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

				:evaluacion="true"
				:id="$props.productor.id"
				>

			</PaginaDosDatosDomLegal>

			
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>
			<div class="flex items-center justify-center">
				<CardMinaUno  
							:progreso="form.valor_de_progreso_cuatro"
							:aprobado="form.valor_de_aprobado_cuatro"
							:reprobado="form.valor_de_reprobado_cuatro" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardMinaUno>
			</div>


			<br>
			<br>
			<br>
			<hr>
			<br>
			<br>
			<br>
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

				:evaluacion="true"
				:id="$props.productor.id"
				:testing="true"
			>

			</PaginaCuatroDatosMinaUno>
			
			<div class="flex flex-col mb-8">
				<button
					type="button"
					class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
					@click="guardar_avances_cuatro"
				>
					Guardar Datos de la Mina
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
			<div class="flex items-center justify-center">
				<CardMinaDos  
							:progreso="form.valor_de_progreso_cinco"
							:aprobado="form.valor_de_aprobado_cinco"
							:reprobado="form.valor_de_reprobado_cinco" 
							:lugar="'Argentina, San Juan'"
							:updated_at="'hace 10 minutos'"
							:clase_sup = "'grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1'"
							:clase_inf = "'relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl'"
						></CardMinaDos>
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
				:id="$props.productor.id"
				:testing="true"

			>

			</PaginaCincoDatosMinaDos>

			<div class="flex">
				<div class="w-full md:w-2/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="minerales_variedad"
						>Caracter que invoca</label
					>
					<!-- owner: this.$props.productor.owner,
				: 'nada',
				: '',
				obs_owner_valido: false, -->
						
						<br>
						<div class="flex items-center justify-center bg-teal-lightest font-sans">
							<div class="w-full  bg-white rounded shadow p-6 m-8">
								<div class="flex">
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Propietario?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_es_propietario" v-model="form.owner" value="true" >
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_es_propietario" v-model="form.owner" value="false" >
												<span class="ml-2">No</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Es Correcto?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_owner_correcto" v-model="form.owner_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(1, true)">
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_owner_correcto" v-model="form.owner_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(1, false)">
												<span class="ml-2">No</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_owner_correcto" v-model="form.owner_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(1, 'nada')">
												<span class="ml-2">Sin evaluar</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3" v-show="!form.owner_correcto">
										<label
											class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
											for="obs_owner"
											>Observación:</label
										>
										<textarea
											id="obs_owner"
											name="obs_owner"
											v-model="form.obs_owner"
											class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
										</textarea>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="flex items-center justify-center bg-teal-lightest font-sans">
							<div class="w-full  bg-white rounded shadow p-6 m-8">
								<div class="flex">
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Arendatario?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_es_arrendatario" v-model="form.arrendatario" value="true" >
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_es_arrendatario" v-model="form.arrendatario" value="false" >
												<span class="ml-2">No</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Es Correcto?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_arrendatario_correcto" v-model="form.arrendatario_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(2, true)">
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_arrendatario_correcto" v-model="form.arrendatario_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(2, false)">
												<span class="ml-2">No</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_arrendatario_correcto" v-model="form.arrendatario_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(2, 'nada')">
												<span class="ml-2">Sin evaluar</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3" v-show="!form.arrendatario_correcto">
										<label
											class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
											for="obs_arrendatario"
											>Observación:</label
										>
										<textarea
											id="obs_arrendatario"
											name="obs_arrendatario"
											v-model="form.obs_arrendatario"
											class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
										</textarea>
										<p  v-show="form.obs_arrendatario_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="flex items-center justify-center bg-teal-lightest font-sans">
							<div class="w-full  bg-white rounded shadow p-6 m-8">
								<div class="flex">
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Concesionario?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_es_concesionario" v-model="form.concesionario" value="true" >
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_es_concesionario" v-model="form.concesionario" value="false" >
												<span class="ml-2">No</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Es Correcto?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_concesionario_correcto" v-model="form.concesionario_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(3, true)">
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_concesionario_correcto" v-model="form.concesionario_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(3, false)">
												<span class="ml-2">No</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_concesionario_correcto" v-model="form.concesionario_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(3, 'nada')">
												<span class="ml-2">Sin evaluar</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3" v-show="!form.concesionario_correcto">
										<label
											class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
											for="obs_concesionario"
											>Observación:</label
										>
										<textarea
											id="obs_concesionario"
											name="obs_concesionario"
											v-model="form.obs_concesionario"
											class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
										</textarea>
										<p  v-show="form.obs_concesionario_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="flex items-center justify-center bg-teal-lightest font-sans">
							<div class="w-full  bg-white rounded shadow p-6 m-8">
								<div class="flex">
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Otros?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_es_otros" v-model="form.otros" value="true" >
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_es_otros" v-model="form.otros" value="false" >
												<span class="ml-2">No</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3">
										<span class="text-gray-700">Es Correcto?</span>
										<div class="mt-2">
											<label class="inline-flex items-center">
												<input type="radio" class="form-radio" name="name_otros_correcto" v-model="form.otros_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(4, true)">
												<span class="ml-2">Si</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_otros_correcto" v-model="form.otros_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(4, false)">
												<span class="ml-2">No</span>
											</label>
											<label class="inline-flex items-center ml-6">
												<input type="radio" class="form-radio" name="name_otros_correcto" v-model="form.otros_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(4, 'nada')">
												<span class="ml-2">Sin evaluar</span>
											</label>
										</div>
									</div>
									<div class="w-full md:w-1/3 px-3" v-show="!form.otros_correcto">
										<label
											class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
											for="obs_otros"
											>Observación:</label
										>
										<textarea
											id="obs_otros"
											name="obs_otros"
											v-model="form.obs_otros"
											class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
										</textarea>
										<p  v-show="form.obs_otros_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
									</div>
								</div>
							</div>
						</div>
						<br>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="titulo_contrato_posecion"
						>Titulo de Contrato o Posición:</label
					>
					<input
						id="titulo_contrato_posecion"
						name="titulo_contrato_posecion"
						v-model="form.titulo_contrato_posecion"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.titulo_contrato_posecion_validacion"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_titulo_contrato_posecion_correcto" v-model="form.titulo_contrato_posecion_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(5, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_titulo_contrato_posecion_correcto" v-model="form.titulo_contrato_posecion_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(5, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_titulo_contrato_posecion_correcto" v-model="form.titulo_contrato_posecion_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(5, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.titulo_contrato_posecion_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_titulo_contrato_posecion"
								>Observación:</label
							>
							<textarea
									id="obs_titulo_contrato_posecion"
									name="obs_titulo_contrato_posecion"
									v-model="form.obs_titulo_contrato_posecion"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_titulo_contrato_posecion_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 px-3">
					<object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
					<p>It appears you don't have a PDF plugin for this browser.
						 No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
						download the PDF file.</a></p>  
					</object>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="resolucion_concesion_minera"
						>Resolución Concesión Minera</label
					>
					<input
						id="resolucion_concesion_minera"
						name="resolucion_concesion_minera"
						v-model="form.resolucion_concesion_minera"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.resolucion_concesion_minera_validacion"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_resolucion_concesion_minera_correcto" v-model="form.resolucion_concesion_minera_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(6, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_resolucion_concesion_minera_correcto" v-model="form.resolucion_concesion_minera_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(6, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_resolucion_concesion_minera_correcto" v-model="form.resolucion_concesion_minera_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(6, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.resolucion_concesion_minera_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_resolucion_concesion_minera"
								>Observación:</label
							>
							<textarea
									id="obs_resolucion_concesion_minera"
									name="obs_resolucion_concesion_minera"
									v-model="form.obs_resolucion_concesion_minera"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_resolucion_concesion_minera_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 px-3">
					<object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
					<p>It appears you don't have a PDF plugin for this browser.
						 No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
						download the PDF file.</a></p>  
					</object>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="constancia_pago_canon"
						>Resolución Concesión Minera</label
					>
					<input
						id="constancia_pago_canon"
						name="constancia_pago_canon"
						v-model="form.constancia_pago_canon"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.constancia_pago_canon_validacion"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_constancia_pago_canon_correcto" v-model="form.constancia_pago_canon_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(7, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_constancia_pago_canon_correcto" v-model="form.constancia_pago_canon_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(7, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_constancia_pago_canon_correcto" v-model="form.constancia_pago_canon_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(7, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.constancia_pago_canon_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_constancia_pago_canon"
								>Observación:</label
							>
							<textarea
									id="obs_constancia_pago_canon"
									name="obs_constancia_pago_canon"
									v-model="form.obs_constancia_pago_canon"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_constancia_pago_canon_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 px-3">
					<object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
					<p>It appears you don't have a PDF plugin for this browser.
						 No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
						download the PDF file.</a></p>  
					</object>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="iia"
						>IIA</label
					>
					<input
						id="iia"
						name="iia"
						v-model="form.iia"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.iia_canon_validacion"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_iia_correcto" v-model="form.iia_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(8, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_iia_correcto" v-model="form.iia_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(8, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_iia_correcto" v-model="form.iia_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(8, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.iia_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_iia_canon"
								>Observación:</label
							>
							<textarea
									id="obs_iia_canon"
									name="obs_iia_canon"
									v-model="form.obs_iia_canon"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_iia_canon_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 px-3">
					<object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
					<p>It appears you don't have a PDF plugin for this browser.
						 No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
						download the PDF file.</a></p>  
					</object>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="dia"
						>DIA</label
					>
					<input
						id="dia"
						name="dia"
						v-model="form.dia"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.dia_canon_validacion"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_dia_correcto" v-model="form.dia_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(9, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_dia_correcto" v-model="form.dia_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(9, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_dia_correcto" v-model="form.dia_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(9, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.dia_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_dia_canon"
								>Observación:</label
							>
							<textarea
									id="obs_dia_canon"
									name="obs_dia_canon"
									v-model="form.obs_dia_canon"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_dia_canon_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 px-3">
					<object data="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf" type="application/pdf" width="100%" height="500px"> 
					<p>It appears you don't have a PDF plugin for this browser.
						 No biggie... you can <a href="http://localhost:8000/storage/files_formularios/ochamplin@gmail.com/SurcLTZenTIxJsXmyoCJAHa4mDmLJUTLuseTWHeP.pdf">click here to
						download the PDF file.</a></p>  
					</object>
				</div>
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="acciones_a_desarrollar"
							>Acciones a desarrollar</label
						>
						<input
							id="acciones_a_desarrollar"
							name="acciones_a_desarrollar"
							v-model="form.acciones_a_desarrollar"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.acciones_a_desarrollar_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_acciones_a_desarrollar_correcto" v-model="form.acciones_a_desarrollar_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(10, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_acciones_a_desarrollar_correcto" v-model="form.acciones_a_desarrollar_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(10, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_acciones_a_desarrollar_correcto" v-model="form.acciones_a_desarrollar_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(10, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.acciones_a_desarrollar_correcto"  class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_acciones_a_desarrollar"
									>Observación:</label
								>
								<textarea
										id="obs_acciones_a_desarrollar"
										name="obs_acciones_a_desarrollar"
										v-model="form.obs_acciones_a_desarrollar"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_acciones_a_desarrollar_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="actividad"
							>Actividad</label
						>
						<input
							id="actividad"
							name="actividad"
							v-model="form.actividad"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.actividad_a_desarrollar_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_actividad_a_desarrollar_correcto" v-model="form.actividad_a_desarrollar_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(11, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_actividad_a_desarrollar_correcto" v-model="form.actividad_a_desarrollar_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(11, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_actividad_a_desarrollar_correcto" v-model="form.actividad_a_desarrollar_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(11, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.actividad_a_desarrollar_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_actividad_a_desarrollar"
									>Observación:</label
								>
								<textarea
										id="obs_actividad_a_desarrollar"
										name="obs_actividad_a_desarrollar"
										v-model="form.obs_actividad_a_desarrollar"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_actividad_a_desarrollar_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="fecha_alta_dia"
							>Fecha de Notificación de DIA</label
						>
						<input
							id="fecha_alta_dia"
							name="fecha_alta_dia"
							v-model="form.fecha_alta_dia"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.fecha_alta_dia_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_fecha_alta_dia_correcto" v-model="form.fecha_alta_dia_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(12, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_fecha_alta_dia_correcto" v-model="form.fecha_alta_dia_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(12, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_fecha_alta_dia_correcto" v-model="form.fecha_alta_dia_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(12, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.fecha_alta_dia_correcto"  class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_fecha_alta_dia"
									>Observación:</label
								>
								<textarea
										id="obs_fecha_alta_dia"
										name="obs_fecha_alta_dia"
										v-model="form.obs_fecha_alta_dia"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_fecha_alta_dia_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="fecha_vencimiento_dia"
							>Actividad</label
						>
						<input
							id="fecha_vencimiento_dia"
							name="fecha_vencimiento_dia"
							v-model="form.fecha_vencimiento_dia"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.fecha_vencimiento_dia_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_fecha_vencimiento_dia_correcto" v-model="form.fecha_vencimiento_dia_correcto" value="true" v-on:change="calculo_de_porcentajes_cinco(13, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_fecha_vencimiento_dia_correcto" v-model="form.fecha_vencimiento_dia_correcto" value="false" v-on:change="calculo_de_porcentajes_cinco(13, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_fecha_vencimiento_dia_correcto" v-model="form.fecha_vencimiento_dia_correcto" value="nada" v-on:change="calculo_de_porcentajes_cinco(13, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.fecha_vencimiento_dia_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_fecha_vencimiento_dia"
									>Observación:</label
								>
								<textarea
										id="obs_fecha_vencimiento_dia"
										name="obs_fecha_vencimiento_dia"
										v-model="form.obs_fecha_vencimiento_dia"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_fecha_vencimiento_dia_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="flex flex-col mb-8">
				<button
					type="button"
					class=" text-white uppercase text-lg mx-auto py-6 px-20 rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
					@click="guardar_avances_cinco"
				>
					Guardar: Datos de la Mina o Cantera (2)
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
			<br><br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="localidad_mina_pais"
							>País de la Mina</label
						>
						<select
							id="localidad_mina_pais"
							name="localidad_mina_pais"
							v-model="form.localidad_mina_pais"
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option value="-1">Really long option that will likely overlap the chevron</option>
							<option value="Argentina">Argentina</option>
							<option value="-3">Option 3</option>
						</select>
						<p v-show="form.localidad_mina_pais_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_localidad_mina_pais_correcto" v-model="form.localidad_mina_pais_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(1, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_pais_correcto" v-model="form.localidad_mina_pais_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(1, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_pais_correcto" v-model="form.localidad_mina_pais_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(1, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								
								<div v-show="!form.localidad_mina_pais_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_localidad_mina_pais"
										>Observación:</label
									>
									<textarea
										id="obs_localidad_mina_pais"
										name="obs_localidad_mina_pais"
										v-model="form.obs_localidad_mina_pais"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_localidad_mina_pais_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="localidad_mina_provincia"
							>Provincia de la mina</label>
						<select
							id="localidad_mina_provincia"
							name="localidad_mina_provincia"
							v-model="form.localidad_mina_provincia" 
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option :value="null" />
								<option value="Buenos Aires">Buenos Aires</option>
								<option value="Buenos Aires-GBA">Buenos Aires-GBA</option>
								<option value="Capital Federal">Capital Federal</option>
								<option value="Catamarca">Catamarca</option>
								<option value="Chaco">Chaco</option>
								<option value="Chubut">Chubut</option>
								<option value="Cordoba">Cordoba</option>
								<option value="Corrientes">Corrientes</option>
								<option value="Entre Rios">Entre Rios</option>
								<option value="Formosa">Formosa</option>
								<option value="Jujuy">Jujuy</option>
								<option value="La Pampa">La Pampa</option>
								<option value="La Rioja">La Rioja</option>
								<option value="Mendoza">Mendoza</option>
								<option value="Misiones">Misiones</option>
								<option value="Neuquen">Neuquen</option>
								<option value="Rio Negro">Rio Negro</option>
								<option value="Salta">Salta</option>
								<option value="San Juan">San Juan</option>
								<option value="San Luis">San Luis</option>
								<option value="Santa Cruz">Santa Cruz</option>
								<option value="Santa Fe">Santa Fe</option>
								<option value="Santiago del Estero">Santiago del Estero</option>
								<option value="Tierra del Fuego">Tierra del Fuego</option>
								<option value="Tucuman">Tucuman</option>
								<option value="Provincia 2 de brazil">Provincia 2 de brazil</option>
						</select>
						<p v-show="form.localidad_mina_provincia_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_localidad_mina_provincia_correcto" v-model="form.localidad_mina_provincia_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(2, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_provincia_correcto" v-model="form.localidad_mina_provincia_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(2, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_provincia_correcto" v-model="form.localidad_mina_provincia_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(2, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div v-show="!form.localidad_mina_provincia_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_localidad_mina_provincia"
										>Observación:</label
									>
									<textarea
										id="obs_localidad_mina_provincia"
										name="obs_localidad_mina_provincia"
										v-model="form.obs_localidad_mina_provincia"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>

									
									<p v-show="form.obs_localidad_mina_provincia_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="localidad_mina_departamento"
							>Departamento de la mina</label>
						<select
							id="localidad_mina_departamento"
							name="localidad_mina_departamento"
							v-model="form.localidad_mina_departamento" 
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option :value="null" />
								<option value="Buenos Aires">Buenos Aires</option>
								<option value="Jachal">Jachal</option>
								<option value="Capital">Capital</option>
								<option value="Chimbas">Chimbas</option>
								<option value="Corrientes">Corrientes</option>
								<option value="Formosa">Formosa</option>
								<option value="Jujuy">Jujuy</option>
								<option value="Mendoza">Mendoza</option>
								<option value="Neuquen">Neuquen</option>
								<option value="Salta">Salta</option>
								<option value="Tucuman">Tucuman</option>
						</select>
						<p v-show="form.localidad_mina_departamento_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_localidad_mina_departamento_correcto" v-model="form.localidad_mina_departamento_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(3, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_departamento_correcto" v-model="form.localidad_mina_departamento_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(3, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_localidad_mina_departamento_correcto" v-model="form.localidad_mina_departamento_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(3, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div  v-show="!form.localidad_mina_departamento_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_localidad_mina_departamento"
										>Observación:</label
									>
									<textarea
										id="obs_localidad_mina_departamento"
										name="obs_localidad_mina_departamento"
										v-model="form.obs_localidad_mina_departamento"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_localidad_mina_departamento_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
			</div>
			<br>
			<br>

			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="localidad_mina_localidad"
							>Localidad donde se encuentra la mina:</label
						>
						<input
							id="localidad_mina_localidad"
							name="localidad_mina_localidad"
							v-model="form.localidad_mina_localidad"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.localidad_mina_localidad_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="nombre_localidad_mina_localidad_correcto"  v-model="form.localidad_mina_localidad_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(4, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_localidad_mina_localidad_correcto"  v-model="form.localidad_mina_localidad_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(4, false)">
										<span class="ml-2">No</span>
									</label>
								</div>
								<label class="inline-flex items-center ml-6">
									<input type="radio" class="form-radio" name="nombre_localidad_mina_localidad_correcto" v-model="form.localidad_mina_localidad_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(4, 'nada')">
									<span class="ml-2">Sin evaluar</span>
								</label>
							</div>
							<div v-show="!form.localidad_mina_localidad_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_localidad_mina_localidad"
									>Observación:</label
								>
								<textarea
									id="obs_localidad_mina_localidad"
									name="obs_localidad_mina_localidad"
									v-model="form.obs_localidad_mina_localidad"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								
								<p v-show="form.obs_localidad_mina_localidad_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>

				</div>
				
			</div>
			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/3 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="tipo_sistema"
							>Tipo de sistema de Coordenadas</label
						>
						<input
							id="tipo_sistema"
							name="tipo_sistema"
							v-model="form.tipo_sistema"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.tipo_sistema_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="nombre_tipo_sistema_correcto"  v-model="form.tipo_sistema_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(5, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_tipo_sistema_correcto"  v-model="form.tipo_sistema_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(5, false)">
										<span class="ml-2">No</span>
									</label>
								</div>
								<label class="inline-flex items-center ml-6">
									<input type="radio" class="form-radio" name="nombre_tipo_sistema_correcto" v-model="form.tipo_sistema_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(5, 'nada')">
									<span class="ml-2">Sin evaluar</span>
								</label>
							</div>
							<div v-show="!form.tipo_sistema_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_tipo_sistema"
									>Observación:</label
								>
								<textarea
									id="obs_tipo_sistema"
									name="obs_tipo_sistema"
									v-model="form.obs_tipo_sistema"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								
								<p v-show="form.obs_tipo_sistema_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>

				</div>
				<div class="w-full md:w-1/3 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="latitud"
							>Latitud</label
						>
						<input
							id="latitud"
							name="latitud"
							v-model="form.latitud"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.latitud_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_latitud_correcto"  v-model="form.latitud_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(6, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_latitud_correcto"  v-model="form.latitud_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(6, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_latitud_correcto" v-model="form.latitud_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(6, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.latitud_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_latitud"
									>Observación:</label
								>
								<textarea
									id="obs_latitud"
									name="obs_latitud"
									v-model="form.obs_latitud"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_latitud_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="longitud"
							>Longitud</label
						>
						<input
							id="longitud"
							name="longitud"
							v-model="form.longitud"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.longitud_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_longitud_correcto"  v-model="form.longitud_correcto" value="true" v-on:change="calculo_de_porcentajes_seis(7, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_longitud_correcto"  v-model="form.longitud_correcto" value="false" v-on:change="calculo_de_porcentajes_seis(7, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_longitud_correcto" v-model="form.longitud_correcto" value="nada" v-on:change="calculo_de_porcentajes_seis(7, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.longitud_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_longitud"
									>Observación:</label
								>
								<textarea
									id="obs_longitud"
									name="obs_longitud"
									v-model="form.obs_longitud"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_longitud_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
			</div>
			<br>
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

					<!-- <div class="mr-6">
							<button class="px-9 py-4   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">Learn More</button>
							<button class="px-8 py-3.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-red-200 hover:bg-red-300 text-red-900">New</button>
							<button class="px-7 py-3   mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-yellow-200 hover:bg-yellow-300 text-yellow-900">New</button>
							<button class="px-6 py-2.5 mb-4  text-base   font-semibold rounded-full block  border-b border-purple-300 bg-green-200 hover:bg-green-300 text-green-900">New</button>
							<button class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-purple-300 bg-indigo-200 hover:bg-indigo-300 text-indigo-900">New</button>
						</div> -->


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
		ValidationErrors,
	},
	props: ["productor"],
	data() {
		return {
			confirmingUserDeletion:false,
			modal_tittle: '',
			modal_body: '',
			form: {
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
				constaciasociedad_correcto:  this.$props.productor.constaciasociedad_correcto,
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
				nombre_calle_legal_correcto: 'nada',
				obs_nombre_calle_legal: '',
				obs_nombre_calle_legal_valido: false,

				leal_numero: this.$props.productor.leal_numero,
				leal_numero_valido:  true,
				leal_numero_correcto: 'nada',
				obs_leal_numero: '',
				obs_leal_numero_valido: false,


				leal_telefono: this.$props.productor.leal_telefono,
				leal_telefono_valido:  true,
				leal_telefono_correcto: 'nada',
				obs_leal_telefono: '',
				obs_leal_telefono_valido: false,


				leal_pais: this.$props.productor.leal_pais,
				leal_pais_valido:  true,
				leal_pais_correcto: 'nada',
				obs_leal_pais: '',
				obs_leal_pais_valido: false,


				leal_provincia: this.$props.productor.leal_provincia,
				leal_provincia_valido:  true,
				leal_provincia_correcto: 'nada',
				obs_leal_provincia: '',
				obs_leal_provincia_valido: false,


				leal_departamento: this.$props.productor.leal_departamento,
				leal_departamento_valido:  true,
				leal_departamento_correcto: 'nada',
				obs_leal_departamento: '',
				obs_leal_departamento_valido: false,

				leal_localidad: this.$props.productor.leal_localidad,
				leal_localidad_valido:  true,
				leal_localidad_correcto: 'nada',
				obs_leal_localidad: '',
				obs_leal_localidad_valido: false,



				leal_cp: this.$props.productor.leal_cp,
				leal_cp_valido:  true,
				leal_cp_correcto: 'nada',
				obs_leal_cp: '',
				obs_leal_cp_valido: false,




				leal_otro: this.$props.productor.leal_otro,
				leal_otro_valido:  true,
				leal_otro_correcto: 'nada',
				obs_leal_otro: '',
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
				numero_expdiente_correcto: 'nada',
				obs_numero_expdiente: '',
				obs_numero_expdiente_valido: false,


				categoria: this.$props.productor.categoria,
				categoria_validacion:  true,
				categoria_correcto: 'nada',
				obs_categoria: '',
				obs_categoria_valido: false,

				nombre_mina: this.$props.productor.nombre_mina,
				nombre_mina_validacion:  true,
				nombre_mina_correcto: 'nada',
				obs_nombre_mina: '',
				obs_nombre_mina_valido: false,


				descripcion_mina: this.$props.productor.descripcion_mina,
				descripcion_mina_validacion:  true,
				descripcion_mina_correcto: 'nada',
				obs_descripcion_mina: '',
				obs_descripcion_mina_valido: false,


				distrito_minero: this.$props.productor.distrito_minero,
				distrito_minero_validacion:  true,
				distrito_minero_correcto: 'nada',
				obs_distrito_minero: '',
				obs_distrito_minero_valido: false,



				mina_cantera: this.$props.productor.mina_cantera,
				mina_cantera_validacion:  true,
				mina_cantera_correcto: 'nada',
				obs_mina_cantera: '',
				obs_mina_cantera_valido: false,


				plano_inmueble: this.$props.productor.plano_inmueble,
				plano_inmueble_validacion:  true,
				plano_inmueble_correcto: 'nada',
				obs_plano_inmueble: '',
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
				owner_correcto: 'nada',
				obs_owner: '',
				obs_owner_valido: false,

				arrendatario: this.$props.productor.arrendatario,
				arrendatario_correcto: 'nada',
				obs_arrendatario: '',
				obs_arrendatario_valido: false,


				concesionario: this.$props.productor.concesionario,
				concesionario_correcto: 'nada',
				obs_concesionario: '',
				obs_concesionario_valido: false,




				otros: this.$props.productor.otros,
				otros_correcto: 'nada',
				obs_otros: '',
				obs_otros_valido: false,

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
				obs_acciones_a_desarrollar_valido: false,



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
		actaulizar_variables_correctas(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.razon_social_correcto= true;
				if(valor == false)
					this.form.razon_social_correcto= false;
				if(valor == 'nada')
					this.form.razon_social_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.email_correcto= true;
				if(valor == false)
					this.form.email_correcto= false;
				if(valor == 'nada')
					this.form.email_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.cuit_correcto= true;
				if(valor == false)
					this.form.cuit_correcto= false;
				if(valor == 'nada')
					this.form.cuit_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.numeroproductor_correcto= true;
				if(valor == false)
					this.form.numeroproductor_correcto= false;
				if(valor == 'nada')
					this.form.numeroproductor_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.tiposociedad_correcto= true;
				if(valor == false)
					this.form.tiposociedad_correcto= false;
				if(valor == 'nada')
					this.form.tiposociedad_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.inscripciondgr_correcto= true;
				if(valor == false)
					this.form.inscripciondgr_correcto= false;
				if(valor == 'nada')
					this.form.inscripciondgr_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.constaciasociedad_correcto= true;
				if(valor == false)
					this.form.constaciasociedad_correcto= false;
				if(valor == 'nada')
					this.form.constaciasociedad_correcto= 'nada';
			}
		},
		actaulizar_variables_correctas_dos(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.nombre_calle_legal_correcto= true;
				if(valor == false)
					this.form.nombre_calle_legal_correcto= false;
				if(valor == 'nada')
					this.form.nombre_calle_legal_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_numero_correcto= true;
				if(valor == false)
					this.form.leal_numero_correcto= false;
				if(valor == 'nada')
					this.form.leal_numero_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_telefono_correcto= true;
				if(valor == false)
					this.form.leal_telefono_correcto= false;
				if(valor == 'nada')
					this.form.leal_telefono_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_pais_correcto= true;
				if(valor == false)
					this.form.leal_pais_correcto= false;
				if(valor == 'nada')
					this.form.leal_pais_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_provincia_correcto= true;
				if(valor == false)
					this.form.leal_provincia_correcto= false;
				if(valor == 'nada')
					this.form.leal_provincia_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_departamento_correcto= true;
				if(valor == false)
					this.form.leal_departamento_correcto= false;
				if(valor == 'nada')
					this.form.leal_departamento_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_localidad_correcto= true;
				if(valor == false)
					this.form.leal_localidad_correcto= false;
				if(valor == 'nada')
					this.form.leal_localidad_correcto= 'nada';
			}

			if(que_cambio == 8)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_cp_correcto= true;
				if(valor == false)
					this.form.leal_cp_correcto= false;
				if(valor == 'nada')
					this.form.leal_cp_correcto= 'nada';
			}

			if(que_cambio == 9)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.leal_otro_correcto= true;
				if(valor == false)
					this.form.leal_otro_correcto= false;
				if(valor == 'nada')
					this.form.leal_otro_correcto= 'nada';
			}
		},

		actaulizar_variables_correctas_tres(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_calle_correcto= true;
				if(valor == false)
					this.form.administracion_calle_correcto= false;
				if(valor == 'nada')
					this.form.administracion_calle_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_numero_correcto= true;
				if(valor == false)
					this.form.administracion_numero_correcto= false;
				if(valor == 'nada')
					this.form.administracion_numero_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_telefono_correcto= true;
				if(valor == false)
					this.form.administracion_telefono_correcto= false;
				if(valor == 'nada')
					this.form.administracion_telefono_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_pais_correcto= true;
				if(valor == false)
					this.form.administracion_pais_correcto= false;
				if(valor == 'nada')
					this.form.administracion_pais_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_provincia_correcto= true;
				if(valor == false)
					this.form.administracion_provincia_correcto= false;
				if(valor == 'nada')
					this.form.administracion_provincia_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_departamento_correcto= true;
				if(valor == false)
					this.form.administracion_departamento_correcto= false;
				if(valor == 'nada')
					this.form.administracion_departamento_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_localidad_correcto= true;
				if(valor == false)
					this.form.administracion_localidad_correcto= false;
				if(valor == 'nada')
					this.form.administracion_localidad_correcto= 'nada';
			}

			if(que_cambio == 8)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_cp_correcto= true;
				if(valor == false)
					this.form.administracion_cp_correcto= false;
				if(valor == 'nada')
					this.form.administracion_cp_correcto= 'nada';
			}

			if(que_cambio == 9)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_otro_correcto= true;
				if(valor == false)
					this.form.administracion_otro_correcto= false;
				if(valor == 'nada')
					this.form.administracion_otro_correcto= 'nada';
			}
		},
		actaulizar_variables_correctas_cuatro(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.numero_expdiente_correcto= true;
				if(valor == false)
					this.form.numero_expdiente_correcto= false;
				if(valor == 'nada')
					this.form.numero_expdiente_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.categoria_correcto= true;
				if(valor == false)
					this.form.categoria_correcto= false;
				if(valor == 'nada')
					this.form.categoria_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.nombre_mina_correcto= true;
				if(valor == false)
					this.form.nombre_mina_correcto= false;
				if(valor == 'nada')
					this.form.nombre_mina_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.descripcion_mina_correcto= true;
				if(valor == false)
					this.form.descripcion_mina_correcto= false;
				if(valor == 'nada')
					this.form.descripcion_mina_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.distrito_minero_correcto= true;
				if(valor == false)
					this.form.distrito_minero_correcto= false;
				if(valor == 'nada')
					this.form.distrito_minero_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.mina_cantera_correcto= true;
				if(valor == false)
					this.form.mina_cantera_correcto= false;
				if(valor == 'nada')
					this.form.mina_cantera_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.mina_cantera_correcto= true;
				if(valor == false)
					this.form.mina_cantera_correcto= false;
				if(valor == 'nada')
					this.form.mina_cantera_correcto= 'nada';
			}

			if(que_cambio == 8)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.minerales_variedad_correcto= true;
				if(valor == false)
					this.form.minerales_variedad_correcto= false;
				if(valor == 'nada')
					this.form.minerales_variedad_correcto= 'nada';
			}

			if(que_cambio == 9)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.administracion_otro_correcto= true;
				if(valor == false)
					this.form.administracion_otro_correcto= false;
				if(valor == 'nada')
					this.form.administracion_otro_correcto= 'nada';
			}
		},
		actaulizar_variables_correctas_cinco(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.owner_correcto= true;
				if(valor == false)
					this.form.owner_correcto= false;
				if(valor == 'nada')
					this.form.owner_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.arrendatario_correcto= true;
				if(valor == false)
					this.form.arrendatario_correcto= false;
				if(valor == 'nada')
					this.form.arrendatario_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.concesionario_correcto= true;
				if(valor == false)
					this.form.concesionario_correcto= false;
				if(valor == 'nada')
					this.form.concesionario_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.otros_correcto= true;
				if(valor == false)
					this.form.otros_correcto= false;
				if(valor == 'nada')
					this.form.otros_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.titulo_contrato_posecion_correcto= true;
				if(valor == false)
					this.form.titulo_contrato_posecion_correcto= false;
				if(valor == 'nada')
					this.form.titulo_contrato_posecion_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.resolucion_concesion_minera_correcto= true;
				if(valor == false)
					this.form.resolucion_concesion_minera_correcto= false;
				if(valor == 'nada')
					this.form.resolucion_concesion_minera_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.constancia_pago_canon_correcto= true;
				if(valor == false)
					this.form.constancia_pago_canon_correcto= false;
				if(valor == 'nada')
					this.form.constancia_pago_canon_correcto= 'nada';
			}

			if(que_cambio == 8)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.iia_correcto= true;
				if(valor == false)
					this.form.iia_correcto= false;
				if(valor == 'nada')
					this.form.iia_correcto= 'nada';
			}

			if(que_cambio == 9)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.dia_correcto= true;
				if(valor == false)
					this.form.dia_correcto= false;
				if(valor == 'nada')
					this.form.dia_correcto= 'nada';
			}
			if(que_cambio == 10)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.acciones_a_desarrollar_correcto= true;
				if(valor == false)
					this.form.acciones_a_desarrollar_correcto= false;
				if(valor == 'nada')
					this.form.acciones_a_desarrollar_correcto= 'nada';
			}
			if(que_cambio == 11)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.actividad_a_desarrollar_correcto= true;
				if(valor == false)
					this.form.actividad_a_desarrollar_correcto= false;
				if(valor == 'nada')
					this.form.actividad_a_desarrollar_correcto= 'nada';
			}
			if(que_cambio == 12)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.fecha_alta_dia_correcto= true;
				if(valor == false)
					this.form.fecha_alta_dia_correcto= false;
				if(valor == 'nada')
					this.form.fecha_alta_dia_correcto= 'nada';
			}
			if(que_cambio == 13)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.fecha_vencimiento_dia_correcto= true;
				if(valor == false)
					this.form.fecha_vencimiento_dia_correcto= false;
				if(valor == 'nada')
					this.form.fecha_vencimiento_dia_correcto= 'nada';
			}
		},
		actaulizar_variables_correctas_seis(que_cambio, valor) {
			if(que_cambio == 1)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.localidad_mina_pais_correcto= true;
				if(valor == false)
					this.form.localidad_mina_pais_correcto= false;
				if(valor == 'nada')
					this.form.localidad_mina_pais_correcto= 'nada';
			}
			if(que_cambio == 2)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.localidad_mina_provincia_correcto= true;
				if(valor == false)
					this.form.localidad_mina_provincia_correcto= false;
				if(valor == 'nada')
					this.form.localidad_mina_provincia_correcto= 'nada';
			}
			if(que_cambio == 3)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.localidad_mina_departamento_correcto= true;
				if(valor == false)
					this.form.localidad_mina_departamento_correcto= false;
				if(valor == 'nada')
					this.form.localidad_mina_departamento_correcto= 'nada';
			}

			if(que_cambio == 4)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.localidad_mina_localidad_correcto= true;
				if(valor == false)
					this.form.localidad_mina_localidad_correcto= false;
				if(valor == 'nada')
					this.form.localidad_mina_localidad_correcto= 'nada';
			}

			if(que_cambio == 5)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.tipo_sistema_correcto= true;
				if(valor == false)
					this.form.tipo_sistema_correcto= false;
				if(valor == 'nada')
					this.form.tipo_sistema_correcto= 'nada';
			}

			if(que_cambio == 6)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.latitud_correcto= true;
				if(valor == false)
					this.form.latitud_correcto= false;
				if(valor == 'nada')
					this.form.latitud_correcto= 'nada';
			}


			if(que_cambio == 7)
			{
				// significa que camvio la razon_social
				if(valor == true)
					this.form.longitud_correcto= true;
				if(valor == false)
					this.form.longitud_correcto= false;
				if(valor == 'nada')
					this.form.longitud_correcto= 'nada';
			}
			
		},
		calculo_de_porcentajes(que_cambio, valor) {
			var aprobados = 0;
			var progreso = 0;
			var reprobado = 0;

			this.actaulizar_variables_correctas(que_cambio, valor);



			if(this.form.razon_social_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.razon_social_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.razon_social_correcto == 'nada')
			{
				progreso++;
			}

			if(this.form.email_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.email_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.email_correcto == 'nada')
			{
				progreso++;
			}


			if(this.form.cuit_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.cuit_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.cuit_correcto == 'nada')
			{
				progreso++;
			}


			if(this.form.numeroproductor_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.numeroproductor_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.numeroproductor_correcto == 'nada')
			{
				progreso++;
			}

			if(this.form.tiposociedad_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.tiposociedad_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.tiposociedad_correcto == 'nada')
			{
				progreso++;
			}


			if(this.form.inscripciondgr_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.inscripciondgr_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.inscripciondgr_correcto == 'nada')
			{
				progreso++;
			}


			if(this.form.constaciasociedad_correcto == true)
			{
				aprobados ++;
			}
			if(this.form.constaciasociedad_correcto == false)
			{
				reprobado ++;
			}
			if(this.form.constaciasociedad_correcto == 'nada')
			{
				progreso++;
			}

			//calcular porcentajes

			this.form.valor_de_progreso = (progreso * 100 ) / 7;
			this.form.valor_de_aprobado = (aprobados * 100 ) / 7;
			this.form.valor_de_reprobado = (reprobado * 100 ) / 7;

			if(progreso == 7)
				this.form.valor_de_progreso = 100;
			if(aprobados == 7)
				this.form.valor_de_aprobado = 100;
			if(reprobado == 7)
				this.form.valor_de_reprobado = 100;


			this.form.valor_de_progreso =  this.form.valor_de_progreso.toFixed(2);
			this.form.valor_de_aprobado =  this.form.valor_de_aprobado.toFixed(2);
			this.form.valor_de_reprobado = this.form.valor_de_reprobado.toFixed(2);

		},
		
		calculo_de_porcentajes_dos(que_cambio, valor) {
			var aprobados_dos = 0;
			var progreso_dos = 0;
			var reprobado_dos = 0;

			this.actaulizar_variables_correctas_dos(que_cambio, valor);



			if(this.form.nombre_calle_legal_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.nombre_calle_legal_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.nombre_calle_legal_correcto == 'nada')
			{
				progreso_dos++;
			}

			if(this.form.leal_numero_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_numero_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_numero_correcto == 'nada')
			{
				progreso_dos++;
			}


			if(this.form.leal_telefono_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_telefono_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_telefono_correcto == 'nada')
			{
				progreso_dos++;
			}


			if(this.form.leal_pais_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_pais_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_pais_correcto == 'nada')
			{
				progreso_dos++;
			}

			if(this.form.leal_provincia_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_provincia_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_provincia_correcto == 'nada')
			{
				progreso_dos++;
			}


			if(this.form.leal_departamento_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_departamento_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_departamento_correcto == 'nada')
			{
				progreso_dos++;
			}


			if(this.form.leal_localidad_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_localidad_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_localidad_correcto == 'nada')
			{
				progreso_dos++;
			}



			if(this.form.leal_cp_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_cp_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_cp_correcto == 'nada')
			{
				progreso_dos++;
			}



			if(this.form.leal_localidad_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_localidad_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_localidad_correcto == 'nada')
			{
				progreso_dos++;
			}



			if(this.form.leal_otro_correcto == true)
			{
				aprobados_dos ++;
			}
			if(this.form.leal_otro_correcto == false)
			{
				reprobado_dos ++;
			}
			if(this.form.leal_otro_correcto == 'nada')
			{
				progreso_dos++;
			}



			//calcular porcentajes

			this.form.valor_de_progreso_dos = (progreso_dos * 100 ) / 9;
			this.form.valor_de_aprobado_dos = (aprobados_dos * 100 ) / 9;
			this.form.valor_de_reprobado_dos = (reprobado_dos * 100 ) / 9;

			if(progreso_dos == 9)
				this.form.valor_de_progreso_dos = 100;
			if(aprobados_dos == 9)
				this.form.valor_de_aprobado_dos = 100;
			if(reprobado_dos == 9)
				this.form.valor_de_reprobado_dos = 100;


			this.form.valor_de_progreso_dos =  this.form.valor_de_progreso_dos.toFixed(2);
			this.form.valor_de_aprobado_dos =  this.form.valor_de_aprobado_dos.toFixed(2);
			this.form.valor_de_reprobado_dos = this.form.valor_de_reprobado_dos.toFixed(2);

		},
		calculo_de_porcentajes_tres(que_cambio, valor) {
			var aprobados_tres = 0;
			var progreso_tres = 0;
			var reprobado_tres = 0;

			this.actaulizar_variables_correctas_tres(que_cambio, valor);



			if(this.form.administracion_calle_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_calle_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_calle_correcto == 'nada')
			{
				progreso_tres++;
			}

			if(this.form.administracion_numero_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_numero_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_numero_correcto == 'nada')
			{
				progreso_tres++;
			}


			if(this.form.administracion_telefono_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_telefono_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_telefono_correcto == 'nada')
			{
				progreso_tres++;
			}


			if(this.form.administracion_pais_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_pais_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_pais_correcto == 'nada')
			{
				progreso_tres++;
			}

			if(this.form.administracion_departamento_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_departamento_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_departamento_correcto == 'nada')
			{
				progreso_tres++;
			}


			if(this.form.administracion_provincia_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_provincia_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_provincia_correcto == 'nada')
			{
				progreso_tres++;
			}


			if(this.form.administracion_localidad_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_localidad_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_localidad_correcto == 'nada')
			{
				progreso_tres++;
			}



			if(this.form.administracion_cp_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_cp_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_cp_correcto == 'nada')
			{
				progreso_tres++;
			}



			if(this.form.administracion_otro_correcto == true)
			{
				aprobados_tres ++;
			}
			if(this.form.administracion_otro_correcto == false)
			{
				reprobado_tres ++;
			}
			if(this.form.administracion_otro_correcto == 'nada')
			{
				progreso_tres++;
			}



			//calcular porcentajes

			this.form.valor_de_progreso_tres = (progreso_tres * 100 ) / 9;
			this.form.valor_de_aprobado_tres = (aprobados_tres * 100 ) / 9;
			this.form.valor_de_reprobado_tres = (reprobado_tres * 100 ) / 9;

			if(progreso_tres == 9)
				this.form.valor_de_progreso_tres = 100;
			if(aprobados_tres == 9)
				this.form.valor_de_aprobado_tres = 100;
			if(reprobado_tres == 9)
				this.form.valor_de_reprobado_tres = 100;


			this.form.valor_de_progreso_tres =  this.form.valor_de_progreso_tres.toFixed(2);
			this.form.valor_de_aprobado_tres =  this.form.valor_de_aprobado_tres.toFixed(2);
			this.form.valor_de_reprobado_tres = this.form.valor_de_reprobado_tres.toFixed(2);

		},
		
		calculo_de_porcentajes_cuatro(que_cambio, valor) {
			var aprobados_cuatro = 0;
			var progreso_cuatro = 0;
			var reprobado_cuatro = 0;

			this.actaulizar_variables_correctas_cuatro(que_cambio, valor);



			if(this.form.numero_expdiente_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.numero_expdiente_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.numero_expdiente_correcto == 'nada')
			{
				progreso_cuatro++;
			}

			if(this.form.categoria_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.categoria_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.categoria_correcto == 'nada')
			{
				progreso_cuatro++;
			}


			if(this.form.nombre_mina_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.nombre_mina_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.nombre_mina_correcto == 'nada')
			{
				progreso_cuatro++;
			}


			if(this.form.descripcion_mina_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.descripcion_mina_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.descripcion_mina_correcto == 'nada')
			{
				progreso_cuatro++;
			}

			if(this.form.distrito_minero_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.distrito_minero_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.distrito_minero_correcto == 'nada')
			{
				progreso_cuatro++;
			}


			if(this.form.mina_cantera_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.mina_cantera_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.mina_cantera_correcto == 'nada')
			{
				progreso_cuatro++;
			}


			if(this.form.mina_cantera_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.mina_cantera_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.mina_cantera_correcto == 'nada')
			{
				progreso_cuatro++;
			}



			if(this.form.minerales_variedad_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.minerales_variedad_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.minerales_variedad_correcto == 'nada')
			{
				progreso_cuatro++;
			}



			if(this.form.administracion_otro_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.administracion_otro_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.administracion_otro_correcto == 'nada')
			{
				progreso_cuatro++;
			}



			//calcular porcentajes

			this.form.valor_de_progreso_cuatro = (progreso_cuatro * 100 ) / 9;
			this.form.valor_de_aprobado_cuatro = (aprobados_cuatro * 100 ) / 9;
			this.form.valor_de_reprobado_cuatro = (reprobado_cuatro * 100 ) / 9;

			if(progreso_cuatro == 9)
				this.form.valor_de_progreso_cuatro = 100;
			if(aprobados_cuatro == 9)
				this.form.valor_de_aprobado_cuatro = 100;
			if(reprobado_cuatro == 9)
				this.form.valor_de_reprobado_cuatro = 100;


			this.form.valor_de_progreso_cuatro =  this.form.valor_de_progreso_cuatro.toFixed(2);
			this.form.valor_de_aprobado_cuatro =  this.form.valor_de_aprobado_cuatro.toFixed(2);
			this.form.valor_de_reprobado_cuatro = this.form.valor_de_reprobado_cuatro.toFixed(2);

		},


		calculo_de_porcentajes_cinco(que_cambio, valor) {
			var aprobados_cinco = 0;
			var progreso_cinco = 0;
			var reprobado_cinco = 0;

			this.actaulizar_variables_correctas_cinco(que_cambio, valor);



			if(this.form.owner_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.owner_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.owner_correcto == 'nada')
			{
				progreso_cinco++;
			}



			if(this.form.arrendatario_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.arrendatario_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.arrendatario_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.concesionario_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.concesionario_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.concesionario_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.otros_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.otros_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.otros_correcto == 'nada')
			{
				progreso_cinco++;
			}

			if(this.form.titulo_contrato_posecion_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.titulo_contrato_posecion_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.titulo_contrato_posecion_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.resolucion_concesion_minera_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.resolucion_concesion_minera_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.resolucion_concesion_minera_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.constancia_pago_canon_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.constancia_pago_canon_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.constancia_pago_canon_correcto == 'nada')
			{
				progreso_cinco++;
			}



			if(this.form.iia_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.iia_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.iia_correcto == 'nada')
			{
				progreso_cinco++;
			}



			if(this.form.dia_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.dia_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.dia_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.acciones_a_desarrollar_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.acciones_a_desarrollar_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.acciones_a_desarrollar_correcto == 'nada')
			{
				progreso_cinco++;
			}

			if(this.form.actividad_a_desarrollar_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.actividad_a_desarrollar_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.actividad_a_desarrollar_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.fecha_alta_dia_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.fecha_alta_dia_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.fecha_alta_dia_correcto == 'nada')
			{
				progreso_cinco++;
			}


			if(this.form.fecha_vencimiento_dia_correcto == true)
			{
				aprobados_cinco ++;
			}
			if(this.form.fecha_vencimiento_dia_correcto == false)
			{
				reprobado_cinco ++;
			}
			if(this.form.fecha_vencimiento_dia_correcto == 'nada')
			{
				progreso_cinco++;
			}





			//calcular porcentajes

			this.form.valor_de_progreso_cinco = (progreso_cinco * 100 ) / 13;
			this.form.valor_de_aprobado_cinco = (aprobados_cinco * 100 ) / 13;
			this.form.valor_de_reprobado_cinco = (reprobado_cinco * 100 ) / 13;

			if(progreso_cinco == 13)
				this.form.valor_de_progreso_cinco = 100;
			if(aprobados_cinco == 13)
				this.form.valor_de_aprobado_cinco = 100;
			if(reprobado_cinco == 13)
				this.form.valor_de_reprobado_cinco = 100;


			this.form.valor_de_progreso_cinco =  this.form.valor_de_progreso_cinco.toFixed(2);
			this.form.valor_de_aprobado_cinco =  this.form.valor_de_aprobado_cinco.toFixed(2);
			this.form.valor_de_reprobado_cinco = this.form.valor_de_reprobado_cinco.toFixed(2);

		},
		calculo_de_porcentajes_seis(que_cambio, valor) {
			var aprobados_seis = 0;
			var progreso_seis = 0;
			var reprobado_seis = 0;

			this.actaulizar_variables_correctas_seis(que_cambio, valor);



			if(this.form.localidad_mina_pais_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.localidad_mina_pais_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.localidad_mina_pais_correcto == 'nada')
			{
				progreso_seis++;
			}



			if(this.form.localidad_mina_provincia_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.localidad_mina_provincia_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.localidad_mina_provincia_correcto == 'nada')
			{
				progreso_seis++;
			}


			if(this.form.localidad_mina_departamento_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.localidad_mina_departamento_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.localidad_mina_departamento_correcto == 'nada')
			{
				progreso_seis++;
			}


			if(this.form.localidad_mina_localidad_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.localidad_mina_localidad_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.localidad_mina_localidad_correcto == 'nada')
			{
				progreso_seis++;
			}

			if(this.form.tipo_sistema_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.tipo_sistema_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.tipo_sistema_correcto == 'nada')
			{
				progreso_seis++;
			}


			if(this.form.latitud_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.latitud_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.latitud_correcto == 'nada')
			{
				progreso_seis++;
			}


			if(this.form.longitud_correcto == true)
			{
				aprobados_seis ++;
			}
			if(this.form.longitud_correcto == false)
			{
				reprobado_seis ++;
			}
			if(this.form.longitud_correcto == 'nada')
			{
				progreso_seis++;
			}
			//calcular porcentajes
			this.form.valor_de_progreso_seis = (progreso_seis * 100 ) / 7;
			this.form.valor_de_aprobado_seis = (aprobados_seis * 100 ) / 7;
			this.form.valor_de_reprobado_seis = (reprobado_seis * 100 ) / 7;

			if(progreso_seis == 7)
				this.form.valor_de_progreso_seis = 100;
			if(aprobados_seis == 7)
				this.form.valor_de_aprobado_seis = 100;
			if(reprobado_seis == 7)
				this.form.valor_de_reprobado_seis = 100;


			this.form.valor_de_progreso_seis =  this.form.valor_de_progreso_seis.toFixed(2);
			this.form.valor_de_aprobado_seis =  this.form.valor_de_aprobado_seis.toFixed(2);
			this.form.valor_de_reprobado_seis = this.form.valor_de_reprobado_seis.toFixed(2);

		},
		guardar_avances_uno: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_uno', {
								id: this.$props.productor.id,
								razon_social:this.$props.productor.razonsocial,
								razon_social_valido: this.form.razon_social_valido,
								razon_social_correcto: this.form.razon_social_correcto,
								obs_razon_social: this.form.obs_razon_social,
								obs_razon_social_valido: this.form.obs_razon_social_valido,

								email: this.$props.productor.email,
								email_valido: this.form.email_valido,
								email_correcto:  this.form.email_correcto,
								obs_email: this.form.obs_email,
								obs_email_valido: this.form.obs_email_valido,

								cuit: this.$props.productor.cuit,
								cuit_valido: this.form.cuit_valido,
								cuit_correcto:  this.form.cuit_correcto,
								obs_cuit: this.form.obs_cuit,
								obs_cuit_valido: this.form.obs_cuit_valido,

								numeroproductor: this.$props.productor.numeroproductor,
								numeroproductor_valido: this.form.numeroproductor_valido,
								numeroproductor_correcto: this.form.numeroproductor_correcto,
								obs_numeroproductor: this.form.obs_numeroproductor,
								obs_numeroproductor_valido: this.form.obs_numeroproductor_valido,

								tiposociedad: this.$props.productor.tiposociedad,
								tiposociedad_valido: this.form.tiposociedad_valido, 
								tiposociedad_correcto: this.form.tiposociedad_correcto, 
								obs_tiposociedad: this.form.obs_tiposociedad, 
								obs_tiposociedad_valido: this.form.obs_tiposociedad_valido, 


								inscripciondgr: this.$props.productor.inscripciondgr,
								inscripciondgr_valido:  this.form.inscripciondgr_valido,
								inscripciondgr_correcto:  this.form.inscripciondgr_correcto,
								obs_inscripciondgr: this.form.obs_inscripciondgr,
								obs_inscripciondgr_valido:  this.form.obs_inscripciondgr_valido,

								constaciasociedad: this.$props.productor.constaciasociedad,
								constaciasociedad_valido: this.form.constaciasociedad_valido,
								constaciasociedad_correcto: this.form.constaciasociedad_correcto,
								obs_constaciasociedad: this.form.obs_constaciasociedad,
								obs_constaciasociedad_valido: this.form.obs_constaciasociedad_valido,

								valor_de_progreso: this.form.valor_de_progreso,
								valor_de_aprobado: this.form.valor_de_aprobado,
								valor_de_reprobado: this.form.valor_de_reprobado,

							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "se actualizaron los datos correctamente")
								{
									console.log('todo bien');
									self.modal_tittle = 'Paso 1 Guardado Exitosamente';
									self.modal_body =  'Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias'
									self.confirmingUserDeletion = true;
								}
								
								if(response.data === "formulario no encontrado")
								{
									console.log('todo mal, no se encontro');
									self.modal_tittle = 'Paso 1 Guardado Fallido';
									self.modal_body =  'NO Se ha guardado correctamente la información referida al paso 1: Datos del Productor. Gracias'
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
		guardar_avances_dos: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_dos', {
								id: this.$props.productor.id,
								leal_calle:this.$props.productor.leal_calle,

								nombre_calle_legal_valido: this.form.nombre_calle_legal_valido,
								nombre_calle_legal_correcto: this.form.nombre_calle_legal_correcto,
								obs_nombre_calle_legal: this.form.obs_nombre_calle_legal,
								obs_nombre_calle_legal_valido: this.form.obs_nombre_calle_legal_valido,

								leal_numero: this.$props.productor.leal_numero,
								leal_numero_valido: this.form.leal_numero_valido,
								leal_numero_correcto:  this.form.leal_numero_correcto,
								obs_leal_numero: this.form.obs_leal_numero,
								obs_leal_numero_valido: this.form.obs_leal_numero_valido,

								leal_telefono: this.$props.productor.leal_telefono,
								leal_telefono_valido: this.form.leal_telefono_valido,
								leal_telefono_correcto:  this.form.leal_telefono_correcto,
								obs_leal_telefono: this.form.obs_leal_telefono,
								obs_leal_telefono_valido: this.form.obs_leal_telefono_valido,

								leal_pais: this.$props.productor.leal_pais,
								leal_pais_valido: this.form.leal_pais_valido,
								leal_pais_correcto: this.form.leal_pais_correcto,
								obs_leal_pais: this.form.obs_leal_pais,
								obs_leal_pais_valido: this.form.obs_leal_pais_valido,

								leal_provincia: this.$props.productor.leal_provincia,
								leal_provincia_valido:  this.form.leal_provincia_valido,
								leal_provincia_correcto:  this.form.leal_provincia_correcto,
								obs_leal_provincia: this.form.obs_leal_provincia,
								obs_leal_provincia_valido:  this.form.obs_leal_provincia_valido,

								leal_departamento: this.$props.productor.leal_departamento,
								leal_departamento_valido: this.form.leal_departamento_valido,
								leal_departamento_correcto: this.form.leal_departamento_correcto,
								obs_leal_departamento: this.form.obs_leal_departamento,
								obs_leal_departamento_valido: this.form.obs_leal_departamento_valido,


								leal_localidad: this.$props.productor.leal_localidad,
								leal_localidad_valido: this.form.leal_localidad_valido,
								leal_localidad_correcto: this.form.leal_localidad_correcto,
								obs_leal_localidad: this.form.obs_leal_localidad,
								obs_leal_localidad_valido: this.form.obs_leal_localidad_valido,



								leal_cp: this.$props.productor.leal_cp,
								leal_cp_valido: this.form.leal_cp_valido,
								leal_cp_correcto: this.form.leal_cp_correcto,
								obs_leal_cp: this.form.obs_leal_cp,
								obs_leal_cp_valido: this.form.obs_leal_cp_valido,



								leal_otro: this.$props.productor.leal_otro,
								leal_otro_valido: this.form.leal_otro_valido,
								leal_otro_correcto: this.form.leal_otro_correcto,
								obs_leal_otro: this.form.obs_leal_otro,
								obs_leal_otro_valido: this.form.obs_leal_otro_valido,


								valor_de_progreso: this.form.valor_de_progreso_dos,
								valor_de_aprobado: this.form.valor_de_aprobado_dos,
								valor_de_reprobado: this.form.valor_de_reprobado_dos,

							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "todo bien")
								{
									console.log('todo bien');
									self.modal_tittle = 'Paso 2 Guardado Exitosamente';
									self.modal_body =  'Se ha guardado correctamente la información referida al paso 2: Datos del Domicilio Legal en la Provincia. Gracias'
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

		guardar_avances_tres: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_tres', {
								id: this.$props.productor.id,

								administracion_calle:this.$props.productor.administracion_calle,
								administracion_calle_valido: this.form.administracion_calle_valido,
								administracion_calle_correcto: this.form.administracion_calle_correcto,
								obs_administracion_calle_nombre: this.form.obs_administracion_calle_nombre,
								obs_administracion_calle_nombre_valido: this.form.obs_administracion_calle_nombre_valido,

								administracion_numero: this.$props.productor.administracion_numero,
								administracion_numero_valido: this.form.administracion_numero_valido,
								administracion_numero_correcto:  this.form.administracion_numero_correcto,
								obs_administracion_numero_nombre: this.form.obs_administracion_numero_nombre,
								obs_administracion_numero_nombre_valido: this.form.obs_administracion_numero_nombre_valido,

								administracion_telefono: this.$props.productor.administracion_telefono,
								administracion_telefono_valido: this.form.administracion_telefono_valido,
								administracion_telefono_correcto:  this.form.administracion_telefono_correcto,
								obs_administracion_telefono_nombre: this.form.obs_administracion_telefono_nombre,
								obs_administracion_telefono_nombre_valido: this.form.obs_administracion_telefono_nombre_valido,

								administracion_pais: this.$props.productor.administracion_pais,
								administracion_pais_valido: this.form.administracion_pais_valido,
								administracion_pais_correcto: this.form.administracion_pais_correcto,
								obs_administracion_pais: this.form.obs_administracion_pais,
								obs_administracion_pais_valido: this.form.obs_administracion_pais_valido,

								administracion_provincia: this.$props.productor.administracion_provincia,
								administracion_provincia_valido:  this.form.administracion_provincia_valido,
								administracion_provincia_correcto:  this.form.administracion_provincia_correcto,
								obs_administracion_provincia: this.form.obs_administracion_provincia,
								obs_administracion_provincia_valido:  this.form.obs_administracion_provincia_valido,

								administracion_departamento: this.$props.productor.administracion_departamento,
								administracion_departamento_valido: this.form.administracion_departamento_valido,
								administracion_departamento_correcto: this.form.administracion_departamento_correcto,
								obs_administracion_departamento: this.form.obs_administracion_departamento,
								obs_administracion_departamento_valido: this.form.obs_administracion_departamento_valido,



								administracion_localidad: this.$props.productor.administracion_localidad,
								administracion_localidad_valido: this.form.administracion_localidad_valido,
								administracion_localidad_correcto: this.form.administracion_localidad_correcto,
								obs_administracion_localidad: this.form.obs_administracion_localidad,
								obs_administracion_localidad_valido: this.form.obs_administracion_localidad_valido,


								administracion_cp: this.$props.productor.administracion_cp,
								administracion_cp_valido: this.form.administracion_cp_valido,
								administracion_cp_correcto: this.form.administracion_cp_correcto,
								obs_administracion_cp: this.form.obs_administracion_cp,
								obs_administracion_cp_valido: this.form.obs_administracion_cp_valido,


								administracion_otro: this.$props.productor.administracion_otro,
								administracion_otro_valido: this.form.administracion_otro_valido,
								administracion_otro_correcto: this.form.administracion_otro_correcto,
								obs_administracion_otro: this.form.obs_administracion_otro,
								obs_administracion_otro_valido: this.form.obs_administracion_otro_valido,


								valor_de_progreso: this.form.valor_de_progreso_tres,
								valor_de_aprobado: this.form.valor_de_aprobado_tres,
								valor_de_reprobado: this.form.valor_de_reprobado_tres,

							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "todo bien")
								{
									console.log('todo bien');
									self.modal_tittle = 'Paso 3 Guardado Exitosamente';
									self.modal_body =  'Se ha guardado correctamente la información referida al paso 3: Datos del Domicilio de la Administracion Central. Gracias'
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

		guardar_avances_cuatro: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_cuatro', {
								id: this.$props.productor.id,

								numero_expdiente:this.$props.productor.numero_expdiente,
								numero_expdiente_valido: this.form.numero_expdiente_valido,
								numero_expdiente_correcto: this.form.numero_expdiente_correcto,
								obs_numero_expdiente: this.form.obs_numero_expdiente,
								obs_numero_expdiente_valido: this.form.obs_numero_expdiente_valido,

								categoria: this.$props.productor.categoria,
								categoria_validacion: this.form.categoria_validacion,
								categoria_correcto:  this.form.categoria_correcto,
								obs_categoria: this.form.obs_categoria,
								obs_categoria_valido: this.form.obs_categoria_valido,

								nombre_mina: this.$props.productor.nombre_mina,
								nombre_mina_validacion: this.form.nombre_mina_validacion,
								nombre_mina_correcto:  this.form.nombre_mina_correcto,
								obs_nombre_mina: this.form.obs_nombre_mina,
								obs_nombre_mina_valido: this.form.obs_nombre_mina_valido,

								descripcion_mina: this.$props.productor.descripcion_mina,
								descripcion_mina_validacion: this.form.descripcion_mina_validacion,
								descripcion_mina_correcto: this.form.descripcion_mina_correcto,
								obs_descripcion_mina: this.form.obs_descripcion_mina,
								obs_descripcion_mina_valido: this.form.obs_descripcion_mina_valido,

								distrito_minero: this.$props.productor.distrito_minero,
								distrito_minero_validacion:  this.form.distrito_minero_validacion,
								distrito_minero_correcto:  this.form.distrito_minero_correcto,
								obs_distrito_minero: this.form.obs_distrito_minero,
								obs_distrito_minero_valido:  this.form.obs_distrito_minero_valido,

								mina_cantera: this.$props.productor.mina_cantera,
								mina_cantera_validacion: this.form.mina_cantera_validacion,
								mina_cantera_correcto: this.form.mina_cantera_correcto,
								obs_mina_cantera: this.form.obs_mina_cantera,
								obs_mina_cantera_valido: this.form.obs_mina_cantera_valido,

								plano_inmueble: this.$props.productor.plano_inmueble,
								plano_inmueble_validacion: this.form.plano_inmueble_validacion,
								plano_inmueble_correcto: this.form.plano_inmueble_correcto,
								obs_plano_inmueble: this.form.obs_plano_inmueble,
								obs_plano_inmueble_valido: this.form.obs_plano_inmueble_valido,

								minerales_variedad: this.$props.productor.minerales_variedad,
								minerales_variedad_validacion: this.form.minerales_variedad_validacion,
								minerales_variedad_correcto: this.form.minerales_variedad_correcto,
								obs_minerales_variedad: this.form.obs_minerales_variedad,
								obs_minerales_variedad_valido: this.form.obs_minerales_variedad_valido,

								valor_de_progreso: this.form.valor_de_progreso_cuatro,
								valor_de_aprobado: this.form.valor_de_aprobado_cuatro,
								valor_de_reprobado: this.form.valor_de_reprobado_cuatro,

							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "todo bien")
								{
									console.log('todo bien');
									self.modal_tittle = 'Paso 4 Guardado Exitosamente';
									self.modal_body =  'Se ha guardado correctamente la información referida al paso 4: Datos de la mina. Gracias'
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
		
		guardar_avances_cinco: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_cinco', {
								id: this.$props.productor.id,

								owner:this.$props.productor.owner,
								owner_correcto: this.form.owner_correcto,
								obs_owner: this.form.obs_owner,
								obs_owner_valido: this.form.obs_owner_valido,

								arrendatario: this.$props.productor.arrendatario,
								arrendatario_correcto: this.form.arrendatario_correcto,
								obs_arrendatario:  this.form.obs_arrendatario,
								obs_arrendatario_valido: this.form.obs_arrendatario_valido,

								concesionario: this.$props.productor.concesionario,
								concesionario_correcto: this.form.concesionario_correcto,
								obs_concesionario:  this.form.obs_concesionario,
								obs_concesionario_valido: this.form.obs_concesionario_valido,

								otros: this.$props.productor.otros,
								otros_correcto: this.form.otros_correcto,
								obs_otros: this.form.obs_otros,
								obs_otros_valido: this.form.obs_otros_valido,

								titulo_contrato_posecion: this.$props.productor.titulo_contrato_posecion,
								titulo_contrato_posecion_validacion:  this.form.titulo_contrato_posecion_validacion,
								titulo_contrato_posecion_correcto:  this.form.titulo_contrato_posecion_correcto,
								obs_titulo_contrato_posecion: this.form.obs_titulo_contrato_posecion,
								obs_titulo_contrato_posecion_valido:  this.form.obs_titulo_contrato_posecion_valido,

								resolucion_concesion_minera: this.$props.productor.resolucion_concesion_minera,
								resolucion_concesion_minera_validacion: this.form.resolucion_concesion_minera_validacion,
								resolucion_concesion_minera_correcto: this.form.resolucion_concesion_minera_correcto,
								obs_resolucion_concesion_minera: this.form.obs_resolucion_concesion_minera,
								obs_resolucion_concesion_minera_valido: this.form.obs_resolucion_concesion_minera_valido,

								constancia_pago_canon: this.$props.productor.constancia_pago_canon,
								constancia_pago_canon_validacion: this.form.constancia_pago_canon_validacion,
								constancia_pago_canon_correcto: this.form.constancia_pago_canon_correcto,
								obs_constancia_pago_canon: this.form.obs_constancia_pago_canon,
								obs_constancia_pago_canon_valido: this.form.obs_constancia_pago_canon_valido,



								iia: this.$props.productor.iia,
								iia_canon_validacion: this.form.iia_canon_validacion,
								iia_correcto: this.form.iia_correcto,
								obs_iia_canon: this.form.obs_iia_canon,
								obs_iia_canon_valido: this.form.obs_iia_canon_valido,


								dia: this.$props.productor.dia,
								dia_canon_validacion: this.form.dia_canon_validacion,
								dia_correcto: this.form.dia_correcto,
								obs_dia_canon: this.form.obs_dia_canon,
								obs_dia_canon_valido: this.form.obs_dia_canon_valido,


								acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
								acciones_a_desarrollar_validacion: this.form.acciones_a_desarrollar_validacion,
								acciones_a_desarrollar_correcto: this.form.acciones_a_desarrollar_correcto,
								obs_acciones_a_desarrollar: this.form.obs_acciones_a_desarrollar,
								obs_acciones_a_desarrollar_valido: this.form.obs_acciones_a_desarrollar_valido,



								actividad: this.$props.productor.actividad,
								actividad_a_desarrollar_validacion: this.form.actividad_a_desarrollar_validacion,
								actividad_a_desarrollar_correcto: this.form.actividad_a_desarrollar_correcto,
								obs_actividad_a_desarrollar: this.form.obs_actividad_a_desarrollar,
								obs_actividad_a_desarrollar_valido: this.form.obs_actividad_a_desarrollar_valido,



								fecha_alta_dia: this.$props.productor.fecha_alta_dia,
								fecha_alta_dia_validacion: this.form.fecha_alta_dia_validacion,
								fecha_alta_dia_correcto: this.form.fecha_alta_dia_correcto,
								obs_fecha_alta_dia: this.form.obs_fecha_alta_dia,
								obs_fecha_alta_dia_valido: this.form.obs_fecha_alta_dia_valido,



								fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
								fecha_vencimiento_dia_validacion: this.form.fecha_vencimiento_dia_validacion,
								fecha_vencimiento_dia_correcto: this.form.fecha_vencimiento_dia_correcto,
								obs_fecha_vencimiento_dia: this.form.obs_fecha_vencimiento_dia,
								obs_fecha_vencimiento_dia_valido: this.form.obs_fecha_vencimiento_dia_valido,



								valor_de_progreso: this.form.valor_de_progreso_cinco,
								valor_de_aprobado: this.form.valor_de_aprobado_cinco,
								valor_de_reprobado: this.form.valor_de_reprobado_cinco,

							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "todo bien")
								{
									console.log('todo bien');
									self.modal_tittle = 'Paso 5 Guardado Exitosamente';
									self.modal_body =  'Se ha guardado correctamente la información referida al paso 5: Datos de la mina. Gracias'
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
		
		guardar_avances_seis: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('/formularios/evaluacion_auto_guardado_seis', {
							id: this.$props.productor.id,

							localidad_mina_pais: this.$props.productor.localidad_mina_pais,
							localidad_mina_pais_validacion:  this.form.localidad_mina_pais_validacion,
							localidad_mina_pais_correcto:  this.form.localidad_mina_pais_correcto,
							obs_localidad_mina_pais: this.form.obs_localidad_mina_pais,
							obs_localidad_mina_pais_valido:  this.form.obs_localidad_mina_pais_valido,

							localidad_mina_provincia: this.$props.productor.localidad_mina_provincia,
							localidad_mina_provincia_validacion: this.form.localidad_mina_provincia_validacion,
							localidad_mina_provincia_correcto: this.form.localidad_mina_provincia_correcto,
							obs_localidad_mina_provincia: this.form.obs_localidad_mina_provincia,
							obs_localidad_mina_provincia_valido: this.form.obs_localidad_mina_provincia_valido,

							localidad_mina_departamento: this.$props.productor.localidad_mina_departamento,
							localidad_mina_departamento_validacion: this.form.localidad_mina_departamento_validacion,
							localidad_mina_departamento_correcto: this.form.localidad_mina_departamento_correcto,
							obs_localidad_mina_departamento: this.form.obs_localidad_mina_departamento,
							obs_localidad_mina_departamento_valido: this.form.obs_localidad_mina_departamento_valido,



							localidad_mina_localidad: this.$props.productor.localidad_mina_localidad,
							localidad_mina_localidad_validacion: this.form.localidad_mina_localidad_validacion,
							localidad_mina_localidad_correcto: this.form.localidad_mina_localidad_correcto,
							obs_localidad_mina_localidad: this.form.obs_localidad_mina_localidad,
							obs_localidad_mina_localidad_valido: this.form.obs_localidad_mina_localidad_valido,


							tipo_sistema: this.$props.productor.tipo_sistema,
							tipo_sistema_validacion: this.form.tipo_sistema_validacion,
							tipo_sistema_correcto: this.form.tipo_sistema_correcto,
							obs_tipo_sistema: this.form.obs_tipo_sistema,
							obs_tipo_sistema_valido: this.form.obs_tipo_sistema_valido,


							latitud: this.$props.productor.latitud,
							latitud_validacion: this.form.latitud_validacion,
							latitud_correcto: this.form.latitud_correcto,
							obs_latitud: this.form.obs_latitud,
							obs_latitud_valido: this.form.obs_latitud_valido,



							longitud: this.$props.productor.longitud,
							longitud_validacion: this.form.longitud_validacion,
							longitud_correcto: this.form.longitud_correcto,
							obs_longitud: this.form.obs_longitud,
							obs_longitud_valido: this.form.obs_longitud_valido,

							valor_de_progreso: this.form.valor_de_progreso_seis,
							valor_de_aprobado: this.form.valor_de_aprobado_seis,
							valor_de_reprobado: this.form.valor_de_reprobado_seis,

						})
						.then(function (response) {
							console.log(response.data);
							if(response.data === "todo bien")
							{
								console.log('todo bien');
								self.modal_tittle = 'Paso 6 Guardado Exitosamente';
								self.modal_body =  'Se ha guardado correctamente la información referida al paso 6: Datos de la ubicacion de la mina. Gracias'
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

		guardar_avances_todo: function(){
						let self = this
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

	},
	
	
};
</script>