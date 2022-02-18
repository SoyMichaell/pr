@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-plane"></i> Módulo movilidad</h1>
        @section('message')<p>Lista de registro movilidad</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile col-md-12 p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('movilidad/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('movilidad/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-outline-success " href="{{ url('movilidad/create') }}"><i
                                class="fa fa-plus-circle"></i>
                                    Nuevo</a>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="display mt-4 p-3" id="tables">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Fecha movilidad</th>
                                    <th>Nombre docente o estudiante</th>
                                    <th>Tipo de movilidad</th>
                                    <th>Evento</th>
                                    <th>Ciudad o País</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($movilidads as $movilidad)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $movilidad->mov_fecha_movilidad }}</td>
                                        <td>{{ $movilidad->mov_id_docente == ''? $movilidad->estudiantes->estu_nombre . ' ' . $movilidad->estudiantes->estu_apellido: $movilidad->docentes->doc_nombre . ' ' . $movilidad->docentes->doc_apellido }}
                                        </td>
                                        <td>{{ $movilidad->mov_tipo }}</td>
                                        <td>{{ $movilidad->mov_evento }} </td>
                                        <td>{{ $movilidad->mov_ciudad_pais }}</td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('movilidad.destroy', $movilidad->id) }}"
                                                    method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm"
                                                            href="/movilidad/{{ $movilidad->id }}"><i
                                                            class="fa fa-folder-open-o"></i></a>
                                                        <a class="btn btn-outline-info btn-sm   "
                                                            href="/movilidad/{{ $movilidad->id }}/edit"><i
                                                            class="fa fa-refresh"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                        class="fa fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
