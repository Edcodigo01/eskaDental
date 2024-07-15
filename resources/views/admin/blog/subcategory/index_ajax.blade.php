
<div style="width:100%">
    <table  id="table_subcategory" class="table table-striped datatable" data-route_edit="{{url('admin/blog/subcategorias/{id}/editar')}}" data-route_remove="{{url('admin/blog/subcategorias/{id}/borrar')}}" data-elements="{{json_encode($subcategories)}}" data-route_restore="{{url('admin/blog/subcategorias/{id}/editar?restore=true')}}" style="width:100%">
        <thead>
               <tr>
                   <th style="">Nombre</th>

               </tr>
           </thead>
    </table>
</div>


{{-- @if ($subcategories->first())
    <table class="table table-striped table-bordered" style="border-color:red !important">
        <thead class="text-primary">
            <tr>

                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $key => $sub)
                <tr>

                    <td>
                        <p class="m-0 float-left">{{$sub->name}}</p>

                        @if ($sub->removed == 'true')

                            <button type="button" name="button" class="btn btn-sm btn-success float-right showModalAjax mb-1 ml-2" data-url="{{url('admin/blog/subcategorias/'.$sub->id.'/editar?restore=true')}}"> <i class="fas fa-check"></i> </button>
                        @else
                            <button type="button" name="button" class="btn btn-sm btn-secondary float-right showModalAjax mb-1 ml-2" data-url="{{url('admin/blog/subcategorias/'.$sub->id.'/editar')}}"> <i class="fas fa-pencil-alt"></i> </button>
                            <button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1" data-url="{{url('admin/blog/subcategorias/'.$sub->id.'/borrar')}}"> <i class="fas fa-trash"></i> </button>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row mt-3" style="width:100%">
        <div class="col-12 col-sm-6 text-center mb-1">
            <h6 class="m-0 text-primary mt-2">{{ trans("short.Página") }} "{{$subcategories->currentPage()}}" {{ trans("short.de") }} "{{$subcategories->lastPage()}}"</h6>
        </div>
        <div class="col-12 col-sm-6 d-flex justify-content-center align-item-center mb-1">
            {{ $subcategories->appends(request()->query())->links() }}
        </div>
    </div>
@else
    <div class="alert alert-warning  mt-3" style="width: 100%;max-width:800px;margin:auto">
        <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> {{ trans("short.No resultados") }}</h5>
    </div>
@endif --}}
