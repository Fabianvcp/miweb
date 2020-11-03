@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.icheck-bootstrap', true)
@section('content_header')
<h1>Crear nuevo usuario</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off" role="form" enctype="multipart/form-data" name="myForm"  onsubmit="return(validate());">

                <div class="row">
                    <div class="col-md-6  col-xs-12 col-sm-12 ">
                        @csrf
                        <div class="card card-gray-dark">
                            <div class="card-header">
                                <h3 class="card-title">Datos Base</h3>
                            </div>
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="uploadImage" class="{{ $errors->has('photo') ? 'is-invalid' : '' }}">Foto de perfil</label>
                                    <input id="uploadImage" name="photo" type="file" class="form-control-file" style="display:-webkit-inline-box!important" >
                                    {{--                                                mensaje de error--}}
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('photo','el Campo foto esta vacio')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Nombre</label>
                                    <input type="text" id="inputName" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                                    {{--  mensaje de error--}}
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('name')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Email</label>
                                    <input type="text" id="inputClientCompany" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                                    {{--    mensaje de error--}}
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('email')}}
                                    </div>
                                </div>
                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Teléfono:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="phone" class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"  value="{{ old('phone') }}" name="phone" data-inputmask='"mask": "(9999) 99-9999"' data-mask>
                                        {{--    mensaje de error--}}
                                        <div class="invalid-tooltip">
                                            {{ $errors->first('phone')}}
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        La contraseña será generada y enviada al nuevo usuario vía email
                                    </small>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="inputDescription">Frase personal</label>
                                    <textarea id="inputDescription" name="personal_phrase" class="form-control {{ $errors->has('personal_phrase') ? 'is-invalid' : '' }}" rows="4">{{ old('personal_phrase') }}</textarea>
                                    {{--    mensaje de error--}}
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('personal_phrase','frase descriptiva')}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-dark">
                                <a href="{{ route('admin.users.index')}}" id="uploads" class="btn btn-outline-dark btn-secondary btn-flat">Cancelar</a>
                            </div>
                        </div>

                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card card-gray-dark">
                            <div class="card-header">
                                <h3 class="card-title">Roles y permisos</h3>

                            </div>
                            <div class="card-body">
                                <!-- Minimal style -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="text-center text-black-150">Roles</h3>
                                        @csrf
                                        @include('admin.checkboxes.checkboxes')
                                    </div>
                                </div>
                                <!-- Minimal red style -->
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-center text-black-150">Permisos</h3>
                                        @csrf
                                        @include('admin.permissions.checkboxes', ['model' => $user])

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-dark">
                                <input type="submit" value="Crear usuario" class="btn btn-outline-dark btn-secondary btn-flat float-right text-white">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
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
    <script>
        function validate(){
            var inp = document.getElementById('uploadImage');
            if(inp.files.length === 0){
                toastr.error('Se requiere Imagen portada');
                inp.focus();
                return false;
            }
        }
    </script>
    <script>
        $(function () {
            $('[data-mask]').inputmask()
        });
        $(document).ready(function() {
            $('.checkbox-wrapper').popover({
                trigger: 'focus',
                template:'<div class="popover bg-dark text-white" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-dark text-white"></h3><div class="popover-body bg-dark text-white"></div></div>'
            });
        });
        $('.popover-title').css("background-color", "#000", "color", "#fff");
        $('.popover').css("background-color", "#000", "color","#000");

    </script>
@stop
