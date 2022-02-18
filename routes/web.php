<?php

use App\Models\User;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\EstadoPrograma;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Facultad;
use App\Models\NivelFormacion;
use App\Models\Metodologia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

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

        return view('auth/login')->with('estadoprogramas', $estadoprogramas)
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/estadoprograma/pdf', [App\Http\Controllers\EstadoProgramaController::class, 'pdf']);

Route::get('/estadoprograma/export', [App\Http\Controllers\EstadoProgramaController::class, 'export']);

Route::resource('estadoprograma', App\Http\Controllers\EstadoProgramaController::class);

Route::get('/departamento/pdf', [App\Http\Controllers\DepartamentoController::class, 'pdf']);

Route::get('/departamento/export', [App\Http\Controllers\DepartamentoController::class, 'export']);

Route::resource('departamento', App\Http\Controllers\DepartamentoController::class);

Route::get('/municipio/pdf', [App\Http\Controllers\MunicipioController::class, 'pdf']);

Route::get('/municipio/export', [App\Http\Controllers\MunicipioController::class, 'export']);

Route::resource('municipio', App\Http\Controllers\MunicipioController::class);

Route::get('/facultad/pdf', [App\Http\Controllers\FacultadController::class, 'pdf']);

Route::get('/facultad/export', [App\Http\Controllers\FacultadController::class, 'export']);

Route::resource('facultad', App\Http\Controllers\FacultadController::class);

Route::get('/nivelformacion/pdf', [App\Http\Controllers\NivelFormacionController::class, 'pdf']);

Route::get('/nivelformacion/export', [App\Http\Controllers\NivelFormacionController::class, 'export']);

Route::resource('nivelformacion', App\Http\Controllers\NivelFormacionController::class);

Route::get('/metodologia/pdf', [App\Http\Controllers\MetodologiaController::class, 'pdf']);

Route::get('/metodologia/export', [App\Http\Controllers\MetodologiaController::class, 'export']);

Route::resource('metodologia', App\Http\Controllers\MetodologiaController::class);





/*Rutas programas*/
Route::get('programa/{programa}/mostrar_plan', [App\Http\Controllers\ProgramaController::class, 'mostrar_plan']);

Route::get('programa/{programa}/crear_plan', [App\Http\Controllers\ProgramaController::class, 'crear_plan']);

Route::post('programa/registro_plan', [App\Http\Controllers\ProgramaController::class, 'registro_plan']);

Route::get('programa/{plan}/{programa}/editar_plan', [App\Http\Controllers\ProgramaController::class, 'editar_plan']);

Route::put('programa/{programa}/actualizar_plan', [App\Http\Controllers\ProgramaController::class, 'actualizar_plan']);

Route::delete('programa/{programa}/eliminar_plan', [App\Http\Controllers\ProgramaController::class, 'eliminar_plan']);

Route::get('/programa/{programa}/selectivoplan', [App\Http\Controllers\ProgramaController::class, 'selectivoplan']);

Route::get('/programa/pdf', [App\Http\Controllers\ProgramaController::class, 'pdf']);

Route::get('/programa/export', [App\Http\Controllers\ProgramaController::class, 'export']);

Route::resource('programa', App\Http\Controllers\ProgramaController::class);





/*Rutas Estudiantes*/ 


Route::get('/estudiante/pdf', [App\Http\Controllers\EstudianteController::class, 'pdf']);

Route::get('/estudiante/export', [App\Http\Controllers\EstudianteController::class, 'export']);

Route::get('/estudiante/listadobeca', [App\Http\Controllers\EstudianteController::class, 'listadobeca']);

Route::get('/estudiante/listadocontado', [App\Http\Controllers\EstudianteController::class, 'listadocontado']);

Route::get('/estudiante/listadoprestamo', [App\Http\Controllers\EstudianteController::class, 'listadoprestamo']);

Route::post('/estudiante/listadoingreso', [App\Http\Controllers\EstudianteController::class, 'listadoingreso']);

Route::resource('estudiante', App\Http\Controllers\EstudianteController::class);


Route::resource('externo', App\Http\Controllers\ExternoController::class);

/*Rutas docentes*/
Route::get('/docente/pdf', [App\Http\Controllers\DocenteController::class, 'pdf']);

Route::get('/docente/export', [App\Http\Controllers\DocenteController::class, 'export']);

Route::resource('docente', App\Http\Controllers\DocenteController::class);

<<<<<<< HEAD
=======
/*Rutas director externo*/

Route::resource('externo', App\Http\Controllers\ExternoController::class);
>>>>>>> 5303d804215456781a1b8079392f4c726554985a




Route::get('/prueba/pdf', [App\Http\Controllers\PruebaController::class, 'pdf']);

Route::get('/prueba/export', [App\Http\Controllers\PruebaController::class, 'export']);

Route::resource('prueba', App\Http\Controllers\PruebaController::class);

Route::get('/software/pdf', [App\Http\Controllers\SoftwareController::class, 'pdf']);

Route::get('/software/export', [App\Http\Controllers\SoftwareController::class, 'export']);

Route::resource('software', App\Http\Controllers\SoftwareController::class);

Route::get('/extension/pdf', [App\Http\Controllers\ExtensionController::class, 'pdf']);

Route::get('/extension/export', [App\Http\Controllers\ExtensionController::class, 'export']);

Route::resource('extension', App\Http\Controllers\ExtensionController::class);

Route::get('/practica/pdf', [App\Http\Controllers\PracticaController::class, 'pdf']);

Route::get('/practica/export', [App\Http\Controllers\PracticaController::class, 'export']);

Route::resource('practica', App\Http\Controllers\PracticaController::class);

Route::get('/laboratorio/pdf', [App\Http\Controllers\LaboratorioController::class, 'pdf']);

Route::get('/laboratorio/export', [App\Http\Controllers\LaboratorioController::class, 'export']);

Route::resource('laboratorio', App\Http\Controllers\LaboratorioController::class);

Route::get('/convenio/pdf', [App\Http\Controllers\ConvenioController::class, 'pdf']);

Route::get('/convenio/export', [App\Http\Controllers\ConvenioController::class, 'export']);

Route::resource('convenio', App\Http\Controllers\ConvenioController::class);

Route::get('/red/pdf', [App\Http\Controllers\RedAcademicaController::class, 'pdf']);

Route::get('/red/export', [App\Http\Controllers\RedAcademicaController::class, 'export']);

Route::resource('red', App\Http\Controllers\RedAcademicaController::class);

Route::get('/movilidad/pdf', [App\Http\Controllers\MovilidadController::class, 'pdf']);

Route::get('/movilidad/export', [App\Http\Controllers\MovilidadController::class, 'export']);

Route::resource('movilidad', App\Http\Controllers\MovilidadController::class);

Route::get('/investigacion/pdf', [App\Http\Controllers\InvestigacionController::class, 'pdf']);

Route::get('/investigacion/export', [App\Http\Controllers\InvestigacionController::class, 'export']);

Route::resource('investigacion', App\Http\Controllers\InvestigacionController::class);

Route::get('/egresado/pdf', [App\Http\Controllers\EgresadoController::class, 'pdf']);

Route::get('/egresado/export', [App\Http\Controllers\EgresadoController::class, 'export']);

Route::resource('egresado', App\Http\Controllers\EgresadoController::class);

Route::get('/trabajo/pdf', [App\Http\Controllers\TrabajoController::class, 'pdf']);

Route::get('/trabajo/export', [App\Http\Controllers\TrabajoController::class, 'export']);

Route::resource('trabajo', App\Http\Controllers\TrabajoController::class);

Route::get('usuario/{usuario}/perfil', [App\Http\Controllers\UserController::class, 'perfil']);

Route::put('usuario/{usuario}/actualizar', [App\Http\Controllers\UserController::class, 'actualizar']);

Route::put('usuario/{usuario}/resetear', [App\Http\Controllers\UserController::class, 'resetear']);

Route::put('usuario/{usuario}/imagen', [App\Http\Controllers\UserController::class, 'imagen']);

Route::post('usuario', [App\Http\Controllers\UserController::class, 'store']);

Route::resource('usuario', App\Http\Controllers\UserController::class);


/*Rutas modalidades de grado*/

Route::resource('modalidad', App\Http\Controllers\ModalidadGradoController::class);
