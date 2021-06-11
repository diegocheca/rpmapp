<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Productos;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //




        /*
        Antes del seeder correr esto:
        

INSERT INTO producido (id, unidades, precio_venta, created_by, estado, created_at, updated_at, deleted_at) VALUES
(1, 10, 1651, 1, 'en proceso', '2022-06-08 10:00:00', '2022-06-08 10:00:00',NULL) 


INSERT INTO mina_cantera (id, tipo, localidad_mina_pais, localidad_mina_provincia, localidad_mina_departamento, localidad_mina_localidad, nombre, descripcion, categoria, distrito_minero, tipo_sistema, longitud, latitud, labores, id_producido, plano_inmueble, created_by, estado, created_at, updated_at, deleted_at) VALUES
(1, 'mina', 'Argentina', 'San Juan', 'Capital', 'Trinidad', 'Mina 1', 'esta es una descripcion de la mina', 'segunda', '123456789', 'Geográficas', '44444', '123123', 'explotacion de oro', 1, 'public/files_formularios/ochamplin@gmail.com/d81pSC9W4nKj7FY4eoh1wX9TXRSliW2c8E0VsX8y.pdf', 1, NULL, NULL, NULL, NULL);



INSERT INTO productores (id, cuit, razonsocial, numeroproductor, email, domicilio_prod, tiposociedad, inscripciondgr, constaciasociedad, leal_calle, leal_numero, leal_telefono, leal_pais, leal_provincia, leal_departamento, leal_localidad, leal_cp, leal_otro, administracion_calle, administracion_numero, administracion_telefono, administracion_pais, administracion_provincia, administracion_departamento, administracion_localidad, administracion_cp, administracion_otro, numero_expdiente, created_by, estado, created_at, deleted_at, updated_at) VALUES
(6, '20-15912278-2', 'Mosciskie', 123456, 'ochamplin@gmail.com', '7079 Tevin Knoll west', 'Sociedad Secreta', NULL, NULL, '7079 Tevin Knoll eastwwww', 23133, '800.250.4902', 'Argentina', 'Chubut', 'Provincia 3 de Chubut', 'San Juan.', 5401, 'La Provincia', '7036 Luis Roads 2qqwwrr', '2313 esq111', '888.512.5842', 'Chile', 'San Luis', 'Capital', 'Bolivia City', 5563, 'La Prov Administrativo', '123456', NULL, 'en proceso', '2021-03-25 14:42:04', NULL, '2021-04-22 22:47:22'),


INSERT INTO reinscripciones (id, id_mina, id_productor, fecha_vto, prospeccion, exploracion, explotacion, desarrollo, cantidad_productos, porcentaje_venta_provincia, porcentaje_venta_otras_provincias, porcentaje_exportado, personal_perm_profesional, personal_perm_operarios, personal_perm_administrativos, personal_perm_otros, personal_trans_profesional, personal_trans_operarios, personal_trans_administrativos, personal_trans_otros, nombre, dni, cargo, created_by, estado, created_at, updated_at, deleted_at) VALUES
(1, 1, 6, '2022-06-08', 1, 1, 1, 1, 3, 12, 15, 56, 23, 22, 11, 1, 23, 32, 0, 32, 'Juan Carlos', 3232323, 'Presidente', 1, 'en proceso', '2021-06-03 21:04:54', '2021-06-03 21:04:54', NULL)




        */

        $faker = Faker::create();


        $minerales = [
                'Oro',
                'Plata',
                'Platino',
                'Mercurio',
                'Cobre',
                'Hierro',
                'Plomo',
                'Estaño',
                'Zinc',
                'Níquel',
                'Cobalto',
                'Bismuto',
                'Manganeso',
                'Antimonio',
                'Wolfram',
                'Aluminio',
                'Berilio',
                'Vanadio',
                'Cadmio',
                'Tantalio',
                'Molibdeno',
                'Litio',
                'Potasio',
                'Hulla',
                'Lignito',
                'Antracita',
                'Uranio',
                'Torio',
                'Hidrocarburos Sólidos',
                'Arsénico',
                'Cuarzo',
                'Feldespato',
                'Mica',
                'Fluorita',
                'Fosfatos Calizos',
                'Azufre',
                'Boratos',
                'Piedras Preciosas',
                'Vapores Endagenos',
                'Arenas Metalíferas',
                'Piedras Preciosas',
                'Desmontes',
                'Relaves',
                'Escoriales',
                'Abrasivos',
                'Amianto',
                'Baritina',
                'Bentonita',
                'Caolí­n',
                'Caparrosas',
                'Esteatitas',
                'Grafito',
                'Metales no comprendidos en 1° Categ.',
                'Ocres',
                'Resinas',
                'Sales Alcalinas o Alcalino Terrosas',
                'Salinas',
                'Salitres',
                'Tierras Piritosas y Aluminosas',
                'Turberas',
                'Zeolitas o Minerales Permutantes o Permutíticos',
                'Piedras Calizas',
                'Calcáreas',
                'Margas',
                'Yeso',
                'Alabastro',
                'Mármoles',
                'Granitos',
                'Dolomita',
                'Pizarras',
                'Areniscas',
                'Cuarcitas',
                'Basaltos',
                'Arenas No Metalíferas',
                'Cascajo',
                'Canto Rodado',
                'Pedregullo',
                'Grava',
                'Conchilla',
                'Piedra Laja',
                'Ceniza Volcánica',
                'Perlita',
                'Piedra Pómez',
                'Piedra Afilar',
                'Puzzolanas',
                'Porfidos',
                'Tobas',
                'Tosca',
                'Serpentina',
                'Piedra Sapo',
                'Loes',
                'Arcillas Comunes',
                'Otro'

        ];

        $unidades = ['m3', 'm2', 'kilos','metros'];
        for($i = 0;$i< 100; $i++)
        {
            $nuevo_producto = new Productos();
            $nuevo_producto->id_reinscripcion = 1;
            $nuevo_producto->nombre_mineral = $minerales[$faker->numberBetween($min = 0, $max = 91)];
            $nuevo_producto->variedad = $faker->colorName() ;
            $nuevo_producto->produccion =  $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->unidades = $unidades[$faker->numberBetween($min = 0, $max = 3)];
            $nuevo_producto->otra_unidad = null;
            $nuevo_producto->precio_venta = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->created_by = 1 ;
            $nuevo_producto->estado = 'en proceso' ;

            $nuevo_producto->save();

        }
    }
}
