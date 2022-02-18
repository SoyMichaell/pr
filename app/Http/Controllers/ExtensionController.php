<?php
namespace App\Http\Controllers;

use App\Exports\ExtensionsExport;
use App\Models\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ExtensionController extends Controller
{
    public function index()
    {
        $extensions = Extension::all();
        return view('extension.index')->with('extensions', $extensions);
    }

    public function create()
    {
        return view('extension.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'ext_nombre' => 'required',
            'ext_tipo_evento' => 'required',
            'ext_fecha_realizacion' => 'required',
            'ext_publico_objeto' => 'required',
            'ext_participantes' => 'required'
        ];

        $mesagges = [
            'ext_nombre.required' => 'El campo nombre del evento es requerido',
            'ext_tipo_evento.required' => 'El campo tipo del evento es requerido',
            'ext_fecha_realizacion.required' => 'El campo fecha realización es requerido',
            'ext_publico_objeto.required' => 'El campo publico objeto es requerido',
            'ext_participantes.required' => 'El campo número de participantes es requerido'
        ];

        $this->validate($request, $rules, $mesagges);

        if ($request->get('ext_ponentes') == "" || $request->get('ext_pais') == "") {
            Alert::warning('Diligenciar los campos faltantes');
            return back()->withInput();
        }

        $extensions = new Extension();
        $extensions->ext_nombre = $request->get('ext_nombre');
        $extensions->ext_tipo_evento = $request->get('ext_tipo_evento');
        $extensions->ext_fecha_realizacion = $request->get('ext_fecha_realizacion');
        $extensions->ext_publico_objeto = $request->get('ext_publico_objeto');
        $extensions->ext_ponentes = $request->get('ext_ponentes');
        $extensions->ext_pais = $request->get('ext_pais');
        $extensions->ext_participantes = $request->get('ext_participantes');
        $extensions->ext_img = $request->get('ext_img');

        $extensions->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'extension'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/extension');
    }

    public function show($id)
    {
        $extension = Extension::find($id);
        return view('extension.show')->with('extension', $extension);
    }

    public function edit($id)
    {
        $extension = Extension::find($id);
        return view('extension.edit')->with('extension', $extension);
    }

    public function update(Request $request, $id)
    {
        $extension = Extension::find($id);
        $extension->ext_nombre = $request->get('ext_nombre');
        $extension->ext_tipo_evento = $request->get('ext_tipo_evento');
        $extension->ext_fecha_realizacion = $request->get('ext_fecha_realizacion');
        $extension->ext_publico_objeto = $request->get('ext_publico_objeto');
        $extension->ext_ponentes = $request->get('ext_ponentes');
        $extension->ext_pais = $request->get('ext_pais');
        $extension->ext_participantes = $request->get('ext_participantes');
        $extension->ext_img = $request->get('ext_img');

        $extension->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'extension'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/extension');
    }

    public function destroy($id)
    {
        $extension = Extension::find($id);
        $extension->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'extension'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/extension');
    }

    public function pdf(Request $request)
    {
        $extensions = Extension::all();
        if ($extensions->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('extension.pdf', compact('extensions'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'extension'
            ]);

            return $pdf->stream('extension-reporte.pdf');
        }
    }

    public function export(){
        $extensions = Extension::all();
        if ($extensions->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        }else{

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'extension'
            ]);

            return Excel::download(new ExtensionsExport, 'extension.xlsx');
        }
    }

}
