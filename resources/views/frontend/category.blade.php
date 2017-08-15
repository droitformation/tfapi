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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('partials.categories')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-10">
            <div class="row">
                <div class="col-md-8">

                    <h5 class="font-weight-600 font-16 text-danger">{{ $categorie->term->name }}</h5>

                    @if(!$categorie->posts->isEmpty())
                        @include('partials.posts', ['posts' => $categorie->posts])
                    @endif

                </div>
                <div class="col-md-4">
                    <div class="widget widget-sidebar">
                        <h5 class="widget-title line-bottom">Categories</h5>
                        <div class="categories">
                           @include('partials.categories-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop