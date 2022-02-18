@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1>
    @section('message')
        <p>Diligenciar los campos requeridos, para el debido registro modalidad de grado.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-50">
            <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro modalidad de grado</h4>
            <form action="/modalidad" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tra_modalidad"
                            class="col-md-12 col-form-label">{{ __('Modalidad de grado *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_modalidad" type="text"
                                class="form-control @error('tra_modalidad') is-invalid @enderror" name="tra_modalidad"
                                value="{{ old('tra_modalidad') }}" autocomplete="tra_modalidad" autofocus>
                            @error('tra_modalidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3 mx-auto">
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
