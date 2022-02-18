<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PracticasExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Tipo documento',
            'Número de documento','Nombre (s)',
            'Apellido (s)','Razón social',
            'Nit','Telefono',
            'Dirección','Fecha inicio praticas','Fecha fin practicas'
        ];
    }
    public function collection()
    {
        $practicas = DB::table('practicas')->select(
            'practicas.id','abr',
            'estu_numero_documento','estu_nombre',
            'estu_apellido','pra_razon_social',
            'pra_nit_empresa','pra_telefono',
            'pra_direccion','pra_fecha_inicio',
            'pra_fecha_fin'
        )
            ->join('estudiantes', 'practicas.pra_id_estudiante', '=', 'estudiantes.id')
            ->join('tipo_documento', 'estudiantes.estu_tipo_documento', '=', 'tipo_documento.id')
            ->get();

        return $practicas;
    }
}
