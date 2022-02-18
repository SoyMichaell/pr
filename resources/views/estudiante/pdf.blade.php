<style>
    body {
        font-family: Arial, Helvetica, sans-serif
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .table th,
    .table td {
        border: 1px solid #EAFAF1;
        padding: 4px;
        font-size: 14px;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        font-size: 14px;
        background-color: #EAFAF1;
        color: #000;
    }

    hr {
        color: #dddddd;
        margin-bottom: 10px;
    }

    img {
        width: 80px;
        float: left;
    }

    .header_right {
        font-size: 12px;
        text-align: right;
    }

    .titulo__header {
        font-size: 20px;
        text-align: center;
    }

    .left__footer {
        text-align: left;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

    .right__footer {
        text-align: right;
        width: 100%;
        bottom: 0px;
        font-size: 12px;
        position: fixed;
    }

</style>

<img src="{{ public_path('image/logo.jpg') }}">
<p class="header_right">Unisangil <br>@php
    $fecha = date('Y-m-d');
    echo $fecha;
@endphp <br>Módulo: Estudiantes</p>
<br>
<hr>
<p class="titulo__header">Reporte de estudiantes</p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo documento</th>
            <th>Número de documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo electronico</th>
            <th>Programa</th>
            <th>Año de ingreso</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $estudiante->abr }}</td>
                <td>{{ $estudiante->estu_numero_documento }}</td>
                <td>{{ $estudiante->estu_nombre }}</td>
                <td>{{ $estudiante->estu_apellido }}</td>
                <td>{{ $estudiante->estu_correo }}</td>
                <td>{{ $estudiante->pro_nombre }}</td>
                <td>{{ $estudiante->estu_ingreso }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<footer>
    <p class="left__footer">Fundación Universitaria de Unisangil</p>
    <p class="right__footer">Copyright 2022. Todos los derechos reservados</p>
</footer>
