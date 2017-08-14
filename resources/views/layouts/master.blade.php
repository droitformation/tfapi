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

<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">

<div id="wrapper" class="clearfix">

    @include('partials.header')

    <!-- Start main-content -->
    <div class="main-content">

        <!-- Contenu -->
        @yield('content')
        <!-- Fin contenu -->

    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <footer id="footer" class="footer pb-0 bg-deep">
        <div class="container pb-20">
            <div class="row multi-row-clearfix">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark"> <img alt="" src="images/logo-square.png">
                        <p class="font-12 mt-20 mb-10">MrLaw is a library of corporate and business templates with predefined web elements which helps you to build your own site. Lorem ipsum dolor sit amet, consectetur adipiscingyou to build elit.</p>
                        <a class="btn btn-default btn-transparent btn-xs btn-flat mt-15" href="#">Read more</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Archives</h5>
                        <ul class="list-divider list-border">
                            <li><a href="#"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Vehicle Accidents</a></li>
                            <li><a href="#"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Family Law</a></li>
                            <li><a href="#"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Personal Injury</a></li>
                            <li><a href="#"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Case Investigation</a></li>
                            <li><a href="#"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Personal Injury</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Latest News</h5>
                        <div class="latest-posts">
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                                    <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                </div>
                            </article>
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                                    <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                </div>
                            </article>
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                                    <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Quick Contact</h5>
                        <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="includes/quickcontact.php" method="post">
                            <div class="form-group">
                                <input id="form_email" name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <textarea id="form_message" name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">Send Message</button>
                            </div>
                        </form>

                        <!-- Quick Contact Form Validation-->
                        <script type="text/javascript">
                            $("#footer_quick_contact_form").validate({
                                submitHandler: function(form) {
                                    var form_btn = $(form).find('button[type="submit"]');
                                    var form_result_div = '#form-result';
                                    $(form_result_div).remove();
                                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                    var form_btn_old_msg = form_btn.html();
                                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                    $(form).ajaxSubmit({
                                        dataType:  'json',
                                        success: function(data) {
                                            if( data.status == 'true' ) {
                                                $(form).find('.form-control').val('');
                                            }
                                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                                            $(form_result_div).html(data.message).fadeIn('slow');
                                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                        }
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="horizontal-contact-widget dark mt-30 pt-30 text-center">
                        <div class="col-sm-12 col-sm-4">
                            <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10 text-white"></i>
                                <h5 class="text-theme-colored">Call Us</h5>
                                <p class="text-white">Phone: <a href="#" class="text-white">+262 695 2601</a></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-4 mt-sm-50">
                            <div class="each-widget"> <i class="pe-7s-map font-36 mb-10 text-white"></i>
                                <h5 class="text-theme-colored">Address</h5>
                                <p class="text-white">121 King Street, Australia</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-4 mt-sm-50">
                            <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10 text-white"></i>
                                <h5 class="text-theme-colored">Email</h5>
                                <p><a href="#" class="text-white">you@yourdomain.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline social-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-50 mb-30">
                        <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a> </li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-black-222 p-20">
            <div class="row text-center">
                <div class="col-md-12">
                    <p class="font-11 m-0">Copyright &copy;2015 ThemeMascot. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script type="text/javascript" src="{{ asset('js/custom.js',env('SECURE_ASSET')) }}"></script>

</body>
</html>