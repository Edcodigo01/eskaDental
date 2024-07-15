<!-- Modal -->
<div class="modal fade" id="modal_filters" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-white">
        <h4 class="modal-title text-primary" id="exampleModalLabel">Filtros</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body filters">

          <div class="input-group float-right mb-2 ">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3"> Título </span>
              </div>
            <input value="{{request()->titulo}}" name="titulo" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">

          </div>


      <div class="input-group float-right mb-2 ">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"> Categoría </span>
        </div>
        <select class="form-control on_change_next_input" name="categoria" data-subcategories="{{json_encode($subcategoriesAll)}}" data-next_input=".subcategories_modal">
            <option value="">Opciones</option>
            @foreach ($categories as $key => $category)
                <option data-id="{{$category->id}}" @if($category->slug == request()->categoria) selected @endif value="{{$category->slug}}">{{$category->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="input-group mb-2 @if(!request()->subcategoria and !request()->categoria) hideJava @endif ">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"> Subcategoría </span>
        </div>
        <select class="form-control subcategories_modal" name="subcategoria" id="subcategoria">
            <option value="">Opciones</option>
            @foreach ($subcategories as $key => $subcategory)
                <option @if(request()->subcategoria == $subcategory->slug) selected @endif value="{{$subcategory->slug}}">{{$subcategory->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="input-group input-group   mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3"> Estatus </span>
        </div>
        <select class="form-control" name="estatus">
            <option value="">Todos</option>
            <option @if(request()->estatus == 'eliminados') selected @endif value="eliminados">Eliminados</option>
        </select>
      </div>
          <button class="btn btn-secondary search float-right " type="button">Buscar</button>

          <a href="{{request()->url()}}" class="btn btn-white float-right mr-2  mb-2 btn_empty_filters hide"><i class="fas fa-sync-alt"></i> Todos </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
