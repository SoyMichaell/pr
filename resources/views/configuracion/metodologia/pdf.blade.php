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
<h3>Reporte Metodologias</h3>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Metodologia</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($metodologias as $metodologia)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $metodologia->met_nombre }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
