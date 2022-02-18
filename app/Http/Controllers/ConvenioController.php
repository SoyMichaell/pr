<?php

namespace App\Http\Controllers;

use App\Exports\ConveniosExport;
use App\Models\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ConvenioController extends Controller
{
    public function index()
    {
        $convenios = Convenio::all();
        return view('convenio.index')->with('convenios', $convenios);
    }

    public function create()
    {
        return view('convenio.create');
    }

    public function store(Request $request)
    {
        $convenios = new Convenio();
        $convenios->con_nombre = $request->get('con_nombre');
        $convenios->con_pais = $request->get('con_pais');
        $convenios->con_objetivo = $request->get('con_objetivo');
        $convenios->con_fecha_convenio = $request->get('con_fecha_convenio');

        $rules = [
            'con_nombre' => 'required',
            'con_pais' => 'required',
            'con_fecha_convenio' => 'required'
        ];

        $messages = [
            'con_nombre.required' => 'El campo nombre de la institución o entidad cooperante es requerido',
            'con_pais.required' => 'El campo país es requerido',
            'con_fecha_convenio.required' => 'El campo fecha del convenio es requerido'
        ];

        $this->validate($request, $rules, $messages);

        if ($request->get('con_objetivo') == "") {
            Alert::warning('Diligenciar el campo faltante');
            return redirect('convenio');
        }

        $convenios->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'convenio'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/convenio');
    }

    public function show($id)
    {
        $convenio = Convenio::find($id);
        return view('convenio.show')->with('convenio', $convenio);
    }

    public function edit($id)
    {
        $convenio = Convenio::find($id);
        return view('convenio.edit')->with('convenio', $convenio);
    }

    public function update(Request $request, $id)
    {
        $convenio = Convenio::find($id);
        $convenio->con_nombre = $request->get('con_nombre');
        $convenio->con_pais = $request->get('con_pais');
        $convenio->con_objetivo = $request->get('con_objetivo');
        $convenio->con_fecha_convenio = $request->get('con_fecha_convenio');

        $convenio->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'convenio'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/convenio');
    }

    public function destroy($id)
    {
        $convenio = Convenio::find($id);
        $convenio->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'convenio'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/convenio');
    }

    public function pdf(Request $request)
    {
        $convenios = Convenio::all();
        if ($convenios->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('convenio.pdf', compact('convenios'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'convenio'
            ]);

            return $pdf->stream('convenios.pdf');
        }
    }

    public function export(){
        $convenios = Convenio::all();
        if ($convenios->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        }else{

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'convenio'
            ]);

            return Excel::download(new ConveniosExport, 'convenios.xlsx');
        }
    }

}
