@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1> <!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nueva facultad</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro facultad</h4>
        <form action="/facultad" method="post">
            @csrf
            <div class="row mb-3">
                <label for="fac_nombre">{{ __('Facultad *') }}</label>
                <div class="col-md-12">
                    <input id="fac_nombre" type="text" class="form-control @error('fac_nombre') is-invalid @enderror"
                        name="fac_nombre" value="{{ old('fac_nombre') }}" autocomplete="fac_nombre">
                    @error('fac_nombre')
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
