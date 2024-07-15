@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\css\sections\blog_admin.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\acordeon.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\article_detail.css') !!}">

    <link rel="stylesheet" href="{!! asset('public\libraries\venobox\venobox.min.css') !!}">

    <link rel="stylesheet" href="{!! asset('public\libraries\slick-master\slick.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\instalaciones.css') !!}">
    <style>
    .venobox{
        position: relative;

    }
    .venobox::after{
        font-family: "Font Awesome 5 Free";
        font-weight: 600;
        font-size: 20px;
        content: '\f065';
        z-index: 100;
        position: absolute;
        right:7%;
        bottom:5%;
    }
    .slick-track{ margin-left: 0; }
    </style>

@endsection
@section('title')
    {{$article->title}}
@endsection


@section('content')
    <div class="container3 mt-5 article_detail">

        @include('front.blog.includes.card_filters')

        <div class="row">
            <div class="col-12 text-justify">
                <div class="" style="overflow:hidden">
                    <h3 class="text-left">
                        @if ($article->subcategory)
                            <a href="{{url('blog').'?categoria='.$article->category->slug}}" class="text-primary">{{$article->category->name}}</a> <span class="text-primary">/</span>
                            <a class="text-primary" href="{{url('blog').'?categoria='.$article->category->slug.'&subcategoria='.$article->subcategory->slug}}">{{$article->subcategory->name}}</a>
                        @elseif ($article->category)
                            <a href="{{url('blog').'?categoria='.$article->category->slug}}" class="text-primary">{{$article->category->name}}</a>
                        @endif
                    </h3>
                    <h4 class="text-secondary">{{$article->title}}</h4>

                    <p style="display:inline-block" class="m-0 mr-3 text-left"> <span class="font-600">Autor:</span> {{$article->autor}} </p>
                    <p style="display:inline-block" class="m-0 text-primary text-left">{{$article->created_at->format('d/m/y')}} {{$article->created_at->format('H:i')}}</p>

                </div>
                <br>
                <div class="" style="word-wrap:break-word">
                    <a  class="venobox float-left mr-4 mb-4" href="{{imageP($article)}}" data-gall="myGallery">
                        <img  class="imgP" src="{{imageP($article)}}" alt="">
                    </a>

                    {!!$article->description!!}
                </div>
                <br>
                <div class="xs-hide">
                    <div id="" class="myGallery imagenes slick">
                        @foreach ($images as $key => $image)
                            <a class="venobox px-2" href="{{asset($image->path)}}" data-gall="myGallery">
                                <img style="" src="{{asset($image->path)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="hide xs-show">
                    <div id="" class=" imagenes  hide slick">

                        @foreach ($images as $key => $image)
                            <a class=" px-2"  data-gall="myGallery">
                                <img style="" src="{{asset($image->path)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>
                <br>
                <br>

                @if ($articles->first())
                    <h3 class="ml-1 text-primary">Artículos recientes</h3>
                    <br>

                    <div class="slick">
                        @foreach ($articles as $key => $article)
                            <div class="card_article_blog_sm px-1">
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

                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('front.blog.includes.modal_filters')
    <br>
    <br>

@endsection

@section('scripts')
    <script src="{{asset("public/js/acordeon.js")}}"></script>
    <script src="{{asset("public/js/fill_next_input.js")}}"></script>
    <script src="{{asset("public/js/filters.js")}}"></script>
    <script src="{!! asset('public\libraries\slick-master\slick.js') !!}"></script>

    <script src="{!! asset('public\libraries\venobox\venobox.min.js') !!}" ></script>

    <script type="text/javascript">

    $(document).ready(function() {
        $('.venobox').venobox({
            frameheight: '90vh',                            // default: ''
            framewidth : 'auto',                            // default: ''
            border     : '6px',                             // default: '0'
            bgcolor    : 'var(--red-v-x-l)',                          // default: '#fff'
            // titleattr  : 'data-title',                       // default: 'title'
            numeratio  : true,                               // default: false
            infinigall : true,                               // default: false
            share      :false, // default: []
            arrowsColor:'var(--white)',
        });
    });

    $('.slick').slick({
        customPaging: function (slider, i) {
        },
        arrows:true,
        dots:true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<span class="prevSlide"><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></span>',
        nextArrow: '<span class="nextSlide"><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></span>',
        responsive: [


            {
                breakpoint: 1250,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });
    </script>
@endsection
