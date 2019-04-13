                    <div class="modal-header">
                        <h5>Actualizar persona</h5>
                    </div>
                    <div class="modal-body">
                        <form id="u_form_person" method="PUT">
                        <input type="hidden" name="tokenPerson" id="u_tokenPerson" value="{{ csrf_token() }}"/>
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="u_id" value="{{$person->peo_id}}">
                        <div class="row form-group">
                            <label for="id_number" class="col-form-label col-md-2">Número de documento</label>
                            <div class="col-md-4">
                                <input type="number" name="id_number" value="{{$person->peo_id_number}}" id="u_id_number" class="form-control"/>
                            </div>
                    
                            <label for="first_name" class="col-form-label col-md-2">Primer nombre</label>
                            <div class="col-md-4">
                                <input type="text" name="first_name" value="{{$person->peo_first_name}}" id="u_first_name" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="second_name" class="col-form-label col-md-2">Segundo nombre</label>
                            <div class="col-md-4">
                                <input type="text" name="second_name" value="{{$person->peo_second_name}}" id="u_second_name" class="form-control"/>
                            </div>
                    
                            <label for="last_name" class="col-form-label col-md-2">Primer apellido</label>
                            <div class="col-md-4">
                                <input type="text" name="last_name" value="{{$person->peo_last_name}}" id="u_last_name" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                             <label for="second_surname" class="col-form-label col-md-2">Segundo apellido</label>
                            <div class="col-md-4">
                                <input type="text" name="second_surname" value="{{$person->peo_second_surname}}" id="u_second_surname" class="form-control"/>
                            </div>
                            
                            <label for="email" class="col-form-label col-md-2">Correo electrónico</label>
                            <div class="col-md-4">
                                <input type="text" name="email" value="{{$person->peo_email}}" id="u_email" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="last_name" class="col-form-label col-md-2">Género</label>
                            <div class="col-md-4">
                                <select id="u_gender" name="gender" class="form-control">
                                    <option {{$person->peo_gender == 'M' ?'selected':''}} value="M">Masculino</option>
                                    <option {{$person->peo_gender == 'F' ?'selected':''}} value="F">Femenino</option>
                                </select>
                            </div>
                            
                            <label for="phone_a" class="col-form-label col-md-2">Teléfono 1</label>
                            <div class="col-md-4">
                                <input type="number" name="phone_a" value="{{$person->peo_phone_a}}" id="u_phone_a" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="phone_b" class="col-form-label col-md-2">Teléfono 2</label>
                            <div class="col-md-4">
                                <input type="number" name="phone_b" value="{{$person->peo_phone_b}}" id="u_phone_b" class="form-control"/>
                            </div>
                            
                            <label for="blood_type" class="col-form-label col-md-2">Grupo sanguíneo</label>
                            <div class="col-md-4">
                                <select id="u_blood_type" name="blood_type" class="form-control">
                                    <option {{$person->peo_blood_type == 'A' ?'selected':''}} value="A">A</option>
                                    <option {{$person->peo_blood_type == 'B' ?'selected':''}} value="B">B</option>
                                    <option {{$person->peo_blood_type == 'AB' ?'selected':''}} value="AB">AB</option>
                                    <option {{$person->peo_blood_type == 'O' ?'selected':''}} value="O">O</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="rh" class="col-form-label col-md-2">RH</label>
                            <div class="col-md-4">
                                <select id="u_rh" name="rh" class="form-control">
                                    <option {{$person->peo_rh == '+' ?'selected':''}} value="+">+</option>
                                    <option {{$person->peo_rh == '-' ?'selected':''}} value="-">-</option>
                                </select>
                            </div>
                            
                            <label for="address" class="col-form-label col-md-2">Dirección</label>
                            <div class="col-md-4">
                                <input type="text" name="address" value="{{$person->peo_address}}" id="u_address" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="date" class="col-form-label col-md-2">Fecha de nacimiento</label>
                            <div class="col-md-4">
                                <input type="date" name="date" value="{{$person->peo_date_of_birth}}" id="u_date" class="form-control"/>
                            </div>
                            
                            <label for="pos" class="col-form-label col-md-2">Cargo</label>
                            <div class="col-md-4">
                                <select id="u_pos" name="pos" class="form-control">
                                    @foreach($positions as $position)
                                        <option {{$person->peo_pos_id == $position->pos_id ?'selected':''}} value="{{$position->pos_id}}">{{$position->pos_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="status" value="{{$person->peo_status}}"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" name="submit" value="Actualizar" id="upd-person-btn" class="btn btn-primary text-white"/>
                            <button class="btn btn-danger" id="btn-cancelar">Cancelar</button>
                        </form>
                    </div>
                    
                    
                        
                        
                    