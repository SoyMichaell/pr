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
<h3>Reporte Software en uso</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre software</th>
            <th>Desarrollador</th>
            <th>Número de licencia</th>
            <th>Año adquisición</th>
            <th>Año vencimiento licencia</th>
            <th>Docente</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($softwares as $software)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $software->sof_nombre }}</td>
                <td>{{ $software->sof_desarrollador }}</td>
                <td>{{ $software->sof_numero_licencia }}</td>
                <td>{{ $software->sof_adquisicion_licencia }}</td>
                <td>{{ $software->sof_vencimiento_licencia }}</td>
                <td>{{ $software->docentes->doc_nombre.' '.$software->docentes->doc_apellido }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
