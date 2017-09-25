@extends('layouts.master')
@section('content')

    @include('partials.links')
    @include('partials.logged')

    <section>
        <div class="container pt-10">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="font-weight-600 font-26">{{ $page->post_title }}</h2>
                    <div>
                        {!! $page->post_content !!}
                        @if($page->meta->insert_pub)
                            @include('partials.pub')
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <section class="widget text-3 widget_text">
                        @if($page->meta->box_adresse)
                            {!! nl2br($page->meta->box_adresse) !!}
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </section>

@stop