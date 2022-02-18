@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-search"></i> Módulo investigación</h1>
        @section('message')<p>Lista de registro investigación</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="col-md-12 shadow-sm p-3 bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('investigacion/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('investigacion/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-outline-success " href="{{ url('investigacion/create') }}"><i
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
                                    <th>Titulo proyecto</th>
                                    <th>Grupo semillero</th>
                                    <th>Programa</th>
                                    <th>Fecha inicio</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($investigacions as $investigacion)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $investigacion->inv_titulo_proyecto }}</td>
                                        <td>{{ $investigacion->inv_grupo_semillero }}</td>
                                        <td>{{ $investigacion->programas->pro_nombre }}</td>
                                        <td>{{ $investigacion->inv_fecha_inicio }} </td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('investigacion.destroy', $investigacion->id) }}"
                                                    method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm"
                                                            href="/investigacion/{{ $investigacion->id }}"><i
                                                            class="fa fa-folder-open-o"></i></a>
                                                        <a class="btn btn-outline-info btn-sm   "
                                                            href="/investigacion/{{ $investigacion->id }}/edit"><i
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
