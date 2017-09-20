<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Droit pour le Praticien, Jurisprudence du Tribunal fédéral, classée par thèmes et consultable par mots-clés" />
    <meta name="keywords" content="Jurisprudence, Tribunal fédéral, Faculté de droit Neuchâtel, Droit pour le Praticien, Arrêts du TF" />
    <meta name="author" content="@DesignPond" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Droit pour le Praticien') }}</title>

    <!-- Favicon and Touch Icons -->
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link href="{{ asset('css/animate.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <link href="{{ asset('css/css-plugin-collections.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-boxed.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- CSS | Main style file -->
    <link href="{{ asset('css/style-main.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- CSS | Theme Color -->
    <link href="{{ asset('css/theme-skin-blue.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('css/responsive.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <link href="{{ asset('css/main.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    <!-- Styles
    <link href="{{ asset('css/app.css',env('SECURE_ASSET')) }}" rel="stylesheet">
    -->

    <!-- Revolution Slider 5.x CSS settings -->
    <script type="text/javascript" src="{{ asset('js/settings.js',env('SECURE_ASSET')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/layers.js',env('SECURE_ASSET')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/navigation.js',env('SECURE_ASSET')) }}"></script>

    <!-- external javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//use.fontawesome.com/fd16a07224.js"></script>

    <!-- JS | jquery plugin collection for this theme -->
    <script type="text/javascript" src="{{ asset('js/jquery-plugin-collection.js',env('SECURE_ASSET')) }}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/jquery.themepunch.tools.min.js',env('SECURE_ASSET')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.themepunch.revolution.min.js',env('SECURE_ASSET')) }}"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="has-side-panel side-panel-right fullwidth-page side-push-panel main-site">

<div id="wrapper" class="clearfix">

    @include('partials.header')

    <!-- Start main-content -->
    <div class="main-content">

        <!-- Contenu -->
        @yield('content')
        <!-- Fin contenu -->

    </div>
    <!-- end main-content -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<footer id="footer" class="footer pb-0 pt-0 bg-deep">
    <div class="container-fluid bg-black-222 p-20">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="font-11 m-0">Copyright &copy; {{ date('Y') }} Droit Pour le praticien.</p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script type="text/javascript" src="{{ asset('js/custom.js',env('SECURE_ASSET')) }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js',env('SECURE_ASSET')) }}"></script>

</body>
</html>