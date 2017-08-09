<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administration | {{ config('app.name', '') }} </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administration">
    <meta name="author" content="Cindy Leschaud | @DesignPond">
    <meta id="_token" name="_token" content="<?php echo csrf_token(); ?>">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/admin.css',env('SECURE_ASSET')) }}">

    <script src="//use.fontawesome.com/fd16a07224.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <base href="/">

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                'url'   => url('/'),
                'ajaxUrl' => url('admin/ajax/'),
                'adminUrl' => url('admin/')
        ]); ?>
    </script>
</head>
<body>

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">

    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
    <div class="navbar-header pull-left"><a class="navbar-brand" href="{{ url('/')  }}">Admin {{ config('app.name', '') }}</a></div>

    <ul class="nav navbar-nav pull-right toolbar">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li>
                            <form class="logout" action="{{ url('logout') }}" method="POST">{{ csrf_field() }}
                                <button class="btn btn-default btn-xs" type="submit"><i class="fa fa-power-off" aria-hidden="true"></i> &nbsp;Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>

<div id="page-container">

    <!-- Navigation  -->
    @include('backend.partials.navigation')

    <div id="page-content">
        <div id='wrap'>

            <!-- messages and errors -->
            @include('backend.partials.message')

            <div id="page-heading"><h2>Dashboard <small>{{ config('app.name', '') }}</small></h2></div>

            <div class="container" id="mainContainer">

                <!-- Contenu -->
                @yield('content')
                <!-- Fin contenu -->

            </div> <!-- container -->
        </div> <!--wrap -->
    </div> <!-- page-content -->

    <footer role="contentinfo">
        <div class="clearfix">
            <ul class="list-unstyled list-inline pull-left"><li>Admin &copy; <?php echo date('Y'); ?></li></ul>
            <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
        </div>
    </footer>

</div> <!-- page-container -->

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdn.datatables.net/r/bs/dt-1.10.9/datatables.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('backend/js/backend.js',env('SECURE_ASSET')) }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/redactor-script.js',env('SECURE_ASSET')) }}"></script>

</body>
</html>