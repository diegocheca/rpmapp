<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\EmailsAConfirmar;
use App\Http\Controllers\ChartsController;
use App\Models\iia_dia;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware(function ($request, $next) {
    //         $this->user = Auth::user();
    //         return $next($request);
    //     });
    // }
    public function index()
    {
        return view('pagina.index');
    }
    public function thanks()
    {
        //
        return view("confirmation.index");
    }
    public function dashboard()
    {
        $mi_rol = '';
        if (Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Administrador')) {
            $mi_rol = 'admin';

            $departments = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
            //datosDepartamentos
            $dataChart = new ChartsController();
            $dataChart->axis->x = 'departamentos';
            $dataChart->axis->y = 'cantidad';
            $deptos = CountriesController::datosDepartamentos(Auth::user()->id_provincia);
            $dataChart->data = $deptos;
            $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);

            $iiaDiaList = DB::table('iia_dia')
            ->whereNotNull('fecha_vencimiento')
            ->leftjoin('productores', 'iia_dia.id_formulario', '=', 'productores.id_formulario')
            ->get();

            $calendarEvents = [ 'iiaDia' => $iiaDiaList];

            return Inertia::render('Dashboard', ['userType' => $mi_rol, 'dataChart' => $dataChart, 'calendarEvents' => $calendarEvents]);
        } else if (Auth::user()->hasRole('Productor')) {
            $mi_rol = 'productor';

            return Inertia::render('Dashboard', ['userType' => $mi_rol]);
        }
    }
    public function mostrar_datos_por_dtpo()
    {
        $departments = CountriesController::datosDepartamentos(Auth::user()->id_provincia);
        var_dump($departments);
        die();
    }

    static function userData()
    {
        $user = Auth::user();
        $user->province = CountriesController::getProvince(Auth::user()->id_provincia);
        return $user;
    }

    public function valdiar_email_de_productor($codigo)
    {
        //
        //dd($codigo);
        $email_a_validar = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo)->first();
        //dd($email_a_validar);
        $email_a_validar->codigo = null;
        $email_a_validar->confirmed_at = date("Y-m-d H:i:s");
        $email_a_validar->save();

        return view("confirmation.index");
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
