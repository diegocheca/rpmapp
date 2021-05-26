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
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

                    
                </template>

                <template #footer>
                    <button @click="closeModal">
                        Cancel
                    </button>

                    
                </template>
            </jet-dialog-modal>
            <button @click="confirmingUserDeletion=!confirmingUserDeletion" >modal</button>
					<div class="flex items-center justify-center">
						<div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
								<div class="relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl">
										<div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
												<!-- svg  -->
												<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
												</svg>
										</div>
										<div class="mt-8 px-10">
												<p class="text-xl font-semibold mx-10">Datos del Producto</p>
												<div class="flex space-x-2 text-gray-400 text-sm">
														<!-- svg  -->
														<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
														</svg>
														 <p>Argetina, San Juan</p> 
												</div>
												
												<div class="border-t-2"></div>

												<div class="flex justify-between">
														
														 <div class="my-4">
																<p class="font-semibold text-base mb-2">Progreso</p>
																<div class="text-base text-gray-400 font-semibold">
																		<p>{{form.valor_de_progreso}} %</p>
																</div>
														</div>
														<div class="my-4">
																<p class="font-semibold text-base text-green-500 mb-2">Aprobado</p>
																<div class="text-base text-green-500 font-semibold">
																		<p>{{form.valor_de_aprobado}} %</p>
																</div>
														</div>
														<div class="my-4">
																<p class="font-semibold text-base text-red-400 mb-2">Reprobado</p>
																<div class="text-base text-red-400 font-semibold">
																		<p>{{form.valor_de_reprobado}} %</p>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
					</div>
				<div class="flex">
					<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="razon_social"
							>Razon Social:</label
						>
						<input
							id="razon_social"
							name="razon_social"
							v-model="form.razon_social"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.razon_social_valido" class="text-green-500 text-xs italic">Por Favor, complete este campo.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Es correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="accountType" v-model="form.razon_social_correcto" value="true" v-on:change="calculo_de_porcentajes(1, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="accountType" v-model="form.razon_social_correcto" value="false" v-on:change="calculo_de_porcentajes(1, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="accountType" v-model="form.razon_social_correcto" value="nada" v-on:change="calculo_de_porcentajes(1, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.razon_social_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_razon_social"
									>Observación:</label
								>
								<textarea
									id="obs_razon_social"
									name="obs_razon_social"
									v-model="form.obs_razon_social"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p class="text-green-500 text-xs italic" v-show="form.obs_razon_social_valido">Please fill out this field.</p>
							</div>
						</div>
					</div>
					<div class="w-full md:w-1/2 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="email"
							>Email:</label
						>
						<input
							id="email"
							name="email"
							v-model="form.email"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.email_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_email_correcto"  v-model="form.email_correcto" value="true" v-on:change="calculo_de_porcentajes(2, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_email_correcto"  v-model="form.email_correcto" value="false" v-on:change="calculo_de_porcentajes(2, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_email_correcto" v-model="form.email_correcto" value="nada" v-on:change="calculo_de_porcentajes(2, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.email_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_email"
									>Observación:</label
								>
								<textarea
									id="obs_email"
									name="obs_email"
									v-model="form.obs_email"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="!form.obs_email_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="flex">
					<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="name"
							>CUIT:</label
						>
						<input
							id="cuit"
							name="cuit"
							v-model="form.cuit"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.cuit_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="form.cuit_correcto" value="true" v-on:change="calculo_de_porcentajes(3, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_cuit_correcto"  v-model="form.cuit_correcto" value="false" v-on:change="calculo_de_porcentajes(3, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_cuit_correcto" v-model="form.cuit_correcto" value="nada" v-on:change="calculo_de_porcentajes(3, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.cuit_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_cuit"
									>Observación:</label
								>
								<textarea
									id="obs_cuit"
									name="obs_cuit"
									v-model="form.obs_cuit"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="!form.obs_cuit_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
					</div>
					<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="name"
							>Numero de Productor:</label
						>
						<input
							id="cuit"
							v-model="form.numeroproductor"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.numeroproductor_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_numeroproductor_correcto"  v-model="form.numeroproductor_correcto" value="true" v-on:change="calculo_de_porcentajes(4, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_numeroproductor_correcto"  v-model="form.numeroproductor_correcto" value="false" v-on:change="calculo_de_porcentajes(4, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_numeroproductor_correcto" v-model="form.numeroproductor_correcto" value="nada" v-on:change="calculo_de_porcentajes(4, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>

								</div>
							</div>
							<div v-show="!form.numeroproductor_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_numeroproductor"
									>Observación:</label
								>
								<textarea
									id="obs_numeroproductor"
									name="obs_numeroproductor"
									v-model="form.obs_numeroproductor"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_numeroproductor_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="flex">
					<!-- <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="domicilio_prod"
							>Domicilio del Productor:</label
						>
						<input
							id="domicilio_prod"
							name="domicilio_prod"
							v-model="form.domicilio_prod"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="accountType" value="personal">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="accountType" value="busines">
										<span class="ml-2">No</span>
									</label>
								</div>
							</div>
							<div class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_domicilio_prod"
									>Observación:</label
								>
								<input
									id="obs_domicilio_prod"
									name="obs_domicilio_prod"
									v-model="form.obs_cuit"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
								/>
								<p class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
					</div> -->
					<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="tipo_sociedad"
							>Tipo de Sociedad:</label
						>
						<input
							id="tipo_sociedad"
							name="tipo_sociedad"
							v-model="form.tiposociedad"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.tiposociedad_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_tiposociedad_correcto"  v-model="form.tiposociedad_correcto" value="true" v-on:change="calculo_de_porcentajes(5, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_tiposociedad_correcto"  v-model="form.tiposociedad_correcto" value="false" v-on:change="calculo_de_porcentajes(5, false)">
										<span class="ml-2">No</span>
									</label>
								</div>
								<label class="inline-flex items-center ml-6">
									<input type="radio" class="form-radio" name="name_tiposociedad_correcto" v-model="form.tiposociedad_correcto" value="nada" v-on:change="calculo_de_porcentajes(5, 'nada')">
									<span class="ml-2">Sin evaluar</span>
								</label>
							</div>
							<div v-show="!form.tiposociedad_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_tiposociedad"
									>Observación:</label
								>
								<textarea
									id="obs_tiposociedad"
									name="obs_tiposociedad"
									v-model="form.obs_tiposociedad"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_tiposociedad_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
							for="inscripciondgr"
							>Inscripcion DGR:</label
						>
						<input
							id="inscripciondgr"
							name="inscripciondgr"
							v-model="form.inscripciondgr"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p  v-show="form.inscripciondgr_valido"  class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="form.inscripciondgr_correcto" value="true" v-on:change="calculo_de_porcentajes(6, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="form.inscripciondgr_correcto" value="false" v-on:change="calculo_de_porcentajes(6, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_inscripciondgr_correcto" v-model="form.inscripciondgr_correcto" value="nada" v-on:change="calculo_de_porcentajes(6, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.inscripciondgr_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_inscripciondgr"
									>Observación:</label
								>
								<textarea
									id="obs_inscripciondgr"
									name="obs_inscripciondgr"
									v-model="form.obs_inscripciondgr"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_inscripciondgr_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
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
						for="constancia_sociedad"
						>Constancia de Sociedad:</label
					>
					<input
						id="constancia_sociedad"
						name="constancia_sociedad"
						v-model="form.constaciasociedad"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.constaciasociedad_valido"  class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
						<div class="w-full md:w-1/3 px-3">
							<span class="text-gray-700">Correcto?</span>
							<div class="mt-2">
								<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="form.constaciasociedad_correcto" value="true" v-on:change="calculo_de_porcentajes(7, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="form.constaciasociedad_correcto" value="false" v-on:change="calculo_de_porcentajes(7, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_constaciasociedad_correcto" v-model="form.constaciasociedad_correcto" value="nada" v-on:change="calculo_de_porcentajes(7, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
							</div>
						</div>
						<div v-show="!form.constaciasociedad_correcto" class="w-full md:w-2/3 px-3">
							<label
								class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
								for="obs_constaciasociedad"
								>Observación:</label
							>
							<textarea
									id="obs_constaciasociedad"
									name="obs_constaciasociedad"
									v-model="form.obs_constaciasociedad"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
							<p v-show="!form.obs_constaciasociedad_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
			<hr>
			<br>
			<br>
			<br>
			<br>
			<div class="flex items-center justify-center">
				<div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
						<div class="relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl">
								<div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
										<!-- svg  -->
										<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
										</svg>
								</div>
								<div class="mt-8 px-10">
										<p class="text-xl font-semibold mx-10">Datos del Domicilio Legal en la Provincia</p>
										<div class="flex space-x-2 text-gray-400 text-sm">
												<!-- svg  -->
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
												</svg>
												 <p>Argetina, San Juan</p> 
										</div>
										
										<div class="border-t-2"></div>

										<div class="flex justify-between">
												
												 <div class="my-4">
														<p class="font-semibold text-base mb-2">Progreso</p>
														<div class="text-base text-gray-400 font-semibold">
																<p>{{form.valor_de_progreso_dos}} %</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-green-500 mb-2">Aprobado</p>
														<div class="text-base text-green-500 font-semibold">
																<p>{{form.valor_de_aprobado_dos}} %</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-red-400 mb-2">Reprobado</p>
														<div class="text-base text-red-400 font-semibold">
																<p>{{form.valor_de_reprobado_dos}} %</p>
														</div>
												</div>
										</div>
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
							for="leal_calle"
							>Nombre Calle Legal:</label
						>
						<input
							id="leal_calle"
							name="leal_calle"
							v-model="form.leal_calle"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.nombre_calle_legal_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="nombre_calle_legal_correcto"  v-model="form.nombre_calle_legal_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(1, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_calle_legal_correcto"  v-model="form.nombre_calle_legal_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(1, false)">
										<span class="ml-2">No</span>
									</label>
								</div>
								<label class="inline-flex items-center ml-6">
									<input type="radio" class="form-radio" name="nombre_calle_legal_correcto" v-model="form.nombre_calle_legal_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(1, 'nada')">
									<span class="ml-2">Sin evaluar</span>
								</label>
							</div>
							<div v-show="!form.nombre_calle_legal_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_nombre_calle_legal"
									>Observación:</label
								>
								<textarea
									id="obs_nombre_calle_legal"
									name="obs_nombre_calle_legal"
									v-model="form.obs_nombre_calle_legal"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								
								<p v-show="form.obs_nombre_calle_legal_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>

				</div>
				<div class="w-full md:w-1/2 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="leal_numero"
							>Número de Calle Legal:</label
						>
						<input
							id="leal_numero"
							name="leal_numero"
							v-model="form.leal_numero"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.leal_numero_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="nombre_leal_numero_correcto"  v-model="form.leal_numero_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(2, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_leal_numero_correcto"  v-model="form.leal_numero_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(2, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_leal_numero_correcto" v-model="form.leal_numero_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(2, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.leal_numero_correcto" class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_leal_numero"
									>Observación:</label
								>
								<textarea
									id="obs_leal_numero"
									name="obs_leal_numero"
									v-model="form.obs_leal_numero"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_leal_numero_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
						for="leal_telefono"
						>Telefóno de Domicilio Legal:</label
					>
					<input
						id="leal_telefono"
						name="leal_telefono"
						v-model="form.leal_telefono"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.leal_telefono_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_leal_telefono_correcto" v-model="form.leal_telefono_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(3, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_telefono_correcto" v-model="form.leal_telefono_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(3, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_telefono_correcto" v-model="form.leal_telefono_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(3, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.leal_telefono_correcto" class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_leal_telefono"
									>Observación:</label
								>
								<textarea
									id="obs_leal_telefono"
									name="obs_leal_telefono"
									v-model="form.obs_leal_telefono"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_leal_telefono_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
							for="pais_dom_legal"
							>País de Domicilio Legal:</label
						>
						<select
							id="pais_dom_legal"
							name="pais_dom_legal"
							v-model="form.leal_pais"
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option value="-1">Really long option that will likely overlap the chevron</option>
							<option value="Argentina">Argentina</option>
							<option value="-3">Option 3</option>
						</select>
						<p v-show="form.leal_pais_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_leal_pais_correcto" v-model="form.leal_pais_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(4, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_pais_correcto" v-model="form.leal_pais_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(4, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_pais_correcto" v-model="form.leal_pais_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(4, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								
								<div v-show="!form.leal_pais_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_pais_dom_legal"
										>Observación:</label
									>
									<textarea
										id="obs_pais_dom_legal"
										name="obs_pais_dom_legal"
										v-model="form.obs_pais_dom_legal"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_leal_pais_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="provincia_dom_legal"
							>Provincia de Domicilio Legal</label>

							




						<select
							id="provincia_dom_legal"
							name="provincia_dom_legal"
							v-model="form.leal_provincia" 
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
						<p v-show="form.leal_provincia_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_leal_provincia_correcto" v-model="form.leal_provincia_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(5, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_provincia_correcto" v-model="form.leal_provincia_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(5, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_provincia_correcto" v-model="form.leal_provincia_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(5, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div v-show="!form.leal_provincia_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_leal_provincia"
										>Observación:</label
									>
									<textarea
										id="obs_leal_provincia"
										name="obs_leal_provincia"
										v-model="form.obs_leal_provincia"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>

									
									<p v-show="form.obs_leal_provincia_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="departamento_dom_legal"
							>Departamento de Domicilio Legal</label>
						<select
							id="departamento_dom_legal"
							name="departamento_dom_legal"
							v-model="form.leal_departamento" 
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
						<p v-show="form.leal_departamento_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_leal_departamento_correcto" v-model="form.leal_departamento_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(6, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_departamento_correcto" v-model="form.leal_departamento_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(6, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_departamento_correcto" v-model="form.leal_departamento_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(6, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div  v-show="!form.leal_departamento_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_leal_departamento"
										>Observación:</label
									>
									<textarea
										id="obs_leal_departamento"
										name="obs_leal_departamento"
										v-model="form.obs_leal_departamento"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_leal_departamento_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
							for="dom_legal_localidad"
							>Localidad de Domicilio Legal:</label
						>
						<input
							id="dom_legal_localidad"
							name="dom_legal_localidad"
							v-model="form.leal_localidad"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.leal_localidad_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_leal_localidad_correcto" v-model="form.leal_localidad_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(7, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_localidad_correcto" v-model="form.leal_localidad_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(7, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_leal_localidad_correcto" v-model="form.leal_localidad_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(7, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.leal_localidad_correcto"  class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_leal_localidad"
									>Observación:</label
								>
								<textarea
										id="obs_leal_localidad"
										name="obs_leal_localidad"
										v-model="form.obs_leal_localidad"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_leal_localidad_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="dom_legal_cp"
							>Códido Postal de Domicilio Legal</label
						>
						<input
							id="dom_legal_cp"
							name="dom_legal_cp"
							v-model="form.leal_cp"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.leal_cp_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_leal_cp_correcto" v-model="form.leal_cp_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(8, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_cp_correcto" v-model="form.leal_cp_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(8, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_cp_correcto" v-model="form.leal_cp_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(8, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.leal_cp_correcto" class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_leal_cp"
									>Observación:</label
								>
								<textarea
										id="obs_leal_cp"
										name="obs_leal_cp"
										v-model="form.obs_leal_cp"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_leal_cp_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="leal_otro"
							>Otro dato de Domicilio Legal</label
						>
						<input
							id="leal_otro"
							name="leal_otro"
							v-model="form.leal_otro"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.leal_otro_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_leal_otro_correcto" v-model="form.leal_otro_correcto" value="true" v-on:change="calculo_de_porcentajes_dos(9, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_otro_correcto" v-model="form.leal_otro_correcto" value="false" v-on:change="calculo_de_porcentajes_dos(9, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_leal_otro_correcto" v-model="form.leal_otro_correcto" value="nada" v-on:change="calculo_de_porcentajes_dos(9, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.leal_otro_correcto"  class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_leal_otro"
									>Observación:</label
								>
								<textarea
										id="obs_leal_otro"
										name="obs_leal_otro"
										v-model="form.obs_leal_otro"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p v-show="form.obs_leal_otro_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
			</div>
			<br>
			<br>
			<br>

			<hr>
			<br>
			<br>
			<br>

			<div class="flex items-center justify-center">
				<div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
						<div class="relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl">
								<div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-red-500 left-4 -top-6">
										<!-- svg  -->
										<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
										</svg>
								</div>
								<div class="mt-8 px-10">
										<p class="text-xl font-semibold mx-10">Datos del Domicilio de Administración Central</p>
										<div class="flex space-x-2 text-gray-400 text-sm">
												<!-- svg  -->
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
												</svg>
												 <p>Argetina, San Juan</p> 
										</div>
										
										<div class="border-t-2"></div>

										<div class="flex justify-between">
												
												 <div class="my-4">
														<p class="font-semibold text-base mb-2">Progreso</p>
														<div class="text-base text-gray-400 font-semibold">
																<p>{{form.valor_de_progreso_tres}}%</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-green-500 mb-2">Aprobado</p>
														<div class="text-base text-green-500 font-semibold">
																<p>{{form.valor_de_aprobado_tres}}%</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-red-400 mb-2">Reprobado</p>
														<div class="text-base text-red-400 font-semibold">
																<p>{{form.valor_de_reprobado_tres}}%</p>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
			</div>
			<br>
			<br>
			<br>

			<br>
			<br>
			<div class="flex">
				<div class="w-full md:w-1/2 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_calle"
							>Nombre de Calle de Domicilio Administrativo:</label
						>
						<input
							id="administracion_calle"
							name="administracion_calle"
							v-model="form.administracion_calle"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.administracion_calle_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="nombre_administracion_calle_correcto"  v-model="form.administracion_calle_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(1, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="nombre_administracion_calle_correcto"  v-model="form.administracion_calle_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(1, false)">
										<span class="ml-2">No</span>
									</label>
								</div>
								<label class="inline-flex items-center ml-6">
									<input type="radio" class="form-radio" name="nombre_administracion_calle_correcto" v-model="form.administracion_calle_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(1, 'nada')">
									<span class="ml-2">Sin evaluar</span>
								</label>
							</div>
							<div v-show="!form.administracion_calle_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_calle_nombre"
									>Observación:</label
								>
								<textarea
									id="obs_administracion_calle_nombre"
									name="obs_administracion_calle_nombre"
									v-model="form.obs_administracion_calle_nombre"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								
								<p v-show="form.obs_administracion_calle_nombre_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>

				</div>
				<div class="w-full md:w-1/2 px-3">
						<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_numero"
							>Número de Calle ADministración:</label
						>
						<input
							id="administracion_numero"
							name="administracion_numero"
							v-model="form.administracion_numero"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.administracion_numero_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_administracion_numero_correcto"  v-model="form.administracion_numero_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(2, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_numero_correcto"  v-model="form.administracion_numero_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(2, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_numero_correcto" v-model="form.administracion_numero_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(2, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.administracion_numero_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_numero_nombre"
									>Observación:</label
								>
								<textarea
									id="obs_administracion_numero_nombre"
									name="obs_administracion_numero_nombre"
									v-model="form.obs_administracion_numero_nombre"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_administracion_numero_nombre_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
						for="administracion_telefono"
						>Telefóno de Domicilio Administracion:</label
					>
					<input
						id="administracion_telefono"
						name="administracion_telefono"
						v-model="form.administracion_telefono"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
					/>
					<p v-show="form.administracion_telefono_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
					<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_administracion_telefono_correcto" v-model="form.administracion_telefono_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(3, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_telefono_correcto" v-model="form.administracion_telefono_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(3, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_telefono_correcto" v-model="form.administracion_telefono_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(3, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div  v-show="!form.administracion_telefono_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_telefono_nombre"
									>Observación:</label
								>
								<textarea
									id="obs_administracion_telefono_nombre"
									name="obs_administracion_telefono_nombre"
									v-model="form.obs_administracion_telefono_nombre"
									class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
								</textarea>
								<p v-show="form.obs_administracion_telefono_nombre_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
							for="administracion_pais"
							>País de Domicilio Administracion:</label
						>
						<select
							id="administracion_pais"
							name="administracion_pais"
							v-model="form.administracion_pais"
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option value="-1">Really long option that will likely overlap the chevron</option>
							<option value="Argentina">Argentina</option>
							<option value="-3">Option 3</option>
						</select>
						<p v-show="form.administracion_pais_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_administracion_pais_correcto" v-model="form.administracion_pais_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(4, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_pais_correcto" v-model="form.administracion_pais_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(4, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_pais_correcto" v-model="form.administracion_pais_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(4, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								
								<div v-show="!form.administracion_pais_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_administracion_pais"
										>Observación:</label
									>
									<textarea
										id="obs_administracion_pais"
										name="obs_administracion_pais"
										v-model="form.obs_administracion_pais"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_administracion_pais_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_provincia"
							>Provincia de Domicilio Administracion</label>
						<select
							id="administracion_provincia"
							name="administracion_provincia"
							v-model="form.administracion_provincia" 
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
						<p v-show="form.administracion_provincia_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_administracion_provincia_correcto" v-model="form.administracion_provincia_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(5, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_provincia_correcto" v-model="form.administracion_provincia_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(5, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_provincia_correcto" v-model="form.administracion_provincia_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(5, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div v-show="!form.administracion_provincia_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_administracion_provincia"
										>Observación:</label
									>
									<textarea
										id="obs_administracion_provincia"
										name="obs_administracion_provincia"
										v-model="form.obs_administracion_provincia"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>

									
									<p v-show="form.obs_administracion_provincia_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
								</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_departamento"
							>Departamento de Domicilio Administracion</label>
						<select
							id="administracion_departamento"
							name="administracion_departamento"
							v-model="form.administracion_departamento" 
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
						<p v-show="form.administracion_departamento_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
								<div class="w-full md:w-1/2 px-3">
									<span class="text-gray-700">Correcto?</span>
									<div class="mt-2">
										<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_administracion_departamento_correcto" v-model="form.administracion_departamento_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(6, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_departamento_correcto" v-model="form.administracion_departamento_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(6, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_departamento_correcto" v-model="form.administracion_departamento_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(6, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
									</div>
								</div>
								<div  v-show="!form.administracion_departamento_correcto" class="w-full md:w-1/2 px-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="obs_administracion_departamento"
										>Observación:</label
									>
									<textarea
										id="obs_administracion_departamento"
										name="obs_administracion_departamento"
										v-model="form.obs_administracion_departamento"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									<p v-show="form.obs_administracion_departamento_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
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
							for="administracion_localidad"
							>Localidad de Domicilio Administracion:</label
						>
						<input
							id="administracion_localidad"
							name="administracion_localidad"
							v-model="form.administracion_localidad"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.administracion_localidad_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_administracion_localidad_correcto" v-model="form.administracion_localidad_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(7, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_localidad_correcto" v-model="form.administracion_localidad_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(7, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_administracion_localidad_correcto" v-model="form.administracion_localidad_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(7, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.administracion_localidad_correcto"  class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_localidad"
									>Observación:</label
								>
								<textarea
										id="obs_administracion_localidad"
										name="obs_administracion_localidad"
										v-model="form.obs_administracion_localidad"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_administracion_localidad_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_cp"
							>Códido Postal de Domicilio Administracion</label
						>
						<input
							id="administracion_cp"
							name="administracion_cp"
							v-model="form.administracion_cp"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.administracion_cp_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_administracion_cp_correcto" v-model="form.administracion_cp_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(8, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_cp_correcto" v-model="form.administracion_cp_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(8, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_cp_correcto" v-model="form.administracion_cp_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(8, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.administracion_cp_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_cp"
									>Observación:</label
								>
								<textarea
										id="obs_administracion_cp"
										name="obs_administracion_cp"
										v-model="form.obs_administracion_cp"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_administracion_cp_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="administracion_otro"
							>Otro dato de Domicilio Administracion</label
						>
						<input
							id="administracion_otro"
							name="administracion_otro"
							v-model="form.administracion_otro"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.administracion_otro_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_administracion_otro_correcto" v-model="form.administracion_otro_correcto" value="true" v-on:change="calculo_de_porcentajes_tres(9, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_otro_correcto" v-model="form.administracion_otro_correcto" value="false" v-on:change="calculo_de_porcentajes_tres(9, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_administracion_otro_correcto" v-model="form.administracion_otro_correcto" value="nada" v-on:change="calculo_de_porcentajes_tres(9, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.administracion_otro_correcto"  class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_administracion_otro"
									>Observación:</label
								>
								<textarea
										id="obs_administracion_otro"
										name="obs_administracion_otro"
										v-model="form.obs_administracion_otro"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p v-show="form.obs_administracion_otro_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
			</div>
			<br>
			<br>
			<br>

			<hr>
			<br>
			<br>
			<br>
			<div class="flex items-center justify-center">
				<div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
						<div class="relative bg-white py-6 px-40 rounded-3xl w-128 my-4 shadow-xl">
								<div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
										<!-- svg  -->
										<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
										</svg>
								</div>
								<div class="mt-8 px-10">
										<p class="text-xl font-semibold mx-10">Datos de la Mina</p>
										<div class="flex space-x-2 text-gray-400 text-sm">
												<!-- svg  -->
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
												</svg>
												 <p>Argetina, San Juan</p> 
										</div>
										
										<div class="border-t-2"></div>

										<div class="flex justify-between">
												
												 <div class="my-4">
														<p class="font-semibold text-base mb-2">Progreso</p>
														<div class="text-base text-gray-400 font-semibold">
																<p>{{form.valor_de_progreso_cuatro}}%</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-green-500 mb-2">Aprobado</p>
														<div class="text-base text-green-500 font-semibold">
																<p>{{form.valor_de_aprobado_cuatro}}%</p>
														</div>
												</div>
												<div class="my-4">
														<p class="font-semibold text-base text-red-400 mb-2">Reprobado</p>
														<div class="text-base text-red-400 font-semibold">
																<p>{{form.valor_de_reprobado_cuatro}}%</p>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
			</div>
			<div class="flex">
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="numero_expdiente"
							>Localidad de Domicilio Administracion:</label
						>
						<input
							id="numero_expdiente"
							name="numero_expdiente"
							v-model="form.numero_expdiente"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.numero_expdiente_valido" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_numero_expdiente_correcto" v-model="form.numero_expdiente_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(1, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_numero_expdiente_correcto" v-model="form.numero_expdiente_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(1, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_numero_expdiente_correcto" v-model="form.numero_expdiente_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(1, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.numero_expdiente_correcto"  class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_numero_expdiente"
									>Observación:</label
								>
								<textarea
										id="obs_numero_expdiente"
										name="obs_numero_expdiente"
										v-model="form.obs_numero_expdiente"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_numero_expdiente_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="categoria"
							>Categoria del Productor</label
						>
						<select
							id="categoria"
							name="categoria"
							v-model="form.categoria"
							class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
							<option value="primera">Primer Categoria</option>
							<option value="segunda">Segunda Categoria</option>
							<option value="tercera">Tercer Categoria</option>
						</select>
						<p v-show="form.categoria_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_categoria_correcto" v-model="form.categoria_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(2, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_categoria_correcto" v-model="form.categoria_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(2, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_categoria_correcto" v-model="form.categoria_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(2, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.categoria_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_categoria"
									>Observación:</label
								>
								<textarea
										id="obs_categoria"
										name="obs_categoria"
										v-model="form.obs_categoria"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_categoria_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="nombre_mina"
							>Nombre de la Mina</label
						>
						<input
							id="nombre_mina"
							name="nombre_mina"
							v-model="form.nombre_mina"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.nombre_mina_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(3, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(3, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(3, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.nombre_mina_correcto"  class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_nombre_mina"
									>Observación:</label
								>
								<textarea
										id="obs_nombre_mina"
										name="obs_nombre_mina"
										v-model="form.obs_nombre_mina"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p v-show="form.obs_nombre_mina_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
			</div>
			<div class="flex">
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="descripcion_mina"
							>Descripción de la mina:</label
						>
						<input
							id="descripcion_mina"
							name="descripcion_mina"
							v-model="form.descripcion_mina"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.descripcion_mina_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
											<input type="radio" class="form-radio" name="name_descripcion_mina_correcto" v-model="form.descripcion_mina_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(4, true)">
											<span class="ml-2">Si</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_descripcion_mina_correcto" v-model="form.descripcion_mina_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(4, false)">
											<span class="ml-2">No</span>
										</label>
										<label class="inline-flex items-center ml-6">
											<input type="radio" class="form-radio" name="name_descripcion_mina_correcto" v-model="form.descripcion_mina_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(4, 'nada')">
											<span class="ml-2">Sin evaluar</span>
										</label>
								</div>
							</div>
							<div v-show="!form.descripcion_mina_correcto"  class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_descripcion_mina"
									>Observación:</label
								>
								<textarea
										id="obs_descripcion_mina"
										name="obs_descripcion_mina"
										v-model="form.obs_descripcion_mina"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p  v-show="form.obs_descripcion_mina_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="distrito_minero"
							>Distrito Minero</label
						>
						<input
							id="distrito_minero"
							name="distrito_minero"
							v-model="form.distrito_minero"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.distrito_minero_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/3 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_distrito_minero_correcto" v-model="form.distrito_minero_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(5, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_distrito_minero_correcto" v-model="form.distrito_minero_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(5, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_distrito_minero_correcto" v-model="form.distrito_minero_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(5, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.distrito_minero_correcto" class="w-full md:w-2/3 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_distrito_minero"
									>Observación:</label
								>
								<textarea
										id="obs_distrito_minero"
										name="obs_distrito_minero"
										v-model="form.obs_distrito_minero"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
									
								<p  v-show="form.obs_distrito_minero_valido" class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
				<div class="w-full md:w-1/3 px-3">
					<label
							class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
							for="nombre_mina"
							>Nombre de la Mina</label
						>
						<input
							id="nombre_mina"
							name="nombre_mina"
							v-model="form.nombre_mina"
							class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						/>
						<p v-show="form.nombre_mina_validacion" class="text-red-500 text-xs italic">Please fill out this field.</p>
						<div class="flex">
							<div class="w-full md:w-1/2 px-3">
								<span class="text-gray-700">Correcto?</span>
								<div class="mt-2">
									<label class="inline-flex items-center">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="true" v-on:change="calculo_de_porcentajes_cuatro(3, true)">
										<span class="ml-2">Si</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="false" v-on:change="calculo_de_porcentajes_cuatro(3, false)">
										<span class="ml-2">No</span>
									</label>
									<label class="inline-flex items-center ml-6">
										<input type="radio" class="form-radio" name="name_nombre_mina_correcto" v-model="form.nombre_mina_correcto" value="nada" v-on:change="calculo_de_porcentajes_cuatro(3, 'nada')">
										<span class="ml-2">Sin evaluar</span>
									</label>
								</div>
							</div>
							<div v-show="!form.nombre_mina_correcto"  class="w-full md:w-1/2 px-3">
								<label
									class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
									for="obs_nombre_mina"
									>Observación:</label
								>
								<textarea
										id="obs_nombre_mina"
										name="obs_nombre_mina"
										v-model="form.obs_nombre_mina"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
									</textarea>
								<p v-show="form.obs_nombre_mina_valido"  class="text-green-500 text-xs italic">Please fill out this field.</p>
							</div>
						</div>
				</div>
			</div>

					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Numero de Expediente:</label
						>
						<input
							id="cuit"
							v-model="form.numero_expdiente"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Categoría:</label
						>
						<input
							id="cuit"
							v-model="form.categoria"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Nombre de Mina:</label
						>
						<input
							id="cuit"
							v-model="form.nombre_mina"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Descripción de Mina:</label
						>
						<input
							id="cuit"
							v-model="form.descripcion_mina"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>




					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Distrito Minero:</label
						>
						<input
							id="cuit"
							v-model="form.distrito_minero"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Mina o Cantera:</label
						>
						<input
							id="cuit"
							v-model="form.mina_cantera"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Plano Inmueble:</label
						>
						<input
							id="cuit"
							v-model="form.plano_inmueble"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Minerales:</label
						>
						<input
							id="cuit"
							v-model="form.minerales_variedad"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>



					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Owner:</label
						>
						<input
							id="cuit"
							v-model="form.owner"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>arrendatario:</label
						>
						<input
							id="cuit"
							v-model="form.arrendatario"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>concesionario:</label
						>
						<input
							id="cuit"
							v-model="form.concesionario"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>otros:</label
						>
						<input
							id="cuit"
							v-model="form.otros"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>titulo_contrato_posecion:</label
						>
						<input
							id="cuit"
							v-model="form.titulo_contrato_posecion"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>resolucion_concesion_minera:</label
						>
						<input
							id="cuit"
							v-model="form.resolucion_concesion_minera"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>


					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>constancia_pago_canon:</label
						>
						<input
							id="cuit"
							v-model="form.constancia_pago_canon"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>iia:</label
						>
						<input
							id="cuit"
							v-model="form.iia"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>dia:</label
						>
						<input
							id="cuit"
							v-model="form.dia"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>acciones_a_desarrollar:</label
						>
						<input
							id="cuit"
							v-model="form.acciones_a_desarrollar"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>actividad:</label
						>
						<input
							id="cuit"
							v-model="form.actividad"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>fecha_alta_dia:</label
						>
						<input
							id="cuit"
							v-model="form.fecha_alta_dia"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>fecha_vencimiento_dia:</label
						>
						<input
							id="cuit"
							v-model="form.fecha_vencimiento_dia"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>localidad_mina_pais:</label
						>
						<input
							id="cuit"
							v-model="form.localidad_mina_pais"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>



					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>localidad_mina_provincia:</label>
							<select v-model="form.localidad_mina_provincia" class="pr-6 pb-8 w-full lg:w-1/2">
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
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>localidad_mina_departamento:</label
						>
						<input
							id="cuit"
							v-model="form.localidad_mina_departamento"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>localidad_mina_localidad:</label
						>
						<input
							id="cuit"
							v-model="form.localidad_mina_localidad"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>tipo_sistema:</label
						>
						<input
							id="cuit"
							v-model="form.tipo_sistema"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>longitud:</label
						>
						<input
							id="cuit"
							v-model="form.longitud"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>latitud:</label
						>
						<input
							id="cuit"
							v-model="form.latitud"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>

					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>created_by:</label
						>
						<input
							id="cuit"
							v-model="form.created_by"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-4">
						<label
							class="mb-2 uppercase font-bold text-lg text-grey-darkest"
							for="name"
							>Estado:</label
						>
						<input
							id="cuit"
							v-model="form.estado"
							class="border py-2 px-3 text-grey-darkest"
						/>
					</div>
					<div class="flex flex-col mb-8">
						<button
							type="submit"
							class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
						>
							Editar
						</button>
						<inertia-link
							:href="route('productors.index')"
							class="text-red-600 hover:underline"
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
import JetDialogModal from '@/Jetstream/DialogModal'
export default {
	components: {
		AppLayout,
		Banner,
		Modal,
		JetDialogModal,
	},
	props: ["productor"],
	data() {
		return {
			confirmingUserDeletion:false,
			form: {
				razon_social:this.$props.productor.razonsocial,
				razon_social_valido: true,
				razon_social_correcto: 'nada',
				obs_razon_social: '',
				obs_razon_social_valido: false,

				email: this.$props.productor.email,
				email_valido: true,
				email_correcto: 'nada',
				obs_email: '',
				obs_email_valido: false,

				cuit: this.$props.productor.cuit,
				cuit_valido: true,
				cuit_correcto: 'nada',
				obs_cuit: '',
				obs_cuit_valido: false,

				numeroproductor: this.$props.productor.numeroproductor,
				numeroproductor_valido: true,
				numeroproductor_correcto: 'nada',
				obs_numeroproductor: '',
				obs_numeroproductor_valido: false,

				//domicilio_prod: this.$props.productor.domicilio_prod,

				tiposociedad: this.$props.productor.tiposociedad,
				tiposociedad_valido: true,
				tiposociedad_correcto: 'nada',
				obs_tiposociedad: '',
				obs_tiposociedad_valido: false,


				inscripciondgr: this.$props.productor.inscripciondgr,
				inscripciondgr_valido: true,
				inscripciondgr_correcto: 'nada',
				obs_inscripciondgr: '',
				obs_inscripciondgr_valido: false,

				constaciasociedad: this.$props.productor.constaciasociedad,
				constaciasociedad_valido: true,
				constaciasociedad_correcto: 'nada',
				obs_constaciasociedad: '',
				obs_constaciasociedad_valido: false,

				valor_de_progreso: 100,
				valor_de_aprobado: 100,
				valor_de_reprobado: 100,


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



// hasta aca llegue el dia miercoles 26-5-21
				mina_cantera: this.$props.productor.mina_cantera,


				plano_inmueble: this.$props.productor.plano_inmueble,
				minerales_variedad: this.$props.productor.minerales_variedad,





				owner: this.$props.productor.owner,
				arrendatario: this.$props.productor.arrendatario,
				concesionario: this.$props.productor.concesionario,
				otros: this.$props.productor.otros,
				titulo_contrato_posecion: this.$props.productor.titulo_contrato_posecion,
				resolucion_concesion_minera: this.$props.productor.resolucion_concesion_minera,


				constancia_pago_canon: this.$props.productor.constancia_pago_canon,
				iia: this.$props.productor.iia,
				dia: this.$props.productor.dia,
				acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
				actividad: this.$props.productor.actividad,
				fecha_alta_dia: this.$props.productor.fecha_alta_dia,
				fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
				localidad_mina_pais: this.$props.productor.localidad_mina_pais,

				localidad_mina_provincia: this.$props.productor.localidad_mina_provincia,
				localidad_mina_departamento: this.$props.productor.localidad_mina_departamento,
				localidad_mina_localidad: this.$props.productor.localidad_mina_localidad,
				tipo_sistema: this.$props.productor.tipo_sistema,
				longitud: this.$props.productor.longitud,
				latitud: this.$props.productor.latitud,
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
        this.form.reset()
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


			if(this.form.administracion_provincia_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.administracion_provincia_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.administracion_provincia_correcto == 'nada')
			{
				progreso_cuatro++;
			}


			if(this.form.administracion_localidad_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.administracion_localidad_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.administracion_localidad_correcto == 'nada')
			{
				progreso_cuatro++;
			}



			if(this.form.administracion_cp_correcto == true)
			{
				aprobados_cuatro ++;
			}
			if(this.form.administracion_cp_correcto == false)
			{
				reprobado_cuatro ++;
			}
			if(this.form.administracion_cp_correcto == 'nada')
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

    }
	
};
</script>