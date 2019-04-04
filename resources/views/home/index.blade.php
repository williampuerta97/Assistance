@extends("menu")
@section("content")
<div class="cards">
    <input type='hidden' name='tokenHome' id='tokenHome' value='{{ csrf_token() }}'/>
    <div id="registroContent">
        <div>
          <h4><a href="#">Registros</a></h4>  
        </div>
        <div id="registroIcon">
            <i class="fas fa-newspaper"></i>
        </div>
    </div>
    <div id="estadisticaContent">
        <div>
            <h4><a href="#">Estadísticas</a></h4>
        </div>
        <div id="estadisticaIcon">
            <i class="fas fa-chart-pie"></i>
        </div>
    </div>
    
    <div id="reporteContent">
        <div>
            <h4><a href="#">Reporte</a></h4>
        </div>
        <div id="reporteIcon">
            <i class="fas fa-file-invoice"></i>
        </div>
    </div>
    <div class="subtitle">
        <h4></h4>
    </div>
    <div class="tableContent" id="myChart">
        
    </div>
</div>
@endsection