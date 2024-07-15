<div id="navP" class="bg-white" style="position:fixed;width:100%;z-index:18">
    <div class="nav1">
        <div class="container2">
            {{-- <span class="go_url" > --}}
            <img id="logo-g" class="go_url" data-url="{{url('/')}}" src="{!! asset('public\images\default\logo.jpg') !!}" alt="">
            <img id="letras-logo-g" class="go_url" data-url="{{url('/')}}" src="{!! asset('public\images\default\letras-logo.jpg') !!}" alt="">
                <br>
            {{-- </span> --}}
            <div class="" style="width:100%">

                @if (Auth::check())
                <div class="dropdown float-right">
                  <a class="btn btn-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-cog"></i> <span class="sm-hide">Administración</span>  <i class="fas fa-sort-down"></i>
                </a>
                  <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="dropdownMenuButton">
                    {{-- <h5 class="text-dark px-3 mt-2" style="display:inline-block; white-space: nowrap;" href="#"> <i class="fas fa-user"></i> </h5> --}}
                    <p class="m-0"> <i class="fas fa-user-cog"></i> Usuario</p>
                        <a class="dropdown-item text-primary px-3 font-600 show_modal_user"> Datos</a>
                    <p class="m-0"> <i class="fas fa-blog"></i> Blog</p>
                    <a class="dropdown-item text-primary px-3 font-600" href="{{url('admin/blog/articulos')}}"> Artículos</a>

                    <a class="dropdown-item text-primary px-3 font-600" href="{{url('admin/blog/categorias')}}"> Categorías</a>
                    <a class="dropdown-item text-primary px-3 font-600" href="{{url('admin/blog/subcategorias')}}"> Subcategorías</a>
                    <div class="dropdown-divider"></div>


                    <a class="dropdown-item text-primary px-3 font-600" href="{{url('admin/cerrar-sesion')}}">  Cerrar sesión</a>
                  </div>
                </div>
                @endif
            </div>
            <div class="">
                {{-- <h6 style="display:inline;" class="float-right"><i class="fab fa-whatsapp text-red" style="font-size:140%"></i> +592-9892022</h6> --}}
            </div>
        </div>
    </div>
</div>
<div class="" style="height:90px;"></div>


<div class="nav2" style="display:none"></div>
<div class="" id="detect-top-mobile"></div>
<div id="margin_navbar"></div>
