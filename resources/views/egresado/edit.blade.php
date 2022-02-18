@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-pencil-square-o"></i> Formulario de edición de datos</h1>
        @section('message') <p>Actualizar información del estudiante.</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile card__config">
                <h4 class="tile title">Actualizar información</h4>
                <form action="/egresado/{{ $estudiante->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="estu_egresado"
                                class="col-md-12 col-form-label">{{ __('¿El estudiante es egresado? *') }}</label>
                            <div class="col-md-12">
                                <select class="js-example-placeholder-single form-select" name="estu_egresado"
                                    id="estu_egresado">
                                    <option value="">---- SELECCIONE ----</option>
                                    @if ($estudiante->estu_egresado == 1)
                                        <option value="1" selected>Si</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="estu_grado" class="col-md-12 col-form-label">{{ __('Fecha de grado *') }}</label>
                            <div class="col-md-12">
                                <input id="estu_grado" type="date"
                                    class="form-control @error('estu_grado') is-invalid @enderror" name="estu_grado"
                                    value="{{ $estudiante->estu_grado == '' ? old('estu_grado') : $estudiante->estu_grado }}"
                                    autocomplete="estu_grado" autofocus>
                                @error('estu_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0 mx-auto">
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
