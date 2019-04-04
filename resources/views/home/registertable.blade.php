<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>N° documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cargo</th>
            <th>Hora de llegada</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $u)
        <tr>
            <td>{{ $u->peo_id_number }}</td>
            <td>{{ $u->peo_first_name }} {{ $u->peo_second_name }}</td>
            <td>{{ $u->peo_last_name }} {{ $u->peo_second_surname }}</td>
            <td>{{ $u->peo_pos_id }}</td>
            <td>{{ $u->peo_gender }}</td>
            <td><button class="btn btn-success">Editar</button></td>
            <td><button class="btn btn-danger">Eliminar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>