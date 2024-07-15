<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('public/libraries/bootstrap/css/bootstrap.min.css')}}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/all.min.css')}}">

    {{-- general --}}
    <link rel="stylesheet" href="{{asset('public/css/general.css')}}">
    {{-- navbar --}}
    <link rel="stylesheet" href="{{asset('public/css/navbar.css')}}">
    {{-- toastr --}}
    <link rel="stylesheet" href="{{asset('public/libraries/toastr/toastr.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('public\css\sections\admin.css')}}">
    <link rel="shortcut icon" href="{{asset('public\images\default\logo-icon.jpg')}}">
    @yield('links')
    <title> @yield('title') </title>
</head>
<body>

    @include('admin.layouts.navbar_admin')
    <div style="height:50px"></div>
    <div id="bg-loader">
        <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div>


    @yield('content')
    {{-- jquery --}}
    <script src="{{asset("public/libraries/jquery.js")}}"></script>
    {{-- toastr --}}
    <script src="{{asset("public/libraries/toastr/toastr.min.js")}}"></script>
    <script src="{{asset("public/js/toastr_config.js")}}"></script>


    {{-- bootstrap --}}
    <script src="{{asset('public/libraries/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- lenguaje --}}
    <script src="{{asset('public\js\langauage.js')}}"></script>
    {{-- jquery validate --}}
    <script src="{{asset("public/libraries/jquery.validate.min.js")}}"></script>
    {{-- constantes --}}
    <script src="{{asset("public/js/constant.js")}}"></script>
    {{-- validate forms --}}
    <script src="{{asset("public/js/validate-forms.js")}}"></script>
    {{-- modals --}}
    <script src="{{asset("public/js/modals.js")}}"></script>
    {{-- animations --}}
    <script src="{{asset("public\js\animations.js")}}"></script>
    {{-- filtros --}}
    <script src="{{asset('public\js\filters.js')}}"></script>
    <script src="{{asset('public\js\change_pass.js')}}"></script>



    @include('modals.modalAjax')
    @include('modals.modal_alert')
    @if (Auth::check())
        @include('admin.user.modal_user')
    @endif
    @yield('scripts')

</body>
</html>
