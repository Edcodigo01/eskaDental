@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\css\front\nostros.css') !!}">

@endsection
@section('title')
    {{config('app.name')}} / Nosotros
@endsection
@section('title_banner')
    <i class="fas fa-users"></i> Nosotros
@endsection
@section('content')
<div class="bg-">

    <div class="title_banner paralax" style="background-image:url({!! asset('public/images/default/Nosotros.png') !!});background-position:center center;">
        <div class="overlay" style="background: linear-gradient(to bottom,rgba(0, 0, 0, 0.10),60%,rgba(0, 0, 0, 0.60))"></div>
        <div class="title_cut_top">
            <h3  class="text-left mt-3 text-white-border float-right" style="margin-right:60px"><i class="fas fa-users"></i>  Nosotros</h3>
        </div>
        <div class="title_cut_bottom"></div>
    </div>

    {{-- <div class="title_banner paralax" style="height:390px;background-image:;background-position:center;">
        <div class="overlay" style="background:rgba(0, 0, 0, 0.10)"></div>


        <div class="title_cut_top">
            <h2  class="text-left mt-3 text-white-border float-right" style="margin-right:60px"><i class="fas fa-user-md"></i> Somos</h2>
        </div>
        <div class="title_cut_bottom"></div>
    </div> --}}
    <br>
    <br>

    <div class="container2">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="" style="max-width:600px;margin:auto">
                    <div class="text-center">
                        <img class="img-circle-nosotros wow rotateIn" data-wow-duration="1s" style="" src="{!! asset('public\images\default\mision vision\mision.png') !!}" alt="">
                    </div>

                    <br>
                    <h2 class="text-center text-primary"> Misión</h2>

                    <p class="text-justify text-">
                        Satisfacer las necesidades odontológicas de los pacientes con excelencia a través del cuidado de la salud bucal, así como, el mejoramiento de la función y estética dental. Ofrecer una óptima relación entre precio, calidad y resultado.
                    </p>
                </div>
            </div>

            <div class="col-md-6 m-auto">
                <div class="" style="max-width:600px;margin:auto">
                    <div class="text-center">
                        <img class="img-circle-nosotros wow rotateIn" data-wow-duration="1s" src="{!! asset('public\images\default\mision vision\reco.png') !!}" alt="">
                    </div>

                    <br>
                    <h2 class="text-center text-primary"> Visión</h2>

                    <p class="text-justify text-">
                        ESKA DENTAL será reconocida como una clínica dental de prestigio, caracterizada por ofrecer tratamientos innovadores, seguros y confiables realizados por profesionales de alto nivel con materiales de la mejor calidad que disponen de equipos de última tecnología.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="paralax paralax-real p-2 relative paralax_nostros" style="background-image:url({{asset('public/images/default/instalaciones/image00003.jpg') }});background-position:center center">
        <div class="contaitner-triangle-mediun">
            <div class="container-triangles">
                <div class="triangle-mediun-left"></div>
                <div class="triangle-mediun-right"></div>
            </div>
        </div>
        <div class="overlay" style="background:rgba(162, 49, 48, 0.80)"></div>
        <br>
        <br>



        <div class="container2">
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <h2 class="text-center text-white-border" style=""> Valores </h2>
                    <br>
                    <div class="text-center line-height">
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Comprensión sobre las necesidades de cada persona. </h5>
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Confianza en la relación con el paciente.</h5>
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Agilidad y puntualidad en los tratamientos. </h5>
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Transparencia en todos los servicios dentales. </h5>
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Equilibrio y razonabilidad: precio – calidad – resultado. </h5>
                        <h5 class="text-white-border"><i class="fas fa-check"></i> Compromiso hacia la excelencia.</h5>
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <h2 class="text-center text-white-border" style=""> Historia </h2>
                    <br>
                    <div class="text-center line-height">
                        <h5 class="text-justify text-white-border">
                            ESKA DENTAL nació en la ciudad de Quito como un proyecto nuevo destinado a posicionarse como un referente del servicio de excelencia y las buenas prácticas empresariales en materia odontológica.
                        </h5>
                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        <br>

        {{-- <div class="triangle_white_to_top"></div> --}}
    </div>


</div>

@endsection

@section('scripts')

@endsection
