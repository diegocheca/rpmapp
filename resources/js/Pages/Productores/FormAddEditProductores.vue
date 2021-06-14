<template>
    <form @submit.prevent="submit" >
        <div class="flex bg-gray-200 items-center justify-center  mt-32 mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            </div>

            <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{title}}</h1>
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CUIT</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="Id cuit" 
                v-model="form.cuit"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">razonsocial</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="razonsocial"
                v-model="form.razonsocial"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">numeroproductor</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="numeroproductor" 
                v-model="form.numeroproductor"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">email</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="email"
                v-model="form.email"
                />
            </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">domicilio_prod</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="domicilio_prod" 
                v-model="form.domicilio_prod"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">tiposociedad</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="tiposociedad"
                v-model="form.tiposociedad"
                />
            </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">inscripciondgr</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="inscripciondgr" 
                v-model="form.inscripciondgr"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">constaciasociedad</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="constaciasociedad"
                v-model="form.constaciasociedad"
                />
            </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_calle</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="leal_calle" 
                v-model="form.leal_calle"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_numero</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="leal_numero"
                v-model="form.leal_numero"
                />
            </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_telefono</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="leal_telefono" 
                v-model="form.leal_telefono"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_pais</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="leal_pais"
                v-model="form.leal_pais"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_provincia</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="leal_provincia" 
                v-model="form.leal_provincia"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_departamento</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="leal_departamento"
                v-model="form.leal_departamento"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_localidad</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="leal_localidad" 
                v-model="form.leal_localidad"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_cp</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="leal_cp"
                v-model="form.leal_cp"
                />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">leal_otro</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="leal_otro" 
                v-model="form.leal_otro"
                />
            </div>
            
            </div>




            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_calle</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="administracion_calle" 
                v-model="form.administracion_calle"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_numero</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="administracion_numero"
                v-model="form.administracion_numero"
                />
            </div>
            </div>








            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_telefono</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="administracion_telefono" 
                v-model="form.administracion_telefono"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_pais</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="administracion_pais"
                v-model="form.administracion_pais"
                />
            </div>
            </div>






            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_provincia</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="administracion_provincia" 
                v-model="form.administracion_provincia"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_departamento</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="administracion_departamento"
                v-model="form.administracion_departamento"
                />
            </div>
            </div>












            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_localidad</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="administracion_localidad" 
                v-model="form.administracion_localidad"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_cp</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="administracion_cp"
                v-model="form.administracion_cp"
                />
            </div>
            </div>









            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">administracion_otro</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="administracion_otro" 
                v-model="form.administracion_otro"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">numero_expdiente</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="numero_expdiente"
                v-model="form.numero_expdiente"
                />
            </div>
            </div>


            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">created_by</label>
                <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                type="text" 
                placeholder="created_by" 
                v-model="form.created_by"
                />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">estado</label>
                <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                type="text" 
                placeholder="estado"
                v-model="form.estado"
                />
            </div>
            </div>



            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selection</label>
            <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Another Input</label>
            <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Another Input" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                        <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p>
                        </div>
                    <input type='file' class="hidden" />
                    </label>
                </div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <a :href="route('productores.index')"> 
                <button
                type="button" 
                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                >
                Cancel
                </button>
            </a>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Agregar</button>
            </div>

        </div>
        </div>
    </form>
</template>

<script>
    export default {
    components: {
    },
    props: {
        errors: Object,
        productor: Object,
        title: String
    },
    data() {
        return {
            form: {
                id: this.$props.productor.id,
                cuit: this.$props.productor.cuit,
                razonsocial: this.$props.productor.razonsocial,
                numeroproductor: this.$props.productor.numeroproductor,
                email: this.$props.productor.email,
                domicilio_prod: this.$props.productor.domicilio_prod,
                tiposociedad: this.$props.productor.tiposociedad,
                inscripciondgr: this.$props.productor.inscripciondgr,
                constaciasociedad: this.$props.productor.constaciasociedad,
                leal_calle: this.$props.productor.leal_calle,
                leal_numero: this.$props.productor.leal_numero,
                leal_telefono: this.$props.productor.leal_telefono,
                leal_pais: this.$props.productor.leal_pais,
                leal_provincia: this.$props.productor.leal_provincia,
                leal_departamento: this.$props.productor.leal_departamento,
                leal_localidad: this.$props.productor.leal_localidad,
                leal_cp: this.$props.productor.leal_cp,
                leal_otro: this.$props.productor.leal_otro,
                administracion_calle: this.$props.productor.administracion_calle,
                administracion_numero: this.$props.productor.administracion_numero,
                administracion_telefono: this.$props.productor.administracion_telefono,
                administracion_pais: this.$props.productor.administracion_pais,
                administracion_provincia: this.$props.productor.administracion_provincia,
                administracion_departamento: this.$props.productor.administracion_departamento,
                administracion_localidad: this.$props.productor.administracion_localidad,
                administracion_cp: this.$props.productor.administracion_cp,
                administracion_otro: this.$props.productor.administracion_otro,
                numero_expdiente: this.$props.productor.numero_expdiente,
                created_by: this.$props.productor.created_by,
                estado: this.$props.productor.estado,
            },
        };
    },
    methods: {
        submit() {
            if(this.$props.title == 'Agregando Nuevo Productor')
                this.$inertia.post(route('productores.store'), this.form);
            if(this.$props.title == 'Editando un productor')
            {
                this.$inertia.put(
                    route("productores.update", this.form.id),
                    this.form
                );
            }
                
        },
    },
    };
</script>