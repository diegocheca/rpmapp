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
        if(Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Administrador')){
            $mi_rol = 'admin';

            $departments = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
            //datosDepartamentos
            $dataChart = new ChartsController();
            $dataChart->axis->x = 'departamentos';
            $dataChart->axis->y = 'cantidad';
            $deptos = CountriesController::datosDepartamentos(Auth::user()->id_provincia);
            $dataChart->data = $deptos ;
            $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);

            return Inertia::render('Dashboard', ['userType' => $mi_rol,'dataChart'=> $dataChart ]);

        } else if(Auth::user()->hasRole('Productor')){
            $mi_rol = 'productor';

            return Inertia::render('Dashboard', ['userType' => $mi_rol ]);
        }

    }
    public function mostrar_datos_por_dtpo(){
        $departments = CountriesController::datosDepartamentos(Auth::user()->id_provincia);
        var_dump($departments);die();
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

    public function cargandoexcelmdz(){
        $array = [];
        $array[1] = [1,"El Sosneado","San Rafael",2774,"2354-B-2002",null,"Arroyo La Manga","Carbón",false,1,2,"null","20-11617671-9","S/Mensura","Borrado","ver pasivos","null"];
        $array[2] = [1,"El Sosneado","San Rafael",2648,"2100-C-1999",null,"Atahualpa","Cobre Disem.",true,1,1,"null","null","S/Mensura","Vacante","inactiva","null"];
        $array[3] = [1,"El Sosneado","San Rafael",2209,"39-P-1983",null,"Atuel","Turba",false,2,1,"null","null","S/Mensura","Borrado","ver pasivos","null"];
        $array[4] = [1,"El Sosneado","San Rafael",17,"4249-C-41",null,"Baku","Petroleo",false,1,5,"Petroquimica Comodoro Rivadavia Sa","30-056359811-1","Mensurada","Vigente","explotación","null"];
        $array[5] = [1,"El Sosneado","San Rafael",0,"2878-M-2005",null,"Barroso","Cobre-Oro",false,1,1,"Minera Agaucu S.A.","null","S/Mensura","Vigente","inactiva","577-M-2011"];
        $array[6] = [1,"El Sosneado","San Rafael",2635,"3520-V-2010",null,"Beatriz","Cobre Disem.",true,1,35,"null","null","S/Mensura","Vacante","inactiva","null"];
        $array[7] = [1,"El Sosneado","San Rafael",21,"1307-D-27",null,"Bolivar","Brea Petrolifera",false,1,6,"null","null","Mensurada","Borrado","ver pasivos","null"];
        $array[8] = [1,"El Sosneado","San Rafael",16,"4249-C-41",null,"Cerro Del Alquitran","Petroleo",false,1,5,"Petroquimica Comodoro Rivadavia Sa","30-056359811-1","Mensurada","Vigente","explotación","null"];
        $array[9] = [1,"El Sosneado","San Rafael",2588,"2104-C-1999",null,"Chipre","Cobre Disem.",true,1,1,"Concina, Raúl Ernesto","null","S/Mensura","Vacante","inactiva","null"];
        $array[10] = [1,"El Sosneado","San Rafael",8,"178-H-11",null,"Cooper","Azufre",false,1,3,"null","null","Mensurada","Borrado","ver pasivos","null"];
        $array[11] = [1,"El Sosneado","San Rafael",1,"3451-N-1943",null,"El Condor","Carbon",false,1,3,"Cruz Del Sur Y Cia Srl ","90-81043108-2","Mensurada","Vigente","reserva","null"];
        $array[12] = [1,"El Sosneado","San Rafael",10,"1931-M-40",null,"Eloisa","Carbon",false,1,7,"null","null","Mensurada","Borrado","ver pasivos","null"];
        $array[13] = [1,"El Sosneado","San Rafael",20,"383-H-1947",null,"Falucho","Brea Petrolifera",false,1,3,"Pott Godoy, M Y Ot","null","Mensurada","Vigente","reserva","null"];
        $array[14] = [1,"El Sosneado","San Rafael",12,"4031-J-39",null,"General Mitre","Carbon",false,1,7,"null","null","Mensurada","Borrado","ver pasivos","null"];
        $array[15] = [1,"El Sosneado","San Rafael",11,"4030-L-39",null,"General Roca","Carbon",false,1,7,"null","null","Mensurada","Borrado","ver pasivos","null"];
        $array[16] = [1,"El Sosneado","San Rafael",13,"4249-C-1941",null,"General San Martin","Petroleo",false,1,5,"El Sosneado Cia Argentina De Petróleo S.A.","30-64434151-4","Mensurada","Vigente","reserva","null"];
        $array[17] = [1,"El Sosneado","San Rafael",2738,"2171-C-2000",null,"La Negra","Cobre Disem.",true,1,1,"null","null","S/Mensura","Vacante","inactiva","null"];
        $array[18] = [1,"El Sosneado","San Rafael",18,"4249-C-41",null,"La Paloma","Petroleo",false,1,5,"Petroquimica Comodoro Rivadavia Sa","30-056359811-1","Mensurada","Vigente","explotación","null"];
        $array[19] = [1,"El Sosneado","San Rafael",7,"4249-C-1941",null,"Los Buitres","Petroleo",false,1,5,"Petroquimica Comodoro Rivadavia Sa","30-056359811-1","Mensurada","Vigente","explotación","null"];
        $array[20] = [1,"El Sosneado","San Rafael",2591,"2317-D-2002",null,"Los Gateados","Oro,Plata,Cobre Dis.",true,1,1,"null","null","S/Mensura","Borrado","ver pasivos","null"];
        for($i=1; $i<=20;$i++){
            
        }

    }
}
