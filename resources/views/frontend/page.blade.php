@extends('layouts.master')
@section('content')

    @include('partials.links')

    <section>
        <div class="container pt-40 pb-10">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-inline" method="POST" action="{{ url('search') }}">{{ csrf_field() }}
                                <label for="search">Recherche par mots-clés</label><br/>

                                <div class="input-group w-p-90">
                                    <input type="text" class="form-control" placeholder="Recherche" name="search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-dark">OK</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">

                    <div class="panel panel-default">
                        <div class="panel-body">

                            <form class="form-inline" method="POST" action="{{ url('terms') }}">{{ csrf_field() }}
                                <label for="terms" class="pull-left">Recherche par article</label>
                                <small class="text-muted pull-right">
                                    Exemple = article : <strong>405</strong> ,
                                    loi: <strong>CPC</strong> , alinéa: <strong>1</strong>,
                                    chiffre: <strong>2</strong>, lettre: <strong>c</strong>
                                </small>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control w-80" placeholder="Article" name="article">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control w-80" placeholder="Loi" name="loi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control w-80" placeholder="Alinéa" name="alinea">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control w-80" placeholder="Chiffre" name="chiffre">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control w-80" placeholder="Lettre" name="lettre">
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark">OK</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body panel-form">
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