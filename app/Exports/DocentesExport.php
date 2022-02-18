<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DocentesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id','Tipo de documento','Número de documento',
            'Nombre (s)','Apellido (s)','Telefono 1',
            'Telefono 2','Dirección','Correo electronico personal',
            'Correo electronico institucional','Departamento',
            'Ciudad','Estudios','Fecha inicio contrato',
            'Fecha fin contrato','Categoria','Reconocimientos'
        ];
    }
    public function collection()
    {
        $docentes = DB::table('docentes')->select(
            'docentes.id','abr','doc_numero_documento',
            'doc_nombre','doc_apellido','doc_telefono1',
            'doc_telefono2','doc_direccion','doc_correo_personal',
            'doc_correo_institucional','doc_departamento','doc_ciudad',
            'doc_estudios','doc_fecha_inicio_contra',
            'doc_fecha_fin_contra','doc_categoria','doc_reconocimiento'
        )
            ->join('tipo_documento', 'docentes.doc_tipo_documento', '=', 'tipo_documento.id')
            ->get();

        return $docentes;
    }
}
