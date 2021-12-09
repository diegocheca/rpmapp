<?php

namespace App\Http\Controllers;

use App\Models\Productores;
use App\Models\MinaCantera;
use App\Models\ProductorMina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Imports\ProductoresImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$productores = Productores::all();
        return Inertia::render('Productores/List', ['productores' => 
        Productores::when($request-> term , function($query , $term){
            $query->where('razonsocial', 'LIKE', '%'.$term.'%');
        })->paginate(5),
         'alertType'=>'']);
    }


    public function mostrar_datos($id)
    {
        $productores = Productores::find($id);
        return response()->json([
			'productor' => $productores,
			'msg' => 'se encontro correctamente',
			'id' => $id
		],201);
    }

    public static function productoresUsuario()
    {
        $user = HomeController::userData();
        if(Auth::user()->hasRole('Productor'))
        {
            $productores = Productores::where('usuario_creador', Auth::user()->id)->where('leal_provincia', '=', Auth::user()->id_provincia)->get();
        }
        elseif(Auth::user()->hasRole('Autoridad')) {
            $productores = Productores::select('*')->where('leal_provincia', '=', Auth::user()->id_provincia)->get();
        }
        else //administrador
            $productores = Productores::all();

        return [
            'productores' => $productores
        ];
    }

    public static function getProductorMina($id){
		//dd($id);
		$productorMina = DB::table('productor_mina')
        ->join('mina_cantera', 'productor_mina.id_mina', '=', 'mina_cantera.id')
        ->where('productor_mina.id_productor', $id)
        ->select('mina_cantera.id as value', 'mina_cantera.nombre as label')
        // ->orderBy('mina_cantera.nombre')
        ->get();
		return response()->json($productorMina);

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Productores/Form');
    }

    public function store(Request $request)
    {
        Productores::create($request->all());
        return Redirect::route('productores.index');
    }

    public function show(Productores $productores)
    {
        //
    }

    public function edit($id)
    {
        $productor = Productores::find($id);
        //dd($productorMina);
        return Inertia::render('Productores/EditForm', ['productor' => $productor]);
    }

    public function update(Request $request, Productores $productores)
    {
        $productores->update($request->all());
        return Redirect::route('productores.index');
    }

    public function destroy($id_a_buscar)
    {
        if (($id_a_buscar != null) && (is_numeric($id_a_buscar))) {
            Productores::find($id_a_buscar)->delete();
            return Redirect::route('productores.index');
        }
        return false;
    }

    public function importView()
    {
        // return view('ExportExcelCallCenter.index');
        return Inertia::render('Productores/importar');
    }

    public function import(Request $request)
    {
        // dd($request->file('import_file')->getClientOriginalName());
        // dd($request->file('import_file'));
        try {
            // var_dump($rows);
            $import = new ProductoresImport();
            Excel::import($import, $request->file('import_file'));
            $import->getRowCount();
            // Excel::import(new ProductoresImport, 'users.xlsx');
            // return redirect('/')->with('success', 'All good!');
            return 'Correcto';

            // return response()->json(["rows"=>$rows]);

        } catch (Exception $th) {
            echo $th->getMessage();
            // return 'Incorrecto';
        }
    }
}
