<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstadoProgramaExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Tipo estado',
            'Fecha creación',
        ];
    }
    public function collection()
    {
        $estadoprogramas = DB::table('estado_programas')->select(
            'estado_programas.id',
            'est_nombre',
            'created_at',
        )
            ->get();

        return $estadoprogramas;
    }
}
