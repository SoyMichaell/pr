<?php
namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrabajosExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Fecha ejecucción',
            'Titulo del proyecto',
            'Estudiante (s)',
            'Director',
            'Jurado (s)',
            'Fecha inicio',
            'Fecha fin',
            'Url documento',
        ];
    }
    public function collection()
    {
        $trabajos = DB::table('trabajo_grado')->select(
            'trabajo_grado.id',
            'tra_fecha_ejecuccion',
            'tra_nombre',
            'tra_id_estudiante',
            'tra_director',
            'tra_jurado',
            'tra_fecha_inicio',
            'tra_fecha_fin',
            'tra_documento',
        )->get();
        return $trabajos;
    }
}
