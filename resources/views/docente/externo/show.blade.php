@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-book"></i> Vista registro</h1>
    @section('message')
        <p>Información almanecanada en el sistema</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="tile w-100">
                <h4 class="tile title"><i class="fa fa-question-circle"></i> Vista registro</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dic_tipo_documento"
                            class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="dic_tipo_documento"
                                id="dic_tipo_documento" disabled>
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}"
                                        {{ $tipo->id == $externo->dic_tipo_documento ? 'selected' : '' }}>
                                        {{ $tipo->nombre }}</option>
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
                                name="dic_numero_documento" value="{{ $externo->dic_numero_documento }}"
                                autocomplete="dic_numero_documento" autofocus disabled>
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
                                value="{{ $externo->dic_nombre }}" autocomplete="dic_nombre" autofocus disabled>
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
                                value="{{ $externo->dic_apellido }}" autocomplete="dic_apellido" autofocus disabled>
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
                                value="{{ $externo->dic_telefono1 }}" autocomplete="dic_telefono1" autofocus
                                disabled>
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
                                class="form-control @error('dic_telefono2') is-invalid @enderror" name="dic_telefono2"
                                value="{{ $externo->dic_telefono2 }}" autocomplete="dic_telefono2" autofocus
                                disabled>
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
                                name="dic_correo_electronico" value="{{ $externo->dic_correo_electronico }}"
                                autocomplete="dic_correo_electronico" autofocus disabled>
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
                                <input class="form-control @error('dic_banco') is-invalid @enderror" type="text"
                                    name="dic_banco" id="dic_banco" placeholder="Tipo de banco"
                                    value="{{ $externo->dic_banco }}" autocomplete="dic_banco" autofocus disabled>
                                @error('dic_banco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control @error('dic_numero_cuenta') is-invalid @enderror"
                                    type="number" name="dic_numero_cuenta" id="dic_numero_cuenta"
                                    value="{{ $externo->dic_numero_cuenta }}" autocomplete="dic_numero_cuenta"
                                    placeholder="Número de cuenta" autofocus disabled>
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
                                name="dic_departamento" value="{{ $externo->dic_departamento }}"
                                autocomplete="dic_departamento" autofocus disabled>
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
                                value="{{ $externo->dic_ciudad }}" autocomplete="dic_ciudad" autofocus disabled>
                            @error('dic_ciudad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
