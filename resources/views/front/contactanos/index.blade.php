@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{{asset("public/libraries/toastr/toastr.min.css")}}">
    <link rel="stylesheet" href="{{asset("public\contact\contact.css")}}">
    <link rel="stylesheet" href="{!! asset('public\css\sections\contacts.css') !!}">
@endsection

@section('title')
    {{config('app.name')}} / Contáctanos
@endsection

@section('content')

    <div class="title_banner paralax" style="background-image:url({!! asset('public/images/default/contactanos.jpg') !!});background-position:top right;">
        <div class="overlay" style="background: linear-gradient(to bottom,rgba(0, 0, 0, 0.10),60%,rgba(0, 0, 0, 0.60))"></div>
        <div class="title_cut_top">
            <h3  class="text-left mt-3 text-white-border float-right" style="margin-right:60px"><i class="fas fa-envelope"></i>  Contáctanos</h3>
        </div>
        <div class="title_cut_bottom"></div>
    </div>
    <br>
    <div class="container">
<br>
        <div class="row">
            <div class="col-md-6 mb-4">

                <div class="card" style="max-width:400px;margin:auto">
                    <div class="card-header bg-white">
                        <h3 class="text- text-secondary">Escríbenos</h3>
                    </div>
                    <div class="card-body">
                    <form class="validateN"  action="{{url('mail_contact')}}" method="post" id="form_contact">
                        <div class="form-group mb-3">
                            <label class="text-primary" for=""> <i class="fas fa-envelope"></i> Tu correo electrónico</label>
                            <input type="text" name="email" value="" class="form-control form-control-sm required email" maxlength="70">
                        </div>
                        <div class="form-group my-3">
                            <label class="text-primary" for=""><i class="fas fa-comment"></i> Mensaje</label>
                            <textarea class="form-control form-control-sm required" name="message" rows="4" cols="40" maxlength="1000"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                           <div class="g-recaptcha mb-3" data-sitekey="6LeQl6saAAAAAIUv7It8WRtSmVTLLn3NzmFprlsA" data-callback="onReCaptcha"></div>
                        </div>
                        <button type="submit" name="button" class="btn btn-primary float-right ml-2">Enviar</button>
                        <button id="cancel-message" type="button" name="button" class="btn btn-white float-right">Cancelar</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">

                <img style="width:220px;margin:auto" src="{{asset('public\images\default\LogoEskaDentalcompleto.png')}}" alt="">
                <br>
                <br>
                <p class="text-justify" style="width:">
                    ESKA DENTAL funciona en el piso 2, oficina 2 del Edificio Century Plaza I, localizado en el hipercentro de la ciudad de Quito, en el Pasaje El Jardín 168 y la Avenida 6 de Diciembre, parroquia Iñaquito, a 100 metros del Megamaxi.
                </p>
                <p class="text-justify" style="width:">
                    La clínica cuenta con instalaciones nuevas, una acogedora recepción y sala de espera, 3 amplios consultorios, área de esterilización, rayos x, cafetería y 2 baños, acabados de alta gama, equipos de última tecnología marcas NSK, Gnatus y Kavo.
                </p>
            </div>
        </div>

        <br>
    </div>
    <br>
    {{-- <div class="triangle_gold_to_top bg-secondary" style=""></div> --}}
    <div class="bg- relative paralax-real" style="background-image:url({!! asset('public/images/default/slider/slider-1.jpg') !!});background-position:top;">
        <div class="contaitner-triangle-mediun">
            <div class="container-triangles">
                <div class="triangle-mediun-left"></div>
                <div class="triangle-mediun-right"></div>
            </div>
        </div>
        <div class="overlay" style="background:rgba(232, 187, 93, 0.8)"></div>
        <br>
        <br>

        <div class="container ">
            <br>
            <br>

            <div class="row">
                <div class="col-12 form-inline">
                    <a href="{{url('/')}}" class="circle mb-3">
                        <div class="text-center">
                            <h1 class="m-"><i class="fas fa-envelope text-white-border"></i></h1>
                            {{-- <h6 class="text-white-border">Correo</h6> --}}
                            <h5 class="text-white-border">eskadental
                            <br>    @gmail.com</h5>
                        </div>
                    </a>
                    <a href="https://www.instagram.com/eska_dental/?hl=es-la" class="circle mb-3">
                        <div class="text-center">
                            <h1 class="m-" ><i style="font-size:120%" class="fab fa-instagram text-white-border"></i></h1>

                            <h5 class="text-white-border">eska_dental</h5>
                        </div>
                    </a>

                    <a href="https://web.whatsapp.com/send?phone=593-0958845384&text=" class="whatsapp-web circle mb-3">
                        <div class="text-center">
                            <h1 class="m-"><i style="font-size:125%" class="fab fa-whatsapp text-white-border"></i></h1>

                            <h5 class="text-white-border">+593- <br> 958845384</h5>
                        </div>
                    </a>

                    <a href="https://api.whatsapp.com/send?phone=+593-0958845384" class="whatsapp-app circle mb-3 ">
                        <div class="text-center">
                            <h1 class="m-"><i style="font-size:125%" class="fab fa-whatsapp text-white-border"></i></h1>

                            <h5 class="text-white-border"> +593- <br> 958845384</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>

        {{-- <br> --}}

        {{-- <div class="contaitner-triangle-mediun-up">
            <div class="container-triangles">
                <div class="triangle-mediun-left-up"></div>
                <div class="triangle-mediun-right-up"></div>
            </div>
        </div> --}}
    </div>

    {{-- <br> --}}
    {{-- <br> --}}

    {{-- <h3 class=" text-primary text-center"><i class="fas fa-map-marked-alt"></i> Ubicación</h3>

    <div class="container2" style="height:450px;border-radius:5px;border:solid 5px var(--grey-x-l)">
        <iframe style="width:100%;height:100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.7966974360265!2d-78.49463166759794!3d-0.1886332762229328!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x456cb7c580db5e55!2sEdificio%20Metro%20Park!5e0!3m2!1ses-419!2sec!4v1618537147005!5m2!1ses-419!2sec"  frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <br>
    <br> --}}


@endsection

@section('scripts')



    <script src="{!! asset('public\libraries\toastr\toastr.min.js') !!}"></script>
    <script src="{!! asset('public\js\toastr_config.js') !!}"></script>

    <script src="{!! asset('public\contact\contact.js') !!}"></script>
    <script src="{!! asset('public\js\validate-forms.js') !!}"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
    var onReCaptcha = function() {
      if (grecaptcha.getResponse().length !== 0) {
          var btSubmit = document.getElementById("bt-submit");
          btSubmit.disabled = false;
      }else{
          btSubmit.disabled = true;
      }
     };
    </script>
@endsection
