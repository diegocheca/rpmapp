<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

use app\Models\Productos;

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
                'Zeolitas o Minerales Permutantes o Permutíticos'
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
            $nuevo_producto->nombre_mineral = $minerales[$this->faker->numberBetween($min = 0, $max = 91)];
            $nuevo_producto->variedad = $this->faker->colorName() ;
            $nuevo_producto->produccion =  $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->unidades = $unidades[$this->faker->numberBetween($min = 0, $max = 3)];
            $nuevo_producto->otra_unidad = null;
            $nuevo_producto->precio_venta = $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->created_by = 1 ;
            $nuevo_producto->estado = 'en proceso' ;

            $nuevo_producto->save();

        }
    }
}
