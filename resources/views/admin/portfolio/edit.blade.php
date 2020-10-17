@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.Select2', true)
@section('plugins.Ckeditor', true)
@section('plugins.Moment', true)
@section('plugins.Tempus', true)
@section('content_header')
    <h1>Creación <small>de Publicacion</small></h1>
@stop

@section('content')

    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        @method( 'PUT')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 col-lg-8  col-xs-12 col-sm-12 ">
                        <!-- general form elements -->
                        <div class="card card-dark bg-gradient-dark">
                            <div class="card-header">
                                <h3 class="card-title">Titulo y Contenido de la publicacion</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <!-- portada-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group ">
                                            <label for="title">Portada de la publicación</label>
                                            <input  name="image" value="{{ old('image', $portfolio->image) }}"  type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('image')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ portada-->
                                <!-- titulo-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group ">
                                            <label for="title">Título de la publicación</label>
                                            <input id="title" name="title" value="{{ old('title', $portfolio->title) }}"  type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Titulo">
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('title')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /titulo-->
                                <!-- cuerpo-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label for="body">Contenido de la publicación</label>
                                            <textarea id="body" name="body" class="{{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body',$portfolio->body ? $portfolio->body : null) }}</textarea>
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('body')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cuerpo-->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">

                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 ">
                        <!-- card -->
                        <div class="card card-dark text-white bg-gradient-dark">
                            <div class="card-header">
                                <h3 class="card-title">fecha de publicación, categoria e imagenes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">

                                            <label for="datetimepicker2">Fecha de publicación</label>
                                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                <input name="published_at" value="{{ old('published_at',$portfolio->published_at ? $portfolio->published_at : null) }}" type="text" class="form-control datetimepicker-input  {{ $errors->has('published_at') ? 'is-invalid' : '' }}" data-target="#datetimepicker2"/>
                                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('published_at')}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- titulo-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group ">
                                            <label for="title">Link del portfolio externo</label>
                                            <input id="title" name="title" value="{{ old('link', $portfolio->link) }}"  type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" placeholder="Link">

                                        </div>
                                    </div>
                                </div>
                                <!-- /titulo-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label id="select2">Selecciona una categoria</label>
                                            <div class="select2-dark">
                                                <select name="category_id" class="select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" data-placeholder="Selecciona una categoria"  data-dropdown-css-class="select2-dark" style="width: 100%;"  >
                                                    @foreach( $categories as $category)
                                                        <option value="{{$category->id}}"  {{ old('category_id', $portfolio->category_id) == $category->id ?  'select' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('category_id', 'el campo etiquetas es obligatorio')}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label id="select2">Cargar imagenes</label>
                                            <div class="dropzone">
                                                <div class="dz-message" data-dz-message><span style="color:#0b0b0b">Arrastra las fotos aqui para subirlas</span></div>

                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="submit-all" class="btn btn-block btn-secondary btn-flat">Guardar publicación</button>
                            </div>
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
    <link rel="stylesheet" href="/adminlte/dropzone/dist/min/dropzone.min.css">
    <style>
        .select2-container--default .select2-dropdown .select2-search__field, .select2-container--default .select2-search--inline .select2-search__field {
            border: 0px solid #ced4da;
        }
        .select2-container--default .select2-dark .select2-dropdown .select2-search__field:focus, .select2-container--default .select2-dark .select2-search--inline .select2-search__field:focus, .select2-container--default .select2-dark.select2-dropdown .select2-search__field:focus, .select2-dark .select2-container--default .select2-dropdown .select2-search__field:focus, .select2-dark .select2-container--default .select2-search--inline .select2-search__field:focus, .select2-dark .select2-container--default.select2-dropdown .select2-search__field:focus {
            border: 0px solid #6d7a86;
        }
    </style>
    @toastr_css
@stop

@section('js')
    @toastr_js
    @toastr_render
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/adminlte/moment/locale/es.js"></script>
    <script src="/adminlte/dropzone/dist/min/dropzone.min.js"></script>

    <script>
        var myDropzone =  new Dropzone('.dropzone', {
            /*donde se envia los datos*/
            url:'/admin/portfolio/{{ $portfolio->url}}/fotos',
            /*que tipo de archivos acepta*/
            acceptedFiles: 'image/*',
            /*Cambiar el nombre del parametro*/
            paramName: 'foto',
            /*Maximo de peso del archivo*/
            maxFilesize: 5,
            /*Cantidad de archivos que se pueden subir*/
            maxFiles:10,
            /*Remover link*/
            addRemoveLinks: true,
            dictRemoveFile: "<button class='btn btn-danger btn-sm fas fa-window-close font-weight-bold'></button>",
            /*token post del formulario*/
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token()}}'
            },
            uploadMultiple: true,
            parallelUploads: 10,
            autoProcessQueue: false,
            init: function() {
                var submitButton = document.querySelector("#submit-all"),
                    myDropzone = this;

                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue();
                });

                // Execute when file uploads are complete
                this.on("complete", function() {
                    // If all files have been uploaded
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0 ) {
                        var _this = this;
                        // Remove all files
                        _this.removeAllFiles();
                    }
                });

            }
        });
        Dropzone.autoDiscover = false;
        Dropzone.prototype.defaultOptions.dictFallbackMessage = "Su navegador no admite la carga de archivos mediante la función de arrastrar y soltar.";
        Dropzone.prototype.defaultOptions.dictFallbackText = "Utilice el formulario de respaldo a continuación para cargar sus archivos como en los viejos tiempos.";
        Dropzone.prototype.defaultOptions.dictFileTooBig = "El archivo es demasiado grande . Tamaño máximo de archivo: 2MiB.";
        Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puedes subir archivos de este tipo.";
        Dropzone.prototype.defaultOptions.dictResponseError = "El servidor respondió con error.";
        Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar carga";
        Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Está seguro de que desea cancelar esta carga?";
        Dropzone.prototype.defaultOptions.dictRemoveFile = "Remover archivo";
        Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No puedes subir más archivos.";

        myDropzone.on('error', function(file, res){
            var msg = res.errors.photo[0];
            $('.dz-error-message:last > span').text(msg);
        });

    </script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker2').datetimepicker({
                defaultDate: new Date(),
                locale: 'es',
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false,
                maxDate: new Date(),
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $( '.select2bs4' ).select2({
                language: "es"
            });
            $('.select2').select2({
                language: "es"
            });


        });
    </script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'body', {
            language: 'es',
            uiColor: '#484E54',
            width: '100%',
            height: 300,
            baseFloatZIndex: 10005

        });

    </script>

@stop
