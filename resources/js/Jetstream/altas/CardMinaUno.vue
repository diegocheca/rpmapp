<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
				</svg>
			</div>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos de la Mina</p>
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
