<div class="modal-header">
    @if (request()->restore == 'true')
        <h4 class="modal-title" id="exampleModalLabel">Habilitar Subcategoría</h4>
        @else
        <h4 class="modal-title" id="exampleModalLabel">Editar Subcategoría</h4>
    @endif
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="formula validateN" action="{{url('admin/blog/subcategorias/'.$subcategory->id.'/actualizar')}}" method="post">
    <div class="modal-body">
        <div class="row">
            <div class="col-12 form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" value="{{$subcategory->name}}" class="form-control required" maxlength="60">
            </div>
            <div class="col-12 form-group">
                <label for="">Categoría:</label>
                {{$subcategory->category_id}}
                <select class="form-control required" name="category_id">
                    <option value="">Opciones</option>
                    @foreach ($categories as $key => $category)
                        <option @if ($subcategory->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
        @if (request()->restore == 'true')
            <input type="hidden" name="restore" value="true" >
                <button type="submit" class="btn btn-success">Habilitar Subcategoría</button>
            @else
                <button type="submit" class="btn btn-gold">Guardar</button>
        @endif


    </div>
</form>
