<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MunicipioExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Departamento',
            'Municipio',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $municipios = DB::table('municipios')->select(
            'municipios.id',
            'dep_nombre',
            'mun_nombre',
            'municipios.created_at',
        )->join('departamentos','municipios.mun_departamento','=','departamentos.id')
            ->get();

        return $municipios;
    }
}
