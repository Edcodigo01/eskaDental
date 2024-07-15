@extends('admin.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public/libraries/dropzone/dropzone.min.css') !!}">
    <link rel="stylesheet" href="{{asset('public/libraries/dropzone/basic.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sections/images_dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sections/blog_admin.css')}}">
    <link rel="stylesheet" href="{{asset('public/libraries/DataTables/datatables.min.css')}}">

    <style media="screen">
    .pagination{
        box-shadow:none
    }
    </style>

@endsection
@section('title')
    Administrador / Blog / Categorías
@endsection
@section('content')

    <div class="container2">
        <div class="row">
            <div class="col-12">
                <h3 class="float-left" style="display:inline-block">Administrador / Blog / Categorías</h3>
                <button type="button" name="button" class="btn btn-primary float-right showModalAjax" data-url="{{url('admin/blog/categorias/crear')}}"> <i class="fas fa-plus"></i> Nuevo</button>
            </div>
        </div>
        @if (request()->nombre)
            <h5 class=""> <span class="text-secondary">Nombre:</span> {{request()->nombre}} </h5>
        @endif
        @if (request()->estatus)
            <h5 class=""> <span class="text-secondary">Estatus:</span> <span class=" @if(request()->estatus == 'eliminados') text-danger @endif ">{{request()->estatus}}</span> </h5>
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
                                        <span class="input-group-text" id="basic-addon3"> Nombre </span>
                                    </div>
                                    <input value="{{request()->nombre}}" name="nombre" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary search float-right ml-2" type="button">Buscar</button>

                        <a href="{{request()->url()}}" class="btn btn-white float-right ml-2 mb-2 btn_empty_filters hide"><i class="fas fa-sync-alt"></i> Todos </a>
                    </div>
                </div>
                <div class="">
                    {{-- sidebar --}}
                    @include('admin.blog.sidebar')
                    {{-- list articulos --}}

                        @include('admin.blog.category.index_ajax')

                </div>
            </div>
            @include('admin.blog.category.modal_filters')
            <br>
            <br>

        @endsection

        @section('scripts')
            <script src="{{asset("public/libraries/DataTables/datatables.min.js")}}"></script>

            <script src="{{asset("public/js/tables.js")}}"></script>
            <script src="{{asset("public/js/forms.js")}}"></script>
            <script src="{{asset("public/js/validate-forms.js")}}"></script>
            <script src="{{asset("public/js/inputs.js")}}"></script>
        @endsection
