@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark mt-60">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        @include('auth.partials.login-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
