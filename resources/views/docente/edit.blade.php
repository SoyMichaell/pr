@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información del docente.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/docente/{{ $docente->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_tipo_documento"
                                class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="doc_tipo_documento"
                                    id="doc_tipo_documento">
                                    <option selected>---- SELECCIONE ----</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ $tipo->id == $docente->doc_tipo_documento ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_numero_documento"
                                class="col-md-12 col-form-label">{{ __('Número de Documento *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_numero_documento" type="number"
                                    class="form-control @error('doc_numero_documento') is-invalid @enderror"
                                    name="doc_numero_documento" value="{{ $docente->doc_numero_documento }}"
                                    autocomplete="doc_numero_documento" autofocus>
                                @error('doc_numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_nombre" class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_nombre" type="text"
                                    class="form-control @error('doc_nombre') is-invalid @enderror" name="doc_nombre"
                                    value="{{ $docente->doc_nombre }}" autocomplete="doc_nombre" autofocus>
                                @error('doc_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_apellido" class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_apellido" type="text"
                                    class="form-control @error('doc_apellido') is-invalid @enderror" name="doc_apellido"
                                    value="{{ $docente->doc_apellido }}" autocomplete="doc_apellido" autofocus>
                                @error('doc_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_telefono1" class="col-md-12 col-form-label">{{ __('Telefono 1 *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_telefono1" type="number"
                                    class="form-control @error('doc_telefono1') is-invalid @enderror" name="doc_telefono1"
                                    value="{{ $docente->doc_telefono1 }}" autocomplete="doc_telefono1" autofocus>
                                @error('doc_telefono1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_telefono2"
                                class="col-md-12 col-form-label ">{{ __('Telefono 2 (Opcional)') }}</label>
                            <div class="col-md-12">
                                <input id="doc_telefono2" type="number"
                                    class="form-control @error('doc_telefono2') is-invalid @enderror" name="doc_telefono2"
                                    value="{{ $docente->doc_telefono2 }}" autocomplete="doc_telefono2" autofocus>
                                @error('doc_telefono2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_correo_personal"
                                class="col-md-12 col-form-label ">{{ __('Correo electronico personal *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_correo_personal" type="email"
                                    class="form-control @error('doc_correo_personal') is-invalid @enderror"
                                    name="doc_correo_personal" value="{{ $docente->doc_correo_personal }}"
                                    autocomplete="doc_correo_personal" autofocus>
                                @error('doc_correo_personal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_correo_institucional"
                                class="col-md-12 col-form-label ">{{ __('Correo electronico institucional *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_correo_institucional" type="email"
                                    class="form-control @error('doc_correo_institucional') is-invalid @enderror"
                                    name="doc_correo_institucional" value="{{ $docente->doc_correo_institucional }}"
                                    autocomplete="doc_correo_institucional" autofocus>
                                @error('doc_correo_institucional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_departamento"
                                class="col-md-12 col-form-label ">{{ __('Departamento *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_departamento" type="text"
                                    class="form-control @error('doc_departamento') is-invalid @enderror"
                                    name="doc_departamento" value="{{ $docente->doc_departamento }}"
                                    autocomplete="doc_departamento" autofocus>
                                @error('doc_departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_ciudad" class="col-md-12 col-form-label ">{{ __('Ciudad *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_ciudad" type="text"
                                    class="form-control @error('doc_ciudad') is-invalid @enderror" name="doc_ciudad"
                                    value="{{ $docente->doc_ciudad }}" autocomplete="doc_ciudad" autofocus>
                                @error('doc_ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_direccion" class="col-md-12 col-form-label ">{{ __('Dirección *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_direccion" type="text"
                                    class="form-control @error('doc_direccion') is-invalid @enderror" name="doc_direccion"
                                    value="{{ $docente->doc_direccion }}" autocomplete="doc_direccion" autofocus>
                                @error('doc_direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_estudios"
                                class="col-md-12 col-form-label ">{{ __('Nivel estudio *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_estudios" type="text"
                                    class="form-control @error('doc_estudios') is-invalid @enderror" name="doc_estudios"
                                    value="{{ $docente->doc_estudios }}" autocomplete="doc_estudios" autofocus
                                    placeholder="Pregrado, Posgrado, Maestria etc..">
                                @error('doc_estudios')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_fecha_inicio_contra"
                                class="col-md-12 col-form-label ">{{ __('Fecha Inicio de Contrato *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_fecha_inicio_contra" type="date"
                                    class="form-control @error('doc_fecha_inicio_contra') is-invalid @enderror"
                                    name="doc_fecha_inicio_contra" value="{{ $docente->doc_fecha_inicio_contra }}"
                                    required autocomplete="doc_fecha_inicio_contra" autofocus>
                                @error('doc_fecha_inicio_contra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_fecha_fin_contra"
                                class="col-md-12 col-form-label ">{{ __('Fecha Fin de Contrato *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_fecha_fin_contra" type="date"
                                    class="form-control @error('doc_fecha_fin_contra') is-invalid @enderror"
                                    name="doc_fecha_fin_contra" value="{{ $docente->doc_fecha_fin_contra }}" required
                                    autocomplete="doc_fecha_fin_contra" autofocus>
                                @error('doc_fecha_fin_contra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="doc_categoria" class="col-md-12 col-form-label ">{{ __('Categoria *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="doc_categoria"
                                    id="doc_categoria">
                                    <option selected>{{ ucfirst($docente->doc_categoria) }}</option>
                                    @php
                                        if ($docente->doc_categoria == 'tiempo completo') {
                                            echo "<option value='catedra'>Catedra</option>";
                                        } else {
                                            echo "<option value='tiempo completo'>Tiempo completo</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="doc_reconocimiento"
                                class="col-md-12 col-form-label ">{{ __('Reconocimientos *') }}</label>
                            <div class="col-md-12">
                                <input id="doc_reconocimiento" type="number"
                                    class="form-control @error('doc_reconocimiento') is-invalid @enderror"
                                    name="doc_reconocimiento" value="{{ $docente->doc_reconocimiento }}" required
                                    autocomplete="doc_reconocimiento" autofocus>
                                @error('doc_reconocimiento')
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
