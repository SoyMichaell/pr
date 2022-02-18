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
<h3>Reporte Programas</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Programa</th>
            <th>Titulo</th>
            <th>Codigo SNIES</th>
            <th>Resolución</th>
            <th>Director de Programa</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($programas as $programa)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $programa->pro_nombre }}</td>
                <td>{{ $programa->pro_titulo }}</td>
                <td>{{ $programa->pro_codigosnies }}</td>
                <td>{{ $programa->pro_resolucion }}</td>
                <td>{{ $programa->directorprograma->doc_nombre.' '.$programa->directorprograma->doc_apellido }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
