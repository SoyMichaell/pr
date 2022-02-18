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
            <label for="fac_nombre">{{ __('Facultad *') }}</label>
            <div class="col-md-12">
                <input id="fac_nombre" type="text" class="form-control @error('fac_nombre') is-invalid @enderror"
                    name="fac_nombre" value="{{ $facultad->fac_nombre }}" disabled required autocomplete="fac_nombre"
                    autofocus>
                @error('fac_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
