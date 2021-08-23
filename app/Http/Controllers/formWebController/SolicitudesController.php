<?php
 

namespace App\Http\Controllers\formWebController;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\formWebController\TipoDocumentoController;
use App\Http\Controllers\formWebController\MineralController;
use App\Http\Controllers\formWebController\EstadoTerrenoController;
use App\Http\Controllers\formWebController\TerrenoController;
// use App\Http\Controllers\formWebController\PdfController;

//Modelos DB
use App\Models\formWebModels\formSolicitud;
use App\Models\formWebModels\formTipoSolicitud;
use App\Models\formWebModels\formTipoDocumento;
use App\Models\formWebModels\formPersona;
use App\Models\formWebModels\formRazonSocial;
use App\Models\formWebModels\formRolPersona;
use App\Models\formWebModels\form_persona_form_solicitud;
use App\Models\formWebModels\form_razon_social_form_solicitud;
use App\Models\formWebModels\formMatriculaCatastral;
use App\Models\Minerales;
use App\Models\formWebModels\formEstadoTerreno;
use App\Models\formWebModels\formTerreno;
use App\Models\formWebModels\formCoordenadasPoligonal;


class SolicitudesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
       
        return  Inertia::render('formWeb/mostrar');// muestra las dos op de solicitud q hay
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 

     //solicitud_exploracion
   public function create()
    {
        $provinces = CountriesController::getProvinces(); //trae todas las provincias desde model        
        $tipo_documento = TipoDocumentoController::getTipoDocumento();//trae todas las tipo_doc desde model
        $tipo_solicitud= TipoSolicitudController::getTipoSolicitud(); 
        $mineral = MineralController::getMineral();//trae todos los minerales desde model
        $estado_terreno = EstadoTerrenoController::getEstadoTerreno();//trae todos los estados del terreno desde model
       
        return Inertia::render('formWeb/Form', [
            'action' => "create",
            'saveUrl' => "solicitudes.store",            
            'saveFileUrl' => "solicitudes.update",
            // 'province' => env('PROVINCE', 'sanjuan') . "/reinscripciones-wizard", 
            'province' => env('PROVINCE', 'sanjuan') . "/s_exploracion_wizard",          
            'folder' => 'solicitudes',
            'reinscripcion' => [],
            'titleForm' => 'Crear Solicitud Exploración',
            'evaluate' => false,
            'provincia' => $provinces,            
            'tipo_documento'=>$tipo_documento,            
            'tipo_de_solicitud'=> $tipo_solicitud, 
            'mineral'=>$mineral,
            'estado_terreno'=> $estado_terreno,
        ]);
    }  
    //solicitud_descubrimiento
    public function crear_descu(){

               
       $provinces = CountriesController::getProvinces(); //trae todas las provincias desde model        
        $tipo_documento = TipoDocumentoController::getTipoDocumento();//trae todas las tipo_doc desde model
        $tipo_solicitud= TipoSolicitudController::getTipoSolicitud(); 
        $mineral = MineralController::getMineral();//trae todos los minerales desde model
        $estado_terreno = EstadoTerrenoController::getEstadoTerreno();//trae todos los estados del terreno desde model
       
        return Inertia::render('formWeb/Form', [
            'action' => "crear_descu",
            'saveUrl' => "solicitudes.store",            
            'saveFileUrl' => "solicitudes.update",
            'province' => env('PROVINCE', 'sanjuan') . "/s_descubrimiento_wizard",
            'titleForm' => 'Crear Solicitud Descubrimeinto',
            'provincia' => $provinces,            
            'tipo_documento'=>$tipo_documento,            
            'tipo_de_solicitud'=> $tipo_solicitud, 
            'mineral'=>$mineral,
            'estado_terreno'=> $estado_terreno,
        ]);

    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
         
        //procesa datos de solicitud_exploracion
     public function postSolicitudes(Request $request)
    {     
        
          $Step = $request->step;
          $Datos = $request->datos;  
      
        switch ($Step) 
        {   
            case 1: //DATOS SOLICITUD                
                $plazo= $Datos['plazo_soli'];
                $n_exp= $Datos['num_expediente'];
                $periodo = $Datos['periodo']['value'];
                $programa = $Datos['programa_adjunto']['value'];
                $tipo = 'Exploracion';
                $datoSoli =[
                'plazo_solicitado' =>$plazo,
                'programa_trabajo' =>$programa,
                'periodo_trabajo' =>$periodo,  
                'tipo_solicitud' => $tipo,
                'nro_expediente' =>  $n_exp,
                                
                ];
                formSolicitud::create($datoSoli);
                 break;

            
            case 2: //DATOS SOLICITANTE              
                                                        
                    $domicilio= $Datos['domicilio']; 
                    $provincia = $Datos['provincia']['value'];
                    $departamento = $Datos['departamento']['value'];
                    $localidad = $Datos['localidad']['value'];
                    $domicilioLegal = $Datos['domicilioLegal'];                    
                    $provinciaLegal= $Datos['provinciaLegal']['value'];
                    $departamentoLegal = $Datos['departamentoLegal']['value'];
                    $localidadLegal= $Datos['localidadLegal']['value'];
                    $rs= $Datos['nombrers']; 
                    $t_persona= $Datos['opcion']['value'];
                    $estado_civil = $Datos['estado_civil']['value'];
                    $tipo_documento= $Datos['tipo_documento']['value'];
                    $nombre = $Datos['nombre'];
                    $apellido = $Datos['apellido'];
                    $dni = $Datos['dni'];
                    $nacionalidad = $Datos['nacionalidad'];
                    $profesion = $Datos['profesion'];
                    $fecha_nacimiento= $Datos['fecha_nacimiento'];
                    $sexo= $Datos['sexo']['value'];

                    $p= formPersona::all('id')->count(); //verifica q la tabla este vacia

                    if ($p == 0) //si esta vacia cargo en tabla persona y pivit
                    {
                        $per=[                        
                            'domicilio'=>$domicilio,
                            'provincia' => $provincia,
                            'departamento' => $departamento,
                            'localidad' => $localidad,                            
                            'domicilioLegal' => $domicilioLegal,
                            'provinciaLegal'=> $provinciaLegal,
                            'departamentoLegal' => $departamentoLegal,
                            'localidadLegal'=> $localidadLegal, 
                            'razon_social' => $rs,                            
                            'sexo' => $sexo,
                            'estado_civil' => $estado_civil,
                            'tipodocumento_id'=>$tipo_documento,
                            'nombre' =>$nombre,
                            'apellido' =>$apellido,
                            'dni' => $dni,
                            'nacionalidad' => $nacionalidad,
                            'profesion' => $profesion,
                            'fecha_nacimiento'=>$fecha_nacimiento,                           
                        ];        
                        
                        $id_persona= formPersona::create($per); 
                        $id_persona->id; 
                        $rol='Solicitante';
                        
                        $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                        $id_persona->solicitud()->attach($solicitud_id,["rol" => $rol, "tipo_persona" => $t_persona]); 
                        
                    }
                    else
                    {
                        $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                        
                        foreach ($personas as $persona)
                        {
                            if(($persona->dni == $dni)&& ($persona->sexo == $sexo)) //la persona existe en la tabla persona, cargo en tabla pivot directamente
                            {  
                                $id_persona=$persona->id;
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud 
                                $rol='Solicitante';   
                                $array=[                                    
                                    'form_persona_id'=> $id_persona,
                                    'form_solicitud_id'=> $$solicitud_id,
                                    'rol'=>$rol,
                                    'tipo_persona'=> $t_persona,
                                    ] ;
                                   
                             form_persona_form_solicitud::create($array);
                            } 
                            else 
                            {
                                $per=[                        
                                    'domicilio'=>$domicilio,
                                    'provincia' => $provincia,
                                    'departamento' => $departamento,
                                    'localidad' => $localidad,                                    
                                    'domicilioLegal' => $domicilioLegal,
                                    'provinciaLegal'=> $provinciaLegal,
                                    'departamentoLegal' => $departamentoLegal,
                                    'localidadLegal'=> $localidadLegal, 
                                    'razon_social' => $rs,                                    
                                    'sexo' => $sexo,
                                    'estado_civil' => $estado_civil,
                                    'tipodocumento_id'=>$tipo_documento,
                                    'nombre' =>$nombre,
                                    'apellido' =>$apellido,
                                    'dni' => $dni,
                                    'nacionalidad' => $nacionalidad,
                                    'profesion' => $profesion,
                                    'fecha_nacimiento'=>$fecha_nacimiento,                           
                                ];  
                                $id_persona= formPersona::create($per); 
                                $id_persona->id; 
                                $rol='Solicitante'; 
                        
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                                $id_persona->solicitud()->attach($solicitud_id,["rol" => $rol, "tipo_persona" => $t_persona]); 

                            }                          
                        } 
                    }   
                 break;
               
            case 3: //DATOS REPRESENTANTE LEGAL               
               
                    $nom_rl= $Datos['nombre_rl']; 
                    $ap_rl= $Datos['apellido_rl']; 
                    $tipo_dni= $Datos['tipo_documento_rl']['value'];
                    $num_dni=$Datos['dni_rl'];
                    $dom_rl=$Datos['domi_rl'];
                    $sex = $Datos['sexoRL']['value'];
                   
                    $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                        foreach ($personas as $persona)
                         {
                           if(($persona->dni == $num_dni)&& ($persona->sexo == $sex))
                           {   
                             $id_persona=$persona->id;
                             $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                             $rol='Representante Legal';   
                             $array=[                             
                                  'form_persona_id'=> $id_persona,
                                  'form_solicitud_id'=> $ $solicitud_id,
                                  'rol'=>$rol,                                  
                             ] ;
                            form_persona_form_solicitud::create($array);  
                           }
                           else
                           {
                            $rep_legal =[                        
                                'nombre'=>$nom_rl,
                                'apellido' => $ap_rl,
                                'tipodocumento_id' => $tipo_dni,
                                'dni' => $num_dni,
                                'domicilio' => $dom_rl,
                                'sexo' => $sex,
                              ];
          
                            $id_rep_legal= formPersona::create( $rep_legal); 
                            $id_rep_legal->id;                   
                            $rol='Representante Legal'; //rol es representante legal
                            $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                            $id_rep_legal->solicitud()->attach($solicitud_id,["rol" => $rol]);
                           }
                         }               
                break;
                
            case 4: //DATOS TERRENO-MINERAL-CATEGORIA-MATRICULA CATASTRAL Y COORDENADAS
                                                               
                $mineral= $Datos['mineral']['value'];
                $categoria= $Datos['categoria']['value'];
                $supH= $Datos['sup_hectarias'];
                $estado_terreno= $Datos['estado_terreno']['value'];
                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud

                $terreno=[
                    'superficie'=>$supH,
                    'solicitud_id'=>$solicitud_id,
                ];                               
                
                $id_terreno=formTerreno::create($terreno);
                $id_terreno->id;//guardo id terreno
                $id_t=$id_terreno->id;
                $id_terreno->mineral()->attach($mineral,["categoria_mineral" => $categoria]); //inserta tabla pivot terreno-mineral
                $id_terreno->estado_terreno()->attach($estado_terreno); //inserta tabla pivot terreno-estadoterreno
                
                //matricula catastral
                $ne_x = $Datos['ne_x'];
                $ne_y = $Datos['ne_y'];
                $so_x = $Datos['so_x'];
                $so_y = $Datos['so_y'];
                $terreno_id= formTerreno::all()->last()->id;             
              
                $mc=[
                    'NE_X'=>$ne_x,
                    'NE_Y'=>$ne_y,
                    'SO_X'=>$so_x,
                    'SO_Y'=>$so_y,     
                    'terreno_id'=>$terreno_id,             
                ];                             
               formMatriculaCatastral::create($mc);  
                
                //coordenadas     
               if (count ($Datos)>=0){
                  foreach($Datos as $key => $dato){
                      echo $key.'--';
                   if (is_numeric($key)){ 
                        if(!!($dato)){
                            $x= $dato['x'];                   
                            $y= $dato['y'];
                                $cor=[
                                'X'=>$x,
                                'Y'=>$y,
                                'terreno_id'=> $id_t,
                                ];                        
                        formCoordenadasPoligonal::create($cor);  
                       }                       
                    }               
                 }
                }  
                break;
           
            case 5: //DATOS PROPIETARIO   

                     $nombre = $Datos['nombre_prop'];
                     $apellido = $Datos['apellido_prop'];
                     $dni = $Datos['dni_prop'];
                     $tipo_documento= $Datos['tipo_documento']['value'];
                     $provincia = $Datos['prov_prop']['value'];                    
                     $domicilio = $Datos['domi_prop'];                    

                     $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                     foreach ($personas as $persona)
                      {
                        if($persona->dni == $dni)
                        // if(($persona->dni == $dni)&& ($persona->sexo == $sex))
                        {   
                          $id_persona=$persona->id;
                          $id_solicitud='1'; 
                          $rol='Propietario';   
                          $array=[                          
                               'form_persona_id'=> $id_persona,
                               'form_solicitud_id'=> $id_solicitud,
                               'rol'=>$rol,
                          ] ;
                         form_persona_form_solicitud::create($array);                    
                                               
                        }
                        else
                        {
                           $prop =[                      
                            'nombre'=>$nombre,
                            'apellido' => $apellido,
                            'tipodocumento_id' => $tipo_documento,
                            'dni' => $dni,
                            'provincia'=> $provincia,                                         
                            'domicilio'=>$domicilio,                                         
                            ];
                   
                               $id_propietario= formPersona::create( $prop); 
                               $id_propietario->id;                   
                               $rol='Propietario'; //rol es representante legal
                               $id_solicitud='1'; 
                               $id_propietario->solicitud()->attach($id_solicitud,["rol" => $rol]);
                        }   
                      } 
                break;
            case 6: //RESUMEN DE SOLICITUD
                break;
            }  
                
         // dd($request);
         return response()->json('ok');
     
    }
     //procesa datos de solicitud_descubrimiento
    public function procesa (Request $request)
    { 
         echo "hola";
        dd();
       
     
    }

   public function store(Request $request)
    {        
        //  formSolicitud::create($request->all()); //content
           return Redirect::route('solicitudes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



