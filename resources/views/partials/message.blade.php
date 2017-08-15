@if (session('status'))
    <section>
        <div class="container pb-0 pt-40">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success mb-0">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif