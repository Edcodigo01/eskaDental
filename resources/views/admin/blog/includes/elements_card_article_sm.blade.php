<div class="card card_articles_sm">
    <div class="card-header p-1 bg-secondary" style="position:relative">
        <div class="relative">
            <div class="overlay"></div>
            <div class="title">
                <h5 style="max-width:98%;" class="m-0 m-auto text-center text-white">{{cutText($article->title,50)}}</h5>
            </div>
            <img style="" src="{{ imageP($article) }}" alt="">
        </div>
    </div>
    <div class="card-body pt-2">
        <p class="autor m-0 mb-1"><small>
            <span class="font-600 text-primary ">Autor:</span> {{$article->autor}}
        </small></p>
        <div class="description">
            <div style="text-align: justify !important" class="text-justify m-0">
                {{-- {!! cutText($article->description,150)!!} --}}
                {!!$article->description!!}
            </div>
        </div>
        <div class="mt-2" style="overflow:hidden">
            <small class="float-left mt-1 text-red mr-2"><span class="font-600"></span> {{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</small>
            <button type="button" name="button" class="btn btn-secondary btn-sm float-right"> Leer </button>
        </div>
    </div>
    @if (strpos(request()->url(),'admin'))
        <div class="card-footer bg-white">
            <button type="button" name="button" class="btn btn-white btn-sm float-right showModalAjax" data-url="{{url('admin/blog/articulos/'.$article->id.'/editar')}}"><i class="fas fa-pencil-alt"></i> Editar </button>
            <button type="button" name="button" class="btn btn-secondary btn-sm float-right mr-2"><i class="fas fa-times"></i> Eliminar </button>
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
