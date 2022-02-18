<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MovilidadsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Fecha movilidad','Tipo documento docente',
            'Número de documento docente','Nombre (s) docente',
            'Apellido (s) docente','Tipo documento estudiante',
            'Número de documento estudiante','Nombre (s) estudiante',
            'Apellido (s) estudiante','Tipo de movilidad',
            'Evento','País o ciudad',
        ];
    }
    public function collection()
    {
        $movilidads = DB::table('movilidad')->select(
            'movilidad.id','abr',
            'doc_numero_documento',
            'doc_nombre','doc_apellido',
            'abr','estu_numero_documento',
            'estu_nombre','estu_apellido',
            'mov_tipo','mov_evento','mov_ciudad_pais',
        )
            ->join('docentes', 'movilidad.mov_id_docente', '=', 'docentes.id')
            ->join('estudiantes', 'movilidad.mov_id_estudiante', '=', 'estudiantes.id')
            ->join('tipo_documento', 'docentes.doc_tipo_documento', '=', 'tipo_documento.id')
            ->get();

        return $movilidads;
    }
}
