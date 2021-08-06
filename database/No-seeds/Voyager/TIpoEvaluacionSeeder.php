<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TiposResultadosEvaluacion;

class TIpoEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (TiposResultadosEvaluacion::count() == 0) {
            TiposResultadosEvaluacion::create(['nombre' => "aprobado"]);
            TiposResultadosEvaluacion::create(['nombre' => "rechazado"]);
            TiposResultadosEvaluacion::create(['nombre' => "sin evaluar"]);

        }

    }
}
