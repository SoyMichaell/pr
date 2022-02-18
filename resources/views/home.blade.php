@extends('layouts.app')

@section('title')
    <h1 class="titulo"><i class="fa fa-tachometer"></i> Bienvenido (a),
        {{ auth()->user()->per_nombre . ' ' . auth()->user()->per_apellido }} </h1>
@endsection

@section('content')

    <div class="container-fluid ">
        @if (Auth::user()->per_tipo_usuario == 1)
            @if ($estadoprogramas->count() <= 0 || $facultades->count() <= 0 || $nivelformacions->count() <= 0 || $metodologias->count() <= 0 || $directs->count() <= 0)
                <div class="alert alert-warning" role="alert">
                    <h3 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Información requerida en los
                        siguiente módulos:</h3>
                    @if ($directs->count() <= 0)
                        Es necesario que registre directores de programa <a href="/usuario"> Ir</a><br>
                    @endif
                    @if ($estadoprogramas->count() <= 0)
                        Es necesario que registre información en el módulo estado de los programas <a
                            href="/estadoprograma"> Ir</a><br>
                    @endif
                    @if ($facultades->count() <= 0)
                        Es necesario que registre información en el módulo facultades <a href="/facultad"> Ir</a><br>
                    @endif
                    @if ($nivelformacions->count() <= 0)
                        Es necesario que registre información en el módulo nivel de formación programas <a
                            href="/nivelformacion"> Ir</a><br>
                    @endif
                    @if ($metodologias->count() <= 0)
                        Es necesario que registre información en el módulo metologias <a href="/metodologia"> Ir</a>
                    @endif
                </div>
            @endif
        @endif
        @if (Auth::user()->per_tipo_usuario == 1 || Auth::user()->per_tipo_usuario == 2)
            <div class="row mb-3">
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                            <h4>Estudiantes</h4>
                            <p><b>{{ $estudiantes->count() }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                        <div class="info">
                            <h4>Docentes</h4>
                            <p><b>{{ $docentes->count() }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
                        <div class="info">
                            <h4>Egresados</h4>
                            <p><b>{{ $egresados->count() }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->per_tipo_usuario == 1)
            <div class="row">
                <div class="col-md-12 d-flex justify-content-start align-items-center">
                    <a class="btn btn-success" href="{{ url('usuario') }}"><i class="fa fa-plus-circle"></i>
                        Nuevo</a>
                </div>
            </div>
            <div class="tile col-md-12 mt-2">
                <h4 class="tile titulo">Usuarios en plataforma</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tables">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Tipo documento</th>
                                <th>Número documento</th>
                                <th>Nombre (s)</th>
                                <th>Apellido (s)</th>
                                <th>Correo electronico</th>
                                <th>Telefono</th>
                                <th>Tipo de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->tipodocumento->nombre }}</td>
                                    <td>{{ $user->per_numero_documento }}</td>
                                    <td>{{ $user->per_nombre }} </td>
                                    <td>{{ $user->per_apellido }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->per_telefono }}</td>
                                    <td>{{ $user->tipousuario->rol_nombre }}</td>
                                    <td>
                                        <form action="{{ route('usuario.destroy', $user->id) }}" method="POST">
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm" href="/usuario/{{ $user->id }}/edit"><i
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

        @endif
    </div>
@endsection
