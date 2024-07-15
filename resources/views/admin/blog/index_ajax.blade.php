    @if ($articles->first())
        @foreach ($articles as $key => $article)
            @include('admin.blog.includes.card_article_sm')
        @endforeach
        <div class="row mt-3" style="width:100%">
            <div class="col-12 col-sm-6 text-center mb-1">
                <h6 class="m-0 text-primary mt-2">{{ trans("short.Página") }} "{{$articles->currentPage()}}" {{ trans("short.de") }} "{{$articles->lastPage()}}"</h6>
            </div>
            <div class="col-12 col-sm-6 d-flex justify-content-center align-item-center mb-1">
                {{ $articles->appends(request()->query())->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-3" style="width: 100%;max-width:800px;margin:auto">
           <h5 class="text-center mt-2"><i class="fas fa-exclamation-triangle"></i> {{ trans("short.No resultados") }}</h5>
        </div>
    @endif
