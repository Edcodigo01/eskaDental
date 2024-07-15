<div class="modal-header bg-secondary">

    @if (request()->restore == 'true')
            <h4 class="modal-title" id="exampleModalLabel">Habilitar Artículo</h4>
        @else
            <h4 class="modal-title" id="exampleModalLabel">Editar Artículo</h4>
    @endif


  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form class="formula validateN" action="{{url('admin/blog/articulos/actualizar')}}" method="post">
    {{-- hiden --}}
<input type="hidden" name="article_id" value="{{$article->id}}" >
<div class="modal-body">
    <div class="row">
        <div class="col-xl-4 col-lg-6 form-group">
            <label for="">Título:</label>
            <input type="text" name="title" value="{{$article->title}}" class="form-control required" maxlength="120">
        </div>
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Autor:</label>
            <input type="text" name="autor" value="{{$article->autor}}" class="form-control required" maxlength="60">
        </div>
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Estatus:</label>
            <select class="form-control required  @if ($article->status == 'Published') text-success @elseif($article->status == 'Not-published') text-danger @else @endif" name="status">
                <option @if ($article->status == 'Published') selected @endif class="text-success"   value="Published">Publicado</option>
                <option @if ($article->status == 'Not-published') selected @endif class="text-danger"  value="Not-published">No publicado</option>
            </select>
        </div>
        <div class="col-xl-3 col-lg-4 form-group">
            <label for="">Categoría:</label>

            <select class="form-control on_change_next_input_id" name="category_id" data-subcategories="{{json_encode($subcategories)}}" data-next_input=".subcategories">
                <option value="">Opciones</option>
                @foreach ($categories as $key => $cate)
                    <option @if ($article->category_id == $cate->id)selected @endif data-id="{{$cate->id}}" value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>

        </div>
        <input type="hidden" name="" value="{{$subCount =  $article->category->subcategory->count()}}" >

        <div class="col-xl-3 col-lg-4 form-group @if($subCount == 0) hide @endif ">
            <label for="">Subcategoría:</label>
            <select class="form-control subcategories" name="subcategory_id">
                <option value="">Opciones</option>
                    @foreach ($subcategories->where('category_id',$article->category_id) as $key => $value)
                        <option @if ($article->subcategory_id == $value->id)selected @endif data-id="{{$value->id}}" value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                    <option value="otra" @if(request()->subcategoria == 'otra') selected @endif >Otra</option>
                </select>
        </div>

        <div class="col-12">
            <label for="">Descripción:</label>
            <textarea class="form-control required description" name="description" rows="4" cols="40" style="width:100%"> {!!$article->description!!} </textarea>
        </div>
    </div>
    <br>
    @include('admin.blog.includes.card_images')

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
      @if (request()->restore == 'true')
              <input type="hidden" name="restore" value="true">
              <button type="submit" class="btn btn-success">Habilitar Artículo</button>
          @else
              <button type="submit" class="btn btn-gold">Guardar</button>
      @endif

</div>
</form>
