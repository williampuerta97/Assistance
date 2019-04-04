<div id="contentInputs">
<div class="col-md-4">
    <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d") ?>" class="form-control" onchange="reportFilter();"/>
</div>
<div class="col-md-4">
    <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d") ?>" class="form-control" onchange="reportFilter();"/>
</div>
<div class="col-md-4">
    <select name="type" id="type" class="form-control" onchange="reportFilter();">
        <option value="Entrada">Entrada</option>
        <option value="Salida">Salida</option>
        <option value="Todo">Todo</option>
    </select>    
</div>
</div>