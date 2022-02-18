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
            <label for="est_nombre">{{ __('Estado *') }}</label>
            <div class="col-md-12">
                <input id="est_nombre" type="text" class="form-control @error('est_nombre') is-invalid @enderror"
                    name="est_nombre" value="{{ $estadoprograma->est_nombre }}" autocomplete="est_nombre" readonly
                    autofocus>
                @error('est_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@endsection
