<div class="card_article_blog_sm col-sm-6 col-md-4 px-1 @if (session()->get('type_view') == 'cards' or request()->titulo or request()->categoria or request()->subcategoria) show  @else hide @endif">
    <div class="card_article">
        <div class="card relative mb-4">
            <div class="card-header p-1 bg-secondary">
                <div class="content-header relative ">
                    <div class="overlay"></div>
                    <div class="title show-title-complete">
                        <h5 style="max-width:95%;" class="title title-cut m-auto text-center text-white-border">{{cutText($article->title,50)}}</h5>
                        <h5 style="width:95%" class="title title-complete m-auto text-center text-white-border">{{$article->title}}</h5>
                    </div>
                    <img style="" src="{{ imageP($article) }}" alt="">
                </div>
            </div>
            <div class="card-body p-2">

                <div class="row mb-1">
                    <div class="col-12">
                        <p class="m-0 autor">
                            <span class="font-600 text- ">Autor:</span> {{$article->autor}}
                        </p>
                    </div>
                </div>

                <div class="description text-justify">
                    {!!$article->description!!}
                    {{-- {!!cutTextClean($article->description,120)!!} --}}
                </div>
                <div class="description-mobile text-justify">
                    {!!$article->description!!}
                    {{-- {!!cutTextClean($article->description,100)!!} --}}
                </div>
                <div class="mt-1" style="overflow:hidden">
                    <small class="float-left mt-1 text-red mr-2 font-600"><span class="font-600"></span> {{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</small>
                    @if ($article->category)
                            <input type="hidden" name="" value="{{$category_article = $article->category->slug}}" >
                        @else
                            <input type="hidden" name="" value="{{$category_article = 'otra'}}" >
                    @endif
                    <a href="{{url('blog/'.$category_article.'/'.$article->slug)}}" class="btn-more-sm  btn btn-secondary btn-sm float-right">Más...</a>
                </div>
            </div>

            @if (strpos(request()->url(),'admin'))
                <div class="card-footer bg-white">
                    <button type="button" name="button" class="btn btn-white btn-sm float-right showModalAjax" data-url="{{url('admin/blog/articulos/'.$article->id.'/editar')}}"><i class="fas fa-pencil-alt"></i> Editar</button>
                    <button type="button" name="button" class="btn btn-secondary btn-sm float-right mr-2"><i class="fas fa-times"></i> Eliminar</button>
                    @if ($article->status == 'Published')
                        <p class="text-success font-600 m-0"><i class="fas fa-check"></i>

                        </p>
                    @else
                        <p class="text-danger font-600 m-0"><i class="fas fa-stop"></i>

                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
