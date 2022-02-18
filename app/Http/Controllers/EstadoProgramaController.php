<?php

namespace App\Http\Controllers;

use App\Exports\EstadoProgramaExport;
use App\Models\EstadoPrograma;
use Illuminate\Http\Request;
use App\Models\Status;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EstadoProgramaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $estadoprogramas = EstadoPrograma::all();
            return view('configuracion/estadoprograma.index')->with('estadoprogramas', $estadoprogramas);
        } else {
            return redirect('/home');
        }
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            return view('configuracion/estadoprograma.create');
        } else {
            return redirect('/home');
        }
    }

    public function store(Request $request)
    {
        $estadoprograma = new EstadoPrograma();
        $estadoprograma->est_nombre = $request->get('est_nombre');

        $rules = [
            'est_nombre' => 'required',
        ];

        $messages = [
            'est_nombre.required' => 'El campo nombre del estado es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $estadoprograma->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'estadoprogramas'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/estadoprograma');
    }

    public function show($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $estadoprograma = EstadoPrograma::find($id);
            return view('configuracion/estadoprograma.show')
                ->with('estadoprograma', $estadoprograma);
        } else {
            return redirect('/home');
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $estadoprograma = EstadoPrograma::find($id);
            return view('configuracion/estadoprograma.edit')
                ->with('estadoprograma', $estadoprograma);
        } else {
            return redirect('/home');
        }
    }

    public function update(Request  $request, $id)
    {
        $estadoprograma = EstadoPrograma::find($id);
        $estadoprograma->est_nombre = $request->get('est_nombre');

        $estadoprograma->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'estadoprogramas'
        ]);

        Alert::success('Registro Actualizado');
        return redirect('/estadoprograma');
    }

    public function destroy($id)
    {
        $estadoprograma = EstadoPrograma::find($id);
        $estadoprograma->delete();
        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'estadoprogramas'
        ]);
        Alert::success('Registro Eliminado');
        return redirect('/estadoprograma');
    }

    public function pdf(Request $request)
    {
        $estadoprogramas = EstadoPrograma::all();
        if ($estadoprogramas->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('configuracion/estadoprograma.pdf', compact('estadoprogramas'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'estadoprogramas'
            ]);
            return $pdf->stream('estadoprogramas.pdf');
            
        }
    }

    public function export()
    {
        $estadoprogramas = EstadoPrograma::all();
        if ($estadoprogramas->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'estadoprogramas'
            ]);
            return Excel::download(new EstadoProgramaExport ,'estadoprogramas.xlsx');
        }
    }
}
