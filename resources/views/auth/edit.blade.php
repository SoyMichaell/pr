@extends('layouts.app')
@section('title')
    <h1 class="titulo">Formulario de edición de datos</h1>
@section('message')
    <p>Actualizar informacion</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile">
        <h4 class="tile title"> Actualizar información</h4>
        <form action="/usuario/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="per_tipo_documento"
                        class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                    <div class="col-md-12">
                        <select class="js-example-placeholder-single form-select" name="per_tipo_documento"
                            id="per_tipo_documento">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($tiposdocumentos as $tiposdocumento)
                                <option value="{{ $tiposdocumento->id }}"
                                    {{ $tiposdocumento->id == $user->per_tipo_documento ? 'selected' : '' }}>
                                    {{ $tiposdocumento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="per_numero_documento"
                        class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                    <div class="col-md-12">
                        <input id="per_numero_documento" type="number"
                            class="form-control @error('per_numero_documento') is-invalid @enderror"
                            name="per_numero_documento" value="{{ $user->per_numero_documento }}"
                            autocomplete="per_numero_documento" autofocus>
                        @error('per_numero_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="per_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                    <div class="col-md-12">
                        <input id="per_nombre" type="text"
                            class="form-control @error('per_nombre') is-invalid @enderror" name="per_nombre"
                            value="{{ $user->per_nombre }}" autocomplete="per_nombre" autofocus>
                        @error('per_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="per_apellido" class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                    <div class="col-md-12">
                        <input id="per_apellido" type="text"
                            class="form-control @error('per_apellido') is-invalid @enderror" name="per_apellido"
                            value="{{ $user->per_apellido }}" autocomplete="per_apellido" autofocus>
                        @error('per_apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="per_telefono" class="col-md-12 col-form-label">{{ __('Telefono *') }}</label>
                    <div class="col-md-12">
                        <input id="per_telefono" type="number"
                            class="form-control @error('per_telefono') is-invalid @enderror" name="per_telefono"
                            value="{{ $user->per_telefono }}" autocomplete="per_telefono" autofocus>
                        @error('per_telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="col-md-12 col-form-label">{{ __('Correo electronico *') }}</label>
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="per_id_departamento"
                        class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                    <div class="col-md-12">
                        <select class="js-example-placeholder-single form-select" name="per_id_departamento"
                            id="per_id_departamento">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}"
                                    {{ $departamento->id == $user->per_id_departamento ? 'selected' : '' }}>
                                    {{ $departamento->dep_nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="per_id_municipio"
                        class="col-md-12 col-form-label">{{ __('Municipio o sede *') }}</label>
                    <div class="col-md-12">
                        <select class="js-example-placeholder-single form-select" name="per_id_municipio"
                            id="per_id_municipio">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}"
                                    {{ $municipio->id == $user->per_id_municipio ? 'selected' : '' }}>
                                    {{ $municipio->mun_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="per_tipo_usuario"
                        class="col-md-12 col-form-label">{{ __('Tipo de usuario *') }}</label>
                    <div class="col-md-12">
                        <select class="js-example-placeholder-single form-select" name="per_tipo_usuario"
                            id="per_tipo_usuario">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($tipousuarios as $tipousuario)
                                <option value="{{ $tipousuario->id }}"
                                    {{ $tipousuario->id == $user->per_tipo_usuario ? 'selected' : '' }}>
                                    {{ $tipousuario->rol_nombre }}</option>
                            @endforeach
                        </select>
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
