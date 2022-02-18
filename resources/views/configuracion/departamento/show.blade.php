@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-book" ></i> Vista registro</h1> <!-- TODO: validar icono-->
@section('message')
    <p>Información almanecanada en el sistema</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-question-circle"></i> Vista registro</h4>
        <div class="row mb-3">
            <label for="dep_nombre">{{ __('Departamento *') }}</label>
            <div class="col-md-12">
                <input id="dep_nombre" type="text" class="form-control @error('dep_nombre') is-invalid @enderror"
                    name="dep_nombre" value="{{ $departamento->dep_nombre }}" autocomplete="dep_nombre"
                    readonly autofocus>
                @error('dep_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
