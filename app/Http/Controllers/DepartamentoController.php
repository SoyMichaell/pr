<?php

namespace App\Http\Controllers;

use App\Exports\DepartamentoExport;
use App\Models\Departamento;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DepartamentoController extends Controller
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
            $departamentos = Departamento::all();

            return view('configuracion/departamento.index')
            ->with('departamentos', $departamentos);
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
            return view('configuracion/departamento.create');
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
        $departamentos = new Departamento();
        $departamentos->dep_nombre = $request->get('dep_nombre');
        

        $rules = [
            'dep_nombre' => 'required'
        ];

        $messages = [
            'dep_nombre.required' => 'El campo nombre del departamento es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $departamentos->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'departamentos'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/departamento');
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
            $departamento = Departamento::find($id);
            return view('configuracion/departamento.show')
                ->with('departamento', $departamento);
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
            $departamento = Departamento::find($id);
            return view('configuracion/departamento.edit')
                ->with('departamento', $departamento);
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
        $departamento = Departamento::find($id);
        $departamento->dep_nombre = $request->get('dep_nombre');

        $departamento->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'departamentos'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/departamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::find($id);

        $veriMun = DB::table('municipios')->where('mun_departamento', $id);
        $veriEstu = DB::table('estudiantes')->where('estu_departamento', $id);
        $veriPro = DB::table('programas')->where('pro_departamento', $id);

        if ($veriEstu->count() > 0) {
            Alert::warning('No se pude eliminar el departamento, debido a que esta asociado a otra entidad');
            return redirect('/departamento');
        } else if ($veriPro->count() > 0) {
            Alert::warning('No se pude eliminar el departamento, debido a que esta asociado a otra entidad');
            return redirect('/departamento');
        }else if($veriMun->count()>0){
            Alert::warning('No se pude eliminar el departamento, debido a que esta asociado a otra entidad');
            return redirect('/departamento');
        }  else {

            $departamento->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'departamentos'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/departamento');
        }
    }

    public function pdf(Request $request)
    {
        $departamentos = Departamento::all();
        if ($departamentos->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/departamento');
        } else {
            $view = \view('configuracion/departamento.pdf', compact('departamentos'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'departamentos'
            ]);

            return $pdf->stream('departamentos.pdf');
        }
    }

    public function export(){
        $departamentos = Departamento::all();
        if($departamentos->count()<=0){
            Alert::warning('No hay registros');
            return redirect('/departamento');
        }else{

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'departamentos'
            ]);

            return Excel::download(new DepartamentoExport, 'departamentos.xlsx');
        }
    }

}
