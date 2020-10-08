@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.Select2', true)
@section('content_header')
    <h1>Creación <small>de Publicacion</small></h1>
@stop

@section('content')
    <form action="" role="form">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 col-lg-8 col-12">
                        <!-- general form elements -->
                        <div class="card card-dark text-white bg-gradient-dark">
                            <div class="card-header">
                                <h3 class="card-title">Titulo y Contenido de la publicacion</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="title">Título de la publicación</label>
                                                <input id="title" name="title"  type="text" class="form-control" placeholder="Titulo">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label for="body">Contenido de la publicación</label>
                                                <textarea id="body" name="body" class="form-control" rows="3" placeholder="Cuerpo de la publicación"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">

                                </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-md-4">
                        <!-- card -->
                        <div class="card card-dark text-white bg-gradient-dark">
                            <div class="card-header">
                                <h3 class="card-title">Extracto, fecha de publicación, categoria y etiquetas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                   <div class="col-sm-12">
                                            <!-- textarea -->
                                       <div class="form-group">
                                           <label for="extract">Extracto publicación</label>
                                           <textarea name="extract" id="extract" class="form-control" placeholder="Resumen de la publicación"></textarea>
                                       </div>
                                   </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </form>
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
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" ></script>

@stop
