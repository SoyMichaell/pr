<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepartamentoExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Departamento',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $departamentos = DB::table('departamentos')->select(
            'departamentos.id',
            'dep_nombre',
            'created_at',
        )
            ->get();

        return $departamentos;
    }
}
