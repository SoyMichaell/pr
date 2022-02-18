@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de edición de datos</h1>
    @section('message')
        <p>Actualizar información de modalidad de trabajo.</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile w-50">
            <h4 class="tile title">Actualizar información</h4>
            <form action="/modalidad/{{$modalidad->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="tra_modalidad"
                            class="col-md-12 col-form-label">{{ __('Modalidad de grado *') }}</label>
                        <div class="col-md-12">
                            <input id="tra_modalidad" type="text"
                                class="form-control @error('tra_modalidad') is-invalid @enderror" name="tra_modalidad"
                                value="{{$modalidad->tra_modalidad}}" autocomplete="tra_modalidad" autofocus>
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
                            {{ __('Actualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
