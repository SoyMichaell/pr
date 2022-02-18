@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o" ></i> Formulario de registro</h1>
        @section('message') <p>Diligenciar los campos requeridos, para el debido registro investigación.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro investigación</h4>
                <form action="/investigacion" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inv_titulo_proyecto"
                                class="col-md-12 col-form-label">{{ __('Titulo Proyecto *') }}</label>
                            <div class="col-md-12">
                                <input id="inv_titulo_proyecto" type="text"
                                    class="form-control @error('inv_titulo_proyecto') is-invalid @enderror"
                                    name="inv_titulo_proyecto" value="{{ old('inv_titulo_proyecto') }}"
                                    autocomplete="inv_titulo_proyecto" autofocus>
                                @error('inv_titulo_proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inv_grupo_semillero"
                                class="col-md-12 col-form-label">{{ __('Grupo Semillero *') }}</label>
                            <div class="col-md-12">
                                <input id="inv_grupo_semillero" type="text"
                                    class="form-control @error('inv_grupo_semillero') is-invalid @enderror"
                                    name="inv_grupo_semillero" value="{{ old('inv_grupo_semillero') }}"
                                    autocomplete="inv_grupo_semillero" autofocus>
                                @error('inv_grupo_semillero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inv_director"
                                class="col-md-12 col-form-label">{{ __('Director del grupo de semilleros') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="inv_director"
                                    id="inv_director">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inv_sede" class="col-md-12 col-form-label">{{ __('Sede') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="inv_sede" id="inv_sede">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}">
                                            {{ $sede->mun_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="inv_programa"
                                class="col-md-12 col-form-label">{{ __('Programa Academico') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="inv_programa"
                                    id="inv_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}">
                                            {{ $programa->pro_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inv_estado_proyecto"
                                class="col-md-12 col-form-label">{{ __('Estado del proyecto *') }}</label>
                            <div class="col-md-12">
                                <input id="inv_estado_proyecto" type="text"
                                    class="form-control @error('inv_estado_proyecto') is-invalid @enderror"
                                    name="inv_estado_proyecto" value="{{ old('inv_estado_proyecto') }}"
                                    autocomplete="inv_estado_proyecto" autofocus>
                                @error('inv_estado_proyecto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inv_fecha_inicio"
                                class="col-md-12 col-form-label">{{ __('Fecha de inicio *') }}</label>
                            <div class="col-md-12">
                                <input id="inv_fecha_inicio" type="date"
                                    class="form-control @error('inv_fecha_inicio') is-invalid @enderror"
                                    name="inv_fecha_inicio" value="{{ old('inv_fecha_inicio') }}"
                                    autocomplete="inv_fecha_inicio" autofocus>
                                @error('inv_fecha_inicio')
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
    @endsection
@endif
