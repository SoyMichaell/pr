@if (!Auth::check())
    @include('home')
@else
@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fas fa-edit"></i> Formulario de edición de datos</h1>
    @section('message') <p>Actualizar información del estudiate.</p> @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title">Actualizar información</h4>
            <form action="/estudiante/{{ $estudiante->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_programa" class="col-md-12 col-form-label">{{ __('Programa *') }}</label>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-10">
                                <select class="js-example-placeholder-single form-select" name="estu_programa"
                                    id="estu_programa">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}"
                                            {{ $programa->id == $estudiante->estu_programa ? 'selected' : '' }}>
                                            {{ $programa->pro_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/programa/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_tipo_documento"
                            class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="estu_tipo_documento"
                                id="estu_tipo_documento">
                                <option selected>---- SELECCIONE ----</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}"
                                        {{ $tipo->id == $estudiante->estu_tipo_documento ? 'selected' : '' }}>
                                        {{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_numero_documento"
                            class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_numero_documento" type="number"
                                class="form-control @error('estu_numero_documento') is-invalid @enderror"
                                name="estu_numero_documento" value="{{ $estudiante->estu_numero_documento }}" required
                                autocomplete="estu_numero_documento" autofocus>
                            @error('estu_numero_documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_nombre" type="text"
                                class="form-control @error('estu_nombre') is-invalid @enderror" name="estu_nombre"
                                value="{{ $estudiante->estu_nombre }}" required autocomplete="estu_nombre" autofocus>
                            @error('estu_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_apellido" class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_apellido" type="text"
                                class="form-control @error('estu_apellido') is-invalid @enderror" name="estu_apellido"
                                value="{{ $estudiante->estu_apellido }}" required autocomplete="estu_apellido" autofocus>
                            @error('estu_apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_telefono1" class="col-md-12 col-form-label">{{ __('Telefono 1 *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_telefono1" type="number"
                                class="form-control @error('estu_telefono1') is-invalid @enderror" name="estu_telefono1"
                                value="{{ $estudiante->estu_telefono1 }}" required autocomplete="estu_telefono1"
                                autofocus>
                            @error('estu_telefono1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_telefono2" class="col-md-12 col-form-label">{{ __('Telefono 2 *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_telefono2" type="number"
                                class="form-control @error('estu_telefono2') is-invalid @enderror" name="estu_telefono2"
                                value="{{ $estudiante->estu_telefono2 }}" autocomplete="estu_telefono2" autofocus>
                            @error('estu_telefono2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_direccion" class="col-md-12 col-form-label">{{ __('Dirección *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_direccion" type="text"
                                class="form-control @error('estu_direccion') is-invalid @enderror" name="estu_direccion"
                                value="{{ $estudiante->estu_direccion }}" required autocomplete="estu_direccion"
                                autofocus>
                            @error('estu_direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_correo"
                            class="col-md-12 col-form-label">{{ __('Correo electronico *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_correo" type="email"
                                class="form-control @error('estu_correo') is-invalid @enderror" name="estu_correo"
                                value="{{ $estudiante->estu_correo }}" required autocomplete="estu_correo" autofocus>
                            @error('estu_correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_estrato" class="col-md-12 col-form-label">{{ __('Estrato *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_estrato" type="text"
                                class="form-control @error('estu_estrato') is-invalid @enderror" name="estu_estrato"
                                value="{{ $estudiante->estu_estrato }}" required autocomplete="estu_estrato" autofocus>
                            @error('estu_estrato')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_departamento"
                            class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-10">
                                <select class="js-example-placeholder-single form-select" name="estu_departamento"
                                    id="estu_departamento">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}"
                                            {{ $departamento->id == $estudiante->estu_departamento ? 'selected' : '' }}>
                                            {{ $departamento->dep_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/departamento/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_municipio"
                            class="col-md-12 col-form-label">{{ __('Municipio / sede *') }}</label>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-10">
                                <select class="js-example-placeholder-single form-select" name="estu_municipio"
                                    id="estu_municipio">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}"
                                            {{ $municipio->id == $estudiante->estu_municipio ? 'selected' : '' }}>
                                            {{ $municipio->mun_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/municipio/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_fecha_nacimiento"
                            class="col-md-12 col-form-label">{{ __('Fecha de Nacimiento *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_fecha_nacimiento" type="date"
                                class="form-control @error('estu_fecha_nacimiento') is-invalid @enderror"
                                name="estu_fecha_nacimiento" value="{{ $estudiante->estu_fecha_nacimiento }}" required
                                autocomplete="estu_fecha_nacimiento" autofocus>
                            @error('estu_fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_ingreso" class="col-md-12 col-form-label">{{ __('Año de ingreso *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_ingreso" type="text"
                                class="form-control @error('estu_ingreso') is-invalid @enderror" name="estu_ingreso"
                                value="{{ $estudiante->estu_ingreso }}" required autocomplete="estu_ingreso" autofocus>
                            @error('estu_ingreso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_ult_periodo"
                            class="col-md-12 col-form-label">{{ __('Ultimo periodo matriculado *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_ult_periodo" type="text"
                                class="form-control @error('estu_ult_periodo') is-invalid @enderror" name="estu_ult_periodo"
                                value="{{ $estudiante->estu_ult_periodo }}" required autocomplete="estu_ult_periodo"
                                autofocus placeholder="Ej: 2022-1">
                            @error('estu_ult_periodo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_semestre" class="col-md-12 col-form-label">{{ __('Semestre *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="estu_semestre"
                                id="estu_semestre">
                                <option selected>---- SELECCIONE ----</option>
                                @foreach ($tiemposList as $tiempoList)
                                    <option value="{{ $tiempoList->id }}"
                                        {{ $tiempoList->id == $estudiante->estu_semestre ? 'selected' : '' }}>
                                        {{ $tiempoList->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_financiamiento"
                            class="col-md-12 col-form-label">{{ __('Tipo de financiamiento *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_financiamiento" type="text"
                                class="form-control @error('estu_financiamiento') is-invalid @enderror"
                                name="estu_financiamiento" value="{{ $estudiante->estu_financiamiento }}" required
                                autocomplete="estu_financiamiento" autofocus
                                placeholder="Ej: De contado, Beca, Prestamo etc...">
                            @error('estu_financiamiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_beca" class="col-md-12 col-form-label">{{ __('Tipo de Beca *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_beca" type="text" class="form-control @error('estu_beca') is-invalid @enderror"
                                name="estu_beca" value="{{ $estudiante->estu_beca }}" required autocomplete="estu_beca"
                                autofocus>
                            @error('estu_beca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estu_estado" class="col-md-12 col-form-label">{{ __('Estado *') }}</label>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-10">
                                <select class="js-example-placeholder-single form-select" name="estu_estado"
                                    id="estu_estado">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($estadoprogramas as $estadoprograma)
                                        <option value="{{ $estadoprograma->id }}"
                                            {{ $estadoprograma->id == $estudiante->estu_estado ? 'selected' : '' }}>
                                            {{ $estadoprograma->est_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-outline-primary" href="/estadoprograma/create">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estu_matricula"
                            class="col-md-12 col-form-label">{{ __('Tipo de matricula *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_matricula" type="text"
                                class="form-control @error('estu_matricula') is-invalid @enderror" name="estu_matricula"
                                value="{{ $estudiante->estu_matricula }}" required autocomplete="estu_matricula"
                                autofocus placeholder="Ej: Pendiente, Pagado, Sin liquidar etc...">
                            @error('estu_matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="estu_pga"
                            class="col-md-12 col-form-label">{{ __('Promedio general acumulado *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_pga" type="text" class="form-control @error('estu_pga') is-invalid @enderror"
                                name="estu_pga" value="{{ $estudiante->estu_pga }}" required autocomplete="estu_pga"
                                autofocus>
                            @error('estu_pga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="estu_grado" class="col-md-12 col-form-label">{{ __('Fecha de grado *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_grado" type="date"
                                class="form-control @error('estu_grado') is-invalid @enderror" name="estu_grado"
                                value="{{ $estudiante->estu_grado }}" autocomplete="estu_grado" autofocus
                                placeholder="Ej: 2019, 2020, 2021, 2022 etc...">
                            @error('estu_grado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="estu_reconocimiento"
                            class="col-md-12 col-form-label">{{ __('Reconocimiento *') }}</label>
                        <div class="col-md-12">
                            <input id="estu_reconocimiento" type="number"
                                class="form-control @error('estu_reconocimiento') is-invalid @enderror"
                                name="estu_reconocimiento" value="{{ $estudiante->estu_reconocimiento }}" required
                                autocomplete="estu_reconocimiento" autofocus>
                            @error('estu_reconocimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-0 mx-auto">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
@endsection
@endif