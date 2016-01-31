<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('tittle', 'Default') | Panel de administración</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('plugins/bootstrap/css/sb-admin.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('plugins/bootstrap/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            @include('admin.template.partials.nav')
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Blank Page
                                <small>Subheading</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Inicio
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('plugins/bootstrap/js/jquery.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    </body>

    </html>