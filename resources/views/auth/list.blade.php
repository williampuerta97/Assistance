<table id="adm_table" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <td>Correo electrónico</td>
                <td>Actualizar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->email}}</td>
                    <td><button class="btn btn-primary btn-upd-adm" value="{{$admin->id}}">Actualizar</button></td>
                    <td><button class="btn btn-danger btn-del-adm" value="{{$admin->id}}">Eliminar</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>