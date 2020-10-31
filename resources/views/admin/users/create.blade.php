@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.icheck-bootstrap', true)
@section('content_header')
<h1>Crear nuevo usuario</h1>
@stop

@section('content')

@endsection


@section('footer')

    <!-- To the right -->
    <div class="float-right d-none d-sm-inline col-sm-hidden">
        Siempre avanzando hacia al futuro
    </div>
    <!-- Default to the left -->
    <strong class="text-center">Copyright &copy; 2017-2020 <a href="{{ route('inicio')}}">Fabian A. Gallardo</a>.</strong> All rights reserved.

@stop


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    @toastr_css
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="/adminlte/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
        $(function () {
            $('[data-mask]').inputmask()
        });
        $(document).ready(function() {
            $('.checkbox-wrapper').popover({
                trigger: 'click',
                template:'<div class="popover bg-dark text-white" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-dark text-white"></h3><div class="popover-body bg-dark text-white"></div></div>'
            });
        });
        $('.popover-title').css("background-color", "#000", "color", "#fff");
        $('.popover').css("background-color", "#000", "color","#000");

    </script>
@stop
