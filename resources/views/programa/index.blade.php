@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fab fa-uncharted"></i> Módulo programas</h1>
        @section('message') <p>Listado de registro programas académicos</p> @endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-start align-items-start">
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-success" href="{{ url('programa/create') }}"><i class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <div class="tile col-md-12 mt-2">
                        <div class="col-md-12 tile">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="titulo ">Lista de programa creados</h4>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-start">
                                    <a class="btn btn-outline-danger btn-sm" href="{{ url('programa/pdf') }}"
                                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    <a class="btn btn-outline-primary btn-sm" href="{{ url('programa/export') }}"
                                        title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                                </div>
                            </div>
                    </div>
                <div class="table-responsive">
                    <table id="tables">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Programa</th>
                                <th>Titulo</th>
                                <th>Codigo SNIES</th>
                                <th>Nivel de formación</th>
                                <th>Director de programa</th>
                                <th>Plan de estudio</th>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($programas as $programa)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $programa->pro_nombre }}</td>
                                    <td>{{ $programa->pro_titulo }}</td>
                                    <td>{{ $programa->pro_codigosnies }}</td>
                                    <td>{{ $programa->niveles->niv_nombre }}</td>
                                    <td>{{ $programa->directorprograma->doc_nombre . ' ' . $programa->directorprograma->doc_apellido }}
                                    </td>
                                    <td style="width: 10%">
                                        <a class="btn btn-info btn-sm"
                                            href="/programa/{{ $programa->id }}/mostrar_plan"><i
                                                class="fa fa-book"></i></a>
                                    </td>
                                    <td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <form action="{{ route('programa.destroy', $programa->id) }}" method="POST">
                                                <div class="d-flex">
                                                    <a class="btn btn-sm" href="/programa/{{ $programa->id }}"><i
                                                            class="fa fa-folder-open-o"></i></a>
                                                    <a class="btn btn-outline-info btn-sm "
                                                        href="/programa/{{ $programa->id }}/edit"><i
                                                            class="fa fa-refresh"></i></a>
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
    @endsection
@endif
