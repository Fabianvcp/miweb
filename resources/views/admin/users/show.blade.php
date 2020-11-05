@extends('adminlte::page')

@section('title', 'Publicaciones')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Perfil de <small>usuario</small></h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-dark card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
{{--                            remplazar con la imagen del usuario que se quiere ver--}}
                            <img class="profile-user-img img-fluid img-circle"    @if($user->photo !== null) src="/perfil/{{ $user->photo}}" @else src="/perfil/user2-160x160.jpg" @endif   alt="{{ $user->name }}">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{$user->getRoleNames()->implode(", ")}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Registrado el</b> <a class="float-right">{{optional($user->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y')}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Cantidad de publicaciones</b> <a class="float-right">{{ $user->posts->count() }}</a>
                            </li>
                        </ul>

                        <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-outline-dark btn-block"><b>Editar</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                @if($user->personal_phrase !== null || $user->phone !== null || $user->personal_phrase !== null )
                <!-- About Me Box -->
                <div class="card card-gray-dark">
                    <div class="card-header">
                        <h3 class="card-title">información del usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @endif()
            </div>
            <!-- /.col -->
            <div class="col-md-9">

                <div class="card card-dark card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#activity" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Permisos extras</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="active tab-pane" id="activity">
                                @forelse( $user->posts as $post)
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        @if($post->portada)
                                            <img class="img-circle img-bordered-sm" src="/portadas/{{ $post->portada }}" alt="user image">
                                        @endif
                                        <span class="username">
                                          <a  target="_blank"  href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
                                          <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline">
                                              @csrf
                                              @method('DELETE')
                                            <button  class="float-right btn btn-flat text-danger btn-tool" onclick="return confirm('¿Estas seguro de eliminar {{ $post->title }}?')" ><i class="far fa-trash-alt"></i></button>
                                          </form>

                                        </span>
                                        <span class="description">{{  optional($post->published_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y')}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        {{ $post->excerpt }}
                                    </p>


                                </div>
                                <!-- /.post -->
                                 @empty
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <span class="username">
                                                  <h1 class="text-dark">No tiene publicaciónes aún</h1>
                                                </span>
                                            </div>
                                            <!-- /.user-block -->

                                        </div>
                                @endforelse
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                    @foreach($user->roles as $role)
                                        <h2 class="text-center text-black-100">{{ $role->name }}</h2>
                                         @if($role->permissions->count())
                                           <p class="text-dark">Premisos : <small>{!!  $role->permissions->pluck('name')->implode("|") !!}</small></p>
                                         @endif
                                    @endforeach
                                <!-- The timeline -->
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <h2 class="text-center">Permisos extras</h2>
                                @forelse($user->permissions as $permission)
                                    <p class="text-dark">Premisos : <small>{{ $permission->name  }}</small></p>
                                @empty
                                    <small class="text-muted">No tiene permisos adicionales</small>
                                @endforelse
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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
