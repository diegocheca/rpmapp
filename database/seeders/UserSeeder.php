<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kucho Torres',
            'email' => 'kuchotorres77@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Luis Torres',
            'email' => 'ltorres.godoy77@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('User');

        User::factory(10)->create();
    }
}
