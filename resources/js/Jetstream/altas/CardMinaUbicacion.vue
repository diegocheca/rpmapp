<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<a href="#section_datos_mina_ubicacion">
				<div class="animate-bounce text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
					</svg>
				</div>
			</a>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos de la Ubicacion de Mina</p>
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
			<div class="mt-4">
				<label class="flex items-center relative w-max cursor-pointer select-none">
					Necesita ayuda?
					<br>
					<br>
					<input 
					type="checkbox" 
					class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-green-500 bg-red-500" 
					v-model="valor_ayuda_local"
					@change="cambio_de_ayuda"
					/>
					<span class="absolute font-medium text-xs uppercase right-1 text-white"> No </span>
					<span class="absolute font-medium text-xs uppercase right-8 text-white"> Si </span>
					<span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
				</label>
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
			'ayuda'
		],
		data(){
			return {
				valor_ayuda_local: this.$props.ayuda,
			}
		},
		methods:{
			cambio_de_ayuda(){
				this.$emit('changevalorayuda',this.valor_ayuda_local);
			}
		}

	}
</script>
