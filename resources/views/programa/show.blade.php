@if (!Auth::check())
    @include('home')
@else
@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fas fa-headset"></i> Vista registro</h1>
    @section('message') <p>Información almanecanada en el sistema</p> @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title"><i class="far fa-question-circle"></i> Vista registro</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_estado_programa">{{ __('Estado programa') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_estado_programa"
                        id="pro_estado_programa" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($estadoprogramas as $estadoprograma)
                            <option value="{{ $estadoprograma->id }}"
                                {{ $estadoprograma->id == $programa->pro_estado_programa ? 'selected' : '' }}>
                                {{ $estadoprograma->est_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_departamento">{{ __('Departamento') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_departamento" id="pro_departamento"
                        disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ $departamento->id == $programa->pro_departamento ? 'selected' : '' }}>
                                {{ $departamento->dep_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_municipio">{{ __('Municipio / sede') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_municipio" id="pro_municipio"
                        disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}"
                                {{ $municipio->id == $programa->pro_municipio ? 'selected' : '' }}>
                                {{ $municipio->mun_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_facultad">{{ __('Facultad') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_facultad" id="pro_facultad"
                        disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->id }}"
                                {{ $facultad->id == $programa->pro_facultad ? 'selected' : '' }}>
                                {{ $facultad->fac_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_nombre">{{ __('Programa *') }}</label>
                    <input id="pro_nombre" type="text" class="form-control @error('pro_nombre') is-invalid @enderror"
                        name="pro_nombre" value="{{ $programa->pro_nombre }}" required autocomplete="pro_nombre"
                        autofocus disabled>
                    @error('pro_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_codigosnies">{{ __('Codgio SNIES *') }}</label>
                    <input id="pro_codigosnies" type="text"
                        class="form-control @error('pro_codigosnies') is-invalid @enderror" name="pro_codigosnies"
                        value="{{ $programa->pro_codigosnies }}" required autocomplete="pro_codigosnies" autofocus
                        disabled>
                    @error('pro_codigosnies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_resolucion">{{ __('Resolución *') }}</label>
                    <input id="pro_resolucion" type="text"
                        class="form-control @error('pro_resolucion') is-invalid @enderror" name="pro_resolucion"
                        value="{{ $programa->pro_resolucion }}" required autocomplete="pro_resolucion" autofocus
                        disabled>
                    @error('pro_resolucion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_titulo">{{ __('Titulo *') }}</label>
                    <input id="pro_titulo" type="text" class="form-control @error('pro_titulo') is-invalid @enderror"
                        name="pro_titulo" value="{{ $programa->pro_titulo }}" required autocomplete="pro_titulo"
                        autofocus disabled>
                    @error('pro_titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_fecha_ult">{{ __('Fecha ultimo registro*') }}</label>
                    <input id="pro_fecha_ult" type="date" class="form-control @error('pro_fecha_ult') is-invalid @enderror"
                        name="pro_fecha_ult" value="{{ $programa->pro_fecha_ult }}" required autocomplete="pro_fecha_ult"
                        autofocus disabled>
                    @error('pro_fecha_ult')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pro_fecha_prox">{{ __('Fecha proximo registro *') }}</label>
                    <input id="pro_fecha_prox" type="date"
                        class="form-control @error('pro_fecha_prox') is-invalid @enderror" name="pro_fecha_prox"
                        value="{{ $programa->pro_fecha_prox }}" autocomplete="pro_fecha_prox" autofocus disabled>
                    @error('pro_fecha_prox')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_nivel_formacion">{{ __('Nivel de formación ') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_nivel_formacion"
                        id="pro_nivel_formacion" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($niveles as $nivel)
                            <option value="{{ $nivel->id }}"
                                {{ $nivel->id == $programa->pro_nivel_formacion ? 'selected' : '' }}>
                                {{ $nivel->niv_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_programa_ciclos">{{ __('Progama por ciclos') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_programa_ciclos"
                        id="pro_programa_ciclos" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($programasCiclo as $programaCiclo)
                            <option value="{{ $programaCiclo->id }}"
                                {{ $programaCiclo->id == $programa->pro_programa_ciclos ? 'selected' : '' }}>
                                {{ $programaCiclo->prc_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_metodologia">{{ __('Metodologia ') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_metodologia" id="pro_metodologia"
                        disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($metodologias as $metodologia)
                            <option value="{{ $metodologia->id }}"
                                {{ $metodologia->id == $programa->pro_metodologia ? 'selected' : '' }}>
                                {{ $metodologia->met_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_duraccion">{{ __('Duracción programa (semestres)') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_duraccion" id="pro_duraccion"
                        disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($tiemposList as $tiempoList)
                            <option value="{{ $tiempoList->id }}"
                                {{ $tiempoList->id == $programa->pro_duraccion ? 'selected' : '' }}>
                                {{ $tiempoList->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pro_periodo">{{ __('Periodo de admisión ') }}</label>
                    <select class="js-example-placeholder-single form-select" name="pro_periodo" id="pro_periodo" disabled>
                        <option selected>---- SELECCIONE ----</option>
                        @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->id }}"
                                {{ $periodo->id == $programa->pro_periodo ? 'selected' : '' }}>
                                {{ $periodo->per_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pro_norma">{{ __('Norma creación programa *') }}</label>
                    <input id="pro_norma" type="text" class="form-control @error('pro_norma') is-invalid @enderror"
                        name="pro_norma" value="{{ $programa->pro_norma }}" required autocomplete="pro_norma" autofocus
                        disabled>
                    @error('pro_norma')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="pro_director_programa">{{ __(' Director de programa ') }}</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="pro_director_programa"
                                id="pro_director_programa" disabled>
                                <option selected>---- SELECCIONE ----</option>
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}"
                                        {{ $docente->id == $programa->pro_director_programa ? 'selected' : '' }}>
                                        {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
@endif