@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Listados <small>actuales</small></h1>
@stop

@section('content')
    <div class="col-12">
        <button type="button" class="btn btn-secondary text-center mb-3" data-toggle="modal" data-target="#modal-secondary">
            Crear nueva publicación
        </button>

        <div class="card card text-white bg-dark ">
            <div class="card-header">
                <h3 class="card-title">Listados de publicaciones</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body  container-fluid" >
                <table id="posts-table"  class="table table-striped table-bordered dt-responsive nowrap text-center" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Extracto</th>
                        <th>Fecha Publicacion</th>
                         <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{{  optional($post->published_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y')}}</td>
                        <td>
                            <a href="{{ route('posts.show', $post)}}" target="_blank" class="btn btn-outline-light btn-secondary"><i class="far fa-eye"></i></a>
                            @can('Update posts')
                            <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            @endcan
                            @can('Delete posts')
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('¿Estas seguro de eliminar {{ $post->title }}?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach

                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                <h3 class="card-title"> un boton con el signo <i class="fa fa-plus fa-xs bg-blue border-light" style="border-radius: 44%;border: 2px solid;"></i> en la primera columna, indica que hay más contenido del que se ve, presione el boton podran ver el contenido oculto</h3>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-secondary">
        <form action="{{ route('admin.posts.store','#create') }}" role="form" method="POST">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h4 class="modal-title">Título de la publicación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group ">
                                <label for="title"></label>
                                <input id="title" name="title" value="{{ old('title') }}"  type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Titulo" autofocus required>
                                {{--                                                mensaje de error--}}
                                <div class="invalid-tooltip">
                                    {{ $errors->first('title')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light">Crear publicación</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
    </div>
    <!-- /.modal -->

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
    @toastr_css
@stop

@section('js')
    @toastr_js
    @toastr_render
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
                "responsive": true,
                "paging": true,
                "pagingType": "simple",
                "searching": false,
                "lengthChange": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                "responsive": {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal( {
                            header: function ( row ) {
                                var data = row.data();
                                //retorname detalles de la primera columna + la segunda
                               // return 'Details for '+data[0]+' '+data[1];
                                return 'Detalles de :'+'<br>'+data[1];
                            }
                        } ),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                            tableClass: 'table table-striped table-bordered dt-responsive nowrap  text-white bg-dark'
                        } )
                    }
                }
            });
        });
    </script>
    @unless( request()->is('admin/posts/*'))
        <script>

            if(window.location.hash === '#create'){
                $('#modal-secondary').modal('show');
            }
            $('#modal-secondary').on('hide.bs.modal', function (){
                window.location.hash ='#';
            });
            $('#modal-secondary').on('shown.bs.modal', function (){
                $('#title').focus();
                window.location.hash ='#create';
            });
        </script>
    @endunless
@stop
