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
<h3>Reporte Estudiantes</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Tipo Documento</th>
            <th>Número Documento</th>
            <th>Nombre(s)</th>
            <th>Apellido (s)</th>
            <th>Correo electronico</th>
            <th>Nivel estudio</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($docentes as $docente)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $docente->tipodocumento->nombre }}</td>
                <td>{{ $docente->doc_numero_documento }}</td>
                <td>{{ $docente->doc_nombre }}</td>
                <td>{{ $docente->doc_apellido }}</td>
                <td>{{ $docente->doc_correo_personal }}</td>
                <td>{{ $docente->doc_estudios }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
