@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
        @section('message') <p>Diligenciar los campos requeridos, para el debido registro del convenio.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile w-100">
                <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro convenio</h4>
                <form action="/convenio" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="con_nombre"
                                class="col-md-12 col-form-label">{{ __('Nombre de la institución o entidad cooperante *') }}</label>
                            <div class="col-md-12">
                                <input id="con_nombre" type="text"
                                    class="form-control @error('con_nombre') is-invalid @enderror" name="con_nombre"
                                    value="{{ old('con_nombre') }}" autocomplete="con_nombre" autofocus>
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
                                    value="{{ old('con_pais') }}" autocomplete="con_pais" autofocus>
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
                                    rows="10">{{ old('con_objetivo') }}</textarea>
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
                                    name="con_fecha_convenio" value="{{ old('con_fecha_convenio') }}"
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
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endif
