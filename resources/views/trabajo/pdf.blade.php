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
<h3>Reporte Trabajo de Grado</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha de ejecucción</th>
            <th>Titulo de proyecto</th>
            <th>Autores</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($trabajos as $trabajo)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $trabajo->tra_fecha_ejecuccion }}</td>
                <td>{{ $trabajo->tra_nombre }}</td>
                <td>{{ $trabajo->tra_id_estudiante }}</td>
                <td>{{ $trabajo->tra_fecha_inicio }}</td>
                <td>{{ $trabajo->tra_fecha_fin }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
