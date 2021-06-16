<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Factory as Faker;
use Datetime;

use App\Models\User;
use App\Models\Team;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0;$i< 100; $i++)
        {
                $nuevo_usuario = new User;

                $nuevo_usuario->name = $faker->name;
                $nuevo_usuario->email = str_replace(' ', '', $nuevo_usuario->name).'@example.com';
                $nuevo_usuario->password = bcrypt('123');
                $nuevo_usuario->remember_token = $nuevo_usuario->password;
                $nuevo_usuario->avatar = 'users/default.png';
                $nuevo_usuario->created_at = new Datetime;
                $nuevo_usuario->updated_at = new Datetime;
                $nuevo_usuario->role_id = 2;

                $nuevo_usuario->save();

                $nuevo_team = new Team;

                $nuevo_team->name = substr($nuevo_usuario->name, 0, (strpos($nuevo_usuario->name, ' ')+1))."'s Team";
                $nuevo_team->user_id = $nuevo_usuario->id;
                $nuevo_team->personal_team = true;
                $nuevo_team->created_at = new Datetime;
                $nuevo_team->updated_at = new Datetime;

                $nuevo_team->save();

                $nuevo_usuario->current_team_id = $nuevo_team->id;

                $nuevo_usuario->save();
        }




    }
}
