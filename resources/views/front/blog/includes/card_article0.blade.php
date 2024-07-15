<div class="card_article @if(session()->get('type_view') == 'cards') card_article_blog_sm @else card_article_blog_lg @endif ">
    <div class="card relative mb-4">
        <div class="card-header p-1 bg-secondary">
            <div class="content-header relative">
                <div class="overlay"></div>
                <div class="title">

                    <h5 style="max-width:95%;" class="title title-cut m-auto text-center text-white-border">{{cutText($article->title,50)}}</h5>
                    <h5 style="width:95%" class="title title-complete m-auto text-center text-white-border">{{$article->title}}</h5>
                </div>
                <img style="" src="{{ imageP($article) }}" alt="">
            </div>
        </div>
        <div class="card-body pt-0">
            <br>
            <div class="row">
                <div class="col-12">
                    <p class="m-0 autor float-right">
                        <span class="font-600 text- ">Autor:</span> {{$article->autor}}
                    </p>
                </div>
            </div>
            <div class="description text-justify">
                <div class="description-lg hide" style="">
                    {!!cutText($article->description,800)!!}
                </div>
                <div class="description-sm hide" style="">
                    {!!cutText($article->description,200)!!}
                </div>
            </div>
            <br>
            <div style="overflow:hidden">
                <small class="float-left mt-1 text-red mr-2 font-600"><span class="font-600"></span> {{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</small>
                @if ($article->images->count() >= 2 or strlen($article->description) > 1300)
                    <button type="button" name="button" class="btn-more-lg hide btn btn-secondary btn-sm float-right">Más...</button>
                @endif
                @if ($article->images->count() >= 2 or strlen($article->description) > 200)
                    <button type="button" name="button" class="btn-more-sm hide btn btn-secondary btn-sm float-right">Más...</button>
                @endif
            </div>
        </div>
        @if (strpos(request()->url(),'admin'))
            <div class="card-footer bg-white">
                <button type="button" name="button" class="btn btn-white btn-sm float-right showModalAjax" data-url="{{url('admin/blog/articulos/'.$article->id.'/editar')}}"><i class="fas fa-pencil-alt"></i> Editar</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm float-right mr-2"><i class="fas fa-times"></i> Eliminar</button>
                @if ($article->status == 'Published')
                    <p class="text-success font-600 m-0"><i class="fas fa-check"></i>
                        {{-- Publicado --}}
                    </p>
                @else
                    <p class="text-danger font-600 m-0"><i class="fas fa-stop"></i>
                        {{-- No Publicado --}}
                    </p>
                @endif
            </div>
        @endif
    </div>
</div>
