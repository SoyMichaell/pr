<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaboratoriosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Nombre laboratorio',
            'Lugar','Tipo documento',
            'Número de documento','Nombre (s)',
            'Apellido (s)','Caracteristicas lab',
            'Fecha realización','Programa'
        ];
    }
    public function collection()
    {
        $laboratorios = DB::table('uso_laboratorio')->select(
            'uso_laboratorio.id','lab_nombre',
            'lab_lugar','abr',
            'doc_numero_documento','doc_nombre',
            'doc_apellido','lab_caracteristicas',
            'lab_fecha_laboratorio','pro_nombre'
        )
            ->join('docentes', 'uso_laboratorio.lab_id_docente', '=', 'docentes.id')
            ->join('tipo_documento', 'docentes.doc_tipo_documento', '=', 'tipo_documento.id')
            ->join('programas', 'uso_laboratorio.lab_id_programa', '=', 'programas.id')
            ->get();

        return $laboratorios;
    }
}
