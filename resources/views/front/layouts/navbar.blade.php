<div id="nav-sup" >
     <div class="container2">
         <div class="whatsapp-nav1">

             <a target="_blank" href="https://api.whatsapp.com/send?phone=+593-0958845384" class="sm-show  float-right ml-4" style="">
                <i class="fab fa-whatsapp" style="font-size:105%"></i>  <span class=""></span>
             </a>

         </div>
         <a href="{{url('/contactanos')}}" class=" text-dark float-left">
             <i class="fas fa-envelope"></i>
             <span class="sm-hide">eskadental@gmail.com</span>
         </a>
         <a href="https://www.instagram.com/eska_dental/" class=" text-dark float-right"> <i class="fab fa-instagram" style="font-size:105%"></i> <span class="sm-hide">eska_dental</span></a>
     </div>
</div>
<div id="navP" class="">
    <div class="nav1">
        <div class="container2">
            {{-- <span class="go_url" > --}}
                <img id="logo-g" class="go_url" data-url="{{url('/')}}" src="{!! asset('public\images\default\logo.jpg') !!}" alt="">
                <img id="letras-logo-g" class="go_url" data-url="{{url('/')}}" src="{!! asset('public\images\default\letras-logo.jpg') !!}" alt="">
            {{-- </span> --}}

            <div class="" style="width:100%">
                {{-- <button type="button" name="button" class="btn-main btn btn-white float-right  hide sm-show"> <i class="fas fa-bars"></i></button> --}}
                <div class="dropdown dropdown-menu-nav show float-right">
                  <a class=" btn btn-white hide sm-show @if (request()->route()->getName() == 'instalaciones' or request()->route()->getName() == 'somos') active @endif"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-navbar" aria-labelledby="dropdownMenuLink">
                      <a style="font-size:15px" class="float-right"> <i class="fas fa-times"></i> </a>
                      <br>
                      <a class="@if (request()->route()->getName() == 'inicio') active @endif" href="{{url('/')}}" >Inicio</a>
                      <a class="@if (request()->route()->getName() == 'servicios') active @endif" href="{{url('/servicios')}}" >Servicios</a>
                      <a class="@if (request()->route()->getName() == 'nosotros') active @endif" href="{{url('/nosotros')}}" >Nosotros</a>
                      <a class="@if (request()->route()->getName() == 'instalaciones') active @endif" href="{{url('/instalaciones')}}" >Instalaciones</a>

                      <a class="@if (request()->route()->getName() == 'blog') active @endif" href="{{url('/blog')}}" >Blog</a>
                      <a class="@if (request()->route()->getName() == 'contactanos') active @endif" href="{{url('/contactanos')}}" >Contáctanos</a>
                  </div>
                </div>
                <div class="whatsapp-nav2 sm-hide">
                    <h6 style="display:block;" class="float-right ml-4 mt-1">
                    <a target="_blank" about href="https://web.whatsapp.com/send?phone=593-0958845384&text=" class="hide whatsapp-web text-dark" style="">
                            <i class="fab fa-whatsapp text-red" style="font-size:140%"></i>  <span class="">+593-958845384</span>
                    </a>
                    </h6>
                    <h6 style="display:block;" class="float-right ml-4 mt-1">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+593-0958845384" class="hide whatsapp-app text-dark" style="">
                            <i class="fab fa-whatsapp text-red" style="font-size:140%"></i>  <span class="">+593-958845384</span>
                    </a> <br>
                    </h6>
                </div>
            </div>
            <div class="">
                {{-- <h6 style="display:inline;" class="float-right"><i class="fab fa-whatsapp text-red" style="font-size:140%"></i> +592-9892022</h6> --}}
            </div>
        </div>
    </div>
</div>

<div class="nav2 form-inline test sm-hide">
    <div class="container3 form-inline">
        <div class="section1 go_url" data-url="{{url('/')}}">
            <img id="logo-nav-2" class="hide" src="{!! asset('public\images\default\logo-fondo-sin-fond.png') !!}" alt="">
            <img id="letras-nav-2" class="ml-3 hide" src="{{asset('public\images\default\letras-sin-fondo.png')}}" alt="">
        </div>
        <div class="section2">
            <a class="@if (request()->route()->getName() == 'inicio') active @endif" href="{{url('/')}}">Inicio</a>
            <a class="@if (request()->route()->getName() == 'servicios') active @endif"  href="{{url('/servicios')}}">Servicios</a>
            <a class="@if (request()->route()->getName() == 'nosotros') active @endif"  href="{{url('/nosotros')}}">Nosotros</a>

            <a class="@if (request()->route()->getName() == 'instalaciones') active @endif" href="{{url('/instalaciones')}}" >Instalaciones</a>

            <a class="@if (request()->route()->getName() == 'blog') active @endif"  href="{{url('/blog')}}">Blog</a>

            {{-- <a class="@if (request()->route()->getName() == 'testimonios') active @endif"  href="{{url('/testimonios')}}">Testimonios</a> --}}

            <a class="@if (request()->route()->getName() == 'contactanos') active @endif"  href="{{url('/contactanos')}}">Contáctanos</a>

        </div>
    </div>
</div>

<div id="detect-top-mobile"></div>


<div id="nav-mobile-extra" class=" bg-primary">
    <div class="container2 d-flex align-items-center">
        <img id="logo-nav-2" class="go_url" data-url="{{url('/')}}" src="{!! asset('public\images\default\logo-fondo-sin-fond.png') !!}" alt="">

        <a href="{{url('/contactanos')}}" class=" float-left ml-auto "> <i class="fas fa-envelope"></i></a>

        <a target="_blank" href="https://api.whatsapp.com/send?phone=+593-0958845384" class="whatsapp-app  float-right ml-auto" style="">
                <i class="fab fa-whatsapp " style="font-size:105%"></i>  <span class=""></span>
        </a>

        <a target="_blank"  href="https://web.whatsapp.com/send?phone=593-0958845384&text=" class="whatsapp-web  float-right ml-auto" style="">
                <i class="fab fa-whatsapp " style="font-size:105%"></i>  <span class=""></span>
        </a>

        {{-- <button type="button" name="button" class="btn-main ml-auto btn btn-white float-right  hide sm-show box-shadow-none"> <i class="fas fa-bars"></i> </button> --}}
        <div class="dropdown dropdown-menu-nav show ml-auto">
            <a class=""  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bars"></i>
            </a>

          <div class="dropdown-menu dropdown-menu-right dropdown-menu-navbar" aria-labelledby="dropdownMenuLink">
              <a style="font-size:15px" class="float-right"> <i class="fas fa-times"></i> </a>
              <br>
              <a class="@if (request()->route()->getName() == 'inicio') active @endif" href="{{url('/')}}" >Inicio</a>
              <a class="@if (request()->route()->getName() == 'servicios') active @endif" href="{{url('/servicios')}}" >Servicios</a>
              <a class="@if (request()->route()->getName() == 'nosotros') active @endif" href="{{url('/nosotros')}}" >Nosotros</a>
              <a class="@if (request()->route()->getName() == 'instalaciones') active @endif" href="{{url('/instalaciones')}}" >Instalaciones</a>

              <a class="@if (request()->route()->getName() == 'blog') active @endif" href="{{url('/blog')}}" >Blog</a>
              <a class="@if (request()->route()->getName() == 'contactanos') active @endif" href="{{url('/contactanos')}}" >Contáctanos</a>
          </div>
        </div>

        {{-- <div class="dropdown dropdown-menu-nav show ml-auto">
          <a class=""  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a href="#">Inicio</a>
              <a href="#">Servicios</a>
              <a href="#">Nostros</a>
              <a href="#">Blog</a>
              <a href="#">Contáctanos</a>

          </div>
        </div> --}}
    </div>


</div>

<div id="margin_navbar"></div>
