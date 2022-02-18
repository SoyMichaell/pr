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
<h3>Reporte Pruebas Saber Pro</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre Completo</th>
            <th>Codigo Prueba</th>
            <th>Programa</th>
            <th>Fecha Presentación</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($pruebas as $prueba)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $prueba->estudiantes->estu_nombre. ' '.$prueba->estudiantes->estu_apellido }}</td>
                <td>{{ $prueba->pr_codigo_prueba }}</td>
                <td>{{ $prueba->programas->pro_nombre }}</td>
                <td>{{ $prueba->pr_fecha_presentacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
