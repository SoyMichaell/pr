<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvestigacionsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Titulo del proyecto',
            'Grupo de semillero','Director',
            'Sede','Programa',
            'Estado','Fecha inicio',
        ];
    }
    public function collection()
    {
        $investigacions = DB::table('investigacion')->select(
            'investigacion.id','inv_titulo_proyecto',
            'inv_grupo_semillero',
            DB::raw("CONCAT(doc_nombre,' ',doc_apellido)"),
            'mun_nombre','pro_nombre',
            'inv_estado_proyecto','inv_fecha_inicio',
        )
            ->join('docentes', 'investigacion.inv_director', '=', 'investigacion.id')
            ->join('tipo_documento', 'docentes.doc_tipo_documento', '=', 'tipo_documento.id')
            ->join('municipios', 'investigacion.inv_sede', '=', 'municipios.id')
            ->join('programas', 'investigacion.inv_programa', '=', 'programas.id')
            ->get();

        return $investigacions;
    }
}
