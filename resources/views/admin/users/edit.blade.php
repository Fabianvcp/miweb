@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.icheck-bootstrap', true)
@section('content_header')
                <h1>Datos del <small>{{ $user->name}}</small></h1> <img class="profile-user-img img-fluid img-circle" @if($user->photo !== null) src="/perfil/{{ $user->photo}}" @else src="/perfil/user2-160x160.jpg" @endif   alt="{{ $user->name }}">
@stop

@section('content')
        <section class="content">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6  col-xs-12 col-sm-12 ">
                            <form action="{{ route('admin.users.update', $user) }}" method="POST" autocomplete="off" role="form" enctype="multipart/form-data"  onsubmit="return(validate());">
                                @csrf
                                @method('PUT')
                                <div class="card card-gray-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Datos Base</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputFile" class="  {{ $errors->has('photo') ? 'is-invalid' : '' }}">Foto Perfil</label>
                                            {{--  mensaje de error--}}
                                            <input type="file" name="photo"  id="photo" class="form-control-file">
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('photo')}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nombre</label>
                                            <input type="text" id="inputName" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $user->name) }}">
                                            {{--  mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('name')}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Email</label>
                                            <input type="text" id="inputClientCompany" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', $user->email) }}">
                                            {{--    mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('email')}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Ingrese la nueva contraseña">
                                            <span class="text-gray"> Dejar en Blanco para no cambiar contraseña</span>
                                            {{--    mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('password')}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Repite la contraseña</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Ingrese la nueva contraseña una vez más">
                                            {{--    mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('password_confirmation')}}
                                            </div>
                                        </div>
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label>Teléfono:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="phone" class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"  value="{{ old('phone', $user->phone) }}" name="phone" data-inputmask='"mask": "(9999) 99-9999"' data-mask>
                                                {{--    mensaje de error--}}
                                                <div class="invalid-tooltip">
                                                    {{ $errors->first('phone')}}
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="form-group">
                                            <label for="inputDescription">Frase personal</label>
                                            <textarea id="inputDescription" name="personal_phrase" class="form-control {{ $errors->has('personal_phrase') ? 'is-invalid' : '' }}" rows="4">{{ old('personal_phrase', $user->personal_phrase) }}</textarea>
                                            {{--    mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('personal_phrase')}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer bg-dark">
                                        <a href="{{ route('admin.users.show', $user)}}" class="btn btn-outline-dark btn-secondary btn-flat">Cancelar</a>
                                        <input type="submit" value="Actualizar usuario" class="btn btn-outline-dark btn-secondary btn-flat float-right text-white">
                                    </div>
                                </div>

                            </form>
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
                                            <form action="{{route('admin.users.roles.update', $user)}}" method="POST" autocomplete="off" role="form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                                 <div class="form-group clearfix text-center">
                                                    @foreach($roles as $role)
                                                         @role('Admin|super-admin')
                                                            <div class="icheck-midnightblue d-inline mr-5 checkbox-wrapper" data-toggle="popover" title="Permisos de este rol" data-content="{{ $role->permissions->pluck('name')->implode(', ') }}">
                                                             <input name="roles[]" type="checkbox" id="{{ $role->id }}" {{ $user->roles->contains($role->id) ?'checked' : ''}} value="{{ $role->name }}">
                                                             <label for="{{ $role->id }}">
                                                                 {{ $role->display_name }}
                                                             </label>
                                                         </div>
                                                         @else
                                                             <div class="icheck-midnightblue d-inline mr-5 checkbox-wrapper" data-toggle="popover" title="Permisos de este rol" data-content="{{ $role->permissions->pluck('name')->implode(', ') }}">
                                                                 <input name="roles[]" type="checkbox" id="{{ $role->id }}" {{ $user->roles->contains($role->id) ?'checked' : ''}} value="{{ $role->name }}" disabled>
                                                                 <label for="{{ $role->id }}">
                                                                     {{ $role->display_name }}
                                                                 </label>
                                                             </div>

                                                         @endrole
                                                    <!-- checkbox -->  @endforeach
                                                </div>
                                                <div class="form-group">
                                                    @role('Admin')
                                                    <button class="btn btn-flat btn-dark" type="submit">Actualizar roles</button>
                                                    @endrole
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                        <!-- Minimal red style -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="text-center text-black-150">Permisos</h3>
                                            <form action="{{route('admin.users.permissions.update', $user)}}" method="POST" autocomplete="off" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            @foreach( $permissions as $permission)
                                                                @role('Admin|super-admin')
                                                                <div class="col-3 mb-3">
                                                                    <!-- checkbox -->
                                                                    <div class="icheck-midnightblue d-inline">
                                                                        <input name="permissions[]" type="checkbox" id="permission-{{ $permission->id }}"  {{ collect(old('permissions'))->contains($permission->name) ? 'checked' : '' }} value="{{ $permission->name }}">
                                                                        <label for="permission-{{ $permission->id }}">
                                                                            {{ $permission->display_name }}
                                                                        </label>
                                                                    </div>
                                                                    <!-- checkbox -->
                                                                </div>
                                                                @else
                                                                    <div class="col-3 mb-3">
                                                                        <!-- checkbox -->
                                                                        <div class="icheck-midnightblue d-inline">
                                                                            <input name="permissions[]" type="checkbox" id="permission-{{ $permission->id }}"  {{ collect(old('permissions'))->contains($permission->name) ? 'checked' : '' }} value="{{ $permission->name }}" disabled>
                                                                            <label for="permission-{{ $permission->id }}">
                                                                                {{ $permission->display_name }}
                                                                            </label>
                                                                        </div>
                                                                        <!-- checkbox -->
                                                                    </div>
                                                                @endrole
                                                            @endforeach
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @role('Admin|super-admin')
                                                    <button class="btn btn-flat btn-dark" type="submit">Actualizar permisos</button>
                                                    @endrole
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
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
    <script>
        function validate(){
            var inp = document.getElementById('photo');
            if(inp.files.length === 0){
                toastr.error('Se requiere Imagen portada');
                inp.focus();
                return false;
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="/adminlte/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
