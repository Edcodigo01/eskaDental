




    @include('front.blog.includes.card_article_sm')

    <div style="width:100%" class="card_article_blog_lg  @if (session()->get('type_view') == 'cards' or request()->titulo or request()->categoria or request()->subcategoria) hide @else show @endif">
        <div class="card relative mb-4">
            {{-- <div class="card-header p-1 bg-secondary">
                <div class="content-header relative">
                    <div class="overlay"></div>
                    <div class="title">
                    </div>
                </div>
            </div> --}}
            <div class="card-body p-3" style="overflow:hidden">

                <img style="" src="{{ imageP($article) }}" alt="">
                {{-- <h5 style="max-width:95%;" class="title title-cut m-auto">{{cutText($article->title,50)}}</h5> --}}


                <div class="description text-justify" style="word-wrap: break-word;">
                    <h5 class="title title-complete m-auto text-primary">{{$article->title}}</h5>
                    <div class="mt-2" style="font-size:10px !important;word-wrap: break-word;">

                        {!!$article->description!!}
                    </div>
                    {{-- <p class="description-lg hide" style="">
                        {!!cutTextClean($article->description,800)!!}
                    </p>
                    <p class="description-sm hide" style="">
                        {!!cutTextClean($article->description,200)!!}
                    </p> --}}
                </div>


            </div>
            <div class="card-footer bg-white p-1 px-3">
                <small class="m-0 autor float-left">
                    <span class="font-600 text- ">Autor:</span> {{$article->autor}}
                </small>
                <small class="float-left text-red ml-2 font-600"><span class="font-600"></span> {{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</small>


                @if ($article->category)
                        <input type="hidden" name="" value="{{$category_article = $article->category->slug}}" >
                    @else
                        <input type="hidden" name="" value="{{$category_article = 'otra'}}" >
                @endif
                <a href="{{url('blog/'.$category_article.'/'.$article->slug)}}" class="btn-more-sm mt-1  btn btn-secondary btn-sm float-right">Más...</a>
                <br>
                <small class="m-0 autor float-left text-primary font-600">
                    @if ($article->subcategory)
                        <a href="{{request()->url().'?categoria='.$article->category->slug.'&subcategoria='.$article->subcategory->slug}}" class="text-primary">{{$article->category->name}} / {{$article->subcategory->name}}</a>
                    @elseif ($article->category)
                        <a href="{{request()->url().'?categoria='.$article->category->slug}}" class="text-primary">{{$article->category->name}}</a>
                    @endif
                </small>
            </div>

        </div>
    </div>
