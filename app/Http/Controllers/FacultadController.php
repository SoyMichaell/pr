<?php

namespace App\Http\Controllers;

use App\Exports\FacultadExport;
use App\Models\Facultad;
use App\Models\Status;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FacultadController extends Controller
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
            $facultades = Facultad::all();
            return view('configuracion/facultad.index')->with('facultades', $facultades);
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
            return view('configuracion/facultad.create');
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
        $facultades = new Facultad();
        $facultades->fac_nombre = $request->get('fac_nombre');

        $rules = [
            'fac_nombre' => 'required'
        ];

        $messages = [
            'fac_nombre.required' => 'El campo nombre de la facultad es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $facultades->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'facultades'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/facultad');
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
            $facultad = Facultad::find($id);
            return view('configuracion/facultad.show')
                ->with('facultad', $facultad);
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
            $facultad = Facultad::find($id);
            return view('configuracion/facultad.edit')
                ->with('facultad', $facultad);
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
        $facultad = Facultad::find($id);
        $facultad->fac_nombre = $request->get('fac_nombre');

        $facultad->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'facultades'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/facultad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultad::find($id);

        $veriFac = DB::table('programas')->where('pro_facultad', $id);

        if ($veriFac->count() > 0) {
            Alert::warning('No se pude eliminar la facultad, debido a que esta asociado a otra entidad');
            return redirect('/municipio');
        } else {
            $facultad->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'facultades'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/facultad');
        }
    }

    public function pdf(Request $request)
    {
        $facultades = Facultad::all();
        if ($facultades->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/facultad');
        } else {
            $view = \view('configuracion/facultad.pdf', compact('facultades'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'facultades'
            ]);

            return $pdf->stream('facultades.pdf');
        }
    }

    public function export()
    {
        $facultades = Facultad::all();
        if ($facultades->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/facultad');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'facultades'
            ]);

            return Excel::download(new FacultadExport, 'facultades.xlsx');
        }
    }
}
