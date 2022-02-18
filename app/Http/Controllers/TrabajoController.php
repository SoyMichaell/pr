<?php
namespace App\Http\Controllers;

use App\Exports\TrabajosExport;
use App\Models\Trabajo;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\ModalidadGrado;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::all();
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();

        if (Auth::user()->per_tipo_usuario == '3') {
            return view('trabajo.index')->with('trabajos', $trabajos);
        } else {
            if ($estudiantes->count() <= 0 && $docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes y docentes');
                return redirect('/home');
            } else if ($estudiantes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes');
                return redirect('/home');
            } else if ($docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre docentes');
                return redirect('/home');
            } else {
                return view('trabajo.index')->with('trabajos', $trabajos);
            }
        }
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $modalidades = ModalidadGrado::all();
        
        return view('trabajo.create')
            ->with('estudiantes', $estudiantes)
            ->with('docentes', $docentes)
            ->with('modalidades', $modalidades);
    }

    public function store(Request $request)
    {

        $rules = [
            'tra_fecha_ejecuccion' => 'required',
            'tra_nombre' => 'required',
            'tra_director' => 'required',
            'tra_fecha_inicio' => 'required',
            'tra_fecha_fin' => 'required'
        ];

        $message = [
            'tra_fecha_ejecuccion.required' => 'El campo año de ejecucción es requerido',
            'tra_nombre.required' => 'El campo titulo del proyecto es requerido',
            'tra_director.required' => 'El campo director es requerido',
            'tra_fecha_inicio.required' => 'El campo fecha inicio proyecto es requerido',
            'tra_fecha_fin.required' => 'El campo fecha fin proyecto es requerido'
        ];

        $this->validate($request, $rules, $message);

        if ($request->get('tra_id_estudiante') == "" || $request->get('tra_jurado') == "") {
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

        if ($request->file('tra_documento') == "") {
            Alert::warning('Debe adjuntar documento en formato .PDF');
            return back()->withInput();
        }

        $trabajos = new Trabajo();
        $trabajos->tra_fecha_ejecuccion = $request->get('tra_fecha_ejecuccion');
        $trabajos->tra_nombre = $request->get('tra_nombre');
        $trabajos->tra_id_estudiante = implode(';', $request->get('tra_id_estudiante'));
        $trabajos->tra_director = $request->get('tra_director');
        $trabajos->tra_jurado = implode(';', $request->get('tra_jurado'));
        $trabajos->tra_fecha_inicio = $request->get('tra_fecha_inicio');
        $trabajos->tra_fecha_fin = $request->get('tra_fecha_fin');


        if ($request->file('tra_documento')) {
            $file = $request->file('tra_documento');
            $name = 'pdf_' . $trabajos->tra_nombre . '.' . $file->extension();

            $ruta = public_path('pdf/' . $name);

            $trabajos->tra_documento = $name;

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }

        $trabajos->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'trabajo_grado'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/trabajo');
    }

    public function show($id)
    {
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $trabajo = Trabajo::find($id);
        return view('trabajo.show')->with('estudiantes', $estudiantes)
            ->with('docentes', $docentes)
            ->with('trabajo', $trabajo);
    }

    public function edit($id)
    {
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $trabajo = Trabajo::find($id);
        return view('trabajo.edit')->with('estudiantes', $estudiantes)
            ->with('docentes', $docentes)
            ->with('trabajo', $trabajo);
    }

    public function update(Request $request, $id)
    {
        $trabajo = Trabajo::find($id);
        $trabajo->tra_fecha_ejecuccion = $request->get('tra_fecha_ejecuccion');
        $trabajo->tra_nombre = $request->get('tra_nombre');
        $trabajo->tra_id_estudiante = implode(';', $request->get('tra_id_estudiante'));
        $trabajo->tra_director = $request->get('tra_director');
        $trabajo->tra_jurado = implode(';', $request->get('tra_jurado'));
        $trabajo->tra_fecha_inicio = $request->get('tra_fecha_inicio');
        $trabajo->tra_fecha_fin = $request->get('tra_fecha_fin');

        if ($trabajo->tra_documento = $request->file('tra_documento')) {
            $file = $request->file('tra_documento');
            $name = 'pdf_' . $trabajo->tra_nombre . '.' . $file->extension();

            $ruta = public_path('pdf/' . $name);

            if ($file->extension() == 'pdf') {
                copy($file, $ruta);
            } else {
                Alert::warning('El formato del documento no es .PDF');
                return back()->withInput();
            }
        }

        $trabajo->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'trabajo_grado'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/trabajo');
    }

    public function destroy($id)
    {
        $trabajo = Trabajo::find($id);
        $trabajo->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'trabajo_grado'
        ]);

        Alert::success('Registro Eliminado');
        return redirect('/trabajo');
    }

    public function pdf(Request $request)
    {
        $trabajos = Trabajo::all();
        if ($trabajos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/trabajo');
        } else {
            $view = \view('trabajo.pdf', compact('trabajos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'trabajo_grado'
            ]);

            return $pdf->stream('trabajos-grado-reporte.pdf');
        }
    }

    public function export()
    {
        $trabajos = Trabajo::all();
        if ($trabajos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/trabajo');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'trabajo_grado'
            ]);

            return Excel::download(new TrabajosExport, 'trabajos_grado.xlsx');
        }
    }
}
