@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-headset"></i> Vista registro</h1>
        @section('message') <p>Información almanecanada en el sistema</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title"><i class="far fa-question-circle"></i> Vista registro</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ext_nombre" class="col-md-12 col-form-label">{{ __('Nombre del evento *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_nombre" type="text"
                                class="form-control @error('ext_nombre') is-invalid @enderror" name="ext_nombre"
                                value="{{ $extension->ext_nombre }}" autocomplete="ext_nombre" autofocus disabled>
                            @error('ext_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="ext_tipo_evento" class="col-md-12 col-form-label">{{ __('Tipo de evento *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_tipo_evento" type="text"
                                class="form-control @error('ext_tipo_evento') is-invalid @enderror" name="ext_tipo_evento"
                                value="{{ $extension->ext_tipo_evento }}" autocomplete="ext_tipo_evento" autofocus
                                disabled>
                            @error('ext_tipo_evento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ext_fecha_realizacion"
                            class="col-md-12 col-form-label">{{ __('Fecha de realización *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_fecha_realizacion" type="date"
                                class="form-control @error('ext_fecha_realizacion') is-invalid @enderror"
                                name="ext_fecha_realizacion" value="{{ $extension->ext_fecha_realizacion }}"
                                autocomplete="ext_fecha_realizacion" autofocus disabled>
                            @error('ext_fecha_realizacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="ext_publico_objeto"
                            class="col-md-12 col-form-label">{{ __('Público objeto *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_publico_objeto" type="text"
                                class="form-control @error('ext_publico_objeto') is-invalid @enderror"
                                name="ext_publico_objeto" value="{{ $extension->ext_publico_objeto }}"
                                autocomplete="ext_publico_objeto" autofocus disabled>
                            @error('ext_publico_objeto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ext_ponentes" class="col-md-12 col-form-label">{{ __('Ponentes *') }}</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="ext_ponentes" id="ext_ponentes" cols="30" rows="10"
                                placeholder="Separar por un ;" disabled>{{ $extension->ext_ponentes }}</textarea>
                            @error('ext_ponentes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="ext_pais" class="col-md-12 col-form-label">{{ __('Paises ponentes *') }}</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="ext_pais" id="ext_pais" cols="30" rows="10"
                                placeholder="Separar por un ;" disabled>{{ $extension->ext_pais }}</textarea>
                            @error('ext_pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="ext_participantes"
                            class="col-md-12 col-form-label">{{ __('Número de participantes *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_participantes" type="number"
                                class="form-control @error('ext_participantes') is-invalid @enderror"
                                name="ext_participantes" value="{{ $extension->ext_participantes }}"
                                autocomplete="ext_participantes" autofocus disabled>
                            @error('ext_participantes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="ext_img" class="col-md-12 col-form-label">{{ __('Reporte fotografico *') }}</label>
                        <div class="col-md-12">
                            <input id="ext_img" type="file" class="form-control @error('ext_img') is-invalid @enderror"
                                name="ext_img" value="{{ $extension->ext_img }}" autocomplete="ext_img" autofocus
                                disabled>
                            @error('ext_img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
