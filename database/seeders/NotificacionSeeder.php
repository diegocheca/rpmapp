<?php

namespace Database\Seeders;
use App\Models\Notificacion;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $tables = ["reinscripciones","borrador", "mina", "mina_productor", "login", "producto", "otro"];
        $index = $faker->numberBetween($min = 0, $max = (count($tables) -1));
        for ($i=0; $i < 30000 ; $i++) { 
            # code...
            $notificacion = new Notificacion();
            $notificacion->message = $faker->text(100);
            $notificacion->user_id = $faker->numberBetween(1,500);
            $notificacion->name_id = $tables[$index];
            $notificacion->table_id = $index;
            $notificacion->url = $faker->text(100);
            $notificacion->notification_id = $faker->text(100);
            $notificacion->seen_at = date('Y-m-d', strtotime("2021-12-01". ' + 6 months'));
            $notificacion->save();
        }


    }
}
