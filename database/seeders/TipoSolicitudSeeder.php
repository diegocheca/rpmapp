<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\formWebModels\formTipoDocumento;
use App\Models\formWebModels\formTipoSolicitud;

class TipoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$tipo = formTipoSolicitud:: 
        formTipoSolicitud::create([
            'id' => 1,
            'nombre' => 'Solicitud de exploracion',
        ]);
        formTipoSolicitud::create([
            'id' => 2,
            'nombre' => 'Manifestación de descubrimiento',
        ]);
    }
}