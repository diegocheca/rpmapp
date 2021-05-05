<template>
  <app-layout>
    <div class="flex items-center  w-full bg-teal-lighter">
      <div class="w-full bg-white rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-grey-darkest text-xl mb-6">
          Editar Productor
        </h1>
        <form @submit.prevent="submit" class="mb-8">
          <div class="row">
            <banner></banner>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Razon Social:</label
            >
            <input
              id="razon_social"
              v-model="form.razon_social"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="price"
              >Email:</label
            >
            <input
              id="email"
              v-model="form.email"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >CUIT:</label
            >
            <input
              id="cuit"
              v-model="form.cuit"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Numero de Productor:</label
            >
            <input
              id="cuit"
              v-model="form.numeroproductor"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Domicilio del Productor:</label
            >
            <input
              id="cuit"
              v-model="form.domicilio_prod"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Tipo de Sociedad:</label
            >
            <input
              id="cuit"
              v-model="form.tiposociedad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Inscripcion DGR:</label
            >
            <input
              id="cuit"
              v-model="form.inscripciondgr"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Constancia de Sociedad:</label
            >
            <input
              id="cuit"
              v-model="form.constaciasociedad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Nombre Calle Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_calle"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Número de Calle Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_numero"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Telefóno de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_telefono"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >País de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_pais"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Provincia de Domicilio Legal:</label
            >
            <!-- <input
              id="cuit"
              v-model="form.leal_provincia"
              class="border py-2 px-3 text-grey-darkest"
            /> -->
            <select v-model="form.leal_provincia" class="border py-2 px-3 text-grey-darkest">
                <option :value="null" />
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Buenos Aires-GBA">Buenos Aires-GBA</option>
                <option value="Capital Federal">Capital Federal</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Rios">Entre Rios</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquen">Neuquen</option>
                <option value="Rio Negro">Rio Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucuman">Tucuman</option>
                <option value="Provincia 2 de brazil">Provincia 2 de brazil</option>
              </select>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Departamento de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_departamento"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Localidad de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_localidad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Códido Postal de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_cp"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Otro dato de Domicilio Legal:</label
            >
            <input
              id="cuit"
              v-model="form.leal_otro"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Nombre de Calle de Domicilio Administrativo:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_calle"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Número de Domicilio Administrativo:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_numero"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Teléfono de Domicilio Administrativo:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_telefono"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >País de Domicilio Administrativo:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_pais"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Provincia de Domicilio Administración:</label
            >

            <select v-model="form.administracion_provincia" class="border py-2 px-3 text-grey-darkest">
                <option :value="null" />
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Buenos Aires-GBA">Buenos Aires-GBA</option>
                <option value="Capital Federal">Capital Federal</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Rios">Entre Rios</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquen">Neuquen</option>
                <option value="Rio Negro">Rio Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucuman">Tucuman</option>
                <option value="Provincia 2 de brazil">Provincia 2 de brazil</option>
              </select>
            <!-- <input
              id="cuit"
              v-model="form.administracion_provincia"
              class="border py-2 px-3 text-grey-darkest"
            /> -->
          </div>




          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Departamento de Domicilio Administración:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_departamento"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Localidad de Domicilio Administración:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_localidad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Codigo Postal de Domicilio Administración:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_cp"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Otro dato de Domicilio Administración:</label
            >
            <input
              id="cuit"
              v-model="form.administracion_otro"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Numero de Expediente:</label
            >
            <input
              id="cuit"
              v-model="form.numero_expdiente"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Categoría:</label
            >
            <input
              id="cuit"
              v-model="form.categoria"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Nombre de Mina:</label
            >
            <input
              id="cuit"
              v-model="form.nombre_mina"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Descripción de Mina:</label
            >
            <input
              id="cuit"
              v-model="form.descripcion_mina"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>




          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Distrito Minero:</label
            >
            <input
              id="cuit"
              v-model="form.distrito_minero"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Mina o Cantera:</label
            >
            <input
              id="cuit"
              v-model="form.mina_cantera"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Plano Inmueble:</label
            >
            <input
              id="cuit"
              v-model="form.plano_inmueble"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Minerales:</label
            >
            <input
              id="cuit"
              v-model="form.minerales_variedad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>



          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Owner:</label
            >
            <input
              id="cuit"
              v-model="form.owner"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >arrendatario:</label
            >
            <input
              id="cuit"
              v-model="form.arrendatario"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >concesionario:</label
            >
            <input
              id="cuit"
              v-model="form.concesionario"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >otros:</label
            >
            <input
              id="cuit"
              v-model="form.otros"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >titulo_contrato_posecion:</label
            >
            <input
              id="cuit"
              v-model="form.titulo_contrato_posecion"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >resolucion_concesion_minera:</label
            >
            <input
              id="cuit"
              v-model="form.resolucion_concesion_minera"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>


          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >constancia_pago_canon:</label
            >
            <input
              id="cuit"
              v-model="form.constancia_pago_canon"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >iia:</label
            >
            <input
              id="cuit"
              v-model="form.iia"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >dia:</label
            >
            <input
              id="cuit"
              v-model="form.dia"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >acciones_a_desarrollar:</label
            >
            <input
              id="cuit"
              v-model="form.acciones_a_desarrollar"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >actividad:</label
            >
            <input
              id="cuit"
              v-model="form.actividad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >fecha_alta_dia:</label
            >
            <input
              id="cuit"
              v-model="form.fecha_alta_dia"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >fecha_vencimiento_dia:</label
            >
            <input
              id="cuit"
              v-model="form.fecha_vencimiento_dia"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >localidad_mina_pais:</label
            >
            <input
              id="cuit"
              v-model="form.localidad_mina_pais"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>



          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >localidad_mina_provincia:</label>
              <select v-model="form.localidad_mina_provincia" class="pr-6 pb-8 w-full lg:w-1/2">
                <option :value="null" />
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Buenos Aires-GBA">Buenos Aires-GBA</option>
                <option value="Capital Federal">Capital Federal</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Rios">Entre Rios</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquen">Neuquen</option>
                <option value="Rio Negro">Rio Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucuman">Tucuman</option>
                <option value="Provincia 2 de brazil">Provincia 2 de brazil</option>
              </select>
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >localidad_mina_departamento:</label
            >
            <input
              id="cuit"
              v-model="form.localidad_mina_departamento"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >localidad_mina_localidad:</label
            >
            <input
              id="cuit"
              v-model="form.localidad_mina_localidad"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >tipo_sistema:</label
            >
            <input
              id="cuit"
              v-model="form.tipo_sistema"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >longitud:</label
            >
            <input
              id="cuit"
              v-model="form.longitud"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >latitud:</label
            >
            <input
              id="cuit"
              v-model="form.latitud"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>

          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >created_by:</label
            >
            <input
              id="cuit"
              v-model="form.created_by"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-4">
            <label
              class="mb-2 uppercase font-bold text-lg text-grey-darkest"
              for="name"
              >Estado:</label
            >
            <input
              id="cuit"
              v-model="form.estado"
              class="border py-2 px-3 text-grey-darkest"
            />
          </div>
          <div class="flex flex-col mb-8">
            <button
              type="submit"
              class="block bg-blue-500 hover:bg-blue-800 text-white uppercase text-lg mx-auto p-4 rounded"
            >
              Editar
            </button>
            <inertia-link
              :href="route('productors.index')"
              class="text-red-600 hover:underline"
            >
              Volver
            </inertia-link>
          </div>
        </form>

      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Banner from '@/Jetstream/Banner';
export default {
  components: {
    AppLayout,
    Banner,
  },
  props: ["productor"],
  data() {
    return {
      form: {
        razon_social:this.$props.productor.razonsocial,
        email: this.$props.productor.email,
        cuit: this.$props.productor.cuit,
        numeroproductor: this.$props.productor.numeroproductor,
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
        leal_cp: this.$props.productor.leal_cp       ,
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
        categoria: this.$props.productor.categoria,
        nombre_mina: this.$props.productor.nombre_mina,
        descripcion_mina: this.$props.productor.descripcion_mina,
        distrito_minero: this.$props.productor.distrito_minero,
        mina_cantera: this.$props.productor.mina_cantera,
        plano_inmueble: this.$props.productor.plano_inmueble,
        minerales_variedad: this.$props.productor.minerales_variedad,





        owner: this.$props.productor.owner,
        arrendatario: this.$props.productor.arrendatario,
        concesionario: this.$props.productor.concesionario,
        otros: this.$props.productor.otros,
        titulo_contrato_posecion: this.$props.productor.titulo_contrato_posecion,
        resolucion_concesion_minera: this.$props.productor.resolucion_concesion_minera,


        constancia_pago_canon: this.$props.productor.constancia_pago_canon,
        iia: this.$props.productor.iia,
        dia: this.$props.productor.dia,
        acciones_a_desarrollar: this.$props.productor.acciones_a_desarrollar,
        actividad: this.$props.productor.actividad,
        fecha_alta_dia: this.$props.productor.fecha_alta_dia,
        fecha_vencimiento_dia: this.$props.productor.fecha_vencimiento_dia,
        localidad_mina_pais: this.$props.productor.localidad_mina_pais,

        localidad_mina_provincia: this.$props.productor.localidad_mina_provincia,
        localidad_mina_departamento: this.$props.productor.localidad_mina_departamento,
        localidad_mina_localidad: this.$props.productor.localidad_mina_localidad,
        tipo_sistema: this.$props.productor.tipo_sistema,
        longitud: this.$props.productor.longitud,
        latitud: this.$props.productor.latitud,
        created_by: this.$props.productor.created_by,
        estado: this.$props.productor.estado,

        
        
      },
      nuevo: this.$props.productor,
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        route("productors.update", this.$props.productors.id),
        this.form
      );
    },
  },
};
</script>