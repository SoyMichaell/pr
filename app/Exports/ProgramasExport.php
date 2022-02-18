<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Expr\AssignOp\Concat;

class ProgramasExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Estado programa',
            'Departamento',
            'Municipio',
            'Facultad',
            'Nombre',
            'Titulo',
            'Codigo SNIES',
            'Plan de estudio',
            'Resolución',
            'Fecha ultimo registro',
            'Fecha próximo registro',
            'Nivel formación',
            'Programa por ciclos (si/no)',
            'Metodologia',
            'Duracción (semestres)',
            'Periodo',
            'Número de creditos',
            'Número de asignaturas',
            'Estado plan de estudio',
            'Norma',
            'Director de programa'
        ];
    }
    public function collection()
    {
        $programas = DB::table('programas')->select(
            'programas.id',
            'est_nombre',
            'dep_nombre',
            'mun_nombre',
            'fac_nombre',
            'pro_nombre',
            'pro_titulo',
            'pro_codigosnies',
            'pp_nombre',
            'pro_resolucion',
            'pro_fecha_ult',
            'pro_fecha_prox',
            'niv_nombre',
            'prc_nombre',
            'met_nombre',
            'pro_duraccion',
            'per_nombre',
            'pp_creditos',
            'pp_asignaturas',
            'pp_estado',
            'pro_norma',
            DB::raw("CONCAT(doc_nombre,' ',doc_apellido)")
        )
            ->join('estado_programas', 'programas.pro_estado_programa', '=', 'estado_programas.id')
            ->join('departamentos', 'programas.pro_departamento', '=', 'departamentos.id')
            ->join('municipios', 'programas.pro_municipio', '=', 'municipios.id')
            ->join('facultades', 'programas.pro_facultad', '=', 'facultades.id')
            ->join('nivelformacion', 'programas.pro_nivel_formacion', '=', 'nivelformacion.id')
            ->join('programa_ciclos', 'programas.pro_programa_ciclos', '=', 'programa_ciclos.id')
            ->join('metodologia', 'programas.pro_metodologia', '=', 'metodologia.id')
            ->join('periodo', 'programas.pro_periodo', '=', 'periodo.id')
            ->join('docentes', 'programas.pro_director_programa', '=', 'docentes.id')
            ->join('programas_plan_estudio', 'programas.id', '=', 'programas_plan_estudio.pp_id_programa')
            ->get();
        return $programas;
    }
}
