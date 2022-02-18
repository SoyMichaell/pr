<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RedesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Nombre red',
            'Acción o objetivo',
            'Fecha de afiliación',
            'Programa',
        ];
    }
    public function collection()
    {
        $redes = DB::table('redes_academicas')->select(
            'redes_academicas.id',
            'red_nombre',
            'red_accion',
            'red_fecha_afiliacion',
            'red_programa',
        )
            ->get();

        return $redes;
    }
}
