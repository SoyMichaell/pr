<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\EstadoPrograma;
use App\Models\Facultad;
use App\Models\Metodologia;
use App\Models\Municipio;
use App\Models\Programa;
use App\Models\NivelFormacion;
use App\Models\Periodo;
use App\Models\ProgramaCiclo;
use App\Models\TiempoList;
use App\Models\Docente;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Exports\ProgramasExport;
use App\Models\PlanEstudio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProgramaController extends Controller
{

    public function index()
    {
        $programas = Programa::all();
        $facultades = Facultad::all();
        $nivels = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $docentes = Docente::all();
        $users = DB::table('users')->where('per_tipo_usuario', 2);

        if (Auth::user()->per_tipo_usuario == '3') {
            return view('programa.index', compact('programas'));
        } else {
            if (($nivels->count() > 0) && ($metodologias->count() > 0) && ($facultades->count() > 0)) {
                return view('programa.index', compact('programas'));
            } else {
                Alert::warning('Requisitos', 'Es necesario que agregue información en los módulos mencionados en la dashoboard');
                return redirect('/home');
            }
        }
    }

    public function create()
    {
        $estadoprogramas = EstadoPrograma::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $tiemposList = TiempoList::all();
        $programasCiclo = ProgramaCiclo::all();
        $periodos = Periodo::all();
        $docentes = Docente::all();

        return view('programa.create')->with('estadoprogramas', $estadoprogramas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('tiemposList', $tiemposList)
            ->with('programasCiclo', $programasCiclo)
            ->with('periodos', $periodos)
            ->with('docentes', $docentes);
    }

    public function store(Request $request)
    {
        $programas = new Programa();
        $programas->pro_estado_programa = $request->get('pro_estado_programa');
        $programas->pro_departamento = $request->get('pro_departamento');
        $programas->pro_municipio = $request->get('pro_municipio');
        $programas->pro_facultad = $request->get('pro_facultad');
        $programas->pro_nombre = $request->get('pro_nombre');
        $programas->pro_titulo = $request->get('pro_titulo');
        $programas->pro_codigosnies = $request->get('pro_codigosnies');
        $programas->pro_resolucion = $request->get('pro_resolucion');
        $programas->pro_fecha_ult = $request->get('pro_fecha_ult');
        $programas->pro_fecha_prox = $request->get('pro_fecha_prox');
        $programas->pro_nivel_formacion = $request->get('pro_nivel_formacion');
        $programas->pro_programa_ciclos = $request->get('pro_programa_ciclos');
        $programas->pro_metodologia = $request->get('pro_metodologia');
        $programas->pro_duraccion = $request->get('pro_duraccion');
        $programas->pro_periodo = $request->get('pro_periodo');
        $programas->pro_norma = $request->get('pro_norma');
        $programas->pro_director_programa = $request->get('pro_director_programa');

        $rules = [
            'pro_nombre' => 'required',
            'pro_titulo' => 'required',
            'pro_codigosnies' => 'required',
            'pro_resolucion' => 'required',
            'pro_fecha_ult' => 'required',
            'pro_fecha_prox' => 'required',
            'pro_norma' => 'required'
        ];

        $messages = [
            'pro_nombre.required' => 'El campo programa es requerido',
            'pro_titulo.required' => 'El campo titulo es requerido',
            'pro_codigosnies.required' => 'El campo codigo snies es requerido',
            'pro_resolucion.required' => 'El campo resolución es requerido',
            'pro_fecha_ult.required' => 'El campo fecha ultimo registro es requerido',
            'pro_fecha_prox.required' => 'El campo fecha próximo registro es requerido',
            'pro_norma.required' => 'El campo norma de creación programa es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $valiDi = DB::table('programas')->where('pro_director_programa', $request->get('pro_director_programa'));
        $sniesDi = DB::table('programas')->where('pro_codigosnies', $request->get('pro_codigosnies'));

        if ($valiDi->count() > 0) {
            Alert::warning('El docente elegido como director de programa, ya esta asociado a un programa');
            return back()->withInput();
        } else if ($sniesDi->count() > 0) {
            Alert::warning('El programa que esta intentando inscribir, ya se encuentra registrado');
            return back()->withInput();
        } else {
            $programas->save();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'insertar',
                'modulo' => 'programas'
            ]);

            Alert::success('Registro Exitoso');

            return redirect('/programa');
        }
    }

    public function show($id)
    {
        $estadoprogramas = EstadoPrograma::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $tiemposList = TiempoList::all();
        $programasCiclo = ProgramaCiclo::all();
        $periodos = Periodo::all();
        $docentes = Docente::all();
        $programa = Programa::find($id);
        return view('programa.show')->with('programa', $programa)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('tiemposList', $tiemposList)
            ->with('programasCiclo', $programasCiclo)
            ->with('periodos', $periodos)
            ->with('docentes', $docentes);
    }

    public function edit($id)
    {
        $estadoprogramas = EstadoPrograma::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $niveles = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $tiemposList = TiempoList::all();
        $programasCiclo = ProgramaCiclo::all();
        $periodos = Periodo::all();
        $docentes = Docente::all();
        $programa = Programa::find($id);
        return view('programa.edit')->with('programa', $programa)
            ->with('estadoprogramas', $estadoprogramas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('niveles', $niveles)
            ->with('metodologias', $metodologias)
            ->with('tiemposList', $tiemposList)
            ->with('programasCiclo', $programasCiclo)
            ->with('periodos', $periodos)
            ->with('docentes', $docentes);
    }

    public function update(Request $request, $id)
    {
        $programa = Programa::find($id);
        $programa->pro_estado_programa = $request->get('pro_estado_programa');
        $programa->pro_departamento = $request->get('pro_departamento');
        $programa->pro_municipio = $request->get('pro_municipio');
        $programa->pro_facultad = $request->get('pro_facultad');
        $programa->pro_nombre = $request->get('pro_nombre');
        $programa->pro_titulo = $request->get('pro_titulo');
        $programa->pro_codigosnies = $request->get('pro_codigosnies');
        $programa->pro_resolucion = $request->get('pro_resolucion');
        $programa->pro_fecha_ult = $request->get('pro_fecha_ult');
        $programa->pro_fecha_prox = $request->get('pro_fecha_prox');
        $programa->pro_nivel_formacion = $request->get('pro_nivel_formacion');
        $programa->pro_programa_ciclos = $request->get('pro_programa_ciclos');
        $programa->pro_metodologia = $request->get('pro_metodologia');
        $programa->pro_duraccion = $request->get('pro_duraccion');
        $programa->pro_periodo = $request->get('pro_periodo');
        $programa->pro_norma = $request->get('pro_norma');
        $programa->pro_director_programa = $request->get('pro_director_programa');

        $programa->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'programas'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/programa');
    }

    public function destroy($id)
    {
        $programa = Programa::find($id);

        $veriEstu = DB::table('estudiantes')->where('estu_programa', $id);
        $veriInve = DB::table('investigacion')->where('inv_programa', $id);
        $veriPrue = DB::table('pruebas_saber')->where('pr_id_programa', $id);
        $veriLab = DB::table('uso_laboratorio')->where('lab_id_programa', $id);

        if ($veriEstu->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriInve->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriPrue->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else if ($veriLab->count() > 0) {
            Alert::warning('No se pude eliminar el programa, debido a que esta asociado a otra entidad');
            return redirect('/programa');
        } else {
            $programa->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'programas'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/programa');
        }
    }

    public function mostrar_plan($id){
        $programa = Programa::find($id);
        $plans = DB::table('programas_plan_estudio')
        ->select('programas_plan_estudio.id','pp_nombre','pp_creditos','pp_asignaturas','est_nombre')
        ->join('estado_programas','programas_plan_estudio.pp_estado','=','estado_programas.id')
        ->where('pp_id_programa',$id)->get();
        return view('programa/plan.index')
        ->with('plans', $plans)
        ->with('programa', $programa);
    }

    public function crear_plan($id){
        $estadoprogramas = EstadoPrograma::all();
        $programa = Programa::find($id);
        return view('programa/plan.create')
        ->with('programa', $programa)
        ->with('estadoprogramas', $estadoprogramas);
    }

    public function registro_plan(Request $request){
        $plan = new PlanEstudio();
        $plan->pp_id_programa = $request->get('id');
        $plan->pp_nombre = $request->get('pp_nombre');
        $plan->pp_creditos = $request->get('pp_creditos');
        $plan->pp_asignaturas = $request->get('pp_asignaturas');
        $plan->pp_estado = $request->get('pp_estado');

        $rules = [
            'pp_nombre' => 'required',
            'pp_creditos' => 'required',
            'pp_asignaturas' => 'required'
        ];

        $messages = [
            'pp_nombre.required' => 'El campo plan de estudio es requiredo',
            'pp_creditos.required' => 'El campo número de creditos es requerido',
            'pp_asignaturas.required' => 'El campo número de asignaturas es requerido'
        ];

        $this->validate($request,$rules,$messages);

        $plan->save();
        Alert::success('Registro exitoso');
        return redirect('programa/'.$request->get('id').'/mostrar_plan');
    }

    public function editar_plan($idprograma, $idplan){
        $estadoprogramas = EstadoPrograma::all();
        $programa = Programa::find($idprograma);
        $plan = PlanEstudio::find($idplan);
        return view('programa/plan.edit')
        ->with('programa', $programa)
        ->with('plan', $plan)
        ->with('estadoprogramas', $estadoprogramas);
    }

    public function actualizar_plan(Request $request, $id){
        $plans = PlanEstudio::find($id);
        
        $plans->pp_nombre = $request->get('pp_nombre');
        $plans->pp_creditos = $request->get('pp_creditos');
        $plans->pp_asignaturas = $request->get('pp_asignaturas');
        $plans->pp_estado = $request->get('pp_estado');

        $rules = [
            'pp_nombre' => 'required',
            'pp_creditos' => 'required',
            'pp_asignaturas' => 'required'
        ];

        $messages = [
            'pp_nombre.required' => 'El campo plan de estudio es requiredo',
            'pp_creditos.required' => 'El campo número de creditos es requerido',
            'pp_asignaturas.required' => 'El campo número de asignaturas es requerido'
        ];

        $this->validate($request,$rules,$messages);

        $plans->save();

        Alert::success('Registro Actualizado');
        return redirect('programa/'.$request->get('id').'/mostrar_plan');
    }

    public function eliminar_plan($id){

        $plan = PlanEstudio::find($id);

        $plan->delete();

        Alert::success('Registro eliminado');
        return redirect('/programa');

    }

    public function selectivoplan($id){
        return DB::table('programas_plan_estudio')->where('pp_id_programa', $id)->get();
    }

    public function pdf(Request $request)
    {
        $programas = Programa::all();
        if ($programas->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/programa');
        } else {
            $view = \view('programa.pdf', compact('programas'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'programas'
            ]);

            return $pdf->stream('programas-reporte.pdf');
        }
    }

    public function export()
    {
        $programas = Programa::all();
        if ($programas->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/programa');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'programas'
            ]);

            return Excel::download(new ProgramasExport, 'users.xlsx');
        }
    }
}
