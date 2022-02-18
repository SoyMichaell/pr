<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SoftwareExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Nombre software',
            'Nombre desarrollador',
            'Número de licencia',
            'Fecha adquisición de licencia',
            'Fecha vencimiento de licencia',
            'Docente',
        ];
    }
    public function collection()
    {
        $softwares = DB::table('software')->select(
            'software.id',
            'sof_nombre',
            'sof_desarrollador',
            'sof_numero_licencia',
            'sof_adquisicion_licencia',
            'sof_vencimiento_licencia',
            DB::raw("CONCAT(doc_nombre,' ',doc_apellido)")
        )
            ->join('docentes', 'software.sof_id_docente', '=', 'docentes.id')
            ->get();

        return $softwares;
    }
}
