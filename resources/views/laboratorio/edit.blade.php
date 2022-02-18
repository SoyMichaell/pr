@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información del laboratorio.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/laboratorio/{{ $laboratorio->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lab_nombre"
                                class="col-md-12 col-form-label">{{ __('Nombre laboratorio *') }}</label>
                            <div class="col-md-12">
                                <input id="lab_nombre" type="text"
                                    class="form-control @error('lab_nombre') is-invalid @enderror" name="lab_nombre"
                                    value="{{ $laboratorio->lab_nombre }}" autocomplete="lab_nombre" autofocus>
                                @error('lab_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lab_lugar" class="col-md-12 col-form-label">{{ __('Lugar *') }}</label>
                            <div class="col-md-12">
                                <input id="lab_lugar" type="text"
                                    class="form-control @error('lab_lugar') is-invalid @enderror" name="lab_lugar"
                                    value="{{ $laboratorio->lab_lugar }}" autocomplete="lab_lugar" autofocus>
                                @error('lab_lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lab_id_docente" class="col-md-12 col-form-label">{{ __('Docente *') }}</label>
                            <div class="col-md-12">
                                <select class="form-select" name="lab_id_docente" id="lab_id_docente">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}"
                                            {{ $docente->id == $laboratorio->lab_id_docente ? 'selected' : '' }}>
                                            {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lab_caracteristicas"
                                class="col-md-12 col-form-label">{{ __('Caracteristicas *') }}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="lab_caracteristicas" id="lab_caracteristicas"
                                    cols="30" rows="10">{{ $laboratorio->lab_caracteristicas }}</textarea>
                                @error('lab_caracteristicas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lab_fecha_laboratorio"
                                class="col-md-12 col-form-label">{{ __('Fecha laboratorio *') }}</label>
                            <div class="col-md-12">
                                <input id="lab_fecha_laboratorio" type="date"
                                    class="form-control @error('lab_fecha_laboratorio') is-invalid @enderror"
                                    name="lab_fecha_laboratorio" value="{{ $laboratorio->lab_fecha_laboratorio }}"
                                    autocomplete="lab_fecha_laboratorio" autofocus>
                                @error('lab_fecha_laboratorio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lab_id_programa" class="col-md-12 col-form-label">{{ __('Programa *') }}</label>
                            <div class="col-md-12">
                                <select class="form-select" name="lab_id_programa" id="lab_id_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}"
                                            {{ $programa->id == $laboratorio->lab_id_programa ? 'selected' : '' }}>
                                            {{ $programa->pro_nombre }}</option>
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
@endif
