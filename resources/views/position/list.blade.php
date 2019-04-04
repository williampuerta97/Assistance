                    <table id="areas_table" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <td>Número de ID</td>
                                <td>Primer nombre</td>
                                <td>Actualizar</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($positions as $position)
                                <tr>
                                    <td>{{$position->pos_id}}</td>
                                    <td>{{$position->pos_name}}</td>
                                    <td><button class="btn btn-primary btn-upd-per" value="{{$position->pos_id}}">Actualizar</button></td>
                                    <td><button class="btn btn-danger btn-del-per" value="{{$position->pos_id}}">Eliminar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>