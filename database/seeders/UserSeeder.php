<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    public function run()
    {
        # ELIMINAR TABLAS
        DB::table('users')->truncate();

        # USUARIOS
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('123456789'),
            'id_provincia' => 70,
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Autoridad',
            'email' => 'autoridad@gmail.com',
            'password' => bcrypt('123456789'),
            'id_provincia' => 70,
        ])->assignRole('Autoridad');

        User::create([
            'name' => 'Productor',
            'email' => 'productor@gmail.com',
            'password' => bcrypt('123456789'),
            'id_provincia' => 70,
        ])->assignRole('Productor');

        User::create([
            'name' => 'Kucho Torres',
            'email' => 'kuchotorres77@gmail.com',
            'password' => bcrypt('123456789'),
            'id_provincia' => 70,
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Diego Checcarelli',
            'email' => 'diegochecarelli@hotmail.com',
            'password' => bcrypt('password'),
            'id_provincia' => 70,
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Luis Torres',
            'email' => 'ltorres.godoy77@gmail.com',
            'password' => bcrypt('123456789'),
            'id_provincia' => 70,
        ])->assignRole('User');

        // User::factory(10)->create();
    }
}
