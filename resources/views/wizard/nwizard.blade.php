<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RPM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('wizard/bulma.min.css')}} ">
	<link rel="stylesheet" href="{{asset('wizard/cosas_wizar.css')}} ">
</head>
<body>
		<div class="container" id='app'>
			<wizard></wizard>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{asset('wizard/jquery.min.js')}}"></script>
		<script src="{{asset('wizard/axios.min.js')}}"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script type="text/javascript" src="wizard/bootstrap.min.js"></script>
		<script type="text/javascript" src="wizard/vue.min.js"></script>
		<script type="text/javascript" src="wizard/vue-form-wizard.js"></script>-->
		<script type="text/javascript" src="wizard/vfg.js"></script>
		<script type="text/javascript" src="wizard/vue-multiselect.min.js"></script>
		<script type="text/javascript" src="wizard/bootstrap-tour-standalone.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// Instance the tour
				var tour = new Tour({
						steps: [{
							element: "#element",
							title: "Tipos de Formularios",
							content: "<p><strong>F101:</strong> Alta, Baja o Modificacion de cualquier sistema</p><p><strong>F103:</strong> Cambiar Contraseña o Desbloquear Usuario de cualquier sistema</p><p><strong>F203:</strong> Alta, Baja o Modifcacion de usuarios de Servicio de Directorio</p><p><strong>F130:</strong> Solicitar Servidor Vistual</p>"
						}]
					}).init().start(false);

					var tour_tipo_form = new Tour({
						steps: [{
							element: "#element1",
							title: "Sistemas Integrados",
							content: "<p><strong>SIIF:</strong> Sistema Financiero</p><p><strong>SIGED:</strong> Sistema de Expedientes</p><p><strong>SIGOP:</strong> Sistema Integrado de Obras Publicas</p><p><strong>SIARH:</strong> Sistema Integrado de Recursos Humanos</p><p><strong>SIPE:</strong> Sistema Integrado de Personas</p>"
						}]
					}).init().start(false);

				$("#startTour").click(function(){
					tour.restart();
				});
				$("#startTourtipo_form").click(function(){
					tour_tipo_form.restart();
				});

				var tour_next = new Tour({
						steps: [{

							element: "#elementnext",
							title: "Cantidad de Memoria",
							content: "<p><strong>Se deben seleccionar la cantidad de memoria que tendra disponible esta cuenta de nextcloud</strong></p>"
							
						}]
					}).init().start(false);


				$("#startTour_next").click(function(){
					tour_next.restart();
				});

				

				var tour_dos = new Tour({
						steps: [{
							element: "#element_tres",
							title: "Datos Personales",
							content: "<p><strong>Se deben ingresar los datos personales de la persona que realizarà el tramite</strong></p><p>Si desea una cantidad mayor, por favor comuniquese via telefonica</p>"
						}]
					}).init().start(false);

				$("#startTour_dos").click(function(){
					tour_dos.restart();
				})


				var tour_tres = new Tour({
						steps: [{
							element: "#element_cuatro",
							title: "Datos Laborales",
							content: "<p><strong>Relacion:</strong>tipo de relacion laboral con el ministerio al que pertenece</p>"
						}]
					}).init().start(false);

				$("#startTour_tres").click(function(){
					tour_tres.restart();
				})

				var tour_cuatro = new Tour({
						steps: [{
							element: "#element_",
							title: "Datos Laborales",
							content: "<p><strong>Relacion:</strong>tipo de relacion laboral con el ministerio al que pertenece</p>"
						}]
					}).init().start(false);

				$("#startTour_cuatro").click(function(){
					tour_cuatro.restart();
				})
			});
		</script>
		

		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->
</body>
</html>