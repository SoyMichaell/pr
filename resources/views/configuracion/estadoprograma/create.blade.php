@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1> <!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nuevo estado programa</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-wpforms"></i> Nuevo estado</h4>
        <form action="/estadoprograma" method="post">
            @csrf
            <div class="row mb-3">
                <label for="est_nombre">{{ __('Estado *') }}</label>
                <div class="col-md-12">
                    <input id="est_nombre" type="text" class="form-control @error('est_nombre') is-invalid @enderror"
                        name="est_nombre" value="{{ old('est_nombre') }}" autocomplete="est_nombre" autofocus>
                    @error('est_nombre')
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
