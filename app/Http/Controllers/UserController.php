<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            $tiposdocumentos = TipoDocumento::all();
            $departamentos = Departamento::all();
            $municipios = Municipio::all();
            $tipousuarios = Rol::all();
            return view('auth/register')->with('tipousuarios', $tipousuarios)
                ->with('departamentos', $departamentos)
                ->with('municipios', $municipios)
                ->with('tiposdocumentos', $tiposdocumentos);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->per_tipo_documento = $request->get('per_tipo_documento');
        $users->per_numero_documento = $request->get('per_numero_documento');
        $users->per_nombre = $request->get('per_nombre');
        $users->per_apellido = $request->get('per_apellido');
        $users->per_telefono = $request->get('per_telefono');
        $users->email = $request->get('email');
        $users->password = Hash::make($request->get('password'));
        $users->per_id_departamento = $request->get('per_id_departamento');
        $users->per_id_municipio = $request->get('per_id_municipio');
        $users->per_tipo_usuario = $request->get('per_tipo_usuario');

        $rules = [
            'per_numero_documento' => 'required',
            'per_nombre' => 'required',
            'per_apellido' => 'required',
            'per_telefono' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];

        $message = [
            'per_numero_documento.required' => 'El campo número de documento es requerido',
            'per_nombre.required' => 'El campo nombre (s) es requerido',
            'per_apellido.required' => 'El campo apellido (s) es requerido',
            'per_telefono.required' => 'El campo telefono es requerido',
            'email.required' => 'El campo correo electronico es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password_confirmation.required' => 'El campo confirmar contraseña es requerido',
        ];

        $this->validate($request, $rules, $message);

        $ExistUser = DB::table('users')->where('per_numero_documento', $request->get('per_numero_documento'));

        if ($ExistUser->count() > 0) {
            Alert::warning('El usuario ya esta registrado');
            return redirect('/home');
        } else {
            $users->save();

            Alert::success('Usuario registrado');
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            $tiposdocumentos = TipoDocumento::all();
            $tipousuarios = Rol::all();
            $departamentos = Departamento::all();
            $municipios = Municipio::all();
            $user = User::find($id);
            return view('auth.edit')->with('departamentos', $departamentos)
                ->with('municipios', $municipios)
                ->with('tiposdocumentos', $tiposdocumentos)
                ->with('user', $user)
                ->with('tipousuarios', $tipousuarios);
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
        $user = User::find($id);
        $user->per_tipo_documento = $request->get('per_tipo_documento');
        $user->per_numero_documento = $request->get('per_numero_documento');
        $user->per_nombre = $request->get('per_nombre');
        $user->per_apellido = $request->get('per_apellido');
        $user->per_telefono = $request->get('per_telefono');
        $user->email = $request->get('email');
        $user->per_id_departamento = $request->get('per_id_departamento');
        $user->per_id_municipio = $request->get('per_id_municipio');
        $user->per_tipo_usuario = $request->get('per_tipo_usuario');

        $user->save();

        Alert::success('Usuario actualizado');

        return redirect('/home');
    }

    public function perfil($id)
    {
        $user = User::find($id);
        $tipodocumentos = TipoDocumento::all();
        return view('profile')->with('tipodocumentos', $tipodocumentos)
            ->with('user', $user);
    }

    public function actualizar(Request $request, $id)
    {
        $user = User::find($id);
        $user->per_tipo_documento = $request->get('per_tipo_documento');
        $user->per_numero_documento = $request->get('per_numero_documento');
        $user->per_nombre = $request->get('per_nombre');
        $user->per_apellido = $request->get('per_apellido');
        $user->per_telefono = $request->get('per_telefono');
        $user->email = $request->get('email');

        $user->save();

        Alert::success('Información actualizada');

        return back();
    }

    public function resetear(Request $request, $id){
        $user = User::find($id);
        $user->password = Hash::make($request->get('pass_new'));
        
        $user->save();
        
        Alert::success('Contraseña actulizada');

        Auth::logout();

        return redirect('./');
    }

    public function imagen(Request $request, $id){
        $user = User::find($id);
        $user->per_imagen = $request->get('per_imagen');

        if($request->hasfile('per_imagen')){
            $file = $request->file('per_imagen');
            $name = 'image_'.$user->per_numero_documento.'.'.$file->extension();

            $ruta = public_path('image/perfil/'. $name);

            $user->per_imagen = $name;

            if($file->extension() == 'jpg' || $file->extension() == 'png' || $file->extension() == 'jpeg'){
                copy($file, $ruta);
            }else{
                Alert::warning('El formato de la imagen no es el correcto');
                return back()->withInput();
            }
        }

        $user->save();

        Alert::success('Se actulizo foto de perfil');

        return back();;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Alert::success('Usuario eliminado');
        return redirect('/home');
    }
}
