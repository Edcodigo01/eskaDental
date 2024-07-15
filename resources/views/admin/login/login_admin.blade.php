@extends('admin.layouts.index')
@section('links')
<link rel="stylesheet" href="{!! asset('public\css\form-line.css') !!}">
@endsection
@section('title')
    Inicio de sesión administrador
@endsection
@section('content')
    <div class="container2">
            <div class="card" style="max-width:350px;margin:auto;margin-top:100px;">
                <form class="form-line formula validateN" action="{{url('admin/iniciar-sesion')}}" method="post">
                <div class="card-header">
                    <h3 class="text-center">Iniciar sesión</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> <i class="fas fa-envelope"></i> Correo:</label>
                        <input type="text" name="email" value="" class="form-control required" maxlength="60">
                    </div>
                    <div class="form-group">
                        <label for=""> <i class="fas fa-lock"></i> Contraseña:</label>
                        <input type="password" name="password" value="" class="form-control required" maxlength="30">
                    </div>

                    <div class="mt-3">
                        <button type="submit" name="button" class="btn btn-gold btn-lg btn-block">Iniciar</button>
                        <button type="button" name="button" class="btn btn-white btn-lg btn-block">Cancelar</button>
                    </div>
                </div>
            </form>
            </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("public/js/form-line.js")}}"></script>
    <script src="{{asset("public/js/forms.js")}}"></script>

@endsection
