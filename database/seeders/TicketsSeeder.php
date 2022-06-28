<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Tickets;

class TicketsSeeder extends Seeder
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

        //datos globales
        $razon_social = $faker->name();
        $email = str_replace(" ","",$razon_social)."@gmail.com";
        $estados = [
            'aprobado',
            'reprobado',
            'en proceso',
            'con observaciones',
            'terminado',
            'suspendido'
        ];
        for ($i=0; $i < 250 ; $i++) { 

            $ticket = new Tickets();
            $ticket->name = $razon_social;
            $ticket->email = $email;
            $ticket->user = $faker->numberBetween(0,9999);
            $ticket->message = $faker->text(200);
            $ticket->file = $faker->text(200);
            $ticket->status = $estados[$faker->numberBetween(0,count($estados)-1)] ;
            $ticket->seen_at =  $faker->dateTimeBetween($startDate = '-6 month',$endDate = '+6 month');
            $ticket->seen_by = $faker->numberBetween(0,9999);
            $ticket->save();

        }


    }
}
