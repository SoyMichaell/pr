<?php
namespace App\Http\Controllers;

use App\Exports\SoftwareExport;
use App\Models\Software;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::all();
        $docentes = Docente::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('software.index')->with('softwares', $softwares);
        } else {
            if ($docentes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre docentes');
                return redirect('/home');
            } else {
                return view('software.index')->with('softwares', $softwares);
            }
        }
    }

    public function create()
    {
        $docentes = Docente::all();
        return view('software.create')->with('docentes', $docentes);
    }

    public function store(Request $request)
    {
        if ($request->get('sof_id_docente') == "") {
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

        $rules = [
            'sof_nombre' => 'required',
            'sof_desarrollador' => 'required',
            'sof_numero_licencia' => 'required',
            'sof_adquisicion_licencia' => 'required',
            'sof_vencimiento_licencia' => 'required'
        ];

        $messages = [
            'sof_nombre.required' => 'El campo nombre del software es requerido',
            'sof_desarrollador.required' => 'El campoi nombre del desarrollador es requerido',
            'sof_numero_licencia.required' => 'El campo número de licencia es requerido',
            'sof_adquisicion_licencia.required' => 'El campo fecha de adquisición es requerido',
            'sof_vencimiento_licencia.required' => 'El campo fecha de vencimiento es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $softwares = new Software();
        $softwares->sof_nombre = $request->get('sof_nombre');
        $softwares->sof_desarrollador = $request->get('sof_desarrollador');
        $softwares->sof_numero_licencia = $request->get('sof_numero_licencia');
        $softwares->sof_adquisicion_licencia = $request->get('sof_adquisicion_licencia');
        $softwares->sof_vencimiento_licencia = $request->get('sof_vencimiento_licencia');
        $softwares->sof_id_docente = $request->get('sof_id_docente');

        $softwares->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'software'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/software');
    }

    public function show($id)
    {
        $software = Software::find($id);
        $docentes = Docente::all();
        return view('software.show')->with('software', $software)
            ->with('docentes', $docentes);
    }

    public function edit($id)
    {
        $software = Software::find($id);
        $docentes = Docente::all();
        return view('software.edit')->with('software', $software)
            ->with('docentes', $docentes);
    }

    public function update(Request $request, $id)
    {
        $software = Software::find($id);
        $software->sof_nombre = $request->get('sof_nombre');
        $software->sof_desarrollador = $request->get('sof_desarrollador');
        $software->sof_numero_licencia = $request->get('sof_numero_licencia');
        $software->sof_adquisicion_licencia = $request->get('sof_adquisicion_licencia');
        $software->sof_vencimiento_licencia = $request->get('sof_vencimiento_licencia');
        $software->sof_id_docente = $request->get('sof_id_docente');

        $software->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'software'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/software');
    }

    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'software'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/software');
    }

    public function pdf(Request $request)
    {
        $softwares = Software::all();
        if ($softwares->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/software');
        } else {
            $view = \view('software.pdf', compact('softwares'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'software'
            ]);

            return $pdf->stream('software-reporte.pdf');
        }
    }

    public function export()
    {
        $softwares = Software::all();
        if ($softwares->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/software');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'software'
            ]);

            return Excel::download(new SoftwareExport, 'softwares.xlsx');
        }
    }
}
