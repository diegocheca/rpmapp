<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Datetime;

use App\Models\Producido;

class ProducidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i<100; $i++){
            $nuevo_producido = new Producido;
            $nuevo_producido->unidades = $faker->numberBetween($min=1, $max=1000000);
            $nuevo_producido->precio_venta = $faker->numberBetween($min=1000, $max=10000);
            $nuevo_producido->estado = $faker->randomElement(['aprobado','reprobado','en proceso']);
            $nuevo_producido->created_by = 1;       
            $nuevo_producido->created_at = new Datetime; 
            $nuevo_producido->deleted_at = null; 
            $nuevo_producido->updated_at = new Datetime;
            $nuevo_producido->save();
        }

    }
}
