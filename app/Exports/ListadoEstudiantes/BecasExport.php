<?php
namespace App\Exports\ListadoEstudiantes;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BecasExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Tipo de financiamiento','Id','Programa','Plan de estudio','Tipo de documento','Número de documento',
            'Nombre (s)','Apellido (s)','Telefono 1','Telefono 2',
            'Dirección','Correo electronico','Estrato','Departamento',
            'Municipio','Fecha de nacimiento','Año de ingreso',
            'Ultimo periodo inscrito','Semestre'
            ,'Estado','Matricula','Promedio general acumulado',
            'Fecha grado','Reconocimientos'
        ];
    }
    public function collection()
    {
        $estudiantes = DB::table('estudiantes')->select(
            'estu_financiamiento','estudiantes.id','pro_nombre','pp_nombre','abr','estu_numero_documento',
            'estu_nombre','estu_apellido','estu_telefono1','estu_telefono2',
            'estu_direccion','estu_correo','estu_estrato','dep_nombre',
            'mun_nombre','estu_fecha_nacimiento','estu_ingreso',
            'estu_ult_periodo','estu_semestre',
            'estu_beca','est_nombre','estu_matricula','estu_pga',
            'estu_grado','estu_reconocimiento',
        )
            ->join('programas', 'estudiantes.estu_programa', '=', 'programas.id')
            ->join('tipo_documento', 'estudiantes.estu_tipo_documento', '=', 'tipo_documento.id')
            ->join('departamentos', 'estudiantes.estu_departamento', '=', 'departamentos.id')
            ->join('municipios', 'estudiantes.estu_municipio', '=', 'municipios.id')
            ->join('estado_programas', 'estudiantes.estu_estado', '=', 'estado_programas.id')
            ->join('programas_plan_estudio', 'estudiantes.estu_programa_plan','=','programas_plan_estudio.id')
            ->where('estu_financiamiento','=','Beca')
            ->get();

        return $estudiantes;
    }
}
