@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-book" ></i> Vista registro</h1>
@section('message')
    <p>Información almanecanada en el sistema</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-question-circle"></i> Vista registro</h4>
        <div class="row mb-3">
            <label for="mun_departamento">{{ __('Departamento *') }}</label>
            <div class="col-md-12">
                <select class="js-example-placeholder-single form-select" name="mun_departamento" id="mun_departamento"
                    disabled>
                    <option value="">---- SELECCIONE ----</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}"
                            {{ $departamento->id == $municipio->mun_departamento ? 'selected' : '' }}>
                            {{ $departamento->dep_nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="mun_nombre">{{ __('Municipio *') }}</label>
            <div class="col-md-12">
                <input id="mun_nombre" type="text" class="form-control @error('mun_nombre') is-invalid @enderror"
                    name="mun_nombre" value="{{ $municipio->mun_nombre }}" disabled required autocomplete="mun_nombre"
                    autofocus>
                @error('mun_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
