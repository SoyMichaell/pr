<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\EstadoPrograma;
use App\Models\Facultad;
use App\Models\Metodologia;
use App\Models\Municipio;
use App\Models\User;
use App\Models\NivelFormacion;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estadoprogramas = EstadoPrograma::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $facultades = Facultad::all();
        $nivelformacions = NivelFormacion::all();
        $metodologias = Metodologia::all();
        $users = User::all();
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $egresados = DB::table('estudiantes')->where('estu_egresado',1);
        $directs = DB::table('users')->where('per_tipo_usuario', 2);

        return view('home')->with('estadoprogramas', $estadoprogramas)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('facultades', $facultades)
            ->with('docentes', $docentes)
            ->with('estudiantes', $estudiantes)
            ->with('users', $users)
            ->with('nivelformacions', $nivelformacions)
            ->with('metodologias', $metodologias)
            ->with('egresados', $egresados)
            ->with('directs', $directs);
    }
}
