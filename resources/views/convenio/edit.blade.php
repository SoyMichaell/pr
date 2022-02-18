@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información del convenio.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/convenio/{{ $convenio->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="con_nombre"
                                class="col-md-12 col-form-label">{{ __('Nombre de la institució o entidad cooperante *') }}</label>
                            <div class="col-md-12">
                                <input id="con_nombre" type="text"
                                    class="form-control @error('con_nombre') is-invalid @enderror" name="con_nombre"
                                    value="{{ $convenio->con_nombre }}" autocomplete="con_nombre" autofocus>
                                @error('con_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="con_pais" class="col-md-12 col-form-label">{{ __('País *') }}</label>
                            <div class="col-md-12">
                                <input id="con_pais" type="text"
                                    class="form-control @error('con_pais') is-invalid @enderror" name="con_pais"
                                    value="{{ $convenio->con_pais }}" autocomplete="con_pais" autofocus>
                                @error('con_pais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="con_objetivo"
                                class="col-md-12 col-form-label">{{ __('Objetivo del convenio *') }}</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="con_objetivo" id="con_objetivo" cols="30"
                                    rows="10">{{ $convenio->con_objetivo }}</textarea>
                                @error('con_objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="con_fecha_convenio"
                                class="col-md-12 col-form-label">{{ __('Fecha convenio *') }}</label>
                            <div class="col-md-12">
                                <input id="con_fecha_convenio" type="date"
                                    class="form-control @error('con_fecha_convenio') is-invalid @enderror"
                                    name="con_fecha_convenio" value="{{ $convenio->con_fecha_convenio }}"
                                    autocomplete="con_fecha_convenio" autofocus>
                                @error('con_fecha_convenio')
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
