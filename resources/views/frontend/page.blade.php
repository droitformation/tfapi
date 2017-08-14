@extends('layouts.master')
@section('content')

    @include('partials.links')

    <section>
        <div class="container pt-40 pb-10">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-body panel-form">

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

                    <h5 class="font-weight-600 font-16 text-danger">Arbitrage</h5>

                    @if(!$posts->isEmpty())
                        @foreach($posts as $post)
                            <div class="post-arret">
                                <h3 class="post-title">
                                    {{ $post->post_title }}
                                </h3>
                                <div class="post-content">
                                    {!! nl2br($post->post_content) !!}
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h5 class="widget-title line-bottom">Categories</h5>
                        <div class="categories">
                            @if(!$categories->isEmpty())
                            <ul class="list list-border angle-double-right">
                                @foreach($categories as $categorie)
                                    <li><a href="#">{{ $categorie->name }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop