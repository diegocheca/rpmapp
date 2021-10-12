<?php

namespace App\Imports;

use App\Models\Productores;
use App\Models\MinaCantera;
use App\Models\ProductorMina;
use App\Models\Productos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ProductoresImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    private $numRows = 0;
    public function model(array $row)
    {
        // dd($row);
        ++$this->numRows;
        $productores = new Productores([
            'cuit' => '',
            'razonsocial' => !empty($row['persona_fisicajuridica']) ? $row['persona_fisicajuridica'] : '',
            'numeroproductor' => !empty($row['rpm_n']) ? $row['rpm_n'] : 0,
            'email' => 'SIN DATO',
            'domicilio_prod' => !empty($row['domicilio']) ? $row['domicilio'] : '',
            'tiposociedad' => !empty($row['actividadmodalidad']) ? $row['actividad'] : '',
            'inscripciondgr' => 'SIN DATO',
            'constaciasociedad' => 'SIN DATO',
            'leal_calle' => 'SIN DATO',
            'leal_numero' => 0,
            'leal_telefono' => !empty($row['telefono']) ? $row['telefono'] : 0,
            'leal_pais' => 'SIN DATO',
            'leal_provincia' => 'SIN DATO',
            'leal_departamento' => !empty($row['departamento']) ? $row['departamento'] : '',
            'leal_localidad' => 'SIN DATO',
            'leal_cp' => 0,
            'leal_otro' => 'SIN DATO',
            'administracion_calle' => 'SIN DATO',
            'administracion_numero' => 'SIN DATO',
            'administracion_telefono' => !empty($row['telefono']) ? $row['telefono'] : 0,
            'administracion_pais' => 'SIN DATO',
            'administracion_provincia' => 'SIN DATO',
            'administracion_departamento' => !empty($row['departamento']) ? $row['departamento'] : '',
            'administracion_localidad' => 'SIN DATO',
            'administracion_cp' => 0,
            'administracion_otro' => 'SIN DATO',
            'numero_expdiente' => !empty($row['n_de_expediente']) ? $row['n_de_expediente'] : '',
            'created_by' => 0,
            'estado' => 'SIN DATO',
            // 'created_at',
            // 'deleted_at',
            // 'updated_at' ,
        ]);
        // $mina = new MinaCantera([
        //     'tipo' => !empty($row['']) ? $row[''] : '',
        //     'localidad_mina_pais' => !empty($row['']) ? $row[''] : '',
        //     'localidad_mina_provincia' => !empty($row['']) ? $row[''] : '',
        //     'localidad_mina_departamento' => !empty($row['']) ? $row[''] : '',
        //     'localidad_mina_localidad' => !empty($row['']) ? $row[''] : '',
        //     'nombre' => !empty($row['nombre_de_minacantera']) ? $row['nombre_de_minacantera'] : '',
        //     'descripcion' => !empty($row['']) ? $row[''] : '',
        //     'categoria' => !empty($row['']) ? $row[''] : '',
        //     'distrito_minero' => !empty($row['']) ? $row[''] : '',
        //     'tipo_sistema' => !empty($row['']) ? $row[''] : '',
        //     'longitud' => !empty($row['']) ? $row[''] : '',
        //     'latitud' => !empty($row['']) ? $row[''] : '',
        //     'labores' => !empty($row['']) ? $row[''] : '',
        //     'id_producido' => !empty($row['']) ? $row[''] : '',
        //     'plano_inmueble' => !empty($row['']) ? $row[''] : '',
        //     'estado' => !empty($row['']) ? $row[''] : '',
        //     'titulo_contrato_posecion' => !empty($row['']) ? $row[''] : '',
        //     'resolucion_concesion_minera' => !empty($row['']) ? $row[''] : '',
        //     'owner' => !empty($row['']) ? $row[''] : '',
        //     'arrendatario' => !empty($row['']) ? $row[''] : '',
        //     'concesionario' => !empty($row['']) ? $row[''] : '',
        //     'otros' => !empty($row['']) ? $row[''] : '',
        //     'acciones_a_desarrollar' => !empty($row['']) ? $row[''] : '',
        //     'actividad' => !empty($row['']) ? $row[''] : '',
        //     'sustancias_de_aprovechamiento_comun' => !empty($row['']) ? $row[''] : '',
        //     'otro_caracter_acalaracion' => !empty($row['']) ? $row[''] : '',
        //     'sustancias_de_aprovechamiento_comun_aclaracion' => !empty($row['']) ? $row[''] : '',
        //     'id_formulario' => !empty($row['']) ? $row[''] : '',
        // ]);
        // $prod_mina = new ProductorMina([
        //     'id_mina' => !empty($row['']) ? $row[''] : '',
        //     'id_productor' => !empty($row['']) ? $row[''] : '',
        //     'id_formulario' => !empty($row['']) ? $row[''] : '',
        //     'id_dia' => !empty($row['']) ? $row[''] : '',
        //     'id_personal' => !empty($row['']) ? $row[''] : '',
        //     'num_expediente_SIGETRAMI' => !empty($row['']) ? $row[''] : '',
        //     'constancia_otros' => !empty($row['']) ? $row[''] : '',
        //     'resol_concecion_minera' => !empty($row['']) ? $row[''] : '',
        //     'fecha_preinscripcion' => !empty($row['']) ? $row[''] : '',
        //     'fecha_renovacion' => !empty($row['']) ? $row[''] : '',
        //     'primera_inscripcion' => !empty($row['']) ? $row[''] : '',
        //     'caracter' => !empty($row['']) ? $row[''] : '',
        //     'constancia_posecion' => !empty($row['']) ? $row[''] : '',
        //     'periodo' => !empty($row['']) ? $row[''] : '',
        // ]);
        $produc = explode(' ', $row['pruduccion_indicar_unidades']);
        $producto = new Productos([
            'id_reinscripcion' => !empty($row['']) ? $row[''] : 1,
            'nombre_mineral' => !empty($row['producto']) ? $row['producto'] : '',
            'variedad' => !empty($row['variedad']) ? $row['variedad'] : '',
            'produccion' => !empty($produc[0]) ? $produc[0] : 0,
            'unidades' => !empty($row['']) ? $row[''] : '',
            //'otra_unidad' => !empty($row['']) ? $row[''] : '',
            'precio_venta' => !empty($row['precio_de_venta']) ? $row['precio_de_venta'] : 0,
            'estado' => !empty($row['']) ? $row[''] : '',
        ]);
        //minas, productor-mina, producto
        // return [$productores,$producto];
        return [$producto];
    }
    public function getRowCount(): int
    {
        return $this->numRows;
    }
    public function headingRow(): int
    {
        return 2;
    }
    #FUNCION PARA VALIDAR
    // public function rules(): array
    // {
    //     return [
    //         'razonsocial' => 'nullable',
    //         'numeroproductor' => 'nullable',
    //     ];
    // }
}
