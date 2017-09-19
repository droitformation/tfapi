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

    @if(isset($categorie))

        <section>
            <div class="container pt-10">
                <div class="row">
                    <div class="col-md-8">

                        <h5 class="font-weight-600 font-16 text-danger">{{ $categorie->name }}</h5>

                        @if(!$posts->isEmpty())
                            @include('partials.posts', ['posts' => $posts])

                            {{ $posts->links() }}
                        @endif

                    </div>
                    <div class="col-md-4">
                        <div class="widget widget-sidebar">

                            <div class="panel panel-default">
                                <div class="panel-body panel-boutons">
                                    @if(!$years->isEmpty())
                                        @foreach($years as $slug_year => $year)
                                            <a class="btn btn-primary btn-xs {{ isset($current) && ($current == $slug_year) ? 'active' : '' }}" href="{{ url('category/'.$categorie->slug.'/'.$slug_year) }}">{{ $year }}</a>
                                        @endforeach
                                        <a class="btn btn-primary btn-xs {{ !isset($current) ? 'active' : '' }}" href="{{ url('category/'.$categorie->slug) }}">Tout</a>
                                    @endif
                                </div>
                            </div>

                            @include('partials.categories-list')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

@stop