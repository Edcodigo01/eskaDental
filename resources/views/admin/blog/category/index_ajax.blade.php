

    <div style="width:100%">
        <table  id="table_category" class="table table-striped datatable" data-route_edit="{{url('admin/blog/categorias/{id}/editar')}}"  data-route_remove="{{url('admin/blog/categorias/{id}/borrar')}}" data-route_edit_sub="{{url('admin/blog/subcategorias/{id}/editar')}}" data-route_remove_sub="{{url('admin/blog/subcategorias/{id}/borrar')}}" data-elements="{{json_encode($categories)}}" data-urlexpand="{{url('admin/blog/subcategorias?categoria={id}')}}" data-urlnew="{{url('admin/blog/subcategorias/crear/{id}')}}" style="width:100%" data-add_new-sub="{{url('admin/blog/subcategorias/{id}/create')}}" data-route_restore="{{url('admin/blog/categorias/{id}/editar?restore=true')}}">
            <thead>
                   <tr>
                       <th style="">Nombre</th>
                       <th>Subcategorías</th>
                   </tr>
               </thead>
        </table>
    </div>
{{-- @if ($categories->first())
    <table class="table table-bordered hide" style="border-color:red !important">
        <thead class="text-primary">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Subcategorías</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $key => $category)
                <tr>

                    <td>

                        @if ($category->removed == 'true')
                            <button type="button" name="button" class="btn btn-sm btn-secondary float-right showModalAjax" data-url="{{url('admin/blog/categorias/'.$category->id.'/editar?restore=true')}}"> <i class="fas fa-pencil-alt"></i> </button>

                            @else
                                <button type="button" name="button" class="btn btn-sm btn-secondary float-right showModalAjax" data-url="{{url('admin/blog/categorias/'.$category->id.'/editar')}}"> <i class="fas fa-pencil-alt"></i> </button>
                                <button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1 mr-2" data-url="{{url('admin/blog/categorias/'.$category->id.'/borrar')}}"> <i class="fas fa-trash"></i> </button>
                        @endif
                        <p class="">{{$category->name}}</p>
                    </td>
                    <td>
                        @if ($category->subcategory->first())
                            @foreach ($category->subcategory->where('removed','false') as $key => $subcategory)
                                <div class="p-1 mb-1" style="border:solid 1px var(--grey-x-l);border-radius:2px;overflow:hidden">
                                    <p class="my-1" style="display:inline-block"> <i class="fas fa-genderless"></i>
                                        {{$subcategory->name}}
                                     </p>
                                     <button type="button" name="button" class="btn btn-sm btn-secondary float-right ml-2 showModalAjax" data-url="{{url('admin/blog/subcategorias/'.$subcategory->id.'/editar')}}">
                                         <i class="fas fa-pencil-alt"></i>
                                     </button>
                                    <button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1" data-url="{{url('admin/blog/subcategorias/'.$subcategory->id.'/borrar')}}"> <i class="fas fa-trash"></i> </button>
                                </div>

                            @endforeach
                            <button type="button" name="button" class="btn btn-sm btn-white float-right showModalAjax ml-2" data-url="{{url('admin/blog/subcategorias/crear/'.$category->id)}}"> <i class="fas fa-plus"></i>
                                Nueva
                            </button>

                            <button type="button" name="button" class="btn btn-sm btn-white float-right"> <i class="fas fa-expand"></i>  </button>
                        @else
                            <button type="button" name="button" class="btn btn-sm btn-white float-right showModalAjax" data-url="{{url('admin/blog/subcategorias/crear/'.$category->id)}}"> <i class="fas fa-plus"></i> Nueva </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@else
    <div class="alert alert-warning mt-3 hide" style="width: 100%;max-width:800px;margin:auto">
        <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> {{ trans("short.No resultados") }}</h5>
    </div>
@endif --}}
