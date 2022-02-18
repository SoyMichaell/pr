@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información de la movilidad.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/movilidad/{{ $movilidad->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mov_fecha_movilidad"
                                class="col-md-12 col-form-label">{{ __('Fecha movilidad *') }}</label>
                            <div class="col-md-12">
                                <input id="mov_fecha_movilidad" type="date"
                                    class="form-control @error('mov_fecha_movilidad') is-invalid @enderror"
                                    name="mov_fecha_movilidad" value="{{ $movilidad->mov_fecha_movilidad }}"
                                    autocomplete="mov_fecha_movilidad" autofocus>
                                @error('mov_fecha_movilidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="mov_id_docente" class="col-md-12 col-form-label">{{ __('Docente') }}</label>
                            <div class="col-md-12">
                                <select class="form-select" name="mov_id_docente" id="mov_id_docente">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}"
                                            {{ $docente->id == $movilidad->mov_id_docente ? 'selected' : '' }}>
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mov_id_estudiante" class="col-md-12 col-form-label">{{ __('Estudiante') }}</label>
                            <div class="col-md-12">
                                <select class="form-select" name="mov_id_estudiante" id="mov_id_estudiante">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}"
                                            {{ $estudiante->id == $movilidad->mov_id_estudiante ? 'selected' : '' }}>
                                            {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="mov_tipo"
                                class="col-md-12 col-form-label">{{ __('Tipo de movilidad *') }}</label>
                            <div class="col-md-12">
                                <input id="mov_tipo" type="text"
                                    class="form-control @error('mov_tipo') is-invalid @enderror" name="mov_tipo"
                                    value="{{ $movilidad->mov_tipo }}" autocomplete="mov_tipo" autofocus>
                                @error('mov_tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mov_evento"
                                class="col-md-12 col-form-label">{{ __('Evento o actividad *') }}</label>
                            <div class="col-md-12">
                                <input id="mov_evento" type="text"
                                    class="form-control @error('mov_evento') is-invalid @enderror" name="mov_evento"
                                    value="{{ $movilidad->mov_evento }}" autocomplete="mov_evento" autofocus>
                                @error('mov_evento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="mov_ciudad_pais"
                                class="col-md-12 col-form-label">{{ __('Ciudad o País *') }}</label>
                            <div class="col-md-12">
                                <input id="mov_ciudad_pais" type="text"
                                    class="form-control @error('mov_ciudad_pais') is-invalid @enderror"
                                    name="mov_ciudad_pais" value="{{ $movilidad->mov_ciudad_pais }}"
                                    autocomplete="mov_ciudad_pais" autofocus>
                                @error('mov_ciudad_pais')
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
