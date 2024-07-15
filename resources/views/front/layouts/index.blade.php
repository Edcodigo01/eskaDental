<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('public/libraries/bootstrap/css/bootstrap.min.css')}}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/all.min.css')}}">

    {{-- general --}}
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('public/css/navbar.css')}}">
    {{-- toastr --}}
    {{-- <link rel="stylesheet" href="{{asset('public/libraries/toastr/toastr.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('public\libraries\animate.css')}}">


    <link rel="stylesheet" href="{{asset('public/css/sections/footer.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/front/layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/general.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('public\images\default\logo-icon.jpg')}}">
    @yield('links')
    <title> @yield('title') </title>
</head>
<body class="relative">
    <div id="bg-loader">
        <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div>
    @include('front/layouts/navbar')
    <div id="content">
    @if (!request()->route() == 'inicio')
        <div style="height:50px"></div>
    @endif
        {{-- @include('front\layouts\main_mobile') --}}
        @yield('content')
    </div>
    @include('front/layouts/footer')

    {{-- jquery --}}
    <script src="{{asset("public/libraries/jquery.js")}}"></script>
    {{-- toastr --}}
    {{-- <script src="{{asset("public/libraries/toastr/toastr.min.js")}}"></script> --}}
    {{-- <script src="{{asset("public/js/toastr_config.js")}}"></script> --}}
    {{-- bootstrap --}}
    <script src="{{asset('public/libraries/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- lenguaje --}}
    <script src="{{asset('public/js/langauage.js')}}"></script>
    {{-- jquery validate --}}
    <script src="{{asset("public/libraries/jquery.validate.min.js")}}"></script>
    <script src="{{asset("public/libraries/wow.js")}}"></script>


    {{-- constantes --}}
    {{-- <script src="{{asset("public/js/constant.js")}}"></script> --}}
    {{-- validate forms --}}
    {{-- <script src="{{asset("public/js/validate-forms.js")}}"></script> --}}
    {{-- modals --}}
    {{-- <script src="{{asset("public/js/modals.js")}}"></script> --}}
    {{-- animations --}}
    <script src="{{asset("public/js/animations.js")}}"></script>
    {{-- <script src="{{asset("public/js/main_mobile.js")}}"></script>XXXXX --}}


    {{-- filtros --}}
    {{-- <script src="{{asset('public/js/filters.js')}}"></script> --}}

    {{-- @include('modals/modalAjax') --}}
    {{-- @include('modals/modal_delete') --}}

    <script type="text/javascript">
    // ----------SLIDER-------------

    $(document).ready(function() {
        wow = new WOW(
            {
                animateClass: 'animated',
                offset:       100,
                callback:     function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
        );
        wow.init();
    });
    </script>
    @yield('scripts')

</body>
</html>
