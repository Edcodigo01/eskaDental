@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\css\sections\blog_admin.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\acordeon.css') !!}">

@endsection
@section('title')
    {{config('app.name')}} / blog
@endsection
@section('title_banner')
    <i class="fas fa-blog"></i> blog
@endsection

@section('content')
    <input type="hidden" name="" value="{{$clientWidth = intval(clientWidth())}}">
    <div class="row">
        <div class="col-12">
            <div class="container3 mt-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class=" text-secondary"> <i class="fas fa-blog"></i> Blog</h2>

                        @if (request()->titulo)
                            <h4 class=""> <span class="text-secondary">Título:</span> {{request()->titulo}} </h4>
                        @endif

                        @if (request()->categoria)
                            <input type="hidden" name="" value="{{$categoryName = \App\Models\Category::where('slug',request()->categoria)->first()}}" >
                            @if ($categoryName)
                                <h4 class=""> <span class="text-secondary">Categoría:</span> {{$categoryName->name}}</h4>
                            @endif
                        @endif
                        @if (request()->subcategoria)

                            <input type="hidden" name="" value="{{$Subcategory_name = \App\Models\Subcategory::where('slug',request()->subcategoria)->first()}}" >

                            @if ($Subcategory_name)
                                <h4 class=""> <span class="text-secondary">Subcategoría:</span> {{$Subcategory_name->name}}</h4>
                            @endif
                        @endif
                    </div>
                </div>
                <br>

                    @include('front.blog.includes.card_filters')

                {{-- ordenar cambiar tipo lista --}}
                <div class="row">
                    <div class="col-12 ">
                    <div class="dropdown mb-1 float-left">
                        <button style="margin-left:-15px" class="btn btn-sm btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ordenar:
                            <span class="text-dark">@if (request()->orden == 'entradas-antiguas')
                                Antiguedad @else Recientes @endif
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item orderBy" data-orderBy="recientes">Recientes</a>
                                <a class="dropdown-item orderBy" data-orderBy="entradas-antiguas">Antiguedad</a>

                            </div>
                        </div>

                        <button onclick="$('#modal_filters').modal({backdrop: 'static', keyboard: false});" type="button" name="button" class="btn btn-primary btn-sm btn-show-modal-filters float-right ml-2"> <i class="fas fa-search"></i> </button>

                        <a href="{{request()->url()}}" class="hide btn btn-sm btn-primary btn_empty_filters mb-2 float-right"> <i class="fas fa-layer-group"></i> Mostrar todos</a>

                        @if (!request()->titulo and !request()->categoria and !request()->subcategoria)
                            <div class="float-right xs-hide">
                                <a href="{{url('change_view/cards')}}" style="display:inline-block;"  class="@if(session()->get('type_view') == 'cards') active @endif px-1 py-0  btn-white  mt-1 mb-2 ml-4">
                                    <i class="fas fa-th"></i>
                                </a>
                                <a href="{{url('change_view/list')}}" style="display:inline-block;margin-right:5px"  class="@if(session()->get('type_view') == 'list') active @endif px-1 py-0  btn-white  mt-1 mb-2 ml-2">
                                    <i class="fas fa-list"></i>
                                </a>
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @if ($articles->first())

                                <div class="row relative" id="list">
                                    <div class="hide_article_locad bg-white" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:10;"></div>
                                    @foreach ($articles as $key => $article)
                                        @include('front.blog.includes.card_article')
                                    @endforeach
                                </div>
                            <div class="row" style="width:100%:">
                                <div class="col-12 col-sm-6 text-center mb-1">
                                    <h5 class="m-0 text-primary mt-2">{{ trans("short.Página") }} "{{$articles->currentPage()}}" {{ trans("short.de") }} "{{$articles->lastPage()}}"</h5>
                                </div>
                                <div class="col-12 col-sm-6 d-flex justify-content-center align-item-center mb-1">
                                    {{ $articles->appends(request()->query())->links() }}
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="alert alert-warning mt-3">
                                <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> {{ trans("short.No resultados") }}</h5>
                            </div>
                        @endif
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    @include('front.blog.includes.modal_filters')
@endsection

@section('scripts')
    <script src="{{asset("public/js/acordeon.js")}}"></script>
    <script src="{{asset("public/js/fill_next_input.js")}}"></script>
    <script src="{{asset("public/js/filters.js")}}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            setTimeout(function(){
                $('.hide_article_locad').hide();
            },200)


        });

    </script>
@endsection
