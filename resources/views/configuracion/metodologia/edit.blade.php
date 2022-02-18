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
        <form action="/metodologia/{{ $metodologia->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="met_nombre">{{ __('Metodologia *') }}</label>
                <div class="col-md-12">
                    <input id="met_nombre" type="text" class="form-control @error('met_nombre') is-invalid @enderror"
                        name="met_nombre" value="{{ $metodologia->met_nombre }}" required autocomplete="met_nombre"
                        autofocus>
                    @error('met_nombre')
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
