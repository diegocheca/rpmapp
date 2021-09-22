<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\EmailsAConfirmar;

class ReportsController extends Controller
{
    public function __construct(){
        $this->dataChart = new \stdClass();
        $this->axis = new \stdClass();
        $this->axis->x = '';
        $this->axis->y = '';
        $this->dataChart->axis = $this->axis;
        $this->dataChart->data = [];
        $this->dataChart->province = '';
    }

    public function reportes()
    {
        $mi_rol = '';
        if(Auth::user()->hasRole('Autoridad'))
            $mi_rol = 'admin';
        if(Auth::user()->hasRole('Administrador'))
            $mi_rol = 'admin';
        if(Auth::user()->hasRole('Productor'))
            $mi_rol = 'productor';


        $dataChart = $this->dataChart;

        $dataChart->axis->x = 'departamentos';
        $dataChart->axis->y = 'cantidad';
        $dataChart->data = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
        $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);
        dd($dataChart);
        return Inertia::render('Dashboard', ['userType' => $mi_rol,'dataChart'=> $dataChart ]);
    }
}
