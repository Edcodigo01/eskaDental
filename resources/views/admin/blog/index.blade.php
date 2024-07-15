@extends('admin.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public/libraries/dropzone/dropzone.min.css') !!}">
    <link rel="stylesheet" href="{{asset('public/libraries/dropzone/basic.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sections/images_dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sections/blog_admin.css')}}">

@endsection
@section('title')
    Administrador / Blog / Artículos
@endsection
@section('content')

    <div class="container2">





        <br>
        <div class="row">
            <div class="col-12">
                <h3 class="float-left" style="display:inline-block">Administrador / Blog / Artículos</h3>
                <button type="button" name="button" class="btn btn-primary float-right showModalAjax" data-url="{{url('admin/blog/articulos/crear')}}"> <i class="fas fa-plus"></i> Nuevo</button>
            </div>
        </div>
        @if (request()->titulo)
            <h5 class=""> <span class="text-secondary">Título:</span> {{request()->titulo}} </h5>
        @endif
        @if (request()->estatus)
            <h5 class=""> <span class="text-secondary">Estatus:</span> <span class=" @if(request()->estatus == 'eliminados') text-danger @endif ">{{request()->estatus}}</span> </h5>
            @endif
            @if (request()->categoria)
                <input type="hidden" name="" value="{{$categoryName = \App\Models\Category::where('slug',request()->categoria)->first()}}" >
                @if ($categoryName)
                    <h5 class=""> <span class="text-secondary">Categoría:</span> {{$categoryName->name}}</h5>
                @endif
            @endif
            @if (request()->subcategoria )
                @if (request()->subcategoria == 'otra')
                    <h5 class=""> <span class="text-secondary">Subcategoría:</span> Otra</h5>
                @else
                    <input type="hidden" name="" value="{{$Subcategory_name = \App\Models\Subcategory::where('slug',request()->subcategoria)->first()}}" >
                    @if ($Subcategory_name)
                        <h5 class=""> <span class="text-secondary">Subcategoría:</span> {{$Subcategory_name->name}}</h5>
                    @endif
                @endif
            @endif
            <br>
            {{-- Filtros --}}

            <button onclick="$('#modal_filters').modal({backdrop: 'static', keyboard: false});" type="button" name="button" class="btn btn-white float-right md-show hide mb-2"> <i class="fas fa-filter"></i> Filtros</button>

            <div class="md-show">
                <a href="{{request()->url()}}" class="btn btn-white float-right mr-2 mb-2 btn_empty_filters hide "><i class="fas fa-sync-alt"></i> Todos </a>
            </div>

            <div class="row filters md-hide">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">

                            {{-- Este se oculta con javascript para mantener tamaño --}}
                            <div class="input-group input-group float-right ml-2 mb-2 @if(!request()->subcategoria and !request()->categoria) hideJava @endif " style="max-width:280px">
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

                                <div class="input-group input-group float-right mb-2 ml-2" style="max-width:280px">
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

                                    <div class="input-group input-group float-right ml-2 mb-2" style="max-width:280px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"> Estatus </span>
                                        </div>
                                        <select class="form-control" name="estatus">
                                            <option value="">Todos</option>
                                            <option @if(request()->estatus == 'eliminados') selected @endif value="eliminados">Eliminados</option>
                                            </select>
                                        </div>

                                        <div class="input-group float-right mb-2 ml-2" style="max-width:280px">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"> Título </span>
                                            </div>
                                            <input value="{{request()->titulo}}" name="titulo" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">

                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-secondary search float-right ml-2" type="button">Buscar</button>

                                <a href="{{request()->url()}}" class="btn btn-white float-right ml-2 mb-2 btn_empty_filters hide"><i class="fas fa-sync-alt"></i> Todos </a>
                            </div>
                        </div>

                        <div class="mt-5">
                            {{-- sidebar --}}
                            @include('admin.blog.sidebar')
                            {{-- list articulos --}}
                            <div class="row" id="list">
                                @include('admin.blog.index_ajax')
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="" value="{{url('subir-imagen')}}" id="url-upload">
                    <!-- Button trigger modal -->
                    <br>
                    <br>


                    @include('admin.blog.includes.modal_filters')
                @endsection

                @section('scripts')
                    <script src="{{asset("public/libraries/ckeditor/ckeditor.js")}}"></script>
                    <script src="{{asset("public/libraries/dropzone/dropzone.min.js")}}"></script>
                    <script src="{{asset("public/js/images_dropzone.js")}}"></script>
                    <script src="{{asset("public/js/forms.js")}}"></script>
                    <script src="{{asset("public/js/validate-forms.js")}}"></script>
                    <script src="{{asset("public/js/inputs.js")}}"></script>
                    <script src="{{asset("public/js/fill_next_input.js")}}"></script>
                @endsection
