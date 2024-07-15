<div class="sidebar_blog md-hide m-0">
    <div class="card mb-4 filters">
        <div class="card-header bg-secondary">
            <h5 class="text-white-border"> <i class="fas fa-search"></i> Búsqueda</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="text-" for="">Título</label>

                @if (request()->route()->getName() == 'article_detail')
                    <input type="text" name="titulo" value="" class="form-control form-control-sm">
                    @else
                    <input type="text" name="titulo" value="{{request()->titulo}}" class="form-control form-control-sm">
                @endif

            </div>
            <div class="form-group">
                <label class="text-" for="">Categoría</label>
                <select class="form-control form-control-sm on_change_next_input" name="categoria" data-subcategories="{{json_encode($subcategories)}}" data-next_input=".subcategories">
                    <option value="">Todas</option>
                    @foreach ($categories as $key => $cate)
                        <option @if (request()->categoria == $cate->slug)selected @endif data-id="{{$cate->id}}" value="{{$cate->slug}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="" value="{{$category = \App\Models\Category::where('slug',request()->categoria)->first()}}" >
                <div class="form-group @if($category and $category->subcategory->count() != 0) @else hide @endif" >
                    <label class="text-" for="">Subcategoría</label>
                    <select class="form-control form-control-sm subcategories" name="subcategoria">
                        <option value="">Todas</option>
                        @if ($category)
                            @foreach ($subcategories->where('category_id',$category->id) as $key => $value)
                                <option @if (request()->subcategoria == $value->slug)selected @endif data-id="{{$value->id}}" value="{{$value->slug}}">{{$value->name}}</option>
                                @endforeach
                            @endif
                            <option value="otra" @if(request()->subcategoria == 'otra') selected @endif >Otra</option>
                        </select>

                    </div>

                    <button type="button" name="button" class="btn btn-secondary float-right search"> Buscar</button>
                </div>
                {{-- Hiden --}}
                <input class="form-control" type="hidden" name="orden" value="" id="filter_orderby">
            </div>
        </div>

        @if ($categories->first())
            <div class="card_categories sidebar mb-4 md-hide" id="card_categories">

                <div class="card ">
                    <div class="card-header bg-secondary">
                        <h5 class="text-white-border"> <i class="fas fa-list"></i> Categorías</h5>
                    </div>
                    <div class="card-body p-1 acordeon">
                        @foreach ($categories as $key => $cate)
                            <input type="hidden" name="" value="{{$subcategory = $cate->subcategory}}" >
                            @if ($subcategory->count())
                                <div class="element_acord">
                                    <a class="open_content @if(request()->categoria == $cate->slug) active @endif ">
                                        <div class="text">{{$cate->name}} </div>
                                        <div class="container-div-circle">
                                            <div class="float-right div-circle"> {{$cate->article->count()}} </div>
                                            <i class="fas fa-caret-down float-right mr-1"></i>
                                        </div>


                                    </a>
                                    <div class="content @if(request()->categoria == $cate->slug) show @endif">
                                        <a href="{{url('blog').'?categoria='.$cate->slug.'&subcategoria=todas'}}" class="@if(request()->subcategoria == 'todas') active @endif text-grey">

                                            <div class="text"><i class="fas fa-check text-secondary" style="font-size:80%"></i> Todas</div>
                                            <div class="container-div-circle">
                                                <div class="float-right div-circle">  {{$cate->article->count()}} </div>
                                            </div>
                                        </a>
                                        @foreach ($subcategory as $key => $sub)
                                            <a href="{{url('blog').'?categoria='.$cate->slug.'&subcategoria='.$sub->slug}}" class="@if(request()->subcategoria == $sub->slug) active @endif text-grey">


                                                <div class="text"><i class="fas fa-check text-secondary" style="font-size:80%"></i> {{$sub->name}}</div>
                                                <div class="container-div-circle">
                                                    <div class="float-right div-circle">  {{$sub->article->count()}} </div>
                                                </div>

                                            </a>
                                        @endforeach
                                        {{-- others --}}
                                        @if ($cate->article->count() != 0)
                                            <input type="hidden" name="" value="{{$others = $cate->article->where('subcategory_id',Null)}}" >
                                            @if ($others->count() != 0)
                                                <a href="{{url('blog').'?categoria='.$cate->slug.'&subcategoria=otra'}}" class="@if(request()->subcategoria == 'todas') active @endif text-grey">

                                                    <div class="text"> <i class="fas fa-check text-secondary" style="font-size:80%"></i> Otra</div>

                                                    <div class="container-div-circle">
                                                        <div class="float-right div-circle">  {{$cate->article->count()}} </div>
                                                    </div>

                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @else
                                    <a href="{{url('blog').'?categoria='.$cate->slug}}" class="@if(request()->categoria == $cate->slug) active @endif">
                                        <div class="text">{{$cate->name}} </div>
                                        <div class="container-div-circle">
                                            <div class="float-right div-circle"> {{$cate->article->count()}} </div>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>


                @endif
