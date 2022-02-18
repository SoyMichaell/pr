<?php

namespace App\Http\Controllers;

use App\Exports\MetodologiaExport;
use App\Models\Metodologia;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MetodologiaController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $metodologias = Metodologia::all();
            return view('configuracion/metodologia.index')->with('metodologias', $metodologias);
        } else {
            return redirect('/home');
        }
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            return view('configuracion/metodologia.create');
        } else {
            return redirect('/home');
        }
    }

    public function store(Request $request)
    {
        $metodologias = new Metodologia();
        $metodologias->met_nombre = $request->get('met_nombre');

        $metodologias->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'metodologia'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/metodologia');
    }

    public function show($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $metodologia = Metodologia::find($id);
            return view('configuracion/metodologia.show')
                ->with('metodologia', $metodologia);
        } else {
            return redirect('/home');
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $metodologia = Metodologia::find($id);
            return view('configuracion/metodologia.edit')
                ->with('metodologia', $metodologia);
        } else {
            return redirect('/home');
        }
    }

    public function update(Request $request, $id)
    {
        $metodologia = Metodologia::find($id);
        $metodologia->met_nombre = $request->get('met_nombre');

        $metodologia->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'metodologia'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/metodologia');
    }

    public function destroy($id)
    {
        $metodologia = Metodologia::find($id);

        $veriMet = DB::table('programas')->where('pro_metodologia', $id);

        if ($veriMet->count() > 0) {
            Alert::warning('No se pude eliminar la metodologia, debido a que esta asociado a otra entidad');
            return redirect('/metodologia');
        } else {
            $metodologia->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'metodologia'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/metodologia');
        }
    }

    public function pdf(Request $request)
    {
        $metodologias = Metodologia::all();
        if ($metodologias->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/metodologia');
        } else {
            $view = \view('configuracion/metodologia.pdf', compact('metodologias'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'metodologia'
            ]);

            return $pdf->stream('metodologia.pdf');
        }
    }

    public function export()
    {
        $metodologias = Metodologia::all();
        if ($metodologias->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/metodologia');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'metodologia'
            ]);

            return Excel::download(new MetodologiaExport, 'metodologias.xlsx');
        }
    }
}
