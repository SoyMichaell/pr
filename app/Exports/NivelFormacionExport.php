<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NivelFormacionExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Nivel formación',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $nivelformacion = DB::table('nivelformacion')->select(
            'nivelformacion.id',
            'niv_nombre',
            'created_at',
        )
        ->get();

        return $nivelformacion;
    }
}
