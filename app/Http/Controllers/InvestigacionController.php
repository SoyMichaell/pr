<?php

namespace App\Http\Controllers;

use App\Exports\InvestigacionsExport;
use App\Models\Docente;
use App\Models\Investigacion;
use App\Models\Municipio;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class InvestigacionController extends Controller
{
    public function index()
    {
        $investigacions = Investigacion::all();
        $programas = Programa::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('investigacion.index')->with('investigacions', $investigacions);
        } else {
            if ($programas->count() <= 0) {
                Alert::warning('Requisitos', 'Registre programas');
                return redirect('/home');
            } else {
                return view('investigacion.index')->with('investigacions', $investigacions);
            }
        }
    }

    public function create()
    {
        $docentes = Docente::all();
        $programas = Programa::all();
        $sedes = Municipio::all();
        return view('investigacion.create')->with('docentes', $docentes)
            ->with('programas', $programas)
            ->with('sedes', $sedes);
    }

    public function store(Request $request)
    {
        $investigacions = new Investigacion();
        $investigacions->inv_titulo_proyecto = $request->get('inv_titulo_proyecto');
        $investigacions->inv_grupo_semillero = $request->get('inv_grupo_semillero');
        $investigacions->inv_director = $request->get('inv_director');
        $investigacions->inv_sede = $request->get('inv_sede');
        $investigacions->inv_programa = $request->get('inv_programa');
        $investigacions->inv_estado_proyecto = $request->get('inv_estado_proyecto');
        $investigacions->inv_fecha_inicio = $request->get('inv_fecha_inicio');

        $rules = [
            'inv_titulo_proyecto' => 'required',
            'inv_grupo_semillero' => 'required',
            'inv_estado_proyecto' => 'required',
            'inv_fecha_inicio' => 'required'
        ];

        $messages = [
            'inv_titulo_proyecto.required' => 'El campo titulo del proyecto es requerido',
            'inv_grupo_semillero.required' => 'El campo grupo de semillero es requerido',
            'inv_estado_proyecto.required' => 'El campo estado del proyecto es requerido',
            'inv_fecha_inicio.required' => 'El campo fecha de inicio es requerido'
        ];

        $this->validate($request, $rules, $messages);

        if ($request->get('inv_director') == "" || $request->get('inv_sede') == "" || $request->get('inv_programa') == "") {
            Alert::warning('Diligenciar campos faltante');
            return back()->withInput();
        }

        $investigacions->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'investigacion'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/investigacion');
    }

    public function show($id)
    {
        $docentes = Docente::all();
        $programas = Programa::all();
        $sedes = Municipio::all();
        $investigacion = Investigacion::find($id);
        return view('investigacion.show')->with('docentes', $docentes)
            ->with('programas', $programas)
            ->with('sedes', $sedes)
            ->with('investigacion', $investigacion);
    }

    public function edit($id)
    {
        $docentes = Docente::all();
        $programas = Programa::all();
        $sedes = Municipio::all();
        $investigacion = Investigacion::find($id);
        return view('investigacion.edit')->with('docentes', $docentes)
            ->with('programas', $programas)
            ->with('sedes', $sedes)
            ->with('investigacion', $investigacion);
    }

    public function update(Request $request, $id)
    {
        $investigacion = Investigacion::find($id);
        $investigacion->inv_titulo_proyecto = $request->get('inv_titulo_proyecto');
        $investigacion->inv_grupo_semillero = $request->get('inv_grupo_semillero');
        $investigacion->inv_director = $request->get('inv_director');
        $investigacion->inv_sede = $request->get('inv_sede');
        $investigacion->inv_programa = $request->get('inv_programa');
        $investigacion->inv_estado_proyecto = $request->get('inv_estado_proyecto');
        $investigacion->inv_fecha_inicio = $request->get('inv_fecha_inicio');

        $investigacion->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'investigacion'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/investigacion');
    }

    public function destroy($id)
    {
        $investigacion = Investigacion::find($id);
        $investigacion->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'investigacion'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/investigacion');
    }

    public function pdf(Request $request)
    {
        $investigacions = Investigacion::all();
        if ($investigacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/investigacion');
        } else {
            $view = \view('investigacion.pdf', compact('investigacions'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'investigacion'
            ]);

            return $pdf->stream('investigacion-reporte.pdf');
        }
    }

    public function export()
    {
        $investigacions = Investigacion::all();
        if ($investigacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/investigacion');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'investigacion'
            ]);

            return Excel::download(new InvestigacionsExport, 'investigaciones.xlsx');
        }
    }
}
