<template>
	<div :class="clase_sup">
		<div :class="clase_inf">
			<a href="#section_mina_uno">
                <img class="animate-bounce w-20 h-20 object-cover rounded-full border-2 border-indigo-500" :src="$inertia.page.props.appName+'/formulario_alta/imagenes/tipo_caracter_card.svg'">
            </a>
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
				<div class="flex justify-between"  v-if="$props.evaluacion">
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
			<div class="mt-4" v-if="mostrarayuda">
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
			'mostrarayuda',
			'evaluacion',
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
