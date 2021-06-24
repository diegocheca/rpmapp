<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
				<!-- svg  -->
				<a href="#section_domicilio_administrativo">
				
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path d="M17.283,5.549h-5.26V4.335c0-0.222-0.183-0.404-0.404-0.404H8.381c-0.222,0-0.404,0.182-0.404,0.404v1.214h-5.26c-0.223,0-0.405,0.182-0.405,0.405v9.71c0,0.223,0.182,0.405,0.405,0.405h14.566c0.223,0,0.404-0.183,0.404-0.405v-9.71C17.688,5.731,17.506,5.549,17.283,5.549 M8.786,4.74h2.428v0.809H8.786V4.74z M16.879,15.26H3.122v-4.046h5.665v1.201c0,0.223,0.182,0.404,0.405,0.404h1.618c0.222,0,0.405-0.182,0.405-0.404v-1.201h5.665V15.26z M9.595,9.583h0.81v2.428h-0.81V9.583zM16.879,10.405h-5.665V9.19c0-0.222-0.183-0.405-0.405-0.405H9.191c-0.223,0-0.405,0.183-0.405,0.405v1.215H3.122V6.358h13.757V10.405z"></path>
				</svg>
				</a>
			</div>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos del Domicilio de Administración Central</p>
				<div class="flex space-x-2 text-gray-400 text-sm">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
					</svg>
					<p>{{lugar}}</p> 
				</div>
				<div class="flex space-x-2 text-gray-400 text-sm my-3">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
					<p>{{updated_at}}</p> 
				</div>
				<div class="border-t-2"></div>
				<div class="flex justify-between">
					 <div class="my-4">
						<p class="font-semibold text-base mb-2">Progreso</p>
						<div class="text-base text-gray-400 font-semibold">
							<p>{{progreso}} %</p>
						</div>
					</div>
					<div class="my-4">
						<p class="font-semibold text-base text-green-500 mb-2">Aprobado</p>
						<div class="text-base text-green-500 font-semibold">
							<p>{{aprobado}} %</p>
						</div>
					</div>
					<div class="my-4">
						<p class="font-semibold text-base text-red-400 mb-2">Reprobado</p>
						<div class="text-base text-red-400 font-semibold">
							<p>{{reprobado}} %</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
		export default {
				props: [
				'progreso', 
				'aprobado', 
				'reprobado', 
				'lugar', 
				'updated_at',
				'clase_sup',
				'clase_inf',
				],

		}
</script>
