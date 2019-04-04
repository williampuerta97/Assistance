
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
        @foreach($user as $u)
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