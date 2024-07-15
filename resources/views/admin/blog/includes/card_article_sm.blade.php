<div class="card_article_blog_sm col-sm-6 col-md-4 col-xl-3 px-1 show">
    <div class="card_article">
        <div class="card relative mb-4">
            <div class="card-header p-1 bg-secondary">
                <div class="content-header relative ">
                    <div class="overlay"></div>
                    <div class="title show-title-complete">
                        <h6 style="max-width:95%;" class="title title-cut m-auto text-center text-white-border">{{cutText($article->title,50)}}</h6>
                        <h6 style="width:95%" class="title title-complete m-auto text-center text-white-border">{{$article->title}}</h6>
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
                        <small class="float-left m-0 text-red mr-2 font-600"><span class="font-600"></span> {{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</small>
                    </div>
                </div>


                <div class="description text-justify" style="border-bottom:3px var(--gold-l) solid">
                    {!!$article->description!!}

                    {{-- {!!cutTextClean($article->description,120)!!} --}}
                </div>
                <div class="description-mobile text-justify" style="border-bottom:3px var(--gold-l) solid">
                    {!!$article->description!!}
                    {{-- {!!cutTextClean($article->description,100)!!} --}}
                </div>
                @if (strpos(request()->url(),'admin'))
                    <div class=" bg-white px-2">

                        @if ($article->removed == 'true')
                            {{-- <button type="button" name="button" class="btn btn-primary btn-sm float-right mr-2"><i class="fas fa-trash"></i> </button> --}}
                            <button type="button" name="button" class="btn btn-success btn-sm float-right showModalAjax ml-1" data-url="{{url('admin/blog/articulos/'.$article->id.'/editar?restore=true')}}"><i class="fas fa-check"></i> </button>
                        @else
                            <button type="button" name="button" class="btn btn-white btn-sm float-right showModalAjax ml-1" data-url="{{url('admin/blog/articulos/'.$article->id.'/editar')}}"><i class="fas fa-pencil-alt"></i> </button>

                            <a href="{{url('blog/'.$article->category->slug.'/'.$article->slug)}}" class="btn-more-sm hide btn btn-secondary btn-sm float-right ml-1"> <i class="fas fa-eye"></i> </a>

                            <button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1 ml-1" data-url="{{url('admin/blog/articulos/'.$article->id.'/borrar')}}"> <i class="fas fa-trash"></i> </button>
                        @endif

                        @if ($article->status == 'Published' and $article->removed == 'false')
                            <p class="text-success font-600 m-0 mt-2"><i class="fas fa-check"></i>
                                publicado
                            </p>
                        @elseif ($article->removed == 'true')
                            <p class="text-grey font-600 m-0 mt-2"><i class="fas fa-times"></i>
                                Eliminado
                            </p>
                        @else
                            <p class="text-danger font-600 m-0 mt-2"><i class="fas fa-stop"></i>
                                No publicado
                            </p>
                        @endif
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

{{-- <div class="col-xl-3 p-1 col-lg-4 col-sm-6 col-12 mb-2  card_articles_sm{{$article->id}}">
    @include('admin\blog\includes\elements_card_article_sm')
</div> --}}
