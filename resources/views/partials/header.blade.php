<!-- Header -->
<header id="header" class="header">
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed">
            <div class="container">
                <nav>
                    <div id="menuzord-right" class="menuzord">
                        <a class="menuzord-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo droit praticien">
                        </a>
                        <ul class="menuzord-menu onepage-nav">
                            <li class="active"><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('about') }}">A propos</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                            <li class="logos"><a href="{{ url('contact') }}"><img height="50" src="{{ asset('images/unine.svg') }}" alt="Logo UniNE"></a></li>
                            <li class="logos"><a href="{{ url('contact') }}"><img height="35" src="{{ asset('images/cemaj.svg') }}" alt="Logo UniNE"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>