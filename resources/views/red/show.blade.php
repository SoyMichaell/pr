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
                        <label for="red_nombre" class="col-md-12 col-form-label">{{ __('Nombre de la red *') }}</label>
                        <div class="col-md-12">
                            <input id="red_nombre" type="text"
                                class="form-control @error('red_nombre') is-invalid @enderror" name="red_nombre"
                                value="{{ $red->red_nombre }}" autocomplete="red_nombre" autofocus disabled>
                            @error('red_nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sof_desarrollador"
                            class="col-md-12 col-form-label">{{ __('Objetivo o Accion que se realiza dentro de la red *') }}</label>
                        <div class="col-md-12">
                            <textarea class="form-control @error('red_nombre') is-invalid @enderror" name="red_accion"
                                id="red_accion" cols="30" rows="10" disabled>{{ $red->red_accion }}</textarea>
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
                        <label for="red_fecha_afiliacion"
                            class="col-md-12 col-form-label">{{ __('Fecha de afiliación *') }}</label>
                        <div class="col-md-12">
                            <input id="red_fecha_afiliacion" type="date"
                                class="form-control @error('red_fecha_afiliacion') is-invalid @enderror"
                                name="red_fecha_afiliacion" value="{{ $red->red_fecha_afiliacion }}"
                                autocomplete="red_fecha_afiliacion" autofocus disabled>
                            @error('red_fecha_afiliacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="red_programa" class="col-md-12 col-form-label">{{ __('Programa afiliado *') }}</label>
                        <div class="col-md-12">
                            <input id="red_programa" type="text"
                                class="form-control @error('red_programa') is-invalid @enderror" name="red_programa"
                                value="{{ $red->red_programa }}" autocomplete="red_programa" autofocus disabled>
                            @error('red_programa')
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
