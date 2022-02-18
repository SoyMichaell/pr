<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExtensionsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Nombre evento',
            'Tipo evento','Fecha realización',
            'Público objeto','Ponente (s)',
            'País','Número de participantes',
            'Url imagenes',
        ];
    }
    public function collection()
    {
        $extensions = DB::table('extension')->select(
            'id','ext_nombre',
            'ext_tipo_evento','ext_fecha_realizacion',
            'ext_publico_objeto','ext_ponentes',
            'ext_pais','ext_participantes',
            'ext_img',
        )->get();

        return $extensions;
    }
}
