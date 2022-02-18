@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-vector-square"></i> Planes de estudio</h1>
        @section('message') <p>Programas acádemicos </p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex">
                        <a class="btn btn-success" href="/programa/{{$programa->id}}/crear_plan">Nuevo</a>
                    </div>
                    <div class="table-responsive tile mt-2">
                        <h4 class="tile titulo">Plan de estudios programa {{ $programa->pro_nombre }} </h4>
                        <table id="tables">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Plan de estudio</th>
                                    <th>Número de creditos</th>
                                    <th>Número de asignaturas</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{$plan->id}}</td>
                                        <td>{{ $plan->pp_nombre }}</td>
                                        <td>{{ $plan->pp_creditos }}</td>
                                        <td>{{ $plan->pp_asignaturas }}</td>
                                        <td>{{ $plan->est_nombre }}</td>
                                        <td>
                                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)   
                                            <form action="/programa/{{ $plan->id }}/eliminar_plan" method="POST">
                                                    <div class="d-flex text-center">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="/programa/{{$programa->id}}/{{$plan->id}}/editar_plan"><i
                                                                class="fa fa-refresh text-center"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endsection
@endif



