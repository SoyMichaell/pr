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
            <label for="niv_nombre">{{ __('Nivel Formación *') }}</label>
            <div class="col-md-12">
                <input id="niv_nombre" type="text" class="form-control @error('niv_nombre') is-invalid @enderror"
                    name="niv_nombre" value="{{ $nivelformacion->niv_nombre }}" autocomplete="niv_nombre" readonly
                    autofocus>
                @error('niv_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
