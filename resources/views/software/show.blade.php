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
                        <label for="sof_nombre" class="col-md-12 col-form-label">{{ __('Nombre del software *') }}</label>
                        <div class="col-md-12">
                            <input id="sof_nombre" type="text"
                                class="form-control @error('sof_nombre') is-invalid @enderror" name="sof_nombre"
                                value="{{ $software->sof_nombre }}" autocomplete="sof_nombre" autofocus disabled>
                            @error('sof_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sof_desarrollador"
                            class="col-md-12 col-form-label">{{ __('Nombre desarrollador o empresa *') }}</label>
                        <div class="col-md-12">
                            <input id="sof_desarrollador" type="text"
                                class="form-control @error('sof_desarrollador') is-invalid @enderror"
                                name="sof_desarrollador" value="{{ $software->sof_desarrollador }}"
                                autocomplete="sof_desarrollador" autofocus disabled>
                            @error('sof_desarrollador')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_numero_licencia"
                            class="col-md-12 col-form-label">{{ __('Número de licencia *') }}</label>
                        <div class="col-md-12">
                            <input id="sof_numero_licencia" type="text"
                                class="form-control @error('sof_numero_licencia') is-invalid @enderror"
                                name="sof_numero_licencia" value="{{ $software->sof_numero_licencia }}"
                                autocomplete="sof_numero_licencia" autofocus disabled>
                            @error('sof_numero_licencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sof_adquisicion_licencia"
                            class="col-md-12 col-form-label">{{ __('Fecha adquisición de licencia *') }}</label>
                        <div class="col-md-12">
                            <input id="sof_adquisicion_licencia" type="date"
                                class="form-control @error('sof_adquisicion_licencia') is-invalid @enderror"
                                name="sof_adquisicion_licencia" value="{{ $software->sof_adquisicion_licencia }}"
                                autocomplete="sof_adquisicion_licencia" autofocus disabled>
                            @error('sof_adquisicion_licencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sof_vencimiento_licencia"
                            class="col-md-12 col-form-label">{{ __('Fecha vencimiento de licencia *') }}</label>
                        <div class="col-md-12">
                            <input id="sof_vencimiento_licencia" type="date"
                                class="form-control @error('sof_vencimiento_licencia') is-invalid @enderror"
                                name="sof_vencimiento_licencia" value="{{ $software->sof_vencimiento_licencia }}"
                                autocomplete="sof_vencimiento_licencia" autofocus disabled>
                            @error('sof_vencimiento_licencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="sof_id_docente" class="col-md-12 col-form-label">{{ __('Docente *') }}</label>
                        <div class="col-md-12">
                            <select class="js-example-placeholder-single form-select" name="sof_id_docente"
                                id="sof_id_docente" disabled>
                                <option value="">---- SELECCIONE ----</option>
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}"
                                        {{ $docente->id == $software->sof_id_docente ? 'selected' : '' }}>
                                        {{ $docente->doc_nombre . ' ' . $docente->doc_apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
