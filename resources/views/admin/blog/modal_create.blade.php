<div class="modal-header">
  <h4 class="modal-title" id="exampleModalLabel">Crear Artículo</h4>

  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form class="formula validateN" action="{{url('admin/blog/articulos/guardar')}}" method="post">
    {{-- hiden --}}
<input type="hidden" name="article_id" value="{{$article->id}}" >
<div class="modal-body">
    <div class="row">
        <div class="col-xl-4 col-lg-6 form-group">
            <label for="">Título:</label>
            <input type="text" name="title" value="" class="form-control required" maxlength="120">
        </div>
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Autor:</label>
            <input type="text" name="autor" value="" class="form-control required" maxlength="60">
        </div>
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Estatus:</label>
            <select class="form-control required text-success" name="status">
                <option class="text-success" selected value="Published">Publicado</option>
                <option class="text-danger" value="Not-published">No publicado</option>
            </select>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Categoría:</label>
            <select class="form-control on_change_next_input_id" name="category_id" data-subcategories="{{json_encode($subcategories)}}" data-next_input=".subcategories_create">
                <option value="">Opciones</option>
                @foreach ($categories as $key => $cate)
                    <option @if ($article->category_id == $cate->id)selected @endif data-id="{{$cate->id}}" value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>

        </div>


        <div class="col-xl-3 col-lg-4 form-group hide">
            <label for="">Subcategoría:</label>
            <select class="form-control subcategories_create" name="subcategory_id">
                <option value="">Opciones</option>
                    @foreach ($subcategories->where('category_id',$article->category_id) as $key => $value)
                        <option data-id="{{$value->id}}" value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                    <option value="otra" @if(request()->subcategoria == 'otra') selected @endif >Otra</option>
                </select>
        </div>
        <div class="col-12">
            <label for="">Descripción:</label>
            <textarea class="form-control required description" name="description" rows="4" cols="40" style="width:100%"> </textarea>
        </div>
    </div>
    <br>
    @include('admin.blog.includes.card_images')
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-gold">Guardar</button>
</div>
</form>
