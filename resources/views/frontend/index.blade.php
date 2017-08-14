@extends('layouts.master')
@section('content')

<!-- Section: home -->
<section id="accueil">
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

@include('partials.links')

<!-- Section: Divider -->
<section>
    <div class="container pb-20 pt-40">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-dark">
                    <div class="panel-heading">Pas encore de compte?</div>
                    <div class="panel-body panel-form">
                       @include('auth.code')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body panel-form">
                        @include('auth.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: About -->
<section>
    <div class="container pt-0 pb-40">
        <div class="row">
            <div class="col-sm-6 col-md-6 maxwidth500">
                <div class="box-hover-effect effect1 mb-md-30">
                    <div class="icon-box left media bg-deep mb-0 mt-0 p-20 pt-30 pb-30">
                        <a href="#" class="media-left pull-left mr-15 mt-5"> <i class="fa fa-gavel text-theme-colored font-30"></i></a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <p><small><strong>11 déc 2017</strong></small></p>
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
                    <div class="icon-box left media bg-deep mb-0 mt-0 p-20  pt-30 pb-30">
                        <a href="#" class="media-left pull-left mr-15 mt-5"> <i class="fa fa-gavel text-theme-colored font-30"></i></a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <p><small><strong>11 déc 2017</strong></small></p>
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

@stop