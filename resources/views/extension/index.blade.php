@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fas fa-users"></i> Módulo extensión e internacionalización</h1>
        @section('message')<p>Lista de registro extensión e internacionalización</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile col-md-12 p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2>
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('extension/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('extension/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fas fa-file-excel"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-outline-success " href="{{ url('extension/create') }}"><i
                                        class="fas fa-plus-circle"></i>
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
                                    <th>Evento</th>
                                    <th>Tipo evento</th>
                                    <th>Fecha realización</th>
                                    <th>Publico objeto</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($extensions as $extension)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $extension->ext_nombre }}</td>
                                        <td>{{ $extension->ext_tipo_evento }}</td>
                                        <td>{{ $extension->ext_fecha_realizacion }}</td>
                                        <td>{{ $extension->ext_publico_objeto }}</td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('extension.destroy', $extension->id) }}"
                                                    method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm"
                                                            href="/extension/{{ $extension->id }}"><i
                                                                class="fas fa-folder"></i></a>
                                                        <a class="btn btn-outline-info btn-sm   "
                                                            href="/extension/{{ $extension->id }}/edit"><i
                                                                class="fas fa-sync-alt"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                                class="fas fa-trash-alt"></i></button>
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
