@extends('layouts.app')
@section('title')
    <h3>Perfil</h3>
@section('message')
    <p>Datos basicos</p>
@endsection
@endsection
@section('content')
<style>
    .form-control-custom {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #ecf0f0;
        font-weight: bold;
    }

    .image-profile{
        width: 200px;
        margin-top: 10px;
        margin-bottom: 20px;
    }

</style>

<div class="container-fluid">
    <div class="d-flex align-items-start">
        <div class="tile col-md-3 p-3 text-center">
            <h4 class="mt-4">{{ Auth::user()->per_nombre.' '.Auth::user()->per_apellido }}</h4>
            <h6>{{ auth()->user()->tipousuario->rol_nombre }}</h6>

            <div class="d-flex">
                <div class="col-md-12 nav flex-column nav-pills me-3 bg-white p-3" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-perfil-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-perfil" type="button" role="tab" aria-controls="v-pills-perfil"
                        aria-selected="true">Perfil</button>
                    <button class="nav-link" id="v-pills-contra-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-contra" type="button" role="tab" aria-controls="v-pills-contra"
                        aria-selected="false">Cambiar contraseña</button>
                    <button class="nav-link" id="v-pills-ajustes-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-ajustes" type="button" role="tab" aria-controls="v-pills-ajustes"
                        aria-selected="false">Cambiar foto de usuario</button>
                </div>
            </div>

        </div>
        <div class="tile col-md-9 p-3" style="margin-left: 40px">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-perfil" role="tabpanel"
                    aria-labelledby="v-pills-perfil-tab">
                    <form action="/usuario/{{ $user->id }}/actualizar" method="post">
                        <h4 class="tile title"><i class="fa fa-id-badge"></i> Información basica</h4>
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12" for="per_tipo_documento">Tipo de documento</label>
                                <div class="col-md-12">
                                    <select class="form-select form-control-custom" name="per_tipo_documento"
                                        id="per_tipo_documento">
                                        @foreach ($tipodocumentos as $tipo)
                                            <option value="{{ $tipo->id }}"
                                                {{ $tipo->id == $user->per_tipo_documento ? 'selected' : '' }}>
                                                {{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12 form-label" for="per_numero_documento">Número de
                                    documento</label>
                                <div class="col-md-12">
                                    <input id="per_numero_documento" type="number"
                                        class="form-control-custom @error('per_numero_documento') is-invalid @enderror"
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
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12 form-label" for="per_nombre">Nombre (s)</label>
                                <div class="col-md-12">
                                    <input id="per_nombre" type="text"
                                        class="form-control-custom @error('per_nombre') is-invalid @enderror" name="per_nombre"
                                        value="{{ $user->per_nombre }}" autocomplete="per_nombre" autofocus>
                                    @error('per_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12 form-label" for="per_apellido">Apellido (s)</label>
                                <div class="col-md-12">
                                    <input id="per_apellido" type="text"
                                        class="form-control-custom @error('per_apellido') is-invalid @enderror"
                                        name="per_apellido" value="{{ $user->per_apellido }}"
                                        autocomplete="per_apellido" autofocus>
                                    @error('per_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12 form-label" for="per_telefono">Telefono </label>
                                <div class="col-md-12">
                                    <input id="per_telefono" type="number"
                                        class="form-control-custom @error('per_telefono') is-invalid @enderror"
                                        name="per_telefono" value="{{ $user->per_telefono }}"
                                        autocomplete="per_telefono" autofocus>
                                    @error('per_telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label class="col-md-12 form-label" for="email">Correo electronico</label>
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control-custom @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" autocomplete="email" autofocus>
                                    @error('email')
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
                <div class="tab-pane fade" id="v-pills-contra" role="tabpanel" aria-labelledby="v-pills-contra-tab">
                    <form action="/usuario/{{ $user->id }}/resetear" method="post">
                        @csrf
                        @method('PUT')
                        <h4 class="tile title"><i class="fa fa-key"></i> Cambiar contraseña</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-md-12 form-label" for="pass_new">Nueva contraseña</label>
                                <div class="col-md-12">
                                    <input id="pass_new" type="password"
                                        class="form-control-custom @error('pass_new') is-invalid @enderror" name="pass_new"
                                        required autocomplete="pass_new" autofocus>
                                    @error('pass_new')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12 form-label" for="contrasena">Confirmar contraseña</label>
                                <div class="col-md-12">
                                    <input id="com_new" type="password"
                                        class="form-control-custom @error('com_new') is-invalid @enderror" name="com_new"
                                        required autocomplete="com_new" autofocus>
                                    @error('com_new')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-ajustes" role="tabpanel" aria-labelledby="v-pills-ajustes-tab">
                    <form action="/usuario/{{ $user->id }}/imagen" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4 class="tile title"><i class="fa fa-picture-o"></i> Cambiar foto de perfil</h4>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <p><small>Formatos que se aceptan: .jpg .jpeg .png</small></p>
                                    <input id="per_imagen" type="file"
                                        class="form-control @error('per_imagen') is-invalid @enderror" name="per_imagen"
                                        required autocomplete="per_imagen" autofocus>
                                    @error('per_imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mx-auto">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
