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
<h3>Reporte Laboratorios</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre laboratorio</th>
            <th>Lugar</th>
            <th>Docente a cargo</th>
            <th>Fecha laboratorio</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($laboratorios as $laboratorio)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $laboratorio->lab_nombre }}</td>
                <td>{{ $laboratorio->lab_lugar }}</td>
                <td>{{ $laboratorio->docentes->doc_nombre.' '.$laboratorio->docentes->doc_apellido }}</td>
                <td>{{ $laboratorio->lab_fecha_laboratorio }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
