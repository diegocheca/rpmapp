<?php

namespace App\Http\Controllers;


use App\Models\ProductorMina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductorMinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $soy_administrador = false;
		$soy_autoridad = false;
		$soy_productor =false;
		$grafico_donut = []; 
        if(Auth::user()->hasRole('Administrador'))
		{
			$soy_administrador = true;
			$productorminas = 
            
            /* ProductorMina::select('*')
            ->paginate(5); */
            DB::table('productor_mina')
            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'productor_mina.id_formulario')
            ->select('productor_mina.*')
            ->orderBy('productor_mina.id', 'desc')
            ->paginate(5);

           /*  ProductorMina::select('id')
            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'productor_mina.id_formulario')
            ->paginate(5);

            DB::table('productor_mina')
            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'productor_mina.id_formulario')
            ->select('productor_mina.*')
            ->get(); */


            //var_dump($productorminas);die();
			//calculo valores para los productores
			//$temp = ProductorMina::select('id')->where('estado', '=','aprobado')->get();
			$grafico_donut["aprobados"] = 10;
			//$temp= ProductorMina::select('id')->where('estado', '=','reprobado')->get();
			$grafico_donut["reprobados"]  = 21;
			//$temp = ProductorMina::select('id')->where('estado', '=','borrador')->get();
			$grafico_donut["borrador_cant"] = 4;
			//$temp = ProductorMina::select('id')->where('estado', '=','en revision')->get();
			$grafico_donut["revision"] = 10;
			//$temp = ProductorMina::select('id')->where('estado', '=','con observacion')->get();
			$grafico_donut["observacion"]  = 8;
            return Inertia::render('ProductorMina/List', [
                'borradores' => $productorminas,
                'soy_autoridad' => $soy_autoridad ,
				'soy_administrador' => $soy_administrador, 
				'soy_productor' => $soy_productor, 
				'datos_donut' => $grafico_donut
            ]);
		}
		elseif(Auth::user()->hasRole('Autoridad'))
		{
			$soy_administrador = true;
			$productorminas = ProductorMina::select('*')
            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'productor_mina.id_formulario')
            ->where('form_alta_productores.provincia', '=', Auth::user()->id_provincia)
            ->paginate(5);
			//calculo valores para los productores
			//$temp = ProductorMina::select('id')->where('estado', '=','aprobado')->get();
			$grafico_donut["aprobados"] = 10;
			//$temp= ProductorMina::select('id')->where('estado', '=','reprobado')->get();
			$grafico_donut["reprobados"]  = 21;
			//$temp = ProductorMina::select('id')->where('estado', '=','borrador')->get();
			$grafico_donut["borrador_cant"] = 4;
			//$temp = ProductorMina::select('id')->where('estado', '=','en revision')->get();
			$grafico_donut["revision"] = 10;
			//$temp = ProductorMina::select('id')->where('estado', '=','con observacion')->get();
			$grafico_donut["observacion"]  = 8;
            return Inertia::render('ProductorMina/List', [
                'borradores' => $productorminas,
                'soy_autoridad' => $soy_autoridad ,
				'soy_administrador' => $soy_administrador, 
				'soy_productor' => $soy_productor, 
				'datos_donut' => $grafico_donut
            ]);
			return Inertia::render('Productors/List', [
				'borradores' => FormAltaProductor::select('*')
				->where('provincia', '=', Auth::user()->id_provincia)
				->paginate(5),
				'lista_minerales_cargados' => null,
				'soy_autoridad' => $soy_autoridad ,
				'soy_administrador' => $soy_administrador, 
				'soy_productor' => $soy_productor, 
				'datos_donut' => $grafico_donut
			]);
		}
		else{
			echo"hola";
		}

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('ProductorMina/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*dd($request->id_mina);
        $request->validate([
                'id_mina',
                'id_productor',
                'id_destino',
                'id_dia',
                'id_personal',
                'mercado_provincia',
                'mercado_provincias',
                'mercado_exportacion',
                'num_expediente_SIGETRAMI',
                'constancia_otros',
                'resol_concecion_minera',
                'fecha_preinscripcion',
                'fecha_renovacion',
                'primera_inscripcion',
                'caracter',
                'constancia_posecion',
                'id_producido'
        ]);*/
        ProductorMina::create($request->all());
        return Redirect::route('productores_minas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function show(ProductorMina $productorMina)
    {
        //
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productorMina = ProductorMina::find($id);
        //dd($productorMina);
        return Inertia::render('ProductorMina/EditForm', ['productor_mina' => $productorMina]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductorMina $productorMina)
    {
        //
        $productorMina->update($request->all());
        return Redirect::route('productores_minas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_a_buscar)
    {
        //
        //var_dump($id);die();
        
        if ( ($id_a_buscar != null) && (is_numeric($id_a_buscar)))
        {
            ProductorMina::find($id_a_buscar)->delete();
            return Redirect::route('productores_minas.index');
        }
        return false;

    }
}
