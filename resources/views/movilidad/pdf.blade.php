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
<h3>Reporte Movilidades</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha movilidad</th>
            <th>Nombre docente o estudiante</th>
            <th>Tipo de movilidad</th>
            <th>Evento</th>
            <th>Ciudad o País</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($movilidads as $movilidad)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $movilidad->mov_fecha_movilidad }}</td>
                <td>{{ $movilidad->mov_id_docente == "" ? $movilidad->estudiantes->estu_nombre.' '.$movilidad->estudiantes->estu_apellido : $movilidad->docentes->doc_nombre.' '.$movilidad->docentes->doc_apellido  }}</td>
                <td>{{ $movilidad->mov_tipo }}</td>
                <td>{{ $movilidad->mov_evento }} </td>
                <td>{{ $movilidad->mov_ciudad_pais }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
