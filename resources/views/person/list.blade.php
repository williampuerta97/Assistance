                    <table id="per_table" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <td>Número de ID</td>
                                <td>Primer nombre</td>
                                <!--<td>Segundo nombre</td>-->
                                <td>Primer apellido</td>
                                <td>Segundo apellido</td>
                                <td>Cargo</td>
                                <td>Actualizar</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $person)
                                <tr>
                                    <td>{{$person->peo_id_number}}</td>
                                    <td>{{$person->peo_first_name}}</td>
                                    <!--<td>{{$person->peo_second_name}}</td>-->
                                    <td>{{$person->peo_last_name}}</td>
                                    <td>{{$person->peo_second_surname}}</td>
                                    <td>{{$person->pos_name}}</td>
                                    <td><button class="btn btn-primary btn-upd-per" value="{{$person->peo_id}}">Actualizar</button></td>
                                    <td><button class="btn btn-danger btn-del-per" value="{{$person->peo_id}}">Eliminar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>