@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1> <!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nuevo municipio</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro municipio</h4>
        <form action="/municipio" method="post">
            @csrf
            <div class="row mb-3">
                <label for="mun_departamento">{{ __('Departamento *') }}</label>
                <div class="col-md-12">
                    <select class="js-example-placeholder-single form-select" name="mun_departamento"
                        id="mun_departamento">
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->dep_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="mun_nombre">{{ __('Municipio *') }}</label>
                <div class="col-md-12">
                    <input id="mun_nombre" type="text" class="form-control @error('mun_nombre') is-invalid @enderror"
                        name="mun_nombre" value="{{ old('mun_nombre') }}" autocomplete="mun_nombre" autofocus>
                    @error('mun_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
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
