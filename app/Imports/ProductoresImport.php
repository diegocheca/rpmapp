<?php

namespace App\Imports;

use App\Models\Productores;
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
        return new Productores([
            'cuit' => '',
            'razonsocial' => !empty($row['empresa']) ? $row['empresa'] : '',
            'numeroproductor' => !empty($row['rpm']) ? $row['rpm'] : 0,
            'email' => 'SIN DATO',
            'domicilio_prod' => !empty($row['domicilio_legal']) ? $row['domicilio_legal'] : '',
            'tiposociedad' => !empty($row['actividad']) ? $row['actividad'] : '',
            'inscripciondgr' => 'SIN DATO',
            'constaciasociedad' => 'SIN DATO',
            'leal_calle' => 'SIN DATO',
            'leal_numero' => 0,
            'leal_telefono' => !empty($row['tel_fax']) ? $row['tel_fax'] : 0,
            'leal_pais' => 'SIN DATO',
            'leal_provincia' => 'SIN DATO',
            'leal_departamento' => !empty($row['departamento']) ? $row['departamento'] : '',
            'leal_localidad' => 'SIN DATO',
            'leal_cp' => 0,
            'leal_otro' => 'SIN DATO',
            'administracion_calle' => 'SIN DATO',
            'administracion_numero' => 'SIN DATO',
            'administracion_telefono' => !empty($row['tel_fax']) ? $row['tel_fax'] : 0,
            'administracion_pais' => 'SIN DATO',
            'administracion_provincia' => 'SIN DATO',
            'administracion_departamento' => !empty($row['departamento']) ? $row['departamento'] : '',
            'administracion_localidad' => 'SIN DATO',
            'administracion_cp' => 0,
            'administracion_otro' => 'SIN DATO',
            'numero_expdiente' => !empty($row['num_exp']) ? $row['num_exp'] : '',
            'created_by' => 0,
            'estado' => 'SIN DATO',
            // 'created_at',
            // 'deleted_at',
            // 'updated_at' ,
        ]);
    }
    public function getRowCount(): int
    {
        return $this->numRows;
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
