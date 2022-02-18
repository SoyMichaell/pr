<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConveniosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Nombre convenio',
            'País','Objetivo convenio',
            'Fecha convenio',
        ];
    }
    public function collection()
    {
        $convenios = DB::table('convenio')->select(
            'convenio.id','con_nombre',
            'con_pais','con_objetivo',
            'con_fecha_convenio',
        )
            ->get();

        return $convenios;
    }
}
