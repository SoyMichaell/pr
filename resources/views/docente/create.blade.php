@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro del docente.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-100">
            <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro docente interno</h4>
            <form action="/docente" method="post">
                @csrf
                <input class="form-control" type="hidden" name="id_tipo" id="id_tipo" value="1" readonly>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doc_tipo_documento"
                            class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="doc_tipo_documento"
                                id="doc_tipo_documento">
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
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
                                name="doc_numero_documento" value="{{ old('doc_numero_documento') }}"
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
                                value="{{ old('doc_nombre') }}" autocomplete="doc_nombre" autofocus>
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
                                value="{{ old('doc_apellido') }}" autocomplete="doc_apellido" autofocus>
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
                                value="{{ old('doc_telefono1') }}" autocomplete="doc_telefono1" autofocus>
                            @error('doc_telefono1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_telefono2"
                            class="col-md-12 col-form-label">{{ __('Telefono 2 (Opcional)') }}</label>
                        <div class="col-md-12">
                            <input id="doc_telefono2" type="number"
                                class="form-control @error('doc_telefono2') is-invalid @enderror" name="doc_telefono2"
                                value="{{ old('doc_telefono2') }}" autocomplete="doc_telefono2" autofocus>
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
                            class="col-md-12 col-form-label">{{ __('Correo electronico personal *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_correo_personal" type="email"
                                class="form-control @error('doc_correo_personal') is-invalid @enderror"
                                name="doc_correo_personal" value="{{ old('doc_correo_personal') }}"
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
                            class="col-md-12 col-form-label">{{ __('Correo electronico institucional *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_correo_institucional" type="email"
                                class="form-control @error('doc_correo_institucional') is-invalid @enderror"
                                name="doc_correo_institucional" value="{{ old('doc_correo_institucional') }}"
                                autocomplete="doc_correo_institucional" autofocus>
                            @error('doc_correo_institucional')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-docente__interno" role="tabpanel"
                        aria-labelledby="list-docente__interno-list">
                        <div class="tile w-100">
                            <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro docente interno</h4>
                            <form action="/docente" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="doc_tipo_documento"
                                            class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                                        <div class="col-md-12">
                                            <select class="js-example-placeholder-single form-select"
                                                name="doc_tipo_documento" id="doc_tipo_documento">
                                                <option value="">---- SELECCIONE ----</option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
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
                                                name="doc_numero_documento" value="{{ old('doc_numero_documento') }}"
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
                                        <label for="doc_nombre"
                                            class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_nombre" type="text"
                                                class="form-control @error('doc_nombre') is-invalid @enderror"
                                                name="doc_nombre" value="{{ old('doc_nombre') }}"
                                                autocomplete="doc_nombre" autofocus>
                                            @error('doc_nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_apellido"
                                            class="col-md-12 col-form-label">{{ __('Apellido (s) *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_apellido" type="text"
                                                class="form-control @error('doc_apellido') is-invalid @enderror"
                                                name="doc_apellido" value="{{ old('doc_apellido') }}"
                                                autocomplete="doc_apellido" autofocus>
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
                                        <label for="doc_telefono1"
                                            class="col-md-12 col-form-label">{{ __('Telefono 1 *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_telefono1" type="number"
                                                class="form-control @error('doc_telefono1') is-invalid @enderror"
                                                name="doc_telefono1" value="{{ old('doc_telefono1') }}"
                                                autocomplete="doc_telefono1" autofocus>
                                            @error('doc_telefono1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_telefono2"
                                            class="col-md-12 col-form-label">{{ __('Telefono 2 (Opcional)') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_telefono2" type="number"
                                                class="form-control @error('doc_telefono2') is-invalid @enderror"
                                                name="doc_telefono2" value="{{ old('doc_telefono2') }}"
                                                autocomplete="doc_telefono2" autofocus>
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
                                            class="col-md-12 col-form-label">{{ __('Correo electronico personal *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_correo_personal" type="email"
                                                class="form-control @error('doc_correo_personal') is-invalid @enderror"
                                                name="doc_correo_personal" value="{{ old('doc_correo_personal') }}"
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
                                            class="col-md-12 col-form-label">{{ __('Correo electronico institucional *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_correo_institucional" type="email"
                                                class="form-control @error('doc_correo_institucional') is-invalid @enderror"
                                                name="doc_correo_institucional"
                                                value="{{ old('doc_correo_institucional') }}"
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
                                            class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_departamento" type="text"
                                                class="form-control @error('doc_departamento') is-invalid @enderror"
                                                name="doc_departamento" value="{{ old('doc_departamento') }}"
                                                autocomplete="doc_departamento" autofocus>
                                            @error('doc_departamento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_ciudad"
                                            class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_ciudad" type="text"
                                                class="form-control @error('doc_ciudad') is-invalid @enderror"
                                                name="doc_ciudad" value="{{ old('doc_ciudad') }}"
                                                autocomplete="doc_ciudad" autofocus>
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
                                        <label for="doc_direccion"
                                            class="col-md-12 col-form-label">{{ __('Dirección *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_direccion" type="text"
                                                class="form-control @error('doc_direccion') is-invalid @enderror"
                                                name="doc_direccion" value="{{ old('doc_direccion') }}"
                                                autocomplete="doc_direccion" autofocus>
                                            @error('doc_direccion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_estudios"
                                            class="col-md-12 col-form-label">{{ __('Nivel estudio *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_estudios" type="text"
                                                class="form-control @error('doc_estudios') is-invalid @enderror"
                                                name="doc_estudios" value="{{ old('doc_estudios') }}"
                                                autocomplete="doc_estudios" autofocus
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
                                            class="col-md-12 col-form-label">{{ __('Fecha Inicio de Contrato *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_fecha_inicio_contra" type="date"
                                                class="form-control @error('doc_fecha_inicio_contra') is-invalid @enderror"
                                                name="doc_fecha_inicio_contra"
                                                value="{{ old('doc_fecha_inicio_contra') }}"
                                                autocomplete="doc_fecha_inicio_contra" autofocus>
                                            @error('doc_fecha_inicio_contra')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_fecha_fin_contra"
                                            class="col-md-12 col-form-label">{{ __('Fecha Fin de Contrato *') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_fecha_fin_contra" type="date"
                                                class="form-control @error('doc_fecha_fin_contra') is-invalid @enderror"
                                                name="doc_fecha_fin_contra" value="{{ old('doc_fecha_fin_contra') }}"
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
                                        <label for="doc_categoria"
                                            class="col-md-12 col-form-label">{{ __('Categoria *') }}</label>
                                        <div class="col-md-12">
                                            <select class="js-example-placeholder-single form-select"
                                                name="doc_categoria" id="doc_categoria">
                                                <option value="">---- SELECCIONE ----</option>
                                                <option value="Tiempo completo">Tiempo Completo</option>
                                                <option value="Catedra">Catedra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doc_reconocimiento"
                                            class="col-md-12 col-form-label">{{ __('Reconocimientos') }}</label>
                                        <div class="col-md-12">
                                            <input id="doc_reconocimiento" type="number"
                                                class="form-control @error('doc_reconocimiento') is-invalid @enderror"
                                                name="doc_reconocimiento" value="{{ old('doc_reconocimiento') }}"
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
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-docente__externo" role="tabpanel"
                        aria-labelledby="list-docente__externo-list">
                        <div class="tile w-100">
                            <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro docente externo</h4>
                            <form action="/director" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dic_tipo_documento"
                                            class="col-md-12 col-form-label">{{ __('Tipo Documento *') }}</label>
                                        <div class="col-md-12">
                                            <select class="js-example-placeholder-single form-select"
                                                name="dic_tipo_documento" id="dic_tipo_documento">
                                                <option value="">---- SELECCIONE ----</option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
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
                                                name="dic_numero_documento" value="{{ old('dic_numero_documento') }}"
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
                                        <label for="dic_nombre"
                                            class="col-md-12 col-form-label">{{ __('Nombre (s) *') }}</label>
                                        <div class="col-md-12">
                                            <input id="dic_nombre" type="text"
                                                class="form-control @error('dic_nombre') is-invalid @enderror"
                                                name="dic_nombre" value="{{ old('dic_nombre') }}"
                                                autocomplete="dic_nombre" autofocus>
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
                                                class="form-control @error('dic_apellido') is-invalid @enderror"
                                                name="dic_apellido" value="{{ old('dic_apellido') }}"
                                                autocomplete="dic_apellido" autofocus>
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
                                                name="dic_telefono1" value="{{ old('dic_telefono1') }}"
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
                                                name="dic_telefono2" value="{{ old('dic_telefono2') }}"
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
                                                name="dic_correo_electronico" value="{{ old('dic_correo_electronico') }}"
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
                                                <input class="form-control" type="text" name="dic_banco" id="dic_banco" placeholder="Tipo de banco">
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="number" name="dic_numero_cuenta" id="dic_numero_cuenta" placeholder="Número de cuenta">
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
                                                name="dic_departamento" value="{{ old('dic_departamento') }}"
                                                autocomplete="dic_departamento" autofocus>
                                            @error('dic_departamento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dic_ciudad"
                                            class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                                        <div class="col-md-12">
                                            <input id="dic_ciudad" type="text"
                                                class="form-control @error('dic_ciudad') is-invalid @enderror"
                                                name="dic_ciudad" value="{{ old('dic_ciudad') }}"
                                                autocomplete="dic_ciudad" autofocus>
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
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
=======
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doc_departamento"
                            class="col-md-12 col-form-label">{{ __('Departamento *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_departamento" type="text"
                                class="form-control @error('doc_departamento') is-invalid @enderror"
                                name="doc_departamento" value="{{ old('doc_departamento') }}"
                                autocomplete="doc_departamento" autofocus>
                            @error('doc_departamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_ciudad" class="col-md-12 col-form-label">{{ __('Ciudad *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_ciudad" type="text"
                                class="form-control @error('doc_ciudad') is-invalid @enderror" name="doc_ciudad"
                                value="{{ old('doc_ciudad') }}" autocomplete="doc_ciudad" autofocus>
                            @error('doc_ciudad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="doc_direccion" class="col-md-12 col-form-label">{{ __('Dirección *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_direccion" type="text"
                                class="form-control @error('doc_direccion') is-invalid @enderror" name="doc_direccion"
                                value="{{ old('doc_direccion') }}" autocomplete="doc_direccion" autofocus>
                            @error('doc_direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_estudios"
                            class="col-md-12 col-form-label">{{ __('Nivel estudio *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_estudios" type="text"
                                class="form-control @error('doc_estudios') is-invalid @enderror" name="doc_estudios"
                                value="{{ old('doc_estudios') }}" autocomplete="doc_estudios" autofocus
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
                            class="col-md-12 col-form-label">{{ __('Fecha Inicio de Contrato *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_fecha_inicio_contra" type="date"
                                class="form-control @error('doc_fecha_inicio_contra') is-invalid @enderror"
                                name="doc_fecha_inicio_contra" value="{{ old('doc_fecha_inicio_contra') }}"
                                autocomplete="doc_fecha_inicio_contra" autofocus>
                            @error('doc_fecha_inicio_contra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_fecha_fin_contra"
                            class="col-md-12 col-form-label">{{ __('Fecha Fin de Contrato *') }}</label>
                        <div class="col-md-12">
                            <input id="doc_fecha_fin_contra" type="date"
                                class="form-control @error('doc_fecha_fin_contra') is-invalid @enderror"
                                name="doc_fecha_fin_contra" value="{{ old('doc_fecha_fin_contra') }}"
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
                        <label for="doc_categoria" class="col-md-12 col-form-label">{{ __('Categoria *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="doc_categoria"
                                id="doc_categoria">
                                <option value="">---- SELECCIONE ----</option>
                                <option value="Tiempo completo">Tiempo Completo</option>
                                <option value="Catedra">Catedra</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="doc_reconocimiento"
                            class="col-md-12 col-form-label">{{ __('Reconocimientos') }}</label>
                        <div class="col-md-12">
                            <input id="doc_reconocimiento" type="number"
                                class="form-control @error('doc_reconocimiento') is-invalid @enderror"
                                name="doc_reconocimiento" value="{{ old('doc_reconocimiento') }}"
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
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
@endif
