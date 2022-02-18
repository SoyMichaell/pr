<?php

namespace App\Http\Controllers;

use App\Exports\LaboratoriosExport;
use App\Models\Docente;
use App\Models\Laboratorio;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class LaboratorioController extends Controller
{
    public function index()
    {
        $laboratorios = Laboratorio::all();
        $docentes = Docente::all();
        $programas = Programa::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('laboratorio.index')->with('laboratorios', $laboratorios);
        } else {
            if ($docentes->count() <= 0 && $programas->count() <= 0) {
                Alert::warning('Requisitos', 'Registre programas y docentes');
                return redirect('/home');
            } else if ($programas->count() <= 0) {
                Alert::warning('Requisitos', 'Registre programas');
                return redirect('/home');
            } else if ($docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre docentes');
                return redirect('/home');
            } else {
                return view('laboratorio.index')->with('laboratorios', $laboratorios);
            }
        }
    }

    public function create()
    {
        $docentes = Docente::all();
        $programas = Programa::all();
        return view('laboratorio.create')->with('docentes', $docentes)
            ->with('programas', $programas);
    }

    public function store(Request $request)
    {
        $laboratorios = new Laboratorio();
        $laboratorios->lab_nombre = $request->get('lab_nombre');
        $laboratorios->lab_lugar = $request->get('lab_lugar');
        $laboratorios->lab_id_docente = $request->get('lab_id_docente');
        $laboratorios->lab_caracteristicas = $request->get('lab_caracteristicas');
        $laboratorios->lab_fecha_laboratorio = $request->get('lab_fecha_laboratorio');
        $laboratorios->lab_id_programa = $request->get('lab_id_programa');

        $rules = [
            'lab_nombre' => 'required',
            'lab_lugar' => 'required',
            'lab_fecha_laboratorio' => 'required'
        ];

        $messages = [
            'lab_nombre.required' => 'El campo nombre del laboratorio es requerido',
            'lab_lugar.required' => 'El campo lugar es requerido',
            'lab_fecha_laboratorio.required' => 'El campo fecha laboratorio es requerido'
        ];

        $this->validate($request, $rules, $messages);

        if ($request->get('lab_id_docente') == "" || $request->get('lab_id_programa') == "" || $request->get('lab_caracteristicas') == "") {
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

        $laboratorios->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'uso_laboratorio'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/laboratorio');
    }

    public function show($id)
    {
        $laboratorio = Laboratorio::find($id);
        $docentes = Docente::all();
        $programas = Programa::all();
        return view('laboratorio.show')->with('laboratorio', $laboratorio)
            ->with('docentes', $docentes)
            ->with('programas', $programas);
    }

    public function edit($id)
    {
        $laboratorio = Laboratorio::find($id);
        $docentes = Docente::all();
        $programas = Programa::all();
        return view('laboratorio.edit')->with('laboratorio', $laboratorio)
            ->with('docentes', $docentes)
            ->with('programas', $programas);
    }

    public function update(Request $request, $id)
    {
        $laboratorio = Laboratorio::find($id);
        $laboratorio->lab_nombre = $request->get('lab_nombre');
        $laboratorio->lab_lugar = $request->get('lab_lugar');
        $laboratorio->lab_id_docente = $request->get('lab_id_docente');
        $laboratorio->lab_caracteristicas = $request->get('lab_caracteristicas');
        $laboratorio->lab_fecha_laboratorio = $request->get('lab_fecha_laboratorio');
        $laboratorio->lab_id_programa = $request->get('lab_id_programa');

        $laboratorio->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'uso_laboratorio'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/laboratorio');
    }

    public function destroy($id)
    {
        $laboratorio = Laboratorio::find($id);
        $laboratorio->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'uso_laboratorio'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/laboratorio');
    }

    public function pdf(Request $request)
    {
        $laboratorios = Laboratorio::all();
        if ($laboratorios->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/laboratorio');
        } else {
            $view = \view('laboratorio.pdf', compact('laboratorios'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'uso_laboratorio'
            ]);

            return $pdf->stream('laboratorios-reporte.pdf');
        }
    }

    public function export()
    {
        $laboratorios = Laboratorio::all();
        if ($laboratorios->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/laboratorio');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'uso_laboratorio'
            ]);

            return Excel::download(new LaboratoriosExport, 'laboratorios.xlsx');
        }
    }
}
