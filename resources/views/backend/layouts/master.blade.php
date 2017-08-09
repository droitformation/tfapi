<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administration">
    <meta name="author" content="Cindy Leschaud | @DesignPond">
    <meta id="_token" name="_token" content="<?php echo csrf_token(); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo secure_asset('backend/css/admin.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo secure_asset('backend/js/vendor/redactor/redactor.css'); ?>">

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
    <div class="navbar-header pull-left"><a class="navbar-brand" href="{{ url('/')  }}">Admin</a></div>

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

            <div id="page-heading"><h2>Administration</h2></div>

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

<script src="//code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/r/bs/dt-1.10.9/datatables.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo secure_asset('backend/js/vendor/bootstrap/bootstrap-editable.js');?>"></script>
<script src="//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript" src="<?php echo secure_asset('backend/js/datatables.js');?>"></script>
<script type="text/javascript" src="<?php echo secure_asset('backend/js/layouts/enquire.js');?>"></script>
<script type="text/javascript" src="<?php echo secure_asset('backend/js/vendor/jquery/jquery.cookie.js');?>"></script>
<script type="text/javascript" src="<?php echo secure_asset('backend/js/vendor/jquery/jquery.nicescroll.min.js');?>"></script>


<!-- Filter plugin -->
<script type="text/javascript" src="<?php echo secure_asset('common/js/chosen.jquery.js');?>"></script>
<!-- Layout and fixes plugins -->


<!-- Scripts -->

<script type="text/javascript" src="<?php echo secure_asset('backend/js/layouts/application.js');?>"></script>
<script type='text/javascript' src="<?php echo secure_asset('backend/plugins/form-datepicker/js/bootstrap-datepicker.js');?>"></script>

<!-- Redactor -->
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/config.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/redactor.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/fr.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/fontcolor.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/fontfamily.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/imagemanager.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('backend/js/vendor/redactor/filemanager.js') }}"></script>

<!-- Form plugins -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="<?php echo secure_asset('backend/js/messages_fr.js');?>"></script>

<script type="text/javascript" src="<?php echo secure_asset('backend/js/admin.js');?>"></script>
<script type="text/javascript" src="{{ secure_asset('js/app.js') }}"></script>


</body>
</html>