@extends('layouts.master')
@section('content')

    @include('partials.links')

    <section>
        <div class="container pt-40 pb-10">
            <div class="row">
                <div class="col-md-5">
                    @include('partials.search-keyword')
                </div>
                <div class="col-md-7">
                    @include('partials.search-law')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-10">
            <div class="row">
                <div class="col-md-12">

                    <h5 class="font-weight-600 font-16 text-danger">
                        Résultats

                        @if($terms)
                            <span class="text-muted">pour: {{ $terms }}</span>
                        @endif
                    </h5>

                    @if(!$posts->isEmpty())
                        @include('partials.posts', ['posts' => $posts])

                        {{ $posts->links() }}
                    @else
                        <p>Aucun résultats</p>
                    @endif

                </div>
            </div>
        </div>
    </section>

@stop