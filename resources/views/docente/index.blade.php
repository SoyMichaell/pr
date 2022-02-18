@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-user"></i> Módulo docentes</h1>
    @section('message')
        <p>Lista de registro docentes</p>
    @endsection
<<<<<<< HEAD
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <a class="btn btn-success" href="{{ url('externo') }}">Director externo</a>
        </div>
        <div class="tile col-md-12 mt-2">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                    <a class="btn btn-outline-danger btn-radius" href="{{ url('docente/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-primary btn-radius" href="{{ url('docente/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-center">
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success " href="{{ url('docente/create') }}"><i
=======
    @section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-start">
                <a class="btn btn-success" href="{{url('externo')}}">Director externo</a>
            </div>
            <div class="tile col-md-12 mt-2">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('docente/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('docente/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-success " href="{{ url('docente/create') }}"><i
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
                                class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive mt-2">
                <table class="table-bordered" id="tables">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Nombre(s)</th>
                            <th>Apellido (s)</th>
                            <th>Correo electronico</th>
                            <th>Nivel estudio</th>
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
<<<<<<< HEAD
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($docentes as $docente)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $docente->tipodocumento->nombre }}</td>
                                <td>{{ $docente->doc_numero_documento }}</td>
                                <td>{{ $docente->doc_nombre }}</td>
                                <td>{{ $docente->doc_apellido }}</td>
                                <td>{{ $docente->doc_correo_personal }}</td>
                                <td>{{ $docente->doc_estudios }}</td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td>
                                        <form action="{{ route('docente.destroy', $docente->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/docente/{{ $docente->id }}"><i
=======
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="tables">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Tipo Documento</th>
                                    <th>Número Documento</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido (s)</th>
                                    <th>Correo electronico</th>
                                    <th>Nivel estudio</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($docentes as $docente)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $docente->tipodocumento->nombre }}</td>
                                        <td>{{ $docente->doc_numero_documento }}</td>
                                        <td>{{ $docente->doc_nombre }}</td>
                                        <td>{{ $docente->doc_apellido }}</td>
                                        <td>{{ $docente->doc_correo_personal }}</td>
                                        <td>{{ $docente->doc_estudios }}</td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('docente.destroy', $docente->id) }}"
                                                    method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm" href="/docente/{{ $docente->id }}"><i
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
                                                        class="fa fa-folder-open-o"></i></a>
                                                <a class="btn btn-outline-info btn-sm   "
                                                    href="/docente/{{ $docente->id }}/edit"><i
                                                        class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                        class="fa fa-trash"></i></button>
<<<<<<< HEAD
                                            </div>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
=======
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
            </div>
        </div>
    </div>
@endsection
@endif
