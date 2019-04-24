@extends("menu")
@section("content")

        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Listado</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Crear</a></li>
            </ul>
            
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="seccion1">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h3>Listado de personas</h3>
                        </div>
                        <div class="card-body">
                            <div id="tabseccion" class="col-md-12 dataTables_wrapper dt-bootstrap4"></div><!-- aquí se inyecta el datatable -->
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane col-md-12" id="seccion2">
                    <div class="">
                        <div class="card-header">
                                <h3>Módulo de Personas</h3>
                        </div>
                            
                            <form id="form_person" method="post">
                                <input type="hidden" name="tokenPerson" id="tokenPerson" value="{{ csrf_token() }}"/>
                                <div class="row form-group">
                                    <label for="id_number" class="col-form-label col-md-2">Número de documento</label>
                                    <div class="col-md-4">
                                        <input type="number" name="id_number" value="" id="id_number" class="form-control"/>
                                    </div>
                            
                                    <label for="first_name" class="col-form-label col-md-2">Primer nombre</label>
                                    <div class="col-md-4">
                                        <input type="text" name="first_name" value="" id="first_name" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="second_name" class="col-form-label col-md-2">Segundo nombre</label>
                                    <div class="col-md-4">
                                        <input type="text" name="second_name" value="" id="second_name" class="form-control"/>
                                    </div>
                            
                                    <label for="last_name" class="col-form-label col-md-2">Primer apellido</label>
                                    <div class="col-md-4">
                                        <input type="text" name="last_name" value="" id="last_name" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                     <label for="second_surname" class="col-form-label col-md-2">Segundo apellido</label>
                                    <div class="col-md-4">
                                        <input type="text" name="second_surname" value="" id="second_surname" class="form-control"/>
                                    </div>
                                    
                                    <label for="email" class="col-form-label col-md-2">Correo electrónico</label>
                                    <div class="col-md-4">
                                        <input type="text" name="email" value="" id="email" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="last_name" class="col-form-label col-md-2">Género</label>
                                    <div class="col-md-4">
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                    
                                    <label for="phone_a" class="col-form-label col-md-2">Teléfono 1</label>
                                    <div class="col-md-4">
                                        <input type="number" name="phone_a" value="" id="phone_a" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="phone_b" class="col-form-label col-md-2">Teléfono 2</label>
                                    <div class="col-md-4">
                                        <input type="number" name="phone_b" value="" id="phone_b" class="form-control"/>
                                    </div>
                                    
                                    <label for="blood_type" class="col-form-label col-md-2">Grupo sanguíneo</label>
                                    <div class="col-md-4">
                                        <select id="blood_type" name="blood_type" class="form-control">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="rh" class="col-form-label col-md-2">RH</label>
                                    <div class="col-md-4">
                                        <select id="rh" name="rh" class="form-control">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                    
                                    <label for="address" class="col-form-label col-md-2">Dirección</label>
                                    <div class="col-md-4">
                                        <input type="text" name="address" value="" id="address" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label for="date" class="col-form-label col-md-2">Fecha de nacimiento</label>
                                    <div class="col-md-4">
                                        <input type="date" name="date" value="" id="date" class="form-control"/>
                                    </div>
                                    
                                    <label for="pos" class="col-form-label col-md-2">Cargo</label>
                                    <div class="col-md-4">
                                        <select id="pos_select" name="pos" class="form-control">
                                            @foreach($positions as $position)
                                                <option value="{{$position->pos_id}}">{{$position->pos_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group card-footer">
                                    <input type="submit" name="submit" value="Guardar" class="btn btn-primary ml-5 mr-2"/>
                                    <a class="btn btn-danger" href="/personas">Cancelar</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
       </div>
    
    <div class="modal fade update-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
        </div>
      </div>
    </div>


@endsection


