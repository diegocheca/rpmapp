<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\EmailsAConfirmar;
use App\Http\Controllers\ChartsController;

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
        return view("pagina.index");
    }
    public function thanks()
    {
        //
        return view("confirmation.index");
    }
    public function dashboard()
    {
        $mi_rol = '';
<<<<<<< HEAD
        if(Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Administrador')){
            $mi_rol = 'admin';

            $departments = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
            $dataChart = new ChartsController();
            $dataChart->axis->x = 'departamentos';
            $dataChart->axis->y = 'cantidad';
            $dataChart->data = $departments;
            $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);

            return Inertia::render('Dashboard', ['userType' => $mi_rol,'dataChart'=> $dataChart ]);

        } else if(Auth::user()->hasRole('Productor')){
            $mi_rol = 'productor';

            return Inertia::render('Dashboard', ['userType' => $mi_rol ]);
        }

=======
        if (Auth::user()->hasRole('Autoridad'))
            $mi_rol = 'admin';
        if (Auth::user()->hasRole('Administrador'))
            $mi_rol = 'admin';
        if (Auth::user()->hasRole('Productor'))
            $mi_rol = 'productor';

        $departments = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
        $dataChart = new \stdClass();
        $axis = new \stdClass();
        $axis->x = 'departamentos';
        $axis->y = 'cantidad';
        $dataChart->axis = $axis;
        $dataChart->data = $departments;
        $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);
        return Inertia::render('Dashboard', ['userType' => $mi_rol,'dataChart'=> $dataChart ]);
>>>>>>> 28c8c6d4091fc30ce0f8d4b7ca32bad93a66df93
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
