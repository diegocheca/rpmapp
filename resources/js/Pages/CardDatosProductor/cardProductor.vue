<template>
    <div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
    <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full flex justify-center">
                <div class="relative">
                    <img :src="$inertia.page.props.appName+'/storage/'+$props.productor.profile_photo" class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                </div>
            </div>
            <div class="w-full text-center mt-20">
                <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                    <div class="p-3 text-center">
                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{$props.productor.id_usario}}</span>
                        <span class="text-sm text-slate-400">Id Usuer</span>
                    </div>
                    <div class="p-3 text-center">
                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{$props.productor.id_fomulario}}</span>
                        <span class="text-sm text-slate-400">Id Form</span>
                    </div>

                    <div class="p-3 text-center">
                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">{{$props.productor.id_fomulario}}</span>
                        <span class="text-sm text-slate-400">Id Mina</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$props.productor.name}}</h3>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{$props.productor.email}}
            </div>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{$props.productor.provincia_name}}( {{$props.productor.provincia_id}})
            </div>
        </div>
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4">
                    {{$props.productor.id_fomulario}}
                    <p class="font-light leading-relaxed text-slate-600 mb-4">An artist of considerable range, Mike is the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm.</p>
                    <inertia-link
                        class="font-normal text-slate-700 hover:text-slate-400"
                        :href="route('formulario-alta.show', $props.productor.id_fomulario)"
                    >
                        Ver Formulario
                    </inertia-link>

                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
  props: {
    productor: Object,
  },
  /*components: {
    AppLayout,
    Saludo
  },*/
};
</script>
