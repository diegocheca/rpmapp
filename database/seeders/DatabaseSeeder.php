<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        //$this->call(TipoSolicitudSeeder::class);


        $this->call(PermissionSeeder::class);
        $this->call(FormAltaSeeder::class);
        $this->call(ProductoresSeeder::class);
        $this->call(ReinscripcionSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(JobReciboSeeder::class);
        $this->call(JobEnvioSeeder::class);

        
        
        
        
        
    }
}
