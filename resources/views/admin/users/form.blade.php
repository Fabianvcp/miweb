<section class="content">
    <div class="container-fluid">
        <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off" role="form" enctype="multipart/form-data" name="myForm">

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
                                    @include('admin.permissions.checkboxes')

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
