
    <table id="salida" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>N° documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Hora de llegada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $l)
            <tr>
                <td>{{ $l->peo_id_number }}</td>
                <td>{{ $l->peo_first_name }} {{ $l->peo_second_name }}</td>
                <td>{{ $l->peo_last_name }} {{ $l->peo_second_surname }}</td>
                <td>{{ $l->pos_name }}</td>
                <td>{{ $l->time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>