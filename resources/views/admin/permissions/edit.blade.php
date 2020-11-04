@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.icheck-bootstrap', true)
@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.permissions.update',$permission) }}" method="POST" autocomplete="off" role="form" >

                <div class="row">
                    <div class="col-md-6 offset-3 col-xs-12 col-sm-12 ">
                        @csrf
                        @method('PUT')
                        <div class="card card-gray-dark">
                            <div class="card-header">
                                <h3 class="card-title">Actualizar permisos</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Identificador</label>
                                    <input type="text" id="inputName" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $permission->name) }}" readonly>
                                    {{--  mensaje de error--}}
                                </div>

                                <div class="form-group">
                                    <label for="display_name">Nombre</label>
                                    <input type="text" id="display_name" name="display_name" class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" value="{{ old('display_name', $permission->display_name) }}">
                                    {{--  mensaje de error--}}
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('display_name', 'nombre que se va a mostrar del rol debe ser obligatorio')}}
                                    </div>
                                </div>
                        </div>
                            <div class="card-footer bg-dark">
                                <input type="submit" value="Actualizar permiso" class="btn btn-outline-dark btn-secondary btn-flat float-right text-white">
                                <a href="{{ route('admin.permissions.index')}}" id="uploads" class="btn btn-outline-dark btn-secondary btn-flat">Cancelar</a>
                            </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- /.card -->
                </div>
            </form>
        </div>
    </section>
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

@stop
