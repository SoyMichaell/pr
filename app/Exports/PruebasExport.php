<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PruebasExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Tipo de documento',
            'Número de documento','Nombre (s)',
            'Apellido (s)','Codigo prueba',
            'Programa','Fecha presentación prueba',
            'Grupo referencial','Grupo referencial NBC',
        ];
    }
    public function collection()
    {
        $pruebas = DB::table('pruebas_saber')->select(
            'pruebas_saber.id','abr',
            'estu_numero_documento','estu_nombre',
            'estu_apellido','pr_codigo_prueba',
            'pro_nombre','pr_fecha_presentacion',
            'pr_grupo_referencial','pr_grupo_referencia'
        )
            ->join('estudiantes', 'pruebas_saber.pr_id_estudiante', '=', 'estudiantes.id')
            ->join('tipo_documento', 'estudiantes.estu_tipo_documento', '=', 'tipo_documento.id')
            ->join('programas', 'estudiantes.estu_programa', '=', 'programas.id')
            ->get();

        return $pruebas;
    }
}
