@extends('errors.layout')

@section('error')
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 text-info">
                            <h1>Error 403 </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('inicio')}}">Inicio</a></li>
                                <li class="breadcrumb-item active">Error 403</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="error-page">
                    <h2 class="headline text-info"> 403</h2>

                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-info"></i> Oops! Permiso no encontrada.</h3>

                        <p>
                            No tienes permiso de ingreso a la página que buscaba.
                            Mientras tanto, puedes <a href="{{ route('inicio') }}">volver atras</a>
                        </p>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline col-sm-hidden">
                Siempre avanzando hacia al futuro
            </div>
            <!-- Default to the left -->
            <strong class="text-center">Copyright &copy; 2017-2020 <a href="{{ route('inicio')}}">Fabian A. Gallardo</a>.</strong> All rights reserved.

        </footer>
    </div>

@endsection
