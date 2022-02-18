<?php
namespace App\Http\Controllers;

use App\Exports\RedesExport;
use App\Models\RedAcademica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class RedAcademicaController extends Controller
{
    public function index()
    {
        $reds = RedAcademica::all();
        return view('red.index')->with('reds', $reds);
    }

    public function create()
    {
        return view('red.create');
    }

    public function store(Request $request)
    {
        $reds = new RedAcademica();
        $reds->red_nombre = $request->get('red_nombre');
        $reds->red_accion = $request->get('red_accion');
        $reds->red_fecha_afiliacion = $request->get('red_fecha_afiliacion');
        $reds->red_programa = $request->get('red_programa');

        $rules = [
            'red_nombre' => 'required',
            'red_accion' => 'required',
            'red_fecha_afiliacion' => 'required',
            'red_programa' => 'required'
        ];

        $messages = [
            'red_nombre.required' => 'El campo nombre red es requerido',
            'red_accion.required' => 'El campo objetivo o accion que realiza es requerido',
            'red_fecha_actualizacion.required' => 'El campo fecha de afiliación es requerido',
            'red_programa.required' => 'El campo programa afiliado es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $reds->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'insertar',
            'modulo' => 'redes_academicas'
        ]);

        Alert::success('Registro Exitoso');

        return redirect('/red');
    }

    public function show($id)
    {
        $red = RedAcademica::find($id);
        return view('red.show')->with('red', $red);
    }

    public function edit($id)
    {
        $red = RedAcademica::find($id);
        return view('red.edit')->with('red', $red);
    }

    public function update(Request $request, $id)
    {
        $red = RedAcademica::find($id);
        $red->red_nombre = $request->get('red_nombre');
        $red->red_accion = $request->get('red_accion');
        $red->red_fecha_afiliacion = $request->get('red_fecha_afiliacion');
        $red->red_programa = $request->get('red_programa');

        $red->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'redes_academicas'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/red');
    }

    public function destroy($id)
    {
        $red = RedAcademica::find($id);
        $red->delete();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'eliminar',
            'modulo' => 'redes_academicas'
        ]);

        Alert::success('Registro Eliminado');

        return redirect('/red');
    }

    public function pdf(Request $request)
    {
        $redes = RedAcademica::all();
        if ($redes->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('red.pdf', compact('redes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'redes_academicas'
            ]);

            return $pdf->stream('redes-academicas-reporte.pdf');
        }
    }

    public function export(){
        $redes = RedAcademica::all();
        if ($redes->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        }else{

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'redes_academicas'
            ]);

            return Excel::download(new RedesExport, 'redes.xlsx');
        }
    }

}
