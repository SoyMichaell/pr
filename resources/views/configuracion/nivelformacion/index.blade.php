@extends('layouts.app')
@section('title')
    <h1 class="titulo"><i class="fa fa-cog"></i> Configuración / nivel de formación programas</h1 class="titulo">
@section('message')
    <p>Nivel de formación: Listado niveles de formación registradas</p>
@endsection
@endsection
@section('content')
<div class="container-fluid">
    <div class="tile col-md-12 p-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lista de registros</h2> <!-- TODO: arreglar botones pdf y excel-->
                    <a class="btn btn-outline-danger btn-radius" href="{{ url('nivelformacion/pdf') }}"
                        title="Generar reporte pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="btn btn-outline-primary btn-radius" href="{{ url('nivelformacion/export') }}" title="Generar reporte excel" target="_blank"><i
                    class="fa fa-file-excel-o"></i></a>
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-start">
                    <a class="btn btn-outline-success" href="{{ url('nivelformacion/create') }}"><i
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
                            <th>Nivel Formación</th>
                            <th style="width: 20%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($nivelformacions as $nivelformacion)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $nivelformacion->niv_nombre }}</td>
                                <td>
                                    <form action="{{ url("nivelformacion/{$nivelformacion->id}") }}" method="POST">
                                        <div class="d-flex">
                                            <a class="btn btn-sm"
                                                href="/nivelformacion/{{ $nivelformacion->id }}"><i
                                                class="fa fa-folder-open-o"></i></a>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="nivelformacion/{{ $nivelformacion->id }}/edit"><i
                                                class="fa fa-refresh"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
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
