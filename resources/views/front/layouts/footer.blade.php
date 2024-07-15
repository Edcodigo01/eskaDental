<div id="footer" class="py-4">
    <div class="container2">
        <img id="logo-footer" class="mb-3" src="{!! asset('public\images\default\logo-fond-gris-footer.png') !!}" alt="">
        <img id="letras-logo-footer" class="mb-3" src="{!! asset('public\images\default\letras-fond-gris-footer.png') !!}" alt="">

        <div class="row">
            <div class="col-xl-6 col-lg-7 px-4">
                <h4 class="text-white-border text-gold">Dirección</h4>
                <p class="text-white-border text-gold text-justify">Estamos ubicados en el pasaje el jardín 168 y Avenida 6 de diciembre. Edificio century plaza I piso 2 oficina 2. A 100 metros del megamaxi  </p>
                <h4 class="text-white-border text-gold">Horarios</h4>
                <p class="text-white-border text-gold text-justify">08:00 am 19:00 pm</p>
            </div>

            <div class="col-xl-3 col-lg-5 col-12 px-4">
                <h4 class="text-white-border text-gold">Contacto</h4>
                <ul>
                    <li>
                        <a target="_blank" about href="https://web.whatsapp.com/send?phone=593-0958845384&text=" class="whatsapp-web" style=""><i class="fab fa-whatsapp"></i> +593-958845384</a>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=+593-0958845384" class="whatsapp-app" style=""><i class="fab fa-whatsapp"></i> +593-958845384</a> <br>
                    </li>
                    <li>
                        <a style="display:inline-block;white-space:nowrap" href="{{url('contactanos')}}">
                             <i class="fas fa-envelope"></i> eskadental@gmail.com
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.instagram.com/eska_dental/">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-3 text-center px-4 lg-hide">
                {{-- <h4 class="text-white-border text-gold">Escribenos</h4>
                <div class="form-group">
                    <label class="text-white" for="">Tu correo o nro. de teléfono</label>
                    <input type="text" name="" value="" class="form-control form-control-sm" >
                </div>
                <div class="form-group">
                    <label class="text-white" for="">Mensaje</label>
                    <textarea class="form-control form-control-sm" name="name" rows="3" cols="30"></textarea>
                </div>
                <button type="button" name="button" class="btn btn-secondary float-right ml-2">Enviar</button>
                <button type="button" name="button" class="btn btn-white float-right">Cancelar</button> --}}
                {{-- <img id="logo-footer" class="mb-2" src="{!! asset('public\images\default\logo-fond-gris.png') !!}" alt=""> --}}
                <h4 class="text-white-border text-gold">Menú</h4>
                <ul>
                    <li>
                        <a href="{{url('/')}}">
                             Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/servicios')}}">
                            Servicios
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/nosotros')}}">
                            Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/blog')}}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/contactanos')}}">
                            Contáctanos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div style="background:var(--grey-b);border-top:1px black solid;" class="p-1 text-center">
    <a  class="btn-sap mb-1" style="" href="https://sapienciaweb.com/" target="_blank" style="">
        {{ trans("short.Desarrollado por") }}: <span class="" style="">
        <img style="width:14px" src="{{asset('public\images\default\sapiencia\logo-gold.png')}}" alt="" style="">
        <span class="sapText" style="">Sapiencia web</span></span>
    </a>
</div>
