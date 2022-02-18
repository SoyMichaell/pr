<?php

namespace App\Http\Controllers;

use App\Exports\MunicipioExport;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MunicipioController extends Controller
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
            $municipios = Municipio::all();
            return view('configuracion/municipio.index')->with('municipios', $municipios);
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
            $departamentos = Departamento::all();
            return view('configuracion/municipio.create')
                ->with('departamentos', $departamentos);
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
        $municipios = new Municipio();
        $municipios->mun_departamento = $request->get('mun_departamento');
        $municipios->mun_nombre = $request->get('mun_nombre');

        $rules = [
            'mun_nombre' => 'required'
        ];

        $messages = [
            'mun_nombre.required' => 'El campo nombre del municipio es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $municipios->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'municipios'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/municipio');
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
            $departamentos = Departamento::all();
            $municipio = Municipio::find($id);

            return view('configuracion/municipio.show')
                ->with('municipio', $municipio)
                ->with('departamentos', $departamentos);
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
            $departamentos = Departamento::all();
            $municipio = Municipio::find($id);

            return view('configuracion/municipio.edit')
                ->with('municipio', $municipio)
                ->with('departamentos', $departamentos);
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
        $municipio = Municipio::find($id);
        $municipio->mun_departamento = $request->get('mun_departamento');
        $municipio->mun_nombre = $request->get('mun_nombre');

        $municipio->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'municipios'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/municipio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id);

        $veriEstu = DB::table('estudiantes')->where('estu_municipio', $id);
        $veriPro = DB::table('programas')->where('pro_municipio', $id);

        if ($veriEstu->count() > 0) {
            Alert::warning('No se pude eliminar el municipio, debido a que esta asociado a otra entidad');
            return redirect('/municipio');
        } else if ($veriPro->count() > 0) {
            Alert::warning('No se pude eliminar el municipio, debido a que esta asociado a otra entidad');
            return redirect('/municipio');
        } else {
            $municipio->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'municipios'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/municipio');
        }
    }

    public function pdf(Request $request)
    {
        $municipios = Municipio::all();
        if ($municipios->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/municipio');
        } else {
            $view = \view('configuracion/municipio.pdf', compact('municipios'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'municipios'
            ]);

            return $pdf->stream('municipios.pdf');
        }
    }

    public function export()
    {
        $municipios = Municipio::all();
        if ($municipios->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/municipio');
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'municipios'
            ]);

            return Excel::download(new MunicipioExport, 'municipios.xlsx');
        }
    }
}
