<?php
namespace App\Http\Controllers;

use App\Exports\MovilidadsExport;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Movilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class MovilidadController extends Controller
{
    public function index()
    {
        $movilidads = Movilidad::all();
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('movilidad.index')->with('movilidads', $movilidads);
        } else {
            if ($estudiantes->count() <= 0 && $docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre docentes y estudiantes');
                return redirect('/home');
            } else if ($docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre docentes');
                return redirect('/home');
            } else if ($estudiantes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes');
                return redirect('/home');
            } else {
                return view('movilidad.index')->with('movilidads', $movilidads);
            }
        }
    }

    public function create()
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        return view('movilidad.create')->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes);
    }

    public function store(Request $request)
    {
        $movilidads = new Movilidad();
        $movilidads->mov_fecha_movilidad = $request->get('mov_fecha_movilidad');
        $movilidads->mov_id_docente = $request->get('mov_id_docente');
        $movilidads->mov_id_estudiante = $request->get('mov_id_estudiante');
        $movilidads->mov_tipo = $request->get('mov_tipo');
        $movilidads->mov_evento = $request->get('mov_evento');
        $movilidads->mov_ciudad_pais = $request->get('mov_ciudad_pais');

        $rules = [
            'mov_fecha_movilidad' => 'required',
            'mov_tipo' => 'required',
            'mov_evento' => 'required',
            'mov_ciudad_pais' => 'required'
        ];

        $messages = [
            'mov_fecha_movilidad.required' => 'El campo fecha movilidad es requerido',
            'mov_tipo.required' => 'El campo tipo de movilidad es requerido',
            'mov_evento.required' => 'El campo evento o actividad es requerido',
            'mov_ciudad_pais.required' => 'El campo ciudad o pais es requerido'
        ];

        $this->validate($request, $rules, $messages);

        if ($request->get('mov_id_docente') == "" || $request->get('mov_id_estudiante') == "") {
            Alert::warning('Diligenciar los campos faltantes');
            return back()->withInput();
        }

        $movilidads->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'movilidad'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/movilidad');
    }

    public function show($id)
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $movilidad = Movilidad::find($id);
        return view('movilidad.show')->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('movilidad', $movilidad);
    }

    public function edit($id)
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $movilidad = Movilidad::find($id);
        return view('movilidad.edit')->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('movilidad', $movilidad);
    }

    public function update(Request $request, $id)
    {
        $movilidad = Movilidad::find($id);
        $movilidad->mov_fecha_movilidad = $request->get('mov_fecha_movilidad');
        $movilidad->mov_id_docente = $request->get('mov_id_docente');
        $movilidad->mov_id_estudiante = $request->get('mov_id_estudiante');
        $movilidad->mov_tipo = $request->get('mov_tipo');
        $movilidad->mov_evento = $request->get('mov_evento');
        $movilidad->mov_ciudad_pais = $request->get('mov_ciudad_pais');

        $movilidad->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'movilidad'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/movilidad');
    }

    public function destroy($id)
    {
        $movilidad = Movilidad::find($id);
        $movilidad->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'movilidad'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/movilidad');
    }

    public function pdf(Request $request)
    {
        $movilidads = Movilidad::all();
        if ($movilidads->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/movilidad');
        } else {
            $view = \view('movilidad.pdf', compact('movilidads'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'movilidad'
            ]);

            return $pdf->stream('movilidades-reporte.pdf');
        }
    }

    public function export()
    {
        $movilidads = Movilidad::all();
        if ($movilidads->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/movilidad');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'movilidad'
            ]);

            return Excel::download(new MovilidadsExport, 'movilidades.xlsx');
        }
    }
}
