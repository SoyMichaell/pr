@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
<<<<<<< HEAD
        <h1 class="titulo"><i class="fa fa-user"></i> Módulo director externo</h1>
    @section('message')
        <p>Lista de registro director externo</p>
    @endsection
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                    <a class="btn btn-outline-danger btn-radius" href="{{ url('externo/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-primary btn-radius" href="{{ url('externo/export') }}"
                        title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-center">
                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                        <a class="btn btn-outline-success " href="{{ url('externo/create') }}"><i
                                class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    @endif
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
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($externos as $externo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $externo->tipodocumento->nombre }}</td>
                                <td>{{ $externo->dic_numero_documento }}</td>
                                <td>{{ $externo->dic_nombre }}</td>
                                <td>{{ $externo->dic_apellido }}</td>
                                <td>{{ $externo->dic_correo_electronico }}</td>
                                @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                    <td>
                                        <form action="{{ route('externo.destroy', $externo->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="/externo/{{ $externo->id }}"><i
                                                        class="fa fa-folder-open-o"></i></a>
                                                <a class="btn btn-outline-info btn-sm   "
                                                    href="/externo/{{ $externo->id }}/edit"><i
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
@endsection
=======
        <h1 class="titulo"><i class="fa fa-user" ></i> Módulo director externo</h1>
        @section('message')<p>Lista de registro director externo</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile col-md-12 mt-2">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('externo/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('externo/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-success " href="{{ url('externo/create') }}"><i
                                class="fa fa-plus-circle"></i>
                                    Nuevo</a>
                            @endif
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
                                    <th>Departamento</th>
                                    <th>Ciudad</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($externos as $externo)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $externo->tipodocumento->nombre }}</td>
                                        <td>{{ $externo->dic_numero_documento }}</td>
                                        <td>{{ $externo->dic_nombre }}</td>
                                        <td>{{ $externo->dic_apellido }}</td>
                                        <td>{{ $externo->dic_correo_electronico }}</td>
                                        <td>{{ $externo->dic_departamento }}</td>
                                        <td>{{ $externo->dic_ciudad }}</td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('externo.destroy', $externo->id) }}"
                                                    method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm" href="/externo/{{ $externo->id }}"><i
                                                        class="fa fa-folder-open-o"></i></a>
                                                        <a class="btn btn-outline-info btn-sm   "
                                                            href="/externo/{{ $externo->id }}/edit"><i
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
    @endsection
>>>>>>> 5303d804215456781a1b8079392f4c726554985a
@endif
