@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
<<<<<<< HEAD
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="tile w-100">
                <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro docente externo</h4>
                <form action="/externo/{{$externo->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dic_tipo_documento"
                                class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="dic_tipo_documento"
                                    id="dic_tipo_documento">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{$tipo->id == $externo->dic_tipo_documento ? 'selected' : ''}}>{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dic_numero_documento"
                                class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_numero_documento" type="number"
                                    class="form-control @error('dic_numero_documento') is-invalid @enderror"
                                    name="dic_numero_documento" value="{{$externo->dic_numero_documento}}"
                                    autocomplete="dic_numero_documento" autofocus>
                                @error('dic_numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dic_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_nombre" type="text"
                                    class="form-control @error('dic_nombre') is-invalid @enderror" name="dic_nombre"
                                    value="{{$externo->dic_nombre}}" autocomplete="dic_nombre" autofocus>
                                @error('dic_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dic_apellido"
                                class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_apellido" type="text"
                                    class="form-control @error('dic_apellido') is-invalid @enderror" name="dic_apellido"
                                    value="{{$externo->dic_apellido}}" autocomplete="dic_apellido" autofocus>
                                @error('dic_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dic_telefono1"
                                class="col-md-12 col-form-label">{{ __('Telefono 1 *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_telefono1" type="number"
                                    class="form-control @error('dic_telefono1') is-invalid @enderror"
                                    name="dic_telefono1" value="{{$externo->dic_telefono1}}"
                                    autocomplete="dic_telefono1" autofocus>
                                @error('dic_telefono1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dic_telefono2"
                                class="col-md-12 col-form-label">{{ __('Telefono 2 (Opcional)') }}</label>
                            <div class="col-md-12">
                                <input id="dic_telefono2" type="number"
                                    class="form-control @error('dic_telefono2') is-invalid @enderror"
                                    name="dic_telefono2" value="{{$externo->dic_telefono2}}"
                                    autocomplete="dic_telefono2" autofocus>
                                @error('dic_telefono2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dic_correo_electronico"
                                class="col-md-12 col-form-label">{{ __('Correo electronico personal *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_correo_electronico" type="email"
                                    class="form-control @error('dic_correo_electronico') is-invalid @enderror"
                                    name="dic_correo_electronico" value="{{$externo->dic_correo_electronico}}"
                                    autocomplete="dic_correo_electronico" autofocus>
                                @error('dic_correo_electronico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dic_bancos"
                                class="col-md-12 col-form-label">{{ __('Datos bancarios *') }}</label>
                            <div class="d-flex">
                                <div class="col-md-6">
                                    <input class="form-control @error('dic_banco') is-invalid @enderror" type="text" name="dic_banco" 
                                    id="dic_banco" placeholder="Tipo de banco" value="{{$externo->dic_banco}}" autocomplete="dic_banco" autofocus>
                                    @error('dic_banco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control @error('dic_numero_cuenta') is-invalid @enderror" type="number" name="dic_numero_cuenta"
                                    id="dic_numero_cuenta" value="{{$externo->dic_numero_cuenta}}" autocomplete="dic_numero_cuenta" 
                                    placeholder="Número de cuenta" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dic_departamento"
                                class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_departamento" type="text"
                                    class="form-control @error('dic_departamento') is-invalid @enderror"
                                    name="dic_departamento" value="{{$externo->dic_departamento}}"
                                    autocomplete="dic_departamento" autofocus>
                                @error('dic_departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dic_ciudad" class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                            <div class="col-md-12">
                                <input id="dic_ciudad" type="text"
                                    class="form-control @error('dic_ciudad') is-invalid @enderror" name="dic_ciudad"
                                    value="{{$externo->dic_ciudad}}" autocomplete="dic_ciudad" autofocus>
                                @error('dic_ciudad')
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
    </div>
@endsection
@endif
=======
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de edición de datos</h1>
    @section('message')
        <p>Actualizar información del director externo.</p>
    @endsection
@endsection
@section('content')
<div class="tile w-100">
    <h4 class="tile title">Actualizar información</h4>
    <form action="/externo/{{$externo->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dic_tipo_documento" class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                <div class="col-md-12">
                    <select class="js-example-placeholder-single form-select" name="dic_tipo_documento"
                        id="dic_tipo_documento">
                        <option value="">---- SELECCIONE ----</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{$tipo->id == $externo->dic_tipo_documento ? 'selected' : ''}}>{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="dic_numero_documento"
                    class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                <div class="col-md-12">
                    <input id="dic_numero_documento" type="number"
                        class="form-control @error('dic_numero_documento') is-invalid @enderror"
                        name="dic_numero_documento" value="{{$externo->dic_numero_documento}}"
                        autocomplete="dic_numero_documento" autofocus>
                    @error('dic_numero_documento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dic_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                <div class="col-md-12">
                    <input id="dic_nombre" type="text" class="form-control @error('dic_nombre') is-invalid @enderror"
                        name="dic_nombre" value="{{$externo->dic_nombre}}" autocomplete="dic_nombre" autofocus>
                    @error('dic_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="dic_apellido" class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                <div class="col-md-12">
                    <input id="dic_apellido" type="text"
                        class="form-control @error('dic_apellido') is-invalid @enderror" name="dic_apellido"
                        value="{{$externo->dic_apellido}}" autocomplete="dic_apellido" autofocus>
                    @error('dic_apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dic_telefono1" class="col-md-12 col-form-label">{{ __('Telefono 1 *') }}</label>
                <div class="col-md-12">
                    <input id="dic_telefono1" type="number"
                        class="form-control @error('dic_telefono1') is-invalid @enderror" name="dic_telefono1"
                        value="{{$externo->dic_telefono1}}" autocomplete="dic_telefono1" autofocus>
                    @error('dic_telefono1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="dic_telefono2" class="col-md-12 col-form-label">{{ __('Telefono 2 (Opcional)') }}</label>
                <div class="col-md-12">
                    <input id="dic_telefono2" type="number"
                        class="form-control @error('dic_telefono2') is-invalid @enderror" name="dic_telefono2"
                        value="{{$externo->dic_telefono2}}" autocomplete="dic_telefono2" autofocus>
                    @error('dic_telefono2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dic_correo_electronico"
                    class="col-md-12 col-form-label">{{ __('Correo electronico personal *') }}</label>
                <div class="col-md-12">
                    <input id="dic_correo_electronico" type="email"
                        class="form-control @error('dic_correo_electronico') is-invalid @enderror"
                        name="dic_correo_electronico" value="{{$externo->dic_correo_electronico}}"
                        autocomplete="dic_correo_electronico" autofocus>
                    @error('dic_correo_electronico')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="datos_banco"
                    class="col-md-12 col-form-label">{{ __('Datos bancarios *') }}</label>
                <div class="d-flex">
                    <div class="col-md-6">
                        <input class="form-control @error('dic_banco') is-invalid @enderror" type="text" name="dic_banco" 
                        id="dic_banco" placeholder="Tipo de banco" value="{{$externo->dic_banco}}" autocomplete="dic_banco" autofocus>
                        @error('dic_banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <input class="form-control @error('dic_numero_banco') is-invalid @enderror" type="number" name="dic_numero_banco" 
                        id="dic_numero_banco" placeholder="Número de cuenta" value="{{$externo->dic_numero_banco}}" autocomplete="dic_numero_banco" autofocus>
                        @error('dic_numero_banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dic_departamento" class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                <div class="col-md-12">
                    <input id="dic_departamento" type="text"
                        class="form-control @error('dic_departamento') is-invalid @enderror" name="dic_departamento"
                        value="{{$externo->dic_departamento}}" autocomplete="dic_departamento" autofocus>
                    @error('dic_departamento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="dic_ciudad" class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                <div class="col-md-12">
                    <input id="dic_ciudad" type="text" class="form-control @error('dic_ciudad') is-invalid @enderror"
                        name="dic_ciudad" value="{{$externo->dic_ciudad}}" autocomplete="doc_ciudad" autofocus>
                    @error('dic_ciudad')
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
@endsection
@endif
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
