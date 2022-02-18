<?php

namespace App\Http\Controllers;

use App\Exports\DocentesExport;
use App\Models\Docente;
use App\Models\TipoDocumento;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docente.index')->with('docentes', $docentes);
    }

    public function create()
    {
        $tipos = TipoDocumento::all();
        return view('docente.create')->with('tipos', $tipos);
    }

    public function store(Request $request)
    {
        $rules = [
            'doc_numero_documento' => 'required',
            'doc_nombre' => 'required',
            'doc_apellido' => 'required',
            'doc_telefono1' => 'required',
            'doc_correo_personal' => 'required',
            'doc_correo_institucional' => 'required',
            'doc_departamento' => 'required',
            'doc_ciudad' => 'required',
            'doc_direccion' => 'required',
            'doc_estudios' => 'required',
            'doc_fecha_inicio_contra' => 'required',
            'doc_fecha_fin_contra' => 'required'
        ];

        $message = [
            'doc_numero_documento.required' => 'El campo número de documento es requerido',
            'doc_nombre.required' => 'El campo nombre (s) es requerido',
            'doc_apellido.required' => 'El campo apellido (s) es requerido',
            'doc_telefono1.required' => 'El campo telefono es requerido',
            'doc_correo_personal.required' => 'El campo correo personal es requerido',
            'doc_correo_institucional.required' => 'El campo correo institucional es requerido',
            'doc_departamento.required' => 'El campo departamento es requerido',
            'doc_ciudad.required' => 'El campo ciudad es requerido',
            'doc_direccion.required' => 'El campo dirección es requerido',
            'doc_estudios.required' => 'El campo nivel de estudio es requerido',
            'doc_fecha_inicio_contra.required' => 'El campo fecha inicio contrato es requerido',
            'doc_fecha_fin_contra.required' => 'El campo fecha fin contrato es requerido'
        ];

        $this->validate($request, $rules, $message);

        if ($request->get('doc_tipo_documento') == "" || $request->get('doc_categoria') == "") {
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

        $docentes = new Docente();
        $docentes->doc_tipo_documento = $request->get('doc_tipo_documento');
        $docentes->doc_numero_documento = $request->get('doc_numero_documento');
        $docentes->doc_nombre = $request->get('doc_nombre');
        $docentes->doc_apellido = $request->get('doc_apellido');
        $docentes->doc_telefono1 = $request->get('doc_telefono1');
        $docentes->doc_telefono2 = $request->get('doc_telefono2');
        $docentes->doc_correo_personal = $request->get('doc_correo_personal');
        $docentes->doc_correo_institucional = $request->get('doc_correo_institucional');
        $docentes->doc_departamento = $request->get('doc_departamento');
        $docentes->doc_ciudad = $request->get('doc_ciudad');
        $docentes->doc_direccion = $request->get('doc_direccion');
        $docentes->doc_estudios = $request->get('doc_estudios');
        $docentes->doc_fecha_inicio_contra = $request->get('doc_fecha_inicio_contra');
        $docentes->doc_fecha_fin_contra = $request->get('doc_fecha_fin_contra');
        $docentes->doc_categoria = $request->get('doc_categoria');
        $docentes->doc_reconocimiento = $request->get('doc_reconocimiento');


        $ExistDoc = DB::table('docentes')->where('doc_numero_documento', $request->get('doc_numero_documento'));
        $ExistCoI = DB::table('docentes')->where('doc_correo_institucional', $request->get('doc_correo_institucional'));
        if ($ExistDoc->count() > 0) {
            Alert::warning('El número de documento que esta intentado registrar, ya se encuentra en el sistema');
            return back()->withInput();
        } else if ($ExistCoI->count() > 0) {
            Alert::warning('El correo ya se encuentra en el sistema');
            return back()->withInput();
        } else {
            $docentes->save();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'insertar',
                'modulo' => 'docentes'
            ]);
        }

        Alert::success('Registro Exitoso');

        return redirect('/docente');
    }

    public function show($id)
    {
        $tipos = TipoDocumento::all();
        $docente = Docente::find($id);
        return view('docente.show')->with('tipos', $tipos)
            ->with('docente', $docente);
    }

    public function edit($id)
    {
        $tipos = TipoDocumento::all();
        $docente = Docente::find($id);
        return view('docente.edit')->with('tipos', $tipos)
            ->with('docente', $docente);
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        $docente->doc_tipo_documento = $request->get('doc_tipo_documento');
        $docente->doc_numero_documento = $request->get('doc_numero_documento');
        $docente->doc_nombre = $request->get('doc_nombre');
        $docente->doc_apellido = $request->get('doc_apellido');
        $docente->doc_telefono1 = $request->get('doc_telefono1');
        $docente->doc_telefono2 = $request->get('doc_telefono2');
        $docente->doc_correo_personal = $request->get('doc_correo_personal');
        $docente->doc_correo_institucional = $request->get('doc_correo_institucional');
        $docente->doc_departamento = $request->get('doc_departamento');
        $docente->doc_ciudad = $request->get('doc_ciudad');
        $docente->doc_direccion = $request->get('doc_direccion');
        $docente->doc_estudios = $request->get('doc_estudios');
        $docente->doc_fecha_inicio_contra = $request->get('doc_fecha_inicio_contra');
        $docente->doc_fecha_fin_contra = $request->get('doc_fecha_fin_contra');
        $docente->doc_categoria = $request->get('doc_categoria');
        $docente->doc_reconocimiento = $request->get('doc_reconocimiento');

        $docente->save();

        DB::table('acciones_plataforma')->insert([
            'usuario' => Auth::user()->id,
            'accion' => 'editar',
            'modulo' => 'docentes'
        ]);

        Alert::success('Registro Actualizado');

        return redirect('/docente');
    }

    public function destroy($id)
    {
        $docente = Docente::find($id);

        $veriMovi = DB::table('movilidad')->where('mov_id_docente', $id);
        $veriInv = DB::table('investigacion')->where('inv_director', $id);
        $veriPra = DB::table('programas')->where('pro_director_programa', $id);
        $veriLab = DB::table('uso_laboratorio')->where('lab_id_docente', $id);

        if ($veriMovi->count() > 0) {
            Alert::warning('No se pude eliminar el docente, debido a que esta asociado a otra entidad');
            return redirect('/docente');
        } else if ($veriInv->count() > 0) {
            Alert::warning('No se pude eliminar el docente, debido a que esta asociado a otra entidad');
            return redirect('/docente');
        } else if ($veriPra->count() > 0) {
            Alert::warning('No se pude eliminar el docente, debido a que esta asociado a otra entidad');
            return redirect('/docente');
        } else if ($veriLab->count() > 0) {
            Alert::warning('No se pude eliminar el docente, debido a que esta asociado a otra entidad');
            return redirect('/docente');
        } else {

            $docente->delete();

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'eliminar',
                'modulo' => 'docentes'
            ]);

            Alert::success('Registro Eliminado');

            return redirect('/docente');
        }
    }

    public function pdf()
    {
        $docentes = Docente::all();
        if ($docentes->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {
            $view = \view('docente.pdf', compact('docentes'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($view);

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'pdf',
                'modulo' => 'docentes'
            ]);

            return $pdf->stream('docentes-reporte.pdf');
        }
    }

    public function export()
    {
        $docentes = Docente::all();
        if ($docentes->count() <= 0) {
            Alert::warning('No hay registros');
            return back()->withInput();
        } else {

            DB::table('acciones_plataforma')->insert([
                'usuario' => Auth::user()->id,
                'accion' => 'excel',
                'modulo' => 'docentes'
            ]);

            return Excel::download(new DocentesExport, 'docentes.xlsx');
        }
    }
}
