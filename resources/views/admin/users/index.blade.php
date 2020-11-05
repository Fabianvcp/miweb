@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Listados <small>actuales</small></h1>
@stop

@section('content')
    <div class="col-12">
        <a href="{{ route('admin.users.create') }}" class="btn btn-secondary text-center mb-3" >
            Crear nuevo usuario
        </a>

        <div class="card card text-white bg-dark ">
            <div class="card-header">
                <h3 class="card-title">Listados de usuarios</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body  container-fluid" >
                <table id="users-table" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width:100%;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->implode(", ") }}</td>
                            <td>{{  optional($user->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y')}}</td>
                            <td>
                                @can('View users')
                                    <a href="{{ route('admin.users.show', $user)}}" class="btn btn-outline-light btn-secondary"><i class="far fa-eye"></i></a>
                                @endcan
                                @can('Update users')
                                    <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                @endcan
                                @can('Delete users')
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('¿Estas seguro de eliminar {{ $user->name }}?')"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--                <tfoot>--}}
                    {{--                    <tr>--}}
                    {{--                        <th>Rendering engine</th>--}}
                    {{--                        <th>Browser</th>--}}
                    {{--                    </tr>--}}
                    {{--                </tfoot>--}}
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                <h3 class="card-title"> un boton con el signo <i class="fa fa-plus fa-xs bg-blue border-light" style="border-radius: 44%;border: 2px solid;"></i> en la primera columna, indica que hay más contenido del que se ve, presione el boton podran ver el contenido oculto</h3>
            </div>
        </div>
    </div>

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
            $('#users-table').DataTable({
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
@stop
