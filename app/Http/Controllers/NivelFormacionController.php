<?php

namespace App\Http\Controllers;

use App\Exports\NivelFormacionExport;
use App\Models\NivelFormacion;
use App\Models\Status;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NivelFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $nivelformacions = NivelFormacion::all();
            return view('configuracion/nivelformacion.index')->with('nivelformacions', $nivelformacions);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            return view('configuracion/nivelformacion.create');
        } else {
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $niveles = new NivelFormacion();
        $niveles->niv_nombre = $request->get('niv_nombre');

        $rules = [
            'niv_nombre' => 'required'
        ];

        $message = [
            'niv_nombre.required' => 'El campo nivel formación es requerido'
        ];

        $this->validate($request, $rules, $message);

        $niveles->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'nivelformacion'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/nivelformacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $nivelformacion = NivelFormacion::find($id);
            return view('configuracion/nivelformacion.show')
                ->with('nivelformacion', $nivelformacion);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->per_tipo_usuario == 1) {
            $nivelformacion = NivelFormacion::find($id);
            return view('configuracion/nivelformacion.edit')
                ->with('nivelformacion', $nivelformacion);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nivelformacion = NivelFormacion::find($id);
        $nivelformacion->niv_nombre = $request->get('niv_nombre');

        $nivelformacion->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'nivelformacion'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/nivelformacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel = NivelFormacion::find($id);

        $veriNiv = DB::table('programas')->where('pro_nivel_formacion', $id);

        if ($veriNiv->count() > 0) {
            Alert::warning('No se pude eliminar el nivel formación, debido a que esta asociado a otra entidad');
            return redirect('/nivelformacion');
        } else {
            $nivel->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'nivelformacion'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/nivelformacion');
        }
    }

    public function pdf(Request $request)
    {
        $nivelformacions = NivelFormacion::all();
        if ($nivelformacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/nivelformacion');
        } else {
            $view = \view('configuracion/nivelformacion.pdf', compact('nivelformacions'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'nivelformacion'
            ]);

            return $pdf->stream('nivelformacion-reporte.pdf');
        }
    }

    public function export()
    {
        $nivelformacions = NivelFormacion::all();
        if ($nivelformacions->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/nivelformacion');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'nivelformacion'
            ]);

            return Excel::download(new NivelFormacionExport, 'nivelformacion.xlsx');
        }
    }
}
