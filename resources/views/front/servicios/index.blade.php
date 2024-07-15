@extends('front.layouts.index')
@section('links')
    <link rel="stylesheet" href="{!! asset('public\css\sections\porque.css') !!}">
    <style media="screen">
    .servicios img{
        width:180px;height:140px;object-fit:cover;border:solid 3px white;
        border-radius: 5px;
    }
    </style>
@endsection
@section('title')
    {{config('app.name')}} / Servicios
@endsection
@section('content')

    {{-- <div class="title_banner paralax" style="height:390px;background-image:url({!! asset('public/images/default/servicios.jpg') !!});background-position:top;">
        <div class="overlay" style="background:rgba(0, 0, 0, 0.10)"></div>
        <div class="title_cut_top">
            <h2  class="text-left mt-3 text-white-border float-right" style="margin-right:60px"><i class="fas fa-user-md"></i> Servicios</h2>
        </div>
        <div class="title_cut_bottom"></div>
    </div> --}}

    <div class="title_banner paralax" style="background-image:url({!! asset('public/images/default/slider/slider-3.jpg') !!});background-position:center center;">
        <div class="overlay" style="background: linear-gradient(to bottom,rgba(0, 0, 0, 0.10),60%,rgba(0, 0, 0, 0.60))"></div>
        <div class="title_cut_top">
            <h3  class="text-left mt-3 text-white-border float-right" style="margin-right:60px"><i class="fas fa-users"></i>  Servicios</h3>
        </div>
        <div class="title_cut_bottom"></div>
    </div>

    {{-- <br> --}}
    <br>
    @include('front.servicios.servicios')
    <br>
    {{-- <br> --}}

    @include('front.home.includes.porque_escogernos')


@endsection

@section('scripts')

@endsection
