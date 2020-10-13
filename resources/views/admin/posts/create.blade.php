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
    <form action="{{ route('admin.posts.store') }}" role="form" method="POST">
        @csrf
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group ">
                                                <label for="title">Título de la publicación</label>
                                                <input id="title" name="title" value="{{ old('title') }}"  type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Titulo">
{{--                                                mensaje de error--}}
                                                <div class="invalid-tooltip">
                                                   {{ $errors->first('title')}}
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label for="body">Contenido de la publicación</label>
                                                <textarea id="body" name="body" class="{{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
                                                {{--                                                mensaje de error--}}
                                                <div class="invalid-tooltip">
                                                    {{ $errors->first('body')}}
                                                </div>

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
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 ">
                        <!-- card -->
                        <div class="card card-dark text-white bg-gradient-dark">
                            <div class="card-header">
                                <h3 class="card-title">Extracto, fecha de publicación, categoria y etiquetas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">

                                            <label for="datetimepicker2">Fecha de publicación</label>
                                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                <input name="published_at" type="text" class="form-control datetimepicker-input  {{ $errors->has('published_at') ? 'is-invalid' : '' }}" data-target="#datetimepicker2"/>
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
                                <div class="row">
                                   <div class="col-12">
                                            <!-- textarea -->
                                       <div class="form-group">
                                           <label for="excerpt">Extracto publicación</label>
                                           <textarea name="excerpt" id="excerpt" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" placeholder="Resumen de la publicación"></textarea>
                                           {{--                                                mensaje de error--}}
                                           <div class="invalid-tooltip">
                                               {{ $errors->first('excerpt')}}
                                           </div>

                                       </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label id="select2">Selecciona una categoria</label>
                                            <div class="select2-dark">
                                                <select name="category" class="select2 {{ $errors->has('tags[]') ? 'is-invalid' : '' }}" data-placeholder="Selecciona una categoria"  data-dropdown-css-class="select2-dark" style="width: 100%;"  >

                                                 @foreach( $categories as $category)

                                                    <option value="{{$category->id}}"  {{ old('category') == $category->id ?  'select' : '' }}>{{ $category->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('tags[]', 'el campo etiquetas es obligatorio')}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label  class="{{ $errors->has('tags[]') ? 'is-invalid' : '' }}">Etiquetas</label>
                                            <div class="select2-dark">
                                                <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"  data-dropdown-css-class="select2-dark" style="width: 100%;" >
                                                    @foreach( $tags as $tag)
                                                        <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : ''}} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            {{--                                                mensaje de error--}}
                                            <div class="invalid-tooltip">
                                                {{ $errors->first('tags[]', 'el campo etiquetas es obligatorio')}}
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
                                <button type="submit" class="btn btn-block btn-secondary btn-flat">Guardar publicación</button>
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
