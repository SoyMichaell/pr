@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1> <!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nuevo nivel de formación programa</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro nivel de formación</h4>
        <form action="/nivelformacion" method="post">
            @csrf
            <div class="row mb-3">
                <label for="niv_nombre">{{ __('Nivel Formación *') }}</label>
                <div class="col-md-12">
                    <input id="niv_nombre" type="text" class="form-control @error('niv_nombre') is-invalid @enderror"
                        name="niv_nombre" value="{{ old('niv_nombre') }}" autocomplete="niv_nombre" autofocus>
                    @error('niv_nombre')
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
