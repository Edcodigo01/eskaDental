@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\libraries\venobox\venobox.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\libraries\slick-master\slick.css') !!}">
    {{-- <link rel="stylesheet" href="{!! asset('public\libraries\slick-master\slick-theme.css') !!}"> --}}


    <link rel="stylesheet" href="{!! asset('public\css\sections\instalaciones.css') !!}">
    <style media="screen">

    </style>
@endsection
@section('title')
    {{config('app.name')}} / Nosotros
@endsection
@section('title_banner')
    <i class="fas fa-users"></i> Nosotros
@endsection
@section('content')

    <div class="title_banner paralax" style="background-image:url({!! asset('public/images/default/instalaciones/image00038.jpg') !!});background-position:center;object-fit:cover">
        <div class="overlay" style="background: linear-gradient(to bottom,rgba(0, 0, 0, 0.10),60%,rgba(0, 0, 0, 0.60))"></div>
        <div class="title_cut_top">
            <h2  class="text-left mt-3 text-white-border float-right" style="margin-right:30px"><i class="fas fa-door-open"></i> Instalaciones</h2>
        </div>
        <div class="title_cut_bottom"></div>
    </div>
    <br>
    <br>
    {{-- vista en sm --}}
    <div class="container2 sm-hide">
        <div class="row instalaciones myGallery">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00003.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00003-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00012.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00012-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00024.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00024-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00032.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00032-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00038.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00038-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00039.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00039-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00046.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00046-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00052.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00052-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00057.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00057-sm.jpg') !!}" alt="">
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6  py-3 m-auto">
                <a class="venobox" href="public\images\default\instalaciones\image00060.jpg" data-gall="myGallery">
                    <img src="{!! asset('public\images\default\instalaciones\image00060-sm.jpg') !!}" alt="">
                </a>
            </div>

        </div>
    </div>


    <div class="container2 hide sm-show">

        <div id="instalaciones" class="myGallery">
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00003-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00012-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00024-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00032-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00038-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00039-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00046-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00052-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00057-sm.jpg') !!}" alt="">
            </a>
            <a>
                <img src="{!! asset('public\images\default\instalaciones\image00060-sm.jpg') !!}" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>


@endsection

@section('scripts')



    <script src="{!! asset('public\libraries\slick-master\slick.js') !!}"></script>
    {{-- <script src="{!! asset('public\libraries\jquery.validate.min.js') !!}"></script> --}}

    <script src="{!! asset('public\libraries\venobox\venobox.min.js') !!}" ></script>

    <script>

    $(document).on('click','#instalaciones a', function(e){
        e.preventDefault();
        return;
    });

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

    $(document).ready(function() {
        $('.venobox2').venobox({
            framewidth : '100%',                            // default: ''
            frameheight: '100%',                            // default: ''
            border     : '6px',                             // default: '0'
            bgcolor    : 'var(--red-v-x-l)',                          // default: '#fff'
            // titleattr  : 'data-title',                       // default: 'title'
            numeratio  : true,                               // default: false
            infinigall : true,                               // default: false
            share      :false, // default: []
            arrowsColor:'var(--white)',
    });
    });

    $('#instalaciones').slick({
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
