@extends("menu")
@section("content")
<div role="tabpanel" id="contentTabPanel">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation"><a class="nav-link" href="#seccion1" aria-controls="seccion1" data-toggle="tab" id="btnEnter" role="tab">Entrada</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="#seccion2" aria-controls="seccion2" data-toggle="tab" id="btnExit" role="tab">Salida</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="#seccion3" aria-controls="seccion3" data-toggle="tab" id="btnListAll" role="tab">Listado</a></li>
    </ul>
    
    <div class="tab-content">
        <input type="hidden" name="tokenMovement" id="tokenMovement" value="{{ csrf_token() }}"/>
        <div role="tabpanel" class="tab-pane active contentTableMovementDiv" id="seccion1">
            <h3 class="titleMovement">Entrada</h3>
            <input type="text" class="lector" name="doc" id="inputenter" />
        </div>
        <div role="tabpanel" class="tab-pane" id="seccion2">
            <h3 class="titleMovement">Salida</h3>
            <input type="text" class="lector" name="doc" id="inputexit"/>
        </div>
        <div role="tabpanel" class="tab-pane" id="seccion3">
            <h3 class="titleMovement">Listado</h3>
            
        </div>
    </div>
    <div id="list" class="contentTableMovement">
        
    </div>
</div>
@endsection