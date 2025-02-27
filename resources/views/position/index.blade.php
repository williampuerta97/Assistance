@extends("menu")
@section("content")
            
            <div class="tab-content">
              <div class="card">
                <div class="card-header">
                  <h3>Módulo de Áreas</h3>
                </div>
                <div class="card-body">
                    <form id="form_position" method="post">
                        <input type="hidden" name="tokenPerson" id="tokenArea" value="{{ csrf_token() }}"/>
                        <label for="id_number" class="col-form-label col-md-2">Nombre de área</label>
                        <div class="row ml-3">
                            <input type="text" name="area" value="" id="area" class="form-control col-md-2"/>
                            <input type="submit" name="submit" value="Guardar" class="btn btn-primary ml-2"/>    
                        </div>
                    </form>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div style="height:100%; overflow-y: scroll" id="areas_tabseccion" class="col-md-11 dataTables_wrapper dt-bootstrap4 mt-3"></div><!-- aquí se inyecta el datatable -->
                </div>
              </div>  
            </div>
    <div class="modal fade update-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          
        </div>
      </div>
    </div>


@endsection

