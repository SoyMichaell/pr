@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
@section('message')
    <p>Formulario de actualización de la información</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title">Actualizar información</h4>
        <form action="/facultad/{{ $facultad->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="fac_nombre">{{ __('Facultad *') }}</label>
                <div class="col-md-12">
                    <input id="fac_nombre" type="text" class="form-control @error('fac_nombre') is-invalid @enderror"
                        name="fac_nombre" value="{{ $facultad->fac_nombre }}" required autocomplete="fac_nombre"
                        autofocus>
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
                        {{ __('Actualizar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
