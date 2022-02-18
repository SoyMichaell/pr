<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FacultadExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Facultad',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $facultades = DB::table('facultades')->select(
            'facultades.id',
            'fac_nombre',
            'created_at',
        )
            ->get();

        return $facultades;
    }
}
