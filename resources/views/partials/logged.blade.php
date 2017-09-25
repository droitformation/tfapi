@if(Auth::check())
    <section>
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <p>Bonjour {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </section>
@endif