@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-graduation-cap"></i> Módulo egresados</h1>
        @section('message')<p>Lista de registro egresados</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="col-md-12 shadow-sm p-3 bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('egresado/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('egresado/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="display mt-4 p-3" id="tables">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Tipo Documento</th>
                                    <th>Número Documento</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido (s)</th>
                                    <th>Programa</th>
                                    <th>Egresado</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $estudiante->tipodocumento->nombre }}</td>
                                        <td>{{ $estudiante->estu_numero_documento }}</td>
                                        <td>{{ $estudiante->estu_nombre }}</td>
                                        <td>{{ $estudiante->estu_apellido }}</td>
                                        <td>{{ $estudiante->programas->pro_nombre }}</td>
                                        <td>
                                            @if ($estudiante->estu_egresado == 1)
                                                <a href="#" class="badge badge-success"><i class="fa fa-check"></i></a>
                                            @else
                                                <a href="#" class="badge badge-warning"><i class="fa fa-times"></i></a>
                                            @endif
                                        </td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="/estudiante/{{ $estudiante->id }}"><i
                                                        class="fa fa-folder-open-o"></i></a>
                                                    <a class="btn btn-primary btn-sm "
                                                        href="/egresado/{{ $estudiante->id }}/edit"><i
                                                        class="fa fa-graduation-cap"></i></a>
                                                </div>
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
