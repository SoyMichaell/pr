@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del trabajo de grado.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="fase1-tab" data-toggle="tab" href="#fase1" role="tab" aria-controls="home"
                    aria-selected="true">Fase información proyecto</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fasedirector-tab" data-toggle="tab" href="#fasedirector" role="tab"
                    aria-controls="fasestado" aria-selected="true">Fase director / codirector</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fasestado-tab" data-toggle="tab" href="#fasestado" role="tab"
                    aria-controls="fasestado" aria-selected="true">Fase estado proyecto</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fasejurado-tab" data-toggle="tab" href="#fasejurado" role="tab"
                    aria-controls="fasejurado" aria-selected="false">Fase asignación jurados</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="faseacta-tab" data-toggle="tab" href="#faseacta" role="tab"
                    aria-controls="faseacta" aria-selected="false">Fase actas / cierre</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fasecontrato-tab" data-toggle="tab" href="#fasecontrato" role="tab"
                    aria-controls="fasecontrato" aria-selected="false">Fase contratos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="fasefinal-tab" data-toggle="tab" href="#fasefinal" role="tab"
                    aria-controls="fasefinal" aria-selected="false">Fase final</a>
            </li>
        </ul>
        <div class="tab-content tile" id="myTabContent">
            <div class="tab-pane fade show active" id="fase1" role="tabpanel" aria-labelledby="fase1-tab">
                <div class="mt-2 p-2">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_codigo_proyecto">Codigo proyecto</label>
                                <input class="form-control @error('tra_codigo_proyecto') is-invalid @enderror"
                                    name="tra_codigo_proyecto" id="tra_codigo_proyecto"
                                    value="{{ old('tra_codigo_proyecto') }}" type="text"
                                    autocomplete="tra_codigo_proyecto" autofocus>
                                @error('tra_codigo_proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="tra_titulo_proyecto">Titulo proyecto de grado</label>
                                <input class="form-control @error('tra_titulo_proyecto') is-invalid @enderror"
                                    name="tra_titulo_proyecto" id="tra_titulo_proyecto"
                                    value="{{ old('tra_titulo_proyecto') }}" type="text"
                                    autocomplete="tra_titulo_proyecto" autofocus>
                                @error('tra_titulo_proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_fecha_inicio">Fecha de inicio</label>
                                <input class="form-control @error('tra_fecha_inicio') is-invalid @enderror"
                                    name="tra_fecha_inicio" id="tra_fecha_inicio"
                                    value="{{ old('tra_fecha_inicio') }}" type="date" autocomplete="tra_fecha_inicio"
                                    autofocus>
                                @error('tra_fecha_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="tra_modalidad_grado">Modalidad de grado</label>
                                <select class="js-example-placeholder-single form-select" name="tra_modalidad_grado"
                                    id="tra_modalidad_grado">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($modalidades as $modalidad)
                                        <option value="{{ $modalidad->id }}">{{ $modalidad->mod_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="fasedirector" role="tabpanel" aria-labelledby="fasedirector-tab">
                <div class="mt-2 p-2">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_director">Director</label>
                                <select class="js-example-placeholder-single form-select" name="tra_director"
                                    id="tra_director">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tra_codirector">Codirector</label>
                                <select class="js-example-placeholder-single form-select" name="tra_codirector"
                                    id="tra_codirector">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="fasestado" role="tabpanel" aria-labelledby="fasestado-tab">
                <div class="mt-2 p-2">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_estado_propuesta">Estado de la propuesta</label>
                                <select class="form-select" name="tra_estado_propuesta" id="tra_estado_propuesta">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="aprobada">Aprobada</option>
                                    <option value="rechazada">Rechazada</option>
                                    <option value="aplazada">Aplazada</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tra_estado_proyecto">Estado del proyecto</label>
                                <select class="form-select" name="tra_estado_proyecto" id="tra_estado_proyecto">
                                    <option value="">---- SELECCIONE ----</option>
                                    <option value="aprobado-anteproyecto">Aprobado anteproyecto</option>
                                    <option value="aprobado-director">Aprobado por director</option>
                                    <option value="aprobado-jurados">Aprobado por jurados</option>
                                    <option value="aprobado-sustentacion">Aprobado para sustentación</option>
                                    <option value="sustentado">Sustentado</option>
                                    <option value="rechazado">Rechazado</option>
                                    <option value="anulado">Anulado</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="fasejurado" role="tabpanel" aria-labelledby="fasejurado-tab">
                <div class="mt-2 p-2">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tra_jurado1">Jurado 1</label>
                                <select class="form-select" name="tra_jurado1" id="tra_jurado1">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                                <label class="mt-2" for="tra_jurado1_zip">Documentos formato .zip</label>
                                <input class="form-control col-md-6" type="file" name="tra_jurado1_zip"
                                    id="tra_jurado1_zip">
                            </div>
                            <div class="col-md-6">
                                <label for="tra_jurado2">Jurado 2</label>
                                <select class="form-select" name="tra_jurado2" id="tra_jurado2">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                                <label class="mt-2" for="tra_jurado2_zip">Documentos formato .zip</label>
                                <input class="form-control col-md-6" type="file" name="tra_jurado2_zip"
                                    id="tra_jurado2_zip">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="faseacta" role="tabpanel" aria-labelledby="faseacta-tab">
                <div class="mt-2 p-2">
                    <form action="" method="post">
                        <div class="form-inline">
                            <div class="form-group col-md-1">
                                <label for="tra_acta_sustentacion">Acta sustentación</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control w-100 @error('tra_acta_sustentacion') is-invalid @enderror"
                                    name="tra_acta_sustentacion" id="tra_acta_sustentacion"
                                    value="{{ old('tra_acta_sustentacion') }}" type="number"
                                    autocomplete="tra_acta_sustentacion" placeholder="Número acta de sustentación"
                                    autofocus>
                                @error('tra_acta_sustentacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input class="form-control col-md-5" type="file" name="tra_acta_sustentacion_soporte"
                                    id="tra_acta_sustentacion_soporte">
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-inline">
                            <div class="form-group col-md-1">
                                <label for="tra_acta_grado">Acta grado</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control w-100 @error('tra_acta_grado') is-invalid @enderror"
                                    name="tra_acta_grado" id="tra_acta_grado"
                                    value="{{ old('tra_acta_grado') }}" type="number"
                                    autocomplete="tra_acta_grado" placeholder="Número acta de grado"
                                    autofocus>
                                @error('tra_acta_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input class="form-control col-md-5" type="file" name="tra_acta_grado"
                                    id="tra_acta_grado">
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-inline">
                            <div class="form-group col-md-2">
                                <label for="tra_fecha_finalizacion">Fecha finalización</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input class="form-control w-100 @error('tra_fecha_finalizacion') is-invalid @enderror"
                                    name="tra_fecha_finalizacion" id="tra_fecha_finalizacion"
                                    value="{{ old('tra_fecha_finalizacion') }}" type="date"
                                    autocomplete="tra_fecha_finalizacion"
                                    autofocus>
                                @error('tra_fecha_finalizacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-0 mx-auto mt-4">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="fasecontrato" role="tabpanel" aria-labelledby="fasecontrato-tab">
            </div>
            <div class="tab-pane fade" id="fasefinal" role="tabpanel" aria-labelledby="fasefinal-tab">
            </div>
        </div>
    </div>
@endsection
@endif
