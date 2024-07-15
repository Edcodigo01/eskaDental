<div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">Crear Categoría</h4>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="formula validateN" action="{{url('admin/blog/categorias/guardar')}}" method="post">
    <div class="modal-body">
        <div class="row">
            <div class="col-12 form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" value="" class="form-control required" maxlength="60">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-gold">Guardar</button>
    </div>
</form>
