@if (!Auth::check())
    @include('home')
@else
    @extends('layouts.app')
    @section('title')
        <h1 class="titulo"><i class="fa fa-users"></i> Módulo redes academicas</h1>
        @section('message')<p>Lista de registro redes academicas</p>@endsection
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="tile col-md-12 p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                            <a class="btn btn-outline-danger btn-radius" href="{{ url('red/pdf') }}"
                                title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            <a class="btn btn-outline-primary btn-radius" href="{{ url('red/export') }}"
                                title="Generar reporte excel" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end align-items-center">
                            @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                <a class="btn btn-outline-success " href="{{ url('red/create') }}"><i
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
                                    <th>Nombre red</th>
                                    <th>Fecha afiliación</th>
                                    <th>Programa</th>
                                    @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($reds as $red)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $red->red_nombre }}</td>
                                        <td>{{ $red->red_fecha_afiliacion }}</td>
                                        <td>{{ $red->red_programa }}</td>
                                        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
                                            <td>
                                                <form action="{{ route('red.destroy', $red->id) }}" method="POST">
                                                    <div class="d-flex">
                                                        <a class="btn btn-sm" href="/red/{{ $red->id }}"><i
                                                        class="fa fa-folder-open-o"></i></a>
                                                        <a class="btn btn-outline-info btn-sm   "
                                                            href="/red/{{ $red->id }}/edit"><i
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
