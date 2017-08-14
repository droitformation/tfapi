@extends('layouts.master')
@section('content')

<!-- Section: home -->
<section id="home">
    <div class="container-fluid p-0">
        <!-- header_wrapper -->
        <div class="header_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('images/book.png') }}" alt="Livre Droit pour le praticien">
                    </div>
                    <div class="col-md-8">
                        <h1>Obtenir un accès</h1>
                        <h2>Le droit pour le praticien</h2>

                        <p>Avec l’achat, pour seulement CHF 79, de la dernière édition de l’ouvrage Le droit pour le praticien, vous pourrez accéder, durant l’année en cours, au site grâce au code indiqué sur le livre.
                            Vous y trouverez la jurisprudence du Tribunal fédéral, classée par thèmes et consultable par mots-clés.</p>
                        <div class="btn-group">
                            <a class="btn btn-danger btn-sm" href="{{ url('/') }}">Acheter</a>
                            <a class="btn btn-default btn-sm" href="{{ url('/') }}">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end .header_wrapper -->
    </div>
</section>

<!-- Section: About -->
<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-6 maxwidth500">
                <div class="box-hover-effect effect1 mb-md-30">
                    <div class="icon-box left media bg-deep mb-0 mt-0 p-20">
                        <a href="#" class="media-left pull-left mr-15 mt-5"> <i class="fa fa-gavel text-theme-colored font-30"></i></a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a class="text-hover-theme-colored text-uppercase font-weight-600" href="#">Derniers arrêts rendus</a>
                            </h5>
                            <p class="lineheight-20">
                                Tribunal fédéral - Jurisprudence
                                <a href="{{ url('') }}" class="btn btn-sm btn-info pull-right link-more">Voir</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 maxwidth500">
                <div class="box-hover-effect effect1 mb-md-30">
                    <div class="icon-box left media bg-deep mb-0 mt-0 p-20">
                        <a href="#" class="media-left pull-left mr-15 mt-5"> <i class="fa fa-gavel text-theme-colored font-30"></i></a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a class="text-hover-theme-colored text-uppercase font-weight-600" href="#">Derniers arrêts destinés à la publication</a>
                            </h5>
                            <p class="lineheight-20">Tribunal fédéral - Jurisprudence
                                <a href="{{ url('') }}" class="btn btn-sm btn-info pull-right link-more">Voir</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Divider -->
<section>
    <div class="container pt-0">
        <div class="row">
            <div class="col-md-7">
                <h3 class="mt-0">About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis voluptatibus neque, assumenda maxime. Eaque libero unde corrupti deleniti maxime ratione doloremque suscipit perferendis aperiam labore debitis atque odit neque, possimus, aspernatur dicta nobis recusandae numquam provident porro, quam suscipit quibusdam. Commodi eum, optio quo.</p>
                <p class="mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla odio molestiae laboriosam, inciduntvolupta tibus fugit, adipisci tenetur necessitatibus officia nesciunt eveniet, culpa consequatur reiciendis quaerat.</p>
                <h3>Our Skills</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et optio cum velit autem dolor reprehenderit saepe assumenda eos, qui. Voluptatem eveniet, illum dolor nemo? Velit maiores quaerat a non dolor praesentium, corporis optio ullam, voluptatem fuga consequatur sed cupiditate quam!</p>
                <br>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="icon-box border-1px bg-hover-theme-colored text-center mb-0 mb-sm-20 p-15"> <i class="pe-7s-users text-theme-colored"></i>
                            <h6 class="font-weight-600 font-14">Deal Support</h6>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="icon-box border-1px bg-hover-theme-colored text-center mb-0 mb-sm-20 p-15"> <i class="pe-7s-headphones text-theme-colored"></i>
                            <h6 class="font-weight-600 font-14">Online Consulting</h6>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="icon-box border-1px bg-hover-theme-colored text-center mb-0 mb-sm-20 p-15"> <i class="pe-7s-copy-file text-theme-colored"></i>
                            <h6 class="font-weight-600 font-14">Document preparation</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/450x250" alt="">
                </div>

    <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
    <form name="login-form" class="clearfix">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="form_username_email">Username/Email</label>
                <input id="form_username_email" name="form_username_email" class="form-control" type="text">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="form_password">Password</label>
                <input id="form_password" name="form_password" class="form-control" type="text">
            </div>
        </div>
        <div class="checkbox pull-left mt-15">
            <label for="form_checkbox">
                <input id="form_checkbox" name="form_checkbox" type="checkbox">
                Remember me </label>
        </div>
        <div class="form-group pull-right mt-10">
            <button type="submit" class="btn btn-dark btn-sm">Login</button>
        </div>
        <div class="clear text-center pt-10">
            <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
        </div>
        <div class="clear text-center pt-10">
            <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">Login with facebook</a>
            <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee">Login with twitter</a>
        </div>
    </form>

                <h4 class="mt-20">Why Choose Us?</h4>
                <div class="panel-group accordion style2 mb-0 mt-20" id="accordion2">
                    <div class="panel">
                        <div class="panel-title"> <a href="#accordion21" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Best Case Strategy </a> </div>
                        <div class="panel-collapse collapse" id="accordion21">
                            <div class="panel-content">
                                <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"> <a href="#accordion22" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Review your Case Documents </a> </div>
                        <div class="panel-collapse collapse" id="accordion22">
                            <div class="panel-content">
                                <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"> <a href="#accordion23" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Fight for Justice </a> </div>
                        <div class="panel-collapse collapse" id="accordion23">
                            <div class="panel-content">
                                <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Practices Area -->
<section id="practice" class="bg-lighter">
    <div class="container pb-30">
        <div class="section-title title-border icon-bg">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mt-0 mb-0 text-uppercase">Rehearses</h5>
                    <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Practices Area</h2>
                    <p>Maecenas nec efficitur felis. Nulla egestas lacus sit
                        amet lectus tincidunt condimentum.</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Family law</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Family law</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Accident Injuries</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Accident Injuries</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Business Taxation</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Business Taxation</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Transporation Law</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Transporation Law</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Construction Accidents</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Construction Accidents</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Trade & Finance law</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Trade & Finance law</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Education Law</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Education Law</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-30">
                    <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">
                        <div class="thumb"> <img class="img-responsive img-fullwidth" src="http://placehold.it/360x205" alt="featured project"  width="476">
                            <div class="overlay white">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="overlay-details text-center">
                                            <h4 class="text-theme-colored mt-0">Civil Litigation</h4>
                                            <p class="pl-20 pr-20">Our experienced lawyers offer great trial preparation.</p>
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="#">Read more</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h5>Civil Litigation</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Gallery -->
<section id="galley">
    <div class="container pb-0">
        <div class="section-title title-border icon-bg">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mt-0 mb-0 text-uppercase">Rehearses</h5>
                    <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Galley</h2>
                    <p>Maecenas nec efficitur felis. Nulla egestas lacus sit
                        amet lectus tincidunt condimentum.</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">

                    <!-- Portfolio Gallery Grid -->
                    <div id="grid" class="portfolio-gallery grid-3 clearfix">
                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item photography">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a data-lightbox="image" href="http://placehold.it/450x250"><i class="fa fa-plus"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item branding">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item design">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a href="#"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item photography">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fa fa-youtube-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item branding">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a class="popup-vimeo" href="https://vimeo.com/45830194"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item design">
                            <div class="thumb">
                                <div class="flexslider-wrapper">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 1"><img src="http://placehold.it/450x250" alt=""></a></li>
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 2"><img src="http://placehold.it/450x250" alt=""></a></li>
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 3"><img src="http://placehold.it/450x250" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a href="#"><i class="fa fa-picture-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item photography">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a data-lightbox="image" href="http://placehold.it/450x250"><i class="fa fa-plus"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item design">
                            <div class="thumb">
                                <div class="flexslider-wrapper" data-direction="vertical">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 1"><img src="http://placehold.it/450x250" alt=""></a></li>
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 2"><img src="http://placehold.it/450x250" alt=""></a></li>
                                            <li><a href="http://placehold.it/450x250" title="Portfolio Gallery - Photo 3"><img src="http://placehold.it/450x250" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a href="#"><i class="fa fa-picture-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                        <!-- Portfolio Item Start -->
                        <div class="portfolio-item photography design">
                            <div class="thumb">
                                <img class="img-fullwidth" src="http://placehold.it/450x250" alt="project">
                                <div class="overlay-shade"></div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a data-lightbox="image" href="http://placehold.it/450x250"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a class="hover-link" data-lightbox="image" href="http://placehold.it/450x250">View more</a>
                            </div>
                        </div>
                        <!-- Portfolio Item End -->

                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Section: Attorneys -->
<section id="attorneys">
    <div class="container pb-30">
        <div class="section-title title-border title-right icon-bg">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mt-0 mb-0 text-uppercase">Our</h5>
                    <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Expert Attorneys</h2>
                    <p>Maecenas nec efficitur felis. Nulla egestas lacus sit
                        amet lectus tincidunt condimentum.</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="attorney box-hover-effect effect1 bg-lighter mb-30">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20">
                                <div class="thumb"><img class="img-fullwidth" src="http://placehold.it/262x340" alt=""></div>
                            </div>
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20 pt-20">
                                <div class="content">
                                    <h4 class="author text-theme-colored mb-0">Alex Jacobson</h4>
                                    <h6 class="title text-dark mt-0 mb-10">Attorney</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque.</p>
                                    <ul class="contact-area mt-20">
                                        <li class="mb-10"><a href="#"><i class="pe-7s-call"></i>+1-23-345-6789</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i>myemail@ymail.com</a></li>
                                    </ul>
                                    <ul class="social-icons icon-dark icon-circled icon-theme-colored icon-sm mt-30">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="attorney box-hover-effect effect1 bg-lighter mb-30">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20 pt-20 pl-30">
                                <div class="content">
                                    <h4 class="author text-theme-colored mb-0">Alex Jacobson</h4>
                                    <h6 class="title text-dark mt-0 mb-10">Attorney</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque.</p>
                                    <ul class="contact-area mt-20">
                                        <li class="mb-10"><a href="#"><i class="pe-7s-call"></i>+1-23-345-6789</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i>myemail@ymail.com</a></li>
                                    </ul>
                                    <ul class="social-icons icon-dark icon-circled icon-theme-colored icon-sm mt-30">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20">
                                <div class="thumb xs-text-center sm-text-right"><img class="img-fullwidth" src="http://placehold.it/262x340" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="attorney box-hover-effect effect1 bg-lighter mb-30">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20">
                                <div class="thumb"><img class="img-fullwidth" src="http://placehold.it/262x340" alt=""></div>
                            </div>
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20 pt-20">
                                <div class="content">
                                    <h4 class="author text-theme-colored mb-0">Alex Jacobson</h4>
                                    <h6 class="title text-dark mt-0 mb-10">Attorney</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque.</p>
                                    <ul class="contact-area mt-20">
                                        <li class="mb-10"><a href="#"><i class="pe-7s-call"></i>+1-23-345-6789</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i>myemail@ymail.com</a></li>
                                    </ul>
                                    <ul class="social-icons icon-dark icon-circled icon-theme-colored icon-sm mt-30">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="attorney box-hover-effect effect1 bg-lighter mb-30">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20 pt-20 pl-30">
                                <div class="content">
                                    <h4 class="author text-theme-colored mb-0">Alex Jacobson</h4>
                                    <h6 class="title text-dark mt-0 mb-10">Attorney</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque.</p>
                                    <ul class="contact-area mt-20">
                                        <li class="mb-10"><a href="#"><i class="pe-7s-call"></i>+1-23-345-6789</a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i>myemail@ymail.com</a></li>
                                    </ul>
                                    <ul class="social-icons icon-dark icon-circled icon-theme-colored icon-sm mt-30">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20">
                                <div class="thumb xs-text-center sm-text-right"><img class="img-fullwidth" src="http://placehold.it/262x340" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- divider: what makes us different -->
<section class="divider parallax layer-overlay overlay-light" data-stellar-background-ratio="0.5" data-bg-img="http://placehold.it/1920x1280">
    <div class="container">
        <div class="section-content text-center">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-0">We Fight for our clients</h3>
                    <h2>Just call at <span class="text-theme-colored">(01) 234 5678</span> for emergency service</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Appointment -->
<section class="bg-no-repeat bg-img-cover">
    <div class="container pb-0">
        <div class="row">
            <div class="col-md-7 col-md-offset-1"> <img class="mt-10" src="http://placehold.it/889x655" alt=""> </div>
            <div class="col-md-4 p-20">
                <div class="bg-deep p-30 pt-20">
                    <h4 class="line-bottom text-theme-colored text-uppercase mt-0 mb-20">Make an Appointment</h4>

                    <!-- Appointment Form -->
                    <form id="appointment_form" name="appointment_form" class="form-transparent form-line" method="post" action="includes/appointment.php">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input id="form_name" name="form_name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input id="form_appontment_date" name="form_appontment_date" class="form-control required date-picker" type="text" placeholder="Appoinment Date" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-10">
                            <textarea id="form_message" name="form_message" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                        </div>
                        <div class="form-group mb-0 mt-20">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                            <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">SEND TO LAWYER</button>
                        </div>
                    </form>

                    <!-- Appointment Form Validation-->
                    <script type="text/javascript">
                        $("#appointment_form").validate({
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
    </div>
</section>

<!-- Divider: Testimonials and clients -->
<section class="divider parallax layer-overlay overlay-deep" data-stellar-background-ratio="0.5" data-bg-img="http://placehold.it/1920x1280">
    <div class="container pb-50">
        <div class="row">
            <div class="col-sm-5 mb-30">
                <div class="testimonial-carousel boxed">
                    <div class="item xs-text-center">
                        <div class="content pt-10">
                            <p class="font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                            <div class="thumb"><img width="75" class="img-circle" alt="" src="http://placehold.it/75x75"></div>
                            <h5 class="author text-theme-colored mt-20 mb-0">Catherine Grace</h5>
                            <h6 class="title text-gray mt-0">Designer</h6>
                        </div>
                    </div>
                    <div class="item xs-text-center">
                        <div class="content pt-10">
                            <p class="font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                            <div class="thumb"><img width="75" class="img-circle" alt="" src="http://placehold.it/75x75"></div>
                            <h5 class="author text-theme-colored mt-20 mb-0">Catherine Grace</h5>
                            <h6 class="title text-gray mt-0">Designer</h6>
                        </div>
                    </div>
                    <div class="item xs-text-center">
                        <div class="content pt-10">
                            <p class="font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat turpis nec leo pellentesque tincidunt.</p>
                            <div class="thumb"><img width="75" class="img-circle" alt="" src="http://placehold.it/75x75"></div>
                            <h5 class="author text-theme-colored mt-20 mb-0">Catherine Grace</h5>
                            <h6 class="title text-gray mt-0">Designer</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row equal-height">
                    <div class="col-xs-4 p-0">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0 bg-lightest">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0 bg-lightest">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0 bg-lightest">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0 bg-lightest">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                    <div class="col-xs-4 p-0">
                        <div class="client-img"><a href="#"><img alt="" src="http://placehold.it/110x110"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Blog -->
<section id="blog">
    <div class="container">
        <div class="section-title title-border title-right icon-bg">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="mt-0 mb-0 text-uppercase">Rehearses</h6>
                    <h2 class="mt-0 page-title"><i class="fa fa-edit"></i>Blog</h2>
                    <p>Maecenas nec efficitur felis. Nulla egestas lacus sit
                        amet lectus tincidunt condimentum.</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row multi-row-clearfix">
                <div class="blog-posts">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <article class="post clearfix box-hover-effect effect1 maxwidth600 mb-sm-30">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img class="img-responsive img-fullwidth" alt="" src="http://placehold.it/330x250">
                                </div>
                            </div>
                            <div class="entry-content border-1px p-20">
                                <div class="entry-title pt-0">
                                    <h5 class="mt-0 pt-0"><a href="#">Complex Commercial Litigation</a></h5>
                                </div>
                                <ul class="entry-meta list-inline font-12">
                                    <li>by <a href="#" class="text-theme-colored">Admin |</a></li>
                                    <li><span class="text-theme-colored">Oct 12, 2015</span></li>
                                </ul>
                                <p class="mb-30 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <div class="entry-meta">
                                    <ul class="list-inline like-comment pull-left font-12">
                                        <li><i class="pe-7s-comment"></i>36</li>
                                        <li><i class="pe-7s-like2"></i>125</li>
                                    </ul>
                                </div>
                                <a href="#" class="pull-right text-gray font-12"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <article class="post clearfix box-hover-effect effect1 maxwidth600 mb-sm-30">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img class="img-responsive img-fullwidth" alt="" src="http://placehold.it/330x250">
                                </div>
                            </div>
                            <div class="entry-content border-1px p-20">
                                <div class="entry-title pt-0">
                                    <h5 class="mt-0 pt-0"><a href="#">Complex Commercial Litigation</a></h5>
                                </div>
                                <ul class="entry-meta list-inline font-12">
                                    <li>by <a href="#" class="text-theme-colored">Admin |</a></li>
                                    <li><span class="text-theme-colored">Oct 12, 2015</span></li>
                                </ul>
                                <p class="mb-30 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <div class="entry-meta">
                                    <ul class="list-inline like-comment pull-left font-12">
                                        <li><i class="pe-7s-comment"></i>36</li>
                                        <li><i class="pe-7s-like2"></i>125</li>
                                    </ul>
                                </div>
                                <a href="#" class="pull-right text-gray font-12"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <article class="post clearfix box-hover-effect effect1 maxwidth600 mb-sm-30">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img class="img-responsive img-fullwidth" alt="" src="http://placehold.it/330x250">
                                </div>
                            </div>
                            <div class="entry-content border-1px p-20">
                                <div class="entry-title pt-0">
                                    <h5 class="mt-0 pt-0"><a href="#">Complex Commercial Litigation</a></h5>
                                </div>
                                <ul class="entry-meta list-inline font-12">
                                    <li>by <a href="#" class="text-theme-colored">Admin |</a></li>
                                    <li><span class="text-theme-colored">Oct 12, 2015</span></li>
                                </ul>
                                <p class="mb-30 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <div class="entry-meta">
                                    <ul class="list-inline like-comment pull-left font-12">
                                        <li><i class="pe-7s-comment"></i>36</li>
                                        <li><i class="pe-7s-like2"></i>125</li>
                                    </ul>
                                </div>
                                <a href="#" class="pull-right text-gray font-12"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divider: Contact -->
<section id="contact" class="divider bg-lighter">
    <div class="container">
        <div class="section-title text-center icon-bg mb-60">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="sub-title both-side-line">Get In Touch</h5>
                    <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Contact</h2>
                    <p>Maecenas nec efficitur felis. Nulla egestas lacus sit amet lectus tincidunt condimentum.</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                <div class="media-body"> <strong>OUR OFFICE LOCATION</strong>
                                    <p>#405, Lan Streen, Los Vegas, USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                                <div class="media-body"> <strong>OUR CONTACT NUMBER</strong>
                                    <p>+325 12345 65478</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                                <div class="media-body"> <strong>OUR CONTACT E-MAIL</strong>
                                    <p>supporte@yourdomin.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-skype text-theme-colored"></i></a>
                                <div class="media-body"> <strong>Make a Video Call</strong>
                                    <p>ThemeMascotSkype</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="mt-0 mb-30">Interested in discussing?</h3>

                    <!-- Contact Form -->
                    <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_name">Name <small>*</small></label>
                                    <input id="form_name" name="form_name" class="form-control" type="text" placeholder="Enter Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_email">Email <small>*</small></label>
                                    <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_name">Subject <small>*</small></label>
                                    <input id="form_subject" name="form_subject" class="form-control required" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="form_name">Message</label>
                            <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
                            <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                        </div>
                    </form>
                    <!-- Contact Form Validation-->
                    <script type="text/javascript">
                        $("#contact_form").validate({
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
    </div>
</section>
@stop