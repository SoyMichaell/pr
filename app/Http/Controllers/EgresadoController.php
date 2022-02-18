<?php
namespace App\Http\Controllers;

use App\Exports\EgresadosExport;
use App\Models\Estudiante;
use App\Models\Programa;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class EgresadoController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        if (Auth::user()->per_tipo_usuario == '3') {
            return view('egresado.index')->with('estudiantes', $estudiantes);
        } else {
            if ($estudiantes->count() <= 0) {
                Alert::warning('Requisitos', 'Registre estudiantes');
                return redirect('/home');
            } else {
                return view('egresado.index')->with('estudiantes', $estudiantes);
            }
        }
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('egresado.edit')->with('estudiante', $estudiante);
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->estu_egresado = $request->get('estu_egresado');
        $estudiante->estu_grado = $request->get('estu_grado');


        if($request->get('estu_egresado') == "1"){
            $rules = [
                'estu_grado' => 'required'
            ];
    
            $message = [
                'estu_grado.required' => 'El campo fecha de grado es requerido'
            ];
    
            $this->validate($request, $rules, $message);           
        }

        if ($request->get('estu_egresado') == "") {
            Alert::warning('El valor seleccionado no es correcto');
            return back()->withInput();
        }

        $estudiante->save();

        Alert::success('Estado Actualizado');
        return redirect('/egresado');
    }

    public function pdf()
    {
        $estudiantes = DB::table('estudiantes')
            ->join('tipo_documento', 'estudiantes.estu_tipo_documento', '=', 'tipo_documento.id')
            ->join('programas', 'estudiantes.estu_programa', '=', 'programas.id')
            ->where('estu_egresado', 1)
            ->get();
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/egresado');
        } else {
            $view = \view('egresado.pdf', compact('estudiantes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);
            return $pdf->stream('egresados-reporte.pdf');
        }
    }

    public function export()
    {
        $estudiantes = DB::table('estudiantes')->where('estu_egresado', '=', '1');
        if ($estudiantes->count() <= 0) {
            Alert::warning('No hay registros');
            return redirect('/egresado');
        } else {
            return Excel::download(new EgresadosExport, 'egresados.xlsx');
        }
    }
}
