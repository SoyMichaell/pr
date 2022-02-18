@if (Auth::user()->per_tipo_usuario == 1)
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plus-square-o" ></i> Formulario de registro</h1> <!--TODO: Validad icono-->
    @section('message')
        <p>Formulario de registro nuevo departamento</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile card__config">
            <h4 class="tile title"><i class="fa fa-wpforms"></i> Registro departamento</h4>
            <form action="/departamento" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="dep_nombre">{{ __('Departamento *') }}</label>
                    <div class="col-md-12">
                        <input id="dep_nombre" type="text" class="form-control @error('dep_nombre') is-invalid @enderror"
                            name="dep_nombre" value="{{ old('dep_nombre') }}" autocomplete="dep_nombre" autofocus>
                        @error('dep_nombre')
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
@else
@php
    return view('home');
@endphp
@endif
