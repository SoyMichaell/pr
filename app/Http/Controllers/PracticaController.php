<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use App\Models\Estudiante;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Exports\PracticasExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PracticaController extends Controller
{
    public function index()
    {
        $practicas = Practica::all();
        $estudiantes = Estudiante::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('practica.index')->with('practicas', $practicas);
        } else {
            if ($estudiantes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes');
                return redirect('/home');
            } else {
                return view('practica.index')->with('practicas', $practicas);
            }
        }
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('practica.create')->with('estudiantes', $estudiantes);
    }

    public function store(Request $request)
    {
        $practicas = new Practica();
        $practicas->pra_id_estudiante = $request->get('pra_id_estudiante');
        $practicas->pra_razon_social = $request->get('pra_razon_social');
        $practicas->pra_nit_empresa = $request->get('pra_nit_empresa');
        $practicas->pra_telefono = $request->get('pra_telefono');
        $practicas->pra_direccion = $request->get('pra_direccion');
        $practicas->pra_fecha_inicio = $request->get('pra_fecha_inicio');
        $practicas->pra_fecha_fin = $request->get('pra_fecha_fin');

        $rules = [
            'pra_razon_social' => 'required',
            'pra_nit_empresa' => 'required',
            'pra_telefono' => 'required',
            'pra_direccion' => 'required',
            'pra_fecha_inicio' => 'required',
            'pra_fecha_fin' => 'required'
        ];

        $messages = [
            'pra_razon_social.required' => 'El campo razón social es requerido',
            'pra_nit_empresa.required' => 'El campo nit de la empresa es requerido',
            'pra_telefono.required' => 'El campo telefono empresa es requerido',
            'pra_direccion.required' => 'El campo dirección empresa es reqquerido',
            'pra_fecha_inicio.required' => 'El campo fecha inicio laboral es requerido',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->get('pra_id_estudiante') == "") {
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

        $ExistEstu = DB::table('practicas')->where('pra_id_estudiante', $request->get('pra_id_estudiante'));

        if ($ExistEstu->count() > 0) {
            Alert::warning('El estudiante ya registra practicas laborales en el sistema');
            return back()->withInput();
        } else {
            $practicas->save();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'insertar',
                'modulo' => 'practicas'
            ]);

            Alert::success('Registro Exitoso');

            return redirect('/practica');
        }
    }

    public function show($id)
    {
        $estudiantes = Estudiante::all();
        $practica = Practica::find($id);
        return view('practica.show')->with('practica', $practica)
            ->with('estudiantes', $estudiantes);
    }

    public function edit($id)
    {
        $estudiantes = Estudiante::all();
        $practica = Practica::find($id);
        return view('practica.edit')->with('practica', $practica)
            ->with('estudiantes', $estudiantes);
    }

    public function update(Request $request, $id)
    {
        $practica = Practica::find($id);
        $practica->pra_id_estudiante = $request->get('pra_id_estudiante');
        $practica->pra_razon_social = $request->get('pra_razon_social');
        $practica->pra_nit_empresa = $request->get('pra_nit_empresa');
        $practica->pra_telefono = $request->get('pra_telefono');
        $practica->pra_direccion = $request->get('pra_direccion');
        $practica->pra_fecha_inicio = $request->get('pra_fecha_inicio');
        $practica->pra_fecha_fin = $request->get('pra_fecha_fin');

        $practica->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'practicas'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/practica');
    }

    public function destroy($id)
    {
        $practica = Practica::find($id);
        $practica->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'practicas'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/practica');
    }

    public function pdf(Request $request)
    {
        $practicas = Practica::all();
        if ($practicas->count() > 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('practica.pdf', compact('practicas'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'practicas'
            ]);

            return $pdf->stream('practicas-reporte.pdf');
        }
    }

    public function export()
    {
        $practicas = Practica::all();
        if ($practicas->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'practicas'
            ]);

            return Excel::download(new PracticasExport, 'practicas.xlsx');
        }
    }
}
