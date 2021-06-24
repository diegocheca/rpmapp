<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Reinscripciones;

class ReinscripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $cargos = [
            'operario',
            'CEO',
            'presidente',
            'ingeniero',
            'administrativo',
            'contador',
            'geólogo'  
            
        ];

        for($i = 0;$i< 100; $i++)
        {
            $nueva_reinscripcion = new Reinscripciones();
            $nueva_reinscripcion->id_mina =  1;
            $nueva_reinscripcion->id_productor =  6;  //revisar porque chequea con form_alta_productores
            $nueva_reinscripcion->fecha_vto = $faker->date ;
            $nueva_reinscripcion->prospeccion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->exploracion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->explotacion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->desarrollo =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->cantidad_productos = $faker->numberBetween($min=1, $max=10) ;
            $nueva_reinscripcion->porcentaje_venta_provincia =  $faker->numberBetween($min=0, $max=20);
            $nueva_reinscripcion->porcentaje_venta_otras_provincias =  $faker->numberBetween($min=0, $max=50);
            $nueva_reinscripcion->porcentaje_exportado =  100 - ($nueva_reinscripcion->porcentaje_venta_otras_provincias + $nueva_reinscripcion->porcentaje_venta_provincia);
            $nueva_reinscripcion->personal_perm_profesional =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_operarios =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_administrativos =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_otros = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_profesional = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_operarios = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_administrativos = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_otros = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->nombre = $faker->name();
            $nueva_reinscripcion->dni = $faker->numberBetween($min=15000000, $max=45000000);
            $nueva_reinscripcion->cargo = $cargos[$faker->numberBetween($min=0, $max=6)];
            $nueva_reinscripcion->created_by = 1;
            $nueva_reinscripcion->estado = $faker->randomElement(['aprobado','reprobado','en proceso']);
            $nueva_reinscripcion->save();
        }
    }
}
