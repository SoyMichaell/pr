@if (!Auth::check())
    @include('home')
@else
@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
    @section('message') <p>Actualizar información practica de grado.</p> @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title">Actualizar información</h4>
            <form action="/practica/{{ $practica->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md">
                        <label for="pra_id_estudiante" class="col-md-12 col-form-label">{{ __('Estudiante *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="pra_id_estudiante"
                                id="pra_id_estudiante">
                                <option selected>---- SELECCIONE ----</option>
                                @foreach ($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->id }}"
                                        {{ $estudiante->id == $practica->pra_id_estudiante ? 'selected' : '' }}>
                                        {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pra_razon_social"
                            class="col-md-12 col-form-label">{{ __('Nombre empresa *') }}</label>
                        <div class="col-md-12">
                            <input id="pra_razon_social" type="text"
                                class="form-control @error('pra_razon_social') is-invalid @enderror" name="pra_razon_social"
                                value="{{ $practica->pra_razon_social }}" autocomplete="pra_razon_social" autofocus>
                            @error('pra_razon_social')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pra_nit_empresa" class="col-md-12 col-form-label">{{ __('Nit empresa *') }}</label>
                        <div class="col-md-12">
                            <input id="pra_nit_empresa" type="number"
                                class="form-control @error('pra_nit_empresa') is-invalid @enderror" name="pra_nit_empresa"
                                value="{{ $practica->pra_nit_empresa }}" autocomplete="pra_nit_empresa" autofocus>
                            @error('pra_nit_empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pra_telefono" class="col-md-12 col-form-label">{{ __('Telefono empresa *') }}</label>
                        <div class="col-md-12">
                            <input id="pra_telefono" type="number"
                                class="form-control @error('pra_telefono') is-invalid @enderror" name="pra_telefono"
                                value="{{ $practica->pra_telefono }}" autocomplete="pra_telefono" autofocus>
                            @error('pra_telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pra_direccion"
                            class="col-md-12 col-form-label">{{ __('Dirección empresa *') }}</label>
                        <div class="col-md-12">
                            <input id="pra_direccion" type="text"
                                class="form-control @error('pra_direccion') is-invalid @enderror" name="pra_direccion"
                                value="{{ $practica->pra_direccion }}" autocomplete="pra_direccion" autofocus>
                            @error('pra_direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pra_fecha_inicio"
                            class="col-md-12 col-form-label">{{ __('Fecha inicio laboral *') }}</label>
                        <div class="col-md-12">
                            <input id="pra_fecha_inicio" type="date"
                                class="form-control @error('pra_fecha_inicio') is-invalid @enderror" name="pra_fecha_inicio"
                                value="{{ $practica->pra_fecha_inicio }}" autocomplete="pra_fecha_inicio" autofocus>
                            @error('pra_fecha_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pra_fecha_fin"
                            class="col-md-16 col-form-label">{{ __('Fecha fin laboral ') }}</label>
                        <div class="col-md-12">
                            <input id="pra_fecha_fin" type="date"
                                class="form-control @error('pra_fecha_fin') is-invalid @enderror" name="pra_fecha_fin"
                                value="{{ $practica->pra_fecha_inicio }}" autocomplete="pra_fecha_fin" autofocus>
                            @error('pra_fecha_fin')
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
@endsection
@endif
