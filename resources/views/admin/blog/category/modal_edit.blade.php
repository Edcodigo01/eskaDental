<div class="modal-header">
    @if (request()->restore == 'true')
        <h4 class="modal-title" id="exampleModalLabel">Habilitar Categoría</h4>
        @else
        <h4 class="modal-title" id="exampleModalLabel">Editar Categoría</h4>
    @endif
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="formula validateN" action="{{url('admin/blog/categorias/'.$category->id.'/actualizar')}}" method="post">
    <div class="modal-body">
        <div class="row">
            <div class="col-12 form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control required" maxlength="60">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
        @if (request()->restore == 'true')
            <input type="hidden" name="restore" value="true" >
                <button type="submit" class="btn btn-gold">Habilitar Categoría</button>
            @else
                <button type="submit" class="btn btn-gold">Guardar</button>
        @endif
    </div>
</form>
