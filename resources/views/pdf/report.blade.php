<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css" type="text/css" />
    <title>Document</title>
    <!-- temporales, borrar para producción si se soluciona el error de las modales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" />
    <!-- -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />
</head>
<body>
        
    <h6>Fecha de inicio: <strong>{{ $params['fecha_inicio']}}</strong></h6>
    <h6>Fecha de fin: <strong>{{ $params['fecha_fin']}}</strong></h6>
    <h6>Concepto: <strong>{{ $params['type']}}</strong></h6>
    <table id="report" class="table table-striped table-bordered mt-2" style="width:100%">
        <thead>
            <tr>
                <th>N° documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Tipo</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->peo_id_number }}</td>
                <td>{{ $u->peo_first_name }} {{ $u->peo_second_name }}</td>
                <td>{{ $u->peo_last_name }} {{ $u->peo_second_surname }}</td>
                <td>{{ $u->pos_name }}</td>
                <td>{{ $u->mov_type }}</td>
                <td>{{ $u->mov_datetime }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>