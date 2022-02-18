<style>
    body{
        font-family: Arial, sans-serif;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    td, th{
        border-top: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
   
    img{
        float: left;
    }
    h4{
        text-align: right;
    }
    h3{
        text-align: center;
        text-transform: uppercase;
    }
</style>

<img src="{{public_path('image/logo.jpg')}}" width="100">

<h4>UNISANGIL <br>Fecha: @php $fecha = date('Y-m-d'); echo $fecha;  @endphp</h4>
<br><br>
<hr>
<h3>Reporte de practica o desempeño laboral</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre estudiante</th>
            <th>Programa</th>
            <th>Empresa</th>
            <th>Nit</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($practicas as $practica)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $practica->estudiantes->estu_nombre.' '.$practica->estudiantes->estu_apellido }}</td>
                <td>{{ $practica->estudiantes->estu_programa }}</td>
                <td>{{ $practica->pra_razon_social }}</td>
                <td>{{ $practica->pra_nit_empresa }}</td>
                <td>{{ $practica->pra_telefono }}</td>
                <td>{{ $practica->pra_direccion }}</td>
                <td>{{ $practica->pra_fecha_inicio }}</td>
                <td>{{ $practica->pra_fecha_fin }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
