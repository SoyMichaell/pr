<?php
namespace App\Http\Controllers;

use App\Exports\PruebasExport;
use App\Models\PruebasSaber;
use App\Models\Estudiante;
use App\Models\Programa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PruebaController extends Controller
{
    public function index()
    {
        $pruebas = PruebasSaber::all();
        $estudiantes = Estudiante::all();
        $programas = Programa::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('pruebas.index')->with('pruebas', $pruebas);
        } else {
            if ($estudiantes->count() <= 0 && $programas->count() <= 0) {
                Alert::warning('Requisitos', 'Registre programas y estudiantes');
                return redirect('/home');
            } else if ($estudiantes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes');
                return redirect('/home');
            } else {
                return view('pruebas.index')->with('pruebas', $pruebas);
            }
        }
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $programas = Programa::all();
        return view('pruebas.create')->with('estudiantes', $estudiantes)
            ->with('programas', $programas);
    }

    public function store(Request $request)
    {
        if ($request->get('pr_id_estudiante') == "" || $request->get('pr_id_programa')) {
            Alert::warning('El valor seleccionado es incorrecot');
            return back()->withInput();
        }

        $rules = [
            'pr_codigo_prueba'  => 'required',
            'pr_fecha_presentacion' => 'required',
            'pr_grupo_referencial' => 'required',
            'pr_grupo_referencia' => 'required'
        ];

        $messages = [
            'pr_codigo_prueba.required' => 'El campo codigo prueba es requerido',
            'pr_fecha_presentacion.required' => 'El campo año presentación prueba es requerido',
            'pr_grupo_referencial.required' => 'El campo grupo referencial es requerido',
            'pr_grupo_referencia.required' => 'El campo grupo referencia NBC es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $pruebas = new PruebasSaber();
        $pruebas->pr_id_estudiante = $request->get('pr_id_estudiante');
        $pruebas->pr_codigo_prueba = $request->get('pr_codigo_prueba');
        $pruebas->pr_id_programa = $request->get('pr_id_programa');
        $pruebas->pr_fecha_presentacion = $request->get('pr_fecha_presentacion');
        $pruebas->pr_grupo_referencial = $request->get('pr_grupo_referencial');
        $pruebas->pr_grupo_referencia = $request->get('pr_grupo_referencia');

        $ExistPruIde = DB::table('pruebas_saber')->where('pr_id_estudiante', $request->get('pr_id_estudiante'));

        if ($ExistPruIde->count() > 0) {
            Alert::warning('El estudiante ya registra prueba saber Pro en el sistema');
            return back()->withInput();
        } else {
            $pruebas->save();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'insertar',
                'modulo' => 'pruebas_saber'
            ]);

            Alert::success('Registro Exitoso');

            return redirect('/prueba');
        }
    }

    public function show($id)
    {
        $prueba = PruebasSaber::find($id);
        $estudiantes = Estudiante::all();
        $programas = Programa::all();
        return view('pruebas.show')->with('prueba', $prueba)
            ->with('estudiantes', $estudiantes)
            ->with('programas', $programas);
    }

    public function edit($id)
    {
        $prueba = PruebasSaber::find($id);
        $estudiantes = Estudiante::all();
        $programas = Programa::all();
        return view('pruebas.edit')->with('prueba', $prueba)
            ->with('estudiantes', $estudiantes)
            ->with('programas', $programas);
    }

    public function update(Request $request, $id)
    {
        $prueba = PruebasSaber::find($id);
        $prueba->pr_id_estudiante = $request->get('pr_id_estudiante');
        $prueba->pr_codigo_prueba = $request->get('pr_codigo_prueba');
        $prueba->pr_id_programa = $request->get('pr_id_programa');
        $prueba->pr_fecha_presentacion = $request->get('pr_fecha_presentacion');
        $prueba->pr_grupo_referencial = $request->get('pr_grupo_referencial');
        $prueba->pr_grupo_referencia = $request->get('pr_grupo_referencia');

        $prueba->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'pruebas_saber'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/prueba');
    }

    public function destroy($id)
    {
        $prueba = PruebasSaber::find($id);
        $prueba->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'pruebas_saber'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/prueba');
    }

    public function pdf(Request $request)
    {
        $pruebas = PruebasSaber::all();
        if ($pruebas->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/prueba');
        } else {
            $view = \view('pruebas.pdf', compact('pruebas'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'pruebas_saber'
            ]);

            return $pdf->stream('pruebas-reporte.pdf');
        }
    }

    public function export()
    {
        $pruebas = PruebasSaber::all();
        if ($pruebas->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/prueba');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'pruebas_saber'
            ]);

            return Excel::download(new PruebasExport, 'pruebas-saber..xlsx');
        }
    }
}
