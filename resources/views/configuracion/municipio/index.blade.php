@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / municipio</h1>
    <p>Municipios: Listado municipios o sedes registrados</p>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="tile col-md-12 p-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                        <a class="btn btn-outline-danger btn-radius" href="{{ url('municipio/pdf') }}"
                            title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        <a class="btn btn-outline-primary btn-radius" href="{{ url('municipio/export') }}" title="Generar reporte excel" target="_blank"><i
                        class="fa fa-file-excel-o"></i></a>
                    </div>
                    <div class="col-md-5 d-flex justify-content-end align-items-start">
                        <a class="btn btn-outline-success" href="{{ url('municipio/create') }}"><i
                        class="fa fa-plus-circle"></i>
                            Nuevo</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Municipio / sede</th>
                                <th style="width: 20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $municipio->mun_nombre }}</td>
                                    <td>
                                        <form action="{{ route('municipio.destroy', $municipio->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-sm" href="municipio/{{ $municipio->id }}"
                                                    title="Visualizar"><i class="fa fa-folder-open-o"></i></a>
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="/municipio/{{ $municipio->id }}/edit" title="Editar"><i
                                                    class="fa fa-refresh"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-eye"><i
                                                class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
