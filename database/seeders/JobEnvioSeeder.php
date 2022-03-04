<?php

namespace Database\Seeders;
use App\Models\JobEnvio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class JobEnvioSeeder extends Seeder
{
    public function run()
    {
        $estados = [
            'success',
            'failed',
            'in progress',
            'paused'
        ];
        $tablas = [
            'productores',
            'productos',
            'reinscripciones',
            'reinscripciones'
        ];
        $faker = Faker::create();
        for($i = 0;$i<20; $i++)
        {
            $estado = $estados[$faker->numberBetween(0,count($estados)-1)]; 
            $tabla = $tablas[$faker->numberBetween(0,count($tablas)-1)]; 
            $inicio = $faker->dateTimeBetween($startDate = '-6 month',$endDate = 'now');
            $fin = $faker->dateTimeBetween($inicio,$endDate = 'now');
            JobEnvio::create([
                'datos' =>  $faker->text(100),
                'estado' => $estado,
                'tabla' => $tabla,
                'inicio' => $inicio,
                'fin' => $fin,
                'provincia_id' => 70,
            ]);
        }
    }
}