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
<h3>Reporte Extensión e Internacionalización</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Evento</th>
            <th>Tipo evento</th>
            <th>Fecha realización</th>
            <th>Publico objeto</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($extensions as $extension)
            <tr>
                <td>{{ $i++;}}</td>
                <td>{{ $extension->ext_nombre }}</td>
                <td>{{ $extension->ext_tipo_evento }}</td>
                <td>{{ $extension->ext_fecha_realizacion }}</td>
                <td>{{ $extension->ext_publico_objeto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
