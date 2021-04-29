<!DOCTYPE html>
<html lang="en" dir="ltr" style="background-color: white">
	<head>
		<meta charset="utf-8">
		<title>RPM</title>

		<link rel="stylesheet" href="formulario_alta/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="formulario_alta/vue-form-wizard.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="formulario_alta/menu_flotante.css">
		<link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style media="screen">
			pre { overflow: auto; }
			pre .string { color: #885800; }
			pre .number { color: blue; }
			pre .boolean { color: magenta; }
			pre .null { color: red; }
			pre .key { color: green; }

			.slide-fade-enter-active {
				transition: all .3s ease;
			}
			.slide-fade-leave-active {
				transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
			}
			.slide-fade-enter, .slide-fade-leave-to
			/* .slide-fade-leave-active below version 2.1.8 */ {
				transform: translateX(10px);
				opacity: 0;
			}
		</style>
		<link rel="stylesheet" href="formulario_alta/vue-multiselect.min.css">
		<link rel="stylesheet" href="formulario_alta/cosas_wizar_uno.css">
		<link rel="stylesheet" href="formulario_alta/cosas_wizar.css">
	</head>
	<body>
		<div id="app" style="background-color: white">
			<div>
				<form-wizard @on-complete="onComplete"
							 color="green"
							 error-color="#a94442"
							 >
					<!-- Tab N° 1 Bienvenido -->
					<tab-content title="Tipo Trámite" icon="ti-layout-list-thumb-alt" :before-change="validatezeroTab">
						<br>
						<div class="row">
								<div class="col-12 col-md-6">
									<img src="{{url('formulario_alta/imagenes/wlecome-formulario-rpm.svg')}}">
								</div>
								<div class="col-6 col-md-6">
									<h2> Bienvenido al Formulario de Alta de Productores Mineros de San Juan</h2>
									<p>En esta página, usted podrá inscribirse como productor minero. No es un proceso dificil, te ayudaremos en cada paso para poder completar el formulario lo antes posible.</p>
									<p><strong>Importante:</strong>
										<ul>
											<li> * Tener documentación en formato digital</li>
											<li> * Tener dirección de email válida</li>
											<li> * Tener tiempo (aproximadamente 10 minutos) para completar el formulario</li>
											<li> * Se pueden guardar los avances, y continuarlo otro día</li>
											<li> * Tener documentación a mano</li>
										</ul>
									</p>
									<p><strong>Consideraciones:</strong>
										<ul>
											<li> * Es impresindible disponer de un email válido. Allí se enviarán importantes notificaciones y avisos.</li>
											<li> * Puede utilizar cualquier dispositivo para completar este formulario</li>
											<!-- <svg version="1.1" id="web-skill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="160px" height="108px" viewBox="0 0 160 108" enable-background="new 0 0 160 108" xml:space="preserve"><g id="mobile" style="transform: matrix(1, 0, 0, 1, 0, 0);"><path fill="#FFFFFF" d="M49.1,102.4c0,1.2-1,2.1-2.1,2.1H20.6c-1.2,0-2.1-1-2.1-2.1v-56c0-1.2,1-2.1,2.1-2.1h26.3
												c1.2,0,2.1,1,2.1,2.1v56H49.1z"></path><path fill="#00D9B3" d="M46.9,106H20.6c-2,0-3.6-1.6-3.6-3.6v-56c0-2,1.6-3.6,3.6-3.6h26.3c2,0,3.6,1.6,3.6,3.6v56
												C50.6,104.4,48.9,106,46.9,106z M20.6,45.7c-0.3,0-0.6,0.3-0.6,0.6v56c0,0.4,0.3,0.6,0.6,0.6h26.3c0.4,0,0.6-0.3,0.6-0.6v-56
												c0-0.4-0.3-0.6-0.6-0.6H20.6z"></path><path fill="#00D9B3" d="M35.9,97.2c0,1.2-1,2.1-2.1,2.1c-1.2,0-2.1-1-2.1-2.1c0-1.2,1-2.1,2.1-2.1C35,95,35.9,96,35.9,97.2"></path><path fill="#00D9B3" d="M35.4,76.5c2.3-0.8,3.9-2.9,3.9-5.4c0-3.2-2.6-5.7-5.7-5.7c-3.2,0-5.7,2.6-5.7,5.7v10.1
												c0,0.5,0.4,0.9,0.9,0.9h10.1c0.4,0,0.7-0.2,0.8-0.5c0.1-0.3,0.1-0.7-0.2-1L35.4,76.5z M33.6,67.1c2.2,0,4,1.8,4,4
												c0,2.1-1.6,3.8-3.6,4l-4.3-4.3C29.8,68.7,31.5,67.1,33.6,67.1 M29.6,80.3v-7.1l7.1,7.1H29.6z"></path></g><g id="desktop" style="transform: matrix(1, 0, 0, 1, 0, 0);"><path fill="#FFFFFF" d="M128.6,77.6c0,1.7-1.3,3-3,3H46.5c-1.7,0-3-1.3-3-3V21.1c0-1.7,1.3-3,3-3h79.1c1.7,0,3,1.3,3,3V77.6z"></path><path fill="#00D9B3" d="M125.6,82.1H46.5c-2.5,0-4.5-2-4.5-4.5V21.1c0-2.5,2-4.5,4.5-4.5h79.1c2.5,0,4.5,2,4.5,4.5v56.5
												C130.1,80.1,128.1,82.1,125.6,82.1z M46.5,19.6c-0.8,0-1.5,0.7-1.5,1.5v56.5c0,0.8,0.7,1.5,1.5,1.5h79.1c0.8,0,1.5-0.7,1.5-1.5
												V21.1c0-0.8-0.7-1.5-1.5-1.5H46.5z"></path><path fill="#00D9B3" d="M101.8,106c-7.3,0-13.2-5.9-13.2-13.2V80.6c0-0.8,0.7-1.5,1.5-1.5c0.8,0,1.5,0.7,1.5,1.5v12.2
												c0,5.6,4.6,10.2,10.2,10.2c0.8,0,1.5,0.7,1.5,1.5S102.7,106,101.8,106z"></path><path fill="#00D9B3" d="M70.2,106c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c5.6,0,10.2-4.6,10.2-10.2V80.6c0-0.8,0.7-1.5,1.5-1.5
												c0.8,0,1.5,0.7,1.5,1.5v12.2C83.4,100.1,77.5,106,70.2,106z"></path><path fill="#00D9B3" d="M88.6,53.8c3.6-1.2,6.2-4.6,6.2-8.6c0-5-4.1-9-9-9c-4.9,0-9,4.1-9,9v15.9c0,0.8,0.6,1.4,1.4,1.4H94
												c0.6,0,1.1-0.3,1.3-0.8s0.1-1.1-0.3-1.5L88.6,53.8z M85.7,38.9c3.5,0,6.3,2.8,6.3,6.3c0,3.3-2.5,6-5.7,6.3l-6.8-6.8
												C79.8,41.5,82.5,38.9,85.7,38.9 M79.5,59.7V48.5l11.2,11.2H79.5z"></path></g><g id="mobile2" opacity="0" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 0;"><path fill="#FFFFFF" d="M49.1,102.4c0,1.2-1,2.1-2.1,2.1H20.6c-1.2,0-2.1-1-2.1-2.1v-56c0-1.2,1-2.1,2.1-2.1h26.3
												c1.2,0,2.1,1,2.1,2.1L49.1,102.4L49.1,102.4z"></path><path fill="#00D9B3" d="M46.9,106H20.6c-2,0-3.6-1.6-3.6-3.6v-56c0-2,1.6-3.6,3.6-3.6h26.3c2,0,3.6,1.6,3.6,3.6v56
												C50.6,104.4,48.9,106,46.9,106z M20.6,45.7c-0.3,0-0.6,0.3-0.6,0.6v56c0,0.4,0.3,0.6,0.6,0.6h26.3c0.4,0,0.6-0.3,0.6-0.6v-56
												c0-0.4-0.3-0.6-0.6-0.6H20.6z"></path><path fill="#00D9B3" d="M35.9,97.2c0,1.2-1,2.1-2.1,2.1c-1.2,0-2.1-1-2.1-2.1c0-1.2,1-2.1,2.1-2.1C35,95,35.9,96,35.9,97.2"></path><path fill="#00D9B3" d="M35.4,76.5c2.3-0.8,3.9-2.9,3.9-5.4c0-3.2-2.6-5.7-5.7-5.7c-3.2,0-5.7,2.6-5.7,5.7v10.1
												c0,0.5,0.4,0.9,0.9,0.9h10.1c0.4,0,0.7-0.2,0.8-0.5c0.1-0.3,0.1-0.7-0.2-1L35.4,76.5z M33.6,67.1c2.2,0,4,1.8,4,4
												c0,2.1-1.6,3.8-3.6,4l-4.3-4.3C29.8,68.7,31.5,67.1,33.6,67.1 M29.6,80.3v-7.1l7.1,7.1H29.6z"></path></g>
											</svg> -->
										</ul>
									</p>
									<br>
									<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
								</div>
						</div>
						<br>
						<hr style="border-top: 1px dashed green;">
						<br>
						<div class="row"></div>
						<h4>Seleccione Tipo de Tramite que desea realizar:</h4> <i class="ti-info-alt" id="element" ></i>
						<div class="middle">
							<label>
								<input type="radio" name="radio"  v-model="formulario_seleccionado" value="inscripcion" checked/>
								<div class="inscripcion box">
									<span>Inscribirse</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="editar_inscripcion"/>
								<div class="editarins box">
									<span>Editar Inscripción</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="reinscripcion"/>
								<div class="resins box">
									<span>Reincripcion</span>
								</div>
							</label>
						</div>
						<transition
							name="custom-classes-transition"
							enter-active-class="animated fadeInDownBig"
							leave-active-class="animated bounceOut"
						>
							<div v-show="formulario_seleccionado=='inscripcion'">
								<h4>Primera vez que utiliza este formulario?</h4> <i class="ti-info-alt" id="element1" ></i>
								<div class="middle_sis" >
									<label>
										<input type="radio" name="radio_sys" v-model="model.primera_vez"  value="si" checked/>
										<div class="back-end box">
											<span>Si</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys" v-model="model.primera_vez" value="no" />
										<div class="home box">
											<span>No</span>
										</div>
									</label>
								</div>
								<br>
								<br>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.primera_vez=='si'">
										<div class="col-sm"><label>Por favor ingrese dos veces su email: </label> </div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso" id="email_primer_paso"  v-model="model.email" maxlength="45" /> 
											<br>
											<br>
										</div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso_conf" id="email_primer_paso_conf"  v-model="model.email_confirmacion" maxlength="45" /> 
										</div>
										<div class="col-sm">
											<button type="button" class="btn btn-outline-primary btn-lg" id="validar_emails" @click="validar_email_datos"><i class="ti-check"></i>&nbsp; Validar</button>
										</div>
									</div>
								</transition>
								<br>
								<br>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.correo_enviado_si && model.primera_vez=='si'">
										<div class="row"></div>
										<br>
										<br>
										<hr>
										<div class="col-sm"></div>
										<div class="col-sm">
											<div class="alert alert-info" role="alert">
												<span>Información: Le hemos enviado un email a su casilla de correo. Por favor, haga clic en el interior del mismo para poder confirmar su email para así poder continuar. Gracias</span>
											</div>
											<div class="alert alert-secondary" role="alert">
												<span>Consejo: Le recomendamos abrir su correo electronico desde su celular. Luego, busque el email que le hemos mandado, posteriormente haga click en el boton, y finalmente haga click en el boton "Ya confirme" que esta a la derecha de este renglón.</span>
											</div>
										</div>
										<div class="col-sm">
											<img src="{{url('formulario_alta/imagenes/nuevo-email-rpm.svg')}}" width="200px ">
										</div>
										
										<div class="col-sm">
											<button type="button" class="btn btn-outline-info btn-lg" id="revisar_email_confirmacion" @click="preguntar_email_confirmacion"><i class="ti-check"></i>&nbsp; Ya confirme</button>
										</div>
										
									</div>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.correo_enviado_si && model.primera_vez=='si' && email_confirmado">
										<br>
										<br>
										<hr>
										<div class="col-sm">
											<div class="alert alert-success" role="alert">
												<span>Muy bien. Hemos confirmado su email. Gracias, ahora continuemos con la inscripción, favor de hacer click en el boton "Siguiente".</span>
											</div>
										</div>
										<div class="col-sm">
											<div style="display: flex; justify-content: right; align-items: right; height: 10vh;">
												<div style="height:900px;margin:0 auto;position:absolute;  left: 74%; top: 235%;width:176px">
													<div style="animation:a-s .5s .5s 1 linear forwards,a-e 1.75s .5s 1 cubic-bezier(0,0,.67,1) forwards;opacity:0;transform:scale(.68)">
														<div style="background:#ddd;border-radius:12px;box-shadow:0 15px 15px -15px rgba(0,0,0,.3);height:128px;left:0;overflow:hidden;position:absolute;top:0;transform:scale(1);width:176px">
															<div style="animation:a-nt .667s 1.5s 1 cubic-bezier(.4,0,.2,1) forwards;background:#d23f31;border-radius:50%;height:270px;left:88px;margin:-135px;position:absolute;top:25px;transform:scale(.5);width:270px"></div>
															<div style="height:128px;left:20px;overflow:hidden;position:absolute;top:0;transform:scale(1);width:136px">
																<div style="background:#e1e1e1;height:128px;left:0;position:absolute;top:0;width:68px">
																	<div style="animation:a-h .25s 1.25s 1 forwards;background:#eee;height:128px;left:0;opacity:1;position:absolute;top:0;width:68px"></div>
																</div>
																<div style="background:#eee;height:100px;left:1px;position:absolute;top:56px;transform:scaleY(.73)rotate(135deg);width:200px"></div>
															</div>
															<div style="background:#bbb;height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
																<div style="background:#eee;border-radius:12px 12px 0 0;bottom:117px;height:12px;left:55px;position:absolute;transform:rotate(-135deg)scaleY(1.37);width:136px"></div>
																<div style="background:#eee;height:96px;position:absolute;right:0;top:0;width:96px"></div>
																<div style="box-shadow:inset 0 0 10px #888;height:155px;position:absolute;right:0;top:0;width:155px"></div>
															</div>
															<div style="animation:a-s .167s 1.283s 1 linear forwards,a-es 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:linear-gradient(0,rgba(38,38,38,0),rgba(38,38,38,.2));height:225px;left:0;opacity:0;position:absolute;top:0;transform:rotate(-43deg);transform-origin:0 13px;width:176px"></div>
														</div>
														<div style="animation:a-ef 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;border-radius:12px;height:100px;left:0;overflow:hidden;position:absolute;top:0;transform:scaleY(1);transform-origin:top;width:176px">
															<div style="height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
																<div style="animation:a-s .167s 1.283s 1 linear forwards;box-shadow:-5px 0 12px rgba(0,0,0,.5);height:176px;left:0;opacity:0;position:absolute;top:0;width:176px"></div>
																<div style="background:#ddd;height:176px;left:0;overflow:hidden;position:absolute;top:0;width:176px">
																	<div style="animation:a-nt .667s 1.25s 1 cubic-bezier(.4,0,.2,1) forwards;background:#db4437;border-radius:50%;bottom:41px;height:225px;left:41px;position:absolute;transform:scale(0);width:225px"></div>
																	<div style="background:#f1f1f1;height:128px;left:24px;position:absolute;top:24px;transform:rotate(90deg);width:128px"></div>
																	<div style="animation:a-efs 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:#fff;height:176px;opacity:0;transform:rotate(90deg);width:176px"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.primera_vez=='no'">
										<div class="col-sm"><label>Por favor ingrese su email para buscar sus datos: </label> </div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso" id="email_primer_paso"  v-model="model.email" maxlength="25" /> 
										</div>
										<div class="col-sm">
											<button type="button" class="btn btn-outline-primary btn-lg" id="recuperar_datos" @click="recuperar_datos"><i class="ti-loop"></i>&nbsp; Recuperar</button>
										</div>
									</div>
									<br>
									<br>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.recuperacion_exitosa">
										<br>
										<br>
										<div class="col">
											<div class="alert alert-success" role="alert">
												<span>Muy bien. Hemos recuperados los datos guardados para su email. Continuemos con la inscripción, favor de hacer click en el botón "Siguiente".</span>
											</div>
										</div>
										<div class="col">
											<img src="{{url('formulario_alta/imagenes/datos_recuperados.svg')}}" width="80%">
										</div>
									</div>
								</transition>
							</div>
						</transition>
						<transition
							name="custom-classes-transition"
							enter-active-class="animated fadeInDownBig"
							leave-active-class="animated bounceOut"
						>
							<div v-show="formulario_seleccionado=='reinscripcion'">
								<h4>Identificación:</h4> <i class="ti-info-alt" id="element1" ></i>
								<div class="col-sm"><label>Por favor ingrese su CUIL o CUIT (solo números): </label> </div>
									<div class="col-sm">
										<input type="text" class="form-control" name="cuit_reinscripcion" id="cuit_reinscripcion" v-model="reinscripcion_data.cuit_para_validar" maxlength="14" /> 
									</div>
									<div class="col-sm">
										<button type="button" class="btn btn-outline-primary btn-lg" id="validar_cuit" name="validar_cuit" @click="validar_cuit_productor"><i class="ti-check"></i>&nbsp; Validar</button>
									</div>

								<br>
								<br>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.primera_vez=='si'">
										<div class="col-sm"><label>Por favor ingrese dos veces su email: </label> </div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso" id="email_primer_paso"  v-model="model.email" maxlength="45" /> 
											<br>
											<br>
										</div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso_conf" id="email_primer_paso_conf"  v-model="model.email_confirmacion" maxlength="45" /> 
										</div>
										<div class="col-sm">
											<button type="button" class="btn btn-outline-primary btn-lg" id="validar_emails" @click="validar_email_datos"><i class="ti-check"></i>&nbsp; Validar</button>
										</div>
									</div>
								</transition>
								<br>
								<br>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.correo_enviado_si && model.primera_vez=='si'">
										<div class="row"></div>
										<br>
										<br>
										<hr>
										<div class="col-sm"></div>
										<div class="col-sm">
											<div class="alert alert-info" role="alert">
												<span>Información: Le hemos enviado un email a su casilla de correo. Por favor, haga clic en el interior del mismo para poder confirmar su email para así poder continuar. Gracias</span>
											</div>
											<div class="alert alert-secondary" role="alert">
												<span>Consejo: Le recomendamos abrir su correo electronico desde su celular. Luego, busque el email que le hemos mandado, posteriormente haga click en el boton, y finalmente haga click en el boton "Ya confirme" que esta a la derecha de este renglón.</span>
											</div>
										</div>
										<div class="col-sm">
											<img src="{{url('formulario_alta/imagenes/nuevo-email-rpm.svg')}}" width="200px ">
										</div>
										
										<div class="col-sm">
											<button type="button" class="btn btn-outline-info btn-lg" id="revisar_email_confirmacion" @click="preguntar_email_confirmacion"><i class="ti-check"></i>&nbsp; Ya confirme</button>
										</div>
										
									</div>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.correo_enviado_si && model.primera_vez=='si' && email_confirmado">
										<br>
										<br>
										<hr>
										<div class="col-sm">
											<div class="alert alert-success" role="alert">
												<span>Muy bien. Hemos confirmado su email. Gracias, ahora continuemos con la inscripción, favor de hacer click en el boton "Siguiente".</span>
											</div>
										</div>
										<div class="col-sm">
											<div style="display: flex; justify-content: right; align-items: right; height: 10vh;">
												<div style="height:900px;margin:0 auto;position:absolute;  left: 74%; top: 235%;width:176px">
													<div style="animation:a-s .5s .5s 1 linear forwards,a-e 1.75s .5s 1 cubic-bezier(0,0,.67,1) forwards;opacity:0;transform:scale(.68)">
														<div style="background:#ddd;border-radius:12px;box-shadow:0 15px 15px -15px rgba(0,0,0,.3);height:128px;left:0;overflow:hidden;position:absolute;top:0;transform:scale(1);width:176px">
															<div style="animation:a-nt .667s 1.5s 1 cubic-bezier(.4,0,.2,1) forwards;background:#d23f31;border-radius:50%;height:270px;left:88px;margin:-135px;position:absolute;top:25px;transform:scale(.5);width:270px"></div>
															<div style="height:128px;left:20px;overflow:hidden;position:absolute;top:0;transform:scale(1);width:136px">
																<div style="background:#e1e1e1;height:128px;left:0;position:absolute;top:0;width:68px">
																	<div style="animation:a-h .25s 1.25s 1 forwards;background:#eee;height:128px;left:0;opacity:1;position:absolute;top:0;width:68px"></div>
																</div>
																<div style="background:#eee;height:100px;left:1px;position:absolute;top:56px;transform:scaleY(.73)rotate(135deg);width:200px"></div>
															</div>
															<div style="background:#bbb;height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
																<div style="background:#eee;border-radius:12px 12px 0 0;bottom:117px;height:12px;left:55px;position:absolute;transform:rotate(-135deg)scaleY(1.37);width:136px"></div>
																<div style="background:#eee;height:96px;position:absolute;right:0;top:0;width:96px"></div>
																<div style="box-shadow:inset 0 0 10px #888;height:155px;position:absolute;right:0;top:0;width:155px"></div>
															</div>
															<div style="animation:a-s .167s 1.283s 1 linear forwards,a-es 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:linear-gradient(0,rgba(38,38,38,0),rgba(38,38,38,.2));height:225px;left:0;opacity:0;position:absolute;top:0;transform:rotate(-43deg);transform-origin:0 13px;width:176px"></div>
														</div>
														<div style="animation:a-ef 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;border-radius:12px;height:100px;left:0;overflow:hidden;position:absolute;top:0;transform:scaleY(1);transform-origin:top;width:176px">
															<div style="height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
																<div style="animation:a-s .167s 1.283s 1 linear forwards;box-shadow:-5px 0 12px rgba(0,0,0,.5);height:176px;left:0;opacity:0;position:absolute;top:0;width:176px"></div>
																<div style="background:#ddd;height:176px;left:0;overflow:hidden;position:absolute;top:0;width:176px">
																	<div style="animation:a-nt .667s 1.25s 1 cubic-bezier(.4,0,.2,1) forwards;background:#db4437;border-radius:50%;bottom:41px;height:225px;left:41px;position:absolute;transform:scale(0);width:225px"></div>
																	<div style="background:#f1f1f1;height:128px;left:24px;position:absolute;top:24px;transform:rotate(90deg);width:128px"></div>
																	<div style="animation:a-efs 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:#fff;height:176px;opacity:0;transform:rotate(90deg);width:176px"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.primera_vez=='no'">
										<div class="col-sm"><label>Por favor ingrese su email para buscar sus datos: </label> </div>
										<div class="col-sm">
											<input type="text" class="form-control" name="email_primer_paso" id="email_primer_paso"  v-model="model.email" maxlength="25" /> 
										</div>
										<div class="col-sm">
											<button type="button" class="btn btn-outline-primary btn-lg" id="recuperar_datos" @click="recuperar_datos"><i class="ti-loop"></i>&nbsp; Recuperar</button>
										</div>
									</div>
									<br>
									<br>
								</transition>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
									<div class="row" v-show="model.recuperacion_exitosa">
										<br>
										<br>
										<div class="col">
											<div class="alert alert-success" role="alert">
												<span>Muy bien. Hemos recuperados los datos guardados para su email. Continuemos con la inscripción, favor de hacer click en el botón "Siguiente".</span>
											</div>
										</div>
										<div class="col">
											<img src="{{url('formulario_alta/imagenes/datos_recuperados.svg')}}" width="80%">
										</div>
									</div>
								</transition>
							</div>
						</transition>
						<div class="row"><br></div>
						<div class="row"><br></div>
						<div class="row"><br></div>
						
						<vue-form-generator :model="model"
											:schema="zeroTabSchema"
											:options="formOptions"
											ref="zeroTabForm">
						</vue-form-generator>
						<div>
						</div>
					</tab-content>
					<!-- Tab N° 2 Datos del Productor -->
					<tab-content title="Datos del Productor" icon="ti-user" :before-change="validateFirstTab">
						<br>
						<div class="row">
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_dos = ! model.mostrar_info_dos">
									<span v-show="model.mostrar_info_dos">Ocultar Info</span>
									<span v-show="!model.mostrar_info_dos">Mostrar  Info</span>
								</button>
						    </div>
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button class="btn btn-outline-primary" @click="guardar_avances_uno" id="guardar_paso1">Guardar Avances</button>
						    </div>
						</div>
						<br>
						<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
							<div class="row" v-show="model.mostrar_info_dos">
								<div class="col-12 col-md-6">
									<img src="{{url('formulario_alta/persona_paso_1.png')}}" width="50%">
								</div>
								<div class="col-6 col-md-6">
									<h4> Paso 2: Datos del Productor</h4>
									<p class="lead">En esta página, usted deberá completar información referiada al productor minero. Esta infomación es necesaria por: .</p>
									<p class="lead"><strong>Importante:</strong>
										<ul>
											<li> * Razon Social</li>
											<li> * Cuit</li>
											<li> * Numero de Productor</li>
											<li> * Tipo de Sociedad</li>
											<li> * Email</li>
											<li> * Domicilio</li>
											<li> * Inscripcion DGR (en formato pdf)</li>
											<li> * Constancia Sociedad (en formato pdf)</li>
										</ul>
									</p>
									<br>
									<p class="lead"> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
								</div>
							</div>
							<br>
							<hr style="border-top: 1px dashed green;">
							<br>
						</transition>
						<div class="row">
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="razon_social" placeholder="Razon Social" v-model="model.lastName">
							  <label for="floatingPassword">Razon Social</label>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el nombre con el que identifica ante la AFIP.</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="cuit" placeholder="CUIT" v-model="model.cuit">
							  <label for="cuit">CUIT</label>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el numero de CUIT asignado por la AFIP.</small></p>
							</div>	
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="num_prod" placeholder="Numero Productor" v-model="model.num_productor">
							  <label for="num_prod">Numero Productor</label>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el numero de productor otorgado por el ministerio de mineria.</small></p>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="tipo_sociedad" placeholder="Tipo de Sociedad" v-model="model.tipo_sociedad">
								  <label for="tipo_sociedad">Tipo de Sociedad</label>
								  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el tipo de sociedad conformada.</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="email" placeholder="Email" v-model="model.email">
							  <label for="email">Email</label>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el email donde recibirá notificaciones</small></p>

							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="domicilio_prod" placeholder="Domicilio" v-model="model.streetName">
							  <label for="domicilio_prod">Domicilio</label>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Es el domicilio actual de la persona, identificada como productor.</small></p>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div class="form-floating col-sm">
								<div class="input-group mb-3">
									<label class="input-group-text" for="inscripcion_dgr">Inscripcion DGR (*) (*.pdf)</label>
	  								<input type="file" class="form-control" id="inscripcion_dgr" v-model="model.inscricion_dgr" v-on:change="enviar_inscripcion">
	  							</div>
	  							<p v-show="model.tiene_inscricion_dgr != ''"><small class="text-muted">Usted ya cargó un archivo para este campo. En caso de querer reemplazarlo, utilice este campo.</small></p>
							  <p v-show="model.mostrar_info_dos"><small class="text-muted">Esta constancia puede ser descargada desde la página de la AFIP. Debe ser un archivo PDF</small></p>
							</div>
							<div v-show="model.tiene_inscricion_dgr != ''" class="form-floating col-sm" >
								<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_inscricion_dgr>
							</div>
							
						</div>
						<br>
						<hr>
						<br>
						<div class="row">
							<div class="form-floating col-sm">
								<div class="input-group mb-3">
									<label class="input-group-text" for="constancia_sociedad">Constancia de socidad (*) (*.pdf)</label>
	  								<input type="file" class="form-control" id="constancia_sociedad" v-model="model.constancia_sociedad"  v-on:change="enviar_constancia">
	  							</div>
	  							<p v-show="model.mostrar_info_dos"><small class="text-muted">Esta constancia puede ser descargada desde la página de la AFIP. Debe ser un archivo PDF</small></p>
							</div>	
							<div v-show="model.tiene_constancia_sociedad != ''" class="form-floating col-sm" >
								<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_constancia_sociedad>
							</div>
						</div>
						<br>
						<br>
					</tab-content>
					<!-- Tab N° 3 Domicilio Legal -->
					<tab-content title="Domicilio Legal"  icon="ti-settings" :before-change="validateSecondTab">
						<br>
						<div class="row">
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_tres = ! model.mostrar_info_tres">
									<span v-show="model.mostrar_info_tres">Ocultar Info</span>
									<span v-show="!model.mostrar_info_tres">Mostrar  Info</span>
								</button>
						    </div>
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button class="btn btn-outline-primary" @click="guardar_avances_dos" id="guardar_paso3">Guardar Avances</button>
						    </div>
						</div>
						<transition name="custom-classes-transition" enter-active-class="animated fadeInDownBig" leave-active-class="animated bounceOut" >
							<div class="row" v-show="model.mostrar_info_tres" style="margin-top: 25px;">
								<div class="col-12 col-md-6">
									<img src="{{url('formulario_alta/imagenes/domicilio-legal.svg')}}">
								</div>
								<div class="col-6 col-md-6">
									<h2> Paso 3: Domicilio Legal</h2>
									<p>En esta página, usted debrá ingresar los datos referidos a su domicilio legal, para así poder darse de alta como productor minero. Este formulario es simple y requiere mayores detalles de explicación.</p>
									<p><strong>Datos requeridos:</strong>
										<ul>
											<li> * Calle</li>
											<li> * Número de calle</li>
											<li> * Teléfono</li>
											<li> * Páis</li>
											<li> * Provincia</li>
											<li> * Departamento</li>
											<li> * Localidad</li>
											<li> * Código Postal</li>
											<li> * Otro</li>
										</ul>
									</p>
									<br>
									<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
								</div>
							</div>
						</transition>
						<br>
						<br>
						<div class="row">
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="calle_legal" placeholder="Calle Legal" v-model="model.domicilio_legal_calle">
							  <label for="calle_legal">Calle (*)</label>
							  <p v-show="model.mostrar_info_tres"><small class="text-muted">Es el nombre de la(s) calle(s) donde se encuentra la oficina legal (también se puede especificar una intersección de calles).</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="numero_calle" placeholder="Número calle" v-model="model.domicilio_legal_calle_numero">
							  <label for="numero_calle">Número de Calle</label>
							  <p v-show="model.mostrar_info_tres"><small class="text-muted">Es la numeración del domicilio que se esta declarando. Este es un valor númerico.</small></p>
							</div>	
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="telefono_legal" placeholder="Teléfono" v-model="model.domicilio_legal_telefono">
							  <label for="domicilio_legal_telefono">Teléfono</label>
							  <p v-show="model.mostrar_info_tres"><small class="text-muted">Es el numero de productor otorgado por el ministerio de mineria.</small></p>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div>
								<label for="pais_legal">País:</label>
								<multiselect 
									v-model="model.domicilio_legal_pais" 
									:options="opcionespaises_legal" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione el Pais" 
									:preselect-first="false"
									id="pais_legal"
									@input="cambio_pais_legal"
									
								>
								</multiselect>
							</div>
						</div>							
						<br>
						<div class="row">
							<div>
								<label for="provincia_legal">Provincia:</label>
								<multiselect 
									v-model="model.domicilio_legal_provincia" 
									:options="opcionesprovincias_legal" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione la Provincia" 
									:preselect-first="false"
									id="provincia_legal"
									@input="cambio_provincia_legal"
								>
								</multiselect>
							</div>
						</div>
						<br>
						<div class="row">
							<div>
								<label for="departamento_legal">Departamento:</label>
								<multiselect 
									v-model="model.domicilio_legal_departamento" 
									:options="opcionesdepartamento_legal" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione el Departamento" 
									:preselect-first="false"
									id="departamento_legal"
									@input="cambio_departamento_legal"
								>
								</multiselect>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="localidad_legal" placeholder="Localidad" v-model="model.domicilio_legal_localidad">
								  <label for="localidad_legal">Localidad</label>
								  <p v-show="model.mostrar_info_tres"><small class="text-muted">Es la localidad donde se encuentra el domicilio.</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="cp_legal" placeholder="Código Postal" v-model="model.domicilio_legal_cp">
							  <label for="cp_legal">Código Postal</label>
							  <p v-show="model.mostrar_info_tres"><small class="text-muted">Codigo postal correspondiente al domicilio.</small></p>

							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="otro_legal" placeholder="Otra Locación" v-model="model.domicilio_legal_otro">
							  <label for="otro_legal">Otro</label>
							  <p v-show="model.mostrar_info_tres"><small class="text-muted">Este campos es para el caso de que considere necesario brindar algún dato extra aporte más precisión de la ubicación del domicilio legal.</small></p>
							</div>	
						</div>
						<br>
						<br>
					</tab-content>
					<!-- Tab N° 4 Domicilio Administrativo -->
					<tab-content title="Domicilio Administrativo"  icon="ti-settings" :before-change="validateAdministrativoTab">
						<br>
						<div class="row">
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_cuatro = ! model.mostrar_info_cuatro">
									<span v-show="model.mostrar_info_cuatro">Ocultar Info</span>
									<span v-show="!model.mostrar_info_cuatro">Mostrar  Info</span>
								</button>
						    </div>
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button class="btn btn-outline-primary" @click="guardar_avances_tres" id="guardar_paso4">Guardar Avances</button>
						    </div>
						</div>
						<transition name="custom-classes-transition" enter-active-class="animated fadeInDownBig" leave-active-class="animated bounceOut" >
							<div class="row" v-show="model.mostrar_info_cuatro">
								<div class="col-12 col-md-6">
									<img src="{{url('formulario_alta/imagenes/mapa-ofi-administrativo.svg')}}">
								</div>
								<div class="col-6 col-md-6">
									<h2> Paso 4: Domicilio Administrativo</h2>
									<p>En esta página, usted debrá ingresar los datos referidos a su domicilio administrativo, para así poder darse de alta como productor minero. Estos datos pueden coincidir con los declarados en la página "Domicilio Legal". Este formulario es simple y requiere mayores detalles de explicación.</p>
									<p><strong>Datos requeridos:</strong>
										<ul>
											<li> * Calle</li>
											<li> * Número de calle</li>
											<li> * Teléfono</li>
											<li> * Páis</li>
											<li> * Provincia</li>
											<li> * Departamento</li>
											<li> * Localidad</li>
											<li> * Código Postal</li>
											<li> * Otro</li>
										</ul>
									</p>
									<br>
									<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
								</div>
							</div>
						</transition>
						<br>
						<br>
						<div class="row">
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="calle_administrativo" placeholder="Calle Legal" v-model="model.domicilio_administrativo_calle">
							  <label for="calle_administrativo">Calle (*)</label>
							  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Es el nombre de la(s) calle(s) donde se encuentra la oficina legal (también se puede especificar una intersección de calles).</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="numero_calle_administrativo" placeholder="Número calle" v-model="model.domicilio_administrativo_calle_numero">
							  <label for="numero_calle_administrativo">Número de Calle</label>
							  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Es la numeración del domicilio que se esta declarando. Este es un valor númerico.</small></p>
							</div>	
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="telefono_administrativo" placeholder="Teléfono" v-model="model.domicilio_administrativo_telefono">
							  <label for="telefono_administrativo">Teléfono</label>
							  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Es el numero de productor otorgado por el ministerio de mineria.</small></p>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div>
								<label for="pais_legal">País:</label>
								<multiselect 
									v-model="model.domicilio_administrativo_pais" 
									:options="opcionespaises_administrativo" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione el Pais" 
									:preselect-first="false"
									id="pais_administrativo"
									@input="cambio_pais_administrativo"
									
								>
								</multiselect>
							</div>
						</div>							
						<br>
						<div class="row">
							<div>
								<label for="provincia_legal">Provincia:</label>
								<multiselect 
									v-model="model.domicilio_administrativo_provincia" 
									:options="opcionesprovincias_administrativo" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione la Provincia" 
									:preselect-first="false"
									id="provincia_administrativo"
									@input="cambio_provincia_administrativo"
								>
								</multiselect>
							</div>
						</div>
						<br>
						<div class="row">
							<div>
								<label for="departamento_legal">Departamento:</label>
								<multiselect 
									v-model="model.domicilio_administrativo_departamento" 
									:options="opcionesdepartamento_administrativo" 
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione el Departamento" 
									:preselect-first="false"
									id="departamento_administrativo"
									@input="cambio_departamento_administrativo"
								>
								</multiselect>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="localidad_administrativo" placeholder="Localidad" v-model="model.domicilio_administrativo_localidad">
								  <label for="localidad_administrativo">Localidad</label>
								  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Es la localidad donde se encuentra el domicilio.</small></p>
							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="cp_administrativo" placeholder="Código Postal" v-model="model.domicilio_administrativo_cp">
							  <label for="cp_administrativo">Código Postal</label>
							  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Codigo postal correspondiente al domicilio.</small></p>

							</div>
							<div class="form-floating col-sm">
							  <input type="text" class="form-control" id="otro_administrativo" placeholder="Otra Locación" v-model="model.domicilio_administrativo_otro">
							  <label for="otro_administrativo">Otro</label>
							  <p v-show="model.mostrar_info_cuatro"><small class="text-muted">Este campos es para el caso de que considere necesario brindar algún dato extra aporte más precisión de la ubicación del domicilio legal.</small></p>
							</div>	
						</div>
						<br>
						<br>
					</tab-content>
					<!-- Tab N° 5 Datos Mina 1 -->
					<tab-content title="Datos Mina 1" icon="ti-pencil-alt"  :before-change="validateDatosMinaUno">
						<br>
						<div class="row">
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_cinco = ! model.mostrar_info_cinco">
									<span v-show="model.mostrar_info_cinco">Ocultar Info</span>
									<span v-show="!model.mostrar_info_cinco">Mostrar  Info</span>
								</button>
						    </div>
						    <div class="d-grid gap-2 col-4 mx-auto">
								<button class="btn btn-outline-primary" @click="guardar_avances_cuatro" id="guardar_paso4">Guardar Avances</button>
						    </div>
						</div>

						<transition
									name="custom-classes-transition"
									enter-active-class="animated fadeInDownBig"
									leave-active-class="animated bounceOut"
								>
							<div class="row" v-show="model.mostrar_info_cinco">
								<div class="col-12 col-md-6">
									<img src="{{url('formulario_alta/imagenes/datos-mina.svg')}}">
								</div>
								<div class="col-6 col-md-6">
									<h2> Paso 5: Datos del yacimiento</h2>
									<p>En esta página, usted debrá ingresar los datos referidos a su yacimiento , ya sea que se trate de una mina o cantera, para así poder darse de alta como productor minero.</p>
									<p><strong>Datos requeridos:</strong>
										<ul>
											<li> * Tipo de yacimiento</li>
											<li> * Número de Expediente</li>
											<li> * Distrito Minero</li>
											<li> * Nombre de mina (para 1° y 2° categoría)</li>
											<li> * Selección de categoria</li>
											<li> * Descripción (3° categoria)</li>
											<li> * Plano de Inmueble (para 3° categoria)</li>
											<li> * Minerales: Mineral explotado</li>
											<li> * Minerales: Observación</li>
										</ul>
									</p>
									<br>
									<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
								</div>
							</div>
						</transition>
						<div>
							<br>
							<h4>Selección tipo de derecho:</h4>
							<p v-show="model.mostrar_info_cinco"><small class="text-muted">Debe seleccionar la opcion que usted esta registrando, ya sea mina o cantera.</small></p>
							<div class="middle_m_c">
								<label>
									<input type="radio" name="radio_m_c" v-model="model.mina_cantera" value="mina" checked/>
									<div class="mas box">
										<span>Mina</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_m_c" v-model="model.mina_cantera" value="cantera"/>
									<div class="modficacion box">
										<span>Cantera</span>
									</div>
								</label>
							</div>
							<hr>
							<div class="row">
								<div class="col">
								  	<label>Número de Expediente (DATO ÚNICO)</label>
									<input type="text" class="form-control" name="usuario_sistema" id="usuario_sistema"  v-model="model.numero_expediente" maxlength="20">
									<p v-show="model.mostrar_info_cinco"><small class="text-muted">Es el número de expediente con el cual se ha tramitado el expediente.</small></p>
								</div>
								<div class="col">
								  	<label>Distrito Minero</label>
									<input type="text" class="form-control" name="distrito_minero" id="distrito_minero"  v-model="model.distrito_minero" maxlength="20">
									<p v-show="model.mostrar_info_cinco"><small class="text-muted">Es el distrito minero asignado en el expediente con el cual se ha tramitado el expediente.</small></p>
								</div>
								<div class="col" v-if="model.categoria_m_c == 'tercera'">
									<label>Descripción (3° categoria)</label>
									<textarea class="form-control" name="descripcion_mina" id="descripcion_mina"  v-model="model.descripcion_mina"></textarea>
									<p v-show="model.mostrar_info_cinco"><small class="text-muted">Es la descripción de la mina que se la ha asignado en el expediente con el cual se ha tramitado el expediente.</small></p>

								</div>
								<div class="col" v-else>
								  	<label>Nombre de mina (1° y 2°)</label>
									<input type="text" class="form-control" name="nombre_mina" id="nombre_mina"  v-model="model.nombre_mina" maxlength="20">
									<p v-show="model.mostrar_info_cinco"><small class="text-muted">Es el nombre que se la ha sido asignado a la mina.</small></p>
								</div>
							</div>
							<br>
							<div class="row" v-if="model.categoria_m_c == 'tercera'">
								<div class="col">
									<label class="input-group-text" for="inscripcion_dgr">Plano Inmueble (3° categoria) (*) (*.pdf)</label>
	  								<input type="file" multiple="multiple" class="form-control" id="plano_inmueble" name="plano_inmueble" v-model="model.plano_inmueble" v-on:change="enviar_plano">
	  								<p v-show="model.mostrar_info_cinco"><small class="text-muted">Es el plano del inmuebleque actualmente se está registrando.</small></p>
	  							</div>
									<!-- <input type="file" multiple="multiple" name="File1" id="File1" accept="image/*" v-model="model.plano_inmueble" v-on:change="enviar_inscripcion"/> -->
								<div v-show="model.tiene_plano_inmueble != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_plano_inmueble>
								</div>
							</div>
							<br>
							<hr>
							<br>
							<h4>Selección la categoria</h4>
							<div class="middle_mina_cat">
								<label>
									<input type="radio" name="radio_categoria" v-model="model.categoria_m_c" value="primera" checked  v-on:change="cambio_categoria"/>
									<div class="laboral box">
										<span>1°</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_categoria"  v-model="model.categoria_m_c" value="segunda"  v-on:change="cambio_categoria"/>
									<div class="personal box">
										<span>2°</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_categoria" v-model="model.categoria_m_c" value="tercera" v-on:change="cambio_categoria"/>
									<div class="floppy box">
										<span>3°</span>
									</div>
								</label>
							</div>
							<hr>
							<br>
							<div class="row">
								<div class="col-12 col-md-8"><h3>Minerales</h3></div>
								<div class="col-6 col-md-4"><button class="btn btn-outline-success" @click="agregar_mineral()"><i class="ti-plus"></i> Agregar Mineral</button></div>
							</div>
							<div class="row">
								<ul class="list" style="list-style: none;">
									<li v-for="(mineral, index) in minerales">
										<br>
										<div class="row">
											<div class="col-1">@{{index+1}}</div>
											<div class="col-3">
												<label class="typo__label">Mineral Explotado</label>
												<multiselect 
													v-model="mineral.id_mineral" 
													:options="opcionesmineraluno" 
													:multiple="false" 
													:close-on-select="true" 
													:clear-on-select="false" 
													:hide-selected="false" 
													:preserve-search="true" 
													placeholder="Seleccion Mineral" 
													:preselect-first="false"
													id="minerales_id"
													@select="onSelectnuevo(index)"
												>
												</multiselect>
											</div>
											<!-- <div class="col-3">
												<span>Variedad: </span>
													<multiselect 
													v-model="mineral.id_varieadad" 
													:options="opcionesdevariedad" 
													:multiple="false" 
													:close-on-select="true" 
													:clear-on-select="false" 
													:hide-selected="false" 
													:preserve-search="true" 
													placeholder="Seleccion de material Variedad" 
													:preselect-first="false"
													id="id_varieadad"
													@select="onSelect"
												>
												</multiselect>
											</div> -->
											<div class="col-3">
												<span>Forma de presentación natural del mineral (no usar abreviaturas):</span> <textarea class="form-control" name="observacion_miniral" v-model="mineral.observacion"></textarea>
											</div>
											<div class="col">
												<span></span> <button type="button" class="btn btn-outline-danger" @click="eliminar_mineral(index)"><i class="ti-trash"></i> Eliminar</button>
											</div>
											<br>
										</div>
										<hr><br>
									</li>
								</ul>
							</div>
								<!-- <pre class="language-json"><code>@{{variedad_material }}  ------ @{{mineral_uno }}</code></pre> -->
						</div>
					</tab-content>
					<!-- Tab N° 6 Datos Minas 2 -->
					<tab-content title="Datos Mina 2" icon="ti-location-pin">
						<div class="panel-body">
							<br>
							<div class="row">
							    <div class="d-grid gap-2 col-4 mx-auto">
									<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_seis = ! model.mostrar_info_seis">
										<span v-show="model.mostrar_info_seis">Ocultar Info</span>
										<span v-show="!model.mostrar_info_seis">Mostrar  Info</span>
									</button>
							    </div>
							    <div class="d-grid gap-2 col-4 mx-auto">
									<button class="btn btn-outline-primary" @click="guardar_avances_cinco" id="guardar_paso5">Guardar Avances</button>
							    </div>
							</div>
							<transition name="custom-classes-transition" enter-active-class="animated fadeInDownBig" leave-active-class="animated bounceOut" >
								<div class="row" v-show="model.mostrar_info_seis">
									<div class="col-12 col-md-6">
										<img src="{{url('formulario_alta/imagenes/datos-mina.svg')}}">
									</div>
									<div class="col-6 col-md-6">
										<h2> Paso 6: Datos del yacimiento 2</h2>
										<p>En esta página, usted debrá ingresar más datos referidos a su yacimiento, es la continuación de la página anterior.</p>
										<p><strong>Datos requeridos:</strong>
											<ul>
												<li> * Caracter que invoca</li>
												<li> * Resolución Concesión Minera (Para 1° y 2° Categoría)</li>
												<li> * Constancia de Pago de Canon</li>
												<li> * IIA</li>
												<li> * DIA</li>
												<li> * Acciones a Desarrollar</li>
												<li> * Actividad</li>
												<li> * Fecha Alta DIA</li>
												<li> * Fecha Vebcimiento DIA</li>
											</ul>
										</p>
										<br>
										<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
									</div>
								</div>
							</transition>
							<br>
							<!-- <div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										
										<div class="form-group form-check" v-for="item in Items" v-bind:key="item.id">
								            <label class="form-check-label" :for="item.id">@{{item.name}}</label>
								            <input type="checkbox"  v-model="model.relacion_mina" :id="item.name" :value="item.name">
								        </div>
								        <div class="form-group">
								                @{{model.relacion_mina}}
								        </div>
								    </div>
								</div>
							</div> -->
							<br>
							<h4>Caracter que invoca:</h4>
							<div class="row">
									<div class="col-2">
										<h4>Usted es el dueño?</h4>
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-4">
												<span> <font color="red">  No soy Dueño </font></span>
											</div>
											<div class="col-2">
												<label class="switch">
													<input type="checkbox" v-model="model.owner">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-4">
												<span ><font color="green"> Si, soy dueño   </font></span>
											</div>
										</div>
									</div>
							</div>
							<br>
							<br>
							<div class="row">
									<div class="col-2">
										<h4>Posee Arrendatario?</h4>
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-4">
												<span> <font color="red">  No posee Arrendatario</font></span>
											</div>
											<div class="col-2">
												<label class="switch">
													<input type="checkbox" v-model="model.arrendatario">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-4">
												<span ><font color="green"> Si posee Arrendatario </font></span>
											</div>
										</div>
									</div>
							</div>
							<br>
							<br>
							<div class="row">
									<div class="col-2">
										<h4>Posee Concesionario?</h4>
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-4">
												<span> <font color="red"> No posee Concecionario </font></span>
											</div>
											<div class="col-2">
												<label class="switch">
													<input type="checkbox" v-model="model.concesionario">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-4">
												<span ><font color="green">Si posee Concecionario </font></span>
											</div>
										</div>
									</div>
							</div>
							<br>
							<br>
							<div class="row">
									<div class="col-2">
										<h4>Otros?</h4>
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-4">
												<span> <font color="red">  No posee Otros </font></span>
											</div>
											<div class="col-2">
												<label class="switch">
													<input type="checkbox" v-model="model.otros">
													<span class="slider round"></span>
												</label>
											</div>
											<div class="col-4">
												<span><font color="green">Si posee Otros </font></span>
											</div>
										</div>
									</div>
							</div>
							<br>
							<div class="row" v-if="model.categoria_m_c == 'tercera'">
								<div class="col" >
									<label>Titulo - Contrato - Poseción Veinteañal (Todo en un solo archivo para 3° Categoría)</label>
									<input type="file" class="form-control" multiple="multiple" name="contrato" id="contrato" v-model="model.contrato" v-on:change="enviar_contrato"/>
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es el documento donde se exhibe el título de la . El archivo debe estar en formato PDF</small></p>
								</div>
								<div v-show="model.tiene_contrato != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_contrato>
								</div>

							<hr>
							</div>
							<div class="row" v-if="model.categoria_m_c != 'tercera'">
								<div class="col">
									<label>Resolución Concesión Minera (Para 1° y 2° Categoría)</label>
									<input type="file" class="form-control" multiple="multiple" name="concesion" id="concesion"  v-model="model.concesion" v-on:change="enviar_concesion" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es el documento donde se exhibe la Resolución de concesión Minera. Solo para categoria 1° y 2°. El archivo debe estar en formato PDF.</small></p>
								</div>
								<div v-show="model.tiene_concesion != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_concesion>
								</div>

							<hr>
							</div>
							<div class="row">
								<div class="col">
									<label>Constancia de Pago de Canon</label>
									<input type="file" class="form-control" multiple="multiple" name="canon" id="canon" v-model="model.canon" v-on:change="enviar_canon" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es el documento donde se exhibe la Constancia de Pago de Canon. Para todas la categorias. El archivo debe estar en formato PDF.</small></p>
								</div>
								<div v-show="model.tiene_canon != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_canon>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col">
									<label>IIA</label>
									<input type="file" class="form-control" multiple="multiple" name="iia" id="iia"  v-model="model.iia" v-on:change="enviar_iia" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es el documento donde se exhibe la IIA. Para todas la categorias. El archivo debe estar en formato PDF.</small></p>
								</div>
								<div v-show="model.tiene_iia != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_iia>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-12 col-md-6">
									<label>DIA</label>
									<input type="file" class="form-control" multiple="multiple" name="dia" id="dia"  v-model="model.dia" v-on:change="enviar_dia" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es el documento donde se exhibe la DIA. Para todas la categorias. El archivo debe estar en formato PDF.</small></p>
								</div>
								<div v-show="model.tiene_dia != ''" class="form-floating col-sm" >
									<embed style="width: 100%; height:100%; display: block; padding-right: 15px;" v-bind:src=model.tiene_dia>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-12 col-md-6">
									<label>Acciones a Desarrollar</label>
									<input type="text" class="form-control" name="acciones_a_desarrollar" id="acciones_a_desarrollar" v-model="model.acciones" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Se deben declarar todas las acciones que se llevarán a cabo en el yacimiento.</small></p>
								</div>
								<div class="col-12 col-md-6">
									<label>Actividad</label>
									<input type="text" class="form-control" name="actividad_a_desarrollar" id="actividad_a_desarrollar" v-model="model.actividades" />
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Se deben declarar todas las actividades que se llevarán a cabo en el yacimiento.</small></p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<label>Fecha Alta DIA</label>
									<div class="input-group date" data-provide="datepicker">
										<input type="date" class="form-control" placeholder="Select Date"  v-model="model.fecha_incio"/>
									</div>
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es la fecha en la cual el DIA comienza o comenzó a tener de ser válido.</small></p>
								</div>
								<div class="col-md-6">
									<label>Fecha Vebcimiento DIA</label>
									<div class="input-group date" data-provide="datepicker">
										<input type="date" class="form-control" placeholder="Select Date" v-model="model.fecha_fin" />
									</div>
									<p v-show="model.mostrar_info_seis"><small class="text-muted">Es la fecha en la cual el DIA dejará de ser válido.</small></p>
								</div>
							</div>
						</div>
					</tab-content>
					<!-- Tab N° 7 Localidad Mina -->
					<tab-content title="Ubicación Mina" icon="ti-location-pin">
						<div class="panel-body">
							<br>
							<div class="row">
							    <div class="d-grid gap-2 col-4 mx-auto">
									<button type="button" class="btn btn-outline-info" @click="model.mostrar_info_siete = ! model.mostrar_info_siete">
										<span v-show="model.mostrar_info_siete">Ocultar Info</span>
										<span v-show="!model.mostrar_info_siete">Mostrar  Info</span>
									</button>
							    </div>
							    <div class="d-grid gap-2 col-4 mx-auto">
									<button class="btn btn-outline-primary" @click="guardar_avances_seis" id="guardar_paso6">Guardar Avances</button>
							    </div>
							</div>
							<transition name="custom-classes-transition" enter-active-class="animated fadeInDownBig" leave-active-class="animated bounceOut" >
								<div class="row" v-show="model.mostrar_info_siete">
									<div class="col-12 col-md-6">
										<img src="{{url('formulario_alta/imagenes/mapa-mina.svg')}}">
									</div>
									<div class="col-6 col-md-6">
										<h2> Paso 7: Datos de la localización del yacimiento</h2>
										<p>En esta página, usted debrá ingresar más datos referidos a la localización del yacimiento declarado.</p>
										<p><strong>Datos requeridos:</strong>
											<ul>
												<li> * País</li>
												<li> * Provincia</li>
												<li> * Departamento</li>
												<li> * Localidad</li>
												<li> * Coordenada Longitud</li>
												<li> * Coordenada Latitud</li>
											</ul>
										</p>
										<br>
										<p> Ante cualquier duda, te podes ayudar, no dudes en comunicarte.</p>
									</div>
								</div>
							</transition>
							<br>
							<div class="row">
								<div>
									<label for="pais_mina">País:</label>
									<multiselect 
										v-model="model.domicilio_mina_pais" 
										:options="opcionespaises_mina" 
										:multiple="false" 
										:close-on-select="true" 
										:clear-on-select="false" 
										:hide-selected="false" 
										:preserve-search="true" 
										placeholder="Seleccione el Pais" 
										:preselect-first="false"
										id="pais_mina"
										@input="cambio_pais_mina"
									>
									</multiselect>
								</div>
							</div>							
							<br>
							<div class="row">
								<div>
									<label for="provincia_mina">Provincia:</label>
									<multiselect 
										v-model="model.domicilio_mina_provincia" 
										:options="opcionesprovincias_mina" 
										:multiple="false" 
										:close-on-select="true" 
										:clear-on-select="false" 
										:hide-selected="false" 
										:preserve-search="true" 
										placeholder="Seleccione la Provincia" 
										:preselect-first="false"
										id="provincia_mina"
										@input="cambio_provincia_mina"
									>
									</multiselect>
								</div>
							</div>
							<br>
							<div class="row">
								<div>
									<label for="departamento_mina">Departamento:</label>
									<multiselect 
										v-model="model.domicilio_mina_departamento" 
										:options="opcionesdepartamento_mina" 
										:multiple="false" 
										:close-on-select="true" 
										:clear-on-select="false" 
										:hide-selected="false" 
										:preserve-search="true" 
										placeholder="Seleccione el Departamento" 
										:preselect-first="false"
										id="departamento_mina"
										@input="cambio_departamento_mina"
									>
									</multiselect>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-floating col-sm">
									  <input type="text" class="form-control" id="localidad_mina" placeholder="Localidad de la Mina o Cantera" v-model="model.domicilio_mina_localidad">
									  <label for="localidad_mina">Localidad</label>
									  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es la localidad donde se encuentra la mina o cantera declarada.</small></p>
								</div>
							</div>
							<br>
							<div class="row">
								<label for="departamento_mina">Tipo de Sistema de Coordenadas:</label>
								<multiselect 
									v-model="model.tipo_coordenada"
									:options="opcionescoordenadas"
									:multiple="false" 
									:close-on-select="true" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccione el Departamento" 
									:preselect-first="false"
									id="tipo_coordenada"
									@input="cambio_tipo_coordenadas"
								>
								</multiselect>
							</div>
							<br>
							<div class="row" v-show="model.tipo_coordenada == 'Gauss Kruger Posgar 94' ">
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_long" placeholder="Coordenada Longitud" v-model="model.domicilio_mina_cor_long">
								  <label for="mina_cor_long">Coordenada Longitud (Gauss Kruger Posgar 94)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la longitud expesada en las unidades Gauss Kruger Posgar 94.</small></p>
								</div>
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_lat" placeholder="Otra Locación" v-model="model.domicilio_mina_cor_lat">
								  <label for="mina_cor_lat">Coordenada Latitud (Gauss Kruger Posgar 94)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la latitud expesada en las unidades Gauss Kruger Posgar 94.</small></p>
								</div>
							</div>
							<div class="row"  v-show="model.tipo_coordenada == 'Gauss Kruger Posgar 07' ">
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_long" placeholder="Coordenada Longitud" v-model="model.domicilio_mina_cor_long">
								  <label for="mina_cor_long">Coordenada Longitud (Gauss Kruger Posgar 07 - Oficial)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la longitud expesada en las unidades Gauss Kruger Posgar 07.</small></p>
								</div>
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_lat" placeholder="Otra Locación" v-model="model.domicilio_mina_cor_lat">
								  <label for="mina_cor_lat">Coordenada Latitud (Gauss Kruger Posgar 07 - Oficial)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la latitud expesada en las unidades Gauss Kruger Posgar 07.</small></p>
								</div>
							</div>
							<div class="row"  v-show="model.tipo_coordenada == 'Geográficas' ">
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_long" placeholder="Coordenada Longitud" v-model="model.domicilio_mina_cor_long">
								  <label for="mina_cor_long">Coordenada Longitud (Coordenadas Geográficas)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la longitud expesada en las unidades Geográficas.</small></p>
								</div>
								<div class="form-floating col-sm">
								  <input type="text" class="form-control" id="mina_cor_lat" placeholder="Otra Locación" v-model="model.domicilio_mina_cor_lat">
								  <label for="mina_cor_lat">Coordenada Latitud (Coordenadas Geográficas)</label>
								  <p v-show="model.mostrar_info_siete"><small class="text-muted">Es el valor correspondiente a la latitud expesada en las unidades Geográficas.</small></p>
								</div>
							</div>
							<br>
							<br>
						</div>
					</tab-content>
					<!-- Tab N° 8 Donde Presentar -->
					<tab-content title="Donde Presentar" icon="ti-location-pin">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5">
									</div>
									<div class="col-md-6">
										<h3>Pasos a seguir</h3>
									</div>
								</div>
							</div>
							<br>
								<p><h4>1 <i class="ti-alert"></i> Revisar los datos ingresados: 
									<button type="button" class="btn btn-warning" @mouseover="active = true" @mouseleave="active = false" >
										<i class="ti-eye"></i> 
									</button>
									<transition
										name="custom-classes-transition"
										enter-active-class="animated flipInX"
										leave-active-class="animated flipOutX"
									>
									<div v-show="active">
										<div class="panel-body">
											<span><font color="orange">Tramite:</font> Formulario @{{formulario_seleccionado}}</span>
											<span><font color="orange">Email verficado:</font> @{{email_confirmado}}</span>
											<p>Datos personales</p>
											<span> <font color="green">Razon Social:</font>  @{{model.lastName}}  <font color="green">Email:</font> @{{model.email}}</span>
											<span><font color="green">Cuit:</font> @{{model.cuit}}  <font color="green">tipo_sociedad:</font> @{{model.tipo_sociedad}} <font color="green">Direccion:</font> @{{model.streetName}}</span>
											<hr>
											<p>Datos Domicilio Legal</p>
											<span> <font color="green">Calle:</font>  @{{model.domicilio_legal_calle}}  <font color="green">Número:</font> @{{model.domicilio_legal_calle_numero}}</span>
											<span><font color="green">Telefono:</font> @{{model.domicilio_legal_telefono}}  <font color="green">País:</font> @{{model.domicilio_legal_pais}} <font color="green">Provincia:</font> @{{model.domicilio_legal_provincia}}</span>
											<span><font color="green">Departamento:</font> @{{model.domicilio_legal_departamento}}  <font color="green">Localidad:</font> @{{model.domicilio_legal_localidad}} <font color="green">Código Postal:</font> @{{model.domicilio_legal_cp}}</span><font color="green">Otro:</font> @{{model.domicilio_legal_otro}}</span>
											<hr>
											<p>Datos Domicilio Administrativo</p>
											<span> <font color="green">Calle:</font>  @{{model.domicilio_administrativo_calle}}  <font color="green">Número:</font> @{{model.domicilio_administrativo_calle_numero}}</span>
											<span><font color="green">Telefono:</font> @{{model.domicilio_administrativo_telefono}}  <font color="green">País:</font> @{{model.domicilio_administrativo_pais}} <font color="green">Provincia:</font> @{{model.domicilio_administrativo_provincia}}</span>
											<span><font color="green">Departamento:</font> @{{model.domicilio_administrativo_departamento}}  <font color="green">Localidad:</font> @{{model.domicilio_administrativo_localidad}} <font color="green">Código Postal:</font> @{{model.domicilio_administrativo_cp}}</span><font color="green">Otro:</font> @{{model.domicilio_administrativo_otro}}</span>
											<hr>
										</div>
									</div>
									</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p><h4>2 <i class="ti-download"></i> Descargar el formulario, haciendo click aca:</h4>
									<button class="btn btn-primary" v-on:click="descargar_formulario" ><i class="ti-download"></i> Descargar</button>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4>3 <i class="ti-printer"></i> Abrir el archivo recien descargado ( @{{id_recien_creado}} ) e imprimirlo en hoja tamaño a4</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									
									
									<h4>
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante
									</h4>
									
									
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4>
									5 <i class="ti-map"></i>  Presentar el formulario en la oficina "Mesa de Entrada" del Ministerio de Minería de San Juan (5º piso, nucleo 5, Centro Civico - Telefono: 430-1111)
									</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4 v-if="this.formulario_seleccionado == 'correo'">
									6 <i class="ti-headphone-alt"></i>  Esperar a ser contactado por la direccion, o bien llamar: 430-6565 o 430-7471
									</h4>
									
								</p>
								<hr>
						</div>
					</tab-content>
				</form-wizard>
			</div>
		</div>
		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<script type="text/javascript" src="formulario_alta/vue.min.js"></script>
		<script type="text/javascript" src="formulario_alta/vue-form-wizard.js"></script>
		<script type="text/javascript" src="formulario_alta/vfg.js"></script>
		<script type="text/javascript" src="formulario_alta/vue-multiselect.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				 $('#myModal').modal('toggle')
				// Instance the tour
			});
		</script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script type="text/javascript">

			Vue.use(VueFormWizard)
			Vue.use(VueFormGenerator)
			Vue.use(axios)


			Vue.component("multiselect", VueMultiselect.default);


			const Swal = SweetAlert;

			var app = new Vue({
			 el: '#app',
				data:{
					seleccion_so_130_validacion: '',
					error_seleccion_so_130_validacion:'',
					hardware_mostrar_alerta_130_validacion: false,
					error_hardware_130_validacion:'',
					caracteres_restantes_aclaracion_finalidad:150,

					myOptions: {
						layout: {
							color: 'white',
							backgroundColor: 'lightgray',
							selectedColor: 'white',
							selectedBackgroundColor: 'green',
							borderColor: 'black',
							fontFamily: 'Arial',
							fontWeight: 'normal',
							fontWeightSelected: 'bold',
							squareCorners: false,
							noBorder: false
						},
						size: {
							fontSize: 14,
							height: 34,
							padding: 7,
							width: 100
						},
						items: {
							delay: .4,
							preSelected: 'unknown',
							disabled: false,
							labels: [
								{name: 'Off', color: 'white', backgroundColor: 'red'}, 
								{name: 'On', color: 'white', backgroundColor: 'green'}
							]
						}
					},
					opcionespaises_legal: [
						'Argentina'
					],
					opcionesprovincias_legal: [
						'San Juan',
						'Mendoza',
						'San Luis'
					],
					opcionesdepartamento_legal: [
						'Jachal',
						'Capital',
						'Chimbas'
					],
					opcionespaises_administrativo: [
						'Argentina'
					],
					opcionesprovincias_administrativo: [
						'San Juan',
						'Mendoza',
						'San Luis'
					],
					opcionesdepartamento_administrativo: [
						'Jachal',
						'Capital',
						'Chimbas'
					],
					opcionespaises_mina: [
						'Argentina'
					],
					opcionesprovincias_mina: [
						'San Juan',
						'Mendoza',
						'San Luis'
					],
					opcionesdepartamento_mina: [
						'Jachal',
						'Capital',
						'Chimbas'
					],
					
					opcionescoordenadas: [
						'Gauss Kruger Posgar 94',
						'Gauss Kruger Posgar 07',
						'Geográficas'
					],
					mineral_uno: '',
					opcionesmineraluno: [
						'Oro' ,
						'Plata' ,
						'Cobre' ,
						'Hierro',
						'Cal',
						'Ripio',
						'Platino',
						'Diamante'
					],
					multiple: true,
					show: false,
					variedad_material: '',
					opcionesdevariedad: [
						'variedad 1',
						'variedad 2',
						'variedad 3',
						'variedad 4',
						'variedad 5'
					],
					active: false,
					formulario_seleccionado: '',

					//FORMULARIO 130
					so_seleccionado: '',
					otro_sistema_operativo_aclaracion:'',
					ram_solicitada : '2',
					aclaracion_ram: '',
					disco_solicitada : '15',
					aclaracion_disco: '',
					licencia_solicitada : '',
					nombre_servidor_solicitada : '',
					observaciones_solicitada : '',
					tiene_aplicaciones: false,
					nombre_aplicaciones: '',
					descripcion_aplicaciones: '',
					tiene_server_web: false,
					nombre_server_web: '',
					descripcion_server_web: '',
					tiene_base_de_datos: false,
					nombre_base_de_datos: '',
					descripcion_base_de_datos: '',
					tiene_servidor_archivos: false,
					nombre_servidor_archivos: '',
					descripcion_servidor_archivos: '',
					tiene_aplicaciones_otro: false,
					nombre_aplicaciones_otro: '',
					descripcion_aplicaciones_otro: '',
					puertos:  [
								{puerto: '80', servicio: "http" , observacion:''},
								{puerto: '443', servicio: "https" , observacion:''}
							],
					
					minerales: [
								{id_mineral: '1', id_varieadad: '1' , observacion:'esta es la obs 1'},
								{id_mineral: '2', id_varieadad: '2' , observacion:'esta es la obs 2'}
							],
					servidor_temporal: false,
					servidor_temporal_fecha_fin: '',

					Items: [
		                {
		                    name: 'Dueño'
		                }, 
		                {
		                    name: 'Arrendatario'
		                }, 
		                {
		                    name: 'Concecionario'
		                }, 
		                {
		                    name: 'Otros'
		                }
		            ],            
		            user: {
		                fruitCollection: []
		            },

					paso_130_4: false,
					paso_130_5: false,
					mostrar_licencia_so: false,
					//FIN FORMULARIO 130
					show: true,
					interval:false,
					displayNumber: 2,
					id_recien_creado: 0,
					
					email_confirmado: false,
					model:{
						//tipo de formulario
						tipo_formulario :  false,
						sistema :  '',
						primera_vez: 'si',
						//Datos personales
						firstName:'{{$nombre}}',
						lastName:'{{$apellido}}',
						email:'{{$email}}',
						cuit:'{{$cuit}}',
						phone:'',
						tipo_sociedad:'Sociedad Secreta',
						streetName:'{{$domicilio}}',
						inscricion_dgr: '',
						tiene_inscricion_dgr: '',
						constancia_sociedad: '',
						tiene_constancia_sociedad: '',
						departamento: '',
						correo_enviado_si: false,
						email_confirmacion: '{{$email}}',
						
						

						num_productor: '123123',
						mostrar_info_dos: false,
						mostrar_info_tres: false,
						mostrar_info_cuatro: false,
						mostrar_info_cinco: false,
						mostrar_info_seis: false,
						mostrar_info_siete: false,

						//FIN datos personales


						//Domicilio legal
						domicilio_legal_calle: '{{$domicilio}}',
						domicilio_legal_calle_numero: '2313',
						domicilio_legal_telefono: '{{$telefono}}',
						domicilio_legal_pais:'Argentina',
						domicilio_legal_provincia:1,
						domicilio_legal_departamento:3,
						domicilio_legal_localidad: 'San Juan',
						domicilio_legal_cp:'5400',
						domicilio_legal_otro:'La Provincia',

						//Domicilio Administrativo
						domicilio_administrativo_calle: '{{$domicilio}}',
						domicilio_administrativo_calle_numero: '2313 este',
						domicilio_administrativo_telefono: '{{$telefono}}',
						domicilio_administrativo_pais:'Argentina',
						domicilio_administrativo_provincia:'San Juan',
						domicilio_administrativo_departamento:'Sarmiento',
						domicilio_administrativo_localidad:'Trinidad',
						domicilio_administrativo_cp:'5563',
						domicilio_administrativo_otro:'La Prov Administrativo',
						//Fin Domicilio Administrativo


						//datos de mina 
						nombre_mina: '',
						descripcion_mina: '',
						distrito_minero: '',
						mina_cantera: '',
						categoria_m_c: '',
						numero_expediente: '',
						plano_inmueble: '',
						tiene_plano_inmueble: '',
						//Datos Mina 2
						relacion_mina: [],
						contrato: '',
						owner: false,
						arrendatario: false,
						concesionario: false,
						otros: false,
						tiene_contrato: '',
						concesion: '',
						tiene_concesion: '',
						tiene_canon: '',
						tiene_iia: '',
						tiene_dia: '',
						canon: '',
						iia: '',
						dia: '',
						acciones: '',
						actividades: '',
						fecha_incio: '',
						fecha_fin: '',


						recuperacion_exitosa: false,
						//

						//localidad de mina 
						domicilio_mina_pais:'Argentina',
						domicilio_mina_provincia:'San Juan',
						domicilio_mina_departamento:'Sarmiento',
						domicilio_mina_localidad:'Trinidad',
						domicilio_mina_cor_long:'5563',
						domicilio_mina_cor_lat:'La Prov Administrativo',
						tipo_coordenada: "Geográficas",

					},
					reinscripcion_data:{
						cuit_para_validar :  false,
					},
					formOptions: {
						validationErrorClass: "has-error",
						validationSuccessClass: "has-success",
						validateAfterChanged: true
					},
					zeroTabSchema:{
						fields:[
							
						]
					},
				},
				methods: {
					/*var fiel=app.$root.form_datos.fields.find(field => field.model === 'dp_provincia');
					fiel.values=[{id:"0", name:"example"}];*/
					deleteItem: function() {
				      Swal.fire({
				        title: 'Error!',
				        text: 'Do you want to continue',
				        icon: 'error',
				        confirmButtonText: 'Cool'
				      });
				    },
					mostrar_aclaracion_ram: function(){
						if(parseInt(this.ram_solicitada)  > 4)
							return true;
						else return false;
					},
					mostrar_aclaracion_disco: function(){
						if(parseInt(this.disco_solicitada)  > 50)
							return true;
						else return false;
					},
					restar_caracteres: function(caso){
						if(caso == 3)
						{
							this.caracteres_restantes_aclaracion_finalidad = 150 - this.observaciones_solicitada.length;
						}
						else
						{
							this.caracteres_restantes_aclaracion_finalidad = 150 +1;
						} 
					},
					cambiar_finalidad: function(){

						
						i
					},
					onSelect (option, id, index) {
						console.log(option, id, index)
					},
					onSelectnuevo (option, id, index) {
						console.log(option, id, index)
					},
					cambio_pais_legal (value) {
						this.model.domicilio_legal_provincia = '';
						this.model.domicilio_legal_departamento = '';
						if(value === "Argentina") // argentina
						{
							this.opcionesprovincias_legal=[
								'Buenos Aires',
								'Buenos Aires-GBA',
								'Capital Federal',
								'Catamarca',
								'Chaco',
								'Chubut',
								'Cordoba',
								'Corrientes',
								'Entre Rios',
								'Formosa',
								'Jujuy',
								'La Pampa',
								'La Rioja',
								'Mendoza',
								'Misiones',
								'Neuquen',
								'Rio Negro',
								'Salta',
								'San Juan',
								'San Luis',
								'Santa Cruz',
								'Santa Fe',
								'Santiago del Estero',
								'Tierra del Fuego',
								'Tucuman',
							];
						}
						if(value === "Bolivia") // bolivia
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de bolivia',
								'Provincia 2 de bolivia',
								'Provincia 3 de bolivia'
								];
						}
						if(value === "Brazil")// brazil
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de brazil' ,
								'Provincia 2 de brazil' ,
								'Provincia 3 de brazil'
							];
						}
						if(value === "Chile") // chile
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de chile' ,
								'Provincia 2 de chile' ,
								'Provincia 3 de chile'
							];
						}
						if(value === "Paraguay") // paraguay
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de paraguay',
								'Provincia 2 de paraguay',
								'Provincia 3 de paraguay'
							];
						}
						if(value=== "Peru") // peru
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de peru',
								'Provincia 2 de peru',
								'Provincia 3 de peru'
							];
						}
						if(value=== "Uruguay") //uruguay
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de uruguay',
								'Provincia 2 de uruguay',
								'Provincia 3 de uruguay'
							];
						}
						if(value === "Venezuela") // venezuela
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de venezuela',
								'Provincia 2 de venezuela',
								'Provincia 3 de venezuela'
							];
						}
						if(value === "Otro")
						{
							this.opcionesprovincias_legal=[
								'Otra Provincia'
								];
						}
					},
					cambio_provincia_legal (value) {
						console.log("El provincia es:\n");
						console.log(this.model.domicilio_legal_provincia);
						this.model.domicilio_legal_departamento = '';

						if(value === "San Juan") // argentina
						{
							console.log("entre en san juan");
							this.opcionesdepartamento_legal=[
								'Capital',
								'Rawson',
								'Chimbas',
								'Rivadavia',
								'25 de Mayo',
								'Caucete',
								'Jachal'
							];
						}
						if(value === "Chaco") // bolivia
						{
							this.opcionesdepartamento_legal=[
								'Dpto 1 de Chaco',
								'Dpto 2 de Chaco',
								'Dpto 3 de Chaco',
								'Dpto 4 de Chaco'
							];
						}
						if(value === "Buenos Aires")// brazil
						{
							this.opcionesdepartamento_legal=[
								'Provincia Buenos Aires 1' ,
								'Provincia Buenos Aires 2' ,
								'Provincia Buenos Aires 3'
							];
						}
						if(value === "Buenos Aires-GBA") // chile
						{
							this.opcionesdepartamento_legal=[
								'Provincia Buenos Aires-GBA 1 de chile' ,
								'Provincia Buenos Aires-GBA 2 de chile' ,
								'Provincia Buenos Aires-GBA 3 de chile'
							];
						}
						if(value === "Capital Federal") // paraguay
						{
							this.opcionesdepartamento_legal=[
								'Provincia 1 de Capital Federal',
								'Provincia 2 de Capital Federal',
								'Provincia 3 de Capital Federal'
							];
						}
						if(value === "Catamarca") // peru
						{
							this.opcionesdepartamento_legal=[
								'Provincia 1 de Catamarca',
								'Provincia 2 de Catamarca',
								'Provincia 3 de Catamarca'
							];
						}
						if(value === "Chubut") //uruguay
						{
							this.opcionesdepartamento_legal=[
								'Provincia 1 de Chubut',
								'Provincia 2 de Chubut',
								'Provincia 3 de Chubut'
							];
						}
						if(value === "Cordoba") // venezuela
						{
							this.opcionesdepartamento_legal=[
								'Provincia 1 de Cordoba',
								'Provincia 2 de Cordoba',
								'Provincia 3 de Cordoba'
							];
						}
						
						if(value === "Otro")
						{
							this.opcionesdepartamento_legal=[
								'Otra Provincia'
								];
						}
					},
					cambio_departamento_legal (value) {
						console.log("El depto es:\n");
						console.log(this.model.domicilio_legal_departamento);
					},
					cambio_pais_administrativo (value) {
						this.model.domicilio_administrativo_provincia = '';
						this.model.domicilio_administrativo_departamento = '';
						if(value === "Argentina") // argentina
						{
							this.opcionesprovincias_administrativo=[
								'Buenos Aires',
								'Buenos Aires-GBA',
								'Capital Federal',
								'Catamarca',
								'Chaco',
								'Chubut',
								'Cordoba',
								'Corrientes',
								'Entre Rios',
								'Formosa',
								'Jujuy',
								'La Pampa',
								'La Rioja',
								'Mendoza',
								'Misiones',
								'Neuquen',
								'Rio Negro',
								'Salta',
								'San Juan',
								'San Luis',
								'Santa Cruz',
								'Santa Fe',
								'Santiago del Estero',
								'Tierra del Fuego',
								'Tucuman',
							];
						}
						if(value === "Bolivia") // bolivia
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de bolivia',
								'Provincia 2 de bolivia',
								'Provincia 3 de bolivia'
								];
						}
						if(value === "Brazil")// brazil
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de brazil' ,
								'Provincia 2 de brazil' ,
								'Provincia 3 de brazil'
							];
						}
						if(value === "Chile") // chile
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de chile' ,
								'Provincia 2 de chile' ,
								'Provincia 3 de chile'
							];
						}
						if(value === "Paraguay") // paraguay
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de paraguay',
								'Provincia 2 de paraguay',
								'Provincia 3 de paraguay'
							];
						}
						if(value=== "Peru") // peru
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de peru',
								'Provincia 2 de peru',
								'Provincia 3 de peru'
							];
						}
						if(value=== "Uruguay") //uruguay
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de uruguay',
								'Provincia 2 de uruguay',
								'Provincia 3 de uruguay'
							];
						}
						if(value === "Venezuela") // venezuela
						{
							this.opcionesprovincias_administrativo=[
								'Provincia 1 de venezuela',
								'Provincia 2 de venezuela',
								'Provincia 3 de venezuela'
							];
						}
						if(value === "Otro")
						{
							this.opcionesprovincias_administrativo=[
								'Otra Provincia'
								];
						}
					},
					cambio_provincia_administrativo (value) {
						console.log("El provincia es:\n");
						console.log(this.model.domicilio_administrativo_provincia);
						this.model.domicilio_administrativo_departamento = '';

						if(value === "San Juan") // argentina
						{
							console.log("entre en san juan");
							this.opcionesdepartamento_administrativo=[
								'Capital',
								'Rawson',
								'Chimbas',
								'Rivadavia',
								'25 de Mayo',
								'Caucete',
								'Jachal'
							];
						}
						if(value === "Chaco") // bolivia
						{
							this.opcionesdepartamento_administrativo=[
								'Dpto 1 de Chaco',
								'Dpto 2 de Chaco',
								'Dpto 3 de Chaco',
								'Dpto 4 de Chaco'
							];
						}
						if(value === "Buenos Aires")// brazil
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia Buenos Aires 1' ,
								'Provincia Buenos Aires 2' ,
								'Provincia Buenos Aires 3'
							];
						}
						if(value === "Buenos Aires-GBA") // chile
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia Buenos Aires-GBA 1 de chile' ,
								'Provincia Buenos Aires-GBA 2 de chile' ,
								'Provincia Buenos Aires-GBA 3 de chile'
							];
						}
						if(value === "Capital Federal") // paraguay
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Capital Federal',
								'Provincia 2 de Capital Federal',
								'Provincia 3 de Capital Federal'
							];
						}
						if(value === "Catamarca") // peru
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Catamarca',
								'Provincia 2 de Catamarca',
								'Provincia 3 de Catamarca'
							];
						}
						if(value === "Chubut") //uruguay
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Chubut',
								'Provincia 2 de Chubut',
								'Provincia 3 de Chubut'
							];
						}
						if(value === "Cordoba") // venezuela
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Cordoba',
								'Provincia 2 de Cordoba',
								'Provincia 3 de Cordoba'
							];
						}
						
						if(value === "Otro")
						{
							this.opcionesdepartamento_administrativo=[
								'Otra Provincia'
								];
						}
					},
					cambio_departamento_administrativo (value) {
						console.log("El depto es:\n");
						console.log(this.model.domicilio_administrativo_departamento);
					},
					enviar_inscripcion(event) {
						// `files` is always an array because the file input may be in multiple mode
						this.model.inscricion_dgr = event.target.files[0];
						const data = new FormData();
						// if(numero == 1)
						// {
							data.append('archivo', this.model.inscricion_dgr);
							data.append('nombre_archivo', 'inscripcion_dgr');

						// }
						// if(numero == 2)
						// {
							// data.append('archivo', this.model.constancia_sociedad);
							// data.append('nombre_archivo', 'constancia_sociedad');
						//}
						data.append('email', this.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									this.model.tiene_constancia_sociedad = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					enviar_constancia(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'constancia_sociedad');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_constancia_sociedad = dir;
					},
					enviar_plano(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'plano_inmueble');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_plano_inmueble = dir;
					},
					enviar_contrato(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'contrato');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_contrato = dir;
					},
					
					enviar_concesion(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'concesion');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_concesion = dir;
					},
					
					enviar_canon(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'canon');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_canon = dir;
					},
					
					enviar_iia(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'iia');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_iia = dir;
					},
					enviar_dia(event) {
						let self = this
						let tu_hermana = event.target.files[0];
						let dir = '';
						//self.model.constancia_sociedad = event.target.files[0];
						const data = new FormData();
						data.append('archivo', tu_hermana);
						data.append('nombre_archivo', 'dia');
						data.append('email', self.model.email);
						axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
						axios.post('{{url("recibiendo_pdf")}}',  data)
							.then(function (response) {
								//console.log(response.data);
								if(response.data === 'sin email')
								{
									Swal.fire({
										title: 'Error!',
										text: 'No se puede guardar el archivo, hasta que usted confirme su email. Por favor, hagalo.',
										icon: 'error',
										confirmButtonText: 'Entendido'
									});
								}
								else
								{
									Swal.fire({
										title: 'Guardado Exitoso!',
										text: 'Se ha guardado el archivo dentro de su formulario provisorio. Gracias',
										icon: 'success',
										confirmButtonText: 'Ok'
									});
									dir = 'http://localhost:8000/'+ response.data;
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							console.log(dir);
							this.model.tiene_dia = dir;
					},

					cambio_pais_mina (value) {
						this.model.domicilio_mina_provincia = '';
						this.model.domicilio_mina_departamento = '';
						if(value === "Argentina") // argentina
						{
							this.opcionesprovincias_mina=[
								'Buenos Aires',
								'Buenos Aires-GBA',
								'Capital Federal',
								'Catamarca',
								'Chaco',
								'Chubut',
								'Cordoba',
								'Corrientes',
								'Entre Rios',
								'Formosa',
								'Jujuy',
								'La Pampa',
								'La Rioja',
								'Mendoza',
								'Misiones',
								'Neuquen',
								'Rio Negro',
								'Salta',
								'San Juan',
								'San Luis',
								'Santa Cruz',
								'Santa Fe',
								'Santiago del Estero',
								'Tierra del Fuego',
								'Tucuman',
							];
						}
						if(value === "Bolivia") // bolivia
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de bolivia',
								'Provincia 2 de bolivia',
								'Provincia 3 de bolivia'
								];
						}
						if(value === "Brazil")// brazil
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de brazil' ,
								'Provincia 2 de brazil' ,
								'Provincia 3 de brazil'
							];
						}
						if(value === "Chile") // chile
						{
							this.opcionesprovincias_legal=[
								'Provincia 1 de chile' ,
								'Provincia 2 de chile' ,
								'Provincia 3 de chile'
							];
						}
						if(value === "Paraguay") // paraguay
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de paraguay',
								'Provincia 2 de paraguay',
								'Provincia 3 de paraguay'
							];
						}
						if(value=== "Peru") // peru
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de peru',
								'Provincia 2 de peru',
								'Provincia 3 de peru'
							];
						}
						if(value=== "Uruguay") //uruguay
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de uruguay',
								'Provincia 2 de uruguay',
								'Provincia 3 de uruguay'
							];
						}
						if(value === "Venezuela") // venezuela
						{
							this.opcionesprovincias_mina=[
								'Provincia 1 de venezuela',
								'Provincia 2 de venezuela',
								'Provincia 3 de venezuela'
							];
						}
						if(value === "Otro")
						{
							this.opcionesprovincias_mina=[
								'Otra Provincia'
								];
						}
					},
					cambio_provincia_mina (value) {
						console.log("El provincia es:\n");
						console.log(this.model.domicilio_administrativo_provincia);
						this.model.domicilio_administrativo_departamento = '';

						if(value === "San Juan") // argentina
						{
							console.log("entre en san juan");
							this.opcionesdepartamento_administrativo=[
								'Capital',
								'Rawson',
								'Chimbas',
								'Rivadavia',
								'25 de Mayo',
								'Caucete',
								'Jachal'
							];
						}
						if(value === "Chaco") // bolivia
						{
							this.opcionesdepartamento_administrativo=[
								'Dpto 1 de Chaco',
								'Dpto 2 de Chaco',
								'Dpto 3 de Chaco',
								'Dpto 4 de Chaco'
							];
						}
						if(value === "Buenos Aires")// brazil
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia Buenos Aires 1' ,
								'Provincia Buenos Aires 2' ,
								'Provincia Buenos Aires 3'
							];
						}
						if(value === "Buenos Aires-GBA") // chile
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia Buenos Aires-GBA 1 de chile' ,
								'Provincia Buenos Aires-GBA 2 de chile' ,
								'Provincia Buenos Aires-GBA 3 de chile'
							];
						}
						if(value === "Capital Federal") // paraguay
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Capital Federal',
								'Provincia 2 de Capital Federal',
								'Provincia 3 de Capital Federal'
							];
						}
						if(value === "Catamarca") // peru
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Catamarca',
								'Provincia 2 de Catamarca',
								'Provincia 3 de Catamarca'
							];
						}
						if(value === "Chubut") //uruguay
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Chubut',
								'Provincia 2 de Chubut',
								'Provincia 3 de Chubut'
							];
						}
						if(value === "Cordoba") // venezuela
						{
							this.opcionesdepartamento_administrativo=[
								'Provincia 1 de Cordoba',
								'Provincia 2 de Cordoba',
								'Provincia 3 de Cordoba'
							];
						}
						
						if(value === "Otro")
						{
							this.opcionesdepartamento_administrativo=[
								'Otra Provincia'
								];
						}
					},
					cambio_departamento_mina (value) {
						console.log("El depto es:\n");
						console.log(this.model.domicilio_administrativo_departamento);
					},
					cambio_tipo_coordenadas (value) {
						console.log("El depto es:\n");
						console.log(this.model.domicilio_administrativo_departamento);
					},

					
					agregar_puerto: function(){
						var puertos_aux = {puerto: '', servicio: "" , observacion:''};
						this.puertos.push( puertos_aux);
					},
					agregar_mineral: function(){
						var mineral_aux = {puerto: '', servicio: "" , observacion:''};
						this.minerales.push( mineral_aux);
					},
					eliminar_puerta: function(indice){
						this.puertos.splice(indice, 1);
					},
					eliminar_mineral: function(indice){
						this.minerales.splice(indice, 1);
					},
					clicked:function(){
						//alert("hola desde el click");
							let pdf = new jsPDF('p', 'px', 'a4')
							pdf.addHTML(this.$refs.userinfo, function() {
								 pdf.save('web.pdf')
							})


						// Landscape export, 2×4 inches
						var doc = new jsPDF({
						  orientation: 'landscape',
						  unit: 'in',
						  format: [4, 2]
						});
						doc.text('Hello world!', 1, 1)
						doc.save('two-by-four.pdf')
					},
					onComplete: function(){
						axios.post('{{url("formularios/avisar_formulario_completo")}}', {
							email: this.model.email,
						})
						.then(function (response) {
							console.log(response.data);
							if(response.data == 'todo bien')
							{
								Swal.fire({
									title: 'Gracias!',
									text: 'Muchas gracias por haber utilizado este servicio para inscribirse como Productor Minero. Le estaremos avisando cualquier novedad a su correo declarado. Saludos',
									icon: 'success',
									confirmButtonText: 'Entendido'
								});
							}
							else
							{
								Swal.fire({
									title: 'Email Incorrecto!',
									text: 'Disculpe no hemos podido guardar la información de su formulario proque no hemos encontrado su email. Por favor, reviselo. Gracias',
									icon: 'error',
									confirmButtonText: 'Entendido'
								});
							}
							/*setInterval(() => {
								this.preguntar_email_confirmacion();
							}, (2000 * 60));*/
							
						})
						.catch(function (error) {
							// handle error
							console.log(error);
						})
					},
					validatezeroTab: function(){
						return true;
					},
					validateFirstTab: function(){
						//alert("estoy por validar");
						let errores = '';
						//requierd
						if(this.model.lastName === null)
							errores += "La Razon Social no puede estar vacia.\n";
						if(this.model.cuit === null)
							errores += "El CUIT no puede estar vacia.\n";
						if(this.model.num_productor === null)
							errores += "El Numero de Productor no puede estar vacia.\n";
						if(this.model.tipo_sociedad === null)
							errores += "El tipo de Sociedad no puede estar vacia.\n";
						if(this.model.email === null)
							errores += "El email no puede estar vacia.\n";
						if(this.model.streetName === null)
							errores += "El domicilio no puede estar vacia.\n";
						if(this.model.inscricion_dgr === null)
							errores += "La Inscripcion a la dgr no puede estar vacia.\n";
						if(this.model.constancia_sociedad === null)
							errores += "La Constancia de Sociedad no puede estar vacia.\n";
						//tamaños
						if(this.model.lastName.length < 4  ||  this.model.lastName.length > 50)
							errores += "La Razon Social debe tener como mínimo 5 y máximo 50.\n";
						// if(this.model.cuit.length != 14)
						// 	errores += "El CUIT debe tener 12 caracteres.\n";
						if(this.model.num_productor.length <= 4)
							errores += "El Numero de Productor tener al menos 5 dígitos.\n";
						if(this.model.tipo_sociedad.length < 4  ||  this.model.tipo_sociedad.length > 50)
							errores += "El tipo de Sociedad no puede estar vacia.\n";
						if(this.model.email.length < 4  ||  this.model.email.length > 50)
							errores += "La Email debe tener como mínimo 5 y máximo 50.\n";
						if(this.model.streetName.length < 4  ||  this.model.streetName.length > 50)
							errores += "El domicilio debe tener como mínimo 5 y máximo 50.\n";
						if(errores == '')
							return true;
						else
						{
							alert ("Se encontraron los siguientes errores: \n"+errores);
							return false;
						}
					},
					validateSecondTab: function(){
						var mensaje = '';
						// if(this.model.relacion == '')
						// 	mensaje += " * Complete el tipo de relacion laboral \n";
						if(this.model.domicilio_legal_pais == '')
							mensaje +=" * Complete el pais donde trabaja \n";
						if(this.model.domicilio_legal_provincia == '')
							mensaje += " * Complete la provincia donde trabaja\n";
						if(mensaje != '')
						{
							alert(mensaje);
							return false;
						}
						//else return this.$refs.secondTabForm.validate();
						else return true;
					},
					validateAdministrativoTab: function(){
						var mensaje = '';
						// if(this.model.relacion == '')
						// 	mensaje += " * Complete el tipo de relacion laboral \n";
						if(this.model.domicilio_administrativo_pais == '')
							mensaje +=" * Complete el ministerio donde trabaja \n";
						if(this.model.domicilio_administrativo_calle == '')
							mensaje += " * Complete la secretaria donde trabaja\n";
						if(mensaje != '')
						{
							alert(mensaje);
							return false;
						}
						//else return this.$refs.AdminTabForm.validate();
						else return true;
					},
					validateDatosMinaUno: function(){
						return true;
					},
					
					cambio_categoria: function(){
						//alert("hola. cambio la categoria:" + this.model.categoria_m_c );
						if(this.model.categoria_m_c === 'primera')
						{
							this.opcionesmineraluno = [
									'Oro',
									'Plata',
									'Platino',
									'Mercurio',
									'Cobre',
									'Hierro',
									'Plomo',
									'Estaño',
									'Zinc',
									'Níquel',
									'Cobalto',
									'Bismuto',
									'Manganeso',
									'Antimonio',
									'Wolfram',
									'Aluminio',
									'Berilio',
									'Vanadio',
									'Cadmio',
									'Tantalio',
									'Molibdeno',
									'Litio',
									'Potasio',
									'Hulla',
									'Lignito',
									'Antracita',
									'Uranio',
									'Torio',
									'Hidrocarburos Sólidos',
									'Arsénico',
									'Cuarzo',
									'Feldespato',
									'Mica',
									'Fluorita',
									'Fosfatos Calizos',
									'Azufre',
									'Boratos',
									'Piedras Preciosas',
									'Vapores Endagenos'
								];
						}
						if(this.model.categoria_m_c === 'segunda')
						{
							this.opcionesmineraluno = [
								'Arenas Metalíferas',
								'Piedras Preciosas (en lechos de ríos)',
								'Aguas Corrientes',
								'Placeres',
								'"Desmontes, relevantes y escoriales"',
								'Salitres',
								'Salinas',
								'Turberas',
								'Metales no comprendidos en 1° Categ.',
								'Tierras Piritosas y Aluminosas',
								'Abrasivos',
								'Ocres',
								'Resinas',
								'Esteatitas',
								'Baritina',
								'Caparrosas',
								'Grafito',
								'CaolÃ­n',
								'Sales Alcalinas o Alcalino Terrosas',
								'Amianto',
								'Bentonita',
								'Zeolitas o Minerales Permutantes'
								];
						}
						if(this.model.categoria_m_c === 'tercera')
						{
							this.opcionesmineraluno = [
							'Piedras Calizas',
							'Calcáreas',
							'Margas',
							'Yeso',
							'Alabastro',
							'Mármoles',
							'Granitos',
							'Dolomita',
							'Pizarras',
							'Areniscas',
							'Cuarcitas',
							'Basaltos',
							'Arenas No Metalíferas',
							'Cascajo',
							'Canto Rodado',
							'Pedregullo',
							'Grava',
							'Conchilla',
							'Piedra Laja',
							'Ceniza Volcánica',
							'Perlita',
							'Piedra Pómez',
							'Piedra Afilar',
							'Puzzolanas',
							'Porfidos',
							'Tobas',
							'Tosca',
							'Serpentina',
							'Piedra Sapo',
							'Loes',
							'Arcillas Comunes'
								];
						}
					},
					prettyJSON: function(json) {
							if (json) {
								json = JSON.stringify(json, undefined, 4);
								json = json.replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>');
								return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
									var cls = 'number';
									if (/^"/.test(match)) {
										if (/:$/.test(match)) {
											cls = 'key';
										} else {
											cls = 'string';
										}
									} else if (/true|false/.test(match)) {
										cls = 'boolean';
									} else if (/null/.test(match)) {
										cls = 'null';
									}
									return '<span class="' + cls + '">' + match + '</span>';
								});
							}
					},
					guardar_avances_uno: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_uno")}}', {
								//comun
								razon_social: this.model.lastName,
								cuit: this.model.cuit,
								num_productor: this.model.num_productor,
								tipo_sociedad: this.model.tipo_sociedad,
								email: this.model.email,
								streetName: this.model.streetName,
								inscricion_dgr: this.model.inscricion_dgr,
								constancia_sociedad: this.model.constancia_sociedad
							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === 'mande un email de mentira')
								{
									Swal.fire({
										title: 'Cuidado!',
										text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
										icon: 'warning',
										confirmButtonText: 'Entendido'
									});
								}
								else{
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								//nueva pestaña de descarga
								/*var a = document.createElement("a");
								a.target = "_blank";
								a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
								a.click();*/
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					guardar_avances_dos: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_dos")}}', {
								domicilio_legal_calle: this.model.domicilio_legal_calle,
								domicilio_legal_calle_numero: this.model.domicilio_legal_calle_numero,
								domicilio_legal_telefono: this.model.domicilio_legal_telefono,
								domicilio_legal_pais: this.model.domicilio_legal_pais,
								domicilio_legal_provincia: this.model.domicilio_legal_provincia,
								domicilio_legal_departamento: this.model.domicilio_legal_departamento,
								domicilio_legal_localidad: this.model.domicilio_legal_localidad,
								domicilio_legal_cp: this.model.domicilio_legal_cp,
								domicilio_legal_otro: this.model.domicilio_legal_otro,
								email: this.model.email
							})
							.then(function (response) {
								console.log(response.data.toString());
								if( response.data  !== 'medio'){
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								else{
									if(response.data == "medio")
									{
										Swal.fire({
											title: 'Cuidado!',
											text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
											icon: 'warning',
											confirmButtonText: 'Entendido'
										});
									}
									else{
										Swal.fire({
											title: 'Error!',
											text: 'No se pudieron guardar los datos.',
											icon: 'error',
											confirmButtonText: 'Ok'
										});
									}
								}
									
								//nueva pestaña de descarga
								/*var a = document.createElement("a");
								a.target = "_blank";
								a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
								a.click();*/
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					guardar_avances_tres: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_tres")}}', {
								//comun
								domicilio_administrativo_calle: this.model.domicilio_administrativo_calle,
								domicilio_administrativo_calle_numero: this.model.domicilio_administrativo_calle_numero,
								domicilio_administrativo_telefono: this.model.domicilio_administrativo_telefono,
								domicilio_administrativo_pais: this.model.domicilio_administrativo_pais,
								domicilio_administrativo_provincia: this.model.domicilio_administrativo_provincia,
								domicilio_administrativo_departamento: this.model.domicilio_administrativo_departamento,
								domicilio_administrativo_localidad: this.model.domicilio_administrativo_localidad,
								domicilio_administrativo_cp: this.model.domicilio_administrativo_cp,
								domicilio_administrativo_otro: this.model.domicilio_administrativo_otro,
								email: this.model.email
							})
							.then(function (response) {
								if( parseInt(response.data) === parseInt(1) )
								{
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								// if(parseInt(response.data) === parseInt(2))
								// {
								// 	Swal.fire({
								// 		title: 'Cuidado!',
								// 		text: 'lo cree  no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
								// 		icon: 'warning',
								// 		confirmButtonText: 'Entendido'
								// 	});
								// }
								// if(parseInt(response.data) === parseInt(3))
								// {
								// 	Swal.fire({
								// 		title: 'Cuidado!',
								// 		text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
								// 		icon: 'warning',
								// 		confirmButtonText: 'Entendido'
								// 	});
								// }
								else{
									Swal.fire({
										title: 'Error!',
										text: 'No se pudieron guardar los datos.',
										icon: 'error',
										confirmButtonText: 'Ok'
									});
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					guardar_avances_cuatro: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_cuatro")}}', {
								mina_mina_cantera: this.model.mina_cantera,
								mina_numero_expediente: this.model.numero_expediente,
								mina_distrito_minero: this.model.distrito_minero,
								mina_descripcion_mina: this.model.descripcion_mina,
								mina_nombre_mina: this.model.nombre_mina,
								//mina_plano_inmueble: this.model.plano_inmueble,
								mina_categoria_m_c: this.model.categoria_m_c,
								mina_minerales: this.minerales,
								email: this.model.email
							})
							.then(function (response) {
								console.log(response.data);
								if( response.data  !== 'medio'){
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								else{
									if(response.data == "medio")
									{
										Swal.fire({
											title: 'Cuidado!',
											text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
											icon: 'warning',
											confirmButtonText: 'Entendido'
										});
									}
									else{
										Swal.fire({
											title: 'Error!',
											text: 'No se pudieron guardar los datos.',
											icon: 'error',
											confirmButtonText: 'Ok'
										});
									}
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					guardar_avances_cinco: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_cinco")}}', {
								owner: this.model.owner,
								arrendatario: this.model.arrendatario,
								concesionario: this.model.concesionario,
								otros: this.model.otros,
								acciones_a_desarrollar: this.model.acciones,
								actividad: this.model.actividades,
								fecha_incio: this.model.fecha_incio,
								fecha_fin: this.model.fecha_fin,
								email: this.model.email
							})
							.then(function (response) {
								console.log(response.data);
								if( response.data  !== 'medio'){
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								else{
									if(response.data == "medio")
									{
										Swal.fire({
											title: 'Cuidado!',
											text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
											icon: 'warning',
											confirmButtonText: 'Entendido'
										});
									}
									else{
										Swal.fire({
											title: 'Error!',
											text: 'No se pudieron guardar los datos.',
											icon: 'error',
											confirmButtonText: 'Ok'
										});
									}
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					guardar_avances_seis: function(){
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/auto_guardado_seis")}}', {
								pais_mina: this.model.domicilio_mina_pais,
								provincia_mina: this.model.domicilio_mina_provincia,
								departamento_mina: this.model.domicilio_mina_departamento,
								localidad_mina: this.model.domicilio_mina_localidad,
								tipo_sistema: this.model.tipo_coordenada,
								latitud: this.model.domicilio_mina_cor_long,
								longitud: this.model.domicilio_mina_cor_lat,
								email: this.model.email
							})
							.then(function (response) {
								console.log(response.data);
								if( response.data  !== 'medio'){
									Swal.fire({
										title: 'Datos Guardados!',
										text: 'Los datos ingresados en el formulario han sido guardados correctamente.',
										icon: 'success',
										confirmButtonText: 'Continuar'
									});
								}
								else{
									if(response.data == "medio")
									{
										Swal.fire({
											title: 'Cuidado!',
											text: 'El email con el que esta trabajando no ha sido validado. Por favor, hagalo. Hemos enviado un nuevo email a su casilla.',
											icon: 'warning',
											confirmButtonText: 'Entendido'
										});
									}
									else{
										Swal.fire({
											title: 'Error!',
											text: 'No se pudieron guardar los datos.',
											icon: 'error',
											confirmButtonText: 'Ok'
										});
									}
								}
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},

					
					recuperar_datos: function(){
						let self = this
						// Make a request for a user with a given ID
						axios.post('{{url("formularios/buscar_datos_formulario")}}', {
								//comun
								email: this.model.email,
							})
							.then(function (response) {
								console.log(response.data);
								if(response.data === "no esta")
								{
									//significa q no lo encontre, muestro error
									//alert("no se encontraron datos para este email");
									Swal.fire({
										title: 'Opps!',
										text: 'No se encontraron datos para este emial: '+self.model.email,
										icon: 'error',
										confirmButtonText: 'Ok'
									});
								}
								else{
									//si lo encontre, cargo los datos
									Swal.fire({
										title: 'Datos encontrados!',
										text: 'Se encontraron los datos cargados del email: '+self.model.email,
										icon: 'success',
										confirmButtonText: 'Continuar',
										timer: 2000
									});
									self.model.recuperacion_exitosa = true;
									console.log(response.data.razonsocial);
									//TAB 1 - Datos de Productor
									if(response.data.razonsocial !== null)
									{
										self.model.lastName = response.data.razonsocial;
									}
									if(response.data.cuit !== null)
									{
										self.model.cuit = response.data.cuit;
									}
									if(response.data.numeroproductor !== null)
									{
										self.model.num_productor = response.data.numeroproductor;
									}
									if(response.data.tiposociedad !== null)
									{
										self.model.tipo_sociedad = response.data.tiposociedad;
									}
									if(response.data.email != null)
									{
										self.model.email = response.data.email;
									}
									if(response.data.domicilio_prod !== null)
									{
										self.model.streetName = response.data.domicilio_prod;
									}
									if(response.data.inscripciondgr !== null)
									{
										self.model.tiene_inscricion_dgr = 'http://localhost:8000/'+ response.data.inscripciondgr;
									}
									if(response.data.constaciasociedad !== null)
									{
										self.model.tiene_constancia_sociedad = 'http://localhost:8000/'+response.data.constaciasociedad;
									}
									

									//TAB 2 - Domicilio Legal
									if(response.data.leal_calle !== null)
									{
										self.model.domicilio_legal_calle = response.data.leal_calle;
									}
									if(response.data.leal_numero !== null)
									{
										self.model.domicilio_legal_calle_numero = response.data.leal_numero;
									}
									if(response.data.leal_telefono !== null)
									{
										self.model.domicilio_legal_telefono = response.data.leal_telefono;
									}
									if(response.data.leal_pais !== null)
									{
										self.model.domicilio_legal_pais = response.data.leal_pais;
									}
									if(response.data.leal_provincia !== null)
									{
										self.model.domicilio_legal_provincia = response.data.leal_provincia;
									}
									if(response.data.leal_departamento !== null)
									{
										self.model.domicilio_legal_departamento = response.data.leal_departamento;
									}
									if(response.data.leal_localidad !== null)
									{
										self.model.domicilio_legal_localidad = response.data.leal_localidad;
									}
									if(response.data.leal_cp !== null)
									{
										self.model.domicilio_legal_cp = response.data.leal_cp;
									}
									if(response.data.leal_otro !== null)
									{
										self.model.domicilio_legal_otro = response.data.leal_otro;
									}
									//Fin tab 2


									//TAB 3 - Domicilio Administrativo
									if(response.data.administracion_calle !== null)
									{
										self.model.domicilio_administrativo_calle = response.data.administracion_calle;
									}
									if(response.data.administracion_numero !== null)
									{
										self.model.domicilio_administrativo_calle_numero = response.data.administracion_numero;
									}
									if(response.data.administracion_telefono !== null)
									{
										self.model.domicilio_administrativo_telefono = response.data.administracion_telefono;
									}
									if(response.data.administracion_pais !== null)
									{
										self.model.domicilio_administrativo_pais = response.data.administracion_pais;
									}
									if(response.data.administracion_provincia !== null)
									{
										self.model.domicilio_administrativo_provincia = response.data.administracion_provincia;
									}
									if(response.data.administracion_departamento !== null)
									{
										self.model.domicilio_administrativo_departamento = response.data.administracion_departamento;
									}
									if(response.data.administracion_localidad !== null)
									{
										self.model.domicilio_administrativo_localidad = response.data.administracion_localidad;
									}
									if(response.data.administracion_cp !== null)
									{
										self.model.domicilio_administrativo_cp = response.data.administracion_cp;
									}
									if(response.data.administracion_otro !== null)
									{
										self.model.domicilio_administrativo_otro = response.data.administracion_otro;
									}
									//Fin tab 3


									//TAB 4 - Datos Mina 1
									if(response.data.mina_cantera !== null)
									{
										self.model.mina_cantera = response.data.mina_cantera;
									}
									if(response.data.numero_expdiente !== null)
									{
										self.model.numero_expediente = response.data.numero_expdiente;
									}
									if(response.data.distrito_minero !== null)
									{
										self.model.distrito_minero = response.data.distrito_minero;
									}
									if(response.data.nombre_mina !== null)
									{
										self.model.nombre_mina = response.data.nombre_mina;
									}
									if(response.data.descripcion_mina !== null)
									{
										self.model.descripcion_mina = response.data.descripcion_mina;
									}
									if(response.data.plano_inmueble !== null)
									{
										self.model.tiene_plano_inmueble =  'http://localhost:8000/'+response.data.plano_inmueble;
									}
									if(response.data.minerales_variedad !== null)
									{
										self.minerales = '';
										var minerales_json = JSON.parse(response.data.minerales_variedad);
										console.log(minerales_json);
										for (x in minerales_json) {
											if(self.minerales === '')
												self.minerales = [{
												"id_mineral" : minerales_json[x].id_mineral,
												"id_varieadad" : minerales_json[x].id_varieadad,
												"observacion" : minerales_json[x].observacion,
											}];
											else
											self.minerales.push({
												"id_mineral" : minerales_json[x].id_mineral,
												"id_varieadad" : minerales_json[x].id_varieadad,
												"observacion" : minerales_json[x].observacion,
											});
											console.log("esta es la vuelta"+x);
										}
									// 	self.model.tiene_plano_inmueble =  response.data.minerales;

									// mineral.id_mineral
									// mineral.observacion
									console.log(self.minerales);

									}
									if(response.data.categoria !== null)
									{
										self.model.categoria_m_c = response.data.categoria;
									}
									self.cambio_categoria();


									//Fin tab 4

									//TAB 5 - Datos Mina 2
									// if(response.data.relacion_mina !== null)
									// {
									// 	self.model.mina_cantera = response.data.relacion_mina;
									// }
									if(response.data.owner !== null)
									{
										self.model.owner = response.data.owner;
									}
									if(response.data.arrendatario !== null)
									{
										self.model.arrendatario = response.data.arrendatario;
									}
									if(response.data.concesionario !== null)
									{
										self.model.concesionario = response.data.concesionario;
									}
									if(response.data.otros !== null)
									{
										self.model.otros = response.data.otros;
									}
									if(response.data.titulo_contrato_posecion !== null)
									{
										self.model.tiene_contrato =  'http://localhost:8000/'+response.data.titulo_contrato_posecion;
									}

									if(response.data.resolucion_concesion_minera !== null)
									{
										self.model.tiene_concesion =  'http://localhost:8000/'+response.data.resolucion_concesion_minera;
									}
									
									if(response.data.constancia_pago_canon !== null)
									{
										self.model.tiene_canon =  'http://localhost:8000/'+response.data.constancia_pago_canon;
									}

									
									if(response.data.iia !== null)
									{
										self.model.tiene_iia =  'http://localhost:8000/'+response.data.iia;
									}
									if(response.data.dia !== null)
									{
										self.model.tiene_dia =  'http://localhost:8000/'+response.data.dia;
									}
									

									if(response.data.actividad !== null)
									{
										self.model.actividades = response.data.actividad;
									}
									if(response.data.acciones_a_desarrollar !== null)
									{
										self.model.acciones = response.data.acciones_a_desarrollar;
									}
									

									if(response.data.fecha_alta_dia !== null)
									{
										self.model.fecha_incio = response.data.fecha_alta_dia;
									}
									if(response.data.fecha_vencimiento_dia !== null)
									{
										self.model.fecha_fin = response.data.fecha_vencimiento_dia;
									}

									//Fin tab 5


									
									

									

								
								}

									// model:{
									// 	//tipo de formulario
									// 	tipo_formulario :  false,
									// 	sistema :  '',
									// 	primera_vez: 'si',
									// 	//Datos personales
									// 	correo_enviado_si: false,
										
									// 	//localidad de mina 
									// 	domicilio_mina_pais:'Argentina',
									// 	domicilio_mina_provincia:'San Juan',
									// 	domicilio_mina_departamento:'Sarmiento',
									// 	domicilio_mina_localidad:'Trinidad',
									// 	domicilio_mina_cor_long:'5563',
									// 	domicilio_mina_cor_lat:'La Prov Administrativo',

									// },


									// caracter_invoca: null
									// categoria: null
									// constaciasociedad: null
									// constancia_pago_canon: null
									// created_at: "2021-03-25T14:42:04.000000Z"
									// created_by: null
									// : "20-15912278-7"
									// deleted_at: null
									// descripcion_mina: null
									// dia: null
									// distrito_minero: null
									// : "7079 Tevin Knoll"
									// : "ochamplin@gmail.com"
									// estado: "'"en proceso"'"
									// fecha_alta_dia: null
									// fecha_vencimiento_dia: null
									// id: 6
									// iia: null
									// inscripciondgr: null
									// latitud: null
									
									// localidad_mina_departamento: null
									// localidad_mina_localidad: null
									// localidad_mina_pais: null
									// localidad_mina_provincia: null
									// longitud: null
									// mina_cantera: null
									// nombre_mina: null
									// numero_expdiente: null
									// numeroproductor: 123123
									// plano_inmueble: null
									// resolucion_concesion_minera: null
									// tiposociedad: "Sociedad Secreta"
									// titulo_contrato_posecion: null
									// updated_at: "2021-03-25T14:45:06.000000Z"
								

								//nueva pestaña de descarga
								/*var a = document.createElement("a");
								a.target = "_blank";
								a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
								a.click();*/
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							this.cambio_categoria();
					},
					preguntar_email_confirmacion: function(){
						let resultado = false;
						let self = this
						axios.post('{{url("formularios/preg_email_validado")}}', {
							email: this.model.email,
						})
						.then(function (response) {
							if(response.data === "sin confirmar" )
							{
								Swal.fire({
									title: 'Email No valido!',
									text: 'El email declarado aún no ha sido validado. Por favor, vuelva a hacer clic en enlace que se encuentra dentro del email para confirmar la cuenta.',
									icon: 'error',
									confirmButtonText: 'Voy a revisar el email'
								});

								self.email_confirmado = false;
								console.log("email no confirmado");
							}
							else
							{
								Swal.fire({
									title: 'Email Valido correctamente!',
									text: 'El email ha sido confirmado de manera exitosa. Gracias. Ahora continuemos con el formulario.',
									icon: 'succes',
									confirmButtonText: 'Continuar'
								});
								self.email_confirmado = true;
								console.log("email ya confirmado");
							} 
						})
						.catch(function (error) {
							console.log(error);
						})
					},
					validar_email_datos: function(){
						// Make a request for a user with a given ID
						let self = this
						//this.model.correo_enviado_si = !this.model.correo_enviado_si;
						//comprobar que los dos emails sean iguales
						if(this.model.email != this.model.email_confirmacion)
						{
							//alert("Los emails no coinciden, por favor, revise.");
							Swal.fire({
								title: 'Error!',
								text: 'Los emails no coinciden, por favor revisarlos.',
								icon: 'error',
								confirmButtonText: 'Ok, voy revisar'
							});
							self.model.correo_enviado_si = false;
						}
						else
						{//emails iguales
							axios.post('{{url("formularios/validar_email_formulario")}}', {
								//comun
								email: this.model.email,
								})
								.then(function (response) {
									console.log(response.data);
									if(response.data == 'todo bien')
									{
										Swal.fire({
											title: 'Email Enviado!',
											text: 'Hemos enviado un email a la casilla declarada, por favor revise su casilla, también en la carpeta de emails no deseados. Una vez que encuentre email por favor hacer clic en su enlace para confirmar la cuenta.',
											icon: 'warning',
											confirmButtonText: 'Voy a revisar el email'
										});
									}
									/*setInterval(() => {
										this.preguntar_email_confirmacion();
									}, (2000 * 60));*/
										

									//nueva pestaña de descarga
									/*var a = document.createElement("a");
									a.target = "_blank";
									a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
									a.click();*/
								})
								.catch(function (error) {
									// handle error
									console.log(error);
								})
							self.model.correo_enviado_si = true;
						}
					},
					validar_cuit_productor: function(){
						let self = this
						if(
							(this.reinscripcion_data.cuit_para_validar != '')
							&&
							(this.reinscripcion_data.cuit_para_validar.length == 11)
							)
						{
							//alert("Los emails no coinciden, por favor, revise.");
							Swal.fire({
								title: 'Error!',
								text: 'El CUIT / CUIL es incorrecto, por favor reviselo.',
								icon: 'error',
								confirmButtonText: 'Ok, voy revisar'
							});
							self.model.correo_enviado_si = false;
						}
						else
						{//emails iguales
							axios.post('{{url("formularios/validar_cuit_reinscripcion")}}', {
								//comun
								cuit: this.reinscripcion_data.cuit_para_validar,
								})
								.then(function (response) {
									console.log(response.data);
									if(response.data == 'todo bien')
									{
										Swal.fire({
											title: 'Email Enviado!',
											text: 'Hemos enviado un email a la casilla declarada, por favor revise su casilla, también en la carpeta de emails no deseados. Una vez que encuentre email por favor hacer clic en su enlace para confirmar la cuenta.',
											icon: 'warning',
											confirmButtonText: 'Voy a revisar el email'
										});
									}
									/*setInterval(() => {
										this.preguntar_email_confirmacion();
									}, (2000 * 60));*/
										

									//nueva pestaña de descarga
									/*var a = document.createElement("a");
									a.target = "_blank";
									a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
									a.click();*/
								})
								.catch(function (error) {
									// handle error
									console.log(error);
								})
							self.model.correo_enviado_si = true;
						}
					},
					comprobar_validación_de_email: function(){
						// Make a request for a user with a given ID

						axios.get('{{url("formularios/preg_email_validado")}}', {
								//comun
								email: this.model.email,
							})
							.then(function (response) {
								console.log(response.data);

								//nueva pestaña de descarga
								/*var a = document.createElement("a");
								a.target = "_blank";
								a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
								a.click();*/
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
					},
					descargar_formulario:function(){
							axios.post('{{url("formularios/buscar_id_form")}}', {
									email: this.model.email,
								})
							.then(function (response) {
								console.log(response.data);
								if(response.data != false){
									console.log("el id nuevo es: "+response.data);
									var id_recien_creado = response.data;
									//nueva pestaña de descarga
									var a = document.createElement("a");
									a.target = "_blank";
									a.href = '{{url("formularios/descargar_formulario")}}'+"/"+response.data;
									a.click();
									//alert("todo bien");
									}
								
							})
							.catch(function (error) {
								console.log(error);
							});
					}
				},
				// watch: {
					
				// 	ram_solicitada: function(){
				// 		clearInterval(this.interval);
				// 			if(this.ram_solicitada == this.displayNumber){
				// 			return;
				// 		}
				// 		this.interval = window.setInterval(function(){
				// 			if(this.displayNumber != this.ram_solicitada){
				// 			var change = (this.ram_solicitada - this.displayNumber) / 10;
				// 				change = change >= 0 ? Math.ceil(change) : Math.floor(change);
				// 				this.displayNumber = this.displayNumber + change;
				// 			}
				// 		}.bind(this), 20);
				// 	}
				// },
				// ready:function(){
				// 	this.displayNumber = this.ram_solicitada ? this.ram_solicitada : 0;
				// }
			})
		</script>
	</body>
</html>