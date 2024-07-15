
@if (request()->route()->getName() != 'servicios')
    <div class="triangle_gold_to_top bg-secondary"></div>
    <input type="hidden" name="" value="{{$colortitle = 'text-white-border'}}" >
    <input type="hidden" name="" value="{{$colorText = 'text-white-border'}}" >

@else
    <input type="hidden" name="" value="{{$colortitle = 'text-primary'}}" >
    <input type="hidden" name="" value="{{$colorText = 'text-dark'}}" >
@endif



<div class="@if(request()->route()->getName() != 'servicios') bg-secondary  @endif servicios">
    <div class="container2">
        <br>
        @if (request()->route()->getName() != 'servicios')
            <h2 class="{{$colortitle}} text-center">Servicios</h2>
        @endif
        <br>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\endodoncia-1.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Endodoncia</h4>
                <p class="{{$colorText}} font-500">
                    Date una segunda oportunidad para preservar tus dientes.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\ortodoncia.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Ortodoncia </h4>
                <p class="{{$colorText}} font-500">
                    Corrige / Rectifica / Alinea  la forma de tu sonrisa.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\periodoncia.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Periodoncia </h4>
                <p class="{{$colorText}} font-500">
                    Mantén tus encías sanas.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\rehabilitacion-oral (2).jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Rehabilitación oral </h4>
                <p class="{{$colorText}} font-500">
                    Reconstruye tus piezas dentales.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\restauracion.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Estética restauradora </h4>
                <p class="{{$colorText}} font-500">
                    Descubre la belleza de tu sonrisa.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\odontopediatria.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Odontopediatría </h4>
                <p class="{{$colorText}} font-500">
                    Preserva la salud oral de los más pequeños.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\implantologia.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Implantología </h4>
                <p class="{{$colorText}} font-500">
                    Recupera tu dentadura.
                </p>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-3 text-center wow fadeIn" data-wow-duration="1s" >
                <img style="" src="{!! asset('public\images\default\servicios\cirugia-maxilofacial.jpg') !!}" alt="">
                <h4 class="{{$colortitle}} mt-2">Cirugía Maxilofacial </h4>
                <p class="{{$colorText}} font-500">
                    Recibe soluciones quirúrgicas.
                </p>
            </div>
        </div>
        <br>
    </div>
</div>

@if (request()->route()->getName() != 'servicios')
    <div class="triangle_gold_to_bottom bg-secondary"></div>
@endif
