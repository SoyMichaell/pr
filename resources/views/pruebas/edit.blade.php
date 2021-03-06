@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información de prueba saber pro.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/prueba/{{ $prueba->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pr_id_estudiante" class="col-md-12 col-form-label">{{ __('Estudiante *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="pr_id_estudiante"
                                    id="pr_id_estudiante">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}"
                                            {{ $estudiante->id == $prueba->pr_id_estudiante ? 'selected' : '' }}>
                                            {{ $estudiante->estu_nombre . ' ' . $estudiante->estu_apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pr_codigo_prueba"
                                class="col-md-12 col-form-label">{{ __('Codigo Prueba *') }}</label>
                            <div class="col-md-12">
                                <input id="pr_codigo_prueba" type="text"
                                    class="form-control @error('pr_codigo_prueba') is-invalid @enderror"
                                    name="pr_codigo_prueba" value="{{ $prueba->pr_codigo_prueba }}"
                                    autocomplete="pr_codigo_prueba" autofocus>
                                @error('pr_codigo_prueba')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pr_id_programa"
                                class="col-md-12 col-form-label">{{ __('Programa Academico *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="pr_id_programa"
                                    id="pr_id_programa">
                                    <option value="">---- SELECCIONE ----</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}"
                                            {{ $programa->id == $prueba->pr_id_programa ? 'selected' : '' }}>
                                            {{ $programa->pro_nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pr_fecha_presentacion"
                                class="col-md-12 col-form-label">{{ __('Año presentación prueba *') }}</label>
                            <div class="col-md-12">
                                <input id="pr_fecha_presentacion" type="number"
                                    class="form-control @error('pr_fecha_presentacion') is-invalid @enderror"
                                    name="pr_fecha_presentacion" value="{{ $prueba->pr_fecha_presentacion }}"
                                    autocomplete="pr_fecha_presentacion" autofocus>
                                @error('pr_fecha_presentacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pr_grupo_referencial"
                                class="col-md-12 col-form-label">{{ __('Grupo Referencial *') }}</label>
                            <div class="col-md-12">
                                <input id="pr_grupo_referencial" type="text"
                                    class="form-control @error('pr_grupo_referencial') is-invalid @enderror"
                                    name="pr_grupo_referencial" value="{{ $prueba->pr_grupo_referencial }}"
                                    autocomplete="pr_grupo_referencial" autofocus>
                                @error('pr_grupo_referencial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pr_grupo_referencia"
                                class="col-md-12 col-form-label">{{ __('Grupo Referencial NBC *') }}</label>
                            <div class="col-md-12">
                                <input id="pr_grupo_referencia" type="text"
                                    class="form-control @error('pr_grupo_referencia') is-invalid @enderror"
                                    name="pr_grupo_referencia" value="{{ $prueba->pr_grupo_referencia }}"
                                    autocomplete="pr_grupo_referencia" autofocus>
                                @error('pr_grupo_referencia')
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
