@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-plus-square-o"></i> Formulario de registro</h1><!--TODO: Validad icono-->
@section('message')
    <p>Formulario de registro nueva metodologia</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile card__config">
        <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro metodologia</h4>
            <form action="/metodologia" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="met_nombre">{{ __('Metodologia *') }}</label>
                    <div class="col-md-12">
                        <input id="met_nombre" type="text" class="form-control @error('met_nombre') is-invalid @enderror"
                            name="met_nombre" value="{{ old('met_nombre') }}" required autocomplete="met_nombre"
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
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
