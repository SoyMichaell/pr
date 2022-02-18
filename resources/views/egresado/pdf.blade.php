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
<h3>Reporte estudiantes egresados</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Tipo Documento</th>
            <th>Número de Documento</th>
            <th>Nombre (s)</th>
            <th>Apellido (s)</th>
            <th>Correo electronico</th>
            <th>Programa</th>
            <th>Fecha de grado</th>
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
                <td>{{ $estudiante->estu_grado }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
