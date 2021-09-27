<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<a href="#section_productor">
				<img class="animate-bounce w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/slick/img/features/total.svg'" width="50%">
			</a>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos de Totales</p>
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
				<div class="flex items-center">
						<span class="mr-2"><p>{{aprobado}}%</p></span>
						<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
							<div :style="'width: '+aprobado+'%'" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
						</div>
					</div>
				</div>
				<div class="flex items-center">
					<span class="mr-2"><p>{{reprobado}}%</p></span>
					<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
							<div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
						</div>
					</div>
				</div>
				<div class="flex items-center">
						<span class="mr-2"><p>{{progreso}}%</p></span>
						<div class="relative w-full">
						<div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
							<div style="width: 40%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
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