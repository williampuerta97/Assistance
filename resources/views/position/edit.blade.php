<div class="modal-header"><h4>Actualizar Área</h4></div>
<div class="modal-body">
    <form id="form_position_pos" method="post">
        <input type="hidden" name="tokenPerson" id="tokenArea" value="{{ csrf_token() }}"/>
        <input type="hidden" name="id_pos" id="id_pos" value="{{$position->pos_id}}">
        <label for="id_number" class="">Nombre de área</label>
        <input type="text" name="area" id="area" value="{{$position->pos_name}}" class="form-control"/>
</div>
<div class="modal-footer">
    <input type="submit" name="submit" value="Actualizar" class="btn btn-primary"/>
    </form>
</div>

