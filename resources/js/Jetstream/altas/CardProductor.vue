<style>
  input:checked {
    background-color: #22c55e; /* bg-green-500 */
  }
  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }
</style>
<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<div class="animate-bounce text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
				<!-- svg  -->
				
				<a href="#section_productor">
					
					<svg  xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
					</svg>
				</a>
			</div>
			<div class="mt-8">
				<p class="text-xl font-semibold my-2">Datos del Producto</p>
				<div class="flex space-x-2 text-gray-400 text-sm">
								<!-- svg  -->
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
								</svg>
									<p>{{lugar}}</p> 
				</div>
				<div class="flex space-x-2 text-gray-400 text-sm my-3">
								<!-- svg  -->
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
