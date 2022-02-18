@if (!Auth::check())
    @include('home')
@else
@extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Planes de estudio</h1>
        @section('message') <p>Programas acádemicos </p> @endsection
    @endsection
    @section('content')
    <div class="col-md-4">
        <div class="tile">
            <h4 class="tile title"><i class="fab fa-wpforms"></i> Registro plan de estudio</h4>
            <form action="/programa/{{$plan->id}}/actualizar_plan" method="post">
                @csrf
                @method('PUT')
                <div class="row d-none">
                    <div class="col-md-12">
                        <label for="id">{{ __('ID *') }}</label>
                        <input id="id" type="number" class="form-control @error('id') is-invalid @enderror"
                            name="id" value="{{ $programa->id }}" autocomplete="id" autofocus readonly>
                        @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="pp_nombre">{{ __('Plan de estudio *') }}</label>
                        <input id="pp_nombre" type="text"
                            class="form-control @error('pp_nombre') is-invalid @enderror" name="pp_nombre"
                            value="{{ $plan->pp_nombre }}" autocomplete="pp_nombre" autofocus>
                        @error('pp_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="pp_creditos">{{ __('Número de creditos *') }}</label>
                        <input id="pp_creditos" type="number"
                            class="form-control @error('pp_creditos') is-invalid @enderror" name="pp_creditos"
                            value="{{ $plan->pp_creditos }}" autocomplete="pp_creditos" autofocus>
                        @error('pp_creditos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="pp_asignaturas">{{ __('Número de asignaturas *') }}</label>
                        <input id="pp_asignaturas" type="number"
                            class="form-control @error('pp_asignaturas') is-invalid @enderror"
                            name="pp_asignaturas" value="{{ $plan->pp_asignaturas }}"
                            autocomplete="pp_asignaturas" autofocus>
                        @error('pp_asignaturas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="pp_estado">{{ __('Estado *') }}</label>
                        <select class="js-example-placeholder-single form-select" name="pp_estado"
                            id="pp_estado">
                            <option selected>---- SELECCIONE ----</option>
                            @foreach ($estadoprogramas as $estadoprograma)
                                <option value="{{ $estadoprograma->id }}" {{$estadoprograma->id == $plan->pp_estado ? 'selected' : ''}}>
                                    {{ $estadoprograma->est_nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
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
@endif