<?php

namespace App\Http\Controllers;

use App\Models\DirectorExterno;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExternoController extends Controller
{
    /**
<<<<<<< HEAD
     * Display a listing of the resource.
=======
     * Display a listing of the resource.   
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $externos = DirectorExterno::all();
        return view('docente/externo.index')->with('externos', $externos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoDocumento::all();
<<<<<<< HEAD
        return view('docente/externo.create')->with('tipos',  $tipos);
=======
        return view('docente/externo.create')->with('tipos', $tipos);
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
<<<<<<< HEAD
=======
            'dic_tipo_documento' => 'required',
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
            'dic_numero_documento' => 'required',
            'dic_nombre' => 'required',
            'dic_apellido' => 'required',
            'dic_telefono1' => 'required',
            'dic_correo_electronico' => 'required',
            'dic_banco' => 'required',
<<<<<<< HEAD
            'dic_numero_cuenta' => 'required',
            'dic_departamento' => 'required',
            'dic_ciudad' => 'required'
        ];

        $message = [
=======
            'dic_numero_banco' => 'required',
            'dic_departamento' => 'required',
            'dic_ciudad' => 'required',
        ];

        $message = [
            'dic_tipo_documento.required' => 'El campo tipo de documento es requerido',
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
            'dic_numero_documento.required' => 'El campo número de documento es requerido',
            'dic_nombre.required' => 'El campo nombre es requerido',
            'dic_apellido.required' => 'El campo apellido es requerido',
            'dic_telefono1.required' => 'El campo telefono 1 es requerido',
            'dic_correo_electronico.required' => 'El campo correo electronico es requerido',
            'dic_banco.required' => 'El campo banco es requerido',
<<<<<<< HEAD
            'dic_numero_cuenta.required' => 'El campo número de banco es requerido',
            'dic_departamento.required' => 'El campo departamento es requerido',
            'dic_ciudad.required' => 'El campo ciudad es requerido'
        ];

        $this->validate($request,$rules,$message);
=======
            'dic_numero_banco.required' => 'El campo número de banco es requerido',
            'dic_departamento.required' => 'El campo departamento es requerido',
            'dic_ciudad.required' => 'El campo ciudad es requerido',
        ];

        $this->validate($request, $rules, $message);
>>>>>>> 5303d804215456781a1b8079392f4c726554985a

        if($request->get('dic_tipo_documento') == ""){
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

<<<<<<< HEAD
        $dexterno = new DirectorExterno();
        $dexterno->dic_tipo_documento = $request->get('dic_tipo_documento');
        $dexterno->dic_numero_documento = $request->get('dic_numero_documento');
        $dexterno->dic_nombre = $request->get('dic_nombre');
        $dexterno->dic_apellido = $request->get('dic_apellido');
        $dexterno->dic_telefono1 = $request->get('dic_telefono1');
        $dexterno->dic_telefono2 = $request->get('dic_telefono2');
        $dexterno->dic_correo_electronico = $request->get('dic_correo_electronico');
        $dexterno->dic_banco = $request->get('dic_banco');
        $dexterno->dic_numero_cuenta = $request->get('dic_numero_cuenta');
        $dexterno->dic_departamento = $request->get('dic_departamento');
        $dexterno->dic_ciudad = $request->get('dic_ciudad');

        $dexterno->save();

        Alert::warning('Registro Exitoso');
        return redirect('/externo');

=======
        $externo = new DirectorExterno();
        $externo->dic_tipo_documento = $request->get('dic_tipo_documento');
        $externo->dic_numero_documento = $request->get('dic_numero_documento');
        $externo->dic_nombre = $request->get('dic_nombre');
        $externo->dic_apellido = $request->get('dic_apellido');
        $externo->dic_telefono1 = $request->get('dic_telefono1');
        $externo->dic_telefono2 = $request->get('dic_telefono2');
        $externo->dic_correo_electronico = $request->get('dic_correo_electronico');
        $externo->dic_banco = $request->get('dic_banco');
        $externo->dic_numero_banco = $request->get('dic_numero_banco');
        $externo->dic_departamento = $request->get('dic_departamento');
        $externo->dic_ciudad = $request->get('dic_ciudad');

        $externo->save();

        Alert::success('Registro Exitoso');
        return redirect('/externo');
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        $tipos = TipoDocumento::all();
        $externo = DirectorExterno::find($id);
        return view('docente/externo.show')
            ->with('tipos', $tipos)
            ->with('externo', $externo);
=======
        //
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos = TipoDocumento::all();
        $externo = DirectorExterno::find($id);
        return view('docente/externo.edit')
            ->with('tipos', $tipos)
            ->with('externo', $externo);
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
        $rules = [
<<<<<<< HEAD
=======
            'dic_tipo_documento' => 'required',
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
            'dic_numero_documento' => 'required',
            'dic_nombre' => 'required',
            'dic_apellido' => 'required',
            'dic_telefono1' => 'required',
            'dic_correo_electronico' => 'required',
            'dic_banco' => 'required',
<<<<<<< HEAD
            'dic_numero_cuenta' => 'required',
            'dic_departamento' => 'required',
            'dic_ciudad' => 'required'
        ];

        $message = [
=======
            'dic_numero_banco' => 'required',
            'dic_departamento' => 'required',
            'dic_ciudad' => 'required',
        ];

        $message = [
            'dic_tipo_documento.required' => 'El campo tipo de documento es requerido',
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
            'dic_numero_documento.required' => 'El campo número de documento es requerido',
            'dic_nombre.required' => 'El campo nombre es requerido',
            'dic_apellido.required' => 'El campo apellido es requerido',
            'dic_telefono1.required' => 'El campo telefono 1 es requerido',
            'dic_correo_electronico.required' => 'El campo correo electronico es requerido',
            'dic_banco.required' => 'El campo banco es requerido',
<<<<<<< HEAD
            'dic_numero_cuenta.required' => 'El campo número de banco es requerido',
            'dic_departamento.required' => 'El campo departamento es requerido',
            'dic_ciudad.required' => 'El campo ciudad es requerido'
        ];

        $this->validate($request,$rules,$message);
=======
            'dic_numero_banco.required' => 'El campo número de banco es requerido',
            'dic_departamento.required' => 'El campo departamento es requerido',
            'dic_ciudad.required' => 'El campo ciudad es requerido',
        ];

        $this->validate($request, $rules, $message);
>>>>>>> 5303d804215456781a1b8079392f4c726554985a

        if($request->get('dic_tipo_documento') == ""){
            Alert::warning('El valor seleccionado es incorrecto');
            return back()->withInput();
        }

<<<<<<< HEAD
        $dexterno = DirectorExterno::find($id);
        $dexterno->dic_tipo_documento = $request->get('dic_tipo_documento');
        $dexterno->dic_numero_documento = $request->get('dic_numero_documento');
        $dexterno->dic_nombre = $request->get('dic_nombre');
        $dexterno->dic_apellido = $request->get('dic_apellido');
        $dexterno->dic_telefono1 = $request->get('dic_telefono1');
        $dexterno->dic_telefono2 = $request->get('dic_telefono2');
        $dexterno->dic_correo_electronico = $request->get('dic_correo_electronico');
        $dexterno->dic_banco = $request->get('dic_banco');
        $dexterno->dic_numero_cuenta = $request->get('dic_numero_cuenta');
        $dexterno->dic_departamento = $request->get('dic_departamento');
        $dexterno->dic_ciudad = $request->get('dic_ciudad');

        $dexterno->save();
=======
        $externo = DirectorExterno::find($id);
        $externo->dic_tipo_documento = $request->get('dic_tipo_documento');
        $externo->dic_numero_documento = $request->get('dic_numero_documento');
        $externo->dic_nombre = $request->get('dic_nombre');
        $externo->dic_apellido = $request->get('dic_apellido');
        $externo->dic_telefono1 = $request->get('dic_telefono1');
        $externo->dic_telefono2 = $request->get('dic_telefono2');
        $externo->dic_correo_electronico = $request->get('dic_correo_electronico');
        $externo->dic_banco = $request->get('dic_banco');
        $externo->dic_numero_banco = $request->get('dic_numero_banco');
        $externo->dic_departamento = $request->get('dic_departamento');
        $externo->dic_ciudad = $request->get('dic_ciudad');

        $externo->save();
>>>>>>> 5303d804215456781a1b8079392f4c726554985a

        Alert::success('Registro Actualizado');
        return redirect('/externo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $dexterno = DirectorExterno::find($id);
        $dexterno->delete();

        Alert::success('Registro Eliminado');
        return redirect('/externo');
=======
        $externo = DirectorExterno::find($id);
        $externo->delete();

        Alert::success('Registro Eliminado');
        return redirect('/externo');

>>>>>>> 5303d804215456781a1b8079392f4c726554985a
    }
}
