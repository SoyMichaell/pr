@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-book" ></i> Vista registro</h1>
        @section('message') <p>Información almanecanada en el sistema</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title"><i class="fa fa-question-circle"></i> Vista registro</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_fecha_ejecuccion"
                            class="col-md-12 col-form-label">{{ __('Año de ejecucción *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_fecha_ejecuccion" type="text"
                                class="form-control @error('tra_fecha_ejecuccion') is-invalid @enderror"
                                name="tra_fecha_ejecuccion" value="{{ $trabajo->tra_fecha_ejecuccion }}"
                                autocomplete="pra_razon_social" autofocus disabled>
                            @error('tra_fecha_ejecuccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tra_nombre" class="col-md-12 col-form-label">{{ __('Titulo del proyecto *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_nombre" type="text"
                                class="form-control @error('tra_nombre') is-invalid @enderror" name="tra_nombre"
                                value="{{ $trabajo->tra_nombre }}" autocomplete="pra_razon_social" autofocus disabled>
                            @error('tra_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_id_estudiante" class="col-md-12 col-form-label">{{ __('Autores *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-basic-multiple form-select" name="tra_id_estudiante[]"
                                id="tra_id_estudiante" multiple="multiple" disabled>
                                <option selected>{{ $trabajo->tra_id_estudiante }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tra_director" class="col-md-12 col-form-label">{{ __('Director *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_director" type="text"
                                class="form-control @error('tra_director') is-invalid @enderror" name="tra_director"
                                value="{{ $trabajo->tra_director }}" autocomplete="pra_razon_social" autofocus disabled>
                            @error('tra_director')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_jurado" class="col-md-12 col-form-label">{{ __('Jurados *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-basic-multiple form-select" name="tra_jurado[]" id="tra_jurado"
                                multiple="multiple" disabled>
                                <option selected>{{ $trabajo->tra_jurado }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tra_fecha_inicio"
                            class="col-md-12 col-form-label">{{ __('Fecha inicio proyecto *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_fecha_inicio" type="date"
                                class="form-control @error('tra_fecha_inicio') is-invalid @enderror" name="tra_fecha_inicio"
                                value="{{ $trabajo->tra_fecha_inicio }}" autocomplete="tra_fecha_inicio" autofocus
                                disabled>
                            @error('tra_fecha_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tra_fecha_fin"
                            class="col-md-12 col-form-label">{{ __('Fecha fin proyecto *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_fecha_fin" type="date"
                                class="form-control @error('tra_fecha_fin') is-invalid @enderror" name="tra_fecha_fin"
                                value="{{ $trabajo->tra_fecha_fin }}" autocomplete="tra_fecha_fin" autofocus disabled>
                            @error('tra_fecha_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tra_documento"
                            class="col-md-12 col-form-label">{{ __('Descargar documento en formato .PDF *') }}</label>
                        <div class="col-md-12">
                            <a target="_blank" href="{{ asset('pdf/' . $trabajo->tra_documento) }}">PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
@endif
