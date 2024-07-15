@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\css\sections\home.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\libraries\slick-master\slick.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\instalaciones.css') !!}">
    <link rel="stylesheet" href="{!! asset('public\libraries\venobox\venobox.min.css') !!}">

    <style media="screen">
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
        color: black;
        background: rgba(255, 255, 255, 0.20);
        padding: 1px 6px;
        z-index: 18;
    }
    .vbox-next span{
        display: none
    }

    .vbox-prev span{
        display: none
    }
    </style>

@endsection
@section('title')
    {{config('app.name')}}
@endsection
@section('content')
    {{-- -------TEST------------ --}}
    @include('front.home.includes.slider')

    <div class="div_cut_trangle_center">
        <div class="cut_left"></div>
        <div class="cut_right"></div>
    </div>
    <div class="bg-white">
        <div class="container2">
            <br>
            <div class="row" style="margin-top:-px">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3">
                    <img class="circle-img wow rotateIn" data-wow-duration="1s" src="{!! asset('public\images\default\bajo slider\capacitado.jpg') !!}" alt="">
                    <h5 class="mt-2 text-primary">Personal altamente capacitado</h5>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3">
                    <img class="circle-img wow rotateIn" data-wow-duration="1s" src="{!! asset('public\images\default\bajo slider\tecnologia.jpg') !!}" alt="">
                    <h5 class="mt-2 text-primary">Tecnología de punta</h5>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3">
                    <img class="circle-img wow rotateIn" data-wow-duration="1s" src="{!! asset('public\images\default\bajo slider\asesoramiento.jpg') !!}" alt="">
                    <h5 class="mt-2 text-primary">Asesoramiento de calidad</h5>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3">
                    <img class="circle-img wow rotateIn" data-wow-duration="1s" src="{!! asset('public\images\default\bajo slider\atencion.jpg') !!}" alt="">
                    <h5 class="mt-2 text-primary">Excelente  atención</h5>
                </div>
            </div>
            {{-- profesionales
            atencion
            tecnologia
            asesoramiento
            instalaciones --}}
        </div>
        <br>


    </div>

    @include('front.servicios.servicios')
    <br>
    <br>
    {{-- <br> --}}

    <div class="container2 sm-hide">
        <h2 class="text-secondary text-center ">Instalaciones</h2>
        <br>
        <div id="" class="myGallery instalaciones">
            <a class="venobox px-2" href="public\images\default\instalaciones\image00003.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00003-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00012.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00012-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00024.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00024-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00032.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00032-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00038.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00038-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00039.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00039-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00046.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00046-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00052.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00052-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00057.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00057-sm.jpg') !!}" alt="">
            </a>
            <a class="venobox px-2" href="public\images\default\instalaciones\image00060.jpg" data-gall="myGallery">
                <img src="{!! asset('public\images\default\instalaciones\image00060-sm.jpg') !!}" alt="">
            </a>
        </div>
    </div>

    <div class="container2 hide sm-show">
        <h2 class="text-secondary text-center ">Instalaciones</h2>
        <br>
        <div id="" class="myGallery instalaciones">
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00003-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00012-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00024-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00032-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00038-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00039-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00046-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00052-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00057-sm.jpg') !!}" alt="">
            </a>
            <a class="px-2">
                <img src="{!! asset('public\images\default\instalaciones\image00060-sm.jpg') !!}" alt="">
            </a>
        </div>
    </div>

    <br>
    <br>
    <br>

    {{-- <section style="background-image: url('{{asset('public/images/default/personas-organizando.png')}}')" class="paralax mt-2"> --}}
    @include('front.home.includes.porque_escogernos')

    {{-- ------------------------ --}}
@endsection

@section('scripts')

    <script src="{!! asset('public\libraries\slick-master\slick.js') !!}"></script>
    {{-- <script src="{!! asset('public\libraries\jquery.validate.min.js') !!}"></script> --}}

    <script src="{!! asset('public\libraries\venobox\venobox.min.js') !!}" ></script>

    <script>

    $(document).on('load', function(e){
        $('#carouselExampleControls').carousel({
            interval: 3500,
            pause: false
        });
    });

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
            arrowsColor:'var(--red-v-x-l)',
    });
    });

    $('.instalaciones').slick({
        customPaging: function (slider, i) {
        },

        dots:true,
        arrows:true,
        // infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<span class="prevSlide"><i class="fa fa-angle-left fa-4x" aria-hidden="true"></i></span>',
        nextArrow: '<span class="nextSlide"><i class="fa fa-angle-right fa-4x" aria-hidden="true"></i></span>',
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
